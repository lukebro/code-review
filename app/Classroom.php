<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $fillable = [
    	'course',
    	'name',
    	'open',
    	'code',
    ];

    public function user()
    {
    	return $this->belongsTo('user');
    }

    public function students()
    {
        return $this->belongsToMany(User::class);
    }
}
