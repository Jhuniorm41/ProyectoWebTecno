<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('code');
            $table->string('sale_code');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('type_product_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('type_product_id')->references('id')->on('type_products');
            $table->foreign('client_id')->references('id')->on('clients');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
