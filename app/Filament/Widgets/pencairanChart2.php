<?php

namespace App\Filament\Widgets;

use App\Repositories\LoanRepository;
use App\Models\MisLoan;
use App\Models\Setting;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class pencairanChart2 extends ChartWidget
{
    protected static ?string $heading = 'Pencairan Dalam Sebulan';

    protected LoanRepository $loanRepository;

    public function __construct()
    {
        // Inisialisasi LoanRepository di konstruktor
        $this->loanRepository = new LoanRepository();
    }

    protected function getData(): array
    {
        $datadate = Setting::where('name', 'DATADATE')->first();
        $datadate = $datadate->value;
        $cab = auth()->user()->branch_code;

        // Menggunakan metode dari LoanRepository
        $bakidebet = $this->loanRepository->getTotalLoan($cab, $datadate);
        $pencairanPerBulan = $this->loanRepository->getPencairanPerBulan($cab, $datadate);

        // Menggunakan metode dari LoanRepository
        $bakidebet = $this->loanRepository->getTotalLoan($cab, $datadate);
        $pencairanPerTanggal = $this->loanRepository->getDailyDisbursement($cab, $datadate);

        return [
            'datasets' => [
                [
                    'label' => 'Pencairan Kredit Bulan Ini',
                    'data' => $pencairanPerTanggal,
                    'fill' => true,
                    'tension' => 0.2,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
