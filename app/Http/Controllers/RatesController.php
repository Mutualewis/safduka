<?php namespace Ngea\Http\Controllers;

use Input;
use confirm;
use DB;
use ask;
use Illuminate\Http\Request;
use Ngea\Client;
use Ngea\FOB;
use Ngea\group_menu;
use Ngea\Http\Controllers\Controller;
use Ngea\MovementInstructionType;
use Ngea\Packaging;
use Ngea\Process;
use Ngea\transporters;
use View;

use Ngea\Parchment;
use Ngea\ParchmentType;
use Ngea\Growers;
use Ngea\coffeegrower;
use Ngea\growertype;
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

use Ngea\SaleStatus;
use Ngea\CoffeeGrade;
use Ngea\coffee_details;
use Ngea\SaleableStatus;
use Ngea\cleancoffee;

use Ngea\coffeewarrant;
use Ngea\buyer;
use Ngea\buyertype;
use Ngea\saleinfo;
use Ngea\SaleType;
use Ngea\Sale;
use Ngea\Role;

use  Ngea\Warehouse;
use  Ngea\Region;
use Yajra\Datatables\Datatables;

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

//use PDF;
//use PDF;
use Activity;
use Excel;
use Auth;
use niklasravnsborg\LaravelPdf\Facades\Pdf as PDF;

use Ngea\country;
use Ngea\county;


use Ngea\booking;
use Ngea\booking_with_names;
use Ngea\booking_items;
use Ngea\booking_items_with_names;
use Ngea\trading_months;
use Ngea\Mill;
use Ngea\mills_region;
use Ngea\warehouses_region;
use Ngea\Certification;
use Ngea\department;
use Ngea\coffee_certification;
use Ngea\seller;
use Ngea\sale_lots;
use Ngea\quality_groups;
use Ngea\quality_parameters;
use Ngea\processing;
use Ngea\processing_instruction_pri;
use Ngea\processing_groups;
use Ngea\processingresulttype;
use Ngea\Provisonal_Purpose;
use Ngea\screens;
use Ngea\Years;
use Ngea\cupscore;
use Ngea\rawscore;
use Ngea\quality_details;

use Ngea\greencomments;
use Ngea\direct_sale;
use Ngea\sale_status;
use Ngea\basket;
use Ngea\InternalBaskets;
use Ngea\purchase;
use Ngea\Menu;

use delete;

use Ngea\processrates;
use Ngea\processcharges;
use Ngea\teams;
use Ngea\warehouserates;
use Ngea\transportrates;

use Ngea\StockViewALL;
use Ngea\Processes;
use Ngea\process_charges_teams;
use Ngea\Person;


class RatesController extends Controller {
     //process
     public function settingsProcessRatesForm (Request $request){
        $id = null;
        $processrates= DB::table('rates_rts AS rts')
            ->select('*')
            ->orderBy('rts.created_at', 'desc')
            ->get();
        $processes = processing::all(['id', 'prcss_name', 'prcss_initial', 'prcss_description'])->sortByDesc('id');
        return View::make('settingsprocessrates', compact('id','processrates', 'processes'));
    }

    public function settingsProcessRates (Request $request){
        $this->validate($request, [
            'service' => 'required', 'rate' => 'required'
        ]);
        $id = null;

        $service= Input::get('service');
        $rate = Input::get('rate');
        $active = 1;
        $user_data = Auth::user();

        $user = $user_data->id;



        if (null !== Input::get('submit')) {
            $rate_details = processrates::where('prc_id', $service)->first();

            if ($rate_details != null) {
                // processing::where('id', '=',  $rate_details->id)
                //     ->update(['prcss_initial' => $prcss_initial, 'prcss_description'=>$prcss_description, 'prcss_auction'=>$prcss_auction]);

                // Activity::log('Updated process information for process ' . $prcss_name . ' process initial ' . $prcss_initial. ' process description ' . $prcss_description. ' process auction ' . $prcss_auction. ' user ' .$user);

            } else {
                processrates::insert(['service'=>$service,'rate' => $rate,'active' => $active]);

                Activity::log('Inserted rate information for service ' . $service . ' rate ' . $rate. ' user ' .$user);

            }

        }

        return redirect()->action(
            'RatesController@settingsProcessRatesForm'
        );
    }


    public function process_rate_delete($id)
    {

        $user_data = Auth::user();
        $user = $user_data->id;
        try{
            $rate_details =processrates::findOrFail($id);
            if ($rate_details) {
                $service=$rate_details->servive;
                $rate_details->delete();
                Activity::log('Deleted task information for porcess ' . $service. ' User '. $user);
                return response()->json([
                    'deletable' => true,
                    'error' => null
                ]);
            }else{
                return response()->json([
                    'deletable' => false,
                    'error' => '404'
                ]);
            }
        }catch (\PDOException $e) {
            return response()->json([
                'deletable' => false,
                'error' => $e->getMessage()
            ]);
        }
    }

    public function settingsTeamsForm (Request $request){
        $id = null;
        $teams= DB::table('teams_tms AS tms')
            ->select('*')
            ->orderBy('tms.created_at', 'desc')
            ->get();
        return View::make('settingsteams', compact('id','teams'));
    }

    public function settingsTeams (Request $request){
        $this->validate($request, [
            'provider' => 'required', 'team' => 'required'
        ]);
        $id = null;

        $provider= Input::get('provider');
        $team = Input::get('team');

        $user_data = Auth::user();

        $user = $user_data->id;


        if (null !== Input::get('submit')) {
            $team_details = teams::where('tms_grpname', $team)->first();

            if ($team_details != null) {
                // processing::where('id', '=',  $rate_details->id)
                //     ->update(['prcss_initial' => $prcss_initial, 'prcss_description'=>$prcss_description, 'prcss_auction'=>$prcss_auction]);

                // Activity::log('Updated process information for process ' . $prcss_name . ' process initial ' . $prcss_initial. ' process description ' . $prcss_description. ' process auction ' . $prcss_auction. ' user ' .$user);

            } else {
                teams::insert(['tms_serviceprovider'=>$provider,'tms_grpname' => $team]);

                Activity::log('Inserted team information for team ' . $team . ' ,service provider ' . $provider. ' user ' .$user);

            }

        }

        return redirect()->action(
            'RatesController@settingsTeamsForm'
        );
    }


    public function teams_delete($id)
    {

        $user_data = Auth::user();
        $user = $user_data->id;
        try{
            $team_details =teams::findOrFail($id);
            if ($team_details) {
                $team=$team_details->ibs_code;
                $process_details->delete();
                Activity::log('Deleted team information for team ' . $team. ' User '. $user);
                return response()->json([
                    'deletable' => true,
                    'error' => null
                ]);
            }else{
                return response()->json([
                    'deletable' => false,
                    'error' => '404'
                ]);
            }
        }catch (\PDOException $e) {
            return response()->json([
                'deletable' => false,
                'error' => $e->getMessage()
            ]);
        }
    }
    public function ProcessChargesResults (){
        return View::make('processratecharges', compact('id','teams'));
    }
    public function getProcessingCharges()
    {
      
        $query= DB::table('process_charges_prcgs AS prcgs')
                ->select('prcgs.prcgs_instruction_no','prcgs.prcgs_service','prcgs.bags','prcgs.prcgs_rate','prcgs.prcgs_total','tms.tms_grpname','prcgs.created_at')
                ->leftJoin('teams_tms AS tms', 'tms.id', '=', 'prcgs.prcgs_team_id')
                ->orderBy('prcgs.created_at', 'desc');


        return Datatables::of($query)->make(true);
    }
    //warehouse rates
   public function WarehouseRatesForm (Request $request){
    $id = null;
    $warehouserates= DB::table('wr_rates AS wr_rts')
        ->select('wr_rts.id as id','wr.wr_name', 'wr.wr_initials','wr_rts.storage_rate', 'wr_rts.handling_bag_rate', 'wr_rts.warrant_rate', 'wr_rts.date_ended', 'wr_rts.active')
        ->leftJoin('warehouse_wr AS wr', 'wr_rts.wr_id', '=', 'wr.id')
        ->orderBy('wr.created_at', 'desc')
        ->get();
    $warehouses = Warehouse::all(['id', 'wr_name', 'wr_initials'])->sortByDesc('id');
    return View::make('warehouserates', compact('id','warehouserates', 'warehouses'));
}

public function WarehouseRates (Request $request){
    $this->validate($request, [
        'warehouse' => 'required', 'storage' => 'required'
    ]);
    $id = null;

    $warehouse= Input::get('warehouse');
    $storage = Input::get('storage');
    $handling = Input::get('handling');
    $warrant = Input::get('warrant');

    $active = 1;
    $user_data = Auth::user();

    $user = $user_data->id;



    if (null !== Input::get('submit')) {
        $wr_rate_details = warehouserates::where('wr_id', $warehouse)->first();

        if ($wr_rate_details != null) {
            // processing::where('id', '=',  $rate_details->id)
            //     ->update(['prcss_initial' => $prcss_initial, 'prcss_description'=>$prcss_description, 'prcss_auction'=>$prcss_auction]);

            // Activity::log('Updated process information for process ' . $prcss_name . ' process initial ' . $prcss_initial. ' process description ' . $prcss_description. ' process auction ' . $prcss_auction. ' user ' .$user);

        } else {
            warehouserates::insert(['wr_id'=>$warehouse,'storage_rate' => $storage,'handling_bag_rate' => $handling,'warrant_rate' => $warrant]);

            Activity::log('Inserted rate information for warehouse ' . $warehouse . ' storage rate ' . $storage.' handling rate ' . $handling. ' user ' .$user);

        }

    }

    return redirect()->action(
        'RatesController@WarehouseRatesForm'
    );
}


public function warehouse_rate_delete($id)
{

    $user_data = Auth::user();
    $user = $user_data->id;
    try{
        $wr_rate_details =warehouserates::findOrFail($id);
        if ($wr_rate_details) {
            $warehouse=$wr_rate_details->warehouse;
            $wr_rate_details->delete();
            Activity::log('Deleted warehouse rate information for warehouse ' . $warehouse. ' User '. $user);
            return response()->json([
                'deletable' => true,
                'error' => null
            ]);
        }else{
            return response()->json([
                'deletable' => false,
                'error' => '404'
            ]);
        }
    }catch (\PDOException $e) {
        return response()->json([
            'deletable' => false,
            'error' => $e->getMessage()
        ]);
    }
}
   //transport
   public function TransportRatesForm (Request $request){
    $id = null;
    $transportrates= DB::table('trp_rates AS trp_rts')
        ->select('trp_rts.id as id','wr.wr_name', 'wr.wr_initials', 'trp.trp_name', 'trp_rts.rate', 'trp_rts.active', 'trp_rts.date_ended')
        ->leftJoin('warehouse_wr AS wr', 'trp_rts.wr_id', '=', 'wr.id')
        ->leftJoin('transporters_trp AS trp', 'trp_rts.trp_id', '=', 'trp.id')
        ->orderBy('trp_rts.created_at', 'desc')
        ->get();
    $warehouses = Warehouse::all(['id', 'wr_name', 'wr_initials'])->sortByDesc('id');
    $transporters = transporters::all(['id', 'trp_name'])->sortByDesc('id');
    return View::make('transporterrates', compact('id','transportrates', 'warehouses', 'transporters'));
}

public function TransportRates (Request $request){
    $this->validate($request, [
        'warehouse' => 'required', 'transporter' => 'required', 'rate' => 'required'
    ]);
    $id = null;

    $warehouse= Input::get('warehouse');
    $transporter = Input::get('transporter');
    $rate = Input::get('rate');

    $active = 1;
    $user_data = Auth::user();

    $user = $user_data->id;



    if (null !== Input::get('submit')) {
        $trp_rate_details = transportrates::where('trp_id', $transporter)->first();

        if ($trp_rate_details != null) {
            transportrates::insert(['wr_id'=>$warehouse,'rate' => $rate,'trp_id' => $transporter]);
            // processing::where('id', '=',  $rate_details->id)
            //     ->update(['prcss_initial' => $prcss_initial, 'prcss_description'=>$prcss_description, 'prcss_auction'=>$prcss_auction]);

            // Activity::log('Updated process information for process ' . $prcss_name . ' process initial ' . $prcss_initial. ' process description ' . $prcss_description. ' process auction ' . $prcss_auction. ' user ' .$user);

        } else {
            transportrates::insert(['wr_id'=>$warehouse,'rate' => $rate,'trp_id' => $transporter]);

            Activity::log('Inserted rate information for transporter ' . $transporter . ' rate ' . $rate.' warehouse ' . $warehouse. ' user ' .$user);

        }
    }

    return redirect()->action(
        'RatesController@TransportRatesForm'
    );
}


public function transport_rate_delete($id)
{

    $user_data = Auth::user();
    $user = $user_data->id;
    try{
        $wr_rate_details =warehouserates::findOrFail($id);
        if ($wr_rate_details) {
            $warehouse=$wr_rate_details->warehouse;
            $wr_rate_details->delete();
            Activity::log('Deleted warehouse rate information for warehouse ' . $warehouse. ' User '. $user);
            return response()->json([
                'deletable' => true,
                'error' => null
            ]);
        }else{
            return response()->json([
                'deletable' => false,
                'error' => '404'
            ]);
        }
    }catch (\PDOException $e) {
        return response()->json([
            'deletable' => false,
            'error' => $e->getMessage()
        ]);
    }
} 
public function CalculateProcessResultsRate($ref_no, $processingType, $service, $team){
    try{
        $info =  urldecode($team);
        $info = json_decode($info);
        $user_data = Auth::user();
        $user      = $user_data->id;

        $teams = $info->teamsdetail;
        
    $descpackages = 0;
    foreach($teams as $teamdata){
        $descpackages= $teamdata->description +$descpackages;
    }
   // dump($teams);exit;
    $weight_in=0;
    $packages = DB::select('SELECT SUM(prts_packages) AS packages FROM process_results_prts where pr_id=:id LIMIT 1', ['id' => $ref_no]);
    $packages=$packages[0]->packages;
    //dump($packages);exit;
    if($packages!=null){
    $process = DB::select('SELECT pr_instruction_number AS process FROM process_pr where id=:id LIMIT 1', ['id' => $ref_no]);
    $processname=$process[0]->process;

    
        
        $rate_details = processrates::where('id', '=', $service)->first();
        $rate=$rate_details->rate;
        $rateid=$rate_details->id;
        $servicename=$rate_details->service;
       
       // if($rateid==11){
            $packages = (int)$descpackages;
       // }
        $charge = $rate*$packages;
        //get rate charges and insert team
        $processing_rate_details = processcharges::where('ref_no', '=',  $ref_no)->where('prcgs_rate_id', '=',  $rateid)->first();

        if ($processing_rate_details != null) {
            processcharges::where('ref_no', '=',  $ref_no)->where('prcgs_rate_id', '=',  $rateid)
                ->update(['prcgs_rate_id' => $rateid, 'prcgs_service'=>$servicename, 'prcgs_rate'=>$rate, 'prcgs_total'=>$charge, 'bags'=>$packages]);

            Activity::log('Updated process rate information for instruction ' . $ref_no . ' service ' . $servicename. ' process charge ' . $charge. ' with rate ' . $rate. ' bags ' . $packages. ' user ' .$user);
            
            return response()->json([
                'packages' => $packages,
                'rate' => $rate,
                'service' => $servicename,
                'charge' => $charge,
                'success' => true,
                'inserted' => false,
                'error' => null,
                'updated' => true
            ]);

        } else {
             $prcgs_id = processcharges::insertGetId(['ref_no'=>$ref_no,'prcgs_instruction_no'=>$processname,'prcgs_rate_id' => $rateid, 'prcgs_service'=>$servicename, 'prcgs_rate'=>$rate, 'prcgs_total'=>$charge, 'bags'=>$packages]);
            
            foreach($teams as $teamdata){
                process_charges_teams::insert(['prcgs_id'=>$prcgs_id,'prcgs_team_id'=>$teamdata->team,'descr' => $teamdata->description]);
                Activity::log('Inserted team information for instruction ' . ' team ' . $teamdata->team . ' description ' . $teamdata->description. ' user ' .$user);
            }


            Activity::log('Inserted process rate information for instruction ' . $ref_no . ' service ' . $servicename. ' team ' . $team. ' process charge ' . $charge. ' with rate ' . $rate. ' bags ' . $packages. ' user ' .$user);
            
            return response()->json([
                'packages' => $packages,
                'rate' => $rate,
                'service' => $servicename,
                'charge' => $charge,
                'success' => true,
                'inserted' => true,
                'error' => null,
                'updated' => false
            ]);

        }
    }else{
        return response()->json([
                'packages' => '0 packages',
                'rate' => '',
                'service' => '',
                'charge' => 'No results',
                'success' => false,
                'inserted' => false,
                'error' => 'No results',
                'updated' => false
        ]); 
    }
    
    }catch (\PDOException $e) {
        return response()->json([
            'exists' => false,
            'inserted' => false,
            'error' => $e->getMessage()
        ]);
    }
} 

public function CalculateStuffingRate($ref_no, $packages, $service, $team){
    try{
        $user_data = Auth::user();
        $user      = $user_data->id;

    $weight_in=0;
    // $packages = DB::select('SELECT SUM(prts_packages) AS packages FROM process_results_prts where pr_id=:id LIMIT 1', ['id' => $ref_no]);
    // $packages=$packages[0]->packages;

    if($packages!=null){
    // $process = DB::select('SELECT pr_instruction_number AS process FROM process_pr where id=:id LIMIT 1', ['id' => $ref_no]);
    // $processname=$process[0]->process;

    
        
        $rate_details = processrates::where('id', '=', $service)->first();
        $rate=$rate_details->rate;
        $rateid=$rate_details->id;
        $servicename=$rate_details->service;
        
        $charge = $rate*$packages;
        
        //get rate charges and insert team
        $processing_rate_details = processcharges::where('ref_no', '=',  $ref_no)->where('prcgs_rate_id', '=',  $rateid)->first();

        if ($processing_rate_details != null) {
            processcharges::where('ref_no', '=',  $ref_no)->where('prcgs_rate_id', '=',  $rateid)
                ->update(['prcgs_rate_id' => $rateid, 'prcgs_service'=>$servicename, 'prcgs_rate'=>$rate, 'prcgs_total'=>$charge, 'prcgs_team_id'=>$team, 'bags'=>$packages]);

            Activity::log('Updated stuffing rate information for contract ' . $ref_no . ' service ' . $servicename. ' team ' . $team. ' process charge ' . $charge. ' with rate ' . $rate. ' bags ' . $packages. ' user ' .$user);
            
            return response()->json([
                'packages' => $packages,
                'rate' => $rate,
                'service' => $servicename,
                'charge' => $charge,
                'success' => true,
                'inserted' => false,
                'error' => null,
                'updated' => true
            ]);

        } else {
            processcharges::insert(['ref_no'=>$ref_no,'prcgs_instruction_no'=>$ref_no,'prcgs_rate_id' => $rateid, 'prcgs_service'=>$servicename, 'prcgs_rate'=>$rate, 'prcgs_total'=>$charge, 'prcgs_team_id'=>$team, 'bags'=>$packages]);

            Activity::log('Inserted stuffing rate information for contract ' . $ref_no . ' service ' . $servicename. ' team ' . $team. ' process charge ' . $charge. ' with rate ' . $rate. ' bags ' . $packages. ' user ' .$user);
            
            return response()->json([
                'packages' => $packages,
                'rate' => $rate,
                'service' => $servicename,
                'charge' => $charge,
                'success' => true,
                'inserted' => true,
                'error' => null,
                'updated' => false
            ]);

        }
    }else{
        return response()->json([
            'packages' => '',
            'rate' => $rate,
            'service' => $servicename,
            'charge' => $charge,
            'success' => true,
            'inserted' => true,
            'error' => null,
            'updated' => false
        ]); 
    }
    
    }catch (\PDOException $e) {
        return response()->json([
            'exists' => false,
            'inserted' => false,
            'error' => $e->getMessage()
        ]);
    }
}

public function printProcessWithRate($ref_no, $service, $team){
    
    $processing_rate_details = processcharges::where('ref_no', $ref_no)->where('prcgs_rate_id', $service)->first();
    
    $ref_no_initial = $ref_no;
    $rate=$processing_rate_details->prcgs_rate;
    $servicename=$processing_rate_details->prcgs_service;
    $totalcost=$processing_rate_details->prcgs_total;
    $ref_no=$processing_rate_details->prcgs_instruction_no;
    $team=$processing_rate_details->prcgs_team_id;
    $bagstopay=$processing_rate_details->bags;
    $date=$processing_rate_details->created_at;
    
    $prcgs_id = $processing_rate_details->id;
    $team_details = process_charges_teams::where('prcgs_id', $prcgs_id)->get();
    $team_details=$team_details->all();
    $teamsarray=[];
    
    foreach($team_details as $team){
        $teams_details = teams::where('id', '=', $team->prcgs_team_id)->first();
        $teamserviceprovider=$teams_details->tms_serviceprovider;
        $teamgroup=$teams_details->tms_grpname;

        $teamsarray[] = ['teamserviceprovider'=>$teamserviceprovider, 'teamgroup'=>$teamgroup, 'desc' => $team->descr];
    }
    
    $TO = "NKG Export - Warehouse Department";
    $ATTENTION = "NELSON";
    $FROM = "Quality Department";
    
    //$reference = Input::get('reference');
    //$contractID = Input::get('contract');
    //$contractNumber = SalesContract::where('id', '=', $contractID)->first();
    // $this->checkIFBulkWithNoContract($prc, $contractID, $BULKING_PROCESS);

    $date = null;
    $prdetails = Process::where('id', $ref_no_initial)->first();


    $process_number = Process::where('id', $ref_no_initial)->first();

    if ($process_number == null) {
                        
    }
    $reference = $process_number->pr_reference_name;
    $date = $process_number->pr_date;
    $date = date("m/d/Y", strtotime($date)); 
    $StockView = StockViewALL::where('prcssid', $process_number->id)->get();  

    $contractNumber = NULL;
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


    //$processing_season = Input::get('processing_season');
    //$seasonName = null;
    // if ($processing_season != null) {
    //     $seasonName  = Season::where('id', $processing_season)->first();
    //     $seasonName = $seasonName->csn_season;
    // }


    $user_data = Auth::user();
    $user      = $user_data->id;

    $person_id      = $user_data->per_id;
    $personDetails = Person::where('id', $person_id)->first();

    $person_fname      = $personDetails->per_fname;
    $person_sname      = $personDetails->per_sname;

    $ref_no = $process_number->pr_instruction_number;


    $results_view = processes::where('id', $process_number->id)->get();
    //dump($results_view);

    $pdf = PDF::loadView('pdf.processrate', compact('ref_no','servicename', 'bagstopay','totalcost', 'rate', 'teamserviceprovider', 'teamgroup', 'date','FROM', 'TO', 'ATTENTION', 'date', 'reference', 'ref_no', 'process_type', 'results_view', 'StockView', 'person_fname', 'person_sname', 'teamsarray'));
    return $pdf->stream($ref_no .' '.$servicename. ' processrate.pdf');
}

public function printStuffingWithRate($ref_no, $service, $team){
    
    $processing_rate_details = processcharges::where('ref_no', $ref_no)->where('prcgs_rate_id', $service)->first();
    
    $rate=$processing_rate_details->prcgs_rate;
    $servicename=$processing_rate_details->prcgs_service;
    $total=$processing_rate_details->prcgs_total;
    $ref_no=$processing_rate_details->prcgs_instruction_no;
    $team=$processing_rate_details->prcgs_team_id;
    $bagstopay=$processing_rate_details->bags;
    $date=$processing_rate_details->created_at;

    $team_details = teams::where('id', '=', $team)->first();
    $teamserviceprovider=$team_details->tms_serviceprovider;
    $teamgroup=$team_details->tms_grpname;


    $pdf = PDF::loadView('pdf.stuffingrate', compact('ref_no','servicename', 'bagstopay','total', 'rate', 'teamserviceprovider', 'teamgroup' ));
            return $pdf->stream($ref_no .' '.$servicename. ' stuffingrate.pdf');
}

public function WarehouseChargesResults (){
    return View::make('warehousecharges', compact('id','teams'));
} 
public function getWarehouseCharges()
{
    $query= DB::table('grns_received_monthly_warehouse_days')
            ->select('*');

    return Datatables::of($query)->make(true);
}

}