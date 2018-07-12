<?php namespace Ngea\Http\Controllers;

use Input;
use confirm;
use DB;
use ask;
use Illuminate\Http\Request;
use Ngea\Http\Controllers\Controller;
use View;
use Auth;

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


//use PDF;
use PDF;
use Activity;
use Excel;
// use Anouar\Fpdf\Fpdf as Fpdf;

use Ngea\country;
use Yajra\Datatables\Datatables;

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
use Ngea\direct_sale;
use Ngea\quality_parameters;
use Ngea\processing;
use Ngea\screens;
use Ngea\cupscore;
use Ngea\rawscore;
use Ngea\sale_lots;
use Ngea\quality_details;
use Ngea\QualityType;
use Ngea\greencomments;
use Ngea\StockViewALL;
use Ngea\BasketAuto;

use delete;


class DirectQualityController extends Controller {


    public function qualityForm (Request $request){
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

    	// $processing = processing::all(['id', 'prcss_name']);
    	$processing = processing::where('prcss_auction', '1')->get();
    	$screens = screens::all(['id', 'scr_name']);

    	$cupscore = cupscore::all(['id', 'cp_score', 'cp_quality']);
    	$rawscore = rawscore::all(['id', 'rw_score', 'rw_quality']);

    	return View::make('directqualitydetails', compact('id', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'largest', 'greensize', 'greencolor', 'greendefects', 'processing', 'cupscore', 'rawscore', 'screens'));

    }

    public function addQualityDetails (Request $request){
    	$id = NULL;

    	$Warehouse = NULL;
    	$Mill = NULL;
    	$direct_sale_lots = NULL;


    	$greensize = quality_parameters::where('qg_id', '1')->get();
    	$greencolor = quality_parameters::where('qg_id', '2')->get();
    	$greendefects = quality_parameters::where('qg_id', '3')->get();
    	// $processing = processing::all(['id', 'prcss_name']);
    	$processing = processing::where('prcss_auction', '1')->get();

    	$screens = screens::all(['id', 'scr_name']);

    	$cupscore = cupscore::all(['id', 'cp_score', 'cp_quality']);
    	$rawscore = rawscore::all(['id', 'rw_score', 'rw_quality']);



    	$Certification = Certification::all(['id', 'crt_name']);

		if (NULL !== Input::get('confirmquality')){
	     	 $this->validate($request, [
		            'country' => 'required',  'sale_season' => 'required', 'sale' => 'required',
		        ]);
     
	     	 $country = Input::get('country');
	     	 $season = Input::get('sale_season');
	     	 $sale = Input::get('sale');

	     	 $count_green = Input::get('count_green');
	     	 $count_process = Input::get('count_process');
	     	 $count_screen = Input::get('count_screen');
	     	 $count_raw = Input::get('count_raw');
	     	 $count_cup = Input::get('count_cup');

            $user_data = Auth::user();
            $user = $user_data ->usr_name;

			Sale::where('id', '=', $sale)
				->update(['sl_quality_confirmedby' => $user, 'sl_catalogue_confirmedby' => $user]);

			$request->session()->flash('alert-success', 'Direct Quality Confirmed!!');

			Activity::log('Confirmed direct quality details for sale '.$sale);
			return redirect('directqualitydetails');

    	} else if (NULL !== Input::get('dnt') && NULL === Input::get('submitlot') && NULL === Input::get('searchButton')) {

			$country = Input::get('country');
			$season = Input::get('sale_season');
			$sale = Input::get('sale');
			$lot = Input::get('sif_lot'); 
			$outturn = Input::get('outt_number');   				

			$cdetails = coffee_details::where('cfd_outturn', $outturn)->where('sl_id', $sale)->where('csn_id', $season)->where('cgrad_id', Input::get('coffee_grade'))->first();
			$coffeeid = $cdetails->id;
			$qdetails = quality_details::where('cfd_id', $coffeeid)->first();

			$greencomments = greencomments::where('cfd_id', $coffeeid)->get();

	    	$Season = Season::all(['id', 'csn_season']);
	    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
	    	$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
	    	$region = Region::where('ctr_id', Input::get('country'))->get();

	    	if(Input::get('country') != NULL){
		       	$Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
		    	$Mill = mills_region::where('ctr_id', Input::get('country'))->get(); 		
		    	$seller = seller::where('ctr_id', Input::get('country'))->get(); 		
	    	}
	    	$cid = Input::get('country');
			$csn_season = Input::get('sale_season');
			$saleid = Input::get('sale');
			$direct_sale_lots = direct_sale::where('slid', $saleid)->get(); 	

			coffee_details::where('id', '=', $coffeeid)
						->update(['cfd_dnt'=> Input::get('dnt')]);
			$sale = Input::get('sale');		
			$cdetails = coffee_details::where('cfd_outturn', $outturn)->where('sl_id', $sale)->where('csn_id', $season)->where('cgrad_id', Input::get('coffee_grade'))->first();
	    	$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '2')->whereNull('sl_quality_confirmedby')->get();

			if ($cdetails !== NULL) {
				$request->session()->flash('alert-success', 'Sale Outturn Found!!');

				return View::make('directqualitydetails', compact('id', 
					'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'direct_sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'cdetails', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails'));	
						
			} else {
				$request->session()->flash('alert-warning', 'Outturn not found!');

				return View::make('directqualitydetails', compact('id', 
					'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'direct_sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails'));	
			}
 
    	} else if (NULL !== Input::get('submitlot')){
    		
	     	 $this->validate($request, [
		            'country' => 'required',  'sale_season' => 'required', 'sale' => 'required', 'outt_number' => 'required', 'coffee_grower' => 'required',
		        ]);
     
	     	 $country = Input::get('country');
	     	 $season = Input::get('sale_season');
	     	 $sale = Input::get('sale');
	     	 $lot = Input::get('sif_lot');
	     	 $outturn = Input::get('outt_number');
	     	 $mark = Input::get('coffee_grower');

	     	 $process_type = Input::get('process_type');
	     	 $process = Input::get('process');
	     	 $screen_size = Input::get('screen_size');
	     	 $screen = Input::get('screen');
	     	 $cup = Input::get('cup');
	     	 $raw = Input::get('raw');
	     	 $comments = Input::get('comments');

	     	 $grade = Input::get('coffee_grade');
	     	 $gradekgs = Input::get('grade_kilograms');
	     	 $bags = $gradekgs / 60;
	     	 $pkts = $gradekgs % 69;
	     	 $warehouse = Input::get('Warehouse');
	     	 $mill = Input::get('mill');
	     	 $Cert = Input::get('Certification');
	     	 $seller = Input::get('seller');

	     	 $cdetails = coffee_details::where('cfd_outturn', $outturn)->where('sl_id', $sale)->where('csn_id', $season)->where('cgrad_id', Input::get('coffee_grade'))->first();
	     	 $coffeeid = $cdetails->id;

	     	 $qdetails = quality_details::where('cfd_id', $coffeeid)->first();    	 

			 if($qdetails != NULL){
			 	$qid = $qdetails->id;
				quality_details::where('id', '=', $qid)
					->update(['prcss_id' => $process_type,  'qltyd_prcss_value' =>  $process, 'scr_id'=> $screen_size, 'qltyd_scr_value'=> $screen, 'cp_id'=> $cup,  'rw_id'=> $raw, 'qltyd_comments'=> $comments]);
				
				Activity::log('Updated quality for '.$lot. ' outturn '.$outturn.' with process_type '. $process_type.' process '.$process.' screen_size ' .$screen_size.' screen ' . $screen.' cup '.$cup.' raw '.$raw. ' comments '.$comments);

			 } else {
					quality_details::insert(
					    ['cfd_id' => $coffeeid,'prcss_id' => $process_type,  'qltyd_prcss_value' =>  $process, 'scr_id'=> $screen_size, 'qltyd_scr_value'=> $screen, 'cp_id'=> $cup,  'rw_id'=> $raw, 'qltyd_comments'=> $comments]
					);
					Activity::log('Added quality for '.$lot. ' outturn '.$outturn.' with process_type '. $process_type.' process '.$process.' screen_size ' .$screen_size.' screen ' . $screen.' cup '.$cup.' raw '.$raw. ' comments '.$comments);

			 }

	     	 if($cdetails != NULL){
		     	 $greensize = Input::get('greensize');
		     	 $greencolor =  Input::get('greencolor');
		     	 $greendefects =  Input::get('greendefects');
		     	 

		     	$greencomments = greencomments::where('cfd_id', $coffeeid)->get();
     	 		if($greencomments != NULL){
			     	foreach ($greencomments as $key => $value) {
			     		$greencommentsdel = greencomments::find($value->id);	
			     		$greencommentsdel->delete(); 
			     	}

     	 		}

		     	 if ($greensize != NULL) {
			     	 foreach ($greensize as $key => $value) {
						greencomments::insert(
							['cfd_id' => $coffeeid, 'qp_id' =>  $value]);  
						Activity::log('Added Quality For Coffee ID '.$coffeeid. ' with quality ID '.$value);		     	 			     		
			     	 	
			     	 }
		     	 }
		     	 if ($greencolor != NULL) {
			     	 foreach ($greencolor as $key => $value) {
						greencomments::insert(
							['cfd_id' => $coffeeid, 'qp_id' =>  $value]);  
						Activity::log('Added Quality For Coffee ID '.$coffeeid. ' with quality ID '.$value); 			     	 	
			     	 }
			     }
			     if ($greendefects != NULL) {
			     	 foreach ($greendefects as $key => $value) {
						greencomments::insert(
							['cfd_id' => $coffeeid, 'qp_id' =>  $value]);  
						Activity::log('Added Quality For Coffee ID '.$coffeeid. ' with quality ID '.$value);   	 		
		     	 		     				     	 	
			     	 }
		     	}


	     	 }

	     	$greencomments = greencomments::where('cfd_id', $coffeeid)->get();
	     	// print_r($greencomments);
			// $cdetails = coffee_details::where('sl_id', $sale)->where('csn_id', $season)->where('cfd_lot_no', $lot)->first();
			$cdetails = coffee_details::where('cfd_outturn', $outturn)->where('sl_id', $sale)->where('csn_id', $season)->where('cgrad_id', Input::get('coffee_grade'))->first();
	     	$qdetails = quality_details::where('cfd_id', $coffeeid)->first();    	 


	    	$greensize = quality_parameters::where('qg_id', '1')->get();
	    	$greencolor = quality_parameters::where('qg_id', '2')->get();
	    	$greendefects = quality_parameters::where('qg_id', '3')->get();
	    	$processing = processing::all(['id', 'prcss_name']);

	    	$Season = Season::all(['id', 'csn_season']);
	    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
	    	$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
	    	$region = Region::where('ctr_id', Input::get('country'))->get();

	    	if(Input::get('country') != NULL){
		       	$Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
		    	$Mill = mills_region::where('ctr_id', Input::get('country'))->get(); 		
		    	$seller = seller::where('ctr_id', Input::get('country'))->get(); 		
	    	}
	    	// $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
	    	$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '2')->whereNull('sl_quality_confirmedby')->get();
	    	$cid = Input::get('country');
			$csn_season = Input::get('sale_season');
			$saleid = Input::get('sale');
			$direct_sale_lots = direct_sale::where('slid', $saleid)->get(); 	

			$request->session()->flash('alert-success', 'Quality Parameters Added!!');


			return View::make('directqualitydetails', compact('id', 
				'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'direct_sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'cdetails', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails'));	     	 



    	} else if(NULL !== Input::get('searchButton')){
			$this->validate($request, [
			'country' => 'required',  'sale_season' => 'required', 'sale' => 'required', 'outt_number' => 'required', 'coffee_grade' => 'required',
			]);

			$country = Input::get('country');
			$season = Input::get('sale_season');
			$sale = Input::get('sale');
			$lot = Input::get('sif_lot');  
			$outturn = Input::get('outt_number');  		
			$coffeeid = null;		

			// $cdetails = coffee_details::where('sl_id', $sale)->where('csn_id', $season)->where('cfd_lot_no', $lot)->first();
			$cdetails = coffee_details::where('cfd_outturn', $outturn)->where('sl_id', $sale)->where('csn_id', $season)->where('cgrad_id', Input::get('coffee_grade'))->first();
			// print_r($sale);
			// print_r(Input::get('coffee_grade'));
			if ($cdetails != null) {
				$coffeeid = $cdetails->id;
			}
			
			$greencomments = greencomments::where('cfd_id', $coffeeid)->get();

	    	$Season = Season::all(['id', 'csn_season']);
	    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
	    	$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
	    	$region = Region::where('ctr_id', Input::get('country'))->get();

	    	if(Input::get('country') != NULL){
		       	$Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
		    	$Mill = mills_region::where('ctr_id', Input::get('country'))->get(); 		
		    	$seller = seller::where('ctr_id', Input::get('country'))->get(); 		
	    	}
	    	$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '2')->whereNull('sl_quality_confirmedby')->get();
	    	$cid = Input::get('country');
			$csn_season = Input::get('sale_season');
			$saleid = Input::get('sale');
			$direct_sale_lots = direct_sale::where('slid', $saleid)->get(); 
			$qdetails = quality_details::where('cfd_id', $coffeeid)->first();


			if ($cdetails !== NULL) {
				$request->session()->flash('alert-success', 'Sale Outturn Found!!');

				return View::make('directqualitydetails', compact('id', 
					'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'direct_sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'cdetails', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails'));	


						
			} else {
				$request->session()->flash('alert-warning', 'Outturn not found!');


				return View::make('directqualitydetails', compact('id', 
					'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'direct_sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails'));	


			}

    	} else if(NULL !== Input::get('nextButton')){
			$this->validate($request, [
			'country' => 'required',  'sale_season' => 'required', 'sale' => 'required', 'outt_number' => 'required', 'coffee_grade' => 'required',
			]);

			$country = Input::get('country');
			$season = Input::get('sale_season');
			$sale = Input::get('sale');
			$lot = Input::get('sif_lot');    				
			$outturn = Input::get('outt_number');
			$cdetails = coffee_details::where('cfd_outturn', $outturn)->where('sl_id', $sale)->where('csn_id', $season)->where('cgrad_id', Input::get('coffee_grade'))->first();
			$cdetails = coffee_details::where('sl_id', $sale)->where('csn_id', $season)->where('id','>', $cdetails->id)->min('id');



			$cdetails = coffee_details::where('id', $cdetails)->first();
			$coffeeid = $cdetails->id;
			$greencomments = greencomments::where('cfd_id', $coffeeid)->get();
			// print_r($cdetails);

			$qdetails = quality_details::where('cfd_id', $coffeeid)->first();

	    	$Season = Season::all(['id', 'csn_season']);
	    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
	    	$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
	    	$region = Region::where('ctr_id', Input::get('country'))->get();

	    	if(Input::get('country') != NULL){
		       	$Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
		    	$Mill = mills_region::where('ctr_id', Input::get('country'))->get(); 		
		    	$seller = seller::where('ctr_id', Input::get('country'))->get(); 		
	    	}
	    	$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '2')->whereNull('sl_quality_confirmedby')->get();
	    	$cid = Input::get('country');
			$csn_season = Input::get('sale_season');
			$saleid = Input::get('sale');
			$direct_sale_lots = direct_sale::where('slid', $saleid)->get(); 	

			if ($cdetails !== NULL) {
				$request->session()->flash('alert-success', 'Sale Outturn Found!!');

				return View::make('directqualitydetails', compact('id', 
					'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'direct_sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'cdetails', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails'));	


						
			} else {
				$request->session()->flash('alert-warning', 'Outturn not found!');


				return View::make('directqualitydetails', compact('id', 
					'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'direct_sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails'));	


			}

    	} else if(NULL !== Input::get('previousButton')){
			$this->validate($request, [
			'country' => 'required',  'sale_season' => 'required', 'sale' => 'required', 'outt_number' => 'required', 'coffee_grade' => 'required',
			]);
    		
			$country = Input::get('country');
			$season = Input::get('sale_season');
			$sale = Input::get('sale');
			$lot = Input::get('sif_lot');
			$outturn = Input::get('outt_number');

			$cdetails = coffee_details::where('cfd_outturn', $outturn)->where('sl_id', $sale)->where('csn_id', $season)->where('cgrad_id', Input::get('coffee_grade'))->first();
			// $cdetails = coffee_details::where('sl_id', $sale)->where('csn_id', $season)->where('id','>', $cdetails->id)->min('id');

			$cdetails = coffee_details::where('sl_id', $sale)->where('csn_id', $season)->where('id','<', $cdetails->id)->max('id');
			$cdetails = coffee_details::where('id', $cdetails)->first();
			$coffeeid = $cdetails->id;
			$qdetails = quality_details::where('cfd_id', $coffeeid)->first();

			$greencomments = greencomments::where('cfd_id', $coffeeid)->get();

	    	$Season = Season::all(['id', 'csn_season']);
	    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
	    	$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
	    	$region = Region::where('ctr_id', Input::get('country'))->get();

	    	if(Input::get('country') != NULL){
		       	$Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
		    	$Mill = mills_region::where('ctr_id', Input::get('country'))->get(); 		
		    	$seller = seller::where('ctr_id', Input::get('country'))->get(); 		
	    	}
	    	$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '2')->whereNull('sl_quality_confirmedby')->get();
	    	$cid = Input::get('country');
			$csn_season = Input::get('sale_season');
			$saleid = Input::get('sale');
			$direct_sale_lots = direct_sale::where('slid', $saleid)->get(); 	

			if ($cdetails !== NULL) {
				$request->session()->flash('alert-success', 'Sale Outturn Found!!');

				return View::make('directqualitydetails', compact('id', 
					'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'direct_sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'cdetails', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails'));	


						
			} else {
				$request->session()->flash('alert-warning', 'Outturn not found!');


				return View::make('directqualitydetails', compact('id', 
					'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'direct_sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails'));	


			}

    	} else {
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
	    		if($request->has('sale_season') & Input::get('sale_season') !== "Sale Season" ){

	    				if($request->has('sale')){
	    					$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '2')->whereNull('sl_quality_confirmedby')->get();
							$request->session()->flash('alert-success', 'Sale found!!');
							$cid = Input::get('country');
							$csn_season = Input::get('sale_season');
							$saleid = Input::get('sale');
							$direct_sale_lots = direct_sale::where('slid', $saleid)->get(); 


							return View::make('directqualitydetails', compact('id', 
								'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'direct_sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore'));	
	    				} else {
	    					$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '2')->whereNull('sl_quality_confirmedby')->get();
							$request->session()->flash('alert-success', 'Sale found!!');
							$cid = Input::get('country');
							$csn_season = Input::get('sale_season');
							return View::make('directqualitydetails', compact('id', 
								'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'direct_sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore'));					
	    				}

	    			


	    		} else {
	    			$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '2')->whereNull('sl_quality_confirmedby')->get();
						// $request->session()->flash('alert-success', 'Sale found!!');
						$cid = Input::get('country');
						$csn_season = Input::get('sale_season');
						return View::make('directqualitydetails', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore'));	
				}
	    	} else {

				return redirect('directqualitydetails')
	                        ->withErrors("Please select a valid Country!!")->withInput();
			}

	    	return View::make('directqualitydetails', compact('id', 'Season', 'country', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore'));		
    	}
    
    }

    public function qualityListForm (Request $request){
    	$id = NULL;
    	$Season = Season::all(['id', 'csn_season']);
    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
    	$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
    	$Certification = Certification::all(['id', 'crt_name']);
    	$QualityType = QualityType::all(['id', 'qat_name']);

    	$Warehouse = NULL;
    	$Mill = NULL;

    	$greensize = quality_parameters::where('qg_id', '1')->get();
    	$greencolor = quality_parameters::where('qg_id', '2')->get();
    	$greendefects = quality_parameters::where('qg_id', '3')->get();

    	$processing = processing::where('prcss_auction', '1')->get();

    	// $processing = processing::all(['id', 'prcss_name']);

    	$screens = screens::all(['id', 'scr_name']);

    	$cupscore = cupscore::all(['id', 'cp_score', 'cp_quality']);
    	$rawscore = rawscore::all(['id', 'rw_score', 'rw_quality']);

    	return View::make('directqualitydetailslist', compact('id', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'largest', 'greensize', 'greencolor', 'greendefects', 'processing', 'cupscore', 'rawscore', 'screens'));

    }

    public function addQualityDetailsList (Request $request){
    	$id = NULL;

    	$Warehouse = NULL;
    	$Mill = NULL;

    	$QualityType = QualityType::all(['id', 'qat_name']);

    	$greensize = quality_parameters::where('qg_id', '1')->get();
    	$greencolor = quality_parameters::where('qg_id', '2')->get();
    	$greendefects = quality_parameters::where('qg_id', '3')->get();
    	$processing = processing::where('prcss_auction', '1')->get();

    	$screens = screens::all(['id', 'scr_name']);

    	$cupscore = cupscore::all(['id', 'cp_score', 'cp_quality']);
    	$rawscore = rawscore::all(['id', 'rw_score', 'rw_quality']);

    	$StockView = StockViewALL::get();

    	$Certification = Certification::all(['id', 'crt_name']);

		$country = Input::get('country');
		$season = Input::get('sale_season');
		$sale = Input::get('sale');
		$lot = Input::get('sif_lot'); 
		$slr = Input::get('seller'); 
		$coffeeid = NULL;  
		$cdetails = NULL;

		if ($cdetails !== NULL) {
			$coffeeid = $cdetails->id;
		}
		
		$qdetails = quality_details::where('cfd_id', $coffeeid)->first();
		$greencomments = greencomments::all(['id', 'cfd_id', 'qp_id']);

    	$Season = Season::all(['id', 'csn_season']);
    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
    	$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
    	$region = Region::where('ctr_id', Input::get('country'))->get();

    	if(Input::get('country') != NULL){
	       	$Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
	    	$Mill = mills_region::where('ctr_id', Input::get('country'))->get(); 		
	    	$seller = seller::where('ctr_id', Input::get('country'))->get(); 		
    	}
    	$cid = Input::get('country');
		$csn_season = Input::get('sale_season');
		$saleid = Input::get('sale');
		$qtype = Input::get('qualityTy');

    	$slr = Input::get('seller'); 

    	$countryID = Input::get('country');

    	$saleSeason = Input::get('sale_season');

    	$sellerID = Input::get('seller');

    	$user_data = Auth::user();
       
        $user = $user_data ->usr_name;

    	if (NULL !== Input::get('confirmquality')) {
    		
    		$saleSeasonName = season::where('id', $saleSeason)->first();
            
            $saleSeasonName = $saleSeasonName->csn_season;
    		
    		$sale_lots = direct_sale::where('slctrid', $countryID)->where('csn_season', $saleSeasonName)->where('slrid', $sellerID)->whereNull('quality_confirmed')->get();      		

    		foreach ($sale_lots as $key => $value) {

    			$slid = $value->slid;

    			$coffee_id = $value->id;    			

            	$bs_id = 28;

            	$coffee_details = coffee_details::where('id', $coffee_id)->first();

            	$quality_details = quality_details::where('cfd_id', $coffee_id)->first();

            	$lot_cup = $quality_details->cp_id;

            	$lot_grade = $coffee_details->cgrad_id;

            	$basket_auto = BasketAuto::where('cgrad_id', $lot_grade)->where('cgrad_id', $lot_grade)->first();	

            	if ($basket_auto != null) {
            		
            		$bs_id = $basket_auto->bs_id;

            	}

            	coffee_details::where('id', '=', $coffee_id)
				->update(['bs_id' => $bs_id]);

    			Sale::where('id', '=', $slid)
					->update(['sl_quality_confirmedby' => $user]);


    		}

			$request->session()->flash('alert-success', 'Sales Confirmed!!');
			return View::make('directqualitydetailslist', compact('id', 
				'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'cdetails', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'slr', 'QualityType', 'qtype', 'StockView'));	


    	} else if (NULL !== Input::get('submitlot')){

	     	 $this->validate($request, [
		            'country' => 'required',  'sale_season' => 'required',
		        ]);
     
	     	 $country = Input::get('country');
	     	 $season = Input::get('sale_season');
	     	 $sale = Input::get('sale');
	     	 $lot = Input::get('sif_lot');
	     	 $outturn = Input::get('outt_number');
	     	 $mark = Input::get('coffee_grower');

	     	 $process_type = Input::get('process_type');
	     	 $process = Input::get('process');
	     	 $screen_size = Input::get('screen_size');
	     	 $screen = Input::get('screen');
	     	 $cup = Input::get('cup');
	     	 $raw = Input::get('raw');
	     	 $comments = Input::get('comments');

	     	 $grade = Input::get('coffee_grade');
	     	 $gradekgs = Input::get('grade_kilograms');
	     	 $bags = $gradekgs / 60;
	     	 $pkts = $gradekgs % 69;
	     	 $warehouse = Input::get('Warehouse');
	     	 $mill = Input::get('mill');
	     	 $Cert = Input::get('Certification');
	     	 $seller = Input::get('seller');
	     	 $coffeeid = NULL;
	     	 $cdetails = NULL;

	     	 $cdetails = coffee_details::where('sl_id', $sale)->where('cfd_lot_no', $lot)->first();

			if ($cdetails != NULL) {
		     	$coffeeid = $cdetails->id;
			}


			$green_size = Input::get('green_size');
			$green_color = Input::get('green_color');
			$green_defects = Input::get('green_defects');
			$processing_type = Input::get('processing_type');
			$processing_value = Input::get('processing_value');
			$comments = Input::get('comments');
			$raw_score = Input::get('raw_score');
			$lotsid = Input::get('lotsid');
			$screen_type = Input::get('screen_type');
			$screen_value = Input::get('screen_value');
			$cup_comments = Input::get('cup_comments');
			$cup_score = Input::get('cup_score');
			$dont = Input::get('dont');
	

			$acidity = Input::get('acidity');
			$body = Input::get('body');
			$flavour = Input::get('flavour');


			
			if ($green_size != NULL || $green_color != NULL || $green_defects != NULL) {	

				foreach ($green_size as $key => $value) {
					$greencomments = greencomments::where('cfd_id', $key)->get();
					
					foreach ($greencomments as $key2 => $value2) {
						$greencomments2 = greencomments::where('cfd_id', $value2->cfd_id)->where('qp_id', $value2->qp_id)->first();
						if ($greencomments2 != NULL) {
							$greencommentsdel = greencomments::findOrFail($greencomments2->id);	
							$greencommentsdel->delete(); 
						}
					}

				}
				
				if ($green_size != NULL) {
					foreach ($green_size as $key => $value) {
						if ($value != NULL) {
							greencomments::insert(
							['cfd_id' => $key, 'qp_id' =>  $value]); 
							Activity::log('Added Quality For Coffee ID '.$key. ' with quality ID '.$value);
						}					
					}				
				}
				if ($green_color != NULL) {
					foreach ($green_color as $key => $value) {
						if ($value != NULL) {
							greencomments::insert(
							['cfd_id' => $key, 'qp_id' =>  $value]); 
							Activity::log('Added Quality For Coffee ID '.$key. ' with quality ID '.$value);
						}					
					}				
				}
				if ($green_defects != NULL) {
					foreach ($green_defects as $key => $value) {
							if ($value != NULL && is_array($value)) {
								foreach ($value as $key2 => $value2) {
									greencomments::insert(
									['cfd_id' => $key, 'qp_id' =>  $value2]); 
									Activity::log('Added Quality For Coffee ID '.$key. ' with quality ID '.$value2);
								}						
							} else{
								greencomments::insert(
								['cfd_id' => $key, 'qp_id' =>  $value]); 
								Activity::log('Added Quality For Coffee ID '.$key. ' with quality ID '.$value);								
							}
					}
				}
			}



			if ($dont != NULL) {
				if ($acidity != null) {
					foreach ($acidity as $key => $value) {
						coffee_details::where('id', '=', $key)
							->update(['cfd_dnt'=> "0"]);	
					}
				}

				
				foreach ($dont as $key => $value) {
					// coffee_details::where('id', '=', $key)
					// 			->update(['cfd_dnt'=> "0"]);	

					if ($value != NULL) {
						coffee_details::where('id', '=', $key)
									->update(['cfd_dnt'=> "1"]);	

						// $qdetails = quality_details::where('cfd_id', $key)->first(); 
						// if($qdetails != NULL){
						// 	$qid = $qdetails->id;
						// 	quality_details::where('id', '=', $qid)
						// 		->update(['cp_id' => $value]);

						// } else {
						// 	quality_details::insert(
						// 		['cfd_id' => $key,'cp_id' => $$value]);
						// }						
					}					
				}				
			}	

			if ($acidity != NULL) {
				foreach ($acidity as $key => $value) {
					if ($value != NULL) {
						$qdetails = quality_details::where('cfd_id', $key)->first(); 
						if($qdetails != NULL){
							$qid = $qdetails->id;
							quality_details::where('id', '=', $qid)
								->update(['qltyd_acidity' => $value]);

						} else {
							quality_details::insert(
								['cfd_id' => $key,'qltyd_acidity' => $value]);
						}						
					}					
				}				
			}
			if ($body != NULL) {
				foreach ($body as $key => $value) {
					if ($value != NULL) {
						$qdetails = quality_details::where('cfd_id', $key)->first(); 
						if($qdetails != NULL){
							$qid = $qdetails->id;
							quality_details::where('id', '=', $qid)
								->update(['qltyd_body' => $value]);

						} else {
							quality_details::insert(
								['cfd_id' => $key,'qltyd_body' => $value]);
						}						
					}					
				}				
			}
			if ($flavour != NULL) {
				foreach ($flavour as $key => $value) {
					if ($value != NULL) {
						$qdetails = quality_details::where('cfd_id', $key)->first(); 
						if($qdetails != NULL){
							$qid = $qdetails->id;
							quality_details::where('id', '=', $qid)
								->update(['qltyd_flavour' => $value]);

						} else {
							quality_details::insert(
								['cfd_id' => $key,'qltyd_flavour' => $value]);
						}						
					}					
				}				
			}

			if ($processing_type != NULL) {
				foreach ($processing_type as $key => $value) {
					if ($value != NULL) {
						$qdetails = quality_details::where('cfd_id', $key)->first(); 

						if($qdetails != NULL){

							$qid = $qdetails->id;


							quality_details::where('id', '=', $qid)
								->update(['prcss_id' => $value]);

						} else {
							quality_details::insert(
								['cfd_id' => $key,'prcss_id' => $value]);
						}						
					}					
				}				
			}

			if ($processing_value != NULL) {
				foreach ($processing_value as $key => $value) {
					if ($value != NULL) {
						$qdetails = quality_details::where('cfd_id', $key)->first(); 
						if($qdetails != NULL){
							$qid = $qdetails->id;
							quality_details::where('id', '=', $qid)
								->update(['qltyd_prcss_value' => $value]);

						} else {
							quality_details::insert(
								['cfd_id' => $key,'qltyd_prcss_value' => $value]);
						}						
					}					
				}				
			}

			if ($comments != NULL) {
				foreach ($comments as $key => $value) {
					if ($value != NULL) {
						$qdetails = quality_details::where('cfd_id', $key)->first(); 
						if($qdetails != NULL){
							$qid = $qdetails->id;
							quality_details::where('id', '=', $qid)
								->update(['qltyd_comments' => $value]);

						} else {
							quality_details::insert(
								['cfd_id' => $key,'qltyd_comments' => $value]);
						}						
					}					
				}				
			}		

			if ($raw_score != NULL) {
				foreach ($raw_score as $key => $value) {
					if ($value != NULL) {
						$qdetails = quality_details::where('cfd_id', $key)->first(); 
						if($qdetails != NULL){
							$qid = $qdetails->id;
							quality_details::where('id', '=', $qid)
								->update(['rw_id' => $value]);

						} else {
							quality_details::insert(
								['cfd_id' => $key,'rw_id' => $value]);
						}						
					}					
				}				
			}




			if ($screen_type != NULL) {
				foreach ($screen_type as $key => $value) {
					if ($value != NULL) {
						$qdetails = quality_details::where('cfd_id', $key)->first(); 
						if($qdetails != NULL){
							$qid = $qdetails->id;
							quality_details::where('id', '=', $qid)
								->update(['scr_id' => $value]);

						} else {
							quality_details::insert(
								['cfd_id' => $key,'scr_id' => $value]);
						}						
					}					
				}				
			}

			if ($screen_value != NULL) {
				foreach ($screen_value as $key => $value) {
					if ($value != NULL) {
						$qdetails = quality_details::where('cfd_id', $key)->first(); 
						if($qdetails != NULL){
							$qid = $qdetails->id;
							quality_details::where('id', '=', $qid)
								->update(['qltyd_scr_value' => $value]);

						} else {
							quality_details::insert(
								['cfd_id' => $key,'qltyd_scr_value' => $value]);
						}						
					}					
				}				
			}	

			if ($cup_comments != NULL) {
				foreach ($cup_comments as $key => $value) {
					if ($value != NULL) {
						$qdetails = quality_details::where('cfd_id', $key)->first(); 
						if($qdetails != NULL){
							$qid = $qdetails->id;
							quality_details::where('id', '=', $qid)
								->update(['qltyd_comments' => $value]);

						} else {
							quality_details::insert(
								['cfd_id' => $key,'qltyd_comments' => $value]);
						}						
					}					
				}				
			}	
			
			if ($cup_score != NULL) {
				foreach ($cup_score as $key => $value) {
					if ($value != NULL) {
						$qdetails = quality_details::where('cfd_id', $key)->first(); 
						if($qdetails != NULL){
							$qid = $qdetails->id;
							quality_details::where('id', '=', $qid)
								->update(['cp_id' => $value]);

						} else {
							quality_details::insert(
								['cfd_id' => $key,'cp_id' => $value]);
						}						
					}					
				}				
			}	



			// if (Input::get('dntv') == Input::get('seller')) {
			// 	coffee_details::where('id', '=', $coffeeid)
			// 				->update(['cfd_dnt'=> Input::get('dnt')]);			
			// }


			$country = Input::get('country');
			$season = Input::get('sale_season');
			$sale = Input::get('sale');
			$lot = Input::get('sif_lot'); 
			$slr = Input::get('seller'); 
			$coffeeid = NULL;  



			// if($request->has('seller') && Input::get('seller') != NULL){
			// 	$sale_lots = sale_lots::where('slid', $sale)->where('slrid',Input::get('seller'))->get(); 			
			// 	$cdetails = coffee_details::where('sl_id', $sale)->where('cfd_lot_no', $lot)->where('slr_id', Input::get('seller'))->first();

			// } else {
			// 	$sale_lots = sale_lots::where('slid', $sale)->get(); 	
			// 	$cdetails = coffee_details::where('sl_id', $sale)->where('cfd_lot_no', $lot)->first();

			// }
			if ($cdetails !== NULL) {
				$coffeeid = $cdetails->id;
			}
			
			$qdetails = quality_details::where('cfd_id', $coffeeid)->first();
			$greencomments = greencomments::all(['id', 'cfd_id', 'qp_id']);

	    	$Season = Season::all(['id', 'csn_season']);
	    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
	    	$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
	    	$region = Region::where('ctr_id', Input::get('country'))->get();

	    	if(Input::get('country') != NULL){
		       	$Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
		    	$Mill = mills_region::where('ctr_id', Input::get('country'))->get(); 		
		    	$seller = seller::where('ctr_id', Input::get('country'))->get(); 		
	    	}
	    	$cid = Input::get('country');
			$csn_season = Input::get('sale_season');
			$saleid = Input::get('sale');
			$qtype = Input::get('qualityTy');

			// if (Input::get('dntv') == Input::get('seller')) {
			// 	coffee_details::where('id', '=', $coffeeid)
			// 				->update(['cfd_dnt'=> Input::get('dnt')]);			
			// }
			$cdetails = coffee_details::where('id', $coffeeid)->first();
			// if($request->has('seller') && Input::get('seller') != NULL){
			// 	$sale_lots = sale_lots::where('slid', $sale)->where('slrid',Input::get('seller'))->get(); 			
			// 	$cdetails = coffee_details::where('sl_id', $sale)->where('cfd_lot_no', $lot)->where('slr_id', Input::get('seller'))->first();

			// } else {
			// 	$sale_lots = sale_lots::where('slid', $sale)->get(); 	
			// 	$cdetails = coffee_details::where('sl_id', $sale)->where('cfd_lot_no', $lot)->first();

			// }
	    	$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby','!=', null)->where('sl_quality_confirmedby', null)->where('sl_auction_confirmedby', null)->get();

	    	

			if($request->has('sale') && Input::get('sale') != 'Sale No.'){
				if($request->has('qualityTy')){
					if($request->has('seller')){
						return View::make('directqualitydetailslist', compact('id', 
							'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'cdetails', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'slr', 'QualityType', 'qtype'));	

					} else {
						$saleselected = Sale::where('id', '=', Input::get('sale'))->where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->first();
							if ($saleselected->sl_catalogue_confirmedby == NULL){
								$request->session()->flash('alert-warning',  'Catalogue for Sale '.$saleselected->sl_no.' has not been confirmed yet. Please confirm to continue.');
								return View::make('directqualitydetailslist', compact('id', 
									'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'cdetails', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'sale_lots', 'slr', 'QualityType', 'qtype'));	
						 	} else if ($saleselected->sl_quality_confirmedby != NULL){
								$request->session()->flash('alert-warning',  'Catalogue Quality for Sale '.$saleselected->sl_no.' has already been confirmed by '.$saleselected->sl_quality_confirmedby.'.');
								return View::make('directqualitydetailslist', compact('id', 
									'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'cdetails', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'QualityType', 'qtype'));	
						 	} else {
								if ($cdetails !== NULL) {
									$request->session()->flash('alert-success', 'Sale Lot Found!!');

									return View::make('directqualitydetailslist', compact('id', 
										'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'cdetails', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'slr', 'QualityType', 'qtype'));	


										
								} else {
									return View::make('directqualitydetailslist', compact('id', 
										'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'slr', 'QualityType', 'qtype'));	


								}
							}					
					}
				} else {
					return View::make('directqualitydetailslist', compact('id', 
						'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'slr', 'QualityType', 'qtype'));					
				}


			} else {
					if ($cdetails !== NULL) {
						$request->session()->flash('alert-success', 'Sale Lot Found!!');

						return View::make('directqualitydetailslist', compact('id', 
							'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'cdetails', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'slr', 'QualityType', 'qtype'));	


								
					} else {
						// $request->session()->flash('alert-warning', 'Lot not found!');
						return View::make('directqualitydetailslist', compact('id', 
							'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'slr', 'QualityType', 'qtype'));	

					}
			}  	 



    	} else {

			$country = Input::get('country');
			$season = Input::get('sale_season');
			$sale = Input::get('sale');
			$lot = Input::get('sif_lot'); 
			$slr = Input::get('seller'); 
			$coffeeid = NULL;  
			$cdetails = NULL;

			if ($cdetails !== NULL) {
				$coffeeid = $cdetails->id;
			}
			
			$qdetails = quality_details::where('cfd_id', $coffeeid)->first();
			$greencomments = greencomments::all(['id', 'cfd_id', 'qp_id']);

	    	$Season = Season::all(['id', 'csn_season']);
	    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
	    	$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
	    	$region = Region::where('ctr_id', Input::get('country'))->get();

	    	if(Input::get('country') != NULL){
		       	$Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
		    	$Mill = mills_region::where('ctr_id', Input::get('country'))->get(); 		
		    	$seller = seller::where('ctr_id', Input::get('country'))->get(); 		
	    	}
	    	$cid = Input::get('country');
			$csn_season = Input::get('sale_season');
			$saleid = Input::get('sale');
			$qtype = Input::get('qualityTy');

	    	$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby','!=', null)->where('sl_quality_confirmedby', null)->where('sl_auction_confirmedby', null)->get();


			$request->session()->flash('alert-success', 'Sale Lot Found!!');
			return View::make('directqualitydetailslist', compact('id', 
				'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'cdetails', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'slr', 'QualityType', 'qtype', 'StockView'));	

    	}
    



    }

    public function getSaleLots($countryID, $saleSeason, $saleNumber, $seller)
    {
    		if ($countryID != null && $saleSeason != null && $saleNumber != null && $seller != null) {
            	$saleSeasonName = season::where('id', $saleSeason)->first();
            	$saleSeasonName = $saleSeasonName->csn_season;

                $sale_lots = direct_sale::select('*')->where('slctrid', $countryID)->where('csn_season', $saleSeasonName)->where('slrid', $seller)
                #->where('status', '!=', 'CONFIRMED')
                ->whereNull('quality_confirmed');  
                #->whereNull('prcid');            
            } else {
            		$sale_lots = null;
        	}  


        return Datatables::of($sale_lots)
            ->make(true);
    }

}

