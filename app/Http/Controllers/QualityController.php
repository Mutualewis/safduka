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
use Ngea\QualityType;

use Ngea\greencomments;
use delete;

use Ngea\cupscorecomments;
use Ngea\analysis_categories;

class QualityController extends Controller {


    public function qualityForm (Request $request){

		if(session('maincountry')!=NULL){
		
			$cidmain=session('maincountry');
		
		}

    	$id = NULL;
    	
    	$Season = Season::all(['id', 'csn_season']);
    	
    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
    	
    	$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
    	
    	$Certification = Certification::all(['id', 'crt_name']);
    	
    	$Warehouse = NULL;
    	
    	$Mill = NULL;

    	$greensize = quality_parameters::where('qg_id', '1')->get();
    	
    	$greencolor = quality_parameters::where('qg_id', '2')->get();
    	
		$greendefects = quality_parameters::where('qg_id', '3')->orderBy('qp_parameter', 'ASC')->get();

		$acidities = quality_parameters::where('qg_id', '7')->orderBy('qp_parameter', 'ASC')->get();
    	
    	$flavours = quality_parameters::where('qg_id', '10')->orderBy('qp_parameter', 'ASC')->get();
    	
		$bodies = quality_parameters::where('qg_id', '8')->orderBy('qp_parameter', 'ASC')->get();

    	$processing = processing::where('prcss_auction', '1')->get();
    	
    	$screens = screens::all(['id', 'scr_name']);

		$cupscore = cupscore::all(['id', 'cp_score', 'cp_quality']);

		$cupscorecomments = cupscorecomments::all(['id', 'cp_score', 'cp_quality']);
    	
    	$rawscore = rawscore::all(['id', 'rw_score', 'rw_quality']);

    	$seller = seller::where('ctr_id', $cidmain)->get(); 		

		$sale = Sale::where('ctr_id', '=', $cidmain)->where('sltyp_id',  '1')->whereNull('sl_quality_confirmedby')->get();

		$timeout = $this->dialog_timeout;

		$partchment = quality_parameters::where('qg_id', '13')->orderBy('qp_parameter', 'ASC')->get();

		$coffeequality = quality_parameters::where('qg_id', '11')->orderBy('qp_parameter', 'ASC')->get();
		$screensanalysis = analysis_categories::orderBy('id', 'ASC')->get();

    	return View::make('cataloguequalitydetails', compact('id', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'largest', 'greensize', 'greencolor', 'greendefects', 'processing', 'cupscore', 'rawscore', 'screens', 'seller', 'sale', 'sale_lots', 'serve', 'timeout', 'partchment', 'cupscorecomments', 'coffeequality', 'acidities', 'bodies', 'flavours', 'screensanalysis'));

    }

    public function addQualityDetails (Request $request){
  
  		if (NULL !== Input::get('searchButton')) {

			if(session('maincountry')!=NULL){
			
				$cidmain=session('maincountry');
			
			}

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
	    	
	    	$screens = screens::all(['id', 'scr_name']);

	    	$cupscore = cupscore::all(['id', 'cp_score', 'cp_quality']);
	    	
			$rawscore = rawscore::all(['id', 'rw_score', 'rw_quality']);
			
			$cupscorecomments = cupscorecomments::all(['id', 'cp_score', 'cp_quality']);

	    	$seller = seller::where('ctr_id', $cidmain)->get(); 		

			$sale = Sale::where('ctr_id', '=', $cidmain)->where('sltyp_id',  '2')->whereNull('sl_quality_confirmedby')->get();

			$cid = Input::get('country');

			$sale_season = Input::get('sale_season');

			$sale_id = Input::get('sale');

			$seller_id = Input::get('seller'); 

			$partchment = quality_parameters::where('qg_id', '13')->get();
			$coffeequality = quality_parameters::where('qg_id', '11')->get();
			$screensanalysis = analysis_categories::orderBy('id', 'ASC')->get();


  		}

    	return View::make('cataloguequalitydetails', compact('id', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'largest', 'greensize', 'greencolor', 'greendefects', 'processing', 'cupscore', 'rawscore', 'screens', 'seller', 'sale', 'sale_lots', 'sale_season', 'cid', 'sale_id', 'seller_id', 'cupscorecomments', 'partchment', 'coffeequality', 'screensanalysis'));

    
    }

    public function getLots($countryID, $saleSeason, $saleNumber, $seller, $cfd_id, $direction, $lot_number, $outt_number, $coffee_grade)
    {

    	if ($direction == 'null') {

	        $sale_lots= DB::table('sale_sl AS sl')
	            ->select('*', 'cfd.id as cfd_id', DB::Raw('GROUP_CONCAT(DISTINCT `crt`.`crt_name` SEPARATOR ",") as cert'), DB::Raw('GROUP_CONCAT(DISTINCT `grcm`.`qp_id` SEPARATOR ",") as qualityParameterID'))
	            ->leftJoin('country_ctr AS ctr', 'ctr.id', '=', 'sl.ctr_id')
	            ->leftJoin('coffee_details_cfd AS cfd', 'sl.id', '=', 'cfd.sl_id')
	            ->leftJoin('coffee_seasons_csn AS csn', 'csn.id', '=', 'cfd.csn_id')
	            ->leftJoin('coffee_grade_cgrad AS cgrad', 'cgrad.id', '=', 'cfd.cgrad_id')
	            ->leftJoin('coffee_certification_ccrt AS ccrt', 'ccrt.cfd_id', '=', 'cfd.id')
	            ->leftJoin('certification_crt AS crt', 'ccrt.crt_id', '=', 'crt.id')
	            ->leftJoin('seller_slr AS slr', 'cfd.slr_id', '=', 'slr.id')
	            ->leftJoin('green_comments_grcm AS grcm', 'grcm.cfd_id', '=', 'cfd.id')
	            ->leftJoin('quality_parameters_qp AS qp', 'qp.id', '=', 'grcm.qp_id')
	            ->leftJoin('qualty_details_qltyd AS qltyd', 'qltyd.cfd_id', '=', 'cfd.id')
	            ->leftJoin('processing_prcss AS prcss', 'qltyd.prcss_id', '=', 'prcss.id')
	            ->leftJoin('screens_scr AS scr', 'qltyd.scr_id', '=', 'scr.id')
	            ->leftJoin('cup_score_cp AS cp', 'qltyd.cp_id', '=', 'cp.id')
	            ->leftJoin('raw_score_rw AS rw', 'qltyd.rw_id', '=', 'rw.id')
	            ->leftJoin('coffee_growers_cg AS cg', 'cfd.cg_id', '=', 'cg.id')
	            ->where('ctr.id', $countryID)
	            ->where('csn.id', $saleSeason)
	            ->where('sl.id', $saleNumber)
	            ->where('slr.id', $seller)
	            ->groupBy('cfd.id')
	            ->first();

    	} else if ($direction == "Next") {

    		$cfd_id = $cfd_id + 1;

	        $sale_lots= DB::table('sale_sl AS sl')
	            ->select('*', 'cfd.id as cfd_id', DB::Raw('GROUP_CONCAT(DISTINCT `crt`.`crt_name` SEPARATOR ",") as cert'), DB::Raw('GROUP_CONCAT(DISTINCT `grcm`.`qp_id` SEPARATOR ",") as qualityParameterID'))
	            ->leftJoin('country_ctr AS ctr', 'ctr.id', '=', 'sl.ctr_id')
	            ->leftJoin('coffee_details_cfd AS cfd', 'sl.id', '=', 'cfd.sl_id')
	            ->leftJoin('coffee_seasons_csn AS csn', 'csn.id', '=', 'cfd.csn_id')
	            ->leftJoin('coffee_grade_cgrad AS cgrad', 'cgrad.id', '=', 'cfd.cgrad_id')
	            ->leftJoin('coffee_certification_ccrt AS ccrt', 'ccrt.cfd_id', '=', 'cfd.id')
	            ->leftJoin('certification_crt AS crt', 'ccrt.crt_id', '=', 'crt.id')
	            ->leftJoin('seller_slr AS slr', 'cfd.slr_id', '=', 'slr.id')
	            ->leftJoin('green_comments_grcm AS grcm', 'grcm.cfd_id', '=', 'cfd.id')
	            ->leftJoin('quality_parameters_qp AS qp', 'qp.id', '=', 'grcm.qp_id')
	            ->leftJoin('qualty_details_qltyd AS qltyd', 'qltyd.cfd_id', '=', 'cfd.id')
	            ->leftJoin('processing_prcss AS prcss', 'qltyd.prcss_id', '=', 'prcss.id')
	            ->leftJoin('screens_scr AS scr', 'qltyd.scr_id', '=', 'scr.id')
	            ->leftJoin('cup_score_cp AS cp', 'qltyd.cp_id', '=', 'cp.id')
	            ->leftJoin('raw_score_rw AS rw', 'qltyd.rw_id', '=', 'rw.id')
	            ->leftJoin('coffee_growers_cg AS cg', 'cfd.cg_id', '=', 'cg.id')
	            ->where('ctr.id', $countryID)
	            ->where('csn.id', $saleSeason)
	            ->where('sl.id', $saleNumber)
	            ->where('slr.id', $seller)
	            ->where('cfd.id', $cfd_id)
	            ->groupBy('cfd.id')
	            ->first();

    	} else if ($direction == "Previous") {

    		$cfd_id = $cfd_id - 1;

	        $sale_lots= DB::table('sale_sl AS sl')
	            ->select('*', 'cfd.id as cfd_id', DB::Raw('GROUP_CONCAT(DISTINCT `crt`.`crt_name` SEPARATOR ",") as cert'), DB::Raw('GROUP_CONCAT(DISTINCT `grcm`.`qp_id` SEPARATOR ",") as qualityParameterID'))
	            ->leftJoin('country_ctr AS ctr', 'ctr.id', '=', 'sl.ctr_id')
	            ->leftJoin('coffee_details_cfd AS cfd', 'sl.id', '=', 'cfd.sl_id')
	            ->leftJoin('coffee_seasons_csn AS csn', 'csn.id', '=', 'cfd.csn_id')
	            ->leftJoin('coffee_grade_cgrad AS cgrad', 'cgrad.id', '=', 'cfd.cgrad_id')
	            ->leftJoin('coffee_certification_ccrt AS ccrt', 'ccrt.cfd_id', '=', 'cfd.id')
	            ->leftJoin('certification_crt AS crt', 'ccrt.crt_id', '=', 'crt.id')
	            ->leftJoin('seller_slr AS slr', 'cfd.slr_id', '=', 'slr.id')
	            ->leftJoin('green_comments_grcm AS grcm', 'grcm.cfd_id', '=', 'cfd.id')
	            ->leftJoin('quality_parameters_qp AS qp', 'qp.id', '=', 'grcm.qp_id')
	            ->leftJoin('qualty_details_qltyd AS qltyd', 'qltyd.cfd_id', '=', 'cfd.id')
	            ->leftJoin('processing_prcss AS prcss', 'qltyd.prcss_id', '=', 'prcss.id')
	            ->leftJoin('screens_scr AS scr', 'qltyd.scr_id', '=', 'scr.id')
	            ->leftJoin('cup_score_cp AS cp', 'qltyd.cp_id', '=', 'cp.id')
	            ->leftJoin('raw_score_rw AS rw', 'qltyd.rw_id', '=', 'rw.id')
	            ->leftJoin('coffee_growers_cg AS cg', 'cfd.cg_id', '=', 'cg.id')
	            ->where('ctr.id', $countryID)
	            ->where('csn.id', $saleSeason)
	            ->where('sl.id', $saleNumber)
	            ->where('slr.id', $seller)
	            ->where('cfd.id', $cfd_id)
	            ->groupBy('cfd.id')
	            ->first();

    	} else if ($direction == "Search") {

	        $sale_lots= DB::table('sale_sl AS sl')
	            ->select('*', 'cfd.id as cfd_id', DB::Raw('GROUP_CONCAT(DISTINCT `crt`.`crt_name` SEPARATOR ",") as cert'), DB::Raw('GROUP_CONCAT(DISTINCT `grcm`.`qp_id` SEPARATOR ",") as qualityParameterID'))
	            ->leftJoin('country_ctr AS ctr', 'ctr.id', '=', 'sl.ctr_id')
	            ->leftJoin('coffee_details_cfd AS cfd', 'sl.id', '=', 'cfd.sl_id')
	            ->leftJoin('coffee_seasons_csn AS csn', 'csn.id', '=', 'cfd.csn_id')
	            ->leftJoin('coffee_grade_cgrad AS cgrad', 'cgrad.id', '=', 'cfd.cgrad_id')
	            ->leftJoin('coffee_certification_ccrt AS ccrt', 'ccrt.cfd_id', '=', 'cfd.id')
	            ->leftJoin('certification_crt AS crt', 'ccrt.crt_id', '=', 'crt.id')
	            ->leftJoin('seller_slr AS slr', 'cfd.slr_id', '=', 'slr.id')
	            ->leftJoin('green_comments_grcm AS grcm', 'grcm.cfd_id', '=', 'cfd.id')
	            ->leftJoin('quality_parameters_qp AS qp', 'qp.id', '=', 'grcm.qp_id')
	            ->leftJoin('qualty_details_qltyd AS qltyd', 'qltyd.cfd_id', '=', 'cfd.id')
	            ->leftJoin('processing_prcss AS prcss', 'qltyd.prcss_id', '=', 'prcss.id')
	            ->leftJoin('screens_scr AS scr', 'qltyd.scr_id', '=', 'scr.id')
	            ->leftJoin('cup_score_cp AS cp', 'qltyd.cp_id', '=', 'cp.id')
	            ->leftJoin('raw_score_rw AS rw', 'qltyd.rw_id', '=', 'rw.id')
	            ->leftJoin('coffee_growers_cg AS cg', 'cfd.cg_id', '=', 'cg.id')
	            ->where('ctr.id', $countryID)
	            ->where('csn.id', $saleSeason)
	            ->where('sl.id', $saleNumber)
	            ->where('slr.id', $seller)
	            ->where('cfd.cfd_lot_no', $lot_number)
	            ->groupBy('cfd.id')
	            ->first();

    	}        

        return json_encode($sale_lots);

    }

    public function saveGreen($cfd_id, $dnt, $greensize, $greencolor, $greendefects, $process_type, $process_loss, $raw, $comments)
    {
        try{
		    	$process_type = json_decode($process_type);

				$raw = json_decode($raw);
				
				$greensize = json_decode($greensize);
		     	$greencolor =  json_decode($greencolor);
		     	$greendefects =  json_decode($greendefects);
		     	 
				$cdetails = coffee_details::where('id', $cfd_id)->first();
				
				$outturn = $cdetails->cfd_outturn;
				$cgrade = $cdetails->cgrad_id;
				$saleid = $cdetails->sl_id;

				$saledetails = sale::where('id', $saleid)->first();
				$csn_season = $saledetails->csn_id;

				$tied_sale_lots= DB::table('sale_sl AS sl')
	            ->select('cfd.id as cfd_id')
	            
				->leftJoin('coffee_details_cfd AS cfd', 'sl.id', '=', 'cfd.sl_id')
	            ->leftJoin('coffee_seasons_csn AS csn', 'csn.id', '=', 'cfd.csn_id')
	            ->leftJoin('coffee_grade_cgrad AS cgrad', 'cgrad.id', '=', 'cfd.cgrad_id')
	            ->where('cfd.cfd_outturn', $outturn)
	            ->where('csn.id', $csn_season)
	            ->where('cfd.cgrad_id', $cgrade)
	            ->groupBy('cfd.id')
	            ->get();

			foreach ($tied_sale_lots as $lot){
				
				$cfd_id = $lot->cfd_id;

		    	$qdetails = quality_details::where('cfd_id', $cfd_id)->first(); 

				if ($comments == 'null') {

					$comments = null;

				}		    	

		    	foreach ($process_type as $key => $value) {

		    		$process_type_current = $value;

				}
				if(empty($process_type)){
					$process_type_current=null;
				}

		    	foreach ($raw as $key => $value) {

		    		$raw_current = $value;
		    		
		    	}
				if(empty($raw)){
					$raw_current=null;
				}
		        if ($qdetails != NULL) {
				 	
				 	$qid = $qdetails->id;

					quality_details::where('id', '=', $qid)
						->update(['prcss_id' => $process_type_current,  'qltyd_prcss_value' =>  $process_loss, 'rw_id'=> $raw_current, 'qltyd_comments'=> $comments]);
					
					Activity::log('Updated quality for cfd_id'.$cfd_id. ' with process_type '. $process_type_current.' process '.$process_loss. ' comments '.$comments);

				} else {

					quality_details::insert(
					    ['cfd_id' => $cfd_id,'prcss_id' => $process_type_current,  'qltyd_prcss_value' =>  $process_loss, 'rw_id'=> $raw_current, 'qltyd_comments'=> $comments]
					);

					Activity::log('Added quality for cfd_id'.$cfd_id. ' with process_type '. $process_type_current.' process '.$process_loss. ' comments '.$comments);

				}
				

				if ($dnt != 'null') {

					coffee_details::where('id', '=', $cfd_id)
						->update(['cfd_dnt'=> "1"]);	

				} else {

					coffee_details::where('id', '=', $cfd_id)
						->update(['cfd_dnt'=> null]);	

				}

			

		 	 if($cdetails != NULL){

		     	$greencomments = greencomments::where('cfd_id', $cfd_id)->get();

		 		if($greencomments != NULL){
			     	foreach ($greencomments as $key => $value) {
			     		$greencommentsdel = greencomments::find($value->id);	
			     		$greencommentsdel->delete(); 
			     	}

		 		}

		     	 if ($greensize != NULL) {
			     	 foreach ($greensize as $key => $value) {
						greencomments::insert(
							['cfd_id' => $cfd_id, 'qp_id' =>  $value]);  
						Activity::log('Added Quality For Coffee ID '.$cfd_id. ' with quality ID '.$value);		     	 			     		
			     	 	
			     	 }
		     	 }
		     	 if ($greencolor != NULL) {
			     	 foreach ($greencolor as $key => $value) {
						greencomments::insert(
							['cfd_id' => $cfd_id, 'qp_id' =>  $value]);  
						Activity::log('Added Quality For Coffee ID '.$cfd_id. ' with quality ID '.$value); 			     	 	
			     	 }
			     }
			     if ($greendefects != NULL) {
			     	 foreach ($greendefects as $key => $value) {
						greencomments::insert(
							['cfd_id' => $cfd_id, 'qp_id' =>  $value]);  
						Activity::log('Added Quality For Coffee ID '.$cfd_id. ' with quality ID '.$value);   	 		
		     	 		     				     	 	
			     	 }
		     	}


			  }
			}

            return response()->json([
                'exists' => false,
                'inserted' => true,
                'error' => 'null'
            ]);


        } catch (\PDOException $e) {
            return response()->json([
                'exists' => false,
                'inserted' => false,
                'error' => $e->getMessage()
            ]);
        }
    
    }


    public function saveScreen($cfd_id, $screen_size, $screen)
    {

        try{
		    	$screen_size = json_decode($screen_size);

				$cdetails = coffee_details::where('id', $cfd_id)->first();
				
				$outturn = $cdetails->cfd_outturn;
				$cgrade = $cdetails->cgrad_id;
				$saleid = $cdetails->sl_id;

				$saledetails = sale::where('id', $saleid)->first();
				$csn_season = $saledetails->csn_id;

				$tied_sale_lots= DB::table('sale_sl AS sl')
	            ->select('cfd.id as cfd_id')
	            
	            ->leftJoin('coffee_details_cfd AS cfd', 'sl.id', '=', 'cfd.sl_id')
	            ->leftJoin('coffee_seasons_csn AS csn', 'csn.id', '=', 'cfd.csn_id')
	            ->leftJoin('coffee_grade_cgrad AS cgrad', 'cgrad.id', '=', 'cfd.cgrad_id')
	            ->where('cfd.cfd_outturn', $outturn)
	            ->where('csn.id', $csn_season)
	            ->where('cfd.cgrad_id', $cgrade)
	            ->groupBy('cfd.id')
	            ->get();

				foreach ($tied_sale_lots as $lot){
				
				$cfd_id = $lot->cfd_id;

		    	$qdetails = quality_details::where('cfd_id', $cfd_id)->first(); 

		        if ($qdetails != NULL) {
				 	
				 	$qid = $qdetails->id;

					quality_details::where('id', '=', $qid)
						->update(['scr_id' => $screen_size,  'qltyd_scr_value' =>  $screen]);
					
					Activity::log('Updated quality for cfd_id'.$cfd_id. ' with scr_id '. $screen_size.' qltyd_scr_value '.$screen);

				} else {

					quality_details::insert(
					    ['cfd_id' => $cfd_id, 'scr_id' => $screen_size,  'qltyd_scr_value' =>  $screen]
					);

					Activity::log('Added quality for cfd_id'.$cfd_id. ' with scr_id '. $screen_size.' qltyd_scr_value '.$screen);

				}
			}

            return response()->json([
                'exists' => false,
                'inserted' => true,
                'error' => 'null'
			]);


        } catch (\PDOException $e) {
            return response()->json([
                'exists' => false,
                'inserted' => false,
                'error' => $e->getMessage()
            ]);
        }

    }

    public function saveCup($cfd_id, $cup, $dnt_cp, $acidity, $body, $flavour, $comments_cp)
    {

        try{
		    	$cup = json_decode($cup);

				$cdetails = coffee_details::where('id', $cfd_id)->first();
				$cdetails = coffee_details::where('id', $cfd_id)->first();
				
				$outturn = $cdetails->cfd_outturn;
				$cgrade = $cdetails->cgrad_id;
				$saleid = $cdetails->sl_id;

				$saledetails = sale::where('id', $saleid)->first();
				$csn_season = $saledetails->csn_id;

				$tied_sale_lots= DB::table('sale_sl AS sl')
	            ->select('cfd.id as cfd_id')
	            
	            ->leftJoin('coffee_details_cfd AS cfd', 'sl.id', '=', 'cfd.sl_id')
	            ->leftJoin('coffee_seasons_csn AS csn', 'csn.id', '=', 'cfd.csn_id')
	            ->leftJoin('coffee_grade_cgrad AS cgrad', 'cgrad.id', '=', 'cfd.cgrad_id')
	            ->where('cfd.cfd_outturn', $outturn)
	            ->where('csn.id', $csn_season)
	            ->where('cfd.cgrad_id', $cgrade)
	            ->groupBy('cfd.id')
	            ->get();

				foreach ($tied_sale_lots as $lot){
				
				$cfd_id = $lot->cfd_id;

		    	$qdetails = quality_details::where('cfd_id', $cfd_id)->first(); 

				if ($dnt_cp != 'null') {

					coffee_details::where('id', '=', $cfd_id)
						->update(['cfd_dnt'=> "1"]);	

				} else {

					coffee_details::where('id', '=', $cfd_id)
						->update(['cfd_dnt'=> null]);	

				}

				if ($comments_cp == 'null') {

					$comments_cp = null;

				}

		        if ($qdetails != NULL) {
				 	
				 	$qid = $qdetails->id;

					quality_details::where('id', '=', $qid)
						->update(['cp_id' => $cup,  'qltyd_acidity' =>  $acidity,  'qltyd_body' =>  $body,  'qltyd_flavour' =>  $flavour,  'qltyd_comments' =>  $comments_cp]);
					
					Activity::log('Updated quality for cfd_id'.$cfd_id. ' with cup '. $cup.' acidity '.$acidity.' body '.$body.' flavour '.$flavour.' comments_cp '.$comments_cp);

				} else {

					quality_details::insert(
					    ['cfd_id' => $cfd_id, 'cp_id' => $cup,  'qltyd_acidity' =>  $acidity,  'qltyd_body' =>  $body,  'qltyd_flavour' =>  $flavour,  'qltyd_comments' =>  $comments_cp]
					);

					Activity::log('Added quality for cfd_id'.$cfd_id. ' with cup '. $cup.' acidity '.$acidity.' body '.$body.' flavour '.$flavour.' comments_cp '.$comments_cp);

				}

			}
            return response()->json([
                'exists' => false,
                'inserted' => true,
                'error' => 'null'
            ]);
		
			

        } catch (\PDOException $e) {
            return response()->json([
                'exists' => false,
                'inserted' => false,
                'error' => $e->getMessage()
            ]);
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
		
		$cupscorecomments = cupscorecomments::all(['id', 'cp_score', 'cp_quality']);

    	$greensize = quality_parameters::where('qg_id', '1')->get();
    	$greencolor = quality_parameters::where('qg_id', '2')->get();
    	$greendefects = quality_parameters::where('qg_id', '3')->get();

    	$processing = processing::where('prcss_auction', '1')->get();

    	// $processing = processing::all(['id', 'prcss_name']);

    	$screens = screens::all(['id', 'scr_name']);

    	$cupscore = cupscore::all(['id', 'cp_score', 'cp_quality']);
    	$rawscore = rawscore::all(['id', 'rw_score', 'rw_quality']);

    	return View::make('cataloguequalitydetailslist', compact('id', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'largest', 'greensize', 'greencolor', 'greendefects', 'processing', 'cupscore', 'rawscore', 'screens', 'cupscorecomments'));

    }

    public function addQualityDetailsList (Request $request){
    	$id = NULL;

    	$Warehouse = NULL;
    	$Mill = NULL;

		$cupscorecomments = cupscorecomments::all(['id', 'cp_score', 'cp_quality']);

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

    	$slr = Input::get('seller'); 

        if (NULL !== Input::get('submitlot')){
	     	 $this->validate($request, [
		            'country' => 'required',  'sale_season' => 'required', 'sale' => 'required',
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

			if($request->has('seller') && Input::get('seller') != NULL){
				$sale_lots = sale_lots::where('slid', Input::get('sale'))->where('slrid',Input::get('seller'))->get(); 			
				$cdetails = coffee_details::where('sl_id', Input::get('sale'))->where('cfd_lot_no', $lot)->where('slr_id', Input::get('seller'))->first();

			} else {
				$sale_lots = sale_lots::where('slid', Input::get('sale'))->get(); 	
				$cdetails = coffee_details::where('sl_id', Input::get('sale'))->where('cfd_lot_no', $lot)->first();

			}

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
			$cup_score_cmt = Input::get('cup_score_cmt'); 
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

					if ($value != NULL) {
						
						echo "<br>";
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
					} else {

						coffee_details::where('id', '=', $key)
									->update(['cfd_dnt'=> "0"]);	
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

			if ($cup_score_cmt != NULL) {
				foreach ($cup_score_cmt as $key => $value) {
					if ($value != NULL) {
						$qdetails = quality_details::where('cfd_id', $key)->first(); 
						if($qdetails != NULL){
							$qid = $qdetails->id;
							quality_details::where('id', '=', $qid)
								->update(['cps_id' => $value]);

						} else {
							quality_details::insert(
								['cfd_id' => $key,'cps_id' => $value]);
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

			if($request->has('seller') && Input::get('seller') != NULL){
				$sale_lots = sale_lots::where('slid', $sale)->where('slrid',Input::get('seller'))->get(); 			
				$cdetails = coffee_details::where('sl_id', $sale)->where('cfd_lot_no', $lot)->where('slr_id', Input::get('seller'))->first();

			} else {
				$sale_lots = sale_lots::where('slid', $sale)->get(); 	
				$cdetails = coffee_details::where('sl_id', $sale)->where('cfd_lot_no', $lot)->first();

			}
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
			if($request->has('seller') && Input::get('seller') != NULL){
				$sale_lots = sale_lots::where('slid', $sale)->where('slrid',Input::get('seller'))->get(); 			
				$cdetails = coffee_details::where('sl_id', $sale)->where('cfd_lot_no', $lot)->where('slr_id', Input::get('seller'))->first();

			} else {
				$sale_lots = sale_lots::where('slid', $sale)->get(); 	
				$cdetails = coffee_details::where('sl_id', $sale)->where('cfd_lot_no', $lot)->first();

			}
	    	$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby','!=', null)->where('sl_quality_confirmedby', null)->where('sl_auction_confirmedby', null)->get();

	    	

			if($request->has('sale') && Input::get('sale') != 'Sale No.'){
				if($request->has('qualityTy')){
					if($request->has('seller')){
						return View::make('cataloguequalitydetailslist', compact('id', 
							'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'cdetails', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'slr', 'QualityType', 'qtype', 'cupscorecomments'));	

					} else {
						$saleselected = Sale::where('id', '=', Input::get('sale'))->where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->first();
							if ($saleselected->sl_catalogue_confirmedby == NULL){
								$request->session()->flash('alert-warning',  'Catalogue for Sale '.$saleselected->sl_no.' has not been confirmed yet. Please confirm to continue.');
								return View::make('cataloguequalitydetailslist', compact('id', 
									'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'cdetails', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'sale_lots', 'slr', 'QualityType', 'qtype', 'cupscorecomments'));	
						 	} else if ($saleselected->sl_quality_confirmedby != NULL){
								$request->session()->flash('alert-warning',  'Catalogue Quality for Sale '.$saleselected->sl_no.' has already been confirmed by '.$saleselected->sl_quality_confirmedby.'.');
								return View::make('cataloguequalitydetailslist', compact('id', 
									'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'cdetails', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'QualityType', 'qtype', 'cupscorecomments'));	
						 	} else {
								if ($cdetails !== NULL) {
									$request->session()->flash('alert-success', 'Sale Lot Found!!');

									return View::make('cataloguequalitydetailslist', compact('id', 
										'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'cdetails', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'slr', 'QualityType', 'qtype', 'cupscorecomments'));	


										
								} else {
									return View::make('cataloguequalitydetailslist', compact('id', 
										'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'slr', 'QualityType', 'qtype', 'cupscorecomments'));	


								}
							}					
					}
				} else {
					return View::make('cataloguequalitydetailslist', compact('id', 
						'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'slr', 'QualityType', 'qtype', 'cupscorecomments'));					
				}


			} else {
					if ($cdetails !== NULL) {
						$request->session()->flash('alert-success', 'Sale Lot Found!!');

						return View::make('cataloguequalitydetailslist', compact('id', 
							'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'cdetails', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'slr', 'QualityType', 'qtype', 'cupscorecomments'));	


								
					} else {
						// $request->session()->flash('alert-warning', 'Lot not found!');


						return View::make('cataloguequalitydetailslist', compact('id', 
							'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'slr', 'QualityType', 'qtype', 'cupscorecomments'));	


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


			if($request->has('sale') && Input::get('sale') != 'Sale No.'){
				if($request->has('country')){
					if($request->has('qualityTy')){
						if($request->has('seller') && Input::get('seller') != NULL){
							$sale_lots = sale_lots::where('slid', Input::get('sale'))->where('slrid',Input::get('seller'))->where('slctrid',Input::get('country'))->get(); 		
						} else {
							$sale_lots = sale_lots::where('slid', Input::get('sale'))->where('slctrid',Input::get('country'))->get(); 	
						}				
						if($request->has('seller')  && $sale_lots->first() != NULL){
							$saleselected = Sale::where('id', '=', Input::get('sale'))->where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->first();
							if ($saleselected->sl_catalogue_confirmedby == NULL){
								$request->session()->flash('alert-warning',  'Catalogue for Sale '.$saleselected->sl_no.' has not been confirmed yet. Please confirm to continue.');
								return View::make('cataloguequalitydetailslist', compact('id', 
									'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'cdetails', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'sale_lots', 'slr', 'QualityType', 'qtype', 'StockView', 'cupscorecomments'));	
						 	} else if ($saleselected->sl_quality_confirmedby != NULL){
								$request->session()->flash('alert-warning',  'Catalogue Quality for Sale '.$saleselected->sl_no.' has already been confirmed by '.$saleselected->sl_quality_confirmedby.'.');
								return View::make('cataloguequalitydetailslist', compact('id', 
									'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'cdetails', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'QualityType', 'qtype', 'StockView', 'cupscorecomments'));	
						 	} else {
								if ($cdetails !== NULL) {
									$request->session()->flash('alert-success', 'Sale Lot Found!!');

									return View::make('cataloguequalitydetailslist', compact('id', 
										'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'cdetails', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'slr', 'QualityType', 'qtype', 'StockView', 'cupscorecomments'));	
										
								} else {
									return View::make('cataloguequalitydetailslist', compact('id', 
										'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'slr', 'QualityType', 'qtype', 'StockView', 'cupscorecomments'));	
								}
							}	


						} else {		
							$sale_lots = NULL;				
							return View::make('cataloguequalitydetailslist', compact('id', 
								'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'cdetails', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'slr', 'QualityType', 'qtype', 'StockView', 'cupscorecomments'));					
						}
					} else {
						return View::make('cataloguequalitydetailslist', compact('id', 
							'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'slr', 'QualityType', 'qtype', 'StockView', 'cupscorecomments'));					
					}
				} else {
					$request->session()->flash('alert-success', 'Sale Lot Found!!');
					return View::make('cataloguequalitydetailslist', compact('id', 
						'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'cdetails', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'slr', 'QualityType', 'qtype', 'StockView', 'cupscorecomments'));	
				}


			} else {
					if ($cdetails !== NULL) {
						$request->session()->flash('alert-success', 'Sale Lot Found!!');
						return View::make('cataloguequalitydetailslist', compact('id', 
							'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'cdetails', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'slr', 'QualityType', 'qtype', 'StockView', 'cupscorecomments'));	
								
					} else {

						return View::make('cataloguequalitydetailslist', compact('id', 
							'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'slr', 'QualityType', 'qtype', 'StockView', 'cupscorecomments'));	


					}
			}
    	}
    



    }
    public function getSaleLots($countryID, $saleSeason, $saleNumber, $seller)
    {
		if ($countryID != null && $saleSeason != null && $saleNumber != null && $seller != null) {
        	$saleSeasonName = season::where('id', $saleSeason)->first();
        	$saleSeasonName = $saleSeasonName->csn_season;

            $sale_lots = sale_lots::select('*')->where('slctrid', $countryID)->where('csn_season', $saleSeasonName)->where('slid', $saleNumber)->where('slrid', $seller);
        } else {
        	$sale_lots = null;
    	}  


    return Datatables::of($sale_lots)
        ->make(true);
    }
    

}

