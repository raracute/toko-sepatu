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
<<<<<<< HEAD
            $table->integer('harga')->change();
            $table->integer('jumlah_stok')->change();
=======
            $table->dropColumn('harga');
            $table->dropColumn('jumlah_Stok');
        });

        Schema::table('tb_sepatu', function (Blueprint $table) {
            $table->integer('harga');
            $table->integer('jumlah_Stok');
>>>>>>> a7d93853c48704f2d664adf622b24a42a4684f7f
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
<<<<<<< HEAD
            $table->string('harga')->change();
            $table->string('jumlah_stok')->change();
=======
            $table->dropColumn('harga');
            $table->dropColumn('jumlah_Stok');
        });


        Schema::table('tb_sepatu', function (Blueprint $table) {
            $table->string('harga');
            $table->string('jumlah_Stok');
>>>>>>> a7d93853c48704f2d664adf622b24a42a4684f7f
        });
    }
}
