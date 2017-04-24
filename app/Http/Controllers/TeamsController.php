<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\Classroom;
use App\Team;
use Auth;
use Illuminate\Http\Request;
use App\Git\Github;

class TeamsController extends Controller
{
    public function create(Assignment $assignment)
    {
        if (Auth::user()->hasTeam($assignment)) {
            flash()->danger('You\'re already part of a team for this assignment.');
            return redirect()->route('assignments.show', $assignment->id);
        }

        $classroom = $assignment->classroom;

    	return view('student.teams.create', [
    		'classroom' => $classroom,
    		'assignment' => $assignment,
    	])->withTitle('Create or join team');
    }

    public function store(Assignment $assignment, Github $github)
    {
        if (Auth::user()->hasTeam($assignment)) {
            flash()->danger('You\'re already part of a team for this assignment.');
            return redirect()->route('assignments.show', $assignment);
        }

        $classroom = $assignment->classroom;

        $team = $assignment->teams()->create([
            'name' => request('name'),
            'slug' => str_slug(request('name')),
        ]);

        $repo = $github->withUser($assignment->user)->repository();

        $repo->create([
            'name' => $assignment->prefix . '-' . $team->slug,
            'description' => 'Repository created by code review.',
            'organization' => $classroom->org
        ]);

        $repo->addCollaborator($classroom->org, $team->repo, Auth::user());

        $team->users()->attach(Auth::user());

        flash()->success('Successfully join team "'.$team->name.'"');

        return redirect()->route('assignments.show', $assignment);
    }

    public function join(Assignment $assignment, Team $team)
    {
        if (Auth::user()->hasTeam($assignment)) {
            flash()->danger('You\'re already part of a team for this assignment.');
            return redirect()->route('assignments.show', $assignment);
        }

        $classroom = $assignment->classroom;

        $repo = $github->withUser($assignment->user)->repository();
        $repo->addCollaborator(Auth::user(), $repository->name, $classroom->org);

        $team->users()->attach(Auth::user());

        flash()->success('Successfully join team "'.$team->name.'"');

        return redirect('assignments.show', $assignment);
    }

}
