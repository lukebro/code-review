<?php

namespace App;

use App\Assignment;
use App\PendingMember;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $fillable = [
        'name',
    	'token',
    ];

    public function user()
    {
    	return $this->belongsTo('user');
    }

    public function students()
    {
        return $this->belongsToMany(User::class);
    }

    public function pendings()
    {
    	return $this->hasMany(PendingMember::class);
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    public function getUrlAttribute()
    {
        return url('/classrooms/join/' . $this->token);
    }
}
