<?php

namespace App\Http\Controllers;

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
    	 return view('dashboard.index')->withTitle('Dashboard');
    } 
    
}
