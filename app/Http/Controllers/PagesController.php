<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest');
	}

    public function home()
    {
    	return view('pages.home', [
    		'students' => User::students()->count(),
    		'teachers' => User::teachers()->count(),
    		'assignments' => 0,
    	])->withTitle('The bridge between coding and teaching');
    }

}
