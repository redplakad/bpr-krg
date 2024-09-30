<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NeracaHarian extends Model
{
    use HasFactory;

    protected $table = 'neraca_harian';

    protected $fillable = [
        'DATADATE',
        'CAB',
        'NOMOR_REKENING',
        'NAMA_REKENING',
        'LVL',
        'SALDO_AWAL',
        'MUTASI_DEBET',
        'MUTASI_KREDIT',
        'SALDO_AKHIR',
    ];
}
