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
use Ngea\warrants;

use  Ngea\Warehouse;
use  Ngea\Region;
use Ngea\basket;
use Ngea\sale_status;

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
use Ngea\direct_sale;
use Ngea\quality_parameters;
use Ngea\processing;
use Ngea\screens;
use Ngea\cupscore;
use Ngea\rawscore;
use Ngea\sale_lots;
use Ngea\purchase;
use Ngea\quality_details;
use Ngea\FOB;
use Ngea\invoices;
use Ngea\payment;


use Ngea\greencomments;
use delete;


class DirectPurchaseController extends Controller {


    public function directPurchaseDetailsForm (Request $request){
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
        $buyer = buyer::all(['id', 'cb_name']);

        $processing = processing::where('prcss_auction', '1')->get();
        $screens = screens::all(['id', 'scr_name']);

        $cupscore = cupscore::all(['id', 'cp_score', 'cp_quality']);
        $rawscore = rawscore::all(['id', 'rw_score', 'rw_quality']);

        return View::make('directpurchasedetails', compact('id', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'largest', 'greensize', 'greencolor', 'greendefects', 'processing', 'cupscore', 'rawscore', 'screens'));

    }

    public function directPurchaseDetails (Request $request){
        $id = NULL;

        $Warehouse = NULL;
        $Mill = NULL;


        $greensize = quality_parameters::where('qg_id', '1')->get();
        $greencolor = quality_parameters::where('qg_id', '2')->get();
        $greendefects = quality_parameters::where('qg_id', '3')->get();

        $processing = processing::where('prcss_auction', '1')->get();
        $buyer = buyer::where('bt_id', '1')->get();

        $screens = screens::all(['id', 'scr_name']);
        $fob = FOB::all(['id', 'fob_price']);

        $cupscore = cupscore::all(['id', 'cp_score', 'cp_quality']);
        $rawscore = rawscore::all(['id', 'rw_score', 'rw_quality']);

        $slr = Input::get('seller');


        $Certification = Certification::all(['id', 'crt_name']);

        $saleid = Input::get('sale');

        $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sltyp_id', '2')->orderBy('sl_no')->get();

        if (NULL !== Input::get('confirmpurchase')){

            $this->validate($request, [
                    'country' => 'required',  'sale_season' => 'required',
                ]);
     
            $cid = Input::get('country');
            $sale_season  = Input::get('sale_season');
            $sale = Input::get('sale');

            $count_green = Input::get('count_green');

            $count_process = Input::get('count_process');

            $count_screen = Input::get('count_screen');

            $count_raw = Input::get('count_raw');

            $count_cup = Input::get('count_cup');

            $user_data = Auth::user();
            $user = $user_data ->usr_name;

            $lotid = Input::get('lotid');

            $saleSeasonName = season::where('id', $sale_season)->first();

            $saleSeasonName = $saleSeasonName->csn_season;        

            // foreach ($sale_lots as $key => $value) {

            //     purchase::where('id', '=', $value->prcid)
            //         ->update(['sst_id' => 2]);


            // }

            if ($sale != null && $sale != "Sale No.") {

                $sale_hedge = Sale::where('id', $sale)->first();
                
                $sale_hedge = $sale_hedge->sl_hedge;

                if ($sale_hedge == null || $sale_hedge == "0.000") {

                    return redirect('directpurchasedetails')
                        ->withErrors("Please enter hedge details for sale ".$sale." first!!")
                        ->withInput();
                
                }

                Sale::where('id', '=', $sale)
                    ->update(['sl_auction_confirmedby' => $user]);
                    
            } else {

                for ($i = 0; $i < count($lotid); $i++) {

                    $sales_selected = direct_sale::where('id', $lotid[$i])->first();

                    $sale = $sales_selected->sale;
                    
                    $sales_selected = $sales_selected->slid; 

                    $sale_hedge = Sale::where('id', $sales_selected)->first();
                    
                    $sale_hedge = $sale_hedge->sl_hedge;

                    if ($sale_hedge == null || $sale_hedge == "0.000") {

                        return redirect('directpurchasedetails')
                            ->withErrors("Please enter hedge details for sale ".$sale." first!!")
                            ->withInput();
                    
                    }                    

                    Sale::where('id', '=', $sales_selected)
                        ->update(['sl_auction_confirmedby' => $user]);

                }

            }



            $request->session()->flash('alert-success', 'Direct Purchases Confirmed!!');

            Activity::log('Confirmed direct quality details for sale '.$sale);
            return redirect('directpurchasedetails');

        } else if (NULL !== Input::get('submitlot')){
            $this->validate($request, [
                'country' => 'required', 'sale_season' => 'required',
            ]);

            $country      = Input::get('country');
            $cid      = Input::get('country');
            $sale_season  = Input::get('sale_season');
            $saleid       = Input::get('sale');
            $coffee_buyer = Input::get('coffee_buyer');
            $seller       = Input::get('seller');
            $slr = $seller;
            $total_lots   = Input::get('total_lots');


            $lotid     = Input::get('lotid');
            
            $cprice    = Input::get('cprice');
            
            $fob_selected    = Input::get('fob');
            
            $confirmed = Input::get('confirmed');
            
            $withdrawn = Input::get('withdrawn');

            $coffeeid  = null;

            $confirmed = Input::get('confirmed');


            foreach ($confirmed as $key => $value) {
                // print_r($key);
                $pdetails = purchase::where('cfd_id', $key)->first();
                $pid      = $pdetails->id;



                foreach ($value as $key2 => $value2) {
                    if ($value2 == "1") {
                        //update confirmed
                        purchase::where('id', '=', $pid)
                            ->update(['sst_id' => '2']);
                    } else if ($value2 == "0") {
                        //update withdrawn
                        purchase::where('id', '=', $pid)
                            ->update(['sst_id' => '3']);


                    }

                }

            }           

            //update price
            for ($i = 0; $i < count($lotid); $i++) {

                $pdetails = purchase::where('cfd_id', $lotid[$i])->first();
                if ($pdetails != null) {
                    $pid = $pdetails->id;
                    purchase::where('id', '=', $pid)
                        ->update(['prc_confirmed_price' => $cprice[$i], 'prc_fob_id' => $fob_selected[$lotid[$i]], 'cb_id' => 43]);
                } else {
                    purchase::insert(['cfd_id' => $lotid[$i], 'prc_confirmed_price' => $cprice[$i], 'prc_fob_id' => $fob_selected[$lotid[$i]], 'cb_id' => 43]);
                }

            }
            $auc_buyer = Input::get('coffee_buyer');
            // foreach ($auc_buyer as $key => $value) {
            //     purchase::where('cfd_id', '=', $key)
            //         ->update(['cb_id' => null]);
            //     if ($value != null) {
            //         purchase::where('cfd_id', '=', $key)
            //             ->update(['cb_id' => $value]);
            //     }

            // }
            $sale_lots = null;
            // ->where('slctrid', $countryID)->where('csn_season', $saleSeasonName)->where('slrid', $seller)->whereNull('prcid')
            $saleSeasonName = season::where('id', $sale_season)->first();
            $saleSeasonName = $saleSeasonName->csn_season;

      
            if ($request->has('seller') && Input::get('seller') != null) {
                if ($request->has('sale') && Input::get('sale') != null && Input::get('sale') != 'Sale No.')  {
                    $sale_lots   = direct_sale::where('slctrid', $cid)->where('csn_season', $saleSeasonName)->where('slrid', Input::get('seller'))->whereNull('purchase_confirmed')->where('slid', $saleid)->get();
                } else {
                    $sale_lots   = direct_sale::where('slctrid', $cid)->where('csn_season', $saleSeasonName)->where('slrid', Input::get('seller'))->whereNull('purchase_confirmed')->get();
                }

                
            } 
                       

            Activity::log('Updated purchase information for sale ' . $saleid . ' season ' . $sale_season);

            $Season      = Season::all(['id', 'csn_season']);
            $country     = country::all(['id', 'ctr_name', 'ctr_initial']);
            $CoffeeGrade = CoffeeGrade::all(['id', 'cgrad_name']);
            $region      = Region::where('ctr_id', Input::get('country'))->get();

            $pdetails = purchase::where('cfd_id', $coffeeid)->first();

            if (Input::get('country') != null) {
                $Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
                $Mill      = mills_region::where('ctr_id', Input::get('country'))->get();
                $seller    = seller::where('ctr_id', Input::get('country'))->get();
            }
            $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '2')->whereNotNull('sl_quality_confirmedby')->get();

            $cid         = Input::get('country');
            $csn_season  = Input::get('sale_season');
            $saleid      = Input::get('sale');

            return View::make('directpurchasedetails', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'sale_lots', 'seller', 'saleid', 'cdetails', 'buyer', 'sale_status', 'basket', 'pdetails', 'slr', 'sale_cb_id', 'fob'));

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
                    $request->session()->flash('alert-success', 'Sale found!!');
                    $cid = Input::get('country');
                    $csn_season = Input::get('sale_season');
                    $saleid = Input::get('sale');
                    $sale_lots = null;
                    // ->where('slctrid', $countryID)->where('csn_season', $saleSeasonName)->where('slrid', $seller)->whereNull('prcid')
                    $saleSeasonName = season::where('id', $csn_season)->first();
                    $saleSeasonName = $saleSeasonName->csn_season;

                    if ($request->has('seller') && Input::get('seller') != null) {
                        if ($request->has('sale') && Input::get('sale') != null && Input::get('sale') != 'Sale No.')  {
                            $sale_lots   = direct_sale::where('slctrid', $cid)->where('csn_season', $saleSeasonName)->where('slrid', Input::get('seller'))->whereNull('purchase_confirmed')->where('slid', $saleid)->get();
                        } else {
                            $sale_lots   = direct_sale::where('slctrid', $cid)->where('csn_season', $saleSeasonName)->where('slrid', Input::get('seller'))->whereNull('purchase_confirmed')->get();
                        }

                        
                    } 
                       


                
                    return View::make('directpurchasedetails', compact('id', 
                        'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'slr', 'fob')); 
                



                } else {
                        $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '2')->whereNotNull('sl_quality_confirmedby')->whereNull('sl_auction_confirmedby')->get();
                        $cid = Input::get('country');
                        $csn_season = Input::get('sale_season');
                        return View::make('directpurchasedetails', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'slr', 'fob'));   
                }
            } else {

                return redirect('directpurchasedetails')
                            ->withErrors("Please select a valid Country!!")->withInput();
            }

            return View::make('directpurchasedetails', compact('id', 'Season', 'country', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'slr', 'fob'));      
        }
    
    }

    public function directPurchaseQualityForm (Request $request){
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
        $buyer = buyer::all(['id', 'cb_name']);

        $processing = processing::where('prcss_auction', '1')->get();
        $screens = screens::all(['id', 'scr_name']);

        $cupscore = cupscore::all(['id', 'cp_score', 'cp_quality']);
        $rawscore = rawscore::all(['id', 'rw_score', 'rw_quality']);

        return View::make('directpurchasequality', compact('id', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'largest', 'greensize', 'greencolor', 'greendefects', 'processing', 'cupscore', 'rawscore', 'screens'));

    }

    public function directPurchaseQuality (Request $request){
        $id = NULL;

        $Warehouse = NULL;
        $Mill = NULL;


        $greensize = quality_parameters::where('qg_id', '1')->get();
        $greencolor = quality_parameters::where('qg_id', '2')->get();
        $greendefects = quality_parameters::where('qg_id', '3')->get();

        $processing = processing::where('prcss_auction', '1')->get();
        $buyer = buyer::where('bt_id', '1')->get();

        $screens = screens::all(['id', 'scr_name']);
        $fob = FOB::all(['id', 'fob_price']);

        $cupscore = cupscore::all(['id', 'cp_score', 'cp_quality']);
        $rawscore = rawscore::all(['id', 'rw_score', 'rw_quality']);

        $slr = Input::get('seller');


        $basket = basket::where('ctr_id', Input::get('country'))->orderBy('bs_code')->get();

        $Certification = Certification::all(['id', 'crt_name']);

        if (NULL !== Input::get('confirmpurchase')){
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
                ->update(['sl_auction_confirmedby' => $user]);
            $request->session()->flash('alert-success', 'Direct Quality Confirmed!!');

            Activity::log('Confirmed direct quality details for sale '.$sale);
            return redirect('directpurchasequality');

        } else if (NULL !== Input::get('submitlot')){
            $this->validate($request, [
                'country' => 'required', 'sale_season' => 'required',
            ]);

            $country      = Input::get('country');
            $sale_season  = Input::get('sale_season');
            $saleid       = Input::get('sale');
            $coffee_buyer = Input::get('coffee_buyer');
            $seller       = Input::get('seller');
            $slr = $seller;
            $total_lots   = Input::get('total_lots');

            $lotid     = Input::get('lotid');
            $cprice    = Input::get('cprice');
            $fob_selected    = Input::get('fob');
            $basket_selected    = Input::get('basket');
            $confirmed = Input::get('confirmed');
            $withdrawn = Input::get('withdrawn');
            $coffeeid  = null;

            //update price
            for ($i = 0; $i < count($lotid); $i++) {

                $pdetails = purchase::where('cfd_id', $lotid[$i])->first();
                if ($pdetails != null) {
                    $pid = $pdetails->id;
                    purchase::where('id', '=', $pid)
                        ->update([ 'bs_id' => $basket_selected[$lotid[$i]]]);
                } else {
                    
                }

            }
            $auc_buyer = Input::get('coffee_buyer');
            // foreach ($auc_buyer as $key => $value) {
            //     purchase::where('cfd_id', '=', $key)
            //         ->update(['cb_id' => null]);
            //     if ($value != null) {
            //         purchase::where('cfd_id', '=', $key)
            //             ->update(['cb_id' => $value]);
            //     }

            // }
            $sale_lots = null;
            // ->where('slctrid', $countryID)->where('csn_season', $saleSeasonName)->where('slrid', $seller)->whereNull('prcid')
            $saleSeasonName = season::where('id', $sale_season)->first();
            $saleSeasonName = $saleSeasonName->csn_season;

            if ($request->has('seller') && Input::get('seller') != null) {
                $sale_lots   = direct_sale::where('slctrid', $country)->where('csn_season', $saleSeasonName)->where('slrid', Input::get('seller'))->whereNull('purchase_confirmed')->get();
            } else {
                // $sale_lots   = direct_sale::where('slid', $saleid)->get();
            }



            Activity::log('Updated purchase information for sale ' . $saleid . ' season ' . $sale_season);

            $Season      = Season::all(['id', 'csn_season']);
            $country     = country::all(['id', 'ctr_name', 'ctr_initial']);
            $CoffeeGrade = CoffeeGrade::all(['id', 'cgrad_name']);
            $region      = Region::where('ctr_id', Input::get('country'))->get();

            $pdetails = purchase::where('cfd_id', $coffeeid)->first();

            if (Input::get('country') != null) {
                $Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
                $Mill      = mills_region::where('ctr_id', Input::get('country'))->get();
                $seller    = seller::where('ctr_id', Input::get('country'))->get();
            }
            $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '2')->whereNotNull('sl_quality_confirmedby')->get();

            $cid         = Input::get('country');
            $csn_season  = Input::get('sale_season');
            $saleid      = Input::get('sale');

            return View::make('directpurchasequality', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'sale_lots', 'seller', 'saleid', 'cdetails', 'buyer', 'sale_status', 'basket', 'pdetails', 'slr', 'sale_cb_id', 'fob'));

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

                    $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '2')->whereNotNull('sl_quality_confirmedby')->whereNull('sl_auction_confirmedby')->get();
                    $request->session()->flash('alert-success', 'Sale found!!');
                    $cid = Input::get('country');
                    $csn_season = Input::get('sale_season');
                    $saleid = Input::get('sale');
                    $sale_lots = null;
                    // ->where('slctrid', $countryID)->where('csn_season', $saleSeasonName)->where('slrid', $seller)->whereNull('prcid')
                    $saleSeasonName = season::where('id', $csn_season)->first();
                    $saleSeasonName = $saleSeasonName->csn_season;

                       

                    if ($request->has('seller') && Input::get('seller') != null) {
                        $sale_lots   = direct_sale::where('slctrid', $cid)->where('csn_season', $saleSeasonName)->where('slrid', Input::get('seller'))->whereNull('purchase_confirmed')->get();
                    } else {
                     // $sale_lots   = direct_sale::where('slid', $saleid)->get();
                    }
                    return View::make('directpurchasequality', compact('id', 
                        'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'slr', 'fob','basket')); 
                

                


                } else {
                        $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '2')->whereNotNull('sl_quality_confirmedby')->whereNull('sl_auction_confirmedby')->get();
                        $cid = Input::get('country');
                        $csn_season = Input::get('sale_season');
                        return View::make('directpurchasequality', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'slr', 'fob','basket'));   
                }
            } else {

                return redirect('directpurchasequality')
                            ->withErrors("Please select a valid Country!!")->withInput();
            }

            return View::make('directpurchasequality', compact('id', 'Season', 'country', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'slr', 'fob','basket'));      
        }
    
    }

    public function confirmInvoicesForm(Request $request)
    {
        $id            = null;
        $Season        = Season::all(['id', 'csn_season']);
        $country       = country::all(['id', 'ctr_name', 'ctr_initial']);
        $CoffeeGrade   = CoffeeGrade::all(['id', 'cgrad_name']);
        $Certification = Certification::all(['id', 'crt_name']);
        $buyer         = buyer::where('bt_id', '1')->get();

        $sale_status = sale_status::all(['id', 'sst_name']);
        $Warehouse   = null;
        $Mill        = null;

        return View::make('confirminvoicesdirect', compact('id', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'largest', 'greensize', 'greencolor', 'greendefects', 'processing', 'cupscore', 'rawscore', 'screens', 'buyer', 'sale_status'));

    }

    public function confirmInvoices(Request $request)
    {
        $id = null;

        $Warehouse = null;
        $Mill      = null;

        $greensize    = quality_parameters::where('qg_id', '1')->get();
        $greencolor   = quality_parameters::where('qg_id', '2')->get();
        $greendefects = quality_parameters::where('qg_id', '3')->get();
        $processing   = processing::all(['id', 'prcss_name']);
        $buyer        = buyer::where('bt_id', '1')->get();
        $sale_status  = sale_status::all(['id', 'sst_name']);
        $basket       = basket::where('ctr_id', Input::get('country'))->get();

        $screens = screens::all(['id', 'scr_name']);

        $cupscore = cupscore::all(['id', 'cp_score', 'cp_quality']);
        $rawscore = rawscore::all(['id', 'rw_score', 'rw_quality']);

        $Certification = Certification::all(['id', 'crt_name']);

        $slr        = Input::get('seller');
        $sale_cb_id = Input::get('coffee_buyer');

        if (null !== Input::get('confirminvoices')) {
            $this->validate($request, [
                'country' => 'required', 'sale_season' => 'required',  'coffee_buyer' => 'required', 'seller' => 'required',
            ]);

            $cid = Input::get('country');
            $csn_season  = Input::get('sale_season');
            $sale    = Input::get('sale');
            $lot     = Input::get('sif_lot');
            $outturn = Input::get('outt_number');
            $mark    = Input::get('coffee_grower');

            $coffee_buyer    = Input::get('coffee_buyer');
            $price           = Input::get('price');
            $confirmed_price = Input::get('cprice');
            $basket          = Input::get('basket');
            $sale_status     = Input::get('sale_status');
            $saleid          = Input::get('sale');
            $comments        = Input::get('comments');

            $warrant_no      = Input::get('warrant_no');
            $warrant_weight  = Input::get('warrant_weight');
            $date            = Input::get('date');
            $date            = date_create($date);
            $date            = date_format($date, "Y-m-d");
            $count_confirmed = Input::get('count_confirmed');

            $invoice   = Input::get('invoice');
            $user_data = Auth::user();
            $user      = $user_data->id;
            $coffeeid  = null;

            $saleSeasonName = season::where('id', $csn_season)->first();

            $saleSeasonName = $saleSeasonName->csn_season;

            $invoicelot = Input::get('invoicelot');


            foreach ($invoicelot as $key => $value) {

                $invNumber = Input::get('invNumber' . $value);

                $invDate = Input::get('date' . $value);

                if ($invDate  != null) {

                    $invDate = date_create($invDate);

                    $invDate = date_format($invDate, "Y-m-d");
                }
                if ($invNumber != null) {

                    $inv_id = invoices::insertGetId(
                        ['inv_no' => $invNumber, 'inv_date' => $invDate, 'inv_confirmedby' => $user]);

                    $request->session()->flash('alert-success', 'Paymnet Information Added!!');
                    Activity::log('Inserted invoice information with invoice no. ' . $invNumber . ' date ' . $date . ' confirmed by ' . $user);

                    $sale_ID = direct_sale::where('id', $value)->first();

                    $sale_ID = $sale_ID->slid;
                    //changed to get only confirmed lots
                    $sale_lots = direct_sale::where('slid', $sale_ID)->where('status', 'confirmed')->get();

                    foreach ($sale_lots as $key => $value) {

                        $pdetails = purchase::where('cfd_id', $value->id)->first();

                        $pid      = $pdetails->id;

                        purchase::where('id', '=', $pid)
                            ->update(['inv_id' => $inv_id, 'inv_weight' => $value->weight, 'inv_outturn' => $value->outturn, 'inv_mark' => $value->mark]);

                        $request->session()->flash('alert-success', 'Purchase Invoice Information Updated!!');

                        Activity::log('Updated Purchase for coffeeid' . $value->id . ' with invoice id ' . $inv_id. ' confirmed by ' . $user);

                    }

                }

            }         

            $Season      = Season::all(['id', 'csn_season']);
            $country     = country::all(['id', 'ctr_name', 'ctr_initial']);
            $CoffeeGrade = CoffeeGrade::all(['id', 'cgrad_name']);
            $region      = Region::where('ctr_id', Input::get('country'))->get();

            $pdetails = purchase::where('cfd_id', $coffeeid)->first();

            if (Input::get('country') != null) {
                $Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
                $Mill      = mills_region::where('ctr_id', Input::get('country'))->get();
                $seller    = seller::where('ctr_id', Input::get('country'))->get();
            }
            $cid        = Input::get('country');
            $csn_season = Input::get('sale_season');
            $saleid     = Input::get('sale');

            $sale_lots = direct_sale::selectRaw('*,GROUP_CONCAT(DISTINCT grade) sum_grades, sum(bags) sum_bags, sum(pockets) sum_pockets,  sum(weight) sum_weight, sum(price*weight) sum_price, count(*) count, sum(weight*price) avrg_price  ')->where('slctrid', $cid)->where('csn_season', $saleSeasonName)->where('status', 'confirmed')->where('slrid', Input::get('seller'))->groupBy('sale')->get();

            // $sale_lots = direct_sale::selectRaw('*,GROUP_CONCAT(DISTINCT grade) sum_grades, sum(bags) sum_bags, sum(pockets) sum_pockets,  sum(weight) sum_weight ')->where('slctrid', $cid)->where('csn_season', $saleSeasonName)->where('slrid', Input::get('seller'))->whereNull('invoice')->groupBy('sale')->get();

            $sale_status = sale_status::all(['id', 'sst_name']);
            $basket      = basket::where('ctr_id', Input::get('country'))->get();

            return View::make('confirminvoicesdirect', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'sale_lots', 'seller', 'saleid', 'cdetails', 'buyer', 'sale_status', 'basket', 'pdetails', 'slr', 'sale_cb_id'));

        } else {
            $Season      = Season::all(['id', 'csn_season']);
            $country     = country::all(['id', 'ctr_name', 'ctr_initial']);
            $CoffeeGrade = CoffeeGrade::all(['id', 'cgrad_name']);
            $region      = Region::where('ctr_id', Input::get('country'))->get();

            if (Input::get('country') != null) {
                $Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
                $Mill      = mills_region::where('ctr_id', Input::get('country'))->get();
                $seller    = seller::where('ctr_id', Input::get('country'))->get();
            }

            if ($request->has('country')) {
                if ($request->has('sale_season') & Input::get('sale_season') !== "Sale Season") {

                    $cid        = Input::get('country');

                    $csn_season = Input::get('sale_season');

                    $sale_lots = null;

                    $saleSeasonName = season::where('id', $csn_season)->first();

                    $saleSeasonName = $saleSeasonName->csn_season;

                    if ($request->has('seller') && Input::get('seller') != null) {

                        $sale_lots = direct_sale::selectRaw('*,GROUP_CONCAT(DISTINCT grade) sum_grades, sum(bags) sum_bags, sum(pockets) sum_pockets,  sum(weight) sum_weight, sum(price*weight) sum_price, count(*) count ')->where('slctrid', $cid)->where('csn_season', $saleSeasonName)->where('status', 'confirmed')->where('slrid', Input::get('seller'))->whereNull('invoice')->whereNotNull('bric')->groupBy('sale')->get();


                    }                    

                    return View::make('confirminvoicesdirect', compact('id',
                        'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id'));

                } else {

                    $cid = Input::get('country');
                   
                    $csn_season = Input::get('sale_season');

                    return View::make('confirminvoicesdirect', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id'));

                }
            } else {

                return redirect('confirminvoicesdirect')
                    ->withErrors("Please select a valid Country!!")->withInput();
            }

            return View::make('confirminvoicesdirect', compact('id', 'Season', 'country', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id'));
        }

    }


    public function confirmPaymnetForm(Request $request)
    {
        $id            = null;
        $Season        = Season::all(['id', 'csn_season']);
        $country       = country::all(['id', 'ctr_name', 'ctr_initial']);
        $CoffeeGrade   = CoffeeGrade::all(['id', 'cgrad_name']);
        $Certification = Certification::all(['id', 'crt_name']);
        $buyer = buyer::where('bt_id', '1')->get();

        $sale_status = sale_status::all(['id', 'sst_name']);
        $Warehouse   = null;
        $Mill        = null;

        return View::make('confirmpaymentdirect', compact('id', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'largest', 'greensize', 'greencolor', 'greendefects', 'processing', 'cupscore', 'rawscore', 'screens', 'buyer', 'sale_status'));

    }

    public function confirmPaymnet(Request $request)
    {
        $id = null;

        $Warehouse = null;
        $Mill      = null;

        $greensize    = quality_parameters::where('qg_id', '1')->get();
        $greencolor   = quality_parameters::where('qg_id', '2')->get();
        $greendefects = quality_parameters::where('qg_id', '3')->get();
        $processing   = processing::all(['id', 'prcss_name']);

        $buyer       = buyer::where('bt_id', '1')->get();
        $sale_status = sale_status::all(['id', 'sst_name']);
        $basket      = basket::where('ctr_id', Input::get('country'))->get();

        $screens = screens::all(['id', 'scr_name']);

        $cupscore = cupscore::all(['id', 'cp_score', 'cp_quality']);
        $rawscore = rawscore::all(['id', 'rw_score', 'rw_quality']);

        $Certification = Certification::all(['id', 'crt_name']);

        $slr        = Input::get('seller');
        $sale_cb_id = Input::get('coffee_buyer');

        if (null !== Input::get('confirmpaymentdirect')) {
            $this->validate($request, [
                'country' => 'required', 'coffee_buyer' => 'required', 'seller' => 'required', 'date' => 'required', 'ref' => 'required', 'paymentamount' => 'required',
            ]);

            $cid = Input::get('country');
            $csn_season  = Input::get('sale_season');
            $sale    = Input::get('sale');
            $lot     = Input::get('sif_lot');
            $outturn = Input::get('outt_number');
            $mark    = Input::get('coffee_grower');

            $coffee_buyer    = Input::get('coffee_buyer');
            $price           = Input::get('price');
            $confirmed_price = Input::get('cprice');
            $basket          = Input::get('basket');
            $sale_status     = Input::get('sale_status');
            $saleid          = Input::get('sale');
            $comments        = Input::get('comments');

            $warrant_no      = Input::get('warrant_no');
            $warrant_weight  = Input::get('warrant_weight');
            $date            = Input::get('date');
            $date            = date_create($date);
            $date            = date_format($date, "Y-m-d");
            $count_confirmed = Input::get('count_confirmed');

            $invoice = Input::get('invoice');

            $invoiced = Input::get('invoiced');
            $ref      = Input::get('ref');
            $payment  = Input::get('paymentamount');

            $user_data = Auth::user();
            $user      = $user_data->id;

            $pydetails = payment::where('py_no', $ref)->first();

            $saleSeasonName = season::where('id', $csn_season)->first();

            $saleSeasonName = $saleSeasonName->csn_season;

            $paymentlot = Input::get('paymentlot');

            if ($pydetails != null) {

                $py_id = $pydetails->id;

                payment::where('id', '=', $py_id)
                    ->update(['py_no' => $ref, 'py_amount' => $payment, 'py_date' => $date, 'py_confirmedby' => $user]);

                Activity::log('Updated paymnet information with paymnet no. ' . $ref . ' date ' . $date . ' confirmed by ' . $user);

                $request->session()->flash('alert-success', 'Paymnet Information Updated!!');

            } else {
                $py_id = payment::insertGetId(

                    ['py_no' => $ref, 'py_amount' => $payment, 'py_date' => $date, 'py_confirmedby' => $user]);

                $request->session()->flash('alert-success', 'Paymnet Information Added!!');

                Activity::log('Inserted paymnet information with paymnet no. ' . $ref . ' date ' . $date . ' confirmed by ' . $user);
            }


            foreach ($paymentlot as $key => $value) {

                if ($py_id != null) {

                    $sale_ID = direct_sale::where('id', $value)->first();

                    $sale_ID = $sale_ID->slid;

                    $sale_lots = direct_sale::where('slid', $sale_ID)->get();

                    foreach ($sale_lots as $key => $value) {

                        $pdetails = purchase::where('cfd_id', $value->id)->first();

                        $pid = $pdetails->id;

                        purchase::where('id', '=', $pid)
                            ->update(['py_id' => $py_id]);

                        $request->session()->flash('alert-success', 'Purchase Invoice Information Updated!!');

                        Activity::log('Updated Payment for coffeeid' . $value->id . ' with payment id ' . $py_id. ' confirmed by ' . $user);

                    }

                }

            }    

            $Season      = Season::all(['id', 'csn_season']);
            $country     = country::all(['id', 'ctr_name', 'ctr_initial']);
            $CoffeeGrade = CoffeeGrade::all(['id', 'cgrad_name']);
            $region      = Region::where('ctr_id', Input::get('country'))->get();


            if (Input::get('country') != null) {
                $seller    = seller::where('ctr_id', Input::get('country'))->get();
            }

            $cid        = Input::get('country');
            $csn_season = Input::get('sale_season');
            $saleid     = Input::get('sale');
           
            $sale_status = sale_status::all(['id', 'sst_name']);
            $basket      = basket::where('ctr_id', Input::get('country'))->get();
            $inv         = Input::get('invoiced');

            $sale_lots = direct_sale::selectRaw('*,GROUP_CONCAT(DISTINCT grade) sum_grades, sum(bags) sum_bags, sum(pockets) sum_pockets,  sum(weight) sum_weight, sum(weight*price) avrg_price ')->where('slctrid', $cid)->where('csn_season', $saleSeasonName)->where('slrid', Input::get('seller'))->where('cbid', Input::get('coffee_buyer'))->whereNotNull('bric')->whereNull('py_no')->groupBy('sale')->get();

            return View::make('confirmpaymentdirect', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'sale_lots', 'seller', 'saleid', 'cdetails', 'buyer', 'sale_status', 'basket', 'pdetails', 'slr', 'sale_cb_id', 'invoiced', 'inv'));

        } else {

            $Season      = Season::all(['id', 'csn_season']);
            $country     = country::all(['id', 'ctr_name', 'ctr_initial']);
            $CoffeeGrade = CoffeeGrade::all(['id', 'cgrad_name']);
            $region      = Region::where('ctr_id', Input::get('country'))->get();

            if (Input::get('country') != null) {

                $seller    = seller::where('ctr_id', Input::get('country'))->get();

            }

            if ($request->has('country')) {


                if ($request->has('sale_season') && Input::get('sale_season') !== "Sale Season") {

                    $cid = Input::get('country');
                    
                    $csn_season = Input::get('sale_season'); 

                    $sale_lots = null;

                    $saleSeasonName = season::where('id', $csn_season)->first();

                    $saleSeasonName = $saleSeasonName->csn_season;

                    $sale_lots = direct_sale::selectRaw('*,GROUP_CONCAT(DISTINCT grade) sum_grades, sum(bags) sum_bags, sum(pockets) sum_pockets,  sum(weight) sum_weight, sum(weight*price) avrg_price  ')->where('slctrid', $cid)->where('csn_season', $saleSeasonName)->where('slrid', Input::get('seller'))->where('cbid', Input::get('coffee_buyer'))->whereNotNull('bric')->whereNull('py_no')->groupBy('sale')->get();    
                    return View::make('confirmpaymentdirect', compact('id',
                        'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'invoiced', 'inv'));

                 
                } else {

                    $cid        = Input::get('country');
                    $csn_season = Input::get('sale_season');
                    return View::make('confirmpaymentdirect', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'invoiced'));
                }
            } else {

                return redirect('confirmpaymentdirect')
                    ->withErrors("Please select a valid Country!!")->withInput();
            }

            return View::make('confirmpaymentdirect', compact('id', 'Season', 'country', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id'));
        }

    }


    public function directPurchaseWarrantsForm (Request $request){

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
        $buyer = buyer::all(['id', 'cb_name']);

        $processing = processing::where('prcss_auction', '1')->get();
        $screens = screens::all(['id', 'scr_name']);

        $cupscore = cupscore::all(['id', 'cp_score', 'cp_quality']);
        $rawscore = rawscore::all(['id', 'rw_score', 'rw_quality']);

        return View::make('directpurchasewarrants', compact('id', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'largest', 'greensize', 'greencolor', 'greendefects', 'processing', 'cupscore', 'rawscore', 'screens'));

    }

    public function directPurchaseWarrants (Request $request){
        $id = NULL;

        $Warehouse = NULL;
        $Mill = NULL;


        $greensize = quality_parameters::where('qg_id', '1')->get();
        $greencolor = quality_parameters::where('qg_id', '2')->get();
        $greendefects = quality_parameters::where('qg_id', '3')->get();

        $processing = processing::where('prcss_auction', '1')->get();
        $buyer = buyer::where('bt_id', '1')->get();

        $screens = screens::all(['id', 'scr_name']);
        $fob = FOB::all(['id', 'fob_price']);

        $cupscore = cupscore::all(['id', 'cp_score', 'cp_quality']);
        $rawscore = rawscore::all(['id', 'rw_score', 'rw_quality']);

        $slr = Input::get('seller');

        $user_data = Auth::user();
        $user      = $user_data->id;
        $basket = basket::where('ctr_id', Input::get('country'))->orderBy('bs_code')->get();

        $Certification = Certification::all(['id', 'crt_name']);

        if (NULL !== Input::get('confirmpurchase')){
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
                ->update(['sl_auction_confirmedby' => $user]);
            $request->session()->flash('alert-success', 'Direct Quality Confirmed!!');

            Activity::log('Confirmed direct quality details for sale '.$sale);
            return redirect('directpurchasewarrants');

        } else if (NULL !== Input::get('submitlot')){
            $this->validate($request, [
                'country' => 'required', 'sale_season' => 'required',
            ]);
            // print_r(Input::get('date10'));
            $lots = Input::get('lots');
            foreach ($lots as $value) {
                $wrdate    = null;
                $warehouse = null;
                $serial    = null;
                $warWeight = null;
                $comments  = null;
                $war_id    = null;
                if (Input::get('date' . $value) != null) {
                    $wrdate = Input::get('date' . $value);
                    $wrdate = date_create($wrdate);
                    $wrdate = date_format($wrdate, "Y-m-d");
                }
                $warehouse = Input::get('warehouse' . $value);

                $serial    = Input::get('serial' . $value);
                $warWeight = Input::get('warWeight' . $value);
                $comments  = Input::get('comments' . $value);

                $wardetails = warrants::where('war_no', $serial)->first();
                $pdetails   = purchase::where('cfd_id', $value)->first();
                
                if ($pdetails  != null) {

                    $invoiced_weight = $pdetails->inv_weight;

                }
                
                $threshold_name = "Warrants";

                $identifier = $threshold_name. " ". $serial;

                $this->checkThreshold($threshold_name, $invoiced_weight, $warWeight, $identifier);


                $cid = Input::get('country');
                $csn_season = Input::get('sale_season');
                $saleid = Input::get('sale');
                $sale_lots = null;
                // ->where('slctrid', $countryID)->where('csn_season', $saleSeasonName)->where('slrid', $seller)->whereNull('prcid')
                $saleSeasonName = season::where('id', $csn_season)->first();
                $saleSeasonName = $saleSeasonName->csn_season;



                if ($wardetails != null) {
                    $war_id = $wardetails->id;
                    warrants::where('id', '=', $war_id)
                        ->update(['war_no' => $serial, 'war_date' => $wrdate, 'war_weight' => $warWeight, 'war_confirmedby' => $user, 'war_comments' => $comments]);

                    Activity::log('Updated warant information with warant no. ' . $serial . ' date ' . $wrdate . ' confirmed by ' . $user);
                    $request->session()->flash('alert-success', 'Warrant Information Updated!!');

                }
                if ($wardetails == null && $serial != null) {
                    $war_id = warrants::insertGetId(
                        ['war_no' => $serial, 'war_date' => $wrdate, 'war_weight' => $warWeight, 'war_confirmedby' => $user, 'war_comments' => $comments]);
                    $request->session()->flash('alert-success', 'Warrant Information Added!!');
                    Activity::log('Inserted warant information with warant no. ' . $serial . ' warrant weight ' . $warWeight . ' date ' . $wrdate . ' confirmed by ' . $user);
                }

                if ($pdetails != null && $war_id != null) {
                    $pid = $pdetails->id;
                    purchase::where('id', '=', $pid)
                        ->update(['war_id' => $war_id]);

                    $request->session()->flash('alert-success', 'Warrant Information Updated!!');

                    Activity::log('Updated warrant information with warant no. ' . $serial . ' warrant weight ' . $warWeight . ' date ' . $wrdate . ' confirmed by ' . $user);

                }
                if ($value != null && $warehouse != null) {
                    coffee_details::where('id', '=', $value)
                        ->update(['wr_id' => $warehouse]);
                    Activity::log('Updated warehouse for coffeeid ' . $value . ' to ' . $warehouse);
                }
            }

            $Season      = Season::all(['id', 'csn_season']);
            $country     = country::all(['id', 'ctr_name', 'ctr_initial']);
            $CoffeeGrade = CoffeeGrade::all(['id', 'cgrad_name']);
            $region      = Region::where('ctr_id', Input::get('country'))->get();

            if (Input::get('country') != null) {
                $Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
                $Mill      = mills_region::where('ctr_id', Input::get('country'))->get();
                $seller    = seller::where('ctr_id', Input::get('country'))->get();
            }
            $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->orderBy('sl_no')->get();

            $cid        = Input::get('country');
            $csn_season = Input::get('sale_season');
            $saleid     = Input::get('sale');
            // $sale_lots = sale_lots::where('slid', $saleid)->get();
            if ($request->has('seller') && Input::get('seller') != null) {
                $sale_lots   = direct_sale::where('slctrid', $cid)->where('csn_season', $saleSeasonName)->where('slrid', Input::get('seller'))->whereNotNull('payment')->whereNull('grid')->get();
            } else {
             // $sale_lots   = direct_sale::where('slid', $saleid)->get();
            }
            // $request->session()->flash('alert-success', 'Purchase Information Added!!');

            // $sale_status = sale_status::all(['id', 'sst_name']);
            $basket      = basket::where('ctr_id', Input::get('country'))->get();
            if(Input::get('country') != NULL){
                $Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
                $Mill = mills_region::where('ctr_id', Input::get('country'))->get();        
                $seller = seller::where('ctr_id', Input::get('country'))->get();        
            }

                    return View::make('directpurchasewarrants', compact('id', 
                        'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'slr', 'fob','basket')); 
                

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

                    $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '2')->whereNotNull('sl_quality_confirmedby')->whereNull('sl_auction_confirmedby')->get();
                    $request->session()->flash('alert-success', 'Sale found!!');
                    $cid = Input::get('country');
                    $csn_season = Input::get('sale_season');
                    $saleid = Input::get('sale');
                    $sale_lots = null;
                    // ->where('slctrid', $countryID)->where('csn_season', $saleSeasonName)->where('slrid', $seller)->whereNull('prcid')
                    $saleSeasonName = season::where('id', $csn_season)->first();
                    $saleSeasonName = $saleSeasonName->csn_season;

                       

                    if ($request->has('seller') && Input::get('seller') != null) {
                        $sale_lots  = direct_sale::where('slctrid', $cid)->where('csn_season', $saleSeasonName)->where('slrid', Input::get('seller'))->whereNotNull('payment')->whereNull('grid')->get();
                    } else {
                     // $sale_lots   = direct_sale::where('slid', $saleid)->get();
                    }
                    return View::make('directpurchasewarrants', compact('id', 
                        'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'slr', 'fob','basket')); 
                

                


                } else {
                        $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '2')->whereNotNull('sl_quality_confirmedby')->whereNull('sl_auction_confirmedby')->get();
                        $cid = Input::get('country');
                        $csn_season = Input::get('sale_season');
                        return View::make('directpurchasewarrants', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'slr', 'fob','basket'));   
                }
            } else {

                return redirect('directpurchasewarrants')
                            ->withErrors("Please select a valid Country!!")->withInput();
            }

            return View::make('directpurchasewarrants', compact('id', 'Season', 'country', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'slr', 'fob','basket'));      
        }
    
    }

}

