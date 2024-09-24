<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KantorCabang extends Model
{
    use HasFactory;

    protected $table = 'kinerja';

    // Specify which attributes are mass assignable
    protected $fillable = [
        'kode',
        'nama',
        'alamat',
        'telepon',
    ];

    // Define a relationship with the User model
    public function user()
    {
        return $this->hasMany(User::class);
    }
}
