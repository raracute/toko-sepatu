<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyTbTransaksiDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_transaksi_detail', function (Blueprint $table) {
            $table->dropColumn('kd_Sepatu');
            $table->dropColumn('stok_id');
            $table->dropColumn('pelanggan_id');
            $table->dropColumn('harga_modal');
            $table->dropColumn('harga_jual');
            $table->dropColumn('totalHarga');
            $table->dropColumn('diskon_id');
            $table->dropColumn('nominal_diskon');

            $table->bigInteger('id_transaksi')->unsigned();
            $table->bigInteger('id_sepatu')->unsigned();
            $table->integer('quantity');

            $table->foreign('id_sepatu')->references('id_sepatu')->on('tb_sepatu');
            $table->foreign('id_transaksi')->references('id_transaksi')->on('tb_transaksi')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_transaksi_detail', function (Blueprint $table) {
            $table->string('stok_id');
            $table->string('pelanggan_id');
            $table->string('harga_modal');
            $table->string('harga_jual');
            $table->string('totalHarga');
            $table->string('diskon_id');
            $table->string('nominal_diskon');

            $table->dropColumn('id_sepatu');
            $table->dropColumn('id_transaksi');
            $table->dropColumn('quantity');
        });
    }
}
