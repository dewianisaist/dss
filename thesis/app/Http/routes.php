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

Route::get('admin/','AuthAdmin\AuthController@showLoginForm');
Route::post('admin/', 'AuthAdmin\AuthController@login');
Route::get('admin/logout','AuthAdmin\AuthController@logout');

//Route::group(['middleware' => ['admin']], function() {

	//Route::get('admin/dashboard',['as'=>'admin.dashboard','uses'=>'Admin\HomeController@index']);	
	
	// Route::get('admin/users',['as'=>'admin.users.index','uses'=>'Admin\AdminController@index','middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
	// Route::get('admin/users/create',['as'=>'admin.users.create','uses'=>'Admin\AdminController@create','middleware' => ['permission:role-create']]);
	// Route::post('admin/users/create',['as'=>'admin.users.store','uses'=>'Admin\AdminController@store','middleware' => ['permission:role-create']]);
	// Route::get('admin/users/{id}',['as'=>'admin.users.show','uses'=>'Admin\AdminController@show']);
	// Route::get('admin/users/{id}/edit',['as'=>'admin.users.edit','uses'=>'Admin\AdminController@edit','middleware' => ['permission:role-edit']]);
	// Route::patch('admin/users/{id}',['as'=>'admin.users.update','uses'=>'Admin\AdminController@update','middleware' => ['permission:role-edit']]);
	// Route::delete('admin/users/{id}',['as'=>'admin.users.destroy','uses'=>'Admin\AdminController@destroy','middleware' => ['permission:role-delete']]);

	Route::get('admin/users',['as'=>'admin.users.index','uses'=>'Admin\AdminController@index']);
	Route::get('admin/users/create',['as'=>'admin.users.create','uses'=>'Admin\AdminController@create']);
	Route::post('admin/users/create',['as'=>'admin.users.store','uses'=>'Admin\AdminController@store']);
	Route::get('admin/users/{id}',['as'=>'admin.users.show','uses'=>'Admin\AdminController@show']);
	Route::get('admin/users/{id}/edit',['as'=>'admin.users.edit','uses'=>'Admin\AdminController@edit']);
	Route::patch('admin/users/{id}',['as'=>'admin.users.update','uses'=>'Admin\AdminController@update']);
	Route::delete('admin/users/{id}',['as'=>'admin.users.destroy','uses'=>'Admin\AdminController@destroy']);

	// Route::get('admin/roles',['as'=>'admin.roles.index','uses'=>'Admin\RoleController@index','middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
	// Route::get('admin/roles/create',['as'=>'admin.roles.create','uses'=>'Admin\RoleController@create','middleware' => ['permission:role-create']]);
	// Route::post('admin/roles/create',['as'=>'admin.roles.store','uses'=>'Admin\RoleController@store','middleware' => ['permission:role-create']]);
	// Route::get('admin/roles/{id}',['as'=>'admin.roles.show','uses'=>'Admin\RoleController@show']);
	// Route::get('admin/roles/{id}/edit',['as'=>'admin.roles.edit','uses'=>'Admin\RoleController@edit','middleware' => ['permission:role-edit']]);
	// Route::patch('admin/roles/{id}',['as'=>'admin.roles.update','uses'=>'Admin\RoleController@update','middleware' => ['permission:role-edit']]);
	// Route::delete('admin/roles/{id}',['as'=>'admin.roles.destroy','uses'=>'Admin\RoleController@destroy','middleware' => ['permission:role-delete']]);

	Route::get('admin/roles',['as'=>'admin.roles.index','uses'=>'Admin\RoleController@index']);
	Route::get('admin/roles/create',['as'=>'admin.roles.create','uses'=>'Admin\RoleController@create']);
	Route::post('admin/roles/create',['as'=>'admin.roles.store','uses'=>'Admin\RoleController@store']);
	Route::get('admin/roles/{id}',['as'=>'admin.roles.show','uses'=>'Admin\RoleController@show']);
	Route::get('admin/roles/{id}/edit',['as'=>'admin.roles.edit','uses'=>'Admin\RoleController@edit']);
	Route::patch('admin/roles/{id}',['as'=>'admin.roles.update','uses'=>'Admin\RoleController@update']);
	Route::delete('admin/roles/{id}',['as'=>'admin.roles.destroy','uses'=>'Admin\RoleController@destroy']);

	// Route::get('admin/itemCRUD2',['as'=>'admin.itemCRUD2.index','uses'=>'Admin\ItemCRUD2Controller@index','middleware' => ['permission:item-list|item-create|item-edit|item-delete']]);
	// Route::get('admin/itemCRUD2/create',['as'=>'admin.itemCRUD2.create','uses'=>'Admin\ItemCRUD2Controller@create','middleware' => ['permission:item-create']]);
	// Route::post('admin/itemCRUD2/create',['as'=>'admin.itemCRUD2.store','uses'=>'Admin\ItemCRUD2Controller@store','middleware' => ['permission:item-create']]);
	// Route::get('admin/itemCRUD2/{id}',['as'=>'admin.itemCRUD2.show','uses'=>'Admin\ItemCRUD2Controller@show']);
	// Route::get('admin/itemCRUD2/{id}/edit',['as'=>'admin.itemCRUD2.edit','uses'=>'Admin\ItemCRUD2Controller@edit','middleware' => ['permission:item-edit']]);
	// Route::patch('admin/itemCRUD2/{id}',['as'=>'admin.itemCRUD2.update','uses'=>'Admin\ItemCRUD2Controller@update','middleware' => ['permission:item-edit']]);
	// Route::delete('admin/itemCRUD2/{id}',['as'=>'admin.itemCRUD2.destroy','uses'=>'Admin\ItemCRUD2Controller@destroy','middleware' => ['permission:item-delete']]);

	Route::get('admin/itemCRUD2',['as'=>'admin.itemCRUD2.index','uses'=>'Admin\ItemCRUD2Controller@index']);
	Route::get('admin/itemCRUD2/create',['as'=>'admin.itemCRUD2.create','uses'=>'Admin\ItemCRUD2Controller@create']);
	Route::post('admin/itemCRUD2/create',['as'=>'admin.itemCRUD2.store','uses'=>'Admin\ItemCRUD2Controller@store']);
	Route::get('admin/itemCRUD2/{id}',['as'=>'admin.itemCRUD2.show','uses'=>'Admin\ItemCRUD2Controller@show']);
	Route::get('admin/itemCRUD2/{id}/edit',['as'=>'admin.itemCRUD2.edit','uses'=>'Admin\ItemCRUD2Controller@edit']);
	Route::patch('admin/itemCRUD2/{id}',['as'=>'admin.itemCRUD2.update','uses'=>'Admin\ItemCRUD2Controller@update']);
	Route::delete('admin/itemCRUD2/{id}',['as'=>'admin.itemCRUD2.destroy','uses'=>'Admin\ItemCRUD2Controller@destroy']);
//});
