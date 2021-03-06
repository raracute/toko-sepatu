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
            $table->dropColumn('harga');
            $table->dropColumn('jumlah_Stok');
        });

        Schema::table('tb_sepatu', function (Blueprint $table) {
            $table->integer('harga');
            $table->integer('jumlah_Stok');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_sepatu', function (Blueprint $table) {
            $table->dropColumn('harga');
            $table->dropColumn('jumlah_Stok');
        });


        Schema::table('tb_sepatu', function (Blueprint $table) {
            $table->string('harga');
            $table->string('jumlah_Stok');
        });
    }
}
