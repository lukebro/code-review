<?php

namespace App;

use App\Assignment;
use Illuminate\Database\Eloquent\Concerns\belongsTo;
use Illuminate\Database\Eloquent\Model;

class Checkpoint extends Model
{
	public $timestamps = false;

	public $incrementing = false;

	protected $primaryKey = null;

    protected $fillable = [
    	'name',
    	'due_at',
    	'assignment_id',
    ];

    protected $dates = [
        'due_at',
    ];

    public function assignment()
    {
    	return $this->belongsTo(Assignment::class);
    }
}
