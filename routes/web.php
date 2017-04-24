<?php

Route::get('/', 'PagesController@home');

Route::get('setup', 'SetupController@index')->name('setup');
Route::post('setup', 'SetupController@setup');

Route::resource('classrooms', 'ClassroomsController');
Route::get('classrooms/join/{token}', 'ClassroomsController@join')->name('classrooms.join');
Route::get('classrooms/{classroom}/create', 'AssignmentsController@create')->name('assignments.create');
Route::post('classrooms/{classroom}/store', 'AssignmentsController@store')->name('assignments.store');

Route::resource('grades', 'GradesController');
Route::get('submissions/{submission}', 'SubmissionsController@show')->name('submissions.show');

Route::resource('assignments', 'AssignmentsController', ['except' => ['index', 'create', 'store']]);

Route::resource('assignments/{assignment}/teams', 'TeamsController');
Route::post('assignments/{assignment}/teams/{team}','TeamsController@join')->name('teams.join');


// Auth
Route::get('login', 'Auth\GithubController@redirectToProvider')->name('login');
Route::get('login/callback', 'Auth\GithubController@handleProviderCallback');
Route::get('logout', 'Auth\GithubController@logout')->name('logout');

// Settings
Route::get('settings', 'SettingsController@index')->name('settings');
Route::patch('settings', 'SettingsController@update');

Route::get('rocky', 'DevController@index');
