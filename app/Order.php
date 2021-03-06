<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\OrderProducts as OrderProducts;

class Order extends Model
{
    //
    protected $table    = 'orders';
    protected $fillable = ['order_number', 'user_id', 'coupon', 'discount', 'total_amount', 'payable_amount', 'ip_address', 'user_agent', 'unix_timestamp', 'shipping_address'];

    public function user()
       {
          return $this->belongsTo(User::class, 'user_id', 'id');
       }	
    public function products()
	    {
	        return $this->hasMany(OrderProducts::class, 'order_id', 'id');
	    }
}
