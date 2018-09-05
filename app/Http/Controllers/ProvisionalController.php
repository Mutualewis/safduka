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
use Ngea\ProvisionalBulk;
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
use Ngea\ProcessAllocation;
use Ngea\Process;
use Ngea\Person;
use Ngea\warehouses_region;
use Yajra\Datatables\Datatables;

use Ngea\StockProcessedView;

use Ngea\ProvisionalAllocation;

use Ngea\StockAndPurchased;

use Ngea\Provisonal_Purpose;


use niklasravnsborg\LaravelPdf\Facades\Pdf as PDF;
use View;

class ProvisionalController extends Controller
{

    public function provisionalInstructionsForm(Request $request)
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

        if(session('maincountry')!=NULL){
            $cid=session('maincountry');
        }  

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

        return View::make('processingprovisional', compact('id',
            'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'ref_no', 'certs', 'StockStatus', 'reference_no'));

    }




    public function processingProvisional(Request $request)
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

        $comments = Input::get('comments');
        $prpid = Input::get('purpose');



        $CoffeeGrade = CoffeeGrade::where('ctr_id', Input::get('country'))->get();

        $greensize    = quality_parameters::where('qg_id', '1')->get();
        $greencolor   = quality_parameters::where('qg_id', '2')->get();
        $greendefects = quality_parameters::where('qg_id', '3')->get();
        $processing   = processing::all(['id', 'prcss_name']);
        $extraProcessing = processing::where('id', '!=', Input::get('process_type'))->get();
        $buyer        = buyer::all(['id', 'cb_name']);
        $sale_status  = sale_status::all(['id', 'sst_name']);
        $basket       = basket::where('ctr_id', Input::get('country'))->get();

        $provisionalPurpose = Provisonal_Purpose::all(['id', 'prp_name']);

        

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
            

            $reference_no = $this->generateReferenceNumber($prc, $contractID, $BULKING_PROCESS, $COUNTRY_INITIAL, $INTERNAL_BULK, $INTERNAL_BULK_INITIAL);
            if ($ref_no  != null) {
                $reference_no = $this->generateReferenceNumber($prc, $contractID, $BULKING_PROCESS, $COUNTRY_INITIAL, $INTERNAL_BULK, $INTERNAL_BULK_INITIAL);
                
                $reference_no = strtoupper(Input::get('ref_no'));

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
        $prc = $BULKING_PROCESS;

        $selectedContract = SalesContract::where('id', '=', $contractID)->first();

        $tobeprocessed = Input::get('tobeprocessed');


        
        $tobeprocessedpurchased = Input::get('tobeprocessedpurchased');
        if (null !== Input::get('confirminstructions')) {
            if ($tobeprocessedpurchased != null) {

                $notReceived = StockAndPurchased::where('process_number', $ref_no)->whereNull('stock_id')->get();
                $notReceivedString = null;
                $arrayLength = count($notReceived);
                $count = 0;
                foreach ($notReceived as $key => $value) {
                    $count += 1;
                    if ($count != $arrayLength) {
                        $notReceivedString .= $value->outturn.", ";
                    } else {
                        $notReceivedString .= $value->outturn;
                    }                    
                }
                $request->session()->flash('alert-warning', 'Outturn(s) '.$notReceivedString.' have not yet been received in the warehouse!!');
                $StockView = StockAndPurchased::get();
                
                return View::make('processingprovisional', compact('id',
                    'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'ref_no', 'prc', 'processing_instruction', 'input_type', 'title', 'certs', 'StockStatus', 'other_instructions', 'instructions_checked', 'instructions_selected','prc_season', 'reference', 'contract', 'contractID', 'StockView','prdetails', 'prc_season', 'extraProcessing', 'selectedContract', 'reference_no', 'selected_date', 'prid', 'provisionalPurpose'));

            } 

            $prc = $BULKING_PROCESS;
            $ref_no                = strtoupper(Input::get('ref_no'));
            $other_instructions    = Input::get('other_instructions');
            $instructions_selected = Input::get('instructions_selected');
            $instructions_checked  = Input::get('instructions_checked');
            $weight_in             = null;

            $tobeprocessed = Input::get('tobeprocessed');
            $tobewithdrawn = Input::get('tobewithdrawn');

            
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
            if ($contractID == $INTERNAL_BULK) {
                $ref_no = Process::where('prcss_id', $prc)->where('pr_instruction_number', 'like', '%' . "KIB" . '%')->orderBy('pr_instruction_number', 'asc')->pluck('pr_instruction_number');
            } else {
                $ref_no = Process::where('prcss_id', $prc)->where('pr_instruction_number', 'like', '%' . "KDI" . '%')->orderBy('pr_instruction_number', 'asc')->pluck('pr_instruction_number');
            }
            


            if ($ref_no->first() == null) {
                $ref_no = null;
            } else {
                foreach ($ref_no as $ref) {
                    $ref_no = $ref;
                    preg_match_all('!\d+!', $ref, $ref_no);
                    $ref_no = implode(' ', $ref_no[0]);

                }
            }
            if ($ref_no == NULL) {
                $ref_no = 1000;
            }

            if ($contractID == $INTERNAL_BULK) {
                $ref_no =  $COUNTRY_INITIAL. "IB" .sprintf("%04d", ($ref_no + 1));
            } else {
                $ref_no =  $COUNTRY_INITIAL. "DI" .sprintf("%04d", ($ref_no + 1));
            }
            


            
            


            $prid = Process::insertGetId(['prcss_id' => $prc, 'pr_instruction_number' => $ref_no, 'sct_id' => $contractID, 'pr_weight_in' => $weight_in, 'pr_other_instructions' => $other_instructions, 'ctr_id' => $cid, 'csn_id' => $prc_season , 'sct_id' => $contractID, 'pr_reference_name' => $reference, 'pr_date' => $date]);
            $request->session()->flash('alert-success', 'Process Information Updated!!');
            Activity::log('Inserted Process information with prid ' . $prid . ' prc ' . $prc . ' ref_no ' . $ref_no . ' weight_in ' . $weight_in . ' other_instructions ' . $other_instructions);

            if ($tobeprocessed != null) {
                foreach ($tobeprocessed as $key => $value) {
                    $cweight       = Input::get('cweight'.$value);
                    $packages    = ceil($cweight / 60);


                    $extraProcessingValue = 0;

                    $processAllocationID = ProcessAllocation::insertGetId(['pr_id' => $prid, 'st_id' => $value, 'pall_allocated_weight' => $cweight, 'pall_packages' => $packages, 'pall_processed_weight' => null, 'pall_ratios' => null, 'pall_extra_processing' => $extraProcessingValue]);
                    $request->session()->flash('alert-success', 'Process Information Added!!');
                    Activity::log('Added process allocation information with id ' . $processAllocationID . 'pall_allocated_weight' . $cweight .'pall_packages' .'pall_processed_weight' .$packages. 'pall_extra_processing' . $extraProcessingValue );                                
                        
                    Stock::where('id', '=', $value)
                     ->update(['st_ended_by' => $user, 'pr_id' => $prid]);
                    
                }
            }

            $StockView = StockViewALL::get();
            $reference_no = $ref_no;
            return View::make('processinginstructions', compact('id',
                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'ref_no', 'prc', 'processing_instruction', 'input_type', 'title', 'certs', 'StockStatus', 'other_instructions', 'instructions_checked', 'instructions_selected','prc_season', 'reference', 'contract', 'contractID', 'StockView','prdetails', 'prc_season', 'extraProcessing', 'selectedContract', 'reference_no', 'selected_date', 'prid', 'provisionalPurpose', 'prpid', 'comments'));

        } else if (null !== Input::get('submitinstruction')) {
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
            $tobeprocessedpurchased = Input::get('tobeprocessedpurchased');
            $tobewithdrawn = Input::get('tobewithdrawn');
            $tobewithdrawnpurchased = Input::get('tobewithdrawnpurchased');

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

            if ($tobeprocessedpurchased != null) {
                foreach ($tobeprocessedpurchased as $key => $value) {
                    $cweight_purchased       = Input::get('cweightpurchased'.$value);
                    if ($cweight_purchased != null) {
                        $weight_in += $cweight_purchased;
                    }
                }
            }


            $prdetails = ProvisionalBulk::where('pbk_instruction_number', $ref_no)->first();

            if ($prdetails != null) {
                $prid = $prdetails->id;

                ProvisionalBulk::where('id', '=', $prid)
                    ->update(['prcss_id' => $prc, 'ctr_id' => $cid, 'pbk_instruction_number' => $ref_no, 'pbk_weight_in' => $weight_in, 'pbk_other_instructions' => $other_instructions, 'csn_id' => $prc_season , 'sct_id' => $contractID, 'pbk_reference_name' => $reference, 'pbk_date' => $date, 'prp_id' => $prpid, 'pbk_comments' => $comments]);
                $request->session()->flash('alert-success', 'Stock Information Updated!!');
                Activity::log('Updated Provisional Bulk information with prid ' . $prid . ' prc ' . $prc . ' ref_no ' . $ref_no . ' weight_in ' . $weight_in . ' other_instructions ' . $other_instructions);
            } else {
                $prid = ProvisionalBulk::insertGetId(['prcss_id' => $prc, 'pbk_instruction_number' => $ref_no, 'pbk_weight_in' => $weight_in, 'pbk_other_instructions' => $other_instructions, 'ctr_id' => $cid, 'csn_id' => $prc_season , 'sct_id' => $contractID, 'pbk_reference_name' => $reference, 'pbk_date' => $date, 'prp_id' => $prpid, 'pbk_comments' => $comments]);
                $request->session()->flash('alert-success', 'ProvisionalBulk Information Updated!!');
                Activity::log('Inserted Provisional Bulk information with prid ' . $prid . ' prc ' . $prc . ' ref_no ' . $ref_no . ' weight_in ' . $weight_in . ' other_instructions ' . $other_instructions);
            }

            $pridetails = ProcessInstructions::where('pr_id', $prid)->first();

            if ($tobeprocessed != null) {
                foreach ($tobeprocessed as $key => $value) {
                    $cweight       = Input::get('cweight'.$value);
                    $packages    = ceil($cweight / 60);


                    $extraProcessingValue = 0;

                    if ($additionalProcessing != NULL) {
                        foreach ($additionalProcessing as $keyAdditional => $valueAdditional) {

                            if ($value == $keyAdditional) {
                                $extraProcessingValue = 1;
                                break;
                            }
                        }
                    }

                    $processAllocationDetails = ProvisionalAllocation::where('st_id', $value)->where('pbk_id', $prid)->first();

                    if ($cweight != null) {
                        if ($processAllocationDetails != null) {

                            $processAllocationID = $processAllocationDetails->id;
                            ProvisionalAllocation::where('id', '=', $processAllocationID)
                                ->update([ 'pbk_id' => $prid, 'st_id' => $value, 'prall_allocated_weight' => $cweight, 'prall_packages' => $packages, 'prall_processed_weight' => null, 'prall_ratios' => null, 'prall_extra_processing' => $extraProcessingValue ]);

                            $request->session()->flash('alert-success', 'ProvisionalBulk Information Updated!!');
                            Activity::log('Updated Provisional Bulk allocation information with id ' . $processAllocationID . 'prall_allocated_weight' . $cweight .'prall_packages' .'prall_processed_weight' .$packages. 'prall_extra_processing' . $extraProcessingValue );

                        } else {

                            $processAllocationID = ProvisionalAllocation::insertGetId(['pbk_id' => $prid, 'st_id' => $value, 'prall_allocated_weight' => $cweight, 'prall_packages' => $packages, 'prall_processed_weight' => null, 'prall_ratios' => null, 'prall_extra_processing' => $extraProcessingValue]);
                            $request->session()->flash('alert-success', 'ProvisionalBulk Information Added!!');
                            Activity::log('Added Provisional Bulk allocation information with id ' . $processAllocationID . 'prall_allocated_weight' . $cweight .'prall_packages' .'prall_processed_weight' .$packages. 'prall_extra_processing' . $extraProcessingValue );                                
                        }
                        
                    }
                }
            }

            if ($tobeprocessedpurchased != null) {
                foreach ($tobeprocessedpurchased as $key => $value) {
                    $cweight_purchased       = Input::get('cweightpurchased'.$value);
                    $packages    = ceil($cweight_purchased / 60);
            

                    $extraProcessingValue = 0;

                    if ($additionalProcessing != NULL) {
                        foreach ($additionalProcessing as $keyAdditional => $valueAdditional) {

                            if ($value == $keyAdditional) {
                                $extraProcessingValue = 1;
                                break;
                            }
                        }
                    }

                    $processAllocationDetails = ProvisionalAllocation::where('cfd_id', $value)->where('pbk_id', $prid)->first();

                    if ($cweight_purchased != null) {
                        if ($processAllocationDetails != null) {

                            $processAllocationID = $processAllocationDetails->id;
                            ProvisionalAllocation::where('id', '=', $processAllocationID)
                                ->update([ 'pbk_id' => $prid, 'cfd_id' => $value, 'prall_allocated_weight' => $cweight_purchased, 'prall_packages' => $packages, 'prall_processed_weight' => null, 'prall_ratios' => null, 'prall_extra_processing' => $extraProcessingValue ]);

                            $request->session()->flash('alert-success', 'Provisional Bulk Information Updated!!');
                            Activity::log('Updated ProvisionalBulk allocation information with id ' . $processAllocationID . 'prall_allocated_weight' . $cweight_purchased .'prall_packages' .'prall_processed_weight' .$packages. 'prall_extra_processing' . $extraProcessingValue );

                        } else {

                            $processAllocationID = ProvisionalAllocation::insertGetId(['pbk_id' => $prid, 'cfd_id' => $value, 'prall_allocated_weight' => $cweight_purchased, 'prall_packages' => $packages, 'prall_processed_weight' => null, 'prall_ratios' => null, 'prall_extra_processing' => $extraProcessingValue]);
                            $request->session()->flash('alert-success', 'Provisional Bulk Information Added!!');
                            Activity::log('Added Provisional Bulk allocation information with id ' . $processAllocationID . 'prall_allocated_weight' . $cweight_purchased .'prall_packages' .'prall_processed_weight' .$packages. 'prall_extra_processing' . $extraProcessingValue );                                
                        }
                        
                    }

                }
            }
 


            if ($tobewithdrawn != null) {
                foreach ($tobewithdrawn as $key => $value) {
                    $stockViewALLCount = StockAndPurchased::where('stock_id', $value)->whereNotNull('process_number')->get();
                    $countProcess = 0;
                    foreach ($stockViewALLCount as $keycount => $valuecount) {
                        $countProcess += 1;
                    }

                    if ($countProcess < 2) {
                        Stock::where('id', '=', $value)
                              ->update(['st_ended_by' => null, 'pr_id' => null]);
                    }

                    $ProvisionalAllocation = ProvisionalAllocation::where('st_id',$value)->where('pbk_id', $prid);    
                    $ProvisionalAllocation->delete();

                }


            }


            if ($tobewithdrawnpurchased != null) {
                foreach ($tobewithdrawnpurchased as $key => $value) {
                    $stockViewALLCount = StockAndPurchased::where('id', $value)->whereNotNull('process_number')->get();
                    $countProcess = 0;
                    foreach ($stockViewALLCount as $keycount => $valuecount) {
                        $countProcess += 1;
                    }

                    if ($countProcess < 2) {
                        Stock::where('id', '=', $value)
                              ->update(['st_ended_by' => null, 'pr_id' => null]);
                    }

                    $ProvisionalAllocation = ProvisionalAllocation::where('cfd_id',$value)->where('pbk_id', $prid);    
                    $ProvisionalAllocation->delete();

                }


            }


            $StockView = StockAndPurchased::get();
            
            return View::make('processingprovisional', compact('id',
                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'ref_no', 'prc', 'processing_instruction', 'input_type', 'title', 'certs', 'StockStatus', 'other_instructions', 'instructions_checked', 'instructions_selected','prc_season', 'reference', 'contract', 'contractID', 'StockView','prdetails', 'prc_season', 'extraProcessing', 'selectedContract', 'reference_no', 'selected_date', 'prid', 'provisionalPurpose', 'prpid', 'comments'));

        } else if (null !== Input::get('printprovisionalinstructions')) {
            $this->validate($request, ['country' => 'required', 'processing_season' => 'required',
            ]);

            $ref_no    = Input::get('ref_no');
            $TO = "NKG Export - Warehouse Department";
            $ATTENTION = "NELSON";
            $FROM = "Quality Department";
            $reference = Input::get('reference');
            $contractID = Input::get('contract');
            $contractNumber = SalesContract::where('id', '=', $contractID)->first();

            $date = null;

            $process_number = ProvisionalBulk::where('pbk_instruction_number', $ref_no)->first();
            if ($process_number == null) {
                $request->session()->flash('alert-warning', 'No such Provisional Bulk exists in the system!!');
                return View::make('processingprovisional', compact('id',
                    'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'ref_no', 'prc', 'processing_instruction', 'input_type', 'title', 'certs', 'StockStatus', 'other_instructions', 'instructions_checked', 'instructions_selected','prc_season', 'reference', 'contract', 'contractID', 'StockView','prdetails', 'prc_season', 'extraProcessing', 'selectedContract', 'reference_no', 'selected_date', 'prid', 'provisionalPurpose', 'prpid', 'comments'));                  
            }
      
            $reference = $process_number->pbk_reference_name;
            $date = $process_number->pbk_date;
            $date = date("m/d/Y", strtotime($date)); 
            $StockView = StockAndPurchased::where('process_number', $ref_no)->get();  


            if ($contractNumber != NULL) {
                $contractNumber = " - ".$contractNumber->sct_number;
            } else {
                $contractNumber = NULL;
            }            

            $process_type = "Provisional Bulking";
            $processes = Processes::where('id', $process_number->id)->first();

            if ($processes != null) {
                $process_instructions = ', and '.$processes->process_instructions;
                $process_other_instructions = $processes->process_other_instructions;
            } else {
                $process_instructions = null;
                $process_other_instructions = null;
            }
            


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

        } else if (null !== Input::get('printprovisionalitructionsprices')) {
            $this->validate($request, ['country' => 'required', 'processing_season' => 'required',
            ]);

            $ref_no    = Input::get('ref_no');
            $TO = "NKG Export - Warehouse Department";
            $ATTENTION = "NELSON";
            $FROM = "Quality Department";
            $reference = Input::get('reference');
            $contractID = Input::get('contract');
            $contractNumber = SalesContract::where('id', '=', $contractID)->first();

            $date = null;

            $process_number = ProvisionalBulk::where('pbk_instruction_number', $ref_no)->first();
            if ($process_number == null) {
                $request->session()->flash('alert-warning', 'No such Provisional Bulk exists in the system!!');
                return View::make('processingprovisional', compact('id',
                    'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'ref_no', 'prc', 'processing_instruction', 'input_type', 'title', 'certs', 'StockStatus', 'other_instructions', 'instructions_checked', 'instructions_selected','prc_season', 'reference', 'contract', 'contractID', 'StockView','prdetails', 'prc_season', 'extraProcessing', 'selectedContract', 'reference_no', 'selected_date', 'prid', 'provisionalPurpose', 'prpid', 'comments'));                  
            }
      
            $reference = $process_number->pbk_reference_name;
            $date = $process_number->pbk_date;
            $date = date("m/d/Y", strtotime($date)); 
            $StockView = StockAndPurchased::where('process_number', $ref_no)->get();  


            if ($contractNumber != NULL) {
                $contractNumber = " - ".$contractNumber->sct_number;
            } else {
                $contractNumber = NULL;
            }            

            $process_type = "Provisional Bulking";
            $processes = Processes::where('id', $process_number->id)->first();

            if ($processes != null) {
                $process_instructions = ', and '.$processes->process_instructions;
                $process_other_instructions = $processes->process_other_instructions;
            } else {
                $process_instructions = null;
                $process_other_instructions = null;
            }
            


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
            $prdetails = ProvisionalBulk::where('pbk_instruction_number', $ref_no)->first();


            if ($prdetails != null) {

                $prc                = $prdetails->prcss_id;
                $other_instructions = $prdetails->pbk_other_instructions;

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

                $date = $prdetails->pbk_date;
            }


            $StockView = StockAndPurchased::get();
            return View::make('processingprovisional', compact('id',
                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'ref_no', 'prc', 'processing_instruction', 'input_type', 'title', 'certs', 'StockStatus', 'other_instructions', 'instructions_checked', 'instructions_selected', 'StockView', 'prid','prc_season', 'reference', 'contract', 'contractID','prdetails', 'prc_season', 'extraProcessing', 'selectedContract', 'reference_no', 'selected_date', 'prid', 'provisionalPurpose', 'prpid', 'comments'));

        } else if (null !== Input::get('filter')) {

            $ref_no    = Input::get('ref_no');
            $prdetails = ProvisionalBulk::where('pbk_instruction_number', $ref_no)->first();

            if ($prdetails != null) {
                $prc                = $prdetails->prcss_id;
                $other_instructions = $prdetails->pbk_other_instructions;

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

            $query = StockAndPurchased::select('*');
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

            
            return View::make('processingprovisional', compact('id',
                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'ref_no', 'prc', 'processing_instruction', 'input_type', 'title', 'certs', 'StockStatus', 'other_instructions', 'instructions_checked', 'instructions_selected', 'StockView', 'sst', 'saleid', 'grade', 'bskt', 'crtid', 'prcf', 'prid','prc_season', 'reference', 'contract', 'contractID','prdetails', 'prc_season', 'extraProcessing', 'selectedContract', 'reference_no', 'selected_date', 'prid', 'provisionalPurpose', 'prpid', 'comments'));
        } else {
            $cid = Input::get('country');
            $csn_season = Input::get('sale_season');

            $StockView = StockAndPurchased::get();

            return View::make('processingprovisional', compact('id',
                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'ref_no', 'prc', 'processing_instruction', 'input_type', 'title', 'certs', 'StockStatus', 'other_instructions', 'instructions_checked', 'instructions_selected', 'StockView', 'prid','prc_season', 'reference', 'contract', 'contractID','prdetails', 'prc_season', 'extraProcessing', 'selectedContract', 'reference_no', 'selected_date', 'provisionalPurpose', 'prpid', 'comments'));
        }

    }

    public function getProcessingType ($ref_no)
    {
        $process_type = ProvisionalBulk::where('pbk_instruction_number',  $ref_no)->first();
        if ($process_type != null) {
            $process_type = $process_type->id;
        }
        

        return $process_type;
    }

    public function getContractType ($ref_no)
    {
        $contract_type = ProvisionalBulk::where('pbk_instruction_number',  $ref_no)->first();
        if ($contract_type != null) {
            $contract_type = $contract_type->sct_id;
        }        

        return $contract_type;
    }
    public function generateReferenceNumber ($prc, $contractID, $BULKING_PROCESS, $COUNTRY_INITIAL, $INTERNAL_BULK, $INTERNAL_BULK_INITIAL)
    {
        $reference_no = null;


            $processing_type = processing::where('id', $prc)->first();
            
            $reference_no = ProvisionalBulk::where('pbk_instruction_number', 'like', '%' . "KPB" . '%')->orderBy('pbk_instruction_number', 'asc')->pluck('pbk_instruction_number');

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
            $reference_no =  $COUNTRY_INITIAL."PB".sprintf("%04d", ($reference_no + 1));

        return $reference_no;
    }

    public function checkIFBulkWithNoContract ($prc, $contractID, $BULKING_PROCESS)
    {
        if ($prc == $BULKING_PROCESS && $contractID == null) {
            return redirect('processingprovisional')
                    ->withErrors("Please select a valid Contract!!")->withInput();
            return View::make('processingprovisional', compact('id', 'Season', 'country', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'ref_no', 'prc', 'processing_instruction', 'input_type', 'title', 'certs', 'StockStatus', 'date','prc_season', 'reference', 'contract', 'contractID','prdetails', 'extraProcessing', 'selectedContract', 'reference_no'));            
        }
    }
    public function getstockpurchasedview($countryID, $ref_no)
    {
        if ($countryID != null) {
            if($ref_no != null){
                $stockview = StockAndPurchased::select('*')->where('ctr_id', $countryID)->where('process_number', $ref_no)->orWhereNull('process_number')->whereNull('ended')->orderByRaw(DB::raw("FIELD(process_number, '$ref_no') DESC"));
            } else {
                $stockview = StockAndPurchased::select('*')->where('ctr_id', $countryID)->whereNull('ended')->whereNull('process_number');
            }

        } else {
            $stockview = null;
        }        


        return Datatables::of($stockview)
            ->make(true);
    }

 

}
