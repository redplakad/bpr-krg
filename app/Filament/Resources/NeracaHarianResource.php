<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NeracaHarianResource\Pages;
use App\Filament\Resources\NeracaHarianResource\RelationManagers;

use App\Models\NeracaHarian;
use App\Models\Setting;
use App\Models\User;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


use App\Filament\Imports\NeracaHarianImporter;
use Filament\Tables\Actions\ImportAction;

class NeracaHarianResource extends Resource
{
    protected static ?string $model = NeracaHarian::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('DATADATE')
                    ->required()
                    ->maxLength(10)
                    ->label('DATADATE'),
                Forms\Components\TextInput::make('CAB')
                    ->required()
                    ->maxLength(10)
                    ->label('CAB'),
                Forms\Components\TextInput::make('NOMOR_REKENING')
                    ->required()
                    ->maxLength(20)
                    ->label('NOMOR_REKENING'),
                Forms\Components\TextInput::make('NAMA_REKENING')
                    ->required()
                    ->maxLength(100)
                    ->label('NAMA_REKENING'),
                Forms\Components\TextInput::make('LVL')
                    ->required()
                    ->numeric()
                    ->label('LVL'),
                Forms\Components\TextInput::make('SALDO_AWAL')
                    ->required()
                    ->numeric()
                    ->label('SALDO_AWAL'),
                Forms\Components\TextInput::make('MUTASI_DEBET')
                    ->required()
                    ->numeric()
                    ->label('MUTASI_DEBET'),
                Forms\Components\TextInput::make('MUTASI_KREDIT')
                    ->required()
                    ->numeric()
                    ->label('MUTASI_KREDIT'),
                Forms\Components\TextInput::make('SALDO_AKHIR')
                    ->required()
                    ->numeric()
                    ->label('SALDO_AKHIR'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->headerActions(
                auth()->user()->role === 'admin'
                    ? [
                        ImportAction::make()
                            ->importer(NeracaHarianImporter::class)
                    ] 
                    : []
            )
            ->columns([
                Tables\Columns\TextColumn::make('NOMOR_REKENING')
                    ->searchable()
                    ->label('NOMOR_REKENING'),
                Tables\Columns\TextColumn::make('NAMA_REKENING')
                    ->searchable()
                    ->label('NAMA_REKENING'),
                Tables\Columns\TextColumn::make('LVL')
                    ->numeric()
                    ->sortable()
                    ->label('LVL'),
                Tables\Columns\TextColumn::make('SALDO_AWAL')
                    ->numeric()
                    ->sortable()
                    ->label('SALDO_AWAL'),
                Tables\Columns\TextColumn::make('MUTASI_DEBET')
                    ->numeric()
                    ->sortable()
                    ->label('MUTASI_DEBET'),
                Tables\Columns\TextColumn::make('MUTASI_KREDIT')
                    ->numeric()
                    ->sortable()
                    ->label('MUTASI_KREDIT'),
                Tables\Columns\TextColumn::make('SALDO_AKHIR')
                    ->numeric()
                    ->sortable()
                    ->label('SALDO_AKHIR'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                //Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    //Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        $datadate = Setting::where('name', 'DATADATE')->first();
        $cab = auth()->user()->branch_code;
        return parent::getEloquentQuery()->where('DATADATE', $datadate->value)->where('CAB', $cab);
    }


    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNeracaHarians::route('/'),
            //'create' => Pages\CreateNeracaHarian::route('/create'),
            //'edit' => Pages\EditNeracaHarian::route('/{record}/edit'),
        ];
    }
}
