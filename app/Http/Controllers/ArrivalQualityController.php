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
use Ngea\Awaiting_Quality_Analysis;
use Auth;

use delete;


class ArrivalQualityController extends Controller {

   public function arrivalQualityInformationListForm (Request $request){
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

		return View::make('arrivalqualityinformationlist', compact('id', 
				'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'Packaging', 'grn_number'));	

    }

    public function arrivalQualityInformationList (Request $request){
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

		$cid = Input::get('country');  

    	$sale_lots = Awaiting_Quality_Analysis::where('ctr_id', $cid)->first(); 


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
	    	// $weighbridge_ticket = Weighbridge::where('ctr_id', Input::get('country'))->get();	    		
	    	$weighbridge_ticket = Weighbridge::where('ctr_id', Input::get('country'))->where(DB::Raw('LEFT(wb_time_in, 10)'), date("Y-m-d"))->orWhere('id', 1)->get(); 		
    	}

		if (NULL !== Input::get('submitarrivalinfo')){
	     	$this->validate($request, [
		            'country' => 'required', 
		        ]);

			$weighbridgeTK = Input::get('weighbridgeTK');
			
			$outt_season = Input::get('outt_season');
			
			$cid = Input::get('country');
			
			$grn_number = Input::get('grn_number');
    		
    		$Season = Season::all(['id', 'csn_season']);
    		
    		$country = country::all(['id', 'ctr_name', 'ctr_initial']);

			return View::make('arrivalqualityinformationlist', compact('id', 
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

    		return View::make('arrivalqualityinformationlist', compact('id', 'Season', 'country', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'Packaging', 'wrhse', 'location', 'rw', 'clm', 'weighbridge_ticket', 'grn_number', 'wbtk', 'rlno', 'ot_season', 'cdetails', 'grndetails', 'stdetails', 'grnsview', 'batchview','batch_kilograms', 'bags', 'pockets', 'cid', 'sale_lots'));		
	   }
    
 	}



}