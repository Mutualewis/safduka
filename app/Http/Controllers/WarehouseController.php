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
// use PDF;
use Activity;
use Excel;
// use Anouar\Fpdf\Fpdf as Fpdf;
use niklasravnsborg\LaravelPdf\Facades\Pdf as PDF;
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
use Ngea\Dispatch;
use Ngea\Person;

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
        $instruction_id = Input::get('instruction');


        $user_data = Auth::user();

        $user = $user_data->id; 

        $user_name = $user_data->usr_name; 

        $per_id = $user_data->per_id; 
        
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
        $partial = Input::get('partial');


        if (NULL !== Input::get('createsalescontract')){

            $this->validate($request, [
                'country' => 'required', 'instruction' => 'required', 'contract' => 'required',  
            ]);


            $SalesContract = SalesContract::where('ctr_id', '=', $cid)->where('sct_number',  $contract)->whereNull('sct_stuffed')->first();
            if ($SalesContract == NULL){

                $request->session()->flash('alert-warning', 'Sales Contract Already Confirmed!!');

            } else {

	            if ($weight_note_no != null) {
	                Stuffing::insert(
	                    ['sct_id' => $sctID, 'st_id' => $instruction_id, 'stff_weight_note' => $weight_note_no, 'wb_id' => $wbtk, 'shpr_id' => $shipper, 'stff_weight' => $weight_staffed, 'stff_date' => $date, 'stff_container' => $container_number]);

	                Activity::log('Added Stuffing sctID '. $sctID. ' weight_note_no '. $weight_note_no. ' wbtk '. $wbtk. ' shipper '. $shipper. ' weight_staffed '. $weight_staffed.' date '.$date.' container_number '.$container_number);
	            }

            }

            $SalesContract = SalesContract::where('ctr_id', '=', $cid)->where('sct_number',  $contract)->first();

            $StuffingView = StuffingView::where('sct_id', $sctID)->where('st_id', $instruction_id)->get();

            $disposaldate = Input::get('disposaldate');

            return View::make('stuffing', compact('id', 'Season', 'country', 'cid', 'contract', 'shipmentmonth','client', 'clid', 'spid', 'disposaldate', 'description', 'packages', 'bskt', 'basket', 'Packaging', 'packaging_method', 'packaging_type', 'weighbridge_ticket','StuffingView', 'shipmentyear', 'syrid', 'SalesContract', 'SalesContractSummary', 'client_reference', 'rates', 'teams', 'instruction_id'));

        } else if (NULL !== Input::get('printdispatch')) {   
            $this->validate($request, [
                'country' => 'required', 'instruction' => 'required', 'contract' => 'required',  
            ]);

			$SalesContractSummary = Sales_Contract_Summary::where('sct_number', Input::get('contract'))->where('stid', $instruction_id)->first();

            $person_details = Person::where('id', $per_id)->first();

            $person_name = $person_details->per_fname.' '.$person_details->per_sname;

            if ($SalesContractSummary != null) {

                $client =  $SalesContractSummary->cl_name;

                $delivery_date = $SalesContractSummary->stuffing_date;
                $delivery_date = date("d/m/Y", strtotime($delivery_date));
                $movement_permit = $SalesContractSummary->wb_movement_permit;
                $vehicle = $SalesContractSummary->wb_vehicle_plate;
                $weighbridge_ticket = $SalesContractSummary->wb_ticket;
                $time_received = $SalesContractSummary->dp_start;
                $time_received_stop = $SalesContractSummary->dp_end_date;
                $time_received = date("H:i:s", strtotime($time_received));
                $time_received_stop = date("H:i:s", strtotime($time_received_stop));

                $received_by = $person_name;
                $driver_name = $SalesContractSummary->wb_driver_name;
                $driver_id = $SalesContractSummary->wb_driver_id;
                $dp_number = $SalesContractSummary->dp_number;

                $warehouse_manager = $SalesContractSummary->cl_name;

            }

        	$SalesContractSummary = Sales_Contract_Summary::where('sct_number', Input::get('contract'))->where('stid', $instruction_id)->get();

            $pdf = PDF::loadView('pdf.print_dispatch', compact('SalesContractSummary','client', 'delivery_date', 'movement_permit', 'vehicle', 'weighbridge_ticket', 'time_received', 'received_by', 'driver_name', 'time_received_stop', 'driver_id', 'dp_number', 'warehouse_manager'));

            return $pdf->stream('print_dispatch.pdf');


        }  else if (NULL !== Input::get('confirmcontract')) {
            $this->validate($request, [
                'country' => 'required', 'instruction' => 'required', 'contract' => 'required',  
            ]);

            $StuffingView = StuffingView::where('sct_id', $sctID)->where('st_id', $instruction_id)->get();

            $sum_stuffed = null;

            $stock_weight = null;

            $stock_ID = null;

            $csn_id = null;

            foreach ($StuffingView as $key => $value) {
                $sum_stuffed += $value->stff_weight;
            }

            $sale_contract_id = Stock::where('id', $instruction_id)->where('sct_id', $sctID)->first();

            if ($sale_contract_id == null ) {
                # code...                
                $request->session()->flash('alert-warning', 'The results are not yet confirmed!');

                return View::make('stuffing', compact('id', 'Season', 'country', 'cid', 'contract', 'shipmentmonth','client', 'clid', 'spid', 'date', 'disposaldate', 'description', 'packages', 'SalesContract', 'bskt', 'basket', 'Packaging', 'packaging_method', 'packaging_type', 'weighbridge_ticket','StuffingView', 'shipmentyear', 'syrid', 'SalesContractSummary', 'client_reference', 'rates', 'teams', 'instruction_id'));            
            }

            $stock_weight = $sale_contract_id->st_net_weight;
            $stock_ID = $sale_contract_id->id;
            $csn_id = $sale_contract_id->csn_id;

            $SalesContract = SalesContract::where('ctr_id', '=', $cid)->where('sct_number',  $contract)->first();
            $sum_contract_weight = null;
            if ($SalesContract != null) {
                $sum_contract_weight = $SalesContract->sct_weight;
            }

            $dp_number = null;

            $dp_no = Dispatch::where('ctr_id', $cid)->orderBy('id', 'desc')->first();

            if ($dp_no != null) {
            	$dp_no = $dp_no->dp_number;       
            }

            if ($dp_no != NULL && is_numeric($dp_no)) {

                $dp_number = sprintf("%07d", ($dp_no + 0000001));

            }

            $dp_id = Dispatch::insertGetId (
                                ['ctr_id' => $cid, 'st_id' => $instruction_id, 'wb_id' => $wbtk, 'csn_id' => $csn_id, 'sct_id' => $sctID, 'dp_number' => $dp_number, 'dp_confirmed_by' => $user]);


            if ($sum_stuffed < $stock_weight && $SalesContract->sct_stuffed == null && $sale_contract_id->st_disposed_by == null) {
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

            $sale_contract_all_ended = Stock::where('sct_id', $sctID)->get();

            $st_all_ended = false;

            if ($sale_contract_all_ended != null) {

            	foreach ($sale_contract_all_ended as $key_scae => $value_scae) {

            		if ($value_scae->st_disposed_by == null) {

            			$st_all_ended = true;

            		}



            	}
            }

            if ($st_all_ended != true && $partial == null) {

            	SalesContract::where('ctr_id', '=', $cid)->where('sct_number',  $contract)
                ->update([ 'sct_stuffed' => $user, 'sct_updated_user' => $user]);

            }
            

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

            $SalesContract = SalesContract::where('ctr_id', '=', $cid)->where('sct_number',  $contract)->first();

            $SalesContractSummary = Sales_Contract_Summary::where('sct_number',  $contract)->get();
            $StuffingView = StuffingView::where('sct_id', $sctID)->where('st_id', $instruction_id)->get();

            $data = array('name'=>"Trading Department", "contract"=>$contract, "client"=>$client, "ship_month"=>$ship_month, "quality"=>$quality, "quantity"=>$quantity, "ship_year"=>$ship_year);    

            Mail::send(['text'=>'mail'], $data, function($message) {

	            $message->to('trading.ea@nkg.coffee', 'Stuffing-')->subject('Stuffed Contract');

	            $message->from('lewis.mutua@nkg.coffee','Ibero Database');

            });

            return View::make('stuffing', compact('id', 'Season', 'country', 'cid', 'contract', 'shipmentmonth','client', 'clid', 'spid', 'date', 'disposaldate', 'description', 'packages', 'SalesContract', 'bskt', 'basket', 'Packaging', 'packaging_method', 'packaging_type', 'weighbridge_ticket','StuffingView', 'shipmentyear', 'syrid', 'SalesContractSummary', 'client_reference', 'rates', 'teams', 'instruction_id'));

        } else if(NULL !== Input::get('searchButtonContract')){

            $SalesContract = SalesContract::where('ctr_id', '=', $cid)->where('sct_number',  $contract)->first();
            $StuffingView = StuffingView::where('sct_id', $sctID)->where('st_id', $instruction_id)->get();

            $disposaldate = Input::get('disposaldate');


            if ($SalesContract !== NULL){
                if ($clid == NULL) {
                    $clid = $SalesContract->cl_id;
                }
            }
            $request->session()->flash('alert-success', 'Sales Contract Information Found!!');
            return View::make('stuffing', compact('id', 'Season', 'country', 'cid', 'contract', 'shipmentmonth','client', 'clid', 'spid', 'date', 'disposaldate', 'description', 'packages', 'SalesContract', 'bskt', 'basket', 'Packaging', 'packaging_method', 'packaging_type', 'weighbridge_ticket','StuffingView', 'shipmentyear', 'syrid', 'SalesContractSummary', 'client_reference', 'rates', 'teams', 'instruction_id'));

        } else {
            return View::make('stuffing', compact('id', 'Season', 'country', 'shipmentmonth','client', 'bskt', 'basket', 'Packaging', 'packaging_method', 'packaging_type', 'weighbridge_ticket','StuffingView', 'shipmentyear', 'syrid', 'SalesContractSummary', 'client_reference', 'cid', 'rates', 'teams', 'instruction_id'));
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