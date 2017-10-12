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
  
// Route::get('/home', 'HomeController@index');    

// Route::get('admin/','AuthAdmin\AuthController@showLoginForm');
// Route::post('admin/', 'AuthAdmin\AuthController@login');
// Route::get('admin/logout','AuthAdmin\AuthController@logout');

//Route::group(['middleware' => ['auth']], function() {

	//Route::get('/dashboard', 'HomeController@index');
	Route::get('dashboard',['as'=>'dashboard','uses'=>'HomeController@index']);	
	
	// Route::get('users',['as'=>'users.index','uses'=>'UserController@index','middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
	// Route::get('users/create',['as'=>'users.create','uses'=>'UserController@create','middleware' => ['permission:role-create']]);
	// Route::post('users/create',['as'=>'users.store','uses'=>'UserController@store','middleware' => ['permission:role-create']]);
	// Route::get('users/{id}',['as'=>'users.show','uses'=>'UserController@show']);
	// Route::get('users/{id}/edit',['as'=>'users.edit','uses'=>'UserController@edit','middleware' => ['permission:role-edit']]);
	// Route::patch('users/{id}',['as'=>'users.update','uses'=>'UserController@update','middleware' => ['permission:role-edit']]);
	// Route::delete('users/{id}',['as'=>'users.destroy','uses'=>'UserController@destroy','middleware' => ['permission:role-delete']]);

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

	// Route::get('itemCRUD2',['as'=>'itemCRUD2.index','uses'=>'ItemCRUD2Controller@index','middleware' => ['permission:item-list|item-create|item-edit|item-delete']]);
	// Route::get('itemCRUD2/create',['as'=>'itemCRUD2.create','uses'=>'ItemCRUD2Controller@create','middleware' => ['permission:item-create']]);
	// Route::post('itemCRUD2/create',['as'=>'itemCRUD2.store','uses'=>'ItemCRUD2Controller@store','middleware' => ['permission:item-create']]);
	// Route::get('itemCRUD2/{id}',['as'=>'itemCRUD2.show','uses'=>'ItemCRUD2Controller@show']);
	// Route::get('itemCRUD2/{id}/edit',['as'=>'itemCRUD2.edit','uses'=>'ItemCRUD2Controller@edit','middleware' => ['permission:item-edit']]);
	// Route::patch('itemCRUD2/{id}',['as'=>'itemCRUD2.update','uses'=>'ItemCRUD2Controller@update','middleware' => ['permission:item-edit']]);
	// Route::delete('itemCRUD2/{id}',['as'=>'itemCRUD2.destroy','uses'=>'ItemCRUD2Controller@destroy','middleware' => ['permission:item-delete']]);

	Route::get('itemCRUD2',['as'=>'itemCRUD2.index','uses'=>'ItemCRUD2Controller@index']);
	Route::get('itemCRUD2/create',['as'=>'itemCRUD2.create','uses'=>'ItemCRUD2Controller@create']);
	Route::post('itemCRUD2/create',['as'=>'itemCRUD2.store','uses'=>'ItemCRUD2Controller@store']);
	Route::get('itemCRUD2/{id}',['as'=>'itemCRUD2.show','uses'=>'ItemCRUD2Controller@show']);
	Route::get('itemCRUD2/{id}/edit',['as'=>'itemCRUD2.edit','uses'=>'ItemCRUD2Controller@edit']);
	Route::patch('itemCRUD2/{id}',['as'=>'itemCRUD2.update','uses'=>'ItemCRUD2Controller@update']);
	Route::delete('itemCRUD2/{id}',['as'=>'itemCRUD2.destroy','uses'=>'ItemCRUD2Controller@destroy']);
//});
