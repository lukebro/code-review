<?php

Route::get('/', 'PageController@home');
Route::get('dashboard', 'DashboardController@index')->name('dashboard');

Route::get('setup', 'SetupController@index')->name('setup');
Route::post('setup', 'SetupController@setup');

Route::resource('classroom', 'ClassroomController');
Route::post('classroom/join', 'DashboardController@join')->name('classroom.join');
Route::post('classroom/{classroom}/pending', 'ClassroomController@handlePending')->name('classroom.pending');

// Auth
Route::get('login', 'Auth\GithubController@redirectToProvider')->name('login');
Route::get('login/callback', 'Auth\GithubController@handleProviderCallback');
Route::get('logout', 'Auth\GithubController@logout')->name('logout');

// Settings
Route::get('settings', 'SettingsController@index')->name('settings');
Route::patch('settings', 'SettingsController@update');
