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
        Schema::create('daftarao', function (Blueprint $table) {
            $table->id();
            $table->string('kode',20); // Tanggal data
            $table->string('nama_ao'); // Cabang
            $table->string('cab'); // Nomor rekening
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        
        Schema::dropIfExists('daftarao');
    }
};
