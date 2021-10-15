<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTbSepatu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_sepatu', function (Blueprint $table) {
            $table->integer('jumlah_stok')->change();
        });
        Schema::table('tb_sepatu', function (Blueprint $table) {
            $table->string('jumlah_stok')->change();
        });
