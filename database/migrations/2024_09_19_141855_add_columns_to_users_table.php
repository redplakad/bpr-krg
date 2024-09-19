<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('user')->after('password'); // Menambahkan kolom role dengan default 'user'
            $table->string('avatar')->nullable()->after('role'); // Menambahkan kolom avatar
            $table->string('branch_code')->nullable()->after('avatar'); // Menambahkan kolom branch_code
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
