<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

use App\Repositories\LoanRepository;

class produkKreditChart extends ChartWidget
{
    protected static ?string $heading = 'Pencairan Per Produk';

    protected LoanRepository $loanRepository;

    public function __construct()
    {
        // Inisialisasi LoanRepository di konstruktor
        $this->loanRepository = new LoanRepository();
    }

    protected function getData(): array
    {
        return [
            //
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
