<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKurirModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_kurir', function (Blueprint $table) {
            $table->id('id_kurir');
            $table->string('no_kendaraan_kurir');
            $table->string('perusahaan_kurir');
            $table->string('tipe_kurir');
            $table->string('nama_kurir');
            $table->string('notelp_kurir');
            $table->string('status_kurir');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_kurir');
    }
}
