<?php

namespace App\Filament\Resources\KinerjaResource\Pages;

use App\Filament\Resources\KinerjaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKinerja extends EditRecord
{
    protected static string $resource = KinerjaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
