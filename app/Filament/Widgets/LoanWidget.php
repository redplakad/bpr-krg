<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use Filament\Support\Colors\Color;
use App\Models\MisLoan;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class LoanWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $cab = '007';
        $datadate = '20240918';
        $bakidebet = number_format(MisLoan::where('CAB', $cab)->where('DATADATE', $datadate)->sum('POKOK_PINJAMAN')
        ,2);

        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->month;
        $currentDay = Carbon::now()->day;

        // Membuat rentang tanggal untuk bulan ini (dari tanggal 1 sampai dengan hari ini)
        $startDate = Carbon::createFromFormat('Y-m-d', "{$currentYear}-{$currentMonth}-01");
        $endDate = Carbon::createFromFormat('Y-m-d', "{$currentYear}-{$currentMonth}-{$currentDay}");

        // Array untuk menyimpan data per hari
        $pencairanPerDay = [];

        // Iterasi melalui setiap hari dalam rentang tanggal
        for ($date = $startDate; $date->lessThanOrEqualTo($endDate); $date->addDay()) {
            // Format tanggal ke dalam format yang sesuai dengan TGL_PK
            $formattedDate = $date->format('Ymd');

            // Mengambil data untuk tanggal tertentu
            $loansForTheDay = MisLoan::where('CAB', $cab)
                                    ->where('DATADATE', $datadate)
                                    ->where('TGL_PK', $formattedDate)->sum('POKOK_PINJAMAN');

            // Menyimpan hasil ke dalam array, menggunakan tanggal sebagai kunci
            $pencairanPerDay[$formattedDate] = $loansForTheDay;
        }

        // array untuk menyimpan data perhari
        $bakiPerDay = [];
        for ($date = $startDate; $date->lessThanOrEqualTo($endDate); $date->addDay()) {
            // Format tanggal ke dalam format yang sesuai dengan TGL_PK
            $formattedDate = $date->format('Ymd');

            // Mengambil data untuk tanggal tertentu
            $bakiForTheDay = MisLoan::where('CAB', $cab)
                                    ->where('DATADATE', $formattedDate)
                                    ->sum('POKOK_PINJAMAN');

            // Menyimpan hasil ke dalam array, menggunakan tanggal sebagai kunci
            $bakiPerDay[$formattedDate] = $bakiForTheDay;
        }



        // Membuat rentang tanggal untuk bulan ini
        $startDate = Carbon::createFromFormat('Y-m-d', "{$currentYear}-{$currentMonth}-01")->format('Ymd');
        $endDate = Carbon::createFromFormat('Y-m-d', "{$currentYear}-{$currentMonth}-" . Carbon::now()->daysInMonth)->format('Ymd');

        // Mengambil data dari tabel Loan
        $pencairan = number_format(MisLoan::whereBetween('TGL_PK', [$startDate, $endDate])->sum('POKOK_PINJAMAN'), 2);

        // Mengambil data dari table loan khusus untuk NPL
        $nonperform = number_format(MisLoan::where('CAB', $cab)->where('DATADATE', $datadate)->where('KODE_KOLEK',1)->sum('POKOK_PINJAMAN'), 2);

        return [
            //
            Stat::make('Bakidebet Kredit', $bakidebet)
            ->descriptionIcon('heroicon-m-banknotes', IconPosition::Before)
                ->description('Bakidebet kredit secara keseluruhan')
                ->chart($bakiPerDay)
                ->color(Color::Amber),
            
            Stat::make('Pencairan Kredit', $pencairan)
                ->descriptionIcon('heroicon-m-credit-card', IconPosition::Before)
                ->description('Pencairan kredit bulan ini')
                ->chart($pencairanPerDay)
                ->color('success'),
            Stat::make('Non Performing Loan', $nonperform)
                ->descriptionIcon('heroicon-m-credit-card', IconPosition::Before)
                ->description('Non Performing Loan')
                ->color(Color::Rose)
        ];
    }
}
