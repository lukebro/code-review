<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use Illuminate\Http\Request;

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
    	 return view('setup.index')->withTitle('Setup your account');
    } 

    public function setup(Request $request)
    {
    	$this->validate($request, [
    		'type' => 'required|in:teacher,student',
		]);


		$request->user()->type = $request->type;
		$request->user()->save();

		flash()->success("Thanks for setting up your account!");

		return redirect()->route('dashboard');
    }
    
}
