<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('discount');
            $table->date('date_start');
            $table->date('date_finish');
            $table->unsignedBigInteger('type_service_id');
            $table->unsignedBigInteger('type_product_id');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('type_service_id')->references('id')->on('type_services');
            $table->foreign('type_product_id')->references('id')->on('type_products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promotions');
    }
}
