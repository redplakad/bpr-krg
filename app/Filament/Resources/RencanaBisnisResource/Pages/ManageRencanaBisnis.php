<?php

namespace App\Filament\Resources\RencanaBisnisResource\Pages;

use App\Filament\Resources\RencanaBisnisResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageRencanaBisnis extends ManageRecords
{
    protected static string $resource = RencanaBisnisResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
