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





		Route::get('/weighbridgeout', 'WeighbridgeController@weighbridgeOutForm'); 
		Route::post('/weighbridgeout', 'WeighbridgeController@weighbridgeout');




		Route::get('/arrivalinformationgrns', 'GRNSController@arrivalInformationGRNSForm'); 
		Route::post('/arrivalinformationgrns', 'GRNSController@arrivalInformationGRNS');


		Route::get('/arrivalinformationgrns/confirmArrivalInformation/{cid}/{grn_number}/{weighbridgeTK}/{outt_season}/{service}/{team}', ['as'=>'arrivalinformationgrns.confirmArrivalInformation','uses'=>'GRNSController@confirmArrivalInformation']);
		Route::get('/arrivalinformationgrns/printMovementWithRate/{grn_number}/{service}/{team}', ['as'=>'arrivalinformationgrns.printarrivalinformation','uses'=>'GRNSController@printarrivalinformation']);

		Route::get('/arrivalinformationgrns/getOutturnDetails/{outt_number_search}/{grn_number}', ['as'=>'arrivalinformationgrns.getOutturnDetails','uses'=>'GRNSController@getOutturnDetails']);

		Route::get('/arrivalinformationgrns/getBatch/{outt_number}/{outt_season}/{outturn_type_batch}', ['as'=>'arrivalinformationgrns.getBatch','uses'=>'GRNSController@getBatch']);
		// Route::get('/arrivalinformationgrns/getScales/{warehouse}', ['as'=>'arrivalinformationgrns.getScales','uses'=>'GRNSController@getScales']);
		// Route::get('/arrivalinformationgrns/getLocations/{warehouse}', ['as'=>'arrivalinformationgrns.getLocations','uses'=>'GRNSController@getLocations']);
		Route::get('/arrivalinformationgrns/fetchWeight/{weighscale}', ['as'=>'arrivalinformationgrns.fetchWeight','uses'=>'GRNSController@fetchWeight']);
		Route::get('/arrivalinformationgrns/resetWeight/{weighscale}', ['as'=>'arrivalinformationgrns.resetWeight','uses'=>'GRNSController@resetWeight']);

		Route::get('/arrivalinformation', 'WeighScaleController@arrivalInformationForm'); 
		Route::post('/arrivalinformation', 'WeighScaleController@arrivalInformation');
		Route::get('/arrivalinformation/confirmArrivalInformation/{cid}/{grn_number}/{weighbridgeTK}/{outt_season}/{service}/{team}', ['as'=>'arrivalinformation.confirmArrivalInformation','uses'=>'WeighScaleController@confirmArrivalInformation']);
		Route::get('/arrivalinformation/printMovementWithRate/{grn_number}/{service}/{team}', ['as'=>'arrivalinformation.printarrivalinformation','uses'=>'WeighScaleController@printarrivalinformation']);

		Route::get('/arrivalinformation/getOutturn/{item_id}/{miller_id}/{moisture}', ['as'=>'arrivalinformation.getOutturn','uses'=>'Controller@getOutturn']);
		Route::get('/arrivalinformation/getMaterials/{item_id}', ['as'=>'arrivalinformation.getMaterials','uses'=>'Controller@getMaterials']);

		Route::get('/arrivalinformation/getGRNContents/{grn_number}/{warehouse}', ['as'=>'arrivalinformation.getGRNContents','uses'=>'GRNSController@getGRNContents']);

		Route::get('/arrivalinformation/outturn_delete/{id}', ['as'=>'arrivalinformation.outturn_delete','uses'=>'GRNSController@outturn_delete']);
		Route::get('/arrivalinformation/batch_delete/{id}', ['as'=>'arrivalinformation.batch_delete','uses'=>'GRNSController@batch_delete']);


		Route::get('/arrivalinformation/getMaterialsInOutturn/{item_id}/{outt_number}/{outt_season}/{grn_number}/{warehouse}', ['as'=>'arrivalinformation.getMaterialsInOutturn','uses'=>'Controller@getMaterialsInOutturn']);


		Route::get('/arrivalinformation/getScales/{warehouse}', ['as'=>'arrivalinformation.getScales','uses'=>'Controller@getScales']);
		Route::get('/arrivalinformation/getLocations/{warehouse}', ['as'=>'arrivalinformation.getLocations','uses'=>'Controller@getLocations']);

		
		Route::get('/arrivalinformation/checkScaleSession/{weigh_scale_session}', ['as'=>'arrivalinformation.checkScaleSession','uses'=>'Controller@checkScaleSession']);
		Route::get('/arrivalinformation/getWeight/{weigh_scales}', ['as'=>'arrivalinformation.getWeight','uses'=>'Controller@getWeight']);
		Route::get('/arrivalinformation/reSetWeight/{weigh_scales}', ['as'=>'arrivalinformation.reSetWeight','uses'=>'Controller@reSetWeight']);
		
		Route::get('/arrivalinformation/generateGRN/{warehouse}', ['as'=>'arrivalinformation.generateGRN','uses'=>'Controller@generateGRN']);


		Route::get('/arrivalqualityinformationlist', 'ArrivalQualityController@arrivalQualityInformationListForm'); 
		Route::post('/arrivalqualityinformationlist', 'ArrivalQualityController@arrivalQualityInformationList');

		Route::get('/arrivalinformation/addDispatch/{grn_number}/{outt_number}/{outt_season}/{coffee_grower}/{outturn_type}/{moisture}/{basket}/{packaging}/{warehouse}', ['as'=>'arrivalinformation.addDispatch','uses'=>'GRNSController@addDispatch']);


		Route::get('/arrivalinformation/addBatch/{outt_number}/{outt_season}/{coffee_grower}/{outturn_type_batch}/{weigh_scales}/{packaging}/{zone}/{packages_batch}/{batch_kilograms}/{batch_kilograms_hidden}/{selectedRow}/{selectedColumn}/{warehouse}', ['as'=>'arrivalinformation.addBatch','uses'=>'GRNSController@addBatch']);



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
	Route::get('/cataloguequalitydetails/saveGreen/{st_id}/{dnt}/{greensize}/{greencolor}/{greendefects}/{raw}/{comments}', ['as'=>'cataloguequalitydetails.saveGreen','uses'=>'QualityController@saveGreen']);

	Route::post('/cataloguequalitydetails/saveScreen', ['as'=>'cataloguequalitydetails.saveScreen','uses'=>'QualityController@saveScreen']);

	Route::post('/cataloguequalitydetails/saveCup', ['as'=>'cataloguequalitydetails.saveCup','uses'=>'QualityController@saveCup']);

	Route::get('/cataloguequalitydetails/saveParchment/{st_id}/{dnt}/{parchmentdesc}', ['as'=>'cataloguequalitydetails.saveParchment','uses'=>'QualityController@saveParchment']);
	
	Route::get('/processinginstructions', 'ProcessingController@processingInstructionsForm'); 
		Route::get('/processinginstructions/getstockview/{countryID}/{ref_no}', ['as'=>'processinginstructions.getstockview','uses'=>'ProcessingController@getstockview']); 
		Route::post('/processinginstructions', 'ProcessingController@processingInstructions');
		Route::get('/processingtests', 'ProcessingController@processingtestsForm'); 

		Route::get('/processingprovisional', 'ProvisionalController@provisionalInstructionsForm'); 	
		Route::get('/processingprovisional/getstockpurchasedview/{countryID}/{ref_no}', ['as'=>'processingprovisional.getstockpurchasedview','uses'=>'ProvisionalController@getstockpurchasedview']); 
		Route::post('/processingprovisional', 'ProvisionalController@processingProvisional');


		Route::get('/processingprovisionalview', 'ProcessingProvisionalViewController@processingProvisionalViewForm'); 
		Route::get('/processingprovisionalview/getprocessview', ['as'=>'processingprovisionalview.getprocessview','uses'=>'ProcessingProvisionalViewController@getprocessview']); 
		Route::get('/amendprovisional/{id}', 'ProcessingProvisionalViewController@amend'); 
		Route::get('/clear/{id}', 'ProcessingProvisionalViewController@clear'); 		


		Route::get('/processinghooper', 'HooperResultsController@processingHooperForm'); 	
		Route::get('/processinghooper/getstockview/{countryID}/{ref_no}', ['as'=>'processinghooper.getstockview','uses'=>'HooperResultsController@getstockview']); 
		Route::post('/processinghooper', 'HooperResultsController@processingHooper');


		Route::get('/processinginstructionsview', 'ProcessingInstructionsViewController@processingInstructionsViewForm'); 	
		Route::get('/processinginstructionsview/getprocessview', ['as'=>'processinginstructionsview.getprocessview','uses'=>'ProcessingInstructionsViewController@getprocessview']); 

		Route::post('/processinginstructionsview', 'ProcessingInstructionsViewController@processinginstructionsview');
		Route::get('/hooper/{id}', 'ProcessingInstructionsViewController@hooper'); 
		Route::get('/results/{id}', 'ProcessingInstructionsViewController@results'); 
		Route::get('/amend/{id}', 'ProcessingInstructionsViewController@amend'); 
		Route::get('/pre_shipment/{id}', 'ProcessingInstructionsViewController@pre_shipment'); 
		Route::get('/pre_shipment_all/{id}', 'ProcessingInstructionsViewController@pre_shipment_all'); 

		Route::get('/processingresults', 'ProcessingController@processingResultsForm'); 
		Route::post('/processingresults', 'ProcessingController@processingResults');	


		Route::get('/processingresultsquality', 'ProcessingResultsQualityController@processingResultsQualityForm'); 
		Route::post('/processingresultsquality', 'ProcessingResultsQualityController@processingResultsQuality');

		Route::get('/processrates/CalculateProcessResultsRate/{ref}/{processingType}/{service}/{team}', ['as'=>'processrates.calculateprocessresultsrate','uses'=>'RatesController@CalculateProcessResultsRate']);


		Route::get('/processrates/printProcessWithRate/{ref}/{service}/{team}', ['as'=>'processrates.printprocesswithrate','uses'=>'RatesController@printProcessWithRate']);
});




