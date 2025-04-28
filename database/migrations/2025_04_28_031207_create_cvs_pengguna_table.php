<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCVSPenggunaTable extends Migration
{
    public function up()
    {
        Schema::create('cvs_pengguna', function (Blueprint $table) {
            $table->id('id_pengguna_cvs');
            $table->unsignedBigInteger('id_pengguna');
            $table->string('status_pembayaran');
            $table->string('judul');
            $table->timestamp('tgl_buat');
            $table->text('konten');
            $table->timestamps();

            $table->foreign('id_pengguna')->references('id_pengguna')->on('pengguna')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cvs_pengguna');
    }
}