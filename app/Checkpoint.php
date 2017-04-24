<?php

namespace App;

use App\Assignment;
use App\Submission;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\belongsTo;
use Illuminate\Database\Eloquent\Model;

class Checkpoint extends Model
{
	public $timestamps = false;

    protected $fillable = [
    	'name',
    	'due_at',
        'due',
        'description',
        'points',
    	'assignment_id',
    ];

    protected $casts = [
        'due_at' => 'datetime',
    ];

    public function getSlugAttribute()
    {
        return str_slug($this->name);
    }

    public function assignment()
    {
    	return $this->belongsTo(Assignment::class);
    }

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }

    public function scopeDue($query)
    {
        return $query->where('due', 0)->where('due_at', '<=', Carbon::now());
    }
}
