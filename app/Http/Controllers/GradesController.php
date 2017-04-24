<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\Checkpoint;
use App\Classroom;
use App\Submission;
use Illuminate\Http\Request;

class GradesController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth', 'teacher']);
	}

	public function show(Checkpoint $checkpoint)
	{
		return view('teacher.grades.show', [
			'checkpoint' => $checkpoint->with('submissions')->first(),
			'assignment' => $checkpoint->assignment,
			'classroom' => $checkpoint->assignment->classroom,
		])->withTitle("Grade {$checkpoint->name}");
	}

}
