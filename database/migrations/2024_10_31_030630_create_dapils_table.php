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
        Schema::create('dapils', function (Blueprint $table) {
            $table->id();
            $table->string('nama_dapil')->nullable();
            $table->string('wilayah_cakupan')->nullable();
            $table->integer('jumlah_kursi')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dapils');
    }
};
