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
        //
        Schema::create('users', function (Blueprint $table) {
            $table->id("id_peminjam");
            $table->string('username_peminjam',30);
            $table->string('nama_peminjam',30);
            $table->string('alamat_peminjam');
            $table->string('password');
            $table->string('nomor_hp',15);
            $table->enum('jenis_kelamin_peminjam', ['Laki-Laki', 'Perempuan']);
            $table->rememberToken();
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
        Schema::dropIfExists('peminjam');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
};
