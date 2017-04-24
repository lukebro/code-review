<?php

namespace App\Http\Controllers;

use App\Submission;
use Illuminate\Http\Request;

class SubmissionsController extends Controller
{
    public function show(Submission $submission)
    {
    	$checkpoint = $submission->checkpoint;
    	$classroom = $checkpoint->assignment->classroom;
    	$team = $submission->team;
    	$students = $team->users;

    	//dd($submission, $checkpoint, $team, $students);

    	return view('teacher.submissions.show', [
    		'submission' => $submission,
    		'checkpoint' => $checkpoint,
    		'classroom' => $classroom,
    		'team' => $team,
    		'students' => $students
    	])->withTitle('Grade submission');
    }

}
