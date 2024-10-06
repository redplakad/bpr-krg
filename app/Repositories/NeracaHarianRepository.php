<?php
namespace App\Repositories;

use App\Models\NeracaHarian;

class NeracaHarianRepository implements NeracaHarianRepositoryInterface
{
    public function all()
    {
        return NeracaHarian::all();
    }

    public function find($datadate, $cab, $norek)
    {
        $neraca = NeracaHarian::where('DATADATE', $datadate)
                        ->where('CAB', $cab)
                        ->where('NOMOR_REKENING', $norek);

        return $neraca;
    }
}