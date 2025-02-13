<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KantorCabangResource\Pages;
use App\Filament\Resources\KantorCabangResource\RelationManagers;
use App\Models\KantorCabang;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KantorCabangResource extends Resource
{
    protected static ?string $model = KantorCabang::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('kode')->label('KODE CABANG'),
                TextInput::make('nama')->label('NAMA CABANG'),
                TextInput::make('alamat')->label('ALAMAT CABANG'),
                TextInput::make('telpon')->label('INISIAL CABANG'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('kode')
                    ->label('KODE CABANG'),
                TextColumn::make('nama')
                    ->label('NAMA CABANG'),
                TextColumn::make('alamat')
                    ->label('ALAMAT CABANG'),
                TextColumn::make('telpon')
                    ->label('INISIAL CABANG'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageKantorCabangs::route('/'),
        ];
    }
}
