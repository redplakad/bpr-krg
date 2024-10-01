<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class viewNominatifAo extends Controller
{
    public function index($slug)
    {
        // Jika ada logika atau data yang ingin disertakan ke view
        // Contoh: $data = Model::all();
        
        // Tampilkan view dengan mengirim data (jika ada)
        return view('nominatif-ao', compact('slug'));
    }
}