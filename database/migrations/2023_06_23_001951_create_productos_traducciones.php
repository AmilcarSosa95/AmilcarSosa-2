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
        Schema::create('productos_traducciones', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_producto');
            $table->string('nombre');
            $table->string('descripcion_corta');
            $table->string('descripcion_larga')->nullable();
            $table->string('url')->unique();
            $table->string('idioma');
            $table->foreign('id_producto')->references('id')->on('producto');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos_traducciones');
    }
};
