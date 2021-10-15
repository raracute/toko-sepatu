<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTbTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_transaksi', function (Blueprint $table) {
            $table->dropColumn('totalharga');
        });

        Schema::table('tb_transaksi', function (Blueprint $table) {
            $table->integer('totalharga');
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
            $table->dropColumn('totalharga');
        });

        Schema::table('tb_transaksi', function (Blueprint $table) {
            $table->string('totalharga');
        });
    }
}
