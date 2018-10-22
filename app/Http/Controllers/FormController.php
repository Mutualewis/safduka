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
use Ngea\Warehouse;

use Ngea\coffeewarrant;
use Ngea\buyer;
use Ngea\saleinfo;
use Ngea\SaleType;
use Ngea\Sale;

//use PDF;
use PDF;
use Activity;
// use Anouar\Fpdf\Fpdf as Fpdf;

use Ngea\agent;


use Ngea\booking;
use Ngea\booking_with_names;
use Ngea\booking_items;
use Ngea\booking_items_with_names;



class FormController extends Controller {


    public function createParchmentIntakeForm (Request $request){
		$growers = Growers::all(['id', 'cgr_grower', 'cgr_mark', 'cgr_code']);

		$ParchmentType = ParchmentType::all(['id', 'pty_name']);

		

		$MillingStatus = MillingStatus::all(['id', 'mst_name']);

		$Season = Season::all(['id', 'csn_season']);

		return View::make('parchmentintake', compact('id', 'growers', 'ParchmentType', 'MillingStatus', 'Season'));

    }

    public function parchmentIntake (Request $request){
    	
        $this->validate($request, [
            'outt_number' => 'required', 'outt_grn_number' => 'required', 'parchment' => 'required', 'coffee_grower' => 'required', 'season' => 'required', 'milling_status' => 'required', 'outt_gross_weight' => 'required', 'outt_bags' => 'required', 'date' => 'required', 
        ]);

        $outt_number = strtoupper(Input::get('outt_number'));
    	$outt_grn_number = strtoupper(Input::get('outt_grn_number'));


        $csn_id = Input::get('season');
    	// $ct_id = Input::get('ct_id');
    	$mst_id = Input::get('milling_status');

    	$date = Input::get('date');
    	$date=date_create($date);
		$date = date_format($date,"Y-m-d");
		$cgr_id = Input::get('coffee_grower');
    	$pty_id = Input::get('parchment');
		$outt_gross_weight = Input::get('outt_gross_weight');
		$outt_bags = Input::get('outt_bags');



		if (Parchment::where('outt_number', '=', $outt_number)->where('csn_id', '=', $csn_id)->where('pty_id', '=', $pty_id)->where('outt_grn_number', '=', $outt_grn_number)->exists()) {			
			
			return redirect('parchmentintake')
                        ->withErrors("An Outturn with the same Outturn Number for this Season Already Exists!!")
                        ->withInput();	
			
	 
		}

/*
		if (Parchment::where('outt_grn_number', '=', $outt_grn_number)->where('pty_id', '=', $pty_id)->exists()) {	
			
			return redirect('parchmentintake')
                        ->withErrors("An Outturn with the same GRN Number and Parchment type Already Exists!!")
                        ->withInput();	
			
	 
		}
*/


		Parchment::insert(
		    ['outt_number' => $outt_number, 'outt_grn_number' => $outt_grn_number, 'pty_id' => $pty_id, 'cgr_id' => $cgr_id, 'csn_id' => $csn_id, 'mst_id' => $mst_id, 'outt_gross_weight' => $outt_gross_weight, 'outt_bags' => $outt_bags, 'outt_delivery_date' => $date]
		);

		Activity::log('Added Outturn '.' outt_number '.$outt_number. ' outt_grn_number '.$outt_grn_number.' pty_id '. $pty_id.' cgr_id '.$cgr_id.' csn_id ' .$csn_id.' mst_id ' . $mst_id.' outt_gross_weight '.$outt_gross_weight.' outt_bags '.$outt_bags. ' outt_delivery_date '.$date);

		$request->session()->flash('alert-success', 'Parchment was successfully added!');
		return redirect('parchmentintake');		

    }


    public function editParchmentForm (Request $request){
    	
		$growers = Growers::all(['id', 'cgr_grower', 'cgr_mark', 'cgr_code']);

		$ParchmentType = ParchmentType::all(['id', 'pty_name']);

		

		$MillingStatus = MillingStatus::all(['id', 'mst_name']);

		$Season = Season::all(['id', 'csn_season']);

		$outturn = NULL;

		$bulkoutturn = NULL;

		return View::make('parchmentintakeedit', compact('id', 'growers', 'ParchmentType', 'MillingStatus', 'Season', 'outturn', 'bulkoutturn'));

    }
    public function editOutturn (Request $request){
    	if (NULL !== Input::get('searchButton')){

			if ($request->has('outt_number')) {
				if ($request->has('season') && Input::get('season') !== "Season" ) {
					// if ($request->has('outt_grn_number')) {
						$season = Season::where('id',  Input::get('season'))->first();
						$season = $season->csn_season;
						//$outturn = outturn_with_names::where('outt_number', '=', Input::get('outt_number'))->where('csn_season',  $season)->where('outt_grn_number',  Input::get('outt_grn_number'))->first();
						$outturn = NULL;
						if ($request->has('outt_grn_number')) {
							$outturn = outturn_with_names::where('outt_number', '=', Input::get('outt_number'))->where('csn_season',  $season)->where('outt_grn_number',  Input::get('outt_grn_number'))->first();

						}
						if ($outturn == NULL) {
							$outturn = outturn_with_names::where('outt_number', '=', Input::get('outt_number'))->where('csn_season',  $season)->first();
						}
						
						if ($outturn !== NULL) {
							$growers = Growers::all(['id', 'cgr_grower', 'cgr_mark', 'cgr_code']);

							$ParchmentType = ParchmentType::all(['id', 'pty_name']);							

							$MillingStatus = MillingStatus::all(['id', 'mst_name']);

							$Season = Season::all(['id', 'csn_season']);

							// $bulkoutturn = bulkoutturn::where('outt_outtgr_id', $outturn->id)->first();
							$bulkoutturn = NULL;

							$request->session()->flash('alert-success', 'Outturn found!!');
							return View::make('parchmentintakeedit', compact('outturn', 'MillingStatus', 'bulkoutturn', 'Season', 'growers', 'ParchmentType'));			
					 
						} else {

							return redirect('parchmentintakeedit')
				                        ->withErrors("Please enter a valid Outturn Number and Season Combination!!")->withInput();
						}
					// } else {

							// return redirect('parchmentintakeedit')
				                        // ->withErrors("The GRN No cannot be empty!!")->withInput();
					// }
				} else {
					return  redirect('parchmentintakeedit')
		                        ->withErrors("The Season cannot be empty!!")->withInput();						
				}



			} else {
				if ($request->has('season')) {
					return  redirect('parchmentintakeedit')
		                        ->withErrors("The Outturn Number cannot be empty!!")->withInput();	
				} else {
					return  redirect('parchmentintakeedit')
		                        ->withErrors("The Outturn Number and Season cannot be empty!!")->withInput();						
				}
			
			}
    		
    	} else {
	    	$outt_number = strtoupper(Input::get('outt_number'));
	    	$boutt_outturn_number = Input::get('boutt_outturn_number');
	    	$percentage = Input::get('percentage');
	    	$outt_grn_number = strtoupper(Input::get('outt_grn_number'));
	    	$milling_status = Input::get('milling_status');
			$milling_date = Input::get('date');
	    	$milling_date=date_create($milling_date);
			$milling_date = date_format($milling_date,"Y-m-d");			
			$season = Season::where('id',  Input::get('season'))->first();
			$season = $season->csn_season;


	    	$date = Input::get('deliveryDate');
	    	$date=date_create($date);
			$date = date_format($date,"Y-m-d");
			$cgr_id = Input::get('coffee_grower');
	    	$pty_id = Input::get('parchment');
			$outt_gross_weight = Input::get('outt_gross_weight');
			$outt_bags = Input::get('outt_bags');


			
			// $outturn = outturn_with_names::where('outt_number', Input::get('outt_number'))->first();
			
			$outturn = NULL;
			if ($request->has('outt_grn_number')) {
				$outturn = outturn_with_names::where('outt_number', '=', Input::get('outt_number'))->where('csn_season',  $season)->where('outt_grn_number',  Input::get('outt_grn_number'))->first();

			} else {
				$outturn = outturn_with_names::where('outt_number', '=', Input::get('outt_number'))->where('csn_season',  $season)->first();
			}

			if ($request->has('boutt_outturn_number')) {

				if ($request->has('percentage')) {

				} else {
					return  redirect('parchmentintakeedit')
		                        ->withErrors("Please enter bulk percentage!!")
		                        ->withInput();	
				}


				/*$bulkid = bulkoutturn::where('outt_outtgr_id', $outturn->id)->first(); 
				if ($bulkid === NULL){
					$bulkid = NULL;
					bulkoutturn::insert(
						['boutt_outturn_number' => $boutt_outturn_number, 'boutt_type_id' => '1', 'boutt_percentage' =>  $percentage,  'outt_outtgr_id' => $outturn->id]
					);

				} else {
					$bulkid = $bulkid->id;
					bulkoutturn::where('id', '=', $bulkid)
						->update(['boutt_outturn_number' => $boutt_outturn_number, 'boutt_type_id' => '1', 'boutt_percentage' =>  $percentage,  'outt_outtgr_id' => $outturn->id]);
				}*/
				

			}

			Parchment::where('id', '=', $outturn->id)
						->update(['outt_grn_number' => $outt_grn_number,  'outt_date_milled' =>  $milling_date, 'mst_id'=> $milling_status, 'outt_date_milled'=> $milling_date, 'outt_delivery_date' => $date, 'cgr_id' => $cgr_id, 'pty_id' => $pty_id, 'outt_gross_weight' => $outt_gross_weight, 'outt_bags' => $outt_bags]);


					Activity::log('Updated Outturn '.' outt_number '.$outt_number. ' outt_grn_number '.$outt_grn_number.' pty_id '. $pty_id.' cgr_id '.$cgr_id.' csn_id ' .$csn_id.' mst_id ' . $mst_id.' outt_gross_weight '.$outt_gross_weight.' outt_bags '.$outt_bags. ' outt_delivery_date '.$date);

			$request->session()->flash('alert-success', 'Parchment was successfully updated!');

			$season = Season::where('id',  Input::get('season'))->first();
			$season = $season->csn_season;
			$outturn = outturn_with_names::where('outt_number', '=', Input::get('outt_number'))->where('csn_season',  $season)->where('outt_grn_number',  Input::get('outt_grn_number'))->first();
			$growers = Growers::all(['id', 'cgr_grower', 'cgr_mark', 'cgr_code']);

			$ParchmentType = ParchmentType::all(['id', 'pty_name']);							

			$MillingStatus = MillingStatus::all(['id', 'mst_name']);

			$Season = Season::all(['id', 'csn_season']);

			// $bulkoutturn = bulkoutturn::where('outt_outtgr_id', $outturn->id)->first();
			$bulkoutturn = NULL;

			// $request->session()->flash('alert-success', 'Outturn found!!');
			return View::make('parchmentintakeedit', compact('outturn', 'MillingStatus', 'bulkoutturn', 'Season', 'growers', 'ParchmentType'));				
			// return redirect('parchmentintakeedit');			


    	}

	}

    public function createParchmentQualityForm (Request $request){
		$outturn_with_names = outturn_with_names::all(['id', 'outt_number', 'csn_season']);
		$CropType = CropType::all(['id', 'ct_name']);
		$Season = Season::all(['id', 'csn_season']);

		$Class = CoffeeClass::all(['id', 'cc_name']);
		$QualityAnalysis = NULL;
		$outturnquality = NULL;



		return View::make('qualityparchment', compact('id', 'outturn_with_names', 'CropType', 'Class', 'Season', 'outturnquality', 'QualityAnalysis'));

    }



    public function parchmentQuality (Request $request){
    	if (NULL !== Input::get('searchButton')){
			if ($request->has('outt_number')) {
				if ($request->has('outt_season') & Input::get('outt_season') !== "Season" ) {
					$outt_season = Season::where('id',  Input::get('outt_season'))->first();
					$outt_season = $outt_season->csn_season;
					$outturn = outturn_with_names::where('outt_number', '=', Input::get('outt_number'))->where('csn_season',  $outt_season)->first();

					if ($outturn !== NULL) {

						$Season = Season::all(['id', 'csn_season']);

						$saleinfo = saleinfo::where('outtgr_id', $outturn->id)->first();

						$Class = CoffeeClass::all(['id', 'cc_name']);

						$CropType = CropType::all(['id', 'ct_name']);

						$oqlty_outturn_id = Input::get('outt_number');

						//if (OutturnQuality::where('oqlty_outturn_id', '=', $outturn->id)->:where('qtyp_id', '=', '1')->exists()) {
						
						$outturnquality = OutturnQuality::where('oqlty_outturn_id', '=', $outturn->id)->where('qtyp_id', '=', '1')->first();

						$oqlty_id = NULL;

						if( $outturnquality !== NULL ){
							$oqlty_id = $outturnquality->id;
						}

						$QualityAnalysis = QualityAnalysis::where('oqlty_id', '=', $oqlty_id)->get(); 
						// $bulkid = bulkoutturn::where('outt_outtgr_id', $outturn->id)->where('boutt_type_id', '1')->first(); 
						
						$request->session()->flash('alert-success', 'Outturn found!!');
						return View::make('qualityparchment', compact('id', 'Season', 'outturn', 'Class', 'CropType', 'outturnquality', 'QualityAnalysis'));			
				 
					} else {

						return redirect('qualityparchment')
			                        ->withErrors("Please enter a valid Outturn Number and Outturn Season Combination or Create a new Outturn!!")->withInput();
					}
				} else {
					return  redirect('qualityparchment')
		                        ->withErrors("The Outturn Season cannot be empty!!")->withInput();						
				}



			} else {
				if ($request->has('season')) {
					return  redirect('qualityparchment')
		                        ->withErrors("The Outturn Number cannot be empty!!")->withInput();	
				} else {
					return  redirect('qualityparchment')
		                        ->withErrors("The Outturn Number and Season cannot be empty!!")->withInput();						
				}
			
			}
    	} else {    	
	        $this->validate($request, [
	            'outt_number' => 'required','outt_season' => 'required', 'aqr_serial' => 'required', 'moisture' => 'required', 'milling_loss' => 'required', 'crop_type' => 'required', 
	        ]);

	        $oqlty_outturn_id = Input::get('outt_number');
	    	$oqlty_aqr_serial = strtoupper(Input::get('aqr_serial'));
	    	$oqlty_moisture = Input::get('moisture');
			$oqlty_milling_loss = Input::get('milling_loss');


	        $ct_id = Input::get('crop_type');

	    	$ov_cc_id = Input::get('overall_class');

	    	if ($ov_cc_id == null) {
	    		$ov_cc_id = 'NULL';
	    	}
			$oqlty_remarks = Input::get('remarks');
			$outt_season = Season::where('id',  Input::get('outt_season'))->first();
			$outt_season = $outt_season->csn_season;
			$outturn = outturn_with_names::where('outt_number', '=', Input::get('outt_number'))->where('csn_season',  $outt_season)->first();

			if ($outturn == NULL) {
				return  redirect('qualityparchment')
		                        ->withErrors("The Outturn doesn't exist, please search it first!!")->withInput();			
			}

			if (OutturnQuality::where('oqlty_aqr_serial', '=', $oqlty_aqr_serial)->exists()) {

					// return redirect('qualityparchment')
		   //                      ->withErrors("AQR Serial Already Exists!!")
		   //                      ->withInput();	
				if (OutturnQuality::where('oqlty_outturn_id', '=', $outturn->id)->exists()) {

					if (OutturnQuality::where('qtyp_id', '=', '1')->exists()) {

						OutturnQuality::where('oqlty_outturn_id', '=', $outturn->id)
							->update([ 'cc_id' => $ov_cc_id, 'ct_id' => $ct_id,  'oqlty_moisture' => $oqlty_moisture,  'oqlty_milling_loss' => $oqlty_milling_loss,  'oqlty_remarks' => $oqlty_remarks,  'oqlty_aqr_serial' => $oqlty_aqr_serial]);	

						$outturnquality = OutturnQuality::where('oqlty_outturn_id', '=', $outturn->id)->where('qtyp_id', '=', '1')->first();

						$oqlty_id = NULL;

						if( $outturnquality->id !== NULL ){
							$oqlty_id = $outturnquality->id;
						}
						QualityAnalysis::where('oqlty_id', '=', $oqlty_id)->where('acat_id', '=', '1')
							->update(
									['qanl_value' => Input::get('SC18p')]
								);
						QualityAnalysis::where('oqlty_id', '=', $oqlty_id)->where('acat_id', '=', '2')
							->update(
									['qanl_value' => Input::get('SC16p')]
								);
						QualityAnalysis::where('oqlty_id', '=', $oqlty_id)->where('acat_id', '=', '3')
							->update(
									['qanl_value' => Input::get('SC14p')]
								);
						QualityAnalysis::where('oqlty_id', '=', $oqlty_id)->where('acat_id', '=', '4')
							->update(
									['qanl_value' => Input::get('THESBp')]
								);
						QualityAnalysis::where('oqlty_id', '=', $oqlty_id)->where('acat_id', '=', '5')
							->update(
									['qanl_value' => Input::get('mbunip')]
								);
						QualityAnalysis::where('oqlty_id', '=', $oqlty_id)->where('acat_id', '=', '6')
							->update(
									['qanl_value' => Input::get('SC18p_cc_id')]
								);
						QualityAnalysis::where('oqlty_id', '=', $oqlty_id)->where('acat_id', '=', '7')
							->update(
									['qanl_value' => Input::get('SC16_cc_id')]
								);
						QualityAnalysis::where('oqlty_id', '=', $oqlty_id)->where('acat_id', '=', '8')
							->update(
									['qanl_value' => Input::get('SC14_cc_id')]
								);
						QualityAnalysis::where('oqlty_id', '=', $oqlty_id)->where('acat_id', '=', '9')
							->update(
									['qanl_value' => Input::get('THESB_cc_id')]
								);
						QualityAnalysis::where('oqlty_id', '=', $oqlty_id)->where('acat_id', '=', '10')
							->update(
									['qanl_value' => Input::get('mbuni_cc_id')]
								);
						// QualityAnalysis::where('oqlty_id', '=', $oqlty_id)
						// 	->update([
						//     ['acat_id' => '1',  'oqlty_id' => $oqlty_id, 'qanl_value' => Input::get('SC18p')],
						//     ['acat_id' => '2',  'oqlty_id' => $oqlty_id, 'qanl_value' => Input::get('SC16p')],
						//     ['acat_id' => '3',  'oqlty_id' => $oqlty_id, 'qanl_value' => Input::get('SC14p')],
						//     ['acat_id' => '4',  'oqlty_id' => $oqlty_id, 'qanl_value' => Input::get('THESBp')],
						//     ['acat_id' => '5',  'oqlty_id' => $oqlty_id, 'qanl_value' => Input::get('mbunip')],
						//     ['acat_id' => '6',  'oqlty_id' => $oqlty_id, 'qanl_value' => Input::get('SC18p_cc_id')],
						//     ['acat_id' => '7',  'oqlty_id' => $oqlty_id, 'qanl_value' => Input::get('SC16_cc_id')],
						//     ['acat_id' => '8',  'oqlty_id' => $oqlty_id, 'qanl_value' => Input::get('SC14_cc_id')],
						//     ['acat_id' => '9',  'oqlty_id' => $oqlty_id, 'qanl_value' => Input::get('THESB_cc_id')],
						//     ['acat_id' => '10',  'oqlty_id' => $oqlty_id, 'qanl_value' => Input::get('mbuni_cc_id')]
						// ]);							

						// return redirect('qualityparchment')
			   //                      ->withErrors("Quality Details for this Outturn Already Exists!!")
			   //                      ->withInput();	
					} 
/*					else {
						$qid = OutturnQuality::insertGetId(
						    ['qtyp_id' => '1',  'oqlty_outturn_id' => $outturn->id,  'cc_id' => $ov_cc_id, 'ct_id' => $ct_id,  'oqlty_moisture' => $oqlty_moisture,  'oqlty_milling_loss' => $oqlty_milling_loss,  'oqlty_remarks' => $oqlty_remarks,  'oqlty_aqr_serial' => $oqlty_aqr_serial]
						);	
						QualityAnalysis::insert([
						    ['acat_id' => '1',  'oqlty_id' => $qid, 'qanl_value' => Input::get('SC18p')],
						    ['acat_id' => '2',  'oqlty_id' => $qid, 'qanl_value' => Input::get('SC16p')],
						    ['acat_id' => '3',  'oqlty_id' => $qid, 'qanl_value' => Input::get('SC14p')],
						    ['acat_id' => '4',  'oqlty_id' => $qid, 'qanl_value' => Input::get('THESBp')],
						    ['acat_id' => '5',  'oqlty_id' => $qid, 'qanl_value' => Input::get('mbunip')],
						    ['acat_id' => '6',  'oqlty_id' => $qid, 'qanl_value' => Input::get('SC18p_cc_id')],
						    ['acat_id' => '7',  'oqlty_id' => $qid, 'qanl_value' => Input::get('SC16_cc_id')],
						    ['acat_id' => '8',  'oqlty_id' => $qid, 'qanl_value' => Input::get('SC14_cc_id')],
						    ['acat_id' => '9',  'oqlty_id' => $qid, 'qanl_value' => Input::get('THESB_cc_id')],
						    ['acat_id' => '10',  'oqlty_id' => $qid, 'qanl_value' => Input::get('mbuni_cc_id')]
						]);					
					}*/
			 
				}
/*				 else {
					$qid = OutturnQuality::insertGetId(
					    ['qtyp_id' => '1',  'oqlty_outturn_id' => $outturn->id,  'cc_id' => $ov_cc_id, 'ct_id' => $ct_id,  'oqlty_moisture' => $oqlty_moisture,  'oqlty_milling_loss' => $oqlty_milling_loss,  'oqlty_remarks' => $oqlty_remarks,  'oqlty_aqr_serial' => $oqlty_aqr_serial]
					);

					QualityAnalysis::insert([
					    ['acat_id' => '1',  'oqlty_id' => $qid, 'qanl_value' => Input::get('SC18p')],
					    ['acat_id' => '2',  'oqlty_id' => $qid, 'qanl_value' => Input::get('SC16p')],
					    ['acat_id' => '3',  'oqlty_id' => $qid, 'qanl_value' => Input::get('SC14p')],
					    ['acat_id' => '4',  'oqlty_id' => $qid, 'qanl_value' => Input::get('THESBp')],
					    ['acat_id' => '5',  'oqlty_id' => $qid, 'qanl_value' => Input::get('mbunip')],
					    ['acat_id' => '6',  'oqlty_id' => $qid, 'qanl_value' => Input::get('SC18p_cc_id')],
					    ['acat_id' => '7',  'oqlty_id' => $qid, 'qanl_value' => Input::get('SC16_cc_id')],
					    ['acat_id' => '8',  'oqlty_id' => $qid, 'qanl_value' => Input::get('SC14_cc_id')],
					    ['acat_id' => '9',  'oqlty_id' => $qid, 'qanl_value' => Input::get('THESB_cc_id')],
					    ['acat_id' => '10',  'oqlty_id' => $qid, 'qanl_value' => Input::get('mbuni_cc_id')]
					]);
				}	*/			
		 
			} else {

					$qid = OutturnQuality::insertGetId(
					    ['qtyp_id' => '1',  'oqlty_outturn_id' => $outturn->id,  'cc_id' => $ov_cc_id, 'ct_id' => $ct_id,  'oqlty_moisture' => $oqlty_moisture,  'oqlty_milling_loss' => $oqlty_milling_loss,  'oqlty_remarks' => $oqlty_remarks,  'oqlty_aqr_serial' => $oqlty_aqr_serial]
					);

					QualityAnalysis::insert([
					    ['acat_id' => '1',  'oqlty_id' => $qid, 'qanl_value' => Input::get('SC18p')],
					    ['acat_id' => '2',  'oqlty_id' => $qid, 'qanl_value' => Input::get('SC16p')],
					    ['acat_id' => '3',  'oqlty_id' => $qid, 'qanl_value' => Input::get('SC14p')],
					    ['acat_id' => '4',  'oqlty_id' => $qid, 'qanl_value' => Input::get('THESBp')],
					    ['acat_id' => '5',  'oqlty_id' => $qid, 'qanl_value' => Input::get('mbunip')],
					    ['acat_id' => '6',  'oqlty_id' => $qid, 'qanl_value' => Input::get('SC18p_cc_id')],
					    ['acat_id' => '7',  'oqlty_id' => $qid, 'qanl_value' => Input::get('SC16_cc_id')],
					    ['acat_id' => '8',  'oqlty_id' => $qid, 'qanl_value' => Input::get('SC14_cc_id')],
					    ['acat_id' => '9',  'oqlty_id' => $qid, 'qanl_value' => Input::get('THESB_cc_id')],
					    ['acat_id' => '10',  'oqlty_id' => $qid, 'qanl_value' => Input::get('mbuni_cc_id')]
					]);
			}




// saleinfo::where('outt_id', '=', $outturn->id)
// 							->update(['cb_id' => $cb_id, 'sif_sale_no' => $sif_sale_no, 'sif_lot' => $sif_lot, 'sif_rate' => $sif_rate, 'sif_value' => $sif_value, 'csn_id' => $sale_csn_id]);







			$request->session()->flash('alert-success', 'Parchment quality was successfully added!');
			return redirect('qualityparchment');	
		}
    }












    public function createCleanStraightForm (Request $request){




		$growers = Growers::all(['id', 'cgr_grower', 'cgr_mark']);

		$ParchmentType = ParchmentType::all(['id', 'pty_name']);

		$SaleStatus = SaleStatus::all(['id', 'sst_name']);
		$CoffeeGrade = CoffeeGrade::orderBy('id', 'asc')->get();
		$SaleableStatus = SaleableStatus::all(['id', 'selst_name']);
		$CoffeeClass = CoffeeClass::all(['id', 'cc_name']);


		$outturn = NULL;

		$bulkoutturn = NULL;


		$pbulkoutturn = NULL;
		$cbulkoutturn = NULL;

		$cleancoffee = NULL;
		$coffeewarrant = NULL;

		$MillingStatus = MillingStatus::all(['id', 'mst_name']);

		$Season = Season::all(['id', 'csn_season']);

		return View::make('cleanstraight', compact('id', 'growers', 'ParchmentType', 'MillingStatus', 'Season', 'SaleStatus', 'CoffeeGrade', 'SaleableStatus', 'CoffeeClass', 'outturn', 'bulkoutturn', 'pbulkoutturn', 'cbulkoutturn', 'cleancoffee', 'coffeewarrant' ));

    }


    public function straightIntake (Request $request){
    	if (NULL !== Input::get('searchButton')){
			if ($request->has('outt_number')) {
				if ($request->has('season') & Input::get('season') !== "Season" ) {
					if ($request->has('outt_grn_number') || $request->has('outt_dmp_number') ) {
						$season = Season::where('id',  Input::get('season'))->first();
						$season = $season->csn_season;
						#$outturn = outturn_with_names::where('outt_number', '=', Input::get('outt_number'))->where('csn_season',  $season)->first();
						$outturn = outturn_with_names::where('outt_number', '=', Input::get('outt_number'))->where('csn_season',  $season)->where('outt_grn_number',  Input::get('outt_grn_number'))->first();
						if($outturn === NULL){
							$outturn = outturn_with_names::where('outt_number', '=', Input::get('outt_number'))->where('csn_season',  $season)->where('outt_dmp_number',  Input::get('outt_dmp_number'))->first();
						}
						if ($outturn !== NULL) {
							$growers = Growers::all(['id', 'cgr_grower', 'cgr_mark']);

							$ParchmentType = ParchmentType::all(['id', 'pty_name']);

							$SaleStatus = SaleStatus::all(['id', 'sst_name']);
							$CoffeeGrade = CoffeeGrade::orderBy('id', 'asc')->get();
							$SaleableStatus = SaleableStatus::all(['id', 'selst_name']);
							$CoffeeClass = CoffeeClass::all(['id', 'cc_name']);
							

							$MillingStatus = MillingStatus::all(['id', 'mst_name']);

							$Season = Season::all(['id', 'csn_season']);

							// $pbulkoutturn = bulkoutturn::where('outt_outtgr_id', $outturn->id)->where('boutt_type_id', '1')->first();
							// $cbulkoutturn = bulkoutturn::where('outt_outtgr_id', $outturn->id)->where('boutt_type_id', '2')->first();

							$pbulkoutturn  = NULL;
							$cbulkoutturn  = NULL;

							$cleancoffee = cleancoffee::where('outt_id', $outturn->id)->first();

							// if($pbulkoutturn !== NULL || $cbulkoutturn !==NULL ){
							// 	if($pbulkoutturn === NULL & $cbulkoutturn !==NULL){
							// 		$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $cbulkoutturn->outt_outtgr_id)->first();
							// 	} else {
							// 		$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $pbulkoutturn->outt_outtgr_id)->first();
							// 	}
							// } else {
							// 	$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $cleancoffee->outt_id)->first();
							// }
							// $coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $cleancoffee->id)->first();
							$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $cleancoffee->outt_id)->first();
							$request->session()->flash('alert-success', 'Outturn found!!');
							return View::make('cleanstraight', compact('outturn', 'MillingStatus', 'pbulkoutturn', 'Season', 'growers', 'SaleStatus', 'CoffeeGrade', 'SaleableStatus', 'CoffeeClass', 'ParchmentType', 'cbulkoutturn', 'cleancoffee', 'coffeewarrant'));			
					 
						} else {

							return redirect('cleanstraight')
				                        ->withErrors("Please enter a valid Outturn No, GRN/DMP No. and Season Combination or Create a new Outturn!!")->withInput();
						}
					} else {

						return redirect('cleanstraight')
			                        ->withErrors("Please enter either GRN No. or DMP No. cannot be empty!!")->withInput();
					}
				} else {
					return  redirect('cleanstraight')
		                        ->withErrors("The Season cannot be empty!!")->withInput();						
				}



			} else {
				if ($request->has('season')) {
					return  redirect('cleanstraight')
		                        ->withErrors("The Outturn Number cannot be empty!!")->withInput();	
				} else {
					return  redirect('cleanstraight')
		                        ->withErrors("The Outturn Number and Season cannot be empty!!")->withInput();						
				}
			
			}
    	} else {

	        $this->validate($request, [
	            'outt_number' => 'required', 'outt_grn_number' => 'required', 'parchment' => 'required', 'coffee_grower' => 'required', 'Saleable_Status' => 'required', 'Sale_Status' => 'required', 'season' => 'required', 'grade_kilograms' => 'required', 'coffee_grade' => 'required', 'coffee_class' => 'required', 'outturn_gross_weight' => 'required', 'outt_dmp_number' => 'required',
	        ]);


	        //outturns
			$outt_number = Input::get('outt_number');
			$season = Input::get('season');
			$outt_grn_number = Input::get('outt_grn_number');	
			$coffee_grower = Input::get('coffee_grower'); 
			$parchment = Input::get('parchment'); 
			$outturn_gross_weight = Input::get('outturn_gross_weight');
			$outt_dmp_number = Input::get('outt_dmp_number');

	        //outturn grades
			$grade_kilograms = Input::get('grade_kilograms'); 
			$sample_grade_kilograms = Input::get('sample_grade_kilograms'); 
			$Sale_Status = Input::get('Sale_Status'); 
			$Saleable_Status = Input::get('Saleable_Status'); 
			$coffee_grade = Input::get('coffee_grade');  
			$coffee_class = Input::get('coffee_class'); 

	    	if ($coffee_class == null) {
	    		$coffee_class = 'NULL';
	    	}

			
			$outtgr_remarks = Input::get('outtgr_remarks');

	        //warrants
			$cwar_number = Input::get('cwar_number'); 

			//bulk
			$pboutt_outturn_number = Input::get('pboutt_outturn_number'); 
			$ppercentage = Input::get('ppercentage'); 
			$cboutt_outturn_number = Input::get('cboutt_outturn_number'); 
			$cpercentage = Input::get('cpercentage'); 



			

			$seasonid = Season::where('id',  Input::get('season'))->first();
			$seasonid = $seasonid->csn_season;


			
			// $outturn = outturn_with_names::where('outt_number', Input::get('outt_number'))->first();
			$outturn = outturn_with_names::where('outt_number', '=', $outt_number)->where('csn_season',  $seasonid)->first();

			if (Parchment::where('id', '=', $outturn->id)->exists()) {

				Parchment::where('id', '=', $outturn->id)
							->update(['outt_grn_number' => $outt_grn_number,  'outt_dmp_number' => $outt_dmp_number,'cgr_id' =>  $coffee_grower, 'pty_id'=> $parchment, 'outt_gross_weight'=> $outturn_gross_weight, 'csn_id' => $season]);

						 
			} else {
/*				$outt_bags = $outturn_gross_weight/60;
				Parchment::insert(
				    ['outt_number' => $outt_number, 'outt_grn_number' => $outt_grn_number, 'pty_id' => $parchment, 'cgr_id' => $coffee_grower, 'csn_id' => $season, 'mst_id' => '2', 'outt_gross_weight' => $outt_gross_weight, 'outt_bags' => floor($outt_bags), 'outt_delivery_date' => '0000-00-00']
				);*/
			}
			$bulkid = NULL;
			//bulk insert
/*			if ($request->has('pboutt_outturn_number') || $request->has('cboutt_outturn_number') ) {

				if ($pboutt_outturn_number !== NULL){

					if ($request->has('ppercentage')) {

						$bulkid = bulkoutturn::where('outt_outtgr_id', $outturn->id)->where('boutt_type_id', '1')->first(); 
						if ($bulkid === NULL){
							$bulkid = NULL;
							bulkoutturn::insert(
								['boutt_outturn_number' => $pboutt_outturn_number, 'boutt_type_id' => '1', 'boutt_percentage' =>  $ppercentage,  'outt_outtgr_id' => $outturn->id]
							);

						} else {
							$bulkid = $bulkid->id;
							bulkoutturn::where('id', '=', $bulkid)
								->update(['boutt_outturn_number' => $pboutt_outturn_number, 'boutt_type_id' => '1', 'boutt_percentage' =>  $ppercentage,  'outt_outtgr_id' => $outturn->id]);
						}

					} else {
						return  redirect('cleanstraight')
			                        ->withErrors("Please enter parchment bulk percentage!!")
			                        ->withInput();	
					}					
				} 
				if ($cboutt_outturn_number !== NULL){

					if ($request->has('cpercentage')) {

						$bulkid = bulkoutturn::where('outt_outtgr_id', $outturn->id)->where('boutt_type_id', '2')->first(); 
						if ($bulkid === NULL){
							$bulkid = NULL;
							bulkoutturn::insert(
								['boutt_outturn_number' => $cboutt_outturn_number, 'boutt_type_id' => '2', 'boutt_percentage' =>  $cpercentage,  'outt_outtgr_id' => $outturn->id]
							);

						} else {
							$bulkid = $bulkid->id;
							bulkoutturn::where('id', '=', $bulkid)
								->update(['boutt_outturn_number' => $cboutt_outturn_number, 'boutt_type_id' => '2', 'boutt_percentage' =>  $cpercentage,  'outt_outtgr_id' => $outturn->id]);
						}

					} else {
						return  redirect('cleanstraight')
			                        ->withErrors("Please enter clean bulk percentage!!")
			                        ->withInput();	
					}	

				}				

			}*/



			//warrant insert
			if ($cwar_number !== NULL){
				//warrant type 1 = Straight, 2 = Bulk
				if ($bulkid === NULL){
					$wartyp = 1;
				} else {
					$wartyp = 2;
				}
				if(coffeewarrant::where('cwar_number', '=', $cwar_number)->exists()){
					coffeewarrant::where('cwar_number', '=', $cwar_number)
						->update(['cwar_weight' => $grade_kilograms, 'wartyp_id' => $wartyp, 'boutt_outtgr_id' => $outturn->id]);
				} else {
					coffeewarrant::insert(
						['cwar_weight' => $grade_kilograms, 'cwar_number' => $cwar_number, 'wartyp_id' => $wartyp, 'boutt_outtgr_id' => $outturn->id]
					);					
				}
			}
			//$outturn = outturn_with_names::where('outt_number', '=', $outt_number)->where('csn_season',  $season)->first();

			$warrantid = coffeewarrant::where('cwar_number', '=', $cwar_number)->first();
			if ( $warrantid !== NULL){
				$warrantid = $warrantid->id;
			} else {
				$warrantid = NULL;
			}
			
			$outturdgrade = cleancoffee::where('outt_id', '=', $outturn->id)->where('cgrad_id',  $coffee_grade)->first();

			$outtgr_bags = $grade_kilograms/60;
			$outtgr_packets = $grade_kilograms % 60;

			
			//insert grade
			if ($outturdgrade !== NULL){

				cleancoffee::where('id', '=', $outturdgrade->id)
					->update(['outtgr_sample_weight'=> $sample_grade_kilograms, 'outtgr_net_weight'=> $grade_kilograms, 'outtgr_bags'=> floor($outtgr_bags), 'outtgr_pkts'=> floor($outtgr_packets), 'cgrad_id'=> $coffee_grade, 'outt_id'=> $outturn->id, 'cc_id'=> $coffee_class, 'selst_id'=> $Saleable_Status, 'sst_id'=> $Sale_Status, 'outtgr_remarks'=> $outtgr_remarks, 'cwar_id'=> $warrantid]);	

			} else {
				cleancoffee::insert(
					['outtgr_sample_weight'=> $sample_grade_kilograms, 'outtgr_net_weight'=> $grade_kilograms, 'outtgr_bags'=> floor($outtgr_bags), 'outtgr_pkts'=> floor($outtgr_packets), 'cgrad_id'=> $coffee_grade, 'outt_id'=> $outturn->id, 'cc_id'=> $coffee_class, 'selst_id'=> $Saleable_Status, 'sst_id'=> $Sale_Status, 'outtgr_remarks'=> $outtgr_remarks, 'cwar_id'=> $warrantid]
				);	
			}



			$request->session()->flash('alert-success', 'Clean coffee recorded successfully!');
			return redirect('cleanstraight');			

		}
    }













    public function createCleanForm (Request $request){




		$growers = Growers::all(['id', 'cgr_grower', 'cgr_mark']);

		$ParchmentType = ParchmentType::all(['id', 'pty_name']);

		$SaleStatus = SaleStatus::all(['id', 'sst_name']);
		$CoffeeGrade = CoffeeGrade::orderBy('id', 'asc')->get();
		$SaleableStatus = SaleableStatus::all(['id', 'selst_name']);
		$CoffeeClass = CoffeeClass::all(['id', 'cc_name']);
		$Warehouse = Warehouse::all(['id', 'wr_name']);



		$outturngrades = NULL;

		$bulkoutturn = NULL;


		$pbulkoutturn = NULL;
		$cbulkoutturn = NULL;

		$cleancoffee = NULL;
		$coffeewarrant = NULL;

		$MillingStatus = MillingStatus::all(['id', 'mst_name']);

		$Season = Season::all(['id', 'csn_season']);

		return View::make('cleancoffee', compact('id', 'growers', 'ParchmentType', 'MillingStatus', 'Season', 'SaleStatus', 'CoffeeGrade', 'SaleableStatus', 'CoffeeClass', 'outturngrades', 'bulkoutturn', 'pbulkoutturn', 'cbulkoutturn', 'cleancoffee', 'coffeewarrant', 'Warehouse' ));

    }




    public function cleanCoffeeIntake (Request $request){
    	if (NULL !== Input::get('searchButton') || NULL !== Input::get('nextButton') || NULL !== Input::get('previousButton')){
			if ($request->has('outt_number')) {
				if ($request->has('season') & Input::get('season') !== "Season" ) {
					// if ($request->has('outt_dmp_number')) {
						$pbulkoutturn  = NULL;
						$cbulkoutturn  = NULL;

						$grade = Input::get('coffee_grade');
						$Warehouse = Warehouse::all(['id', 'wr_name']);
						$outturngrades = NULL;
						$outturns  = NULL;
						$pbulkoutturn = NULL;


						$growers = Growers::all(['id', 'cgr_grower', 'cgr_mark']);

						$ParchmentType = ParchmentType::all(['id', 'pty_name']);

						$SaleStatus = SaleStatus::all(['id', 'sst_name']);
						$CoffeeGrade = CoffeeGrade::orderBy('id', 'asc')->get();
						$SaleableStatus = SaleableStatus::all(['id', 'selst_name']);
						$CoffeeClass = CoffeeClass::all(['id', 'cc_name']);
						

						$MillingStatus = MillingStatus::all(['id', 'mst_name']);

						$Season = Season::all(['id', 'csn_season']);


						// $outturnmain = null;

						$outturns = Parchment::where('outt_number', '=', Input::get('outt_number'))->where('csn_id',  Input::get('season'))->first();

						$pbulkoutturn = bulkoutturn::where('boutt_outturn_number', Input::get('outt_number'))->where('boutt_dmp_number', Input::get('outt_dmp_number'))->where('csn_id', Input::get('season'))->first();

						

						// if ($outturn !== NULL){
						// 	$outturnmain = $outturn;
						// } else {
						// 	$outturnmain = $pbulkoutturn;
						// }

						#$season = Season::where('id',  Input::get('season'))->first();
						#$season = $season->csn_season;
						#$outturn = outturn_with_names::where('outt_number', '=', Input::get('outt_number'))->where('csn_season',  $season)->first();
						#$outturn = outturn_with_names::where('outt_number', '=', Input::get('outt_number'))->where('csn_season',  $season)->where('outt_grn_number',  Input::get('outt_grn_number'))->first();
						if ($pbulkoutturn !== NULL) {

							$outturngrades = cleancoffee::where('boutt_id', $pbulkoutturn->id)->orderBy('cgrad_id', 'asc')->get();
							// $pbulkoutturn = bulkoutturn::where('outt_outtgr_id', $outturn->id)->where('boutt_type_id', '1')->first();
							// $cbulkoutturn = bulkoutturn::where('outt_outtgr_id', $outturn->id)->where('boutt_type_id', '2')->first();

							if (NULL !== Input::get('nextButton')){
								$cleancoffee = cleancoffee::where('boutt_id', $pbulkoutturn->id)->where('cgrad_id', '<',$grade)->orderBy('cgrad_id', 'asc')->first();
								if ($cleancoffee === NULL) {
									return redirect('cleancoffee')
					                    ->withErrors("No (more) grades to show!!")->withInput();								
								}
							} else if (NULL !== Input::get('previousButton')){
								$cleancoffee = cleancoffee::where('boutt_id', $pbulkoutturn->id)->where('cgrad_id', '>',$grade)->orderBy('cgrad_id', 'asc')->first();
								if ($cleancoffee === NULL) {
									return redirect('cleancoffee')
					                    ->withErrors("No (more) grades to show!!")->withInput();								
								}								
							} else {
								if ($grade != NULL) {
									$cleancoffee = cleancoffee::where('boutt_id', $pbulkoutturn->id)->where('cgrad_id', $grade)->orderBy('cgrad_id', 'asc')->first();

								} else {
									$cleancoffee = cleancoffee::where('boutt_id', $pbulkoutturn->id)->orderBy('cgrad_id', 'asc')->first();
								}
								
							}

							if ($cleancoffee === NULL && NULL !== Input::get('nextButton') ||  NULL !== Input::get('previousButton')) {
								return redirect('cleancoffee')
				                    ->withErrors("No more grades to show!!")->withInput();								
							}


							$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $pbulkoutturn->outt_outtgr_id)->first();

							//$cleancoffee = cleancoffee::where('outt_id', $outturn->id)->first();

							// if($pbulkoutturn !== NULL || $cbulkoutturn !==NULL ){
							// 	if($pbulkoutturn === NULL & $cbulkoutturn !==NULL){
							// 		$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $cbulkoutturn->outt_outtgr_id)->first();
							// 	} else {
							// 		$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $pbulkoutturn->outt_outtgr_id)->first();
							// 	}
							// } else {
							// 	$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $cleancoffee->outt_id)->first();
							// }
							// $coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $cleancoffee->id)->first();
							//$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $cleancoffee->outt_id)->first();
							$request->session()->flash('alert-success', 'Outturn found!!');
							return View::make('cleancoffee', compact('outturngrades', 'MillingStatus', 'pbulkoutturn', 'Season', 'growers', 'SaleStatus', 'CoffeeGrade', 'SaleableStatus', 'CoffeeClass', 'ParchmentType', 'cbulkoutturn', 'cleancoffee', 'coffeewarrant', 'Warehouse'));			
					 
						} else if ($outturns !== NULL) {


							$outturngrades = cleancoffee::where('outt_id', $outturns->id)->orderBy('cgrad_id', 'asc')->get();
							
							// $pbulkoutturn = bulkoutturn::where('outt_outtgr_id', $outturn->id)->where('boutt_type_id', '1')->first();
							// $cbulkoutturn = bulkoutturn::where('outt_outtgr_id', $outturn->id)->where('boutt_type_id', '2')->first();



							if (NULL !== Input::get('nextButton')){
								$cleancoffee = cleancoffee::where('outt_id', $outturns->id)->where('cgrad_id', '<',$grade)->orderBy('cgrad_id', 'asc')->first();
								if ($cleancoffee === NULL) {
									return redirect('cleancoffee')
					                    ->withErrors("No (more) grades to show!!")->withInput();								
								}
							} else if (NULL !== Input::get('previousButton')){
								$cleancoffee = cleancoffee::where('outt_id', $outturns->id)->where('cgrad_id', '>',$grade)->orderBy('cgrad_id', 'asc')->first();
								if ($cleancoffee === NULL) {
									return redirect('cleancoffee')
					                    ->withErrors("No (more) grades to show!!")->withInput();								
								}								
							} else {

								if ($grade != NULL) {
									$cleancoffee = cleancoffee::where('outt_id', $pbulkoutturn->id)->where('cgrad_id', $grade)->orderBy('cgrad_id', 'asc')->first();

								} else {
									$cleancoffee = cleancoffee::where('outt_id', $outturns->id)->orderBy('cgrad_id', 'asc')->first();
								}

								
							}




							$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $outturns->outt_outtgr_id)->first();


							//$cleancoffee = cleancoffee::where('outt_id', $outturn->id)->first();

							// if($pbulkoutturn !== NULL || $cbulkoutturn !==NULL ){
							// 	if($pbulkoutturn === NULL & $cbulkoutturn !==NULL){
							// 		$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $cbulkoutturn->outt_outtgr_id)->first();
							// 	} else {
							// 		$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $pbulkoutturn->outt_outtgr_id)->first();
							// 	}
							// } else {
							// 	$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $cleancoffee->outt_id)->first();
							// }
							// $coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $cleancoffee->id)->first();
							//$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $cleancoffee->outt_id)->first();
							$request->session()->flash('alert-success', 'Outturn found!!');
							return View::make('cleancoffee', compact('outturngrades', 'MillingStatus', 'pbulkoutturn', 'outturns', 'Season', 'growers', 'SaleStatus', 'CoffeeGrade', 'SaleableStatus', 'CoffeeClass', 'ParchmentType', 'cbulkoutturn', 'cleancoffee', 'coffeewarrant', 'Warehouse'));	


						} else {

							return redirect('cleancoffee')
				                        ->withErrors("Please enter a valid Outturn Number and Season Combination or Create a new Outturn!!")->withInput();
						}
					// } else {

					// 	return redirect('cleancoffee')
			  //                       ->withErrors("The DMP No. cannot be empty!!")->withInput();
					// }
				} else {
					return  redirect('cleancoffee')
		                        ->withErrors("The Season cannot be empty!!")->withInput();						
				}



			} else {
				if ($request->has('season')) {
					return  redirect('cleancoffee')
		                        ->withErrors("The Outturn Number cannot be empty!!")->withInput();	
				} else {
					return  redirect('cleancoffee')
		                        ->withErrors("The Outturn Number and Season cannot be empty!!")->withInput();						
				}
			
			}
    	} else {

	        $this->validate($request, [
	            'outt_number' => 'required', 'season' => 'required', 'grade_kilograms' => 'required', 'coffee_grade' => 'required',
	        ]);


	        //outturns
			$outt_number = Input::get('outt_number');
			$season = Input::get('season');
			$coffee_grade = Input::get('coffee_grade');
			$outtgr_remarks = Input::get('outtgr_remarks');
			$grade_kilograms = Input::get('grade_kilograms'); 
			$warehouse = Input::get('Warehouse'); 





			$pbulkoutturn  = NULL;
			$cbulkoutturn  = NULL;

			$grade = Input::get('coffee_grade');
			
			$outturngrades = NULL;
			$outturns  = NULL;
			$pbulkoutturn = NULL;


			$growers = Growers::all(['id', 'cgr_grower', 'cgr_mark']);

			$ParchmentType = ParchmentType::all(['id', 'pty_name']);

			$SaleStatus = SaleStatus::all(['id', 'sst_name']);
			$CoffeeGrade = CoffeeGrade::orderBy('id', 'asc')->get();
			$SaleableStatus = SaleableStatus::all(['id', 'selst_name']);
			$CoffeeClass = CoffeeClass::all(['id', 'cc_name']);
			
			$coffeewarrant = NULL;
			$MillingStatus = MillingStatus::all(['id', 'mst_name']);

			$Season = Season::all(['id', 'csn_season']);
	        //outturn grades
			$cleancoffee = NULL;
			  
			$outturns = Parchment::where('outt_number', '=', Input::get('outt_number'))->where('csn_id',  Input::get('season'))->first();
			$pbulkoutturn = bulkoutturn::where('boutt_outturn_number', Input::get('outt_number'))->where('boutt_dmp_number', Input::get('outt_dmp_number'))->where('csn_id', Input::get('season'))->first();
			


			
			if ($pbulkoutturn !== NULL) {				
					
				$outturdgrade = cleancoffee::where('boutt_id', '=', $pbulkoutturn->id)->where('cgrad_id',  $coffee_grade)->first();

				$outtgr_bags = $grade_kilograms/60;
				$outtgr_packets = $grade_kilograms % 60;

				
				//insert grade
				if ($outturdgrade !== NULL){

					cleancoffee::where('id', '=', $outturdgrade->id)
						->update(['outtgr_net_weight'=> $grade_kilograms, 'outtgr_bags'=> floor($outtgr_bags), 'outtgr_pkts'=> floor($outtgr_packets), 'cgrad_id'=> $coffee_grade, 'boutt_id'=> $pbulkoutturn->id, 'outtgr_remarks'=> $outtgr_remarks, 'wr_id'=> $warehouse]);


						Activity::log('Updated Grade With '.' outtgr_net_weight '.$grade_kilograms, ' outtgr_bags '.floor($outtgr_bags).' pkts '.floor($outtgr_packets) . ' grade_id '.$coffee_grade.' For boutt_id '.$pbulkoutturn->id.'outtgr_remarks'.$outtgr_remarks. 'warehouse'. $warehouse);


				} else {
					cleancoffee::insert(
						['outtgr_net_weight'=> $grade_kilograms, 'outtgr_bags'=> floor($outtgr_bags), 'outtgr_pkts'=> floor($outtgr_packets), 'cgrad_id'=> $coffee_grade, 'boutt_id'=> $pbulkoutturn->id, 'outtgr_remarks'=> $outtgr_remarks, 'wr_id'=> $warehouse]
					);	
					Activity::log('Added Grade With '.' outtgr_net_weight '.$grade_kilograms. ' outtgr_bags '.floor($outtgr_bags).' pkts '.floor($outtgr_packets) . ' grade_id '.$coffee_grade.' For boutt_id '.$pbulkoutturn->id.'outtgr_remarks'.$outtgr_remarks. 'warehouse'. $warehouse);

				}	
				$outturngrades = cleancoffee::where('boutt_id', $pbulkoutturn->id)->orderBy('cgrad_id', 'asc')->get();	
				$cleancoffee = cleancoffee::where('boutt_id', $pbulkoutturn->id)->where('cgrad_id', '=', $grade)->first();			
			} else if ($outturns !== NULL) {

				$outturdgrade = cleancoffee::where('outt_id', '=', $outturns->id)->where('cgrad_id',  $coffee_grade)->first();
				
				$outtgr_bags = $grade_kilograms/60;
				$outtgr_packets = $grade_kilograms % 60;

	
				Parchment::where('id', '=', $outturns->id)
							->update(['outt_net_weight' => Input::get('net_kilograms')]);							
				//insert grade
				if ($outturdgrade !== NULL){

					cleancoffee::where('id', '=', $outturdgrade->id)
						->update(['outtgr_net_weight'=> $grade_kilograms, 'outtgr_bags'=> floor($outtgr_bags), 'outtgr_pkts'=> floor($outtgr_packets), 'cgrad_id'=> $coffee_grade, 'outt_id'=> $outturns->id, 'outtgr_remarks'=> $outtgr_remarks, 'wr_id'=> $warehouse]);	

						Activity::log('Updated Grade With '.' outtgr_net_weight '.$grade_kilograms. ' outtgr_bags '.floor($outtgr_bags).' pkts '.floor($outtgr_packets) . ' grade_id '.$coffee_grade.' For outt_id '.$outturns->id.'outtgr_remarks'.$outtgr_remarks. 'warehouse'. $warehouse);


				} else {
					cleancoffee::insert(
						['outtgr_net_weight'=> $grade_kilograms, 'outtgr_bags'=> floor($outtgr_bags), 'outtgr_pkts'=> floor($outtgr_packets), 'cgrad_id'=> $coffee_grade, 'outt_id'=> $outturns->id, 'outtgr_remarks'=> $outtgr_remarks, 'wr_id'=> $warehouse]
					);	

					Activity::log('Added Grade With '.' outtgr_net_weight '.$grade_kilograms. ' outtgr_bags '.floor($outtgr_bags).' pkts '.floor($outtgr_packets) . ' grade_id '.$coffee_grade.' For outt_id '.$outturns->id.'outtgr_remarks'.$outtgr_remarks. 'warehouse'. $warehouse);


				}		
				$outturngrades = cleancoffee::where('outt_id', $outturns->id)->orderBy('cgrad_id', 'asc')->get();
				$cleancoffee = cleancoffee::where('outt_id', $outturns->id)->where('cgrad_id', '=', $grade)->first();		

			}  else {

				return redirect('cleancoffee')
			                ->withErrors("Please enter a valid Outturn Number and Season Combination or Create a new Outturn!!")
			                ->withInput();
			}


			$outturns = Parchment::where('outt_number', '=', Input::get('outt_number'))->where('csn_id',  Input::get('season'))->first();
			//bulk insert
/*			if ($request->has('pboutt_outturn_number') || $request->has('cboutt_outturn_number') ) {

				if ($pboutt_outturn_number !== NULL){

					if ($request->has('ppercentage')) {

						$bulkid = bulkoutturn::where('outt_outtgr_id', $outturn->id)->where('boutt_type_id', '1')->first(); 
						if ($bulkid === NULL){
							$bulkid = NULL;
							bulkoutturn::insert(
								['boutt_outturn_number' => $pboutt_outturn_number, 'boutt_type_id' => '1', 'boutt_percentage' =>  $ppercentage,  'outt_outtgr_id' => $outturn->id]
							);

						} else {
							$bulkid = $bulkid->id;
							bulkoutturn::where('id', '=', $bulkid)
								->update(['boutt_outturn_number' => $pboutt_outturn_number, 'boutt_type_id' => '1', 'boutt_percentage' =>  $ppercentage,  'outt_outtgr_id' => $outturn->id]);
						}

					} else {
						return  redirect('cleanstraight')
			                        ->withErrors("Please enter parchment bulk percentage!!")
			                        ->withInput();	
					}					
				} 
				if ($cboutt_outturn_number !== NULL){

					if ($request->has('cpercentage')) {

						$bulkid = bulkoutturn::where('outt_outtgr_id', $outturn->id)->where('boutt_type_id', '2')->first(); 
						if ($bulkid === NULL){
							$bulkid = NULL;
							bulkoutturn::insert(
								['boutt_outturn_number' => $cboutt_outturn_number, 'boutt_type_id' => '2', 'boutt_percentage' =>  $cpercentage,  'outt_outtgr_id' => $outturn->id]
							);

						} else {
							$bulkid = $bulkid->id;
							bulkoutturn::where('id', '=', $bulkid)
								->update(['boutt_outturn_number' => $cboutt_outturn_number, 'boutt_type_id' => '2', 'boutt_percentage' =>  $cpercentage,  'outt_outtgr_id' => $outturn->id]);
						}

					} else {
						return  redirect('cleanstraight')
			                        ->withErrors("Please enter clean bulk percentage!!")
			                        ->withInput();	
					}	

				}				

			}*/




			//warrant insert
/*			if ($cwar_number !== NULL){
				//warrant type 1 = Straight, 2 = Bulk
			
				$wartyp = 2;
				
				if(coffeewarrant::where('cwar_number', '=', $cwar_number)->exists()){
					coffeewarrant::where('cwar_number', '=', $cwar_number)
						->update(['cwar_weight' => $grade_kilograms, 'wartyp_id' => $wartyp, 'boutt_outtgr_id' => $outturn->id]);
				} else {
					coffeewarrant::insert(
						['cwar_weight' => $grade_kilograms, 'cwar_number' => $cwar_number, 'wartyp_id' => $wartyp, 'boutt_outtgr_id' => $outturn->id]
					);					
				}
			}
			//$outturn = outturn_with_names::where('outt_number', '=', $outt_number)->where('csn_season',  $season)->first();

			$warrantid = coffeewarrant::where('cwar_number', '=', $cwar_number)->first();
			if ( $warrantid !== NULL){
				$warrantid = $warrantid->id;
			} else {
				$warrantid = NULL;
			}
			
			$outturdgrade = cleancoffee::where('boutt_id', '=', $pbulkoutturn->id)->where('cgrad_id',  $coffee_grade)->first();

			$outtgr_bags = $grade_kilograms/60;
			$outtgr_packets = $grade_kilograms % 69;

			
			//insert grade
			if ($outturdgrade !== NULL){

				cleancoffee::where('id', '=', $outturdgrade->id)
					->update(['outtgr_sample_weight'=> $sample_grade_kilograms, 'outtgr_net_weight'=> $grade_kilograms, 'outtgr_bags'=> floor($outtgr_bags), 'outtgr_pkts'=> floor($outtgr_packets), 'cgrad_id'=> $coffee_grade, 'boutt_id'=> $pbulkoutturn->id, 'cc_id'=> $coffee_class, 'selst_id'=> $Saleable_Status, 'sst_id'=> $Sale_Status, 'outtgr_remarks'=> $outtgr_remarks, 'cwar_id'=> $warrantid]);	

			} else {
				cleancoffee::insert(
					['outtgr_sample_weight'=> $sample_grade_kilograms, 'outtgr_net_weight'=> $grade_kilograms, 'outtgr_bags'=> floor($outtgr_bags), 'outtgr_pkts'=> floor($outtgr_packets), 'cgrad_id'=> $coffee_grade, 'boutt_id'=> $pbulkoutturn->id, 'cc_id'=> $coffee_class, 'selst_id'=> $Saleable_Status, 'sst_id'=> $Sale_Status, 'outtgr_remarks'=> $outtgr_remarks, 'cwar_id'=> $warrantid]
				);	
			}

*/


			$request->session()->flash('alert-success', 'Clean coffee recorded successfully!');
			return View::make('cleancoffee', compact('outturngrades', 'MillingStatus', 'pbulkoutturn', 'outturns', 'Season', 'growers', 'SaleStatus', 'CoffeeGrade', 'SaleableStatus', 'CoffeeClass', 'ParchmentType', 'cbulkoutturn', 'cleancoffee', 'coffeewarrant', 'Warehouse'));			

		}
    }





public function grades_delete($id)
{   

	$cleancoffee = cleancoffee::findOrFail($id);  

	$cleancoffeed = cleancoffee::where('id', $id)->first();	

	Activity::log('Deleted Grade ID '. $cleancoffeed->cgrad_id. " From = Outturn ID". $cleancoffeed->outt_id);

	if ($cleancoffee) {
    	$cleancoffee->delete();
	}

	
	return redirect('cleancoffee');
	

	//return View::make('booking', compact('outturn', 'MillingStatus', 'Season', 'growers', 'SaleStatus', 'CoffeeGrade', 'SaleableStatus', 'CoffeeClass', 'ParchmentType', 'cbulkoutturn', 'cleancoffee', '	coffeewarrant', 'booking', 'ref_no', 'buyer', 'agent', 'bookingitem'));	
	
}











    public function createCleanIntakeForm (Request $request){




		$growers = Growers::all(['id', 'cgr_grower', 'cgr_mark']);

		$ParchmentType = ParchmentType::all(['id', 'pty_name']);

		$SaleStatus = SaleStatus::all(['id', 'sst_name']);
		$CoffeeGrade = CoffeeGrade::orderBy('id', 'asc')->get();
		$SaleableStatus = SaleableStatus::all(['id', 'selst_name']);
		$CoffeeClass = CoffeeClass::all(['id', 'cc_name']);


		$outturn = NULL;

		$bulkoutturn = NULL;


		$pbulkoutturn = NULL;
		$cbulkoutturn = NULL;

		$cleancoffee = NULL;
		$coffeewarrant = NULL;

		$MillingStatus = MillingStatus::all(['id', 'mst_name']);

		$Season = Season::all(['id', 'csn_season']);

		return View::make('cleantintake', compact('id', 'growers', 'ParchmentType', 'MillingStatus', 'Season', 'SaleStatus', 'CoffeeGrade', 'SaleableStatus', 'CoffeeClass', 'outturn', 'bulkoutturn', 'pbulkoutturn', 'cbulkoutturn', 'cleancoffee', 'coffeewarrant' ));

    }



    public function cleanIntake (Request $request){
    	if (NULL !== Input::get('searchButton')){
			if ($request->has('outt_number')) {
				if ($request->has('season') & Input::get('season') !== "Season" ) {
					$season = Season::where('id',  Input::get('season'))->first();
					$season = $season->csn_season;
					$outturn = outturn_with_names::where('outt_number', '=', Input::get('outt_number'))->where('csn_season',  $season)->first();

					if ($outturn !== NULL) {
						$growers = Growers::all(['id', 'cgr_grower', 'cgr_mark']);

						$ParchmentType = ParchmentType::all(['id', 'pty_name']);

						$SaleStatus = SaleStatus::all(['id', 'sst_name']);
						$CoffeeGrade = CoffeeGrade::orderBy('id', 'asc')->get();
						$SaleableStatus = SaleableStatus::all(['id', 'selst_name']);
						$CoffeeClass = CoffeeClass::all(['id', 'cc_name']);
						

						$MillingStatus = MillingStatus::all(['id', 'mst_name']);

						$Season = Season::all(['id', 'csn_season']);

						$pbulkoutturn = bulkoutturn::where('outt_outtgr_id', $outturn->id)->where('boutt_type_id', '1')->first();
						$cbulkoutturn = bulkoutturn::where('outt_outtgr_id', $outturn->id)->where('boutt_type_id', '2')->first();

						$cleancoffee = cleancoffee::where('outt_id', $outturn->id)->first();

						if($pbulkoutturn !== NULL || $cbulkoutturn !==NULL ){
							if($pbulkoutturn === NULL & $cbulkoutturn !==NULL){
								$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $cbulkoutturn->outt_outtgr_id)->first();
							} else {
								$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $pbulkoutturn->outt_outtgr_id)->first();
							}
						} else {
							$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $cleancoffee->outt_id)->first();
						}
						// $coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $cleancoffee->id)->first();
						
						$request->session()->flash('alert-success', 'Outturn found!!');
						return View::make('cleantintake', compact('outturn', 'MillingStatus', 'pbulkoutturn', 'Season', 'growers', 'SaleStatus', 'CoffeeGrade', 'SaleableStatus', 'CoffeeClass', 'ParchmentType', 'cbulkoutturn', 'cleancoffee', 'coffeewarrant'));			
				 
					} else {

						return redirect('cleantintake')
			                        ->withErrors("Please enter a valid Outturn Number and Season Combination or Create a new Outturn!!")->withInput();
					}
				} else {
					return  redirect('cleantintake')
		                        ->withErrors("The Season cannot be empty!!")->withInput();						
				}



			} else {
				if ($request->has('season')) {
					return  redirect('cleantintake')
		                        ->withErrors("The Outturn Number cannot be empty!!")->withInput();	
				} else {
					return  redirect('cleantintake')
		                        ->withErrors("The Outturn Number and Season cannot be empty!!")->withInput();						
				}
			
			}
    	} else {

	        $this->validate($request, [
	            'outt_number' => 'required', 'outt_grn_number' => 'required', 'parchment' => 'required', 'coffee_grower' => 'required', 'Saleable_Status' => 'required', 'Sale_Status' => 'required', 'season' => 'required', 'grade_kilograms' => 'required', 'coffee_grade' => 'required', 'coffee_class' => 'required', 'outturn_gross_weight' => 'required', 
	        ]);


	        //outturns
			$outt_number = Input::get('outt_number');
			$season = Input::get('season');
			$outt_grn_number = Input::get('outt_grn_number');	
			$coffee_grower = Input::get('coffee_grower'); 
			$parchment = Input::get('parchment'); 
			$outturn_gross_weight = Input::get('outturn_gross_weight'); 

	        //outturn grades
			$grade_kilograms = Input::get('grade_kilograms'); 
			$sample_grade_kilograms = Input::get('sample_grade_kilograms'); 
			$Sale_Status = Input::get('Sale_Status'); 
			$Saleable_Status = Input::get('Saleable_Status'); 
			$coffee_grade = Input::get('coffee_grade');  
			$coffee_class = Input::get('coffee_class'); 
			$outtgr_remarks = Input::get('outtgr_remarks');

	        //warrants
			$cwar_number = Input::get('cwar_number'); 

			//bulk
			$pboutt_outturn_number = Input::get('pboutt_outturn_number'); 
			$ppercentage = Input::get('ppercentage'); 
			$cboutt_outturn_number = Input::get('cboutt_outturn_number'); 
			$cpercentage = Input::get('cpercentage'); 


			

			$seasonid = Season::where('id',  Input::get('season'))->first();
			$seasonid = $seasonid->csn_season;


			
			// $outturn = outturn_with_names::where('outt_number', Input::get('outt_number'))->first();
			$outturn = outturn_with_names::where('outt_number', '=', $outt_number)->where('csn_season',  $seasonid)->first();

			if (Parchment::where('id', '=', $outturn->id)->exists()) {

				Parchment::where('id', '=', $outturn->id)
							->update(['outt_grn_number' => $outt_grn_number,  'cgr_id' =>  $coffee_grower, 'pty_id'=> $parchment, 'outt_gross_weight'=> $outturn_gross_weight, 'csn_id' => $season]);
				Activity::log('Updated Delivery For '.' outt_number '. $outt_number.' outt_grn_number ' .$outt_grn_number. ' delivery_id '. $parchment.' grower_id '.$coffee_grower . ' season_id '. $season, ' milling status_id ' . '2', 'outt_gross_weight'.$outt_gross_weight.'outt_bags'.floor($outt_bags).'outt_delivery_date'.'0000-00-00');
						 
			} else {
				$outt_bags = $outturn_gross_weight/60;
				Parchment::insert(
				    ['outt_number' => $outt_number, 'outt_grn_number' => $outt_grn_number, 'pty_id' => $parchment, 'cgr_id' => $coffee_grower, 'csn_id' => $season, 'mst_id' => '2', 'outt_gross_weight' => $outt_gross_weight, 'outt_bags' => floor($outt_bags), 'outt_delivery_date' => '0000-00-00']
				);

				Activity::log('Added Delivery For '.' outt_number '. $outt_number.' outt_grn_number ' .$outt_grn_number. ' delivery_id '. $parchment.' grower_id '.$coffee_grower . ' season_id '. $season, ' milling status_id ' . '2', 'outt_gross_weight'.$outt_gross_weight.'outt_bags'.floor($outt_bags).'outt_delivery_date'.'0000-00-00');

			}
			$bulkid = NULL;
			//bulk insert
			if ($request->has('pboutt_outturn_number') || $request->has('cboutt_outturn_number') ) {

				if ($pboutt_outturn_number !== NULL){

					if ($request->has('ppercentage')) {

						$bulkid = bulkoutturn::where('outt_outtgr_id', $outturn->id)->where('boutt_type_id', '1')->first(); 
						if ($bulkid === NULL){
							$bulkid = NULL;
							bulkoutturn::insert(
								['boutt_outturn_number' => $pboutt_outturn_number, 'boutt_type_id' => '1', 'boutt_percentage' =>  $ppercentage,  'outt_outtgr_id' => $outturn->id]
							);

						} else {
							$bulkid = $bulkid->id;
							bulkoutturn::where('id', '=', $bulkid)
								->update(['boutt_outturn_number' => $pboutt_outturn_number, 'boutt_type_id' => '1', 'boutt_percentage' =>  $ppercentage,  'outt_outtgr_id' => $outturn->id]);
						}

					} else {
						return  redirect('cleantintake')
			                        ->withErrors("Please enter parchment bulk percentage!!")
			                        ->withInput();	
					}					
				} 
				if ($cboutt_outturn_number !== NULL){

					if ($request->has('cpercentage')) {

						$bulkid = bulkoutturn::where('outt_outtgr_id', $outturn->id)->where('boutt_type_id', '2')->first(); 
						if ($bulkid === NULL){
							$bulkid = NULL;
							bulkoutturn::insert(
								['boutt_outturn_number' => $cboutt_outturn_number, 'boutt_type_id' => '2', 'boutt_percentage' =>  $cpercentage,  'outt_outtgr_id' => $outturn->id]
							);

						} else {
							$bulkid = $bulkid->id;
							bulkoutturn::where('id', '=', $bulkid)
								->update(['boutt_outturn_number' => $cboutt_outturn_number, 'boutt_type_id' => '2', 'boutt_percentage' =>  $cpercentage,  'outt_outtgr_id' => $outturn->id]);
						}

					} else {
						return  redirect('cleantintake')
			                        ->withErrors("Please enter clean bulk percentage!!")
			                        ->withInput();	
					}	

				}				

			}




			//warrant insert
			if ($cwar_number !== NULL){
				//warrant type 1 = Straight, 2 = Bulk
				if ($bulkid === NULL){
					$wartyp = 1;
				} else {
					$wartyp = 2;
				}
				if(coffeewarrant::where('cwar_number', '=', $cwar_number)->exists()){
					coffeewarrant::where('cwar_number', '=', $cwar_number)
						->update(['cwar_weight' => $grade_kilograms, 'wartyp_id' => $wartyp, 'boutt_outtgr_id' => $outturn->id]);
				} else {
					coffeewarrant::insert(
						['cwar_weight' => $grade_kilograms, 'cwar_number' => $cwar_number, 'wartyp_id' => $wartyp, 'boutt_outtgr_id' => $outturn->id]
					);					
				}
			}
			//$outturn = outturn_with_names::where('outt_number', '=', $outt_number)->where('csn_season',  $season)->first();

			$warrantid = coffeewarrant::where('cwar_number', '=', $cwar_number)->first();
			if ( $warrantid !== NULL){
				$warrantid = $warrantid->id;
			} else {
				$warrantid = NULL;
			}
			
			$outturdgrade = cleancoffee::where('outt_id', '=', $outturn->id)->where('cgrad_id',  $coffee_grade)->first();

			$outtgr_bags = $grade_kilograms/60;
			$outtgr_packets = $grade_kilograms % 60;

			
			//insert grade
			if ($outturdgrade !== NULL){

				cleancoffee::where('id', '=', $outturdgrade->id)
					->update(['outtgr_sample_weight'=> $sample_grade_kilograms, 'outtgr_net_weight'=> $grade_kilograms, 'outtgr_bags'=> floor($outtgr_bags), 'outtgr_pkts'=> floor($outtgr_packets), 'cgrad_id'=> $coffee_grade, 'outt_id'=> $outturn->id, 'cc_id'=> $coffee_class, 'selst_id'=> $Saleable_Status, 'sst_id'=> $Sale_Status, 'outtgr_remarks'=> $outtgr_remarks, 'cwar_id'=> $warrantid]);	

			} else {
				cleancoffee::insert(
					['outtgr_sample_weight'=> $sample_grade_kilograms, 'outtgr_net_weight'=> $grade_kilograms, 'outtgr_bags'=> floor($outtgr_bags), 'outtgr_pkts'=> floor($outtgr_packets), 'cgrad_id'=> $coffee_grade, 'outt_id'=> $outturn->id, 'cc_id'=> $coffee_class, 'selst_id'=> $Saleable_Status, 'sst_id'=> $Sale_Status, 'outtgr_remarks'=> $outtgr_remarks, 'cwar_id'=> $warrantid]
				);	
			}



			$request->session()->flash('alert-success', 'Clean coffee recorded successfully!');
			return redirect('cleantintake');			

		}
    }



    public function createCleanSaleForm (Request $request){
		$growers = Growers::all(['id', 'cgr_grower', 'cgr_mark']);

		$buyer = buyer::all(['id', 'cb_name']);
		$growers = Growers::all(['id', 'cgr_grower', 'cgr_mark']);

		$ParchmentType = ParchmentType::all(['id', 'pty_name']);

		$SaleStatus = SaleStatus::all(['id', 'sst_name']);
		$CoffeeGrade = CoffeeGrade::orderBy('id', 'asc')->get();
		$SaleableStatus = SaleableStatus::all(['id', 'selst_name']);
		$CoffeeClass = CoffeeClass::all(['id', 'cc_name']);
		$MillingStatus = MillingStatus::all(['id', 'mst_name']);
		$sale = Sale::all(['id', 'csn_id', 'sl_no', 'sl_date', 'sl_total_weight', 'sl_total_lots', 'sltyp_id']);

		$Season = Season::all(['id', 'csn_season']);

		$outturngrades = NULL;

		$bulkoutturn = NULL;


		$pbulkoutturn = NULL;
		$cbulkoutturn = NULL;

		$cleancoffee = NULL;
		$coffeewarrant = NULL;

		$MillingStatus = MillingStatus::all(['id', 'mst_name']);

		$Season = Season::all(['id', 'csn_season']);

		return View::make('cleansale', compact('id', 'growers', 'ParchmentType', 'MillingStatus', 'Season', 'SaleStatus', 'CoffeeGrade', 'SaleableStatus', 'CoffeeClass', 'outturngrades', 'bulkoutturn', 'pbulkoutturn', 'cbulkoutturn', 'cleancoffee', 'coffeewarrant', 'sale' ));
		



		// return View::make('cleansale', compact('id', 'growers', 'ParchmentType', 'MillingStatus', 'Season', 'buyer'));

    }

    public function cleanSale (Request $request){
    	if (NULL !== Input::get('searchButton')){
			if ($request->has('outt_number')) {
				if ($request->has('outt_season') & Input::get('outt_season') !== "Outturn Season" ) {
					if ($request->has('coffee_grade') ) {
							$pbulkoutturn  = NULL;
							$cbulkoutturn  = NULL;

							$grade = Input::get('coffee_grade');
							
							$outturngrades = NULL;
							$outturns  = NULL;
							$pbulkoutturn = NULL;


							$growers = Growers::all(['id', 'cgr_grower', 'cgr_mark']);

							$ParchmentType = ParchmentType::all(['id', 'pty_name']);

							$SaleStatus = SaleStatus::all(['id', 'sst_name']);
							$CoffeeGrade = CoffeeGrade::orderBy('id', 'asc')->get();
							$SaleableStatus = SaleableStatus::all(['id', 'selst_name']);
							$CoffeeClass = CoffeeClass::all(['id', 'cc_name']);
							

							$MillingStatus = MillingStatus::all(['id', 'mst_name']);

							$Season = Season::all(['id', 'csn_season']);
							$buyer = buyer::all(['id', 'cb_name']);
												

							// $outturnmain = null;
							$sale = Sale::all(['id', 'csn_id', 'sl_no', 'sl_date', 'sl_total_weight', 'sl_total_lots', 'sltyp_id']);

							$outturns = Parchment::where('outt_number', '=', Input::get('outt_number'))->where('csn_id',  Input::get('outt_season'))->first();
							$pbulkoutturn = bulkoutturn::where('boutt_outturn_number', Input::get('outt_number'))->where('csn_id', Input::get('outt_season'))->first();

							

								
							// print_r($pbulkoutturn);
							// if ($outturn !== NULL){
							// 	$outturnmain = $outturn;
							// } else {
							// 	$outturnmain = $pbulkoutturn;
							// }

							#$season = Season::where('id',  Input::get('season'))->first();
							#$season = $season->csn_season;
							#$outturn = outturn_with_names::where('outt_number', '=', Input::get('outt_number'))->where('csn_season',  $season)->first();
							#$outturn = outturn_with_names::where('outt_number', '=', Input::get('outt_number'))->where('csn_season',  $season)->where('outt_grn_number',  Input::get('outt_grn_number'))->first();
							if ($pbulkoutturn !== NULL) {

								if($pbulkoutturn->boutt_type_id === 1){
									$outturngrades = cleancoffee::where('boutt_id', $pbulkoutturn->id)->orderBy('cgrad_id', 'asc')->get();
									// $pbulkoutturn = bulkoutturn::where('outt_outtgr_id', $outturn->id)->where('boutt_type_id', '1')->first();
									// $cbulkoutturn = bulkoutturn::where('outt_outtgr_id', $outturn->id)->where('boutt_type_id', '2')->first();
									$cleancoffee = cleancoffee::where('boutt_id', $pbulkoutturn->id)->where('cgrad_id', '=',$grade)->get();
								} else {
									// DB::table('outturn_grades_outtgr')
									//     ->select(DB::raw('*'), DB::raw('sum(amount) as total'))
									//     ->groupBy(DB::raw('clean_outt_id, cgrad_id') )
									//     ->get();

									$outturngrades = cleancoffee::where('clean_outt_id', $pbulkoutturn->id)->where('boutt_id', '=', NULL)->where('outt_id', '=', NULL)->orderBy('cgrad_id', 'asc')->get();
									// $pbulkoutturn = bulkoutturn::where('outt_outtgr_id', $outturn->id)->where('boutt_type_id', '1')->first();
									// $cbulkoutturn = bulkoutturn::where('outt_outtgr_id', $outturn->id)->where('boutt_type_id', '2')->first();
									$cleancoffee = cleancoffee::where('clean_outt_id', $pbulkoutturn->id)->where('cgrad_id', '=',$grade)->where('boutt_id', '=', NULL)->where('outt_id', '=', NULL)->get();
								}


								// print_r($cleancoffee->id);
								// $cleancoffee = NULL;
								

								// if ($cleancoffee->clean_outt_id != null || $cleancoffee->boutt_id != null){
								// 		return redirect('cleansale')
				    //                     ->withErrors("Outturn is in a bulk!!")->withInput();
							

								// }

								
								if ($cleancoffee === NULL){
									return redirect('cleansale')
				                        ->withErrors("No Such Grade with that Outturn Available to be sold!!")->withInput();
								}



								$saleinfo = NULL;
								$cleancoffeeid = NULL;

								foreach ($cleancoffee as $clean) {
									//$cleancoffee = ($total->outtgr_net_weight)/$sum;
									$saleinfo = saleinfo::where('outtgr_id', $clean->id)->first();

									//print_r($clean->id);

									if ($saleinfo != NULL){
										$cleancoffeeid = $clean->id;
										break;
									}

								}

								if ($cleancoffeeid  != NULL) {
									$cleancoffee = cleancoffee::where('id', $cleancoffeeid)->first();

								} else {
									// $cleancoffee = cleancoffee::where('boutt_id', $pbulkoutturn->id)->where('cgrad_id', '=',$grade)->first();
									if($pbulkoutturn->boutt_type_id === 1){
										$outturngrades = cleancoffee::where('boutt_id', $pbulkoutturn->id)->orderBy('cgrad_id', 'asc')->first();
										$cleancoffee = cleancoffee::where('boutt_id', $pbulkoutturn->id)->where('cgrad_id', '=',$grade)->first();
									} else {
										$outturngrades = cleancoffee::where('clean_outt_id', $pbulkoutturn->id)->where('boutt_id', '=', NULL)->where('outt_id', '=', NULL)->orderBy('cgrad_id', 'asc')->first();
										$cleancoffee = cleancoffee::where('clean_outt_id', $pbulkoutturn->id)->where('cgrad_id', '=',$grade)->where('boutt_id', '=', NULL)->where('outt_id', '=', NULL)->first();
									}


								}

								$saleinfo = saleinfo::where('outtgr_id', $cleancoffee->id)->first();
								$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $cleancoffee->id)->first();

								//print_r($cleancoffee);

								//$cleancoffee = cleancoffee::where('outt_id', $outturn->id)->first();

								// if($pbulkoutturn !== NULL || $cbulkoutturn !==NULL ){
								// 	if($pbulkoutturn === NULL & $cbulkoutturn !==NULL){
								// 		$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $cbulkoutturn->outt_outtgr_id)->first();
								// 	} else {
								// 		$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $pbulkoutturn->outt_outtgr_id)->first();
								// 	}
								// } else {
								// 	$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $cleancoffee->outt_id)->first();
								// }
								// $coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $cleancoffee->id)->first();
								//$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $cleancoffee->outt_id)->first();
								$request->session()->flash('alert-success', 'Outturn found!!');
								return View::make('cleansale', compact('outturngrades', 'MillingStatus','saleinfo', 'buyer', 'pbulkoutturn', 'Season', 'growers', 'SaleStatus', 'CoffeeGrade', 'SaleableStatus', 'CoffeeClass', 'ParchmentType', 'cbulkoutturn', 'cleancoffee', 'coffeewarrant', 'sale'));		
					 
						} else if ($outturns !== NULL) {								

								$outturngrades = cleancoffee::where('outt_id', $outturns->id)->orderBy('cgrad_id', 'asc')->get();
								// $pbulkoutturn = bulkoutturn::where('outt_outtgr_id', $outturn->id)->where('boutt_type_id', '1')->first();
								// $cbulkoutturn = bulkoutturn::where('outt_outtgr_id', $outturn->id)->where('boutt_type_id', '2')->first();

								$cleancoffee = cleancoffee::where('outt_id', $outturns->id)->where('cgrad_id', '=',$grade)->first();

								if ($cleancoffee === NULL){
									return redirect('cleansale')
				                        ->withErrors("No Such Grade with that Outturn Available to be sold!!")->withInput();
								}

								$saleinfo = saleinfo::where('outtgr_id', $cleancoffee->id)->first();
								$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $cleancoffee->id)->first();
								if ($cleancoffee->clean_outt_id != null || $cleancoffee->boutt_id != null){
										return redirect('cleansale')
				                        ->withErrors("Outturn is in a bulk!!")->withInput();
							

								}


								// print_r($cleancoffee->clean_outt_id);

								//$cleancoffee = cleancoffee::where('outt_id', $outturn->id)->first();

								// if($pbulkoutturn !== NULL || $cbulkoutturn !==NULL ){
								// 	if($pbulkoutturn === NULL & $cbulkoutturn !==NULL){
								// 		$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $cbulkoutturn->outt_outtgr_id)->first();
								// 	} else {
								// 		$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $pbulkoutturn->outt_outtgr_id)->first();
								// 	}
								// } else {
								// 	$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $cleancoffee->outt_id)->first();
								// }
								// $coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $cleancoffee->id)->first();
								//$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $cleancoffee->outt_id)->first();
								$request->session()->flash('alert-success', 'Outturn found!!');
								return View::make('cleansale', compact('outturngrades', 'MillingStatus', 'pbulkoutturn','saleinfo', 'buyer',  'outturns', 'Season', 'growers', 'SaleStatus', 'CoffeeGrade', 'SaleableStatus', 'CoffeeClass', 'ParchmentType', 'cbulkoutturn', 'cleancoffee', 'coffeewarrant', 'sale'));	


							} else {

							return redirect('cleansale')
				                        ->withErrors("Please enter a valid Outturn Number and Outturn Season Combination or Create a new Outturn!!")->withInput();
							}
					} else {
						return  redirect('cleansale')
			                        ->withErrors("The Grade cannot be empty!!")->withInput();	
                    }					
				} else {
					return  redirect('cleansale')
		                        ->withErrors("The Outturn Season cannot be empty!!")->withInput();						
				}



			} else {
				if ($request->has('season')) {
					return  redirect('cleansale')
		                        ->withErrors("The Outturn Number cannot be empty!!")->withInput();	
				} else {
					return  redirect('cleansale')
		                        ->withErrors("The Outturn Number and Season cannot be empty!!")->withInput();						
				}
			
			}
    	} else {


    		$cwar_number = Input::get('cwar_number');
    		$grade_kilograms = Input::get('grade_kilograms');
			$sample_grade_kilograms = Input::get('sample_grade_kilograms');
			$Saleable_Status = Input::get('Saleable_Status');
			$Sale_Status = Input::get('Sale_Status');
			$grade = Input::get('coffee_grade');
			$weight_sold = Input::get('weight_sold');

	    	$outt_number = Input::get('outt_number');
	    	$season = Input::get('outt_season');
			$cb_id = Input::get('coffee_buyer');
			$sif_sale_no = Input::get('sif_sale_no');
			$sif_lot = Input::get('sif_lot');
			$sif_rate = Input::get('sif_rate');
			$sif_value = Input::get('sif_value');
			$sale_csn_id = Input::get('sale_season');

			$seasonid = Season::where('id',  Input::get('outt_season'))->first();
			$seasonid = $seasonid->csn_season;

			$outturns = Parchment::where('outt_number', '=', Input::get('outt_number'))->where('csn_id',  Input::get('outt_season'))->first();

			if ($outturns === NULL){
				$outturns = bulkoutturn::where('boutt_outturn_number', Input::get('outt_number'))->where('csn_id', Input::get('outt_season'))->first();
			}
			
            
			if($cleancoffee === NULL){
				if(isset($outturns->boutt_type_id) && $outturns->boutt_type_id == 1){
					$cleancoffee = cleancoffee::where('boutt_id', $outturns->id)->where('cgrad_id', '=',$grade)->first();
				} else if(isset($outturns->boutt_type_id) && $outturns->boutt_type_id == 2){
					$cleancoffee = cleancoffee::where('clean_outt_id', $outturns->id)->where('cgrad_id', '=',$grade)->where('boutt_id', '=', NULL)->where('outt_id', '=', NULL)->first();
				} else {
					$cleancoffee = cleancoffee::where('outt_id', $outturns->id)->where('cgrad_id', '=',$grade)->first();
				}
				
			}
			
			//warrant insert
			if ($cwar_number !== NULL){
				
				if(coffeewarrant::where('boutt_outtgr_id', '=', $cleancoffee->id)->exists()){
					coffeewarrant::where('cwar_number', '=', $cwar_number)
						->update(['cwar_weight' => $grade_kilograms, 'boutt_outtgr_id' => $cleancoffee->id]);
				} else {
					coffeewarrant::insert(
						['cwar_weight' => $grade_kilograms, 'cwar_number' => $cwar_number, 'boutt_outtgr_id' => $cleancoffee->id]
					);					
				}
			}


			cleancoffee::where('id', '=', $cleancoffee->id)
				->update(['outtgr_sample_weight'=> $sample_grade_kilograms, 'selst_id'=> $Saleable_Status, 'sst_id'=> $Sale_Status]);	




			if (saleinfo::where('outtgr_id', '=', $cleancoffee->id)->where('sif_weight_sold', '=', $weight_sold)->exists()) {

				saleinfo::where('outtgr_id', '=', $cleancoffee->id)
							->update(['cb_id' => $cb_id, 'sl_id' => $sif_sale_no, 'sif_lot' => $sif_lot, 'sif_rate' => $sif_rate, 'sif_value' => Input::get('sif_value'), 'csn_id' => $sale_csn_id, 'sif_weight_sold' => $weight_sold]);

				Activity::log('Updated Sale Info For Outturn '.Input::get('outt_number'). " Season = ". $seasonid.' buyer_id '.$cb_id.' sale_id '.$sif_sale_no.' Lot '.$sif_lot.' rate '.$sif_rate.' value '.$sif_value.' sn_id '.$sale_csn_id.' weight_sold '.$weight_sold);
						 
			} else {
				saleinfo::insert(
				    ['outtgr_id' => $cleancoffee->id,  'cb_id' => $cb_id, 'sl_id' => $sif_sale_no, 'sif_lot' => $sif_lot, 'sif_rate' => $sif_rate, 'sif_value' => $sif_value, 'csn_id' => $sale_csn_id, 'sif_weight_sold' => $weight_sold]
				);
				
				Activity::log('Added Sale Info For Outturn '.Input::get('outt_number'). " Season = ". $seasonid.' buyer_id '.$cb_id.' sale_id '.$sif_sale_no.' Lot '.$sif_lot.' rate '.$sif_rate.' value '.$sif_value.' sn_id '.$sale_csn_id.' weight_sold '.$weight_sold);

			}  


			$request->session()->flash('alert-success', 'Sale was updated successfully!!');

			return redirect('cleansale');	

    	}
    }






    public function createParchmentBulkQualityForm (Request $request){
		$outturn_with_names = outturn_with_names::all(['id', 'outt_number', 'csn_season']);
		$CropType = CropType::all(['id', 'ct_name']);
		$Season = Season::all(['id', 'csn_season']);

		$Class = CoffeeClass::all(['id', 'cc_name']);
		$QualityAnalysis = NULL;
		$outturnquality = NULL;



		return View::make('qualityparchmentbulk', compact('id', 'outturn_with_names', 'CropType', 'Class', 'Season', 'outturnquality', 'QualityAnalysis'));

    }



    public function parchmentBulkQuality (Request $request){


    	if (NULL !== Input::get('searchButton')){
			if ($request->has('boutt_outturn_number')) {
				if ($request->has('pbulkseason') & Input::get('pbulkseason') !== "Season" ) {
					// $outt_season = Season::where('id',  Input::get('pbulkseason'))->first();
					// $outt_season = $outt_season->csn_season;
					$outturn = null;

					$pbulkoutturn = bulkoutturn::where('boutt_outturn_number', Input::get('boutt_outturn_number'))->where('csn_id', Input::get('pbulkseason'))->where('boutt_type_id', '1')->first();

					if ($pbulkoutturn !== NULL) {

						$Season = Season::all(['id', 'csn_season']);

						// $saleinfo = saleinfo::where('outt_id', $outturn->id)->first();

						$Class = CoffeeClass::all(['id', 'cc_name']);

						$CropType = CropType::all(['id', 'ct_name']);

						$oqlty_outturn_id = Input::get('boutt_outturn_number');

						//if (OutturnQuality::where('oqlty_outturn_id', '=', $outturn->id)->:where('qtyp_id', '=', '1')->exists()) {
						
						$outturnquality = OutturnQuality::where('oqlty_outturn_id', '=', $pbulkoutturn->id)->where('qtyp_id', '=', '2')->first();

						$oqlty_id = NULL;

						if( $outturnquality!== NULL ){
							$oqlty_id = $outturnquality->id;
						}

						$QualityAnalysis = QualityAnalysis::where('oqlty_id', '=', $oqlty_id)->get(); 
						// $bulkid = bulkoutturn::where('outt_outtgr_id', $pbulkoutturn->id)->where('boutt_type_id', '1')->first(); 
						
						$request->session()->flash('alert-success', 'Outturn found!!');
						return View::make('qualityparchmentbulk', compact('id', 'Season', 'pbulkoutturn', 'Class', 'CropType', 'outturnquality', 'QualityAnalysis'));			
				 
					} else {

						return redirect('qualityparchmentbulk')
			                        ->withErrors("Please enter a valid Outturn Number and Outturn Season Combination or Create a new Outturn!!")->withInput();
					}
				} else {
					return  redirect('qualityparchmentbulk')
		                        ->withErrors("The Outturn Season cannot be empty!!")->withInput();						
				}



			} else {
				if ($request->has('season')) {
					return  redirect('qualityparchmentbulk')
		                        ->withErrors("The Outturn Number cannot be empty!!")->withInput();	
				} else {
					return  redirect('qualityparchmentbulk')
		                        ->withErrors("The Outturn Number and Season cannot be empty!!")->withInput();						
				}
			
			}
    	} else {    	
	        $this->validate($request, [
	            'boutt_outturn_number' => 'required','pbulkseason' => 'required', 'aqr_serial' => 'required', 'moisture' => 'required', 'milling_loss' => 'required', 'crop_type' => 'required',
	        ]);

	        $oqlty_outturn_id = Input::get('boutt_outturn_number');
	    	$oqlty_aqr_serial = strtoupper(Input::get('aqr_serial'));
	    	$oqlty_moisture = Input::get('moisture');
			$oqlty_milling_loss = Input::get('milling_loss');


	        $ct_id = Input::get('crop_type');

	    	$ov_cc_id = Input::get('overall_class');
			$oqlty_remarks = Input::get('remarks');
			$outt_season = Season::where('id',  Input::get('pbulkseason'))->first();
			$outt_season = $outt_season->csn_season;


			$outturn =  bulkoutturn::where('boutt_outturn_number', Input::get('boutt_outturn_number'))->where('csn_id', Input::get('pbulkseason'))->where('boutt_type_id', '1')->first();

			if ($outturn == NULL) {
				return  redirect('qualityparchmentbulk')
		                        ->withErrors("The Outturn doesn't exist, please search it first!!")->withInput();			
			}


			if (OutturnQuality::where('oqlty_aqr_serial', '=', $oqlty_aqr_serial)->exists()) {

					// return redirect('qualityparchment')
		   //                      ->withErrors("AQR Serial Already Exists!!")
		   //                      ->withInput();	
				if (OutturnQuality::where('oqlty_outturn_id', '=', $outturn->id)->exists()) {

					if (OutturnQuality::where('qtyp_id', '=', '2')->exists()) {

						OutturnQuality::where('oqlty_outturn_id', '=', $outturn->id)
							->update([ 'cc_id' => $ov_cc_id, 'ct_id' => $ct_id,  'oqlty_moisture' => $oqlty_moisture,  'oqlty_milling_loss' => $oqlty_milling_loss,  'oqlty_remarks' => $oqlty_remarks,  'oqlty_aqr_serial' => $oqlty_aqr_serial]);	

						$outturnquality = OutturnQuality::where('oqlty_outturn_id', '=', $outturn->id)->where('qtyp_id', '=', '2')->first();

						$oqlty_id = NULL;

						if( $outturnquality->id !== NULL ){
							$oqlty_id = $outturnquality->id;
						}
						QualityAnalysis::where('oqlty_id', '=', $oqlty_id)->where('acat_id', '=', '1')
							->update(
									['qanl_value' => Input::get('SC18p')]
								);
						QualityAnalysis::where('oqlty_id', '=', $oqlty_id)->where('acat_id', '=', '2')
							->update(
									['qanl_value' => Input::get('SC16p')]
								);
						QualityAnalysis::where('oqlty_id', '=', $oqlty_id)->where('acat_id', '=', '3')
							->update(
									['qanl_value' => Input::get('SC14p')]
								);
						QualityAnalysis::where('oqlty_id', '=', $oqlty_id)->where('acat_id', '=', '4')
							->update(
									['qanl_value' => Input::get('THESBp')]
								);
						QualityAnalysis::where('oqlty_id', '=', $oqlty_id)->where('acat_id', '=', '5')
							->update(
									['qanl_value' => Input::get('mbunip')]
								);
						QualityAnalysis::where('oqlty_id', '=', $oqlty_id)->where('acat_id', '=', '6')
							->update(
									['qanl_value' => Input::get('SC18p_cc_id')]
								);
						QualityAnalysis::where('oqlty_id', '=', $oqlty_id)->where('acat_id', '=', '7')
							->update(
									['qanl_value' => Input::get('SC16_cc_id')]
								);
						QualityAnalysis::where('oqlty_id', '=', $oqlty_id)->where('acat_id', '=', '8')
							->update(
									['qanl_value' => Input::get('SC14_cc_id')]
								);
						QualityAnalysis::where('oqlty_id', '=', $oqlty_id)->where('acat_id', '=', '9')
							->update(
									['qanl_value' => Input::get('THESB_cc_id')]
								);
						QualityAnalysis::where('oqlty_id', '=', $oqlty_id)->where('acat_id', '=', '10')
							->update(
									['qanl_value' => Input::get('mbuni_cc_id')]
								);
					Activity::log('Updated Quality Analysis For Bulk '.Input::get('boutt_outturn_number'). " Season ". $outt_season. " Serial = ". $oqlty_aqr_serial. " Class = ". $ov_cc_id.
				' Crop Type '. $ct_id.  'Moisture '.$oqlty_moisture. ' Mlling_loss '.$oqlty_milling_loss.' Remarks '.$oqlty_remarks);
				
				Activity::log('Updated Percentage Quality Analysis For Serial'.  $oqlty_aqr_serial.'  SC18p '.Input::get('SC18p').' SC16p '.Input::get('SC16p').' SC14p '.Input::get('SC14p'). ' THESBp '.Input::get('THESBp').' mbunip '.Input::get('mbunip'));

				Activity::log('Updated Percentage Quality Analysis For Serial'.  $oqlty_aqr_serial.' SC18p_cc '.Input::get('SC18p_cc_id').' SC16_cc '.Input::get('SC16_cc_id').' SC14_cc_id '.Input::get('SC14_cc_id').' THESB_cc '.Input::get('THESB_cc_id').' mbuni_cc '.Input::get('mbuni_cc_id'));
					} 
			 
				}	
		 
			} else {

					$qid = OutturnQuality::insertGetId(
					    ['qtyp_id' => '2',  'oqlty_outturn_id' => $outturn->id,  'cc_id' => $ov_cc_id, 'ct_id' => $ct_id,  'oqlty_moisture' => $oqlty_moisture,  'oqlty_milling_loss' => $oqlty_milling_loss,  'oqlty_remarks' => $oqlty_remarks,  'oqlty_aqr_serial' => $oqlty_aqr_serial]
					);

					QualityAnalysis::insert([
					    ['acat_id' => '1',  'oqlty_id' => $qid, 'qanl_value' => Input::get('SC18p')],
					    ['acat_id' => '2',  'oqlty_id' => $qid, 'qanl_value' => Input::get('SC16p')],
					    ['acat_id' => '3',  'oqlty_id' => $qid, 'qanl_value' => Input::get('SC14p')],
					    ['acat_id' => '4',  'oqlty_id' => $qid, 'qanl_value' => Input::get('THESBp')],
					    ['acat_id' => '5',  'oqlty_id' => $qid, 'qanl_value' => Input::get('mbunip')],
					    ['acat_id' => '6',  'oqlty_id' => $qid, 'qanl_value' => Input::get('SC18p_cc_id')],
					    ['acat_id' => '7',  'oqlty_id' => $qid, 'qanl_value' => Input::get('SC16_cc_id')],
					    ['acat_id' => '8',  'oqlty_id' => $qid, 'qanl_value' => Input::get('SC14_cc_id')],
					    ['acat_id' => '9',  'oqlty_id' => $qid, 'qanl_value' => Input::get('THESB_cc_id')],
					    ['acat_id' => '10',  'oqlty_id' => $qid, 'qanl_value' => Input::get('mbuni_cc_id')]
					]);
					Activity::log('Added Quality Analysis For Bulk '.Input::get('boutt_outturn_number'). " Season ". $outt_season. " Serial = ". $oqlty_aqr_serial. " Class = ". $ov_cc_id.
				' Crop Type '. $ct_id.  'Moisture '.$oqlty_moisture. ' Mlling_loss '.$oqlty_milling_loss.' Remarks '.$oqlty_remarks);
				
				Activity::log('Added Percentage Quality Analysis For Serial'.  $oqlty_aqr_serial.'  SC18p '.Input::get('SC18p').' SC16p '.Input::get('SC16p').' SC14p '.Input::get('SC14p'). ' THESBp '.Input::get('THESBp').' mbunip '.Input::get('mbunip'));

				Activity::log('Added Percentage Quality Analysis For Serial'.  $oqlty_aqr_serial.' SC18p_cc '.Input::get('SC18p_cc_id').' SC16_cc '.Input::get('SC16_cc_id').' SC14_cc_id '.Input::get('SC14_cc_id').' THESB_cc '.Input::get('THESB_cc_id').' mbuni_cc '.Input::get('mbuni_cc_id'));
					
			}




// saleinfo::where('outt_id', '=', $outturn->id)
// 							->update(['cb_id' => $cb_id, 'sif_sale_no' => $sif_sale_no, 'sif_lot' => $sif_lot, 'sif_rate' => $sif_rate, 'sif_value' => $sif_value, 'csn_id' => $sale_csn_id]);







			$request->session()->flash('alert-success', 'Parchment bulk quality was successfully added!');
			return redirect('qualityparchmentbulk');	
		}
    }








    public function createPBulkForm (Request $request){




		$growers = Growers::all(['id', 'cgr_grower', 'cgr_mark']);

		$ParchmentType = ParchmentType::all(['id', 'pty_name']);

		$SaleStatus = SaleStatus::all(['id', 'sst_name']);
		$CoffeeGrade = CoffeeGrade::orderBy('id', 'asc')->get();
		$SaleableStatus = SaleableStatus::all(['id', 'selst_name']);
		$CoffeeClass = CoffeeClass::all(['id', 'cc_name']);


		$outturn = NULL;
		$outturns = NULL;

		$bulkoutturn = NULL;


		$pbulkoutturn = NULL;
		$cbulkoutturn = NULL;

		$cleancoffee = NULL;
		$coffeewarrant = NULL;

		$MillingStatus = MillingStatus::all(['id', 'mst_name']);

		$Season = Season::all(['id', 'csn_season']);

		return View::make('bulkparchment', compact('id', 'outturns', 'growers', 'ParchmentType', 'MillingStatus', 'Season', 'SaleStatus', 'CoffeeGrade', 'SaleableStatus', 'CoffeeClass', 'outturn', 'bulkoutturn', 'pbulkoutturn', 'cbulkoutturn', 'cleancoffee', 'coffeewarrant' ));

    }




    public function PBulk (Request $request){
    	if (NULL !== Input::get('searchButton')){
			if ($request->has('pboutt_outturn_number')) {
				if ($request->has('pbulkseason') & Input::get('pbulkseason') !== "Season" ) {
				
						$pbulkoutturn  = NULL;
						$cbulkoutturn  = NULL;

						$grade = Input::get('coffee_grade');
						
						$outturn = null;


						$pbulkoutturn = bulkoutturn::where('boutt_outturn_number', Input::get('pboutt_outturn_number'))->where('csn_id', Input::get('pbulkseason'))->where('boutt_type_id', '1')->first();

						#$season = Season::where('id',  Input::get('season'))->first();
						#$season = $season->csn_season;
						#$outturn = outturn_with_names::where('outt_number', '=', Input::get('outt_number'))->where('csn_season',  $season)->first();
						#$outturn = outturn_with_names::where('outt_number', '=', Input::get('outt_number'))->where('csn_season',  $season)->where('outt_grn_number',  Input::get('outt_grn_number'))->first();
						if ($pbulkoutturn !== NULL) {
							$growers = Growers::all(['id', 'cgr_grower', 'cgr_mark']);

							$ParchmentType = ParchmentType::all(['id', 'pty_name']);

							$SaleStatus = SaleStatus::all(['id', 'sst_name']);
							$CoffeeGrade = CoffeeGrade::orderBy('id', 'asc')->get();
							$SaleableStatus = SaleableStatus::all(['id', 'selst_name']);
							$CoffeeClass = CoffeeClass::all(['id', 'cc_name']);
							

							$MillingStatus = MillingStatus::all(['id', 'mst_name']);

							$Season = Season::all(['id', 'csn_season']);

							$outturn = outturn_with_names::where('boutt_id', $pbulkoutturn->id)->get();
							$outturns = NULL;
							// $pbulkoutturn = bulkoutturn::where('outt_outtgr_id', $outturn->id)->where('boutt_type_id', '1')->first();
							// $cbulkoutturn = bulkoutturn::where('outt_outtgr_id', $outturn->id)->where('boutt_type_id', '2')->first();

							

							$cleancoffee = NULL;


							// if (NULL !== Input::get('nextButton')){
							// 	$cleancoffee = cleancoffee::where('boutt_id', $pbulkoutturn->id)->where('cgrad_id', '<',$grade)->first();

							// } else if (NULL !== Input::get('previousButton')){
							// 	$cleancoffee = cleancoffee::where('boutt_id', $pbulkoutturn->id)->where('cgrad_id', '>',$grade)->first();
								
							// } else {
							// 	$cleancoffee = cleancoffee::where('boutt_id', $pbulkoutturn->id)->first();
							// }

							// if ($cleancoffee === NULL) {
							// 	return redirect('bulkparchment')
				   //                  ->withErrors("No more grades to show!!")->withInput();								
							// }

							$SeasonName = Season::where('id',  Input::get('pbulkseason'))->first();
							$growersName = Growers::where('id', $coffee_grower)->first();
							
							Activity::log('Searched For Parchment Bulk '. Input::get('pboutt_outturn_number'). " Season ".$SeasonName->csn_season);




							$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $pbulkoutturn->outt_outtgr_id)->first();

							//$cleancoffee = cleancoffee::where('outt_id', $outturn->id)->first();

							// if($pbulkoutturn !== NULL || $cbulkoutturn !==NULL ){
							// 	if($pbulkoutturn === NULL & $cbulkoutturn !==NULL){
							// 		$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $cbulkoutturn->outt_outtgr_id)->first();
							// 	} else {
							// 		$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $pbulkoutturn->outt_outtgr_id)->first();
							// 	}
							// } else {
							// 	$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $cleancoffee->outt_id)->first();
							// }
							// $coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $cleancoffee->id)->first();
							//$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $cleancoffee->outt_id)->first();
							$request->session()->flash('alert-success', 'Parchment Bulk Outturn found!!');
							return View::make('bulkparchment', compact('outturn', 'outturns', 'MillingStatus', 'pbulkoutturn', 'Season', 'growers', 'SaleStatus', 'CoffeeGrade', 'SaleableStatus', 'CoffeeClass', 'ParchmentType', 'cbulkoutturn', 'cleancoffee', 'coffeewarrant'));			
					 
						} else {

							return redirect('bulkparchment')
				                        ->withErrors("Please enter a valid Outturn Number and Season Combination or Create a new Outturn!!")->withInput();
						}
					
				} else {
					return  redirect('bulkparchment')
		                        ->withErrors("The Season cannot be empty!!")->withInput();						
				}



			} else {
				if ($request->has('pbulkseason')) {
					return  redirect('bulkparchment')
		                        ->withErrors("The Outturn Number cannot be empty!!")->withInput();	
				} else {
					return  redirect('bulkparchment')
		                        ->withErrors("The Outturn Number and Season cannot be empty!!")->withInput();						
				}
			
			}
    	} else if (NULL !== Input::get('searchButtonOutturn')) {
    		

			if ($request->has('outt_number') && $request->has('pboutt_outturn_number')) {
				if ($request->has('season') & Input::get('season') !== "Season" && $request->has('pbulkseason') & Input::get('pbulkseason') !== "Season" ) {
				
						$pbulkoutturn  = NULL;
						$cbulkoutturn  = NULL;

						$grade = Input::get('coffee_grade');
						
						$outturn = null;


						$pbulkoutturn = bulkoutturn::where('boutt_outturn_number', Input::get('pboutt_outturn_number'))->where('csn_id', Input::get('pbulkseason'))->where('boutt_type_id', '1')->first();

						$season = Season::where('id',  Input::get('season'))->first();
						$season = $season->csn_season;
						#$outturn = outturn_with_names::where('outt_number', '=', Input::get('outt_number'))->where('csn_season',  $season)->first();
						$outturns = outturn_with_names::where('outt_number', '=', Input::get('outt_number'))->where('csn_season',  $season)->first();

						if ($pbulkoutturn !== NULL && $outturns !== NULL) {
							$growers = Growers::all(['id', 'cgr_grower', 'cgr_mark']);

							$ParchmentType = ParchmentType::all(['id', 'pty_name']);

							$SaleStatus = SaleStatus::all(['id', 'sst_name']);
							$CoffeeGrade = CoffeeGrade::orderBy('id', 'asc')->get();
							$SaleableStatus = SaleableStatus::all(['id', 'selst_name']);
							$CoffeeClass = CoffeeClass::all(['id', 'cc_name']);
							

							$MillingStatus = MillingStatus::all(['id', 'mst_name']);

							$Season = Season::all(['id', 'csn_season']);
							$outturn = outturn_with_names::where('boutt_id', $pbulkoutturn->id)->get();
							// $outturn = outturn_with_names::where('boutt_id', $pbulkoutturn->id)->get();
							// $pbulkoutturn = bulkoutturn::where('outt_outtgr_id', $outturn->id)->where('boutt_type_id', '1')->first();
							// $cbulkoutturn = bulkoutturn::where('outt_outtgr_id', $outturn->id)->where('boutt_type_id', '2')->first();

							

							$cleancoffee = NULL;

/*
							if (NULL !== Input::get('nextButton')){
								$cleancoffee = cleancoffee::where('boutt_id', $pbulkoutturn->id)->where('cgrad_id', '<',$grade)->first();

							} else if (NULL !== Input::get('previousButton')){
								$cleancoffee = cleancoffee::where('boutt_id', $pbulkoutturn->id)->where('cgrad_id', '>',$grade)->first();
								
							} else {
								$cleancoffee = cleancoffee::where('boutt_id', $pbulkoutturn->id)->first();
							}

							if ($cleancoffee === NULL) {
								return redirect('bulkparchment')
				                    ->withErrors("No more grades to show!!")->withInput();								
							}*/






							$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $pbulkoutturn->outt_outtgr_id)->first();

							//$cleancoffee = cleancoffee::where('outt_id', $outturn->id)->first();

							// if($pbulkoutturn !== NULL || $cbulkoutturn !==NULL ){
							// 	if($pbulkoutturn === NULL & $cbulkoutturn !==NULL){
							// 		$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $cbulkoutturn->outt_outtgr_id)->first();
							// 	} else {
							// 		$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $pbulkoutturn->outt_outtgr_id)->first();
							// 	}
							// } else {
							// 	$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $cleancoffee->outt_id)->first();
							// }
							// $coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $cleancoffee->id)->first();
							//$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $cleancoffee->outt_id)->first();
							$request->session()->flash('alert-success', 'Parchment Bulk Outturn found!!');
							return View::make('bulkparchment', compact('outturn','outturns',  'MillingStatus', 'pbulkoutturn', 'Season', 'growers', 'SaleStatus', 'CoffeeGrade', 'SaleableStatus', 'CoffeeClass', 'ParchmentType', 'cbulkoutturn', 'cleancoffee', 'coffeewarrant'));			
					 
						} else {

							return redirect('bulkparchment')
				                        ->withErrors("Please enter a valid PBulk Outturn Number and Season Combination or Create a new Outturn!!")->withInput();
						}
					
				} else {
					return  redirect('bulkparchment')
		                        ->withErrors("The Season cannot be empty!!")->withInput();						
				}



			} else {
				if ($request->has('season')) {
					return  redirect('bulkparchment')
		                        ->withErrors("The Outturn Number cannot be empty!!")->withInput();	
				} else {
					return  redirect('bulkparchment')
		                        ->withErrors("The Outturn Number and Season cannot be empty!!")->withInput();						
				}
			
			}
    	

    	}  else if (NULL !== Input::get('submitPBOutturn')) {

	        $this->validate($request, [
	            'pboutt_outturn_number' => 'required',  'coffee_grower' => 'required', 'pbulkseason' => 'required',
	        ]);


	        //outturns
			$pboutt_outturn_number = strtoupper(Input::get('pboutt_outturn_number'));
			$season = Input::get('pbulkseason');
			$coffee_grower = Input::get('coffee_grower');

			// $coffee_class = Input::get('coffee_class');

			

			//$seasonid = Season::where('id',  Input::get('season'))->first();
			//$seasonid = $seasonid->csn_season;
			
			$pbulkoutturn = bulkoutturn::where('boutt_outturn_number', Input::get('pboutt_outturn_number'))->where('csn_id', Input::get('pbulkseason'))->where('boutt_type_id', '1')->first();
			// $outturn = outturn_with_names::where('outt_number', Input::get('outt_number'))->first();
			//$outturn = outturn_with_names::where('outt_number', '=', $outt_number)->where('csn_season',  $seasonid)->first();
			$SeasonName = Season::where('id',  Input::get('pbulkseason'))->first();
			$growersName = Growers::where('id', $coffee_grower)->first();

			if ($pbulkoutturn !== NULL) {

				bulkoutturn::where('id', '=', $pbulkoutturn->id)
							->update(['boutt_outturn_number' => $pboutt_outturn_number,  'cgr_id' =>  $coffee_grower, 'csn_id'=> $season]);

				
				Activity::log('Updated Parchment Bulk '. $pboutt_outturn_number. " Season ".$SeasonName->csn_season. " For Grower  = ". $growersName->cgr_grower);
			} else {

				bulkoutturn::insert(
				    ['boutt_outturn_number' => $pboutt_outturn_number, 'boutt_type_id' => '1', 'cgr_id' =>  $coffee_grower, 'csn_id'=> $season]
				);

				$SeasonName = Season::where('id',  Input::get('season'))->first();
				Activity::log('Added Parchment Bulk '. $pboutt_outturn_number. " Season ".$SeasonName->csn_season. " For Grower  = ". $growersName->cgr_grower);
			}


			$pbulkoutturn = bulkoutturn::where('boutt_outturn_number', Input::get('pboutt_outturn_number'))->where('csn_id', Input::get('pbulkseason'))->where('boutt_type_id', '1')->first();

			$season = Input::get('pbulkseason');
			#$outturn = outturn_with_names::where('outt_number', '=', Input::get('outt_number'))->where('csn_season',  $season)->first();
			$outturns = outturn_with_names::where('outt_number', '=', Input::get('outt_number'))->where('csn_season',  $season)->first();

			$growers = Growers::all(['id', 'cgr_grower', 'cgr_mark']);

			$ParchmentType = ParchmentType::all(['id', 'pty_name']);

			$SaleStatus = SaleStatus::all(['id', 'sst_name']);
			$CoffeeGrade = CoffeeGrade::orderBy('id', 'asc')->get();
			$SaleableStatus = SaleableStatus::all(['id', 'selst_name']);
			$CoffeeClass = CoffeeClass::all(['id', 'cc_name']);
			

			$MillingStatus = MillingStatus::all(['id', 'mst_name']);

			$Season = Season::all(['id', 'csn_season']);
			$outturn = outturn_with_names::where('boutt_id', $pbulkoutturn->id)->get();
			$cleancoffee = NULL;
			$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $pbulkoutturn->outt_outtgr_id)->first();
			$request->session()->flash('alert-success', 'Parchment Bulk Outturn found!!');
			$request->session()->flash('alert-success', 'Parchment Bulk Created successfully!');

			return View::make('bulkparchment', compact('outturn','outturns',  'MillingStatus', 'pbulkoutturn', 'Season', 'growers', 'SaleStatus', 'CoffeeGrade', 'SaleableStatus', 'CoffeeClass', 'ParchmentType', 'cbulkoutturn', 'cleancoffee', 'coffeewarrant'));


			// $request->session()->flash('alert-success', 'Parchment Bulk Created successfully!');
			// return redirect('bulkparchment');			

	}  else if (NULL !== Input::get('submitOutturn')) {

	        $this->validate($request, [
	            'outt_number' => 'required', 'season' => 'required',
	        ]);


	        //outturns
			$outt_number = strtoupper(Input::get('outt_number'));
			$season = Input::get('season');


			$pboutt_outturn_number = strtoupper(Input::get('pboutt_outturn_number'));
			$season = Input::get('pbulkseason');
			$coffee_grower = Input::get('coffee_grower');
			
			$pbulkoutturn = bulkoutturn::where('boutt_outturn_number', Input::get('pboutt_outturn_number'))->where('csn_id', Input::get('pbulkseason'))->where('boutt_type_id', '1')->first();

			$outturn = Parchment::where('outt_number', '=', $outt_number)->where('csn_id',  Input::get('season'))->first();

			if ($outturn !== NULL) {

				if($outturn->boutt_id === NULL){
					Parchment::where('outt_number', '=', $outt_number)->where('csn_id', '=', Input::get('season'))
								->update(['boutt_id' => $pbulkoutturn->id]);	

					$SeasonName = Season::where('id',  Input::get('season'))->first();
					Activity::log('Added Parchment '. $outt_number. " Season ".$SeasonName->csn_season. " To Parchment Bulk = ". $pbulkoutturn->boutt_outturn_number);

				} else {
					return  redirect('bulkparchment')
		                        ->withErrors("Outturn is already in another bulk.")
		                        ->withInput();	
				}
						 
			} else {

				return  redirect('bulkparchment')
	                        ->withErrors("Outturn doesnt exist.")
	                        ->withInput();	
			}


			// $request->session()->flash('alert-success', 'Parchment Bulk Created successfully!');
			// return redirect('bulkparchment');			



			//update bulk percentages
			$totaloutturn = Parchment::where('boutt_id', '=', $pbulkoutturn->id)->get();
			// print_r($totaloutturn);
			$sum = NULL;
			foreach ($totaloutturn as $total) {
				$sum += $total->outt_gross_weight;		

			}

			foreach ($totaloutturn as $total) {
				$percentage = ($total->outt_gross_weight)/$sum;
				Parchment::where('id', '=', $total->id)
							->update(['outt_bulk_percent' => $percentage]);					
				// echo $total->id;

			}





			$pbulkoutturn = bulkoutturn::where('boutt_outturn_number', Input::get('pboutt_outturn_number'))->where('csn_id', Input::get('pbulkseason'))->where('boutt_type_id', '1')->first();

			$season = Season::where('id',  Input::get('season'))->first();
			$season = $season->csn_season;
			#$outturn = outturn_with_names::where('outt_number', '=', Input::get('outt_number'))->where('csn_season',  $season)->first();
			$outturns = outturn_with_names::where('outt_number', '=', Input::get('outt_number'))->where('csn_season',  $season)->first();

			
			$growers = Growers::all(['id', 'cgr_grower', 'cgr_mark']);

			$ParchmentType = ParchmentType::all(['id', 'pty_name']);

			$SaleStatus = SaleStatus::all(['id', 'sst_name']);
			$CoffeeGrade = CoffeeGrade::orderBy('id', 'asc')->get();
			$SaleableStatus = SaleableStatus::all(['id', 'selst_name']);
			$CoffeeClass = CoffeeClass::all(['id', 'cc_name']);
			

			$MillingStatus = MillingStatus::all(['id', 'mst_name']);

			$Season = Season::all(['id', 'csn_season']);
			$outturn = outturn_with_names::where('boutt_id', $pbulkoutturn->id)->get();

			$cleancoffee = NULL;





			$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $pbulkoutturn->outt_outtgr_id)->first();

			$request->session()->flash('alert-success', 'Outturn added to Parchment Bulk.');
			return View::make('bulkparchment', compact('outturn','outturns',  'MillingStatus', 'pbulkoutturn', 'Season', 'growers', 'SaleStatus', 'CoffeeGrade', 'SaleableStatus', 'CoffeeClass', 'ParchmentType', 'cbulkoutturn', 'cleancoffee', 'coffeewarrant'));		

	}


}



public function parchment_delete($id)
{   
	$pbulkoutturnid = Parchment::where('id', '=', $id)->first();

	$pbulkoutturn = bulkoutturn::where('id', $pbulkoutturnid->boutt_id)->where('boutt_type_id', '1')->first();


	Parchment::where('id', '=', $id)
				->update(['boutt_id' => NULL]);	


	//update bulk percentages
	$totaloutturn = Parchment::where('boutt_id', '=', $pbulkoutturn->id)->get();
	// print_r($totaloutturn);
	$sum = NULL;
	foreach ($totaloutturn as $total) {
		$sum += $total->outt_gross_weight;		

	}

	foreach ($totaloutturn as $total) {
		$percentage = ($total->outt_gross_weight)/$sum;
		Parchment::where('id', '=', $total->id)
					->update(['outt_bulk_percent' => $percentage]);					
		// echo $total->id;

	}

	$SeasonName = Season::where('id',  $pbulkoutturn->csn_id)->first();
	Activity::log('Deleted Parchment '. $pbulkoutturnid->outt_number. " Season ".$SeasonName->csn_season. " From  Parchment Bulk = ". $pbulkoutturn->boutt_outturn_number);

	return redirect('bulkparchment');
	

	//return View::make('booking', compact('outturn', 'MillingStatus', 'Season', 'growers', 'SaleStatus', 'CoffeeGrade', 'SaleableStatus', 'CoffeeClass', 'ParchmentType', 'cbulkoutturn', 'cleancoffee', '	coffeewarrant', 'booking', 'ref_no', 'buyer', 'agent', 'bookingitem'));	
	
}












   public function createCBulkForm (Request $request){




		$growers = Growers::all(['id', 'cgr_grower', 'cgr_mark']);

		$ParchmentType = ParchmentType::all(['id', 'pty_name']);

		$SaleStatus = SaleStatus::all(['id', 'sst_name']);
		$CoffeeGrade = CoffeeGrade::orderBy('id', 'asc')->get();
		$SaleableStatus = SaleableStatus::all(['id', 'selst_name']);
		$CoffeeClass = CoffeeClass::all(['id', 'cc_name']);


		$outturn = NULL;
		$outturns = NULL;

		$bulkoutturn = NULL;


		$pbulkoutturn = NULL;
		$cbulkoutturn = NULL;

		$cleancoffee = NULL;
		$coffeewarrant = NULL;

		$MillingStatus = MillingStatus::all(['id', 'mst_name']);

		$Season = Season::all(['id', 'csn_season']);

		return View::make('bulkclean', compact('id', 'outturns', 'growers', 'ParchmentType', 'MillingStatus', 'Season', 'SaleStatus', 'CoffeeGrade', 'SaleableStatus', 'CoffeeClass', 'outturn', 'bulkoutturn', 'pbulkoutturn', 'cbulkoutturn', 'cleancoffee', 'coffeewarrant' ));

    }




    public function CBulk (Request $request){
    	if (NULL !== Input::get('searchButton')){
			if ($request->has('pboutt_outturn_number')) {
				if ($request->has('pbulkseason') & Input::get('pbulkseason') !== "Season" ) {
				
						$pbulkoutturn  = NULL;
						$cbulkoutturn  = NULL;

						$grade = Input::get('coffee_grade');
						
						$outturn = NULL;
						$outturnbulk = NULL;


						$pbulkoutturn = bulkoutturn::where('boutt_outturn_number', Input::get('pboutt_outturn_number'))->where('csn_id', Input::get('pbulkseason'))->where('boutt_type_id', '2')->first();

						#$season = Season::where('id',  Input::get('season'))->first();
						#$season = $season->csn_season;
						#$outturn = outturn_with_names::where('outt_number', '=', Input::get('outt_number'))->where('csn_season',  $season)->first();
						#$outturn = outturn_with_names::where('outt_number', '=', Input::get('outt_number'))->where('csn_season',  $season)->where('outt_grn_number',  Input::get('outt_grn_number'))->first();
						if ($pbulkoutturn !== NULL) {
							$growers = Growers::all(['id', 'cgr_grower', 'cgr_mark']);

							$ParchmentType = ParchmentType::all(['id', 'pty_name']);

							$SaleStatus = SaleStatus::all(['id', 'sst_name']);
							$CoffeeGrade = CoffeeGrade::orderBy('id', 'asc')->get();
							$SaleableStatus = SaleableStatus::all(['id', 'selst_name']);
							$CoffeeClass = CoffeeClass::all(['id', 'cc_name']);
							

							$MillingStatus = MillingStatus::all(['id', 'mst_name']);

							$Season = Season::all(['id', 'csn_season']);

							

							$outturns = NULL;
							// $pbulkoutturn = bulkoutturn::where('outt_outtgr_id', $outturn->id)->where('boutt_type_id', '1')->first();
							// $cbulkoutturn = bulkoutturn::where('outt_outtgr_id', $outturn->id)->where('boutt_type_id', '2')->first();

							
							$cleancoffee = NULL;


							//$outturn = cleancoffee::where('clean_outt_id', $pbulkoutturn->id)->get();



							$outturn = clean_with_names::where('clean_outt_id', $pbulkoutturn->id)->get();

							//$outturn = clean_with_names::where('clean_outt_id', $pbulkoutturn->id)->where('season', '=',Input::get('pbulkseason'))->get();

							$outturnbulk = NULL;
							//if($cleancoffee === NULL){
								//$cleancoffee = cleancoffee::where('outt_id', $pbulkoutturn->id)->where('cgrad_id', '=',$grade)->get();
							//}


							// if (NULL !== Input::get('nextButton')){
							// 	$cleancoffee = cleancoffee::where('boutt_id', $pbulkoutturn->id)->where('cgrad_id', '<',$grade)->first();

							// } else if (NULL !== Input::get('previousButton')){
							// 	$cleancoffee = cleancoffee::where('boutt_id', $pbulkoutturn->id)->where('cgrad_id', '>',$grade)->first();
								
							// } else {
							// 	$cleancoffee = cleancoffee::where('boutt_id', $pbulkoutturn->id)->first();
							// }

							// if ($cleancoffee === NULL) {
							// 	return redirect('bulkparchment')
				   //                  ->withErrors("No more grades to show!!")->withInput();								
							// }


							$SeasonName = Season::where('id', Input::get('pbulkseason'))->first();

							Activity::log('Searched For Clean Bulk '. Input::get('pboutt_outturn_number')." Season ". $SeasonName->csn_season);


							$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $pbulkoutturn->outt_outtgr_id)->first();

							//$cleancoffee = cleancoffee::where('outt_id', $outturn->id)->first();

							// if($pbulkoutturn !== NULL || $cbulkoutturn !==NULL ){
							// 	if($pbulkoutturn === NULL & $cbulkoutturn !==NULL){
							// 		$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $cbulkoutturn->outt_outtgr_id)->first();
							// 	} else {
							// 		$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $pbulkoutturn->outt_outtgr_id)->first();
							// 	}
							// } else {
							// 	$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $cleancoffee->outt_id)->first();
							// }
							// $coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $cleancoffee->id)->first();
							//$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $cleancoffee->outt_id)->first();
							$request->session()->flash('alert-success', 'Parchment Bulk Outturn found!!');
							return View::make('bulkclean', compact('outturn', 'outturns','outturnbulk', 'MillingStatus', 'pbulkoutturn', 'Season', 'growers', 'SaleStatus', 'CoffeeGrade', 'SaleableStatus', 'CoffeeClass', 'ParchmentType', 'cbulkoutturn', 'cleancoffee', 'coffeewarrant'));			
					 
						} else {

							return redirect('bulkclean')
				                        ->withErrors("Please enter a valid CBulk Outturn Number and Season Combination or Create a new Outturn!!")->withInput();
						}
					
				} else {
					return  redirect('bulkclean')
		                        ->withErrors("The Season cannot be empty!!")->withInput();						
				}



			} else {
				if ($request->has('pbulkseason')) {
					return  redirect('bulkclean')
		                        ->withErrors("The Outturn Number cannot be empty!!")->withInput();	
				} else {
					return  redirect('bulkclean')
		                        ->withErrors("The Outturn Number and Season cannot be empty!!")->withInput();						
				}
			
			}
    	} else if (NULL !== Input::get('searchButtonOutturn')) {
    		

			if ($request->has('outt_number') && $request->has('pboutt_outturn_number')) {
				if ($request->has('season') & Input::get('season') !== "Season" && $request->has('pbulkseason') && Input::get('pbulkseason') !== "Season" && Input::get('coffee_grade') !== "Grade"  && $request->has('coffee_grade')) {
				
						$pbulkoutturn  = NULL;
						$cbulkoutturn  = NULL;

						$grade = Input::get('coffee_grade');
						
						$outturn = null;
						$outturnbulk = NULL;

						$pbulkoutturn = bulkoutturn::where('boutt_outturn_number', Input::get('pboutt_outturn_number'))->where('csn_id', Input::get('pbulkseason'))->where('boutt_type_id', '2')->first();

						$season2 = Season::where('id',  Input::get('season'))->first();
						$season = $season2->csn_season;
						#$outturn = outturn_with_names::where('outt_number', '=', Input::get('outt_number'))->where('csn_season',  $season)->first();
						$outturns = outturn_with_names::where('outt_number', '=', Input::get('outt_number'))->where('csn_season',  $season)->first();



						#$season = Season::where('id',  Input::get('season'))->first();
						#$season = $season->csn_season;

						if ($outturns === NULL){
							$outturns = bulkoutturn::where('boutt_outturn_number', '=', Input::get('outt_number'))->where('csn_id',  $season2->id)->first();
						}

						if ($pbulkoutturn !== NULL && $outturns !== NULL) {
							$growers = Growers::all(['id', 'cgr_grower', 'cgr_mark']);

							$ParchmentType = ParchmentType::all(['id', 'pty_name']);

							$SaleStatus = SaleStatus::all(['id', 'sst_name']);
							$CoffeeGrade = CoffeeGrade::orderBy('id', 'asc')->get();
							$SaleableStatus = SaleableStatus::all(['id', 'selst_name']);
							$CoffeeClass = CoffeeClass::all(['id', 'cc_name']);
							

							$MillingStatus = MillingStatus::all(['id', 'mst_name']);

							$Season = Season::all(['id', 'csn_season']);





							$outturn = clean_with_names::where('clean_outt_id', $pbulkoutturn->id)->get();



							$outturnbulk = NULL;



							// $outturn = outturn_with_names::where('boutt_id', $pbulkoutturn->id)->get();
							// $pbulkoutturn = bulkoutturn::where('outt_outtgr_id', $outturn->id)->where('boutt_type_id', '1')->first();
							// $cbulkoutturn = bulkoutturn::where('outt_outtgr_id', $outturn->id)->where('boutt_type_id', '2')->first();

							
							$cleancoffee = cleancoffee::where('boutt_id', $outturns->id)->where('cgrad_id', '=',$grade)->first();



							if($cleancoffee === NULL){
								$cleancoffee = cleancoffee::where('outt_id', $outturns->id)->where('cgrad_id', '=',$grade)->first();
							}

							#pri
/*
							if (NULL !== Input::get('nextButton')){
								$cleancoffee = cleancoffee::where('boutt_id', $pbulkoutturn->id)->where('cgrad_id', '<',$grade)->first();

							} else if (NULL !== Input::get('previousButton')){
								$cleancoffee = cleancoffee::where('boutt_id', $pbulkoutturn->id)->where('cgrad_id', '>',$grade)->first();
								
							} else {
								$cleancoffee = cleancoffee::where('boutt_id', $pbulkoutturn->id)->first();
							}

							if ($cleancoffee === NULL) {
								return redirect('bulkparchment')
				                    ->withErrors("No more grades to show!!")->withInput();								
							}*/






							$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $pbulkoutturn->outt_outtgr_id)->first();

							//$cleancoffee = cleancoffee::where('outt_id', $outturn->id)->first();

							// if($pbulkoutturn !== NULL || $cbulkoutturn !==NULL ){
							// 	if($pbulkoutturn === NULL & $cbulkoutturn !==NULL){
							// 		$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $cbulkoutturn->outt_outtgr_id)->first();
							// 	} else {
							// 		$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $pbulkoutturn->outt_outtgr_id)->first();
							// 	}
							// } else {
							// 	$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $cleancoffee->outt_id)->first();
							// }
							// $coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $cleancoffee->id)->first();
							//$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $cleancoffee->outt_id)->first();
							$request->session()->flash('alert-success', 'Parchment Bulk Outturn found!!');
							return View::make('bulkclean', compact('outturn','outturns', 'outturnbulk', 'MillingStatus', 'pbulkoutturn', 'Season', 'growers', 'SaleStatus', 'CoffeeGrade', 'SaleableStatus', 'CoffeeClass', 'ParchmentType', 'cbulkoutturn', 'cleancoffee', 'coffeewarrant'));			
					 
						} else {

							return redirect('bulkclean')
				                       ->withErrors("Please enter a valid Outturn Number, Season and Grade Combination or Create a new Outturn Grade!!")->withInput();
						}
					
				} else {
					return  redirect('bulkclean')
		                        ->withErrors("The Season or/and Grade cannot be empty!!")->withInput();						
				}



			} else {
				if ($request->has('season')) {
					return  redirect('bulkclean')
		                        ->withErrors("The Outturn Number cannot be empty!!")->withInput();	
				} else {
					return  redirect('bulkclean')
		                        ->withErrors("The Outturn Number and Season cannot be empty!!")->withInput();						
				}
			
			}
    	

    	}  else if (NULL !== Input::get('submitPBOutturn')) {

	        $this->validate($request, [
	            'pboutt_outturn_number' => 'required',  'coffee_grower' => 'required', 'pbulkseason' => 'required',
	        ]);


	        //outturns
			$pboutt_outturn_number = strtoupper(Input::get('pboutt_outturn_number'));
			$season = Input::get('pbulkseason');
			$coffee_grower = Input::get('coffee_grower');

			// $coffee_class = Input::get('coffee_class');

			

			//$seasonid = Season::where('id',  Input::get('season'))->first();
			//$seasonid = $seasonid->csn_season;


		










			
			$pbulkoutturn = bulkoutturn::where('boutt_outturn_number', Input::get('pboutt_outturn_number'))->where('csn_id', Input::get('pbulkseason'))->where('boutt_type_id', '2')->first();
			// $outturn = outturn_with_names::where('outt_number', Input::get('outt_number'))->first();
			//$outturn = outturn_with_names::where('outt_number', '=', $outt_number)->where('csn_season',  $seasonid)->first();
			$growers = Growers::where('id', $coffee_grower)->first();
			$SeasonName = Season::where('id', $season)->first();

			if ($pbulkoutturn !== NULL) {

				bulkoutturn::where('id', '=', $pbulkoutturn->id)
							->update(['boutt_outturn_number' => $pboutt_outturn_number,  'cgr_id' =>  $coffee_grower, 'csn_id'=> $season]);

				Activity::log('Updated Clean Bulk '. $pboutt_outturn_number. " For Grower = ". $growers->cgr_grower. " Season ". $SeasonName->csn_season);
						 
			} else {

				bulkoutturn::insert(
				    ['boutt_outturn_number' => $pboutt_outturn_number, 'boutt_type_id' => '2', 'cgr_id' =>  $coffee_grower, 'csn_id'=> $season]
				);
				Activity::log('Added Clean Bulk '. $pboutt_outturn_number. " For Grower = ". $growers->cgr_grower. " Season ". $SeasonName->csn_season);
			}


			$request->session()->flash('alert-success', 'Parchment Bulk Created successfully!');



			$pbulkoutturn  = NULL;
			$cbulkoutturn  = NULL;

			// $grade = Input::get('coffee_grade');
			
			$outturn = NULL;
			$outturnbulk = NULL;


			$pbulkoutturn = bulkoutturn::where('boutt_outturn_number', Input::get('pboutt_outturn_number'))->where('csn_id', Input::get('pbulkseason'))->where('boutt_type_id', '2')->first();

			$growers = Growers::all(['id', 'cgr_grower', 'cgr_mark']);

			$ParchmentType = ParchmentType::all(['id', 'pty_name']);

			$SaleStatus = SaleStatus::all(['id', 'sst_name']);
			$CoffeeGrade = CoffeeGrade::orderBy('id', 'asc')->get();
			$SaleableStatus = SaleableStatus::all(['id', 'selst_name']);
			$CoffeeClass = CoffeeClass::all(['id', 'cc_name']);
			

			$MillingStatus = MillingStatus::all(['id', 'mst_name']);

			$Season = Season::all(['id', 'csn_season']);
			
			$outturns = NULL;

			$cleancoffee = NULL;

			$outturn = clean_with_names::where('clean_outt_id', $pbulkoutturn->id)->get();

			$outturnbulk = NULL;
			$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $pbulkoutturn->outt_outtgr_id)->first();
			// $request->session()->flash('alert-success', 'Parchment Bulk Outturn found!!');
			return View::make('bulkclean', compact('outturn', 'outturns','outturnbulk', 'MillingStatus', 'pbulkoutturn', 'Season', 'growers', 'SaleStatus', 'CoffeeGrade', 'SaleableStatus', 'CoffeeClass', 'ParchmentType', 'cbulkoutturn', 'cleancoffee', 'coffeewarrant'));	
			// return redirect('bulkclean');			

	}  else if (NULL !== Input::get('submitOutturn')) {

	        $this->validate($request, [
	            'outt_number' => 'required', 'season' => 'required',  'coffee_grade' => 'required',
	        ]);


	        //outturns
			$outt_number = strtoupper(Input::get('outt_number'));
			$season = Input::get('season');


			$pboutt_outturn_number = strtoupper(Input::get('pboutt_outturn_number'));
			$season = Input::get('pbulkseason');
			$coffee_grower = Input::get('coffee_grower');
			$grade = Input::get('coffee_grade');

			// $coffee_class = Input::get('coffee_class');

			

			//$seasonid = Season::where('id',  Input::get('season'))->first();
			//$seasonid = $seasonid->csn_season;


		










			
			$pbulkoutturn = bulkoutturn::where('boutt_outturn_number', Input::get('pboutt_outturn_number'))->where('csn_id', Input::get('pbulkseason'))->where('boutt_type_id', '2')->first();
			// $coffee_class = Input::get('coffee_class');

			

			//$seasonid = Season::where('id',  Input::get('season'))->first();
			//$seasonid = $seasonid->csn_season;


			
			// $pbulkoutturn = bulkoutturn::where('boutt_outturn_number', Input::get('pboutt_outturn_number'))->where('csn_id', Input::get('pbulkseason'))->where('boutt_type_id', '1')->first();
			// $outturn = outturn_with_names::where('outt_number', Input::get('outt_number'))->first();


			$outturn = Parchment::where('outt_number', '=', $outt_number)->where('csn_id',  Input::get('season'))->first();

			$poutturn = bulkoutturn::where('boutt_outturn_number', '=', $outt_number)->where('csn_id',  Input::get('season'))->first();




							// $cleancoffee = cleancoffee::where('boutt_id', $outturns->id)->where('cgrad_id', '=',$grade)->first();



							// if($cleancoffee === NULL){
							// 	$cleancoffee = cleancoffee::where('outt_id', $outturns->id)->where('cgrad_id', '=',$grade)->first();
							// }			


			// echo $sum;
// cleancoffee::where('clean_outt_id', $poutturn->id)->where('cgrad_id', '=',$grade)
// 							   >update(['boutt_clean_id' => $pbulkoutturn->id]);

			if ($outturn !== NULL || $poutturn !==NULL) {
				$cleancoffee = NULL;
				#$cleancoffee = cleancoffee::where('clean_outt_id', $poutturn->id)->where('cgrad_id', '=',$grade)->first();
				if($poutturn !==NULL){
					$cleancoffee = cleancoffee::where('boutt_id', $poutturn->id)->where('cgrad_id', '=',$grade)->first();
				} else {
					$cleancoffee = cleancoffee::where('outt_id', $outturn->id)->where('cgrad_id', '=',$grade)->first();
				}
				// $cleancoffee = cleancoffee::where('outt_id', $outturn->id)->where('cgrad_id', '=',$grade)->first();

				// if($cleancoffee === NULL){
				// 	$cleancoffee = cleancoffee::where('boutt_id', $poutturn->id)->where('cgrad_id', '=',$grade)->first();
				// }	
					

				if($cleancoffee->clean_outt_id === NULL){

					//$cleancoffee = cleancoffee::where('outt_id', $outturn->id)->where('cgrad_id', '=',$grade)->first();

					cleancoffee::where('id', $cleancoffee->id)
							   ->update(['clean_outt_id' => $pbulkoutturn->id]);


				    //clean grade



					// Parchment::where('outt_number', '=', $outt_number)->where('csn_id', '=', $season)
					// 			->update(['boutt_id' => $pbulkoutturn->id]);	


					//update bulk percentages
					$totaloutturn = cleancoffee::where('clean_outt_id', '=', $pbulkoutturn->id)->get();
					$sum = NULL;
					$sumbags = NULL;
					$sumpkts = NULL;
	
					// print_r($totaloutturn->boutt_id. " Outturn". $totaloutturn->outt_id);

					
						// print_r($totaloutturn);
						foreach ($totaloutturn as $total) {
							if($total->boutt_id != null || $total->outt_id != null ){
							$sum += $total->outtgr_net_weight;		
							$sumbags += $total->outtgr_bags;
							$sumpkts += $total->outtgr_pkts;
						}
						}



						// foreach ($totaloutturnbulk as $total) {
						// 	$sum += $total->boutt_clean_gross_weight;		

						// }

						// foreach ($totaloutturnbulk as $total) {
						// 	$percentage = NULL;
						// 	if ($sum !== NULL){
						// 		$percentage = ($total->boutt_clean_gross_weight)/$sum;
						// 	}
						// 	bulkoutturn::where('id', '=', $total->id)
						// 				->update(['boutt_clean_bulk_percent' => $percentage]);					
						// 	// echo $total->id;
						// }

						foreach ($totaloutturn as $total) {
							if($total->boutt_id != null || $total->outt_id != null ){
							$percentage = ($total->outtgr_net_weight)/$sum;
							cleancoffee::where('id', '=', $total->id)
										->update(['outtgr_bulk_percentage' => $percentage]);	
							}				
							// echo $total->id;

						}	
					
					//$totaloutturn
					//->orWhere('boutt_id', '!=', NULL)->orWhere('outt_id', '!=', NULL)
					

					//$totaloutturn = Parchment::where('boutt_id', '=', $pbulkoutturn->id)->get();

					//$totaloutturnbulk = bulkoutturn::where('boutt_clean_id', '=', $pbulkoutturn->id)->get();

					// print_r($totaloutturn);
	


					$cleangrade = cleancoffee::where('clean_outt_id', '=', $pbulkoutturn->id)->where('boutt_id', '=', NULL)->where('outt_id', '=', NULL)->first();
					// print_r($cleangrade);
					if ($cleangrade === NULL){
						cleancoffee::insert(
							['outtgr_net_weight'=> $sum, 'outtgr_bags'=> floor($sumbags), 'outtgr_pkts'=> floor($sumpkts), 'cgrad_id'=> $grade, 'clean_outt_id'=> $pbulkoutturn->id, 'outtgr_remarks'=> $outtgr_remarks]
								);						
					} else {
						cleancoffee::where('clean_outt_id', '=', $pbulkoutturn->id)->where('boutt_id', '=', NULL)->where('outt_id', '=', NULL)
						->update(['outtgr_net_weight'=> $sum, 'outtgr_bags'=> floor($sumbags), 'outtgr_pkts'=> floor($sumpkts), 'cgrad_id'=> $grade, 'outtgr_remarks'=> $outtgr_remarks]);
					}


					$SeasonName = Season::where('id', Input::get('season'))->first();
					$CoffeeGrade = CoffeeGrade::where('id', $grade)->first();
					Activity::log('Added Outturn '. $outturn ->outt_number.$poutturn->boutt_outturn_number. " Season ". $SeasonName->csn_season." Grade = ". $CoffeeGrade->cgrad_name. " To Clean Bulk ". $pbulkoutturn->boutt_outturn_number);
					// Activity::log('Deleted Outturn '. $outturn ->outt_number.$poutturn->boutt_outturn_number. " Grade = ". $CoffeeGrade->cgrad_name. " From ". $pbulkoutturn->boutt_outturn_number);


				} else {
					// print_r($cleancoffee);
					return  redirect('bulkclean')
		                        ->withErrors("Outturn grade is already in another bulk.")
		                        ->withInput();	
				}
						 
			} else {

				return  redirect('bulkclean')
	                        ->withErrors("Outturn grade doesnt exist.")
	                        ->withInput();	
			}


			// $request->session()->flash('alert-success', 'Parchment Bulk Created successfully!');
			// return redirect('bulkparchment');			






			$outturnbulk = NULL;


			$pbulkoutturn = bulkoutturn::where('boutt_outturn_number', Input::get('pboutt_outturn_number'))->where('csn_id', Input::get('pbulkseason'))->where('boutt_type_id', '2')->first();

			$season = Season::where('id',  Input::get('season'))->first();
			$season = $season->csn_season;
			#$outturn = outturn_with_names::where('outt_number', '=', Input::get('outt_number'))->where('csn_season',  $season)->first();
			$outturns = outturn_with_names::where('outt_number', '=', Input::get('outt_number'))->where('csn_season',  $season)->first();

			
			$growers = Growers::all(['id', 'cgr_grower', 'cgr_mark']);

			$ParchmentType = ParchmentType::all(['id', 'pty_name']);

			$SaleStatus = SaleStatus::all(['id', 'sst_name']);
			$CoffeeGrade = CoffeeGrade::orderBy('id', 'asc')->get();
			$SaleableStatus = SaleableStatus::all(['id', 'selst_name']);
			$CoffeeClass = CoffeeClass::all(['id', 'cc_name']);
			

			$MillingStatus = MillingStatus::all(['id', 'mst_name']);

			$Season = Season::all(['id', 'csn_season']);

			$outturn = clean_with_names::where('clean_outt_id', $pbulkoutturn->id)->get();



			$outturnbulk = NULL;

			$cleancoffee = NULL;





			$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $pbulkoutturn->outt_outtgr_id)->first();

			$request->session()->flash('alert-success', 'Outturn added to Clean Bulk.');
			return View::make('bulkclean', compact('outturn','outturns', 'outturnbulk', 'MillingStatus', 'pbulkoutturn', 'Season', 'growers', 'SaleStatus', 'CoffeeGrade', 'SaleableStatus', 'CoffeeClass', 'ParchmentType', 'cbulkoutturn', 'cleancoffee', 'coffeewarrant'));		

	}


}


public function clean_delete($id)
{   

	// print_r($id);
	$cleancoffee = cleancoffee::where('id', $id)->first();


	$outturn = Parchment::where('id', '=', $cleancoffee->outt_id)->first();

	$poutturn = bulkoutturn::where('id', '=', $cleancoffee->boutt_id)->first();



	if ($outturn !== NULL || $poutturn !==NULL) {

		// $cleancoffee = NULL;
	// 	#$cleancoffee = cleancoffee::where('clean_outt_id', $poutturn->id)->where('cgrad_id', '=',$grade)->first();
		// if($poutturn !==NULL){
		// 	$cleancoffee = cleancoffee::where('boutt_id', $poutturn->id)->where('cgrad_id', '=',$grade)->first();
		// } else {
		// 	$cleancoffee = cleancoffee::where('outt_id', $outturn->id)->where('cgrad_id', '=',$grade)->first();
		// }

		if($cleancoffee->clean_outt_id != NULL){
			// print_r($cleancoffee);

	// 		//$cleancoffee = cleancoffee::where('outt_id', $outturn->id)->where('cgrad_id', '=',$grade)->first();

			cleancoffee::where('id', $cleancoffee->id)
					   ->update(['clean_outt_id' => NULL]);
	//    		//update bulk percentages

		    $pbulkoutturn = bulkoutturn::where('id', $cleancoffee->clean_outt_id )->first();

			$totaloutturn = cleancoffee::where('clean_outt_id', '=', $pbulkoutturn->id)->get();

			$sum = NULL;
			foreach ($totaloutturn as $total) {
				$sum += $total->outtgr_net_weight;		

			}
			foreach ($totaloutturn as $total) {
				$percentage = ($total->outtgr_net_weight)/$sum;
				cleancoffee::where('id', '=', $total->id)
							->update(['outtgr_bulk_percentage' => $percentage]);					
				// echo $total->id;
			}
		}
	}

	$CoffeeGrade = CoffeeGrade::where('id', $cleancoffee->cgrad_id )->first();

	//$totaloutturn = cleancoffee::where('clean_outt_id', '=', $pbulkoutturn->id)->first();
	$SeasonName = NULL;
	if($outturn !== NULL){
		$SeasonName = Season::where('id', $outturn->csn_id)->first();
	} else {
		$SeasonName = Season::where('id', $poutturn->csn_id)->first();
	}


	

	Activity::log('Deleted Outturn '. $outturn ->outt_number.$poutturn->boutt_outturn_number. " Season ". $SeasonName->csn_season." Grade = ". $CoffeeGrade->cgrad_name. " From Clean Bulk ". $pbulkoutturn->boutt_outturn_number);

	return redirect('bulkclean');
	//return View::make('booking', compact('outturn', 'MillingStatus', 'Season', 'growers', 'SaleStatus', 'CoffeeGrade', 'SaleableStatus', 'CoffeeClass', 'ParchmentType', 'cbulkoutturn', 'cleancoffee', '	coffeewarrant', 'booking', 'ref_no', 'buyer', 'agent', 'bookingitem'));	
	
}


    public function createSaleForm (Request $request){
    	$SaleType = SaleType::all(['id','sltyp_name']);


		$growers = Growers::all(['id', 'cgr_grower', 'cgr_mark']);

		$buyer = buyer::all(['id', 'cb_name']);
		$growers = Growers::all(['id', 'cgr_grower', 'cgr_mark']);

		$ParchmentType = ParchmentType::all(['id', 'pty_name']);

		$SaleStatus = SaleStatus::all(['id', 'sst_name']);
		$CoffeeGrade = CoffeeGrade::orderBy('id', 'asc')->get();
		$SaleableStatus = SaleableStatus::all(['id', 'selst_name']);
		$CoffeeClass = CoffeeClass::all(['id', 'cc_name']);
		$MillingStatus = MillingStatus::all(['id', 'mst_name']);

		$Season = Season::all(['id', 'csn_season']);

		$outturngrades = NULL;

		$bulkoutturn = NULL;


		$pbulkoutturn = NULL;
		$cbulkoutturn = NULL;

		$cleancoffee = NULL;
		$coffeewarrant = NULL;

		$MillingStatus = MillingStatus::all(['id', 'mst_name']);

		$Season = Season::all(['id', 'csn_season']);

		return View::make('cleancreatesale', compact('id', 'growers', 'ParchmentType', 'MillingStatus', 'Season', 'SaleStatus', 'CoffeeGrade', 'SaleableStatus', 'CoffeeClass', 'outturngrades', 'bulkoutturn', 'pbulkoutturn', 'cbulkoutturn', 'cleancoffee', 'coffeewarrant', 'SaleType' ));
		



		// return View::make('cleansale', compact('id', 'growers', 'ParchmentType', 'MillingStatus', 'Season', 'buyer'));

    }

    public function cleancreatesale (Request $request){
    	if (NULL !== Input::get('searchButton')){
			if ($request->has('sl_no')) {
				if ($request->has('sale_season') & Input::get('sale_season') !== "Sale Season" ) {
					
							$pbulkoutturn  = NULL;
							$cbulkoutturn  = NULL;

							$grade = Input::get('coffee_grade');
							
							$outturngrades = NULL;
							$outturns  = NULL;
							$pbulkoutturn = NULL;


							$growers = Growers::all(['id', 'cgr_grower', 'cgr_mark']);

							$ParchmentType = ParchmentType::all(['id', 'pty_name']);

							$SaleStatus = SaleStatus::all(['id', 'sst_name']);
							$CoffeeGrade = CoffeeGrade::orderBy('id', 'asc')->get();
							$SaleableStatus = SaleableStatus::all(['id', 'selst_name']);
							$CoffeeClass = CoffeeClass::all(['id', 'cc_name']);
							

							$MillingStatus = MillingStatus::all(['id', 'mst_name']);

							$Season = Season::all(['id', 'csn_season']);
							$buyer = buyer::all(['id', 'cb_name']);
												

							// $outturnmain = null;

							$outturns = Parchment::where('outt_number', '=', Input::get('outt_number'))->where('csn_id',  Input::get('outt_season'))->first();
							$pbulkoutturn = bulkoutturn::where('boutt_outturn_number', Input::get('outt_number'))->where('csn_id', Input::get('outt_season'))->first();


							$sale = Sale::where('sl_no', '=', Input::get('sl_no'))->where('csn_id',  Input::get('sale_season'))->first();

								
							// print_r($pbulkoutturn);
							// if ($outturn !== NULL){
							// 	$outturnmain = $outturn;
							// } else {
							// 	$outturnmain = $pbulkoutturn;
							// }

							#$season = Season::where('id',  Input::get('season'))->first();
							#$season = $season->csn_season;
							#$outturn = outturn_with_names::where('outt_number', '=', Input::get('outt_number'))->where('csn_season',  $season)->first();
							#$outturn = outturn_with_names::where('outt_number', '=', Input::get('outt_number'))->where('csn_season',  $season)->where('outt_grn_number',  Input::get('outt_grn_number'))->first();
							if ($sale !== NULL) {

								$outturngrades = NULL;
								// $pbulkoutturn = bulkoutturn::where('outt_outtgr_id', $outturn->id)->where('boutt_type_id', '1')->first();
								// $cbulkoutturn = bulkoutturn::where('outt_outtgr_id', $outturn->id)->where('boutt_type_id', '2')->first();
								$cleancoffee = NULL;

								// print_r($cleancoffee);
								// $cleancoffee = NULL;
								
								$saleinfo = NULL;
								$coffeewarrant = NULL;
								$SaleType = SaleType::all(['id','sltyp_name']);


								//$cleancoffee = cleancoffee::where('outt_id', $outturn->id)->first();

								// if($pbulkoutturn !== NULL || $cbulkoutturn !==NULL ){
								// 	if($pbulkoutturn === NULL & $cbulkoutturn !==NULL){
								// 		$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $cbulkoutturn->outt_outtgr_id)->first();
								// 	} else {
								// 		$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $pbulkoutturn->outt_outtgr_id)->first();
								// 	}
								// } else {
								// 	$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $cleancoffee->outt_id)->first();
								// }
								// $coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $cleancoffee->id)->first();
								//$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $cleancoffee->outt_id)->first();

								Activity::log('Searched for Sale '.Input::get('sl_no'). " Season = ". Input::get('sale_season'));

								$request->session()->flash('alert-success', 'Outturn found!!');
								return View::make('cleancreatesale', compact('outturngrades', 'MillingStatus','saleinfo', 'buyer', 'pbulkoutturn', 'Season', 'growers', 'SaleStatus', 'CoffeeGrade', 'SaleableStatus', 'CoffeeClass', 'ParchmentType', 'cbulkoutturn', 'cleancoffee', 'coffeewarrant', 'SaleType','sale'));		
					 
						} else {

							return redirect('cleancreatesale')
				                        ->withErrors("Please enter a valid Sale Number and Sale Season Combination or Create a new Sale!!")->withInput();
						}				
				} else {
					return  redirect('cleancreatesale')
		                        ->withErrors("The Sale Season cannot be empty!!")->withInput();						
				}



			} else {
				if ($request->has('season')) {
					return  redirect('cleancreatesale')
		                        ->withErrors("The Sale Number cannot be empty!!")->withInput();	
				} else {
					return  redirect('cleancreatesale')
		                        ->withErrors("The Sale Number and Season cannot be empty!!")->withInput();						
				}
			
			}
    	} else {



			

			$sl_no = Input::get('sl_no');
			$sale_season = Input::get('sale_season');
			$sale_type = Input::get('sale_type');
			$date = Input::get('date');
			$total_weight = Input::get('total_weight');
			$total_lots = Input::get('total_lots');
	    	$date=date_create($date);
			$date = date_format($date,"Y-m-d");	


			$sale = Sale::where('sl_no', '=', Input::get('sl_no'))->where('csn_id',  Input::get('sale_season'))->first();

			['id', 'csn_id', 'sl_no', 'sl_date', 'sl_total_weight', 'sl_total_lots', 'sltyp_id'];

			if ($sale !== NULL){
				Sale::where('sl_no', '=', $sl_no)->where('csn_id', '=', $sale_season)
							->update(['sl_date' => $date, 'sl_total_weight' => $total_weight, 'sl_total_lots' => $total_lots, 'sltyp_id' => $sale_type]);
				Activity::log('Updated Sale '.$sl_no. " Season = ". $sale_season. " Weight Sold = ". $total_weight. " Lots = ". $total_lots. " Sale Type = ". $sale_type. " Sale Date = ". $date);

			} else {
				Sale::insert(
					['sl_no' => $sl_no, 'csn_id' =>  $sale_season, 'sl_date' => $date, 'sl_total_weight' => $total_weight, 'sl_total_lots' => $total_lots, 'sltyp_id' => $sale_type]);

				Activity::log('Added Sale '.$sl_no. " Season = ". $sale_season. " Weight Sold = ". $total_weight. " Lots = ". $total_lots. " Sale Type = ". $sale_type. " Sale Date = ". $date);


			}


            



			//$outturn = outturn_with_names::where('outt_number', '=', $outt_number)->where('csn_season',  $season)->first();

			// $outturdgrade = cleancoffee::where('boutt_id', '=', $pbulkoutturn->id)->where('cgrad_id',  $coffee_grade)->first();

			// $outtgr_bags = $grade_kilograms/60;
			// $outtgr_packets = $grade_kilograms % 69;

		





			// $outturn = outturn_with_names::where('outt_number', '=', $outt_number)->where('csn_season',  $seasonid)->first();


			$request->session()->flash('alert-success', 'Sale was updated successfully!!');
			return redirect('cleancreatesale');	
    	}
    }

   public function createBookingForm (Request $request){




		$growers = Growers::all(['id', 'cgr_grower', 'cgr_mark', 'cgr_organization']);

		$ref_no = booking_with_names::orderBy('previous_no', 'asc')->pluck('previous_no');
		if(count($ref_no)>0){
			foreach ($ref_no as $ref) {
				$ref_no = $ref;
			}		
		}
		else{
			$ref_no = 0;
		}

		$ref_no = "NKG-".sprintf("%07d", ($ref_no + 0000001));


		// print_r("NKG-".$ref_no);

		//all(['ref_no', 'previous_no', 'cgr_grower', 'cgr_code', 'cgr_mark', 'delivery_date']);

		//$ParchmentType = ParchmentType::all(['id', 'pty_name']);

#Sianzi.Mimi#
		$ParchmentType = ParchmentType::where('id', '!=', '7')->get();

		$SaleStatus = SaleStatus::all(['id', 'sst_name']);
		$CoffeeGrade = CoffeeGrade::orderBy('id', 'asc')->get();
		//$SaleableStatus = SaleableStatus::all(['id', 'selst_name']);
		//$CoffeeClass = CoffeeClass::all(['id', 'cc_name']);

		$buyer = buyer::all(['id', 'cb_name']);
		$agent = agent::all(['id', 'agt_name']);
						// print_r($agent."Lewis");



		$outturn = NULL;
		$outturns = NULL;

		$bulkoutturn = NULL;


		$pbulkoutturn = NULL;
		$cbulkoutturn = NULL;

		$cleancoffee = NULL;
		$coffeewarrant = NULL;

		//$MillingStatus = MillingStatus::all(['id', 'mst_name']);

		$Season = Season::all(['id', 'csn_season']);

		return View::make('booking', compact('id', 'outturns', 'growers', 'ParchmentType', 'MillingStatus', 'Season', 'SaleStatus', 'CoffeeGrade', 'SaleableStatus', 'CoffeeClass', 'outturn', 'bulkoutturn', 'pbulkoutturn', 'cbulkoutturn', 'cleancoffee', 'coffeewarrant', 'ref_no', 'buyer', 'agent'));

    }



    public function booking (Request $request){
    	if (NULL !== Input::get('searchButton')){
			if ($request->has('ref') && Input::get('ref') !== "Ref No..." ) {
				
						$buyer = NULL;
						$agent = agent::all(['id', 'agt_name']);


						$pbulkoutturn  = NULL;
						$cbulkoutturn  = NULL;

						$grade = Input::get('coffee_grade');
						
						$outturn = null;
						$ref_no = NULL;

						$ref_no = Input::get('ref');

						$booking = booking_with_names::where('ref_no', $ref_no )->first();
						$bookingitem = booking_items_with_names::where('bkgid', $booking->id)->get();


						$pbulkoutturn = NULL;

						if ($booking !== NULL) {
							// $growers = Growers::all(['id', 'cgr_grower', 'cgr_mark']);
							$growers = Growers::all(['id', 'cgr_grower', 'cgr_mark', 'cgr_organization']);

							$ParchmentType = ParchmentType::all(['id', 'pty_name']);
							$ParchmentType = ParchmentType::where('id', '!=', '7')->get();

							$SaleStatus = SaleStatus::all(['id', 'sst_name']);
							$CoffeeGrade = CoffeeGrade::orderBy('id', 'asc')->get();
							$SaleableStatus = SaleableStatus::all(['id', 'selst_name']);
							$CoffeeClass = CoffeeClass::all(['id', 'cc_name']);
							

							$MillingStatus = MillingStatus::all(['id', 'mst_name']);

							$Season = Season::all(['id', 'csn_season']);

							// $outturn = outturn_with_names::where('boutt_id', $pbulkoutturn->id)->get();
							$outturns = NULL;
							// $pbulkoutturn = bulkoutturn::where('outt_outtgr_id', $outturn->id)->where('boutt_type_id', '1')->first();
							// $cbulkoutturn = bulkoutturn::where('outt_outtgr_id', $outturn->id)->where('boutt_type_id', '2')->first();

							

							$cleancoffee = NULL;


							// if (NULL !== Input::get('nextButton')){
							// 	$cleancoffee = cleancoffee::where('boutt_id', $pbulkoutturn->id)->where('cgrad_id', '<',$grade)->first();

							// } else if (NULL !== Input::get('previousButton')){
							// 	$cleancoffee = cleancoffee::where('boutt_id', $pbulkoutturn->id)->where('cgrad_id', '>',$grade)->first();
								
							// } else {
							// 	$cleancoffee = cleancoffee::where('boutt_id', $pbulkoutturn->id)->first();
							// }

							// if ($cleancoffee === NULL) {
							// 	return redirect('bulkparchment')
				   //                  ->withErrors("No more grades to show!!")->withInput();								
							// }






							$coffeewarrant = NULL;

							//$cleancoffee = cleancoffee::where('outt_id', $outturn->id)->first();

							// if($pbulkoutturn !== NULL || $cbulkoutturn !==NULL ){
							// 	if($pbulkoutturn === NULL & $cbulkoutturn !==NULL){
							// 		$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $cbulkoutturn->outt_outtgr_id)->first();
							// 	} else {
							// 		$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $pbulkoutturn->outt_outtgr_id)->first();
							// 	}
							// } else {
							// 	$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $cleancoffee->outt_id)->first();
							// }
							// $coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $cleancoffee->id)->first();
							//$coffeewarrant = coffeewarrant::where('boutt_outtgr_id', $cleancoffee->outt_id)->first();

							$request->session()->flash('alert-success', 'Booking found!!');



							$grower = Growers::where('id', $booking->cgr_id)->first();

							$agents = agent::where('id', $booking->agt_id)->first();

							$coffee_grower = $grower->cgr_grower;

							$coffee_agent = $agents->agt_name;

							Activity::log('Searched for Booking '.$booking->ref_no. " Agent = ". $booking->agt_name. " Grower = ". $booking->cgr_grower. " Delivery Date = ". $booking->delivery_date);

							return View::make('booking', compact('outturn', 'outturns', 'MillingStatus', 'pbulkoutturn', 'Season', 'growers', 'SaleStatus', 'CoffeeGrade', 'SaleableStatus', 'CoffeeClass', 'ParchmentType', 'cbulkoutturn', 'cleancoffee', 'coffeewarrant', 'booking', 'ref_no', 'buyer', 'agent', 'bookingitem'));			
					 
						} else {

							return redirect('booking')
				                        ->withErrors("Please enter a valid Reference Number!!")->withInput();
						}
					
				
			} else {
				return  redirect('booking')
	                        ->withErrors("The Reference Number cannot be empty!!")->withInput();						
				
			
			}
    	

    	}  else if (NULL !== Input::get('submitPBOutturn')) {

	        $this->validate($request, [
	            'ref' => 'required',  'date' => 'required', 'coffee_grower' => 'required', 'coffee_agent' => 'required',
	        ]);

	        $pbulkoutturn = NULL;

	        $agent = agent::all(['id', 'agt_name']);
	        // $growers = Growers::all(['id', 'cgr_grower', 'cgr_mark']);
	        $growers = Growers::all(['id', 'cgr_grower', 'cgr_mark', 'cgr_organization']);
	        $ParchmentType = ParchmentType::all(['id', 'pty_name']);
	        $ParchmentType = ParchmentType::where('id', '!=', '7')->get();

	        $ref_no = strtoupper(Input::get('ref'));

	        $date = Input::get('date');
	        $date=date_create($date);
	        $date = date_format($date,"Y-m-d");

	        $coffee_grower = Input::get('coffee_grower');
	        $coffee_agent = Input::get('coffee_agent');


	        $booking = booking_with_names::where('ref_no', $ref_no )->first();

			if ($booking !== NULL) {

				booking::where('bkg_ref_no', '=', $booking->ref_no)
							->update(['agt_id' => $coffee_agent,  'cgr_id' =>  $coffee_grower, 'bkg_delivery_date'=> $date]);
				$request->session()->flash('alert-success', 'Booking Updated successfully!');

				$grower = Growers::where('id', $coffee_grower)->first();

				$agents = agent::where('id', $coffee_agent)->first();

				$coffee_grower = $grower->cgr_grower;

				$coffee_agent = $agents->agt_name;

    			Activity::log('Updated Booking '.$booking->ref_no. " Agent = ". $coffee_agent. " Grower = ". $coffee_grower. " Delivery Date = ". $date);

						 
			} else {

				booking::insert(
				    ['bkg_ref_no' => $ref_no, 'agt_id' => $coffee_agent, 'cgr_id' =>  $coffee_grower, 'bkg_delivery_date'=> $date]
				);
				$request->session()->flash('alert-success', 'Booking Created successfully!');

				$grower = Growers::where('id', $coffee_grower)->first();

				$agents = agent::where('id', $coffee_agent)->first();

				$coffee_grower = $grower->cgr_grower;

				$coffee_agent = $agents->agt_name;

				Activity::log('Added Booking '.$booking->ref_no. " Agent = ". $coffee_agent. " Grower = ". $coffee_grower. " Delivery Date = ". $date);
			}


			$booking = booking_with_names::where('ref_no', $ref_no )->first();
			$bookingitem = booking_items_with_names::where('bkgid', $booking->id)->get();

			return View::make('booking', compact('outturn', 'MillingStatus', 'Season', 'growers', 'SaleStatus', 'CoffeeGrade', 'SaleableStatus', 'CoffeeClass', 'ParchmentType', 'cbulkoutturn', 'cleancoffee', '	coffeewarrant', 'booking', 'ref_no', 'buyer', 'agent', 'bookingitem'));			

	}  else if (NULL !== Input::get('printbutton')) {
			$this->validate($request, [
	            'ref' => 'required',  'date' => 'required', 'coffee_grower' => 'required', 'coffee_agent' => 'required',
	        ]);
			$ref_no = strtoupper(Input::get('ref'));	
			$date = Input::get('date');



			$date2 = Input::get('date');
			$date2=date_create($date2);

			//$validdate = $date2->modify('friday');
			//print_r($date2->modify('next monday'));
			//echo date_format($validdate,"d D M Y");;
			//$date2 = date_format($date2,"d M Y");

			//$date2=date($date2);
			//$validdate = strtotime($date2);
			//$date2 =  date('D d M Y', $date2) ;  

			//$date = strtotime($date);
			$date=date_create($date);
	        $date = date_format($date,"d D M Y");


			//$date =  date('D d M Y', $date) ;

	        // date('D d M Y', $date)
			$coffee_grower = Input::get('coffee_grower');
	        $coffee_agent = Input::get('coffee_agent');

	        $booking = booking_with_names::where('ref_no', $ref_no )->first();
			$bookingitem = booking_items_with_names::where('bkgid', $booking->id)->get();


			$growers = Growers::where('id', $coffee_grower)->first();

			$coffee_grower = $growers->cgr_grower;
			$code = $growers->cgr_code;

			$agent = agent::where('id', $coffee_agent)->first();
			$coffee_agent = $agent->agt_name;			

			date_default_timezone_set('Africa/Nairobi');
			$timezone = date_default_timezone_get();

			$currentdate =  date('D d M Y') ;  
			$currentdatetime =  date('D d M, Y H:i') ; 
			#echo $currentdate;
			#$pdf->smileyface = ob_get_clean(); 

		    //$pdf = PDF::loadHTML('<h1>Test</h1>', $data);
			// echo '<br>'.$currentdate ;
			Activity::log('Printed Booking '.$booking->ref_no. " Agent = ". $coffee_agent. " Grower = ". $coffee_grower. " Delivery Date = ". $date);
		    $pdf = PDF::loadView('pdf.booking', compact('ref_no', 'date', 'coffee_grower', 'coffee_agent', 'bookingitem', 'currentdate', 'currentdatetime', 'code', 'date2'));
		    #$pdf->showImageErrors = true;

		    return $pdf->stream($ref_no.' booking.pdf');

	}  else if (NULL !== Input::get('deletebutton')) {
		$itemID = Input::get('itemId');

		echo $itemID;

	} else if (NULL !== Input::get('submitOutturn')) {

	        $this->validate($request, [
	            'delivery' => 'required', 'bags' => 'required',
	        ]);


	        $agent = agent::all(['id', 'agt_name']);
	        // $growers = Growers::all(['id', 'cgr_grower', 'cgr_mark']);
	        $growers = Growers::all(['id', 'cgr_grower', 'cgr_mark', 'cgr_organization']);
	        
	        $ParchmentType = ParchmentType::all(['id', 'pty_name']);
	        $ParchmentType = ParchmentType::where('id', '!=', '7')->get();

	        $ref_no = strtoupper(Input::get('ref'));	        
	        $booking = booking_with_names::where('ref_no', $ref_no )->first();

	        $delivery = Input::get('delivery');
	        $bags = Input::get('bags');


	        $deliveryid = ParchmentType::where('id', $delivery)->first();

	        $booking = booking_with_names::where('ref_no', $ref_no )->first();
	        $bookingitem = booking_items::where('bkg_id', $booking->id)->where('pty_id', $delivery)->first();

			
			if ($bookingitem !== NULL) {

				booking_items::where('id', '=', $bookingitem->id)
							->update(['bki_bags' => $bags]);
				$request->session()->flash('alert-success', 'Booking item Updated successfully!');

				Activity::log('Updated Booking Item for Booking '. $ref_no. " Delivery = ". $deliveryid->pty_name. " Bags = ". $bags);
						 
			} else {

				booking_items::insert(
				    ['bkg_id' => $booking->id,'pty_id' => $delivery, 'bki_bags' => $bags]
				);
				$request->session()->flash('alert-success', 'Booking item Created successfully!');

				Activity::log('Added Booking Item for Booking '. $ref_no. " Delivery = ". $deliveryid->pty_name. " Bags = ". $bags);
			}

			$bookingitem = booking_items_with_names::where('bkgid', $booking->id)->get();

			return View::make('booking', compact('outturn', 'MillingStatus', 'Season', 'growers', 'SaleStatus', 'CoffeeGrade', 'SaleableStatus', 'CoffeeClass', 'ParchmentType', 'cbulkoutturn', 'cleancoffee', '	coffeewarrant', 'booking', 'ref_no', 'buyer', 'agent', 'bookingitem'));	

	}


}

public function booking_delete($id)
{   
	//booking_items::where('id', '=', $id)->delete();
	//$request->session()->flash('alert-success', 'Booking item Updated successfully!');
	// echo $id;


	$bookingitem = booking_items::where('id', $id)->first();

	$booking = booking_with_names::where('id', $bookingitem->bkg_id)->first();


	$deliveryid = ParchmentType::where('id', $bookingitem->pty_id)->first();


	Activity::log('Deleted Booking Item for Booking '. $booking->ref_no. " Delivery = ". $deliveryid->pty_name. " Bags = ". $bookingitem->bki_bags);

	$booking_items = booking_items::findOrFail($id);  
	if ($booking_items) {
    	$booking_items->delete();
	}

	// $booking_items->destroy($id);  
	//$booking_items->delete();

    $agent = agent::all(['id', 'agt_name']);
    $growers = Growers::all(['id', 'cgr_grower', 'cgr_mark']);


    $ParchmentType = ParchmentType::all(['id', 'pty_name']);

    $ref_no = strtoupper(Input::get('ref'));	        
    $booking = booking_with_names::where('ref_no', $ref_no )->first();

    $delivery = Input::get('delivery');
    $bags = Input::get('bags');


    $deliveryid = ParchmentType::where('id', $delivery)->first();

    $booking = booking_with_names::where('ref_no', $ref_no )->first();
    $bookingitem = booking_items::where('bkg_id', $booking->id)->where('pty_id', $delivery)->first();

	
	$bookingitem = booking_items_with_names::where('bkgid', $booking->id)->get();



	return redirect('booking');
	

	//return View::make('booking', compact('outturn', 'MillingStatus', 'Season', 'growers', 'SaleStatus', 'CoffeeGrade', 'SaleableStatus', 'CoffeeClass', 'ParchmentType', 'cbulkoutturn', 'cleancoffee', '	coffeewarrant', 'booking', 'ref_no', 'buyer', 'agent', 'bookingitem'));	
	
}
}

