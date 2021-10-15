<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPembayaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pembayaran', function (Blueprint $table) {
            $table->id();
            $table->string('tanggal_pembayaran');
            $table->bigInteger('id_bank')->unsigned();
            $table->bigInteger('id_transaksi')->unsigned();
            $table->string('bukti_pembayaran');

            $table->foreign('id_bank')->references('id')->on('tb_bank')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('tb_pembayaran');
    }
}
