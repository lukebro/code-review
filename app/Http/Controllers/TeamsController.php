<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\Classroom;
use App\Team;
use Auth;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    public function create(Classroom $classroom, Assignment $assignment)
    {
        if (Auth::user()->hasTeam($assignment)) {
            flash()->danger('You\'re already part of a team for this assignment.');
            return redirect()->route('assignments.show', [$classroom->id, $assignment->id]);
        }

    	return view('student.teams.create', [
    		'classroom' => $classroom,
    		'assignment' => $assignment,
    	])->withTitle('Create or join team');
    }

    public function store(Classroom $classroom, Assignment $assignment)
    {
        if (Auth::user()->hasTeam($assignment)) {
            flash()->danger('You\'re already part of a team for this assignment.');
            return redirect()->route('assignments.show', [$classroom->id, $assignment->id]);
        }

        $team = $assignment->teams()->create([
            'name' => request('name'),
            'slug' => str_slug(request('name')),
        ]);

        $team->users()->attach(Auth::user());

        flash()->success('Successfully join team "'.$team->name.'"');

        return redirect('assignments.show', [$classroom->id, $assignment->id]);
    }

    public function join(Classroom $classroom, Assignment $assignment, Team $team)
    {
        if (Auth::user()->hasTeam($assignment)) {
            flash()->danger('You\'re already part of a team for this assignment.');
            return redirect()->route('assignments.show', [$classroom->id, $assignment->id]);
        }

        $team->users()->attach(Auth::user());

        flash()->success('Successfully join team "'.$team->name.'"');

        return redirect('assignments.show', [$classroom->id, $assignment->id]);
    }
}
