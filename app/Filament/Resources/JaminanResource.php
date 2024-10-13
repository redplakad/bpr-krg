<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JaminanResource\Pages;
use App\Filament\Resources\JaminanResource\RelationManagers;
use App\Models\Jaminan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JaminanResource extends Resource
{
    protected static ?string $model = Jaminan::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';

    protected static ?string $navigationGroup = 'Manajemen Kredit';

        
    public static function getNavigationLabel(): string
    {
        return 'Data Jaminan'; // Ganti dengan title navigasi yang diinginkan
    }

    public function getTitle(): string | Htmlable
    {
        return __('Data Jaminan');
    }

    public static function getLabel(): string
    {
        return __('Data Jaminan');
    }

    public static function getPluralLabel(): string
    {
        return __('Data Jaminan');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('no_rekening')
                    ->required()
                    ->maxLength(20)
                    ->label('Nomor Loan'),
                Forms\Components\TextInput::make('nama_debitur')
                    ->required()
                    ->label('Nama Debitur')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama_pemilik')
                    ->required()
                    ->label('Nama Pemilik Jaminan')
                    ->maxLength(255),
                Select::make('jenis_jaminan')
                    ->searchable()
                    ->options([
                        'Tanah' => [
                            'Sertifikat' => 'Sertifikat Tanah',
                            'AJB' => 'Akta Jual Beli',
                            'HGB' => 'Hak Guna Pakai',
                            'GIRIK' => 'Girik',
                        ],
                        'Kendaraan' => [
                            'SEPEDA MOTOR' => 'Sepeda Motor',
                            'MOBIL' => 'Mobil',
                            'ANGKUTAN UMUM' => 'ANGKUTAN UMUM',
                            'TRUK/BUS' => 'Truk / Bus'
                        ],
                        'Lainnya' => [
                            'SK' => 'SK Golongan/Berkala',
                            'JAMSOSTEK' => 'Jamsostek',
                            'IJAZAH' => 'Ijazah',
                            'TRUK/BUS' => 'Truk / Bus',
                            'CASH COLLATERAL' => 'Tabungan / Deposito'
                        ],
                    ])->label('Jenis Jaminan'),
                Forms\Components\FileUpload::make('foto_jaminan1')
                    ->image()
                    ->label('Foto Jaminan')
                    ->downloadable(),
                Forms\Components\FileUpload::make('foto_jaminan2')
                    ->image()
                    ->label('Foto Jaminan')
                    ->downloadable(),
                Forms\Components\FileUpload::make('foto_jaminan3')
                    ->image()
                    ->label('Foto Jaminan')
                    ->downloadable(),
                Forms\Components\FileUpload::make('foto_jaminan4')
                    ->image()
                    ->label('Foto Jaminan')
                    ->downloadable(),
                Forms\Components\FileUpload::make('foto_jaminan5')
                    ->image()
                    ->label('Foto Jaminan')
                    ->downloadable(),
                Forms\Components\Hidden::make('user_id'),
                Forms\Components\Hidden::make('cab'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('no_rekening')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_debitur')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_pemilik')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('jenis_jaminan')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('foto_jaminan1')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('foto_jaminan2')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('foto_jaminan3')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('foto_jaminan4')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('foto_jaminan5')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user_id')
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
            'index' => Pages\ListJaminans::route('/'),
            'create' => Pages\CreateJaminan::route('/create'),
            'edit' => Pages\EditJaminan::route('/{record}/edit'),
        ];
    }
}
