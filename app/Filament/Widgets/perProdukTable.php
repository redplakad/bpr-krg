<?php

namespace App\Filament\Widgets;

use App\Models\MisLoan;
use App\Models\Setting;

use App\Filament\Resources\MisLoanResource\Pages;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;

use Carbon\Carbon;

class perProdukTable extends BaseWidget
{
    protected static ?string $heading = 'Daftar Peluang Kredit';

    public function table(Table $table): Table
    {    
        $datadate = Setting::where('name', 'DATADATE')->first();
        $cab = auth()->user()->branch_code;

        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->month;

        return $table
            ->query(
                MisLoan::where('DATADATE', $datadate->value)
                    ->where('KODE_KOLEK', 1)
                    ->where('TUNGGAKAN_POKOK','>',0)
                    ->where('TUNGGAKAN_POKOK','<',600000)
                    ->where('TUNGGAKAN_BUNGA','>',0)
                    ->where('TUNGGAKAN_BUNGA','<',600000)
                    ->where('CAB', $cab)
            )
            ->columns([
                //
                TextColumn::make('NAMA_NASABAH')
                    ->label('NAMA DEBITUR')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('KODE_KOLEK')
                    ->label('KOL')
                    ->sortable(),
                TextColumn::make('TUNGGAKAN_POKOK')
                    ->formatStateUsing(fn($state) => number_format($state, 0, ',', '.'))
                    ->label('T_POKOK'),
                TextColumn::make('TUNGGAKAN_BUNGA')
                    ->formatStateUsing(fn($state) => number_format($state, 0, ',', '.'))
                    ->label('T_BUNGA'),
            ])
            ->actions([
                //Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->filters([
            ]);

    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMisLoans::route('/'),
            'create' => Pages\CreateMisLoan::route('/create'),
            //'edit' => Pages\EditMisLoan::route('/{record}/edit'),
            'view' => Pages\ViewMisLoan::route('/{record}')
        ];
    }
}
