<?php

namespace App\Repositories;

interface NeracaHarianRepositoryInterface
{
    public function all();
    public function find($datadate, $cab, $norek);
}