<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;


use App\Models\MisLoan;
use App\Models\Setting;
use App\Models\User;

use DB;
use App\Repositories\NonPerformingLoan;

use App\Filament\Resources\MisLoanResource\Pages;
use Filament\Resources\Resource;
use App\Filament\Widgets\LoanWidget;
use Illuminate\Contracts\Support\Htmlable;

class nplWilayah extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.npl-wilayah';

    protected static ?string $navigationGroup = 'Manajemen Risiko';

    public static function getNavigationLabel(): string
    {
        return 'NPL PER WILAYAH'; // Ganti dengan title navigasi yang diinginkan
    }

    public function getTitle(): string | Htmlable
    {
        return __('NPL PER WILAYAH');
    }
    public static function getPluralLabel(): string
    {
        return __('NPL PER WILAYAH');
    }

    protected function getHeaderWidgets(): array
    {
        return [
            LoanWidget::class
        ];
    }

    public $data = [];
    
    public function mount(NonPerformingLoan $NonPerformingLoan): void {
        $cab = auth()->user()->branch_code;
        
        $this->data = [
            'loan-wilayah' => $NonPerformingLoan->LoanWilayah($cab),
            'loan-wilayah-kol' => $NonPerformingLoan->LoanWilayahKolek($cab),
        ];
    }
}
