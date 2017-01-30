<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class School extends Model
{
	use SoftDeletes;
	
    protected $fillable = [
    	'name'
    ];

    public function users()
    {
    	 return $this->hasMany(User::class);
    } 
    
}
