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

        $laba = NeracaHarian::where('NOMOR_REKENING', 31002)->first();
        if(!empty($laba)){
            $laba = $laba->SALDO_AKHIR;
        }else{
            $laba = 0;
        }

        return [
            Stat::make('Laba Berjalan', number_format($laba, 2))
                ->descriptionIcon('heroicon-m-banknotes', IconPosition::Before)
                ->description('Laba aktual') // Pastikan Anda mengisi chart ini jika ada datanya.
                ->color(Color::Amber),
            //
        ];
    }
}
