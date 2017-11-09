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

//Route::group(['middleware' => ['auth']], function() {

	//Route::get('/dashboard', 'HomeController@index');
	// Route::get('dashboard',['as'=>'dashboard','uses'=>'HomeController@index']);	
	
	//registrants
	Route::get('registrants',['as'=>'registrants.index','uses'=>'RegistrantController@index']);
	Route::get('registrants/edit',['as'=>'registrants.edit','uses'=>'RegistrantController@edit']);
	Route::patch('registrants/',['as'=>'registrants.update','uses'=>'RegistrantController@update']);

	//educational_background
	Route::get('educational_background',['as'=>'educational_background.index','uses'=>'EducationalBackgroundController@index']);
	Route::get('educational_background/create',['as'=>'educational_background.create','uses'=>'EducationalBackgroundController@create']);
	Route::post('educational_background/create',['as'=>'educational_background.store','uses'=>'EducationalBackgroundController@store']);
	Route::get('educational_background/{id}',['as'=>'educational_background.show','uses'=>'EducationalBackgroundController@show']);
	Route::get('educational_background/{id}/edit',['as'=>'educational_background.edit','uses'=>'EducationalBackgroundController@edit']);
	Route::patch('educational_background/{id}',['as'=>'educational_background.update','uses'=>'EducationalBackgroundController@update']);
	Route::delete('educational_background/{id}',['as'=>'educational_background.destroy','uses'=>'EducationalBackgroundController@destroy']);

	//course_experience
	Route::get('course_experience',['as'=>'course_experience.index','uses'=>'CourseExperienceController@index']);
	Route::get('course_experience/create',['as'=>'course_experience.create','uses'=>'CourseExperienceController@create']);
	Route::post('course_experience/create',['as'=>'course_experience.store','uses'=>'CourseExperienceController@store']);
	Route::get('course_experience/{id}',['as'=>'course_experience.show','uses'=>'CourseExperienceController@show']);
	Route::get('course_experience/{id}/edit',['as'=>'course_experience.edit','uses'=>'CourseExperienceController@edit']);
	Route::patch('course_experience/{id}',['as'=>'course_experience.update','uses'=>'CourseExperienceController@update']);
	Route::delete('course_experience/{id}',['as'=>'course_experience.destroy','uses'=>'CourseExperienceController@destroy']);

	//users
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

	Route::get('educations',['as'=>'educations.index','uses'=>'EducationController@index']);
	Route::get('educations/create',['as'=>'educations.create','uses'=>'EducationController@create']);
	Route::post('educations/create',['as'=>'educations.store','uses'=>'EducationController@store']);
	Route::get('educations/{id}',['as'=>'educations.show','uses'=>'EducationController@show']);
	Route::get('educations/{id}/edit',['as'=>'educations.edit','uses'=>'EducationController@edit']);
	Route::patch('educations/{id}',['as'=>'educations.update','uses'=>'EducationController@update']);
	Route::delete('educations/{id}',['as'=>'educations.destroy','uses'=>'EducationController@destroy']);

	Route::get('courses',['as'=>'courses.index','uses'=>'CourseController@index']);
	Route::get('courses/create',['as'=>'courses.create','uses'=>'CourseController@create']);
	Route::post('courses/create',['as'=>'courses.store','uses'=>'CourseController@store']);
	Route::get('courses/{id}',['as'=>'courses.show','uses'=>'CourseController@show']);
	Route::get('courses/{id}/edit',['as'=>'courses.edit','uses'=>'CourseController@edit']);
	Route::patch('courses/{id}',['as'=>'courses.update','uses'=>'CourseController@update']);
	Route::delete('courses/{id}',['as'=>'courses.destroy','uses'=>'CourseController@destroy']);

	Route::get('profile_users',['as'=>'profile_users.show','uses'=>'ProfileUserController@show']);
	Route::get('profile_users/edit',['as'=>'profile_users.edit','uses'=>'ProfileUserController@edit']);
	Route::patch('profile_users',['as'=>'profile_users.update','uses'=>'ProfileUserController@update']);
	
	Route::get('subvocationals',['as'=>'subvocationals.index','uses'=>'SubvocationalController@index']);
	Route::get('subvocationals/create',['as'=>'subvocationals.create','uses'=>'SubvocationalController@create']);
	Route::post('subvocationals/create',['as'=>'subvocationals.store','uses'=>'SubvocationalController@store']);
	Route::get('subvocationals/{id}',['as'=>'subvocationals.show','uses'=>'SubvocationalController@show']);
	Route::get('subvocationals/{id}/edit',['as'=>'subvocationals.edit','uses'=>'SubvocationalController@edit']);
	Route::patch('subvocationals/{id}',['as'=>'subvocationals.update','uses'=>'SubvocationalController@update']);
	Route::delete('subvocationals/{id}',['as'=>'subvocationals.destroy','uses'=>'SubvocationalController@destroy']);

//});
