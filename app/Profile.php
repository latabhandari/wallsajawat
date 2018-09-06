<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User as User;
use App\Cities as Cities;
use App\States as States;

class Profile extends Model
{
    //
	protected $table    = 'profile';
	protected $fillable = ['device_token', 'user_id'];

  public function user()
       {
          return $this->belongsTo(User::class, 'user_id', 'id');
       }	

	public function city()
       {
       	  return $this->belongsTo(Cities::class, 'city', 'id');
       }

 /* public function state()
       {
       	  return $this->belongsTo(States::class, 'state', 'id');
       }
	*/
}
