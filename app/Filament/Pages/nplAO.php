<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Repositories\NonPerformingLoan;

use App\Filament\Resources\MisLoanResource\Pages;
use Filament\Resources\Resource;
use App\Filament\Widgets\LoanWidget;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Http\Request;

class nplAO extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.npl-a-o';

    protected static ?string $navigationGroup = 'Manajemen Risiko';

    public $data = [];

    public static function getNavigationLabel(): string
    {
        return 'NPL PER AO'; // Ganti dengan title navigasi yang diinginkan
    }

    public function getTitle(): string | Htmlable
    {
        return __('NPL PER AO');
    }
    public static function getPluralLabel(): string
    {
        return __('NPL PER AO');
    }

    protected function getHeaderWidgets(): array
    {
        return [
            LoanWidget::class
        ];
    }

    public function mount(NonPerformingLoan $NonPerformingLoan, Request $request): void {
        $cab = auth()->user()->branch_code;
        if(empty($request->query('detail'))){
            $request = '';
        }else{
            $request = $request->query('detail');
        }

        $this->data = [
            'loan-ao' => $NonPerformingLoan->LoanAo($cab),
            'loan-ao-kol' => $NonPerformingLoan->LoanAoKolek($cab),
            'request' => $request,
        ];
    }
}
