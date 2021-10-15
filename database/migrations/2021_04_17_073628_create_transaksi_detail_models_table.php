<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiDetailModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_transaksi_detail', function (Blueprint $table) {
            $table->id();
            $table->string('kd_Sepatu');
            $table->string('stok_id');
            $table->string('pelanggan_id');
            $table->string('harga_modal');
            $table->string('harga_jual');
            $table->string('totalharga');
            $table->string('diskon_id');
            $table->string('nominal_diskon');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_transaksi_detail');
    }
}
