<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DaftarAoResource\Pages;
use App\Filament\Resources\DaftarAoResource\RelationManagers;
use App\Models\DaftarAo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use App\Filament\Imports\DaftarAoImporter;
use Filament\Tables\Actions\ImportAction;

class DaftarAoResource extends Resource
{
    protected static ?string $model = DaftarAo::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('kode')
                    ->required()
                    ->maxLength(20),
                Forms\Components\TextInput::make('nama_ao')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('cab')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->headerActions(
                auth()->user()->role === 'admin'
                    ? [
                        ImportAction::make()
                            ->importer(DaftarAoImporter::class)
                    ] 
                    : []
            )
            ->columns([
                Tables\Columns\TextColumn::make('kode')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_ao')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cab')
                    ->searchable(),
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
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListDaftarAos::route('/'),
            'create' => Pages\CreateDaftarAo::route('/create'),
            'edit' => Pages\EditDaftarAo::route('/{record}/edit'),
        ];
    }
}
