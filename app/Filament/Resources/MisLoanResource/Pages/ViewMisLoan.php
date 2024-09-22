<?php

namespace App\Filament\Resources\MisLoanResource\Pages;

use App\Filament\Resources\MisLoanResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMisLoan extends ViewRecord
{
    protected static string $resource = MisLoanResource::class;

    

    protected static string $view = 'filament.resources.misloan.view';
}
