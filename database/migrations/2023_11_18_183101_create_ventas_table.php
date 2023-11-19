<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id('venta_id');
            $table->datetime('venta_fecha');
            $table->integer('venta_total');
            $table->unsignedBigInteger('cliente_id');
            $table->timestamps();
            
            //relaciones
            $table->foreign('cliente_id')->references('cliente_id')->on('clientes');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}
