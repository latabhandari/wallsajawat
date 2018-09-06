<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    //
    protected $table    = 'product_categories';
    protected $fillable = ['product_id', 'category_id'];
}
