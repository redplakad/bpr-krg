<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Filament\Widgets\LoanWidget;

use Illuminate\Contracts\Support\Htmlable;

class LoanRisk extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.loan-risk';    

    protected static ?string $navigationGroup = 'Manajemen Risiko';

    public static function getNavigationLabel(): string
    {
        return 'NPL PER PRODUK'; // Ganti dengan title navigasi yang diinginkan
    }

    public function getTitle(): string | Htmlable
    {
        return __('NPL PER PRODUK');
    }
    public static function getPluralLabel(): string
    {
        return __('NPL PER PRODUK');
    }

    protected function getHeaderWidgets(): array
    {
        return [
            LoanWidget::class
        ];
    }
}
