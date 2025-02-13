<?php

namespace App\Filament\Imports;

use App\Models\DaftarAo;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class DaftarAoImporter extends Importer
{
    protected static ?string $model = DaftarAo::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('kode')
                ->label('Kode')
                ->requiredMapping()
                ->rules(['required', 'max:20']),
            ImportColumn::make('nama_ao')
                ->label('Nama AO')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('cab')
                ->label('Cabang')
                ->requiredMapping()
                ->rules(['required', 'max:10']),
        ];
    }

    public function resolveRecord(): ?DaftarAo
    {
        // Customize the update or create logic here if needed
        return new DaftarAo();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your Daftar AO import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
