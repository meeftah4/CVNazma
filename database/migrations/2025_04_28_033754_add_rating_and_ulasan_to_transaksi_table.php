<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRatingAndUlasanToTransaksiTable extends Migration
{
    public function up()
    {
        Schema::table('transaksi', function (Blueprint $table) {
            $table->integer('rating')->nullable()->after('status_transaksi'); // Kolom rating, bisa null
            $table->text('ulasan')->nullable()->after('rating'); // Kolom ulasan, bisa null
        });
    }

    public function down()
    {
        Schema::table('transaksi', function (Blueprint $table) {
            $table->dropColumn('rating');
            $table->dropColumn('ulasan');
        });
    }
}