<?php

namespace App\Filament\Resources\MisLoanResource\Pages;

use App\Filament\Resources\MisLoanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Imports\MisLoanImporter;
use Filament\Tables\Actions\ImportAction;


class ListMisLoans extends ListRecords
{
    protected static string $resource = MisLoanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //Actions\CreateAction::make()
        ];
    }

    protected function afterIndex(): void
    {
        // Log user activity when accessing the index page
        activity()
            ->causedBy(auth()->user()) // Set the user who caused the activity
            ->log('User accessed MisLoan index page'); // Log message
    }
}
