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
        Schema::create('partais', function (Blueprint $table) {
            $table->id();
            $table->string('nama_partai');
            $table->string('nomor_urut');
            $table->string('logo')->nullable();
            $table->text('alamat_kantor');
            $table->string('ketua_partai');
            $table->string('sekretaris_partai');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('partais');
    }
};
