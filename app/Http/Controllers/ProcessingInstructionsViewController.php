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
use Ngea\Sales_Contract_Summary;

use Ngea\Person;
use Ngea\warehouses_region;
use Yajra\Datatables\Datatables;

use Ngea\StockProcessedView;

use Ngea\PreShipmentInvoice;

use Ngea\ProcessAllocation;

use Ngea\Breakdown_Without_Stuffed;
// use PDF;
use niklasravnsborg\LaravelPdf\Facades\Pdf as PDF;
use View;

use PdfReport;
use ExcelReport;

class ProcessingInstructionsViewController extends Controller
{

    public function processingInstructionsViewForm(Request $request)
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

        return View::make('processinginstructionsview', compact('id',
            'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'ref_no', 'certs', 'StockStatus'));

    }


    public function getprocessview()
    {
        $stockview = ProcessSummary::select('*')->whereNull('process_confirmed_by');


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
        $prdetails = Process::where('id', $id)->first();
        
        $BULKING_PROCESS = 4;
        $INTERNAL_BULK = 1;

        $wrhse = null;
        $ref_no    = null;

        $Season  = Season::all(['id', 'csn_season']);

        $country         = country::all(['id', 'ctr_name', 'ctr_initial']);
        $processing      = processing::all(['id', 'prcss_name']);

        $ref_no    = $prdetails->pr_instruction_number;
        $reference_no = $ref_no;

        if ($prdetails != null) {

            $prc = $prdetails->prcss_id;
            $other_instructions = $prdetails->pr_other_instructions;

            $cid = $prdetails->ctr_id;

            $contractID = $prdetails->sct_id;

            $contract = SalesContract::where('ctr_id', '=', $cid)->orderBy('id')->get();

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
        
    }


    public function pre_shipment($id)
    {   
        $prdetails = Process::where('id', $id)->first();

        $ref_no    = $prdetails->pr_instruction_number;

        $sales_contract_summary = Sales_Contract_Summary::where('pr_instruction_number', $ref_no)->first();


        // $ref_no = null;
        $description = null;
        $contract = null;
        $client = null;
        $bskt = null;
        $complementary = null;
        $packaging_method = null;
        $packaging_name = null;
        $packages = null;
        $status = null;
        $weight = null;
        $start_date = null;
        $end_date = null;
        $contract_date = null;


        if ($sales_contract_summary != null) {

            $description = $sales_contract_summary->sct_description;

            $contract = $sales_contract_summary->sct_number;

            $client = $sales_contract_summary->cl_name;

            $bskt = $sales_contract_summary->bs_code;

            $complementary = $sales_contract_summary->sct_complemantary_condition;

            $packaging_method = $sales_contract_summary->packaging_method;

            $packaging_name = $sales_contract_summary->pkg_name;

            $packages = $sales_contract_summary->sct_packages;

            $status = $sales_contract_summary->status;
            
            $weight = $sales_contract_summary->contract_weight;

            $ref_no = $sales_contract_summary->pr_instruction_number;


            if ($sales_contract_summary->sct_start_date != null) {
                $start_date = $sales_contract_summary->sct_start_date;
                $start_date = date("m/d/Y", strtotime($start_date));
            }


            if ($sales_contract_summary->sct_start_date != null) {
                $end_date = $sales_contract_summary->sct_end_date;
                $end_date = date("m/d/Y", strtotime($end_date));
            }


            if ($sales_contract_summary->sct_start_date != null) {
                $contract_date = $sales_contract_summary->sct_date;
                $contract_date = date("m/d/Y", strtotime($contract_date));
            }

        }

        if ($status == 'Stuffed') {
            $title = 'Allocations';
        } else {
            $title = 'Pre-Shipment Allocations';
        }
        

        // For displaying filters description on header
        $meta = [
            'Contract' => $contract,
            'Client' => $client,
            'Basket' => $bskt,
            'Description' => $description,
            'Weight' => $weight,
            'Packages' => $packages,
            'Start_date' => $start_date,
            'End_date' => $end_date,
            'Contract_date' => $contract_date,
            'Instruction' => $ref_no,
            'Packaging_method' => $packaging_method,
            'Packaging_name' => $packaging_name,
            'Complementary' => $complementary,
            'Status' => $status
        ];

        // print_r($ref_no)


        $query = Breakdown_Without_Stuffed::select('*', \DB::raw('SUM(weight) AS weight_total'))->where('status', 'like', '%' . $ref_no . '%')->groupBy('br_no', 'cg_name');

        $queryCheck = $query->get();

        if ($queryCheck->isEmpty()) {

            $stockview_all = StockViewALL::where("process_number", $ref_no)->first();

            $pending_process_all = $stockview_all->pending_process_all;

            $myArray = explode(',', $pending_process_all);

            foreach ($myArray as $key => $value) {

                $query = $this->allocation($value);

            }

        }



        // Do some querying..
        $queryBuilder = $query;

        // Set Column to be displayed
        $columns = [
            'Contract' => function($result) {
                return $result->br_no;
            },

            'Code' => function($result) {
                return $result->bs_code;
            },
            'Invoice From' => function($result) {
                return $result->cg_name;
            },
            'Weight' => function($result) {
                return $result->weight_total;
            }

        ];
        /*
            Generate Report with flexibility to manipulate column class even manipulate column value (using Carbon, etc).

            - of()         : Init the title, meta (filters description to show), query, column (to be shown)
            - editColumn() : To Change column class or manipulate its data for displaying to report
            - editColumns(): Mass edit column
            - showTotal()  : Used to sum all value on specified column on the last table (except using groupBy method). 'point' is a type for displaying total with a thousand separator
            - groupBy()    : Show total of value on specific group. Used with showTotal() enabled.
            - limit()      : Limit record to be showed
            - make()       : Will producing DomPDF / SnappyPdf instance so you could do any other DomPDF / snappyPdf method such as stream() or download()
        */
        return ExcelReport::of($title, $meta, $queryBuilder, $columns)
            ->editColumns(['total_cost','total_col', 'total_diff'], [
                'class' => 'hidden'
            ])
            ->setCss([
                '.hidden' => 'display: none;'
            ])

            ->editColumns(['Contract', 'Code', 'Invoice Number', 'Weight'], [
                'class' => 'right'
            ])
            ->showTotal([
                'Weight' => 'point'
            ])
            // ->groupBy('Seller')
            // ->stream(); // or download('filename here..') to download pdf
            ->download('allocations_'.$contract);
      
    }

    public function allocation($ref_no) { 

        $query = Breakdown_Without_Stuffed::select('*', \DB::raw('SUM(weight) AS weight_total'))->where('status', 'like', '%' . $ref_no . '%')->groupBy('br_no', 'cg_name');

        if ($query != null) {

           return ($query); 
            
        } 

        return null;

    }

    public function allocationByOrganization($ref_no) { 

        $query = Breakdown_Without_Stuffed::select('*', \DB::raw('SUM(weight) AS weight_total'))->where('status', 'like', '%' . $ref_no . '%')->groupBy('cg_organisation');

        if ($query != null) {

           return ($query); 
            
        } 

        return null;

    }

    public function pre_shipment_all($id)
    {   
        $prdetails = Process::where('id', $id)->first();

        $ref_no    = $prdetails->pr_instruction_number;

        $sales_contract_summary = Sales_Contract_Summary::where('pr_instruction_number', $ref_no)->first();


        // $ref_no = null;
        $sctid = null;
        $description = null;
        $contract = null;
        $client = null;
        $bskt = null;
        $complementary = null;
        $packaging_method = null;
        $packaging_name = null;
        $packages = null;
        $status = null;
        $weight = null;
        $approved_weight = null;
        $start_date = null;
        $end_date = null;
        $contract_date = null;
        $shipment = null;



        if ($sales_contract_summary != null) {

            $sctid = $sales_contract_summary->sctid;

            $description = $sales_contract_summary->sct_description;

            $contract = $sales_contract_summary->sct_number;

            $client = $sales_contract_summary->cl_name;

            $bskt = $sales_contract_summary->bs_code;

            $complementary = $sales_contract_summary->sct_complemantary_condition;

            $packaging_method = $sales_contract_summary->packaging_method;

            $packaging_name = $sales_contract_summary->pkg_name;

            $packages = $sales_contract_summary->sct_packages;

            $status = $sales_contract_summary->status;
            
            $weight = $sales_contract_summary->contract_weight;

            $approved_weight = $sales_contract_summary->sct_approved_weight;

            $ref_no = $sales_contract_summary->pr_instruction_number;

            $shipment = $sales_contract_summary->shipment;


            if ($sales_contract_summary->sct_start_date != null) {
                $start_date = $sales_contract_summary->sct_start_date;
                $start_date = date("m/d/Y", strtotime($start_date));
            }


            if ($sales_contract_summary->sct_start_date != null) {
                $end_date = $sales_contract_summary->sct_end_date;
                $end_date = date("m/d/Y", strtotime($end_date));
            }


            if ($sales_contract_summary->sct_start_date != null) {
                $contract_date = $sales_contract_summary->sct_date;
                $contract_date = date("m/d/Y", strtotime($contract_date));
            }

        }

        if ($status == 'Stuffed') {
            $title = 'Allocations';
        } else {
            $title = 'Pre-Shipment Allocations';
        }


        // For displaying filters description on header
        $meta = [
            'Contract' => $contract,
            'Client' => $client,
            'Basket' => $bskt,
            'Description' => $description,
            'Weight' => $weight,
            'Packages' => $packages,
            'Start_date' => $start_date,
            'End_date' => $end_date,
            'Contract_date' => $contract_date,
            'Instruction' => $ref_no,
            'Packaging_method' => $packaging_method,
            'Packaging_name' => $packaging_name,
            'Complementary' => $complementary,
            'Status' => $status
        ];

        $query = Breakdown_Without_Stuffed::select('*', \DB::raw('SUM(weight) AS weight_total, SUM(value) AS value_total'))->where('status', 'like', '%' . $ref_no . '%')->groupBy('br_no', 'cg_name');

        $queryCheck = $query->get();

        if ($queryCheck->isEmpty()) {

            $stockview_all = StockViewALL::where("process_number", $ref_no)->first();

            $pending_process_all = $stockview_all->pending_process_all;

            $myArray = explode(',', $pending_process_all);

            foreach ($myArray as $key => $value) {                

                $query = $this->allocation($value);

                $queryOrganisation = $this->allocationByOrganization($value);

            }

        } else {

            $queryOrganisation = Breakdown_Without_Stuffed::select('*', \DB::raw('SUM(weight) AS weight_total'))->where('status', 'like', '%' . $ref_no . '%')->groupBy('cg_organisation');

        }

        $getQuery = $query->get();

        $getQueryOrganisation = $queryOrganisation->get();   

        $sum_total = 0;

        $approved_weight = $approved_weight;

        if($approved_weight == null){

            $approved_weight = $weight;

        }

        foreach ($getQueryOrganisation as $key_org => $value_org) {

            $total_weight = 0;

            foreach ($getQuery as $keyg => $valueg) {

                if ($valueg->cg_organisation == $value_org->cg_organisation) {

                    $total_weight += $valueg->weight_total;

                }

            }

            if ($total_weight >= 60) {

                $sum_total += $total_weight;

            }

            

            $inv_no = $value_org->inv_no;

            if ($inv_no == null) {

                $pre_ship_details = PreShipmentInvoice::orderBy('id', 'desc')->first();                

                if ($pre_ship_details != null) {

                    $inv_no = $pre_ship_details->inv_no;

                    $inv_no = $inv_no + 1;

                } else {
                    
                    $inv_no = "1001";                    

                }

                PreShipmentInvoice::insert(
                    ['sct_id' => $sctid, 'cg_id' => $value_org->cg_id, 'inv_no' => $inv_no, 'weight' => $value_org->weight_total]);

            }

        }

        $pdf = PDF::loadView('pdf.print_pre_shipment_invoices', compact('getQueryOrganisation','getQuery', 'contract', 'client', 'sum_total', 'weight', 'approved_weight', 'shipment'));

        return $pdf->stream('print_pre_shipment_invoices.pdf');

    }

}