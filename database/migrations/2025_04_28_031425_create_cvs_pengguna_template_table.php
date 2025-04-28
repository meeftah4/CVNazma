<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCVSPenggunaTemplateTable extends Migration
{
    public function up()
    {
        Schema::create('cvs_pengguna_template', function (Blueprint $table) {
            $table->unsignedBigInteger('id_pengguna_cvs');
            $table->unsignedBigInteger('id_template');
            $table->timestamps();

            $table->foreign('id_pengguna_cvs')->references('id_pengguna_cvs')->on('cvs_pengguna')->onDelete('cascade');
            $table->foreign('id_template')->references('id_template')->on('template_cv')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cvs_pengguna_template');
    }
}