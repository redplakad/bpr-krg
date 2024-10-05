<?php

namespace App\Filament\Resources\KantorCabangResource\Pages;

use App\Filament\Resources\KantorCabangResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageKantorCabangs extends ManageRecords
{
    protected static string $resource = KantorCabangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
