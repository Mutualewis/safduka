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
use Ngea\country;
use Ngea\WeightScales;
use Ngea\Weighbridge;
use Ngea\Grn;
use Ngea\CoffeeGrade;
use Ngea\Sale;
use Ngea\coffee_details;
use Ngea\ExpectedArrival;
use Ngea\basket;
use Ngea\Packaging;
use Ngea\purchase;
use Ngea\Stock;
use Ngea\bric;
use Ngea\sale_lots;
use Ngea\warrants;
use Ngea\Location;
use Ngea\Batch;
use Ngea\StockLocation;
use Ngea\Person;
use Ngea\StockBreakdown;
use Ngea\ProvisionalAllocation;
use Ngea\processrates;
use Ngea\teams;
use Ngea\processcharges;



use Yajra\Datatables\Datatables;
use niklasravnsborg\LaravelPdf\Facades\Pdf as PDF;
use Activity;
use Excel;
use Auth;

class WeighScaleController extends Controller {

    public function settingsWeighScaleForm (Request $request){

        $countries = country::all(['id', 'ctr_name', 'ctr_initial', 'ctr_is_active']);

        return View::make('settingsweighscale', compact('countries'));

    }

    public function settingsWeighScale (Request $request){

        $cid = Input::get('country');

        $station = Input::get('station');

        $equipment = Input::get('equipment');
        
        $baud = Input::get('baud');

        $parity = Input::get('parity');

        $stopBits = Input::get('stopBits');
        
        $dataBits = Input::get('dataBits');
        
        $port = Input::get('port');

        $wrhse = Input::get('warehouse');

        $countries = country::all(['id', 'ctr_name', 'ctr_initial', 'ctr_is_active']);

        $warehouse = array();

        $weigh_scales = array();

        $warehouse_count = null;

        $weigh_scales_count = null;

        $user_data = Auth::user();

        $user = $user_data->id;      

        if (NULL !== Input::get('submitsettings')){

            $weigh_scales_details = WeightScales::where('wr_id', $wrhse)->where('ws_equipment_number', $equipment)->where('ws_station', $station)->first();

            if ($weigh_scales_details != null) {

                WeightScales::where('id', '=',  $weigh_scales_details->id)
                    ->update(['wr_id'=>$wrhse, 'ws_station' => $station, 'ws_equipment_number' => $equipment, 'ws_baud_rate' => $baud, 'ws_parity' => $parity, 'ws_stop_bits' => $stopBits, 'ws_data_bits' => $dataBits, 'ws_port_name' => $port]);

                Activity::log('Updated weight scales information for scale ' . $equipment. ' station ' . $station. ' wrhse ' . $wrhse. ' baud ' .$baud. ' parity ' .$parity. ' stopBits ' .$stopBits. ' dataBits ' .$dataBits. ' port ' .$port);

            } else {

                WeightScales::insert(['wr_id'=>$wrhse, 'ws_station' => $station, 'ws_equipment_number' => $equipment, 'ws_baud_rate' => $baud, 'ws_parity' => $parity, 'ws_stop_bits' => $stopBits, 'ws_data_bits' => $dataBits, 'ws_port_name' => $port]);

                Activity::log('Inserted weight scales information for scale ' . $equipment. ' station ' . $station. ' wrhse ' . $wrhse. ' baud ' .$baud. ' parity ' .$parity. ' stopBits ' .$stopBits. ' dataBits ' .$dataBits. ' port ' .$port);

            }

        }

        if ($cid != null) {

            $warehouse_select = country::with('warehouse')->get()->find($cid);

            $warehouse_select = json_decode(json_encode($warehouse_select), true);

            foreach ($warehouse_select as $key => $value) {

                if (is_array($value)) {

                    $warehouse_count = count($value);

                    $warehouse_temp = $value;

                    array_push($warehouse, $warehouse_temp);  

                }          

            }

        }        

        if ($wrhse != null) {

            $weigh_scales_select = null;

            $weigh_scales_select = Warehouse::with('weightScales')->get()->find($wrhse);   

            $weigh_scales_select = json_decode(json_encode($weigh_scales_select), true);

            foreach ($weigh_scales_select as $key => $value) {

                if (is_array($value)) {

                    $weigh_scales_count = count($value);

                    $weigh_scales_temp = $value;

                    array_push($weigh_scales, $weigh_scales_temp);  

                }          

            }

        }        

        return View::make('settingsweighscale', compact('cid', 'countries','warehouse_count', 'warehouse', 'wrhse', 'weigh_scales', 'weigh_scales_count'));

    }


    public function weigh_scale_delete($id)
    {
        $user_data = Auth::user();
        $user = $user_data->id;
        try{
            $weigh_scale_details =WeightScales::findOrFail($id);
            if ($weigh_scale_details) {
                $weigh_scale_details->delete();
                $weigh_scale=$weigh_scale_details->trp_name;
                $weigh_scale_details->delete();
                Activity::log('Deleted weigh scale information for weigh_scale ' . $equipmnet. ' User '. $user);
                return response()->json([
                    'deletable' => true,
                    'error' => null
                ]);
            }else{
                return response()->json([
                    'deletable' => false,
                    'error' => '404'
                ]);
            }
        }catch (\PDOException $e) {
            return response()->json([
                'deletable' => false,
                'error' => $e->getMessage()
            ]);
        }
    }


    public function arrivalInformationForm (Request $request){

        $Season = Season::all(['id', 'csn_season']);

        $country = country::all(['id', 'ctr_name', 'ctr_initial']);

        $cidmain = session('maincountry');

        $grn_no = null;

        $rates    = processrates::all(['id', 'service']);

        $teams   = teams::all(['id', 'tms_grpname']);


        $grn_number = null;

        if ($cidmain != null) {

            $weighbridge_ticket = Weighbridge::where('ctr_id', $cidmain)->where(DB::Raw('LEFT(wb_time_in, 10)'), date("Y-m-d"))->orWhere('id', 1)->get(); 

            $grn_no = Grn::where('ctr_id', $cidmain)->orderBy('id', 'desc')->first();

            $grn_no = $grn_no->gr_number;            

            if ($grn_no != NULL && is_numeric($grn_no)) {

                $grn_number = sprintf("%07d", ($grn_no + 0000001));

            }

        }

        $expected_arrival = ExpectedArrival::get();

        return View::make('arrivalinformation', compact('Season', 'country', 'weighbridge_ticket', 'grn_number', 'expected_arrival', 'rates', 'teams'));   

    }


    public function arrivalInformation (Request $request) {

        $cid = Input::get('country');

        $grn_number = Input::get('grn_number');

        $weighbridgeTK = Input::get('weighbridgeTK');

        $outt_season = Input::get('outt_season');
        
        $sale_selected = Input::get('sale');

        $saleid = $sale_selected;
        
        $sif_lot = Input::get('sif_lot');
        
        $coffee_grade = Input::get('coffee_grade');
        
        $warrant = Input::get('warrant');
        
        $outt_number = Input::get('outt_number_search');

        $moisture = Input::get('moisture');

        $packaging = Input::get('packaging');

        $dispatch_kilograms = Input::get('dispatch_kilograms');  

        $delivery_kilograms = Input::get('delivery_kilograms');

        $batch_weight = Input::get('batch_kilograms');

        $partial = Input::get('partial');

        $wsid = Input::get('weigh_scales');

        $rw = Input::get('row');

        $clm = Input::get('column');

        $zone = Input::get('zone');

        $packages_batch = Input::get('packages_batch');

        $wrhse = Input::get('warehouse');

        $stock_id = Input::get('stock_id');

        $dispatch_date = Input::get('date');

        $stock_id = Input::get('outt_number_search');

        $package_status = Input::get('package_status');

        $dispatch_date=date_create($dispatch_date);

        $dispatch_date = date_format($dispatch_date,"Y-m-d"); 

        $warehouse = array();

        $weigh_scales = array();

        $user_data = Auth::user();

        $user = $user_data->id; 

        $user_name = $user_data->usr_name; 

        $per_id = $user_data->per_id; 

        $strBaudRate = NULL;

        $strParity = NULL;

        $strStopBits = NULL;

        $strDataBits = NULL;

        $strPortName = NULL;

        $grn_id = NULL;

        $rates    = processrates::all(['id', 'service']);

        $teams   = teams::all(['id', 'tms_grpname']);

        $grn_details = Grn::where('gr_number', $grn_number)->where('ctr_id', $cid)->first(); 

        if ($grn_details != null) {

            $grn_id = $grn_details->id;

        } 

        $expected_arrival = $this->getExpectedArrival($grn_id);       

        if (NULL !==  Input::get('confirmgrns')) { 

            $weigh_scale_details = WeightScales::get();

            if ($weigh_scale_details != NULL) {

                foreach ($weigh_scale_details as $key_wsd => $value_wsd) {

                    $weigh_scale_session = "scale - ".$value_wsd->id."";

                    $request->session()->pull($weigh_scale_session);  

                }

            }

            if ($grn_details != NULL) {

                Grn::where('id', '=', $grn_id)
                        ->update(['ctr_id' => $cid, 'gr_number' => $grn_number, 'wb_id' => $weighbridgeTK, 'csn_id' => $outt_season, 'gr_confirmed_by' => $user]);

                Activity::log('Updated Grn information with grn_id '.$grn_id. ' ctr_id '. $cid. ' wb_id '. $weighbridgeTK . 'grn_number' . $grn_number );

            } else {

                $grn_id = Grn::insertGetId (
                        ['ctr_id' => $cid, 'gr_number' => $grn_number, 'wb_id' => $weighbridgeTK, 'csn_id' => $outt_season, 'gr_confirmed_by' => $user]);

                Activity::log('Inserted Grn information with grn_id '.$grn_id. ' ctr_id '. $cid. ' wb_id '. $weighbridgeTK . 'grn_number' . $grn_number );
            }

        } else if (NULL !== Input::get('submitlot')) {

            $cfd_id = NULL;

            $coffee_details = ExpectedArrival::where('id', $stock_id)->first();

            if ($coffee_details != NULL) {

                $cfd_id = $coffee_details->id;

            }   

            $purchase_details = purchase::where('cfd_id', $cfd_id)->where('gr_id', '!=', $grn_id)->orWhereNull('gr_id')->where('cfd_id', $cfd_id)->first();

            if ($purchase_details != null) {

                $stock_details = Stock::where('prc_id', $purchase_details->id)->first();

                $pr_bsid = $purchase_details->bs_id;

                $pr_ibsid = $purchase_details->ibs_id;

                $pr_price = $purchase_details->prc_confirmed_price;

                $pr_brid = $purchase_details->br_id;

                $st_grid = NULL;

                $st_slid = NULL;

                $st_name = NULL;

                $grnid = null;

                $batch_kilograms = $delivery_kilograms;

                $wrhse = Input::get('warehouse');

                $moisture = Input::get('moisture');

                $row = Input::get('locrow');

                $column = Input::get('loccol');

                $zone = Input::get('zone');

                $packages = Input::get('packages_stock');

                $tare = NULL;

                $package_weight = Packaging::where('id', $packaging)->first();

                if ($package_weight != NULL) {

                    $tare = ($package_weight->pkg_weight) * $packages;

                } 

                $net_weight = $batch_kilograms - $tare;

                $bags = floor($net_weight/60);

                $pockets = floor($net_weight % 60);

                $btnumber = NULL;

                $br_price_pounds = NULL;

                $br_value = NULL;

                $br_diffrential = NULL;

                if ($coffee_details !== NULL) {

                    $st_grid = $coffee_details->grade;

                    $st_grid = CoffeeGrade::where('cgrad_name', $st_grid)->first();

                    $st_grid = $st_grid->id;

                    $st_slid = $coffee_details->slid;

                    $st_season = $coffee_details->csn_id;

                    $st_name = $coffee_details->outturn.$coffee_details->mark;

                    $st_outturn = $coffee_details->outturn;

                    $cbid = $coffee_details->cbid;

                    $st_mark = $coffee_details->mark;
                }

                $bric_details = bric::where('id', $purchase_details->br_id)->first();

                if ($bric_details != null) {

                    $br_id = $bric_details->id;

                    $br_price_pounds = $bric_details->br_price_pounds;

                    $br_value = $bric_details->br_value;

                    $br_diffrential = $bric_details->br_diffrential;

                    $br_arrival_gain = $bric_details->br_arrival_gain;

                    $br_arrival_loss = $bric_details->br_arrival_loss;

                    $purchased_weight = $purchase_details->inv_weight;

                    if ($net_weight > $purchased_weight) {

                        bric::where('id', '=', $br_id)
                            ->update(['br_arrival_gain' => ($net_weight - $purchased_weight) + $br_arrival_gain]);

                    } else if ($net_weight < $purchased_weight) {

                        bric::where('id', '=', $br_id)
                            ->update(['br_arrival_loss' => ($purchased_weight - $net_weight) + $br_arrival_loss]);

                    }
                } 

                $prc_value = ($net_weight/$purchase_details->inv_weight) * $purchase_details->prc_value;

                $bric_value = ($net_weight/$purchase_details->inv_weight) * $purchase_details->prc_bric_value;

                $hedge = $purchase_details->prc_hedge;

                $grn_details = Grn::where('gr_number', $grn_number)->where('ctr_id', $cid)->first(); 

                if ($grn_details != NULL) {

                    $grn_id = $grn_details->id;

                    Grn::where('id', '=', $grn_id)
                            ->update(['ctr_id' => $cid, 'gr_number' => $grn_number, 'wb_id' => $weighbridgeTK, 'csn_id' => $outt_season]);

                    Activity::log('Updated Grn information with grn_id '.$grn_id. ' ctr_id '. $cid. ' wb_id '. $weighbridgeTK . 'grn_number' . $grn_number );

                } else {

                    $grn_id = Grn::insertGetId (
                            ['ctr_id' => $cid, 'gr_number' => $grn_number, 'wb_id' => $weighbridgeTK, 'csn_id' => $outt_season]);

                    Activity::log('Inserted Grn information with grn_id '.$grn_id. ' ctr_id '. $cid. ' wb_id '. $weighbridgeTK . 'grn_number' . $grn_number );
                }
                
                if (isset($prdetails)) {

                    $purchased_weight = $prdetails->inv_weight;

                }

                $threshold_name = "Arrival";

                $identifier = $threshold_name. " ". $st_outturn.'/'.$st_mark.' GRN-'. $grn_number;

                if ($partial == null) {

                    $net_weight_received = null;

                    $purchase_received = Stock::where('prc_id', $purchase_details->id)->get();

                    if ($purchase_details != null) {

                        foreach ($purchase_received as $purchase_received_key => $purchase_received_value) {

                            $net_weight_received += $purchase_received_value->st_net_weight;

                        }

                    }

                    if ($net_weight_received == null || $net_weight_received ==  0) {

                        $net_weight_received = $net_weight;

                    }

                    $this->checkThreshold($threshold_name, $purchased_weight, $net_weight_received, $identifier);

                }   


                $stock_details_exist = Stock::where('gr_id', $grn_id)->where('st_outturn', $st_outturn)->where('cgrad_id', $st_grid)->first(); 

                if ($stock_details_exist == null) {

                    $stid = Stock::insertGetId(['prc_id' => $purchase_details->id,'gr_id' => $grn_id,'st_dispatch_net' => $dispatch_kilograms, 'st_moisture' =>  $moisture,  'pkg_id' =>  $packaging, 'usr_id' =>  $user, 'sts_id' => '1', 'ctr_id' => $cid, 'bs_id' => $pr_bsid, 'ibs_id' => $pr_ibsid, 'prc_price' => $pr_price, 'st_price' => $br_price_pounds, 'st_value' => $prc_value,  'st_diff' => $br_diffrential,  'br_id' => $pr_brid, 'sl_id' => $st_slid, 'cgrad_id' => $st_grid, 'st_name' => $st_name, 'st_outturn' => $st_outturn, 'st_mark' => $st_mark, 'csn_id' => $st_season, 'cb_id' => $cbid, 'st_packages' => $packages, 'st_partial_delivery' => $partial , 'st_value' => $prc_value , 'st_bric_value' => $bric_value , 'st_hedge' => $hedge, 'st_dispatch_date' => $dispatch_date, 'st_quality_check' => 1, 'st_package_status' => $package_status ]);

                    StockBreakdown::insertGetId (
                                 ['st_id' => $stid, 'br_id' => $pr_brid, 'stb_value' => $bric_value, 'stb_weight' => $net_weight, 'bs_id' => $pr_bsid, 'ibs_id' => $pr_ibsid, 'stb_bulk_ratio' => 1,'stb_value_ratio' => 1,  'stb_purchase_contract_ratio' => 1, 'cb_id' => $cbid, 'cgr_id' => null]);

                    $stock_details_partial_exist = Stock::where('prc_id', $purchase_details->id)->where('id', '!=', $stid)->get(); 
                    $partial_update = null;

                    if ($partial == null) {

                        $partial_update = null;

                    } else {
                        $partial_update = 1;
                    }

                    if ($stock_details_partial_exist != null) {
                        foreach ($stock_details_partial_exist as $stock_details_partial_key => $stock_details_partial_value) {
                            Stock::where('id', '=', $stock_details_partial_value->id)
                             ->update(['st_partial_delivery' => $partial_update]);
                        }
                         

                    }

                }

                $request->session()->flash('alert-success', 'Stock Information Updated!!');            

                if ($coffee_details->prallid != null) {

                    ProvisionalAllocation::where('id', '=', $coffee_details->prallid)
                        ->update(['cfd_id' => NULL, 'st_id' => $stid ]);

                }

                Activity::log('Inserted Stock information with stid'.$stid. ' grn_id '. $grn_id. ' dispatch_kilograms '. $dispatch_kilograms. ' delivery_kilograms '. $delivery_kilograms. ' moisture '. $moisture. ' packaging '. $packaging);

                purchase::where('id', '=', $purchase_details->id)
                        ->update(['gr_id' => $grn_id]);


            } else {

                $stock_details= DB::table('stock_st AS st')
                    ->select('*', 'prc.bs_id as bsid', 'st.id as stid')
                    ->leftJoin('purchases_prc AS prc', 'st.prc_id', '=', 'prc.id')
                    ->leftJoin('coffee_details_cfd AS cfd', 'prc.cfd_id', '=', 'cfd.id')
                    ->leftJoin('coffee_grade_cgrad AS cgrad', 'cgrad.id', '=', 'cfd.cgrad_id')
                    ->where('cfd.id', $stock_id)
                    ->where('st.gr_id', $grn_id)
                    ->first();

                if ($stock_details != null) {

                    $purchase_details = purchase::where('id', $stock_details->prc_id)->first();

                    $coffee_details = coffee_details::where('id', $purchase_details->cfd_id)->first();

                    $pr_bsid = $purchase_details->bs_id;

                    $pr_ibsid = $purchase_details->ibs_id;

                    $pr_price = $purchase_details->prc_confirmed_price;

                    $pr_brid = $purchase_details->br_id;

                    $st_grid = NULL;

                    $st_slid = NULL;

                    $st_name = NULL;

                    $batch_kilograms = $delivery_kilograms;

                    $wrhse = Input::get('warehouse');

                    $moisture = Input::get('moisture');

                    $row = Input::get('locrow');

                    $column = Input::get('loccol');

                    $zone = Input::get('zone');

                    $packages = Input::get('packages_stock');

                    $tare = NULL;

                    $package_weight = Packaging::where('id', $packaging)->first();

                    if ($package_weight != NULL) {

                        $tare = ($package_weight->pkg_weight) * $packages;

                    } 

                    $net_weight = $batch_kilograms - $tare;

                    $bags = floor($net_weight/60);

                    $pockets = floor($net_weight % 60);

                    $btnumber = NULL;

                    $br_price_pounds = NULL;

                    $br_value = NULL;

                    $br_diffrential = NULL;

                    if ($coffee_details !== NULL) {

                        $st_grid = $coffee_details->cgrad_id;

                        $st_slid = $coffee_details->sl_id;

                        $st_season = $coffee_details->csn_id;

                        $st_name = $coffee_details->cfd_outturn.$coffee_details->cfd_grower_mark;

                        $st_outturn = $coffee_details->cfd_outturn;

                        $cbid = $coffee_details->cb_id;

                        $st_mark = $coffee_details->cfd_grower_mark;
                    }

                    $bric_details = bric::where('id', $purchase_details->br_id)->first();

                    if ($bric_details != null) {

                        $br_id = $bric_details->id;

                        $br_price_pounds = $bric_details->br_price_pounds;

                        $br_value = $bric_details->br_value;

                        $br_diffrential = $bric_details->br_diffrential;

                        $br_arrival_gain = $bric_details->br_arrival_gain;

                        $br_arrival_loss = $bric_details->br_arrival_loss;

                        $purchased_weight = $purchase_details->inv_weight;

                        if ($net_weight > $purchased_weight) {

                            bric::where('id', '=', $br_id)
                                ->update(['br_arrival_gain' => ($net_weight - $purchased_weight) + $br_arrival_gain]);

                        } else if ($net_weight < $purchased_weight) {

                            bric::where('id', '=', $br_id)
                                ->update(['br_arrival_loss' => ($purchased_weight - $net_weight) + $br_arrival_loss]);

                        }
                    } 

                    $prc_value = ($net_weight/$purchase_details->inv_weight) * $purchase_details->prc_value;

                    $bric_value = ($net_weight/$purchase_details->inv_weight) * $purchase_details->prc_bric_value;

                    $hedge = $purchase_details->prc_hedge;

                    $grn_details = Grn::where('gr_number', $grn_number)->where('ctr_id', $cid)->first(); 

                    if ($grn_details != NULL) {

                        $grn_id = $grn_details->id;

                        Grn::where('id', '=', $grn_id)
                                ->update(['ctr_id' => $cid, 'gr_number' => $grn_number, 'wb_id' => $weighbridgeTK, 'csn_id' => $outt_season]);

                        Activity::log('Updated Grn information with grn_id '.$grn_id. ' ctr_id '. $cid. ' wb_id '. $weighbridgeTK . 'grn_number' . $grn_number );

                    } else {

                        $grn_id = Grn::insertGetId (
                                ['ctr_id' => $cid, 'gr_number' => $grn_number, 'wb_id' => $weighbridgeTK, 'csn_id' => $outt_season]);

                        Activity::log('Inserted Grn information with grn_id '.$grn_id. ' ctr_id '. $cid. ' wb_id '. $weighbridgeTK . 'grn_number' . $grn_number );
                    }

                    $batch_kilograms = $delivery_kilograms;

                    $moisture = Input::get('moisture');

                    $packages = Input::get('packages_stock');

                    $tare = NULL;

                    $package_weight = Packaging::where('id', $packaging)->first();

                    if ($package_weight != NULL) {

                        $tare = ($package_weight->pkg_weight) * $packages;

                    } 

                    $net_weight = $batch_kilograms - $tare;

                    $bags = floor($net_weight/60);

                    $pockets = floor($net_weight % 60);

                    $st_id = $stock_details->stid;

                    Stock::where('id', '=', $st_id)
                            ->update(['prc_id' => $purchase_details->id,'gr_id' => $grn_id,'st_dispatch_net' => $dispatch_kilograms, 'st_moisture' =>  $moisture,  'pkg_id' =>  $packaging, 'usr_id' =>  $user, 'sts_id' => '1', 'ctr_id' => $cid, 'bs_id' => $pr_bsid, 'ibs_id' => $pr_ibsid, 'prc_price' => $pr_price, 'st_price' => $br_price_pounds, 'st_value' => $prc_value,  'st_diff' => $br_diffrential,  'br_id' => $pr_brid, 'sl_id' => $st_slid, 'cgrad_id' => $st_grid, 'st_name' => $st_name, 'st_outturn' => $st_outturn, 'st_mark' => $st_mark, 'csn_id' => $st_season, 'cb_id' => $cbid, 'st_packages' => $packages, 'st_partial_delivery' => $partial , 'st_value' => $prc_value , 'st_bric_value' => $bric_value , 'st_hedge' => $hedge, 'st_dispatch_date' => $dispatch_date, 'st_quality_check' => 1, 'st_package_status' => $package_status ]);

                    $batch_kilograms = 0;

                    $stock_details_partial_exist = Stock::where('prc_id', $purchase_details->id)->where('id', '!=', $st_id)->get();

                    $partial_update = null;

                    if ($partial == null) {

                        $partial_update = null;

                    } else {
                        $partial_update = 1;
                    }

                    if ($stock_details_partial_exist != null) {
                        foreach ($stock_details_partial_exist as $stock_details_partial_key => $stock_details_partial_value) {
                            Stock::where('id', '=', $stock_details_partial_value->id)
                             ->update(['st_partial_delivery' => $partial_update]);
                        }
                         

                    }
                    }

            }

        } else if (NULL !== Input::get('resetweight')) {

            $weigh_scales_details = WeightScales::where('id', $wsid)->first();

            if ($weigh_scales_details != null) {

                $strBaudRate = $weigh_scales_details->ws_baud_rate;

                $strParity = $weigh_scales_details->ws_parity;

                $strStopBits = $weigh_scales_details->ws_stop_bits;

                $strDataBits = $weigh_scales_details->ws_data_bits;

                $strPortName = $weigh_scales_details->ws_port_name;

            }

            $ch = curl_init();

            $ip_address = $this->get_client_ip();

            curl_setopt($ch, CURLOPT_URL,"http://".$ip_address."//weighscale/api.php");

            curl_setopt($ch, CURLOPT_POST, 1);

            curl_setopt($ch, CURLOPT_POSTFIELDS,
                        "strBaudRate=".$strBaudRate."&strParity=".$strParity."&strStopBits=".$strStopBits."&strDataBits=".$strDataBits."&strPortName=".$strPortName."");

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $weight = curl_exec ($ch);

            curl_close ($ch);   

            $batch_kilograms = $weight;  
            $batch_kilograms = 0;  

            $weigh_scale_session = "scale - ".$wsid."";

            if (session()->has($weigh_scale_session) && $batch_kilograms === 0 ){

                $request->session()->pull($weigh_scale_session);   

            }


        } else if (NULL !== Input::get('fetchweight')) {

            $weigh_scales_details = WeightScales::where('id', $wsid)->first();

            if ($weigh_scales_details != null) {

                $strBaudRate = $weigh_scales_details->ws_baud_rate;

                $strParity = $weigh_scales_details->ws_parity;

                $strStopBits = $weigh_scales_details->ws_stop_bits;

                $strDataBits = $weigh_scales_details->ws_data_bits;

                $strPortName = $weigh_scales_details->ws_port_name;

            }

            $ch = curl_init();

            $ip_address = $this->get_client_ip();

            curl_setopt($ch, CURLOPT_URL,"http://".$ip_address."//weighscale/api.php");

            curl_setopt($ch, CURLOPT_POST, 1);

            curl_setopt($ch, CURLOPT_POSTFIELDS,
                        "strBaudRate=".$strBaudRate."&strParity=".$strParity."&strStopBits=".$strStopBits."&strDataBits=".$strDataBits."&strPortName=".$strPortName."");

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $weight = curl_exec ($ch);            

            curl_close ($ch);   

            $batch_kilograms = $weight;  

            $weigh_scale_session = "scale - ".$wsid."";

            $request->session()->put($weigh_scale_session, $batch_kilograms);

        } else if (NULL !== Input::get('submitbatch')) {            

            $package_weight = Packaging::where('id', $packaging)->first();
            
            if ($package_weight != NULL) {
            
                $tare_batch = ($package_weight->pkg_weight) * $packages_batch;

            }    

            $purchased_details = purchase::where('cfd_id', $stock_id)->first();

            $stock_item_id = stock::where('prc_id', $purchased_details->id)->where('gr_id', $grn_id)->first();

            $stock_item_id = $stock_item_id->id;

            $net_weight_batch = $batch_weight - $tare_batch;

            $bags_batch = floor($net_weight_batch/60);

            $pockets_batch = floor($net_weight_batch % 60);

            $coffee_details = NULL;

            $preious_batch = Batch::where('st_id', $stock_id)->get();

            $btid = Batch::insertGetId (
            ['st_id' => $stock_item_id, 'btc_weight' => $batch_weight, 'btc_tare' => $tare_batch, 'btc_net_weight' => $net_weight_batch, 'btc_packages' => $packages_batch, 'btc_bags' => $bags_batch, 'btc_pockets' => $pockets_batch, 'ws_id' => $wsid]);


            if ($preious_batch != null) {

                foreach ($preious_batch as $key_pb => $value_pb) {

                    $batch_weight += $value_pb->btc_weight;

                    $tare_batch += $value_pb->btc_tare;

                    $net_weight_batch += $value_pb->btc_net_weight;

                    $packages_batch += $value_pb->btc_packages;

                    $bags_batch += $value_pb->bags_batch;

                    $pockets_batch += $value_pb->btc_pockets;

                }

            }

            Stock::where('id', '=', $stock_item_id)
                        ->update([ 'st_net_weight' => $net_weight_batch ,'st_tare' => $tare_batch, 'st_bags' => $bags_batch, 'st_pockets' => $pockets_batch, 'st_gross' => $batch_weight]);

            Activity::log('Inserted Batch information with btid '.$btid. ' batch_kilograms '. $batch_weight. ' bags '. $bags_batch. ' pockets '. $pockets_batch. ' stid '. $stock_id.' btc_tare '.$tare_batch.' btc_net_weight '.$net_weight_batch);

            $stlocid = StockLocation::insertGetId (
            ['bt_id' => $btid, 'loc_row_id' => $rw, 'loc_column_id' => $clm, 'btc_zone' => $zone]);

            Activity::log('Inserted StockLocation information with bt_id '.$btid. ' locrowid '. $rw. ' loccolid '. $clm. ' zone '. $zone);       

        } else if (NULL !== Input::get('printgrns')) {            

            $grnsview_summary = DB::table('stock_st AS st')
                ->select('*','st.id as stid', 'prc.bs_id as bsid', 'gr.created_at as gr_date', 'gr.updated_at as gr_end_date')
                ->leftJoin('purchases_prc AS prc', 'st.prc_id', '=', 'prc.id')
                ->leftJoin('coffee_details_cfd AS cfd', 'prc.cfd_id', '=', 'cfd.id')
                ->leftJoin('coffee_grade_cgrad AS cgrad', 'cgrad.id', '=', 'cfd.cgrad_id')
                ->leftJoin('warrants_war AS war', 'war.id', '=', 'prc.war_id')
                ->leftJoin('grn_gr AS gr', 'gr.id', '=', 'st.gr_id')
                ->leftJoin('weighbridge_wb AS wb', 'wb.id', '=', 'gr.wb_id')
                ->leftJoin('warehouse_wr AS wr', 'wr.id', '=', 'cfd.wr_id')                
                ->where('st.gr_id', $grn_id)
                ->first();  

            $person_details = Person::where('id', $per_id)->first();

            $person_name = $person_details->per_fname.' '.$person_details->per_sname;

            if ($grnsview_summary != null) {

                $client =  $grnsview_summary->wr_name;

                $delivery_date = $grnsview_summary->gr_date;

                $delivery_date = date("d/m/Y", strtotime($delivery_date));

                $movement_permit = $grnsview_summary->wb_movement_permit;

                $vehicle = $grnsview_summary->wb_vehicle_plate;

                $weighbridge_ticket = $grnsview_summary->wb_ticket;

                $time_received = $grnsview_summary->gr_date;

                $time_received_stop = $grnsview_summary->gr_end_date;

                $time_received = date("H:i:s", strtotime($time_received));

                $time_received_stop = date("H:i:s", strtotime($time_received_stop));

                $received_by = $person_name;

                $driver_name = $grnsview_summary->wb_driver_name;

                $driver_id = $grnsview_summary->wb_driver_id;

                $warehouse_manager = $grnsview_summary->wr_att;

            }

            $grnsview = DB::table('stock_st AS st')
                ->select('*','st.id as stid', 'prc.bs_id as bsid')
                ->leftJoin('grn_gr AS gr', 'gr.id', '=', 'st.gr_id')
                ->leftJoin('purchases_prc AS prc', 'st.prc_id', '=', 'prc.id')
                ->leftJoin('coffee_details_cfd AS cfd', 'prc.cfd_id', '=', 'cfd.id')
                ->leftJoin('sale_sl AS sl', 'sl.id', '=', 'cfd.sl_id')
                ->leftJoin('coffee_grade_cgrad AS cgrad', 'cgrad.id', '=', 'cfd.cgrad_id')
                ->leftJoin('warrants_war AS war', 'war.id', '=', 'prc.war_id')
                ->leftJoin('weighbridge_wb AS wb', 'wb.id', '=', 'gr.wb_id')
                ->where('st.gr_id', $grn_id)
                ->get();  


            $pdf = PDF::loadView('pdf.print_grns', compact('grnsview','client', 'delivery_date', 'movement_permit', 'vehicle', 'weighbridge_ticket', 'time_received', 'received_by', 'driver_name', 'time_received_stop', 'driver_id', 'grn_number', 'warehouse_manager'));

            return $pdf->stream('print_grn.pdf');

        }

        $Season = Season::all(['id', 'csn_season']);

        $country = country::all(['id', 'ctr_name', 'ctr_initial']);

        if ($cid != null) {

            $weighbridge_ticket = Weighbridge::where('ctr_id', $cid)->where(DB::Raw('LEFT(wb_time_in, 10)'), date("Y-m-d"))->orWhere('id', 1)->get(); 

            $coffeeGrade = CoffeeGrade::where('ctr_id', $cid)->get();

            $sale = Sale::where('ctr_id', $cid)->where('csn_id', $outt_season)->orderByRaw('LENGTH(`sl_no`) ASC')->orderBy('sl_no')->get(); 

            $basket = basket::where('ctr_id', $cid)->get();

            $packaging = Packaging::get();

        }

        $cfd_id = NULL;

        $purchase_details = NULL;

        $coffee_details = ExpectedArrival::where('id', $stock_id)->first();

        if ($coffee_details != null) {            

            $cfd_id = $coffee_details->id;

            $purchase_details = purchase::where('cfd_id', $cfd_id)->where('gr_id', $grn_id)->first();
        }

        if ($coffee_details != null && $purchase_details == null) {            

            $cfd_id = $coffee_details->id;

            $purchase_details = purchase::where('cfd_id', $cfd_id)->where('gr_id', '!=', $grn_id)->first();

            if ($purchase_details != null) {

                $stock_details = Stock::where('prc_id', $purchase_details->id)->first();

            }   

        } else {

            // $coffee_details = NULL;

            $stock_details = DB::table('stock_st AS st')
                ->select('*','st.id as stid', 'prc.bs_id as bsid')
                ->leftJoin('purchases_prc AS prc', 'st.prc_id', '=', 'prc.id')
                ->leftJoin('coffee_details_cfd AS cfd', 'prc.cfd_id', '=', 'cfd.id')
                ->leftJoin('coffee_grade_cgrad AS cgrad', 'cgrad.id', '=', 'cfd.cgrad_id')
                ->where('cfd.id', $stock_id)
                ->where('st.gr_id', $grn_id)
                ->first();

            if ($stock_details != null) {

                $st_id = $stock_details->id;

                $war_id = $stock_details->war_id;

            } 
            

        }

        if ($cid != null) {

            $warehouse_select = country::with('warehouse')->get()->find($cid);

            $warehouse_select = json_decode(json_encode($warehouse_select), true);

            foreach ($warehouse_select as $key => $value) {

                if (is_array($value)) {

                    $warehouse_count = count($value);

                    $warehouse_temp = $value;

                    array_push($warehouse, $warehouse_temp);  

                }          

            }

        }      

        if ($wrhse !== NULL) {

            $location = Location::where('wr_id', $wrhse)->get();

            $weigh_scales_select = null;

            $weigh_scales_select = Warehouse::with('weightScales')->get()->find($wrhse);   

            $weigh_scales_select = json_decode(json_encode($weigh_scales_select), true);

            if ($weigh_scales_select != null) {

                foreach ($weigh_scales_select as $key => $value) {

                    if (is_array($value)) {

                        $weigh_scales_count = count($value);

                        $weigh_scales_temp = $value;

                        array_push($weigh_scales, $weigh_scales_temp);  

                    }          

                }

            }

        }

        if ($grn_id != null) {

            $grnsview = DB::table('stock_st AS st')
                ->select('*','st.id as stid', 'prc.bs_id as bsid')
                ->leftJoin('grn_gr AS gr', 'gr.id', '=', 'st.gr_id')
                ->leftJoin('purchases_prc AS prc', 'st.prc_id', '=', 'prc.id')
                ->leftJoin('coffee_details_cfd AS cfd', 'prc.cfd_id', '=', 'cfd.id')
                ->leftJoin('coffee_grade_cgrad AS cgrad', 'cgrad.id', '=', 'cfd.cgrad_id')
                ->leftJoin('warrants_war AS war', 'war.id', '=', 'prc.war_id')
                ->where('st.gr_id', $grn_id)
                ->get();
                
        }

        if ($stock_id != null) {

            $purchase_details_batch = purchase::where('cfd_id',$stock_id)->first();

            $stock_details_batch_id = null;

            if ($purchase_details_batch != null) {

                $stock_details_batch = stock::where('prc_id', $purchase_details_batch->id)->where('gr_id', $grn_id)->first();

                if ($stock_details_batch != null) {

                    $stock_details_batch_id = $stock_details_batch->id;

                }
            }

            

            $batchview = DB::table('batch_btc AS btc')
                ->select('btc.id as btcid', 'btc_weight as btc_weight', 'btc_tare', 'btc_net_weight', 'btc_packages', 'wr_name', 'locrow.loc_row as loc_row', 'loccol.loc_column as loc_column', 'btc_zone')
                ->leftJoin('stock_location_sloc AS sloc', 'sloc.bt_id', '=', 'btc.id')
                ->leftJoin('location_loc AS locrow', 'locrow.id', '=', 'sloc.loc_row_id')
                ->leftJoin('location_loc AS loccol', 'loccol.id', '=', 'sloc.loc_column_id')
                ->leftJoin('warehouse_wr AS wr', 'wr.id', '=', 'locrow.wr_id')
                ->where('btc.st_id', $stock_details_batch_id)
                ->whereNotNull('btc.st_id')
                ->get();
                
        }

        $grn_details = Grn::where('gr_number', $grn_number)->where('ctr_id', $cid)->first(); 

        if ($stock_details != null) {
            $st_quality_check = $stock_details->st_quality_check;
        } 

        $wbtk = $weighbridgeTK;

        $ot_season = $outt_season;

        return View::make('arrivalinformation', compact('Season', 'country', 'weighbridge_ticket', 'grn_number', 'grn_details', 'coffeeGrade', 'sale', 'coffee_details', 'saleid', 'basket', 'packaging', 'stock_details', 'warehouse', 'warehouse_count', 'wrhse', 'location', 'weigh_scales', 'weigh_scales_count', 'wsid', 'rw', 'clm', 'zone', 'packages_batch', 'batch_kilograms', 'grnsview', 'batchview', 'expected_arrival', 'stock_id', 'st_quality_check', 'rates', 'teams', 'wbtk', 'ot_season')); 
    
    }

    public function getExpectedArrival($gr_id)
    {   
        if ($gr_id != null) {
            $expected = DB::table('coffee_details_cfd AS cfd')
                ->select('cfd.id as id','sl.sl_no as sale', 'cfd.cfd_lot_no as lot', 'cfd.cfd_outturn as outturn', 'cgrad_name as grade')
                ->leftJoin('sale_sl AS sl', 'sl.id', '=', 'cfd.sl_id')
                ->leftJoin('purchases_prc AS prc', 'prc.cfd_id', '=', 'cfd.id')            
                ->leftJoin('grn_gr AS gr', 'gr.id', '=', 'prc.gr_id')
                ->leftJoin('stock_st AS st', 'st.prc_id', '=', 'prc.id')
                ->leftJoin('coffee_grade_cgrad AS cgrad', 'cgrad.id', '=', 'cfd.cgrad_id')
                ->whereNotNull('rl_id')
                ->whereNull('prc.gr_id')
                ->whereNull('st.st_net_weight')
                ->orWhereNotNull('st_partial_delivery')
                ->orWhereNull('gr_confirmed_by')
                ->where('prc.gr_id', $gr_id)
                ->groupBy('cfd.id')
                ->get();
        } else {

            $expected = DB::table('coffee_details_cfd AS cfd')
                ->select('cfd.id as id','sl.sl_no as sale', 'cfd.cfd_lot_no as lot', 'cfd.cfd_outturn as outturn', 'cgrad_name as grade')
                ->leftJoin('sale_sl AS sl', 'sl.id', '=', 'cfd.sl_id')
                ->leftJoin('purchases_prc AS prc', 'prc.cfd_id', '=', 'cfd.id')            
                ->leftJoin('grn_gr AS gr', 'gr.id', '=', 'prc.gr_id')
                ->leftJoin('stock_st AS st', 'st.prc_id', '=', 'prc.id')
                ->leftJoin('coffee_grade_cgrad AS cgrad', 'cgrad.id', '=', 'cfd.cgrad_id')
                ->whereNotNull('rl_id')
                ->whereNull('prc.gr_id')
                ->whereNull('st.st_net_weight')
                ->orWhereNotNull('st_partial_delivery')
                ->get();

        }


        return $expected;

    }

    public function outturn_delete($id)
    {   

        $stock_details = Stock::where('id', $id)->whereNull('pr_id')->first();  

        if ($stock_details) {

            $prc_id = $stock_details->prc_id;

            $provisional_details = ProvisionalAllocation::where('st_id', $id)->first();

            if ($provisional_details != null) {

                $purchase_details = purchase::where('id', $prc_id)->first();

                $cfd_id = null;

                if ($purchase_details != null) {

                    $cfd_id = $purchase_details->cfd_id;

                }     

                ProvisionalAllocation::where('id', '=', $provisional_details->id)
                    ->update(['cfd_id' =>  $cfd_id, 'st_id' => NULL ]);

            }

            purchase::where('id', '=', $prc_id)
                        ->update(['gr_id' => NULL]);


            Stock::where('id', $id)->delete();
        }

        return redirect('arrivalinformation');
        
    }

    public function batch_delete($id)
    {   

        $batch_details = Batch::where('id', $id)->first();  

        if ($batch_details) {

            $btc_id = $batch_details->id;

            $location_details = StockLocation::where('bt_id', $btc_id)->first();

            if ($location_details) {

                $location_details->delete();

            }

            Batch::where('id', $id)->delete();

        }

        return redirect('arrivalinformation');        
        
    }


    // Function to get the client IP address
    public function get_client_ip() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
           $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    public function confirmArrivalInformation($cid, $grn_number, $weighbridgeTK, $outt_season, $service, $team){
       
        try{
       
            $grn_details = Grn::where('gr_number', $grn_number)->where('ctr_id', $cid)->first(); 

            $grn_id = NULL;

            $user_data = Auth::user();

            $user = $user_data->id;        
                
            $weigh_scale_details = WeightScales::get();

            if ($weigh_scale_details != NULL) {

                foreach ($weigh_scale_details as $key_wsd => $value_wsd) {

                    $weigh_scale_session = "scale - ".$value_wsd->id."";

                    session()->pull($weigh_scale_session);  

                }

            }

            if ($grn_details != NULL) {

                $grn_id = $grn_details->id;

                Grn::where('id', '=', $grn_id)
                        ->update(['ctr_id' => $cid, 'gr_number' => $grn_number, 'wb_id' => $weighbridgeTK, 'csn_id' => $outt_season, 'gr_confirmed_by' => $user]);

                Activity::log('Updated Grn information with grn_id '.$grn_id. ' ctr_id '. $cid. ' wb_id '. $weighbridgeTK . 'grn_number' . $grn_number );

            } else {

                $grn_id = Grn::insertGetId (
                        ['ctr_id' => $cid, 'gr_number' => $grn_number, 'wb_id' => $weighbridgeTK, 'csn_id' => $outt_season, 'gr_confirmed_by' => $user]);

                Activity::log('Inserted Grn information with grn_id '.$grn_id. ' ctr_id '. $cid. ' wb_id '. $weighbridgeTK . 'grn_number' . $grn_number );
            }

            $stock_details = stock::where('gr_id', $grn_id)->get();

            $packages = 0;

            foreach($stock_details as $stock_item){

                $packages += $stock_item->st_packages;

            }
          
            $rate_details = processrates::where('id', '=', $service)->first();
            $rate=$rate_details->rate;
            $rateid=$rate_details->id;
            $servicename=$rate_details->service;
            
            $charge = $rate*$packages;


            if($packages!=0){
                
                //get rate charges and insert team
                
                $processing_rate_details = processcharges::where('prcgs_instruction_no', $grn_number)->where('prcgs_rate_id', $service)->first();
        
                if ($processing_rate_details != null) {
                    processcharges::where('prcgs_instruction_no', '=',  $grn_number)->where('prcgs_rate_id', $service)->update(['prcgs_rate_id' => $rateid, 'prcgs_service'=>$servicename, 'prcgs_rate'=>$rate, 'prcgs_total'=>$charge, 'prcgs_team_id'=>$team, 'bags'=>$packages]);
        
                    Activity::log('Updated process rate information for instruction ' . $grn_number . ' service ' . $servicename. ' team ' . $team. ' process charge ' . $charge. ' with rate ' . $rate. ' bags ' . $packages. ' user ' .$user);
                    
                    return response()->json([
                        'bagstopay' => $packages,
                        'rate' => $rate,
                        'service' => $servicename,
                        'charge' => $charge,
                        'success' => true,
                        'inserted' => false,
                        'error' => null,
                        'updated' => true
                    ]);
        
                } else {
                    processcharges::insert(['prcgs_instruction_no'=>$grn_number,'prcgs_rate_id' => $rateid, 'prcgs_service'=>$servicename, 'prcgs_rate'=>$rate, 'prcgs_total'=>$charge, 'prcgs_team_id'=>$team, 'bags'=>$packages]);
        
                    Activity::log('Inserted process rate information for instruction ' . $ref_no . ' service ' . $servicename. ' team ' . $team. ' process charge ' . $charge. ' with rate ' . $rate. ' bags ' . $packages. ' user ' .$user);
                    
                    return response()->json([
                        'bagstopay' => $packages,
                        'rate' => $rate,
                        'service' => $servicename,
                        'charge' => $charge,
                        'success' => true,
                        'inserted' => true,
                        'error' => null,
                        'updated' => false
                    ]);
        
                }
            }else{
                return response()->json([
                    'bagstopay' => $packages,
                    'rate' => $rate,
                    'service' => $servicename,
                    'charge' => $charge,
                    'success' => true,
                    'inserted' => true,
                    'error' => null,
                    'updated' => false
                ]);
            }
        
        }catch (\PDOException $e) {
            return response()->json([
                'exists' => false,
                'inserted' => false,
                'error' => $e->getMessage()
            ]);
        }
    }
    
    public function printarrivalinformation($grn_number, $service, $team){
        
        $processing_rate_details = processcharges::where('prcgs_instruction_no', $grn_number)->where('prcgs_rate_id', $service)->first();
        $rate=$processing_rate_details->prcgs_rate;
        $servicename=$processing_rate_details->prcgs_service;
        $total=$processing_rate_details->prcgs_total;
        $ref_no=$processing_rate_details->prcgs_instruction_no;
        $team=$processing_rate_details->prcgs_team_id;
        $bagstopay=$processing_rate_details->bags;
        $date=$processing_rate_details->created_at;
    
        $team_details = teams::where('id', '=', $team)->first();
        $teamserviceprovider=$team_details->tms_serviceprovider;
        $teamgroup=$team_details->tms_grpname;
    
        
    
        $pdf = PDF::loadView('pdf.movementrate', compact('ref_no','servicename', 'bagstopay','total', 'rate', 'teamserviceprovider', 'teamgroup', 'date'));
                return $pdf->stream($ref_no .' '.$servicename. ' movementrate.pdf');
    }

}