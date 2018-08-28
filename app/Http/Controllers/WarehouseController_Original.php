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


use Ngea\User;
use Ngea\OutturnTotalBatch;
use Auth;

use delete;


class WarehouseController extends Controller {

    public function arrivalInformationForm (Request $request){
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
		

		return View::make('arrivalinformation', compact('id', 
				'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'Packaging', 'grn_number'));	

    }


    public function arrivalInformation (Request $request){
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
		
		if (Input::get('grn_number') != NULL) {
			$grnsview = GrnsView::where('gr_number', Input::get('grn_number'))->get();
		}
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

		if ($sif_lot != NULL) {
			$btdetails = sale_lots::where('lot', $sif_lot)->where('csn_season',$season_name)->where('slid', $saleid)->first(); 
		} else if ($outt_number != NULL) {
			$btdetails = sale_lots::where('outturn', $outt_number)->where('csn_season',$season_name)->where('slid', $saleid)->first(); 

		}
		$batchview = NULL;
		if ($btdetails != NULL) {
			$batchview = BatchView::where('prc_id', $btdetails->prcid)->get();
				// print_r($btdetails->prcid);

		}


    	if(Input::get('country') != NULL){
	       	$Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
	    	$Mill = mills_region::where('ctr_id', Input::get('country'))->get(); 		
	    	$seller = seller::where('ctr_id', Input::get('country'))->get(); 		
	    	$weighbridge_ticket = Weighbridge::where('ctr_id', Input::get('country'))->get(); 		
    	}

		if (Input::get('confirmgrn') !== NULL){ 
	     	$this->validate($request, [
		            'country' => 'required', 
		        ]);
		    //confirm outturn weights	
		    //get ourturns
    		$cid = Input::get('country');
    		$Season = Season::all(['id', 'csn_season']);
    		$country = country::all(['id', 'ctr_name', 'ctr_initial']);

			$grndetails = Grn::where('gr_number', Input::get('grn_number'))->where('ctr_id', $cid)->first(); 
			if ($grndetails != NULL) {
				$grnsview = GrnsView::where('id', $grndetails->id)->get();
			}
            $user_data = Auth::user();
            $user = $user_data ->id;

		    
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
		    	if ($absolute_difference > 60) {
				    // $showDialog = true;
				    // return view('arrivalinformation', ['willShow' => $showDialog]);			

					$request->session()->flash('alert-warning', 'Outturn No. '.$value->outturn.' has a huge diffrence in Weight!');
					return View::make('arrivalinformation', compact('id', 
						'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'Packaging', 'wrhse', 'location', 'rw', 'clm', 'grn_number', 'weighbridge_ticket', 'wbtk', 'rlno', 'ot_season', 'grnsview', 'grndetails'));				    		
		    	} else {
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
			$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('outt_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby','!=', null)->where('sl_quality_confirmedby','!=', null)->where('sl_auction_confirmedby','!=', null)->orderBy('sl_no')->get();
		    

			return View::make('arrivalinformation', compact('id', 
				'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'Packaging', 'wrhse', 'location', 'rw', 'clm', 'grn_number', 'wbtk', 'rlno', 'ot_season', 'grndetails', 'weighbridge_ticket', 'grnsview'));	
		} else if (NULL !== Input::get('submitlot')){
	     	$this->validate($request, [
		            'country' => 'required', 
		        ]);
			$weighbridgeTK = Input::get('weighbridgeTK');
			$outt_season = Input::get('outt_season');
			$cid = Input::get('country');

			if ($outt_season == NULL || $weighbridgeTK == NULL) {
				$Season = Season::all(['id', 'csn_season']);
		    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);

				$request->session()->flash('alert-warning', 'Season and Weighbridge Ticket are Required!');
				return View::make('arrivalinformation', compact('id', 
					'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'Packaging', 'wrhse', 'location', 'rw', 'clm', 'grn_number', 'weighbridge_ticket', 'wbtk', 'rlno', 'ot_season', 'grnsview', 'batchview'));					
			}

			

			$sif_lot = Input::get('sif_lot');
			$outt_number = Input::get('outt_number');

			$grn_number = Input::get('grn_number');
			$rlno = Input::get('rlno');
			$dispatch_kilograms = Input::get('dispatch_kilograms');
			$delivery_kilograms = Input::get('delivery_kilograms');


			// $tare_kilograms = Input::get('tare_kilograms');
			$moisture = Input::get('moisture');
			$packaging = Input::get('packaging');


            $user_data = Auth::user();
            $user = $user_data ->id;


            $wbtk = Input::get('weighbridgeTK');  

			$season_name = Season::where('id', $outt_season)->first();
			$season_name = $season_name->csn_season;
			if ($sif_lot != NULL) {
				$cdetails = sale_lots::where('lot', $sif_lot)->where('csn_season',$season_name)->where('slid', $saleid)->first(); 
				$outt_number = $cdetails->outturn;						
			} else if ($outt_number != NULL) {
				$cdetails = sale_lots::where('outturn', $outt_number)->where('csn_season',$season_name)->where('slid', $saleid)->first(); 
				$sif_lot = $cdetails->lot;	
			}
	        //insert/update into grn
	        $grndetails = Grn::where('gr_number', Input::get('grn_number'))->where('ctr_id', $cid)->first(); 
			if ($grndetails != NULL) {
				$grnid = $grndetails->id;
				Grn::where('id', '=', $grnid)
				->update(['ctr_id' => $cid,'wb_id' => $weighbridgeTK]);
				Activity::log('Updated Grn information with grn_id '.$grnid. ' ctr_id '. $cid. ' wb_id '. $weighbridgeTK);
			} else {
				$grnid = Grn::insertGetId (
				['gr_number' => $grn_number,'ctr_id' => $cid,'wb_id' => $weighbridgeTK]);
				Activity::log('Inserted Grn information with grn_id '.$grnid. ' ctr_id '. $cid. ' wb_id '. $weighbridgeTK. ' grn_number '. $grn_number);
			}
	        $grndetails = Grn::where('gr_number', Input::get('grn_number'))->where('ctr_id', $cid)->first(); 

			$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('outt_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby','!=', null)->where('sl_quality_confirmedby','!=', null)->where('sl_auction_confirmedby','!=', null)->orderBy('sl_no')->get();



			//insert/update into stock
			$prdetails = purchase::where('cfd_id', $cdetails->id)->first(); 
			$stdetails = Stock::where('prc_id', $prdetails->id)->first(); 
			if ($stdetails != NULL) {
				$stid = $stdetails->id;
				Stock::where('id', '=', $stid)
				->update(['gr_id' => $grnid,'st_dispatch_net' => $dispatch_kilograms,'st_gross' => $delivery_kilograms, 'st_moisture' =>  $moisture,  'pkg_id' =>  $packaging, 'usr_id' =>  $user, 'sts_id' => '1', 'ctr_id' => $cid]);
				$request->session()->flash('alert-success', 'Stock Information Updated!!');
				Activity::log('Updated Stock information with stid'.$stid. ' grn_id '. $grnid. ' dispatch_kilograms '. $dispatch_kilograms. ' delivery_kilograms '. $delivery_kilograms.' moisture '. $moisture. ' packaging '. $packaging);
			} else {
				$stid = Stock::insertGetId(['prc_id' => $prdetails->id,'gr_id' => $grnid,'st_dispatch_net' => $dispatch_kilograms,'st_gross' => $delivery_kilograms, 'st_moisture' =>  $moisture,  'pkg_id' =>  $packaging, 'usr_id' =>  $user, 'sts_id' => '1', 'ctr_id' => $cid]);
				$request->session()->flash('alert-success', 'Stock Information Updated!!');
				Activity::log('Inserted Stock information with stid'.$stid. ' grn_id '. $grnid. ' dispatch_kilograms '. $dispatch_kilograms. ' delivery_kilograms '. $delivery_kilograms. ' moisture '. $moisture. ' packaging '. $packaging);
			}
			

			if ($sif_lot != NULL) {
				$cdetails = sale_lots::where('lot', $sif_lot)->where('csn_season',$season_name)->where('slid', $saleid)->first(); 
				$outt_number = $cdetails->outturn;						
			} else if ($outt_number != NULL) {
				$cdetails = sale_lots::where('outturn', $outt_number)->where('csn_season',$season_name)->where('slid', $saleid)->first(); 
				$sif_lot = $cdetails->lot;	
			}
	        $Season = Season::all(['id', 'csn_season']);
	        $country = country::all(['id', 'ctr_name', 'ctr_initial']);
			
			
			$stdetails = Stock::where('id', $stid)->first(); 

			$weighbridge_ticket = Weighbridge::where('ctr_id', Input::get('country'))->get();
			// $grnsview = GrnsView::where('stid', $stid)->first();
			// $grndetails = Grn::where('gr_number', $grnsview->gr_number)->where('ctr_id', $cid)->first(); 
			// $grnsview = GrnsView::where('stid', $stid)->get();

			$grndetails = Grn::where('gr_number', Input::get('grn_number'))->where('ctr_id', $cid)->first(); 
			$grnsview = NULL;

			if ($grndetails != NULL) {
				$grnsview = GrnsView::where('id', $grndetails->id)->get();
			}

			return View::make('arrivalinformation', compact('id', 
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

				$cid = Input::get('country');

				$sif_lot = Input::get('sif_lot');
				$outt_number = Input::get('outt_number');

				$grn_number = Input::get('grn_number');
				$rlno = Input::get('rlno');
				$dispatch_kilograms = Input::get('dispatch_kilograms');
				$delivery_kilograms = Input::get('delivery_kilograms');
				$tare_kilograms = Input::get('tare_kilograms');
				$moisture = Input::get('moisture');
				$packaging = Input::get('packaging');

				$batch_kilograms = Input::get('batch_kilograms');
				$warehouse = Input::get('warehouse');
				$row = Input::get('row');
				$column = Input::get('column');
				$zone = Input::get('zone');

				$packages = Input::get('packages');

				$package_weight = Packaging::where('id', $packaging)->first();
				$tare = ($package_weight->pkg_weight) * $packages;
				$net_weight = $batch_kilograms - $tare;
				$bags = floor($net_weight/60);
				$pockets = floor($net_weight % 60);
				$btnumber = Input::get('btnumber');


	            $user_data = Auth::user();
	            $user = $user_data ->id;

	            $wbtk = Input::get('weighbridgeTK');  

				$season_name = Season::where('id', $outt_season)->first();
				$season_name = $season_name->csn_season;
				if ($sif_lot != NULL) {
					$cdetails = sale_lots::where('lot', $sif_lot)->where('csn_season',$season_name)->where('slid', $saleid)->first(); 
					$outt_number = $cdetails->outturn;						
				} else if ($outt_number != NULL) {
					$cdetails = sale_lots::where('outturn', $outt_number)->where('csn_season',$season_name)->where('slid', $saleid)->first(); 
					$sif_lot = $cdetails->lot;	
				}
				if ($cdetails != NULL) {
					$prdetails = purchase::where('cfd_id', $cdetails->id)->first(); 
					$stdetails = Stock::where('prc_id', $prdetails->id)->first(); 
					// print_r($prdetails->id);
					$stid = $stdetails->id;
					$stdetails = Stock::where('id', $stid)->first(); 
				}
				// $prdetails = purchase::where('cfd_id', $cdetails->id)->first(); 
				// $stdetails = Stock::where('prc_id', $prdetails->id)->first(); 

				// $stid = $stdetails->id;
				$grndetails = Grn::where('gr_number', Input::get('grn_number'))->where('ctr_id', $cid)->first(); 
				// $stdetails = Stock::where('id', $stid)->first(); 



				//add batch
		        $btdetails = Batch::where('st_id', $stid)->first(); 
				// if ($btdetails != NULL) {
				// 	$btid = $btdetails->id;
				// 	Batch::where('id', '=', $btid)
				// 	->update(['btc_weight' => $batch_kilograms,'btc_bags' => $bags,'btc_pockets' => $pockets]);
				// 	Activity::log('Updated Batch information with btid '.$btid. ' batch_kilograms '. $batch_kilograms. ' bags '. $bags. ' pockets '. $pockets. ' stid '. $stid);
				// } else {
				$btid = Batch::insertGetId (
				['btc_number' => $btnumber, 'st_id' => $stid, 'btc_weight' => $batch_kilograms, 'btc_tare' => $tare, 'btc_net_weight' => $net_weight, 'btc_packages' => $packages, 'btc_bags' => $bags, 'btc_pockets' => $pockets]);
				Activity::log('Inserted Batch information with btid '.$btid. ' batch_kilograms '. $batch_kilograms. ' bags '. $bags. ' pockets '. $pockets. ' stid '. $stid.' btc_tare '.$tare.' btc_net_weight '.$net_weight);
				// }			
				$Season = Season::all(['id', 'csn_season']);
		        $country = country::all(['id', 'ctr_name', 'ctr_initial']);
				//add batch location
				//get location id


		        $locrowdetails = Location::where('wr_id', $warehouse)->where('loc_row', $row)->first(); 
		        $loccoldetails = Location::where('wr_id', $warehouse)->where('loc_column', $column)->first(); 

		        $locrowid = $locrowdetails->id;
		        $loccolid = $loccoldetails->id;
 
		        // $stlocdetails = StockLocation::where('bt_id', $btid)->where('loc_id', $locid)->first(); 

				$stlocid = StockLocation::insertGetId (
				['bt_id' => $btid, 'loc_row_id' => $locrowid, 'loc_column_id' => $loccolid, 'btc_zone' => $zone]);
				Activity::log('Inserted StockLocation information with bt_id '.$btid. ' locrowid '. $locrowid. ' loccolid '. $loccolid. ' zone '. $zone);

				$weighbridge_ticket = Weighbridge::where('ctr_id', Input::get('country'))->get();




				if ($sif_lot != NULL) {
					$btdetails = sale_lots::where('lot', $sif_lot)->where('csn_season',$season_name)->where('slid', $saleid)->first(); 
				} else if ($outt_number != NULL) {
					$btdetails = sale_lots::where('outturn', $outt_number)->where('csn_season',$season_name)->where('slid', $saleid)->first(); 
					
				}

				$batchview = NULL;
				if ($btdetails != NULL) {
					$batchview = BatchView::where('prc_id', $btdetails->prcid)->get();
				}
				$prdetails = purchase::where('cfd_id', $cdetails->id)->first(); 
				$stdetails = Stock::where('prc_id', $prdetails->id)->first(); 

				$stid = NULL;
				if ($stdetails != NULL) {
					$stid = $stdetails->id;			 
				}
				// $grnsview = GrnsView::where('stid', $stid)->first();
				// $grndetails = Grn::where('gr_number', $grnsview->gr_number)->where('ctr_id', $cid)->first(); 
				// $grnsview = GrnsView::where('stid', $stid)->get();

				$grndetails = Grn::where('gr_number', Input::get('grn_number'))->where('ctr_id', $cid)->first(); 


				if ($grndetails != NULL) {
					$grnsview = GrnsView::where('id', $grndetails->id)->get();
				}
				$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('outt_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby','!=', null)->where('sl_quality_confirmedby','!=', null)->where('sl_auction_confirmedby','!=', null)->orderBy('sl_no')->get();

				return View::make('arrivalinformation', compact('id', 
					'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'Packaging', 'wrhse', 'location', 'rw', 'clm', 'grn_number', 'wbtk', 'rlno', 'ot_season', 'cdetails', 'grndetails', 'stdetails', 'weighbridge_ticket', 'grnsview', 'batchview'));	
	    	
		} else if (NULL !== Input::get('searchButtonGrn')) {
				$cid = Input::get('country');
				$Season = Season::all(['id', 'csn_season']);
		        $country = country::all(['id', 'ctr_name', 'ctr_initial']);
				$grndetails = Grn::where('gr_number', Input::get('grn_number'))->where('ctr_id', $cid)->first(); 
				if ($grndetails != NULL) {
					$grnsview = GrnsView::where('id', $grndetails->id)->get();
				}
				
				$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('outt_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby','!=', null)->where('sl_quality_confirmedby','!=', null)->where('sl_auction_confirmedby','!=', null)->orderBy('sl_no')->get();

				return View::make('arrivalinformation', compact('id', 
					'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'Packaging', 'wrhse', 'location', 'rw', 'clm', 'grn_number', 'wbtk', 'rlno', 'ot_season', 'grndetails', 'weighbridge_ticket', 'grnsview'));	

		} else if (NULL !== Input::get('searchButtonLot') || NULL !== Input::get('searchButtonOutturn')) {
	     	 $this->validate($request, [
		            'country' => 'required'
		        ]);
			$cid = Input::get('country');
			$csn_season = Input::get('outt_season');
			$weighbridgeTK = Input::get('weighbridgeTK');

			$outt_season = Input::get('outt_season');
			$sif_lot = Input::get('sif_lot');
			$outt_number = Input::get('outt_number');

			if ($outt_season == NULL || $weighbridgeTK == NULL || $saleid == NULL) {
				$Season = Season::all(['id', 'csn_season']);
		    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);

				$request->session()->flash('alert-warning', 'Season and Weighbridge Ticket are Required!');
				return View::make('arrivalinformation', compact('id', 
					'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'Packaging', 'wrhse', 'location', 'rw', 'clm', 'grn_number', 'weighbridge_ticket', 'wbtk', 'rlno', 'ot_season', 'grnsview', 'batchview'));					
			}
			$season_name = Season::where('id', $outt_season)->first();
			$season_name = $season_name->csn_season;
			if ($sif_lot != NULL) {
				$cdetails = sale_lots::where('lot', $sif_lot)->where('csn_season',$season_name)->whereNotNull('rl_no')->where('slid', $saleid)->first(); 
				
				if ($cdetails != NULL) {
					$outt_number = $cdetails->outturn;
				}				

	
			} else if ($outt_number != NULL) {
				$cdetails = sale_lots::where('outturn', $outt_number)->where('csn_season',$season_name)->whereNotNull('rl_no')->where('slid', $saleid)->first(); 
				if ($cdetails != NULL) {
					$sif_lot = $cdetails->lot;		
				}
			}

			$seller = Input::get('seller');
			$coffee_buyer = Input::get('coffee_buyer');
			$vehicle_plate = Input::get('vehicle_plate');
			$weighbridge_weight_in = Input::get('weighbridge_weight_in');
			$weighbridge_weight_out = Input::get('weighbridge_weight_out');

			$date = Input::get('date');
			$date=date_create($date);
			$date = date_format($date,"Y-m-d");	
			
			$weighbridge_all = weighbridge::where('cb_id', $coffee_buyer)->where('ctr_id', Input::get('country'))->get();

	    	$Season = Season::all(['id', 'csn_season']);
	    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);

	    	if(Input::get('country') != NULL){
		       	$Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
		    	$Mill = mills_region::where('ctr_id', Input::get('country'))->get(); 		
		    	$seller = seller::where('ctr_id', Input::get('country'))->get(); 		
	    	}
			$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('outt_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby','!=', null)->where('sl_quality_confirmedby','!=', null)->where('sl_auction_confirmedby','!=', null)->orderBy('sl_no')->get();

			$cid = Input::get('country');
			$csn_season = Input::get('outt_season');

			$prdetails = NULL;
			$stdetails = NULL;			
			if ($cdetails !== NULL) {
				$prdetails = purchase::where('cfd_id', $cdetails->id)->whereNotNull('rl_id')->first(); 
			}
			if ($prdetails !== NULL) {
				$stdetails = Stock::where('prc_id', $prdetails->id)->first(); 
			}

	 
			
			

			$stid = NULL;

			if ($stdetails != NULL) {
				$stid = $stdetails->id;			
			}
			// $stdetails = Stock::where('id', $stid)->first(); 


			// $grnsview = GrnsView::where('stid', $stid)->first();
			// if ($stid == NULL) {
			// 	# code...
			// }
			// $grnsview = GrnsView::where('stid', $stid)->get();
			// $gr_number = NULL;
			// foreach ($grnsview as $key => $value) {
			// 	$gr_number = $value-$gr_number;
			// 	print_r($gr_number);
			// }


			$grndetails = Grn::where('gr_number', Input::get('grn_number'))->where('ctr_id', $cid)->first(); 


			if ($grndetails != NULL) {
				$grnsview = GrnsView::where('id', $grndetails->id)->get();
			}



			return View::make('arrivalinformation', compact('id', 
				'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'Packaging', 'wrhse', 'location', 'rw', 'clm', 'grn_number', 'weighbridge_ticket', 'wbtk', 'rlno', 'ot_season', 'cdetails', 'grndetails', 'stdetails', 'grnsview', 'batchview'));	

		}  else if (NULL !== Input::get('printarrivalinformation')) {
				$this->validate($request, ['country' => 'required',  'outt_season' => 'required', 'sale' => 'required', 'seller' => 'required', 'coffee_buyer' => 'required', 'trp' => 'required', 'release_no' => 'required', 'date' => 'required',
						        ]);
				$saleid = Input::get('sale');			
				$release_no = Input::get('release_no');

				$date = Input::get('date');
				$date=date_create($date);
				$date = date_format($date,"Y-m-d");	

	            $user_data = Auth::user();
	            $user = $user_data ->id;

				$sale_lots = sale_lots::where('slid', $saleid)->where('slrid',Input::get('seller'))->where('cbid',Input::get('coffee_buyer'))->whereNotNull('warrant_no')->whereNotNull('rl_no')->where('slid', $saleid)->get();

				$to = seller::where('id', '=', Input::get('seller'))->first();
				$to = $to->slr_name;
				$att = $to->slr_att;
				$cc = transporters::where('id', '=', Input::get('trp'))->first();
				$cc = $cc->trp_name;

				$date = release_instructions::where('rl_no', $release_no)->first();
				$date = $date->rl_date;
				$date = date("m/d/Y", strtotime($date));	

				$buyer = buyer::where('id', Input::get('coffee_buyer'))->first(); 
				$buyer = $buyer->cb_name;



			    $pdf = PDF::loadView('pdf.release_instructions', compact('to', 'att', 'cc', 'date', 'release_no', 'buyer', 'sale_lots'));
			    #$pdf->showImageErrors = true;

			    return $pdf->stream($release_no.' release_instructions.pdf');

	}  else {
    	$Season = Season::all(['id', 'csn_season']);
    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
    	$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
    	$region = Region::where('ctr_id', Input::get('country'))->get();

    	if (Input::get('grn_number') !== NULL) {
    		$grn_number = Input::get('grn_number');
    	}

    	if(Input::get('country') != NULL){
	       	$Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
	    	$Mill = mills_region::where('ctr_id', Input::get('country'))->get(); 		
	    	$seller = seller::where('ctr_id', Input::get('country'))->get(); 		
	    	$weighbridge_ticket = Weighbridge::where('ctr_id', Input::get('country'))->get(); 		
    	}

		$outt_season = Input::get('outt_season');
		$sif_lot = Input::get('sif_lot');
		$outt_number = Input::get('outt_number');

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


		if ($sif_lot != NULL) {
			$cdetails = sale_lots::where('lot', $sif_lot)->where('csn_season',$season_name)->where('slid', $saleid)->first(); 

		} else if ($outt_number != NULL) {
			$cdetails = sale_lots::where('outturn', $outt_number)->where('csn_season',$season_name)->where('slid', $saleid)->first(); 
		}


		if ($cdetails != NULL) {
			$prdetails = purchase::where('cfd_id', $cdetails->id)->first(); 
			$stdetails = Stock::where('prc_id', $prdetails->id)->first(); 
			// print_r($prdetails->id);
			$stid = $stdetails->id;
			$stdetails = Stock::where('id', $stid)->first(); 
		}

		if ($grndetails != NULL) {
			$grndetails = Grn::where('gr_number', Input::get('grn_number'))->where('ctr_id', $cid)->first();  
		}



    	if($request->has('country')){
    		if($request->has('outt_season') & Input::get('outt_season') !== "Sale Season" ){

				if($request->has('sale') && Input::get('sale') != 'Sale No.'){
				$sale = Sale::where('id', '=', Input::get('sale'))->where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('outt_season'))->where('sltyp_id',  '1')->first();

					$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('outt_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby','!=', null)->where('sl_quality_confirmedby','!=', null)->where('sl_auction_confirmedby','!=', null)->orderBy('sl_no')->get();
					// $request->session()->flash('alert-success', 'Sale found!!');
					$cid = Input::get('country');
					$csn_season = Input::get('outt_season');
					$saleid = Input::get('sale');
					$sale_lots = sale_lots::where('slid', $saleid)->where('slrid',Input::get('seller'))->where('cbid',Input::get('coffee_buyer'))->whereNotNull('warrant_no')->get(); 

					$sale_lots_released = sale_lots::where('slid', $saleid)->where('slrid',Input::get('seller'))->where('cbid',Input::get('coffee_buyer'))->whereNotNull('warrant_no')->whereNotNull('rl_no')->get(); 

					// $saleno = Sale::where('id', '=', Input::get('sale'))->first();
					// $sellerinit = seller::where('id', '=', Input::get('seller'))->first();
					// $release_no = $saleno->sl_no.$sellerinit->slr_initials;
					// $date = release_instructions::where('rl_no', $release_no)->first();
					// $date = $date->rl_date;
					// $date = date("m/d/Y", strtotime($date));

					return View::make('arrivalinformation', compact('id', 
						'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'Packaging', 'wrhse', 'location', 'rw', 'clm', 'weighbridge_ticket', 'grn_number', 'wbtk', 'rlno', 'ot_season', 'cdetails', 'grndetails', 'stdetails', 'grnsview', 'batchview','batch_kilograms', 'bags', 'pockets'));	


				} else {
					$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('outt_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby','!=', null)->where('sl_quality_confirmedby','!=', null)->where('sl_auction_confirmedby','!=', null)->orderBy('sl_no')->get();
					$cid = Input::get('country');
					$csn_season = Input::get('outt_season');
					return View::make('arrivalinformation', compact('id', 
						'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'sale_lots', 'transporters', 'trp','release_no', 'Packaging', 'wrhse', 'location', 'rw', 'clm', 'weighbridge_ticket', 'grn_number', 'wbtk', 'rlno', 'ot_season', 'cdetails', 'grndetails', 'stdetails', 'grnsview', 'batchview','batch_kilograms', 'bags', 'pockets'));					
				}

	    			


    		} else {
    				$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('outt_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby','!=', null)->where('sl_quality_confirmedby','!=', null)->where('sl_auction_confirmedby','!=', null)->orderBy('sl_no')->get();
					// $request->session()->flash('alert-success', 'Sale found!!');

					// print_r($sale."-Lewis:".Input::get('outt_season'));

					$cid = Input::get('country');
					$csn_season = Input::get('outt_season');
					return View::make('arrivalinformation', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'Packaging', 'wrhse', 'location', 'rw', 'clm', 'weighbridge_ticket', 'grn_number', 'wbtk', 'rlno', 'ot_season', 'cdetails', 'grndetails', 'stdetails', 'grnsview', 'batchview','batch_kilograms', 'bags', 'pockets'));	
			}
    	} else {

			return redirect('arrivalinformation')
                        ->withErrors("Please select a valid Country!!")->withInput();
		}

    	return View::make('arrivalinformation', compact('id', 'Season', 'country', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'Packaging', 'wrhse', 'location', 'rw', 'clm', 'weighbridge_ticket', 'grn_number', 'wbtk', 'rlno', 'ot_season', 'cdetails', 'grndetails', 'stdetails', 'grnsview', 'batchview','batch_kilograms', 'bags', 'pockets'));		
	   }
    
 	}




    public function changeLocationForm (Request $request){
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

		return View::make('changelocation', compact('id', 
				'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released'));	

    }


    public function changeLocation (Request $request){
    	$Warehouse = NULL;
    	$sale_status = sale_status::all(['id', 'sst_name']);
    	$basket = basket::where('ctr_id', Input::get('country'))->get();

		$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
		$wrhse = Input::get('warehouse'); 

		if ($wrhse !== NULL) {
			$location = Location::where('wr_id', $wrhse)->get();
		}
		$outt_season = Input::get('outt_season');
		$ot_season = Input::get('outt_season');

		$sif_lot = Input::get('sif_lot');
		$outt_number = Input::get('outt_number');

		$saleid = 14;
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
		   	$Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
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

		if (NULL !== Input::get('changelocation')){
	     	 $this->validate($request, [
		            'country' => 'required', 
		        ]);

				if ($outt_season == NULL) {
					$Season = Season::all(['id', 'csn_season']);
			    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
			    }
				$season_name = Season::where('id', $outt_season)->first();
				$season_name = $season_name->csn_season;
				if ($outt_number != NULL) {
					$cdetails = sale_lots::where('outturn', $outt_number)->where('csn_season',$season_name)->where('slid', $saleid)->first(); 
					$sif_lot = $cdetails->lot;			
				} else if ($sif_lot != NULL) {
					$cdetails = sale_lots::where('lot', $sif_lot)->where('csn_season',$season_name)->where('slid', $saleid)->first(); 
					$outt_number = $cdetails->outturn;
				}


		    	$Season = Season::all(['id', 'csn_season']);
		    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);

		    	if(Input::get('country') != NULL){
			       	$Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
			    	$Mill = mills_region::where('ctr_id', Input::get('country'))->get(); 		
			    	$seller = seller::where('ctr_id', Input::get('country'))->get(); 		
		    	}
				$cid = Input::get('country');
				$csn_season = Input::get('outt_season');


		 
				$prdetails = purchase::where('cfd_id', $cdetails->id)->first(); 
				$stdetails = Stock::where('prc_id', $prdetails->id)->first(); 

				$stid = NULL;
				if ($stdetails != NULL) {
					$stid = $stdetails->id;			
				}
				// $grndetails = Grn::where('gr_number', Input::get('grn_number'))->where('ctr_id', $cid)->first(); 
				$stdetails = Stock::where('id', $stid)->first(); 

				if ($btdetails != NULL) {
					$batchview = BatchView::where('prc_id', $btdetails->prcid)->get();
				}
				$grnsview = GrnsView::where('stid', $stid)->first();
				$grndetails = Grn::where('gr_number', $grnsview->gr_number)->where('ctr_id', $cid)->first(); 
				$grnsview = GrnsView::where('stid', $stid)->get();


			$batchlocation = Input::get('batchlocation');
			$row = Input::get('row');
			$column = Input::get('column');
			$zone = Input::get('zone');

			$batch_kilograms = Input::get('batch_kilograms');
			$bags = Input::get('bags');
			$pockets = Input::get('pockets');

		
			$diff_weight = NULL;
			$diff_bags = NULL;
			$diff_pkts = NULL;
			$batchview_cf = NULL;
			$previd = NULL;
			$old_weight = NULL;
			$old_bags = NULL;
			$old_pkts = NULL;
				
	     	 foreach ($batchlocation as $key => $value) {
	     	 	$batchview_cf = BatchView::where('id', $value)->first();
				//compute weights and add batches
				$old_weight += $batchview_cf->btc_weight;
				$old_bags += $batchview_cf->btc_bags;
				$old_pkts += $batchview_cf->btc_pockets;
				// $batch_kilograms = $diff_weight;
				// $bags = $diff_bags;
				// $pockets = $diff_pkts;
				
	     	 }
			$diff_weight = $old_weight-$batch_kilograms;
			$diff_bags = $old_bags-$bags;
			$diff_pkts = $old_pkts-$pockets;

				// print_r($diff_weight);

	     	 
	     	 $stid = $batchview_cf->stid;
	     	 $previd = $batchview_cf->id;
	     	 $otbid = NULL;	     	 

			if ($diff_weight < 0 || $diff_bags < 0 || $diff_pkts < 0) {
				$request->session()->flash('alert-warning', 'Verify your weights, bags and pockets!');
				return View::make('changelocation', compact('id', 
					'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'Packaging', 'wrhse', 'location', 'rw', 'clm', 'grn_number', 'weighbridge_ticket', 'wbtk', 'rlno', 'ot_season', 'cdetails', 'grndetails', 'stdetails', 'grnsview', 'batchview'));				
			} else {
				$otbid = OutturnTotalBatch::insertGetId (
				['otb_weight' => $batch_kilograms,'otb_confirmed_by' => $user]);
				Activity::log('Inserted OutturnTotal information with batch_kilograms '.$batch_kilograms. ' user '. $user);	

			}
			$warehouse = Input::get('warehouse');


			if ($diff_weight > 0 || $diff_bags > 0 || $diff_pkts > 0) {

				$bt_no = Batch::orderBy('btc_number', 'desc')->pluck('btc_number');
				foreach ($bt_no as $bt) {
				    $bt_no = $bt;
				}	
				if ($bt_no != NULL && is_numeric($bt_no)) {					
					$bt_no = $bt_no;
				} else {
					$bt_no = 1;
				}


				$btid = Batch::insertGetId (
				['btc_number' => $bt_no, 'st_id' => $stid, 'btc_weight' => $diff_weight, 'btc_bags' => $diff_bags, 'btc_pockets' => $diff_pkts, 'otb_id' => $otbid, 'btc_prev_id' => $previd]);
				Activity::log('Inserted Batch information with btid '.$btid. ' diff_weight '. $diff_weight. ' bags '. $diff_bags. ' pockets '. $diff_pkts. ' stid '. $stid);	

		        $locrowdetails = Location::where('wr_id', $warehouse)->where('loc_row', $batchview_cf->loc_row)->first(); 
		        $loccoldetails = Location::where('wr_id', $warehouse)->where('loc_column', $batchview_cf->loc_column)->first(); 

		        $locrowid = $locrowdetails->id;
		        $loccolid = $loccoldetails->id;


				$stlocid = StockLocation::insertGetId (
				['bt_id' => $btid, 'loc_row_id' => $locrowid, 'loc_column_id' => $loccolid, 'btc_zone' => $batchview_cf->btc_zone]);
				Activity::log('Inserted StockLocation information with bt_id '.$btid. ' locrowid '. $locrowid. ' loccolid '. $loccolid. ' zone '. $batchview_cf->btc_zone);

			} 

				$bt_no = Batch::orderBy('btc_number', 'desc')->pluck('btc_number');
				foreach ($bt_no as $bt) {
				    $bt_no = $bt;
				}	
				if ($bt_no != NULL && is_numeric($bt_no)) {					
					$bt_no = $bt_no;
				} else {
					$bt_no = 1;
				}

				$batch_kilograms = Input::get('batch_kilograms');
				$bags = Input::get('bags');
				$pockets = Input::get('pockets');

				$btid = Batch::insertGetId (
				['btc_number' => $bt_no, 'st_id' => $stid, 'btc_weight' => $batch_kilograms, 'btc_bags' => $bags, 'btc_pockets' => $pockets, 'otb_id' => $otbid, 'btc_prev_id' => $previd]);
				Activity::log('Inserted Batch information with btid '.$btid. ' diff_weight '. $batch_kilograms. ' bags '. $bags. ' pockets '. $pockets. ' stid '. $stid);	

		        $locrowdetails = Location::where('wr_id', $warehouse)->where('loc_row', $row)->first(); 
		        $loccoldetails = Location::where('wr_id', $warehouse)->where('loc_column', $column)->first(); 

		        $locrowid = $locrowdetails->id;
		        $loccolid = $loccoldetails->id;

				$stlocid = StockLocation::insertGetId (
				['bt_id' => $btid, 'loc_row_id' => $locrowid, 'loc_column_id' => $loccolid, 'btc_zone' => $zone]);
				Activity::log('Inserted StockLocation information with bt_id '.$btid. ' locrowid '. $locrowid. ' loccolid '. $loccolid. ' zone '. $zone);
			



	     	 foreach ($batchlocation as $key => $value) {

	     	 	$batchview_cf = BatchView::where('id', $value)->first();

				Batch::where('id', '=', $value)
				->update(['btc_ended_by' => $user]);	

	     	 }

				if ($outt_season == NULL) {
					$Season = Season::all(['id', 'csn_season']);
			    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
			    }
				$season_name = Season::where('id', $outt_season)->first();
				$season_name = $season_name->csn_season;
				if ($outt_number != NULL) {
					$cdetails = sale_lots::where('outturn', $outt_number)->where('csn_season',$season_name)->where('slid', $saleid)->first(); 
					$sif_lot = $cdetails->lot;			
				} else if ($sif_lot != NULL) {
					$cdetails = sale_lots::where('lot', $sif_lot)->where('csn_season',$season_name)->where('slid', $saleid)->first(); 
					$outt_number = $cdetails->outturn;
				}

		 
				$prdetails = purchase::where('cfd_id', $cdetails->id)->first(); 
				$stdetails = Stock::where('prc_id', $prdetails->id)->first(); 

				$stid = NULL;
				if ($stdetails != NULL) {
					$stid = $stdetails->id;			
				}
				// $grndetails = Grn::where('gr_number', Input::get('grn_number'))->where('ctr_id', $cid)->first(); 
				$stdetails = Stock::where('id', $stid)->first(); 

				if ($btdetails != NULL) {
					$batchview = BatchView::where('prc_id', $btdetails->prcid)->get();
				}
				$grnsview = GrnsView::where('stid', $stid)->first();
				$grndetails = Grn::where('gr_number', $grnsview->gr_number)->where('ctr_id', $cid)->first(); 
				$grnsview = GrnsView::where('stid', $stid)->get();


			return View::make('changelocation', compact('id', 
				'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'Packaging', 'wrhse', 'location', 'rw', 'clm', 'grn_number', 'weighbridge_ticket', 'wbtk', 'rlno', 'ot_season', 'cdetails', 'grndetails', 'stdetails', 'grnsview', 'batchview'));	
    	
		}  else if (NULL !== Input::get('printchangelocation')) {
				$this->validate($request, ['country' => 'required',  'outt_season' => 'required', 'sale' => 'required', 'seller' => 'required', 'coffee_buyer' => 'required', 'trp' => 'required', 'release_no' => 'required', 'date' => 'required',
						        ]);


				$saleid = Input::get('sale');
				
				$release_no = Input::get('release_no');


				$date = Input::get('date');
				$date=date_create($date);
				$date = date_format($date,"Y-m-d");	

	            $user_data = Auth::user();
	            $user = $user_data ->id;

				$sale_lots = sale_lots::where('slid', $saleid)->where('slrid',Input::get('seller'))->where('cbid',Input::get('coffee_buyer'))->whereNotNull('warrant_no')->whereNotNull('rl_no')->get();

				$to = seller::where('id', '=', Input::get('seller'))->first();
				$to = $to->slr_name;
				$att = $to->slr_att;
				$cc = transporters::where('id', '=', Input::get('trp'))->first();
				$cc = $cc->trp_name;

				$date = release_instructions::where('rl_no', $release_no)->first();
				$date = $date->rl_date;
				$date = date("m/d/Y", strtotime($date));	

				$buyer = buyer::where('id', Input::get('coffee_buyer'))->first(); 
				$buyer = $buyer->cb_name;



			    $pdf = PDF::loadView('pdf.release_instructions', compact('to', 'att', 'cc', 'date', 'release_no', 'buyer', 'sale_lots'));
			    #$pdf->showImageErrors = true;

			    return $pdf->stream($release_no.' release_instructions.pdf');

	} else if (NULL !== Input::get('searchButtonLot') || NULL !== Input::get('searchButtonOutturn') ) {
	     	 $this->validate($request, [
		            'country' => 'required'
		        ]);

			$csn_season = Input::get('outt_season');
			$weighbridgeTK = Input::get('weighbridgeTK');


			if ($outt_season == NULL) {
				$Season = Season::all(['id', 'csn_season']);
		    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);

				$request->session()->flash('alert-warning', 'Season is Required!');
				return View::make('changelocation', compact('id', 
					'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'Packaging', 'wrhse', 'location', 'rw', 'clm', 'grn_number', 'weighbridge_ticket', 'wbtk', 'rlno', 'ot_season', 'grnsview', 'batchview'));					
			}
			$season_name = Season::where('id', $outt_season)->first();
			$season_name = $season_name->csn_season;
			if ($sif_lot != NULL) {
				$cdetails = sale_lots::where('lot', $sif_lot)->where('csn_season',$season_name)->where('slid', $saleid)->first(); 
				$outt_number = $cdetails->outturn;		
			} else if ($outt_number != NULL) {
				$cdetails = sale_lots::where('outturn', $outt_number)->where('csn_season',$season_name)->where('slid', $saleid)->first(); 
				$sif_lot = $cdetails->lot;	


			}

			$seller = Input::get('seller');
			$coffee_buyer = Input::get('coffee_buyer');
			// $weighbridge_ticket = Input::get('weighbridge_ticket');
			$vehicle_plate = Input::get('vehicle_plate');
			$weighbridge_weight_in = Input::get('weighbridge_weight_in');
			$weighbridge_weight_out = Input::get('weighbridge_weight_out');

			$date = Input::get('date');
			$date=date_create($date);
			$date = date_format($date,"Y-m-d");	

			// $weighbridge = weighbridge::where('wb_ticket', $weighbridge_ticket)->where('cb_id', $coffee_buyer)->where('ctr_id', $country)->first();
			$weighbridge_all = weighbridge::where('cb_id', $coffee_buyer)->where('ctr_id', Input::get('country'))->get();

	    	$Season = Season::all(['id', 'csn_season']);
	    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);

	    	if(Input::get('country') != NULL){
		       	$Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
		    	$Mill = mills_region::where('ctr_id', Input::get('country'))->get(); 		
		    	$seller = seller::where('ctr_id', Input::get('country'))->get(); 		
	    	}
			$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('outt_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby','!=', null)->where('sl_quality_confirmedby','!=', null)->where('sl_auction_confirmedby','!=', null)->orderBy('sl_no')->get();

			$cid = Input::get('country');
			$csn_season = Input::get('outt_season');


	 
			$prdetails = purchase::where('cfd_id', $cdetails->id)->first(); 
			$stdetails = Stock::where('prc_id', $prdetails->id)->first(); 

			$stid = NULL;
			if ($stdetails != NULL) {
				$stid = $stdetails->id;			
			}
			// $grndetails = Grn::where('gr_number', Input::get('grn_number'))->where('ctr_id', $cid)->first(); 
			$stdetails = Stock::where('id', $stid)->first(); 


			$grnsview = GrnsView::where('stid', $stid)->first();
			$grndetails = Grn::where('gr_number', $grnsview->gr_number)->where('ctr_id', $cid)->first(); 
			$grnsview = GrnsView::where('stid', $stid)->get();

			return View::make('changelocation', compact('id', 
				'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'Packaging', 'wrhse', 'location', 'rw', 'clm', 'grn_number', 'weighbridge_ticket', 'wbtk', 'rlno', 'ot_season', 'cdetails', 'grndetails', 'stdetails', 'grnsview', 'batchview'));	

		}  else {
	    	if (NULL != Input::get('warehouse')) {
				$csn_season = Input::get('outt_season');
				$weighbridgeTK = Input::get('weighbridgeTK');

				if ($outt_season == NULL) {
					$Season = Season::all(['id', 'csn_season']);
			    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
			    }
				$season_name = Season::where('id', $outt_season)->first();
				$season_name = $season_name->csn_season;
		
				if ($sif_lot != NULL) {
					$cdetails = sale_lots::where('lot', $sif_lot)->where('csn_season',$season_name)->where('slid', $saleid)->first(); 
					$outt_number = $cdetails->outturn;		
				} else if ($outt_number != NULL) {
					$cdetails = sale_lots::where('outturn', $outt_number)->where('csn_season',$season_name)->where('slid', $saleid)->first(); 
					$sif_lot = $cdetails->lot;	
					

				}


				$seller = Input::get('seller');
				$coffee_buyer = Input::get('coffee_buyer');
				// $weighbridge_ticket = Input::get('weighbridge_ticket');
				$vehicle_plate = Input::get('vehicle_plate');
				$weighbridge_weight_in = Input::get('weighbridge_weight_in');
				$weighbridge_weight_out = Input::get('weighbridge_weight_out');

				$date = Input::get('date');
				$date=date_create($date);
				$date = date_format($date,"Y-m-d");	

				// $weighbridge = weighbridge::where('wb_ticket', $weighbridge_ticket)->where('cb_id', $coffee_buyer)->where('ctr_id', $country)->first();
				$weighbridge_all = weighbridge::where('cb_id', $coffee_buyer)->where('ctr_id', Input::get('country'))->get();

		    	$Season = Season::all(['id', 'csn_season']);
		    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);

		    	if(Input::get('country') != NULL){
			       	$Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
			    	$Mill = mills_region::where('ctr_id', Input::get('country'))->get(); 		
			    	$seller = seller::where('ctr_id', Input::get('country'))->get(); 		
		    	}
				$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('outt_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby','!=', null)->where('sl_quality_confirmedby','!=', null)->where('sl_auction_confirmedby','!=', null)->orderBy('sl_no')->get();

				$cid = Input::get('country');
				$csn_season = Input::get('outt_season');


		 
				$prdetails = purchase::where('cfd_id', $cdetails->id)->first(); 
				$stdetails = Stock::where('prc_id', $prdetails->id)->first(); 

				$stid = NULL;
				if ($stdetails != NULL) {
					$stid = $stdetails->id;			
				}
				// $grndetails = Grn::where('gr_number', Input::get('grn_number'))->where('ctr_id', $cid)->first(); 
				$stdetails = Stock::where('id', $stid)->first(); 


				$grnsview = GrnsView::where('stid', $stid)->first();
				$grndetails = Grn::where('gr_number', $grnsview->gr_number)->where('ctr_id', $cid)->first(); 
				$grnsview = GrnsView::where('stid', $stid)->get();

	    	}

			return View::make('changelocation', compact('id', 
				'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'Packaging', 'wrhse', 'location', 'rw', 'clm', 'grn_number', 'weighbridge_ticket', 'wbtk', 'rlno', 'ot_season', 'cdetails', 'grndetails', 'stdetails', 'grnsview', 'batchview'));		
 	   }
    
 	}









    public function manageLocationsForm (Request $request){
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

		return View::make('managelocations', compact('id', 
				'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released'));	

    }


    public function manageLocations (Request $request){
    	$Warehouse = NULL;
    	$sale_status = sale_status::all(['id', 'sst_name']);
    	$basket = basket::where('ctr_id', Input::get('country'))->get();

		$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
		$wrhse = Input::get('warehouse'); 

		if ($wrhse !== NULL) {
			$location = Location::where('wr_id', $wrhse)->get();
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
		   	$Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
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

	if (NULL !== Input::get('managelocations')){
	     	 $this->validate($request, [
		            'country' => 'required', 
		        ]);

				if ($outt_season == NULL) {
					$Season = Season::all(['id', 'csn_season']);
			    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
			    }
				$season_name = Season::where('id', $outt_season)->first();
				$season_name = $season_name->csn_season;
				if ($sif_lot != NULL) {

					$cdetails = sale_lots::where('lot', $sif_lot)->where('csn_season',$season_name)->where('slid', $saleid)->first(); 
					$outt_number = $cdetails->outturn;

				} else if ($outt_number != NULL) {
					$cdetails = sale_lots::where('outturn', $outt_number)->where('csn_season',$season_name)->where('slid', $saleid)->first(); 
					$sif_lot = $cdetails->lot;	
				}


		    	$Season = Season::all(['id', 'csn_season']);
		    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);

		    	if(Input::get('country') != NULL){
			       	$Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
			    	$Mill = mills_region::where('ctr_id', Input::get('country'))->get(); 		
			    	$seller = seller::where('ctr_id', Input::get('country'))->get(); 		
		    	}
				$cid = Input::get('country');
				$csn_season = Input::get('outt_season');


		 
				$prdetails = purchase::where('cfd_id', $cdetails->id)->first(); 
				$stdetails = Stock::where('prc_id', $prdetails->id)->first(); 

				$stid = NULL;
				if ($stdetails != NULL) {
					$stid = $stdetails->id;			
				}
				// $grndetails = Grn::where('gr_number', Input::get('grn_number'))->where('ctr_id', $cid)->first(); 
				$stdetails = Stock::where('id', $stid)->first(); 

				if ($btdetails != NULL) {
					$batchview = BatchView::where('prc_id', $btdetails->prcid)->get();
				}
				$grnsview = GrnsView::where('stid', $stid)->first();
				$grndetails = Grn::where('gr_number', $grnsview->gr_number)->where('ctr_id', $cid)->first(); 
				$grnsview = GrnsView::where('stid', $stid)->get();


			$batchlocation = Input::get('batchlocation');
			$row = Input::get('row');
			$column = Input::get('column');
			$zone = Input::get('zone');

			$batch_kilograms = Input::get('batch_kilograms');
			$bags = Input::get('bags');
			$pockets = Input::get('pockets');

		
			$diff_weight = NULL;
			$diff_bags = NULL;
			$diff_pkts = NULL;
			$batchview_cf = NULL;
			$previd = NULL;
			$old_weight = NULL;
			$old_bags = NULL;
			$old_pkts = NULL;
				
	     	 foreach ($batchlocation as $key => $value) {
	     	 	$batchview_cf = BatchView::where('id', $value)->first();
				//compute weights and add batches
				$old_weight += $batchview_cf->btc_weight;
				$old_bags += $batchview_cf->btc_bags;
				$old_pkts += $batchview_cf->btc_pockets;
				// $batch_kilograms = $diff_weight;
				// $bags = $diff_bags;
				// $pockets = $diff_pkts;
				
	     	 }
			$diff_weight = $old_weight-$batch_kilograms;
			$diff_bags = $old_bags-$bags;
			$diff_pkts = $old_pkts-$pockets;

				// print_r($diff_weight);

	     	 
	     	 $stid = $batchview_cf->stid;
	     	 $previd = $batchview_cf->id;
	     	 $otbid = NULL;	     	 

			if ($diff_weight < 0 || $diff_bags < 0 || $diff_pkts < 0) {
				$request->session()->flash('alert-warning', 'Verify your weights, bags and pockets!');
				return View::make('managelocations', compact('id', 
					'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'Packaging', 'wrhse', 'location', 'rw', 'clm', 'grn_number', 'weighbridge_ticket', 'wbtk', 'rlno', 'ot_season', 'cdetails', 'grndetails', 'stdetails', 'grnsview', 'batchview'));				
			} else {
				$otbid = OutturnTotalBatch::insertGetId (
				['otb_weight' => $batch_kilograms,'otb_confirmed_by' => $user]);
				Activity::log('Inserted OutturnTotal information with batch_kilograms '.$batch_kilograms. ' user '. $user);	

			}
			$warehouse = Input::get('warehouse');


			if ($diff_weight > 0 || $diff_bags > 0 || $diff_pkts > 0) {

				$bt_no = Batch::orderBy('btc_number', 'desc')->pluck('btc_number');
				foreach ($bt_no as $bt) {
				    $bt_no = $bt;
				}	
				if ($bt_no != NULL && is_numeric($bt_no)) {					
					$bt_no = $bt_no;
				} else {
					$bt_no = 1;
				}


				$btid = Batch::insertGetId (
				['btc_number' => $bt_no, 'st_id' => $stid, 'btc_weight' => $diff_weight, 'btc_bags' => $diff_bags, 'btc_pockets' => $diff_pkts, 'otb_id' => $otbid, 'btc_prev_id' => $previd]);
				Activity::log('Inserted Batch information with btid '.$btid. ' diff_weight '. $diff_weight. ' bags '. $diff_bags. ' pockets '. $diff_pkts. ' stid '. $stid);	

		        $locrowdetails = Location::where('wr_id', $warehouse)->where('loc_row', $batchview_cf->loc_row)->first(); 
		        $loccoldetails = Location::where('wr_id', $warehouse)->where('loc_column', $batchview_cf->loc_column)->first(); 

		        $locrowid = $locrowdetails->id;
		        $loccolid = $loccoldetails->id;


				$stlocid = StockLocation::insertGetId (
				['bt_id' => $btid, 'loc_row_id' => $locrowid, 'loc_column_id' => $loccolid, 'btc_zone' => $batchview_cf->btc_zone]);
				Activity::log('Inserted StockLocation information with bt_id '.$btid. ' locrowid '. $locrowid. ' loccolid '. $loccolid. ' zone '. $batchview_cf->btc_zone);

			} 

				$bt_no = Batch::orderBy('btc_number', 'desc')->pluck('btc_number');
				foreach ($bt_no as $bt) {
				    $bt_no = $bt;
				}	
				if ($bt_no != NULL && is_numeric($bt_no)) {					
					$bt_no = $bt_no;
				} else {
					$bt_no = 1;
				}

				$batch_kilograms = Input::get('batch_kilograms');
				$bags = Input::get('bags');
				$pockets = Input::get('pockets');

				$btid = Batch::insertGetId (
				['btc_number' => $bt_no, 'st_id' => $stid, 'btc_weight' => $batch_kilograms, 'btc_bags' => $bags, 'btc_pockets' => $pockets, 'otb_id' => $otbid, 'btc_prev_id' => $previd]);
				Activity::log('Inserted Batch information with btid '.$btid. ' diff_weight '. $batch_kilograms. ' bags '. $bags. ' pockets '. $pockets. ' stid '. $stid);	

		        $locrowdetails = Location::where('wr_id', $warehouse)->where('loc_row', $row)->first(); 
		        $loccoldetails = Location::where('wr_id', $warehouse)->where('loc_column', $column)->first(); 

		        $locrowid = $locrowdetails->id;
		        $loccolid = $loccoldetails->id;

				$stlocid = StockLocation::insertGetId (
				['bt_id' => $btid, 'loc_row_id' => $locrowid, 'loc_column_id' => $loccolid, 'btc_zone' => $zone]);
				Activity::log('Inserted StockLocation information with bt_id '.$btid. ' locrowid '. $locrowid. ' loccolid '. $loccolid. ' zone '. $zone);
			



	     	 foreach ($batchlocation as $key => $value) {

	     	 	$batchview_cf = BatchView::where('id', $value)->first();

				Batch::where('id', '=', $value)
				->update(['btc_ended_by' => $user]);	

	     	 }

				if ($outt_season == NULL) {
					$Season = Season::all(['id', 'csn_season']);
			    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
			    }
				$season_name = Season::where('id', $outt_season)->first();
				$season_name = $season_name->csn_season;
				if ($sif_lot != NULL) {

					$cdetails = sale_lots::where('lot', $sif_lot)->where('csn_season',$season_name)->where('slid', $saleid)->first(); 
					$outt_number = $cdetails->outturn;
							
				} else if ($outt_number != NULL) {
					$cdetails = sale_lots::where('outturn', $outt_number)->where('csn_season',$season_name)->where('slid', $saleid)->first(); 
					$sif_lot = $cdetails->lot;	
				}

		 
				$prdetails = purchase::where('cfd_id', $cdetails->id)->first(); 
				$stdetails = Stock::where('prc_id', $prdetails->id)->first(); 

				$stid = NULL;
				if ($stdetails != NULL) {
					$stid = $stdetails->id;			
				}
				// $grndetails = Grn::where('gr_number', Input::get('grn_number'))->where('ctr_id', $cid)->first(); 
				$stdetails = Stock::where('id', $stid)->first(); 

				if ($btdetails != NULL) {
					$batchview = BatchView::where('prc_id', $btdetails->prcid)->get();
				}
				$grnsview = GrnsView::where('stid', $stid)->first();
				$grndetails = Grn::where('gr_number', $grnsview->gr_number)->where('ctr_id', $cid)->first(); 
				$grnsview = GrnsView::where('stid', $stid)->get();


			return View::make('managelocations', compact('id', 
				'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'Packaging', 'wrhse', 'location', 'rw', 'clm', 'grn_number', 'weighbridge_ticket', 'wbtk', 'rlno', 'ot_season', 'cdetails', 'grndetails', 'stdetails', 'grnsview', 'batchview'));	
    	
		}  else if (NULL !== Input::get('printchangelocation')) {
				$this->validate($request, ['country' => 'required',  'outt_season' => 'required', 'sale' => 'required', 'seller' => 'required', 'coffee_buyer' => 'required', 'trp' => 'required', 'release_no' => 'required', 'date' => 'required',
						        ]);


				$saleid = Input::get('sale');
				
				$release_no = Input::get('release_no');


				$date = Input::get('date');
				$date=date_create($date);
				$date = date_format($date,"Y-m-d");	

	            $user_data = Auth::user();
	            $user = $user_data ->id;

				$sale_lots = sale_lots::where('slid', $saleid)->where('slrid',Input::get('seller'))->where('cbid',Input::get('coffee_buyer'))->whereNotNull('warrant_no')->whereNotNull('rl_no')->get();

				$to = seller::where('id', '=', Input::get('seller'))->first();
				$to = $to->slr_name;
				$att = $to->slr_att;
				$cc = transporters::where('id', '=', Input::get('trp'))->first();
				$cc = $cc->trp_name;

				$date = release_instructions::where('rl_no', $release_no)->first();
				$date = $date->rl_date;
				$date = date("m/d/Y", strtotime($date));	

				$buyer = buyer::where('id', Input::get('coffee_buyer'))->first(); 
				$buyer = $buyer->cb_name;



			    $pdf = PDF::loadView('pdf.release_instructions', compact('to', 'att', 'cc', 'date', 'release_no', 'buyer', 'sale_lots'));
			    #$pdf->showImageErrors = true;

			    return $pdf->stream($release_no.' release_instructions.pdf');

	} else if (NULL !== Input::get('searchButtonLot') || NULL !== Input::get('searchButtonOutturn') ) {
	     	 $this->validate($request, [
		            'country' => 'required'
		        ]);

			$csn_season = Input::get('outt_season');
			$weighbridgeTK = Input::get('weighbridgeTK');


			if ($outt_season == NULL) {
				$Season = Season::all(['id', 'csn_season']);
		    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);

				$request->session()->flash('alert-warning', 'Season is Required!');
				return View::make('managelocations', compact('id', 
					'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'Packaging', 'wrhse', 'location', 'rw', 'clm', 'grn_number', 'weighbridge_ticket', 'wbtk', 'rlno', 'ot_season', 'grnsview', 'batchview'));					
			}
			$season_name = Season::where('id', $outt_season)->first();
			$season_name = $season_name->csn_season;
				if ($sif_lot != NULL) {

					$cdetails = sale_lots::where('lot', $sif_lot)->where('csn_season',$season_name)->where('slid', $saleid)->first(); 
					$outt_number = $cdetails->outturn;
							
				} else if ($outt_number != NULL) {
					$cdetails = sale_lots::where('outturn', $outt_number)->where('csn_season',$season_name)->where('slid', $saleid)->first(); 
					$sif_lot = $cdetails->lot;	
				}

			$seller = Input::get('seller');
			$coffee_buyer = Input::get('coffee_buyer');
			// $weighbridge_ticket = Input::get('weighbridge_ticket');
			$vehicle_plate = Input::get('vehicle_plate');
			$weighbridge_weight_in = Input::get('weighbridge_weight_in');
			$weighbridge_weight_out = Input::get('weighbridge_weight_out');

			$date = Input::get('date');
			$date=date_create($date);
			$date = date_format($date,"Y-m-d");	

			// $weighbridge = weighbridge::where('wb_ticket', $weighbridge_ticket)->where('cb_id', $coffee_buyer)->where('ctr_id', $country)->first();
			$weighbridge_all = weighbridge::where('cb_id', $coffee_buyer)->where('ctr_id', Input::get('country'))->get();

	    	$Season = Season::all(['id', 'csn_season']);
	    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);

	    	if(Input::get('country') != NULL){
		       	$Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
		    	$Mill = mills_region::where('ctr_id', Input::get('country'))->get(); 		
		    	$seller = seller::where('ctr_id', Input::get('country'))->get(); 		
	    	}
			$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('outt_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby','!=', null)->where('sl_quality_confirmedby','!=', null)->where('sl_auction_confirmedby','!=', null)->orderBy('sl_no')->get();

			$cid = Input::get('country');
			$csn_season = Input::get('outt_season');
	 
			$prdetails = purchase::where('cfd_id', $cdetails->id)->first(); 
			$stdetails = Stock::where('prc_id', $prdetails->id)->first(); 

			$stid = NULL;
			if ($stdetails != NULL) {
				$stid = $stdetails->id;			
			}
			// $grndetails = Grn::where('gr_number', Input::get('grn_number'))->where('ctr_id', $cid)->first(); 
			$stdetails = Stock::where('id', $stid)->first(); 


			$grnsview = GrnsView::where('stid', $stid)->first();
			$grndetails = Grn::where('gr_number', $grnsview->gr_number)->where('ctr_id', $cid)->first(); 
			$grnsview = GrnsView::where('stid', $stid)->get();

			return View::make('managelocations', compact('id', 
				'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'Packaging', 'wrhse', 'location', 'rw', 'clm', 'grn_number', 'weighbridge_ticket', 'wbtk', 'rlno', 'ot_season', 'cdetails', 'grndetails', 'stdetails', 'grnsview', 'batchview'));	

		}  else {
			$stlocdetails = NULL;
			$stlocdetails = NULL;
    		$rw = Input::get('row');
    		$clm = Input::get('column');


	    	if (NULL != Input::get('warehouse') && NULL != Input::get('row') && NULL != Input::get('column') ) {
	    		$wrname = Warehouse::where('id', Input::get('warehouse'))->first();
	    		$wrname = $wrname->wr_name;

	    		$stlocdetails = StockLocationView::where('wr_name', $wrname)->where('loc_row', $rw)->where('loc_column', $clm)->leftJoin('sale_lots', 'sale_lots.prcid', '=', 'stock_locations.prc_id')->get();
	    	}

			return View::make('managelocations', compact('id', 
				'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'Packaging', 'wrhse', 'location', 'rw', 'clm', 'grn_number', 'weighbridge_ticket', 'wbtk', 'rlno', 'ot_season', 'cdetails', 'grndetails', 'stdetails', 'grnsview', 'batchview', 'stlocdetails', 'rw', 'clm'));		
 	   }
    
 	}

}