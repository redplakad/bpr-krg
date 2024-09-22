<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Penagihan extends Model
{
    use HasFactory;

        // Nama tabel
        protected $table = 'penagihan';

        // Kolom yang dapat diisi (fillable)
        protected $fillable = [
            'id_debitur',
            'nama_debitur',
            'bakidebet',
            'tunggakan_pokok',
            'tunggakan_bunga',
            'petugas_ao',
            'hasil_kunjungan',
            'status_bayar',
            'foto1',
            'foto2',
            'foto3',
            'foto4',
            'koordinat',
        ];
    
        // Relasi ke tabel mis_loan
        public function debitur(): BelongsTo
        {
            return $this->belongsTo(MisLoan::class, 'id_debitur');
        }
}
