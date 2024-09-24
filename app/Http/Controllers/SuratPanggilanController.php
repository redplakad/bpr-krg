<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MisLoan;
use Barryvdh\DomPDF\Facade\Pdf;

class SuratPanggilanController extends Controller
{
    public function print($id)
    {
        // Logika untuk mencetak surat panggilan
        $misloan = MisLoan::where('id', $id)->first();

        $data = [
            'data' => $misloan,
        ];

        $data = $misloan;
        return view('filament.resources.misloan.surat-panggilan', compact('data')); // Ganti dengan view yang sesuai

        /*$pdf = Pdf::loadView('filament.resources.misloan.surat-panggilan', $data);
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
        return $pdf->stream("", ["Attachment" => false]);
        */
    }
}