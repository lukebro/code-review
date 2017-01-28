<?php

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

Route::get('/', 'PageController@home');
Route::get('dashboard', 'DashboardController@index')->name('dashboard');

Route::get('setup', 'SetupController@index')->name('setup');
Route::post('setup', 'SetupController@setup');

// Auth
Route::get('login', 'Auth\GithubController@redirectToProvider')->name('login');
Route::get('login/callback', 'Auth\GithubController@handleProviderCallback');
Route::get('logout', 'Auth\GithubController@logout')->name('logout');
