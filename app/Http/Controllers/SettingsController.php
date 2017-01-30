<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateSettings;
use App\School;
use Auth;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
    	 return view('settings.index', [
    	 	'user' => Auth::user(),
            'schools' => School::all(),
    	 ])->withTitle('Settings');
    } 

    public function update(UpdateSettings $request) {
    	Auth::user()->update($request->all());

    	flash()->success('Settings saved successfully.');

    	return redirect()->route('settings');
    }
    
}
