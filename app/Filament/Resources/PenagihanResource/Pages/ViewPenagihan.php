<?php

namespace App\Filament\Resources\PenagihanResource\Pages;

use App\Filament\Resources\PenagihanResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPenagihan extends ViewRecord
{
    protected static string $resource = PenagihanResource::class;

    protected static string $view = 'filament.resources.penagihan.view';

    protected function getViewData(): array
    {
        // Misalnya, kita ingin mengirimkan data tambahan dari record
        return [
            'abc' => 'Ini adalah data tambahan',
            'record' => $this->record, // Mengirimkan record saat ini
        ];
    }


}
