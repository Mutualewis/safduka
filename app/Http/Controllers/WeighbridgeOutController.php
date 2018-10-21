<?php namespace Ngea\Http\Controllers;

use Input;
use confirm;
use DB;
use ask;
use Illuminate\Http\Request;
use Ngea\Http\Controllers\Controller;
use View;
use Ngea\Season;
use Ngea\Warehouse;
use Ngea\Region;
use PDF;
use Activity;
use Excel;
use Ngea\country;
use Ngea\Weighbridge;
use Ngea\User;
use Auth;
use delete;


class WeighbridgeController extends Controller {

    public function weighbridgeOutForm (Request $request){
    	$id = NULL;
    	$Season = Season::all(['id', 'csn_season']);
    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
    	$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
    	$Certification = Certification::all(['id', 'crt_name']);
    	// $buyer = buyer::all(['id', 'cb_name']);   	
    	$buyer = buyer::where('bt_id', '1')->get();

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

		$ref_no = weighbridge::orderBy('wb_ticket', 'asc')->pluck('wb_ticket');
		foreach ($ref_no as $ref) {
		    $ref_no = $ref;
		}		
		// $weighbridge_ticket = "WTKT-".sprintf("%07d", ($ref_no + 0000001));
		$weighbridge_ticket = sprintf("%07d", ($ref_no));



		return View::make('weighbridgeout', compact('id', 
				'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'weighbridge_ticket'));	

    }


    public function weighbridgeout (Request $request){
    	$id = NULL;

    	$Warehouse = NULL;
    	$Mill = NULL;


    	$greensize = quality_parameters::where('qg_id', '1')->get();
    	$greencolor = quality_parameters::where('qg_id', '2')->get();
    	$greendefects = quality_parameters::where('qg_id', '3')->get();
    	$processing = processing::all(['id', 'prcss_name']);
    	// $buyer = buyer::all(['id', 'cb_name']);
    	$buyer = buyer::where('bt_id', '1')->get();
    	$sale_status = sale_status::all(['id', 'sst_name']);
    	$basket = basket::where('ctr_id', Input::get('country'))->get();

    	

    	$screens = screens::all(['id', 'scr_name']);

    	$cupscore = cupscore::all(['id', 'cp_score', 'cp_quality']);
    	$rawscore = rawscore::all(['id', 'rw_score', 'rw_quality']);



    	$Certification = Certification::all(['id', 'crt_name']);


		

		$slr = Input::get('seller');  
		$sale_cb_id = Input::get('coffee_buyer');  
		if ($request->has('country')) {
			$transporters = transporters::where('ctr_id', '=', Input::get('country'))->get();
			$trp = Input::get('trp'); 
		}

		$ref_no = weighbridge::orderBy('wb_ticket', 'asc')->pluck('wb_ticket');
		foreach ($ref_no as $ref) {
		    $ref_no = $ref;
		}		
		$weighbridge_ticket = sprintf("%07d", ($ref_no));

		if (NULL !== Input::get('submitlot')){
	     	 $this->validate($request, [
		            'country' => 'required', 'coffee_buyer' => 'required', 'weighbridge_ticket' => 'required', 'vehicle_plate' => 'required', 'weighbridge_weight_out' => 'required', 'date' => 'required',
		    ]);
		    $country = Input::get('country');
			$sale_season = Input::get('sale_season');
			$seller = Input::get('seller');
			$coffee_buyer = Input::get('coffee_buyer');
			$weighbridge_ticket = Input::get('weighbridge_ticket');
			$vehicle_plate = strtoupper(Input::get('vehicle_plate'));
			$weighbridge_weight_in = Input::get('weighbridge_weight_in');
			$weighbridge_weight_out = Input::get('weighbridge_weight_out');

			$wb_movement_permit = strtoupper(Input::get('movement_permit'));
			$wb_driver_name = strtoupper(Input::get('driver_name'));
			$wb_driver_id = Input::get('driver_id');
			$wb_dispatch_date = Input::get('date');

			$wb_dispatch_date=date_create($wb_dispatch_date);
			$wb_dispatch_date = date_format($wb_dispatch_date,"Y-m-d");	

            $user_data = Auth::user();
            $user = $user_data ->id;

			$weighbridge = weighbridge::where('wb_ticket', $weighbridge_ticket)->where('cb_id', $coffee_buyer)->where('ctr_id', $country)->first();



			date_default_timezone_set('Africa/Nairobi');
   			$time_out = date('Y-m-d H:i:s');

			if($weighbridge != NULL){
				$wb_ticket = $weighbridge->id;
				weighbridge::where('id', '=', $wb_ticket)
				->update(['wb_weight_out' =>  $weighbridge_weight_out, 'wb_time_out' =>  $time_out]);
				Activity::log('Updated weighbridge information with ticket no. '.$weighbridge_ticket. ' date '. $wb_dispatch_date. ' confirmed by '. $user. ' weight in '. $weighbridge_weight_in. ' weight out '. $weighbridge_weight_out);

			} 
				
			$weighbridge = weighbridge::where('wb_ticket', $weighbridge_ticket)->where('cb_id', $coffee_buyer)->where('ctr_id', $country)->first();
			$weighbridge_all = weighbridge::where('cb_id', $coffee_buyer)->where('ctr_id', $country)->get();

	    	$Season = Season::all(['id', 'csn_season']);
	    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);

	    	if(Input::get('country') != NULL){
		       	$Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
		    	$Mill = mills_region::where('ctr_id', Input::get('country'))->get(); 		
		    	$seller = seller::where('ctr_id', Input::get('country'))->get(); 		
	    	}

			$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby','!=', null)->where('sl_quality_confirmedby','!=', null)->where('sl_auction_confirmedby','!=', null)->get();

			$cid = Input::get('country');
			$csn_season = Input::get('sale_season');
			$saleid = Input::get('sale');
			// $sale_lots = sale_lots::where('slid', $saleid)->where('slrid',Input::get('seller'))->where('cbid',Input::get('coffee_buyer'))->whereNotNull('warrant_no')->get(); 

			// $sale_lots_released = sale_lots::where('slid', $saleid)->where('slrid',Input::get('seller'))->where('cbid',Input::get('coffee_buyer'))->whereNotNull('warrant_no')->whereNotNull('rl_no')->get(); 

			$saleno = Sale::where('id', '=', Input::get('sale'))->first();
			$sellerinit = seller::where('id', '=', Input::get('seller'))->first();
			$date = date("m/d/Y", strtotime($wb_dispatch_date));
			return View::make('weighbridgeout', compact('id', 
				'Season', 'country', 'cid', 'csn_season','weighbridge', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'weighbridge_all', 'weighbridge_ticket'));	
    	
	}  else if (NULL !== Input::get('searchButton')) {
	     	 $this->validate($request, [
		            'country' => 'required', 'coffee_buyer' => 'required', 'weighbridge_ticket' => 'required'
		        ]);

			$country = Input::get('country');
			$sale_season = Input::get('sale_season');
			$seller = Input::get('seller');
			$coffee_buyer = Input::get('coffee_buyer');
			$weighbridge_ticket = Input::get('weighbridge_ticket');
			$vehicle_plate = Input::get('vehicle_plate');
			$weighbridge_weight_in = Input::get('weighbridge_weight_in');
			$weighbridge_weight_out = Input::get('weighbridge_weight_out');

			$date = Input::get('date');
			$date=date_create($date);
			$date = date_format($date,"Y-m-d");	

			$weighbridge = weighbridge::where('wb_ticket', $weighbridge_ticket)->where('cb_id', $coffee_buyer)->where('ctr_id', $country)->first();
			$weighbridge_all = weighbridge::where('cb_id', $coffee_buyer)->where('ctr_id', $country)->get();


	    	$Season = Season::all(['id', 'csn_season']);
	    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);

	    	if(Input::get('country') != NULL){
		       	$Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
		    	$Mill = mills_region::where('ctr_id', Input::get('country'))->get(); 		
		    	$seller = seller::where('ctr_id', Input::get('country'))->get(); 		
	    	}
			$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby','!=', null)->where('sl_quality_confirmedby','!=', null)->where('sl_auction_confirmedby','!=', null)->get();

			$cid = Input::get('country');
			$csn_season = Input::get('sale_season');
			$saleid = Input::get('sale');
			// $sale_lots = sale_lots::where('slid', $saleid)->where('slrid',Input::get('seller'))->where('cbid',Input::get('coffee_buyer'))->whereNotNull('warrant_no')->get(); 

			// $sale_lots_released = sale_lots::where('slid', $saleid)->where('slrid',Input::get('seller'))->where('cbid',Input::get('coffee_buyer'))->whereNotNull('warrant_no')->whereNotNull('rl_no')->get(); 

			$saleno = Sale::where('id', '=', Input::get('sale'))->first();
			$sellerinit = seller::where('id', '=', Input::get('seller'))->first();
			$date = date("m/d/Y", strtotime($date));
			return View::make('weighbridgeout', compact('id', 
				'Season', 'country', 'cid', 'csn_season','weighbridge', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'weighbridge_all', 'weighbridge_ticket'));	

	}  else if (NULL !== Input::get('print')) {
			$this->validate($request, [
		            'country' => 'required', 'coffee_buyer' => 'required', 'weighbridge_ticket' => 'required'
		        ]);
			$country = Input::get('country');
			$coffee_buyer = Input::get('coffee_buyer');
			$weighbridge_ticket = Input::get('weighbridge_ticket');
			$vehicle_plate = strtoupper(Input::get('vehicle_plate'));
			$weighbridge_weight_in = Input::get('weighbridge_weight_in');
			$weighbridge_weight_out = Input::get('weighbridge_weight_out');

			$wb_movement_permit = strtoupper(Input::get('movement_permit'));
			$wb_driver_name = strtoupper(Input::get('driver_name'));
			$wb_driver_id = Input::get('driver_id');
			$wb_dispatch_date = Input::get('date');

			$wb_delivery_number = Input::get("dnn");

			$wb_dispatch_date=date_create($wb_dispatch_date);
			$wb_dispatch_date = date_format($wb_dispatch_date,"m/d/Y");	

            $user_data = Auth::user();
            $user = $user_data ->usr_name;

            $weighbridge = weighbridge::where('wb_ticket', $weighbridge_ticket)->where('cb_id', $coffee_buyer)->where('ctr_id', $country)->first();
            $delivery_date = $weighbridge->wb_time_in;
            $delivery_date = date('m/j/Y h:i:s A',strtotime($delivery_date));

			$weighbridge_weight_in = $weighbridge->wb_weight_in;


            $departure_date = $weighbridge->wb_time_out;
            $departure_date = date('m/j/Y h:i:s A',strtotime($departure_date));

            $time_taken = date_diff(date_create($weighbridge->wb_time_in),date_create($weighbridge->wb_time_out));
            print_r($time_taken->d." days, ".$time_taken->h." hours, ".$time_taken->i." minutes, ".$time_taken->s." seconds.");
            $time_taken = $time_taken->d." days, ".$time_taken->h." hours, ".$time_taken->i." minutes, ".$time_taken->s." seconds";

            $unloaded = ($weighbridge_weight_in-$weighbridge_weight_out);
            // $delivery_date = date($delivery_date,"m/d/Yh:i:s A");	

		    $pdf = PDF::loadView('pdf.weighbridge_out', compact('weighbridge_ticket', 'vehicle_plate', 'weighbridge_weight_in', 'weighbridge_weight_out', 'wb_movement_permit', 'wb_driver_name', 'wb_driver_id', 'wb_dispatch_date', 'wb_delivery_number', 'wb_dispatch_date', 'user', 'delivery_date', 'departure_date', 'unloaded', 'time_taken'));

		    return $pdf->stream($weighbridge_ticket.' weighbridge_out.pdf');

	}  else {
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
				$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby','!=', null)->where('sl_quality_confirmedby','!=', null)->where('sl_auction_confirmedby','!=', null)->get();
				$cid = Input::get('country');
				$csn_season = Input::get('sale_season');
				$saleid = Input::get('sale');
				// $sale_lots = sale_lots::where('slid', $saleid)->where('slrid',Input::get('seller'))->where('cbid',Input::get('coffee_buyer'))->whereNotNull('warrant_no')->get(); 

				// $sale_lots_released = sale_lots::where('slid', $saleid)->where('slrid',Input::get('seller'))->where('cbid',Input::get('coffee_buyer'))->whereNotNull('warrant_no')->whereNotNull('rl_no')->get(); 

				$saleno = Sale::where('id', '=', Input::get('sale'))->first();
				$sellerinit = seller::where('id', '=', Input::get('seller'))->first();

				$weighbridge_all = weighbridge::where('cb_id', Input::get('coffee_buyer'))->where('ctr_id', $cid)->get();

				// print_r($cid);

				return View::make('weighbridgeout', compact('id', 
					'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'weighbridge_all', 'weighbridge_ticket'));	


	    	} else {

				return redirect('weighbridgeout')
	                        ->withErrors("Please select a valid Country!!")->withInput();
			}

	    	return View::make('weighbridgeout', compact('id', 'Season', 'country', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'weighbridge_ticket'));		
 	   }

 }

}