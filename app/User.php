<?php

namespace App;

use App\PendingMember;
use App\Team;
use Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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

    public function role()
    {
        return $this->hasOne($this->type);
    }

    public function pending()
    {
        return $this->hasMany(PendingMember::class);
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }

    public function scopeTeachers($query)
    {
    	return $query->where('type', Teacher::class);
    }

    public function scopeStudents($query)
    {
    	return $query->where('type', Student::class);
    }

    public function isSetup()
    {
    	return ! is_null($this->type);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function getViewAttribute()
    {
        list($namespace, $class) = explode('\\', $this->type);

        return strtolower($class);
    }

    public function isTeacher()
    {
        return $this->type == Teacher::class;
    }

    public function isStudent()
    {
        return $this->type == Student::class;
    }

    public function hasTeam(Assignment $assignment)
    {
        foreach ($this->teams as $team) {
            if ($team->assignment_id == $assignment->id) {
                return true;
            }
        }

        return false;
    }
}
