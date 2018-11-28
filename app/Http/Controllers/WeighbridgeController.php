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
use Ngea\Items;
use Ngea\booking;
use Ngea\Transporters;
use Ngea\ParkingLots;
use Ngea\DeliveryItems;
use Ngea\coffeegrower;


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
    	$booking = booking::all(['id', 'bkg_ref_no', 'bkg_delivery_date', 'bkg_validity_date', 'bkg_sample_received', 'bkg_remarks']);
    	$items = items::all(['id', 'it_name']);
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

		$weighbridges = Weighbridge::all(['id', 'wb_number']);

    	$booking = booking::all(['id', 'bkg_ref_no', 'bkg_delivery_date', 'bkg_validity_date', 'bkg_sample_received', 'bkg_remarks']);
    	$items = items::all(['id', 'it_name']);
    	$transporters = transporters::all(['id', 'trp_name', 'trp_initials', 'trp_description']);

		$weighbridge_ticket = Input::get('weighbridge_ticket');


		$region = region::all(['id', 'rgn_name', 'rgn_description']);
		
		if (NULL !== Input::get('submit_weighbridge_info')){
	    
			$weighbridge_ticket = Input::get('weighbridge_ticket');
			$vehicle_plate = strtoupper(Input::get('vehicle_plate'));
			$weighbridge_weight_in = Input::get('weighbridge_weight_in');
			$wbi_movement_permit = strtoupper(Input::get('movement_permit'));
			$wbi_driver_name = strtoupper(Input::get('driver_name'));
			$wbi_driver_id = Input::get('driver_id');
			$wbi_dispatch_date = Input::get('date');
			$wbi_delivery_number = Input::get("dnn");
			$wbi_dispatch_date=date_create($wbi_dispatch_date);
			$wbi_dispatch_date = date_format($wbi_dispatch_date,"Y-m-d");	
            $user_data = Auth::user();
            $user = $user_data ->id;
			
			$region_id = Input::get("region");
			$parking_lot_id = Input::get("parking_lot");
			$booking_id = Input::get("booking");
			$date_current = Input::get("date_current");
			$time = Input::get("time");
			$document_unit = Input::get("document_unit");
			$document_quantity = Input::get("document_quantity");


			$items_id = Input::get("items");
			$customers_id = Input::get("customer");

			$representative_name = Input::get("representative_name");
			$representative_id = Input::get("representative_id");
			$weighbridge_id = Input::get("weighbridge");
			$transporter_id = Input::get("transporter");

			$weighbridge_info = weighbridgeinfo::where('wbi_ticket', $weighbridge_ticket)->first();
        	$time_in=date_create($date_current.$time);
    		$time_in = date_format($time_in,"Y-m-d H:i:s"); 
    		$weighbridge_info_id = null;



			if($weighbridge_info != NULL){
				$weighbridge_info_id = $weighbridge_info->id;
				weighbridgeinfo::where('id', '=', $weighbridge_info_id)
				->update(['rgn_id' =>  $region_id, 'wbi_ticket' =>  $weighbridge_ticket,  'wbi_delivery_number' =>  $wbi_delivery_number, 'wbi_vehicle_plate' =>  $vehicle_plate, 'wbi_weight_in' =>  $weighbridge_weight_in, 'wbi_time_in' =>  $time_in, 'wbi_confirmedby' =>  $user, 'wbi_movement_permit' =>  $wbi_movement_permit, 'wbi_driver_name' =>  $wbi_driver_name, 'wbi_driver_id' =>  $wbi_driver_id, 'wbi_dispatch_date' =>  $wbi_dispatch_date, 'pl_id' =>  $parking_lot_id, 'bkg_id' =>  $booking_id, 'wbi_representative_name' =>  $representative_name, 'wbi_representative_id' =>  $representative_id, 'trp_id' =>  $transporter_id, 'wb_id' =>  $weighbridge_id, 'wbi_document_unit' =>  $document_unit, 'wbi_document_quantity' =>  $document_quantity]);

				$request->session()->flash('alert-success', 'Weighbridge Information Updated!!');
				Activity::log('Updated weighbridge information with ticket no. '.$weighbridge_ticket. ' date '. $wbi_dispatch_date. ' confirmed by '. $user. ' weight in '. $weighbridge_weight_in);

			} else {

				$weighbridge_info_id = weighbridgeinfo::insertGetId (
				['rgn_id' =>  $region_id, 'wbi_ticket' =>  $weighbridge_ticket,  'wbi_delivery_number' =>  $wbi_delivery_number, 'wbi_vehicle_plate' =>  $vehicle_plate, 'wbi_weight_in' =>  $weighbridge_weight_in, 'wbi_time_in' =>  $time_in, 'wbi_confirmedby' =>  $user, 'wbi_movement_permit' =>  $wbi_movement_permit, 'wbi_driver_name' =>  $wbi_driver_name, 'wbi_driver_id' =>  $wbi_driver_id, 'wbi_dispatch_date' =>  $wbi_dispatch_date, 'pl_id' =>  $parking_lot_id, 'bkg_id' =>  $booking_id, 'wbi_representative_name' =>  $representative_name, 'wbi_representative_id' =>  $representative_id, 'trp_id' =>  $transporter_id, 'wb_id' =>  $weighbridge_id, 'wbi_document_unit' =>  $document_unit, 'wbi_document_quantity' =>  $document_quantity]);
				$request->session()->flash('alert-success', 'Weighbridge Information Added!!');

				Activity::log('Inserted weighbridge information with ticket no. '.$weighbridge_ticket. ' date '. $wbi_dispatch_date. ' confirmed by '. $user. ' weight in '. $weighbridge_weight_in);

			}

			if ($weighbridge_info_id != null) {

				$delivery_items = DeliveryItems::where('wbi_id', $weighbridge_ticket)->first();
				$delivery_items_id = null;

				if($delivery_items != NULL){
					$delivery_items_id = $delivery_items->id;
					if ($customers_id != null) {
						foreach ($customers_id as $key => $value) {

							DeliveryItems::where('id', '=', $delivery_items_id)
							->update(['cgr_id' =>  $value, 'it_id' =>  $items_id[0], 'wbi_id' =>  $weighbridge_info_id]);
						}
					}

				} else {
					if ($customers_id != null) {
						foreach ($customers_id as $key => $value) {
							$delivery_items_id = DeliveryItems::insertGetId(['cgr_id' =>  $value, 'it_id' =>  $items_id[0], 'wbi_id' =>  $weighbridge_info_id]);
						}
					}
				}


			}

			parkinglots::where('id', '=', $parking_lot_id)
						->update(['pl_availability' =>  0]);

			$weighbridge = weighbridgeinfo::where('wbi_ticket', Input::get('weighbridge_ticket'))->first();

			return View::make('weighbridge', compact('id', 
				'Season', 'country', 'cid', 'csn_season','weighbridge', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'weighbridge_all', 'weighbridge_ticket', 'region', 'booking', 'items', 'transporters', 'weighbridges'));	
    	
		} else if (NULL !== Input::get('print')) {

			$country = Input::get('country');
			$coffee_buyer = Input::get('coffee_buyer');
			$weighbridge_ticket = Input::get('weighbridge_ticket');
			$vehicle_plate = strtoupper(Input::get('vehicle_plate'));
			$weighbridge_weight_in = Input::get('weighbridge_weight_in');
			$weighbridge_weight_out = Input::get('weighbridge_weight_out');

			$wbi_movement_permit = strtoupper(Input::get('movement_permit'));
			$wbi_driver_name = strtoupper(Input::get('driver_name'));
			$wbi_driver_id = Input::get('driver_id');
			$wbi_dispatch_date = Input::get('date');
			$wbi_delivery_number = Input::get("dnn");
			$wbi_dispatch_date=date_create($wbi_dispatch_date);
			$wbi_dispatch_date = date_format($wbi_dispatch_date,"m/d/Y");	
            $user_data = Auth::user();
            $user = $user_data ->usr_name;
            $weighbridge = weighbridgeinfo::where('wbi_ticket', $weighbridge_ticket)->where('cb_id', $coffee_buyer)->where('ctr_id', $country)->first();
            $delivery_date = $weighbridge->wb_time_in;
            $delivery_date = date('m/j/Y h:i:s A',strtotime($delivery_date));

		    $pdf = PDF::loadView('pdf.weighbridge_in', compact('weighbridge_ticket', 'vehicle_plate', 'weighbridge_weight_in', 'weighbridge_weight_out', 'wbi_movement_permit', 'wbi_driver_name', 'wbi_driver_id', 'wbi_dispatch_date', 'wbi_delivery_number', 'wbi_dispatch_date', 'user', 'delivery_date'));

		    return $pdf->stream($weighbridge_ticket.' weighbridge_in.pdf');

		}  else {

			$weighbridge = weighbridgeinfo::where('wbi_ticket', Input::get('weighbridge_ticket'))->first();

			return View::make('weighbridge', compact('id', 
				'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'weighbridge_all', 'weighbridge_ticket', 'region', 'weighbridge', 'booking', 'items', 'transporters', 'weighbridges'));	

 	   }
    
 	}

    public function getCustomer($item_id){
       
        try{

    		$items_selected = explode(',', $item_id);

    		$customers = array();

    		foreach ($items_selected as $key => $value) {

    			if ($value == 1 || $value == 2) {   				

	                $customers_db = DB::table('coffee_growers_cgr AS cgr')
	                    ->select('id', 'cgr.cgr_grower as name')->get();
	                $customers = json_decode(json_encode($customers_db), true);

    			}

    			if ($value == 3) {

	                $customers_db = DB::table('client_cl AS cl')
	                    ->select('id', 'cl.cl_name as name')
	                    ->get();

	                $customers = json_decode(json_encode($customers_db), true);
    			}

    		}
       

			return json_encode($customers);                    
	        
             
        
        }catch (\PDOException $e) {
            return response()->json([
                'exists' => false,
                'inserted' => false,
                'error' => $e->getMessage()
            ]);
        }
    }


    public function getWeighbridge($region_id){
       
        try{

    		$weighbridge = Weighbridge::where('rgn_id', $region_id)->get();

			return json_encode($weighbridge);                    
	        
             
        
        }catch (\PDOException $e) {
            return response()->json([
                'exists' => false,
                'inserted' => false,
                'error' => $e->getMessage()
            ]);
        }
    }

    public function getParking(){
       
        try{

       		$parking = ParkingLots::where('pl_availability', 1)->first();
			return json_encode($parking->pl_lot_no);                    
        
        }catch (\PDOException $e) {
            return response()->json([
                'exists' => false,
                'inserted' => false,
                'error' => $e->getMessage()
            ]);
        }
    }

}

