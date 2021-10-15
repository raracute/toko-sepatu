<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSepatuModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_sepatu', function (Blueprint $table) {
            $table->id('id_sepatu');
            $table->string('merek');
            $table->string('kode_sepatu');
            $table->string('ukuran');
            $table->string('kategori');
            $table->string('harga');
            $table->string('jumlah_Stok');
            $table->string('gambar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sepatu_models');
    }
}
