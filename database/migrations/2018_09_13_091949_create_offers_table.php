<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->increments('id')->comment('Id');

            $table->string('coupon')->comment('Coupon');
            $table->unsignedTinyInteger('type')->comment('1 - %, 2 - Rs');
            $table->string('discount')->comment('Discount');
            $table->unsignedBigInteger('start_date')->comment('Start date');
            $table->unsignedBigInteger('end_date')->comment('End date');    
            $table->unsignedTinyInteger('status')->comment('0 - Inactive, 1- Active');
            $table->unsignedBigInteger('unix_timestamp')->comment('Timestamp'); 

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
        Schema::dropIfExists('offers');
    }
}
