<?php

use App\Git\Factories\RepoFactory;
use App\Git\Repositories\OrgRepository;
use App\Git\Repositories\RepoRepository;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('rocky', function (OrgRepository $orgRepo, RepoFactory $factory) {

	$org = $orgRepo->all()->first();

	dd($factory->create([
		'name' => 'hello this is a test',
		'org' => $org->name,
	]));


});

Route::get('/', 'PageController@home');
Route::get('dashboard', 'DashboardController@index')->name('dashboard');

Route::get('setup', 'SetupController@index')->name('setup');
Route::post('setup', 'SetupController@setup');

Route::resource('classroom', 'ClassroomController');
Route::post('classroom/join', 'DashboardController@join')->name('classroom.join');

// Auth
Route::get('login', 'Auth\GithubController@redirectToProvider')->name('login');
Route::get('login/callback', 'Auth\GithubController@handleProviderCallback');
Route::get('logout', 'Auth\GithubController@logout')->name('logout');

// Settings
Route::get('settings', 'SettingsController@index')->name('settings');
Route::patch('settings', 'SettingsController@update');
