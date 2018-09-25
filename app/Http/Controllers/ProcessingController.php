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
use Ngea\warehouses_region;
use Yajra\Datatables\Datatables;

use Ngea\StockProcessedView;

use Ngea\ProcessAllocation;

// use PDF;
use niklasravnsborg\LaravelPdf\Facades\Pdf as PDF;
use View;

use Ngea\processrates;
use Ngea\processcharges;
use Ngea\teams;


class ProcessingController extends Controller
{

    public function processingInstructionsForm(Request $request)
    {
        $id            = null;
        $Season        = Season::all(['id', 'csn_season']);
        $country       = country::all(['id', 'ctr_name', 'ctr_initial']);
        $CoffeeGrade   = CoffeeGrade::all(['id', 'cgrad_name']);
        $Certification = Certification::all(['id', 'crt_name']);
        $buyer         = buyer::all(['id', 'cb_name']);
        $processing    = processing::all(['id', 'prcss_name']);
        $StockStatus   = StockStatus::all(['id', 'sts_name']);

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
        $INTERNAL_BULK_INITIAL = "IB";
        $contractID = Input::get('contract');

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
        $prc_old = $this->getProcessingType($ref_no);
        
        
        $reference_no = $this->generateReferenceNumber($prc, $contractID, $BULKING_PROCESS, $COUNTRY_INITIAL, $INTERNAL_BULK, $INTERNAL_BULK_INITIAL);
        if ($ref_no  != null) {
            $reference_no = $this->generateReferenceNumber($prc, $contractID, $BULKING_PROCESS, $COUNTRY_INITIAL, $INTERNAL_BULK, $INTERNAL_BULK_INITIAL);
            
            $reference_no = strtoupper(Input::get('ref_no'));

        }


        return View::make('processinginstructions', compact('id',
            'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'ref_no', 'certs', 'StockStatus'));

    }

    public function processingtestsForm(Request $request)
    {
        $id            = null;
        $Season        = Season::all(['id', 'csn_season']);
        $country       = country::all(['id', 'ctr_name', 'ctr_initial']);
        $CoffeeGrade   = CoffeeGrade::all(['id', 'cgrad_name']);
        $Certification = Certification::all(['id', 'crt_name']);
        $buyer         = buyer::all(['id', 'cb_name']);
        $processing    = processing::all(['id', 'prcss_name']);
        $StockStatus   = StockStatus::all(['id', 'sts_name']);

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

        $BULKING_PROCESS = 4;
        $INTERNAL_BULK = 1;
        $INTERNAL_BULK_INITIAL = "IB";
        $contractID = Input::get('contract');

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
        $prc_old = $this->getProcessingType($ref_no);
        
        
        $reference_no = $this->generateReferenceNumber($prc, $contractID, $BULKING_PROCESS, $COUNTRY_INITIAL, $INTERNAL_BULK, $INTERNAL_BULK_INITIAL);
        if ($ref_no  != null) {
            $reference_no = $this->generateReferenceNumber($prc, $contractID, $BULKING_PROCESS, $COUNTRY_INITIAL, $INTERNAL_BULK, $INTERNAL_BULK_INITIAL);
            
            $reference_no = strtoupper(Input::get('ref_no'));

        }


        return View::make('processinginstructions', compact('id',
            'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'ref_no', 'prc', 'processing_instruction', 'input_type', 'title', 'certs', 'StockStatus', 'other_instructions', 'instructions_checked', 'instructions_selected','prc_season', 'reference', 'contract', 'contractID', 'StockView','prdetails', 'prc_season', 'extraProcessing', 'selectedContract', 'reference_no', 'selected_date'));

    }


    public function processingInstructions(Request $request)
    {
        $id = null;

        $Warehouse = null;
        $Mill      = null;

        $ref_no = null;
        $prc    = Input::get('process_type');
        $cid    = Input::get('country');

        $StockStatus = StockStatus::all(['id', 'sts_name']);
        $csn_season  = Input::get('sale_season');
        $prc_season = Input::get('processing_season');
        $reference = Input::get('reference');

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
        
        $BULKING_PROCESS = 4;
        $INTERNAL_BULK = 1;
        $INTERNAL_BULK_INITIAL = "IB";
        $contractID = Input::get('contract');
        $old_contractID = Input::get('old_contract');
        $COUNTRY_INITIAL = country::where('id', $cid)->first();
        if ($COUNTRY_INITIAL !== NULL) {
            $COUNTRY_INITIAL = substr($COUNTRY_INITIAL->ctr_initial, 0, 1) ;
        }
        $ref_no = strtoupper(Input::get('ref_no'));
        $old_ref_no = strtoupper(Input::get('old_ref_no'));

        $reference_no = null;

        if ($request->has('country')) {
            $prc_old = $this->getProcessingType($ref_no);
            if ($prc_old != $prc) {
                $reference_no = $this->generateReferenceNumber($prc, $contractID, $BULKING_PROCESS, $COUNTRY_INITIAL, $INTERNAL_BULK, $INTERNAL_BULK_INITIAL);
            }


            if ($ref_no  != null) {
                if ($prc_old != $prc) {
                    if (null !== Input::get('searchInstruction') || null !== Input::get('submitinstruction') || null !== Input::get('filter')){
                        $reference_no = strtoupper(Input::get('ref_no'));

                    } else{
                        $reference_no = $this->generateReferenceNumber($prc, $contractID, $BULKING_PROCESS, $COUNTRY_INITIAL, $INTERNAL_BULK, $INTERNAL_BULK_INITIAL);

                    }

                } else {
                    $reference_no = strtoupper(Input::get('ref_no'));
                }

            }

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
        
        $sale = Sale::where('csn_id', Input::get('season'))->orderBy('sl_no', 'ASC')->get();

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
        $contract = SalesContract::where('ctr_id', '=', $cid)->orderBy('id')->get();
        $prc                   = Input::get('process_type');

        $selectedContract = SalesContract::where('id', '=', $contractID)->first();



        $tobeprocessed = Input::get('tobeprocessed');

        if (null !== Input::get('confirminstruction')) {
            $prc                   = Input::get('process_type');
            $ref_no                = strtoupper(Input::get('ref_no'));
            $reference_no = $ref_no;
            $other_instructions    = Input::get('other_instructions');
            $instructions_selected = Input::get('instructions_selected');
            $instructions_checked  = Input::get('instructions_checked');
            $weight_in             = null;

            $prdetails = Process::where('pr_instruction_number', $ref_no)->first();

            if ($prdetails != null) {

                $prid = $prdetails->id;

                Process::where('id', '=', $prid)
                    ->update(['pr_okay_to_process' => 1]);

                $request->session()->flash('alert-success', 'Process Information Updated!!');

                Activity::log('Updated Process information with prid ' . $prid . ' pr_okay_to_process 1 user ' . $user );

                $stock_with_additional_process = StockViewALL::where('pending_process_id', $prid)->get();

                foreach ($stock_with_additional_process as $key_additional => $value_additional) {

                    Process::where('id', '=', $value_additional->prcssid)
                    ->update(['pr_okay_to_process' => 1]);
                    
                }
            }


            $StockView = StockViewALL::get();
            
            return View::make('processinginstructions', compact('id',
                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'ref_no', 'prc', 'processing_instruction', 'input_type', 'title', 'certs', 'StockStatus', 'other_instructions', 'instructions_checked', 'instructions_selected','prc_season', 'reference', 'contract', 'contractID', 'StockView','prdetails', 'prc_season', 'extraProcessing', 'selectedContract', 'reference_no', 'selected_date'));

        } else if (null !== Input::get('submitinstruction') && Input::get('ref_no') == $old_ref_no ) {
            $this->validate($request, [
                'country' => 'required',
            ]);            
            $prc                   = Input::get('process_type');
            $ref_no                = strtoupper(Input::get('ref_no'));
            $reference_no = $ref_no;
            $other_instructions    = Input::get('other_instructions');
            $instructions_selected = Input::get('instructions_selected');
            $instructions_checked  = Input::get('instructions_checked');
            $weight_in             = null;

            $tobeprocessed = Input::get('tobeprocessed');
            $tobewithdrawn = Input::get('tobewithdrawn');

            $this->checkIFBulkWithNoContract($prc, $contractID, $BULKING_PROCESS);
            
            $additionalProcessing = Input::get('additionalProcessing');
            if ($additionalProcessing != NULL) {
                ksort($additionalProcessing);
            }


            $cweight = Input::get('cweight');

            if ($tobeprocessed != null) {
                foreach ($tobeprocessed as $key => $value) {
                    
                    foreach ($cweight as $keyweight => $valueweight) {
                        if ($keyweight == $value) {
                            $weight_in += $valueweight;
                        }
                        
                    }

                }
            }           


            $prdetails = Process::where('pr_instruction_number', $ref_no)->first();

            if ($prdetails != null) {

                if ($prdetails->pr_confirmed_by != null) {
                    $request->session()->flash('alert-warning', 'Process already confirmed!!');
                    return View::make('processinginstructions', compact('id',
                        'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'ref_no', 'prc', 'processing_instruction', 'input_type', 'title', 'certs', 'StockStatus', 'other_instructions', 'instructions_checked', 'instructions_selected','prc_season', 'reference', 'contract', 'contractID', 'StockView','prdetails', 'prc_season', 'extraProcessing', 'selectedContract', 'reference_no', 'selected_date'));                  
                }
            }


            if ($prdetails != null) {
                $prid = $prdetails->id;
                Process::where('id', '=', $prid)
                    ->update(['prcss_id' => $prc, 'ctr_id' => $cid, 'pr_instruction_number' => $ref_no, 'pr_weight_in' => $weight_in, 'pr_other_instructions' => $other_instructions, 'csn_id' => $prc_season , 'sct_id' => $contractID, 'pr_reference_name' => $reference, 'pr_date' => $date]);
                $request->session()->flash('alert-success', 'Stock Information Updated!!');
                Activity::log('Updated Process information with prid ' . $prid . ' prc ' . $prc . ' ref_no ' . $ref_no . ' weight_in ' . $weight_in . ' other_instructions ' . $other_instructions. ' user ' . $user);
            } else {
                $prid = Process::insertGetId(['prcss_id' => $prc, 'pr_instruction_number' => $ref_no, 'pr_weight_in' => $weight_in, 'pr_other_instructions' => $other_instructions, 'ctr_id' => $cid, 'csn_id' => $prc_season , 'sct_id' => $contractID, 'pr_reference_name' => $reference, 'pr_date' => $date]);
                $request->session()->flash('alert-success', 'Process Information Updated!!');
                Activity::log('Inserted Process information with prid ' . $prid . ' prc ' . $prc . ' ref_no ' . $ref_no . ' weight_in ' . $weight_in . ' other_instructions ' . $other_instructions. ' user ' . $user);
            }

            $pridetails = ProcessInstructions::where('pr_id', $prid)->first();
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
                    $pall_ratio = $cweight/$weight_in;

                    $extraProcessingValue = 0;

                    if ($additionalProcessing != NULL) {
                        foreach ($additionalProcessing as $keyAdditional => $valueAdditional) {

                            if ($value == $keyAdditional) {
                                $extraProcessingValue = 1;
                                break;
                            }
                        }
                    }

                    $processAllocationDetails = ProcessAllocation::where('st_id', $value)->where('pr_id', $prid)->first();

                    if ($cweight != null) {

                        if ($processAllocationDetails != null) {

                            $processAllocationID = $processAllocationDetails->id;
                            ProcessAllocation::where('id', '=', $processAllocationID)
                                ->update([ 'pr_id' => $prid, 'st_id' => $value, 'pall_allocated_weight' => $cweight, 'pall_packages' => $packages, 'pall_processed_weight' => null, 'pall_ratios' => $pall_ratio, 'pall_extra_processing' => $extraProcessingValue ]);

                            $request->session()->flash('alert-success', 'Process Information Updated!!');
                            Activity::log('Updated process allocation information with id ' . $processAllocationID . 'pall_allocated_weight' . $cweight .'pall_packages' .'pall_processed_weight' .$packages. 'pall_extra_processing' . $extraProcessingValue );

                        } else {

                            $processAllocationID = ProcessAllocation::insertGetId(['pr_id' => $prid, 'st_id' => $value, 'pall_allocated_weight' => $cweight, 'pall_packages' => $packages, 'pall_processed_weight' => null, 'pall_ratios' => $pall_ratio, 'pall_extra_processing' => $extraProcessingValue]);
                            $request->session()->flash('alert-success', 'Process Information Added!!');
                            Activity::log('Added process allocation information with id ' . $processAllocationID . 'pall_allocated_weight' . $cweight .'pall_packages' .'pall_processed_weight' .$packages. 'pall_extra_processing' . $extraProcessingValue );                                
                        }
                        
                    }

                        Stock::where('id', '=', $value)
                         ->update(['st_ended_by' => $user, 'pr_id' => $prid]);
                }
            }

            $temp_value2 = null;
            $new_reference_no = null;
            $temp_array =  array();
            $temp_ref_array = arraY();

            $temp_regrading = array();
            $temp_ref_regrading = array();


            if ($additionalProcessing != NULL && $tobeprocessed != null) {
                foreach ($additionalProcessing as $key => $value) {
                    if ($value != NULL && in_array($key, $tobeprocessed)) {
                        foreach ($value as $key2 => $value2) {                    

                            if (!in_array($value2, $temp_array)) {
                                $new_reference_no = $this->generateReferenceNumber($value2, $contractID, $BULKING_PROCESS, $COUNTRY_INITIAL, $INTERNAL_BULK, $INTERNAL_BULK_INITIAL);
                                array_push($temp_array, $value2);  

                                $newElement[$value2] = $new_reference_no;
                                $temp_ref_array = $temp_ref_array + $newElement;

                            } 

                            if (empty($temp_array)) {
                                $new_reference_no = $this->generateReferenceNumber($value2, $contractID, $BULKING_PROCESS, $COUNTRY_INITIAL, $INTERNAL_BULK, $INTERNAL_BULK_INITIAL);  
                                array_push($temp_array, $value2);

                                $newElement[$value2] = $new_reference_no;
                                $temp_ref_array = $temp_ref_array + $newElement;

                            }  

                            if (in_array($value2, $temp_array)) {
                                if (isset($temp_ref_array[$value2])) {
                                    $new_reference_no = $temp_ref_array[$value2];
                                }
                                

                            }

                            $temp_value2 = $value2;

                            $cweight_array = Input::get('cweight');

                            $additional_cweight = NULL;
                            if ($additional_cweight) {
                                foreach ($cweight_array as $keyweight => $valueweight) {
                                    if ($keyweight == $value) {
                                        $additional_cweight = $valueweight;
                                    }                        
                                }
                            }

                            $additional_prdetails = Process::where('pr_instruction_number', $new_reference_no)->first();

                            if ($additional_prdetails != null) {

                                $additional_prid = $additional_prdetails->id;
                                $additional_cweight = $additional_cweight + $additional_prdetails->pr_weight_in;

                                Process::where('id', '=', $additional_prid)
                                    ->update([ 'pr_weight_in' => $additional_cweight]);

                                $request->session()->flash('alert-success', 'Process Information Updated!!');
                                Activity::log('Updated Process information with prid ' . $additional_prid . ' weight_in ' . $additional_cweight );

                            } else {
                                // $additional_prid = Process::insertGetId(['prcss_id' => $value2, 'pr_instruction_number' => $new_reference_no, 'pr_weight_in' => $additional_cweight, 'pr_other_instructions' => $other_instructions, 'ctr_id' => $cid, 'csn_id' => $prc_season , 'sct_id' => $contractID, 'pr_reference_name' => $ref_no, 'pr_date' => $date]);
                                $additional_prid = Process::insertGetId(['prcss_id' => $value2, 'pr_instruction_number' => $new_reference_no, 'pr_weight_in' => $additional_cweight, 'pr_other_instructions' => $other_instructions, 'ctr_id' => $cid, 'csn_id' => $prc_season , 'pr_reference_name' => $ref_no, 'pr_date' => $date]);

                                $request->session()->flash('alert-success', 'Process Information Added!!');
                                Activity::log('Inserted Process information with prid ' . $additional_prid . ' prc ' . $value2 . ' ref_no ' . $new_reference_no . ' weight_in ' . $additional_cweight . ' other_instructions ' . $other_instructions);                                
                            }

                            $processAllocationDetails = ProcessAllocation::where('st_id', $key)->where('pr_id', $additional_prid)->first();

                            $extraProcessingValue = 1;




                            $cweight_array = Input::get('cweight');

                            $additional_cweight = NULL;
                            if ($additional_cweight) {
                                foreach ($cweight_array as $keyweight => $valueweight) {
                                    if ($keyweight == $value) {
                                        $additional_cweight = $valueweight;
                                    }                        
                                }
                            }

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
                            $pall_ratio = $cweight/$weight_in;

                            if ($processAllocationDetails != null) {

                                $processAllocationID = $processAllocationDetails->id;

                                ProcessAllocation::where('id', '=', $processAllocationID)
                                    ->update([ 'pr_id' => $additional_prid, 'st_id' => $key, 'pall_allocated_weight' => $cweight, 'pall_packages' =>$packages , 'pall_processed_weight' => null, 'pall_ratios' => $pall_ratio , 'pall_extra_processing' => $extraProcessingValue ]);

                                $request->session()->flash('alert-success', 'Stock Information Updated!!');
                                Activity::log('Updated process allocation information with id ' . $processAllocationID . 'pall_allocated_weight' . $cweight .'pall_packages' .'pall_processed_weight' .$packages. 'pall_extra_processing' . $extraProcessingValue );

                            } else {
                                $processAllocationID = ProcessAllocation::insertGetId(['pr_id' => $additional_prid, 'st_id' => $key, 'pall_allocated_weight' => $cweight, 'pall_packages' => $packages, 'pall_processed_weight' => null, 'pall_ratios' => $pall_ratio, 'pall_extra_processing' => $extraProcessingValue]);
                                $request->session()->flash('alert-success', 'Process Information Added!!');
                                Activity::log('Added process allocation information with id ' . $processAllocationID . 'pall_allocated_weight' . $cweight .'pall_packages' .'pall_processed_weight' .$packages. 'pall_extra_processing' . $extraProcessingValue );                                
                            }



                        }                       
                    }   
                }
            }

            if ($instructions_selected != null) {
                if ($pridetails != null) {
                    $pridetailsdel = ProcessInstructions::find($pridetails->id);
                    $pridetailsdel->delete();
                }

                $priid = ProcessInstructions::insertGetId(['pr_id' => $prid, 'pri_id' => $instructions_selected]);
                $request->session()->flash('alert-success', 'Process Information Updated!!');
                Activity::log('Inserted Process information with priid ' . $priid . ' instructions_selected ' . $instructions_selected);
            } else if ($instructions_checked != null) {
                foreach ($instructions_checked as $key => $value) {
                    $pridetails = ProcessInstructions::where('pr_id', $prid)->where('pri_id', $value)->first();
                    if ($pridetails != null) {
                        $pridetailsdel = ProcessInstructions::find($pridetails->id);
                        $pridetailsdel->delete();
                    }

                    $priid = ProcessInstructions::insertGetId(['pr_id' => $prid, 'pri_id' => $value]);
                    $request->session()->flash('alert-success', 'Process Information Updated!!');
                    Activity::log('Inserted Process information with priid ' . $priid . ' instructions_selected ' . $value);
                }
            }

            if ($tobeprocessed != null) {
                if (sizeof($tobeprocessed) == 1) {
                    foreach ($tobeprocessed as $key => $value) {
                        $new_stockdetails = Stock::where('id', $value)->first();
                        Process::where('id', '=', $prid)
                                ->update(['cgrad_id' => $new_stockdetails->cgrad_id, 'bs_id' => $new_stockdetails->bs_id, 'csn_id' => $prc_season ]);
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
                        Stock::where('id', '=', $value)
                              ->update(['st_ended_by' => null, 'pr_id' => null]);
                    }

                    $processAllocation = ProcessAllocation::where('st_id',$value)->where('pr_id', $prid);    
                    $processAllocation->delete(); 
                }


            }

            $StockView = StockViewALL::get();
            
            return View::make('processinginstructions', compact('id',
                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'ref_no', 'prc', 'processing_instruction', 'input_type', 'title', 'certs', 'StockStatus', 'other_instructions', 'instructions_checked', 'instructions_selected','prc_season', 'reference', 'contract', 'contractID', 'StockView','prdetails', 'prc_season', 'extraProcessing', 'selectedContract', 'reference_no', 'selected_date'));

        } else if (null !== Input::get('printprocessingnstructions')) {
            $this->validate($request, ['country' => 'required', 'processing_season' => 'required',
            ]);

            $ref_no    = Input::get('ref_no');
            $TO = "NKG Export - Warehouse Department";
            $ATTENTION = "NELSON";
            $FROM = "Quality Department";
            $reference = Input::get('reference');
            $contractID = Input::get('contract');
            $contractNumber = SalesContract::where('id', '=', $contractID)->first();
            if ($contractNumber != null) {
                $reference = $contractNumber->sct_description;
            }


            
            $this->checkIFBulkWithNoContract($prc, $contractID, $BULKING_PROCESS);

            $date = null;
            $prdetails = Process::where('pr_instruction_number', $ref_no)->first();
            
            if ($reference == "INTERNAL") {

                if(isset($prdetails)){
                    $reference = $prdetails->pr_reference_name;
                }

                if ($reference === null) {
                    $reference = "INTERNAL";
                }

            }

            if ($prdetails != null) {

                if ($prdetails->pr_confirmed_by != null) {
                    $request->session()->flash('alert-warning', 'Process already confirmed!!');
                    return View::make('processinginstructions', compact('id',
                        'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'ref_no', 'prc', 'processing_instruction', 'input_type', 'title', 'certs', 'StockStatus', 'other_instructions', 'instructions_checked', 'instructions_selected','prc_season', 'reference', 'contract', 'contractID', 'StockView','prdetails', 'prc_season', 'extraProcessing', 'selectedContract', 'reference_no', 'selected_date'));                  
                }
            }
            

            $process_number = Process::where('pr_instruction_number', $ref_no)->first();
            if ($process_number == null) {
                $request->session()->flash('alert-warning', 'No such process!!');
                return View::make('processinginstructions', compact('id',
                    'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'ref_no', 'prc', 'processing_instruction', 'input_type', 'title', 'certs', 'StockStatus', 'other_instructions', 'instructions_checked', 'instructions_selected','prc_season', 'reference', 'contract', 'contractID', 'StockView','prdetails', 'prc_season', 'extraProcessing', 'selectedContract', 'reference_no', 'selected_date'));                  
            }
      
            // $reference = $process_number->pr_reference_name;
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


        

            $pdf = PDF::loadView('pdf.processing_instructions', compact('TO',  'ATTENTION', 'FROM', 'reference', 'ref_no', 'contractNumber', 'user',  'date', 'StockView', 'seasonName', 'person_fname', 'person_sname', 'process_type', 'process_instructions', 'process_other_instructions'));
            return $pdf->stream($ref_no . ' processing_instructions.pdf');

        } else if (null !== Input::get('printprocessingnstructionsprices')) {
            $this->validate($request, ['country' => 'required', 'processing_season' => 'required',
            ]);

            $ref_no    = Input::get('ref_no');
            $TO = "NKG Export - Warehouse Department";
            $ATTENTION = "NELSON";
            $FROM = "Quality Department";
            $reference = Input::get('reference');
            $contractID = Input::get('contract');
            $contractNumber = SalesContract::where('id', '=', $contractID)->first();
            if ($contractNumber != null) {
                $reference = $contractNumber->sct_description;
            }


            
            $this->checkIFBulkWithNoContract($prc, $contractID, $BULKING_PROCESS);

            $date = null;
            $prdetails = Process::where('pr_instruction_number', $ref_no)->first();
            
            if ($reference == "INTERNAL") {

                if(isset($prdetails)){
                    $reference = $prdetails->pr_reference_name;
                }

                if ($reference === null) {
                    $reference = "INTERNAL";
                }

            }

            if ($prdetails != null) {

                if ($prdetails->pr_confirmed_by != null) {
                    $request->session()->flash('alert-warning', 'Process already confirmed!!');
                    return View::make('processinginstructions', compact('id',
                        'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'ref_no', 'prc', 'processing_instruction', 'input_type', 'title', 'certs', 'StockStatus', 'other_instructions', 'instructions_checked', 'instructions_selected','prc_season', 'reference', 'contract', 'contractID', 'StockView','prdetails', 'prc_season', 'extraProcessing', 'selectedContract', 'reference_no', 'selected_date'));                  
                }
            }
            

            $process_number = Process::where('pr_instruction_number', $ref_no)->first();
            if ($process_number == null) {
                $request->session()->flash('alert-warning', 'No such process!!');
                return View::make('processinginstructions', compact('id',
                    'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'ref_no', 'prc', 'processing_instruction', 'input_type', 'title', 'certs', 'StockStatus', 'other_instructions', 'instructions_checked', 'instructions_selected','prc_season', 'reference', 'contract', 'contractID', 'StockView','prdetails', 'prc_season', 'extraProcessing', 'selectedContract', 'reference_no', 'selected_date'));                  
            }
      
            // $reference = $process_number->pr_reference_name;
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


        

            $pdf = PDF::loadView('pdf.processing_instructions_stuffed', compact('TO',  'ATTENTION', 'FROM', 'reference', 'ref_no', 'contractNumber', 'user',  'date', 'StockView', 'seasonName', 'person_fname', 'person_sname', 'process_type', 'process_instructions', 'process_other_instructions'));
            return $pdf->stream($ref_no . ' processing_instructions.pdf');

        } else if (null !== Input::get('searchInstruction')) {
            $this->validate($request, [
                'country' => 'required',
            ]);

            $ref_no    = Input::get('ref_no');
            $reference_no = $ref_no;

            $prdetails = Process::where('pr_instruction_number', $ref_no)->first();

            if ($prdetails != null) {

                if ($prdetails->pr_confirmed_by != null) {
                    $request->session()->flash('alert-warning', 'Process already confirmed!!');
                    return View::make('processinginstructions', compact('id',
                        'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'ref_no', 'prc', 'processing_instruction', 'input_type', 'title', 'certs', 'StockStatus', 'other_instructions', 'instructions_checked', 'instructions_selected','prc_season', 'reference', 'contract', 'contractID', 'StockView','prdetails', 'prc_season', 'extraProcessing', 'selectedContract', 'reference_no', 'selected_date'));                  
                }
            }

            if ($prdetails != null) {

                $prc = $prdetails->prcss_id;
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

            

            $StockView = StockViewALL::get();
            return View::make('processinginstructions', compact('id',
                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'ref_no', 'prc', 'processing_instruction', 'input_type', 'title', 'certs', 'StockStatus', 'other_instructions', 'instructions_checked', 'instructions_selected', 'StockView', 'prid','prc_season', 'reference', 'contract', 'contractID','prdetails', 'prc_season', 'extraProcessing', 'selectedContract', 'reference_no', 'selected_date'));

        } else if (null !== Input::get('filter')) {

            $ref_no    = Input::get('ref_no');
            $prdetails = Process::where('pr_instruction_number', $ref_no)->first();

            if ($prdetails != null) {

                if ($prdetails->pr_confirmed_by != null) {
                    $request->session()->flash('alert-warning', 'Process already confirmed!!');
                    return View::make('processinginstructions', compact('id',
                        'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'ref_no', 'prc', 'processing_instruction', 'input_type', 'title', 'certs', 'StockStatus', 'other_instructions', 'instructions_checked', 'instructions_selected','prc_season', 'reference', 'contract', 'contractID', 'StockView','prdetails', 'prc_season', 'extraProcessing', 'selectedContract', 'reference_no', 'selected_date'));                  
                }
            }


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

            $query = StockViewALL::select('*');
            if ($csn_season != null && $csn_season != "Season") {
                $csn_season = $csn_season->csn_season;
                $query      = $query->where('csn_season', $csn_season);
            }
            if ($sst != null) {
                $query = $query->where('sts_id', $sst);
            }
            if ($sst != null) {
                $query = $query->where('sts_id', $sst);
            }
            if ($saleid != null) {
                $saleid = $saleid->sl_no;
                $query  = $query->where('sale', $saleid);
            }
            if ($grade != null) {
                $query = $query->where('grade', $grade);
            }
            if ($bskt != null) {
                $query = $query->where('code', $bskt);
            }
            if ($crtid != null) {
                $query = $query->where('cert', 'like', '%' . $crtid . '%');
            }
            if ($prcf != null && $prcf != 0) {
                $query = $query->where('prcssid', $prcf);
            }
            $csn_season = Input::get('season');
            $saleid     = Input::get('sale');

            $StockView  = $query->get();

            
            return View::make('processinginstructions', compact('id',
                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'ref_no', 'prc', 'processing_instruction', 'input_type', 'title', 'certs', 'StockStatus', 'other_instructions', 'instructions_checked', 'instructions_selected', 'StockView', 'sst', 'saleid', 'grade', 'bskt', 'crtid', 'prcf', 'prid','prc_season', 'reference', 'contract', 'contractID','prdetails', 'prc_season', 'extraProcessing', 'selectedContract', 'reference_no', 'selected_date'));
        } else {
            $cid = Input::get('country');
            $csn_season = Input::get('sale_season');

            $StockView = StockViewALL::get();

            return View::make('processinginstructions', compact('id',
                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'ref_no', 'prc', 'processing_instruction', 'input_type', 'title', 'certs', 'StockStatus', 'other_instructions', 'instructions_checked', 'instructions_selected', 'StockView', 'prid','prc_season', 'reference', 'contract', 'contractID','prdetails', 'prc_season', 'extraProcessing', 'selectedContract', 'reference_no', 'selected_date'));
        }

    }

    public function getProcessingType ($ref_no)
    {
        $process_type = process::where('pr_instruction_number',  $ref_no)->first();
        if ($process_type != null) {
            $process_type = $process_type->id;
        }
        

        return $process_type;
    }

    public function getContractType ($ref_no)
    {
        $contract_type = process::where('pr_instruction_number',  $ref_no)->first();
        if ($contract_type != null) {
            $contract_type = $contract_type->sct_id;
        }        

        return $contract_type;
    }
    public function generateReferenceNumber ($prc, $contractID, $BULKING_PROCESS, $COUNTRY_INITIAL, $INTERNAL_BULK, $INTERNAL_BULK_INITIAL)
    {
        $reference_no = null;

        
        if ($prc != null && $prc != 0) {
            $processing_type = processing::where('id', $prc)->first();
            
             if ($prc == $BULKING_PROCESS) {
                if ($contractID == $INTERNAL_BULK) {
                    $reference_no = Process::where('prcss_id', $prc)->where('pr_instruction_number', 'like', '%' . "KIB" . '%')->orderBy('pr_instruction_number', 'asc')->pluck('pr_instruction_number');
                    
                } else {
                    $reference_no = Process::where('prcss_id', $prc)->where('pr_instruction_number', 'like', '%' . "KDI" . '%')->orderBy('pr_instruction_number', 'asc')->pluck('pr_instruction_number');

                }
             } else {
                $reference_no = Process::where('prcss_id', $prc)->orderBy('pr_instruction_number', 'asc')->pluck('pr_instruction_number');
             }
            if ($reference_no->first() == null) {
                $reference_no = null;
            } else {
                foreach ($reference_no as $ref) {
                    $reference_no = $ref;
                    preg_match_all('!\d+!', $ref, $reference_no);
                    $reference_no = implode(' ', $reference_no[0]);

                }
            }
            if ($reference_no == NULL) {
                $reference_no = 1000;
            }
            if ($prc == $BULKING_PROCESS && $contractID == $INTERNAL_BULK) {
                 $reference_no = $COUNTRY_INITIAL.$INTERNAL_BULK_INITIAL .sprintf("%04d", ($reference_no + 1));
            } else {
                $reference_no =  $COUNTRY_INITIAL.$processing_type->prcss_initial .sprintf("%04d", ($reference_no + 1));
            }
            
        }
        

        return $reference_no;
    }

    public function checkIFBulkWithNoContract ($prc, $contractID, $BULKING_PROCESS)
    {
        if ($prc == $BULKING_PROCESS && $contractID == null) {
            return redirect('processinginstructions')
                    ->withErrors("Please select a valid Contract!!")->withInput();
            return View::make('processinginstructions', compact('id', 'Season', 'country', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'ref_no', 'prc', 'processing_instruction', 'input_type', 'title', 'certs', 'StockStatus', 'date','prc_season', 'reference', 'contract', 'contractID','prdetails', 'extraProcessing', 'selectedContract', 'reference_no'));            
        }
    }
    public function getstockview($countryID, $ref_no)
    {
        if ($countryID != null) {
            if($ref_no != null){
                $stockview = StockViewALL::select('*')->where('ctr_id', $countryID)->where('process_number', $ref_no)->orWhereNull('process_number')->orWhereNull('prcssid')->whereNull('ended')->orderByRaw(DB::raw("FIELD(process_number, '$ref_no') DESC"));
            } else {
                $stockview = StockViewALL::select('*')->where('ctr_id', $countryID)->whereNull('ended');
            }

        } else {
            $stockview = null;
        }   



        return Datatables::of($stockview)
            ->make(true);
    }

    public function processingResultsForm(Request $request)
    {
        $rates    = processrates::all(['id', 'service']);
        $teams   = teams::all(['id', 'tms_grpname']);

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

        $ref_no = release::orderBy('previous_no', 'asc')->pluck('previous_no');
        foreach ($ref_no as $ref) {
            $ref_no = $ref;
        }
        $ref_no = "IBR-" . sprintf("%07d", ($ref_no + 0000001));

        return View::make('processingresults', compact('id',
            'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'ref_no', 'rates', 'teams'));

    }

    public function processingResults(Request $request)
    {
        $rates    = processrates::all(['id', 'service']);
        $teams   = teams::all(['id', 'tms_grpname']);

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



        $BULKING_PROCESS = 4;
        $INTERNAL_BULK = 1;


        $cgradid           = Input::get('coffee_grade');
        $bsid           = Input::get('basket');

        $locrowid = NULL;
        $loccolid = NULL;

        $refno     = null;
        $StockView = null;

        $basket = InternalBaskets::where('ctr_id', Input::get('country'))->get();
        $CoffeeGrade = CoffeeGrade::where('ctr_id', Input::get('country'))->get();

        $user_data = Auth::user();
        $user      = $user_data->id;
        $isInBulk = false;

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
            $total_kilos_processed = null;

            foreach ($process_results as $key => $value) {
                    $total_kilos_processed += $value->prts_weight;

                    $batch_kilograms = $value->prts_weight;
                    $stbags    = floor($batch_kilograms / 60);
                    $stpockets = $batch_kilograms % 60;
                    $prdetails = Process::where('id', $value->pr_id)->first();
                    $resdetails = ProcessResultsType::where('id', $value->prt_id)->first();
                    $total_value = null;
                    $total_kilos = null;
                    $total_price = null;

                    foreach ($StockView as $keyst => $valuest) {
                        $total_kilos += $valuest->weight; 
                        $total_value += ($valuest->weight)/50 * ($valuest->price);
                    }
                    $total_price = $total_value/$total_kilos * 50;

                    $stocks_in_bulk = StockViewALL::where('prcssid', $rfid)->get();
                    foreach ($stocks_in_bulk as $keyst => $valuest) {
                        $stock_single_lots = Stock::where('id', $valuest->id)->first();
                        if ($stock_single_lots->st_net_weight != $valuest->weight) {
                            $stock_net = $stock_single_lots->st_net_weight - $valuest->weight;
                            $stock_bags    = floor($stock_net / 60);
                            $stock_pockets = $stock_net % 60;     
                            $batch_packages = ceil($stock_net / 60);          
                                         
                            $stid = Stock::insertGetId(['ctr_id' => $cid, 'csn_id' => $stock_single_lots->csn_id, 'cb_id' => $stock_single_lots->cb_id , 'st_outturn' => $stock_single_lots->st_outturn, 'st_mark' => $stock_single_lots->st_mark, 'st_name' => $stock_single_lots->st_name, 'prc_id' => $stock_single_lots->prc_id, 'gr_id' => $stock_single_lots->gr_id, 'st_net_weight' => $stock_net, 'st_bags' => $stock_bags, 'st_pockets' => $stock_pockets, 'pkg_id' => $stock_single_lots->pkg_id, 'usr_id' => $user, 'sts_id' => '2', 'cgrad_id' => $stock_single_lots->cgrad_id, 'bs_id' => $stock_single_lots->bs_id, 'prc_price' => $stock_single_lots->prc_price, 'br_id' => $stock_single_lots->br_id, 'sl_id' => $stock_single_lots->sl_id]);

                            $batch_single_lots = Batch::where('st_id', $stock_single_lots->id)->orderBy('id', 'desc')->first();
                            $batch_location_single_lots = null;
                            if ($batch_single_lots != null) {
                                $batch_location_single_lots = StockLocation::where('bt_id', $batch_single_lots->id)->first();
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
                        $bulkProcessID = $bulkProcessID->id;
                    }
                    
                    if (strtolower($resdetails->prt_name) == 'rejects') {
                        $stid = Stock::insertGetId(['ctr_id' => $cid, 'csn_id' => $prdetails->csn_id, 'st_outturn' => $prdetails->pr_instruction_number, 'st_name' => $prdetails->pr_instruction_number, 'st_net_weight' => $batch_kilograms, 'st_bags' => $stbags, 'st_pockets' => $stpockets, 'usr_id' => $user, 'sts_id' => '3', 'cgrad_id' => $value->cgrad_id, 'prt_id' => $resdetails->id, 'ibs_id' => $value->bs_id, 'prc_price' => $total_price, 'pr_id' => $bulkProcessID]);
                    } else {
                        $stid = Stock::insertGetId(['ctr_id' => $cid, 'csn_id' => $prdetails->csn_id, 'st_outturn' => $prdetails->pr_instruction_number, 'st_name' => $prdetails->pr_instruction_number , 'st_net_weight' => $batch_kilograms, 'st_bags' => $stbags, 'st_pockets' => $stpockets, 'usr_id' => $user, 'sts_id' => '2', 'cgrad_id' => $value->cgrad_id, 'prt_id' => $resdetails->id, 'ibs_id' => $value->bs_id, 'prc_price' => $total_price, 'pr_id' => $bulkProcessID]);                     
                    }    

                    if ($checkIfInBulk  != null) {
                        $additional_cweight = Process::where('id', '=', $bulkProcessID)->first();
                        $additional_cweight = $additional_cweight->pr_weight_processed;
                        $packages    = ceil($additional_cweight / 60);

                        $additional_cweight = $additional_cweight + $batch_kilograms;

                        $pall_ratio = $cweight/$additional_cweight;

                        Process::where('id', '=', $bulkProcessID)
                            ->update([ 'pr_weight_in' => $additional_cweight]);

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

            $prdetails = Process::where('id', $rfid)->first();
            if ($prdetails != null) {
                $prid = $prdetails->id;
                Process::where('id', '=', $prid)
                    ->update(['pr_confirmed_by' => $user, 'pr_weight_processed' => $total_kilos_processed]);
            }
            if ($cid != null) {
                if ($prc != null) {
                    $refno       = Process::where('prcss_id', $prc)->where('ctr_id', $cid)->whereNotNull('pr_supervisor')->whereNull('pr_confirmed_by')->orderBy('pr_instruction_number')->get();
                    $resultsType = ProcessResultsType::where('prcss_id', $prc)->get();
                    if ($rfid != null) {
                        $StockView      = StockViewALL::where('prcssid', $rfid)->get();
                        $ProcessResults = Processes::where('id', $rfid)->where('ctrid', $cid)->whereNotNull('result_type')->get();
                    }
                }
                $Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->where('wrt_id', '1')->get();

            }


            
            $prdetails = Process::where('id', $rfid)->first();
            $batch_kilograms = null;
            return View::make('processingresults', compact('id',
                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'rfid', 'prc', 'processing_instruction', 'input_type', 'title', 'refno', 'resultsType', 'rtid', 'StockView', 'ProcessResults', 'wrhse', 'location', 'prdetails', 'isInBulk', 'batch_kilograms', 'packages', 'rtid', 'results_view', 'rates', 'teams'));
        } else if (null !== Input::get('submitresults')) {
            $this->validate($request, [
                'country' => 'required', 'results_type' => 'required', 
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

                                    return View::make('processingresults', compact('id',
                                        'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'rfid', 'prc', 'processing_instruction', 'input_type', 'title', 'refno', 'resultsType', 'rtid', 'StockView', 'ProcessResults', 'wrhse', 'location', 'prdetails', 'isInBulk', 'batch_kilograms', 'packages', 'results_view', 'rates', 'teams'));
                                    
                                }
                            }
                        }                      
                    }

                }
            }

            $check_results = ProcessResults::where('pr_id', $rfid)->where('prt_id', $rtid)->first();

            $locrowdetails = Location::where('wr_id', $wrhse)->where('loc_row', $rw)->first();
            $loccoldetails = Location::where('wr_id', $wrhse)->where('loc_column', $clm)->first();
            if ($locrowdetails !== null) {
                $locrowid = $locrowdetails->id;
            }
            if ($loccoldetails !== null) {
                $loccolid = $loccoldetails->id;
            }

            $ProcessResultsDetails = Process::where('id', $rfid)->first();
            if ($cgradid == NULL) {
                $cgradid = $ProcessResultsDetails->cgrad_id;
            }
            if ($bsid == NULL) {
                $bsid = $ProcessResultsDetails->bs_id;                
            }

            if ($check_results !== null) {
                $pridt = $check_results->id;
                ProcessResults::where('id', '=', $pridt)
                    ->update(['prts_weight' => $batch_kilograms, 'prts_packages' => $packages, 'wr_id' => $wrhse, 'loc_row' => $locrowid, 'loc_column' => $loccolid, 'btc_zone' => $zone, 'cgrad_id' => $cgradid, 'bs_id' => $bsid, 'prts_return_to_stock' => $returnToStock]);
                $request->session()->flash('alert-success', 'Processing Results Updated!!');
                Activity::log('Updated ProcessResults for id ' . $pridt . ' rtid ' . $rtid . ' batch_kilograms ' . $batch_kilograms . ' packages ' . $packages . ' by user ' . $user . ' wr_id ' . $wrhse . 'loc_row' . $locrowid . 'loc_column' . $loccolid . 'btc_zone' . $zone. 'cgradid' . $cgradid. 'bsid' . $bsid. 'returnToStock'. $returnToStock);
            } else {
                $pridt = ProcessResults::insertGetId(
                    ['pr_id' => $rfid, 'prt_id' => $rtid, 'prts_weight' => $batch_kilograms, 'prts_packages' => $packages, 'wr_id' => $wrhse, 'loc_row' => $locrowid, 'loc_column' => $loccolid, 'btc_zone' => $zone, 'cgrad_id' => $cgradid, 'bs_id' => $bsid, 'prts_return_to_stock' => $returnToStock]);
                $request->session()->flash('alert-success', 'Processing Results Added!!');
                Activity::log('Inserted ProcessResults for id ' . $pridt . ' rtid ' . $rtid . ' batch_kilograms ' . $batch_kilograms . ' packages ' . $packages . ' by user ' . $user . ' wr_id ' . $wrhse . 'loc_row' . $locrowid . 'loc_column' . $loccolid . 'btc_zone' . $zone. 'cgradid' . $cgradid. 'bsid' . $bsid . 'returnToStock'. $returnToStock);
            }



            if ($cid != null) {
                if ($prc != null) {
                    $$refno       = Process::where('prcss_id', $prc)->where('ctr_id', $cid)->whereNotNull('pr_supervisor')->whereNull('pr_confirmed_by')->orderBy('pr_instruction_number')->get();
                    $resultsType = ProcessResultsType::where('prcss_id', $prc)->get();
                    if ($rfid != null) {
                        $StockView      = StockViewALL::where('prcssid', $rfid)->get();
                        $ProcessResults = Processes::where('id', $rfid)->where('ctrid', $cid)->whereNotNull('result_type')->get();
                    }
                }
                $Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->where('wrt_id', '1')->get();

            }
            $batch_kilograms = null;
            return View::make('processingresults', compact('id',
                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'rfid', 'prc', 'processing_instruction', 'input_type', 'title', 'refno', 'resultsType', 'rtid', 'StockView', 'ProcessResults', 'wrhse', 'location', 'prdetails', 'isInBulk', 'batch_kilograms', 'packages', 'rtid', 'results_view', 'rates', 'teams'));

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
            // $this->checkIFBulkWithNoContract($prc, $contractID, $BULKING_PROCESS);

            $date = null;
            $prdetails = Process::where('id', $ref_no)->first();


            $process_number = Process::where('id', $ref_no)->first();

            if ($process_number == null) {
                $request->session()->flash('alert-warning', 'No such process!!');
                return View::make('processingresults', compact('id',
                    'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'ref_no', 'prc', 'processing_instruction', 'input_type', 'title', 'certs', 'StockStatus', 'other_instructions', 'instructions_checked', 'instructions_selected','prc_season', 'reference', 'contract', 'contractID', 'StockView','prdetails', 'prc_season', 'extraProcessing', 'selectedContract', 'reference_no', 'selected_date', 'rates', 'teams'));                  
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
            return View::make('processingresults', compact('id',
                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'rfid', 'prc', 'processing_instruction', 'input_type', 'title', 'refno', 'resultsType', 'rtid', 'StockView', 'ProcessResults', 'wrhse', 'location', 'prdetails', 'isInBulk', 'batch_kilograms', 'packages', 'rtid', 'results_view', 'rates', 'teams'));
        }

    }

}
