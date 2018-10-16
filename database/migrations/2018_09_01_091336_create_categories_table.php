<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id')->comment('Id');
            $table->string('name')->comment('Name');
            $table->string('slug')->comment('Slug');
            $table->tinyInteger('status')->comment('0 - Inactive, 1 - Active')->default(0);
            $table->unsignedInteger('parent_id')->comment('Parent Id')->default(0);

            //$table->unsignedTinyInteger('wallpaper_pos')->comment('Category wallpaper position home page')->nullable();
            $table->string('wallpaper_image')->comment('Wallpaper Image')->nullable();

            $table->string('page_title', 96)->comment('Page Title')->nullable();
            $table->string('meta_description', 255)->comment('Meta Description')->nullable();
            $table->string('meta_keywords', 255)->comment('Meta Keywords')->nullable();
            
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
        Schema::dropIfExists('categories');
    }
}
