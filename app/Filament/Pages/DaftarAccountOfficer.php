<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

use App\Repositories\NonPerformingLoan;

class DaftarAccountOfficer extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.daftar-account-officer';

    public $data = [];

    public static function getNavigationLabel(): string
    {
        return 'DAFTAR ACCOUNT OFFICER'; // Ganti dengan title navigasi yang diinginkan
    }


    public function mount(NonPerformingLoan $NonPerformingLoan): void {
        $cab = auth()->user()->branch_code;
        
        $this->data = [
            'loan-ao' => $NonPerformingLoan->LoanAo($cab),
            'loan-ao-kol' => $NonPerformingLoan->LoanAoKolek($cab),
        ];
    }
}
