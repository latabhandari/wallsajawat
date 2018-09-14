<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{
    //
    protected $table     = 'measurements';
    protected $fillable  = ['name', 'square_feet_value', 'display_order', 'status'];
}
