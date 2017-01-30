<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'name', 'email', 'git_token', 'type', 'avatar_url', 'school_id',
    ];

    public function scopeTeachers($query)
    {
    	return $query->where('type', 'teacher');
    }

    public function scopeStudents($query)
    {
    	return $query->where('type', 'student');
    }

    public function isSetup()
    {
    	return ! is_null($this->type);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
