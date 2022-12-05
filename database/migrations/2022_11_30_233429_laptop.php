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
        Schema::create('laptop', function (Blueprint $table) {
            $table->id("id_laptop");
            $table->string('nama_laptop',30);
            $table->string('tipe_laptop',20);
            $table->string('merek_laptop',20);
            $table->integer('harga_laptop');
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
        Schema::dropIfExists('laptop');
    }
};
