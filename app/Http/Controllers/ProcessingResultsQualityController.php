<?php namespace Ngea\Http\Controllers;

use Activity;
use Auth;
use DB;
use delete;
use Illuminate\Http\Request;
use Input;
use Ngea\basket;
use Ngea\InternalBaskets;
use Ngea\buyer;
use Ngea\Certification;
use Ngea\CoffeeGrade;
use Ngea\coffee_certification;
use Ngea\country;
use Ngea\OutturnTotalBatch;
use Ngea\cupscore;
use Ngea\Batch;
use Ngea\StockBreakdown;
use Ngea\purchase;

use Ngea\Http\Controllers\Controller;

use Ngea\Location;
use Ngea\mills_region;
use Ngea\Process;
use Ngea\Processes;
use Ngea\processing;
use Ngea\processing_instruction;
use Ngea\ProcessInstructions;
use Ngea\ProcessResults;
use Ngea\ProcessResultsType;
use Ngea\quality_parameters;
use Ngea\rawscore;
use Ngea\Region;
use Ngea\release;
use Ngea\release_instructions;
use Ngea\Sale;
use Ngea\sale_lots;
use Ngea\sale_status;
use Ngea\screens;
use Ngea\Season;
use Ngea\seller;
use Ngea\StockLocation;
use Ngea\Stock;
use Ngea\StockStatus;
use Ngea\StockView;
use Ngea\StockViewALL;
use Ngea\SalesContract;
use Ngea\transporters;
use Ngea\User;
use Ngea\Person;
use Ngea\StockQuality;

use Ngea\Sum_Process_Allocation;

use Ngea\warehouses_region;
use Yajra\Datatables\Datatables;

use Ngea\StockProcessedView;

use Ngea\ProcessAllocation;

use niklasravnsborg\LaravelPdf\Facades\Pdf as PDF;
use View;

class ProcessingResultsQualityController extends Controller
{

 

    public function processingResultsQualityForm(Request $request)
    {
        $id            = null;
        $Season        = Season::all(['id', 'csn_season']);
        $country       = country::all(['id', 'ctr_name', 'ctr_initial']);
        $CoffeeGrade   = CoffeeGrade::all(['id', 'cgrad_name']);
        $Certification = Certification::all(['id', 'crt_name']);
        $buyer         = buyer::all(['id', 'cb_name']);
        $processing    = processing::all(['id', 'prcss_name']);
        $cupscore = cupscore::all(['id', 'cp_score', 'cp_quality']);

        $sale_status = sale_status::all(['id', 'sst_name']);
        $Warehouse   = null;
        $Mill        = null;

        $cid        = null;
        $csn_season = null;
        $sale_cb_id = null;
        $release_no = null;
        $date       = null;
        $release_no = null;

        $ref_no = release::orderBy('previous_no', 'asc')->pluck('previous_no');
        foreach ($ref_no as $ref) {
            $ref_no = $ref;
        }
        $ref_no = "IBR-" . sprintf("%07d", ($ref_no + 0000001));

        return View::make('processingresultsquality', compact('id',
            'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'ref_no'));

    }

    public function processingResultsQuality(Request $request)
    {
        $id = null;

        $Warehouse = null;
        $ref_no    = null;

        $country         = country::all(['id', 'ctr_name', 'ctr_initial']);
        $processing      = processing::all(['id', 'prcss_name']);
        $cid             = Input::get('country');
        $prc             = Input::get('process_type');
        $rfid            = Input::get('ref_no');
        $rtid            = Input::get('results_type');
        $batch_kilograms = Input::get('batch_kilograms');
        $packages        = Input::get('packages');
        $rw              = Input::get('row');
        $clm             = Input::get('column');
        $zone            = Input::get('zone');
        $wrhse           = Input::get('warehouse');

        $returnToStock   = $request->input('returnToStock');

        $cupscore = cupscore::all(['id', 'cp_score', 'cp_quality']);

        $BULKING_PROCESS = 4;
        $INTERNAL_BULK = 1;

        $cgradid = Input::get('coffee_grade');
        $bsid = Input::get('basket');

        $locrowid = NULL;
        $loccolid = NULL;

        $refno     = null;
        $StockView = null;

        $basket = InternalBaskets::where('ctr_id', Input::get('country'))->orderBy('ibs_code')->get();
        $CoffeeGrade = CoffeeGrade::where('ctr_id', Input::get('country'))->get();

        $user_data = Auth::user();
        $user      = $user_data->id;
        $isInBulk = false;
        $stid = null;     

        if ($cid != null) {
            if ($prc != null) {
                $refno       = Process::where('prcss_id', $prc)->where('ctr_id', $cid)->whereNotNull('pr_supervisor')->whereNull('pr_confirmed_by')->orderBy('pr_instruction_number')->get();
                $resultsType = ProcessResultsType::where('prcss_id', $prc)->get();
                if ($rfid != null) {
                    $StockView      = StockViewALL::where('prcssid', $rfid)->where('processtype', $prc)->get();
                    $ProcessResults = Processes::where('id', $rfid)->where('ctrid', $cid)->whereNotNull('result_type')->get();
                }
            }
            $Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->where('wrt_id', '1')->get();

        }
        if ($StockView != null) {
            foreach ($StockView as $key => $value) {
                if ($value->id != null &&  $value->prcssid_all == $BULKING_PROCESS) {
                    $isInBulk = true;

                } else {
                    $returnToStock = 1;
                }

            }
        }

        if ($wrhse !== null) {
            $location = Location::where('wr_id', $wrhse)->get();
        }

        $prdetails = Process::where('id', $rfid)->first();

        if ($rtid != null) {
            $results_view = ProcessResults::where('pr_id', $rfid)->where('prt_id', $rtid)->first();
        }

        if (null !== Input::get('confirmresults')) {
            $process_results = ProcessResults::where('pr_id', $rfid)->get();
            $process_allocation = Sum_Process_Allocation::where('pr_id', $rfid)->first();
            $total_kilos_processed = null;
            $total_kilos_allocated = null;

            foreach ($StockView as $key => $value) {
                $stock_item_breakdown = StockBreakdown::where('st_id',$value->id)->whereNull('cn_id')->get();
                if ($stock_item_breakdown->isEmpty()) {
                    $stock_item_breakdown = purchase::where('id',$value->prcid)->get();
                } 

                $stb_weight = null;
                $stb_value = null;
                $stb_ratios = null;

                $stb_purchase_contract_ratio = null;
                $stb_cb_id = null;
                $stb_cgr_id = null;

                foreach ($stock_item_breakdown as $sibkey => $sibvalue) {
                    $stb_weight = $sibvalue->inv_weight;
                    $stb_value = $sibvalue->inv_weight * $sibvalue->prc_confirmed_price;
                    $stb_ratios = $sibvalue->prc_purchase_contract_ratio;

                    if ($stb_weight == null) {
                        $stb_weight = $sibvalue->stb_weight;
                    }
                    
                    if ($stb_value == null && $sibvalue->stb_weight != null && $sibvalue->stb_weight !=0 ) {
                        $stb_value = ($sibvalue->stb_value/$sibvalue->stb_weight) * $sibvalue->stb_weight;
                    } else {
                        $stb_value = $sibvalue->stb_value;
                    }

                    if ($stb_ratios == null) {
                        $stb_ratios = $sibvalue->stb_purchase_contract_ratio;
                    }
                }

                Stock::where('id', '=', $value->id)
                            ->update([ 'pr_id' => $rfid]);
            }

            $stock_added_flag = null;
            $previousStid = array();

            foreach ($process_results as $key => $value) {
                $total_kilos_processed += $value->prts_weight;
            }

            $total_kilos_allocated = $process_allocation->allocated_weight;
            

            $threshold_name = "Processing";

            $identifier = $threshold_name. " ". $prdetails->pr_instruction_number;


            $this->checkThreshold($threshold_name, $total_kilos_allocated, $total_kilos_processed, $identifier);


            foreach ($process_results as $key => $value) {
                    
                    $prt_id_results = $value->prt_id;

                    $batch_kilograms = $value->prts_weight;
                    $stbags    = floor($batch_kilograms / 60);
                    $stpockets = $batch_kilograms % 60;
                    $prdetails = Process::where('id', $value->pr_id)->first();
                    $resdetails = ProcessResultsType::where('id', $value->prt_id)->first();
                    $total_value = null;
                    $total_bric_value = null;
                    $total_bric_initial_value = null;
                    $total_kilos = null;
                    $total_initial_kilos = null;
                    $total_initial_value = null;
                    $total_initial_bric_value = null;
                    $count_stocks_in_bulk = null;
                    $total_hedge = null;
                    $total_price = null;

                    $split_lot = null;


                    foreach ($StockView as $keyst => $valuest) {

                        $total_kilos += $valuest->weight; 

                        $total_value += ($valuest->weight)/50 * ($valuest->price);



                    }

                    if ($total_value != null) {

                        $total_price = $total_value/$total_kilos * 50;

                    }

                    $stocks_in_bulk = StockViewALL::where('prcssid', $rfid)->get();

                    $weighted_hedge = 0;

                    foreach ($stocks_in_bulk as $keyst => $valuest) {

                        $stock_single_lots = Stock::where('id', $valuest->id)->first();

                        $total_bric_initial_value += $stock_single_lots->st_bric_value;

                        $weighted_hedge += $stock_single_lots->st_hedge * $stock_single_lots->st_net_weight; 

                        $total_initial_kilos += $stock_single_lots->st_net_weight;  

                        // $total_initial_value = $stock_single_lots->st_value;  

                        $total_initial_value += ($valuest->weight/$stock_single_lots->st_net_weight) * $stock_single_lots->st_value;

                        #$total_initial_bric_value = $stock_single_lots->st_bric_value;
                        $total_initial_bric_value += ($valuest->weight/$stock_single_lots->st_net_weight) * $stock_single_lots->st_bric_value;


                        $count_stocks_in_bulk +=1; 


                        if ($stock_single_lots->st_net_weight != $valuest->weight && !in_array($valuest->id, $previousStid)) { 

                            $previousStid[] = $valuest->id;

                            $stock_net = $stock_single_lots->st_net_weight - $valuest->weight;

                            $stock_bags = floor($stock_net / 60);

                            $stock_pockets = $stock_net % 60;     

                            $batch_packages = ceil($stock_net / 60);          

                            $stock_added_flag = 1;

                            $stock_value = $stock_single_lots->st_value;

                            $stock_bric_value = $stock_single_lots->st_bric_value;

                            $stock_hedge = $stock_single_lots->st_hedge;

                            $new_stock_value = ($stock_net/$stock_single_lots->st_net_weight) * $stock_value;

                            $new_stock_bric_value = ($stock_net/$stock_single_lots->st_net_weight) * $stock_bric_value;

                            $previous_stock_breakdown = StockBreakdown::where('st_id', $valuest->id)->whereNull('cn_id')->get();    

                            $stock_details_exist = Stock::where('gr_id', $stock_single_lots->gr_id)->where('st_outturn', $stock_single_lots->st_outturn)->where('cgrad_id', $stock_single_lots->cgrad_id)->where('prt_id', $stock_single_lots->prt_id)->where('st_net_weight', $stock_net)->first();   


                            if ($stock_details_exist == null) {                 

                                $stid = Stock::insertGetId(['ctr_id' => $cid, 'csn_id' => $stock_single_lots->csn_id, 'cb_id' => $stock_single_lots->cb_id , 'st_outturn' => $stock_single_lots->st_outturn, 'st_mark' => $stock_single_lots->st_mark, 'st_name' => $stock_single_lots->st_name, 'prc_id' => $stock_single_lots->prc_id, 'gr_id' => $stock_single_lots->gr_id, 'st_net_weight' => $stock_net, 'st_bags' => $stock_bags, 'st_pockets' => $stock_pockets, 'pkg_id' => $stock_single_lots->pkg_id, 'usr_id' => $user, 'sts_id' => '2', 'cgrad_id' => $stock_single_lots->cgrad_id, 'bs_id' => $stock_single_lots->bs_id, 'ibs_id' => $stock_single_lots->ibs_id,  'prt_id' => $stock_single_lots->prt_id,  'prc_price' => $stock_single_lots->prc_price, 'br_id' => $stock_single_lots->br_id, 'sl_id' => $stock_single_lots->sl_id, 'st_value' => $new_stock_value, 'st_bric_value' => $new_stock_bric_value, 'st_hedge' => $stock_hedge]);

                            }

                            $batch_single_lots = Batch::where('st_id', $stock_single_lots->id)->orderBy('id', 'desc')->first();

                            $batch_location_single_lots = null;

                            if ($batch_single_lots != null) {

                                $batch_location_single_lots = StockLocation::where('bt_id', $batch_single_lots->id)->first();

                            }                            

                            // check if in any allocation use pr_id where pr_id not this
                            $previous_allocations = ProcessAllocation::where('st_id', $valuest->id)->where('pr_id', '!=', $rfid)->get();

                            if (!$previous_allocations->isEmpty()) {

                                foreach ($previous_allocations as $palkey => $palvalue) {

                                    ProcessAllocation::where('id', '=', $palvalue->id)
                                        ->update([ 'st_id' => $stid]);
                                        
                                    Stock::where('id', '=', $stid)
                                        ->update([ 'st_ended_by' => $user, 'pr_id' => $palvalue->pr_id]);

                                }
                            }

                            //update stock breakdown reference
                            $previous_stock_breakdown = StockBreakdown::where('st_id', $valuest->id)->whereNull('cn_id')->get();

                            if (!$previous_stock_breakdown->isEmpty()) {

                                foreach ($previous_stock_breakdown as $psbkey => $psbvalue) {
                                    
                                    //weight
                                    $stb_weight = $stock_net * $psbvalue->stb_bulk_ratio;

                                    $bric_id = null;

                                    $bric_id = $psbvalue->br_id; 

                                    // if (round($stb_weight) >= 1) {

                                    //     $bric_id = $psbvalue->br_id;                                        

                                    // } else {

                                    //     $bric_id = 1;

                                    // }

                                    $bric_value = $stock_single_lots->st_bric_value;

                                    if ($psbvalue->stb_value == null) {

                                        $stb_value_ratio = ($stock_net/$stock_single_lots->st_net_weight);

                                        $stb_store_ratio = ($bric_value/$stock_bric_value);

                                    } else {

                                        $stb_store_ratio = ($psbvalue->stb_value/$stock_bric_value);

                                        $stb_value_ratio = ($stock_net/$stock_single_lots->st_net_weight) * ($psbvalue->stb_value)/$stock_bric_value;

                                    }

                                    $stb_value = $psbvalue->stb_value_ratio * $stock_bric_value;

                                    $split_lot = 1 - ($stock_net/$stock_single_lots->st_net_weight);   

                                    StockBreakdown::insertGetId (
                                         ['st_id' => $stid, 'br_id' => $bric_id, 'stb_value' => $stb_value ,  'stb_value_ratio' => $psbvalue->stb_value_ratio ,'stb_weight' => $stb_weight, 'stb_hedge' => $psbvalue->stb_hedge, 'bs_id' => $psbvalue->bs_id, 'ibs_id' => $psbvalue->ibs_id, 'stb_bulk_ratio' => $psbvalue->stb_bulk_ratio, 'stb_purchase_contract_ratio' => $psbvalue->psbvalue, 'cb_id' => $psbvalue->cb_id, 'cgr_id' => $psbvalue->cgr_id, 'prc_id' => $psbvalue->prc_id]);
                                }
                            }    
                            


                            $btid = Batch::insertGetId (
                            ['st_id' => $stid, 'btc_weight' => $batch_kilograms, 'btc_tare' => 0, 'btc_net_weight' => $stock_net, 'btc_packages' => $batch_packages, 'btc_bags' => $stock_bags, 'btc_pockets' => $stock_pockets]);
                            Activity::log('Inserted Batch information with btid '.$btid. ' batch_kilograms '. $stock_net. ' bags '. $stock_bags. ' pockets '. $stock_pockets. ' stid '. $stid.' btc_tare '.'0'.' btc_net_weight '.$stock_net);  
                            if ($batch_single_lots != null) {
                                $stlocid = StockLocation::insertGetId (
                                ['bt_id' => $btid, 'loc_row_id' => $batch_location_single_lots->loc_row_id, 'loc_column_id' => $batch_location_single_lots->loc_column_id, 'btc_zone' => $batch_location_single_lots->btc_zone]);
                                Activity::log('Inserted StockLocation information with bt_id '.$btid. ' locrowid '. $batch_location_single_lots->loc_row_id. ' loccolid '. $batch_location_single_lots->loc_column_id. ' zone '. $batch_location_single_lots->btc_zone);
                            } else {
                                $stlocid = StockLocation::insertGetId (
                                ['bt_id' => $btid, 'loc_row_id' => null, 'loc_column_id' => null, 'btc_zone' => null]);
                              
                            }
                        } 

                    }

                    $checkIfInBulk = StockViewALL::where('prcssid', $value->pr_id)->where('prcssid_all', $BULKING_PROCESS)->first();

                    $bulkProcessID = null;
                    if ($checkIfInBulk  != null) {
                        $bulkProcessID = Process::where('pr_instruction_number', $checkIfInBulk->pending_process_all)->first();
                        if ($bulkProcessID != null) {
                            $bulkProcessID = $bulkProcessID->id;
                        }
                        
                    }



                    $stocks_value = StockViewALL::where('prcssid', $rfid)->first();               

                    $weighted_average_hedge = $weighted_hedge/$total_initial_kilos;
                    
                    


                    // $new_stock_value = ($batch_kilograms/$total_kilos_processed) * ($batch_kilograms/$total_initial_value) * $total_initial_value;

                    // $new_stock_bric_value = ($batch_kilograms/$total_kilos_processed) * ($batch_kilograms/$total_initial_bric_value) * $total_initial_bric_value;

                    if ($prt_id_results == 1) {

                        $new_stock_value = $total_initial_value;

                        $new_stock_bric_value = $total_initial_bric_value;     


                    } else {

                        $new_stock_value = ($batch_kilograms/$total_kilos_processed) * $total_initial_value;

                        $new_stock_bric_value = ($batch_kilograms/$total_kilos_processed) * $total_initial_bric_value;                    

                    }



                    // $new_stock_value = ($batch_kilograms/$total_kilos_processed) * ($batch_kilograms/$total_initial_kilos) * $total_initial_value;

                    // $new_stock_bric_value = ($batch_kilograms/$total_kilos_processed) * ($batch_kilograms/$total_initial_kilos) * $total_initial_bric_value;
           
                    if (strtolower($resdetails->prt_name) == 'rejects') {


                        $stock_details_exist = Stock::where('prt_id', $resdetails->id)->where('st_outturn', $prdetails->pr_instruction_number)->where('st_net_weight', $batch_kilograms)->first();        

                        if ($stock_details_exist == null) {     

                           $stid = Stock::insertGetId(['ctr_id' => $cid, 'csn_id' => $prdetails->csn_id, 'st_outturn' => $prdetails->pr_instruction_number, 'st_name' => $prdetails->pr_instruction_number, 'st_net_weight' => $batch_kilograms, 'st_bags' => $stbags, 'st_pockets' => $stpockets, 'usr_id' => $user, 'sts_id' => '3', 'cgrad_id' => $value->cgrad_id, 'prt_id' => $resdetails->id,  'bs_id' => $value->bs_id,'ibs_id' => $value->bs_id, 'prc_price' => $total_price, 'pr_id' => $bulkProcessID, 'st_value' => $new_stock_value, 'st_hedge' => $weighted_average_hedge, 'st_bric_value' => $new_stock_bric_value]);
                         
                        }


 
                        
                    } else {

                        if ($prdetails->prcss_id == '4') {
                            
                            $prsct_id = $prdetails->sct_id;

                        } else {

                           $prsct_id = null; 

                        }

                        $stock_details_exist = Stock::where('prt_id', $resdetails->id)->where('st_outturn', $prdetails->pr_instruction_number)->where('st_net_weight', $batch_kilograms)->first();        

                        if ($stock_details_exist == null) {  

                            $stid = Stock::insertGetId(['ctr_id' => $cid, 'sct_id' => $prsct_id, 'csn_id' => $prdetails->csn_id, 'st_outturn' => $prdetails->pr_instruction_number, 'st_name' => $prdetails->pr_instruction_number , 'st_net_weight' => $batch_kilograms, 'st_bags' => $stbags, 'st_pockets' => $stpockets, 'usr_id' => $user, 'sts_id' => '2', 'cgrad_id' => $value->cgrad_id, 'prt_id' => $resdetails->id, 'bs_id' => $value->bs_id, 'ibs_id' => $value->bs_id, 'prc_price' => $total_price, 'pr_id' => $bulkProcessID, 'st_value' => $new_stock_value, 'st_hedge' => $weighted_average_hedge, 'st_bric_value' => $new_stock_bric_value]);     

                        }                
                    }    

                    if ($stid != null) {
                        StockQuality::insertGetId(['st_id' => $stid, 'cp_id' => $value->cp_id, 'sqltyd_acidity' => $value->sqltyd_acidity, 'sqltyd_body' => $value->sqltyd_body, 'sqltyd_flavour' => $value->sqltyd_flavour, 'sqltyd_description' => $value->sqltyd_description]);

                        ProcessResults::where('id', '=', $value->id)
                            ->update([ 'st_id' => $stid]);

                    }


                    foreach ($StockView as $keysv => $valuesv) {

                        $stock_item_breakdown = StockBreakdown::where('st_id',$valuesv->id)->whereNull('cn_id')->get();

                        $stock_item = Stock::where('id', $valuesv->id)->first();

                        $stock_net = $stock_item->st_net_weight - $valuesv->weight;

                        $split_lot = 1 - ($stock_net/$stock_item->st_net_weight);

                        if ($stock_item_breakdown->isEmpty()) {

                            $stock_item_breakdown = purchase::where('id',$valuesv->prcid)->get();

                        } 

                        #what each contract contributed to the bulk
                        $stock_item_weight = $valuesv->weight;

                        $stb_weight = null;
                        $stb_value = null;
                        $stb_ratios = null;

                        $stb_purchase_contract_ratio = null;
                        $stb_cb_id = null;
                        $stb_cgr_id = null;

                        $sum_weight = null;

                        $stb_store_ratio = null;

                        foreach ($stock_item_breakdown as $sibkey => $sibvalue) {

                            $stb_weight = $stock_item_weight;           

                            $stb_value = $sibvalue->inv_weight * $sibvalue->prc_confirmed_price;

                            $stb_ratios = $stb_weight/$total_kilos;

                            $stb_br_id = $sibvalue->br_id;

                            $stb_cgr_id = $sibvalue->cgr_id;

                            $stb_cb_id = $sibvalue->cb_id;

                            if ($stb_cgr_id == null) {

                                $stb_cgr_id = 10000001;

                            }
                            if ($stb_cb_id == null) {

                                $stb_cb_id = 43;

                            }

                            $bric_value = $stock_item->st_bric_value;

                            if ($sibvalue->inv_weight == null) {
                                
                                $stb_weight = $stock_item_weight * $sibvalue->stb_bulk_ratio;

                                $stb_ratios = $stb_weight/$total_kilos;

                            }
                            if ($stb_value == null && $sibvalue->stb_weight != null && $sibvalue->stb_weight !=0 ) {
                            
                                $stb_value = ($sibvalue->stb_value/$sibvalue->stb_weight) * $sibvalue->stb_weight;
                            
                            } else {
                                
                                $stb_value = $sibvalue->stb_value;

                            }

                            // if ($sibvalue->stb_bulk_ratio == null) {

                            // }

                            $stb_value_ratio = $bric_value/$total_initial_bric_value;
                            
                            // print_r($sibvalue->stb_value/$bric_value . "<br>" );

                            $shared_weight_ratio = $batch_kilograms/$total_kilos_processed;

                            // $stb_weight = $total_kilos_processed * $sibvalue->stb_bulk_ratio;

                            // $stb_value_ratio = $sibvalue->stb_bulk_ratio * ($batch_kilograms/$total_initial_kilos);

                            // $stb_value = $stb_value_ratio * $stock_single_lots->st_bric_value; 

                            $stb_weight = $batch_kilograms * $stb_ratios;   

                            $bric_id = null;

                            $bric_id = $stb_br_id;    

                            // if (round($stb_weight) >= 1) {

                            //     $bric_id = $stb_br_id;                                

                            // } else {

                            //     $bric_id = 1;

                            // }         
                            
                            if ($split_lot != null) {

                                $stb_value_ratio = $shared_weight_ratio * ($sibvalue->stb_value/$total_bric_initial_value) * $split_lot;
                                
                            } else {

                                if ($sibvalue->stb_value == null || $sibvalue->stb_value == "0.0000000000") {

                                    if ($count_stocks_in_bulk > 1){

                                        $stb_value_ratio = ($bric_value/$total_bric_initial_value);

                                    } else {

                                        $stb_value_ratio = $sibvalue->stb_value_ratio;

                                    }


                                } else {

                                    $stb_value_ratio = ($sibvalue->stb_value/$total_bric_initial_value);

                                }                                                        

                                $stb_value_ratio = $shared_weight_ratio * $stb_value_ratio;

                            }

                            if ($sibvalue->stb_value == null || $sibvalue->stb_value == "0.0000000000") {

                                if ($count_stocks_in_bulk > 1){

                                    $stb_store_ratio = ($bric_value/$total_bric_initial_value);

                                } else {

                                    $stb_store_ratio = $sibvalue->stb_value_ratio;

                                }

                                

                                // print_r($stb_store_ratio."<br>");


                            } else {

                                $stb_store_ratio = ($sibvalue->stb_value/$total_bric_initial_value);                              


                            }



                            if ($sibvalue->stb_value == null || $sibvalue->stb_value == "0.0000000000") {

                                if ($count_stocks_in_bulk > 1){

                                    $temp_ratio = $sibvalue->stb_value_ratio;

                                    if ($temp_ratio == null) {

                                        $temp_ratio = 1;

                                    }

                                    $stb_store_ratio = ($bric_value/$total_bric_initial_value)*$temp_ratio;

                                } else {

                                    $stb_store_ratio = $sibvalue->stb_value_ratio;

                                }

                            } else {

                                $stb_store_ratio = ($sibvalue->stb_value/$total_bric_initial_value);                              


                            }
                            
                            $stb_value = $stb_store_ratio * $total_bric_initial_value; 


                           #$stb_store_ratio = ($psbvalue->stb_value/$stock_bric_value);

                           #$stb_value_ratio = ($stock_net/$stock_single_lots->st_net_weight) * ($psbvalue->stb_value)/$stock_bric_value;

                            // print_r($sibvalue->stb_value. "<br>" );                          

                            // $stb_value = $stb_value_ratio * $total_bric_initial_value; 

                            // print_r($stb_value_ratio . "<br>" );

                            // print_r($stb_ratios . "<br>" );


                            // print_r($stock_single_lots->st_bric_value);
                            // print_r($total_initial_bric_value);

                            // print_r(($sibvalue->stb_value/$total_bric_initial_value)."<br>");                       
                            
                            // print_r($sibvalue. "<br>");   


                            StockBreakdown::insertGetId (
                                 ['st_id' => $stid, 'stb_weight' => $stb_weight, 'stb_bulk_ratio' => $stb_ratios, 'stb_value_ratio' => $stb_store_ratio, 'stb_value' => $stb_value, 'br_id' => $bric_id, 'cgr_id' => $stb_cgr_id, 'cb_id' => $stb_cb_id]);

                        }

                    }

                    if ( $checkIfInBulk  != null && $prc != $BULKING_PROCESS ) {

                        $additional_cweight = Process::where('id', '=', $bulkProcessID)->first();

                        

                        if (is_null($additional_cweight)) {

                            $additional_cweight = null;

                        } else {

                            $additional_cweight = $additional_cweight->pr_weight_processed;

                        }

                        $packages    = ceil($additional_cweight / 60);

                        $additional_cweight = $additional_cweight + $batch_kilograms;

                        $pall_ratio = $batch_kilograms/$additional_cweight;

                        Process::where('id', '=', $bulkProcessID)
                            ->update([ 'pr_weight_processed' => $additional_cweight]);

                        Stock::where('id', '=', $stid)
                            ->update([ 'st_ended_by' => $user]);

                        $processAllocationID = ProcessAllocation::insertGetId(['pr_id' => $bulkProcessID, 'st_id' => $stid, 'pall_allocated_weight' => $batch_kilograms, 'pall_packages' => $packages, 'pall_processed_weight' => null, 'pall_ratios' => $pall_ratio]);

                        $request->session()->flash('alert-success', 'Process Information Added!!');

                        Activity::log('Added process allocation information with id ' . $bulkProcessID . 'pall_allocated_weight' . $batch_kilograms .'pall_packages' .'pall_processed_weight' .$packages. 'pall_extra_processing');  

                    }

                    $otbid = OutturnTotalBatch::insertGetId (
                    ['otb_weight' => $batch_kilograms,'otb_confirmed_by' => $user]);
                    Activity::log('Inserted OutturnTotal information with sumbatchweight '.$batch_kilograms. ' user '. $user);

                    $btid = Batch::insertGetId (
                    ['st_id' => $stid, 'btc_weight' => $batch_kilograms, 'btc_tare' => 0, 'btc_net_weight' => $batch_kilograms, 'btc_packages' => $packages, 'btc_bags' => $stbags, 'btc_pockets' => $stpockets, 'otb_id' => $otbid]);

                    Activity::log('Inserted Batch information with btid '.$btid. ' batch_kilograms '. $batch_kilograms. ' bags '. $stbags. ' pockets '. $stpockets. ' stid '. $stid.' btc_tare '.'0'.' btc_net_weight '.$batch_kilograms);  

                    $stlocid = StockLocation::insertGetId (
                    ['bt_id' => $btid, 'loc_row_id' => $value->loc_row, 'loc_column_id' => $value->loc_column, 'btc_zone' => $value->btc_zone]);
                    Activity::log('Inserted StockLocation information with bt_id '.$btid. ' locrowid '. $locrowid. ' loccolid '. $loccolid. ' zone '. $value->btc_zone);

            }

            $stocks_in_bulk = StockViewALL::where('prcssid', $rfid)->get();

            foreach ($stocks_in_bulk as $keyst => $valuest) {
                Stock::where('id', '=', $valuest->id)
                    ->update([ 'st_additional_processed' => $user]);               

            }

            //check if processess are completed

            $prdetails = Process::where('id', $rfid)->first();

            if ($prdetails != null) {
                
                $prid = $prdetails->id;

                Process::where('id', '=', $prid)
                    ->update(['pr_confirmed_by' => $user, 'pr_weight_processed' => $total_kilos_processed]);

            }

            if ($cid != null) {

                if ($prc != null) {

                    $refno = Process::where('id', $rfid)->get();

                    $resultsType = ProcessResultsType::where('prcss_id', $prc)->get();

                    if ($rfid != null) {

                        $StockView = StockViewALL::where('prcssid', $rfid)->get();

                        $ProcessResults = Processes::where('id', $rfid)->where('ctrid', $cid)->whereNotNull('result_type')->get();

                    }

                }

                $Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->where('wrt_id', '1')->get();

            }

            $results_view = ProcessResults::where('pr_id', $rfid)->where('prt_id', $rtid)->first();
            
            $prdetails = Process::where('id', $rfid)->first();
            $batch_kilograms = null;
            return View::make('processingresultsquality', compact('id',
                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'rfid', 'prc', 'processing_instruction', 'input_type', 'title', 'refno', 'resultsType', 'rtid', 'StockView', 'ProcessResults', 'wrhse', 'location', 'prdetails', 'isInBulk', 'batch_kilograms', 'packages', 'rtid', 'results_view'));
        } else if (null !== Input::get('submitresults')) {
            $this->validate($request, [
                'country' => 'required', 'results_type' => 'required', 'basket' => 'required',
            ]);

            if ($prc == $BULKING_PROCESS ) {
                // checkBulkOutturnProcess
                foreach ($StockView as $key => $value) {
                    $process_allocation = ProcessAllocation::where('st_id', $value->id)->get();

                    foreach ($process_allocation as $key => $value_process) {
                        if ($value_process != null) {
                            $checkConfirmed = Process::where('id', $value_process->pr_id)->where('prcss_id', '!=', $BULKING_PROCESS)->first();
                            if ($checkConfirmed != null) {
                                if ($checkConfirmed->pr_confirmed_by == null) {

                                    $request->session()->flash('alert-warning', 'Please confirm process '.$checkConfirmed->pr_instruction_number.' first!!');

                                    return View::make('processingresultsquality', compact('id',
                                        'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'rfid', 'prc', 'processing_instruction', 'input_type', 'title', 'refno', 'resultsType', 'rtid', 'StockView', 'ProcessResults', 'wrhse', 'location', 'prdetails', 'isInBulk', 'batch_kilograms', 'packages', 'results_view'));
                                }
                            }
                        }                      
                    }

                }
            }

            $check_results = ProcessResults::where('pr_id', $rfid)->where('prt_id', $rtid)->first();


            $ProcessResultsDetails = Process::where('id', $rfid)->first();
            if ($cgradid == NULL) {
                $cgradid = $ProcessResultsDetails->cgrad_id;
            }
            if ($bsid == NULL) {
                $bsid = $ProcessResultsDetails->bs_id;                
            }
            $cup = Input::get('cup');
            $acidity = Input::get('acidity');
            $body = Input::get('body');
            $flavour = Input::get('flavour');
            $description = Input::get('description');

            if ($check_results !== null) {

                $pridt = $check_results->id;
                ProcessResults::where('id', '=', $pridt)
                    ->update(['cp_id' => $cup, 'sqltyd_acidity' => $acidity, 'sqltyd_body' => $body, 'sqltyd_flavour' => $flavour, 'sqltyd_description' => $description, 'cgrad_id' => $cgradid, 'bs_id' => $bsid]);
                $request->session()->flash('alert-success', 'Processing Results Updated!!');
                Activity::log('Updated Process Results Quality for id ' . $pridt . ' rtid ' . $rtid . ' cup ' . $cup . ' acidity ' . $acidity . ' by user ' . $user . ' body ' . $body . ' flavour ' . $flavour . ' description ' . $description . ' cgradid ' . $cgradid. 'cgradid' . $cgradid. ' bsid ' . $bsid);

            } else {

                $request->session()->flash('alert-warning', 'Warehouse need to enter their results first!!');

                return View::make('processingresultsquality', compact('id',
                    'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'rfid', 'prc', 'processing_instruction', 'input_type', 'title', 'refno', 'resultsType', 'rtid', 'StockView', 'ProcessResults', 'wrhse', 'location', 'prdetails', 'isInBulk', 'batch_kilograms', 'packages', 'results_view'));                
            }

            if ($cid != null) {

                if ($prc != null) {
                    $$refno  = Process::where('prcss_id', $prc)->where('ctr_id', $cid)->whereNotNull('pr_supervisor')->whereNull('pr_confirmed_by')->orderBy('pr_instruction_number')->get();
                    $resultsType = ProcessResultsType::where('prcss_id', $prc)->get();
                    if ($rfid != null) {
                        $StockView      = StockViewALL::where('prcssid', $rfid)->get();
                        $ProcessResults = Processes::where('id', $rfid)->where('ctrid', $cid)->whereNotNull('result_type')->get();
                    }
                }

                $Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->where('wrt_id', '1')->get();

            }
            $batch_kilograms = null;
            $results_view = ProcessResults::where('pr_id', $rfid)->where('prt_id', $rtid)->first();
            return View::make('processingresultsquality', compact('id',
                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'rfid', 'prc', 'processing_instruction', 'input_type', 'title', 'refno', 'resultsType', 'rtid', 'StockView', 'ProcessResults', 'wrhse', 'location', 'prdetails', 'isInBulk', 'batch_kilograms', 'packages', 'rtid', 'results_view'));

        } else if (null !== Input::get('printresults')) {
            $this->validate($request, ['country' => 'required', 
            ]);

            $ref_no    = Input::get('ref_no');
            $TO = "NKG Export - Warehouse Department";
            $ATTENTION = "NELSON";
            $FROM = "Quality Department";
            $reference = Input::get('reference');
            $contractID = Input::get('contract');
            $contractNumber = SalesContract::where('id', '=', $contractID)->first();

            $date = null;
            $prdetails = Process::where('id', $ref_no)->first();


            $process_number = Process::where('id', $ref_no)->first();

            if ($process_number == null) {
                $request->session()->flash('alert-warning', 'No such process!!');
                return View::make('processingresultsquality', compact('id',
                    'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'ref_no', 'prc', 'processing_instruction', 'input_type', 'title', 'certs', 'StockStatus', 'other_instructions', 'instructions_checked', 'instructions_selected','prc_season', 'reference', 'contract', 'contractID', 'StockView','prdetails', 'prc_season', 'extraProcessing', 'selectedContract', 'reference_no', 'selected_date'));                  
            }
      
            $reference = $process_number->pr_reference_name;
            $date = $process_number->pr_date;
            $date = date("m/d/Y", strtotime($date)); 
            $StockView = StockViewALL::where('prcssid', $process_number->id)->get();  


            if ($contractNumber != NULL) {
                $contractNumber = " - ".$contractNumber->sct_number;
            } else {
                $contractNumber = NULL;
            }            

            $process_type = Processing::where('id', $process_number->prcss_id)->first();
            $process_type = $process_type->prcss_name;
            $processes = Processes::where('id', $process_number->id)->first();

            if ($processes->process_instructions != null) {
                $process_instructions = ', and '.$processes->process_instructions;
            } else {
                $process_instructions = null;
            }
            $process_other_instructions = $processes->process_other_instructions;


            $processing_season = Input::get('processing_season');
            $seasonName = null;
            if ($processing_season != null) {
                $seasonName  = Season::where('id', $processing_season)->first();
                $seasonName = $seasonName->csn_season;
            }


            $user_data = Auth::user();
            $user      = $user_data->id;

            $person_id      = $user_data->per_id;
            $personDetails = Person::where('id', $person_id)->first();

            $person_fname      = $personDetails->per_fname;
            $person_sname      = $personDetails->per_sname;

            $ref_no = $process_number->pr_instruction_number;


            $results_view = processes::where('id', $rfid)->get();




            $pdf = PDF::loadView('pdf.processing_results', compact('TO',  'ATTENTION', 'FROM', 'reference', 'ref_no', 'contractNumber', 'user',  'date', 'StockView', 'seasonName', 'person_fname', 'person_sname', 'process_type', 'process_instructions', 'process_other_instructions', 'results_view'));
            return $pdf->stream($ref_no . ' processing_results.pdf');

        } else {
            return View::make('processingresultsquality', compact('id',
                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'rfid', 'prc', 'processing_instruction', 'input_type', 'title', 'refno', 'resultsType', 'rtid', 'StockView', 'ProcessResults', 'wrhse', 'location', 'prdetails', 'isInBulk', 'batch_kilograms', 'packages', 'rtid', 'results_view'));
        }

    }

}
