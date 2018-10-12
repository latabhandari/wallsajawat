<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {

            $table->increments('id')->comment('Id');

            $table->unsignedInteger('order_id')->comment('Order Id');

            $table->unsignedInteger('product_id')->comment('Product Id');

            $table->unsignedInteger('unix_timestamp')->comment('Unix Timestamp');

            $table->foreign('order_id')->references('id')->on('orders');

            $table->foreign('product_id')->references('id')->on('orders');

            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_products');
    }
}
