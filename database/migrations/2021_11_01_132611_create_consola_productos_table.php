<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsolaProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consola_productos', function (Blueprint $table) {
            $table->id();
            $table->integer('id_producto');
            $table->string('id_consola');
            $table->string('imagen');

            $table->foreign('id_produto')->references('id')->on('productos');
            $table->foreign('id_consola')->references('id_consola')->on('consola');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consola_productososA');
    }
}
