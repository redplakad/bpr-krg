<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KinerjaResource\Pages;
use App\Filament\Resources\KinerjaResource\RelationManagers;
use App\Models\Kinerja;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Checkbox;
use Illuminate\Contracts\Support\Htmlable;

class KinerjaResource extends Resource
{
    protected static ?string $model = Kinerja::class;

    protected static ?string $navigationIcon = 'gmdi-menu-book-tt';

    public function getTitle(): string | Htmlable
    {
        return __('Rencana Kerja');
    }

    public static function getLabel(): string
    {
        return __('Rencana Kerja');
    }

    public static function getPluralLabel(): string
    {
        return __('Rencana Kerja');
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('tanggal')
                    ->required(),
                Forms\Components\TextInput::make('deskripsi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('lampiran1')
                    ->image()
                    ->label('Lampiran Foto')
                    ->helperText('Lampirkan foto jika diperlukan'),
                Forms\Components\FileUpload::make('lampiran2')
                    ->label('Lampiran File')
                    ->helperText('Lampirkan file berupa excel, word, text jika diperlukan'),
                Checkbox::make('checklist')->inline(false)->label('Checklist')
                ->helperText('Silahkan Ceklis apabila rencana kerja sudah selesai dikerjakan'),
            ]);
    }

    protected function mutateFormDataUsing(array $data): array
    {
        // Automatically set the user_id to the currently authenticated user's ID
        $data['user_id'] = auth()->id();
        return $data;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal')
                    ->searchable(),
                Tables\Columns\TextColumn::make('deskripsi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('checklist')
                    ->searchable(),
                Tables\Columns\TextColumn::make('lampiran1')
                    ->searchable(),
                Tables\Columns\TextColumn::make('lampiran2')
                    ->searchable(),
                Tables\Columns\TextColumn::make('lampiran3')
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
            'index' => Pages\ListKinerjas::route('/'),
            'create' => Pages\CreateKinerja::route('/create'),
            'edit' => Pages\EditKinerja::route('/{record}/edit'),
        ];
    }
}
