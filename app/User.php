<?php

namespace App;

//Custom for app
use Laravel\Passport\HasApiTokens;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Profile as Profile;
use App\Cities as Cities;
use App\Roles as Roles;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'verified', 'provider', 'provider_id', 'mobile','email_token', 'unix_timestamp', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','email_token'
    ];

    public function profile()
      {
          return $this->hasOne(Profile::class, 'user_id', 'id');
      } 

    public function role()
       {
          return $this->belongsTo(Roles::class, 'role_id');
       }    
}
