<?php

namespace App\Filament\Widgets;

use App\Models\MisLoan; // Make sure to import your model
use Closure;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

class PencairanPerBulan extends BaseWidget
{
    protected function getTableQuery(): Builder
    {
        // Get the current month
        $currentMonth = Carbon::now()->month;

        // Query MisLoan where TGL_PK is in the current month
        return MisLoan::query()
            ->whereMonth('TGL_PK', $currentMonth);
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('id')->label('ID'),
            Tables\Columns\TextColumn::make('CAB')->label('Cabang'),
            Tables\Columns\TextColumn::make('TGL_PK')->label('Tanggal PK'),
            Tables\Columns\TextColumn::make('POKOK_PINJAMAN')->label('Pokok Pinjaman'),
            // Add other columns as needed
        ];
    }
}