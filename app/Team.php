<?php

namespace App;

use App\Assignment;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
    	'name',
        'slug',
    	'assignment_id'
    ];

    public function users()
    {
    	return $this->belongsToMany(User::class);
    }

    public function assignment()
    {
    	return $this->belongsTo(Assignment::class);
    }
}
