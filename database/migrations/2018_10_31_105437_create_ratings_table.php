<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {

            $table->increments('id')->comment('Id');

            $table->unsignedInteger('order_number')->comment('Order Number');

            $table->unsignedInteger('product_id')->comment('Product Id');

            $table->tinyInteger('rating')->unsigned()->comment('Rating');

            $table->text('review')->nullable()->comment('Review');

            $table->ipAddress('ip')->comment('Ip Address'); 

            $table->string('user_agent')->comment('User Agent');

            $table->bigInteger('timestamp')->comment('Timestamp'); 

            $table->timestamps();

            $table->foreign('order_number')->references('order_number')->on('orders');

            $table->foreign('product_id')->references('id')->on('products');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ratings');
    }
}
