<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dimension extends Model
{
    //
    protected $table    = 'dimensions';
	
	protected $fillable = ['id', 'name', 'width', 'height', 'created_at_timestamp', 'updated_at_timestamp'];
}
