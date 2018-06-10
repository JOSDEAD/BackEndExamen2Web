<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventario', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->text('identificador');
            $table->text('identificadorProducto');
            $table->unsignedInteger('cantidad');
            $table->unsignedInteger('cantidadMaxima');
            $table->unsignedInteger('cantidadMinima');
            $table->boolean('gravado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventario');
    }
}
