<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
    
				$table->increments('id');			
			    $table->string('name')->comment('Name')->nullable();
                $table->string('email')->unique()->comment('Email');
                $table->string('password')->comment('Password')->nullable();
                $table->string('mobile')->comment('Mobile')->nullable();

                $table->enum('provider', ['0', '1', '2'])->comment('0 - Site, 1 - Google, 2 - Facebook')->default('0');
                $table->string('provider_id')->comment('Provider Id')->nullable();

                $table->unsignedTinyInteger('role_id')->comment('0 - User, 1 - Admin, 2 - ..., ... etc')->default(0);
                $table->unsignedTinyInteger('added_by_admin')->comment('0 - Not added by admin, 1 - Added by admin')->default(0);
                $table->unsignedInteger('unix_timestamp')->comment('Unix Timestamp');
                $table->unsignedInteger('last_login')->comment('Last Login Timestamp')->default(0);
                $table->string('ip_address')->comment('Ip Address')->nullable();
                $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
