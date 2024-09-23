<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Filament\Resources\SettingResource\RelationManagers;
use App\Models\Setting;
use App\Models\MisLoan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-m-cog-8-tooth';

    protected static ?string $navigationGroup = 'Pengaturan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Select::make('value')
                ->label('Data Date')
                ->searchable() // Menambahkan fitur pencarian
                ->getSearchResultsUsing(fn (string $search): array => 
                    // Filter berdasarkan DATADATE dan ambil nilai unik
                    \App\Models\MisLoan::where('DATADATE', 'like', "%{$search}%")
                        ->distinct('DATADATE') // Ambil nilai unik di kolom DATADATE
                        ->get()
                        ->mapWithKeys(fn ($item) => [
                            $item->DATADATE => $item->DATADATE // Gabungkan nilai unik dengan dirinya sendiri
                        ])
                        ->toArray()
                ),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('value'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
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
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}
