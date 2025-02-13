<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RencanaBisnisResource\Pages;
use App\Filament\Resources\RencanaBisnisResource\RelationManagers;
use App\Models\RencanaBisnis;
use Filament\Support\RawJs;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RencanaBisnisResource extends Resource
{
    protected static ?string $model = RencanaBisnis::class;

    protected static ?string $navigationIcon = 'gmdi-balance';

    protected static ?string $modelLabel = 'Rencana Bisnis';

    protected static ?string $navigationGroup = 'Analisis Data';

    protected static ?string $pluralModelLabel = 'Input Rencana Bisnis';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                DatePicker::make('DATADATE')
                    ->label('DATADATE')
                    ->format('Ymd')
                    ->required(),
                TextInput::make('CAB')
                    ->label('CABANG')
                    ->default(auth()->user()->branch_code)
                    ->readOnly(),
                Select::make('KETERANGAN')
                    ->label('KETERANGAN')
                    ->options([
                        'Aset' => 'Aset',
                        'Pendapatan Operasional' => 'Pendapatan Operasional',
                        'Beban Operasional' => 'Beban Operasional',
                        'Pendapatan Non Operasional' => 'Pendapatan Non Operasional',
                        'Beban Non Operasional' => 'Beban Non Operasional',
                        'Laba' => 'Laba',
                        'Kredit' => 'Kredit',
                        'Tabungan' => 'Tabungan',
                        'Deposito' => 'Deposito'
                    ]),
                TextInput::make('NOMINAL')
                    ->label('NOMINAL')
                    ->mask(RawJs::make('$money($input)'))
                    ->stripCharacters(',')
                    ->numeric()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('DATADATE')
                    ->label('DATADATE'),
                TextColumn::make('CAB')
                    ->label('CABANG'),
                TextColumn::make('KETERANGAN')
                    ->label('KETERANGAN'),
                TextColumn::make('NOMINAL')
                    ->label('NOMINAL')
                    ->formatStateUsing(fn($state) => number_format($state, 2, ',', '.')),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->visible(fn () => auth()->user()->role === 'admin'),
                Tables\Actions\DeleteAction::make()->visible(fn () => auth()->user()->role === 'admin'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                    ->visible(fn () => auth()->user()->role === 'admin'),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageRencanaBisnis::route('/'),
        ];
    }
}
