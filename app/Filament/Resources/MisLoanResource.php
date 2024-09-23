<?php

namespace App\Filament\Resources;


use App\Models\MisLoan;
use App\Models\Setting;
use App\Models\User;
use App\Filament\Resources\MisLoanResource\Pages;
use App\Filament\Resources\MisLoanResource\RelationManagers;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Imports\MisLoanImporter;
use Filament\Tables\Actions\ImportAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Contracts\Support\Htmlable;

class MisLoanResource extends Resource
{
    protected static ?string $model = MisLoan::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';

    protected static ?string $navigationGroup = 'Manajemen Kredit';
    
    public static function getNavigationLabel(): string
    {
        return 'Nominatif Kredit'; // Ganti dengan title navigasi yang diinginkan
    }

    public function getTitle(): string | Htmlable
    {
        return __('Nominatif Kredit');
    }

    public static function getLabel(): string
    {
        return __('Nominatif Kredit');
    }

    public static function getPluralLabel(): string
    {
        return __('Nominatif Kredit');
    }

    public function team()
    {
        return $this->belongsTo(Team::class); // Menentukan relasi ke model Team
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->headerActions(
                auth()->user()->role === 'admin'
                    ? [
                        ImportAction::make()
                            ->importer(MisLoanImporter::class)
                    ] 
                    : []
            )
            ->columns([
                //
                TextColumn::make('NOMOR_REKENING')->label('Nomor Rekening')
                        ->searchable()
                        ->sortable(),
                TextColumn::make('NAMA_NASABAH')->label('Nama Nasabah')
                        ->searchable(),
                TextColumn::make('KODE_KOLEK')->label('Kol')
                        ->sortable(),
                TextColumn::make('POKOK_PINJAMAN')->label('Bakidebet')
                        ->formatStateUsing(fn($state) => number_format($state, 2, ',', '.')) // Format angka dengan pemisah ribuan
                        ->sortable(),
                TextColumn::make('TUNGGAKAN_POKOK')->label('T Pokok')
                        ->formatStateUsing(fn($state) => number_format($state, 2, ',', '.')) // Format angka dengan pemisah ribuan
                        ->sortable(),
                TextColumn::make('TUNGGAKAN_BUNGA')->label('T Bunga')
                        ->formatStateUsing(fn($state) => number_format($state, 2, ',', '.')) // Format angka dengan pemisah ribuan
                        ->sortable(),
                TextColumn::make('ANGSURAN_TOTAL')->label('Angsuran')
                        ->formatStateUsing(fn($state) => number_format($state, 2, ',', '.')) // Format angka dengan pemisah ribuan
                        ->sortable(),
                TextColumn::make('NO_HP')->label('Nomor HP'),
            ])
            ->filters([
                //
            ])
            ->actions([
                //Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->visible(fn () => auth()->id() === 2), // Kondisi hanya untuk user dengan ID 2
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
            'index' => Pages\ListMisLoans::route('/'),
            'create' => Pages\CreateMisLoan::route('/create'),
            //'edit' => Pages\EditMisLoan::route('/{record}/edit'),
            'view' => Pages\ViewMisLoan::route('/{record}')
        ];
    }
}
