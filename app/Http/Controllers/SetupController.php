<?php

namespace App\Http\Controllers;

use App\School;
use Auth;
use Illuminate\Http\Request;
use Validator;

class SetupController extends Controller
{

	public function __construct()
	{
		 $this->middleware(function ($request, $next) {

		 	if ($request->user()->isSetup()) {
		 		return redirect('dashboard');
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
    	$this->validate($request, [
    		'type' => 'required|in:teacher,student',
    		'name' => 'required|string',
    		'email' => 'required|email',
    		'school_id' => 'required|exists:schools,id'
		]);

		$request->user()->update([
			'type' => $request->type,
			'name' => $request->name,
			'email' => $request->email,
			'school_id' => $request->school_id,
		]);

		flash()->success("Thanks for setting up your account!");

		return redirect()->route('dashboard');
    }
    
}
