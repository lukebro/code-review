<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateSettings;

class SettingsController extends Controller
{
    public function index()
    {
    	 return view('settings.index', [
    	 	'user' => Auth::user()
    	 ])->withTitle('Settings');
    } 

    public function update(UpdateSettings $request) {
    	Auth::user()->update($request->all());

    	flash()->success('Settings saved successfully.');

    	return redirect()->route('settings');
    }
    
}
