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
Route::get('dashboard', 'DashboardController@index');

// Auth
Route::get('/github', ['as' => 	'login', 'uses' =>'Auth\GithubController@redirectToProvider']);
Route::get('/github/callback', 'Auth\GithubController@handleProviderCallback');
Route::get('/logout', ['as' => 'logout', 'uses' => 'Auth\GithubController@logout']);
