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
use Ngea\StockViewALL;

use  Ngea\Warehouse;
use  Ngea\Region;

use Yajra\Datatables\Datatables;
use niklasravnsborg\LaravelPdf\Facades\Pdf as PDF;
use Activity;
use Excel;

use Ngea\country;
use Ngea\Stock;


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
use Ngea\QualityType;
use Ngea\ProcessResultsType;

use Ngea\StockQuality;


use Ngea\greencomments;
use delete;

use Ngea\InternalBaskets;


class AccountsSaleController extends Controller {

    public function accountsSaleDetailsForm (Request $request){
        
    	$id = NULL;

    	$Season = Season::all(['id', 'csn_season']);

    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);

    	$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);

    	$Certification = Certification::all(['id', 'crt_name']);   	

    	$Warehouse = NULL;

    	$Mill = NULL;

    	$greensize = quality_parameters::where('qg_id', '1')->get();

    	$greencolor = quality_parameters::where('qg_id', '2')->get();

    	$greendefects = quality_parameters::where('qg_id', '3')->get();

    	$processing = processing::where('prcss_auction', '1')->get();

    	$basket = InternalBaskets::where('ctr_id', '3')->get();

    	$screens = screens::all(['id', 'scr_name']);

    	$cupscore = cupscore::all(['id', 'cp_score', 'cp_quality']);

    	$rawscore = rawscore::all(['id', 'rw_score', 'rw_quality']);

    	return View::make('accountssaledetails', compact('id', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'largest', 'greensize', 'greencolor', 'greendefects', 'processing', 'cupscore', 'rawscore', 'screens'));

    }

    public function accountsSaleDetails (Request $request){

    
    }

}