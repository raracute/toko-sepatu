<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;

class ModifyTbTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_transaksi', function (Blueprint $table) {
            $table->dropColumn('merek_sepatu');

            $table->string('tanggal_transaksi');
            $table->tinyInteger('status')->comment('1 menunggu pembayaran, 2 pembayaran berhasil, 3 barang dikemas, 4 barang dikirim, 5 pesanan dibatalkan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_transaksi', function (Blueprint $table) {
            $table->string('merek_sepatu');

            $table->dropColumn('tanggal_transaksi');
            $table->dropColumn('status');
        });
    }
}
