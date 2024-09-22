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
        Schema::create('penagihan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_debitur')->constrained('mis_loan')->onDelete('cascade');
            $table->string('nama_debitur');
            $table->decimal('bakidebet', 30, 2);
            $table->decimal('tunggakan_pokok', 30, 2);
            $table->decimal('tunggakan_bunga', 30, 2);
            $table->string('petugas_ao');
            $table->text('hasil_kunjungan')->nullable();
            $table->string('status_bayar')->default('belum bayar');
            $table->string('foto1')->nullable();
            $table->string('foto2')->nullable();
            $table->string('foto3')->nullable();
            $table->string('foto4')->nullable();
            $table->string('koordinat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penagihans');
    }
};
