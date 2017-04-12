<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\Git\GitHub;
use App\User;
use Illuminate\Http\Request;

class DevController extends Controller
{
    public function index(Github $github)
    {
        $github->withUser(User::first());
    	$assignment = Assignment::first();
    	$classroom = $assignment->classroom;
    	$team = $assignment->teams()->first();

    	$commits = $github->repository()->allCommits($classroom->org, $team->repo);

        dd(last($commits)['sha']);

    	$response = $github->repository()->createBranch($classroom->org, $team->repo, 'checkpoint', $sha);

    	dd($response);
    }

}
