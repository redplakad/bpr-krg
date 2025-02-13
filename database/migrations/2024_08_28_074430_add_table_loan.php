<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mis_loan', function (Blueprint $table) {
            $table->id();
            $table->string('DATADATE',50)->nullable();
            $table->string('CAB', 3)->nullable();
            $table->string('NOMOR_REKENING', 12)->nullable();
            $table->string('NO_CIF', 10)->nullable();
            $table->string('NAMA_NASABAH', 50)->nullable();
            $table->string('ALAMAT', 100)->nullable();
            $table->unsignedTinyInteger('KODE_KOLEK')->nullable(); // unsignedTinyInteger for single-byte integer
            $table->unsignedSmallInteger('JML_HRI_PKK')->nullable(); // unsignedSmallInteger for up to 2-byte integer
            $table->unsignedSmallInteger('JML_HARI_BGA')->nullable();
            $table->unsignedSmallInteger('JML_HARI_TUNGGAKAN')->nullable();
            $table->unsignedTinyInteger('KD_PRD')->nullable(); // unsignedTinyInteger for up to 2-byte integer
            $table->string('KET_KD_PRD', 50)->nullable();
            $table->string('NOMOR_PERJANJIAN', 50)->nullable();
            $table->string('NO_AKSEP', 50)->nullable();
            $table->char('TGL_PK',8)->nullable();
            $table->char('TGL_AWAL_FAS',8)->nullable();
            $table->char('TGL_AKHIR_FAS',8)->nullable();
            $table->char('TGL_AWAL_AKSEP',8)->nullable();
            $table->char('TGL_AKH_AKSEP',8)->nullable();
            $table->decimal('PLAFOND_AWAL', 30, 2)->nullable();
            $table->decimal('BAKI_DEBET', 30, 2)->nullable();
            $table->decimal('LONGGAR_TARIK', 30, 2)->nullable();
            $table->string('BGA', 8)->nullable(); // Adjusted column name
            $table->decimal('TUNGGAKAN_POKOK', 30, 2)->nullable();
            $table->decimal('TUNGGAKAN_BUNGA', 30, 2)->nullable();
            $table->decimal('BGA_JTH_TEMPO', 30, 2)->nullable();
            $table->char('SMP_TGL_CADANG',8)->nullable();
            $table->decimal('NILAI_CADANG', 30, 2)->nullable();
            $table->decimal('ANGSURAN_TOTAL', 30, 2)->nullable();
            $table->char('TGL_PROSES_DENDA',8)->nullable();
            $table->decimal('AKUM_DENDA_PKK', 30, 2)->nullable();
            $table->decimal('AKUM_DENDA_BGA', 30, 2)->nullable();
            $table->unsignedTinyInteger('PRD_AMORT')->nullable();
            $table->unsignedTinyInteger('PRDK_AMORT')->nullable();
            $table->unsignedSmallInteger('FLAG')->nullable();
            $table->char('TGL_AMORT',8)->nullable();
            $table->decimal('NILAI_BIAYA_PROVISI', 30, 2)->nullable();
            $table->decimal('AMORTISASI_PRD', 30, 2)->nullable();
            $table->decimal('SISA_AMORT_PROV', 30, 2)->nullable();
            $table->decimal('TAGIH_BIAYA_PROV', 30, 2)->nullable();
            $table->decimal('NILAI_BIAYA_ADM', 30, 2)->nullable();
            $table->decimal('AMORT_ADM_PRD', 30, 2)->nullable();
            $table->decimal('SISA_AMORT_ADM', 30, 2)->nullable();
            $table->decimal('BYA_ASURANSI', 30, 2)->nullable();
            $table->decimal('BYA_NOTARIS', 30, 2)->nullable();
            $table->decimal('PKK_JATEM', 30, 2)->nullable();
            $table->decimal('BGA_JATEM', 30, 2)->nullable();
            $table->string('REK_BYR_PKK_BGA', 12)->nullable();
            $table->decimal('SLD_REK_DB', 30, 2)->nullable();
            $table->unsignedSmallInteger('KD_INSTANSI')->nullable();
            $table->unsignedSmallInteger('NM_INSTANSI')->nullable();
            $table->string('REK_BENDAHARA', 12)->nullable();
            $table->unsignedSmallInteger('SFT_KRD')->nullable();
            $table->unsignedSmallInteger('GOL_KRD')->nullable();
            $table->unsignedSmallInteger('JNS_KRD')->nullable();
            $table->string('SKTR_EKNM', 6)->nullable();
            $table->unsignedTinyInteger('ORNTS')->nullable();
            $table->string('NO_HP', 30)->nullable();
            $table->decimal('POKOK_PINJAMAN', 30, 2)->nullable();
            $table->decimal('TITIPAN_EFEKTIF', 30, 2)->nullable();
            $table->string('JANGKA_WAKTU', 5)->nullable();
            $table->string('REK_PENCAIRAN', 12)->nullable();
            $table->string('NO_REKENING_LAMA',12)->nullable();
            $table->string('CIF_LAMA',12)->nullable();
            $table->string('KODE_GROUP', 3)->nullable();
            $table->string('KET_GROUP', 3)->nullable();
            $table->char('TGL_LAHIR',8)->nullable();
            $table->string('NIK', 20)->nullable();
            $table->string('NIP', 20)->nullable();
            $table->decimal('NILAI_BYA_TRANS', 30, 2)->nullable();
            $table->decimal('AMORT_TRANS_PRD', 30, 2)->nullable();
            $table->decimal('SISA_AMORT_TRANS', 30, 2)->nullable();
            $table->string('AO', 50)->nullable();
            $table->string('CAB_REK', 3)->nullable();
            $table->string('KELURAHAN', 50)->nullable();
            $table->string('KECAMATAN', 50)->nullable();
            $table->decimal('CADANGAN_PPAP', 30, 2)->nullable();
            $table->string('TEMPAT_BEKERJA', 50)->nullable();
            $table->char('TGL_AKHIR_BAYAR',8)->nullable();
            $table->string('PIHAK_TERKAIT', 20)->nullable();
            $table->string('JENIS_JAMINAN', 3)->nullable();
            $table->decimal('NILAI_LEGALITAS', 30, 2)->nullable();
            $table->unsignedSmallInteger('RESTRUKTUR_KE')->nullable();
            $table->char('TGL_VALID_KOLEK',8)->nullable();
            $table->char('TGL_MACET',8)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mis_loan');
    }
};