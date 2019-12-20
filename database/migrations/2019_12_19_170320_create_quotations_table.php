<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //TABLE-COTIZACION
        /*
        codigo varchar(15) NOT NULL,
        fecha_registro date NOT NULL,
        monto decimal(10,2) NOT NULL,
        reservaId bigint NOT NULL,
        personalId bigint NOT NULL,
        estado boolean NOT NULL,
        */
        Schema::create('quotations', function (Blueprint $table) {
            $table->integer('id')->unsigned()->primary();
            $table->string('codigo');
            $table->date('fecha_registro');
            $table->double('monto');    
            $table->boolean('estado');
            $table->integer('reservaid')->unsigned();
            $table->integer('personalid')->unsigned();
            $table->timestamps();
            $table->foreign('reservaid')->references('id')->on('reservations');
            $table->foreign('personalid')->references('id')->on('personals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotations');
    }
}
