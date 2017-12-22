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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//in order to change the route you go to when a user is unauthenticated, just create a
//get route with the name login in laravel 5.5
Route::get('/login/alt', 'Auth\MagicLoginController@show')->name('login');
Route::post('/login/alt', 'Auth\MagicLoginController@sendToken');
Route::get('/login/alt/{token}/', 'Auth\MagicLoginController@validateToken');

Route::get('/home', 'HomeController@index')->name('home');
