<?php

namespace App\Filament\Resources\PenagihanResource\Pages;

use App\Models\User;
use App\Models\MisLoan;

use App\Filament\Resources\PenagihanResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class PrintPenagihan extends ViewRecord
{
    protected static string $resource = PenagihanResource::class;

    protected static string $view = 'filament.resources.penagihan.print';

    protected function getViewData(): array
    {
        $record = $this->record;
        $ao = [];
        if (is_array($record->petugas_ao)) {
            foreach ($record->petugas_ao as $userId) {
                // Mencari user berdasarkan ID
                $user = User::find($userId);
                if ($user) {
                    // Menyimpan nama user ke dalam array $ao
                    $ao[] = $user->name; // Mengambil nama user
                }
            }
        }

        $loan = MisLoan::where('id', $record->id_debitur)->first();

        return [
            'abc' => 'Ini adalah data tambahan',
            'record' => $record, // Mengirimkan record saat ini
            'ao' => $ao,
            'loan' => $loan,
        ];
    }


}
