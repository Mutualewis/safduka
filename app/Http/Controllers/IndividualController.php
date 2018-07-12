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
use niklasravnsborg\LaravelPdf\Facades\Pdf as PDF;
use Activity;
use Excel;
use Auth;
// use Anouar\Fpdf\Fpdf as Fpdf;

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
use Ngea\basket;
use Ngea\bric;
use Ngea\StockBreakdown;
use Ngea\Location;
use Ngea\BatchView;
use Ngea\StockLocation;
use Ngea\Batch;



use Ngea\greencomments;
use delete;

use Ngea\StockLocationView;
use Ngea\InternalBaskets;


class IndividualController extends Controller {

    public function manageIndividualForm (Request $request){
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

    	return View::make('manageindividual', compact('id', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'largest', 'greensize', 'greencolor', 'greendefects', 'processing', 'cupscore', 'rawscore', 'screens'));

    }

    public function manageIndividual (Request $request){
    	$id = NULL;

    	$Warehouse = NULL;

    	$Mill = NULL;

    	$resultsType = NULL;

    	$Stock = NULL;

    	$StockQuality = NULL;


    	$Season = Season::all(['id', 'csn_season']);

    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
    	
    	$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);

    	$processing = processing::all(['id', 'prcss_name']);

    	$screens = screens::all(['id', 'scr_name']);

    	$cupscore = cupscore::all(['id', 'cp_score', 'cp_quality']);

    	$rawscore = rawscore::all(['id', 'rw_score', 'rw_quality']);

        $basket = InternalBaskets::where('ctr_id', Input::get('country'))->orderBy('ibs_code')->get();

    	$bricbasket = basket::where('ctr_id', Input::get('country'))->orderBy('bs_code')->get();

    	$Certification = Certification::all(['id', 'crt_name']);

        $Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->where('wrt_id', '1')->get();

        $wrhse = Input::get('warehouse');

        if ($wrhse !== NULL) {
            $location = Location::where('wr_id', $wrhse)->get();
        }


    	$slr = Input::get('seller'); 

    	$grade = Input::get('coffee_grade');

    	$prc = Input::get('process_type');

    	$rtid = Input::get('results_type');

    	$outt_number = Input::get('outt_number');

    	$csn_season = Input::get('csn_season');

    	$selected_basket = Input::get('basket');

    	$selected_cup = Input::get('cup');

    	$selected_acidity = Input::get('acidity');

    	$selected_body = Input::get('body');

    	$selected_flavour = Input::get('flavour');

    	$selected_description = Input::get('description');

        $cid = Input::get('country');

        $weight = Input::get('weight');

        $contract = Input::get('contract');

        $valuebric = Input::get('valuebric');

        $bric = Input::get('bric');

        $date = Input::get('date');

        $date=date_create($date);

        $date = date_format($date,"Y-m-d"); 



    	if ($prc != null) {

    		$resultsType = ProcessResultsType::where('prcss_id', $prc)->get();

    	}


    	if ($outt_number != null && $csn_season != null) {

            $query = Stock::select('*');

            $query = $query->where('st_outturn', $outt_number)->where('csn_id', $csn_season)->whereNull('st_ended_by');

            if ($grade != null) {
                $query = $query->where('cgrad_id', $grade);
            }

            if ($rtid != null) {
                $query = $query->where('prt_id', $rtid);
            }
          
            $Stock  = $query->first();
    	}

        if ($Stock != null) {
            $stlocdetails = StockLocationView::where('id', $Stock->id)->first();
        }


        $user_data = Auth::user();

        $user = $user_data->id;    

        $rw = Input::get('row');

        $clm = Input::get('column');

        $zone = Input::get('zone');


		if (NULL !== Input::get('submitlot')){
			$this->validate($request, [
			 'country' => 'required',  'csn_season' => 'required', 
			]);
            $stock_bags    = floor($weight / 60);

            $stock_pockets = $weight % 60;     

            $batch_packages = ceil($weight / 60);     
	     	if ($Stock !== NULL) {
                $stid = $Stock->id;

	     	 	$StockQuality = StockQuality::where('st_id', $Stock->id)->first();

				Stock::where('id', '=', $Stock->id)
                    ->update([ 'ibs_id' => $selected_basket]);

	     	} else {



                $price = null;

                $stid = Stock::insertGetId(['ctr_id' => $cid, 'csn_id' => $csn_season, 'st_outturn' => $outt_number, 'st_name' => $outt_number , 'st_net_weight' => $weight, 'st_bags' => $stock_bags, 'st_pockets' => $stock_pockets, 'usr_id' => $user, 'sts_id' => '2', 'cgrad_id' => $grade, 'prt_id' => $rtid,'bs_id' => $bric,  'ibs_id' => $selected_basket, 'prc_price' => $price]); 
              
                Activity::log('Updated stock for '.$outt_number. ' cid '.$cid.' with csn_season '. $csn_season.' weight '.$weight.' grade ' .$grade.' rtid ' . $rtid.' selected_basket ' . $selected_basket);

                $StockQuality = StockQuality::where('st_id', $stid)->first();
            }

            $brcdetails = bric::where('br_no', $contract)->first();

            $stock_breakdown = StockBreakdown::where('st_id', $stid)->whereNull('cn_id')->first();


            $batchview = BatchView::where('stid', $stid)->first();



            if ($wrhse != null && $rw != null && $clm != null) {

                if ($batchview != null) {

                    Batch::where('id', '=', $batchview->id)
                    ->update(['btc_ended_by' => $user]);
                    
                }

                $btid = Batch::insertGetId (
                    ['st_id' => $stid, 'btc_weight' => $weight,'btc_packages' => $batch_packages, 'btc_net_weight' => $weight,  'btc_bags' => $stock_bags, 'btc_pockets' => $stock_pockets]);

                $locrowdetails = Location::where('wr_id', $wrhse)->where('loc_row', $rw)->first(); 
                $loccoldetails = Location::where('wr_id', $wrhse)->where('loc_column', $clm)->first(); 

                $locrowid = null;
                $loccolid = null;

                if (isset($locrowdetails->id)) {
                    $locrowid = $locrowdetails->id;
                }
                if (isset($loccoldetails->id)) {
                   $loccolid = $loccoldetails->id;
                }                


                $stlocid = StockLocation::insertGetId (
                ['bt_id' => $btid, 'loc_row_id' => $locrowid, 'loc_column_id' => $loccolid, 'btc_zone' => $zone]);
                Activity::log('Inserted StockLocation information with bt_id '.$btid. ' locrowid '. $locrowid. ' loccolid '. $loccolid. ' zone '. $zone);

                Activity::log('Inserted Batch information with btid '.$btid. ' weight '. $weight. ' stock_bags '. $stock_bags. ' pockets '. $stock_pockets. ' stid '. $stid);

            }
            

            if ($contract != null) {

                if ($stock_breakdown == null) {

                    if ($brcdetails != null) {

                        $br_id = $brcdetails->id;

                        $sum_bric_weight = $brcdetails->br_purchased_weight + $weight;

                        $purchase_contract_price = null;
                        $purchase_contract_price_pounds = null;
                        $purchase_contract_differential = null;
                        $purchase_contract_value = null;

                        bric::where('id', '=', $br_id)
                            ->update(['br_no' => $contract,'bs_id' => $bric, 'br_date' => $date, 'br_confirmedby' => $user, 'br_purchased_weight' => $sum_bric_weight, 'br_price_per_fifty' => $purchase_contract_price, 'br_price_pounds' => $purchase_contract_price_pounds, 'br_diffrential' => $purchase_contract_differential, 'br_value' => $purchase_contract_value]);


                        StockBreakdown::insertGetId (
                         ['st_id' => $stid, 'br_id' => $br_id, 'stb_value' => $purchase_contract_value, 'stb_weight' => $sum_bric_weight, 'bs_id' => $bric, 'ibs_id' => $selected_basket, 'stb_bulk_ratio' => '1', 'stb_purchase_contract_ratio' => null, 'cb_id' => '1', 'cgr_id' => '10000001']);

                       
                        Activity::log('Updated bric information with bric no. ' . $contract . ' date ' . $date . ' confirmed by ' . $user. ' sum_bric_weight ' . $sum_bric_weight. ' purchase_contract_price ' . $purchase_contract_price. ' purchase_contract_price_pounds ' . $purchase_contract_price_pounds. ' purchase_contract_differential ' . $purchase_contract_differential. ' purchase_contract_value ' . $purchase_contract_value);

                    } else {

                        $sum_bric_weight = $weight;

                        $purchase_contract_price = null;
                        $purchase_contract_price_pounds = null;
                        $purchase_contract_differential = null;
                        $purchase_contract_value = null;

                        $br_id = bric::insertGetId(
                            ['br_no' => $contract,'bs_id' => $bric, 'br_date' => $date, 'br_confirmedby' => $user, 'br_purchased_weight' => $sum_bric_weight, 'br_price_per_fifty' => $purchase_contract_price, 'br_price_pounds' => $purchase_contract_price_pounds, 'br_diffrential' => $purchase_contract_differential, 'br_value' => $purchase_contract_value]);

                        StockBreakdown::insertGetId (
                         ['st_id' => $stid, 'br_id' => $br_id, 'stb_value' => $purchase_contract_value, 'stb_weight' => $sum_bric_weight, 'bs_id' => $bric, 'ibs_id' => $selected_basket, 'stb_bulk_ratio' => '1', 'stb_purchase_contract_ratio' => null, 'cb_id' => '1', 'cgr_id' => '10000001']);



                        Activity::log('Inserted bric information with bric no. ' . $contract . ' date ' . $date . ' confirmed by ' . $user. ' sum_bric_weight ' . $sum_bric_weight. ' purchase_contract_price ' . $purchase_contract_price. ' purchase_contract_price_pounds ' . $purchase_contract_price_pounds. ' purchase_contract_differential ' . $purchase_contract_differential. ' purchase_contract_value ' . $purchase_contract_value);
                    }

                } else {

                    $request->session()->flash('alert-warning', 'Outturn already has a contract!!');

                    return View::make('manageindividual', compact('id', 
                        'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'cdetails', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'slr', 'basket', 'grade', 'resultsType', 'rtid', 'prc', 'outt_number', 'csn_season', 'StockQuality', 'stock_cup', 'Stock', 'bricbasket', 'wrhse', 'location', 'stlocdetails'));  

                }
            }







			if($StockQuality != NULL){

				$stid = $StockQuality->id;

				StockQuality::where('id', '=', $stid)
					->update(['cp_id' => $selected_cup,  'sqltyd_acidity' =>  $selected_acidity, 'sqltyd_body'=> $selected_body, 'sqltyd_flavour'=> $selected_flavour, 'sqltyd_description'=> $selected_description]);

				Activity::log('Updated quality for '.$Stock->id. ' selected_cup '.$selected_cup.' with selected_acidity '. $selected_acidity.' selected_body '.$selected_body.' selected_flavour ' .$selected_flavour.' selected_description ' . $selected_description);

			} else {

				StockQuality::insert(
				    ['st_id' => $stid,'cp_id' => $selected_cup,  'sqltyd_acidity' =>  $selected_acidity, 'sqltyd_body'=> $selected_body, 'sqltyd_flavour'=> $selected_flavour, 'sqltyd_description'=> $selected_description]
				);

				Activity::log('Added quality for '.$stid. ' selected_cup '.$selected_cup.' with selected_acidity '. $selected_acidity.' selected_body '.$selected_body.' selected_flavour ' .$selected_flavour.' selected_description ' . $selected_description);

			}
	
	    	if ($outt_number != null && $csn_season != null) {

	            $query = Stock::select('*');

	            $query = $query->where('st_outturn', $outt_number)->where('csn_id', $csn_season)->whereNull('st_ended_by');

	            if ($grade != null) {

	                $query = $query->where('cgrad_id', $grade);
	            }

	            if ($rtid != null) {

	                $query = $query->where('prt_id', $rtid);
	            }
	          
	            $Stock  = $query->first();
	    	}


			$StockQuality = StockQuality::where('st_id', $Stock->id)->first();

			if ($StockQuality != null) {

				$stock_cup = cupscore::where('id', $StockQuality->cp_id);
			}
     	

			$request->session()->flash('alert-success', 'Quality Details Added!!');


			return View::make('manageindividual', compact('id', 
				'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'cdetails', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'slr', 'basket', 'grade', 'resultsType', 'rtid', 'prc', 'outt_number', 'csn_season', 'StockQuality', 'stock_cup', 'Stock', 'bricbasket', 'wrhse', 'location', 'stlocdetails'));	     	 

    	} else if(NULL !== Input::get('searchButton')) {

			if ($Stock !== NULL) {

				$StockQuality = StockQuality::where('st_id', $Stock->id)->first();

				if ($StockQuality != null) {

					$stock_cup = cupscore::where('id', $StockQuality->cp_id);
				}

				

				$request->session()->flash('alert-success', 'Outturn Found!!');

				return View::make('manageindividual', compact('id', 
					'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'cdetails', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'slr', 'basket', 'grade', 'resultsType', 'rtid', 'prc', 'outt_number', 'csn_season', 'StockQuality', 'stock_cup', 'Stock', 'bricbasket', 'wrhse', 'location', 'stlocdetails'));	


						
			} else {
				$request->session()->flash('alert-warning', 'Outturn not Found!');


				return View::make('manageindividual', compact('id', 
					'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'slr', 'basket', 'grade', 'resultsType', 'rtid', 'prc', 'outt_number', 'csn_season', 'StockQuality', 'stock_cup', 'Stock', 'bricbasket', 'wrhse', 'location', 'stlocdetails'));	


			}

    	} else if(NULL !== Input::get('printsticker')){

            $this->validate($request, ['country' => 'required', 
            ]);

            $stockViewALL = null;

            if ($Stock !== NULL) {

            	$stockViewALL = StockViewALL::where('id', $Stock->id)->first();

            }

            $sale = $stockViewALL->sale;

            $lot = $stockViewALL->lot;
            
            $outtturn = $stockViewALL->outturn;
            
            $mark = $stockViewALL->mark;
            
            $grade_name = $stockViewALL->grade;
            
            $bags = $stockViewALL->bags;

            $cup_score = $stockViewALL->cp_score;
            
            $acidity = $stockViewALL->acidity;
            
            $body = $stockViewALL->body;
            
            $flavour = $stockViewALL->flavour;

            $internal_basket = $stockViewALL->code;

            $internal_basket_quality = $stockViewALL->quality;
            
            $certification = $stockViewALL->cert;
            
            $season = $stockViewALL->csn_season;

            $description = $stockViewALL->description;
          

			PDF::loadView('pdf.quality', compact('sale',  'lot', 'outtturn', 'mark', 'grade_name', 'bags', 'cup_score',  'acidity', 'body', 'flavour', 'internal_basket', 'certification', 'season', 'process_instructions', 'internal_basket_quality', 'description'), [], [
			  	'orientation' => 'L',
				'margin_left'          => 0,
				'margin_right'         => 0,
				'margin_top'           => 0,
				'margin_bottom'        => 0,
				'margin_header'        => 0,
				'margin_footer'        => 0,
				'format' => 'A4-L'

			])->stream($outtturn .'_'.$grade_name.'_'.$season. '_quality.pdf');

    	} else {
	    	

	    	return View::make('manageindividual', compact('id', 'Season', 'country', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'slr', 'basket', 'grade', 'resultsType', 'rtid', 'prc', 'outt_number', 'csn_season', 'StockQuality', 'stock_cup', 'Stock', 'bricbasket', 'wrhse', 'location', 'stlocdetails'));		
    	}
    
    }

}