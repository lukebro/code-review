<?php

namespace App\Http\Controllers;

use App\School;
use App\Student;
use App\Teacher;
use Auth;
use Illuminate\Http\Request;
use Validator;

class SetupController extends Controller
{

	public function __construct()
	{
		 $this->middleware(function ($request, $next) {

		 	if ($request->user()->isSetup()) {
		 		return redirect('classrooms');
		 	}

            return $next($request);
        });
	}

    public function index()
    {
    	 return view('setup.index', [
    	 	'user' => Auth::user(),
    	 	'schools' => School::all(),
    	 ])->withTitle('Setup your account');
    }

    public function setup(Request $request)
    {
        $lookup = [
            'student' => Student::class,
            'teacher' => Teacher::class,
        ];

    	$this->validate($request, [
    		'type' => 'required|in:teacher,student',
    		'name' => 'required|string',
    		'email' => 'required|email',
    		'school_id' => 'required|exists:schools,id'
		]);

		Auth::user()->update([
			'type' => $lookup[$request->type],
			'name' => $request->name,
			'email' => $request->email,
			'school_id' => $request->school_id,
		]);

        Auth::user()->role()->create([]);

		flash()->success("Thanks for setting up your account!");

		return redirect('classrooms');
    }

}
