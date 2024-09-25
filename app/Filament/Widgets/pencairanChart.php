<?php

namespace App\Filament\Widgets;

use App\Repositories\LoanRepository;
use App\Models\MisLoan;
use App\Models\Setting;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class pencairanChart extends ChartWidget
{
    protected static ?string $heading = 'Pencairan Selama Setahun';

    protected LoanRepository $loanRepository;

    protected static string $color = 'info';

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
        $pencairanPerBulan = $this->loanRepository->getPencairanPerBulan($cab, $datadate);

        return [
            'datasets' => [
                [
                    'label' => 'Pencairan Kredit Tahun Ini',
                    'data' => $pencairanPerBulan,
                    'fill' => true,
                    'tension' => 0.3
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
