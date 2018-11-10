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
use Ngea\RoleUser;
use Ngea\User;
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

class GRNSController extends Controller {

    public function arrivalInformationGRNSForm (Request $request){

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

        $user_data = Auth::user();
        $user = $user_data->id;
        $roleDetails = DB::table('role_user')->where('user_id', $user)->first();
        $role = $roleDetails->role_id;
        $admin = 1;
        $timeout = $this->dialog_timeout;

        return View::make('arrivalinformationgrns', compact('Season', 'country', 'weighbridge_ticket', 'grn_number', 'expected_arrival', 'rates', 'teams', 'active_season', 'growers', 'items', 'millers', 'material', 'basket', 'packaging', 'warehouse', 'role', 'admin', 'timeout'));    

    }


    public function arrivalInformationGRNS (Request $request) {
        $active_season = $this->getActiveSeason();
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
        $cid = session('maincountry');


        $dispatch_date=date_create($dispatch_date);
        $dispatch_date = date_format($dispatch_date,"Y-m-d"); 


        $user_data = Auth::user();
        $user = $user_data->id;
        $roleDetails = DB::table('role_user')->where('user_id', $user)->first();
        $role = $roleDetails->role_id;
        $admin = 1;
        $timeout = $this->dialog_timeout;        
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
                        ->update(['ctr_id' => $cid, 'agt_id' => $wrhse, 'gr_number' => $grn_number, 'wbi_id' => $weighbridgeTK, 'csn_id' => $outt_season, 'agt_id' => $wrhse, 'cgr_id' => $coffee_grower, 'it_id' => $select_items, 'miller_id' => $select_miller, 'milled_by' => $milled_by, 'csn_id' => $outt_season]);
                Activity::log('Updated Grn information with grn_id '.$grn_id. ' ctr_id '. $cid. ' wbi_id '. $weighbridgeTK . 'grn_number' . $grn_number );
            } else {
                $grn_id = Grn::insertGetId (
                        ['ctr_id' => $cid, 'agt_id' => $wrhse, 'gr_number' => $grn_number, 'wbi_id' => $weighbridgeTK, 'csn_id' => $outt_season, 'agt_id' => $wrhse, 'cgr_id' => $coffee_grower, 'it_id' => $select_items, 'miller_id' => $select_miller, 'milled_by' => $milled_by, 'csn_id' => $outt_season]);
                Activity::log('Inserted Grn information with grn_id '.$grn_id. ' ctr_id '. $cid. ' wbi_id '. $weighbridgeTK . 'grn_number' . $grn_number );
            }


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

            $preious_batch = Batch::where('st_id', $stock_item_id)->get();

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

            $bags_batch = floor($net_weight_batch/60);

            $pockets_batch = floor($net_weight_batch % 60);            

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

        if ($stid == null) {
            $stock_details_stid = StockWarehouse::where('csn_id', '=', $outt_season)->where('it_id', '=', $select_items)->where('cgr_id', '=', $coffee_grower)->where('st_outturn', '=', $outt_number)->where('grn_id', '=', $grn_id)->first();
            if ($stock_details_stid != null) {
                $stid = $stock_details_stid->id;
            }
        }

        $stock_details = StockWarehouse::where('id', '=', $stid)->first();

        $grn_details = Grn::where('id', $grn_id)->first(); 

        $grn_details = DB::table('grn_gr AS gr')
            ->select('*')
            ->leftJoin('stock_warehouse_st AS st', 'st.grn_id', '=', 'gr.id')
            ->where('gr.id', $grn_id)
            ->first(); 

        if ($grn_details != null) {

            $grn_content = DB::table('stock_warehouse_st AS st')
                ->select('*')
                ->leftJoin('material_mt AS mt', 'mt.id', '=', 'st.mt_id')
                ->where('st.grn_id', $grn_id)
                ->get(); 
        }

        // print_r($stid);

        return View::make('arrivalinformationgrns', compact('Season', 'country', 'weighbridge_ticket', 'grn_number', 'grn_details', 'coffeeGrade', 'sale', 'coffee_details', 'saleid', 'basket', 'packaging', 'stock_details', 'warehouse', 'warehouse_count', 'wrhse', 'location', 'weigh_scales', 'weigh_scales_count', 'wsid', 'rw', 'clm', 'zone', 'packages_batch', 'batch_kilograms', 'grnsview', 'batchview', 'expected_arrival', 'stock_id', 'st_quality_check', 'rates', 'teams', 'wbtk', 'ot_season', 'active_season', 'growers', 'items', 'millers', 'material', 'basket', 'packaging', 'warehouse', 'role', 'admin', 'timeout', 'grn_content')); 

    
    }

    public function getOutturnDetails($outt_number_search, $grn_id){

        try {

            $stock_id = $outt_number_search;
            $cfd_id = NULL;
            $stock_details = NULL;
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
                    $stock_details = Stock::select('*','stock_st.id as stid', 'stock_st.bs_id as bsid', \DB::Raw('null dispatch_date'), \DB::Raw('(cfd.cfd_weight - stock_st.st_net_weight) st_dispatch_net'), \DB::Raw('round((cfd.cfd_weight - stock_st.st_net_weight)/60) as st_packages'))
                    ->leftJoin('purchases_prc AS prc', 'stock_st.prc_id', '=', 'prc.id')
                    ->leftJoin('coffee_details_cfd AS cfd', 'prc.cfd_id', '=', 'cfd.id')
                    ->where('prc_id', $purchase_details->id)->first();
                }   

            } else {

                $stock_details = DB::table('stock_st AS st')
                    ->select('*','st.id as stid', 'st.bs_id as bsid', \DB::Raw('ifnull(DATE_FORMAT(st_dispatch_date, "%m/%d/%Y"), null) dispatch_date'))
                    ->leftJoin('purchases_prc AS prc', 'st.prc_id', '=', 'prc.id')
                    ->leftJoin('coffee_details_cfd AS cfd', 'prc.cfd_id', '=', 'cfd.id')
                    ->leftJoin('coffee_grade_cgrad AS cgrad', 'cgrad.id', '=', 'cfd.cgrad_id')
                    ->where('cfd.id', $stock_id)
                    ->where('st.gr_id', $grn_id)
                    ->first();

            }
            
            if ($stock_details == NULL) {
                $stock_details = DB::table('purchases_prc AS prc')
                ->select('*', 'prc.bs_id as bsid', 'cfd.cfd_grower_mark as st_mark', 'cfd.cfd_weight as st_dispatch_net', \DB::Raw('null as dispatch_date'), \DB::Raw('null as st_moisture'), \DB::Raw('round(cfd.cfd_weight/60) as st_packages'))
                ->leftJoin('coffee_details_cfd AS cfd', 'prc.cfd_id', '=', 'cfd.id')
                ->leftJoin('coffee_grade_cgrad AS cgrad', 'cgrad.id', '=', 'cfd.cgrad_id')
                ->where('cfd.id', $stock_id)
                ->first();
            }

            return json_encode($stock_details);                    
        
        }catch (\PDOException $e) {
            return response()->json([
                'exists' => false,
                'inserted' => false,
                'error' => $e->getMessage()
            ]);
        }


    }


    public function getGRNContents($grn_number){
        
        try {

            $grn_id = null;
            $grn_details = Grn::where('gr_number', $grn_number)->first(); 
            if ($grn_details != null) {
                $grn_id = $grn_details->id;
            } 
            if ($grn_details != null) {

                $grn_content = DB::table('stock_warehouse_st AS st')
                    ->select('*', 'st.id as stid')
                    ->leftJoin('material_mt AS mt', 'mt.id', '=', 'st.mt_id')
                    ->where('st.grn_id', $grn_id)
                    ->get(); 
            }

            return json_encode($grn_content);                    
        
        }catch (\PDOException $e) {
            return response()->json([
                'exists' => false,
                'inserted' => false,
                'error' => $e->getMessage()
            ]);
        }


    }



    public function getBatch($outt_number, $outt_season, $outturn_type_batch){
        
        try {

            $batchview = null;
            $stock_details = StockWarehouse::where('csn_id', '=', $outt_season)->where('st_outturn', '=', $outt_number)->where('mt_id', '=', $outturn_type_batch)->first();

            if ($stock_details != null) {
                $batchview = DB::table('batch_btc AS btc')
                    ->select('btc.id as btcid', 'btc_weight as btc_weight', 'btc_tare', 'btc_net_weight', 'btc_packages', 'agt_name as wr_name', 'locrow.loc_row as loc_row', 'loccol.loc_column as loc_column', 'btc_zone')
                    ->leftJoin('stock_location_sloc AS sloc', 'sloc.bt_id', '=', 'btc.id')
                    ->leftJoin('location_loc AS locrow', 'locrow.id', '=', 'sloc.loc_row_id')
                    ->leftJoin('location_loc AS loccol', 'loccol.id', '=', 'sloc.loc_column_id')
                    ->leftJoin('agent_agt AS wr', 'wr.id', '=', 'locrow.agt_id')
                    ->where('btc.st_id', $stock_details->id)
                    ->whereNotNull('btc.st_id')
                    ->get();                
            }
            

                

            return json_encode($batchview);                    
        
        }catch (\PDOException $e) {
            return response()->json([
                'exists' => false,
                'inserted' => false,
                'error' => $e->getMessage()
            ]);
        }


    }


    public function addDispatch($grn_number, $outt_number, $outt_season, $coffee_grower, $outturn_type, $moisture, $basket, $packaging)
    {   

        try{

            $st_id = null;
            $stock_details = null;
            $grn_id = null;
            $purchase_details = null;
            $st_mark = null;
            $select_items = null;
            $select_miller = null;
            $milled_by = null;
            $wrhse = null;
            $cid = session('maincountry');
            $user_data = Auth::user();
            $user = $user_data->id;


            $grn_details = Grn::where('gr_number', $grn_number)->where('ctr_id', $cid)->first(); 
            if ($grn_details != null) {
                $grn_id = $grn_details->id;
            } 

            $stock_details = StockWarehouse::where('csn_id', '=', $outt_season)->where('mt_id', '=', $outturn_type)->where('st_outturn', '=', $outt_number)->where('grn_id', '=', $grn_id)->first();

            if ($stock_details == null) {

                $stock_details = StockWarehouse::where('csn_id', '=', $outt_season)->where('st_outturn', '=', $outt_number)->where('grn_id', '=', $grn_id)->first();
                if ($stock_details != null) {

                    $st_mark = $stock_details->st_mark;
                    $select_items = $stock_details->it_id;
                    $select_miller = $stock_details->miller_id;
                    $milled_by = $stock_details->milled_by;
                    $wrhse = $stock_details->warehouse_id;

                    $st_id = StockWarehouse::insertGetId(['grn_id' => $grn_id,'csn_id' => $outt_season, 'st_moisture' =>  $moisture,  'pkg_id' =>  $packaging, 'usr_id' =>  $user, 'sts_id' => '1', 'bs_id' => $basket, 'ibs_id' => $basket, 'mt_id' => $outturn_type,'st_outturn' => $outt_number, 'st_mark' => $st_mark, 'cgr_id' => $coffee_grower, 'it_id' => $select_items , 'miller_id' => $select_miller , 'milled_by' => $milled_by, 'warehouse_id' => $wrhse]);

                } else {
                    $st_id = "Please update Outturn information first.";
                }

            } else {

                $st_id = $stock_details->id;
                StockWarehouse::where('id', '=', $stock_details->id)
                            ->update(['mt_id' => $outturn_type, 'st_moisture' => $moisture, 'bs_id' => $basket, 'pkg_id' => $packaging]);

            }


            return $st_id;

        }catch (\PDOException $e) {
            return response()->json([
                'exists' => false,
                'inserted' => false,
                'error' => $e->getMessage()
            ]);
        }  
        
    }


    public function addBatch($outt_number, $outt_season, $coffee_grower, $outturn_type_batch, $weigh_scales, $packaging, $zone, $packages_batch, $batch_kilograms, $batch_kilograms_hidden, $selectedRow, $selectedColumn)
    {   

        try{

            $st_id = null;
            $stock_details = null;
            $prc_id = null;
            $gr_id = null;
            
            $stock_details = StockWarehouse::where('csn_id', '=', $outt_season)->where('st_outturn', '=', $outt_number)->where('mt_id', '=', $outturn_type_batch)->first();

            if ($stock_details != null) {

                // $packaging = $stock_details->pkg_id;
                $package_weight = Packaging::where('id', $packaging)->first();
                print_r($packaging);

                if ($package_weight != NULL) {            
                    $tare_batch = ($package_weight->pkg_weight) * $packages_batch;
                } 

                $stock_item_id = $stock_details->id;
                $net_weight_batch = $batch_kilograms - $tare_batch;
                $bags_batch = floor($net_weight_batch/60);
                $pockets_batch = floor($net_weight_batch % 60);
                $coffee_details = NULL;
                $preious_batch = Batch::where('st_id', $stock_item_id)->get();

                $btid = Batch::insertGetId (
                ['st_id' => $stock_item_id, 'btc_weight' => $batch_kilograms, 'btc_tare' => $tare_batch, 'btc_net_weight' => $net_weight_batch, 'btc_packages' => $packages_batch, 'btc_bags' => $bags_batch, 'btc_pockets' => $pockets_batch, 'ws_id' => $weigh_scales]);


                if ($preious_batch != null) {

                    foreach ($preious_batch as $key_pb => $value_pb) {
                        $batch_kilograms += $value_pb->btc_weight;
                        $tare_batch += $value_pb->btc_tare;
                        $net_weight_batch += $value_pb->btc_net_weight;
                        $packages_batch += $value_pb->btc_packages;
                        $bags_batch += $value_pb->bags_batch;
                        $pockets_batch += $value_pb->btc_pockets;

                    }

                }

                $bags_batch = floor($net_weight_batch/60);
                $pockets_batch = floor($net_weight_batch % 60);         
                StockWarehouse::where('id', '=', $stock_item_id)
                            ->update([ 'pkg_id' => $packaging, 'st_net_weight' => $net_weight_batch ,'st_tare' => $tare_batch, 'st_bags' => $bags_batch, 'st_pockets' => $pockets_batch, 'st_gross' => $batch_kilograms]);

                Activity::log('Inserted Batch information with btid '.$btid. ' batch_kilograms '. $batch_kilograms. ' bags '. $bags_batch. ' pockets '. $pockets_batch. ' stid '. $stock_item_id.' btc_tare '.$tare_batch.' btc_net_weight '.$net_weight_batch);

                $stlocid = StockLocation::insertGetId (
                ['bt_id' => $btid, 'loc_row_id' => $selectedRow, 'loc_column_id' => $selectedColumn, 'btc_zone' => $zone]);

                Activity::log('Inserted StockLocation information with bt_id '.$btid. ' locrowid '. $selectedRow. ' loccolid '. $selectedColumn. ' zone '. $zone); 

            }

            return $stock_item_id;

        }catch (\PDOException $e) {
            return response()->json([
                'exists' => false,
                'inserted' => false,
                'error' => $e->getMessage()
            ]);
        }  
        
    }


    public function computeNetWeight(){

    }

    public function fetchWeight($weighscale){
        
        try {

            $weigh_scales_details = WeightScales::where('id', $weighscale)->first();

            if ($weigh_scales_details != null) {

                $strBaudRate = $weigh_scales_details->ws_baud_rate;

                $strParity = $weigh_scales_details->ws_parity;

                $strStopBits = $weigh_scales_details->ws_stop_bits;

                $strDataBits = $weigh_scales_details->ws_data_bits;

                $strPortName = $weigh_scales_details->ws_port_name;

            }
            $execute = shell_exec('C://GetIndicatorWeight.exe '.$strBaudRate.' '.$strParity.' '. $strStopBits.' '. $strDataBits.' '.$strPortName );

            $execute = preg_replace("/[^0-9\.]/", '', $execute);

            $weight = NULL;
            if ($execute == NULL) {

                $weight = "Unstable wait...";

                return response()->json([
                    'exists' => false,
                    'found' => false,
                    'error' => $e->getMessage()
                ]);
            } else {

                $weight = $execute;

            }
           

            $batch_kilograms = $weight;  

            $weigh_scale_session = "scale - ".$weighscale."";



            return response()->json([
                'exists' => false,
                'found' => true,
                'weight' => $weight
            ]);                 
        
        }catch (\PDOException $e) {
            return response()->json([
                'exists' => false,
                'found' => false,
                'error' => $e->getMessage()
            ]);
        }


    }   

    public function resetWeight($weighscale){
        
        try {

            $weight = 0;

            return response()->json([
                'exists' => false,
                'found' => true,
                'weight' => $weight
            ]);                 
        
        }catch (\PDOException $e) {
            return response()->json([
                'exists' => false,
                'found' => false,
                'error' => $e->getMessage()
            ]);
        }


    }    


    public function getScales($warehouse){
        
        try {

            $weigh_scales = WeightScales::where('wr_id', $warehouse)->get();

            return json_encode($weigh_scales);                    
        
        }catch (\PDOException $e) {
            return response()->json([
                'exists' => false,
                'inserted' => false,
                'error' => $e->getMessage()
            ]);
        }


    }

    public function getLocations($warehouse){
        try {

            if ($warehouse !== NULL) {

                $location = Location::where('wr_id', $warehouse)->get();

            }

            return json_encode($location);                    
        
        }catch (\PDOException $e) {
            return response()->json([
                'exists' => false,
                'inserted' => false,
                'error' => $e->getMessage()
            ]);
        }


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

        $stock_details = StockWarehouse::where('id', $id)->first();  

        if ($stock_details) {

            StockWarehouse::where('id', $id)->delete();
        }

        return redirect('arrivalinformationgrns');
        
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

        return redirect('arrivalinformationgrns');        
        
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