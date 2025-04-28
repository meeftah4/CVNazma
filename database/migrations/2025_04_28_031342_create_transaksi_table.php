<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->unsignedBigInteger('id_pengguna_cvs');
            $table->string('tipe_pembayaran');
            $table->timestamp('tgl_transaksi');
            $table->string('id_order');
            $table->decimal('nominal', 15, 2);
            $table->string('fraud_status');
            $table->string('status_transaksi');
            $table->timestamps();

            $table->foreign('id_pengguna_cvs')->references('id_pengguna_cvs')->on('cvs_pengguna')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}