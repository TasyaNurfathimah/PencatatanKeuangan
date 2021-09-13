<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->increments('id_trans');
            $table->date('tanggal_trans');
            $table->enum('jenis_trans',['pengeluaran','pemasukan']);
            $table->integer('id_kat_fk');
            $table->integer('nominal_trans');
            $table->text('ket_trans');
            $table->integer('bank_trans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
