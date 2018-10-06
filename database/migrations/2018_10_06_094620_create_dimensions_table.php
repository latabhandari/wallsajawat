<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDimensionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dimensions', function (Blueprint $table) {
            $table->increments('id')->comment('Id');

            $table->string('name')->comment('Name');
            $table->string('width')->comment('Width (Square Feet)');
            $table->string('height')->comment('Height (Square Feet)');
            $table->integer('created_at_timestamp')->comment('Created TimeStamp')->nullable();
            $table->integer('updated_at_timestamp')->comment('Updated TimeStamp')->nullable();

            $table->softDeletes();

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
        Schema::dropIfExists('dimensions');
    }
}
