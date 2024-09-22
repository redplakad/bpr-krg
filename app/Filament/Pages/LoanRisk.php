<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class LoanRisk extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.loan-risk';    

    protected static ?string $navigationGroup = 'Manajemen Risiko';
}
