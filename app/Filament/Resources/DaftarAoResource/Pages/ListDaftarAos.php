<?php

namespace App\Filament\Resources\DaftarAoResource\Pages;

use App\Filament\Resources\DaftarAoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDaftarAos extends ListRecords
{
    protected static string $resource = DaftarAoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
