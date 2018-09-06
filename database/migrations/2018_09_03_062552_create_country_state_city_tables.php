<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountryStateCityTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('code');
            $table->string('name');
			$table->string('phonecode');
            $table->timestamps();
        });
        Schema::create('states', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('country_id');            
            $table->timestamps();
			$table->foreign('country_id')->references('id')->on('countries');
        });
        Schema::create('cities', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('state_id');            
            $table->timestamps();
			$table->foreign('state_id')->references('id')->on('states');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::drop('countries');
       Schema::drop('states');
       Schema::drop('cities');
    }
}
