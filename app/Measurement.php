<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{
    //
    protected $table     = 'measurements';
    protected $fillable  = ['name', 'display_order', 'status'];
}
