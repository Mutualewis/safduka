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
use Ngea\ProcessSummary;
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

use Ngea\ProvisionalSummary;

use Ngea\StockAndPurchased;
use Ngea\ProvisionalBulk;
use Ngea\ProvisionalAllocation;

// use PDF;
use niklasravnsborg\LaravelPdf\Facades\Pdf as PDF;
use View;

class ProcessingProvisionalViewController extends Controller
{

    public function processingProvisionalViewForm(Request $request)
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

        return View::make('processingprovisionalview', compact('id',
            'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'ref_no', 'certs', 'StockStatus'));
    }


    public function getprocessview()
    {
        $stockview = ProvisionalSummary::select('*')->whereNull('process_confirmed_by');

        return Datatables::of($stockview)
            ->make(true);
    }

    public function hooper($id)
    {   
        $Season = Season::all(['id', 'csn_season']);
        $country       = country::all(['id', 'ctr_name', 'ctr_initial']);
        $processing    = processing::all(['id', 'prcss_name']);

        $prdetails = Process::where('id', $id)->first();
        $ref_no    = $prdetails->pr_instruction_number;

        $cid = $prdetails->ctr_id;
        $prc_season = $prdetails->csn_id;


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
        
    }


    public function results($id)
    {   

        $wrhse = null;
        $ref_no    = null;

        $country         = country::all(['id', 'ctr_name', 'ctr_initial']);
        $processing      = processing::all(['id', 'prcss_name']);

        $get_process_results = ProcessResults::where('pr_id', $id)->first();
        $get_process = Process::where('id', $id)->first();
        $cid = $get_process->ctr_id;
        $prc = $get_process->prcss_id;
        $rfid = $id;

        $BULKING_PROCESS = 4;
        $INTERNAL_BULK = 1;

        $refno     = null;
        $StockView = null;

        $basket = basket::where('ctr_id', Input::get('country'))->get();
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
            $Warehouse = warehouses_region::where('ctr_id', $cid)->where('wrt_id', '1')->get();

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


        return View::make('processingresults', compact('id',
            'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'rfid', 'prc', 'processing_instruction', 'input_type', 'title', 'refno', 'resultsType', 'rtid', 'StockView', 'ProcessResults', 'wrhse', 'location', 'prdetails', 'isInBulk', 'batch_kilograms', 'packages', 'rtid', 'results_view'));
        
    }


    public function amend($id)
    {   
          // $prdetails = Process::where('id', $id)->first();
        

        // $id            = null;
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

        $wrhse = null;
        $ref_no    = null;

        
        $prdetails = ProvisionalBulk::where('id', $id)->first();

        $ref_no    = $prdetails->pbk_instruction_number;
        $reference_no    = $prdetails->pbk_instruction_number;

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
    }



    public function clear($id)
    {   
          // $prdetails = Process::where('id', $id)->first();
        

        $id            = $id;
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

        $wrhse = null;
        $ref_no    = null;

        
        $prdetails = ProvisionalBulk::where('id', $id)->first();
        
        $ref_no    = $prdetails->pbk_instruction_number;
        $reference_no    = $prdetails->pbk_instruction_number;



        $ProvisionalAllocation = ProvisionalAllocation::where('pbk_id', $id);    
        $ProvisionalAllocation->delete();

        $user_data = Auth::user();
        $user      = $user_data->id;

        ProvisionalBulk::where('id', '=', $id)
            ->update(['pbk_confirmed_by' => $user]);


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

        return View::make('processingprovisionalview', compact('id',
            'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'ref_no', 'certs', 'StockStatus'));

    }


}
