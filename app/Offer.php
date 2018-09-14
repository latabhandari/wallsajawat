<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    //
     protected $table     =  'offers';
     protected $fillable  =  ['coupon', 'type', 'discount', 'start_date', 'end_date', 'status', 'unix_timestamp'];

	 public function setCouponAttribute($value)
	    {
	        $this->attributes['coupon'] = strtoupper($value);
	    }
}
