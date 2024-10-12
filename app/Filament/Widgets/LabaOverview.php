<?php

namespace App\Filament\Widgets;

use App\Models\NeracaHarian;
use App\Models\Setting;
use App\Models\User;
use App\Repositories\LoanRepository;
use Carbon\Carbon;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class LabaOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $datadate = Setting::where('name', 'DATADATE')->first();
        $datadate = $datadate->value;
        $cab = auth()->user()->branch_code;

   
        $labaRecord = NeracaHarian::where('NOMOR_REKENING', '31002')
                        ->where('DATADATE', $datadate)
                        ->where('CAB', $cab)
                        ->first();

        $laba = $labaRecord->SALDO_AKHIR ?? 0; // ini adalah perubahan penghitungan laba yang sebelumnya pendapatan - beban

        $PendapatanRecord = NeracaHarian::where('NOMOR_REKENING', '40000')
                            ->where('DATADATE', $datadate)
                            ->where('CAB', $cab)
                            ->first();
        $pendapatan = $PendapatanRecord->SALDO_AKHIR ?? 0;
        
        $BebanRecord = NeracaHarian::where('NOMOR_REKENING', '50000')
                        ->where('DATADATE', $datadate)
                        ->where('CAB', $cab)
                        ->first();

        $beban = $BebanRecord->SALDO_AKHIR ?? 0;

        return [
            Stat::make('Laba Berjalan', number_format($laba, 2)) // perubahan perhitungan laba
                ->descriptionIcon('heroicon-m-banknotes', IconPosition::Before)
                ->description('Laba aktual') // Pastikan Anda mengisi chart ini jika ada datanya.
                ->color(Color::Amber),
                
            Stat::make('Pendapatan', number_format($pendapatan, 2))
                ->descriptionIcon('heroicon-m-banknotes', IconPosition::Before)
                ->description('Pendapatan Bulan Ini') // Pastikan Anda mengisi chart ini jika ada datanya.
                ->color(Color::Teal),

            Stat::make('Beban', number_format($beban, 2))
                ->descriptionIcon('heroicon-m-banknotes', IconPosition::Before)
                ->description('Beban Bulan Ini') // Pastikan Anda mengisi chart ini jika ada datanya.
                ->color(Color::Orange),
            //
        ];
    }
}
