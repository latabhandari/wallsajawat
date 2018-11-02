<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id')->comment('Id');
            $table->string('name')->comment('Name');
            $table->text('permission')->comment('Permission')->nullable();
            $table->unsignedTinyInteger('status')->comment('0 - Inactive, 1- Active')->default(1);
            $table->integer('created_at_timestamp')->comment('Created TimeStamp')->nullable();
            $table->integer('updated_at_timestamp')->comment('Updated TimeStamp')->nullable();
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
        Schema::dropIfExists('roles');
    }
}
