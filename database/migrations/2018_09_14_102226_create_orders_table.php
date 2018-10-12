<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {

            $table->increments('id')->comment('Id');

            $table->unsignedInteger('order_number')->comment('Order Number');

            $table->unsignedInteger('user_id')->comment('User Id');

            $table->string('coupon')->comment('Coupon')->nullable();

            $table->string('discount')->comment('Discount')->nullable();
            
            $table->string('total_amount')->comment('Total Amount (Products Total)');

            $table->longText('shipping_address')->comment('Shipping Address');

            $table->string('payable_amount')->comment('Payable Amount - (Total Amount - Discount Applied)');

            $table->ipAddress('ip_address')->comment('Ip Address');

            $table->string('user_agent')->comment('User Agent');

            $table->unsignedInteger('unix_timestamp')->comment('Unix Timestamp');

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');

            $table->index(['order_number']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
