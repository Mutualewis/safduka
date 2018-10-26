<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');


Route::get('setcountry', 'Auth\AuthController@getLogin');


Route::get('logout', 'Auth\AuthController@logout');

/* Authenticated users */
Route::group(['middleware' => ['auth', 'countrysession']], function()
	{

		Route::get('/telextensions', 'GridController@telExtensionsGrid'); 

	    Route::get('/home', array('as'=>'home', function()
		{
			return View('home');
		}));

		Route::get('/', function() {
		    return View::make('home');
		});

		Route::get('home', function() {
		    return View::make('home');
		});


		Route::get('/home_alternate', function() {
		    return View::make('home_basic_users');
		});


		Route::get('reset', function(){
			return View::make('auth/reset');
		});


		Route::get('/dashboardView/getstocksummary', ['as'=>'dashboardView.getstocksummary','uses'=>'DashboardController@getstocksummary']); 
		Route::get('/dashboardView/getstockreceivedsummary', ['as'=>'dashboardView.getstockreceivedsummary','uses'=>'DashboardController@getstockreceivedsummary']); 
		Route::get('/dashboardView/getpurchasedsummary', ['as'=>'dashboardView.getpurchasedsummary','uses'=>'DashboardController@getpurchasedsummary']); 
		Route::get('/dashboardView/getstuffingsummary', ['as'=>'dashboardView.getstuffingsummary','uses'=>'DashboardController@getstuffingsummary']); 
		Route::get('/dashboardView/getprocessingsummary', ['as'=>'dashboardView.getprocessingsummary','uses'=>'DashboardController@getprocessingsummary']); 


		Route::post('/reset', 'UserController@resetPassword'); 	

		Route::get('/registeruser', 'UserController@createUserForm'); 
		Route::post('/registeruser', 'UserController@registeruser'); 

		Route::get('/roles', 'UserManagerController@rolesForm');
	    Route::post('/roles', 'UserManagerController@roles');
		Route::get('/roles/role_delete/{ID}', ['as'=>'roles.role_delete','uses'=>'UserManagerController@role_delete']);

		Route::get('/rolesuser', 'UserManagerController@rolesUserForm');
		Route::get('/roles/getroleslist', ['as'=>'roles.getroleslist','uses'=>'UserManagerController@getRolesList']);
		Route::get('/roles/assignRole/{ID}/{roleID}', ['as'=>'roles.assignrole','uses'=>'UserManagerController@assignRole']);
		
		Route::get('/permissions', 'UserManagerController@permissionsForm');
	    Route::post('/permissions', 'UserManagerController@permissions');
		Route::get('/permissions/permission_delete/{ID}', ['as'=>'permissions.permission_delete','uses'=>'UserManagerController@permission_delete']);
		
		Route::get('/rolespermissions', 'UserManagerController@rolesPermissionForm');
		Route::get('/roles/getPermissionsList', ['as'=>'roles.getpermissionlist','uses'=>'UserManagerController@getPermissionsList']);
		Route::get('/rolespermissions/assignPermission/{ID}/{permissionID}', ['as'=>'roles.assignpermission','uses'=>'UserManagerController@assignPermission']);
		Route::get('/rolespermissions/revokePermission/{ID}/{permissionID}', ['as'=>'rolespermissions.revokepermission','uses'=>'UserManagerController@revokePermission']);


		Route::get('/weighbridge', 'WeighbridgeController@weighbridgeForm'); 
		Route::post('/weighbridge', 'WeighbridgeController@weighbridge');


		Route::get('/weighbridge/getCustomer/{item_id}', ['as'=>'weighbridge.getCustomer','uses'=>'WeighbridgeController@getCustomer']);



		Route::get('/weighbridgeout', 'WeighbridgeController@weighbridgeOutForm'); 
		Route::post('/weighbridgeout', 'WeighbridgeController@weighbridgeout');




		

	
	    Route::get('/settingsmenu', 'SettingsController@settingsMenuForm');
	    Route::post('/settingsmenu', 'SettingsController@settingsMenu');
	    Route::get('/settingsmenu/menu_delete/{menuID}', ['as'=>'settingsmenu.menu_delete','uses'=>'SettingsController@menu_delete']);
	    Route::get('/settingsdepartment/getmenus/{departmentID}', ['as'=>'settingsdepartment.getmenus','uses'=>'SettingsController@getDepartmentMenus']);
	    Route::get('/settingsdepartment/getmenulist/{departmentID}', ['as'=>'settingsdepartment.getmenulist','uses'=>'SettingsController@getMenuList']);
	    Route::get('/settingsdepartment/assignMenu/{departmentID}/{menuID}/{roles}', ['as'=>'settingsdepartment.assignmenu','uses'=>'SettingsController@assignMenu']);
		Route::get('/settingsdepartment/revokeMenu/{departmentID}/{menuID}', ['as'=>'settingsdepartment.revokemenu','uses'=>'SettingsController@revokeMenu']);
		
	    Route::get('/settingsdepartment', 'SettingsController@settingsDepartmentForm');
	    Route::post('/settingsdepartment', 'SettingsController@settingsDepartment');
	    Route::get('/settingsdepartment/department_delete/{departmentID}', ['as'=>'settingsdepartment.department_delete','uses'=>'SettingsController@department_delete']);

	    Route::get('/region_delete/{id}', 'SettingsController@region_delete');
	    Route::get('/settingsregion/region_delete/{regionID}', ['as'=>'settingsregion.region_delete','uses'=>'SettingsController@region_delete']);


		Route::get('/booking', 'FormController@createBookingForm'); 
		Route::post('/booking', 'FormController@booking'); 
	
		Route::get('/booking_delete/{id}', 'FormController@booking_delete'); 

		Route::get('/settingsgrowers', 'SettingsController@settingsGrowerForm');
		Route::post('/settingsgrowers', 'SettingsController@settingsGrower');
		Route::get('/settingsgrowers/grower_delete/{growerID}', ['as'=>'settingsgrowers.grower_delete','uses'=>'SettingsController@grower_delete']);

		Route::get('downloadExcelGrower/{type}', 'SettingsController@downloadExcelGrower');
		Route::post('/growerupload', 'SettingsController@uploadGrowers'); 
});




