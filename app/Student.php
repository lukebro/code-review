<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	protected $primaryKey = 'user_id';

	public function user()
	{
		return $this->hasOne(User::class, 'id');
	}

	public function classrooms()
    {
        return $this->belongsToMany(Classroom::class, 'classroom_user', 'user_id', 'classroom_id')->latest();
    }
}
