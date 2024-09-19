<?php

namespace App\Filament\Widgets;

use App\Repositories\LoanRepository;
use Carbon\Carbon;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class LoanWidget extends BaseWidget
{
    protected LoanRepository $loanRepository;

    public function __construct()
    {
        // Inisialisasi LoanRepository di konstruktor
        $this->loanRepository = new LoanRepository();
    }

    protected function getStats(): array
    {
        $cab = '007';
        $datadate = '20240918';

        // Menggunakan metode dari LoanRepository
        $bakidebet = $this->loanRepository->getTotalLoan($cab, $datadate);
        $pencairanPerDay = $this->loanRepository->getDailyDisbursement($cab, $datadate);
        $bakiPerDay = [];  // Anda perlu mengimplementasikan getDailyBalance di LoanRepository.
        
        // Anda bisa menambahkan logika untuk mendapatkan baki per hari jika diperlukan.
        
        $pencairan = $this->loanRepository->getMonthlyDisbursement();
        $nonperform = $this->loanRepository->getNonPerformingLoans($cab, $datadate);

        return [
            Stat::make('Bakidebet Kredit', number_format($bakidebet, 2))
                ->descriptionIcon('heroicon-m-banknotes', IconPosition::Before)
                ->description('Bakidebet kredit secara keseluruhan')
                ->chart($bakiPerDay)  // Pastikan Anda mengisi chart ini jika ada datanya.
                ->color(Color::Amber),

            Stat::make('Pencairan Kredit', number_format($pencairan, 2))
                ->descriptionIcon('heroicon-m-credit-card', IconPosition::Before)
                ->description('Pencairan kredit bulan ini')
                ->chart($pencairanPerDay)
                ->color('success'),

            Stat::make('Non Performing Loan', number_format($nonperform, 2))
                ->descriptionIcon('heroicon-m-credit-card', IconPosition::Before)
                ->description('Non Performing Loan')
                ->color(Color::Rose)
        ];
    }
}