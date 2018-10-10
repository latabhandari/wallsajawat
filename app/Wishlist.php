<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    //
    protected $table    = 'wishlists';
	
	protected $fillable = ['id', 'user_id', 'pid', 'unix_timestamp', 'ip_address'];
}
