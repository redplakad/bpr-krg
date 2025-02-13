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
        Schema::create('surveys', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('cab'); // Name of the debtor
            $table->string('nama_debitur'); // Name of the debtor
            $table->string('alamat'); // Address
            $table->string('status_tempat'); // Status of the place
            $table->string('no_hp'); // Phone number
            $table->string('jenis_jaminan'); // Type of collateral
            $table->string('foto_ktp')->nullable(); // KTP photo
            $table->string('foto_debitur')->nullable(); // Debtor's photo
            $table->string('foto_rumah1')->nullable(); // House photo 1
            $table->string('foto_rumah2')->nullable(); // House photo 2
            $table->string('foto_jaminan1')->nullable(); // Collateral photo 1
            $table->string('foto_jaminan2')->nullable(); // Collateral photo 2
            $table->string('koordinat'); // Coordinates
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surveys');
    }
};
