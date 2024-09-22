<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MisLoan;

class SuratPanggilanController extends Controller
{
    public function print($id)
    {
        // Logika untuk mencetak surat panggilan
        $data = MisLoan::where('id', $id)->first();
        return view('filament.resources.misloan.surat-panggilan', compact('data')); // Ganti dengan view yang sesuai
    }
}