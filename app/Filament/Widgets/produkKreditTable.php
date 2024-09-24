<?php

namespace App\Filament\Widgets;

use App\Models\MisLoan;
use App\Models\Setting;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables\Columns\TextColumn;
use Carbon\Carbon;

class ProdukKreditTable extends BaseWidget
{
    public function table(Table $table): Table
    {
        $datadate = Setting::where('name', 'DATADATE')->first();
        $cab = auth()->user()->branch_code;

        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->month;

        // Mengambil nilai unik KET_KD_PRD menggunakan distinct()
        $uniqueProducts = MisLoan::select('KET_KD_PRD') // Pastikan untuk hanya memilih kolom KET_KD_PRD
            ->where('DATADATE', $datadate->value)
            ->where('CAB', $cab)
            ->whereYear('TGL_PK', $currentYear) // Filter by current year
            ->whereMonth('TGL_PK', $currentMonth) // Filter by current month
            ->distinct() // Mengambil nilai unik
            ->pluck('KET_KD_PRD'); // Mengambil nilai kolom KET_KD_PRD

        return $table
            ->query(
                MisLoan::whereIn('KET_KD_PRD', $uniqueProducts) // Filter berdasarkan nilai unik KET_KD_PRD
            )
            ->columns([
                TextColumn::make('KET_KD_PRD')
                    ->label('KODE PRODUK'),
            ]);
    }
}
