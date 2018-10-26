<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {

            $table->increments('id')->comment('Id');
            $table->string('name', 96)->comment('Name');
            $table->string('email', 96)->comment('Email');
            $table->string('phone', 16)->comment('Phone');
            $table->text('msg')->comment('Message');
            $table->ipAddress('ip')->comment('Ip Address');    
            $table->string('user_agent')->comment('User Agent');
            $table->bigInteger('timestamp')->comment('Timestamp'); 
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
        Schema::dropIfExists('contacts');
    }
}
