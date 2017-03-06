<?php

namespace App;

use App\User;
use App\PendingMember;
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
}
