<?php

namespace App\Filament\Resources\MisLoanResource\Pages;

use App\Filament\Resources\MisLoanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMisLoan extends EditRecord
{
    protected static string $resource = MisLoanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
