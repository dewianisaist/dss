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

Route::get('/', 'HomeController@index');

Route::auth();

Route::group(['middleware' => ['auth']], function() {
	
	//registrants - tidak ada permission
	Route::get('registrants',['as'=>'registrants.index','uses'=>'RegistrantController@index']);
	Route::get('registrants/edit',['as'=>'registrants.edit','uses'=>'RegistrantController@edit']);
	Route::patch('registrants/',['as'=>'registrants.update','uses'=>'RegistrantController@update']);

	//educational_background - tidak ada permission
	Route::get('educational_background',['as'=>'educational_background.index','uses'=>'EducationalBackgroundController@index']);
	Route::get('educational_background/create',['as'=>'educational_background.create','uses'=>'EducationalBackgroundController@create']);
	Route::post('educational_background/create',['as'=>'educational_background.store','uses'=>'EducationalBackgroundController@store']);
	Route::get('educational_background/{id}/{institutionid}/{graduationid}',['as'=>'educational_background.show','uses'=>'EducationalBackgroundController@show']);
	Route::get('educational_background/{id}/{institutionid}/{graduationid}/edit',['as'=>'educational_background.edit','uses'=>'EducationalBackgroundController@edit']);
	Route::patch('educational_background/{id}/{institutionid}/{graduationid}',['as'=>'educational_background.update','uses'=>'EducationalBackgroundController@update']);
	Route::delete('educational_background/{id}/{institutionid}/{graduationid}',['as'=>'educational_background.destroy','uses'=>'EducationalBackgroundController@destroy']);

	//course_experience - tidak ada permission
	Route::get('course_experience',['as'=>'course_experience.index','uses'=>'CourseExperienceController@index']);
	Route::get('course_experience/create',['as'=>'course_experience.create','uses'=>'CourseExperienceController@create']);
	Route::post('course_experience/create',['as'=>'course_experience.store','uses'=>'CourseExperienceController@store']);
	Route::get('course_experience/{id}/{organizerid}/{graduationid}',['as'=>'course_experience.show','uses'=>'CourseExperienceController@show']);
	Route::get('course_experience/{id}/{organizerid}/{graduationid}/edit',['as'=>'course_experience.edit','uses'=>'CourseExperienceController@edit']);
	Route::patch('course_experience/{id}/{organizerid}/{graduationid}',['as'=>'course_experience.update','uses'=>'CourseExperienceController@update']);
	Route::delete('course_experience/{id}/{organizerid}/{graduationid}',['as'=>'course_experience.destroy','uses'=>'CourseExperienceController@destroy']);

	//registration - tidak ada permission
	Route::get('registration',['as'=>'registration.index','uses'=>'RegistrationController@index']);
	Route::get('registration/create',['as'=>'registration.create','uses'=>'RegistrationController@create']);
	Route::post('registration/create',['as'=>'registration.store','uses'=>'RegistrationController@store']);

	//contoh permission
	// Route::get('users',['as'=>'users.index','uses'=>'UserController@index','middleware' => ['permission:user-list|user-create|user-edit|user-delete']]);
	// Route::get('users/create',['as'=>'users.create','uses'=>'UserController@create','middleware' => ['permission:user-create']]);
	// Route::post('users/create',['as'=>'users.store','uses'=>'UserController@store','middleware' => ['permission:user-create']]);
	// Route::get('users/{id}',['as'=>'users.show','uses'=>'UserController@show']);
	// Route::get('users/{id}/edit',['as'=>'users.edit','uses'=>'UserController@edit','middleware' => ['permission:user-edit']]);
	// Route::patch('users/{id}',['as'=>'users.update','uses'=>'UserController@update','middleware' => ['permission:user-edit']]);
	// Route::delete('users/{id}',['as'=>'users.destroy','uses'=>'UserController@destroy','middleware' => ['permission:user-delete']]);

	//users - tidak ada permission
	Route::get('users',['as'=>'users.index','uses'=>'UserController@index']);	
	Route::get('users/create',['as'=>'users.create','uses'=>'UserController@create']);
	Route::post('users/create',['as'=>'users.store','uses'=>'UserController@store']);
	Route::get('users/{id}',['as'=>'users.show','uses'=>'UserController@show']);
	Route::get('users/{id}/edit',['as'=>'users.edit','uses'=>'UserController@edit']);
	Route::patch('users/{id}',['as'=>'users.update','uses'=>'UserController@update']);
	Route::delete('users/{id}',['as'=>'users.destroy','uses'=>'UserController@destroy']);

	//roles - tidak ada permission
	Route::get('roles',['as'=>'roles.index','uses'=>'RoleController@index']);
	Route::get('roles/create',['as'=>'roles.create','uses'=>'RoleController@create']);
	Route::post('roles/create',['as'=>'roles.store','uses'=>'RoleController@store']);
	Route::get('roles/{id}',['as'=>'roles.show','uses'=>'RoleController@show']);
	Route::get('roles/{id}/edit',['as'=>'roles.edit','uses'=>'RoleController@edit']);
	Route::patch('roles/{id}',['as'=>'roles.update','uses'=>'RoleController@update']);
	Route::delete('roles/{id}',['as'=>'roles.destroy','uses'=>'RoleController@destroy']);

	//vocationals - tidak ada permission
	Route::get('vocationals',['as'=>'vocationals.index','uses'=>'VocationalController@index']);
	Route::get('vocationals/create',['as'=>'vocationals.create','uses'=>'VocationalController@create']);
	Route::post('vocationals/create',['as'=>'vocationals.store','uses'=>'VocationalController@store']);
	Route::get('vocationals/{id}',['as'=>'vocationals.show','uses'=>'VocationalController@show']);
	Route::get('vocationals/{id}/edit',['as'=>'vocationals.edit','uses'=>'VocationalController@edit']);
	Route::patch('vocationals/{id}',['as'=>'vocationals.update','uses'=>'VocationalController@update']);
	Route::delete('vocationals/{id}',['as'=>'vocationals.destroy','uses'=>'VocationalController@destroy']);

	//educations - tidak ada permission
	Route::get('educations',['as'=>'educations.index','uses'=>'EducationController@index']);
	Route::get('educations/create',['as'=>'educations.create','uses'=>'EducationController@create']);
	Route::post('educations/create',['as'=>'educations.store','uses'=>'EducationController@store']);
	Route::get('educations/{id}',['as'=>'educations.show','uses'=>'EducationController@show']);
	Route::get('educations/{id}/edit',['as'=>'educations.edit','uses'=>'EducationController@edit']);
	Route::patch('educations/{id}',['as'=>'educations.update','uses'=>'EducationController@update']);
	Route::delete('educations/{id}',['as'=>'educations.destroy','uses'=>'EducationController@destroy']);

	//courses - tidak ada permission
	Route::get('courses',['as'=>'courses.index','uses'=>'CourseController@index']);
	Route::get('courses/create',['as'=>'courses.create','uses'=>'CourseController@create']);
	Route::post('courses/create',['as'=>'courses.store','uses'=>'CourseController@store']);
	Route::get('courses/{id}',['as'=>'courses.show','uses'=>'CourseController@show']);
	Route::get('courses/{id}/edit',['as'=>'courses.edit','uses'=>'CourseController@edit']);
	Route::patch('courses/{id}',['as'=>'courses.update','uses'=>'CourseController@update']);
	Route::delete('courses/{id}',['as'=>'courses.destroy','uses'=>'CourseController@destroy']);

	//profile_users - tidak ada permission
	Route::get('profile_users',['as'=>'profile_users.show','uses'=>'ProfileUserController@show']);
	Route::get('profile_users/edit',['as'=>'profile_users.edit','uses'=>'ProfileUserController@edit']);
	Route::patch('profile_users',['as'=>'profile_users.update','uses'=>'ProfileUserController@update']);
	
	//subvocationals - tidak ada permission
	Route::get('subvocationals',['as'=>'subvocationals.index','uses'=>'SubvocationalController@index']);
	Route::get('subvocationals/create',['as'=>'subvocationals.create','uses'=>'SubvocationalController@create']);
	Route::post('subvocationals/create',['as'=>'subvocationals.store','uses'=>'SubvocationalController@store']);
	Route::get('subvocationals/{id}',['as'=>'subvocationals.show','uses'=>'SubvocationalController@show']);
	Route::get('subvocationals/{id}/edit',['as'=>'subvocationals.edit','uses'=>'SubvocationalController@edit']);
	Route::patch('subvocationals/{id}',['as'=>'subvocationals.update','uses'=>'SubvocationalController@update']);
	Route::delete('subvocationals/{id}',['as'=>'subvocationals.destroy','uses'=>'SubvocationalController@destroy']);

	//selectionschedule - ada permission
	Route::get('selectionschedules',['as'=>'selectionschedules.index','uses'=>'SelectionScheduleController@index','middleware' => ['permission:selectionschedule-list|selectionschedule-create|selectionschedule-edit|selectionschedule-delete']]);
	Route::get('selectionschedules/create',['as'=>'selectionschedules.create','uses'=>'SelectionScheduleController@create','middleware' => ['permission:selectionschedule-create']]);
	Route::post('selectionschedules/create',['as'=>'selectionschedules.store','uses'=>'SelectionScheduleController@store','middleware' => ['permission:selectionschedule-create']]);
	Route::get('selectionschedules/{id}',['as'=>'selectionschedules.show','uses'=>'SelectionScheduleController@show']);
	Route::get('selectionschedules/{id}/edit',['as'=>'selectionschedules.edit','uses'=>'SelectionScheduleController@edit','middleware' => ['permission:selectionschedule-edit']]);
	Route::patch('selectionschedules/{id}',['as'=>'selectionschedules.update','uses'=>'SelectionScheduleController@update','middleware' => ['permission:selectionschedule-edit']]);
	Route::delete('selectionschedules/{id}',['as'=>'selectionschedules.destroy','uses'=>'SelectionScheduleController@destroy','middleware' => ['permission:selectionschedule-delete']]);

	//selections - ada permission
	Route::get('selections',['as'=>'selections.index','uses'=>'SelectionController@index','middleware' => ['permission:selection-list|selection-edit']]);
	Route::get('selections/{id}',['as'=>'selections.show','uses'=>'SelectionController@show']);
	Route::get('selections/{id}/edit',['as'=>'selections.edit','uses'=>'SelectionController@edit','middleware' => ['permission:selection-edit']]);
	Route::patch('selections/{id}',['as'=>'selections.update','uses'=>'SelectionController@update','middleware' => ['permission:selection-edit']]);
	
	//criterias - tidak ada permission
	Route::get('criterias',['as'=>'criterias.index','uses'=>'CriteriaController@index']);
	Route::get('criterias/create',['as'=>'criterias.create','uses'=>'CriteriaController@create']);
	Route::post('criterias/create',['as'=>'criterias.store','uses'=>'CriteriaController@store']);
	Route::get('criterias/{id}',['as'=>'criterias.show','uses'=>'CriteriaController@show']);
	Route::get('criterias/{id}/edit',['as'=>'criterias.edit','uses'=>'CriteriaController@edit']);
	Route::patch('criterias/{id}',['as'=>'criterias.update','uses'=>'CriteriaController@update']);
	Route::delete('criterias/{id}',['as'=>'criterias.destroy','uses'=>'CriteriaController@destroy']);

	//preferences - tidak ada permission
	Route::get('preferences',['as'=>'preferences.index','uses'=>'PreferenceController@index']);
	Route::get('preferences/{id}/edit',['as'=>'preferences.edit','uses'=>'PreferenceController@edit']);
	Route::patch('preferences/{id}',['as'=>'preferences.update','uses'=>'PreferenceController@update']);
	Route::delete('preferences/{id}',['as'=>'preferences.destroy','uses'=>'PreferenceController@destroy']);

	//manage_registrants - tidak ada permission
	Route::get('manage_registrants',['as'=>'manage_registrants.index','uses'=>'ManageRegistrantController@index']);
	Route::get('manage_registrants/{id}',['as'=>'manage_registrants.show','uses'=>'ManageRegistrantController@show']);
	
	//auth_role - tidak ada permission
	Route::get('authrole',['as'=>'authrole.index','uses'=>'AuthRoleController@index']);
	Route::post('authrole',['as'=>'authrole.store','uses'=>'AuthRoleController@store']);

	//questionnaire - tidak ada permission
	Route::get('questionnaire',['as'=>'questionnaire.index','uses'=>'QuestionnaireController@index']);
	Route::get('questionnaire/create',['as'=>'questionnaire.create','uses'=>'QuestionnaireController@create']);
	Route::post('questionnaire/create',['as'=>'questionnaire.store','uses'=>'QuestionnaireController@store']);

	//resultstep1 - tidak ada permission
	Route::get('resultstep1',['as'=>'resultstep1.index','uses'=>'ResultStep1Controller@index']);

	//criteriastep2 - ada permission
	Route::get('criteriastep2',['as'=>'criteriastep2.index','uses'=>'CriteriaStep2Controller@index','middleware' => ['permission:criteriastep2-list|criteriastep2-create|criteriastep2-edit|criteriastep2-delete|criteriastep2-use']]);
	Route::get('criteriastep2/create',['as'=>'criteriastep2.create','uses'=>'CriteriaStep2Controller@create','middleware' => ['permission:criteriastep2-create']]);
	Route::post('criteriastep2/create',['as'=>'criteriastep2.store','uses'=>'CriteriaStep2Controller@store','middleware' => ['permission:criteriastep2-create']]);
	Route::get('criteriastep2/{id}/edit',['as'=>'criteriastep2.edit','uses'=>'CriteriaStep2Controller@edit','middleware' => ['permission:criteriastep2-edit']]);
	Route::patch('criteriastep2/{id}',['as'=>'criteriastep2.update','uses'=>'CriteriaStep2Controller@update','middleware' => ['permission:criteriastep2-edit']]);
	Route::delete('criteriastep2/{id}',['as'=>'criteriastep2.destroy','uses'=>'CriteriaStep2Controller@destroy','middleware' => ['permission:criteriastep2-delete']]);
	Route::get('criteriastep2/{id}',['as'=>'criteriastep2.use','uses'=>'CriteriaStep2Controller@use','middleware' => ['permission:criteriastep2-use']]);

	//criteriagroup - ada permission
	Route::get('criteriagroup',['as'=>'criteriagroup.index','uses'=>'CriteriaGroupController@index','middleware' => ['permission:criteriagroup-list|criteriagroup-create|criteriagroup-edit|criteriagroup-delete|criteriagroup-add|criteriagroup-out']]);
	Route::get('criteriagroup/create',['as'=>'criteriagroup.create','uses'=>'CriteriaGroupController@create','middleware' => ['permission:criteriagroup-create']]);
	Route::post('criteriagroup/create',['as'=>'criteriagroup.store','uses'=>'CriteriaGroupController@store','middleware' => ['permission:criteriagroup-create']]);
	Route::get('criteriagroup/{id}/edit',['as'=>'criteriagroup.edit','uses'=>'CriteriaGroupController@edit','middleware' => ['permission:criteriagroup-edit']]);
	Route::patch('criteriagroup/{id}/edit',['as'=>'criteriagroup.update','uses'=>'CriteriaGroupController@update','middleware' => ['permission:criteriagroup-edit']]);
	Route::delete('criteriagroup/{id}',['as'=>'criteriagroup.destroy','uses'=>'CriteriaGroupController@destroy','middleware' => ['permission:criteriagroup-delete']]);
	Route::post('criteriagroup/add',['as'=>'criteriagroup.add','uses'=>'CriteriaGroupController@add','middleware' => ['permission:criteriagroup-add']]);
	Route::post('criteriagroup/out',['as'=>'criteriagroup.out','uses'=>'CriteriaGroupController@out','middleware' => ['permission:criteriagroup-out']]);

	//weight - tidak ada permission
	Route::get('weights',['as'=>'weights.index','uses'=>'WeightController@index']);
	Route::get('weights/{id}/pairwise',['as'=>'weights.pairwise','uses'=>'WeightController@create']);
	Route::patch('weights/{id}',['as'=>'weights.store','uses'=>'WeightController@store']);

	//result_selection - tidak ada permission
	Route::get('result_selection',['as'=>'result_selection.index','uses'=>'ResultSelectionController@index']);
	Route::get('result_selection/{id}/assessment',['as'=>'result_selection.assessment','uses'=>'ResultSelectionController@assessment']);
	Route::patch('result_selection/{id}',['as'=>'result_selection.store','uses'=>'ResultSelectionController@store']);
	Route::post('result_selection/count',['as'=>'result_selection.count','uses'=>'ResultSelectionController@count']);

	//result - tidak ada permission
	Route::get('result',['as'=>'result.index','uses'=>'ResultController@index']);
});
