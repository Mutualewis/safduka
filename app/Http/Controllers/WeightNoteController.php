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
use Ngea\WeightNote;



use Yajra\Datatables\Datatables;
use niklasravnsborg\LaravelPdf\Facades\Pdf as PDF;
use Activity;
use Excel;
use Auth;

class WeightNoteController extends Controller {

    public function weighNoteForm (Request $request){

        $Season = Season::all(['id', 'csn_season']);
        $country = country::all(['id', 'ctr_name', 'ctr_initial']);
        $cidmain = session('maincountry');
        $grn_no = null;
        $rates = processrates::all(['id', 'service']);
        $teams = teams::all(['id', 'tms_grpname']);
        $wn_number = null;
        $warehouse = array();
        $weigh_scales = array();
        $packaging = Packaging::get();

        if ($cidmain != null) {
            $coffeeGrade = CoffeeGrade::where('ctr_id', $cidmain)->get();
            $basket = basket::where('ctr_id', $cidmain)->get();
            $weighbridge_ticket = Weighbridge::where('ctr_id', $cidmain)->where(DB::Raw('LEFT(wb_time_in, 10)'), date("Y-m-d"))->orWhere('id', 1)->get();
            $wn_no = WeightNote::where('ctr_id', $cidmain)->orderBy('id', 'desc')->first();

            if ($wn_no != NULL) {
                $wn_no = $wn_no->wn_number;  
                if (is_numeric($wn_no)) {
                    $wn_number = sprintf("%07d", ($wn_no + 0000001));
                }
            } else {
                $wn_number = $wn_number = sprintf("%07d", (0000001));
            }

            $warehouse_select = country::with('warehouse')->get()->find($cidmain);

            $warehouse_select = json_decode(json_encode($warehouse_select), true);

            foreach ($warehouse_select as $key => $value) {

                if (is_array($value)) {

                    $warehouse_count = count($value);

                    $warehouse_temp = $value;

                    array_push($warehouse, $warehouse_temp);  

                }          

            }

        }

        return View::make('weighnote', compact('Season', 'country', 'weighbridge_ticket', 'wn_number', 'expected_arrival', 'rates', 'teams', 'coffeeGrade', 'cgrad_id','warehouse', 'warehouse_count', 'weigh_scales', 'weigh_scales_count', 'packaging'));   

    }

    public function weighNote (Request $request){

        $Season = Season::all(['id', 'csn_season']);
        $country = country::all(['id', 'ctr_name', 'ctr_initial']);
        $cidmain = session('maincountry');
        $grn_no = null;
        $rates = processrates::all(['id', 'service']);
        $teams = teams::all(['id', 'tms_grpname']);
        $wn_number = Input::get('wn_number');
        $warehouse = array();
        $weigh_scales = array();
        $packaging = Packaging::get();
        $outturn = Input::get('outturn');
        $cgrad_id = Input::get('cgrad_id');
        $basket_id = Input::get('basket');
        $wrhse = Input::get('warehouse');
        $wsid = Input::get('weigh_scales');
        $pkgid = Input::get('packaging');
        $wbtk = Input::get('weighbridgeTK');        
        $packages_stock = Input::get('packages_stock');
        $purpose = Input::get('purpose');
        $batch_kilograms = Input::get('batch_kilograms');
        $bskt = $basket_id;
        $st_id = null;
        $pr_id = null;
        $user_data = Auth::user();
        $user = $user_data->id; 
        $user_name = $user_data->usr_name; 
        $per_id = $user_data->per_id; 


        if ($cidmain != null) {
            $coffeeGrade = CoffeeGrade::where('ctr_id', $cidmain)->get();
            $basket = basket::where('ctr_id', $cidmain)->get();
            $weighbridge_ticket = Weighbridge::where('ctr_id', $cidmain)->where(DB::Raw('LEFT(wb_time_in, 10)'), date("Y-m-d"))->orWhere('id', 1)->get();
            $wn_no = WeightNote::where('ctr_id', $cidmain)->orderBy('id', 'desc')->first();
            $warehouse_select = country::with('warehouse')->get()->find($cidmain);

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


        if (NULL !==  Input::get('searchButtonWn')) { 

            $weight_note_details = WeightNote::where('wn_number',$wn_number)->where('ctr_id', $cidmain)->first();
            if ($weight_note_details != null) {
                $stock_details = $this->getStockDetails($weight_note_details->st_id, $weight_note_details->pr_id, $outturn, $cgrad_id, $basket_id);
            }

        } else if (NULL !== Input::get('submitlot')) {

            $weight_note_details = WeightNote::where('wn_number',$wn_number)->where('ctr_id', $cidmain)->first();

            if ($weight_note_details != NULL) {

                $wn_id = $weight_note_details->id;
                $stock_details = $this->getStockDetails($st_id, $pr_id, $outturn, $cgrad_id, $basket_id);
                if (!is_object($stock_details) || $stock_details == null) { 
                    $stock_details = $this->getStockDetails($st_id, $pr_id, $outturn, $cgrad_id, null);
                    if (!is_object($stock_details) || $stock_details == null) { 
                        $stock_details = $this->getStockDetails($st_id, $pr_id, $outturn, null, $basket_id);
                        if (!is_object($stock_details) || $stock_details == null) { 
                            $stock_details = $this->getStockDetails($st_id, $pr_id, $outturn, null, null);
                        }
                    }
                }

                WeightNote::where('id', '=', $wn_id)
                        ->update(['ctr_id' => $cidmain, 'cgrad_id' => $cgrad_id, 'bs_id' => $basket_id, 'st_id' => $stock_details->stid, 'pr_id' => $stock_details->prid, 'pkg_id' => $pkgid, 'wn_packages' => $packages_stock, 'wn_number' => $wn_number, 'wb_id' => $wbtk, 'ws_id' => $wsid, 'wn_purpose' => $purpose, 'wn_weight' => $batch_kilograms, 'usr_id' => $user]);

          
            } else {
                $stock_details = $this->getStockDetails($st_id, $pr_id, $outturn, $cgrad_id, $basket_id);
                if (!is_object($stock_details) || $stock_details == null) { 
                    $stock_details = $this->getStockDetails($st_id, $pr_id, $outturn, $cgrad_id, null);
                    if (!is_object($stock_details) || $stock_details == null) { 
                        $stock_details = $this->getStockDetails($st_id, $pr_id, $outturn, null, $basket_id);
                        if (!is_object($stock_details) || $stock_details == null) { 
                            $stock_details = $this->getStockDetails($st_id, $pr_id, $outturn, null, null);
                        }
                    }
                }
                $wn_id = WeightNote::insertGetId (
                        ['ctr_id' => $cidmain, 'st_id' => $stock_details->stid, 'pr_id' => $stock_details->prid, 'pkg_id' => $pkgid, 'wn_packages' => $packages_stock, 'wn_number' => $wn_number, 'wb_id' => $wbtk, 'ws_id' => $wsid, 'wn_purpose' => $purpose, 'wn_weight' => $batch_kilograms, 'usr_id' => $user]);

            }

            $weight_note_details = WeightNote::where('id',$wn_id)->first();
            $stock_details = $this->getStockDetails($weight_note_details->st_id, $weight_note_details->pr_id, $outturn, $cgrad_id, $basket_id);


        } else if (NULL !==  Input::get('searchButtonOutt')) {

            if ($outturn != null) {

                $stock_details = $this->getStockDetails($st_id, $pr_id, $outturn, $cgrad_id, $basket_id);

                if (!is_object($stock_details) || $stock_details == null) {      
                    return redirect('weighnote')
                                        ->withErrors($stock_details)->withInput();  
                }

            } else {

                return redirect('weighnote')
                                        ->withErrors("Please enter a valid outturn!!")->withInput();
            }
            

        } else if (NULL !== Input::get('resetweight')) {

            $weigh_scales_details = WeightScales::where('id', $wsid)->first();

            $strBaudRate = null;
            $strParity = null;
            $strStopBits = null;
            $strDataBits = null;
            $strPortName = null;

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


        } else if (NULL !== Input::get('printweightnote')) {     

            $weight_note_outturns= DB::table('weight_note_wn AS wn')
                ->select('*', 'wn.id as wnid', \DB::raw('null as prid'),\DB::raw('ifnull(st_outturn, pr_instruction_number) as st_outturn'), 'wn.created_at as weighing_date', 'wn.updated_at as end_date')
                ->leftJoin('coffee_grade_cgrad AS cgrad', 'cgrad.id', '=', 'wn.cgrad_id')
                ->leftJoin('basket_bs AS bs', 'bs.id', '=', 'wn.bs_id')
                ->leftJoin('stock_st AS st', 'st.id', '=', 'wn.st_id')
                ->leftJoin('process_pr AS pr', 'pr.id', '=', 'wn.pr_id')
                ->leftJoin('packaging_pkg AS pkg', 'pkg.id', '=', 'wn.pkg_id')
                ->leftJoin('weighbridge_wb AS wb', 'wb.id', '=', 'wn.wb_id')
                ->leftJoin('weight_scales_ws AS ws', 'ws.id', '=', 'wn.ws_id')
                ->leftJoin('warehouse_wr AS wr', 'wr.id', '=', 'ws.wr_id')
                ->where('wn.wn_number', $wn_number)
                ->first();

            $person_details = Person::where('id', $per_id)->first();

            $person_name = $person_details->per_fname.' '.$person_details->per_sname;

            if ($weight_note_outturns != null) {

                $client =  $weight_note_outturns->wr_name;
                $weighing_date = $weight_note_outturns->weighing_date;
                $weighing_date = date("d/m/Y", strtotime($weighing_date));
                $movement_permit = $weight_note_outturns->wb_movement_permit;
                $vehicle = $weight_note_outturns->wb_vehicle_plate;
                $weighbridge_ticket = $weight_note_outturns->wb_ticket;
                $time_received = $weight_note_outturns->weighing_date;
                $time_received_stop = $weight_note_outturns->end_date;
                $time_received = date("H:i:s", strtotime($time_received));
                $time_received_stop = date("H:i:s", strtotime($time_received_stop));
                $received_by = $person_name;
                $driver_name = $weight_note_outturns->wb_driver_name;
                $driver_id = $weight_note_outturns->wb_driver_id;
                $warehouse_manager = $weight_note_outturns->wr_att;

            }


            $pdf = PDF::loadView('pdf.print_weight_note', compact('weight_note_outturns','client', 'weighing_date', 'movement_permit', 'vehicle', 'weighbridge_ticket', 'time_received', 'received_by', 'driver_name', 'time_received_stop', 'driver_id', 'wn_number', 'warehouse_manager'));

            return $pdf->stream('print_grn.pdf');
        } else if (NULL !== Input::get('fetchweight')) {

            $weigh_scales_details = WeightScales::where('id', $wsid)->first();
            $strBaudRate = null;
            $strParity = null;
            $strStopBits = null;
            $strDataBits = null;
            $strPortName = null;
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
            $batch_kilograms = 100;  

            $weigh_scale_session = "scale - ".$wsid."";

            $request->session()->put($weigh_scale_session, $batch_kilograms);

        }

        $weight_note_outturns= DB::table('weight_note_wn AS wn')
            ->select('*', 'wn.id as wnid', \DB::raw('null as prid'),\DB::raw('ifnull(st_outturn, pr_instruction_number) as st_outturn'))
            ->leftJoin('coffee_grade_cgrad AS cgrad', 'cgrad.id', '=', 'wn.cgrad_id')
            ->leftJoin('basket_bs AS bs', 'bs.id', '=', 'wn.bs_id')
            ->leftJoin('stock_st AS st', 'st.id', '=', 'wn.st_id')
            ->leftJoin('process_pr AS pr', 'pr.id', '=', 'wn.pr_id')
            ->leftJoin('packaging_pkg AS pkg', 'pkg.id', '=', 'wn.pkg_id')
            ->leftJoin('weighbridge_wb AS wb', 'wb.id', '=', 'wn.wb_id')
            ->leftJoin('weight_scales_ws AS ws', 'ws.id', '=', 'wn.ws_id')
            ->leftJoin('warehouse_wr AS wr', 'wr.id', '=', 'ws.wr_id')
            ->where('wn.wn_number', $wn_number)
            ->first();


        return View::make('weighnote', compact('Season', 'country', 'weighbridge_ticket', 'wn_number', 'grn_details', 'coffeeGrade', 'sale', 'coffee_details', 'saleid', 'basket', 'packaging', 'stock_details', 'warehouse', 'warehouse_count', 'wrhse', 'location', 'weigh_scales', 'weigh_scales_count', 'wsid', 'rw', 'clm', 'zone', 'packages_batch', 'batch_kilograms', 'grnsview', 'batchview', 'expected_arrival', 'stock_id', 'st_quality_check', 'rates', 'teams', 'wbtk', 'ot_season', 'cgrad_id', 'bskt', 'outturn', 'purpose', 'weight_note_details', 'weight_note_outturns')); 
    
	}

    public function getStockDetails($st_id, $pr_id, $outturn, $cgrad_id, $basket_id) {
        $error_message = null;

        if ($st_id != null) { 

            $stock_details= DB::table('stock_st AS st')
                ->select('*', 'st.id as stid', \DB::raw('null as prid'))
                ->leftJoin('purchases_prc AS prc', 'st.prc_id', '=', 'prc.id')
                ->leftJoin('coffee_grade_cgrad AS cgrad', 'cgrad.id', '=', 'st.cgrad_id')
                ->leftJoin('basket_bs AS bs', 'bs.id', '=', 'st.bs_id')
                ->where('st.id', $st_id)
                ->first();

        } else if ($pr_id != null) { 

           $stock_details= DB::table('process_pr AS pr')
            ->select('*', 'pr_instruction_number as st_outturn', \DB::raw('round(pr_weight_in/60) as st_packages'), 'pr.id as prid')
            ->where('pr.id', $pr_id)
            ->first();         

        } else if ($cgrad_id != null && $basket_id != null) {
            $error_message = " Outturn, grade, basket combination not found!!";
            $stock_details= DB::table('stock_st AS st')
                ->select('*', 'st.id as stid', \DB::raw('null as prid'))
                ->leftJoin('purchases_prc AS prc', 'st.prc_id', '=', 'prc.id')
                ->leftJoin('coffee_grade_cgrad AS cgrad', 'cgrad.id', '=', 'st.cgrad_id')
                ->leftJoin('basket_bs AS bs', 'bs.id', '=', 'st.bs_id')
                ->where('st.st_outturn', $outturn)
                ->where('st.cgrad_id', $cgrad_id)
                ->where('st.bs_id', $basket_id)
                ->first();
        } else if ($cgrad_id != null) {                    
            $error_message = " Outturn, grade combination not found!!";
            $stock_details= DB::table('stock_st AS st')
                ->select('*', 'st.id as stid', \DB::raw('null as prid'))
                ->leftJoin('purchases_prc AS prc', 'st.prc_id', '=', 'prc.id')
                ->leftJoin('coffee_grade_cgrad AS cgrad', 'cgrad.id', '=', 'st.cgrad_id')
                ->leftJoin('basket_bs AS bs', 'bs.id', '=', 'st.bs_id')
                ->where('st.st_outturn', $outturn)
                ->where('st.cgrad_id', $cgrad_id)
                ->first();
        } else if ($basket_id != null) {   
            $error_message = " Outturn, basket combination not found!!";
            $stock_details= DB::table('stock_st AS st')
                ->select('*', 'st.id as stid', \DB::raw('null as prid'))
                ->leftJoin('purchases_prc AS prc', 'st.prc_id', '=', 'prc.id')
                ->leftJoin('coffee_grade_cgrad AS cgrad', 'cgrad.id', '=', 'st.cgrad_id')
                ->leftJoin('basket_bs AS bs', 'bs.id', '=', 'st.bs_id')
                ->where('st.st_outturn', $outturn)
                ->where('st.bs_id', $basket_id)
                ->first();
        } else{   
            $error_message = " Outturn not found!!";
            $stock_details= DB::table('stock_st AS st')
                ->select('*', 'st.id as stid', \DB::raw('null as prid'))
                ->leftJoin('purchases_prc AS prc', 'st.prc_id', '=', 'prc.id')
                ->leftJoin('coffee_grade_cgrad AS cgrad', 'cgrad.id', '=', 'st.cgrad_id')
                ->leftJoin('basket_bs AS bs', 'bs.id', '=', 'st.bs_id')
                ->where('st.st_outturn', $outturn)
                ->first();
        }

        if ($stock_details == null) {
            $stock_details= DB::table('process_pr AS pr')
                ->select('*', 'pr_instruction_number as st_outturn', \DB::raw('round(pr_weight_in/60) as st_packages'), 'pr.id as prid')
                ->where('pr.pr_instruction_number', $outturn)
                ->first();
        } 

        if ($stock_details == null) {
            $stock_details = $error_message;
        }

        return $stock_details;


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

    public function weight_note_delete($id)
    {   

        $weight_note_details = WeightNote::where('id', $id)->first();  

        if ($weight_note_details) {

            WeightNote::where('id', $id)->delete();

        }

        return redirect('weighnote');        
        
    }

   
}

