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

		Route::get('/catalogueindividual', 'AuctionController@addToCatalogueForm'); 
		Route::post('/catalogueindividual', 'AuctionController@addToCatalogue'); 

		Route::get('/lot_delete/{id}', 'AuctionController@lot_delete'); 

		Route::get('/catalogueupload', 'AuctionController@catalogueUploadForm'); 
		Route::post('/catalogueupload', 'AuctionController@uploadCatalogue'); 

		Route::get('downloadExcelCatalogue/{type}', 'AuctionController@downloadExcelCatalogue');

		Route::get('/confirmcatalogue', 'ConfirmationController@confirmCatalogueForm'); 
		Route::post('/confirmcatalogue', 'ConfirmationController@confirmCatalogue'); 

		Route::get('/confirmqualitycatalogue', 'ConfirmationController@confirmQualityCatalogueForm'); 
		Route::post('/confirmqualitycatalogue', 'ConfirmationController@confirmQualityCatalogue'); 

		Route::get('/confirmauctiondetails', 'ConfirmationController@confirmAuctionDetailsForm'); 
		Route::post('/confirmauctiondetails', 'ConfirmationController@confirmAuctionDetails'); 

	  	Route::get('/confirmqualitycatalogue/confirmqualitycatalogueajax/{sale}', ['as'=>'confirmqualitycatalogue.confirmqualitycatalogueajax','uses'=>'ConfirmationController@confirmsaleajax']);

	    Route::get('/confirmqualitycatalogue/confirmqualitygetprogress', ['as'=>'confirmqualitycatalogue.confirmqualitygetprogress','uses'=>'ConfirmationController@getProgress']);


		Route::get('/cataloguequalitydetails', 'QualityController@qualityForm'); 
		Route::post('/cataloguequalitydetails', 'QualityController@addQualityDetails');

		Route::get('/cataloguequalitydetailslist', 'QualityController@qualityListForm'); 
		Route::get('/cataloguequalitydetailslist/getsalelots/{countryID}/{saleSeason}/{saleNumber}/{seller}', ['as'=>'cataloguequalitydetailslist.getsalelots','uses'=>'QualityController@getSaleLots']); 

		Route::post('/cataloguequalitydetailslist', 'QualityController@addQualityDetailsList'); 


		Route::get('/cataloguequalitydetails/getLots/{countryID}/{saleSeason}/{saleNumber}/{seller}/{cfd_id}/{direction}/{lot_number}/{outt_number}/{coffee_grade}', ['as'=>'cataloguequalitydetails.getLots','uses'=>'QualityController@getLots']); 

		Route::get('/cataloguequalitydetails/saveGreen/{cfd_id}/{dnt}/{greensize}/{greencolor}/{greendefects}/{process_type}/{process_loss}/{raw}/{comments}', ['as'=>'cataloguequalitydetails.saveGreen','uses'=>'QualityController@saveGreen']);


		Route::get('/cataloguequalitydetails/saveScreen/{cfd_id}/{screen_size}/{screen}', ['as'=>'cataloguequalitydetails.saveScreen','uses'=>'QualityController@saveScreen']);


		Route::get('/cataloguequalitydetails/saveCup/{cfd_id}/{cup}/{dnt_cp}/{acidity}/{body}/{flavour}/{comments_cp}', ['as'=>'cataloguequalitydetails.saveCup','uses'=>'QualityController@saveCup']);


		Route::get('/directindividual' , 'DirectController@addToCatalogueForm'); 
		Route::post('/directindividual', 'DirectController@addToCatalogue'); 




		Route::get('/directuploadoutturns', 'DirectController@directUploadOutturnsForm'); 
		Route::post('/directuploadoutturns', 'DirectController@directUploadOutturns'); 	

		Route::get('downloadExcelDirect/{type}', 'DirectController@downloadExcelDirect');

		Route::get('/directqualitydetails', 'DirectQualityController@qualityForm'); 
		
		Route::post('/directqualitydetails', 'DirectQualityController@addQualityDetails');

		Route::get('/directqualitydetails/getLots/{countryID}/{saleSeason}/{saleNumber}/{seller}/{cfd_id}/{direction}/{lot_number}/{outt_number}/{coffee_grade}', ['as'=>'directqualitydetails.getLots','uses'=>'DirectQualityController@getLots']); 

		Route::get('/directqualitydetails/saveGreen/{cfd_id}/{dnt}/{greensize}/{greencolor}/{greendefects}/{process_type}/{process_loss}/{raw}/{comments}', ['as'=>'directqualitydetails.saveGreen','uses'=>'DirectQualityController@saveGreen']);


		Route::get('/directqualitydetails/saveScreen/{cfd_id}/{screen_size}/{screen}', ['as'=>'directqualitydetails.saveScreen','uses'=>'DirectQualityController@saveScreen']);


		Route::get('/directqualitydetails/saveCup/{cfd_id}/{cup}/{dnt_cp}/{acidity}/{body}/{flavour}/{comments_cp}', ['as'=>'directqualitydetails.saveCup','uses'=>'DirectQualityController@saveCup']);


		Route::get('/directqualitydetailslist', 'DirectQualityController@qualityListForm'); 
		Route::get('/directqualitydetailslist/getsalelots/{countryID}/{saleSeason}/{saleNumber}/{seller}', ['as'=>'directqualitydetailslist.getsalelots','uses'=>'DirectQualityController@getSaleLots']); 

		Route::post('/directqualitydetailslist', 'DirectQualityController@addQualityDetailsList'); 

		Route::get('/directuploadpurchaseinfo', 'DirectController@directUploadPurchaseInfoForm'); 
		Route::post('/directuploadpurchaseinfo', 'DirectController@directUploadPurchaseInfo'); 	

		Route::get('/directpurchasedetails', 'DirectPurchaseController@directPurchaseDetailsForm'); 
		Route::post('/directpurchasedetails', 'DirectPurchaseController@directPurchaseDetails');

		Route::get('/directpurchasequality', 'DirectPurchaseController@directPurchaseQualityForm'); 
		Route::post('/directpurchasequality', 'DirectPurchaseController@directPurchaseQuality');

		Route::get('/directpurchasewarrants', 'DirectPurchaseController@directPurchaseWarrantsForm'); 
		Route::post('/directpurchasewarrants', 'DirectPurchaseController@directPurchaseWarrants');


		Route::get('/directcodeupload', 'DirectController@directCodeUploadForm'); 
		Route::post('/directcodeupload', 'DirectController@directCodeUpload'); 
		Route::get('downloadExcelCode/{type}', 'DirectController@downloadExcelCode');


		Route::get('/stockindividual', 'PurchaseController@stockIntakeForm'); 
		Route::post('/stockindividual', 'PurchaseController@stockIntake'); 	

		Route::get('/stocklist', 'PurchaseController@stockListForm'); 
		Route::post('/stocklist', 'PurchaseController@stockList'); 

		Route::get('/stockupload', 'PurchaseController@stockUploadForm'); 
		Route::post('/stockupload', 'PurchaseController@uploadStockList'); 

		Route::get('downloadExcelAuction/{type}', 'PurchaseController@downloadExcelAuction');

		Route::get('/confirmpurchases', 'PurchaseController@confirmPurchasesForm'); 
		Route::post('/confirmpurchases', 'PurchaseController@confirmPurchases'); 	

		Route::get('/confirmpurchaseslist', 'PurchaseController@confirmPurchasesListForm'); 
		Route::post('/confirmpurchaseslist', 'PurchaseController@confirmPurchasesList'); 

		Route::get('/basket', 'PurchaseController@basketForm'); 
		Route::post('/basket', 'PurchaseController@basket'); 

		Route::get('/basketinternal', 'InternalBasketController@basketInternalForm'); 
		Route::post('/basketinternal', 'InternalBasketController@basketInternal'); 

		Route::get('/briccontracts', 'PurchaseController@bricContractsForm'); 
		Route::post('/briccontracts', 'PurchaseController@bricContracts'); 

		Route::get('/briccontractsdirect', 'DirectsContractsController@bricContractsDirectForm'); 
		Route::post('/briccontractsdirect', 'DirectsContractsController@bricContractsDirect'); 

		Route::get('/confirminvoices', 'PurchaseController@confirmInvoicesForm'); 
		Route::post('/confirminvoices', 'PurchaseController@confirmInvoices');

		Route::get('/confirminvoicesdirect', 'DirectPurchaseController@confirmInvoicesForm'); 
		Route::post('/confirminvoicesdirect', 'DirectPurchaseController@confirmInvoices');

		Route::get('/confirmpayment', 'PurchaseController@confirmPaymnetForm'); 
		Route::post('/confirmpayment', 'PurchaseController@confirmPaymnet');

		Route::get('/confirmpaymentdirect', 'DirectPurchaseController@confirmPaymnetForm'); 
		Route::post('/confirmpaymentdirect', 'DirectPurchaseController@confirmPaymnet');
		

		Route::get('/warrants', 'PurchaseController@warrantsForm'); 
		Route::post('/warrants', 'PurchaseController@warrants');

		Route::get('/releaseinstructions', 'PurchaseController@releaseInstructionsForm'); 
		Route::post('/releaseinstructions', 'PurchaseController@releaseInstructions');

		Route::get('/weighbridge', 'WeighbridgeController@weighbridgeForm'); 
		Route::post('/weighbridge', 'WeighbridgeController@weighbridge');

		Route::get('/weighbridgeout', 'WeighbridgeController@weighbridgeOutForm'); 
		Route::post('/weighbridgeout', 'WeighbridgeController@weighbridgeout');

		// Route::get('/arrivalinformation', 'WarehouseController@arrivalInformationForm'); 
		// Route::post('/arrivalinformation', 'WarehouseController@arrivalInformation');

		Route::get('/changelocation', 'WarehouseController@changeLocationForm'); 
		Route::post('/changelocation', 'WarehouseController@changeLocation');	

		Route::get('/movementinstructions', 'WarehouseController@movementInstructionsForm'); 
		Route::post('/movementinstructions', 'WarehouseController@movementInstructions'); 

		Route::get('/movementconfirmation', 'WarehouseController@movementConfirmationForm'); 
		Route::post('/movementconfirmation', 'WarehouseController@movementConfirmation'); 


		Route::get('/stuffing', 'WarehouseController@stuffingForm'); 
		Route::post('/stuffing', 'WarehouseController@stuffing'); 

		Route::get('/stuffing_delete/{id}', 'WarehouseController@stuffing_delete'); 
		

		Route::get('/movementspecial', 'MovementController@movementSpecialForm'); 
		Route::post('/movementspecial', 'MovementController@movementSpecial'); 


		Route::get('/movementindividual', 'MovementIndividualController@movementIndividualForm'); 
		Route::post('/movementindividual', 'MovementIndividualController@movementIndividual'); 

		Route::get('/movementindividual/getLots/{countryID}/{warehouse}/{new_row}/{new_column}', ['as'=>'movementindividual.getLots','uses'=>'MovementIndividualController@getLots']); 

		Route::get('/movementindividual/addLots/{movement}/{ref_no}/{movementType}', ['as'=>'movementindividual.addLots','uses'=>'MovementIndividualController@addLots']); 





		Route::get('/manageindividual', 'IndividualController@manageIndividualForm'); 
		Route::post('/manageindividual', 'IndividualController@manageIndividual'); 



		Route::get('/accountssaledetails', 'AccountsSaleController@accountsSaleDetailsForm'); 
		Route::post('/accountssaledetails', 'AccountsSaleController@accountsSaleDetails'); 

		Route::get('/accountsdebit', 'DebitController@accountsDebitForm'); 
		Route::post('/accountsdebit', 'DebitController@accountsDebit'); 

		Route::get('/accountscreditarrival', 'CreditController@accountsCreditArrivalForm'); 
		Route::get('/accountscreditarrival/getstockviewarrival/{countryID}/{ref_no}', ['as'=>'accountscreditarrival.getstockviewarrival','uses'=>'CreditController@getstockviewarrival']); 
		Route::post('/accountscreditarrival', 'CreditController@accountsCreditArrival'); 


		Route::get('/toolsvaluation', 'ValuationController@valuationForm'); 



		Route::get('/accountscredit', 'CreditController@accountsCreditForm'); 
		Route::get('/accountscredit/getstockview/{countryID}/{ref_no}', ['as'=>'accountscredit.getstockview','uses'=>'CreditController@getstockview']); 
		Route::post('/accountscredit', 'CreditController@accountsCredit'); 


		Route::get('/updatebreakdown', 'BreakDownController@updateBreakDownForm'); 
		Route::post('/updatebreakdown', 'BreakDownController@updateBreakDown'); 	


		Route::get('/addbasket', 'BasketController@addBasketForm'); 
		Route::post('/addbasket', 'BasketController@addBasket'); 	

		Route::get('/outturn_delete/{id}', 'DirectController@outturn_delete'); 

		Route::get('/createsale', 'SaleController@createSaleForm'); 
		Route::post('/createsale', 'SaleController@createSale'); 

		Route::get('/activities', 'GridController@activitiesGrid');

		Route::get('/ctreport', 'CatalogueGridController@catalogueGrid'); 
		Route::post('/ctreport', 'CatalogueGridController@selectCatalogue'); 

		Route::get('/ctquality', 'CatalogueGridController@catalogueQualityGrid'); 
		Route::post('/ctquality', 'CatalogueGridController@selectCatalogueQuality'); 

		Route::get('/ctqualityreport', 'CatalogueQualityGridController@catalogueQualityGrid'); 
		Route::get('ctqualityreport/getreport', ['as'=>'ctqualityreport.getreport','uses'=>'CatalogueQualityGridController@getReport']);


		Route::get('/dtreport', 'DirectGridController@catalogueGrid'); 
		Route::post('/dtreport', 'DirectGridController@selectCatalogue'); 

		Route::get('/dtquality', 'DirectGridController@catalogueQualityGrid'); 
		Route::post('/dtquality', 'DirectGridController@selectCatalogueQuality'); 

		Route::get('/purchaseforallocation', 'PurchaseGridController@purchaseForAllocationGrid');

		Route::get('/purchaseforallocationreport', 'PurchaseAllocationReportController@purchaseForAllocationReportForm');
		Route::post('/purchaseforallocationreport', 'PurchaseAllocationReportController@purchaseForAllocationReport');

		Route::get('/purchaseperseller', 'PurchasePerSellerController@purchasePerSellerForm');
		Route::post('/purchaseperseller', 'PurchasePerSellerController@purchasePerSeller');	
		Route::get('/purchaseaverageprice', 'PurchaseGridController@purchaseAveragePriceGrid');

		Route::get('/purchasecontractsummary', 'PurchaseContractSummaryController@purchaseContractSummaryForm');
		Route::post('/purchasecontractsummary', 'PurchaseContractSummaryController@purchaseContractSummary');	

		Route::get('/purchasesummarypercode', 'PurchaseSummaryPerCodeController@purchaseSummaryPerCodeForm');
		Route::post('/purchasesummarypercode', 'PurchaseSummaryPerCodeController@purchaseSummaryPerCode');
		

		Route::get('/stocksmovement', 'StocksMovementController@stockMovementForm');
		Route::post('/stocksmovement', 'StocksMovementController@stockMovement');




		Route::get('/stockall', 'StocksGridController@stockAllGrid');
		Route::get('/stockallandpurchased', 'StocksGridController@stockAllAndPurchasedGrid');
		
		Route::get('/stockexpected', 'StocksGridController@StockExpectedGrid');
		Route::get('/stockbought', 'StocksGridController@StockBoughtGrid');
		// Route::get('/stocksmovement', 'StocksGridController@stockMovementGrid');	

		Route::get('/stockswarrantedvsgrn', 'WarrantedVsGRNGridController@stocksWarrantedVsGRNGrid');	


		Route::get('/stocksperbric', 'StocksPerGridController@stocksPerBric');	
		Route::get('/stocksperbasket', 'StocksPerGridController@stocksPerBasket');	
		Route::get('/stocksperpurchase', 'StocksPerGridController@stocksPerPurchase');	

		Route::get('/stockslongshort', 'StocksPerGridController@stocksLongShort');
		Route::post('/stockslongshort', 'StocksPerGridController@downloadLongShort');

		Route::get('/stockslongshortinternal', 'StocksPerGridController@stocksLongShortInternal');
		Route::post('/stockslongshortinternal', 'StocksPerGridController@downloadLongShortInternal');



		

		Route::get('/stocksreconciliation', 'StocksPerGridController@stocksReconciliation');



		Route::get('/processingresultsgrid', 'ProcessingResultsGridController@processingResults');	
		Route::get('/processingsummary', 'ProcessingResultsGridController@processingSummary');	
		Route::get('/processingsummarybric', 'ProcessingResultsGridController@processingsummarybric');	
		Route::get('/processingsummarystuffed', 'ProcessingResultsGridController@processingSummaryStuffed');	
		Route::get('/processingsalescontractsummary', 'ProcessingResultsGridController@processingSalesContractSummary');	


		Route::get('/breakdownwithoutstuffed', 'BreakDownGridController@breakDownWithoutStuffed');	
		Route::get('/breakdownfull', 'BreakDownGridController@breakDownFull');	


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

		Route::get('/arrivalinformation', 'WeighScaleController@arrivalInformationForm'); 
		Route::post('/arrivalinformation', 'WeighScaleController@arrivalInformation');
		Route::get('/outturn_delete/{id}', 'WeighScaleController@outturn_delete'); 
		Route::get('/batch_delete/{id}', 'WeighScaleController@batch_delete'); 


		Route::get('/arrivalinformation/confirmArrivalInformation/{cid}/{grn_number}/{weighbridgeTK}/{outt_season}/{service}/{team}', ['as'=>'arrivalinformation.confirmArrivalInformation','uses'=>'WeighScaleController@confirmArrivalInformation']);
		Route::get('/arrivalinformation/printMovementWithRate/{grn_number}/{service}/{team}', ['as'=>'arrivalinformation.printarrivalinformation','uses'=>'WeighScaleController@printarrivalinformation']);


	    Route::get('/settingsthresholds', 'ThresholdController@settingsThresholdsForm');
	    Route::post('/settingsthresholds', 'ThresholdController@settingsThresholds');
	    Route::get('/settingsthresholds/threshold_delete/{thresholdID}', ['as'=>'settingsthresholds.threshold_delete','uses'=>'ThresholdController@threshold_delete']);




		Route::get('/arrivalinformationlist', 'WarehouseController@arrivalInformationListForm'); 
		Route::post('/arrivalinformationlist', 'WarehouseController@arrivalInformationList');

		Route::get('/arrivalqualityinformationlist', 'ArrivalQualityController@arrivalQualityInformationListForm'); 
		Route::post('/arrivalqualityinformationlist', 'ArrivalQualityController@arrivalQualityInformationList');

		Route::get('/settingscountry', 'SettingsController@settingsCountryForm');
		Route::post('/settingscountry', 'SettingsController@settingsCountry');
	    Route::get('/settingscountry/country_delete/{countryID}', ['as'=>'settingscountry.country_delete','uses'=>'SettingsController@country_delete']);

	    Route::get('/settingsregion', 'SettingsController@settingsRegionForm');
	    Route::post('/settingsregion', 'SettingsController@settingsRegion');
	    Route::get('/settingsregion/getwarehouses/{regionID}', ['as'=>'settingsregion.getwarehouses','uses'=>'SettingsController@getWarehouses']);
	    Route::get('/region_delete/{id}', 'SettingsController@region_delete');
	    Route::get('/settingsregion/region_delete/{regionID}', ['as'=>'settingsregion.region_delete','uses'=>'SettingsController@region_delete']);

	    Route::get('/settingswarehouse', 'SettingsController@settingsWarehouseForm'); 
		Route::post('/settingswarehouse', 'SettingsController@settingsWarehouse');
	    Route::get('/settingswarehouse/warehouse_delete/{warehouseID}', ['as'=>'settingswarehouse.warehouse_delete','uses'=>'SettingsController@warehouse_delete']);

		Route::get('/settingsgrades', 'SettingsController@settingsGradeForm');
		Route::post('/settingsgrades', 'SettingsController@settingsGrade');
		Route::get('/settingsgrades/getcoffeegradedetails/{gradeID}', ['as'=>'settingsgrades.getcoffeegradedetails','uses'=>'SettingsController@getCoffeeGradeDetails']);
		Route::get('/settingsgrade/grade_delete/{gradeID}', ['as'=>'settingsgrade.grade_delete','uses'=>'SettingsController@grade_delete']);

	    Route::get('/settingsquality', 'SettingsController@settingsQualityForm');
	    Route::post('/settingsquality', 'SettingsController@settingsQuality');
	    Route::get('/settingsquality/quality_delete/{qualityID}', ['as'=>'settingsquality.quality_delete','uses'=>'SettingsController@quality_delete']);

	    Route::get('/settingscup', 'SettingsController@settingsCupForm');
	    Route::post('/settingscup', 'SettingsController@settingsCup');
	    Route::get('/settingscup/cup_delete/{cupID}', ['as'=>'settingscup.cup_delete','uses'=>'SettingsController@cup_delete']);

	    Route::get('/settingsraw', 'SettingsController@settingsRawForm');
	    Route::post('/settingsraw', 'SettingsController@settingsRaw');
	    Route::get('/settingsraw/raw_delete/{rawID}', ['as'=>'settingsraw.raw_delete','uses'=>'SettingsController@raw_delete']);

	    Route::get('/settingsscreens', 'SettingsController@settingsScreenForm');
	    Route::post('/settingsscreens', 'SettingsController@settingsScreen');
	    Route::get('/settingsscreens/screen_delete/{screenID}', ['as'=>'settingsscreens.screen_delete','uses'=>'SettingsController@screen_delete']);

	    Route::get('/settingsbaskets', 'SettingsController@settingsBasketForm');
	    Route::post('/settingsbaskets', 'SettingsController@settingsBasket');
	    Route::get('/settingsbaskets/basket_delete/{basketID}', ['as'=>'settingsbaskets.basket_delete','uses'=>'SettingsController@basket_delete']);

	    Route::get('/settingscertifications', 'SettingsController@settingsCertificationForm');
	    Route::post('/settingscertifications', 'SettingsController@settingsCertification');
	    Route::get('/certification_delete/{id}', 'SettingsController@certification_delete');
	    Route::get('/settingscertifications/certification_delete/{certificationID}', ['as'=>'settingscertifications.certification_delete','uses'=>'SettingsController@certification_delete']);

	    Route::get('/settingsclient', 'SettingsController@settingsClientForm');
	    Route::post('/settingsclient', 'SettingsController@settingsClient');
	    Route::get('/settingsclient/client_delete/{clientID}', ['as'=>'settingsclient.client_delete','uses'=>'SettingsController@client_delete']);

	    Route::get('/settingsbuyers', 'SettingsController@settingsBuyerForm');
	    Route::post('/settingsbuyers', 'SettingsController@settingsBuyer');
	    Route::get('/settingsbuyers/buyer_delete/{buyerID}', ['as'=>'settingsbuyers.buyer_delete','uses'=>'SettingsController@buyer_delete']);

	    Route::get('/settingsdepartment', 'SettingsController@settingsDepartmentForm');
	    Route::post('/settingsdepartment', 'SettingsController@settingsDepartment');
	    Route::get('/settingsdepartment/department_delete/{departmentID}', ['as'=>'settingsdepartment.department_delete','uses'=>'SettingsController@department_delete']);

	    Route::get('/settingsgrowers', 'SettingsController@settingsGrowerForm');
	    Route::post('/settingsgrowers', 'SettingsController@settingsGrower');
	    Route::get('/settingsgrowers/grower_delete/{growerID}', ['as'=>'settingsgrowers.grower_delete','uses'=>'SettingsController@grower_delete']);

	    Route::get('/settingsseasons', 'SettingsController@settingsSeasonForm');
	    Route::post('/settingsseasons', 'SettingsController@settingsSeason');
	    Route::get('/settingsseasons/season_delete/{seasonID}', ['as'=>'settingsseasons.season_delete','uses'=>'SettingsController@season_delete']);

	    Route::get('/settingsfreights', 'SettingsController@settingsFreightForm');
	    Route::post('/settingsfreights', 'SettingsController@settingsFreight');
	    Route::get('/settingsfreights/freight_delete/{freightID}', ['as'=>'settingsfreights.freight_delete','uses'=>'SettingsController@freight_delete']);

	    Route::get('/settingscountys', 'SettingsController@settingsCountyForm');
	    Route::post('/settingscountys', 'SettingsController@settingsCounty');
	    Route::get('/settingscountys/county_delete/{countyID}', ['as'=>'settingscountys.county_delete','uses'=>'SettingsController@county_delete']);

	    Route::get('/settingsgrowertypes', 'SettingsController@settingsGrowertypeForm');
	    Route::post('/settingsgrowertypes', 'SettingsController@settingsGrowertype');
	    Route::get('/settingsgrowertypes/growertype_delete/{growerID}', ['as'=>'settingsgrowertypes.growertype_delete','uses'=>'SettingsController@growertype_delete']);

	    Route::get('/settingsinternalbaskets', 'SettingsController@settingsInternalbasketForm');
	    Route::post('/settingsinternalbaskets', 'SettingsController@settingsInternalbasket');
	    Route::get('/settingsinternalbaskets/internalbasket_delete/{growerID}', ['as'=>'settingsinternalbaskets.internalbasket_delete','uses'=>'SettingsController@internalbasket_delete']);

	    Route::get('/settingsmills', 'SettingsController@settingsMillForm');
	    Route::post('/settingsmills', 'SettingsController@settingsMill');
	    Route::get('/settingsmills/mill_delete/{millID}', ['as'=>'settingsmills.mill_delete','uses'=>'SettingsController@mill_delete']);

	    Route::get('/settingsmovementinstructiontypes', 'SettingsController@settingsMovementInstructionTypeForm');
	    Route::post('/settingsmovementinstructiontypes', 'SettingsController@settingsMovementInstructionType');
	    Route::get('/settingsmovementinstructiontypes/mit_delete/{mitID}', ['as'=>'settingsmovementinstructiontypes.mit_delete','uses'=>'SettingsController@mit_delete']);

	    Route::get('/settingspackaging', 'SettingsController@settingsPackagingForm');
	    Route::post('/settingspackaging', 'SettingsController@settingsPackaging');
	    Route::get('/settingspackaging/package_delete/{packageID}', ['as'=>'settingspackaging.package_delete','uses'=>'SettingsController@package_delete']);

	    Route::get('/settingsprocessinginstructions', 'SettingsController@settingsProcessingInstructionForm');
	    Route::post('/settingsprocessinginstructions', 'SettingsController@settingsrocessingInstruction');
	    Route::get('/settingsprocessinginstructions/pri_delete/{priID}', ['as'=>'settingsprocessinginstructions.pri_delete','uses'=>'SettingsController@processinginstruction_delete']);

	    Route::get('/settingsprocess', 'SettingsController@settingsProcessForm');
	    Route::post('/settingsprocess', 'SettingsController@settingsProcess');
	    Route::get('/settingsprocess/process_delete/{packageID}', ['as'=>'settingsprocess.process_delete','uses'=>'SettingsController@process_delete']);

	    Route::get('/settingsprocessingresultstype', 'SettingsController@settingsProcessingResultTypeForm');
	    Route::post('/settingsprocessingresultstype', 'SettingsController@settingsProcessingResultType');
	    Route::get('/prt_delete/{id}', 'SettingsController@prt_delete');
	    Route::get('/settingsprocess/prt_delete/{prtID}', ['as'=>'settingsprocess.prt_delete','uses'=>'SettingsController@prt_delete']);

	    Route::get('/settingsprovisionalpurpose', 'SettingsController@settingsProvisionalPurposeForm');
	    Route::post('/settingsprovisionalpurpose', 'SettingsController@settingsProvisionalPurpose');
	    Route::get('/settingsprovisionalpurpose/provisional_purpose_delete/{purposeID}', ['as'=>'settingsprovisionalpurpose.provisional_purpose_delete','uses'=>'SettingsController@provisional_purpose_delete']);

	    Route::get('/settingsstatuses', 'SettingsController@settingsSaleStatusForm');
	    Route::post('/settingsstatuses', 'SettingsController@settingsSaleStatus');
	    Route::get('/settingsstatuses/sale_status_delete/{statusID}', ['as'=>'settingsstatuses.sale_status_delete','uses'=>'SettingsController@sale_status_delete']);

	    Route::get('/settingstradingmonths', 'SettingsController@settingsTradingMonthForm');
	    Route::post('/settingstradingmonths', 'SettingsController@settingsTradingMonth');
	    Route::get('/settingstradingmonths/trading_month_delete/{monthID}', ['as'=>'settingstradingmonths.trading_month_delete','uses'=>'SettingsController@trading_month_delete']);

	    Route::get('/settingstransporters', 'SettingsController@settingsTransportersForm');
	    Route::post('/settingstransporters', 'SettingsController@settingsTransporters');
	    Route::get('/settingstransporters/transporter_delete/{trpID}', ['as'=>'settingstransporters.transporter_delete','uses'=>'SettingsController@transporter_delete']);


	    Route::get('/settingsweighscale', 'WeighScaleController@settingsWeighScaleForm');
	    Route::post('/settingsweighscale', 'WeighScaleController@settingsWeighScale');
	    Route::get('/settingsweighscale/weigh_scale_delete/{wghID}', ['as'=>'settingsweighscale.weigh_scale_delete','uses'=>'WeighScaleController@weigh_scale_delete']);

	    Route::get('/settingsyears', 'SettingsController@settingsYearForm');
	    Route::post('/settingsyears', 'SettingsController@settingsYear');
	    Route::get('/settingsyears/year_delete/{yearID}', ['as'=>'settingsyears.year_delete','uses'=>'SettingsController@year_delete']);

	    Route::get('/settingsmenu', 'SettingsController@settingsMenuForm');
	    Route::post('/settingsmenu', 'SettingsController@settingsMenu');
	    Route::get('/settingsmenu/menu_delete/{menuID}', ['as'=>'settingsmenu.menu_delete','uses'=>'SettingsController@menu_delete']);
	    Route::get('/settingsdepartment/getmenus/{departmentID}', ['as'=>'settingsdepartment.getmenus','uses'=>'SettingsController@getDepartmentMenus']);
	    Route::get('/settingsdepartment/getmenulist/{departmentID}', ['as'=>'settingsdepartment.getmenulist','uses'=>'SettingsController@getMenuList']);
	    Route::get('/settingsdepartment/assignMenu/{departmentID}/{menuID}/{roles}', ['as'=>'settingsdepartment.assignmenu','uses'=>'SettingsController@assignMenu']);
		Route::get('/settingsdepartment/revokeMenu/{departmentID}/{menuID}', ['as'=>'settingsdepartment.revokemenu','uses'=>'SettingsController@revokeMenu']);
		
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
	 
		

		Route::get('/salescontract', 'DisposalController@salesContractForm'); 
		Route::post('/salescontract', 'DisposalController@salesContract'); 

		Route::get('/confirmallocations', 'DisposalController@confirmAllocationsForm'); 
		Route::post('/confirmallocations', 'DisposalController@confirmAllocations'); 



		Route::get('/salesshipmentdetails', 'ShipmentController@salesShipmentDetailsForm'); 
		Route::post('/salesshipmentdetails', 'ShipmentController@salesShipmentDetails'); 

		Route::get('/noteweight', 'WeightNoteController@salesWeightNoteForm'); 
		Route::post('/noteweight', 'WeightNoteController@salesWeightNote'); 

		Route::get('/notedispatch', 'DispatchNoteController@salesDispatchNoteForm'); 
		Route::post('/notedispatch', 'DispatchNoteController@salesDispatchNote'); 

		Route::get('/allocate', 'DisposalController@allocateForm'); 
		Route::post('/allocate', 'DisposalController@allocate'); 


		Route::get('/pendingallocations', 'DisposalController@PendingAllocationsForm'); 	
		Route::get('/pendingallocations/getpendinginstructions', ['as'=>'pendingallocations.getpendinginstructions','uses'=>'DisposalController@getpendinginstructions']); 

		Route::post('/pendingallocations', 'DisposalController@pendingallocations');
		Route::get('/update/{id}', 'DisposalController@update'); 


		//rates routes added
		Route::get('/settingsprocessrates', 'RatesController@settingsProcessRatesForm');
	    Route::post('/settingsprocessrates', 'RatesController@settingsProcessRates');
		Route::get('/settingsprocessrates/process_rates_delete/{ID}', ['as'=>'settingsprocessrates.process_rates_delete','uses'=>'RatesController@process_rate_delete']);
		
		Route::get('/settingsteams', 'RatesController@settingsTeamsForm');
	    Route::post('/settingsteams', 'RatesController@settingsTeams');
		Route::get('/settingsteams/teams_delete/{ID}', ['as'=>'settingsteams.teams_delete','uses'=>'RatesController@teams_delete']);
		
		Route::get('/processchargerates', 'RatesController@ProcessChargesResults');

		Route::get('processchargerates/getreport', ['as'=>'processchargerates.getreport','uses'=>'RatesController@getProcessingCharges']);

		Route::get('/movementspecial/confirmMovementWithRate/{ref}/{warehouseFrom}/{service}/{team}', ['as'=>'movementspecial.confirmmovementspecialwithrate','uses'=>'MovementController@confirmMovementWithRate']);

		Route::get('/settingswarehouserates', 'RatesController@WarehouseRatesForm');
	    Route::post('/settingswarehouserates', 'RatesController@WarehouseRates');
		Route::get('/settingswarehouserates/warehouse_rate_delete/{ID}', ['as'=>'settingswarehouserates.warehouse_rate_delete','uses'=>'RatesController@warehouse_rate_delete']);

		Route::get('/settingstransportrates', 'RatesController@TransportRatesForm');
	    Route::post('/settingstransportrates', 'RatesController@TransportRates');
		Route::get('/settingstransportrates/transport_rate_delete/{ID}', ['as'=>'settingstransportrates.transport_rate_delete','uses'=>'RatesController@transport_rate_delete']);

		Route::get('/processrates/CalculateProcessResultsRate/{ref}/{processingType}/{service}/{team}', ['as'=>'processrates.calculateprocessresultsrate','uses'=>'RatesController@CalculateProcessResultsRate']);

		Route::get('/processrates/CalculateStuffingRate/{ref}/{packages}/{service}/{team}', ['as'=>'processrates.calculatestuffingrate','uses'=>'RatesController@CalculateStuffingRate']);

		Route::get('/movementspecial/printMovementWithRate/{ref}/{warehouseFrom}/{service}/{team}', ['as'=>'movementspecial.printmovementspecialwithrate','uses'=>'MovementController@printMovementWithRate']);


		Route::get('/processrates/printProcessWithRate/{ref}/{service}/{team}', ['as'=>'processrates.printprocesswithrate','uses'=>'RatesController@printProcessWithRate']);

		Route::get('/processrates/printStuffingWithRate/{ref}/{service}/{team}', ['as'=>'processrates.printstuffingwithrate','uses'=>'RatesController@printStuffingWithRate']);


		Route::get('/settingspriceunits', 'SettingsController@settingsPriceunitsForm');
		Route::post('/settingspriceunits', 'SettingsController@settingsPriceunits');
		Route::get('/settingspriceunits/punit_delete/{puID}', ['as'=>'settingspriceunits.punit_delete','uses'=>'SettingsController@priceunit_delete']);
		Route::get('/warehousechargereport', 'RatesController@WarehouseChargesResults');

		Route::get('warehousechargerates/getreport', ['as'=>'warehousechargerates.getreport','uses'=>'RatesController@getWarehouseCharges']);


});




