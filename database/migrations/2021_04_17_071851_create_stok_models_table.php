<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStokModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_stok', function (Blueprint $table) {
            $table->id('id_stok');
            $table->string('kode_sepatu');
            $table->string('jumlah_Stok');
            $table->string('jumlah_stok_min');
            $table->string('stok_harga_modal');
            $table->string('stok_harga_jual');
            $table->string('stok_terjual');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_stok');
    }
}
