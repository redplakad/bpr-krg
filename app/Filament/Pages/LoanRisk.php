<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;


use App\Models\MisLoan;
use App\Models\Setting;
use App\Models\User;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use App\Filament\Resources\MisLoanResource\Pages;
use App\Filament\Resources\MisLoanResource\RelationManagers;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use App\Filament\Widgets\LoanWidget;
use Illuminate\Contracts\Support\Htmlable;
use App\Filament\Imports\MisLoanImporter;


use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\ImportAction;

class LoanRisk extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.loan-risk';    

    protected static ?string $navigationGroup = 'Manajemen Risiko';

    public static function getNavigationLabel(): string
    {
        return 'NPL PER PRODUK'; // Ganti dengan title navigasi yang diinginkan
    }

    public function getTitle(): string | Htmlable
    {
        return __('NPL PER PRODUK');
    }
    public static function getPluralLabel(): string
    {
        return __('NPL PER PRODUK');
    }

    protected function getHeaderWidgets(): array
    {
        return [
            LoanWidget::class
        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->headerActions(
                auth()->id() === 2 
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
}
