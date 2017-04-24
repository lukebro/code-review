<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentGrade extends Model
{
    protected $fillable = [
    	'grade',
    	'user_id',
    	'checkpoint_id',
    	'assignment_id',
    	'comments',
    ];
}
