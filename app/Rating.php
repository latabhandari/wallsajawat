<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    //
    protected $fillable = [
        'order_number', 'product_id', 'user_id', 'rating', 'review', 'ip', 'user_agent', 'timestamp'
    ];

}
