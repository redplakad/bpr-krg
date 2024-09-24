<?php

namespace App\Filament\Resources;

use App\Models\Survey;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Hidden;
use App\Filament\Resources\SurveyResource\Pages;
use Illuminate\Contracts\Support\Htmlable;

class SurveyResource extends Resource
{
    protected static ?string $model = Survey::class;

    protected static ?string $navigationIcon = 'gmdi-map-o';
    
    protected static ?string $navigationGroup = 'Manajemen Kredit';

    public static function getNavigationLabel(): string
    {
        return 'Survey Debitur'; // Ganti dengan title navigasi yang diinginkan
    }

    public function getTitle(): string | Htmlable
    {
        return __('Survey Debitur');
    }
    public static function getPluralLabel(): string
    {
        return __('Survey Debitur');
    }

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Hidden::make('cab')->default('007')->hidden(),
            Hidden::make('user_id')->default(auth()->id())->hidden(),
            Forms\Components\TextInput::make('nama_debitur')
                ->required()
                ->label('Nama Debitur'),
            
            Forms\Components\TextInput::make('alamat')
                ->required()
                ->label('Alamat'),
            
            Select::make('status_tempat')
                ->options([
                    'sendiri' => 'Milik Sendiri',
                    'orangtua' => 'Milik Orangtua',
                    'kontrakan' => 'Sewa/Kontrakan',
                ])
                ->required()
                ->label('Status Tempat Tinggal'),            
            Forms\Components\TextInput::make('no_hp')
                ->required()
                ->label('No HP'),
            
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
            
            // Change these fields to use Image Upload
            Forms\Components\FileUpload::make('foto_ktp')
                ->required()
                ->label('Foto KTP')
                ->image() // Specify that this is an image upload
                ->nullable()->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/webp']),
            
            Forms\Components\FileUpload::make('foto_debitur')
                ->required()
                ->label('Foto Debitur')
                ->image() // Specify that this is an image upload
                ->nullable()->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/webp']),
            
            Forms\Components\FileUpload::make('foto_rumah1')
                ->label('Foto Rumah 1')
                ->image() // Specify that this is an image upload
                ->nullable()->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/webp']),
            
            Forms\Components\FileUpload::make('foto_rumah2')
                ->label('Foto Rumah 2')
                ->image() // Specify that this is an image upload
                ->nullable()->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/webp']),
            
            Forms\Components\FileUpload::make('foto_jaminan1')
                ->label('Foto Jaminan 1')
                ->image() // Specify that this is an image upload
                ->nullable()->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/webp']),
            
            Forms\Components\FileUpload::make('foto_jaminan2')
                ->label('Foto Jaminan 2')
                ->image() // Specify that this is an image upload
                ->nullable()->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/webp']),
            
            Forms\Components\TextInput::make('koordinat')
                ->required()
                ->label('Koordinat'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                        ->sortable(),
                Tables\Columns\TextColumn::make('nama_debitur')
                        ->searchable()
                        ->sortable(),
                Tables\Columns\TextColumn::make('alamat')
                        ->sortable(),
                Tables\Columns\TextColumn::make('status_tempat')
                        ->sortable(),
                Tables\Columns\TextColumn::make('no_hp')
                        ->sortable(),
                Tables\Columns\TextColumn::make('jenis_jaminan')
                        ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    protected function mutateFormDataUsing(array $data): array
    {
        // Automatically set the user_id to the currently authenticated user's ID
        $data['user_id'] = auth()->id();
        return $data;
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSurveys::route('/'),
            'create' => Pages\CreateSurvey::route('/create'),
            'edit' => Pages\EditSurvey::route('/{record}/edit'),
        ];
    }
}