<?php

use App\Git\GitHub;
use App\User;

Route::get('ok', function () {
    Auth::login(User::find(1));
});

Route::get('rocky', function (GitHub $client) {

    $repository = $client->repository();

    $ok = $repository->create([
        'name' => 'hey',
        'description' => 'This is test!!',
        'organization' => 'lukebro-test',
    ]);

    dd($ok);
});

Route::get('/', 'PagesController@home');

Route::get('setup', 'SetupController@index')->name('setup');
Route::post('setup', 'SetupController@setup');

Route::resource('classrooms', 'ClassroomsController');
Route::get('classrooms/join/{token}', 'ClassroomsController@join')->name('classrooms.join');

// Auth
Route::get('login', 'Auth\GithubController@redirectToProvider')->name('login');
Route::get('login/callback', 'Auth\GithubController@handleProviderCallback');
Route::get('logout', 'Auth\GithubController@logout')->name('logout');

// Settings
Route::get('settings', 'SettingsController@index')->name('settings');
Route::patch('settings', 'SettingsController@update');
