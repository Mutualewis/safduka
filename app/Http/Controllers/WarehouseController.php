<?php namespace Ngea\Http\Controllers;

use Input;
use confirm;
use DB;
use ask;
use Illuminate\Http\Request;
use Ngea\Http\Controllers\Controller;
use View;
use Mail;

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
use Ngea\Stuffing;
use Ngea\StockBreakdown;
use Ngea\Client;
use Ngea\Years;
use Ngea\Months;
use Ngea\Sales_Contract_Summary;
use Ngea\SalesContract;
use Ngea\StuffingView;



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
use  Ngea\ExpectedArrival;

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
use Ngea\ProvisionalAllocation;


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

use Ngea\invoices;
use Ngea\bric;
use Ngea\payment;
use Ngea\warrants;
use Ngea\transporters;
use Ngea\release_instructions;
use Ngea\Packaging;
use Ngea\Location;
use Ngea\StockLocation;
use Ngea\StockLocationView;

use Ngea\Weighbridge;
use Ngea\Grn;

use Ngea\Stock;
use Ngea\Batch;
use Ngea\GrnsView;
use Ngea\BatchView;
use Ngea\InstructedStockLocation;


use Ngea\User;
use Helper;
use Ngea\OutturnTotalBatch;
use Auth;

use delete;

use Ngea\processrates;
use Ngea\processcharges;
use Ngea\teams;

class WarehouseController extends Controller {

   public function arrivalInformationListForm (Request $request){
    	$id = NULL;
    	$Season = Season::all(['id', 'csn_season']);
    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
    	$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
    	$Certification = Certification::all(['id', 'crt_name']);
    	$buyer = buyer::all(['id', 'cb_name']);   	


    	$sale_status = sale_status::all(['id', 'sst_name']);
    	$Warehouse = NULL;
    	$Mill = NULL;
    	
    	$cid = NULL;
    	$csn_season = NULL;
    	$sale_cb_id = NULL;
    	$trp = NULL;
    	$release_no = NULL;
    	$date = NULL;
    	$release_no = NULL;
    	$grn_number = sprintf("%07d", 0000001);

    	$Packaging = Packaging::all(['id', 'pkg_name']);


		$grn_no = Grn::orderBy('gr_number', 'asc')->pluck('gr_number');
		foreach ($grn_no as $gr) {
		    $grn_no = $gr;
		}	
		if ($grn_no != NULL && is_numeric($grn_no)) {
			$grn_number = sprintf("%07d", ($grn_no + 0000001));
		}
		

		return View::make('arrivalinformationlist', compact('id', 
				'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'Packaging', 'grn_number'));	

    }


    public function arrivalInformationList (Request $request){
    	$id = NULL;

    	$Warehouse = NULL;
    	$Mill = NULL;
    	$grn_number = sprintf("%07d", 0000001);
    	
    	$saleid     = Input::get('sale');

    	$greensize = quality_parameters::where('qg_id', '1')->get();
    	$greencolor = quality_parameters::where('qg_id', '2')->get();
    	$greendefects = quality_parameters::where('qg_id', '3')->get();
    	$processing = processing::all(['id', 'prcss_name']);
    	$buyer = buyer::all(['id', 'cb_name']);
    	$sale_status = sale_status::all(['id', 'sst_name']);
    	$basket = basket::where('ctr_id', Input::get('country'))->get();
    	$screens = screens::all(['id', 'scr_name']);
    	$cupscore = cupscore::all(['id', 'cp_score', 'cp_quality']);
    	$rawscore = rawscore::all(['id', 'rw_score', 'rw_quality']);
    	$Certification = Certification::all(['id', 'crt_name']);
    	$Packaging = Packaging::all(['id', 'pkg_name']);
		$slr = Input::get('seller');  
		$sale_cb_id = Input::get('coffee_buyer');  

		$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);



		$ot_season = Input::get('outt_season');  

		$wbtk = Input::get('weighbridgeTK');  
		$rlno = Input::get('releaseNo');  
		if ($request->has('country')) {
			$transporters = transporters::where('ctr_id', '=', Input::get('country'))->get();
			$trp = Input::get('trp'); 
		}
		$wrhse = Input::get('warehouse'); 

		if ($wrhse !== NULL) {
			$location = Location::where('wr_id', $wrhse)->get();
		}

		$grn_no = Grn::orderBy('gr_number', 'asc')->pluck('gr_number');
		foreach ($grn_no as $gr) {
		    $grn_no = $gr;
		}	
		if ($grn_no != NULL && is_numeric($grn_no)) {
			$grn_number = sprintf("%07d", ($grn_no + 0000001));
		}
		
		// if (Input::get('grn_number') != NULL) {
		// 	$grnsview = GrnsView::where('gr_number', Input::get('grn_number'))->get();
		// }
		$outt_season = Input::get('outt_season');

		$sif_lot = Input::get('sif_lot');
		$outt_number = Input::get('outt_number');
		// $outt_season = NULL;
		$btdetails = NULL;
		$season_name = NULL;
		if ($outt_season != NULL) {
			$season_name = Season::where('id', $outt_season)->first();
			$season_name = $season_name->csn_season;
		}
		

    	if(Input::get('country') != NULL){
	       	$Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->where('wrt_id', '1')->get();
	    	$Mill = mills_region::where('ctr_id', Input::get('country'))->get(); 		
	    	$seller = seller::where('ctr_id', Input::get('country'))->get(); 	
	    	$weighbridge_ticket = Weighbridge::where('ctr_id', Input::get('country'))->get();	    		
	    	// $weighbridge_ticket = Weighbridge::where('ctr_id', Input::get('country'))->where(DB::Raw('LEFT(wb_time_in, 10)'), date("Y-m-d"))->orWhere('id', 1)->get(); 		
    	}

		if (NULL !==  Input::get('confirmgrn')) { 

	     	$this->validate($request, [
		            'country' => 'required',
		        ]);

    		$cid = Input::get('country');
    		$Season = Season::all(['id', 'csn_season']);
    		$country = country::all(['id', 'ctr_name', 'ctr_initial']);
            $user_data = Auth::user();
            $user = $user_data ->id;

			$grndetailsarray = Grn::where('gr_number', Input::get('grn_number'))->where('ctr_id', $cid)->get(); 

			if ($grndetailsarray != NULL) {
				foreach ($grndetailsarray as $key => $grndetails) {

					$grnsview = GrnsView::where('id', $grndetails->id)->get();		

			    
				    foreach ($grnsview as $key => $value) {
				    	//outurn batch 
				   		$batchview = BatchView::where('stid', $value->stid)->get();
				    	$sumbatchweight = NULL;
				    	$sumtare = NULL;
				    	
				    	
				    	$outurnweight = $value->ott_weight;
				    	foreach ($batchview as $keyb => $valueb) {
				    		if ($value->stid == $valueb->stid) {
				    			$sumbatchweight += $valueb->btc_net_weight;
				    			$sumtare += $valueb->btc_tare;
				    		}		    		
				    	}
				    	$absolute_difference = abs($outurnweight-$sumbatchweight);
				    
				    		$stbags = floor($sumbatchweight/60);
				    		$stpkts = $sumbatchweight % 60;
							Grn::where('id', '=', $value->id)
							->update(['gr_confirmed_by' => $user]);

							Stock::where('id', '=', $value->stid)
							->update(['st_net_weight' => $sumbatchweight,'st_tare' => $sumtare, 'st_bags' => $stbags, 'st_pockets' => $stpkts]);
							$otbid = OutturnTotalBatch::insertGetId (
							['otb_weight' => $sumbatchweight,'otb_confirmed_by' => $user]);
							Activity::log('Inserted OutturnTotal information with sumbatchweight '.$sumbatchweight. ' user '. $user);
					    	foreach ($batchview as $keybb => $valuebb) {
								Batch::where('id', '=', $valuebb->id)
								->update(['otb_id' => $otbid, 'btc_prev_id' => 0]);	    

				    	}
				    }
				}				
		    }

			$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('outt_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby','!=', null)->where('sl_quality_confirmedby','!=', null)->where('sl_auction_confirmedby','!=', null)->orderByRaw('LENGTH(`sl_no`) ASC')->orderBy('sl_no')->get();
		    
			if($request->has('sale') && Input::get('sale') != 'Sale No.'){
				$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('outt_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby','!=', null)->where('sl_quality_confirmedby','!=', null)->where('sl_auction_confirmedby','!=', null)->orderByRaw('LENGTH(`sl_no`) ASC')->orderBy('sl_no')->get();
				$cid = Input::get('country');
				$csn_season = Input::get('outt_season');
				$saleid = Input::get('sale');
				$sellerid = Input::get('seller');
				if($request->has('seller')){
					$sale_lots = ExpectedArrival::where('slctrid', $cid)->where('csn_season',$season_name)->where('slrid', $sellerid)->first(); 
				} else {
					$sale_lots = ExpectedArrival::where('slctrid', $cid)->where('csn_season',$season_name)->first(); 
				}

			} else {
				$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('outt_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby','!=', null)->where('sl_quality_confirmedby','!=', null)->where('sl_auction_confirmedby','!=', null)->orderByRaw('LENGTH(`sl_no`) ASC')->orderBy('sl_no')->get();
				$cid = Input::get('country');
				$csn_season = Input::get('outt_season');
				$sellerid = Input::get('seller');

				if($request->has('seller')){

					$sale_lots = ExpectedArrival::where('slctrid', $cid)->where('csn_season',$season_name)->where('slrid', $sellerid)->first(); 

				} else {

					$sale_lots = ExpectedArrival::where('slctrid', $cid)->where('csn_season',$season_name)->first(); 

				}
			
			}

			return View::make('arrivalinformationlist', compact('id', 
				'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'Packaging', 'wrhse', 'location', 'rw', 'clm', 'grn_number', 'wbtk', 'rlno', 'ot_season', 'grndetails', 'weighbridge_ticket', 'grnsview'));	
		} else if (NULL !== Input::get('submitarrivalinfo') && NULL ==  Input::get('confirmgrn')){
	     	$this->validate($request, [
		            'country' => 'required', 
		        ]);
			$weighbridgeTK = Input::get('weighbridgeTK');
			$outt_season = Input::get('outt_season');
			$cid = Input::get('country');
			$grn_number = Input::get('grn_number');
    		$Season = Season::all(['id', 'csn_season']);
    		$country = country::all(['id', 'ctr_name', 'ctr_initial']);



			if ($outt_season == NULL || $weighbridgeTK == NULL || $grn_number == NULL) {
				$Season = Season::all(['id', 'csn_season']);
		    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);

				if($request->has('sale') && Input::get('sale') != 'Sale No.'){
					$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('outt_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby','!=', null)->where('sl_quality_confirmedby','!=', null)->where('sl_auction_confirmedby','!=', null)->orderByRaw('LENGTH(`sl_no`) ASC')->orderBy('sl_no')->get();
					$cid = Input::get('country');
					$csn_season = Input::get('outt_season');
					$saleid = Input::get('sale');
					$sellerid = Input::get('seller');
					if($request->has('seller')){
						$sale_lots = ExpectedArrival::where('slctrid', $cid)->where('csn_season',$season_name)->where('slrid', $sellerid)->first(); 
					} else {
						$sale_lots = ExpectedArrival::where('slctrid', $cid)->where('csn_season',$season_name)->first(); 
					}

				} else {
					$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('outt_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby','!=', null)->where('sl_quality_confirmedby','!=', null)->where('sl_auction_confirmedby','!=', null)->orderByRaw('LENGTH(`sl_no`) ASC')->orderBy('sl_no')->get();
					$cid = Input::get('country');
					$csn_season = Input::get('outt_season');
					$sellerid = Input::get('seller');

					if($request->has('seller')){
						$sale_lots = ExpectedArrival::where('slctrid', $cid)->where('csn_season',$season_name)->where('slrid', $sellerid)->first(); 
					} else {
						$sale_lots = ExpectedArrival::where('slctrid', $cid)->where('csn_season',$season_name)->first(); 
					}	
				}


				$request->session()->flash('alert-warning', 'Season and Weighbridge Ticket are Required!');
				return View::make('arrivalinformationlist', compact('id', 
					'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'Packaging', 'wrhse', 'location', 'rw', 'clm', 'grn_number', 'weighbridge_ticket', 'wbtk', 'rlno', 'ot_season', 'grnsview', 'batchview'));					
			}

			$grn = Input::get('grn');

			$cid = Input::get('country');
			
			if ($grn != NULL) {
			
				foreach ($grn as $key => $value) {
					$packaging = Input::get('package'.$key);
					$dispatch_kilograms = Input::get('dispatch'.$key);					
					$delivery_kilograms = Input::get('delivery'.$key);

					if ($dispatch_kilograms == NULL || $delivery_kilograms == NULL || $packaging == NULL) {

						if($request->has('sale') && Input::get('sale') != 'Sale No.'){
							$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('outt_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby','!=', null)->where('sl_quality_confirmedby','!=', null)->where('sl_auction_confirmedby','!=', null)->orderByRaw('LENGTH(`sl_no`) ASC')->orderBy('sl_no')->get();
							$cid = Input::get('country');
							$csn_season = Input::get('outt_season');
							$saleid = Input::get('sale');
							$sellerid = Input::get('seller');
							if($request->has('seller')){
								$sale_lots = ExpectedArrival::where('slctrid', $cid)->where('csn_season',$season_name)->where('slrid', $sellerid)->first(); 
							} else {
								$sale_lots = ExpectedArrival::where('slctrid', $cid)->where('csn_season',$season_name)->first(); 
							}

						} else {
							$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('outt_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby','!=', null)->where('sl_quality_confirmedby','!=', null)->where('sl_auction_confirmedby','!=', null)->orderByRaw('LENGTH(`sl_no`) ASC')->orderBy('sl_no')->get();
							$cid = Input::get('country');
							$csn_season = Input::get('outt_season');
							$sellerid = Input::get('seller');

							if($request->has('seller')){
								$sale_lots = ExpectedArrival::where('slctrid', $cid)->where('csn_season',$season_name)->where('slrid', $sellerid)->first(); 
							} else {
								$sale_lots = ExpectedArrival::where('slctrid', $cid)->where('csn_season',$season_name)->first(); 
							}	
						}

						$Season = Season::all(['id', 'csn_season']);
				    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);

						$request->session()->flash('alert-warning', 'Dispatch kilograms, delivery kilograms and number of packages are required!');
						return View::make('arrivalinformationlist', compact('id', 
							'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'Packaging', 'wrhse', 'location', 'rw', 'clm', 'grn_number', 'weighbridge_ticket', 'wbtk', 'rlno', 'ot_season', 'grnsview', 'batchview'));					
					}

				}
			}
			if ($grn != NULL) {
			
				foreach ($grn as $key => $value) {

		            $user_data = Auth::user();
		            $user = $user_data ->id;

		            $wbtk = Input::get('weighbridgeTK');  

					$season_name = Season::where('id', $outt_season)->first();
					
					$season_name = $season_name->csn_season;
					
					// $cdetails = Helper::getSaleLotsUsindCFDId($key);
					$cdetails = ExpectedArrival::where('id', $key)->first();
				
					$sif_lot = $cdetails->lot;

					$outt_number = $cdetails->outturn;

					// $grn_number = $cdetails->gr_number;
					$rlno = $cdetails->rl_no;

					$moisture = Input::get('moisture'.$key);

					$packaging = Input::get('package'.$key);

					$dispatch_kilograms = Input::get('dispatch'.$key);	

					$delivery_kilograms = Input::get('delivery'.$key);

					$partial = Input::get('partial'.$key);

			        //insert/update into grn
			        $grndetails = Grn::where('gr_number', Input::get('grn_number'))->where('ctr_id', $cid)->first(); 
					if ($grndetails != NULL) {
						$grnid = $grndetails->id;
						Grn::where('id', '=', $grnid)
						->update(['ctr_id' => $cid,'wb_id' => $weighbridgeTK, 'gr_confirmed_by' => $user]);
						Activity::log('Updated Grn information with grn_id '.$grnid. ' ctr_id '. $cid. ' wb_id '. $weighbridgeTK);
					} else {
						$grnid = Grn::insertGetId (
						['gr_number' => $grn_number,'ctr_id' => $cid,'wb_id' => $weighbridgeTK, 'gr_confirmed_by' => $user]);
						Activity::log('Inserted Grn information with grn_id '.$grnid. ' ctr_id '. $cid. ' wb_id '. $weighbridgeTK. ' grn_number '. $grn_number);
					}
			        $grndetails = Grn::where('gr_number', Input::get('grn_number'))->where('ctr_id', $cid)->first(); 

					$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('outt_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby','!=', null)->where('sl_quality_confirmedby','!=', null)->where('sl_auction_confirmedby','!=', null)->orderByRaw('LENGTH(`sl_no`) ASC')->orderBy('sl_no')->get();


					//insert/update into stock
					$prdetails = purchase::where('cfd_id', $cdetails->id)->first(); 

					$stdetails = Stock::where('prc_id', $prdetails->id)->first(); 

					$pr_bsid = $prdetails->bs_id;
					$pr_ibsid = $prdetails->ibs_id;
					$pr_price = $prdetails->prc_confirmed_price;
					$pr_brid = $prdetails->br_id;

					$st_grid = NULL;
					$st_slid = NULL;

					$st_name = NULL;




					$batch_kilograms = $delivery_kilograms;

					$wrhse = Input::get('warehouse');


					$moisture = Input::get('moisture'.$key);


					$row = Input::get('locrow'.$key);
					$column = Input::get('loccol'.$key);
					$zone = Input::get('zone'.$key);



					$packages = Input::get('packages'.$key);
					$tare = NULL;
					$package_weight = Packaging::where('id', $packaging)->first();
					if ($package_weight != NULL) {
						$tare = ($package_weight->pkg_weight) * $packages;
					}					

					$net_weight = $batch_kilograms - $tare;
					$bags = floor($net_weight/60);
					$pockets = floor($net_weight % 60);
					$btnumber = NULL;
					$br_price_pounds = NULL;
					$br_value = NULL;
					$br_diffrential = NULL;


					if ($cdetails !== NULL) {
						$st_grid = $cdetails->grade;
						$st_grid = CoffeeGrade::where('cgrad_name', $st_grid)->first();
						$st_grid = $st_grid->id;

						$st_slid = $cdetails->slid;
						$st_season = $cdetails->csn_id;

						$st_name = $cdetails->outturn.$cdetails->mark;
						$st_outturn = $cdetails->outturn;
						$cbid = $cdetails->cbid;

						$st_mark = $cdetails->mark;
					}

					$brcdetails = bric::where('id', $prdetails->br_id)->first();

		            if ($brcdetails != null) {

		                $br_id = $brcdetails->id;

		                $br_price_pounds = $brcdetails->br_price_pounds;

		                $br_value = $brcdetails->br_value;

		                $br_diffrential = $brcdetails->br_diffrential;

		                $br_arrival_gain = $brcdetails->br_arrival_gain;

		                $br_arrival_loss = $brcdetails->br_arrival_loss;

		                $purchased_weight = $prdetails->inv_weight;

		                if ($net_weight > $purchased_weight) {
			                bric::where('id', '=', $br_id)
			                    ->update(['br_arrival_gain' => ($net_weight - $purchased_weight) + $br_arrival_gain]);
		                } else if ($net_weight < $purchased_weight) {
		                	bric::where('id', '=', $br_id)
			                    ->update(['br_arrival_loss' => ($purchased_weight - $net_weight) + $br_arrival_loss]);
		                }
		            }	

		            if ($prdetails != null) {

		            	$purchased_weight = $prdetails->inv_weight;

		            }

	                $threshold_name = "Arrival";

	                $identifier = $threshold_name. " ". $st_outturn.'/'.$st_mark.' GRN-'. $grn_number;

	                if ($partial == null) {

	                	$this->checkThreshold($threshold_name, $purchased_weight, $net_weight, $identifier);

	                }	                


		            // if ($partial != NULL ) {

		            $prc_value = ($net_weight/$prdetails->inv_weight) * $prdetails->prc_value;

		            $bric_value = ($net_weight/$prdetails->inv_weight) * $prdetails->prc_bric_value;


		            // } else {

			           //  $prc_value = $prdetails->prc_value;

			           //  $bric_value = $prdetails->prc_bric_value;	
			            	            	
		            // }

					$stock_details_exist = Stock::where('gr_id', $grnid)->where('st_outturn', $st_outturn)->where('cgrad_id', $st_grid)->where('prc_id', $prdetails->id)->whereNull('st_partial_delivery')->first(); 

					$hedge = $prdetails->prc_hedge;

					$stid = null;

					if ($stock_details_exist == null) {

						$stid = Stock::insertGetId(['prc_id' => $prdetails->id,'gr_id' => $grnid,'st_dispatch_net' => $dispatch_kilograms, 'st_net_weight' => $net_weight ,'st_tare' => $tare, 'st_bags' => $bags, 'st_pockets' => $pockets, 'st_gross' => $delivery_kilograms, 'st_moisture' =>  $moisture,  'pkg_id' =>  $packaging, 'usr_id' =>  $user, 'sts_id' => '1', 'ctr_id' => $cid, 'bs_id' => $pr_bsid, 'ibs_id' => $pr_ibsid, 'prc_price' => $pr_price, 'st_price' => $br_price_pounds, 'st_value' => $br_value,  'st_diff' => $br_diffrential,  'br_id' => $pr_brid, 'sl_id' => $st_slid, 'cgrad_id' => $st_grid, 'st_name' => $st_name, 'st_outturn' => $st_outturn, 'st_mark' => $st_mark, 'csn_id' => $st_season, 'cb_id' => $cbid, 'st_packages' => $packages, 'st_partial_delivery' => $partial , 'st_value' => $prc_value , 'st_bric_value' => $bric_value , 'st_hedge' => $hedge ]);

					}

		            
					
					$request->session()->flash('alert-success', 'Stock Information Updated!!');
					

					if ($cdetails->prallid != null) {
						ProvisionalAllocation::where('id', '=', $cdetails->prallid)
			                ->update(['cfd_id' => NULL, 'st_id' => $stid ]);
					}


					Activity::log('Inserted Stock information with stid'.$stid. ' grn_id '. $grnid. ' dispatch_kilograms '. $dispatch_kilograms. ' delivery_kilograms '. $delivery_kilograms. ' moisture '. $moisture. ' packaging '. $packaging);
					
					purchase::where('id', '=', $prdetails->id)
					->update(['gr_id' => $grnid]);

					$batch_kilograms = $delivery_kilograms;

					$wrhse = Input::get('warehouse');

					$moisture = Input::get('moisture'.$key);

					$row = Input::get('locrow'.$key);
					
					$column = Input::get('loccol'.$key);
					
					$zone = Input::get('zone'.$key);

					$packages = Input::get('packages'.$key);

					$package_weight = Packaging::where('id', $packaging)->first();
					
					if ($package_weight != NULL) {
					
						$tare = ($package_weight->pkg_weight) * $packages;

					}

					$net_weight = $batch_kilograms - $tare;
					$bags = floor($net_weight/60);
					$pockets = floor($net_weight % 60);
					$btnumber = NULL;
					$coffee_details = NULL;


		            $user_data = Auth::user();
		            $user = $user_data ->id;

		            $wbtk = Input::get('weighbridgeTK');  

					$season_name = Season::where('id', $outt_season)->first();
					$season_name = $season_name->csn_season;
			
					$cdetails = ExpectedArrival::where('id', $key)->first();
			 
					$btid = Batch::insertGetId (
					['btc_number' => $btnumber, 'st_id' => $stid, 'btc_weight' => $batch_kilograms, 'btc_tare' => $tare, 'btc_net_weight' => $net_weight, 'btc_packages' => $packages, 'btc_bags' => $bags, 'btc_pockets' => $pockets]);
					Activity::log('Inserted Batch information with btid '.$btid. ' batch_kilograms '. $batch_kilograms. ' bags '. $bags. ' pockets '. $pockets. ' stid '. $stid.' btc_tare '.$tare.' btc_net_weight '.$net_weight);


					if ($cdetails != NULL) {
						$prdetails = purchase::where('cfd_id', $cdetails->id)->first(); 
						$stdetails = Stock::where('prc_id', $prdetails->id)->first(); 
						$stid = $stdetails->id;
						$stdetails = Stock::where('id', $stid)->first(); 
						$coffee_details = coffee_details::where('id', $cdetails->id)->first();
					}

					
					if ($coffee_details != null) {
						$original_weight = $coffee_details->cfd_weight;
						$purchase_details = purchase::where('cfd_id', $coffee_details->id)->first(); 
						$stock_details = Stock::where('prc_id', $prdetails->id)->get(); 
						if ($stock_details != null) {
							$total_weight_stock = null;
							foreach ($stock_details as $key_stock => $value_stock) {
								$total_weight_stock += $value_stock->st_gross;
							}
							if (($original_weight-$total_weight_stock) <= 60) {
							    Stock::where('prc_id', '=', $prdetails->id)
						        ->update(['st_partial_delivery' => null]);
							}
						}

					}


			        $locrowdetails = Location::where('wr_id', $wrhse)->where('loc_row', $row)->first(); 
			        $loccoldetails = Location::where('wr_id', $wrhse)->where('loc_column', $column)->first(); 

			        $locrowid = NULL;
			        $loccolid = NULL;

		        	$locrowid = $locrowdetails->id;
		        	$loccolid = $loccoldetails->id;



					$Season = Season::all(['id', 'csn_season']);
			        $country = country::all(['id', 'ctr_name', 'ctr_initial']);

					$stlocid = StockLocation::insertGetId (
					['bt_id' => $btid, 'loc_row_id' => $locrowid, 'loc_column_id' => $loccolid, 'btc_zone' => $zone]);
					Activity::log('Inserted StockLocation information with bt_id '.$btid. ' locrowid '. $locrowid. ' loccolid '. $loccolid. ' zone '. $zone);


				}

			}


			







			if($request->has('sale') && Input::get('sale') != 'Sale No.'){
				$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('outt_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby','!=', null)->where('sl_quality_confirmedby','!=', null)->where('sl_auction_confirmedby','!=', null)->orderByRaw('LENGTH(`sl_no`) ASC')->orderBy('sl_no')->get();
				$cid = Input::get('country');
				$csn_season = Input::get('outt_season');
				$saleid = Input::get('sale');
				$sellerid = Input::get('seller');
				if($request->has('seller')){
					$sale_lots = ExpectedArrival::where('slctrid', $cid)->where('csn_season',$season_name)->where('slrid', $sellerid)->first(); 
				} else {
					$sale_lots = ExpectedArrival::where('slctrid', $cid)->where('csn_season',$season_name)->first(); 
				}

			} else {
				$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('outt_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby','!=', null)->where('sl_quality_confirmedby','!=', null)->where('sl_auction_confirmedby','!=', null)->orderByRaw('LENGTH(`sl_no`) ASC')->orderBy('sl_no')->get();
				$cid = Input::get('country');
				$csn_season = Input::get('outt_season');
				$sellerid = Input::get('seller');

				if($request->has('seller')){
					$sale_lots = ExpectedArrival::where('slctrid', $cid)->where('csn_season',$season_name)->where('slrid', $sellerid)->first(); 
				} else {
					$sale_lots = ExpectedArrival::where('slctrid', $cid)->where('csn_season',$season_name)->first(); 
				}	
			}

			return View::make('arrivalinformationlist', compact('id', 
				'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'Packaging', 'wrhse', 'location', 'rw', 'clm', 'grn_number', 'wbtk', 'rlno', 'ot_season', 'cdetails', 'grndetails', 'stdetails', 'weighbridge_ticket', 'grnsview', 'batchview'));	
    	
		} else	if (NULL !== Input::get('submitbatch')){
		     	 $this->validate($request, [
			            'country' => 'required', 
			        ]);
				$weighbridgeTK = Input::get('weighbridgeTK');
				$outt_season = Input::get('outt_season');

				if ($outt_season == NULL || $weighbridgeTK == NULL) {
					$Season = Season::all(['id', 'csn_season']);
			    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);

					$request->session()->flash('alert-warning', 'Season and Weighbridge Ticket are Required!');
					return View::make('arrivalinformation', compact('id', 
						'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'Packaging', 'wrhse', 'location', 'rw', 'clm', 'grn_number', 'weighbridge_ticket', 'wbtk', 'rlno', 'ot_season', 'grnsview', 'batchview'));					
				}







				
	    	
		} else {

	    	$Season = Season::all(['id', 'csn_season']);
	    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
	    	$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
	    	$region = Region::where('ctr_id', Input::get('country'))->get();

	    	if (Input::get('grn_number') !== NULL) {
	    		$grn_number = Input::get('grn_number');
	    	}

			$outt_season = Input::get('outt_season');

			$batch_kilograms = Input::get('batch_kilograms');
			$bags = Input::get('bags');
			$pockets = Input::get('pockets');

			$cdetails = NULL;
			$stdetails = NULL;
			$grndetails = NULL;
			if ($outt_season != NuLL) {
				$season_name = Season::where('id', $outt_season)->first();
				$season_name = $season_name->csn_season;
			}



			$stid = NULL;
			if ($cdetails != NULL) {
				$prdetails = purchase::where('cfd_id', $cdetails->id)->first(); 
				$stdetails = Stock::where('prc_id', $prdetails->id)->first(); 
				if ($stdetails != NULL) {
					$stid = $stdetails->id;
				}
				$stdetails = Stock::where('id', $stid)->first(); 
			}

			if ($grndetails != NULL) {
				$grndetails = Grn::where('gr_number', Input::get('grn_number'))->where('ctr_id', $cid)->first();  
			}



	    	if($request->has('country')){
	    		if($request->has('outt_season') & Input::get('outt_season') !== "Sale Season" & $request->has('warehouse')){

					if($request->has('sale') && Input::get('sale') != 'Sale No.'){
						$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('outt_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby','!=', null)->where('sl_quality_confirmedby','!=', null)->where('sl_auction_confirmedby','!=', null)->orderByRaw('LENGTH(`sl_no`) ASC')->orderBy('sl_no')->get();

						$cid = Input::get('country');
						$csn_season = Input::get('outt_season');
						$saleid = Input::get('sale');
						$sellerid = Input::get('seller');

						if($request->has('seller')){
							$sale_lots = ExpectedArrival::where('slctrid', $cid)->where('csn_season',$season_name)->where('slid', $saleid)->where('slrid', $sellerid)->first(); 
						} else {
							$sale_lots = ExpectedArrival::where('slctrid', $cid)->where('csn_season',$season_name)->where('slid', $saleid)->first(); 
						}
						

						return View::make('arrivalinformationlist', compact('id', 
							'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'Packaging', 'wrhse', 'location', 'rw', 'clm', 'weighbridge_ticket', 'grn_number', 'wbtk', 'rlno', 'ot_season', 'cdetails', 'grndetails', 'stdetails', 'grnsview', 'batchview','batch_kilograms', 'bags', 'pockets', 'sale_lots'));	


					} else {
						$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('outt_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby','!=', null)->where('sl_quality_confirmedby','!=', null)->where('sl_auction_confirmedby','!=', null)->orderByRaw('LENGTH(`sl_no`) ASC')->orderBy('sl_no')->get();
						$cid = Input::get('country');
						$csn_season = Input::get('outt_season');
						$sellerid = Input::get('seller');



						if($request->has('seller')){
							$sale_lots = ExpectedArrival::where('slctrid', $cid)->where('csn_season',$season_name)->where('slrid', $sellerid)->first(); 
						} else {
							$sale_lots = ExpectedArrival::where('slctrid', $cid)->where('csn_season',$season_name)->first(); 
						}



						return View::make('arrivalinformationlist', compact('id', 
							'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'sale_lots', 'transporters', 'trp','release_no', 'Packaging', 'wrhse', 'location', 'rw', 'clm', 'weighbridge_ticket', 'grn_number', 'wbtk', 'rlno', 'ot_season', 'cdetails', 'grndetails', 'stdetails', 'grnsview', 'batchview','batch_kilograms', 'bags', 'pockets', 'sale_lots'));					
					}

		    			


	    		} else {
	    				$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('outt_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby','!=', null)->where('sl_quality_confirmedby','!=', null)->where('sl_auction_confirmedby','!=', null)->orderByRaw('LENGTH(`sl_no`) ASC')->orderBy('sl_no')->get();
						// $request->session()->flash('alert-success', 'Sale found!!');

						// print_r($sale."-Lewis:".Input::get('outt_season'));

						$cid = Input::get('country');
						$csn_season = Input::get('outt_season');
						return View::make('arrivalinformationlist', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'Packaging', 'wrhse', 'location', 'rw', 'clm', 'weighbridge_ticket', 'grn_number', 'wbtk', 'rlno', 'ot_season', 'cdetails', 'grndetails', 'stdetails', 'grnsview', 'batchview','batch_kilograms', 'bags', 'pockets'));	
				}
    	} else {

			return redirect('arrivalinformationlist')
                        ->withErrors("Please select a valid Country!!")->withInput();
		}

    	return View::make('arrivalinformationlist', compact('id', 'Season', 'country', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'Packaging', 'wrhse', 'location', 'rw', 'clm', 'weighbridge_ticket', 'grn_number', 'wbtk', 'rlno', 'ot_season', 'cdetails', 'grndetails', 'stdetails', 'grnsview', 'batchview','batch_kilograms', 'bags', 'pockets'));		
	   }
    
 	}




    public function movementInstructionsForm (Request $request){
    	$id = NULL;
    	$Season = Season::all(['id', 'csn_season']);
    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
    	$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
    	$Certification = Certification::all(['id', 'crt_name']);
    	$buyer = buyer::all(['id', 'cb_name']);   	


    	$Warehouse = NULL;
    	$Mill = NULL;
    	
    	$cid = NULL;
    	$csn_season = NULL;
    	$sale_cb_id = NULL;
    	$trp = NULL;
    	$release_no = NULL;
    	$date = NULL;
    	$release_no = NULL;

		return View::make('movementinstructions', compact('id', 
				'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released'));	

    }


    public function movementInstructions (Request $request){
    	$Warehouse = NULL;
    	$sale_status = sale_status::all(['id', 'sst_name']);
    	$basket = basket::where('ctr_id', Input::get('country'))->get();

		$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
		$wrhse = Input::get('warehouse'); 
		$new_wrhse = Input::get('new_warehouse'); 

		if ($wrhse !== NULL) {
			$location = Location::where('wr_id', $wrhse)->get();			
		}

		if ($new_wrhse !== NULL) {
			$new_location = Location::where('wr_id', $new_wrhse)->get();			
		}


		$outt_season = Input::get('outt_season');
		$ot_season = Input::get('outt_season');

		$sif_lot = Input::get('sif_lot');
		$outt_number = Input::get('outt_number');
		// $outt_season = NULL;
		$btdetails = NULL;
		$season_name = NULL;
		if ($outt_season != NULL) {
			$season_name = Season::where('id', $outt_season)->first();
			$season_name = $season_name->csn_season;
		}

		if ($sif_lot != NULL) {
			$btdetails = sale_lots::where('lot', $sif_lot)->where('csn_season',$season_name)->where('slid', $saleid)->first(); 
		} else if ($outt_number != NULL) {
			$btdetails = sale_lots::where('outturn', $outt_number)->where('csn_season',$season_name)->where('slid', $saleid)->first(); 
			
		}
		$batchview = NULL;
		if ($btdetails != NULL) {
			$batchview = BatchView::where('prc_id', $btdetails->prcid)->get();
		}
		if(Input::get('country') != NULL){
		   	$Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->where('wrt_id', '1')->get();
		   	$NewWarehouse = warehouses_region::where('ctr_id', Input::get('country'))->where('wrt_id', '1')->get();
			$Mill = mills_region::where('ctr_id', Input::get('country'))->get(); 		
			$seller = seller::where('ctr_id', Input::get('country'))->get(); 		
			$weighbridge_ticket = Weighbridge::where('ctr_id', Input::get('country'))->get(); 		
		}
    	$Season = Season::all(['id', 'csn_season']);
    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
    	$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);

		$cid = Input::get('country');

        $user_data = Auth::user();
        $user = $user_data ->id;
        $rw = Input::get('row');
		$row = Input::get('row');
		$column = Input::get('column');
		$zone = Input::get('zone');


		$new_wrhse = Input::get('new_warehouse'); 
        $new_rw = Input::get('new_row');
		$new_column = Input::get('new_column');
		$new_zone = Input::get('zone');

	if (NULL !== Input::get('instructmovement')){
	     	 $this->validate($request, [
		            'country' => 'required', 
		        ]);

			$batchview_cf = NULL;

			$batchlocation = Input::get('batchlocation');

			if ($batchlocation == NULL) {
				$stlocdetails = NULL;
				$stlocdetails = NULL;
	    		$rw = Input::get('row');
	    		$clm = Input::get('column');

	    		$request->session()->flash('alert-warning', 'Please Select At List One Object!');

		    	if (NULL != Input::get('warehouse') && NULL != Input::get('row') && NULL != Input::get('column') ) {
		    		$wrname = Warehouse::where('id', Input::get('warehouse'))->first();
		    		$wrname = $wrname->wr_name;

		    		$stlocdetails = StockLocationView::where('wr_name', $wrname)->where('loc_row', $rw)->where('loc_column', $clm)->leftJoin('sale_lots', 'sale_lots.prcid', '=', 'stock_locations.prc_id')->get();
		    	}

				return View::make('movementinstructions', compact('id', 
					'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'Packaging', 'wrhse', 'location', 'rw', 'clm', 'grn_number', 'weighbridge_ticket', 'wbtk', 'rlno', 'ot_season', 'cdetails', 'grndetails', 'stdetails', 'grnsview', 'batchview', 'stlocdetails', 'rw', 'clm', 'new_wrhse', 'NewWarehouse', 'new_location'));		
			}


			foreach ($batchlocation as $key => $value) {
				// $cdetails = sale_lots::where('id', $value)->first(); 
				// $prcid = $cdetails->prcid;	
				$new_zone = Input::get('newzone'.$value);
				$batchview_cf = BatchView::where('stid', $value)->get();
		        $locrowdetails = Location::where('wr_id', $wrhse)->where('loc_row', $new_rw)->first(); 
		        $loccoldetails = Location::where('wr_id', $wrhse)->where('loc_column', $new_column)->first(); 

		        $locrowid = $locrowdetails->id;
		        $loccolid = $loccoldetails->id;


		        foreach ($batchview_cf as $keybt => $valuebt) {
					$btid = $valuebt->id;
					Batch::where('id', '=', $btid)
						->update(['btc_instructed_by' => $user]);	

					$stlocid = InstructedStockLocation::insertGetId (
					['bt_id' => $btid, 'loc_row_id' => $locrowid, 'loc_column_id' => $loccolid, 'btc_zone' => $new_zone]);
					Activity::log('Inserted InstructedStockLocation information with bt_id '.$btid. ' locrowid '. $locrowid. ' loccolid '. $loccolid. ' zone '. $new_zone);
		        }				







			}

			$stlocdetails = NULL;
			$stlocdetails = NULL;
    		$rw = Input::get('row');
    		$clm = Input::get('column');

	    	if (NULL != Input::get('warehouse') && NULL != Input::get('row') && NULL != Input::get('column') ) {
	    		$wrname = Warehouse::where('id', Input::get('warehouse'))->first();
	    		$wrname = $wrname->wr_name;


	    		$stlocdetails = StockLocationView::where('wr_name', $wrname)->where('loc_row', $rw)->where('loc_column', $clm)->get();
	    	}
			return View::make('movementinstructions', compact('id', 
				'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'Packaging', 'wrhse', 'location', 'rw', 'clm', 'grn_number', 'weighbridge_ticket', 'wbtk', 'rlno', 'ot_season', 'cdetails', 'grndetails', 'stdetails', 'grnsview', 'batchview', 'stlocdetails', 'new_wrhse', 'NewWarehouse', 'new_location'));	
    	
		}  else {
			$stlocdetails = NULL;
			$stlocdetails = NULL;
    		$rw = Input::get('row');
    		$clm = Input::get('column');


	    	if (NULL != Input::get('warehouse') && NULL != Input::get('row') && NULL != Input::get('column') ) {
	    		$wrname = Warehouse::where('id', Input::get('warehouse'))->first();
	    		$wrname = $wrname->wr_name;

	    		$stlocdetails = StockLocationView::where('wr_name', $wrname)->where('loc_row', $rw)->where('loc_column', $clm)->get();
	    	}

			return View::make('movementinstructions', compact('id', 
				'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'Packaging', 'wrhse', 'location', 'rw', 'clm', 'grn_number', 'weighbridge_ticket', 'wbtk', 'rlno', 'ot_season', 'cdetails', 'grndetails', 'stdetails', 'grnsview', 'batchview', 'stlocdetails', 'rw', 'clm', 'new_wrhse', 'NewWarehouse', 'new_location'));		
 	   }
    
 	}





    public function movementConfirmationForm (Request $request){
    	$id = NULL;
    	$Season = Season::all(['id', 'csn_season']);
    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
    	$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
    	$Certification = Certification::all(['id', 'crt_name']);
    	$buyer = buyer::all(['id', 'cb_name']);   	


    	$Warehouse = NULL;
    	$Mill = NULL;
    	
    	$cid = NULL;
    	$csn_season = NULL;
    	$sale_cb_id = NULL;
    	$trp = NULL;
    	$release_no = NULL;
    	$date = NULL;
    	$release_no = NULL;

		return View::make('movementconfirmation', compact('id', 
				'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released'));	

    }


    public function movementConfirmation (Request $request){
    	$Warehouse = NULL;
    	$sale_status = sale_status::all(['id', 'sst_name']);
    	$basket = basket::where('ctr_id', Input::get('country'))->get();

		$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
		$wrhse = Input::get('warehouse'); 
		$new_wrhse = Input::get('new_warehouse'); 

		if ($wrhse !== NULL) {
			$location = Location::where('wr_id', $wrhse)->get();			
		}

		if ($new_wrhse !== NULL) {
			$new_location = Location::where('wr_id', $new_wrhse)->get();			
		}


		$outt_season = Input::get('outt_season');
		$ot_season = Input::get('outt_season');

		$sif_lot = Input::get('sif_lot');
		$outt_number = Input::get('outt_number');
		// $outt_season = NULL;
		$btdetails = NULL;
		$season_name = NULL;
		if ($outt_season != NULL) {
			$season_name = Season::where('id', $outt_season)->first();
			$season_name = $season_name->csn_season;
		}

		if ($sif_lot != NULL) {
			$btdetails = sale_lots::where('lot', $sif_lot)->where('csn_season',$season_name)->where('slid', $saleid)->first(); 
		} else if ($outt_number != NULL) {
			$btdetails = sale_lots::where('outturn', $outt_number)->where('csn_season',$season_name)->where('slid', $saleid)->first(); 
			
		}
		$batchview = NULL;
		if ($btdetails != NULL) {
			$batchview = BatchView::where('prc_id', $btdetails->prcid)->get();
		}
		if(Input::get('country') != NULL){
		   	$Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->where('wrt_id', '1')->get();
		   	$NewWarehouse = warehouses_region::where('ctr_id', Input::get('country'))->where('wrt_id', '1')->get();
			$Mill = mills_region::where('ctr_id', Input::get('country'))->get(); 		
			$seller = seller::where('ctr_id', Input::get('country'))->get(); 		
			$weighbridge_ticket = Weighbridge::where('ctr_id', Input::get('country'))->get(); 		
		}
    	$Season = Season::all(['id', 'csn_season']);
    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
    	$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);

		$cid = Input::get('country');

        $user_data = Auth::user();
        $user = $user_data ->id;
        $rw = Input::get('row');
		$row = Input::get('row');
		$column = Input::get('column');
		$zone = Input::get('zone');


		$new_wrhse = Input::get('new_warehouse'); 
        $new_rw = Input::get('new_row');
		$new_column = Input::get('new_column');
		$new_zone = Input::get('zone');

	if (NULL !== Input::get('confirmmovement')){
	     	 $this->validate($request, [
		            'country' => 'required', 
		        ]);

			$batchview_cf = NULL;
			$batchlocation = Input::get('batchlocation');
			$batch_kilograms = Input::get('batch_kilograms');
			$diff_weight = NULL;
			$diff_bags = NULL;
			$diff_pkts = NULL;
			$batchview_cf = NULL;
			$previd = NULL;
			$old_weight = NULL;
			$old_bags = NULL;
			$old_pkts = NULL;
			$new_wr_row = NULL;
			$new_wr_col = NULL;			
			$old_wr_row = NULL;
			$old_wr_col = NULL;

			if ($batchlocation == NULL) {
				$stlocdetails = NULL;
				$stlocdetails = NULL;

	    		$rw = Input::get('row');
	    		$clm = Input::get('column');

	    		$request->session()->flash('alert-warning', 'Please Select At List One Object!');

		    	if (NULL != Input::get('warehouse') && NULL != Input::get('row') && NULL != Input::get('column') ) {
		    		$wrname = Warehouse::where('id', Input::get('warehouse'))->first();
		    		$wrname = $wrname->wr_name;
		    		$stlocdetails = StockLocationView::where('wr_name', $wrname)->where('loc_row', $rw)->where('loc_column', $clm)->leftJoin('sale_lots', 'sale_lots.prcid', '=', 'stock_locations.prc_id')->get();
		    	}

				return View::make('movementconfirmation', compact('id', 
					'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'Packaging', 'wrhse', 'location', 'rw', 'clm', 'grn_number', 'weighbridge_ticket', 'wbtk', 'rlno', 'ot_season', 'cdetails', 'grndetails', 'stdetails', 'grnsview', 'batchview', 'stlocdetails', 'rw', 'clm', 'new_wrhse', 'NewWarehouse', 'new_location'));		
			}


			foreach ($batchlocation as $key => $value) {
	     	 	// $batchview_cf = BatchView::where('id', $value)->first();
	     	 	if ($batchlocation != NULL) {
		     	 	$batchview_cf = BatchView::where('stid', $value)->get();
					if ($batchview_cf != NULL) {

			     	 	foreach ($batchview_cf as $keybt => $valuebt) {
							//compute weights and add batches
							$old_id = $valuebt->id;
							$old_weight = $valuebt->btc_net_weight;
							$instructed_weight = $valuebt->insloc_weight;
							$old_bags = $valuebt->btc_bags;
							$old_pkts = $valuebt->btc_pockets;
							$old_pkgs = $valuebt->btc_packages;
							$old_tare = $valuebt->btc_tare;
							$old_net_weight = $valuebt->btc_net_weight;


							$stid = $valuebt->stid;
							$previd = $valuebt->id;
							if ($valuebt != NULL) {
								$new_wr_id = Warehouse::where('wr_name', $valuebt->new_wr_name)->first();	
								if ($new_wr_id != NULL) {
									$new_wr_id = $new_wr_id->id;
								}

								$new_wr_row = $valuebt->new_loc_row;
								$new_wr_col = $valuebt->new_loc_column;

								$old_wr_row = $valuebt->loc_row;
								$old_wr_col = $valuebt->loc_column;

								$zone = $valuebt->new_zone;


								if (null == $new_wr_id) {
									$new_wr_id = Input::get('new_warehouse');
								}
								if (null == $new_wr_row) {
									$new_wr_row = Input::get('row');
								}
								if (null == $new_wr_col) {
									$new_wr_col = Input::get('column');
								}
								if (null == $zone || 0 == $zone) {
									$zone = Input::get('zone');
								}

								$locrowdetails = Location::where('wr_id', $new_wr_id)->where('loc_row', $new_wr_row)->first(); 
		       					$loccoldetails = Location::where('wr_id', $new_wr_id)->where('loc_column', $new_wr_col)->first(); 

						        $locrowid = null;
						        $loccolid = null;

						        if (isset($locrowdetails->id)) {
						        	$locrowid = $locrowdetails->id;
						        }
						        if (isset($loccoldetails->id)) {
						     	   $loccolid = $loccoldetails->id;
						        }



								$diff_bags = ROUND($old_weight/60);
								$diff_pkts = ROUND($old_weight%60);


								$bt_no = NULL;

								if ($old_weight == $instructed_weight || $instructed_weight == null) {
									Batch::where('id', '=', $valuebt->id)
									->update(['btc_ended_by' => $user]);
								} else {
									Batch::where('id', '=', $valuebt->id)
										->update(['btc_ended_by' => $user, 'btc_net_weight' => $old_weight , 'btc_weight' => $old_weight]);									
								}			

								if ($instructed_weight != null) {
									$diff_bags = ROUND($instructed_weight/60);
									$diff_pkts = ROUND($instructed_weight%60);
									$old_net_weight = $instructed_weight;

									Batch::where('id', '=', $valuebt->id)
									->update(['btc_weight' => ($old_weight-$instructed_weight),'btc_weight' => ($old_net_weight-$instructed_weight),  'btc_bags' => ROUND(($old_net_weight-$instructed_weight)/60), 'btc_pockets' => ROUND(($old_net_weight-$instructed_weight)%60)]);

								}
								$btid = Batch::insertGetId (
										['btc_number' => $bt_no, 'st_id' => $stid, 'btc_weight' => $old_weight,'btc_packages' => $old_pkgs,  'btc_tare' => $old_tare , 'btc_net_weight' => $old_net_weight,  'btc_bags' => $diff_bags, 'btc_pockets' => $diff_pkts, 'btc_prev_id' => $previd]);
										Activity::log('Inserted Batch information with btid '.$btid. ' diff_weight '. $diff_weight. ' bags '. $diff_bags. ' pockets '. $diff_pkts. ' stid '. $stid);
						        


								$stlocid = StockLocation::insertGetId (
								['bt_id' => $btid, 'loc_row_id' => $locrowid, 'loc_column_id' => $loccolid, 'btc_zone' => $zone]);
								Activity::log('Inserted StockLocation information with bt_id '.$btid. ' locrowid '. $locrowid. ' loccolid '. $loccolid. ' zone '. $zone);


							}



			     	 	}

		     	 	}
	     	 	}


			}

			// $diff_weight = $old_weight-$batch_kilograms;

			// $otbid = NULL;	 

			// if ($diff_weight < 0) {
			// 	$request->session()->flash('alert-warning', 'Verify your weights, bags and pockets!');
			// 	return View::make('movementconfirmation', compact('id', 
			// 		'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'Packaging', 'wrhse', 'location', 'rw', 'clm', 'grn_number', 'weighbridge_ticket', 'wbtk', 'rlno', 'ot_season', 'cdetails', 'grndetails', 'stdetails', 'grnsview', 'batchview'));				
			// } else {
			// 	$otbid = OutturnTotalBatch::insertGetId (
			// 	['otb_weight' => $batch_kilograms,'otb_confirmed_by' => $user]);
			// 	Activity::log('Inserted OutturnTotal information with batch_kilograms '.$batch_kilograms. ' user '. $user);	

			// }

			// if ($diff_weight > 0 ) {

			// 	$bt_no = Batch::orderBy('btc_number', 'desc')->pluck('btc_number');
			// 	foreach ($bt_no as $bt) {
			// 	    $bt_no = $bt;
			// 	}	
			// 	if ($bt_no != NULL && is_numeric($bt_no)) {					
			// 		$bt_no = $bt_no;
			// 	} else {
			// 		$bt_no = 1;
			// 	}

				// $diff_bags = ROUND($diff_weight/60);
				// $diff_pkts = ROUND($diff_weight%60);


				// $btid = Batch::insertGetId (
				// ['btc_number' => $bt_no, 'st_id' => $stid, 'btc_weight' => $diff_weight, 'btc_bags' => $diff_bags, 'btc_pockets' => $diff_pkts, 'otb_id' => $otbid, 'btc_prev_id' => $previd]);
				// Activity::log('Inserted Batch information with btid '.$btid. ' diff_weight '. $diff_weight. ' bags '. $diff_bags. ' pockets '. $diff_pkts. ' stid '. $stid);





		  //       $locrowdetails = Location::where('wr_id', $new_wr_id)->where('loc_row', $old_wr_row)->first(); 
		  //       $loccoldetails = Location::where('wr_id', $new_wr_id)->where('loc_column', $old_wr_col)->first(); 

		  //       // print_r($new_wr_id);

		  //       $locrowid = $locrowdetails->id;
		  //       $loccolid = $loccoldetails->id;


				// $stlocid = StockLocation::insertGetId (
				// ['bt_id' => $btid, 'loc_row_id' => $locrowid, 'loc_column_id' => $loccolid, 'btc_zone' => $zone]);
				// Activity::log('Inserted StockLocation information with bt_id '.$btid. ' locrowid '. $locrowid. ' loccolid '. $loccolid. ' zone '. $zone);

			// } 

			// $bt_no = Batch::orderBy('btc_number', 'desc')->pluck('btc_number');
			// foreach ($bt_no as $bt) {
			//     $bt_no = $bt;
			// }	
			// if ($bt_no != NULL && is_numeric($bt_no)) {					
			// 	$bt_no = $bt_no;
			// } else {
			// 	$bt_no = 1;
			// }

			// $batch_kilograms = Input::get('batch_kilograms');
			// $bags = ROUND($batch_kilograms/60);
			// $pockets = ROUND($batch_kilograms%60);

			// $btid = Batch::insertGetId (
			// ['btc_number' => $bt_no, 'st_id' => $stid, 'btc_weight' => $batch_kilograms, 'btc_bags' => $bags, 'btc_pockets' => $pockets, 'otb_id' => $otbid, 'btc_prev_id' => $previd]);
			// Activity::log('Inserted Batch information with btid '.$btid. ' diff_weight '. $batch_kilograms. ' bags '. $bags. ' pockets '. $pockets. ' stid '. $stid);	


			// // $new_wr_id = Warehouse::where('wr_name', $batchview_cf->new_wr_name)->first();	
			// // $new_wr_id = $new_wr_id->id;


	  //       $locrowdetails = Location::where('wr_id', $new_wr_id)->where('loc_row', $new_wr_row)->first(); 
	  //       $loccoldetails = Location::where('wr_id', $new_wr_id)->where('loc_column', $new_wr_col)->first(); 

	  //       $locrowid = $locrowdetails->id;
	  //       $loccolid = $loccoldetails->id;

			// $stlocid = StockLocation::insertGetId (
			// ['bt_id' => $btid, 'loc_row_id' => $locrowid, 'loc_column_id' => $loccolid, 'btc_zone' => $new_zone]);
			// Activity::log('Inserted StockLocation information with bt_id '.$btid. ' locrowid '. $locrowid. ' loccolid '. $loccolid. ' zone '. $new_zone);
		



 	 	
	  //    	 foreach ($batchlocation as $key => $value) {
	  //    	 	// $batchview_cf = BatchView::where('stid', $value)->get();
			// 	if ($batchview_cf != NULL) {

		 //     	 	foreach ($batchview_cf as $keybt => $valuebt) {
		 //     	 		// print_r($user."<br>");
		 //     	 		Batch::where('id', '=', $valuebt->id)
			// 				->update(['btc_ended_by' => $user]);
			// 		}

			// 	}
	 
	  //    	 }	    

			// $grnsview = GrnsView::where('stid', $stid)->first();
			// $grnsview = GrnsView::where('stid', $stid)->get();
			// $stlocdetails = NULL;
			// $stlocdetails = NULL;
   //  		$rw = Input::get('row');
   //  		$clm = Input::get('column');

	  //   	if (NULL != Input::get('warehouse') && NULL != Input::get('row') && NULL != Input::get('column') ) {
	  //   		$wrname = Warehouse::where('id', Input::get('warehouse'))->first();
	  //   		$wrname = $wrname->wr_name;

	  //   		$stlocdetails = StockLocationView::where('wr_name', $wrname)->where('loc_row', $rw)->where('loc_column', $clm)->whereNotNull('btc_instructed_by')->get();
	  //   	}


	    	if (NULL != Input::get('warehouse') /*&& NULL != Input::get('row') && NULL != Input::get('column') */) {
	    		$wrname = Warehouse::where('id', Input::get('warehouse'))->first();
	    		$wrname = $wrname->wr_name;

	    		$stlocdetails = StockLocationView::where('wr_name', $wrname)/*->where('loc_row', $rw)->where('loc_column', $clm)*/->whereNotNull('btc_instructed_by')->get();
	    	}
			
	    							
			return View::make('movementconfirmation', compact('id', 
				'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'Packaging', 'wrhse', 'location', 'rw', 'clm', 'grn_number', 'weighbridge_ticket', 'wbtk', 'rlno', 'ot_season', 'cdetails', 'grndetails', 'stdetails', 'grnsview', 'batchview', 'stlocdetails', 'new_wrhse', 'NewWarehouse', 'new_location'));	
    	
		}  else {
			$stlocdetails = NULL;
			$stlocdetails = NULL;
    		$rw = Input::get('row');
    		$clm = Input::get('column');


	    	if (NULL != Input::get('warehouse') /*&& NULL != Input::get('row') && NULL != Input::get('column') */) {
	    		$wrname = Warehouse::where('id', Input::get('warehouse'))->first();
	    		$wrname = $wrname->wr_name;

	    		$stlocdetails = StockLocationView::where('wr_name', $wrname)/*->where('loc_row', $rw)->where('loc_column', $clm)*/->whereNotNull('btc_instructed_by')->get();
	    	}

			return View::make('movementconfirmation', compact('id', 
				'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'Packaging', 'wrhse', 'location', 'rw', 'clm', 'grn_number', 'weighbridge_ticket', 'wbtk', 'rlno', 'ot_season', 'cdetails', 'grndetails', 'stdetails', 'grnsview', 'batchview', 'stlocdetails', 'rw', 'clm', 'new_wrhse', 'NewWarehouse', 'new_location'));		
 	   }
    
 	}






   public function stuffingForm (Request $request){
		$rates    = processrates::all(['id', 'service']);
		$teams   = teams::all(['id', 'tms_grpname']);


        $id = null;
        $Season = Season::all(['id', 'csn_season']);
        $country = country::all(['id', 'ctr_name', 'ctr_initial']);        
        $client = Client::all(['id', 'cl_name']);

        $shipmentmonth = Months::all(['id', 'mth_name','mth_number']);
        $shipmentyear = Years::all(['id', 'yr_name','yr_number']);

        return View::make('stuffing', compact('id', 'Season', 'country', 'shipmentmonth','client', 'shipmentyear', 'rates', 'teams'));

    }


    public function stuffing (Request $request){
		$rates    = processrates::all(['id', 'service']);
		$teams   = teams::all(['id', 'tms_grpname']);


        $id = null;
        $Season = Season::all(['id', 'csn_season']);
        $country = country::all(['id', 'ctr_name', 'ctr_initial']);
        // $client = Client::all(['id', 'cl_name']);
        $client = Client::select('*')->orderBy('cl_name')->get();
        $basket      = basket::where('ctr_id', Input::get('country'))->orderBy('bs_code')->get();

        $Packaging = Packaging::all(['id', 'pkg_name']);

        $cid = Input::get('country');
        $contract = Input::get('contract');
        $packaging_method = Input::get('packaging_method');
        $packaging_type = Input::get('packaging');
    
        $description = Input::get('description');
        $packages = Input::get('packages');
        $clid = Input::get('client');
        $spid = Input::get('shipmonth');
        
        $bskt = Input::get('basket');

        $client_reference = Input::get('client_reference');

        // $basket = basket::where('ctr_id', Input::get('country'))->get();

        $user_data = Auth::user();
        $user      = $user_data->id;
        
        $weight_note_no = Input::get('weight_note_no');
        $wbtk = Input::get('weighbridgeTK');
        $weight_staffed = Input::get('weight_staffed');
        $date    = Input::get('date');
        $date    = date_create($date);
        $date    = date_format($date, "Y-m-d");
        $container_number = Input::get('container_number');
        $shipper = Input::get('shipper');


        $disposaldate = Input::get('date');
        $disposaldate=date_create($disposaldate);
        $disposaldate = date_format($disposaldate,"Y-m-d"); 


        $start_date = Input::get('date_second');
        $start_date=date_create($start_date);
        $start_date = date_format($start_date,"Y-m-d"); 

        $end_date = Input::get('date_third');
        $end_date=date_create($end_date);
        $end_date = date_format($end_date,"Y-m-d"); 


        $contract_date = Input::get('date_fourth');
        $contract_date=date_create($contract_date);
        $contract_date = date_format($contract_date,"Y-m-d"); 

        $shipmentmonth = Months::all(['id', 'mth_name','mth_number']);
        $shipmentyear = Years::all(['id', 'yr_name','yr_number']);

        $weighbridge_ticket = Weighbridge::where('ctr_id', Input::get('country'))->get();    

        $SalesContractSummary = Sales_Contract_Summary::where('sct_number', Input::get('contract'))->get();

        // $weighbridge_ticket = Weighbridge::where('ctr_id', Input::get('country'))->where(DB::Raw('LEFT(wb_time_in, 10)'), date("Y-m-d"))->orWhere('id', 1)->get(); 

        $sctID= null;
        if ($contract != null) {
            $sctID = SalesContract::where('sct_number', $contract)->first();
            if ($sctID != null) {
                $sctID= $sctID->id;
            }
            
        }

        $syrid = Input::get('shipyear');

        $complimentarycondition = Input::get('complimentarycondition');

        $weight = Input::get('weight');

        $stid_get = Input::get('stid');

        if (NULL !== Input::get('createsalescontract')){

            $SalesContract = SalesContract::where('ctr_id', '=', $cid)->where('sct_number',  $contract)->whereNull('sct_stuffed')->first();
            if ($SalesContract == NULL){

                $request->session()->flash('alert-warning', 'Sales Contract Already Confirmed!!');

            } else {

	            if ($weight_note_no != null) {
	                Stuffing::insert(
	                    ['sct_id' => $sctID, 'stff_weight_note' => $weight_note_no, 'wb_id' => $wbtk, 'shpr_id' => $shipper, 'stff_weight' => $weight_staffed, 'stff_date' => $date, 'stff_container' => $container_number]);

	                Activity::log('Added Stuffing sctID '. $sctID. ' weight_note_no '. $weight_note_no. ' wbtk '. $wbtk. ' shipper '. $shipper. ' weight_staffed '. $weight_staffed.' date '.$date.' container_number '.$container_number);
	            }

            }



            $SalesContract = SalesContract::where('ctr_id', '=', $cid)->where('sct_number',  $contract)->first();
            $StuffingView = StuffingView::where('sct_id', $sctID)->get();

            $disposaldate = Input::get('disposaldate');

            return View::make('stuffing', compact('id', 'Season', 'country', 'cid', 'contract', 'shipmentmonth','client', 'clid', 'spid', 'disposaldate', 'description', 'packages', 'bskt', 'basket', 'Packaging', 'packaging_method', 'packaging_type', 'weighbridge_ticket','StuffingView', 'shipmentyear', 'syrid', 'SalesContract', 'SalesContractSummary', 'client_reference', 'rates', 'teams'));

        }  else if (NULL !== Input::get('confirmcontract')) {

            $StuffingView = StuffingView::where('sct_id', $sctID)->get();

            $sum_stuffed = null;

            $stock_weight = null;

            $stock_ID = null;

            $csn_id = null;

            foreach ($StuffingView as $key => $value) {
                $sum_stuffed += $value->stff_weight;
            }

            $sale_contract_id = Stock::where('id', $stid_get)->where('sct_id', $sctID)->first();

         

            if ($sale_contract_id == null ) {
                # code...                
                $request->session()->flash('alert-warning', 'The results are not yet confirmed!');

                return View::make('stuffing', compact('id', 'Season', 'country', 'cid', 'contract', 'shipmentmonth','client', 'clid', 'spid', 'date', 'disposaldate', 'description', 'packages', 'SalesContract', 'bskt', 'basket', 'Packaging', 'packaging_method', 'packaging_type', 'weighbridge_ticket','StuffingView', 'shipmentyear', 'syrid', 'SalesContractSummary', 'client_reference', 'rates', 'teams'));            
            }

            $stock_weight = $sale_contract_id->st_net_weight;
            $stock_ID = $sale_contract_id->id;
            $csn_id = $sale_contract_id->csn_id;

            // print_r($stock_ID);

            // print_r($dddddd);

            $SalesContract = SalesContract::where('ctr_id', '=', $cid)->where('sct_number',  $contract)->first();
            $sum_contract_weight = null;
            if ($SalesContract != null) {
                $sum_contract_weight = $SalesContract->sct_weight;
            }

            if ($sum_stuffed < $stock_weight && $SalesContract->sct_stuffed == null ) {
                //return to stock
                $to_be_returned = $stock_weight - $sum_stuffed;

                $stock_bags    = floor($to_be_returned / 60);
                $stock_pockets = $to_be_returned % 60;     
                $batch_packages = ceil($to_be_returned / 60); 

                $st_value = $sale_contract_id->st_value;

                $st_value = ($to_be_returned/$stock_weight ) * $st_value;

                $br_value = $sale_contract_id->st_bric_value;

                $br_value = ($to_be_returned/$stock_weight ) * $br_value;                

                $st_hedge = $sale_contract_id->st_hedge;

                if ($to_be_returned != 0) {

                    $stid = Stock::insertGetId(['ctr_id' => $cid, 'csn_id' => $csn_id, 'st_outturn' => $sale_contract_id->st_outturn, 'st_name' => $sale_contract_id->st_outturn , 'st_net_weight' => $to_be_returned, 'st_bags' => $stock_bags, 'st_pockets' => $stock_pockets, 'usr_id' => $user, 'sts_id' => '2', 'cgrad_id' => $sale_contract_id->cgrad_id, 'prt_id' => $sale_contract_id->prt_id,'bs_id' => $sale_contract_id->bs_id,  'ibs_id' => $sale_contract_id->ibs_id, 'prc_price' => $sale_contract_id->prc_price, 'st_value' => $st_value, 'st_bric_value' => $br_value, 'st_hedge' => $st_hedge]);    

                    $batch_single_lots = Batch::where('st_id', $sale_contract_id->id)->orderBy('id', 'desc')->first();

                    $batch_location_single_lots = null;

                    if ($batch_single_lots != null) {

                        $batch_location_single_lots = StockLocation::where('bt_id', $batch_single_lots->id)->first();

                    }

                    $previous_stock_breakdown = StockBreakdown::where('st_id', $stock_ID)->whereNull('cn_id')->get();

                    $btid = Batch::insertGetId (
                    ['st_id' => $stid, 'btc_weight' => $to_be_returned, 'btc_tare' => 0, 'btc_net_weight' => $to_be_returned, 'btc_packages' => $batch_packages, 'btc_bags' => $stock_bags, 'btc_pockets' => $stock_pockets]);


                    Activity::log('Inserted Batch information with btid '.$btid. ' batch_kilograms '. $to_be_returned. ' bags '. $stock_bags. ' pockets '. $stock_pockets. ' stid '. $stid.' btc_tare '.'0'.' btc_net_weight '.$to_be_returned);  
                    
                    if ($batch_single_lots != null) {
                        $stlocid = StockLocation::insertGetId (
                        ['bt_id' => $btid, 'loc_row_id' => $batch_location_single_lots->loc_row_id, 'loc_column_id' => $batch_location_single_lots->loc_column_id, 'btc_zone' => $batch_location_single_lots->btc_zone]);
                        Activity::log('Inserted StockLocation information with bt_id '.$btid. ' locrowid '. $batch_location_single_lots->loc_row_id. ' loccolid '. $batch_location_single_lots->loc_column_id. ' zone '. $batch_location_single_lots->btc_zone);
                    } else {
                        $stlocid = StockLocation::insertGetId (
                        ['bt_id' => $btid, 'loc_row_id' => null, 'loc_column_id' => null, 'btc_zone' => null]);
                      
                    }

                    if (!$previous_stock_breakdown->isEmpty()) {

                        foreach ($previous_stock_breakdown as $psbkey => $psbvalue) {

                            $stock_breakdown_value = $psbvalue->stb_value_ratio * $br_value;

                            $stock_breakdown_weight = $psbvalue->stb_bulk_ratio * $to_be_returned;

                            StockBreakdown::insertGetId (
                                 ['st_id' => $stid, 'br_id' => $psbvalue->br_id, 'stb_value' => $stock_breakdown_value, 'stb_weight' => $stock_breakdown_weight, 'bs_id' => $psbvalue->bs_id, 'ibs_id' => $psbvalue->ibs_id, 'stb_bulk_ratio' => $psbvalue->stb_bulk_ratio,'stb_value_ratio' => $psbvalue->stb_value_ratio,  'stb_purchase_contract_ratio' => $psbvalue->psbvalue, 'cb_id' => $psbvalue->cb_id, 'cgr_id' => $psbvalue->cgr_id, 'prc_id' => $psbvalue->prc_id]);
                        }
                    }

                    $st_value = $sale_contract_id->st_value;

                    $st_value = ($sum_stuffed/$stock_weight ) * $st_value;

                    $br_value = $sale_contract_id->st_bric_value;

                    $br_value = ($sum_stuffed/$stock_weight ) * $br_value;  
                    
                    Stock::where('id', '=', $stock_ID)
                                ->update([ 'st_net_weight' => $sum_stuffed, 'st_value' => $st_value, 'st_bric_value' => $br_value]);

                    foreach ($previous_stock_breakdown as $psbk => $psbv) {

                        $stock_breakdown_value = $psbv->stb_value_ratio * $br_value;

                        $stock_breakdown_weight = $psbv->stb_bulk_ratio * $sum_stuffed;

                        StockBreakdown::where('id', '=', $psbv->id)
                                ->update([ 'stb_value' => $stock_breakdown_value, 'stb_weight' => $stock_breakdown_weight]);

                    }



                }

            } 
            
            Stock::where('id', '=', $stock_ID)
                        ->update([ 'st_ended_by' => $user, 'st_disposed_by' => $user]);

            SalesContract::where('ctr_id', '=', $cid)->where('sct_number',  $contract)
                ->update([ 'sct_stuffed' => $user, 'sct_updated_user' => $user]);

            $client = null;

            $ship_month = null;

            if ($SalesContract != null) {

            	$client = Client::where('id', $SalesContract->cl_id)->first(); 

            	$client = $client->cl_name; 

            	$quality = $SalesContract->sct_description; 

            	$quantity = $SalesContract->sct_packages; 

            	$ship_month = strtotime($SalesContract->sct_start_date);

            	$ship_year = date('Y', $ship_month);

            	$ship_month = date('F', $ship_month);
            	
            }

            $data = array('name'=>"Trading Department", "contract"=>$contract, "client"=>$client, "ship_month"=>$ship_month, "quality"=>$quality, "quantity"=>$quantity, "ship_year"=>$ship_year);    

            Mail::send(['text'=>'mail'], $data, function($message) {

	            $message->to('trading.ea@nkg.coffee', 'Stuffing-')->subject('Stuffed Contract');

	            $message->from('lewis.mutua@nkg.coffee','Ibero Database');

            });

            return View::make('stuffing', compact('id', 'Season', 'country', 'cid', 'contract', 'shipmentmonth','client', 'clid', 'spid', 'date', 'disposaldate', 'description', 'packages', 'SalesContract', 'bskt', 'basket', 'Packaging', 'packaging_method', 'packaging_type', 'weighbridge_ticket','StuffingView', 'shipmentyear', 'syrid', 'SalesContractSummary', 'client_reference', 'rates', 'teams'));

        } else if(NULL !== Input::get('searchButtonContract')){

            $SalesContract = SalesContract::where('ctr_id', '=', $cid)->where('sct_number',  $contract)->first();
            $StuffingView = StuffingView::where('sct_id', $sctID)->get();

            $disposaldate = Input::get('disposaldate');


            if ($SalesContract !== NULL){
                if ($clid == NULL) {
                    $clid = $SalesContract->cl_id;
                }
            }
            $request->session()->flash('alert-success', 'Sales Contract Information Found!!');
            return View::make('stuffing', compact('id', 'Season', 'country', 'cid', 'contract', 'shipmentmonth','client', 'clid', 'spid', 'date', 'disposaldate', 'description', 'packages', 'SalesContract', 'bskt', 'basket', 'Packaging', 'packaging_method', 'packaging_type', 'weighbridge_ticket','StuffingView', 'shipmentyear', 'syrid', 'SalesContractSummary', 'client_reference', 'rates', 'teams'));

        } else {
            return View::make('stuffing', compact('id', 'Season', 'country', 'shipmentmonth','client', 'bskt', 'basket', 'Packaging', 'packaging_method', 'packaging_type', 'weighbridge_ticket','StuffingView', 'shipmentyear', 'syrid', 'SalesContractSummary', 'client_reference', 'cid', 'rates', 'teams'));
        }


    }


	public function stuffing_delete($id)
	{   

		$stuffing_details = Stuffing::findOrFail($id);  
		if ($stuffing_details) {
	    	$stuffing_details->delete();
		}

		return redirect('stuffing');
		
	}


}