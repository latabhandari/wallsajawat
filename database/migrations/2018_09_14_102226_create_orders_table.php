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

            $table->unsignedInteger('order_id')->comment('Order Id');

            $table->unsignedInteger('user_id')->comment('User Id');

            $table->string('coupon')->comment('Coupon')->nullable();

            $table->string('discount')->comment('Discount')->nullable();
            
            $table->string('sub_total')->comment('Sub Total (Cart Total)');

            $table->string('amount_paid')->comment('Amount Paid - (Sub Total - Discount)');

            $table->ipAddress('ip_address')->comment('Ip Address');

            $table->string('user_agent')->comment('User Agent');

            $table->unsignedInteger('unix_timestamp')->comment('Unix Timestamp');

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');

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
