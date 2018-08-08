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
use Ngea\StockViewALL;

use  Ngea\Warehouse;
use  Ngea\Region;

use Yajra\Datatables\Datatables;
use niklasravnsborg\LaravelPdf\Facades\Pdf as PDF;
use Activity;
use Excel;

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

use Ngea\warrants;

use Ngea\Credit_Note;

use delete;

use Ngea\InternalBaskets;

use Ngea\Breakdown_Without_Stuffed;

use Ngea\purchase;

use Ngea\bric;

use Ngea\StockBreakdown;


class CreditController extends Controller {

    public function accountsCreditForm (Request $request){
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

        $seller = seller::get();

        return View::make('accountscredit', compact('id', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'largest', 'greensize', 'greencolor', 'greendefects', 'processing', 'cupscore', 'rawscore', 'screens', 'seller'));

    }

    public function accountsCredit (Request $request){

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

        $seller = seller::get();

        $countryID = Input::get('country');

        $coffee_buyer = Input::get('coffee_buyer');

        $sellerID = Input::get('seller');

        $credit_no = Input::get('credit_no');

        $goods = Input::get('goods');

        $date = Input::get('date');

        $credit_details = Credit_Note::where('cn_number', $credit_no)->first();

        $cn_weight = Input::get('totalWeight');

        $cn_bags = Input::get('total_bags');

        $cn_value = Input::get('total_value');

        $user_data = Auth::user();
      
        $user = $user_data->id;

        $StockView = Breakdown_Without_Stuffed::select('*')->where('credit_number', $credit_no)->orWhereNull('credit_number')->orderByRaw(DB::raw("FIELD(credit_number, '$credit_no') DESC"))->get();

        if (null !== Input::get('confirminstruction')) {
            
            if ($credit_details != null) {

                $cnid = $credit_details->id;

                $tobeprocessed = Input::get('tobeprocessed');

                $tobeprocessedpurchased = Input::get('tobeprocessedpurchased');

                $total_weight = null;

                $ratios = null;

                $total_weight_credited = null;

                $credit_details = Credit_Note::where('id', '=', $cnid)->first();

                $total_weight_credited = $credit_details->cn_weight;


                if ($tobeprocessed != null) {

                    foreach ($tobeprocessed as $keytbp => $valuetbp) {    

                        $breakdown_without_stuffed_original = StockBreakdown::where('id',$valuetbp)->first(); 

                        $bric_details = NULL;

                        if ($breakdown_without_stuffed_original != null) {                  

                            $breakdown_without_stuffed = StockBreakdown::where('st_id',$breakdown_without_stuffed_original->st_id)->whereNotNull('id')->whereNull('cn_id')->get();       

                            foreach ($breakdown_without_stuffed as $keytbws => $valuetbws) { 
                                $total_weight += $valuetbws->full_weight;  
                            } 

                            foreach ($breakdown_without_stuffed as $keytbws => $valuetbws) { 
                                $ratios = $valuetbws->full_weight/$total_weight;   
                                StockBreakdown::where('id', '=', $valuetbws->stbid)
                                    ->update(['stb_bulk_ratio' => $ratios]);                        
                            } 

                            $bric_details = bric::where('id', '=', $breakdown_without_stuffed_original->br_id)->first();

                        }

                        $credit_weight = null;

                        $bric_id = null;


                        if ($bric_details != null) {

                            $credit_weight = $bric_details->br_credit_note_weight;

                            $credit_weight = $credit_weight + $total_weight_credited;

                            $bric_id = $bric_details->id;

                        }


                        bric::where('id', '=', $bric_id)
                                    ->update(['br_credit_note_weight' => $credit_weight]);

                        $total_weight_credited = 0;

                        $total_weight = 0;
                        
                        $credit_weight = 0;

                    }

                }

                if ($tobeprocessedpurchased != null) {

                    foreach ($tobeprocessedpurchased as $keytbp => $valuetbp) {    

                        $breakdown_without_stuffed_original = Purchase::where('cfd_id',$valuetbp)->first();

                        $bric_details = bric::where('id', '=', $breakdown_without_stuffed_original->br_id)->first();

                        $credit_weight = $bric_details->br_credit_note_weight;

                        $credit_weight = $credit_weight + $total_weight_credited;

                        bric::where('id', '=', $bric_details->id)
                                    ->update(['br_credit_note_weight' => $credit_weight]);

                        $total_weight_credited = 0;
                      


                    }

                }                

            }



            Credit_Note::where('id', '=', $cnid)
            ->update(['cn_confirmed_by' => $user]);


            return View::make('accountscredit', compact('id', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'largest', 'greensize', 'greencolor', 'greendefects', 'processing', 'cupscore', 'rawscore', 'screens', 'seller', 'credit_details', 'StockView', 'coffee_buyer', 'sellerID', 'credit_no', 'goods', 'date'));
            
        } else if (null !== Input::get('submitinstruction')) {

            $this->validate($request, [
                'country' => 'required',
            ]);

            $cnid = null;

            $date = date("Y/m/d", strtotime($date));

            $cweight = Input::get('cweight');

            $total_weight = 0;

            foreach ($cweight as $key_cw => $value_cw) {

                $total_weight += $value_cw;

            }

            $cn_bags = floor($total_weight/60);

            if ($credit_details != null) {

                $cnid = $credit_details->id;

                $request->session()->flash('alert-success', 'Credit Note Information Updated!!');

                Credit_Note::where('id', '=', $cnid)
                    ->update(['cn_number' => $credit_no, 'cn_buyer' => $coffee_buyer, 'cn_seller' => $sellerID, 'cn_goods' => $goods, 'cn_country' => $countryID, 'cn_date' => $date, 'cn_weight' => $total_weight, 'cn_bags' => $cn_bags, 'cn_value' => $cn_value]);

                Activity::log('Updated credit note information for ' . $credit_no . ' coffee_buyer id ' . $coffee_buyer . ' with sellerID ' . $sellerID . ' goods ' . $goods . ' countryID ' . $countryID . ' date ' . $date . ' cn_weight ' . $cn_weight. ' cn_bags ' . $cn_bags. ' cn_value ' . $cn_value. ' User '. $user);

            } else {
                $cnid = Credit_Note::insertGetId(['cn_number' => $credit_no, 'cn_buyer' => $coffee_buyer, 'cn_seller' => $sellerID, 'cn_goods' => $goods, 'cn_country' => $countryID, 'cn_date' => $date, 'cn_weight' => $cn_weight, 'cn_bags' => $cn_bags, 'cn_value' => $cn_value]);

            }
            $tobeprocessed = Input::get('tobeprocessed');

            $tobeprocessedpurchased = Input::get('tobeprocessedpurchased');

            $tobewithdrawn = Input::get('tobewithdrawn');

            $tobewithdrawnpurchased = Input::get('tobewithdrawnpurchased');            

            if ($tobeprocessed != null) {

                foreach ($tobeprocessed as $keytbp => $valuetbp) {    
                    
                    StockBreakdown::where('id', $valuetbp)
                        ->update(['cn_id' => $cnid]);

                }

            }

            if ($tobeprocessedpurchased != null) {

                foreach ($tobeprocessedpurchased as $keytbp => $valuetbp) {   

                    $in_weight = null;

                    if ($valuetbp != null) {

                        $in_weight = $cweight[$valuetbp];

                    }

                    $in_bags = floor($in_weight/60);

                    $in_pkts = floor($in_weight%60);

                    $purchase_details = Purchase::where('cfd_id', $valuetbp)->first();

                    if($purchase_details != null){

                        $war_id = $purchase_details->war_id;

                        $prc_value = $purchase_details->prc_value;

                        $prc_bric_value = $purchase_details->prc_bric_value;

                        $inv_weight = $purchase_details->inv_weight;

                        $prc_value = ($in_weight/$inv_weight) * $prc_value;

                        $prc_bric_value = ($in_weight/$inv_weight) * $prc_bric_value;

                        // $breakdown_without_stuffed = Breakdown_Without_Stuffed::where('cfdid',$valuetbp)->first();

                        Purchase::where('cfd_id', $valuetbp)
                            ->update(['cn_id' => $cnid, 'inv_weight' => $in_weight, 'prc_value' => $prc_value, 'prc_bric_value' => $prc_bric_value]);


                        coffee_details::where('id', $valuetbp)
                            ->update(['cfd_weight' => $in_weight, 'cfd_bags' => $in_bags, 'cfd_pockets' => $in_pkts]);

                        warrants::where('id', $war_id)
                            ->update(['war_weight' => $in_weight]);

                    }





                }

            }



            if ($tobewithdrawn != null) {

                foreach ($tobewithdrawn as $keytbp => $valuetbp) {    

                    StockBreakdown::where('id', $valuetbp)
                        ->update(['cn_id' => NULL]);

                }
            }

            if ($tobewithdrawnpurchased != null) {

                foreach ($tobewithdrawnpurchased as $keytbp => $valuetbp) {      

                    Purchase::where('cfdid', $valuetbp)
                        ->update(['cn_id' => NULL]);
                }

            }



            $date = Input::get('date');

            $credit_details = Credit_Note::where('cn_number', $credit_no)->first();


            return View::make('accountscredit', compact('id', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'largest', 'greensize', 'greencolor', 'greendefects', 'processing', 'cupscore', 'rawscore', 'screens', 'seller', 'credit_details', 'StockView', 'coffee_buyer', 'sellerID', 'credit_no', 'goods', 'date'));

        } else if(null !== Input::get('searchButton')) {

            return View::make('accountscredit', compact('id', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'largest', 'greensize', 'greencolor', 'greendefects', 'processing', 'cupscore', 'rawscore', 'screens', 'seller', 'credit_details', 'StockView', 'coffee_buyer', 'sellerID', 'credit_no', 'goods', 'date'));
        } else {

            return View::make('accountscredit', compact('id', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'largest', 'greensize', 'greencolor', 'greendefects', 'processing', 'cupscore', 'rawscore', 'screens', 'seller', 'credit_details', 'StockView', 'coffee_buyer', 'sellerID', 'credit_no', 'goods', 'date'));
        }

        
    
    }



    public function accountsCreditArrivalForm (Request $request){
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

        $seller = buyer::where('bt_id', '1')->get();

        return View::make('accountscreditarrival', compact('id', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'largest', 'greensize', 'greencolor', 'greendefects', 'processing', 'cupscore', 'rawscore', 'screens', 'seller'));

    }


    public function accountsCreditArrival (Request $request){


    }










    public function getstockview($countryID, $ref_no)
    {
        if ($countryID != null) {
            if($ref_no != null){
                $stockview = Breakdown_Without_Stuffed::select('*')->where('credit_number', $ref_no)->orWhereNull('credit_number')->orderByRaw(DB::raw("FIELD(credit_number, '$ref_no') DESC"));
            } else {
                $stockview = Breakdown_Without_Stuffed::select('*')->whereNull('credit_number');
            }
            
        } else {
            $stockview = null;
        }        


        return Datatables::of($stockview)
            ->make(true);
    }


    public function getstockviewarrival($countryID, $ref_no)
    {
        if ($countryID != null) {
            if($ref_no != null){
                $stockview = Breakdown_Without_Stuffed::select('*')->where('credit_number', $ref_no)->orWhereNull('credit_number')->whereNotNull('st_rejected')->whereNull('st_credited')->orderByRaw(DB::raw("FIELD(credit_number, '$ref_no') DESC"));
            } else {
                $stockview = Breakdown_Without_Stuffed::select('*')->whereNotNull('st_rejected')->whereNull('st_credited')->whereNull('credit_number');
            }
            
        } else {
            $stockview = null;
        }        


        return Datatables::of($stockview)
            ->make(true);
    }

}