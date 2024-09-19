<?php

namespace App\Filament\Imports;

use App\Models\MisLoan;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class MisLoanImporter extends Importer
{
    protected static ?string $model = MisLoan::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('DATADATE')
                ->label('DATADATE')
                ->rules(['max:50']),
            ImportColumn::make('CAB')
                ->label('CAB')
                ->rules(['max:3']),
            ImportColumn::make('NOMOR_REKENING')
                ->label('NOMOR_REKENING')
                ->rules(['max:12']),
            ImportColumn::make('NO_CIF')
                ->label('NO_CIF')
                ->rules(['max:10']),
            ImportColumn::make('NAMA_NASABAH')
                ->label('NAMA_NASABAH')
                ->rules(['max:50']),
            ImportColumn::make('ALAMAT')
                ->label('ALAMAT')
                ->rules(['max:100']),
            ImportColumn::make('KODE_KOLEK')
                ->label('KODE_KOLEK')
                ->boolean()
                ->rules(['boolean']),
            ImportColumn::make('JML_HRI_PKK')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('JML_HARI_BGA')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('JML_HARI_TUNGGAKAN')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('KD_PRD')
                ->boolean()
                ->rules(['boolean']),
            ImportColumn::make('KET_KD_PRD')
                ->rules(['max:50']),
            ImportColumn::make('NOMOR_PERJANJIAN')
                ->rules(['max:50']),
            ImportColumn::make('NO_AKSEP')
                ->rules(['max:50']),
            ImportColumn::make('TGL_PK')
                ->rules(['max:8']),
            ImportColumn::make('TGL_AWAL_FAS')
                ->rules(['max:8']),
            ImportColumn::make('TGL_AKHIR_FAS')
                ->rules(['max:8']),
            ImportColumn::make('TGL_AWAL_AKSEP')
                ->rules(['max:8']),
            ImportColumn::make('TGL_AKH_AKSEP')
                ->rules(['max:8']),
            ImportColumn::make('PLAFOND_AWAL')
                ->numeric()
                ->rules(['numeric']),
            ImportColumn::make('BAKI_DEBET')
                ->numeric()
                ->rules(['numeric']),
            ImportColumn::make('LONGGAR_TARIK')
                ->numeric()
                ->rules(['numeric']),
            ImportColumn::make('BGA')
                ->rules(['max:8']),
            ImportColumn::make('TUNGGAKAN_POKOK')
                ->numeric()
                ->rules(['numeric']),
            ImportColumn::make('TUNGGAKAN_BUNGA')
                ->numeric()
                ->rules(['numeric']),
            ImportColumn::make('BGA_JTH_TEMPO')
                ->numeric()
                ->rules(['numeric']),
            ImportColumn::make('SMP_TGL_CADANG')
                ->rules(['max:8']),
            ImportColumn::make('NILAI_CADANG')
                ->numeric()
                ->rules(['numeric']),
            ImportColumn::make('ANGSURAN_TOTAL')
                ->numeric()
                ->rules(['numeric']),
            ImportColumn::make('TGL_PROSES_DENDA')
                ->rules(['max:8']),
            ImportColumn::make('AKUM_DENDA_PKK')
                ->numeric()
                ->rules(['numeric']),
            ImportColumn::make('AKUM_DENDA_BGA')
                ->numeric()
                ->rules(['numeric']),
            ImportColumn::make('PRD_AMORT')
                ->boolean()
                ->rules(['boolean']),
            ImportColumn::make('PRDK_AMORT')
                ->boolean()
                ->rules(['boolean']),
            ImportColumn::make('FLAG')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('TGL_AMORT')
                ->rules(['max:8']),
            ImportColumn::make('NILAI_BIAYA_PROVISI')
                ->numeric()
                ->rules(['numeric']),
            ImportColumn::make('AMORTISASI_PRD')
                ->numeric()
                ->rules(['numeric']),
            ImportColumn::make('SISA_AMORT_PROV')
                ->numeric()
                ->rules(['numeric']),
            ImportColumn::make('TAGIH_BIAYA_PROV')
                ->numeric()
                ->rules(['numeric']),
            ImportColumn::make('NILAI_BIAYA_ADM')
                ->numeric()
                ->rules(['numeric']),
            ImportColumn::make('AMORT_ADM_PRD')
                ->numeric()
                ->rules(['numeric']),
            ImportColumn::make('SISA_AMORT_ADM')
                ->numeric()
                ->rules(['numeric']),
            ImportColumn::make('BYA_ASURANSI')
                ->numeric()
                ->rules(['numeric']),
            ImportColumn::make('BYA_NOTARIS')
                ->numeric()
                ->rules(['numeric']),
            ImportColumn::make('PKK_JATEM')
                ->numeric()
                ->rules(['numeric']),
            ImportColumn::make('BGA_JATEM')
                ->numeric()
                ->rules(['numeric']),
            ImportColumn::make('REK_BYR_PKK_BGA')
                ->rules(['max:12']),
            ImportColumn::make('SLD_REK_DB')
                ->numeric()
                ->rules(['numeric']),
            ImportColumn::make('KD_INSTANSI')
                ->rules(['max:10']),
            ImportColumn::make('NM_INSTANSI')
                ->rules(['max:100']),
            ImportColumn::make('REK_BENDAHARA')
                ->rules(['max:12']),
            ImportColumn::make('SFT_KRD')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('GOL_KRD')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('JNS_KRD')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('SKTR_EKNM')
                ->rules(['max:6']),
            ImportColumn::make('ORNTS')
                ->boolean()
                ->rules(['boolean']),
            ImportColumn::make('NO_HP')
                ->rules(['max:30']),
            ImportColumn::make('POKOK_PINJAMAN')
                ->numeric()
                ->rules(['numeric']),
            ImportColumn::make('TITIPAN_EFEKTIF')
                ->numeric()
                ->rules(['numeric']),
            ImportColumn::make('JANGKA_WAKTU')
                ->rules(['max:5']),
            ImportColumn::make('REK_PENCAIRAN')
                ->rules(['max:12']),
            ImportColumn::make('NO_REKENING_LAMA')
                ->rules(['max:12']),
            ImportColumn::make('CIF_LAMA')
                ->rules(['max:12']),
            ImportColumn::make('KODE_GROUP')
                ->rules(['max:3']),
            ImportColumn::make('KET_GROUP')
                ->rules(['max:3']),
            ImportColumn::make('TGL_LAHIR')
                ->rules(['max:8']),
            ImportColumn::make('NIK')
                ->rules(['max:20']),
            ImportColumn::make('NIP')
                ->rules(['max:20']),
            ImportColumn::make('NILAI_BYA_TRANS')
                ->numeric()
                ->rules(['numeric']),
            ImportColumn::make('AMORT_TRANS_PRD')
                ->numeric()
                ->rules(['numeric']),
            ImportColumn::make('SISA_AMORT_TRANS')
                ->numeric()
                ->rules(['numeric']),
            ImportColumn::make('AO')
                ->rules(['max:50']),
            ImportColumn::make('CAB_REK')
                ->rules(['max:3']),
            ImportColumn::make('KELURAHAN')
                ->rules(['max:50']),
            ImportColumn::make('KECAMATAN')
                ->rules(['max:50']),
            ImportColumn::make('CADANGAN_PPAP')
                ->numeric()
                ->rules(['numeric']),
            ImportColumn::make('TEMPAT_BEKERJA')
                ->rules(['max:50']),
            ImportColumn::make('TGL_AKHIR_BAYAR')
                ->rules(['max:8']),
            ImportColumn::make('PIHAK_TERKAIT')
                ->rules(['max:20']),
            ImportColumn::make('JENIS_JAMINAN')
                ->rules(['max:3']),
            ImportColumn::make('NILAI_LEGALITAS')
                ->numeric()
                ->rules(['numeric']),
            ImportColumn::make('RESTRUKTUR_KE')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('TGL_VALID_KOLEK')
                ->rules(['max:8']),
            ImportColumn::make('TGL_MACET')
                ->rules(['max:8']),
        ];
    }

    public function resolveRecord(): ?MisLoan
    {
        // return MisLoan::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new MisLoan();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your mis loan import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
