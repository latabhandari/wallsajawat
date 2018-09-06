<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->increments('id');
			$table->unsignedInteger('user_id')->comment('User Id');
			$table->string('device_token')->comment('Device Token')->nullable();
			$table->string('address')->comment('Complete Address')->nullable();
			$table->string('country')->comment('Country Id')->nullable();
			$table->string('state')->comment('State Id')->nullable();	
			$table->string('city')->comment('City Id')->nullable();
			$table->string('pin')->comment('Pin Code')->nullable();
			$table->string('profile')->comment('Profile Image')->nullable();			
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
        Schema::dropIfExists('profile');
    }
}
