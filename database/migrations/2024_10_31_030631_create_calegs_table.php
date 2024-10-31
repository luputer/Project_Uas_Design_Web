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
        Schema::create('calegs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('partai_id');
            $table->unsignedBigInteger('dapil_id');
            $table->string('nomor_urut');
            $table->string('nik')->unique();
            $table->string('nama_lengkap');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('agama');
            $table->text('alamat');
            $table->string('pekerjaan');
            $table->string('pendidikan_terakhir');
            $table->string('foto')->nullable();
            $table->string('status_verifikasi')->default('pending');
            $table->text('catatan_verifikasi')->nullable();
            $table->timestamps();

            $table->foreign('partai_id')
                ->references('id')
                ->on('partais')
                ->onDelete('cascade');

            $table->foreign('dapil_id')
                ->references('id')
                ->on('dapils')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('calegs');
    }
};
