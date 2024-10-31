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
        Schema::create('dokumen_calegs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('caleg_id');
            $table->string('jenis_dokumen');
            $table->string('file_path');
            $table->boolean('status_verifikasi')->default(false);
            $table->text('catatan')->nullable();
            $table->timestamps();

            $table->foreign('caleg_id')
                ->references('id')
                ->on('calegs')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('dokumen_calegs');
    }
};
