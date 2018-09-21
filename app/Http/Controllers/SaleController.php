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
use Ngea\Years;
use Ngea\Months;
use Ngea\CoffeeType;

use delete;


class SaleController extends Controller {

    public function createSaleForm (Request $request){
    	$id = null;
    	$Season = Season::all(['id', 'csn_season']);
    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
    	$buyer = buyer::all(['id', 'cb_name']);
    	$SaleType = SaleType::all(['id','sltyp_name']);
    	$tradingMonths = trading_months::all(['id','trm_code']);
    	$months = Months::whereNotNull('mth_trading')->get();
    	$years = Years::all(['id','yr_name']);
    	$coffeeType = CoffeeType::all(['id','ctyp_name']);



		return View::make('createsale', compact('id', 'Season', 'country', 'buyer', 'SaleType', 'tradingMonths', 'years', 'months', 'coffeeType'));

    }

    public function createSale (Request $request){




    	$id = null;
    	$Season = Season::all(['id', 'csn_season']);
    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
    	$buyer = buyer::all(['id', 'cb_name']);
    	$SaleType = SaleType::all(['id','sltyp_name']);
    	$tradingMonths = trading_months::all(['id','trm_code']);
    	$years = Years::all(['id','yr_name']);
    	$months = Months::whereNotNull('mth_trading')->get();
    	$coffeeType = CoffeeType::all(['id','ctyp_name']);


		if (NULL !== Input::get('searchButton')){
			if ($request->has('sl_no')) {
				if ($request->has('sale_season') & Input::get('sale_season') !== "Sale Season" ) {
					
							$sale = Sale::where('sl_no', '=', Input::get('sl_no'))->where('csn_id',  Input::get('sale_season'))->first();

							if ($sale !== NULL) {

								$request->session()->flash('alert-success', 'Sale found!!');
								return View::make('createsale', compact('id', 'Season', 'country', 'buyer', 'SaleType', 'sale', 'tradingMonths', 'years', 'months', 'coffeeType'));		
					 
						} else {

							return redirect('createsale')
				                        ->withErrors("Please enter a valid Sale Number and Sale Season Combination or Create a new Sale!!")->withInput();
						}				
				} else {
					return  redirect('createsale')
		                        ->withErrors("The Sale Season cannot be empty!!")->withInput();						
				}



			} else {
				if ($request->has('season')) {
					return  redirect('createsale')
		                        ->withErrors("The Sale Number cannot be empty!!")->withInput();	
				} else {
					return  redirect('createsale')
		                        ->withErrors("The Sale Number and Season cannot be empty!!")->withInput();						
				}
			
			}
		} else if (NULL !== Input::get('submitsale')) {

     		$this->validate($request, [
	            'sale_season' => 'required',  'sl_no' => 'required', 'sale_type' => 'required', 'date' => 'required', 'country' => 'required', 
	        ]);
			
			$sl_no = Input::get('sl_no');
			$sale_season = Input::get('sale_season');
			$sale_type = Input::get('sale_type');
			$date = Input::get('date');
			$hedge = Input::get('hedge');
			$nyc = Input::get('nyc');
			$margin = Input::get('margin');

			$country = Input::get('country');
			$cbuyer = Input::get('coffee_buyer');


			$date=date_create($date);
			$date = date_format($date,"Y-m-d");	


			$sale = Sale::where('sl_no', '=', Input::get('sl_no'))->where('csn_id',  Input::get('sale_season'))->first();

			$sseason = Season::where('id',  Input::get('sale_season'))->first();
			$sbuyer = buyer::where('id',  Input::get('coffee_buyer'))->first();



	    	$tradingmonth = Input::get('tradingmonth');
    	
	    	$monthDB = Months::where('id', $tradingmonth)->first();

	    	$tradingmonth = null;

	    	if ($monthDB != null) {

	    		$tradingmonth = $monthDB->mth_name;

	    	}   	

	    	$coffee_type_selected = Input::get('coffee_type'); 

	    	if ($coffee_type_selected == null) {

                return redirect('createsale')
                    ->withErrors("Please select a valid coffee type!!")->withInput();

	    	}

	    	if ($coffee_type_selected == 1) {
	    		$coffee_type_selected = 'K';
	    	} else if ($coffee_type_selected == 2) {
	    		$coffee_type_selected = 'R';
	    	}

	    	$monthName = trading_months::where('trm_month', $tradingmonth)->get();


	    	foreach ($monthName as $key => $value) {
	    		if (substr($value->trm_code, 0, 1) == $coffee_type_selected) {
	    			$monthName = $value->trm_code;
	    		}
	    	}

	    	$tradingyear = Input::get('tradingyear');

	    	

	    	$yearsDB = years::where('id', $tradingyear)->first();

	    	if ($tradingyear != null) {

	    		$tradingyear = $yearsDB->yr_name;
	    		
	    	}

	    	
	    	$tradingyear = substr($tradingyear,2,3);

	    	$trm = $monthName.$tradingyear;
	    	
			if ($sale !== NULL){
				Sale::where('sl_no', '=', $sl_no)->where('csn_id', '=', $sale_season)
							->update(['sl_date' => $date, 'ctr_id' => $country, 'cb_id' => $cbuyer, 'sltyp_id' => $sale_type, 'sl_date' => $date, 'sl_hedge' => $hedge, 'sl_margin' => $margin , 'sl_month' => $trm ]);

				Activity::log('Updated Sale '.$sl_no. ' For Season '.$sseason->csn_season.' sale_type '.$sale_type.' date ' .$date.' hedge ' . $hedge.' sl_month '.$trm.' country '.$country.' margin '.$margin);

			} else {
				Sale::insert(
					['sl_no' => $sl_no, 'csn_id' =>  $sale_season, 'sl_date' => $date, 'ctr_id' => $country, 'cb_id' => $cbuyer, 'sltyp_id' => $sale_type, 'sl_no' => $sl_no, 'sl_date' => $date, 'sl_hedge' => $hedge, 'sl_margin' => $margin , 'sl_month' => $trm]);
				Activity::log('Added Sale '.$sl_no. ' For Season '.$sseason->csn_season.' sale_type '.$sale_type.' date ' .$date.' hedge ' . $hedge.' sl_month '.$trm.' country '.$country.' margin '.$margin);
			}


			$request->session()->flash('alert-success', 'Sale was updated successfully!!');
			//return redirect('createsale');	
	    	$sale = Sale::where('sl_no', '=', Input::get('sl_no'))->where('csn_id',  Input::get('sale_season'))->first();
	    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
	   		return View::make('createsale', compact('id', 'Season', 'country', 'buyer', 'SaleType', 'sale', 'tradingMonths', 'years', 'months', 'coffeeType'));	
   		} else {
   			$sale_type = Input::get('sale_type');

   			$cid = Input::get('country'); 

   			$saleTy = $sale_type;

   			$sl_no = NULL;


   			if ($saleTy == 2) {
   				$sl_no = sale::orderBy('sl_no', 'asc')->where('sltyp_id', 2)->pluck('sl_no');
		        foreach ($sl_no as $sl) {
		            $sl_no = 'DS' . (substr($sl,2,10) + 1);

		        }

   			}


	   		return View::make('createsale', compact('id', 'Season', 'country', 'buyer', 'SaleType', 'sale', 'tradingMonths', 'years', 'months', 'coffeeType', 'saleTy', 'cid', 'sl_no'));	   			
   		}
	}

}

