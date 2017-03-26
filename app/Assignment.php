<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $fillable = [
    	'name',
    	'prefix',
    	'public',
    	'classroom_id',
    ];
}
