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
        Schema::create('rencana_bisnis', function (Blueprint $table) {
            $table->id();
            $table->date('DATADATE'); // Kolom untuk menyimpan tanggal
            $table->string('CAB'); // Kolom untuk menyimpan nama cabang
            $table->text('KETERANGAN')->nullable(); // Kolom untuk menyimpan keterangan
            $table->decimal('NOMINAL', 15, 2); // Kolom untuk menyimpan nominal dengan 2 desimal
            $table->timestamps(); // Kolom untuk menyimpan informasi waktu pembuatan dan pembaruan
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rencana_bisnis');
    }
};
