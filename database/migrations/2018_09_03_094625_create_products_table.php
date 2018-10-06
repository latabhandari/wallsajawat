<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {

            $table->increments('id')->comment('Id');
            $table->string('name')->comment('Name');
            $table->string('slug')->comment('Slug');
            $table->string('sku')->comment('Sku');
            $table->text('short_desc')->comment('Short Description');
            $table->longText('description')->comment('Description');
            $table->string('price', 32)->comment('Price');
            $table->unsignedInteger('roll_id')->comment('Roll Id');
            $table->unsignedSmallInteger('stock_item')->comment('Stock Item');
            $table->tinyInteger('status')->comment('0 - Inactive, 1 - Active')->default(0);
            $table->string('page_title', 96)->comment('Page Title')->nullable();
            $table->string('meta_description')->comment('Meta Description')->nullable();
            $table->string('meta_keywords')->comment('Meta Keywords')->nullable();
            $table->unsignedBigInteger('created_timestamp')->comment('Created Timestamp');
            $table->unsignedBigInteger('updated_timestamp')->comment('Updated Timestamp')->nullable();
            $table->timestamps();
            $table->index(['id', 'name']);

            $table->foreign('roll_id')->references('id')->on('dimensions');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
