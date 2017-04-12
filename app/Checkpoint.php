<?php

namespace App;

use App\Assignment;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\belongsTo;
use Illuminate\Database\Eloquent\Model;

class Checkpoint extends Model
{
	public $timestamps = false;

    protected $fillable = [
    	'name',
    	'due_at',
    	'assignment_id',
    ];

    protected $dates = [
        'due_at',
    ];

    public function getSlugAttribute()
    {
        return str_slug($this->name);
    }

    public function assignment()
    {
    	return $this->belongsTo(Assignment::class);
    }

    public function scopeDue($query)
    {
        return $query->where('due', 0)->where('due_at', '<=', Carbon::now());
    }
}
