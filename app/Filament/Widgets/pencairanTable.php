<?php

namespace App\Filament\Widgets;

use App\Models\MisLoan;
use App\Models\Setting;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;

use Carbon\Carbon;

class pencairanTable extends BaseWidget
{
    protected static ?string $model = MisLoan::class;

    protected static ?string $heading = 'Daftar Pencairan Bln ini';

    public function table(Table $table): Table
    {
        $datadate = Setting::where('name', 'DATADATE')->first();
        $cab = auth()->user()->branch_code;

        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->month;

        return $table
            ->query(
                MisLoan::where('DATADATE', $datadate->value)
                    ->where('CAB', $cab)
                    ->whereYear('TGL_PK', $currentYear) // Filter by current year
                    ->whereMonth('TGL_PK', $currentMonth),
            )
            ->columns([
                // ...
                TextColumn::make('NOMOR_REKENING')
                    ->label('NO REK')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('NAMA_NASABAH')
                    ->label('NAMA DEBITUR')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('PLAFOND_AWAL')
                    ->formatStateUsing(fn($state) => number_format($state, 0, ',', '.'))
                    ->label('PLAFOND')
                    ->sortable(),
                TextColumn::make('TGL_PK')
                    ->label('TGL_PK'),
            ])
            ->filters([
            ]);
    }
}
