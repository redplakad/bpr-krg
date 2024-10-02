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

   
        $labaRecord = NeracaHarian::where('NOMOR_REKENING', '10100')->first();
        $laba = $labaRecord->SALDO_AKHIR ?? 10;

        return [
            Stat::make('Laba Berjalan', number_format(100000000, 2))
                ->descriptionIcon('heroicon-m-banknotes', IconPosition::Before)
                ->description('Laba aktual') // Pastikan Anda mengisi chart ini jika ada datanya.
                ->color(Color::Amber),
                
            Stat::make('Pendapatan', number_format($laba, 2))
                ->descriptionIcon('heroicon-m-banknotes', IconPosition::Before)
                ->description('Pendapatan Bulan Ini') // Pastikan Anda mengisi chart ini jika ada datanya.
                ->color(Color::Teal),

            Stat::make('Beban', number_format($laba, 2))
                ->descriptionIcon('heroicon-m-banknotes', IconPosition::Before)
                ->description('Beban Bulan Ini') // Pastikan Anda mengisi chart ini jika ada datanya.
                ->color(Color::Orange),
            //
        ];
    }
}
