<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PenagihanResource\Pages;
use App\Filament\Resources\PenagihanResource\RelationManagers;
use App\Models\Penagihan;
use App\Models\User;
use App\Models\MisLoan;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Illuminate\Contracts\Support\Htmlable;


class PenagihanResource extends Resource
{
    protected static ?string $model = Penagihan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Manajemen Kredit';

    public static function getNavigationLabel(): string
    {
        return 'Penagihan Kredit'; // Ganti dengan title navigasi yang diinginkan
    }

    public function getTitle(): string | Htmlable
    {
        return __('Penagihan Kredit');
    }
    public static function getPluralLabel(): string
    {
        return __('Penagihan Kredit');
    }

    public static function form(Form $form): Form
    {
        $datadate = Setting::where('name', 'DATADATE')->first();
        return $form
            ->schema([
                //
                Select::make('id_debitur')
                ->label('Debitur')
                ->searchable()  // Menambahkan fitur pencarian
                ->getSearchResultsUsing(fn (string $search): array => 
                    \App\Models\MisLoan::where('DATADATE', $datadate->value)
                        ->where('NAMA_NASABAH', 'like', "%{$search}%")
                        ->limit(20)
                        ->get()
                        ->mapWithKeys(fn ($item) => [
                            $item->id => "{$item->NOMOR_REKENING} | {$item->NAMA_NASABAH} [$item->ALAMAT]" // Gabungkan NAMA_NASABAH dan CIF
                        ])
                        ->toArray()
                ),
                TextInput::make('nama_debitur')
                    ->label('Nama Debitur')
                    ->required(),
                Textarea::make('hasil_kunjungan')
                    ->label('Hasil Kunjungan')
                    ->nullable(),
                TextInput::make('koordinat')
                        ->label('Koordinat')
                        ->nullable(),
                Select::make('petugas_ao')
                    ->label('Petugas AO')
                    ->multiple()  // Untuk memungkinkan pilihan ganda
                    ->searchable()  // Menambahkan fitur pencarian
                    ->getSearchResultsUsing(fn (string $search): array => 
                        \App\Models\User::where('name', 'like', "%{$search}%")
                            ->limit(50)
                            ->pluck('name', 'id')
                            ->toArray()
                    )
                    ->getOptionLabelsUsing(fn (array $values): array => 
                        \App\Models\User::whereIn('id', $values)
                            ->pluck('name', 'id')
                            ->toArray()
                ),
                FileUpload::make('foto1')
                    ->label('Foto 1')
                    ->image()
                    ->directory('penagihan/foto')
                    ->nullable(),
                FileUpload::make('foto2')
                    ->label('Foto 2')
                    ->image()
                    ->directory('penagihan/foto')
                    ->nullable(),
                FileUpload::make('foto3')
                    ->label('Foto 3')
                    ->image()
                    ->directory('penagihan/foto')
                    ->nullable(),
                FileUpload::make('foto4')
                    ->label('Foto 4')
                    ->image()
                    ->directory('penagihan/foto')
                    ->nullable(),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
        ->schema([
            Infolists\Components\TextEntry::make('nama_debitur'),
            Infolists\Components\ImageEntry::make('foto1')
                ->columnSpanFull(),
        ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                //TextColumn::make('id_debitur')->label('ID Debitur'),
                TextColumn::make('nama_debitur')->label('Nama Debitur'),
                /*extColumn::make('bakidebet')->label('Baki Debet')
                    ->formatStateUsing(fn($state) => number_format($state, 2, ',', '.')) // Format angka dengan pemisah ribuan
                    ->sortable(),
                //TextColumn::make('tunggakan_pokok')->label('Tunggakan Pokok')
                    ->formatStateUsing(fn($state) => number_format($state, 2, ',', '.')) // Format angka dengan pemisah ribuan
                    ->sortable(),
                //TextColumn::make('tunggakan_bunga')->label('Tunggakan Bunga')
                    ->formatStateUsing(fn($state) => number_format($state, 2, ',', '.')) // Format angka dengan pemisah ribuan
                    ->sortable(),
                TextColumn::make('status_bayar')
                    ->color(fn (string $state): string => match ($state) {
                        'belum bayar' => 'warning',
                        'sudah bayar' => 'success',
                    }),
                    */
                ImageColumn::make('foto1')->label('foto1'),
                //ImageColumn::make('foto1')->label('foto2'),
                //ImageColumn::make('foto1')->label('foto3'),
                //ImageColumn::make('foto1')->label('foto4'),
                TextColumn::make('koordinat')->label('Koordinat'),
                //TextColumn::make('created_at')->label('Dibuat Pada')->dateTime(),
                //TextColumn::make('updated_at')->label('Diperbarui Pada')->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListPenagihans::route('/'),
            'create' => Pages\CreatePenagihan::route('/create'),
            'edit' => Pages\EditPenagihan::route('/{record}/edit'),
            'view' => Pages\ViewPenagihan::route('/{record}/view'),
        ];
    }
}
