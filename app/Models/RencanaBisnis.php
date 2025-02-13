<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RencanaBisnis extends Model
{
    use HasFactory;

    // Jika nama tabel tidak sesuai dengan konvensi Laravel, tentukan nama tabel secara eksplisit
    protected $table = 'rencana_bisnis';

    // Tentukan kolom yang dapat diisi secara massal
    protected $fillable = [
        'DATADATE',
        'CAB',
        'KETERANGAN',
        'NOMINAL',
    ];
}