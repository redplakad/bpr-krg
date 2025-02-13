<?php

namespace App\Filament\Resources\PenagihanResource\Pages;

use App\Filament\Resources\PenagihanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPenagihans extends ListRecords
{
    protected static string $resource = PenagihanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
