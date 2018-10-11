<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWishlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wishlists', function (Blueprint $table) {
            $table->increments('id')->comment('Id');
            $table->unsignedInteger('user_id')->comment('User Id');
            $table->unsignedInteger('pid')->comment('Product Id');
            $table->unsignedInteger('unix_timestamp')->comment('Unix Timestamp');
            $table->string('ip_address')->comment('Ip Address')->nullable();
            $table->string('random_string', 32)->comment('Random String');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('pid')->references('id')->on('products');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wishlists');
    }
}
