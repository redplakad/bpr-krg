<?php

namespace App\Filament\Imports;

use App\Models\NeracaHarian;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class NeracaHarianImporter extends Importer
{
    protected static ?string $model = NeracaHarian::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('DATADATE')
                ->label('DATADATE')
                ->requiredMapping()
                ->rules(['required', 'max:10']),
            ImportColumn::make('CAB')
                ->label('CAB')
                ->requiredMapping()
                ->rules(['required', 'max:10']),
            ImportColumn::make('NOMOR_REKENING')
                ->label('NOMOR_REKENING')
                ->requiredMapping()
                ->rules(['required', 'max:20']),
            ImportColumn::make('NAMA_REKENING')
                ->label('NAMA_REKENING')
                ->requiredMapping()
                ->rules(['required', 'max:100']),
            ImportColumn::make('LVL')
                ->label('LVL')
                ->requiredMapping()
                ->numeric()
                ->rules(['required', 'numeric']),
            ImportColumn::make('SALDO_AWAL')
                ->label('SALDO_AWAL')
                ->requiredMapping()
                ->numeric()
                ->rules(['required', 'numeric']),
            ImportColumn::make('MUTASI_DEBET')
                ->label('MUTASI_DEBET')
                ->requiredMapping()
                ->numeric()
                ->rules(['required', 'numeric']),
            ImportColumn::make('MUTASI_KREDIT')
                ->label('MUTASI_KREDIT')
                ->requiredMapping()
                ->numeric()
                ->rules(['required', 'numeric']),
            ImportColumn::make('SALDO_AKHIR')
                ->label('SALDO_AKHIR')
                ->requiredMapping()
                ->numeric()
                ->rules(['required', 'numeric']),
        ];
    }
    

    public function resolveRecord(): ?NeracaHarian
    {
        // return NeracaHarian::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new NeracaHarian();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your neraca harian import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
