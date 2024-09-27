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
        Schema::create('neraca_harian', function (Blueprint $table) {
            $table->id();
            $table->string('DATADATE',10); // Tanggal data
            $table->string('CAB', 10); // Cabang
            $table->string('NOMOR_REKENING', 20); // Nomor rekening
            $table->string('NAMA_REKENING', 100); // Nama rekening
            $table->integer('LVL'); // Level rekening
            $table->decimal('SALDO_AWAL', 20, 2); // Saldo awal
            $table->decimal('MUTASI_DEBET', 20, 2); // Mutasi debet
            $table->decimal('MUTASI_KREDIT', 20, 2); // Mutasi kredit
            $table->decimal('SALDO_AKHIR', 20, 2); // Saldo akhir
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('neraca_harian');
    }
};
