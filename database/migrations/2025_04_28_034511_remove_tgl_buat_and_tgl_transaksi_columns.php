<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveTglBuatAndTglTransaksiColumns extends Migration
{
    public function up()
    {
        Schema::table('pengguna', function (Blueprint $table) {
            $table->dropColumn('tgl_buat');
        });

        Schema::table('cvs_pengguna', function (Blueprint $table) {
            $table->dropColumn('tgl_buat');
        });

        Schema::table('template_cv', function (Blueprint $table) {
            $table->dropColumn('tgl_buat');
        });

        Schema::table('transaksi', function (Blueprint $table) {
            $table->dropColumn(['tgl_transaksi']);
        });
    }

    public function down()
    {
        Schema::table('pengguna', function (Blueprint $table) {
            $table->timestamp('tgl_buat')->nullable();
        });

        Schema::table('cvs_pengguna', function (Blueprint $table) {
            $table->timestamp('tgl_buat')->nullable();
        });

        Schema::table('template_cv', function (Blueprint $table) {
            $table->timestamp('tgl_buat')->nullable();
        });

        Schema::table('transaksi', function (Blueprint $table) {
            $table->timestamp('tgl_transaksi')->nullable();
        });
    }
}