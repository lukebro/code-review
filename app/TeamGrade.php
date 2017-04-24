<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamGrade extends Model
{
    protected $fillable = [
    	'team_id',
    	'checkpoint_id',
    	'assignment_id',
    	'comments',
    ];
}
