<?php

namespace App\Filament\Resources\NeracaHarianResource\Pages;

use App\Filament\Resources\NeracaHarianResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNeracaHarian extends EditRecord
{
    protected static string $resource = NeracaHarianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
