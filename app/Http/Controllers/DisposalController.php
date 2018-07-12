<?php namespace Ngea\Http\Controllers;

use Input;
use confirm;
use DB;
use ask;
use Illuminate\Http\Request;
use Ngea\Http\Controllers\Controller;
use View;
use Auth;
use Mail;

use Ngea\Parchment;
use Ngea\ParchmentType;
use Ngea\Growers;
use Ngea\CropType;
use Ngea\MillingStatus;
use Ngea\outturn_with_names;
use Ngea\bulk_outturn_with_names;
use Ngea\Season;
use Ngea\bulkoutturn;
use Ngea\CoffeeClass;
use Ngea\OutturnQuality;
use Ngea\QualityAnalysis;
use Ngea\clean_with_names;
use Yajra\Datatables\Datatables;

use Ngea\SaleStatus;
use Ngea\Stock;
use Ngea\CoffeeGrade;
use Ngea\SaleableStatus;
use Ngea\cleancoffee;
use Ngea\BagSizes;
use Ngea\PriceUnits;
use Ngea\PriceType;
use Ngea\CallFrom;
use Ngea\ContractUpdates;
use Ngea\User;


use Ngea\coffeewarrant;
use Ngea\buyer;
use Ngea\saleinfo;
use Ngea\SaleType;
use Ngea\Sale;
use Ngea\Packaging;

use Ngea\Stuffing;
use Ngea\StuffingView;
use Ngea\StockBreakdown;


use  Ngea\Warehouse;
use  Ngea\Weighbridge;

use Nayjest\Grids\Grid;
use Nayjest\Grids\Components\Base\RenderableRegistry;
use Nayjest\Grids\Components\ColumnHeadersRow;
use Nayjest\Grids\Components\ColumnsHider;
use Nayjest\Grids\Components\CsvExport;
use Nayjest\Grids\Components\ExcelExport;
use Nayjest\Grids\Components\Filters\DateRangePicker;
use Nayjest\Grids\Components\FiltersRow;
use Nayjest\Grids\Components\HtmlTag;
use Nayjest\Grids\Components\Laravel5\Pager;
use Nayjest\Grids\Components\OneCellRow;
use Nayjest\Grids\Components\RecordsPerPage;
use Nayjest\Grids\Components\RenderFunc;
use Nayjest\Grids\Components\ShowingRecords;
use Nayjest\Grids\Components\TFoot;
use Nayjest\Grids\Components\THead;
use Nayjest\Grids\Components\TotalsRow;
use Nayjest\Grids\DbalDataProvider;
use Nayjest\Grids\EloquentDataProvider;
use Nayjest\Grids\FieldConfig;
use Nayjest\Grids\FilterConfig;
use Nayjest\Grids\GridConfig;

use niklasravnsborg\LaravelPdf\Facades\Pdf as PDF;
use Activity;
use Excel;

use Ngea\country;
use Ngea\Months;
use Ngea\Years;


use Ngea\booking;
use Ngea\booking_with_names;
use Ngea\booking_items;
use Ngea\booking_items_with_names;
use Ngea\trading_months;
use Ngea\Mill;
use Ngea\mills_region;
use Ngea\warehouses_region;
use Ngea\Certification;
use Ngea\coffee_certification;
use Ngea\coffee_details;
use Ngea\seller;
use Ngea\sale_lots;
use Ngea\quality_parameters;
use Ngea\processing;
use Ngea\screens;
use Ngea\cupscore;
use Ngea\rawscore;
use Ngea\quality_details;
use Ngea\StockStatus;
use Ngea\Breakdown_Without_Stuffed;
use Ngea\Breakdown_Full;
use Ngea\StockViewALL;
use Ngea\StockViewStuffed;



use Ngea\greencomments;
use Ngea\direct_sale;
use Ngea\sale_status;
use Ngea\basket;
use Ngea\purchase;
use Ngea\Process;
use Ngea\ProcessAllocation;

use Ngea\Client;
use Ngea\Batch;
use Ngea\StockLocation;
use Ngea\SalesContract;
use Ngea\StockView;
use Ngea\Processes;
use Ngea\Person;



use Ngea\Sales_Contract_Summary;

use PdfReport;
use ExcelReport;

use delete;


class DisposalController extends Controller {

    public function salesContractForm (Request $request){
        $id = null;
        $Season = Season::all(['id', 'csn_season']);
        $country = country::all(['id', 'ctr_name', 'ctr_initial']);
        $client = Client::all(['id', 'cl_name']);

        $shipmentmonth = Months::all(['id', 'mth_name','mth_number']);
        $shipmentyear = Years::all(['id', 'yr_name','yr_number']);

        $SalesContract = SalesContract::select('*', \DB::raw('sct_number AS sct_number'))->orderBy('id', 'desc')->first();

        return View::make('salescontract', compact('id', 'Season', 'country', 'shipmentmonth','client', 'shipmentyear', 'SalesContract'));

    }


    public function salesContract (Request $request){
        $id = null;
        $Season = Season::all(['id', 'csn_season']);
        $country = country::all(['id', 'ctr_name', 'ctr_initial']);
        // $client = Client::all(['id', 'cl_name']);
        $client = Client::select('*')->orderBy('cl_name')->get();
        $basket = basket::where('ctr_id', Input::get('country'))->orderBy('bs_code')->get();

        $bagSizes = BagSizes::all(['id', 'bgs_size']);
        $priceUnits = PriceUnits::all(['id', 'pu_units']);
        $priceType = PriceType::all(['id', 'pt_type']);
        $tradingMonths = trading_months::all(['id', 'trm_code']);
        $callFrom = CallFrom::all(['id', 'cf_name']);

        $fixation_month_id = Input::get('fixation_month');
        $price_type_id = Input::get('price_type');
        $price_units_id = Input::get('price_units');
        $bag_size_id = Input::get('bag_size');
        $call_from_id = Input::get('call_from');
        $cancel = Input::get('cancel');
        $destination = Input::get('destination');
        $price = Input::get('price');

 
        $Packaging = Packaging::all(['id', 'pkg_name']);

        $cid = Input::get('country');
        $contract = Input::get('contract');
        $packaging_method = Input::get('packaging_method');
        $packaging_type = Input::get('packaging');
    
        $description = Input::get('description');
        $packages = Input::get('packages');
        $clid = Input::get('client');
        $spid = Input::get('shipmonth');
        
        $bskt = Input::get('basket');

        $client_reference = Input::get('client_reference');

        // $basket = basket::where('ctr_id', Input::get('country'))->get();

        $user_data = Auth::user();
        $user      = $user_data->id;
        
        $weight_note_no = Input::get('weight_note_no');
        $wbtk = Input::get('weighbridgeTK');
        $weight_staffed = Input::get('weight_staffed');
        $date    = Input::get('date');
        $date    = date_create($date);
        $date    = date_format($date, "Y-m-d");
        $container_number = Input::get('container_number');
        $shipper = Input::get('shipper');


        $disposaldate = Input::get('date');
        $disposaldate=date_create($disposaldate);
        $disposaldate = date_format($disposaldate,"Y-m-d"); 



        $start_date = Input::get('date_second');
        $start_date=date_create($start_date);
        $start_date = date_format($start_date,"Y-m-d"); 

        $end_date = Input::get('date_third');
        $end_date=date_create($end_date);
        $end_date = date_format($end_date,"Y-m-d"); 


        $contract_date = Input::get('date_fourth');
        $contract_date=date_create($contract_date);
        $contract_date = date_format($contract_date,"Y-m-d"); 

        $shipmentmonth = Months::all(['id', 'mth_name','mth_number']);
        $shipmentyear = Years::all(['id', 'yr_name','yr_number']);

        $weighbridge_ticket = Weighbridge::where('ctr_id', Input::get('country'))->get();    

        $SalesContractSummary = Sales_Contract_Summary::where('sct_number', Input::get('contract'))->get();


        // $weighbridge_ticket = Weighbridge::where('ctr_id', Input::get('country'))->where(DB::Raw('LEFT(wb_time_in, 10)'), date("Y-m-d"))->orWhere('id', 1)->get(); 
        $sctID= null;
        if ($contract != null) {
            $sctID = SalesContract::where('sct_number', $contract)->first();
            if ($sctID != null) {
                $sctID= $sctID->id;
            }
            
        }
        $created_by = null;
        $created_on = null;
        $updated_by = null;
        $updated_on = null;

        $created_by = ContractUpdates::where('sct_id', $sctID)->orderBy('created_at', 'asc')->first();

        if ($created_by != null) {
            $created_on = $created_by->created_at;
            $created_by = $created_by->usr_id;
            $created_by = User::where('id', $created_by)->first();
            $created_by = $created_by->usr_name;

        }

        $updated_by = ContractUpdates::where('sct_id', $sctID)->orderBy('created_at', 'desc')->first();

        if ($updated_by != null) {
            $updated_on = $updated_by->created_at;
            $updated_by = $updated_by->usr_id;
            $updated_by = User::where('id', $updated_by)->first();
            $updated_by = $updated_by->usr_name;

        }

        $syrid = Input::get('shipyear');
        $complimentarycondition = Input::get('complimentarycondition');

        $weight = Input::get('weight');

        $approved_weight = Input::get('approved_weight');

        $stid_get = Input::get('stid');

        $StuffingView = StuffingView::where('sct_id', $sctID)->get();

        if (NULL !== Input::get('createsalescontract')){

            $bags_ = BagSizes::where('bgs_size', $bag_size_id)->first();

            if ($bags_ != null) {

                $bags_ = $bags_->id;

            }

            $SalesContract = SalesContract::where('ctr_id', '=', $cid)->where('sct_number',  $contract)->first();

            if ($SalesContract !== NULL){

                if ($clid == NULL) {
                    $clid = $SalesContract->cl_id;
                }

                $sctID = $SalesContract->id;

                $SalesContract_shipment = SalesContract::where('id', $sctID)->first();

                $SalesContract_shipment = $SalesContract_shipment->sct_shipment;

                if ($SalesContract_shipment == null) {

                    $SalesContract_shipment = $this->getShipmentNumber($cid);

                }
                
                SalesContract::where('id', '=', $SalesContract->id)
                            ->update(['ctr_id' => $cid, 'cl_id' => $clid, 'sct_number' => $contract, 'sct_description' => $description, 'sct_packages' => $packages, 'sct_packaging_method' => $packaging_method, 'pkg_id' => $packaging_type, 'bs_id' => $bskt, 'sct_month'=>$spid, 'yr_id'=>$syrid, 'sct_complemantary_condition'=>$complimentarycondition, 'sct_weight'=>$weight, 'sct_start_date'=>$start_date, 'sct_end_date'=>$end_date, 'sct_date'=>$contract_date, 'sct_client_reference'=>$client_reference, 'bgs_id'=>$bags_, 'pu_id'=>$price_units_id, 'pt_id'=>$price_type_id, 'sct_cancelled'=>$cancel, 'trm_id'=>$fixation_month_id, 'cf_id'=>$call_from_id, 'sct_destination' => $destination, 'sct_price' => $price, 'sct_shipment' => $SalesContract_shipment, 'sct_approved_weight' => $approved_weight]);

                $request->session()->flash('alert-success', 'Sales Contract Information Updated!!');
                Activity::log('Updated SalesContract ctr_id '. $cid. ' cl_id '. $clid. ' sct_number '. $contract. ' sct_description '. $description.' sct_packages '.$packages.' packaging_method '.$packaging_method.' packaging_type '.$packaging_type.' bskt '.$bskt.' spid '.$spid. ' sct_start_date '.$start_date. ' sct_end_date '.$end_date. ' sct_date '.$contract_date);

            } else {

                $SalesContract_shipment = $this->getShipmentNumber($cid);

                $sctID = SalesContract::insertGetId(
                    ['ctr_id' => $cid, 'cl_id' => $clid, 'sct_number' => $contract, 'sct_description' => $description, 'sct_packages' => $packages, 'sct_packaging_method' => $packaging_method, 'pkg_id' => $packaging_type, 'bs_id' => $bskt, 'sct_month'=>$spid, 'yr_id'=>$syrid, 'sct_complemantary_condition'=>$complimentarycondition, 'sct_weight'=>$weight, 'sct_start_date'=>$start_date, 'sct_end_date'=>$end_date, 'sct_date'=>$contract_date, 'sct_client_reference'=>$client_reference, 'bgs_id'=>$bags_, 'pu_id'=>$price_units_id, 'pt_id'=>$price_type_id, 'sct_cancelled'=>$cancel, 'trm_id'=>$fixation_month_id, 'cf_id'=>$call_from_id, 'sct_destination' => $destination, 'sct_price' => $price, 'sct_user' => $user, 'sct_shipment' => $SalesContract_shipment, 'sct_approved_weight' => $approved_weight]);

                $request->session()->flash('alert-success', 'Sales Contract Information Added!!');
                Activity::log('Added SalesContract ctr_id '. $cid. ' cl_id '. $clid. ' sct_number '. $contract. ' sct_description '. $description.' sct_packages '.$packages.' packaging_method '.$packaging_method.' packaging_type '.$packaging_type.' bskt '.$bskt. ' sct_start_date '.$start_date. ' sct_end_date '.$end_date. ' sct_date '.$contract_date );
            }

            ContractUpdates::insert(
                    ['sct_id' => $sctID, 'usr_id' => $user]);

            if ($weight_note_no != null) {
                Stuffing::insert(
                    ['sct_id' => $sctID, 'stff_weight_note' => $weight_note_no, 'wb_id' => $wbtk, 'shpr_id' => $shipper, 'stff_weight' => $weight_staffed, 'stff_date' => $date, 'stff_container' => $container_number]);

                Activity::log('Added Stuffing sctID '. $sctID. ' weight_note_no '. $weight_note_no. ' wbtk '. $wbtk. ' shipper '. $shipper. ' weight_staffed '. $weight_staffed.' date '.$date.' container_number '.$container_number);
            }
            $SalesContract = SalesContract::where('ctr_id', '=', $cid)->where('sct_number',  $contract)->first();
            $StuffingView = StuffingView::where('sct_id', $sctID)->get();

            $disposaldate = Input::get('disposaldate');

            return View::make('salescontract', compact('id', 'Season', 'country', 'cid', 'contract', 'shipmentmonth','client', 'clid', 'spid', 'disposaldate', 'description', 'packages', 'bskt', 'basket', 'Packaging', 'packaging_method', 'packaging_type', 'weighbridge_ticket','StuffingView', 'shipmentyear', 'syrid', 'SalesContract', 'SalesContractSummary', 'client_reference', 'bagSizes', 'priceUnits', 'priceType', 'tradingMonths', 'fixation_month_id', 'price_type_id', 'price_units_id', 'bag_size_id', 'callFrom', 'call_from_id', 'destination', 'price', 'created_by', 'created_on', 'updated_by', 'updated_on'));

        } else if (NULL !== Input::get('printcontractsummary')) {
                $this->validate($request, ['country' => 'required',
                                ]);
                
                $contract = Input::get('contract');

                $sales_contract_summary = Sales_Contract_Summary::where('sct_number', $contract)->first();

                $SalesContract = SalesContract::where('sct_number', $contract)->first();

                $description = $sales_contract_summary->sct_description;
                $bskt = $sales_contract_summary->bs_code;
                $client = $sales_contract_summary->cl_name;
                $packages = $sales_contract_summary->sct_packages;
                $weight = $sales_contract_summary->contract_weight;

                if ($sales_contract_summary->sct_start_date != null) {
                    $start_date = $sales_contract_summary->sct_start_date;
                    $start_date = date("d/m/Y", strtotime($start_date));
                }


                if ($sales_contract_summary->sct_start_date != null) {
                    $end_date = $sales_contract_summary->sct_end_date;
                    $end_date = date("d/m/Y", strtotime($end_date));
                }


                if ($sales_contract_summary->sct_start_date != null) {
                    $contract_date = $sales_contract_summary->sct_date;
                    $contract_date = date("d/m/Y", strtotime($contract_date));
                }

                $instruction_number = $sales_contract_summary->pr_instruction_number;
                $complimentarycondition = $sales_contract_summary->sct_complemantary_condition;
                $packaging_method = $sales_contract_summary->packaging_method;
                $packaging_name = $sales_contract_summary->pkg_name;


                $fixation_month = $SalesContract->trm_id;
                $fixation_month = trading_months::where('id', $fixation_month)->first();
                if ($fixation_month != null) {

                    $fixation_month = $fixation_month->trm_code;

                }
                $price_type = $SalesContract->pt_id;
                $price_type = PriceType::where('id', $price_type)->first();
                if ($price_type != null) {
                    $price_type = $price_type->pt_type;
                }
                $price_units = $SalesContract->pu_id;
                $price_units = PriceUnits::where('id', $price_units)->first();
                if ($price_units != null) {
                    $price_units = $price_units->pu_units;
                }
                $bag_size = $SalesContract->bgs_id;
                $bag_size = BagSizes::where('id', $bag_size)->first();

                if ($bag_size != null) {

                    $bag_size = $bag_size->bgs_size;

                }

                $destination = $SalesContract->sct_destination;

                $price = $SalesContract->sct_price;

                $call_from = $SalesContract->cf_id;

                $call_from = CallFrom::where('id', $call_from)->first();

                if ($call_from != null) {

                    $call_from = $call_from->cf_name;

                }                

                $cancelled = $SalesContract->sct_cancelled;

                $status = $sales_contract_summary->status;
               

                $client_reference = $sales_contract_summary->sct_client_reference;

               
                $pdf = PDF::loadView('pdf.print_contract_summary', compact('contract', 'description', 'bskt', 'client', 'packages', 'weight', 'start_date', 'end_date', 'contract_date', 'instruction_number', 'complimentarycondition', 'packaging_method', 'packaging_name', 'status', 'client_reference', 'fixation_month', 'price_type', 'price_units', 'bag_size', 'destination', 'price', 'call_from', 'cancelled'));

                return $pdf->stream($contract.' print_contract_summary.pdf');


        }  else if (null !== Input::get('printinstruction')) {
            $this->validate($request, ['country' => 'required', 
            ]);

            $contract = Input::get('contract');
            $sales_contract_summary = Sales_Contract_Summary::where('sct_number', $contract)->first();


            $description = $sales_contract_summary->sct_description;
            $bskt = $sales_contract_summary->bs_code;
            $client = $sales_contract_summary->cl_name;
            $packages = $sales_contract_summary->sct_packages;
            $weight = $sales_contract_summary->contract_weight;

            if ($sales_contract_summary->sct_start_date != null) {
                $start_date = $sales_contract_summary->sct_start_date;
                $start_date = date("d/m/Y", strtotime($start_date));
            }


            if ($sales_contract_summary->sct_start_date != null) {
                $end_date = $sales_contract_summary->sct_end_date;
                $end_date = date("d/m/Y", strtotime($end_date));
            }


            if ($sales_contract_summary->sct_start_date != null) {
                $contract_date = $sales_contract_summary->sct_date;
                $contract_date = date("d/m/Y", strtotime($contract_date));
            }

            $instruction_number = $sales_contract_summary->pr_instruction_number;
            $complimentarycondition = $sales_contract_summary->sct_complemantary_condition;
            $packaging_method = $sales_contract_summary->packaging_method;
            $packaging_name = $sales_contract_summary->pkg_name;

            $status = $sales_contract_summary->status;
           

            $client_reference = $sales_contract_summary->sct_client_reference;
            
            $TO = "NKG Export - Warehouse Department";
            $ATTENTION = "NELSON";
            $FROM = "Quality Department";
            $reference = Input::get('reference');
            $contractID = Input::get('contract');
            $contractNumber = SalesContract::where('id', '=', $contractID)->first();
            if ($contractNumber != null) {
                $reference = $contractNumber->sct_description;
            }

            $ref_no = $instruction_number;
            
            // $this->checkIFBulkWithNoContract($prc, $contractID, $BULKING_PROCESS);

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


            $process_number = Process::where('pr_instruction_number', $ref_no)->first();
            if ($process_number == null) {
                $request->session()->flash('alert-warning', 'No such process!!');
                return View::make('salescontract', compact('id',
                    'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'ref_no', 'prc', 'processing_instruction', 'input_type', 'title', 'certs', 'StockStatus', 'other_instructions', 'instructions_checked', 'instructions_selected','prc_season', 'reference', 'contract', 'contractID', 'StockView','prdetails', 'prc_season', 'extraProcessing', 'selectedContract', 'reference_no', 'selected_date', 'bagSizes', 'priceUnits', 'priceType', 'tradingMonths', 'fixation_month_id', 'price_type_id', 'price_units_id', 'bag_size_id', 'callFrom', 'call_from_id', 'destination', 'price', 'created_by', 'created_on', 'updated_by', 'updated_on'));                  
            }
      
            // $reference = $process_number->pr_reference_name;
            $date = $process_number->pr_date;
            $date = date("m/d/Y", strtotime($date)); 
            $StockView = StockViewStuffed::where('prcssid', $process_number->id)->get();  


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

        }  else if (NULL !== Input::get('printallocation')) {


            $this->validate($request, ['country' => 'required',
                                ]);

            $contract = Input::get('contract');
           
            $sales_contract_summary = Sales_Contract_Summary::where('sct_number', $contract)->first();

            $ref_no = null;
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


            if ($status == "Stuffed") {
            
               $query = Breakdown_Full::select('*', \DB::raw('if(status = "Stuffed", SUM(stuffed_weight), SUM(weight)) AS weight_total'))->where('sct_number',  $contract)->where('prt_name', 'Bulk')->groupBy('br_no');

            } else {
                
               $query = Breakdown_Full::select('*', \DB::raw('if(status = "Stuffed", SUM(stuffed_weight), SUM(weight)) AS weight_total'))->where('sct_number',  $contract)->where('prt_name', 'Bulk')->groupBy('br_no', 'cg_name');

            }


            // Do some querying..
            $queryBuilder = $query;


            if ($status != "Stuffed") {
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
                    },
                    'Price' => function($result) {
                        return $result->price;
                    },
                    'Value' => function($result) {
                        return $result->value;
                    }

                ];
                
            } else {
                // Set Column to be displayed
                $columns = [
                    'Contract' => function($result) {
                        return $result->br_no;
                    },

                    'Code' => function($result) {
                        return $result->bs_code;
                    },
                    'Weight' => function($result) {
                        return $result->weight_total;
                    },
                    'Price' => function($result) {
                        return $result->price;
                    },
                    'Value' => function($result) {
                        return $result->value;
                    }

                ];
            }
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
                    'Weight' => 'point','Value' => 'point'
                ])
                // ->groupBy('Seller')
                // ->stream(); // or download('filename here..') to download pdf
                ->download('allocations_'.$contract);
              


        } else if(NULL !== Input::get('searchButtonContract')){

            $SalesContract = SalesContract::where('ctr_id', '=', $cid)->where('sct_number',  $contract)->first();

            if ($SalesContract !== NULL){
                if ($clid == NULL) {
                    $clid = $SalesContract->cl_id;
                }
            }

            $request->session()->flash('alert-success', 'Sales Contract Information Found!!');
            return View::make('salescontract', compact('id', 'Season', 'country', 'cid', 'contract', 'shipmentmonth','client', 'clid', 'spid', 'date', 'disposaldate', 'description', 'packages', 'SalesContract', 'bskt', 'basket', 'Packaging', 'packaging_method', 'packaging_type', 'weighbridge_ticket','StuffingView', 'shipmentyear', 'syrid', 'SalesContractSummary', 'client_reference', 'bagSizes', 'priceUnits', 'priceType', 'tradingMonths', 'fixation_month_id', 'price_type_id', 'price_units_id', 'bag_size_id', 'callFrom', 'call_from_id', 'destination', 'price', 'created_by', 'created_on', 'updated_by', 'updated_on'));

        } else {

            $SalesContract = SalesContract::where('ctr_id', '=', $cid)->where('sct_number',  $contract)->first();

            if ($SalesContract !== NULL){
                if ($clid == NULL) {
                    $clid = $SalesContract->cl_id;
                }
            }

            return View::make('salescontract', compact('id', 'Season', 'country', 'cid', 'contract', 'shipmentmonth','client', 'clid', 'spid', 'date', 'disposaldate', 'description', 'packages', 'SalesContract', 'bskt', 'basket', 'Packaging', 'packaging_method', 'packaging_type', 'weighbridge_ticket','StuffingView', 'shipmentyear', 'syrid', 'SalesContractSummary', 'client_reference', 'bagSizes', 'priceUnits', 'priceType', 'tradingMonths', 'fixation_month_id', 'price_type_id', 'price_units_id', 'bag_size_id', 'callFrom', 'call_from_id', 'destination', 'price', 'created_by', 'created_on', 'updated_by', 'updated_on'));
        }


    }
    public function getShipmentNumber ($cid){

        $shipment_number = 0;

        $shipment_number = SalesContract::where('ctr_id', '=', $cid)->orderBy('sct_shipment', 'desc')->first();        

        if ($shipment_number != null) {

            $shipment_number = $shipment_number->sct_shipment + 1;

        } else {

            $shipment_number = "1001";

        }   

        return $shipment_number;

    }
    public function getStockID ($process_id){

        $stock_processes = Stock::where('pr_id', $process_id)->get();
        foreach ($stock_processes as $key => $value) {
            if ($value->prt_id != null) {
                $process_id = Process::where('pr_instruction_number', $value->st_outturn)->first();
                $process_id = $process_id->id;
                $this->getStockID($process_id);
                print_r("<strong>".$value->st_outturn."-".$value->st_net_weight."</strong><br>");

            } else {
                $stock_breakdown = StockBreakdown::where('st_id', $value->id)->get();
                // $stock_breakdown .= purchase::where('id', $value->pr_id)->get();
                // foreach ($stock_breakdown as $sbkey => $sbvalue) {

                // }
                // $allocated = ProcessAllocation::where()-get();

                $allocated = ProcessAllocation::where('st_id', $value->id)->first();
                print_r($value->id."-".$allocated->pall_allocated_weight."<br>");                
            }
            
        }
    }

    public function allocateForm (Request $request){
        $id = NULL;
        $Season = Season::all(['id', 'csn_season']);
        $country = country::all(['id', 'ctr_name', 'ctr_initial']);
        $CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
        $Certification = Certification::all(['id', 'crt_name']);
        $buyer = buyer::all(['id', 'cb_name']);     
        $processing = processing::all(['id', 'prcss_name']);
        $StockStatus = StockStatus::all(['id', 'sts_name']);


        $sale_status = sale_status::all(['id', 'sst_name']);
        $Warehouse = NULL;
        $Mill = NULL;

        $cid = NULL;
        $csn_season = NULL;
        $sale_cb_id = NULL;
        $release_no = NULL;
        $date = NULL;
        $release_no = NULL;

        $ref_no = NULL;

        $certs = NULL;


        return View::make('allocate', compact('id', 
                'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'ref_no', 'certs', 'StockStatus'));    

    }


    public function allocate (Request $request){
        $id = NULL;
        $Season = Season::all(['id', 'csn_season']);
        $country = country::all(['id', 'ctr_name', 'ctr_initial']);
        $CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
        $Certification = Certification::all(['id', 'crt_name']);
        $buyer = buyer::all(['id', 'cb_name']);     
        $processing = processing::all(['id', 'prcss_name']);
        $StockStatus = StockStatus::all(['id', 'sts_name']);
        $sale_status = sale_status::all(['id', 'sst_name']);

        $cid = Input::get('country');
        $scid = Input::get('contract');
        $SalesContract = NULL;
     
        $csn_season = Input::get('season');
        if (NULL !== $cid){
            $SalesContract = SalesContract::where('ctr_id', '=', $cid)->whereNull('sct_shipped')->get();
        }
        if (NULL !== Input::get('submitinstruction')){
     
        } else if(NULL !== Input::get('filter')){      
            $ref_no = Input::get('ref_no');  
            $prdetails = Process::where('pr_instruction_number', $ref_no)->first();  

            if ($prdetails != NULL) {
                $prc = $prdetails->prcss_id;  
                $other_instructions = $prdetails->pr_other_instructions;

                $processing_instruction = processing_instruction::where('prcss_id', $prc)->get();
                if (isset($processing_instruction)) {
                    foreach ($processing_instruction->all() as $value) {
                        $input_type = $value->prg_input_type;
                        $title = ucwords($value->prg_instruction);

                    }
                }


                $prid = $prdetails->id;
                $pridetails = ProcessInstructions::where('pr_id', $prid)->get();

                $instructions_checked = array();

                if (count($pridetails) > 1) { 
                    foreach ($pridetails as $key => $value) {
                        $instructions_checked [] = $value->pri_id;
                    }               
                } else {
                    foreach ($pridetails as $key => $value) {
                        $instructions_selected = $value->pri_id;
                    }                   
                }
            }

            $sst = Input::get('st_status');
            $csn_season = Input::get('season');
            $saleid = Input::get('sale');
            $grade = Input::get('coffee_grade');
            $bskt = Input::get('basket');
            $crtid = Input::get('certification');
            $prcf = Input::get('process_type_filter');

            $csn_season = Season::where('id', $csn_season)->first();
            $saleid = Sale::where('id', $saleid)->first();

            $query = StockView::select('*');
            if ($csn_season != NULL && $csn_season != "Season") {
                $csn_season = $csn_season->csn_season;
                $query = $query->where('csn_season',$csn_season);
            }
            if ($sst != NULL) {
                $query = $query->where('sts_id',$sst);
            }
            if ($sst != NULL) {
                $query = $query->where('sts_id',$sst);
            }
            if ($saleid != NULL) {
                $saleid = $saleid->sl_no;
                $query = $query->where('sale',$saleid);
            }
            if ($grade != NULL) {
                $query = $query->where('grade',$grade);
            }
            if ($bskt != NULL) {
                $query = $query->where('code',$bskt);
            }
            if ($crtid != NULL) {
                $query = $query->where('cert','like','%'.$crtid.'%');
            }
            if ($prcf != NULL && $prcf != 0) {
                $query = $query->where('prcssid',$prcf);
            }
            $csn_season = Input::get('season');
            $saleid = Input::get('sale');
            $StockView = $query->get();


        
            return View::make('allocate', compact('id', 
                'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'ref_no', 'prc', 'processing_instruction', 'input_type', 'title', 'certs', 'StockStatus', 'other_instructions', 'instructions_checked', 'instructions_selected', 'StockView', 'sst', 'saleid', 'grade', 'bskt', 'crtid', 'prcf', 'prid')); 
        } else {
            $StockView = StockView::get();
            return View::make('allocate', compact('id', 
                    'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'ref_no', 'certs', 'StockStatus', 'SalesContract', 'cid', 'scid', 'StockView'));   
        }

  
    }






    public function confirmAllocationsForm (Request $request){
        $id = null;
        $Season = Season::all(['id', 'csn_season']);
        $country = country::all(['id', 'ctr_name', 'ctr_initial']);
        $client = Client::all(['id', 'cl_name']);

        $shipmentmonth = Months::all(['id', 'mth_name','mth_number']);
        $shipmentyear = Years::all(['id', 'yr_name','yr_number']);
        return View::make('confirmallocations', compact('id', 'Season', 'country', 'shipmentmonth','client', 'shipmentyear'));

    }


    public function confirmAllocations (Request $request){

        $country = country::all(['id', 'ctr_name', 'ctr_initial']);

        $cid = Input::get('country');

        $contract = Input::get('contract');

        $status = null;        

        $user_data = Auth::user();

        $user = $user_data->id;

        $sales_contract_summary = Sales_Contract_Summary::where('sct_number', $contract)->first();

        if ($sales_contract_summary != null) {

            $status = $sales_contract_summary->status;

        }

        $allocations = null;
        
        if ($status == "Stuffed") {
        
           $allocations = Breakdown_Full::select('*', \DB::raw('if(status = "Stuffed", SUM(stuffed_weight), SUM(weight)) AS weight_total'))->where('sct_number',  $contract)->where('prt_name', 'Bulk')->groupBy('br_no')->get();

        }

        if (NULL !== Input::get('confirmallocations')) {

            $this->validate($request, [
                'country' => 'required', 'contract' => 'required',
            ]);

            $contracts = Input::get('contracts');

            foreach ($contracts as $value) {

                $bricWeight = Input::get('bricWeight' . $value);

                StockBreakdown::where('id', '=', $value)
                        ->update(['stb_bric_bags' => $bricWeight]);

            }

            $SalesContract = SalesContract::where('ctr_id', '=', $cid)->where('sct_number',  $contract)->first();

            ContractUpdates::insert(
                    ['sct_id' => $SalesContract->id, 'usr_id' => $user]);

            SalesContract::where('id', $SalesContract->id)
                        ->update(['sct_bric_confirmed' => $user]);


            if ($status == "Stuffed") {
            
               $allocations = Breakdown_Full::select('*', \DB::raw('if(status = "Stuffed", SUM(stuffed_weight), SUM(weight)) AS weight_total'))->where('sct_number',  $contract)->where('prt_name', 'Bulk')->groupBy('br_no')->get();

            }

            

            $request->session()->flash('alert-success', 'Sales Contract Information Added Successfully!!');
            return View::make('confirmallocations', compact('id', 'Season', 'country', 'cid', 'contract', 'shipmentmonth','client', 'clid', 'spid', 'date', 'disposaldate', 'description', 'packages', 'SalesContract', 'bskt', 'basket', 'Packaging', 'packaging_method', 'packaging_type', 'weighbridge_ticket','StuffingView', 'shipmentyear', 'syrid', 'SalesContractSummary', 'client_reference', 'bagSizes', 'priceUnits', 'priceType', 'tradingMonths', 'fixation_month_id', 'price_type_id', 'price_units_id', 'bag_size_id', 'callFrom', 'call_from_id', 'destination', 'price', 'created_by', 'created_on', 'updated_by', 'updated_on', 'allocations'));

        } else if(NULL !== Input::get('searchButtonContract')){

            $SalesContract = SalesContract::where('ctr_id', '=', $cid)->where('sct_number',  $contract)->first();

            $request->session()->flash('alert-success', 'Sales Contract Information Found!!');
            return View::make('confirmallocations', compact('id', 'Season', 'country', 'cid', 'contract', 'shipmentmonth','client', 'clid', 'spid', 'date', 'disposaldate', 'description', 'packages', 'SalesContract', 'bskt', 'basket', 'Packaging', 'packaging_method', 'packaging_type', 'weighbridge_ticket','StuffingView', 'shipmentyear', 'syrid', 'SalesContractSummary', 'client_reference', 'bagSizes', 'priceUnits', 'priceType', 'tradingMonths', 'fixation_month_id', 'price_type_id', 'price_units_id', 'bag_size_id', 'callFrom', 'call_from_id', 'destination', 'price', 'created_by', 'created_on', 'updated_by', 'updated_on', 'allocations'));

        } else {

            $SalesContract = SalesContract::where('ctr_id', '=', $cid)->where('sct_number',  $contract)->first();

            return View::make('confirmallocations', compact('id', 'Season', 'country', 'cid', 'contract', 'shipmentmonth','client', 'clid', 'spid', 'date', 'disposaldate', 'description', 'packages', 'SalesContract', 'bskt', 'basket', 'Packaging', 'packaging_method', 'packaging_type', 'weighbridge_ticket','StuffingView', 'shipmentyear', 'syrid', 'SalesContractSummary', 'client_reference', 'bagSizes', 'priceUnits', 'priceType', 'tradingMonths', 'fixation_month_id', 'price_type_id', 'price_units_id', 'bag_size_id', 'callFrom', 'call_from_id', 'destination', 'price', 'created_by', 'created_on', 'updated_by', 'updated_on', 'allocations'));
        }

    }





    public function PendingAllocationsForm(Request $request)
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

        return View::make('pendingallocations', compact('id',
            'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'ref_no', 'certs', 'StockStatus'));

    }


    public function getpendinginstructions()
    {
        $salesContracts = Sales_Contract_Summary::select('*')->whereNotNull('stuffed_weight')->whereNull('sct_bric_confirmed')->orderBy('created_at', 'desc');


        return Datatables::of($salesContracts)
            ->make(true);
    }

    public function update($id)
    {   

        $SalesContract = SalesContract::where('id', '=', $id)->first();

        $country = country::all(['id', 'ctr_name', 'ctr_initial']);

        $cid = $SalesContract->ctr_id;

        $contract = $SalesContract->sct_number;

        $allocations = Breakdown_Full::select('*', \DB::raw('if(status = "Stuffed", SUM(stuffed_weight), SUM(weight)) AS weight_total'))->where('sct_number',  $contract)->where('prt_name', 'Bulk')->groupBy('br_no')->get();

        return View::make('confirmallocations', compact('id', 'Season', 'country', 'cid', 'contract', 'shipmentmonth','client', 'clid', 'spid', 'date', 'disposaldate', 'description', 'packages', 'SalesContract', 'bskt', 'basket', 'Packaging', 'packaging_method', 'packaging_type', 'weighbridge_ticket','StuffingView', 'shipmentyear', 'syrid', 'SalesContractSummary', 'client_reference', 'bagSizes', 'priceUnits', 'priceType', 'tradingMonths', 'fixation_month_id', 'price_type_id', 'price_units_id', 'bag_size_id', 'callFrom', 'call_from_id', 'destination', 'price', 'created_by', 'created_on', 'updated_by', 'updated_on', 'allocations'));


        
    }



}
