<?php

namespace App;

use App\Team;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $fillable = [
    	'team_id',
    	'checkpoint_id',
    	'previous_sha',
    	'comment_sha',
    ];

    public function team()
    {
    	 return $this->belongsTo(Team::class);
    }

    public function checkpoint()
    {
    	return $this->belongsTo(Checkpoint::class);
    }

}
