<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kinerja extends Model
{
    use HasFactory;

    // Specify the table name (optional if it follows Laravel's naming convention)
    protected $table = 'kinerja';

    // Specify which attributes are mass assignable
    protected $fillable = [
        'tanggal',
        'deskripsi',
        'checklist',
        'lampiran1',
        'lampiran2',
        'lampiran3',
        'user_id', // Foreign key to users table
    ];

    // Define a relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}