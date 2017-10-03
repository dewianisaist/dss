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

Route::group(['middleware' => ['auth']], function() {
    
    Route::get('/home', 'UserController@index');    

    Route::get('/admin','Admin\HomeController@index');
    Route::get('/admin/login','AuthAdmin\AuthController@showLoginForm');
    Route::post('/admin/login', 'AuthAdmin\AuthController@login');
    Route::get('/admin/logout','AuthAdmin\AuthController@logout');

	Route::resource('admin/users','Admin\AdminController');

	Route::get('admin/roles',['as'=>'admin.roles.index','uses'=>'Admin\RoleController@index','middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
	Route::get('admin/roles/create',['as'=>'admin.roles.create','uses'=>'Admin\RoleController@create','middleware' => ['permission:role-create']]);
	Route::post('admin/roles/create',['as'=>'admin.roles.store','uses'=>'Admin\RoleController@store','middleware' => ['permission:role-create']]);
	Route::get('admin/roles/{id}',['as'=>'admin.roles.show','uses'=>'Admin\RoleController@show']);
	Route::get('admin/roles/{id}/edit',['as'=>'admin.roles.edit','uses'=>'Admin\RoleController@edit','middleware' => ['permission:role-edit']]);
	Route::patch('admin/roles/{id}',['as'=>'admin.roles.update','uses'=>'Admin\RoleController@update','middleware' => ['permission:role-edit']]);
	Route::delete('admin/roles/{id}',['as'=>'admin.roles.destroy','uses'=>'Admin\RoleController@destroy','middleware' => ['permission:role-delete']]);

	Route::get('admin/itemCRUD2',['as'=>'admin.itemCRUD2.index','uses'=>'Admin\ItemCRUD2Controller@index','middleware' => ['permission:item-list|item-create|item-edit|item-delete']]);
	Route::get('admin/itemCRUD2/create',['as'=>'admin.itemCRUD2.create','uses'=>'Admin\ItemCRUD2Controller@create','middleware' => ['permission:item-create']]);
	Route::post('admin/itemCRUD2/create',['as'=>'admin.itemCRUD2.store','uses'=>'Admin\ItemCRUD2Controller@store','middleware' => ['permission:item-create']]);
	Route::get('admin/itemCRUD2/{id}',['as'=>'admin.itemCRUD2.show','uses'=>'Admin\ItemCRUD2Controller@show']);
	Route::get('admin/itemCRUD2/{id}/edit',['as'=>'admin.itemCRUD2.edit','uses'=>'Admin\ItemCRUD2Controller@edit','middleware' => ['permission:item-edit']]);
	Route::patch('admin/itemCRUD2/{id}',['as'=>'admin.itemCRUD2.update','uses'=>'Admin\ItemCRUD2Controller@update','middleware' => ['permission:item-edit']]);
	Route::delete('admin/itemCRUD2/{id}',['as'=>'admin.itemCRUD2.destroy','uses'=>'Admin\ItemCRUD2Controller@destroy','middleware' => ['permission:item-delete']]);
});

// Route::auth();
// Route::get('/home', 'UserController@index');

// Route::get('/admin','AdminController@index');
// Route::get('/admin/login','AuthAdmin\AuthController@showLoginForm');
// Route::post('/admin/login', 'AuthAdmin\AuthController@login');
// Route::get('/admin/logout','AuthAdmin\AuthController@logout');

// Route::get('/admin/register','AuthAdmin\AuthController@showRegisterForm');
// Route::post('/admin/register', 'AuthAdmin\AuthController@register');

// Route::resource('adminCRUD','AdminCRUDController');