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
            $table->bigIncrements('id');
            $table->string('subtotal');
            $table->unsignedBigInteger('type_service_id');
            $table->unsignedBigInteger('quotation_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('type_service_id')->references('id')->on('type_services');
            $table->foreign('quotation_id')->references('id')->on('quotations');
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
