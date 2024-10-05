<?php

namespace App\Filament\Widgets;

use App\Models\MisLoan;
use App\Models\Setting;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Infolists\Components\Card;
use Filament\Infolists\Components\TextEntry;
use Filament\Widgets\InfolistWidget;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Infolist;
use App\Filament\Resources\MisLoanResource\Pages;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;

use Carbon\Carbon;

class PencairanTable extends BaseWidget implements form
{

    protected static ?string $model = MisLoan::class;

    protected static ?string $heading = 'Daftar Pencairan Bln ini';

    public function table(Table $table): Table
    {
        $datadate = Setting::where('name', 'DATADATE')->first();
        $cab = auth()->user()->branch_code;

        $currentYear = Carbon::createFromFormat('Ymd', $datadate->value)->year;
        $currentMonth = Carbon::createFromFormat('Ymd', $datadate->value)->month;

        return $table
            ->query(
                MisLoan::where('DATADATE', $datadate->value)
                    ->where('CAB', $cab)
                    ->whereYear('TGL_PK', $currentYear) // Filter by current year
                    ->whereMonth('TGL_PK', $currentMonth),
            )
            ->columns([
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
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('NOMOR_REKENING'),
                TextEntry::make('NAMA_NASABAH'),
                TextEntry::make('POKOK_PINJAMAN'),
                TextEntry::make('TGL_AWAL_FAS')
                    ->dateTime(),
            ])
            ->columns(1)
            ->inlineLabel();
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMisLoans::route('/'),
            'create' => Pages\CreateMisLoan::route('/create'),
            'view' => Pages\ViewMisLoan::route('/{record}')
        ];
    }
}
