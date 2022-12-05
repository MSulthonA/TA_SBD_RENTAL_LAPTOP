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
        //
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id("id_peminjaman");
            $table->integer('harga_peminjaman');
            $table->integer('denda');
            $table->enum('status_peminjaman', ['sedang masa peminjaman', 'selesai masa peminjaman']);
            $table->enum('status_pembayaran', ['belum dibayar', 'sudah dibayar']);
            $table->integer('lama_peminjaman');
            $table->date('tanggal_pengembalian');
            $table->date('tanggal_peminjaman');
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
        Schema::dropIfExists('peminjaman');
    }
};
