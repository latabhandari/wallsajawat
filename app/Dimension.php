<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dimension extends Model
{
    //
    protected $table    = 'dimensions';
	
	protected $fillable = ['id', 'name', 'created_at_timestamp', 'updated_at_timestamp'];
}
