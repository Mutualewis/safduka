<?php namespace Ngea\Http\Controllers;

use Input;
use confirm;
use DB;
use ask;
use Illuminate\Http\Request;
use Ngea\Http\Controllers\Controller;
use View;

use Ngea\Parchment;
use Ngea\ParchmentType;
use Ngea\Growers;
use Ngea\CropType;
use Ngea\MillingStatus;
use Ngea\outturn_with_names;
use Ngea\bulk_outturn_with_names;
use Ngea\Season;
use Ngea\bulkoutturn;
use Ngea\CoffeeClass;
use Ngea\OutturnQuality;
use Ngea\QualityAnalysis;
use Ngea\clean_with_names;

use Ngea\SaleStatus;
use Ngea\CoffeeGrade;
use Ngea\SaleableStatus;
use Ngea\cleancoffee;

use Ngea\coffeewarrant;
use Ngea\buyer;
use Ngea\saleinfo;
use Ngea\SaleType;
use Ngea\Sale;

use  Ngea\Warehouse;
use  Ngea\Region;

use Nayjest\Grids\Grid;
use Nayjest\Grids\Components\Base\RenderableRegistry;
use Nayjest\Grids\Components\ColumnHeadersRow;
use Nayjest\Grids\Components\ColumnsHider;
use Nayjest\Grids\Components\CsvExport;
use Nayjest\Grids\Components\ExcelExport;
use Nayjest\Grids\Components\Filters\DateRangePicker;
use Nayjest\Grids\Components\FiltersRow;
use Nayjest\Grids\Components\HtmlTag;
use Nayjest\Grids\Components\Laravel5\Pager;
use Nayjest\Grids\Components\OneCellRow;
use Nayjest\Grids\Components\RecordsPerPage;
use Nayjest\Grids\Components\RenderFunc;
use Nayjest\Grids\Components\ShowingRecords;
use Nayjest\Grids\Components\TFoot;
use Nayjest\Grids\Components\THead;
use Nayjest\Grids\Components\TotalsRow;
use Nayjest\Grids\DbalDataProvider;
use Nayjest\Grids\EloquentDataProvider;
use Nayjest\Grids\FieldConfig;
use Nayjest\Grids\FilterConfig;
use Nayjest\Grids\GridConfig;

//use PDF;
use PDF;
use Activity;
use Excel;
// use Anouar\Fpdf\Fpdf as Fpdf;

use Ngea\country;


use Ngea\booking;
use Ngea\booking_with_names;
use Ngea\booking_items;
use Ngea\booking_items_with_names;
use Ngea\trading_months;
use Ngea\Mill;
use Ngea\mills_region;
use Ngea\warehouses_region;
use Ngea\Certification;
use Ngea\coffee_certification;
use Ngea\coffee_details;
use Ngea\seller;
use Ngea\sale_lots;
use Ngea\quality_parameters;
use Ngea\processing;
use Ngea\screens;
use Ngea\cupscore;
use Ngea\rawscore;
use Ngea\quality_details;

use Ngea\greencomments;
use Ngea\direct_sale;
use Ngea\sale_status;
use Ngea\basket;
use Ngea\purchase;
use Ngea\User;
use Ngea\BasketAuto;
use Auth;

use delete;

use Mail;


class ConfirmationController extends Controller {

    public function confirmCatalogueForm (Request $request){
    	$id = NULL;
    	$Season = Season::all(['id', 'csn_season']);
    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
    	$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
    	$Certification = Certification::all(['id', 'crt_name']);
    	$buyer = buyer::all(['id', 'cb_name']);   	


    	$sale_status = sale_status::all(['id', 'sst_name']);
    	$Warehouse = NULL;
    	$Mill = NULL;

    	return View::make('confirmcatalogue', compact('id', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'largest', 'greensize', 'greencolor', 'greendefects', 'processing', 'cupscore', 'rawscore', 'screens', 'buyer', 'sale_status'));

    }


    public function confirmCatalogue (Request $request){
    	$id = NULL;

    	$Warehouse = NULL;
    	$Mill = NULL;
    	$sale_lots = NULL;


    	$greensize = quality_parameters::where('qg_id', '1')->get();
    	$greencolor = quality_parameters::where('qg_id', '2')->get();
    	$greendefects = quality_parameters::where('qg_id', '3')->get();
    	$processing = processing::all(['id', 'prcss_name']);
    	$buyer = buyer::all(['id', 'cb_name']);

    	$sale_status = sale_status::all(['id', 'sst_name']);

    	$screens = screens::all(['id', 'scr_name']);

    	$cupscore = cupscore::all(['id', 'cp_score', 'cp_quality']);
    	$rawscore = rawscore::all(['id', 'rw_score', 'rw_quality']);



    	$Certification = Certification::all(['id', 'crt_name']);


		$basket = basket::where('ctr_id', Input::get('country'))->get();
		// $data['dnt'] = (\Input::has('dnt')) ? 1 : 0;
		// $data['dnt'] = $request->input('dnt', 1);
		// $form->save($data);
		//$request->save($data);
		// print_r(Input::get('dnt')." search". Input::get('searchButton'));


		if (NULL !== Input::get('confirmcatalogue')){
			$this->validate($request, [
			'country' => 'required',  'sale_season' => 'required', 'sale' => 'required',
			]);

			$country = Input::get('country');
			$season = Input::get('sale_season');
			$sale = Input::get('sale');
	     	
            $user_data = Auth::user();
            $user = $user_data ->usr_name;

			Sale::where('id', '=', $sale)
				->update(['sl_catalogue_confirmedby' => $user]);
			$request->session()->flash('alert-success', 'Sale Catalogue Confirmed!!');

			Activity::log('Confirmed catalogue for sale '.$sale);

	    	$Season = Season::all(['id', 'csn_season']);
	    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
	    	$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
	    	$region = Region::where('ctr_id', Input::get('country'))->get();

	    	if(Input::get('country') != NULL){
		       	$Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
		    	$Mill = mills_region::where('ctr_id', Input::get('country'))->get(); 		
		    	$seller = seller::where('ctr_id', Input::get('country'))->get(); 		
	    	}
	    	$sale = NULL;

			return View::make('confirmcatalogue', compact('id', 
				'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr'));		

    	} else {
	    	$Season = Season::all(['id', 'csn_season']);
	    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
	    	$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
	    	$region = Region::where('ctr_id', Input::get('country'))->get();

	    	if(Input::get('country') != NULL){
		       	$Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
		    	$Mill = mills_region::where('ctr_id', Input::get('country'))->get(); 		
		    	$seller = seller::where('ctr_id', Input::get('country'))->get(); 		
	    	}


	    	if($request->has('country')){
	    		if($request->has('sale_season') & Input::get('sale_season') !== "Sale Season" ){

	    				if($request->has('sale')  && Input::get('sale') != 'Sale No.'){
		    				// $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
		    				if($request->has('seller')){
			    				$sale = Sale::where('id', '=', Input::get('sale'))->where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->first();
			    				// print_r($sale->sl_catalogue_confirmedby);
			    				if ($sale->sl_catalogue_confirmedby != NULL){
			    					$request->session()->flash('alert-warning', 'Catalogue for Sale '.$sale->sl_no.' has already been confirmed by '.$sale->sl_catalogue_confirmedby);
			    					// $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
			    					$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby', null)->where('sl_quality_confirmedby', null)->where('sl_auction_confirmedby', null)->get();
									$cid = Input::get('country');
									$csn_season = Input::get('sale_season');
									// $saleid = Input::get('sale');
									$slr = Input::get('seller');


									return View::make('confirmcatalogue', compact('id', 
										'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr'));	
			    				} else {
			    					// $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
			    					$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby', null)->where('sl_quality_confirmedby', null)->where('sl_auction_confirmedby', null)->get();
									$request->session()->flash('alert-success', 'Sale found!!');
									$cid = Input::get('country');
									$csn_season = Input::get('sale_season');
									$saleid = Input::get('sale');
									$sale_lots = sale_lots::where('slid', $saleid)->where('slrid', Input::get('seller'))->get(); 
									$slr = Input::get('seller');


									return View::make('confirmcatalogue', compact('id', 
										'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr'));				    					
			    				}


		    				} else {
		    					$sale = Sale::where('id', '=', Input::get('sale'))->where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->first();
			    				if ($sale->sl_catalogue_confirmedby != NULL){
			    					$request->session()->flash('alert-warning', 'Catalogue for Sale '.$sale->sl_no.' has already been confirmed by '.$sale->sl_catalogue_confirmedby);
			    					// $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
			    					$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby', null)->where('sl_quality_confirmedby', null)->where('sl_auction_confirmedby', null)->get();
									$cid = Input::get('country');
									$csn_season = Input::get('sale_season');
									// $saleid = Input::get('sale');
									$slr = Input::get('seller');


									return View::make('confirmcatalogue', compact('id', 
										'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr'));	
			    				} else {
				    				// $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
				    				$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby', null)->where('sl_quality_confirmedby', null)->where('sl_auction_confirmedby', null)->get();
									$request->session()->flash('alert-success', 'Sale found!!');
									$cid = Input::get('country');
									$csn_season = Input::get('sale_season');
									$saleid = Input::get('sale');
									$sale_lots = sale_lots::where('slid', $saleid)->get(); 


									return View::make('confirmcatalogue', compact('id', 
										'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket'));				    					
			    				}

		    					
		    				}

	    				} else {
		    				// $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
		    				// $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
		    				$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby', null)->where('sl_quality_confirmedby', null)->where('sl_auction_confirmedby', null)->get();
							$request->session()->flash('alert-success', 'Sale found!!');
							$cid = Input::get('country');
							$csn_season = Input::get('sale_season');
							return View::make('confirmcatalogue', compact('id', 
								'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket'));					
	    				}

	    			


	    		} else {
	    				// $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
	    				// $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
	    				$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby', null)->where('sl_quality_confirmedby', null)->where('sl_auction_confirmedby', null)->get();
						// $request->session()->flash('alert-success', 'Sale found!!');
						$cid = Input::get('country');
						$csn_season = Input::get('sale_season');
						return View::make('confirmcatalogue', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket'));	
				}
	    	} else {

				return redirect('confirmcatalogue')
	                        ->withErrors("Please select a valid Country!!")->withInput();
			}

	    	return View::make('confirmcatalogue', compact('id', 'Season', 'country', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket'));		
    	}
    


    



    }






    public function confirmQualityCatalogueForm (Request $request){
    	$id = NULL;
    	$Season = Season::all(['id', 'csn_season']);
    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
    	$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
    	$Certification = Certification::all(['id', 'crt_name']);
    	$buyer = buyer::all(['id', 'cb_name']);   	


    	$sale_status = sale_status::all(['id', 'sst_name']);
    	$Warehouse = NULL;
    	$Mill = NULL;

    	return View::make('confirmqualitycatalogue', compact('id', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'largest', 'greensize', 'greencolor', 'greendefects', 'processing', 'cupscore', 'rawscore', 'screens', 'buyer', 'sale_status'));

    }


    public function confirmQualityCatalogue (Request $request){

    	$id = NULL;

    	$Warehouse = NULL;

    	$Mill = NULL;

    	$greensize = quality_parameters::where('qg_id', '1')->get();
    	
    	$greencolor = quality_parameters::where('qg_id', '2')->get();
    	
    	$greendefects = quality_parameters::where('qg_id', '3')->get();
    	
    	$processing = processing::all(['id', 'prcss_name']);
    	
    	$buyer = buyer::all(['id', 'cb_name']);

    	$sale_status = sale_status::all(['id', 'sst_name']);

    	$screens = screens::all(['id', 'scr_name']);

    	$cupscore = cupscore::all(['id', 'cp_score', 'cp_quality']);

    	$rawscore = rawscore::all(['id', 'rw_score', 'rw_quality']);

    	$Certification = Certification::all(['id', 'crt_name']);

		$basket = basket::where('ctr_id', Input::get('country'))->get();

		// $basket_auto = BasketAuto::where('ctr_id', Input::get('country'))->get();		

		if (NULL !== Input::get('confirmqualitycatalogue')){

	     	$this->validate($request, [
		            'country' => 'required',  'sale_season' => 'required', 'sale' => 'required',
		        ]);
     
			$country = Input::get('country');

			$season = Input::get('sale_season');

			$sale = Input::get('sale');

			$count_green = Input::get('count_green');

			$count_process = Input::get('count_process');

			$count_screen = Input::get('count_screen');

			$count_raw = Input::get('count_raw');

			$count_cup = Input::get('count_cup');

			$lot = Input::get('lot');

            $user_data = Auth::user();

            $user = $user_data ->usr_name;

            foreach ($lot as $key_lt => $value_lt) {

            	$bs_id = 28;

            	$coffee_details = coffee_details::where('id', $value_lt)->first();

            	$quality_details = quality_details::where('cfd_id', $value_lt)->first();

            	$lot_cup = $quality_details->cp_id;

            	$lot_grade = $coffee_details->cgrad_id;

            	$basket_auto = BasketAuto::where('cgrad_id', $lot_grade)->where('cgrad_id', $lot_grade)->first();	

            	if ($basket_auto != null) {
            		
            		$bs_id = $basket_auto->bs_id;

            	}

            	coffee_details::where('id', '=', $value_lt)
				->update(['bs_id' => $bs_id]);

            }

			Sale::where('id', '=', $sale)
				->update(['sl_quality_confirmedby' => $user]);

			$request->session()->flash('alert-success', 'Sale Catalogue Confirmed!!');

			Activity::log('Confirmed catalogue quality details for sale '.$sale);

			return redirect('stocklist');   	

    	} else {

	    	$Season = Season::all(['id', 'csn_season']);

	    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);

	    	$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);

	    	$region = Region::where('ctr_id', Input::get('country'))->get();

	    	if(Input::get('country') != NULL){

		       	$Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();

		    	$Mill = mills_region::where('ctr_id', Input::get('country'))->get(); 		

		    	$seller = seller::where('ctr_id', Input::get('country'))->get(); 		

	    	}


	    	if($request->has('country')){
	    		if($request->has('sale_season') & Input::get('sale_season') !== "Sale Season" ){

	    				if($request->has('sale')  && Input::get('sale') != 'Sale No.'){
		    				// $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
		    				$sale = Sale::where('id', '=', Input::get('sale'))->where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->first();
		    				if ($sale != null) {

			    				if ($sale->sl_catalogue_confirmedby != NULL){

				    				if($request->has('seller')){
						    		
						    				$sale = Sale::where('id', '=', Input::get('sale'))->where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->first();
						    				// print_r($sale->sl_catalogue_confirmedby);
						    				if ($sale->sl_quality_confirmedby != NULL){
						    					$request->session()->flash('alert-warning', 'Catalogue Quality for Sale '.$sale->sl_no.' has already been confirmed by '.$sale->sl_quality_confirmedby);
						    					// $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
						    					$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby','!=', null)->where('sl_quality_confirmedby', null)->where('sl_auction_confirmedby', null)->get();
												$cid = Input::get('country');
												$csn_season = Input::get('sale_season');
												// $saleid = Input::get('sale');
												$slr = Input::get('seller');


												return View::make('confirmqualitycatalogue', compact('id', 
													'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr'));	
						    				} else {
						    					$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby','!=', null)->where('sl_quality_confirmedby', null)->where('sl_auction_confirmedby', null)->get();
												$request->session()->flash('alert-success', 'Sale found!!');
												$cid = Input::get('country');
												$csn_season = Input::get('sale_season');
												$saleid = Input::get('sale');
												$sale_lots = sale_lots::where('slid', $saleid)->where('slrid', Input::get('seller'))->get(); 
												$slr = Input::get('seller');


												return View::make('confirmqualitycatalogue', compact('id', 
													'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr'));				    					
						    				}


					    				} else {
					    					$sale = Sale::where('id', '=', Input::get('sale'))->where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->first();
						    				if ($sale->sl_quality_confirmedby != NULL){
						    					$request->session()->flash('alert-warning', 'Catalogue Quality for Sale '.$sale->sl_no.' has already been confirmed by '.$sale->sl_quality_confirmedby);
						    					$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby','!=', null)->where('sl_quality_confirmedby', null)->where('sl_auction_confirmedby', null)->get();
												$cid = Input::get('country');
												$csn_season = Input::get('sale_season');
												$slr = Input::get('seller');


												return View::make('confirmqualitycatalogue', compact('id', 
													'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr'));	
						    				} else {
							    				$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby','!=', null)->where('sl_quality_confirmedby', null)->where('sl_auction_confirmedby', null)->get();
												$request->session()->flash('alert-success', 'Sale found!!');
												$cid = Input::get('country');
												$csn_season = Input::get('sale_season');
												$saleid = Input::get('sale');
												$sale_lots = sale_lots::where('slid', $saleid)->get(); 


												return View::make('confirmqualitycatalogue', compact('id', 
													'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket'));				    					
						    				}

					    					
				    				}

				    			} else {
			    					$request->session()->flash('alert-warning', 'Catalogue for Sale '.$sale->sl_no.' has not yet been confirmed. Please confirm to continue.');
			    					$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby','!=', null)->where('sl_quality_confirmedby', null)->where('sl_auction_confirmedby', null)->get();

									$cid = Input::get('country');
									$csn_season = Input::get('sale_season');
									$slr = Input::get('seller');


									return View::make('confirmqualitycatalogue', compact('id', 
										'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr'));

				    			}


		    				}


	    				} else {
		    				$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby','!=', null)->where('sl_quality_confirmedby', null)->where('sl_auction_confirmedby', null)->get();
							$request->session()->flash('alert-success', 'Sale found!!');
							$cid = Input::get('country');
							$csn_season = Input::get('sale_season');
							return View::make('confirmqualitycatalogue', compact('id', 
								'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket'));					
	    				}

	    			


	    		} else {
	    				$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby','!=', null)->where('sl_quality_confirmedby', null)->where('sl_auction_confirmedby', null)->get();
						$cid = Input::get('country');
						$csn_season = Input::get('sale_season');
						return View::make('confirmqualitycatalogue', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket'));	
				}
	    	} else {

				return redirect('confirmqualitycatalogue')
	                        ->withErrors("Please select a valid Country!!")->withInput();
			}

	    	return View::make('confirmqualitycatalogue', compact('id', 'Season', 'country', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket'));		
    	}
    
}

    


    public function confirmAuctionDetailsForm (Request $request){
    	$id = NULL;
    	$Season = Season::all(['id', 'csn_season']);
    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
    	$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
    	$Certification = Certification::all(['id', 'crt_name']);
    	$buyer = buyer::all(['id', 'cb_name']);   	


    	$sale_status = sale_status::all(['id', 'sst_name']);
    	$Warehouse = NULL;
    	$Mill = NULL;

    	return View::make('confirmauctiondetails', compact('id', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'largest', 'greensize', 'greencolor', 'greendefects', 'processing', 'cupscore', 'rawscore', 'screens', 'buyer', 'sale_status'));

    }


    public function confirmAuctionDetails (Request $request){
    	$id = NULL;

    	$Warehouse = NULL;
    	$Mill = NULL;


    	$greensize = quality_parameters::where('qg_id', '1')->get();
    	$greencolor = quality_parameters::where('qg_id', '2')->get();
    	$greendefects = quality_parameters::where('qg_id', '3')->get();
    	$processing = processing::all(['id', 'prcss_name']);
    	$buyer = buyer::all(['id', 'cb_name']);

    	$sale_status = sale_status::all(['id', 'sst_name']);

    	$screens = screens::all(['id', 'scr_name']);

    	$cupscore = cupscore::all(['id', 'cp_score', 'cp_quality']);
    	$rawscore = rawscore::all(['id', 'rw_score', 'rw_quality']);



    	$Certification = Certification::all(['id', 'crt_name']);


		$basket = basket::where('ctr_id', Input::get('country'))->get();
		// $data['dnt'] = (\Input::has('dnt')) ? 1 : 0;
		// $data['dnt'] = $request->input('dnt', 1);
		// $form->save($data);
		//$request->save($data);
		// print_r(Input::get('dnt')." search". Input::get('searchButton'));


		if (NULL !== Input::get('confirmauctiondetails')){
			$this->validate($request, [
			'country' => 'required',  'sale_season' => 'required', 'sale' => 'required',
			]);

			$country = Input::get('country');
			$season = Input::get('sale_season');
			$sale = Input::get('sale');

			$count_buyer = Input::get('count_buyer');
			$count_price = Input::get('count_price');
			$count_status = Input::get('count_status');
			$count_basket = Input::get('count_basket');

            $user_data = Auth::user();
            $user = $user_data ->usr_name;

            $sale_hedge = Sale::where('id', $sale)->first();
            $sale_hedge = $sale_hedge->sl_hedge;

            if ($sale_hedge == null || $sale_hedge == "0.000") {
				return redirect('confirmauctiondetails')
                        		->withErrors("Please enter hedge details first!! ")
                        		->withInput();
            }

			Sale::where('id', '=', $sale)
				->update(['sl_auction_confirmedby' => $user]);
			$request->session()->flash('alert-success', 'Sale Catalogue Confirmed!!');

			$sale = Sale::where('id', '=', $sale)->first();
			Activity::log('Confirmed catalogue auction details for sale '.$sale->sl_no);
			return redirect('confirmauctiondetails');
	     	



    	} else {
	    	$Season = Season::all(['id', 'csn_season']);
	    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
	    	$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
	    	$region = Region::where('ctr_id', Input::get('country'))->get();

	    	if(Input::get('country') != NULL){
		       	$Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
		    	$Mill = mills_region::where('ctr_id', Input::get('country'))->get(); 		
		    	$seller = seller::where('ctr_id', Input::get('country'))->get(); 		
	    	}


	    	if($request->has('country')){
	    		if($request->has('sale_season') & Input::get('sale_season') !== "Sale Season" ){

	    				if($request->has('sale')  && Input::get('sale') != 'Sale No.' && Input::get('sale') != 'No Sale Found'){
		    				// $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
		    				$sale = Sale::where('id', '=', Input::get('sale'))->where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->first();
		    				if ($sale->sl_catalogue_confirmedby != NULL){
				    				if($request->has('seller')){
					    				$sale = Sale::where('id', '=', Input::get('sale'))->where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->first();
					    				// print_r($sale->sl_catalogue_confirmedby);
					    				if ($sale->sl_auction_confirmedby != NULL){
					    					$request->session()->flash('alert-warning', 'Catalogue Auction Details for Sale '.$sale->sl_no.' has already been confirmed by '.$sale->sl_auction_confirmedby);
					    					// $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
					    					$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby','!=', null)->where('sl_quality_confirmedby','!=', null)->where('sl_auction_confirmedby', null)->get();
											$cid = Input::get('country');
											$csn_season = Input::get('sale_season');
											// $saleid = Input::get('sale');
											$slr = Input::get('seller');


											return View::make('confirmauctiondetails', compact('id', 
												'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr'));	
					    				} else {
					    					// $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
					    					$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby','!=', null)->where('sl_quality_confirmedby','!=', null)->where('sl_auction_confirmedby', null)->get();

											$request->session()->flash('alert-success', 'Sale found!!');
											$cid = Input::get('country');
											$csn_season = Input::get('sale_season');
											$saleid = Input::get('sale');
											$sale_lots = sale_lots::where('slid', $saleid)->where('slrid', Input::get('seller'))->get(); 
											$slr = Input::get('seller');


											return View::make('confirmauctiondetails', compact('id', 
												'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr'));				    					
					    				}


				    				} else {
				    					$sale = Sale::where('id', '=', Input::get('sale'))->where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->first();
					    				if ($sale->sl_auction_confirmedby != NULL){
					    					$request->session()->flash('alert-warning', 'Catalogue Auction Details for Sale '.$sale->sl_no.' has already been confirmed by '.$sale->sl_auction_confirmedby);
					    					// $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
					    					$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby','!=', null)->where('sl_quality_confirmedby','!=', null)->where('sl_auction_confirmedby', null)->get();
											$cid = Input::get('country');
											$csn_season = Input::get('sale_season');
											// $saleid = Input::get('sale');
											$slr = Input::get('seller');


											return View::make('confirmauctiondetails', compact('id', 
												'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr'));	
					    				} else {
						    				// $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
						    				$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby','!=', null)->where('sl_quality_confirmedby','!=', null)->where('sl_auction_confirmedby', null)->get();
											$request->session()->flash('alert-success', 'Sale found!!');
											$cid = Input::get('country');
											$csn_season = Input::get('sale_season');
											$saleid = Input::get('sale');
											$sale_lots = sale_lots::where('slid', $saleid)->get(); 


											return View::make('confirmauctiondetails', compact('id', 
												'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket'));				    					
					    				}

				    					
				    				}
				    			} else {
			    					$request->session()->flash('alert-warning', 'Catalogue for Sale '.$sale->sl_no.' has not yet been confirmed. Please confirm to continue.');
			    					// $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
			    					$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby','!=', null)->where('sl_quality_confirmedby','!=', null)->where('sl_auction_confirmedby', null)->get();
									$cid = Input::get('country');
									$csn_season = Input::get('sale_season');
									// $saleid = Input::get('sale');
									$slr = Input::get('seller');


									return View::make('confirmauctiondetails', compact('id', 
										'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr'));

				    			}

	    				} else {
		    				// $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
		    				// $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
		    				$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby','!=', null)->where('sl_quality_confirmedby','!=', null)->where('sl_auction_confirmedby', null)->get();

							$request->session()->flash('alert-success', 'Sale found!!');
							$cid = Input::get('country');
							$csn_season = Input::get('sale_season');
							return View::make('confirmauctiondetails', compact('id', 
								'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket'));					
	    				}

	    			


	    		} else {
	    				// $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
	    				// $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
	    				$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby','!=', null)->where('sl_quality_confirmedby','!=', null)->where('sl_auction_confirmedby', null)->get();
						// $request->session()->flash('alert-success', 'Sale found!!');
						$cid = Input::get('country');
						$csn_season = Input::get('sale_season');
						return View::make('confirmauctiondetails', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket'));	
				}
	    	} else {

				return redirect('confirmauctiondetails')
	                        ->withErrors("Please select a valid Country!!")->withInput();
			}

	    	return View::make('confirmauctiondetails', compact('id', 'Season', 'country', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket'));		
    	}


    }

 public function confirmsaleajax ($sale) {

        $user_data = Auth::user();

		$user = $user_data ->usr_name;

		$lots_in_sale = coffee_details::where('sl_id', $sale)->get();

		foreach ($lots_in_sale as $key_lt => $value_lt) {

			$bs_id = 28;
			$lot_cup = NULL;
			$lot_grade = NULL;

			$quality_details = quality_details::where('cfd_id', $value_lt->id)->first();

			if ($quality_details != null) {

				$lot_cup = $quality_details->cp_id;

				$lot_grade = $value_lt->cgrad_id;				

			}

			$basket_auto = BasketAuto::where('cp_id', $lot_cup)->where('cgrad_id', $lot_grade)->first();	

			if ($basket_auto != null) {
				
				$bs_id = $basket_auto->bs_id;

			}

			coffee_details::where('id', '=', $value_lt)
			->update(['bs_id' => $bs_id]);

		}


        Sale::where('id', '=', $sale)

        ->update(['sl_quality_confirmedby' => $user]);

                //$request->session()->flash('alert-success', 'Sale Catalogue Confirmed!!');

                

        $this->sendExcel($sale);

    }

    public function sendExcel($sale){

        $sale_lots=null;

        $sale_lots = sale_lots::where('slid', $sale)

        ->get(['date', 'csn_season', 'sale', 'seller', 'lot','outturn',
'mark', 'warehouse', 'grade', 'bags', 'pockets', 'weight', 'cert',
'green', 'prcss_name', 'qltyd_prcss_value', 'qltyd_scr_value', 'acidity', 'body', 'flavour',
'final_comments', 'rw_score', 'cp_score','touch'])

        ;

        $count=0;

        $lotscount=count($sale_lots);

        $percent = $count/$lotscount;

        $percent_friendly = number_format( $percent * 100, 0 );

                    session(['count' => 0]);

                    session(['total' => $lotscount]);

                    session(['percent' => $percent_friendly]);

                    session(['complete' => false]);

                    session(['sendingmail' => 'waiting to generate excel']);

        //var_dump(session()->all())

        $timestamp=date('m d Y H i s');

        $saledetail=Sale::where('id', '=', $sale)->first();

        $sale_name=$saledetail->sl_no;

        $filename= 'SALE '.$sale_name.' '.$timestamp;

        $info=Excel::create($filename, function($excel) use($sale_lots,$sale, $lotscount) {        

            	$excel->sheet('SALE'.$sale, function($sheet) use($sale_lots,$lotscount) {

               		$sheet->cell('A1', function($cell) {$cell->setValue('DATE');

				});

$sheet->cell('B1', function($cell) {$cell->setValue('CROP');
});

                $sheet->cell('C1', function($cell) {$cell->setValue('SALE');
});

                $sheet->cell('D1', function($cell) {$cell->setValue('MKT
AGENT'); });

                $sheet->cell('E1', function($cell) {$cell->setValue('LOT');
});

                $sheet->cell('F1', function($cell) {$cell->setValue('OUTTURN');
});

                $sheet->cell('G1', function($cell) {$cell->setValue('MARK');
});

                $sheet->cell('H1', function($cell) {$cell->setValue('WAREHOUSE');
});

                $sheet->cell('I1', function($cell) {$cell->setValue('GRADE');
});

                $sheet->cell('J1', function($cell) {$cell->setValue('BAGS');
});

                $sheet->cell('K1', function($cell) {$cell->setValue('POCKETS');
});

                $sheet->cell('L1', function($cell) {$cell->setValue('WEIGHT');
});

                $sheet->cell('M1', function($cell) {$cell->setValue('CERT');
});

                $sheet->cell('N1', function($cell) {$cell->setValue('MUST
BUY'); });

                $sheet->cell('O1', function($cell) {$cell->setValue('Green
comments'); });

                $sheet->cell('P1', function($cell) {$cell->setValue('Processing');
});

                $sheet->cell('Q1', function($cell) {$cell->setValue('%');
});

                $sheet->cell('R1', function($cell) {$cell->setValue('Screen
%'); });

                $sheet->cell('S1', function($cell) {$cell->setValue('A');
});

                $sheet->cell('T1', function($cell) {$cell->setValue('B');
});

                $sheet->cell('U1', function($cell) {$cell->setValue('F');
});

                $sheet->cell('V1', function($cell) {$cell->setValue('Comments');
});

                $sheet->cell('W1', function($cell) {$cell->setValue('Raw
score'); });

                $sheet->cell('X1', function($cell) {$cell->setValue('Cup
score'); });




                $sheet->row(1, function($row) {

                    // call cell manipulation methods

                    $row->setFontColor('#228B22');

                    $row->setFontWeight('bold');

                });

                

                $i = 2;

                $count=1;

                //$sheet->fromModel($sale_lots);

                foreach ($sale_lots as $salelot) {

                    $sheet->cell('A'.$i, function($cell) use($salelot)
					{$cell->setValue($salelot->date); });

                    $sheet->cell('B'.$i, function($cell) use($salelot)
					{$cell->setValue($salelot->csn_season); });

                    $sheet->cell('C'.$i, function($cell) use($salelot)
					{$cell->setValue($salelot->sale); });

                    $sheet->cell('D'.$i, function($cell) use($salelot)
					{$cell->setValue($salelot->seller); });

                    $sheet->cell('E'.$i, function($cell) use($salelot)
					{$cell->setValue($salelot->lot); });

                    $sheet->cell('F'.$i, function($cell) use($salelot)
					{$cell->setValue($salelot->outturn); });

                    $sheet->cell('G'.$i, function($cell) use($salelot)
					{$cell->setValue($salelot->mark); });

                    $sheet->cell('H'.$i, function($cell) use($salelot)
					{$cell->setValue($salelot->warehouse); });

                    $sheet->cell('I'.$i, function($cell) use($salelot)
					{$cell->setValue($salelot->grade); });

                    $sheet->cell('J'.$i, function($cell) use($salelot)
					{$cell->setValue($salelot->bags); });

                    $sheet->cell('K'.$i, function($cell) use($salelot)
					{$cell->setValue($salelot->pockets); });

                    $sheet->cell('L'.$i, function($cell) use($salelot)
					{$cell->setValue($salelot->weight); });

                    $sheet->cell('M'.$i, function($cell) use($salelot)
					{$cell->setValue($salelot->cert); });

                    $sheet->cell('N'.$i, function($cell) use($salelot)
					{$cell->setValue(''); });

                    $sheet->cell('O'.$i, function($cell) use($salelot)
					{$cell->setValue($salelot->green); });

                    $sheet->cell('P'.$i, function($cell) use($salelot)
					{$cell->setValue($salelot->prcss_name); });

                    $sheet->cell('Q'.$i, function($cell) use($salelot)
					{$cell->setValue($salelot->qltyd_prcss_value); });

                    $sheet->cell('R'.$i, function($cell) use($salelot)
					{$cell->setValue($salelot->qltyd_scr_value); });

                    $sheet->cell('S'.$i, function($cell) use($salelot)
					{$cell->setValue($salelot->acidity); });

                    $sheet->cell('T'.$i, function($cell) use($salelot)
					{$cell->setValue($salelot->body); });

                    $sheet->cell('U'.$i, function($cell) use($salelot)
					{$cell->setValue($salelot->flavour); });

                    $sheet->cell('V'.$i, function($cell) use($salelot)
					{$cell->setValue($salelot->final_comments); });

                    $sheet->cell('W'.$i, function($cell) use($salelot)
					{$cell->setValue($salelot->rw_score); });

                    $sheet->cell('X'.$i, function($cell) use($salelot)
					{$cell->setValue($salelot->cp_score); });

                    

                

                 if($salelot->touch == 'DNT'){

                 $sheet->row($i, function($row) {

                    // call cell manipulation methods

                    $row->setFontColor('#ff0000');




                });

                 }

                 $i++;

                 $count++;

                 $percent = $count/$lotscount;

                 $percent_friendly = number_format( $percent * 100, 0 );

                 

                    session(['count' => $count]);

                    session(['total' => $lotscount]);

                    session(['percent' => $percent_friendly]);

                    session(['complete' => false]);

                    session(['sendingmail' => '']);

                

                }




                

                // Set black background

        

            });

        

        })->store('xlsx', storage_path('excel/exports'), true);

        return $this->sendExcelMail($info, $sale);      

    }

    public function sendExcelMail($info, $sale){

            

        //session(['sendingmail' => 'sending excel to trading.......']);




        $data = array('name'=>"Trading Department", "sale"=>$sale, "info"=>$info);




        Mail::send(['text'=>'mailquality'], $data, function($message) use ($info) {


            $message->to('trading.ea@nkg.coffee', 'Sale Catalogue-')->subject('Confirmed Catalogue Quality');




            $message->from('lewis.mutua@nkg.coffee','Ibero Database');

        

            $message->attach($info["full"]);




        });

        if( count(Mail::failures()) > 0 ) {                    

            session(['complete' => true]);

            session(['sendingmail' => 'Sending Email Error...']);

         

         } else {           

            session(['complete' => true]);

            session(['sendingmail' => 'Sending Email...']);

         }

                    

        //return redirect('confirmqualitycatalogue');

    }

    public function getProgress(){

        $count=session('count');

        $total=session('total');

        $percent=session('percent');

        $complete=session('complete');

        $sendingmail=session('sendingmail');

        return response()->json([

            'count' => $count,

            'total' => $total,

            'percent' => $percent,

            'complete' => $complete,

            'sendingmail' => $sendingmail

        ]);

    }

}

