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
  
 Route::get('/home', 'HomeController@index');    

// Route::get('admin/','AuthAdmin\AuthController@showLoginForm');
// Route::post('admin/', 'AuthAdmin\AuthController@login');
// Route::get('admin/logout','AuthAdmin\AuthController@logout');

//Route::group(['middleware' => ['auth']], function() {

	//Route::get('/dashboard', 'HomeController@index');
	Route::get('dashboard',['as'=>'dashboard','uses'=>'HomeController@index']);	
	
	// Route::get('users',['as'=>'users.index','uses'=>'UserController@index','middleware' => ['permission:user-list|user-create|user-edit|user-delete']]);
	// Route::get('users/create',['as'=>'users.create','uses'=>'UserController@create','middleware' => ['permission:user-create']]);
	// Route::post('users/create',['as'=>'users.store','uses'=>'UserController@store','middleware' => ['permission:user-create']]);
	// Route::get('users/{id}',['as'=>'users.show','uses'=>'UserController@show']);
	// Route::get('users/{id}/edit',['as'=>'users.edit','uses'=>'UserController@edit','middleware' => ['permission:user-edit']]);
	// Route::patch('users/{id}',['as'=>'users.update','uses'=>'UserController@update','middleware' => ['permission:user-edit']]);
	// Route::delete('users/{id}',['as'=>'users.destroy','uses'=>'UserController@destroy','middleware' => ['permission:user-delete']]);

	Route::get('users',['as'=>'users.index','uses'=>'UserController@index']);
	Route::get('users/create',['as'=>'users.create','uses'=>'UserController@create']);
	Route::post('users/create',['as'=>'users.store','uses'=>'UserController@store']);
	Route::get('users/{id}',['as'=>'users.show','uses'=>'UserController@show']);
	Route::get('users/{id}/edit',['as'=>'users.edit','uses'=>'UserController@edit']);
	Route::patch('users/{id}',['as'=>'users.update','uses'=>'UserController@update']);
	Route::delete('users/{id}',['as'=>'users.destroy','uses'=>'UserController@destroy']);

	// Route::get('roles',['as'=>'roles.index','uses'=>'RoleController@index','middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
	// Route::get('roles/create',['as'=>'roles.create','uses'=>'RoleController@create','middleware' => ['permission:role-create']]);
	// Route::post('roles/create',['as'=>'roles.store','uses'=>'RoleController@store','middleware' => ['permission:role-create']]);
	// Route::get('roles/{id}',['as'=>'roles.show','uses'=>'RoleController@show']);
	// Route::get('roles/{id}/edit',['as'=>'roles.edit','uses'=>'RoleController@edit','middleware' => ['permission:role-edit']]);
	// Route::patch('roles/{id}',['as'=>'roles.update','uses'=>'RoleController@update','middleware' => ['permission:role-edit']]);
	// Route::delete('roles/{id}',['as'=>'roles.destroy','uses'=>'RoleController@destroy','middleware' => ['permission:role-delete']]);

	Route::get('roles',['as'=>'roles.index','uses'=>'RoleController@index']);
	Route::get('roles/create',['as'=>'roles.create','uses'=>'RoleController@create']);
	Route::post('roles/create',['as'=>'roles.store','uses'=>'RoleController@store']);
	Route::get('roles/{id}',['as'=>'roles.show','uses'=>'RoleController@show']);
	Route::get('roles/{id}/edit',['as'=>'roles.edit','uses'=>'RoleController@edit']);
	Route::patch('roles/{id}',['as'=>'roles.update','uses'=>'RoleController@update']);
	Route::delete('roles/{id}',['as'=>'roles.destroy','uses'=>'RoleController@destroy']);

	// Route::get('vocationals',['as'=>'vocationals.index','uses'=>'VocationalController@index','middleware' => ['permission:vocational-list|vocational-create|vocational-edit|vocational-delete']]);
	// Route::get('vocationals/create',['as'=>'vocationals.create','uses'=>'VocationalController@create','middleware' => ['permission:vocational-create']]);
	// Route::post('vocationals/create',['as'=>'vocationals.store','uses'=>'VocationalController@store','middleware' => ['permission:vocational-create']]);
	// Route::get('vocationals/{id}',['as'=>'vocationals.show','uses'=>'VocationalController@show']);
	// Route::get('vocationals/{id}/edit',['as'=>'vocationals.edit','uses'=>'VocationalController@edit','middleware' => ['permission:vocational-edit']]);
	// Route::patch('vocationals/{id}',['as'=>'vocationals.update','uses'=>'VocationalController@update','middleware' => ['permission:vocational-edit']]);
	// Route::delete('vocationals/{id}',['as'=>'vocationals.destroy','uses'=>'VocationalController@destroy','middleware' => ['permission:vocational-delete']]);

	Route::get('vocationals',['as'=>'vocationals.index','uses'=>'VocationalController@index']);
	Route::get('vocationals/create',['as'=>'vocationals.create','uses'=>'VocationalController@create']);
	Route::post('vocationals/create',['as'=>'vocationals.store','uses'=>'VocationalController@store']);
	Route::get('vocationals/{id}',['as'=>'vocationals.show','uses'=>'VocationalController@show']);
	Route::get('vocationals/{id}/edit',['as'=>'vocationals.edit','uses'=>'VocationalController@edit']);
	Route::patch('vocationals/{id}',['as'=>'vocationals.update','uses'=>'VocationalController@update']);
	Route::delete('vocationals/{id}',['as'=>'vocationals.destroy','uses'=>'VocationalController@destroy']);
//});
