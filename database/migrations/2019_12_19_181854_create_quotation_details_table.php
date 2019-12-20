<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation_details', function (Blueprint $table) {
            $table->integer('id')->unsigned()->primary();
            $table->boolean('estado');
            $table->double('subtotal');
            $table->integer('cotizacionid')->unsigned();
            $table->integer('tipoproductoid')->unsigned();
            $table->integer('tiposervicioid')->unsigned();
            $table->timestamps();
            $table->foreign('cotizacionid')->references('id')->on('quotations');
            $table->foreign('tipoproductoid')->references('id')->on('type_products');
            $table->foreign('tiposervicioid')->references('id')->on('type_services');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotation_details');
    }
}
