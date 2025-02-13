<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarAo extends Model
{
    use HasFactory;

    protected $table = 'daftarao';

    protected $fillable = [
        'kode',
        'nama_ao',
        'cab',
    ];
}
