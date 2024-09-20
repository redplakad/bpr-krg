<?php

namespace App\Filament\Widgets;

use App\Repositories\LoanRepository;
use App\Models\MisLoan;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class pencairanChart2 extends ChartWidget
{
    protected static ?string $heading = 'Pencairan Kredit';

    protected LoanRepository $loanRepository;

    public function __construct()
    {
        // Inisialisasi LoanRepository di konstruktor
        $this->loanRepository = new LoanRepository();
    }

    protected function getData(): array
    {
        $cab = '007';
        $datadate = '20240918';

        // Menggunakan metode dari LoanRepository
        $bakidebet = $this->loanRepository->getTotalLoan($cab, $datadate);
        $pencairanPerTanggal = $this->loanRepository->getDailyDisbursement($cab, $datadate);

        return [
            'datasets' => [
                [
                    'label' => 'Pencairan Kredit Tahun Ini',
                    'data' => $pencairanPerTanggal,
                ],
            ],
            'labels' => [],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
