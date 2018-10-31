<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User as User;

class Rating extends Model
{
    //
    protected $fillable = [
        'order_number', 'product_id', 'user_id', 'rating', 'review', 'ip', 'user_agent', 'timestamp'
    ];

    public function user()
     {
     	return $this->belongsTo(User::class, 'user_id', 'id');
     }

}
