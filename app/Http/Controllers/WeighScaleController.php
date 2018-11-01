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
use Ngea\WeighbridgeInfo;
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
use Ngea\coffeegrower;
use Ngea\Items;
use Ngea\agent;
use Ngea\Material;
use Ngea\StockWarehouse;

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
        $growers = coffeegrower::all(['id', 'cgr_grower', 'cgr_code']);
        $material = Material::all(['id', 'mt_name']);
        $basket = basket::all(['id', 'bs_code', 'bs_quality']);
        $warehouse = agent::where('agtc_id', 4)->get();

        $packaging = packaging::all(['id', 'pkg_name', 'pkg_description']);
        $millers = agent::where('agtc_id', 1)->get();
        $cidmain = session('maincountry');
        $grn_no = null;
        $rates    = processrates::all(['id', 'service']);
        $teams   = teams::all(['id', 'tms_grpname']);
        $grn_number = null;
        $active_season = $this->getActiveSeason();
        $items = items::all(['id', 'it_name']);
        $weighbridge_ticket = WeighbridgeInfo::where(DB::Raw('LEFT(wbi_time_in, 10)'), date("Y-m-d"))->get(); 


        return View::make('arrivalinformation', compact('Season', 'country', 'weighbridge_ticket', 'grn_number', 'expected_arrival', 'rates', 'teams', 'active_season', 'growers', 'items', 'millers', 'material', 'basket', 'packaging', 'warehouse'));   

    }


    public function arrivalInformation (Request $request) {
        $active_season = $this->getActiveSeason();
        $cid = Input::get('country');
        $grn_number = Input::get('grn_number');
        $weighbridgeTK = Input::get('weighbridgeTK');
        $outt_season = Input::get('outt_season');        
        $sale_selected = Input::get('sale');
        $saleid = $sale_selected;        
        $sif_lot = Input::get('sif_lot');        
        $coffee_grade = Input::get('coffee_grade');        
        $warrant = Input::get('warrant');        
        $outt_number = Input::get('outt_number');
        $moisture = Input::get('moisture');
        $packaging = Input::get('packaging');
        $dispatch_kilograms = Input::get('dispatch_kilograms');  
        $delivery_kilograms = Input::get('delivery_kilograms');
        $batch_kilograms_hidden = Input::get('batch_kilograms_hidden');
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
        $outt_number_search = Input::get('outt_number_search');
        $package_status = Input::get('package_status');
        $coffee_grower = Input::get('coffee_grower');
        $select_items = Input::get('select_items');
        $select_miller = Input::get('select_miller');
        $milled_by = Input::get('milled_by');
        $outturn_type = Input::get('outturn_type');
        $basket = Input::get('basket');


        $dispatch_date=date_create($dispatch_date);
        $dispatch_date = date_format($dispatch_date,"Y-m-d"); 

        $user_data = Auth::user();
        $user = $user_data->id; 
        $user_name = $user_data->usr_name; 
        $per_id = $user_data->per_id; 
        $grn_id = NULL;
        $rates    = processrates::all(['id', 'service']);
        $teams   = teams::all(['id', 'tms_grpname']);
        $grn_details = Grn::where('gr_number', $grn_number)->where('ctr_id', $cid)->first(); 
        $stid = null;
        if ($grn_details != null) {
            $grn_id = $grn_details->id;
        } 

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
                        ->update(['ctr_id' => $cid, 'gr_number' => $grn_number, 'wbi_id' => $weighbridgeTK, 'csn_id' => $outt_season, 'gr_confirmed_by' => $user]);

                Activity::log('Updated Grn information with grn_id '.$grn_id. ' ctr_id '. $cid. ' wbi_id '. $weighbridgeTK . 'grn_number' . $grn_number );

            } else {

                $grn_id = Grn::insertGetId (
                        ['ctr_id' => $cid, 'gr_number' => $grn_number, 'wbi_id' => $weighbridgeTK, 'csn_id' => $outt_season, 'gr_confirmed_by' => $user]);

                Activity::log('Inserted Grn information with grn_id '.$grn_id. ' ctr_id '. $cid. ' wbi_id '. $weighbridgeTK . 'grn_number' . $grn_number );
            }

        } else if (NULL !== Input::get('submitlot')) {

            $grn_id = null;
            $grn_details = Grn::where('gr_number', $grn_number)->where('ctr_id', $cid)->first(); 
            if ($grn_details != NULL) {
                $grn_id = $grn_details->id;
                Grn::where('id', '=', $grn_id)
                        ->update(['ctr_id' => $cid, 'agt_id' => $wrhse, 'gr_number' => $grn_number, 'wbi_id' => $weighbridgeTK]);
                Activity::log('Updated Grn information with grn_id '.$grn_id. ' ctr_id '. $cid. ' wbi_id '. $weighbridgeTK . 'grn_number' . $grn_number );
            } else {
                $grn_id = Grn::insertGetId (
                        ['ctr_id' => $cid, 'agt_id' => $wrhse, 'gr_number' => $grn_number, 'wbi_id' => $weighbridgeTK]);
                Activity::log('Inserted Grn information with grn_id '.$grn_id. ' ctr_id '. $cid. ' wbi_id '. $weighbridgeTK . 'grn_number' . $grn_number );
            }

            $stock_details = StockWarehouse::where('st_outturn', $outt_number)->where('mt_id', $outturn_type)->where('csn_id', $outt_season)->where('grn_id', $grn_id)->first();
            $st_mark = $outt_number . '/' . $outt_season;

            if ($select_items == 3) {

                
                if ($stock_details == null) {
                    $st_mark = $outt_number . '/' . $outt_season;
                    $stid = StockWarehouse::insertGetId(['grn_id' => $grn_id,'csn_id' => $outt_season, 'st_moisture' =>  $moisture,  'pkg_id' =>  $packaging, 'usr_id' =>  $user, 'sts_id' => '1', 'bs_id' => $basket, 'ibs_id' => $basket, 'mt_id' => $outturn_type,'st_outturn' => $outt_number, 'st_mark' => $st_mark, 'cgr_id' => $coffee_grower, 'st_partial_delivery' => $partial , 'it_id' => $select_items , 'miller_id' => $select_miller , 'milled_by' => $milled_by, 'warehouse_id' => $wrhse]);
                    
                    $stock_details_partial_exist = StockWarehouse::where('st_outturn', $stock_id)->where('mt_id', $outturn_type)->where('csn_id', $outt_season)->where('id', '!=', $stid)->get(); 

                    $partial_update = null;

                    if ($partial == null) {
                        $partial_update = null;
                    } else {
                        $partial_update = 1;
                    }

                    if ($stock_details_partial_exist != null) {
                        foreach ($stock_details_partial_exist as $stock_details_partial_key => $stock_details_partial_value) {
                            StockWarehouse::where('id', '=', $stock_details_partial_value->id)
                             ->update(['st_partial_delivery' => $partial_update]);
                        }

                    }


                    $request->session()->flash('alert-success', 'Stock Information Updated!!');            

                    Activity::log('Inserted Stock information with stid'.$stid. ' grn_id '. $grn_id. ' dispatch_kilograms '. $dispatch_kilograms. ' delivery_kilograms '. $delivery_kilograms. ' moisture '. $moisture. ' packaging '. $packaging);


                } else {

                    $stid = $stock_details->id;

                    StockWarehouse::where('id', '=', $stid)
                            ->update(['grn_id' => $grn_id,'csn_id' => $outt_season, 'st_moisture' =>  $moisture,  'pkg_id' =>  $packaging, 'usr_id' =>  $user, 'sts_id' => '1', 'bs_id' => $basket, 'ibs_id' => $basket, 'mt_id' => $outturn_type,'st_outturn' => $outt_number, 'st_mark' => $st_mark, 'cgr_id' => $coffee_grower, 'st_partial_delivery' => $partial , 'it_id' => $select_items , 'miller_id' => $select_miller , 'milled_by' => $milled_by, 'warehouse_id' => $wrhse]);
                    
                    $stock_details_partial_exist = StockWarehouse::where('st_outturn', $stock_id)->where('mt_id', $outturn_type)->where('csn_id', $outt_season)->where('id', '!=', $stid)->get(); 

                    $partial_update = null;

                    if ($partial == null) {
                        $partial_update = null;
                    } else {
                        $partial_update = 1;
                    }

                    if ($stock_details_partial_exist != null) {
                        foreach ($stock_details_partial_exist as $stock_details_partial_key => $stock_details_partial_value) {
                            StockWarehouse::where('id', '=', $stock_details_partial_value->id)
                             ->update(['st_partial_delivery' => $partial_update]);
                        }

                    }


                }
            } else {

            }

        
        } else if (NULL !== Input::get('submitbatch')) {            

            $package_weight = Packaging::where('id', $packaging)->first();
            if ($package_weight != NULL) {
                $tare_batch = ($package_weight->pkg_weight) * $packages_batch;
            }                

            $stock_details = StockWarehouse::where('st_outturn', $outt_number_search)->where('mt_id', $outturn_type)->where('csn_id', $outt_season)->where('grn_id', $grn_id)->first();

            if ($stock_details != null) {
                $stid = $stock_details->id;
            }
            
            $net_weight_batch = $batch_kilograms_hidden - $tare_batch;
            $bags_batch = floor($net_weight_batch/60);
            $pockets_batch = floor($net_weight_batch % 60);

            $preious_batch = Batch::where('st_id', $stid)->get();

            $btid = Batch::insertGetId (
            ['st_id' => $stid, 'btc_weight' => $batch_kilograms_hidden, 'btc_tare' => $tare_batch, 'btc_net_weight' => $net_weight_batch, 'btc_packages' => $packages_batch, 'btc_bags' => $bags_batch, 'btc_pockets' => $pockets_batch, 'ws_id' => $wsid]);


            if ($preious_batch != null) {

                foreach ($preious_batch as $key_pb => $value_pb) {

                    $batch_kilograms_hidden += $value_pb->btc_weight;
                    $tare_batch += $value_pb->btc_tare;
                    $net_weight_batch += $value_pb->btc_net_weight;
                    $packages_batch += $value_pb->btc_packages;
                    $bags_batch += $value_pb->bags_batch;
                    $pockets_batch += $value_pb->btc_pockets;

                }

            }

            $bags_batch = floor($net_weight_batch/60);
            $pockets_batch = floor($net_weight_batch % 60);            
            StockWarehouse::where('id', '=', $stid)
                        ->update([ 'st_net_weight' => $net_weight_batch ,'st_tare' => $tare_batch, 'st_bags' => $bags_batch, 'st_pockets' => $pockets_batch, 'st_gross' => $batch_kilograms_hidden]);

            Activity::log('Inserted Batch information with btid '.$btid. ' batch_kilograms '. $batch_kilograms_hidden. ' bags '. $bags_batch. ' pockets '. $pockets_batch. ' stid '. $stid.' btc_tare '.$tare_batch.' btc_net_weight '.$net_weight_batch);

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
                ->leftJoin('weighbridge_wb AS wb', 'wb.id', '=', 'gr.wbi_id')
                ->leftJoin('warehouse_wr AS wr', 'wr.id', '=', 'cfd.wr_id')                
                ->where('st.gr_id', $grn_id)
                ->first();  

            $person_details = Person::where('id', $per_id)->first();

            $person_name = $person_details->per_fname.' '.$person_details->per_sname;

            if ($grnsview_summary != null) {

                $client =  $grnsview_summary->wr_name;

                $delivery_date = $grnsview_summary->gr_date;

                $delivery_date = date("d/m/Y", strtotime($delivery_date));

                $movement_permit = $grnsview_summary->wbi_movement_permit;

                $vehicle = $grnsview_summary->wbi_vehicle_plate;

                $weighbridge_ticket = $grnsview_summary->wbi_ticket;

                $time_received = $grnsview_summary->gr_date;

                $time_received_stop = $grnsview_summary->gr_end_date;

                $time_received = date("H:i:s", strtotime($time_received));

                $time_received_stop = date("H:i:s", strtotime($time_received_stop));

                $received_by = $person_name;

                $driver_name = $grnsview_summary->wbi_driver_name;

                $driver_id = $grnsview_summary->wbi_driver_id;

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
                ->leftJoin('weighbridge_wb AS wb', 'wb.id', '=', 'gr.wbi_id')
                ->where('st.gr_id', $grn_id)
                ->get();  


            $pdf = PDF::loadView('pdf.print_grns', compact('grnsview','client', 'delivery_date', 'movement_permit', 'vehicle', 'weighbridge_ticket', 'time_received', 'received_by', 'driver_name', 'time_received_stop', 'driver_id', 'grn_number', 'warehouse_manager'));

            return $pdf->stream('print_grn.pdf');

        }

        $Season = Season::all(['id', 'csn_season']);
        $country = country::all(['id', 'ctr_name', 'ctr_initial']);
        $growers = coffeegrower::all(['id', 'cgr_grower', 'cgr_code']);
        $material = Material::all(['id', 'mt_name']);
        $basket = basket::all(['id', 'bs_code', 'bs_quality']);
        $warehouse = agent::where('agtc_id', 4)->get();

        $packaging = packaging::all(['id', 'pkg_name', 'pkg_description']);
        $millers = agent::where('agtc_id', 1)->get();
        $cidmain = session('maincountry');
        $grn_no = null;
        $rates    = processrates::all(['id', 'service']);
        $teams   = teams::all(['id', 'tms_grpname']);
        $grn_number = null;
        $active_season = $this->getActiveSeason();
        $items = items::all(['id', 'it_name']);
        $weighbridge_ticket = WeighbridgeInfo::where(DB::Raw('LEFT(wbi_time_in, 10)'), date("Y-m-d"))->get(); 

        $stock_details = StockWarehouse::where('id', '=', $stid)->first();
        $grn_details = Grn::where('id', $grn_id)->first(); 



        return View::make('arrivalinformation', compact('Season', 'country', 'weighbridge_ticket', 'grn_number', 'grn_details', 'coffeeGrade', 'sale', 'coffee_details', 'saleid', 'basket', 'packaging', 'stock_details', 'warehouse', 'warehouse_count', 'wrhse', 'location', 'weigh_scales', 'weigh_scales_count', 'wsid', 'rw', 'clm', 'zone', 'packages_batch', 'batch_kilograms', 'grnsview', 'batchview', 'expected_arrival', 'stock_id', 'st_quality_check', 'rates', 'teams', 'wbtk', 'ot_season', 'active_season', 'growers', 'items', 'millers', 'material', 'basket', 'packaging', 'warehouse')); 
    
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
                        ->update(['ctr_id' => $cid, 'gr_number' => $grn_number, 'wbi_id' => $weighbridgeTK, 'csn_id' => $outt_season, 'gr_confirmed_by' => $user]);

                Activity::log('Updated Grn information with grn_id '.$grn_id. ' ctr_id '. $cid. ' wbi_id '. $weighbridgeTK . 'grn_number' . $grn_number );

            } else {

                $grn_id = Grn::insertGetId (
                        ['ctr_id' => $cid, 'gr_number' => $grn_number, 'wbi_id' => $weighbridgeTK, 'csn_id' => $outt_season, 'gr_confirmed_by' => $user]);

                Activity::log('Inserted Grn information with grn_id '.$grn_id. ' ctr_id '. $cid. ' wbi_id '. $weighbridgeTK . 'grn_number' . $grn_number );
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