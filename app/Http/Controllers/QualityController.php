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
use Ngea\cupcomments;
use Ngea\analysis_categories;

use Ngea\StockMill;
use Ngea\StockMillQuality;
use Ngea\partchment_comments;

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

		$rwquality = quality_parameters::where('qg_id', '11')->orderBy('qp_parameter', 'ASC')->get();

		$cpquality = quality_parameters::where('qg_id', '11')->orderBy('qp_parameter', 'ASC')->get();

		$partchment_types = ParchmentType::orderBy('pty_name', 'ASC')->get();

		$coffeequality = quality_parameters::where('qg_id', '11')->orderBy('qp_parameter', 'ASC')->get();
		$screensanalysis = analysis_categories::orderBy('id', 'ASC')->get();

    	return View::make('cataloguequalitydetails', compact('id', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'largest', 'greensize', 'greencolor', 'greendefects', 'processing', 'cupscore', 'rawscore', 'screens', 'seller', 'sale', 'sale_lots', 'serve', 'timeout', 'partchment', 'cupscorecomments', 'coffeequality', 'acidities', 'bodies', 'flavours', 'screensanalysis', 'partchment_types', 'rwquality', 'cpquality'));

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

			$coffee_class_cc = CoffeeClass::all(['id', 'cc_name']);

			$seller = seller::where('ctr_id', $cidmain)->get(); 	
			$rwquality = quality_parameters::where('qg_id', '11')->orderBy('qp_parameter', 'ASC')->get();

			$cpquality = quality_parameters::where('qg_id', '11')->orderBy('qp_parameter', 'ASC')->get();
		

			$sale = Sale::where('ctr_id', '=', $cidmain)->where('sltyp_id',  '2')->whereNull('sl_quality_confirmedby')->get();

			$cid = Input::get('country');

			$sale_season = Input::get('sale_season');

			$sale_id = Input::get('sale');

			$seller_id = Input::get('seller'); 

			$partchment = quality_parameters::where('qg_id', '13')->get();
			$coffeequality = quality_parameters::where('qg_id', '11')->get();
			$screensanalysis = analysis_categories::orderBy('id', 'ASC')->get();

			$partchment_types = ParchmentType::orderBy('pty_name', 'ASC')->get();

  		}

    	return View::make('cataloguequalitydetails2', compact('id', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'largest', 'greensize', 'greencolor', 'greendefects', 'processing', 'cupscore', 'rawscore', 'screens', 'seller', 'sale', 'sale_lots', 'sale_season', 'cid', 'sale_id', 'seller_id', 'cupscorecomments', 'partchment', 'coffeequality', 'screensanalysis', 'partchment_types', 'rwquality', 'cpquality'));

    
	}
	
	public function qualityForm2 (Request $request){

		if(session('maincountry')!=NULL){
		
			$cidmain=session('maincountry');
		
		}

    	$id = NULL;
    	
    	$Season = Season::all(['id', 'csn_season']);
    	
		$country = country::all(['id', 'ctr_name', 'ctr_initial']);
		
		$coffeeclass = CoffeeClass::all(['id', 'cc_name']);
    	
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

		$partchment_types = ParchmentType::orderBy('pty_name', 'ASC')->get();

		$coffeequality = quality_parameters::where('qg_id', '11')->orderBy('qp_parameter', 'ASC')->get();
		$screensanalysis = analysis_categories::orderBy('id', 'ASC')->get();

    	return View::make('cataloguequalitydetails2', compact('id', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'largest', 'greensize', 'greencolor', 'greendefects', 'processing', 'cupscore', 'rawscore', 'screens', 'seller', 'sale', 'sale_lots', 'serve', 'timeout', 'partchment', 'cupscorecomments', 'coffeequality', 'acidities', 'bodies', 'flavours', 'screensanalysis', 'partchment_types', 'coffeeclass'));

    }

    public function addQualityDetails2 (Request $request){
  
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

			$coffeeclass = CoffeeClass::all(['id', 'cc_name']);
			
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

			$partchment_types = ParchmentType::orderBy('pty_name', 'ASC')->get();

  		}

    	return View::make('cataloguequalitydetails', compact('id', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'largest', 'greensize', 'greencolor', 'greendefects', 'processing', 'cupscore', 'rawscore', 'screens', 'seller', 'sale', 'sale_lots', 'sale_season', 'cid', 'sale_id', 'seller_id', 'cupscorecomments', 'partchment', 'coffeequality', 'screensanalysis', 'partchment_types', 'coffeeclass'));

    
    }

    public function getLots( $season, $st_id, $direction ,  $outt_number, $coffee_grade)
    {

    	if ($direction == 'null') {

			$sale_lots= DB::table('stock_mill_st AS st')
			->select('*', 'st.id as st_id', DB::Raw('GROUP_CONCAT(DISTINCT `grcm`.`qp_id` SEPARATOR ",") as qualityParameterID'), DB::Raw('GROUP_CONCAT(DISTINCT `ccmts`.`qp_id` SEPARATOR ",") as qualityParameterCupID'), DB::Raw('CONCAT("[", GROUP_CONCAT(DISTINCT   CONCAT("{\'",`qanl`.`acat_id`,"\':\'",`qanl`.`qanl_value`,"\'}") SEPARATOR ","),"]") as qualityParameterSCRID'))
			->from('stock_mill_st AS st')
			->leftJoin('parchment_type_pty AS pty', 'pty.id', '=', 'st.pty_id')
			// ->leftJoin('coffee_grade_cgrad AS cgrad', 'cgrad.id', '=', 'st.cgrad_id')
			// ->leftJoin('coffee_certification_ccrt AS ccrt', 'ccrt.st_id', '=', 'st.id')
			// ->leftJoin('certification_crt AS crt', 'ccrt.crt_id', '=', 'crt.id')
			// ->leftJoin('seller_slr AS slr', 'st.slr_id', '=', 'slr.id')
			->leftJoin('green_comments_grcm AS grcm', 'grcm.st_mill_id', '=', 'st.id')
			->leftJoin('cup_comments AS ccmts', 'ccmts.st_mill_id', '=', 'st.id')
			->leftJoin('quality_parameters_qp AS qp', 'qp.id', '=', 'grcm.qp_id')
			->leftJoin('qualty_details_qltyd AS qltyd', 'qltyd.st_mill_id', '=', 'st.id')
			->leftJoin('quality_analysis_qanl AS qanl', 'qltyd.id', '=', 'qanl.qltyd_id')
			->leftJoin('processing_prcss AS prcss', 'qltyd.prcss_id', '=', 'prcss.id')
			->leftJoin('screens_scr AS scr', 'qltyd.scr_id', '=', 'scr.id')
			->leftJoin('cup_score_cp AS cp', 'qltyd.cp_id', '=', 'cp.id')
			->leftJoin('raw_score_rw AS rw', 'qltyd.rw_id', '=', 'rw.id')
			->leftJoin('coffee_growers_cgr AS cgr', 'st.cgr_id', '=', 'cgr.id')
			->leftJoin('coffee_seasons_csn AS csn', 'st.csn_id', '=', 'csn.id')
			->whereRaw('Date(st.created_at) = CURDATE()')
	            // ->where('csn.id', $season)
	            // ->where('st.st_outturn', $outt_number)
	            // ->where('st.pty_id', $coffee_grade)
	            ->groupBy('st.id')
	            ->first();

    	} else if ($direction == "Next") {

    		$st_id = $st_id + 1;

			$sale_lots= DB::table('stock_mill_st AS st')
			->select('*', 'st.id as st_id', DB::Raw('GROUP_CONCAT(DISTINCT `grcm`.`qp_id` SEPARATOR ",") as qualityParameterID'), DB::Raw('GROUP_CONCAT(DISTINCT `ccmts`.`qp_id` SEPARATOR ",") as qualityParameterCupID'), DB::Raw('CONCAT("[", GROUP_CONCAT(DISTINCT   CONCAT("{\'",`qanl`.`acat_id`,"\':\'",`qanl`.`qanl_value`,"\'}") SEPARATOR ","),"]") as qualityParameterSCRID'))
			->from('stock_mill_st AS st')
			->leftJoin('parchment_type_pty AS pty', 'pty.id', '=', 'st.pty_id')
			// ->leftJoin('coffee_grade_cgrad AS cgrad', 'cgrad.id', '=', 'st.cgrad_id')
			// ->leftJoin('coffee_certification_ccrt AS ccrt', 'ccrt.st_id', '=', 'st.id')
			// ->leftJoin('certification_crt AS crt', 'ccrt.crt_id', '=', 'crt.id')
			// ->leftJoin('seller_slr AS slr', 'st.slr_id', '=', 'slr.id')
			->leftJoin('green_comments_grcm AS grcm', 'grcm.st_mill_id', '=', 'st.id')
			->leftJoin('cup_comments AS ccmts', 'ccmts.st_mill_id', '=', 'st.id')
			->leftJoin('quality_parameters_qp AS qp', 'qp.id', '=', 'grcm.qp_id')
			->leftJoin('qualty_details_qltyd AS qltyd', 'qltyd.st_mill_id', '=', 'st.id')
			->leftJoin('quality_analysis_qanl AS qanl', 'qltyd.id', '=', 'qanl.qltyd_id')
			->leftJoin('processing_prcss AS prcss', 'qltyd.prcss_id', '=', 'prcss.id')
			->leftJoin('screens_scr AS scr', 'qltyd.scr_id', '=', 'scr.id')
			->leftJoin('cup_score_cp AS cp', 'qltyd.cp_id', '=', 'cp.id')
			->leftJoin('raw_score_rw AS rw', 'qltyd.rw_id', '=', 'rw.id')
			->leftJoin('coffee_growers_cgr AS cgr', 'st.cgr_id', '=', 'cgr.id')
			->leftJoin('coffee_seasons_csn AS csn', 'st.csn_id', '=', 'csn.id')
	            // ->where('csn.id', $season)
				// ->where('st.st_outturn', $outt_number)
				->where('st.id', $st_id)
	            // ->where('st.pty_id', $coffee_grade)
	            ->groupBy('st.id')
	            ->first();

    	} else if ($direction == "Previous") {

    		$st_id = $st_id - 1;

			$sale_lots= DB::table('stock_mill_st AS st')
			->select('*', 'st.id as st_id', DB::Raw('GROUP_CONCAT(DISTINCT `grcm`.`qp_id` SEPARATOR ",") as qualityParameterID'), DB::Raw('GROUP_CONCAT(DISTINCT `ccmts`.`qp_id` SEPARATOR ",") as qualityParameterCupID'), DB::Raw('CONCAT("[", GROUP_CONCAT(DISTINCT   CONCAT("{\'",`qanl`.`acat_id`,"\':\'",`qanl`.`qanl_value`,"\'}") SEPARATOR ","),"]") as qualityParameterSCRID'))
			->from('stock_mill_st AS st')
			->leftJoin('parchment_type_pty AS pty', 'pty.id', '=', 'st.pty_id')
			// ->leftJoin('coffee_grade_cgrad AS cgrad', 'cgrad.id', '=', 'st.cgrad_id')
			// ->leftJoin('coffee_certification_ccrt AS ccrt', 'ccrt.st_id', '=', 'st.id')
			// ->leftJoin('certification_crt AS crt', 'ccrt.crt_id', '=', 'crt.id')
			// ->leftJoin('seller_slr AS slr', 'st.slr_id', '=', 'slr.id')
			->leftJoin('green_comments_grcm AS grcm', 'grcm.st_mill_id', '=', 'st.id')
			->leftJoin('cup_comments AS ccmts', 'ccmts.st_mill_id', '=', 'st.id')
			->leftJoin('quality_parameters_qp AS qp', 'qp.id', '=', 'grcm.qp_id')
			->leftJoin('qualty_details_qltyd AS qltyd', 'qltyd.st_mill_id', '=', 'st.id')
			->leftJoin('quality_analysis_qanl AS qanl', 'qltyd.id', '=', 'qanl.qltyd_id')
			->leftJoin('processing_prcss AS prcss', 'qltyd.prcss_id', '=', 'prcss.id')
			->leftJoin('screens_scr AS scr', 'qltyd.scr_id', '=', 'scr.id')
			->leftJoin('cup_score_cp AS cp', 'qltyd.cp_id', '=', 'cp.id')
			->leftJoin('raw_score_rw AS rw', 'qltyd.rw_id', '=', 'rw.id')
			->leftJoin('coffee_growers_cgr AS cgr', 'st.cgr_id', '=', 'cgr.id')
			->leftJoin('coffee_seasons_csn AS csn', 'st.csn_id', '=', 'csn.id')
	            // ->where('csn.id', $season)
				// ->where('st.st_outturn', $outt_number)
				->where('st.id', $st_id)
	            // ->where('st.pty_id', $coffee_grade)
	            ->groupBy('st.id')
	            ->first();

    	} else if ($direction == "Search") {

	        $sale_lots= DB::table('stock_mill_st AS st')
			->select('*', 'st.id as st_id', DB::Raw('GROUP_CONCAT(DISTINCT `grcm`.`qp_id` SEPARATOR ",") as qualityParameterID'), DB::Raw('GROUP_CONCAT(DISTINCT `ccmts`.`qp_id` SEPARATOR ",") as qualityParameterCupID'), DB::Raw('CONCAT("[", GROUP_CONCAT(DISTINCT   CONCAT("{\'",`qanl`.`acat_id`,"\':\'",`qanl`.`qanl_value`,"\'}") SEPARATOR ","),"]") as qualityParameterSCRID'))
				
				->leftJoin('parchment_type_pty AS pty', 'pty.id', '=', 'st.pty_id')
				// ->leftJoin('coffee_grade_cgrad AS cgrad', 'cgrad.id', '=', 'st.cgrad_id')
				// ->leftJoin('coffee_certification_ccrt AS ccrt', 'ccrt.st_id', '=', 'st.id')
				// ->leftJoin('certification_crt AS crt', 'ccrt.crt_id', '=', 'crt.id')
				// ->leftJoin('seller_slr AS slr', 'st.slr_id', '=', 'slr.id')
				->leftJoin('green_comments_grcm AS grcm', 'grcm.st_mill_id', '=', 'st.id')
				->leftJoin('cup_comments AS ccmts', 'ccmts.st_mill_id', '=', 'st.id')
				->leftJoin('quality_parameters_qp AS qp', 'qp.id', '=', 'grcm.qp_id')
				->leftJoin('qualty_details_qltyd AS qltyd', 'qltyd.st_mill_id', '=', 'st.id')
				->leftJoin('quality_analysis_qanl AS qanl', 'qltyd.id', '=', 'qanl.qltyd_id')
				->leftJoin('processing_prcss AS prcss', 'qltyd.prcss_id', '=', 'prcss.id')
				->leftJoin('screens_scr AS scr', 'qltyd.scr_id', '=', 'scr.id')
				->leftJoin('cup_score_cp AS cp', 'qltyd.cp_id', '=', 'cp.id')
				->leftJoin('raw_score_rw AS rw', 'qltyd.rw_id', '=', 'rw.id')
				->leftJoin('coffee_growers_cgr AS cgr', 'st.cgr_id', '=', 'cgr.id')
	            ->leftJoin('coffee_seasons_csn AS csn', 'st.csn_id', '=', 'csn.id')
	            ->where('csn.id', $season)
				->where('st.st_outturn', $outt_number)
	            ->where('st.pty_id', $coffee_grade)
	            ->groupBy('st.id')
	            ->first();

    	}        
		
        return json_encode($sale_lots);

    }

    public function saveGreen($st_id, $dnt, $greensize, $greencolor, $greendefects, $raw, $comments)
    {
        try{
		    	

				$raw = json_decode($raw);
				
				$greensize = json_decode($greensize);
		     	$greencolor =  json_decode($greencolor);
		     	$greendefects =  json_decode($greendefects);
		     	 
				$qdetails = quality_details::where('st_mill_id', $st_id)->first(); 

		    	

				if ($comments == 'null') {

					$comments = null;

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
						->update(['rw_quality'=> $raw_current, 'qltyd_comments'=> $comments]);
					
					Activity::log('Updated quality for st_id'.$st_id. ' with rw_quality '. $raw_current.' comments '.$comments);

					
				} else {

					quality_details::insert(
					    ['st_id' => $st_id, 'rw_quality'=> $raw_current, 'qltyd_comments'=> $comments]
					);

					Activity::log('Added quality for st_id'.$st_id. ' with  rw_quality '. $raw_current. ' comments '.$comments);

				}
				

				if ($dnt != 'null') {

					quality_details::where('id', '=', $qid)
						->update(['dont'=> "1"]);	

				} else {

					quality_details::where('id', '=', $qid)
						->update(['dont'=> null]);	

				}

			

		 	 if($st_id != NULL){

		     	$greencomments = greencomments::where('st_mill_id', $st_id)->get();

		 		if($greencomments != NULL){
			     	foreach ($greencomments as $key => $value) {
			     		$greencommentsdel = greencomments::find($value->id);	
			     		$greencommentsdel->delete(); 
			     	}

		 		}

		     	 if ($greensize != NULL) {
			     	 foreach ($greensize as $key => $value) {
						greencomments::insert(
							['st_mill_id' => $st_id, 'qp_id' =>  $value]);  
						Activity::log('Added Quality For Coffee ID '.$st_id. ' with quality ID '.$value);		     	 			     		
			     	 	
			     	 }
		     	 }
		     	 if ($greencolor != NULL) {
			     	 foreach ($greencolor as $key => $value) {
						greencomments::insert(
							['st_mill_id' => $st_id, 'qp_id' =>  $value]);  
						Activity::log('Added Quality For Coffee ID '.$st_id. ' with quality ID '.$value); 			     	 	
			     	 }
			     }
			     if ($greendefects != NULL) {
			     	 foreach ($greendefects as $key => $value) {
						greencomments::insert(
							['st_mill_id' => $st_id, 'qp_id' =>  $value]);  
						Activity::log('Added Quality For Coffee ID '.$st_id. ' with quality ID '.$value);   	 		
		     	 		     				     	 	
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

	public function saveParchment($st_id, $dnt, $parchmentdesc)
    {
        try{
		    	$parchmentdesc = json_decode($parchmentdesc);
		     	 
				//$cdetails = stock_st::where('id', $st_id)->first();
			

		    	$qdetails = quality_details::where('st_mill_id', $st_id)->first(); 
			
				
		    	foreach ($parchmentdesc as $key => $value) {

		    		$parchment = $value;
		    		
		    	}
				if(empty($parchment)){
					$parchment=null;
				}
		        if ($qdetails != NULL) {
				 	
				 	$qid = $qdetails->id;

					quality_details::where('id', '=', $qid)
						->update(['pct_id' => $parchment]);
					
					Activity::log('Updated arrival quality for st_id'.$st_id. ' with parchment quality '. $parchment);

				} else {

					quality_details::insert(
					    ['st_mill_id' => $st_id,'pct_id' => $parchment]
					);

					Activity::log('Added arrival quality for st_id'.$st_id. ' with parchment quality '. $parchment);

				}
				
				$qdetails = quality_details::where('st_mill_id', $st_id)->first(); 

			
		        if ($qdetails != NULL) {
				 	
				 	$qid = $qdetails->id;
				if ($dnt != 'null') {

					quality_details::where('id', '=', $qid)
						->update(['dont'=> "1"]);	

				} else {

					quality_details::where('id', '=', $qid)
						->update(['dont'=> null]);	

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


    public function saveScreen(Request $request)
    {	
        try{
			$screendetails = $request->screens;
			$st_id = $request->st_id;
			$qdetails = quality_details::where('st_mill_id', $st_id)->first(); 
			
			if ($qdetails != NULL) {
				 
				$qid = $qdetails->id;

		   } else {

			   $qid = quality_details::insertGetId(
				   ['st_mill_id' => $st_id]
			   );

			   Activity::log('Added arrival quality for st_id '.$st_id);

		   }
			
			//update screen details	
			foreach ($screendetails as $key => $value) {
				
				$acatid = key($value);
				$screen_size = $value[$acatid];
				
				$qadetails = QualityAnalysis::where('qltyd_id', $qid)->where('acat_id', $acatid)->first(); 
			
				if ($qadetails != NULL) {
					 
					$qanlid = $qadetails->id;
	
					QualityAnalysis::where('id', '=', $qanlid)->where('acat_id', $acatid)
					->update(['qanl_value'=> $screen_size]);
				   
				   Activity::log('Updated screen quality for quality id '.$qid. ' with analysis id '.$acatid.' and screen size '. $screen_size);
	
			   } else {
	
				QualityAnalysis::insert(
					['acat_id' => $acatid, 'qltyd_id' => $qid,  'qanl_value' =>  $screen_size ]
				);
	
				   Activity::log('Added arrival quality for screens for quality id '.$qid .' with acat_id '. $acatid . ' screen value '. $screen_size);
	
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
	
	public function saveScreenA(Request $request)
    {	
        try{
			$screendetails = $request->screens;
			$st_id = $request->st_id;
			$qdetails = quality_details::where('st_mill_id', $st_id)->first(); 
			
			if ($qdetails != NULL) {
				 
				$qid = $qdetails->id;

		   } else {

			   $qid = quality_details::insertGetId(
				   ['st_mill_id' => $st_id]
			   );

			   Activity::log('Added arrival quality for st_id '.$st_id);

		   }
			
			//update screen details	
			foreach ($screendetails as $key => $value) {
				
				$acatid = $value["id"];
				$screen_size = $value["screensize"];
				
				$qadetails = QualityAnalysis::where('qltyd_id', $qid)->where('acat_id', $acatid)->first(); 
			
				if ($qadetails != NULL) {
					 
					$qanlid = $qadetails->id;
	
					QualityAnalysis::where('id', '=', $qanlid)->where('acat_id', $acatid)
					->update(['qanl_value'=> $screen_size]);
				   
				   Activity::log('Updated screen quality for quality id '.$qid. ' with analysis id '.$acatid.' and screen size '. $screen_size);
	
			   } else {
	
				QualityAnalysis::insert(
					['acat_id' => $acatid, 'qltyd_id' => $qid,  'qanl_value' =>  $screen_size ]
				);
	
				   Activity::log('Added arrival quality for screens for quality id '.$qid .' with acat_id '. $acatid . ' screen value '. $screen_size);
	
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

    public function saveCup(Request $request)
    {

        try{
				$data = (object)$request->datacup;
				$flavour = $data->flavour;
				$acidity = $data->acidity;
				$body = $data->body;
				$cup = $data->cup;
				$cupclass = $data->cupclass;
				$comments = $data->comments_cp;
				$st_id = $request->st_id;
				$dnt = $data->dnt_cp;

		    	$qdetails = quality_details::where('st_mill_id', $st_id)->first(); 

				if ($comments == 'null') {

					$comments = null;

				}		    	

		    	foreach ($cup as $key => $value) {

		    		$cup_current = $value;
		    		
		    	}
				if(empty($cup)){
					$cup_current=null;
				}
				foreach ($cupclass as $key => $value) {

		    		$cupclass_current = $value;
		    		
		    	}
				if(empty($cupclass)){
					$cupclass_current=null;
				}
		        if ($qdetails != NULL) {
				 	
				 	$qid = $qdetails->id;

					quality_details::where('id', '=', $qid)
						->update(['cup_quality'=> $cup_current, 'cup_class'=> $cupclass_current, 'qltyd_comments'=> $comments]);
					
					Activity::log('Updated quality for st_id'.$st_id. ' with rw_quality '. $cup_current.' comments '.$comments. 'cup_class' . $cupclass_current);

					
				} else {

					quality_details::insert(
					    ['st_mill_id' => $st_id, 'cup_quality'=> $cup_current, 'qltyd_comments'=> $comments, 'cup_class'=> $cupclass_current]
					);

					Activity::log('Added quality for st_id'.$st_id. ' with  rw_quality '. $cup_current. ' comments '.$comments. 'cup_class' . $cupclass_current);

				}
				

				if ($dnt != null) {

					quality_details::where('id', '=', $qid)
						->update(['dont'=> "1"]);	

				} else {
					
					quality_details::where('id', '=', $qid)
						->update(['dont'=> null]);	

				}

			

		 	 if($st_id != NULL){

		     	$cupcomments = cupcomments::where('st_mill_id', $st_id)->get();

		 		if($cupcomments != NULL){
			     	foreach ($cupcomments as $key => $value) {
			     		$cupcommentsdel = cupcomments::find($value->id);	
			     		$cupcommentsdel->delete(); 
			     	}

		 		}

		     	 if ($acidity != NULL) {
			     	 foreach ($acidity as $key => $value) {
						cupcomments::insert(
							['st_mill_id' => $st_id, 'qp_id' =>  $value]);  
						Activity::log('Added cup acidity Quality For Coffee ID '.$st_id. ' with quality ID '.$value);		     	 			     		
			     	 	
			     	 }
		     	 }
		     	 if ($body != NULL) {
			     	 foreach ($body as $key => $value) {
						cupcomments::insert(
							['st_mill_id' => $st_id, 'qp_id' =>  $value]);  
						Activity::log('Added cup body Quality For Coffee ID '.$st_id. ' with quality ID '.$value); 			     	 	
			     	 }
			     }
			     if ($flavour != NULL) {
			     	 foreach ($flavour as $key => $value) {
						cupcomments::insert(
							['st_mill_id' => $st_id, 'qp_id' =>  $value]);  
						Activity::log('Added cup flavour Quality For Coffee ID '.$st_id. ' with quality ID '.$value);   	 		
		     	 		     				     	 	
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

		$coffeequality = quality_parameters::where('qg_id', '11')->get();

		$partchment = quality_parameters::where('qg_id', '13')->orderBy('qp_parameter', 'ASC')->get();

		$coffee_class_cc = CoffeeClass::all(['id', 'cc_name']);

    	$slr = Input::get('seller'); 

        if (NULL !== Input::get('submitlot')){
	     	 $this->validate($request, [
		            'country' => 'required',  'sale_season' => 'required'
		        ]);
			
			
	     	 $country = Input::get('country');
	     	 $season = Input::get('sale_season');
	     	
	     	 $outturn = Input::get('outt_number');
	     	 $mark = Input::get('coffee_grower');

	     	 $process_type = Input::get('process_type');
	     	 $process = Input::get('process');
	     	 $screen_size = Input::get('screen_size');
	     	 $screen = Input::get('screen');
	     	 $cup = Input::get('cup');
	     	 $raw = Input::get('raw');
	     	 $comments = Input::get('comments');
			
			 $partchment = Input::get('ptdesc');
	     	 $grade = Input::get('coffee_grade');
	     	 $gradekgs = Input::get('grade_kilograms');
	     	 $bags = $gradekgs / 60;
	     	 $pkts = $gradekgs % 69;
	     	 $warehouse = Input::get('Warehouse');
	     	 $mill = Input::get('mill');
	     	 $Cert = Input::get('Certification');
	     	

		

			// if ($cdetails != NULL) {

		    //  	$coffeeid = $cdetails->id;

			// }

			$green_size = Input::get('green_size');
			$green_color = Input::get('green_color');
			$green_defects = Input::get('green_defects');
			$processing_type = Input::get('processing_type');
			$processing_value = Input::get('processing_value');
			$partchment = Input::get('ptdesc');
			$comments = Input::get('comments');
			$raw_score = Input::get('raw_score');
			$lotsid = Input::get('lotsid');
			$screen_type = Input::get('screen_type');
			$screen_value = Input::get('screen_value');
			$screen_class = Input::get('screen_class');
			$cup_comments = Input::get('cup_comments');
			$milling_loss = Input::get('milling_loss');
			$cup_score_cmt = Input::get('cup_score_cmt'); 
			$cup_score = Input::get('cup_score');
			$dont = Input::get('dont');
	
			
			$acidity = Input::get('acidity');
			$body = Input::get('body');
			$flavour = Input::get('flavour');
			$cup_quality = Input::get('cup_quality');
			$overall_class = Input::get('overall_class');

			

			if ($green_size != NULL || $green_color != NULL || $green_defects != NULL) {	

				foreach ($green_size as $key => $value) {
					$greencomments = greencomments::where('st_mill_id', $key)->get();
					
					foreach ($greencomments as $key2 => $value2) {
						$greencomments2 = greencomments::where('st_mill_id', $value2->st_id)->where('qp_id', $value2->qp_id)->first();
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
							['st_mill_id' => $key, 'qp_id' =>  $value]); 
							Activity::log('Added Quality For Coffee ID '.$key. ' with quality ID '.$value);
						}					
					}				
				}
				if ($green_color != NULL) {
					foreach ($green_color as $key => $value) {
						if ($value != NULL) {
							greencomments::insert(
							['st_mill_id' => $key, 'qp_id' =>  $value]); 
							Activity::log('Added Quality For Coffee ID '.$key. ' with quality ID '.$value);
						}					
					}				
				}
				if ($green_defects != NULL) {
					foreach ($green_defects as $key => $value) {
							if ($value != NULL && is_array($value)) {
								foreach ($value as $key2 => $value2) {
									greencomments::insert(
									['st_mill_id' => $key, 'qp_id' =>  $value2]); 
									Activity::log('Added Quality For Coffee ID '.$key. ' with quality ID '.$value2);
								}						
							} else{
								greencomments::insert(
								['st_mill_id' => $key, 'qp_id' =>  $value]); 
								Activity::log('Added Quality For Coffee ID '.$key. ' with quality ID '.$value);								
							}
					}
				}
			}



			if ($dont != NULL) {
				
				foreach ($dont as $key => $value) {

					if ($value != NULL) {
						
						echo "<br>";
						quality_details::where('id', '=', $key)
									->update(['dont'=> "1"]);	

						// $qdetails = quality_details::where('st_id', $key)->first(); 
						// if($qdetails != NULL){
						// 	$qid = $qdetails->id;
						// 	quality_details::where('id', '=', $qid)
						// 		->update(['cp_id' => $value]);

						// } else {
						// 	quality_details::insert(
						// 		['st_id' => $key,'cp_id' => $$value]);
						// }						
					} else {

						quality_details::where('id', '=', $key)
									->update(['dont'=> "0"]);	
					}				
				}				
			}	

			if ($acidity != NULL || $body != NULL || $flavour != NULL) {	

				foreach ($acidity as $key => $value) {
					$cupcomments = cupcomments::where('st_mill_id', $key)->get();
					
					foreach ($cupcomments as $key2 => $value2) {
						$cupcomments2 = cupcomments::where('st_mill_id', $value2->st_id)->where('qp_id', $value2->qp_id)->first();
						if ($cupcomments2 != NULL) {
							$cupcommentsdel = cupcomments::findOrFail($cupcomments2->id);	
							$cupcommentsdel->delete(); 
						}
					}

				}
				
				if ($acidity != NULL) {
					
					foreach ($acidity as $key => $value) {
						foreach($value as $key2 => $value2){
						if ($value2 != NULL) {
							cupcomments::insert(
							['st_mill_id' => $key, 'qp_id' =>  $value2]); 
							Activity::log('Added Quality For Coffee ID '.$key. ' with quality ID '.$value2);
						}
					}					
					}				
				}
				if ($body != NULL) {
					foreach ($body as $key => $value) {
						foreach($value as $key2 => $value2){
							if ($value2 != NULL) {
								cupcomments::insert(
								['st_mill_id' => $key, 'qp_id' =>  $value2]); 
								Activity::log('Added Quality For Coffee ID '.$key. ' with quality ID '.$value2);
							}					
					}				
				}
				}
				if ($flavour != NULL) {
					foreach ($flavour as $key => $value) {
						foreach($value as $key2 => $value2){
							if ($value2 != NULL) {
								cupcomments::insert(
								['st_mill_id' => $key, 'qp_id' =>  $value2]); 
								Activity::log('Added Quality For Coffee ID '.$key. ' with quality ID '.$value2);
							}
					}
				}
			}
		}

			
		
			if ($comments != NULL) {
				foreach ($comments as $key => $value) {
					if ($value != NULL) {
						$qdetails = quality_details::where('st_mill_id', $key)->first(); 
						if($qdetails != NULL){
							$qid = $qdetails->id;
							quality_details::where('id', '=', $qid)
								->update(['qltyd_comments' => $value]);

						} else {
							quality_details::insert(
								['st_mill_id' => $key,'qltyd_comments' => $value]);
						}						
					}					
				}				
			}
			
			if ($milling_loss != NULL) {
				foreach ($milling_loss as $key => $value) {
					if ($value != NULL) {
						$qdetails = quality_details::where('st_mill_id', $key)->first(); 
						if($qdetails != NULL){
							$qid = $qdetails->id;
							quality_details::where('id', '=', $qid)
								->update(['ml' => $value]);

						} else {
							quality_details::insert(
								['st_mill_id' => $key,'ml' => $value]);
						}						
					}					
				}				
			}

			if ($raw_score != NULL) {
				foreach ($raw_score as $key => $value) {
					if ($value != NULL) {
						$qdetails = quality_details::where('st_mill_id', $key)->first(); 
						if($qdetails != NULL){
							$qid = $qdetails->id;
							quality_details::where('id', '=', $qid)
								->update(['rw_quality' => $value]);

						} else {
							quality_details::insert(
								['st_mill_id' => $key,'rw_quality' => $value]);
						}						
					}					
				}				
			}
			
			if ($cup_quality != NULL) {
				foreach ($cup_quality as $key => $value) {
					if ($value != NULL) {
						$qdetails = quality_details::where('st_mill_id', $key)->first(); 
						if($qdetails != NULL){
							$qid = $qdetails->id;
							quality_details::where('id', '=', $qid)
								->update(['cup_quality' => $value]);

						} else {
							quality_details::insert(
								['st_mill_id' => $key,'cup_quality' => $value]);
						}						
					}					
				}				
			}
			
			if ($overall_class != NULL) {
				
				foreach ($overall_class as $key => $value) {
					if ($value != NULL) {
						$qdetails = quality_details::where('st_mill_id', $key)->first();
						
						if($qdetails != NULL){
							$qid = $qdetails->id;
							quality_details::where('id', '=', $qid)
								->update(['overall_class' => $value]);

						} else {
							quality_details::insert(
								['st_mill_id' => $key,'overall_class' => $value]);
						}						
					}					
				}				
			}

			if ($partchment != NULL) {
				
				foreach ($partchment as $key => $value) {
						if ($value != NULL && is_array($value)) {
							foreach ($value as $key2 => $value2) {

						$pdetails = partchment_comments::where('st_mill_id', $key)->where('qp_id',  $value2)->first(); 
						if($pdetails != NULL){
							$qid = $pdetails->id;
							partchment_comments::where('id', '=', $qid)
								->update(['st_mill_id' => $key, 'qp_id' =>  $value2]);

						} else {
							partchment_comments::insert(
								['st_mill_id' => $key, 'qp_id' =>  $value2]); 
							}
							}						
						} else{
							$pdetails = partchment_comments::where('st_mill_id', $key)->where('qp_id',  $value2)->first(); 
							if($pdetails != NULL){
								$qid = $pdetails->id;
								partchment_comments::where('id', '=', $qid)
									->update(['st_mill_id' => $key, 'qp_id' =>  $value2]);
	
							} else {
								partchment_comments::insert(
									['st_mill_id' => $key, 'qp_id' =>  $value2]); 
								}								
						}
				}
			}



			if ($screen_type != NULL) {
				foreach ($screen_type as $key => $value) {
					if ($value != NULL) {
						$qdetails = quality_details::where('st_mill_id', $key)->first(); 
						if($qdetails != NULL){
							$qid = $qdetails->id;
							quality_details::where('id', '=', $qid)
								->update(['scr_id' => $value]);

						} else {
							quality_details::insert(
								['st_mill_id' => $key,'scr_id' => $value]);
						}						
					}					
				}				
			}

			if ($screen_value != NULL) {
				
				foreach($screen_value as $acatid => $st_ids){
					foreach($st_ids as $st_id => $value){
						if($value!=null&&!empty($value)){
						
							$qdetails = quality_details::where('st_mill_id', $st_id)->first(); 
			
							if ($qdetails != NULL) {
								
								$qid = $qdetails->id;

						} else {

							$qid = quality_details::insertGetId(
								['st_mill_id' => $st_id]
							);

							Activity::log('Added arrival quality for st_id '.$st_id);

						}
						//insert details
						$screen_size = $value;
						
						$qadetails = QualityAnalysis::where('qltyd_id', $qid)->where('acat_id', $acatid)->first(); 
					
						if ($qadetails != NULL) {
							 
							$qanlid = $qadetails->id;
			
							QualityAnalysis::where('id', '=', $qanlid)->where('acacataloguequaltt_id', $acatid)
							->update(['qanl_value'=> $screen_size]);
						   
						   Activity::log('Updated screen quality for quality id '.$qid. ' with analysis id '.$acatid.' and screen size '. $screen_size);
			
					   } else {
			
						QualityAnalysis::insert(
							['acat_id' => $acatid, 'qltyd_id' => $qid,  'qanl_value' =>  $screen_size ]
						);
			
						   Activity::log('Added arrival quality for screens for quality id '.$qid .' with acat_id '. $acatid . ' screen value '. $screen_size);
			
					   }
						}
					}
				}
				
			
						
			}	

			if ($screen_class != NULL) {
				
				foreach($screen_class as $acatid => $st_ids){
					$value=null;
					foreach($st_ids as $st_id => $value){
						
						if($value!=null){
							$qdetails = quality_details::where('st_mill_id', $st_id)->first(); 
			
							if ($qdetails != NULL) {
								
								$qid = $qdetails->id;

						} else {

							$qid = quality_details::insertGetId(
								['st_mill_id' => $st_id]
							);

							Activity::log('Added arrival quality for st_id '.$st_id);

						}
						//insert details
						$screen_class = $value;
						
						$qadetails = QualityAnalysis::where('qltyd_id', $qid)->where('acat_id', $acatid)->first(); 
					
						if ($qadetails != NULL) {
							 
							$qanlid = $qadetails->id;
			
							QualityAnalysis::where('id', '=', $qanlid)->where('acat_id', $acatid)
							->update(['qanl_value'=> $screen_class]);
						   
						   Activity::log('Updated screen quality for quality id '.$qid. ' with analysis id '.$acatid.' and screen class '. $screen_class);
			
					   } else {
			
						QualityAnalysis::insert(
							['acat_id' => $acatid, 'qltyd_id' => $qid,  'qanl_value' =>  $screen_class ]
						);
			
						   Activity::log('Added arrival quality for screens for quality id '.$qid .' with acat_id '. $acatid . ' screen_class '. $screen_class);
			
					   }
						}
					}
				}
				
			
						
			}

			if ($cup_comments != NULL) {
				foreach ($cup_comments as $key => $value) {
					if ($value != NULL) {
						$qdetails = quality_details::where('st_mill_id', $key)->first(); 
						if($qdetails != NULL){
							$qid = $qdetails->id;
							quality_details::where('id', '=', $qid)
								->update(['qltyd_comments' => $value]);

						} else {
							quality_details::insert(
								['st_mill_id' => $key,'qltyd_comments' => $value]);
						}						
					}					
				}				
			}	

			if ($cup_score_cmt != NULL) {
				foreach ($cup_score_cmt as $key => $value) {
					if ($value != NULL) {
						$qdetails = quality_details::where('st_id', $key)->first(); 
						if($qdetails != NULL){
							$qid = $qdetails->id;
							quality_details::where('id', '=', $qid)
								->update(['cps_id' => $value]);

						} else {
							quality_details::insert(
								['st_mill_id' => $key,'cps_id' => $value]);
						}						
					}					
				}				
			}	
			
			if ($cup_score != NULL) {
				foreach ($cup_score as $key => $value) {
					if ($value != NULL) {
						$qdetails = quality_details::where('st_mill_id', $key)->first(); 
						if($qdetails != NULL){
							$qid = $qdetails->id;
							quality_details::where('id', '=', $qid)
								->update(['cup_class' => $value]);

						} else {
							quality_details::insert(
								['st_mill_id' => $key,'cup_class' => $value]);
						}						
					}					
				}				
			}	



			// if (Input::get('dntv') == Input::get('seller')) {
			// 	coffee_details::where('id', '=', $coffeeid)
			// 				->update(['st_dnt'=> Input::get('dnt')]);			
			// }


			$country = Input::get('country');
			$season = Input::get('sale_season');
			$sale = Input::get('sale');
			$lot = Input::get('sif_lot'); 
			$slr = Input::get('seller'); 
			$coffeeid = NULL;  
			$saleSeasonName = season::where('id', $season)->first();
        	$saleSeasonName = $saleSeasonName->csn_season;
			$parchments = StockViewALL::select('*')->where('csn_season', $saleSeasonName)->first();
			if ($parchments !== NULL) {
				$coffeeid = $parchments->id;
			}
			
			$qdetails = quality_details::where('st_mill_id', $coffeeid)->first();
			$greencomments = greencomments::all(['id', 'st_mill_id', 'qp_id']);

	    	$Season = Season::all(['id', 'csn_season']);
	    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
	    	$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
	    
	    	if(Input::get('country') != NULL){
		       	$Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
		    	$Mill = mills_region::where('ctr_id', Input::get('country'))->get(); 		
		    	
	    	}
	    	$cid = Input::get('country');
			$csn_season = Input::get('sale_season');
		
			$qtype = Input::get('qualityTy');

			// if (Input::get('dntv') == Input::get('seller')) {
			// 	coffee_details::where('id', '=', $coffeeid)
			// 				->update(['st_dnt'=> Input::get('dnt')]);			
			// }
			$cdetails = coffee_details::where('id', $coffeeid)->first();
			$saleSeasonName = season::where('id', $season)->first();
        	$saleSeasonName = $saleSeasonName->csn_season;
			$parchments = StockViewALL::select('*')->where('csn_season', $saleSeasonName)->get();

	    	$partchment = quality_parameters::where('qg_id', '13')->orderBy('qp_parameter', 'ASC')->get();
			
			$acidities = quality_parameters::where('qg_id', '7')->orderBy('qp_parameter', 'ASC')->get();
    	
    		$flavours = quality_parameters::where('qg_id', '10')->orderBy('qp_parameter', 'ASC')->get();

			$bodies = quality_parameters::where('qg_id', '8')->orderBy('qp_parameter', 'ASC')->get();


			$coffee_class_cc = CoffeeClass::all(['id', 'cc_name']);

						return View::make('cataloguequalitydetailslist', compact('id', 
							'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'cdetails', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'slr', 'QualityType', 'qtype', 'cupscorecomments','parchments', 'coffeequality', 'partchment', 'coffee_class_cc', 'acidities', 'flavours', 'bodies'));	


								
					



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

			$saleSeasonName = Season::where('id', $season)->first();
			if($saleSeasonName!=null){
        	$saleSeasonName = $saleSeasonName->csn_season;
			$parchments = StockViewALL::select('*')->where('csn_season', $saleSeasonName)->get();
			}
			$qdetails = quality_details::where('st_mill_id', $coffeeid)->first();
			$greencomments = greencomments::all(['id', 'st_mill_id', 'qp_id']);

	    	$Season = Season::all(['id', 'csn_season']);
	    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
	    	$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
	    	$region = Region::where('ctr_id', Input::get('country'))->get();

	    	if(Input::get('country') != NULL){
		       	$Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
		    	$Mill = mills_region::where('ctr_id', Input::get('country'))->get(); 		
		    
	    	}
	    	$cid = Input::get('country');
			$csn_season = Input::get('sale_season');
		
			$qtype = Input::get('qualityTy');
			$partchment = quality_parameters::where('qg_id', '13')->orderBy('qp_parameter', 'ASC')->get();
			$coffee_class_cc = CoffeeClass::all(['id', 'cc_name']);

			$acidities = quality_parameters::where('qg_id', '7')->orderBy('qp_parameter', 'ASC')->get();
    	
    		$flavours = quality_parameters::where('qg_id', '10')->orderBy('qp_parameter', 'ASC')->get();

			$bodies = quality_parameters::where('qg_id', '8')->orderBy('qp_parameter', 'ASC')->get();

						$request->session()->flash('alert-success', 'Sale Lot Found!!');
						return View::make('cataloguequalitydetailslist', compact('id', 
							'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'cdetails', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'slr', 'QualityType', 'qtype', 'StockView', 'cupscorecomments', 'parchments', 'coffeequality','partchment', 'coffee_class_cc', 'acidities', 'flavours', 'bodies'));	
								
				
    	}
    



    }
    public function getSaleLots($countryID, $saleSeason)
    {
		if ($countryID != null && $saleSeason != null ) {
			
			$saleSeasonName = season::where('id', $saleSeason)->first();
			$saleSeasonName = $saleSeasonName->csn_season;
			
            $parchments = StockMillQuality::select('*')->where('csn_season', $saleSeasonName);
        } else {
        	$parchments = null;
    	}  


    return Datatables::of($parchments)
        ->make(true);
    }
    

}

