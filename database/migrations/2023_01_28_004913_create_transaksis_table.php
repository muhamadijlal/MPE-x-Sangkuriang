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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('penanggung_jawab');
            $table->string('lokasi');
            $table->integer('total_harga');
            $table->enum('status_pengerjaan',['proses','po','selesai']);
            $table->enum('status_pembayaran',['belum_bayar','dp','lunas']);
            $table->string('perihal');
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
