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
        Schema::table('calegs', function (Blueprint $table) {
            $table->string('jenis_kelamin', 20)->change(); // Ubah panjang kolom menjadi 20 atau sesuai kebutuhan
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('calegs', function (Blueprint $table) {
            $table->string('jenis_kelamin', 10)->change(); // Kembalikan ke panjang semula jika diperlukan
        });
    }
};
