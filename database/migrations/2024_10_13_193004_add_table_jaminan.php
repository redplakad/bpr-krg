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
        //
        Schema::create('jaminan', function (Blueprint $table) {
            $table->id();
            $table->string('no_rekening',20); // Tanggal data
            $table->string('nama_debitur'); // Cabang
            $table->string('nama_pemilik'); // Nomor rekening
            $table->string('jenis_jaminan', 100); // Nama rekening
            $table->string('foto_jaminan1'); // Nama rekening
            $table->string('foto_jaminan2'); // Nama rekening
            $table->string('foto_jaminan3'); // Nama rekening
            $table->string('foto_jaminan4'); // Nama rekening
            $table->string('foto_jaminan5'); // Nama rekening
            $table->string('user_id'); // Nama rekening
            $table->string('cab'); // Nama rekening
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        
        Schema::dropIfExists('jaminan');
    }
};
