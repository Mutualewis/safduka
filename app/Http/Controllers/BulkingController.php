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
use Ngea\ProvisionalAllocation;
use Ngea\Provisonal_Purpose;
// use PDF;
use niklasravnsborg\LaravelPdf\Facades\Pdf as PDF;
use View;

use Ngea\processrates;
use Ngea\processcharges;
use Ngea\teams;
use Ngea\StockMill;

class BulkingController extends Controller {

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
        


        return View::make('bulking', compact('id',
            'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'ref_no', 'certs', 'StockStatus', 'growers', 'provisionalPurpose'));

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

        
        $tobeprocessed = Input::get('tobeprocessed');
       
        $user_data = Auth::user();
        $user      = $user_data->id;

        if (null !== Input::get('submitinstruction')) {
            DB::beginTransaction();
            $errormessages = [];
            
            try{
           

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
            $weight_in             = null;

            $tobeprocessed = Input::get('tobeprocessed');
            $tobewithdrawn = Input::get('tobewithdrawn');
           
            //dd($tobeprocessed); exit;
            
            
            $cweight = Input::get('cweight');

            // if ($tobeprocessed != null) {
            //     foreach ($tobeprocessed as $key => $value) {
                    
            //         foreach ($cweight as $keyweight => $valueweight) {
            //             if ($keyweight == $value) {
            //                 $weight_in += $valueweight;
            //             }
                        
            //         }

            //     }
            // }          
            
                  
                         
            if ($tobeprocessed != null) {
                foreach ($tobeprocessed as $key => $value) {

                    $stockitemdetails = StockMill::where('id', '=', $value)->first(); 
                    
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
                    // $pall_ratio = $cweight/$weight_in;
                    $pall_ratio = 1;

                
                   
                }
                
                $stock_net = $weight_in;
                $stock_bags    = floor($stock_net / 60);
                $stock_pockets = $stock_net % 60;     
                $batch_packages = ceil($stock_net / 60);   
                
                $st_bulk_id = StockMill::insertGetId([ 'cgr_id' => $grower, 'csn_id' => $stockitemdetails->csn_id, 'st_outturn' => $ref_no, 'st_mark' => $mark, 'st_packages'=>$batch_packages, 'st_name' => $ref_no,'st_net_weight' => $weight_in, 'st_bags' => $stock_bags, 'st_pockets' => $stock_pockets, 'usr_id' => $user, 'pty_id' => $stockitemdetails->pty_id, 'st_is_bulk' => 1]);
    
                
                    foreach ($tobeprocessed as $key => $value) {
    
                        StockMill::where('id', '=', $value)
                             ->update(['st_bulk_id' => $st_bulk_id, 'st_bulked_by' => $user]);
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
                                ->update([ 'pbk_id' => $prid, 'st_mill_id' => $value, 'prall_allocated_weight' => $cweight, 'prall_packages' => $packages ]);

                            
                            Activity::log('Updated Provisional Bulk allocation information with id ' . $processAllocationID . 'prall_allocated_weight' . $cweight .'prall_packages' .'prall_processed_weight' .$packages);

                        } else {

                            $processAllocationID = ProvisionalAllocation::insertGetId(['pbk_id' => $prid, 'st_mill_id' => $value, 'prall_allocated_weight' => $cweight, 'prall_packages' => $packages]);
                            
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
            }catch (\PDOException $e) {
                
                DB::rollback();
                $request->session()->flash('alert-warning', 'An error occurred while attempting to add outturn!!');
                $errormessages[] = $e->getMessage();
                
             }//end catch

            $StockView = StockViewALL::get();
            
            return View::make('bulking', compact('id',
                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'ref_no', 'prc', 'processing_instruction', 'input_type', 'title', 'certs', 'StockStatus', 'other_instructions', 'instructions_checked', 'instructions_selected','prc_season', 'reference', 'contract', 'contractID', 'StockView','prdetails', 'prc_season', 'extraProcessing', 'selectedContract', 'reference_no', 'selected_date', 'active_season', 'growers', 'provisionalPurpose'));

        }  else if (null !== Input::get('filter')) {

            $ref_no    = Input::get('ref_no');
            $prdetails = Process::where('pr_instruction_number', $ref_no)->first();

            if ($prdetails != null) {

                if ($prdetails->pr_confirmed_by != null) {
                    $request->session()->flash('alert-warning', 'Process already confirmed!!');
                    return View::make('processinginstructions', compact('id',
                        'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'ref_no', 'prc', 'processing_instruction', 'input_type', 'title', 'certs', 'StockStatus', 'other_instructions', 'instructions_checked', 'instructions_selected','prc_season', 'reference', 'contract', 'contractID', 'StockView','prdetails', 'prc_season', 'extraProcessing', 'selectedContract', 'reference_no', 'selected_date', 'active_season', 'growers', 'provisionalPurpose'));                  
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

            
            return View::make('bulking', compact('id',
                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'ref_no', 'prc', 'processing_instruction', 'input_type', 'title', 'certs', 'StockStatus', 'other_instructions', 'instructions_checked', 'instructions_selected', 'StockView', 'sst', 'saleid', 'grade', 'bskt', 'crtid', 'prcf', 'prid','prc_season', 'reference', 'contract', 'contractID','prdetails', 'prc_season', 'extraProcessing', 'selectedContract', 'reference_no', 'selected_date', 'active_season', 'growers', 'provisionalPurpose'));
        } else {
            $cid = Input::get('country');
            $csn_season = Input::get('sale_season');

            $stockview = StockViewALL::select('*')->whereNull('bulked_by');

            return View::make('bulking', compact('id',
                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'ref_no', 'prc', 'processing_instruction', 'input_type', 'title', 'certs', 'StockStatus', 'other_instructions', 'instructions_checked', 'instructions_selected', 'StockView', 'prid','prc_season', 'reference', 'contract', 'contractID','prdetails', 'prc_season', 'extraProcessing', 'selectedContract', 'reference_no', 'selected_date', 'active_season', 'growers', 'provisionalPurpose'));
        }

    }

    public function getstockview($countryID, $ref_no)
    {
        if ($countryID != null) {
            if($ref_no != null){
                $stockview = StockViewALL::select('*')->whereNull('bulked_by');
            } else {
                $stockview = StockViewALL::select('*')->where('ctr_id', $countryID)->whereNull('bulked_by');
            }

        } else {
            $stockview = null;
        }   



        return Datatables::of($stockview)
            ->make(true);
    }

    public function bulkApi(){

    }
   

}

