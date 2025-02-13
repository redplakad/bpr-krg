<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jaminan extends Model
{
    use HasFactory;

    protected $table = 'jaminan'; // Specify the table name if it's not pluralized

    protected $fillable = [
        'no_rekening',
        'nama_debitur',
        'nama_pemilik',
        'jenis_jaminan',
        'foto_jaminan1',
        'foto_jaminan2',
        'foto_jaminan3',
        'foto_jaminan4',
        'foto_jaminan5',
        'user_id',
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Accessor to get photos as an array
    public function getFotoJaminanAttribute($value)
    {
        return json_decode($value, true);
    }
}