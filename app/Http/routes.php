<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function() {
    return view('index');
});

Route::auth();
Route::get('/home', 'UserController@index');

Route::get('/admin','AdminController@index');
Route::get('/admin/login','AuthAdmin\AuthController@showLoginForm');
Route::post('/admin/login', 'AuthAdmin\AuthController@login');
Route::get('/admin/logout','AuthAdmin\AuthController@logout');

Route::get('/admin/register','AuthAdmin\AuthController@showRegisterForm');
Route::post('/admin/register', 'AuthAdmin\AuthController@register');