<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table    = 'orders';
    protected $fillable = ['order_number', 'user_id', 'coupon', 'discount', 'total_amount', 'payable_amount', 'ip_address', 'user_agent', 'unix_timestamp', 'shipping_address'];
}
