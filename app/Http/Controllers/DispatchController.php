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
use Ngea\StockMill;
use Ngea\ParchmentType;
use Ngea\Thresholds;
use Ngea\AgentCategory;
use Ngea\BatchMill;
use Ngea\StockLocationBatch;
use Ngea\OutturnNumberSettings;
use Ngea\DispatchType;
use Ngea\Dispatch;

use Yajra\Datatables\Datatables;
use niklasravnsborg\LaravelPdf\Facades\Pdf as PDF;
use Activity;
use Excel;
use Auth;

class DispatchController extends Controller {

    public function movementDispatchForm (Request $request){

        $Season = Season::all(['id', 'csn_season']);
        $country = country::all(['id', 'ctr_name', 'ctr_initial']);
        $growers = coffeegrower::all(['id', 'cgr_grower', 'cgr_code']);
        $material = Material::all(['id', 'mt_name']);
        $basket = basket::all(['id', 'bs_code', 'bs_quality']);
        $warehouse = agent::where('agtc_id', 4)->orWhere('agtc_id', 1)->get();

        $packaging = packaging::all(['id', 'pkg_name', 'pkg_description']);
        $millers = agent::where('agtc_id', 1)->get();
        $cidmain = session('maincountry');
        $grn_no = null;
        $rates    = processrates::all(['id', 'service']);
        $teams   = teams::all(['id', 'tms_grpname']);
        $grn_number = null;
        $active_season = $this->getActiveSeason();
        $dispatch_type = DispatchType::all(['id', 'dt_name']);

        $items = items::all(['id', 'it_name']);
        $weighbridge_ticket = WeighbridgeInfo::where(DB::Raw('LEFT(wbi_time_in, 10)'), date("Y-m-d"))->orwhere('id', 1)->get(); 

        $user_data = Auth::user();
        $user = $user_data->id;
        $roleDetails = DB::table('role_user')->where('user_id', $user)->first();
        $role = $roleDetails->role_id;
        $admin = 1;
        $timeout = $this->dialog_timeout;

        $dispatch_queue = DB::table('stock_warehouse_st AS st')
            ->select('*', 'st.id as stid')
            ->leftJoin('material_mt AS mt', 'mt.id', '=', 'st.mt_id')
            // ->whereNotNull('st.st_to_dispatch')
            ->get(); 

        return View::make('movementdispatch', compact('Season', 'country', 'weighbridge_ticket', 'grn_number', 'expected_arrival', 'rates', 'teams', 'active_season', 'growers', 'items', 'millers', 'material', 'basket', 'packaging', 'warehouse', 'role', 'admin', 'timeout', 'dispatch_type', 'dispatch_queue'));    

    }


    public function movementDispatch (Request $request) {
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
        $outturn_type_batch = Input::get('outturn_type_batch');
        $basket = Input::get('basket');
        $to_dispatch = Input::get('to_dispatch');
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
        $grn_details = Dispatch::where('dp_number', $grn_number)->where('ctr_id', $cid)->where('agt_id', $wrhse)->first(); 

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

                Dispatch::where('id', '=', $grn_id)
                        ->update(['dp_confirmed_by' => $user]);

            } 


        
        } else if (NULL !== Input::get('printgrns')) {            

            $grnsview_summary = DB::table('dispatch_dp AS dp')
            ->select('*', 'agt.agt_name as wr_name',  'agtto.agt_name as wr_to_name', 'dp.created_at as gr_date', 'dp.updated_at as gr_end_date', 'agt.agt_att as wr_att')
            ->leftJoin('stock_warehouse_st AS st', 'st.dp_id', '=', 'dp.id')
            ->leftJoin('agent_agt AS agt', 'agt.id', '=', 'dp.agt_id')
            ->leftJoin('agent_agt AS agtto', 'agtto.id', '=', 'dp.dp_destination')
            ->leftJoin('weighbridge_info_wbi AS wb', 'wb.id', '=', 'dp.wbi_id')
            ->leftJoin('agent_category_agtc AS agtc', 'agtc.id', '=', 'agt.agtc_id')
            ->leftJoin('coffee_growers_cgr AS cgr', 'cgr.id', '=', 'dp.cgr_id')
            ->where('dp.id', $grn_id)
            ->first(); 

            $person_details = Person::where('id', $per_id)->first();

            $person_name = $person_details->per_fname.' '.$person_details->per_sname;

            if ($grnsview_summary != null) {
                $dp_number =  $grnsview_summary->dp_number;
                $client =  $grnsview_summary->wr_to_name;
                $agent_description =  $grnsview_summary->agtc_description;
                $agent_initial =  $grnsview_summary->agtc_initial;
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

            $dispatch_view = DB::table('stock_warehouse_st AS st')
                ->select('*')
                ->leftJoin('material_mt AS mt', 'mt.id', '=', 'st.mt_id')
                ->leftJoin('grn_gr AS gr', 'gr.id', '=', 'st.grn_id')
                ->leftJoin('coffee_growers_cgr as cgr', 'cgr.id', '=', 'st.cgr_id')
                ->where('st.dp_id', $grn_id)
                ->get(); 
            // dd($dispatch_view); exit;
            $pdf = PDF::loadView('pdf.print_dispatch', compact('dispatch_view','client', 'delivery_date', 'movement_permit', 'vehicle', 'weighbridge_ticket', 'time_received', 'received_by', 'driver_name', 'time_received_stop', 'driver_id', 'dp_number', 'warehouse_manager', 'agent_description', 'agent_initial'));

            


            return $pdf->stream('print_grn.pdf');

        }

        $Season = Season::all(['id', 'csn_season']);
        $country = country::all(['id', 'ctr_name', 'ctr_initial']);
        $growers = coffeegrower::all(['id', 'cgr_grower', 'cgr_code']);
        $material = Material::all(['id', 'mt_name']);
        $basket = basket::all(['id', 'bs_code', 'bs_quality']);
        $warehouse = agent::where('agtc_id', 4)->orWhere('agtc_id', 1)->get();

        $packaging = packaging::all(['id', 'pkg_name', 'pkg_description']);
        $millers = agent::where('agtc_id', 1)->get();
        $cidmain = session('maincountry');
        $grn_no = null;
        $rates    = processrates::all(['id', 'service']);
        $teams   = teams::all(['id', 'tms_grpname']);
        $grn_number = null;
        $active_season = $this->getActiveSeason();
        $items = items::all(['id', 'it_name']);
        $weighbridge_ticket = WeighbridgeInfo::where(DB::Raw('LEFT(wbi_time_in, 10)'), date("Y-m-d"))->orwhere('id', 1)->get(); 

        $outturn_type_selected = $outturn_type;
        if ($outturn_type_selected == null) {
           $outturn_type_selected = $outturn_type_batch;
        }

        if ($stid == null) {
            $stock_details_stid = StockWarehouse::where('csn_id', '=', $outt_season)->where('mt_id', '=', $outturn_type_selected)->where('st_outturn', '=', $outt_number)->where('grn_id', '=', $grn_id)->first();
            if ($stock_details_stid != null) {
                $stid = $stock_details_stid->id;
            }
        }

        $stock_details = StockWarehouse::where('id', '=', $stid)->first();

        $grn_details = DB::table('dispatch_dp AS dp')
            ->select('*', 'dp.agt_id as agtid')
            ->leftJoin('stock_warehouse_st AS st', 'st.dp_id', '=', 'dp.id')
            ->where('dp.id', $grn_id)
            ->where('dp.agt_id', $wrhse)
            ->first(); 

        if ($grn_details != null) {

            $grn_content = DB::table('stock_warehouse_st AS st')
                    ->select('*', 'st.id as stid')
                    ->leftJoin('material_mt AS mt', 'mt.id', '=', 'st.mt_id')
                    ->where('st.dp_id', $grn_id)
                    ->where('st.agt_id', $wrhse)
                    ->get(); 
        }
        $dispatch_type = DispatchType::all(['id', 'dt_name']);

        $dispatch_queue = DB::table('stock_warehouse_st AS st')
            ->select('*', 'st.id as stid')
            ->leftJoin('material_mt AS mt', 'mt.id', '=', 'st.mt_id')
            // ->whereNotNull('st.st_to_dispatch')
            ->get();         

            return View::make('movementdispatch', compact('Season', 'country', 'weighbridge_ticket', 'grn_number', 'grn_details', 'coffeeGrade', 'sale', 'coffee_details', 'saleid', 'basket', 'packaging', 'stock_details', 'warehouse', 'warehouse_count', 'wrhse', 'location', 'weigh_scales', 'weigh_scales_count', 'wsid', 'rw', 'clm', 'zone', 'packages_batch', 'batch_kilograms', 'grnsview', 'batchview', 'expected_arrival', 'stock_id', 'st_quality_check', 'rates', 'teams', 'wbtk', 'ot_season', 'active_season', 'growers', 'items', 'millers', 'material', 'basket', 'packaging', 'warehouse', 'role', 'admin', 'timeout', 'grn_content', 'dispatch_type', 'dispatch_queue')); 

    
    }

    public function getDispatch($dispatch_type){
        try {

            $dispatchType = DB::table('agent_agt AS agt')
                ->select('*', 'dt.id as dtid')
                ->leftJoin('agent_category_agtc AS agtc', 'agtc.id', '=', 'agt.agtc_id')
                ->leftJoin('dispatch_type_dt AS dt', 'agtc.id', '=', 'dt.agt_id')
                ->where('dt.id', $dispatch_type)
                ->get(); 
            $agent_name = null;

            foreach ($dispatchType as $key => $value) {
               $agent_name = $value->agtc_name;
            }

            return response()->json([
                'dispatchType' => $dispatchType,
                'agent_name' =>  $agent_name
            ]);

            // return json_encode($dispatchType);                    
        
        }catch (\PDOException $e) {
            return response()->json([
                'exists' => false,
                'inserted' => false,
                'error' => $e->getMessage()
            ]);
        }


    }


    
    public function getOuttturns(){
        try {

            $outturns = DB::table('process_results_prts AS prts')
                ->select('*', 'prts.id as prtsid', 'st.st_outturn as outturn')
                ->leftJoin('stock_mill_st AS st', 'st.id', '=', 'prts.st_mill_id')
                ->leftJoin('grn_gr AS grm', 'grm.id', '=', 'st.grn_id')
                ->leftJoin('material_mt AS mt', 'mt.id', '=', 'st.mt_id')
                ->leftJoin('processing_results_type_prt AS prt', 'prt.id', '=', 'prts.prt_id')
                ->leftJoin('stock_warehouse_st AS stw', 'stw.prts_id', '=', 'prts.id')
                ->leftJoin('grn_gr AS gr', 'gr.id', '=', 'stw.grn_id')
                ->whereNull('gr.gr_confirmed_by')
                ->get(); 

            return json_encode($outturns);                    
        
        }catch (\PDOException $e) {
            return response()->json([
                'exists' => false,
                'inserted' => false,
                'error' => $e->getMessage()
            ]);
        }


    }

    public function getGrower($outt_number_search){
        try {

            $outturns = DB::table('stock_warehouse_st AS st')
                ->select('*')
                ->leftJoin('grn_gr AS gr', 'gr.id', '=', 'st.grn_id')
                ->where('st.id', $outt_number_search)
                ->first(); 

            return response()->json([
                'grower' => $outturns->cgr_id,
                'to_dispatch' => $outturns->st_to_dispatch
            ]);                 
        
        }catch (\PDOException $e) {
            return response()->json([
                'exists' => false,
                'inserted' => false,
                'error' => $e->getMessage()
            ]);
        }


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


    public function getGDNContents($grn_number, $warehouse){
        
        try {

            $grn_id = null;
            $agent_type = null;
            $grn_details = Dispatch::where('dp_number', $grn_number)->where('agt_id', $warehouse)->first(); 
            if ($grn_details != null) {
                $grn_id = $grn_details->id;
            } 

            if ($grn_details != null) {

                $grn_content = DB::table('stock_warehouse_st AS st')
                        ->select('*', 'st.id as stid')
                        ->leftJoin('material_mt AS mt', 'mt.id', '=', 'st.mt_id')
                        ->where('st.dp_id', $grn_id)
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

    public function getAgentType($warehouse){

        $agent_details = Agent::where('id', $warehouse)->first();
        if ($agent_details != null) {
            $agent_category_details = AgentCategory::where('id', $agent_details->agtc_id)->first();
            if ($agent_category_details != null) {
                $agent_type = $agent_category_details->agtc_name;
            }
            
        }      

        return $agent_type;  
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

    public function addDispatch($warehouse, $grn_number, $weighbridgeTK, $outt_season, $dispatch_type, $agent_id, $outt_number_search)
    {   

        try{

            $st_id = null;
            $stock_details = null;
            $grn_id = null;
            $purchase_details = null;
            $st_mark = null;
            $select_items = null;
            $agent_type = null;
            $select_miller = null;
            $milled_by = null;
            $item_id = null;
            $wrhse = null;
            $parchment_type = null;
            $outturn_type_name = null;
            $parchment_type_id = null;
            $cid = session('maincountry');
            $user_data = Auth::user();
            $user = $user_data->id;

            $grn_details = Dispatch::where('dp_number', $grn_number)->where('ctr_id', $cid)->where('agt_id', $warehouse)->first(); 

            if ($grn_details != NULL) {
                $grn_id = $grn_details->id;
                Dispatch::where('id', '=', $grn_id)
                        ->update(['agt_id' => $warehouse, 'ctr_id' => $cid, 'dp_number' => $grn_number, 'wbi_id' => $weighbridgeTK, 'csn_id' => $outt_season, 'dt_id' => $dispatch_type, 'dp_destination' => $agent_id]);

                Activity::log('Updated dispatch information with grn_id '.$grn_id. ' ctr_id '. $cid. ' wbi_id '. $weighbridgeTK . 'grn_number' . $grn_number );

            } else {

                $grn_id = Dispatch::insertGetId (
                        ['agt_id' => $warehouse, 'ctr_id' => $cid, 'dp_number' => $grn_number, 'wbi_id' => $weighbridgeTK, 'csn_id' => $outt_season, 'dt_id' => $dispatch_type, 'dp_destination' => $agent_id]);

                Activity::log('Inserted dispatch information with grn_id '.$grn_id. ' ctr_id '. $cid. ' wbi_id '. $weighbridgeTK . 'grn_number' . $grn_number );
            }


            StockWarehouse::where('id', '=', $outt_number_search)
                                    ->update(['dp_id' => $grn_id, 'st_ended_by' => $user]);


            return $outt_number_search;

        }catch (\PDOException $e) {
            return response()->json([
                'exists' => false,
                'inserted' => false,
                'error' => $e->getMessage()
            ]);
        }  
        
    }


    public function addBatch($outt_number, $outt_season, $coffee_grower, $outturn_type_batch, $weigh_scales, $packaging, $zone, $packages_batch, $batch_kilograms, $batch_kilograms_hidden, $selectedRow, $selectedColumn, $warehouse, $grn_number, $pallet_kgs)
    {   

        try{

            $st_id = null;
            $stock_details = null;
            $prc_id = null;
            $gr_id = null;
            $agent_type = null;
            $agent_type = $this->getAgentType($warehouse);

            $grn_details = GRN::where('gr_number', '=', $grn_number)->where('agt_id', '=', $warehouse)->first();

            if ($grn_details != null) {
                $gr_id = $grn_details->id;
            }

            if ($agent_type == 'Miller') {
                $stock_details = StockMill::where('csn_id', '=', $outt_season)->where('st_outturn', '=', $outt_number)->where('mt_id', '=', $outturn_type_batch)->where('grn_id', $gr_id)->first();
            } else {
                $stock_details = StockWarehouse::where('csn_id', '=', $outt_season)->where('st_outturn', '=', $outt_number)->where('mt_id', '=', $outturn_type_batch)->where('grn_id', $gr_id)->first();
            }

            if ($stock_details != null) {
                $package_weight = Packaging::where('id', $packaging)->first();
                if ($package_weight != NULL) {            
                    $tare_batch = ($package_weight->pkg_weight) * $packages_batch;
                } 

                $stock_item_id = $stock_details->id;
                $net_weight_batch = $batch_kilograms - $tare_batch;
                $bags_batch = floor($net_weight_batch/60);
                $pockets_batch = floor($net_weight_batch % 60);
                $coffee_details = NULL;



                if ($agent_type == 'Miller') {

                    $preious_batch = BatchMill::where('st_id', $stock_item_id)->get();

                    $btid = BatchMill::insertGetId (
                    ['st_id' => $stock_item_id, 'btc_weight' => $batch_kilograms, 'btc_tare' => $tare_batch, 'btc_net_weight' => $net_weight_batch, 'btc_packages' => $packages_batch, 'btc_bags' => $bags_batch, 'btc_pockets' => $pockets_batch, 'ws_id' => $weigh_scales, 'btc_pallet_kgs' => $pallet_kgs]);


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
                    StockMill::where('id', '=', $stock_item_id)
                                ->update([ 'pkg_id' => $packaging, 'st_net_weight' => $net_weight_batch ,'st_tare' => $tare_batch, 'st_bags' => $bags_batch, 'st_pockets' => $pockets_batch, 'st_gross' => $batch_kilograms, 'st_packages' => $packages_batch]);

                    Activity::log('Inserted Batch information with btid '.$btid. ' batch_kilograms '. $batch_kilograms. ' bags '. $bags_batch. ' pockets '. $pockets_batch. ' stid '. $stock_item_id.' btc_tare '.$tare_batch.' btc_net_weight '.$net_weight_batch);

                    $stlocid = StockLocationBatch::insertGetId (
                    ['bt_id' => $btid, 'loc_row_id' => $selectedRow, 'loc_column_id' => $selectedColumn, 'btc_zone' => $zone]);

                    Activity::log('Inserted StockLocation information with bt_id '.$btid. ' locrowid '. $selectedRow. ' loccolid '. $selectedColumn. ' zone '. $zone); 
              
                } else {

                    $preious_batch = Batch::where('st_id', $stock_item_id)->get();

                    $btid = Batch::insertGetId (
                    ['st_id' => $stock_item_id, 'btc_weight' => $batch_kilograms, 'btc_tare' => $tare_batch, 'btc_net_weight' => $net_weight_batch, 'btc_packages' => $packages_batch, 'btc_bags' => $bags_batch, 'btc_pockets' => $pockets_batch, 'ws_id' => $weigh_scales, 'btc_pallet_kgs' => $pallet_kgs]);


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
                                ->update([ 'pkg_id' => $packaging, 'st_net_weight' => $net_weight_batch ,'st_tare' => $tare_batch, 'st_bags' => $bags_batch, 'st_pockets' => $pockets_batch, 'st_gross' => $batch_kilograms, 'st_packages' => $packages_batch]);

                    Activity::log('Inserted Batch information with btid '.$btid. ' batch_kilograms '. $batch_kilograms. ' bags '. $bags_batch. ' pockets '. $pockets_batch. ' stid '. $stock_item_id.' btc_tare '.$tare_batch.' btc_net_weight '.$net_weight_batch);

                    $stlocid = StockLocation::insertGetId (
                    ['bt_id' => $btid, 'loc_row_id' => $selectedRow, 'loc_column_id' => $selectedColumn, 'btc_zone' => $zone]);

                    Activity::log('Inserted StockLocation information with bt_id '.$btid. ' locrowid '. $selectedRow. ' loccolid '. $selectedColumn. ' zone '. $zone); 

                }


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
        try { 

            $stock_details = StockWarehouse::where('id', $id)->first();  

            if ($stock_details) {

                StockWarehouse::where('id', $id)->delete();
            }

            return $id;

        } catch (\PDOException $e) {
            return response()->json([
                'exists' => false,
                'inserted' => false,
                'error' => $e->getMessage()
            ]);
        }

        
    }

    public function batch_delete($id)
    {   
        try { 
            $batch_details = Batch::where('id', $id)->first();  
            $st_id = null;
            $batch_kilograms = null;
            $tare_batch = null;
            $net_weight_batch = null;
            $packages_batch = null;
            $bags_batch = null;
            $pockets_batch = null;

            if ($batch_details) {
                $btc_id = $batch_details->id;
                $st_id = $batch_details->st_id;
                $location_details = StockLocation::where('bt_id', $btc_id)->first();
                if ($location_details) {
                    $location_details->delete();
                }
                Batch::where('id', $id)->delete();
                $preious_batch = Batch::where('st_id', $st_id)->get();

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
                StockWarehouse::where('id', '=', $st_id)
                            ->update([ 'st_net_weight' => $net_weight_batch ,'st_tare' => $tare_batch, 'st_bags' => $bags_batch, 'st_pockets' => $pockets_batch, 'st_gross' => $batch_kilograms, 'st_packages' => $packages_batch]);

            }
            return $id;

        } catch (\PDOException $e) {
            return response()->json([
                'exists' => false,
                'inserted' => false,
                'error' => $e->getMessage()
            ]);
        }

        
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
       
            $grn_details = Grn::where('gr_number', $grn_number)->where('ctr_id', $cid)->where('agt_id', $outt_season)->first(); 

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

            $stock_details = StockWarehouse::where('grn_id', $grn_id)->get();
            if($stock_details == null){
                $stock_details = StockMill::where('grn_id', $grn_id)->get();
            }
            

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
        
        } catch (\PDOException $e) {
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