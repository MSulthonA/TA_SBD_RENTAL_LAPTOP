<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
            $table->foreign('id_admin')->references('id_admin')->on('admin')->onDelete('cascade');
            $table->foreign('id_peminjam')->references('id_peminjam')->on('users')->onDelete('cascade');
            $table->foreign('id_laptop')->references('id_laptop')->on('laptop')->onDelete('cascade');
            $table->foreign('id_peminjaman')->references('id_peminjaman')->on('peminjaman')->onDelete('cascade');
            $table->softDeletes();
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('transaksi');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
};
