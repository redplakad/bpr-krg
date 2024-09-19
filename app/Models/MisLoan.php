<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MisLoan extends Model
{
    use HasFactory;

    // Nama tabel yang terkait dengan model ini
    protected $table = 'mis_loan';

    // Kolom yang dapat diisi
    protected $fillable = [
        'DATADATE',
        'CAB',
        'NOMOR_REKENING',
        'NO_CIF',
        'NAMA_NASABAH',
        'ALAMAT',
        'KODE_KOLEK',
        'JML_HRI_PKK',
        'JML_HARI_BGA',
        'JML_HARI_TUNGGAKAN',
        'KD_PRD',
        'KET_KD_PRD',
        'NOMOR_PERJANJIAN',
        'NO_AKSEP',
        'TGL_PK',
        'TGL_AWAL_FAS',
        'TGL_AKHIR_FAS',
        'TGL_AWAL_AKSEP',
        'TGL_AKH_AKSEP',
        'PLAFOND_AWAL',
        'BAKI_DEBET',
        'LONGGAR_TARIK',
        'BGA',
        'TUNGGAKAN_POKOK',
        'TUNGGAKAN_BUNGA',
        'BGA_JTH_TEMPO',
        'SMP_TGL_CADANG',
        'NILAI_CADANG',
        'ANGSURAN_TOTAL',
        'TGL_PROSES_DENDA',
        'AKUM_DENDA_PKK',
        'AKUM_DENDA_BGA',
        'PRD_AMORT',
        'PRDK_AMORT',
        'FLAG',
        'TGL_AMORT',
        'NILAI_BIAYA_PROVISI',
        'AMORTISASI_PRD',
        'SISA_AMORT_PROV',
        'TAGIH_BIAYA_PROV',
        'NILAI_BIAYA_ADM',
        'AMORT_ADM_PRD',
        'SISA_AMORT_ADM',
        'BYA_ASURANSI',
        'BYA_NOTARIS',
        'PKK_JATEM',
        'BGA_JATEM',
        'REK_BYR_PKK_BGA',
        'SLD_REK_DB',
        'KD_INSTANSI',
        'NM_INSTANSI',
        'REK_BENDAHARA',
        'SFT_KRD',
        'GOL_KRD',
        'JNS_KRD',
        'SKTR_EKNM',
        'ORNTS',
        'NO_HP',
        'POKOK_PINJAMAN',
        'TITIPAN_EFEKTIF',
        'JANGKA_WAKTU',
        'REK_PENCAIRAN',
        'NO_REKENING_LAMA',
        'CIF_LAMA',
        'KODE_GROUP',
        'KET_GROUP',
        'TGL_LAHIR',
        'NIK',
        'NIP',
        'NILAI_BYA_TRANS',
        'AMORT_TRANS_PRD',
        'SISA_AMORT_TRANS',
        'AO',
        'CAB_REK',
        'KELURAHAN',
        'KECAMATAN',
        'CADANGAN_PPAP',
        'TEMPAT_BEKERJA',
        'TGL_AKHIR_BAYAR',
        'PIHAK_TERKAIT',
        'JENIS_JAMINAN',
        'NILAI_LEGALITAS',
        'RESTRUKTUR_KE',
        'TGL_VALID_KOLEK',
        'TGL_MACET'
    ];

    // Kolom yang disembunyikan dari array atau JSON
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}