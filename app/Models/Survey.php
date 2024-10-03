<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Survey extends Model
{
    use HasFactory;
    use LogsActivity;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_debitur',
        'cab',
        'alamat',
        'status_tempat',
        'no_hp',
        'jenis_jaminan',
        'foto_ktp',
        'foto_debitur',
        'foto_rumah1',
        'foto_rumah2',
        'foto_jaminan1',
        'foto_jaminan2',
        'koordinat',
        'user_id'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(
            [
                'nama_debitur',
                'cab',
                'alamat',
                'status_tempat',
                'no_hp',
                'jenis_jaminan',
                'foto_ktp',
                'foto_debitur',
                'foto_rumah1',
                'foto_rumah2',
                'foto_jaminan1',
                'foto_jaminan2',
                'koordinat',
                'user_id'
            ]
        );
    }

    protected $casts = [
        'petugas_ao' => 'array',
        'koordinat' => 'array'
    ];
}