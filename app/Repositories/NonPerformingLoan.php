<?php

namespace App\Repositories;

use App\Models\MisLoan;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use DB;

class NonPerformingLoan
{
    public function LoanProduk($cab)
    {
        $datadate = Setting::where('name', 'DATADATE')->first();
        $cacheKey = "loan_produk_by_cab_{$cab}_{$datadate->value}";

        return Cache::remember($cacheKey, 60, function () use ($cab, $datadate) {
            return MisLoan::where('DATADATE', $datadate->value)
                        ->where('CAB', $cab)
                        ->groupBy('KET_KD_PRD')
                        ->select(
                            'KET_KD_PRD',
                            DB::raw('COUNT(CASE WHEN KODE_KOLEK > 0 THEN POKOK_PINJAMAN ELSE 0 END) as total_debitur'),
                            DB::raw('SUM(CASE WHEN KODE_KOLEK > 0 THEN POKOK_PINJAMAN ELSE 0 END) as total_pokok'),
                            DB::raw('SUM(CASE WHEN KODE_KOLEK > 2 THEN POKOK_PINJAMAN ELSE 0 END) as total_npl')
                        )->orderBy('total_npl', 'desc')->get();
        });
    }

    public function LoanProdukKolek($cab)
    {
        $datadate = Setting::where('name', 'DATADATE')->first();
        $cacheKey = "loan_produk_kolek_by_cab_{$cab}_{$datadate->value}";

        return Cache::remember($cacheKey, 60, function () use ($cab, $datadate) {
            return MisLoan::where('DATADATE', $datadate->value)
                        ->where('CAB', $cab)
                        ->groupBy('KET_KD_PRD')
                        ->select(
                            'KET_KD_PRD',
                            DB::raw('SUM(CASE WHEN KODE_KOLEK > 0 THEN POKOK_PINJAMAN ELSE 0 END) as total_pokok'),
                            DB::raw('SUM(CASE WHEN KODE_KOLEK = 1 THEN POKOK_PINJAMAN ELSE 0 END) as total_1'),
                            DB::raw('SUM(CASE WHEN KODE_KOLEK = 2 THEN POKOK_PINJAMAN ELSE 0 END) as total_2'),
                            DB::raw('SUM(CASE WHEN KODE_KOLEK = 3 THEN POKOK_PINJAMAN ELSE 0 END) as total_3'),
                            DB::raw('SUM(CASE WHEN KODE_KOLEK = 4 THEN POKOK_PINJAMAN ELSE 0 END) as total_4'),
                            DB::raw('SUM(CASE WHEN KODE_KOLEK = 5 THEN POKOK_PINJAMAN ELSE 0 END) as total_5')
                        )->orderBy('total_pokok', 'desc')->get();
        });
    }

    public function LoanAo($cab)
    {
        $datadate = Setting::where('name', 'DATADATE')->first();
        $cacheKey = "loan_ao_by_cab_{$cab}_{$datadate->value}";

        return Cache::remember($cacheKey, 60, function () use ($cab, $datadate) {
            return MisLoan::where('DATADATE', $datadate->value)
                        ->where('CAB', $cab)
                        ->groupBy('AO')
                        ->select(
                            'AO',
                            DB::raw('COUNT(CASE WHEN KODE_KOLEK > 0 THEN POKOK_PINJAMAN ELSE 0 END) as total_debitur'),
                            DB::raw('SUM(CASE WHEN KODE_KOLEK > 0 THEN POKOK_PINJAMAN ELSE 0 END) as total_pokok'),
                            DB::raw('SUM(CASE WHEN KODE_KOLEK > 2 THEN POKOK_PINJAMAN ELSE 0 END) as total_npl')
                        )->orderBy('total_npl', 'desc')->get();
        });
    }

    public function LoanAoKolek($cab)
    {
        $datadate = Setting::where('name', 'DATADATE')->first();
        $cacheKey = "loan_ao_kolek_by_cab_{$cab}_{$datadate->value}";

        return Cache::remember($cacheKey, 60, function () use ($cab, $datadate) {
            return MisLoan::where('DATADATE', $datadate->value)
                        ->where('CAB', $cab)
                        ->groupBy('AO')
                        ->select(
                            'AO',
                            DB::raw('SUM(CASE WHEN KODE_KOLEK > 0 AND CAB = "'.$cab.'" THEN POKOK_PINJAMAN ELSE 0 END) as total_pokok'),
                            DB::raw('SUM(CASE WHEN KODE_KOLEK = 1 AND CAB = "'.$cab.'" THEN POKOK_PINJAMAN ELSE 0 END) as total_1'),
                            DB::raw('SUM(CASE WHEN KODE_KOLEK = 2 AND CAB = "'.$cab.'" THEN POKOK_PINJAMAN ELSE 0 END) as total_2'),
                            DB::raw('SUM(CASE WHEN KODE_KOLEK = 3 AND CAB = "'.$cab.'" THEN POKOK_PINJAMAN ELSE 0 END) as total_3'),
                            DB::raw('SUM(CASE WHEN KODE_KOLEK = 4 AND CAB = "'.$cab.'" THEN POKOK_PINJAMAN ELSE 0 END) as total_4'),
                            DB::raw('SUM(CASE WHEN KODE_KOLEK = 5 AND CAB = "'.$cab.'" THEN POKOK_PINJAMAN ELSE 0 END) as total_5')
                        )->orderBy('total_pokok', 'desc')->get();
        });
    }

    
    public function LoanInstansi($cab)
    {
        $datadate = Setting::where('name', 'DATADATE')->first();
        $cacheKey = "loan_instansi_by_cab_{$cab}_{$datadate->value}";

        return Cache::remember($cacheKey, 60, function () use ($cab, $datadate) {
            return MisLoan::where('DATADATE', $datadate->value)
                        ->where('CAB', $cab)
                        ->groupBy('TEMPAT_BEKERJA')
                        ->select(
                            'TEMPAT_BEKERJA',
                            DB::raw('COUNT(CASE WHEN KODE_KOLEK > 0 THEN POKOK_PINJAMAN ELSE 0 END) as total_debitur'),
                            DB::raw('SUM(CASE WHEN KODE_KOLEK > 0 THEN POKOK_PINJAMAN ELSE 0 END) as total_pokok'),
                            DB::raw('SUM(CASE WHEN KODE_KOLEK > 2 THEN POKOK_PINJAMAN ELSE 0 END) as total_npl')
                        )->orderBy('total_npl', 'desc')->get();
        });
    }

    public function LoanInstansiKolek($cab)
    {
        $datadate = Setting::where('name', 'DATADATE')->first();
        $cacheKey = "loan_instansi_kolek_by_cab_{$cab}_{$datadate->value}";

        return Cache::remember($cacheKey, 60, function () use ($cab, $datadate) {
            return MisLoan::where('DATADATE', $datadate->value)
                        ->where('CAB', $cab)
                        ->groupBy('TEMPAT_BEKERJA')
                        ->select(
                            'TEMPAT_BEKERJA',
                            DB::raw('SUM(CASE WHEN KODE_KOLEK > 0 THEN POKOK_PINJAMAN ELSE 0 END) as total_pokok'),
                            DB::raw('SUM(CASE WHEN KODE_KOLEK = 1 THEN POKOK_PINJAMAN ELSE 0 END) as total_1'),
                            DB::raw('SUM(CASE WHEN KODE_KOLEK = 2 THEN POKOK_PINJAMAN ELSE 0 END) as total_2'),
                            DB::raw('SUM(CASE WHEN KODE_KOLEK = 3 THEN POKOK_PINJAMAN ELSE 0 END) as total_3'),
                            DB::raw('SUM(CASE WHEN KODE_KOLEK = 4 THEN POKOK_PINJAMAN ELSE 0 END) as total_4'),
                            DB::raw('SUM(CASE WHEN KODE_KOLEK = 5 THEN POKOK_PINJAMAN ELSE 0 END) as total_5')
                        )->orderBy('total_pokok', 'desc')->get();
        });
    }

    
    
    public function LoanWilayah($cab)
    {
        $datadate = Setting::where('name', 'DATADATE')->first();
        $cacheKey = "loan_wilayah_by_cab_{$cab}_{$datadate->value}";

        return Cache::remember($cacheKey, 60, function () use ($cab, $datadate) {
            return MisLoan::where('DATADATE', $datadate->value)
                        ->where('CAB', $cab)
                        ->groupBy('KELURAHAN')
                        ->select(
                            'KELURAHAN',
                            DB::raw('COUNT(CASE WHEN KODE_KOLEK > 0 THEN POKOK_PINJAMAN ELSE 0 END) as total_debitur'),
                            DB::raw('SUM(CASE WHEN KODE_KOLEK > 0 THEN POKOK_PINJAMAN ELSE 0 END) as total_pokok'),
                            DB::raw('SUM(CASE WHEN KODE_KOLEK > 2 THEN POKOK_PINJAMAN ELSE 0 END) as total_npl')
                        )->orderBy('total_npl', 'desc')->get();
        });
    }

    public function LoanWilayahKolek($cab)
    {
        $datadate = Setting::where('name', 'DATADATE')->first();
        $cacheKey = "loan_wilayah_kolek_by_cab_{$cab}_{$datadate->value}";

return Cache::remember($cacheKey, 60, function () use ($cab, $datadate) {
    return MisLoan::where('DATADATE', $datadate->value)
                ->where('CAB', $cab)
                ->groupBy('KELURAHAN')
                ->select(
                    'KELURAHAN',
                    DB::raw('SUM(CASE WHEN KODE_KOLEK > 0 AND CAB = "'.$cab.'" THEN POKOK_PINJAMAN ELSE 0 END) as total_pokok'),
                    DB::raw('SUM(CASE WHEN KODE_KOLEK = 1 AND CAB = "'.$cab.'" THEN POKOK_PINJAMAN ELSE 0 END) as total_1'),
                    DB::raw('SUM(CASE WHEN KODE_KOLEK = 2 AND CAB = "'.$cab.'" THEN POKOK_PINJAMAN ELSE 0 END) as total_2'),
                    DB::raw('SUM(CASE WHEN KODE_KOLEK = 3 AND CAB = "'.$cab.'" THEN POKOK_PINJAMAN ELSE 0 END) as total_3'),
                    DB::raw('SUM(CASE WHEN KODE_KOLEK = 4 AND CAB = "'.$cab.'" THEN POKOK_PINJAMAN ELSE 0 END) as total_4'),
                    DB::raw('SUM(CASE WHEN KODE_KOLEK = 5 AND CAB = "'.$cab.'" THEN POKOK_PINJAMAN ELSE 0 END) as total_5')
                )->orderBy('total_pokok', 'desc')->get();
});
    }
}