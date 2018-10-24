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
use PDF;
use Activity;
use Excel;
use Ngea\country;
use Ngea\User;
use Auth;
use delete;
use Ngea\WeighbridgeInfo;
use Ngea\Region;
use Ngea\Weighbridge;
use Ngea\ParkingLots;
use Ngea\Items;
use Ngea\booking;
use Ngea\Transporters;


class WeighbridgeController extends Controller {

    public function weighbridgeForm (Request $request){
    	$id = NULL;
    	$Season = Season::all(['id', 'csn_season']);
    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
    	$weighbridge_ticket = sprintf("%07d", 0000001);
		$ref_no = weighbridgeinfo::orderBy('wbi_ticket', 'asc')->pluck('wbi_ticket');

    	$region = region::all(['id', 'rgn_name', 'rgn_description']);
    	$weighbridges = NULL;
    	$parking = parkinglots::all(['id', 'pl_lot_no', 'pl_availability']);
    	$booking = booking::all(['id', 'bkg_delivery_date', 'bkg_validity_date', 'bkg_sample_received', 'bkg_remarks']);
    	$items = items::all(['id', 'it_name', 'it_client', 'it_client_table']);
    	$transporters = transporters::all(['id', 'trp_name', 'trp_initials', 'trp_description']);

		foreach ($ref_no as $ref) {
		    $ref_no = $ref;
		}	
		if ($ref_no != NULL && is_numeric($ref_no)) {
			$weighbridge_ticket = sprintf("%07d", ($ref_no + 0000001));
		}
				
		return View::make('weighbridge', compact('id', 
				'Season', 'country', 'cid', 'weighbridge_ticket', 'region', 'weighbridges', 'parking', 'booking', 'items', 'transporters'));	
    }

    public function weighbridge (Request $request){
    	$id = NULL;
		$weighbridge_ticket = sprintf("%07d", 0000001);
		$ref_no = weighbridgeinfo::orderBy('wbi_ticket', 'asc')->pluck('wbi_ticket');
		foreach ($ref_no as $ref) {
		    $ref_no = $ref;
		}		
		if ($ref_no != NULL && is_numeric($ref_no)) {
			$weighbridge_ticket = sprintf("%07d", ($ref_no + 0000001));
		}
		
		if (NULL !== Input::get('submitlot')){
	    
			$country = Input::get('country');
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
			$wb_dispatch_date = date_format($wb_dispatch_date,"Y-m-d");	
            $user_data = Auth::user();
            $user = $user_data ->id;
			$weighbridge = weighbridgeinfo::where('wbi_ticket', $weighbridge_ticket)->where('cb_id', $coffee_buyer)->where('ctr_id', $country)->first();

			date_default_timezone_set('Africa/Nairobi');
   			$time_in = date('Y-m-d H:i:s');
			if($weighbridge != NULL){
				$wb_ticket = $weighbridge->id;
				weighbridgeinfo::where('id', '=', $wb_ticket)
				->update(['ctr_id' => $country,'csn_id' => $sale_season,'cb_id' => $coffee_buyer, 'slr_id' => $seller,  'wbi_ticket' =>  $weighbridge_ticket,  'wbi_delivery_number' =>  $wb_delivery_number, 'wbi_vehicle_plate' =>  $vehicle_plate, 'wbi_weight_in' =>  $weighbridge_weight_in, 'wbi_weight_out' =>  $weighbridge_weight_out, 'wbi_time_in' =>  $time_in, 'wbi_confirmedby' =>  $user, 'wbi_movement_permit' =>  $wb_movement_permit, 'wbi_driver_name' =>  $wb_driver_name, 'wbi_driver_id' =>  $wb_driver_id, 'wbi_dispatch_date' =>  $wb_dispatch_date]);
				$request->session()->flash('alert-success', 'Weighbridge Information Updated!!');
				Activity::log('Updated weighbridge information with ticket no. '.$weighbridge_ticket. ' date '. $wb_dispatch_date. ' confirmed by '. $user. ' weight in '. $weighbridge_weight_in. ' weight out '. $weighbridge_weight_out);

			} else {
				$wb_ticket = weighbridgeinfo::insertGetId (
				['ctr_id' => $country,'csn_id' => $sale_season,'cb_id' => $coffee_buyer, 'slr_id' => $seller,  'wbi_ticket' =>  $weighbridge_ticket,  'wbi_delivery_number' =>  $wb_delivery_number, 'wbi_vehicle_plate' =>  $vehicle_plate, 'wbi_weight_in' =>  $weighbridge_weight_in, 'wbi_weight_out' =>  $weighbridge_weight_out, 'wbi_time_in' =>  $time_in, 'wbi_confirmedby' =>  $user, 'wbi_movement_permit' =>  $wb_movement_permit, 'wbi_driver_name' =>  $wb_driver_name, 'wbi_driver_id' =>  $wb_driver_id, 'wbi_dispatch_date' =>  $wb_dispatch_date]);
				$request->session()->flash('alert-success', 'Weighbridge Information Added!!');

				Activity::log('Inserted weighbridge information with ticket no. '.$weighbridge_ticket. ' date '. $wb_dispatch_date. ' confirmed by '. $user. ' weight in '. $weighbridge_weight_in. ' weight out '. $weighbridge_weight_out);
				
			}	
			$weighbridge = weighbridgeinfo::where('wbi_ticket', $weighbridge_ticket)->where('cb_id', $coffee_buyer)->where('ctr_id', $country)->first();
			$weighbridge_all = weighbridgeinfo::where('cb_id', $coffee_buyer)->where('ctr_id', $country)->get();
	    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
			$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby','!=', null)->where('sl_quality_confirmedby','!=', null)->where('sl_auction_confirmedby','!=', null)->get();
			$date = date("m/d/Y", strtotime($wb_dispatch_date));
			return View::make('weighbridge', compact('id', 
				'Season', 'country', 'cid', 'csn_season','weighbridge', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'weighbridge_all', 'weighbridge_ticket'));	
    	
		}  else if (NULL !== Input::get('searchButton')) {

			$country = Input::get('country');
			$weighbridge_ticket = Input::get('weighbridge_ticket');
			$vehicle_plate = Input::get('vehicle_plate');
			$weighbridge_weight_in = Input::get('weighbridge_weight_in');
			$weighbridge_weight_out = Input::get('weighbridge_weight_out');
			$date = Input::get('date');
			$date=date_create($date);
			$date = date_format($date,"Y-m-d");	
			$weighbridge = weighbridgeinfo::where('wbi_ticket', $weighbridge_ticket)->where('cb_id', $coffee_buyer)->where('ctr_id', $country)->first();
			$weighbridge_all = weighbridgeinfo::where('cb_id', $coffee_buyer)->where('ctr_id', $country)->get();
	    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
			$cid = Input::get('country');
			$date = date("m/d/Y", strtotime($date));
			return View::make('weighbridge', compact('id', 
				'Season', 'country', 'cid', 'csn_season','weighbridge', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'weighbridge_all', 'weighbridge_ticket'));	

		}  else if (NULL !== Input::get('print')) {

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
            $weighbridge = weighbridgeinfo::where('wbi_ticket', $weighbridge_ticket)->where('cb_id', $coffee_buyer)->where('ctr_id', $country)->first();
            $delivery_date = $weighbridge->wb_time_in;
            $delivery_date = date('m/j/Y h:i:s A',strtotime($delivery_date));
		    $pdf = PDF::loadView('pdf.weighbridge_in', compact('weighbridge_ticket', 'vehicle_plate', 'weighbridge_weight_in', 'weighbridge_weight_out', 'wbi_movement_permit', 'wbi_driver_name', 'wbi_driver_id', 'wbi_dispatch_date', 'wbi_delivery_number', 'wbi_dispatch_date', 'user', 'delivery_date'));
		    return $pdf->stream($weighbridge_ticket.' weighbridge_in.pdf');

		}  else {
	    	$Season = Season::all(['id', 'csn_season']);
	    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
	    	if($request->has('country')){
				$cid = Input::get('country');
				$weighbridge_all = weighbridgeinfo::where('cb_id', Input::get('coffee_buyer'))->where('ctr_id', $cid)->get();
				return View::make('weighbridge', compact('id', 
					'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'weighbridge_all', 'weighbridge_ticket'));	
	    	} else {

				return redirect('weighbridge')
	                        ->withErrors("Please select a valid Country!!")->withInput();
			}

	    	return View::make('weighbridge', compact('id', 'Season', 'country', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'weighbridge_ticket'));		
 	   }
    
 	}

}