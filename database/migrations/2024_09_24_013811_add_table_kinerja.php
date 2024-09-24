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
            $table->string('deskripsi')->nullable();
            $table->string('checklist')->nullable();
            $table->string('lampiran1')->nullable();
            $table->string('lampiran2')->nullable();
            $table->string('lampiran3')->nullable();
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
