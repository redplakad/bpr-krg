<?php

namespace App\Repositories\LaporanRBB;

use App\Models\NeracaHarian;
use App\Models\RencanaBisnis;

class AssetRepository
{
    public function getAssets($kantorCabang, $latestDate, $lastYearDate, $currentDate, $kode, $keterangan): array
    {
        $assets = [];

        foreach ($kantorCabang as $i) {
            // Fetch data for each branch
            $aktualTahunIni = NeracaHarian::where('DATADATE', $latestDate)
                                          ->where('CAB', $i->kode)
                                          ->where('NOMOR_REKENING', $kode)
                                          ->first();

            $aktualTahunLalu = NeracaHarian::where('DATADATE', $lastYearDate->format('Ymd'))
                                           ->where('CAB', $i->kode)
                                           ->where('NOMOR_REKENING', $kode)
                                           ->first();

            $rencanaBisnis = RencanaBisnis::where('DATADATE', $currentDate->format('Y-m-d'))
                                          ->where('CAB', $i->kode)
                                          ->where('KETERANGAN', $keterangan)
                                          ->first();

            // Set default value for RBB or fetch it from somewhere if needed
            $rbb = optional($rencanaBisnis)->NOMINAL ?? 0;
            $saldoAkhir = optional($aktualTahunIni)->SALDO_AKHIR ?? 0;

            // Calculate nominal growth and percentage growth
            $pertumbuhanNominal = ($aktualTahunIni ? $aktualTahunIni->SALDO_AKHIR : 0) - ($aktualTahunLalu ? $aktualTahunLalu->SALDO_AKHIR : 0);
            $pertumbuhanPersentase = ($aktualTahunIni && $aktualTahunLalu && ($aktualTahunLalu->SALDO_AKHIR > 0)) ? 
                                      (($aktualTahunIni->SALDO_AKHIR / $aktualTahunLalu->SALDO_AKHIR) * 100) : 0;

            // Hitung pencapaian nominal dan persentase pencapaian
            $pencapaianNominal = ($saldoAkhir > 0 && $rbb > 0) ? ($saldoAkhir - $rbb) : 0;
            $pencapaianPersentase = ($saldoAkhir > 0 && $rbb > 0) ? (($saldoAkhir / $rbb) * 100) : 0;

            // Store data in assets array
            $assets[] = [
                'cabang' => $i->kode,
                'aktualTahunIni' => optional($aktualTahunIni)->SALDO_AKHIR ?? 0,
                'rbb' => $rbb,
                'aktualTahunLalu' => optional($aktualTahunLalu)->SALDO_AKHIR ?? 0,
                'pertumbuhan_nominal' => $pertumbuhanNominal,
                'pertumbuhan_persentase' => $pertumbuhanPersentase,
                'pencapaian_nominal' => $pencapaianNominal,
                'pencapaian_persentase' => $pencapaianPersentase
            ];
        }

        return $assets; // Kembalikan array assets
    }
}