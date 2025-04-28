<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplateCVTable extends Migration
{
    public function up()
    {
        Schema::create('template_cv', function (Blueprint $table) {
            $table->id('id_template');
            $table->string('nama');
            $table->timestamp('tgl_buat');
            $table->string('template_gratis');
            $table->string('preview_url');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('template_cv');
    }
}