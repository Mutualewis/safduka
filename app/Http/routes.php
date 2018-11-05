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
		Route::get('/weighbridge/getWeighbridge/{region_id}', ['as'=>'weighbridge.getWeighbridge','uses'=>'WeighbridgeController@getWeighbridge']);
		Route::get('/weighbridge/getParking', ['as'=>'weighbridge.getParking','uses'=>'WeighbridgeController@getParking']);


		Route::get('/arrivalinformation/getOutturn/{item_id}/{miller_id}', ['as'=>'arrivalinformation.getOutturn','uses'=>'Controller@getOutturn']);



		Route::get('/weighbridgeout', 'WeighbridgeController@weighbridgeOutForm'); 
		Route::post('/weighbridgeout', 'WeighbridgeController@weighbridgeout');




		Route::get('/arrivalinformationgrns', 'GRNSController@arrivalInformationGRNSForm'); 
		Route::post('/arrivalinformationgrns', 'GRNSController@arrivalInformationGRNS');


		Route::get('/arrivalinformationgrns/confirmArrivalInformation/{cid}/{grn_number}/{weighbridgeTK}/{outt_season}/{service}/{team}', ['as'=>'arrivalinformationgrns.confirmArrivalInformation','uses'=>'GRNSController@confirmArrivalInformation']);
		Route::get('/arrivalinformationgrns/printMovementWithRate/{grn_number}/{service}/{team}', ['as'=>'arrivalinformationgrns.printarrivalinformation','uses'=>'GRNSController@printarrivalinformation']);

		Route::get('/arrivalinformationgrns/getOutturnDetails/{outt_number_search}/{grn_number}', ['as'=>'arrivalinformationgrns.getOutturnDetails','uses'=>'GRNSController@getOutturnDetails']);
		Route::get('/arrivalinformationgrns/getBatch/{outt_number_search}/{grn_number}', ['as'=>'arrivalinformationgrns.getBatch','uses'=>'GRNSController@getBatch']);
		Route::get('/arrivalinformationgrns/getScales/{warehouse}', ['as'=>'arrivalinformationgrns.getScales','uses'=>'GRNSController@getScales']);
		Route::get('/arrivalinformationgrns/getLocations/{warehouse}', ['as'=>'arrivalinformationgrns.getLocations','uses'=>'GRNSController@getLocations']);
		Route::get('/arrivalinformationgrns/fetchWeight/{weighscale}', ['as'=>'arrivalinformationgrns.fetchWeight','uses'=>'GRNSController@fetchWeight']);
		Route::get('/arrivalinformationgrns/resetWeight/{weighscale}', ['as'=>'arrivalinformationgrns.resetWeight','uses'=>'GRNSController@resetWeight']);

		Route::get('/arrivalinformation', 'WeighScaleController@arrivalInformationForm'); 
		Route::post('/arrivalinformation', 'WeighScaleController@arrivalInformation');
		Route::get('/arrivalinformation/confirmArrivalInformation/{cid}/{grn_number}/{weighbridgeTK}/{outt_season}/{service}/{team}', ['as'=>'arrivalinformation.confirmArrivalInformation','uses'=>'WeighScaleController@confirmArrivalInformation']);
		Route::get('/arrivalinformation/printMovementWithRate/{grn_number}/{service}/{team}', ['as'=>'arrivalinformation.printarrivalinformation','uses'=>'WeighScaleController@printarrivalinformation']);

		Route::get('/arrivalqualityinformationlist', 'ArrivalQualityController@arrivalQualityInformationListForm'); 
		Route::post('/arrivalqualityinformationlist', 'ArrivalQualityController@arrivalQualityInformationList');

		Route::get('/weighnote', 'WeightNoteController@weighNoteForm'); 
		Route::post('/weighnote', 'WeightNoteController@weighNote');
		Route::get('/weight_note_delete/{id}', 'WeightNoteController@weight_note_delete'); 

		Route::get('/movementindividual', 'MovementIndividualController@movementIndividualForm'); 
		Route::post('/movementindividual', 'MovementIndividualController@movementIndividual'); 

		Route::get('/movementindividual/getLots/{countryID}/{warehouse}/{new_row}/{new_column}/{ref_no}', ['as'=>'movementindividual.getLots','uses'=>'MovementIndividualController@getLots']); 

		Route::get('/movementindividual/addLots/{movement}/{ref_no}/{movementType}/{reasonForMovement}', ['as'=>'movementindividual.addLots','uses'=>'MovementIndividualController@addLots']); 


		Route::get('/movementspecial', 'MovementController@movementSpecialForm'); 
		Route::post('/movementspecial', 'MovementController@movementSpecial'); 

		Route::get('/movementspecial/confirmMovementWithRate/{ref}/{warehouseFrom}/{service}/{team}', ['as'=>'movementspecial.confirmmovementspecialwithrate','uses'=>'MovementController@confirmMovementWithRate']);

		Route::get('/movementspecial/printMovementWithRate/{ref}/{warehouseFrom}/{service}/{team}', ['as'=>'movementspecial.printmovementspecialwithrate','uses'=>'MovementController@printMovementWithRate']);

		Route::get('/movementconfirmation', 'WarehouseController@movementConfirmationForm'); 
		Route::post('/movementconfirmation', 'WarehouseController@movementConfirmation'); 




		

	
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

		Route::get('/cataloguequalitydetails', 'QualityController@qualityForm'); 
		Route::post('/cataloguequalitydetails', 'QualityController@addQualityDetails');

		Route::get('/cataloguequalitydetailslist', 'QualityController@qualityListForm'); 
		Route::get('/cataloguequalitydetailslist/getsalelots/{countryID}/{saleSeason}/{saleNumber}/{seller}', ['as'=>'cataloguequalitydetailslist.getsalelots','uses'=>'QualityController@getSaleLots']); 

		Route::post('/cataloguequalitydetailslist', 'QualityController@addQualityDetailsList'); 

		Route::get('/cataloguequalitydetailslist', 'QualityController@qualityListForm'); 
		Route::get('/cataloguequalitydetailslist/getsalelots/{countryID}/{saleSeason}/{saleNumber}/{seller}', ['as'=>'cataloguequalitydetailslist.getsalelots','uses'=>'QualityController@getSaleLots']); 

		Route::post('/cataloguequalitydetailslist', 'QualityController@addQualityDetailsList'); 

		Route::get('/cataloguequalitydetails/getLots/{season}/{st_id}/{direction}/{outt_number}/{coffee_grade}', ['as'=>'cataloguequalitydetails.getLots','uses'=>'QualityController@getLots']); 

	//tablet quality
	Route::get('/cataloguequalitydetails/saveGreen/{cfd_id}/{dnt}/{greensize}/{greencolor}/{greendefects}/{raw}/{comments}', ['as'=>'cataloguequalitydetails.saveGreen','uses'=>'QualityController@saveGreen']);


	Route::get('/cataloguequalitydetails/saveScreen/{cfd_id}/{screen_size}/{screen}', ['as'=>'cataloguequalitydetails.saveScreen','uses'=>'QualityController@saveScreen']);


	Route::get('/cataloguequalitydetails/saveCup/{cfd_id}/{cup}/{dnt_cp}/{acidity}/{body}/{flavour}/{comments_cp}', ['as'=>'cataloguequalitydetails.saveCup','uses'=>'QualityController@saveCup']);

	Route::get('/cataloguequalitydetails/saveParchment/{st_id}/{dnt}/{parchmentdesc}', ['as'=>'cataloguequalitydetails.saveParchment','uses'=>'QualityController@saveParchment']);

});




