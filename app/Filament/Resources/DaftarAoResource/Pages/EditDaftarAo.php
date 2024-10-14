<?php

namespace App\Filament\Resources\DaftarAoResource\Pages;

use App\Filament\Resources\DaftarAoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDaftarAo extends EditRecord
{
    protected static string $resource = DaftarAoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
