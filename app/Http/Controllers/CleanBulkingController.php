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
use Ngea\coffeegrower;
use Ngea\ProvisionalBulk;

use Ngea\Http\Controllers\Controller;
use Ngea\Agent;

use Ngea\Location;
use Ngea\mills_region;
use Ngea\Process;
use Ngea\Processes;
use Ngea\processing;
use Ngea\processing_instruction;
use Ngea\ProcessInstructions;
use Ngea\ProcessResults;
use Ngea\ProvisionalResults;
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
use Ngea\StockLocationBatch;
use Ngea\Stock;
use Ngea\StockStatus;
use Ngea\StockView;
use Ngea\StockViewALL;
use Ngea\SalesContract;
use Ngea\transporters;
use Ngea\User;
use Ngea\Person;
use Ngea\warehouses_region;
use Yajra\Datatables\Datatables;

use Ngea\StockProcessedView;

use Ngea\ProcessAllocation;
use Ngea\ProvisionalAllocation;
use Ngea\Provisonal_Purpose;
// use PDF;
use niklasravnsborg\LaravelPdf\Facades\Pdf as PDF;
use View;

use Ngea\processrates;
use Ngea\processcharges;
use Ngea\teams;
use Ngea\StockMill;
use Ngea\StockWarehouse;
use Ngea\Material;
use Ngea\StockLocationView;
use Ngea\StockViewWarehouse;
use Ngea\StockLocation;
use Ngea\Warehouse;

class CleanBulkingController extends Controller {

    public function bulkingForm(Request $request)
    {
        $id            = null;
        $Season        = Season::all(['id', 'csn_season']);
        $country       = country::all(['id', 'ctr_name', 'ctr_initial']);
        $CoffeeGrade   = CoffeeGrade::all(['id', 'cgrad_name']);
        $Certification = Certification::all(['id', 'crt_name']);
        $buyer         = buyer::all(['id', 'cb_name']);
        $processing    = processing::all(['id', 'prcss_name']);
        $StockStatus   = StockStatus::all(['id', 'sts_name']);
        $provisionalPurpose = Provisonal_Purpose::all(['id', 'prp_name']);
        $material = Material::all(['id', 'mt_name']);
        $warehouse = agent::where('agtc_id', 4)->orWhere('agtc_id', 1)->get();

        $sale_status = sale_status::all(['id', 'sst_name']);
        $Warehouse   = null;
        $Mill        = null;
        $cid         = null;
        $csn_season  = null;
        $sale_cb_id  = null;
        $release_no  = null;
        $date        = null;
        $release_no  = null;
        $ref_no      = null;
        $certs       = null;
        $prc       = null;

        
        $BULKING_PROCESS = 4;
        $INTERNAL_BULK = 1;
       

        $ref_no = strtoupper(Input::get('ref_no'));
        
        $reference_no = null;

        // if ($request->has('country')) {
        //     $cid = Input::get('country');
        // } else {
        //     $cid = 1;
        // }
        $COUNTRY_INITIAL = country::where('id', $cid)->first();
        if ($COUNTRY_INITIAL !== NULL) {
            $COUNTRY_INITIAL = substr($COUNTRY_INITIAL->ctr_initial, 0, 1) ;
        }
        
        $growers = coffeegrower::all(['id', 'cgr_grower', 'cgr_code', 'cgr_mark']);
        $provisionalbulk = ProvisionalBulk::all(['id', 'pbk_instruction_number']);
  

        return View::make('cleanbulking', compact('id',
            'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'ref_no', 'certs', 'StockStatus', 'growers', 'provisionalPurpose', 'material', 'rw', 'clm', 'zone', 'warehouse', 'provisionalbulk'));

    }

    public function bulking(Request $request)
    {
        $id = null;
        $active_season = $this->getActiveSeason();
        $Warehouse = null;
        $Mill      = null;

        $ref_no = null;
        $prc    = Input::get('process_type');
        $cid    = Input::get('country');

        $StockStatus = StockStatus::all(['id', 'sts_name']);
        $csn_season  = Input::get('sale_season');
        $prc_season = Input::get('processing_season');
        $reference = Input::get('reference');
        $material = Material::all(['id', 'mt_name']);
        $warehouse = agent::where('agtc_id', 4)->orWhere('agtc_id', 1)->get();
        $CoffeeGrade = CoffeeGrade::where('ctr_id', Input::get('country'))->get();

        $greensize    = quality_parameters::where('qg_id', '1')->get();
        $greencolor   = quality_parameters::where('qg_id', '2')->get();
        $greendefects = quality_parameters::where('qg_id', '3')->get();
        $processing   = processing::all(['id', 'prcss_name']);
        $extraProcessing = processing::where('id', '!=', Input::get('process_type'))->get();
        $buyer        = buyer::all(['id', 'cb_name']);
        $sale_status  = sale_status::all(['id', 'sst_name']);
        $basket       = basket::where('ctr_id', Input::get('country'))->get();

        $processing_instruction = processing_instruction::where('prcss_id', $prc)->get();
        if (isset($processing_instruction)) {
            foreach ($processing_instruction->all() as $value) {
                $input_type = $value->prg_input_type;
                $title      = ucwords($value->prg_instruction);
            }
        }

        $screens       = screens::all(['id', 'scr_name']);
        $cupscore      = cupscore::all(['id', 'cp_score', 'cp_quality']);
        $rawscore      = rawscore::all(['id', 'rw_score', 'rw_quality']);
        $Certification = Certification::all(['id', 'crt_name']);
        $certs         = coffee_certification::where('cfd_id', 1)->get();
        $cid           = Input::get('country');
        $slr           = Input::get('seller');
        $sale_cb_id    = Input::get('coffee_buyer');
        $growers = coffeegrower::all(['id', 'cgr_grower', 'cgr_code', 'cgr_mark']);
        $provisionalPurpose = Provisonal_Purpose::all(['id', 'prp_name']);

        $BULKING_PROCESS = 4;
        $INTERNAL_BULK = 1;
        $INTERNAL_BULK_INITIAL = "IB";
        $contractID = null;
        $old_contractID = Input::get('old_contract');
        $COUNTRY_INITIAL = country::where('id', $cid)->first();
        if ($COUNTRY_INITIAL !== NULL) {
            $COUNTRY_INITIAL = substr($COUNTRY_INITIAL->ctr_initial, 0, 1) ;
        }
        $ref_no = strtoupper(Input::get('ref_no'));
        $old_ref_no = strtoupper(Input::get('old_ref_no'));

        $reference_no = null;

        if ($request->has('country')) {
          

           

        }

        if ($ref_no == $old_ref_no && $contractID != $old_contractID && $contractID != $INTERNAL_BULK) {
            $prdetails_new = Process::where('sct_id', $contractID)->first();
            if($prdetails_new != NULL){
                $ref_no = $prdetails_new->pr_instruction_number;
            }
            
            $reference_no = $ref_no;
            $prdetails = Process::where('pr_instruction_number', $ref_no)->first();



            if ($prdetails != null) {

                $prc                = $prdetails->prcss_id;
                $other_instructions = $prdetails->pr_other_instructions;

                $processing_instruction = processing_instruction::where('prcss_id', $prc)->get();
                if (isset($processing_instruction)) {
                    foreach ($processing_instruction->all() as $value) {
                        $input_type = $value->prg_input_type;
                        $title      = ucwords($value->prg_instruction);

                    }
                }

                $prid       = $prdetails->id;
                $pridetails = ProcessInstructions::where('pr_id', $prid)->get();
                $pridetails_one = ProcessInstructions::where('pr_id', $prid)->first();
                $processing_instruction_selected = NULL;
                $instructions_checked = array();

                if ($pridetails_one != NULL) {
                    $processing_instruction_selected = processing_instruction::where('id', $pridetails_one->pri_id)->first();
                    if ($processing_instruction_selected->prgid == 1) {
                        foreach ($pridetails as $key => $value) {
                            $instructions_checked[] = $value->pri_id;
                        }                    
                    } else if ($processing_instruction_selected->prgid == 2) {
                        foreach ($pridetails as $key => $value) {
                            $instructions_selected = $value->pri_id;
                        }                    
                    }

                }

                $date = $prdetails->pr_date;
            }


        }
        
        $Season  = Season::all(['id', 'csn_season']);
        $country = country::all(['id', 'ctr_name', 'ctr_initial']);

        $region = Region::where('ctr_id', Input::get('country'))->get();

        if (Input::get('country') != null) {
            $Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->where('wrt_id', '1')->get();            
            $Mill      = mills_region::where('ctr_id', Input::get('country'))->get();
            $seller    = seller::where('ctr_id', Input::get('country'))->get();
        }
        
        $processing_instruction = processing_instruction::where('prcss_id', $prc)->get();
        if (isset($processing_instruction)) {
            foreach ($processing_instruction->all() as $value) {
                $input_type = $value->prg_input_type;
                $title      = ucwords($value->prg_instruction);
            }
        }
        $user_data = Auth::user();
        $user      = $user_data->id;

        $prc_season = Input::get('processing_season');
        $reference = Input::get('reference');
        $date    = Input::get('date');
        $date    = date_create($date);
        $date    = date_format($date, "Y-m-d");
        $contract = null;
        $prc  = Input::get('process_type');
        $outturn  = Input::get('outturn');

        $tobeprocessed = Input::get('tobeprocessed');
       
        $user_data = Auth::user();
        $user      = $user_data->id;

        if (null !== Input::get('submitinstruction')) {
            DB::beginTransaction();
            $errormessages = [];
            
            // try{
           

                $this->validate($request, [
                    'country' => 'required','grower' => 'required','outturn' => 'required',
                ]); 
                       
                $prc                   = Input::get('process_type');
                $ref_no                = Input::get('outturn');
                $mark                = Input::get('mark');
                $grower                = Input::get('grower');
                $reference_no = $ref_no;
                $other_instructions    = Input::get('other_instructions');
                $instructions_selected = Input::get('instructions_selected');
                $instructions_checked  = Input::get('instructions_checked');
                $material_id  = Input::get('material');
                $weight_in = null;
                $st_bulk_id = null;

                $tobeprocessed = Input::get('tobeprocessed');
                $tobewithdrawn = Input::get('tobewithdrawn');
                $new_row = Input::get('new_row');
                $new_column = Input::get('new_column');
                $new_zone = Input::get('new_zone');
                $warehouse_id = Input::get('warehouse');
                $cweight = Input::get('cweight');

                if ($tobeprocessed != null) {
                    foreach ($tobeprocessed as $key => $value) {
                        $stockitemdetails = StockWarehouse::where('id', '=', $value)->first(); 
                        $cweight_array = Input::get('cweight');
                        $cweight = null;
                        if($cweight_array != null){
                            foreach ($cweight_array as $keyweight => $valueweight) {
                                if ($keyweight == $value) {
                                    $cweight = $valueweight;
                                    $weight_in += $cweight;
                                }                        
                            }                       
                        }
                        $packages    = ceil($cweight / 60);
                        $pall_ratio = 1;
                    }
                    $stock_net = $weight_in;
                    $stock_bags    = floor($stock_net / 60);
                    $stock_pockets = $stock_net % 60;     
                    $batch_packages = ceil($stock_net / 60);   

                    $stock_details = StockWarehouse::where('st_outturn', $ref_no)->where('mt_id', $material_id)->first();
                    // print_r($tobeprocessed);
                    // exit();
                    if ($stock_details == null) {
                        $st_bulk_id = StockWarehouse::insertGetId([ 'cgr_id' => $grower, 'csn_id' => $stockitemdetails->csn_id, 'st_outturn' => $ref_no, 'st_mark' => $mark, 'st_packages'=>$batch_packages, 'st_outturn' => $ref_no,'st_net_weight' => $weight_in, 'st_bags' => $stock_bags, 'st_pockets' => $stock_pockets, 'usr_id' => $user, 'mt_id' => $material_id, 'st_is_bulk' => 1, 'st_owner_id' => 5, 'warehouse_id' => $warehouse_id]);

                    } else {
                        $st_bulk_id = $stock_details->id;
                        StockWarehouse::where('id', '=', $st_bulk_id)
                             ->update([ 'cgr_id' => $grower, 'csn_id' => $stockitemdetails->csn_id, 'st_outturn' => $ref_no, 'st_mark' => $mark, 'st_packages'=>$batch_packages, 'st_outturn' => $ref_no,'st_net_weight' => $weight_in, 'st_bags' => $stock_bags, 'st_pockets' => $stock_pockets, 'usr_id' => $user, 'mt_id' => $material_id, 'st_is_bulk' => 1, 'st_owner_id' => 5, 'warehouse_id' => $warehouse_id]);                 
                    }


                    $btid = Batch::insertGetId (
                        ['st_id' => $st_bulk_id, 'btc_weight' => $weight_in, 'btc_tare' => 0, 'btc_net_weight' => $weight_in, 'btc_packages' => $batch_packages, 'btc_bags' => $stock_bags, 'btc_pockets' => $stock_pockets, 'ws_id' => null]);

                    $stlocid = StockLocation::insertGetId (
                        ['bt_id' => $btid, 'loc_row_id' => $new_row, 'loc_column_id' => $new_column, 'btc_zone' => $new_zone]);

                    foreach ($tobeprocessed as $key => $value) {
                        StockWarehouse::where('id', '=', $value)
                             ->update(['st_bulk_id' => $st_bulk_id, 'st_bulked_by' => $user, 'st_ended_by' => $user]);
                    }
                    
                }



                $prdetails = ProvisionalBulk::where('pbk_instruction_number', $ref_no)->first();
                if ($prdetails != null) {
                    $prid = $prdetails->id;
                    ProvisionalBulk::where('id', '=', $prid)
                        ->update(['prcss_id' => $prc, 'ctr_id' => $cid, 'pbk_instruction_number' => $ref_no, 'pbk_weight_in' => $weight_in, 'pbk_reference_name' => $ref_no, ]);
                    Activity::log('Updated Provisional Bulk information with prid ' . $prid . ' prc ' . $prc . ' ref_no ' . $ref_no . ' weight_in ' . $weight_in );
                } else {
                    $prid = ProvisionalBulk::insertGetId(['prcss_id' => $prc, 'pbk_instruction_number' => $ref_no, 'pbk_weight_in' => $weight_in,  'ctr_id' => 1, 'pbk_reference_name' => $ref_no, 'pbk_date' => $date, 'prp_id' => 1]);
                    Activity::log('Inserted Provisional Bulk information with prid ' . $prid . ' prc ' . $prc . ' ref_no ' . $ref_no . ' weight_in ' . $weight_in );
                }
                if ($tobeprocessed != null) {
                    foreach ($tobeprocessed as $key => $value) {
                        $cweight_array = Input::get('cweight');
                        $cweight = null;
                        if($cweight_array != null){
                            foreach ($cweight_array as $keyweight => $valueweight) {
                                if ($keyweight == $value) {
                                    $cweight = $valueweight;
                                  
                                }                        
                            }                       
                        }
                        $packages    = ceil($cweight / 60);


                       
                        $processAllocationDetails = ProvisionalAllocation::where('st_mill_id', $value)->where('pbk_id', $prid)->first();

                        if ($cweight != null) {
                            if ($processAllocationDetails != null) {

                                $processAllocationID = $processAllocationDetails->id;
                                ProvisionalAllocation::where('id', '=', $processAllocationID)
                                    ->update([ 'pbk_id' => $prid, 'st_id' => $value, 'prall_allocated_weight' => $cweight, 'prall_packages' => $packages ]);

                                
                                Activity::log('Updated Provisional Bulk allocation information with id ' . $processAllocationID . 'prall_allocated_weight' . $cweight .'prall_packages' .'prall_processed_weight' .$packages);

                            } else {

                                $processAllocationID = ProvisionalAllocation::insertGetId(['pbk_id' => $prid, 'st_id' => $value, 'prall_allocated_weight' => $cweight, 'prall_packages' => $packages]);
                                
                                Activity::log('Added Provisional Bulk allocation information with id ' . $processAllocationID . 'prall_allocated_weight' . $cweight .'prall_packages' .'prall_processed_weight' .$packages );                                
                            }
                            
                        }
                    }
                }
              

                if ($tobewithdrawn != null) {
                    foreach ($tobewithdrawn as $key => $value) {
                        $stockViewALLCount = StockViewALL::where('id', $value)->whereNotNull('process_number')->get();
                        $countProcess = 0;
                        foreach ($stockViewALLCount as $keycount => $valuecount) {
                            $countProcess += 1;
                        }

                        if ($countProcess < 2) {
                            StockMill::where('id', '=', $value)
                                  ->update(['st_ended_by' => null, 'pr_id' => null]);
                        }

                        $processAllocation = ProcessAllocation::where('st_id',$value)->where('pr_id', $prid);    
                        $processAllocation->delete(); 
                    }
              
                }
               
                $request->session()->flash('alert-success', 'Outturn added successfully!!');
                DB::commit();  
            // }catch (\PDOException $e) {
                
            //     DB::rollback();
            //     $request->session()->flash('alert-warning', 'An error occurred while attempting to add outturn!!');
            //     $errormessages[] = $e->getMessage();
                
            //  }//end catch

            $StockView = StockViewALL::get();
            
            return View::make('cleanbulking', compact('id',
                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'ref_no', 'prc', 'processing_instruction', 'input_type', 'title', 'certs', 'StockStatus', 'other_instructions', 'instructions_checked', 'instructions_selected','prc_season', 'reference', 'contract', 'contractID', 'StockView','prdetails', 'prc_season', 'extraProcessing', 'selectedContract', 'reference_no', 'selected_date', 'active_season', 'growers', 'provisionalPurpose', 'material', 'warehouse'));

        } else if (null !== Input::get('filter')) {

            $ref_no    = Input::get('ref_no');
            $prdetails = Process::where('pr_instruction_number', $ref_no)->first();

            if ($prdetails != null) {

                if ($prdetails->pr_confirmed_by != null) {
                    $request->session()->flash('alert-warning', 'Process already confirmed!!');
                    return View::make('cleanbulking', compact('id',
                        'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'ref_no', 'prc', 'processing_instruction', 'input_type', 'title', 'certs', 'StockStatus', 'other_instructions', 'instructions_checked', 'instructions_selected','prc_season', 'reference', 'contract', 'contractID', 'StockView','prdetails', 'prc_season', 'extraProcessing', 'selectedContract', 'reference_no', 'selected_date', 'active_season', 'growers', 'provisionalPurpose', 'material'));                  
                }
            }


            
            $sst        = Input::get('st_status');
            $csn_season = Input::get('season');
            $saleid     = Input::get('sale');
            $grade      = Input::get('coffee_grade');
            $bskt       = Input::get('basket');
            $crtid      = Input::get('certification');
            $prcf       = Input::get('process_type_filter');

            $csn_season = Season::where('id', $csn_season)->first();
            $saleid     = Sale::where('id', $saleid)->first();

            $stockview = StockViewALL::select('*')->whereNull('bulked_by');

            
            return View::make('cleanbulking', compact('id',
                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'ref_no', 'prc', 'processing_instruction', 'input_type', 'title', 'certs', 'StockStatus', 'other_instructions', 'instructions_checked', 'instructions_selected', 'StockView', 'sst', 'saleid', 'grade', 'bskt', 'crtid', 'prcf', 'prid','prc_season', 'reference', 'contract', 'contractID','prdetails', 'prc_season', 'extraProcessing', 'selectedContract', 'reference_no', 'selected_date', 'active_season', 'growers', 'provisionalPurpose', 'material'));
        } else {
            $cid = Input::get('country');
            $csn_season = Input::get('sale_season');
            // $stockview = StockViewALL::select('*')->whereNull('bulked_by');
            $StockView = StockViewWarehouse::select('*')->where('process_number', $outturn)->get();
            $stockViewDetails = StockViewWarehouse::select('*')->where('process_number', $outturn)->first();
            return View::make('cleanbulking', compact('id',
                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'ref_no', 'prc', 'processing_instruction', 'input_type', 'title', 'certs', 'StockStatus', 'other_instructions', 'instructions_checked', 'instructions_selected', 'StockView', 'prid','prc_season', 'reference', 'contract', 'contractID','prdetails', 'prc_season', 'extraProcessing', 'selectedContract', 'reference_no', 'selected_date', 'active_season', 'growers', 'provisionalPurpose', 'material', 'warehouse', 'outturn', 'stockViewDetails'));
        }

    }

    public function getstockview($countryID, $ref_no)
    {
        if ($countryID != null) {
            if($ref_no != null){
                $stockview = StockViewWarehouse::select('*')->where('process_number', $ref_no)->orWhereNull('process_number')->whereNull('bulked_by')->orderByRaw(DB::raw("FIELD(process_number, '$ref_no') DESC"));

            } else {
                $stockview = StockViewWarehouse::select('*')->whereNull('bulked_by');
            }

        } else {
            $stockview = null;
        }   

        return Datatables::of($stockview)
            ->make(true);
    }

    public function cleanBulkingResultsApi(Request $request){
        DB::connection()->enableQueryLog();
        $errormessages = [];
        
        try{
            DB::beginTransaction();
            $formdata = (object)$request->data;
            
            $user_data = Auth::user();
            $user = $user_data->id;

            $prc                   = 1;
            $ref_no                = $formdata->ref_no;
            $season                = $formdata->outt_season;
            $grower                =$formdata->grower;
            $cid                =$formdata->country;
            $material_id                =$formdata->material;
            $weight_in                =$formdata->weight;
            // $date                = date('Y-m-d', strtotime($formdata->date));

            $stock_bags    = $formdata->bags;
            $stock_pockets = $formdata->pockets;

            $batch_packages = $stock_bags;   
            if ($stock_pockets != 0 && $stock_pockets != null) {
                $batch_packages = $batch_packages + 1;
            }
            
            $new_row = $formdata->new_row;
            $new_column = $formdata->new_column;
            $new_zone = $formdata->new_zone;
            $warehouse_id = $formdata->warehouse;

            $provisionalbulk = ProvisionalBulk::where('id', $ref_no)->first();
            $outturn = $provisionalbulk->pbk_instruction_number;
            
            $growerDetails = coffeegrower::where('id', $grower)->first();
            $mark = $growerDetails->cgr_mark;

            $stock_details = StockWarehouse::where('st_outturn', $outturn)->where('mt_id', $material_id)->first();
            if ($stock_details != null) {
                $st_bulk_id = $stock_details->id;
                StockWarehouse::where('id', '=', $st_bulk_id)
                         ->update([ 'st_net_weight' => $weight_in,'st_packages' => $batch_packages, 'st_bags' => $stock_bags, 'st_pockets' => $stock_pockets, 'usr_id' => $user, 'mt_id' => $material_id, 'warehouse_id' => $warehouse_id, 'cgr_id' => $grower, 'st_mark' => $mark]);  
                Batch::where('st_id', '=', $st_bulk_id)
                         ->update([ 'btc_net_weight' => $weight_in, 'btc_packages' => $batch_packages, 'btc_bags' => $stock_bags, 'btc_pockets' => $stock_pockets]);  
                $batch_details = Batch::where('st_id', $st_bulk_id)->first(); 
                $batch_id = $batch_details->id;

                StockLocation::where('bt_id', '=', $batch_id)
                         ->update([ 'loc_row_id' => $new_row, 'loc_column_id' => $new_column, 'btc_zone' => $new_zone]);  
            }    
                
            
            $queries = DB::getQueryLog();
            if(!empty($errormessages)){
                return response()->json([
                    'exists' => false,
                    'inserted' => false,
                    'updated' => false,
                    'error' => true,
                    'errormsgs' => $errormessages
                ]); 
            }else{ 
            DB::commit();
            return response()->json([
                    'exists' => false,
                    'inserted' => true,
                    'updated' => false,
                    'error' => false,
                    'errormsg' => '',
                    'errormsgs' => $errormessages
                ]);
            }
            
        }catch (\Exception $e) {
            
            DB::rollback();
            $errormessages[] = $e->getMessage();
            return response()->json([
                'exists' => false,
                'inserted' => false,
                'updated' => false,
                'error' => true,
                'errormsgs' => $errormessages
            ]); 
        }
    }



    public function bulkingApi(Request $request){
        DB::connection()->enableQueryLog();
        $errormessages = [];
        
		try{
            DB::beginTransaction();
            $formdata = (object)$request->data;
            
            $user_data = Auth::user();
            $user = $user_data->id;

            $prc                   = 1;
            $ref_no                = $formdata->outturn;
            $mark                = $formdata->mark;
            $season                = $formdata->outt_season;
            $grower                =$formdata->grower;
            $cid                =$formdata->country;
            $material_id                =$formdata->material;
            $date                = date('Y-m-d', strtotime($formdata->date));
            
            $new_row = $formdata->new_row;
            $new_column = $formdata->new_column;
            $new_zone = $formdata->new_zone;
            $warehouse_id = $formdata->warehouse;

            $reference_no = $ref_no;
            
            $weight_in             = null;

            $tobeprocessed = $request->lotsinbulk;
            
            
            $weight_in = null;
            $st_bulk_id = null;

            $tobeprocessed = $request->lotsinbulk;;
            //$tobewithdrawn = Input::get('tobewithdrawn');
      
            if ($tobeprocessed != null) {
                foreach ($tobeprocessed as $key => $value) {
                    $value = (object)$value;
                    $stockitemdetails = StockWarehouse::where('id', '=', $value->id)->first(); 
                   
                    $cweight = $value->weight;
                    
                                $weight_in += $cweight;
                                          
                    
                    $packages    = ceil($cweight / 60);
                    $pall_ratio = 1;
                }
                $stock_net = $weight_in;
                $stock_bags    = floor($stock_net / 60);
                $stock_pockets = $stock_net % 60;     
                $batch_packages = ceil($stock_net / 60);   

                $stock_details = StockWarehouse::where('st_outturn', $ref_no)->where('mt_id', $material_id)->first();
               
                // exit();
                if ($stock_details == null) {
                    $st_bulk_id = StockWarehouse::insertGetId([ 'cgr_id' => $grower, 'csn_id' => $stockitemdetails->csn_id, 'st_outturn' => $ref_no, 'st_mark' => $mark, 'st_packages'=>$batch_packages, 'st_outturn' => $ref_no,'st_net_weight' => $weight_in, 'st_bags' => $stock_bags, 'st_pockets' => $stock_pockets, 'usr_id' => $user, 'mt_id' => $material_id, 'st_is_bulk' => 1, 'st_owner_id' => 5, 'warehouse_id' => $warehouse_id]);

                } else {
                    $st_bulk_id = $stock_details->id;
                    StockWarehouse::where('id', '=', $st_bulk_id)
                         ->update([ 'cgr_id' => $grower, 'csn_id' => $stockitemdetails->csn_id, 'st_outturn' => $ref_no, 'st_mark' => $mark, 'st_packages'=>$batch_packages, 'st_outturn' => $ref_no,'st_net_weight' => $weight_in, 'st_bags' => $stock_bags, 'st_pockets' => $stock_pockets, 'usr_id' => $user, 'mt_id' => $material_id, 'st_is_bulk' => 1, 'st_owner_id' => 5, 'warehouse_id' => $warehouse_id]);                 
                }
        

                $btid = Batch::insertGetId (
                    ['st_id' => $st_bulk_id, 'btc_weight' => $weight_in, 'btc_tare' => 0, 'btc_net_weight' => $weight_in, 'btc_packages' => $batch_packages, 'btc_bags' => $stock_bags, 'btc_pockets' => $stock_pockets, 'ws_id' => null]);

                $stlocid = StockLocation::insertGetId (
                    ['bt_id' => $btid, 'loc_row_id' => $new_row, 'loc_column_id' => $new_column, 'btc_zone' => $new_zone]);

                foreach ($tobeprocessed as $key => $value) {
                    $value = (object)$value;
                    StockWarehouse::where('id', '=', $value->id)
                         ->update(['st_bulk_id' => $st_bulk_id, 'st_bulked_by' => $user, 'st_ended_by' => $user]);
                }
                
            }
          


            $prdetails = ProvisionalBulk::where('pbk_instruction_number', $ref_no)->first();
            if ($prdetails != null) {
                $prid = $prdetails->id;
                ProvisionalBulk::where('id', '=', $prid)
                    ->update(['prcss_id' => $prc, 'ctr_id' => $cid, 'pbk_instruction_number' => $ref_no, 'pbk_weight_in' => $weight_in, 'pbk_reference_name' => $ref_no, ]);
                Activity::log('Updated Provisional Bulk information with prid ' . $prid . ' prc ' . $prc . ' ref_no ' . $ref_no . ' weight_in ' . $weight_in );
            } else {
                $prid = ProvisionalBulk::insertGetId(['prcss_id' => $prc, 'pbk_instruction_number' => $ref_no, 'pbk_weight_in' => $weight_in,  'ctr_id' => 1, 'pbk_reference_name' => $ref_no, 'pbk_date' => $date, 'prp_id' => 1]);
                Activity::log('Inserted Provisional Bulk information with prid ' . $prid . ' prc ' . $prc . ' ref_no ' . $ref_no . ' weight_in ' . $weight_in );
            }
            if ($tobeprocessed != null) {
               
                foreach ($tobeprocessed as $key => $value) {
                    $value= (object)$value;
                    $cweight = $value->weight;
                    
                    $packages    = ceil($cweight / 60);


                   
                    $processAllocationDetails = ProvisionalAllocation::where('st_wr_id', $value->id)->where('pbk_id', $prid)->first();

                    if ($cweight != null) {
                        if ($processAllocationDetails != null) {

                            $processAllocationID = $processAllocationDetails->id;
                            ProvisionalAllocation::where('id', '=', $processAllocationID)
                                ->update([ 'pbk_id' => $prid, 'st_wr_id' =>$value->id, 'prall_allocated_weight' => $cweight, 'prall_packages' => $packages ]);

                            
                            Activity::log('Updated Provisional Bulk allocation information with id ' . $processAllocationID . 'prall_allocated_weight' . $cweight .'prall_packages' .'prall_processed_weight' .$packages);

                        } else {

                            $processAllocationID = ProvisionalAllocation::insertGetId(['pbk_id' => $prid, 'st_wr_id' => $value->id, 'prall_allocated_weight' => $cweight, 'prall_packages' => $packages]);
                            
                            Activity::log('Added Provisional Bulk allocation information with id ' . $processAllocationID . 'prall_allocated_weight' . $cweight .'prall_packages' .'prall_processed_weight' .$packages );                                
                        }
                        
                    }
                }
            }
          
            $tobewithdrawn = null;
            if ($tobewithdrawn != null) {
                foreach ($tobewithdrawn as $key => $value) {
                    $stockViewALLCount = StockViewALL::where('id', $value)->whereNotNull('process_number')->get();
                    $countProcess = 0;
                    foreach ($stockViewALLCount as $keycount => $valuecount) {
                        $countProcess += 1;
                    }

                    if ($countProcess < 2) {
                        StockMill::where('id', '=', $value)
                              ->update(['st_ended_by' => null, 'pr_id' => null]);
                    }

                    $processAllocation = ProcessAllocation::where('st_id',$value)->where('pr_id', $prid);    
                    $processAllocation->delete(); 
                }
          
            }
           
            
            $queries = DB::getQueryLog();
            if(!empty($errormessages)){
                return response()->json([
                    'exists' => false,
                    'inserted' => false,
                    'updated' => false,
                    'error' => true,
                    'errormsgs' => $errormessages
                ]);	
            }else{ 
            DB::commit();
			return response()->json([
					'exists' => false,
					'inserted' => true,
					'updated' => false,
					'error' => false,
					'errormsg' => '',
					'errormsgs' => $errormessages
				]);
			}
			
		}catch (\Exception $e) {
			
            DB::rollback();
			$errormessages[] = $e->getMessage();
			return response()->json([
				'exists' => false,
				'inserted' => false,
				'updated' => false,
				'error' => true,
				'errormsgs' => $errormessages
			]);	
		}
    }

    public function cleanResultsForm(Request $request)
    {
      
        $id            = null;
        $Season        = Season::all(['id', 'csn_season']);
        $country       = country::all(['id', 'ctr_name', 'ctr_initial']);
        $CoffeeGrade   = CoffeeGrade::all(['id', 'cgrad_name']);
        $Certification = Certification::all(['id', 'crt_name']);
        $buyer         = buyer::all(['id', 'cb_name']);
        $processing    = processing::all(['id', 'prcss_name']);
        $growers = coffeegrower::all(['id', 'cgr_grower', 'cgr_code', 'cgr_mark']);

        $bulkinstructions = StockWarehouse::whereNotNull('st_is_bulk')->get();
        
        $sale_status = sale_status::all(['id', 'sst_name']);
        $warehouse = agent::where('agtc_id', 4)->orWhere('agtc_id', 1)->get();
        $material = Material::all(['id', 'mt_name']);

        $Mill        = null;

        $cid        = null;
        $csn_season = null;
        $sale_cb_id = null;
        $release_no = null;
        $date       = null;
        $release_no = null;
        $st_id_selected = null;
        $provisionalbulk = ProvisionalBulk::all(['id', 'pbk_instruction_number']);

        
        return View::make('cleanresults', compact('id',
            'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'ref_no', 'rates', 'teams', 'st_id_selected', 'stock_details', 'provisionalbulk', 'material', 'growers'));

    }

    public function cleanResults(Request $request)
    {
      
        $id            = null;
        $Season        = Season::all(['id', 'csn_season']);
        $country       = country::all(['id', 'ctr_name', 'ctr_initial']);
        $CoffeeGrade   = CoffeeGrade::all(['id', 'cgrad_name']);
        $Certification = Certification::all(['id', 'crt_name']);
        $buyer         = buyer::all(['id', 'cb_name']);
        $processing    = processing::all(['id', 'prcss_name']);

        $sale_status = sale_status::all(['id', 'sst_name']);
        $Warehouse   = null;
        $Mill        = null;

        $cid        = null;
        $csn_season = null;
        $sale_cb_id = null;
        $release_no = null;
        $date       = null;
        $release_no = null;
        $st_id_selected = null;
        
        //$stock_details = StockWarehouse::whereNotNull('st_is_bulk')->get();

        return View::make('cleanresults', compact('id',
            'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'ref_no', 'rates', 'teams', 'st_id_selected', 'stock_details'));

    }

    public function getInstructed($process){
        try {

            if ($process !== NULL) {

                $stockview = DB::table('provisional_allocation_prall as prall')
                ->leftJoin('stock_warehouse_st as st', 'st.id', '=', DB::raw("ifnull(prall.st_wr_id,st_id)") )
                ->leftJoin('material_mt as mt', 'st.mt_id', '=', 'mt.id')
                ->where('pbk_id', '=', $process)
                ->get();

            }

            return response()->json(
                $stockview
            );                    
        
        }catch (\PDOException $e) {
            return response()->json([
                'exists' => false,
                'inserted' => false,
                'error' => $e->getMessage()
            ]);
        }
        

    }
    public function getResults($process){
        try {

            if ($process !== NULL) {

                $stockview = DB::table('provisional_bulk_pbk as pbrts')
                ->select('*', db::raw('loc_row.loc_row as row'), db::raw('loc_col.loc_column as col'))
                ->leftJoin('stock_warehouse_st as st', 'pbrts.pbk_instruction_number', '=', 'st.st_outturn')
                ->leftJoin('material_mt as mt', 'st.mt_id', '=', 'mt.id')
                ->leftJoin('batch_btc as btc', 'btc.st_id', '=', 'st.id')
                ->leftJoin('stock_location_sloc as sloc', 'sloc.bt_id', '=', 'btc.id')
                ->leftJoin('location_loc as loc_row', 'loc_row.id', '=', 'sloc.loc_row_id')
                ->leftJoin('location_loc as loc_col', 'loc_col.id', '=', 'sloc.loc_column_id')
                ->leftJoin('agent_agt as agt', 'agt.id', '=', 'loc_row.agt_id')
                ->where('pbrts.id', '=', $process)
                ->groupBy('st.id')
                ->get();


            }

            return response()->json($stockview);                    
        
        }catch (\PDOException $e) {
            return response()->json([
                'exists' => false,
                'inserted' => false,
                'error' => $e->getMessage()
            ]);
        }
        

    }
    public function bulkingResultApi(Request $request){
        DB::connection()->enableQueryLog();
        $errormessages = [];
        
		try{
            DB::beginTransaction();
            $formdata = (object)$request->data;
            
            $user_data = Auth::user();
            $user = $user_data->id;

            $prc                   = 1;
            $ref_no                = $formdata->ref_no;
           
            $season                = $formdata->outt_season;
            $grower                =$formdata->grower;
            $cid                =$formdata->country;
            $material_id                =$formdata->material;
           
            
            $new_row = $formdata->new_row;
            $new_column = $formdata->new_column;
            $new_zone = $formdata->new_zone;
            $warehouse_id = $formdata->warehouse;

            $reference_no = $ref_no;
            
            $weight_in             = $formdata->weight;;

      
            
            $st_bulk_id = null;

            $prdetails = ProvisionalBulk::where('id', $ref_no)->first();

            $grower_details = coffeegrower::where('id', $grower)->first();
            $mark = $grower_details->cgr_mark;
            
            if ($prdetails != null) {
                
                $outturn = $prdetails->pbk_instruction_number;

                $stock_net = $weight_in;
                $stock_bags    = floor($stock_net / 60);
                $stock_pockets = $stock_net % 60;     
                $batch_packages = ceil($stock_net / 60);   

                $stock_details = StockWarehouse::where('st_outturn', $outturn)->where('mt_id', $material_id)->first();
                
                // exit();
                if ($stock_details == null) {
                    $st_bulk_id = StockWarehouse::insertGetId([ 'cgr_id' => $grower, 'csn_id' => $season, 'st_outturn' => $outturn, 'st_mark' => $mark, 'st_packages'=>$batch_packages, 'st_net_weight' => $weight_in, 'st_bags' => $stock_bags, 'st_pockets' => $stock_pockets, 'usr_id' => $user, 'mt_id' => $material_id, 'st_is_bulk' => 1, 'st_owner_id' => 5, 'warehouse_id' => $warehouse_id]);

                } else {
                    $st_bulk_id = $stock_details->id;
                    StockWarehouse::where('id', '=', $st_bulk_id)
                         ->update([ 'cgr_id' => $grower, 'csn_id' => $season, 'st_outturn' => $outturn, 'st_mark' => $mark, 'st_packages'=>$batch_packages, 'st_net_weight' => $weight_in, 'st_bags' => $stock_bags, 'st_pockets' => $stock_pockets, 'usr_id' => $user, 'mt_id' => $material_id, 'st_is_bulk' => 1, 'st_owner_id' => 5, 'warehouse_id' => $warehouse_id]);                 
                }

                $results_details = ProvisionalResults::where('pr_id', $ref_no)->first();
                
                // exit();
                if ($results_details == null) {
                    $result_id = ProvisionalResults::insertGetId([ 'pr_id' => $ref_no, 'st_wr_id' => $st_bulk_id, 'prts_weight' => $weight_in, 'prts_packages' => $batch_packages]);

                } else {
                    $result_id = $results_details->id;
                    ProvisionalResults::where('id', '=', $st_bulk_id)
                         ->update([ 'pr_id' => $ref_no, 'st_wr_id' => $st_bulk_id, 'prts_weight' => $weight_in, 'prts_packages' => $batch_packages]);                 
                }
               
                
                $btid = Batch::insertGetId (
                    ['st_id' => $st_bulk_id, 'btc_weight' => $weight_in, 'btc_tare' => 0, 'btc_net_weight' => $weight_in, 'btc_packages' => $batch_packages, 'btc_bags' => $stock_bags, 'btc_pockets' => $stock_pockets, 'ws_id' => null]);

                $stlocid = StockLocation::insertGetId (
                    ['bt_id' => $btid, 'loc_row_id' => $new_row, 'loc_column_id' => $new_column, 'btc_zone' => $new_zone]);

                $prid = $prdetails->id;
                ProvisionalBulk::where('id', '=', $prid)
                    ->update(['pbk_confirmed_by' => $user ]);
                Activity::log('Updated Provisional Bulk information with prid ' . $prid . ' prc ' . $prc . ' ref_no ' . $ref_no . ' weight_in ' . $weight_in );
                
            }else{
                return response()->json([
                    'exists' => false,
                    'inserted' => false,
                    'updated' => false,
                    'error' => true,
                    'errormsgs' => "Instruction not found"
                ]);	
            }
          
            
            $queries = DB::getQueryLog();
            if(!empty($errormessages)){
                return response()->json([
                    'exists' => false,
                    'inserted' => false,
                    'updated' => false,
                    'error' => true,
                    'errormsgs' => $errormessages
                ]);	
            }else{ 
           DB::commit();
			return response()->json([
					'exists' => false,
					'inserted' => true,
					'updated' => false,
					'error' => false,
					'errormsg' => '',
					'errormsgs' => $errormessages
				]);
			}
			
		}catch (\Exception $e) {
			
            DB::rollback();
			$errormessages[] = $e->getMessage();
			return response()->json([
				'exists' => false,
				'inserted' => false,
				'updated' => false,
				'error' => true,
				'errormsgs' => $errormessages
			]);	
		}
    }

}

