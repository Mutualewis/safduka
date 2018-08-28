<?php namespace Ngea\Http\Controllers;

use Input;
use confirm;
use DB;
use ask;
use Illuminate\Http\Request;
use Ngea\Http\Controllers\Controller;
use View;
use Auth;

use Yajra\Datatables\Datatables;

use niklasravnsborg\LaravelPdf\Facades\Pdf as PDF;

use Activity;

use Excel;

use Ngea\country;

use Ngea\StockQuality;

use Ngea\warrants;

use Ngea\Credit_Note;

use delete;

use Ngea\InternalBaskets;

use Ngea\basket;

use Ngea\Months;

use Ngea\Season;


class ValuationController extends Controller {

    public function valuationForm (Request $request){

        if(session('maincountry')!=NULL){

            $cidmain = session('maincountry');

        }

        $internal_basket = InternalBaskets::where('ctr_id', $cidmain)->get();

        $basket = basket::where('ctr_id', $cidmain)->get();

        $Season = Season::all(['id', 'csn_season']);

        $country = country::all(['id', 'ctr_name', 'ctr_initial']);

        $months = Months::all(['id', 'mth_name', 'mth_number']);

        $valuation = DB::table('secondary_valuation_sv AS sv')->select('sv_value as value', 'sv_quantiy as quantity', 'bs_quality as bs_quality, ibs_quality as ibs_quality')
                    ->leftJoin('basket_bs AS bs', 'bs.id', '=', 'sv.bs_id')
                    ->leftJoin('internal_basket_ibs AS ibs', 'ibs.id', '=', 'sv.ibs_id')
                    ->where('sv.ctr_id', $cidmain)->get();

        if ($valuation == null) {

            $country_details = country::where('id', $cidmain)->first();

            $country_name = $country_details->ctr_name;

            $valuation = DB::table('breakdown_without_stuffed AS bws')->select(DB::raw('sum(value) as value'),DB::raw('sum(br_price_per_fifty*br_purchased_weight)/sum(br_purchased_weight) as br_value'), DB::raw('((sum(price*weight)/sum(weight))/1.1023) - (sum(sl_hedge*weight)/sum(weight) ) as diff'), DB::raw('sum(weight) as quantity'), 'bs_quality as bs_quality', 'ibs_quality as ibs_quality')
                        ->groupBy('bws.bs_quality')
                        ->groupBy('bws.ibs_quality')
                        ->orderBy('bws.bs_quality')
                        ->orderBy('bws.ibs_quality')
                        ->where('ctr_name', $country_name)->get();
                        // $total_diff += ($sale_lots->weight) * ($diff);

            // print_r($valuation);
        

        }

        return View::make('toolsvaluation', compact('id', 'Season', 'country', 'basket', 'internal_basket', 'months', 'valuation'));

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

        $StockView = Breakdown_Without_Stuffed::get();

        $cn_weight = Input::get('totalWeight');

        $cn_bags = Input::get('total_bags');

        $cn_value = Input::get('total_value');

        $user_data = Auth::user();
      
        $user = $user_data->id;

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

                        $breakdown_without_stuffed_original = Breakdown_Without_Stuffed::where('stbid',$valuetbp)->first(); 

                        $bric_details = NULL;

                        if ($breakdown_without_stuffed_original != null) {                  

                            $breakdown_without_stuffed = Breakdown_Without_Stuffed::where('id',$breakdown_without_stuffed_original->id)->whereNotNull('stbid')->whereNull('cnid')->get();       

                            foreach ($breakdown_without_stuffed as $keytbws => $valuetbws) { 
                                $total_weight += $valuetbws->full_weight;  
                            } 

                            foreach ($breakdown_without_stuffed as $keytbws => $valuetbws) { 
                                $ratios = $valuetbws->full_weight/$total_weight;   
                                StockBreakdown::where('id', '=', $valuetbws->stbid)
                                    ->update(['stb_bulk_ratio' => $ratios]);                        
                            } 

                            $bric_details = bric::where('id', '=', $breakdown_without_stuffed_original->bric_id)->first();

                        }

                        $credit_weight = null;

                        $bric_id = null;


                        if ($bric_details != null) {

                            $credit_weight = $bric_details->br_credit_note_weight;

                            $credit_weight = $credit_weight + $total_weight_credited;

                            $bric_id = $bric_details->id;

                        }


                        bric::where('id', '=', $bric_details->id)
                                    ->update(['br_credit_note_weight' => $credit_weight]);

                        $total_weight_credited = 0;

                        $total_weight = 0;
                        
                        $credit_weight = 0;

                    }

                }

                if ($tobeprocessedpurchased != null) {

                    foreach ($tobeprocessedpurchased as $keytbp => $valuetbp) {    

                        $breakdown_without_stuffed_original = Breakdown_Without_Stuffed::where('cfdid',$valuetbp)->first();

                        $bric_details = bric::where('id', '=', $breakdown_without_stuffed_original->bric_id)->first();

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

                    $breakdown_without_stuffed = Breakdown_Without_Stuffed::where('stbid',$valuetbp)->first();
                    
                    StockBreakdown::where('id', $breakdown_without_stuffed->stbid)
                        ->update(['cn_id' => $cnid]);

                }

            }

            if ($tobeprocessedpurchased != null) {

                foreach ($tobeprocessedpurchased as $keytbp => $valuetbp) {   

                    $in_weight = $cweight[$valuetbp];

                    $in_bags = floor($in_weight/60);

                    $in_pkts = floor($in_weight%60);

                    $purchase_details = Purchase::where('cfd_id', $valuetbp)->first();

                    $war_id = $purchase_details->war_id;

                    $prc_value = $purchase_details->prc_value;

                    $prc_bric_value = $purchase_details->prc_bric_value;

                    $inv_weight = $purchase_details->inv_weight;

                    $prc_value = ($in_weight/$inv_weight) * $prc_value;

                    $prc_bric_value = ($in_weight/$inv_weight) * $prc_bric_value;

                    $breakdown_without_stuffed = Breakdown_Without_Stuffed::where('cfdid',$valuetbp)->first();

                    Purchase::where('cfd_id', $valuetbp)
                        ->update(['cn_id' => $cnid, 'inv_weight' => $in_weight, 'prc_value' => $prc_value, 'prc_bric_value' => $prc_bric_value]);


                    coffee_details::where('id', $valuetbp)
                        ->update(['cfd_weight' => $in_weight, 'cfd_bags' => $in_bags, 'cfd_pockets' => $in_pkts]);

                    warrants::where('id', $war_id)
                        ->update(['war_weight' => $in_weight]);



                }

            }



            if ($tobewithdrawn != null) {

                foreach ($tobewithdrawn as $keytbp => $valuetbp) {    

                    $breakdown_without_stuffed = Breakdown_Without_Stuffed::where('stbid',$valuetbp)->first();
                    
                    StockBreakdown::where('id', $breakdown_without_stuffed->stbid)
                        ->update(['cn_id' => NULL]);

                }
            }

            if ($tobewithdrawnpurchased != null) {

                foreach ($tobewithdrawnpurchased as $keytbp => $valuetbp) {      

                    $breakdown_without_stuffed = Breakdown_Without_Stuffed::where('cfdid',$valuetbp)->first();

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