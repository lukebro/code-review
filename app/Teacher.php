<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
	protected $primaryKey = 'user_id';

	public function user()
	{
		return $this->hasOne(User::class, 'id');
	}

	public function classrooms()
    {
        return $this->hasMany(Classroom::class, 'user_id')->latest();
    }
}
