<?php

namespace App\Http\Controllers;

use Auth;
use App\Classroom;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('setup');
	}

    public function index()
    {
    	 return view(Auth::user()->view . '.dashboard.index', [
    	 	'user' => Auth::user(),
            'classrooms' => Auth::user()->role->classrooms,
    	 ])->withTitle('Dashboard');
    } 

    public function join()
    {
        $classroom = Classroom::where('code', request('code'))->first();

        if (is_null($classroom)) {
            flash()->danger('This class doesn\'t exist!');
            
            return redirect('dashboard');
        }

        if ($classroom->students->contains(Auth::user())) {
            flash()->danger('You\'re already in the class.');

            return redirect('dashboard');
        }

        $classroom->students()->attach(Auth::user());

        flash()->success('You\'ve joined the class "' . $classroom->name . '".');

        return redirect('dashboard');
    }
    
}
