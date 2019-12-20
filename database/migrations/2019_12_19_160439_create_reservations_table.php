<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->integer('id')->unsigned()->primary();
            $table->string('codigo');
            $table->date('fecha_registro');
            $table->date('fecha_reservada');
            $table->boolean('estado');
            $table->integer('clienteid')->unsigned();
            $table->timestamps();
            $table->foreign('clienteid')->references('id')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
