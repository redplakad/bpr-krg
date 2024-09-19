<?php

namespace App\Filament\Resources\MisLoanResource\Pages;

use App\Filament\Resources\MisLoanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Konnco\FilamentImport\Actions\ImportField;
use Konnco\FilamentImport\Actions\ImportAction;

class ListMisLoans extends ListRecords
{
    protected static string $resource = MisLoanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //Actions\CreateAction::make()
        ];
    }
}
