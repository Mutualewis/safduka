<?php namespace Ngea\Http\Controllers;

use Activity;
use Auth;
use DB;
use delete;
use Illuminate\Http\Request;
use Input;
use Ngea\basket;
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

class HooperResultsController extends Controller
{

    public function processingHooperForm(Request $request)
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

        return View::make('processinghooper', compact('id',
            'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'ref_no', 'certs', 'StockStatus'));

    }


    public function processingHooper(Request $request)
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
        $COUNTRY_INITIAL = country::where('id', $cid)->first();
        if ($COUNTRY_INITIAL !== NULL) {
            $COUNTRY_INITIAL = substr($COUNTRY_INITIAL->ctr_initial, 0, 1) ;
        }
        $ref_no = strtoupper(Input::get('ref_no'));
        
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

        if (null !== Input::get('submitresults')) {
            $this->validate($request, [
                'country' => 'required',
            ]);            

            $prc                   = Input::get('process_type');
            $ref_no                = strtoupper(Input::get('ref_no'));
            $other_instructions    = Input::get('other_instructions');
            $instructions_selected = Input::get('instructions_selected');
            $instructions_checked  = Input::get('instructions_checked');
            $weight_in             = null;

            $tobeprocessed = Input::get('tobeprocessed');
            $tobewithdrawn = Input::get('tobewithdrawn');

            $supervisor = strtoupper(Input::get('supervisor'));

            $this->checkIFBulkWithNoContract($prc, $contractID, $BULKING_PROCESS);
            
            $additionalProcessing = Input::get('additionalProcessing');
            if ($additionalProcessing != NULL) {
                ksort($additionalProcessing);
            }


            if ($tobeprocessed != null) {
                foreach ($tobeprocessed as $key => $value) {
                    $cweight       = Input::get('cweight'.$value);
                    if ($cweight != null) {
                        $weight_in += $cweight;
                    }
                }
            }

            $prdetails = Process::where('pr_instruction_number', $ref_no)->first();

            if ($prdetails != null) {

                if ($prdetails->pr_confirmed_by != null) {
                    $request->session()->flash('alert-warning', 'Process already confirmed!!');
                    return View::make('processinghooper', compact('id',
                        'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'ref_no', 'prc', 'processing_instruction', 'input_type', 'title', 'certs', 'StockStatus', 'other_instructions', 'instructions_checked', 'instructions_selected','prc_season', 'reference', 'contract', 'contractID', 'StockView','prdetails', 'prc_season', 'extraProcessing', 'selectedContract', 'reference_no', 'selected_date'));                  
                }
            }


            if ($prdetails != null) {
                $prid = $prdetails->id;
                Process::where('id', '=', $prid)
                    ->update(['pr_supervisor' => $supervisor, 'pr_weight_processed' => $weight_in]);
                $request->session()->flash('alert-success', 'Stock Information Updated!!');
                Activity::log('Updated Process information with prid ' . $prid . ' prc ' . $prc . ' ref_no ' . $ref_no . ' weight_in ' . $weight_in . ' supervisor ' . $supervisor);
            } 

            $pridetails = ProcessInstructions::where('pr_id', $prid)->first();

            
            if ($tobeprocessed != null) {
                foreach ($tobeprocessed as $key => $value) {

                    $cweight       = Input::get('cweight'.$value);

                    $tags       = Input::get('tags'.$value);

                    $packages    = ceil($cweight / 60);

                    $processAllocationDetails = ProcessAllocation::where('st_id', $value)->where('pr_id', $prid)->first();

                    if ($cweight != null) {

                        if ($processAllocationDetails != null) {

                            $processAllocationID = $processAllocationDetails->id;

                            ProcessAllocation::where('id', '=', $processAllocationID)
                                ->update([ 'pall_processed_weight' => $cweight, 'pall_tags' => $tags ]);

                            $request->session()->flash('alert-success', 'Process Information Updated!!');
                            Activity::log('Updated process allocation information with id ' . $processAllocationID . ' pall_processed_weight ' . $cweight .'pall_packages' .'pall_processed_weight' .$packages. ' tags ' . $tags );

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
                        Stock::where('id', '=', $value)
                              ->update(['st_ended_by' => null, 'pr_id' => null]);
                    }

                    $processAllocation = ProcessAllocation::where('st_id',$value)->where('pr_id', $prid);    
                    $processAllocation->delete(); 
                }


            }
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


         
            $StockView = StockViewALL::get();
            
            return View::make('processinghooper', compact('id',
                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'ref_no', 'prc', 'processing_instruction', 'input_type', 'title', 'certs', 'StockStatus', 'other_instructions', 'instructions_checked', 'instructions_selected','prc_season', 'reference', 'contract', 'contractID', 'StockView','prdetails', 'prc_season', 'extraProcessing', 'selectedContract', 'reference_no', 'selected_date', 'supervisor'));

        } else if (null !== Input::get('getchops')) {
            $this->validate($request, ['country' => 'required', 'processing_season' => 'required',
            ]);

            $ref_no    = Input::get('ref_no');
            $TO = "NKG Export - Warehouse Department";
            $ATTENTION = "NELSON";
            $FROM = "Quality Department";
            $reference = Input::get('reference');
            $contractID = Input::get('contract');
            $contractNumber = SalesContract::where('id', '=', $contractID)->first();
            $this->checkIFBulkWithNoContract($prc, $contractID, $BULKING_PROCESS);

            $date = null;
            $prdetails = Process::where('pr_instruction_number', $ref_no)->first();

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


        

            $pdf = PDF::loadView('pdf.processing_chops', compact('TO',  'ATTENTION', 'FROM', 'reference', 'ref_no', 'contractNumber', 'user',  'date', 'StockView', 'seasonName', 'person_fname', 'person_sname', 'process_type', 'process_instructions', 'process_other_instructions'));
            return $pdf->stream($ref_no . ' processing_chops.pdf');
        } else if (null !== Input::get('searchInstruction')) {
            $this->validate($request, [
                'country' => 'required',
            ]);

            $ref_no    = Input::get('ref_no');
            $prdetails = Process::where('pr_instruction_number', $ref_no)->first();
           

            if ($prdetails != null) {
                $cid = $prdetails->ctr_id;
                $prc_season = $prdetails->csn_id;

                if ($prdetails->pr_confirmed_by != null) {
                    $request->session()->flash('alert-warning', 'Process already confirmed!!');
                    return View::make('processinghooper', compact('id',
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

                $date = $prdetails->pr_date;
            }


            $StockView = StockViewALL::get();
            return View::make('processinghooper', compact('id',
                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'ref_no', 'prc', 'processing_instruction', 'input_type', 'title', 'certs', 'StockStatus', 'other_instructions', 'instructions_checked', 'instructions_selected', 'StockView', 'prid','prc_season', 'reference', 'contract', 'contractID','prdetails', 'prc_season', 'extraProcessing', 'selectedContract', 'reference_no', 'selected_date', 'supervisor'));

        } else {
            $cid = Input::get('country');
            $csn_season = Input::get('sale_season');

            return View::make('processinghooper', compact('id',
                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'ref_no', 'prc', 'processing_instruction', 'input_type', 'title', 'certs', 'StockStatus', 'other_instructions', 'instructions_checked', 'instructions_selected', 'StockView', 'prid','prc_season', 'reference', 'contract', 'contractID','prdetails', 'prc_season', 'extraProcessing', 'selectedContract', 'reference_no', 'selected_date', 'supervisor'));
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
            return redirect('processinghooper')
                    ->withErrors("Please select a valid Contract!!")->withInput();
            return View::make('processinghooper', compact('id', 'Season', 'country', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'ref_no', 'prc', 'processing_instruction', 'input_type', 'title', 'certs', 'StockStatus', 'date','prc_season', 'reference', 'contract', 'contractID','prdetails', 'extraProcessing', 'selectedContract', 'reference_no'));            
        }
    }
    public function getstockview($countryID, $ref_no)
    {
        if ($countryID != null) {
            if($ref_no != null){
                $stockview = StockViewALL::select('*')->where('ctr_id', $countryID)->where('process_number', $ref_no);
            } else {
                $stockview = null;
            }

        } else {
            $stockview = null;
        }        


        return Datatables::of($stockview)
            ->make(true);
    }

}
