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
        Schema::create('kinerja', function (Blueprint $table) {
            $table->id();
            $table->string('tanggal');
            $table->string('deskripsi');
            $table->string('checklist');
            $table->string('lampiran1');
            $table->string('lampiran2');
            $table->string('lampiran3');
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('kinerja');
    }
};
