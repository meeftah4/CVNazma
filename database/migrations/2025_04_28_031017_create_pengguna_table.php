<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenggunaTable extends Migration
{
    public function up()
    {
        Schema::create('pengguna', function (Blueprint $table) {
            $table->id('id_pengguna');
            $table->string('email');
            $table->string('password');
            $table->string('nama');
            $table->string('alamat');
            $table->string('link_profil');
            $table->string('no_telepon');
            $table->text('bio');
            $table->string('gambar_profil');
            $table->timestamp('tgl_buat');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengguna');
    }
}