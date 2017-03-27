<?php

namespace App;

use App\Checkpoint;
use App\Classroom;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $fillable = [
    	'name',
    	'prefix',
    	'public',
    	'classroom_id',
    ];

    public function classroom()
    {
    	return $this->belongsTo(Classroom::class);
    }

    public function checkpoints()
    {
    	return $this->hasMany(Checkpoint::class);
    }
}
