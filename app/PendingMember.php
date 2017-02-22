<?php

namespace App;

use App\Classroom;
use App\User;
use Illuminate\Database\Eloquent\Model;

class PendingMember extends Model
{
	public $fillable = [
		'classroom_id',
		'user_id',
	];

	public function classroom()
	{
		return $this->belongsTo(Classroom::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
