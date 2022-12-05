<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id("id_transaksi");
            $table->unsignedBigInteger('id_admin');
            $table->unsignedBigInteger('id_peminjam');
            $table->unsignedBigInteger('id_laptop');
            $table->unsignedBigInteger('id_peminjaman');
            $table->foreign('id_admin')->references('id_admin')->on('admin');
            $table->foreign('id_peminjam')->references('id_peminjam')->on('peminjam');
            $table->foreign('id_laptop')->references('id_laptop')->on('laptop');
            $table->foreign('id_peminjaman')->references('id_peminjaman')->on('peminjaman');
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
        //
    }
};
