<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table    = 'products';
    protected $fillable = ['name', 'sku', 'slug', 'short_desc', 'description', 'price', 'status', 'page_title', 'meta_description', 'meta_keywords', 'created_timestamp', 'updated_timestamp', 'stock_item', 'roll_id'];
}