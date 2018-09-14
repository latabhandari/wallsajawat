<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeasurementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('measurements', function (Blueprint $table) {
            $table->increments('id')->comment('Id');
            $table->string('name')->comment('Name');
            $table->string('square_feet_value')->comment('Measurement in Square Feet, for eg: 1 Square Foot = 144 Square Inch');
            $table->unsignedTinyInteger('display_order')->comment('Display Order')->default(0);
            $table->unsignedTinyInteger('status')->comment('Status')->default(0);
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
        Schema::dropIfExists('measurements');
    }
}
