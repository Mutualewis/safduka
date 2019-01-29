<?php

namespace Ngea\Http\Controllers\Api\V1;

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
use Ngea\quality_details;
use Ngea\coffee_details;

use Ngea\Sum_Process_Allocation;

use Ngea\warehouses_region;
use Yajra\Datatables\Datatables;

use Ngea\StockProcessedView;

use Ngea\ProcessAllocation;
use Ngea\StockBreakdownOutturns;

use niklasravnsborg\LaravelPdf\Facades\Pdf as PDF;
use View;
use Mail;

use Ngea\Material;
use Ngea\ProcessResults as ResultResource;

class ProcessResultsController extends Controller
{
    public function listMillingInstructions(Request $request){
        return response()->json([
            'message' => "successful",
            'data' => Process::all()->toArray(),
        ])
        ->setStatusCode(200);
    }

    public function listMillingInstructionOutturns(){
       
        // $prc = $id;
            // if ($prc != null) {
                // $refno       = Process::where('id', $prc)->first();
                
                // $rfid = $refno->id;
                // $resultsType = ProcessResultsType::where('prcss_id', $rfid)->get();
                // if ($rfid != null) {
                $StockView  = StockViewALL::all();
                //     $ProcessResults = Processes::where('id', $rfid)->where('ctrid', 1)->whereNotNull('result_type')->get();
                // }
            // }
           
           
        
        return response()->json([
            'message' => "successful",
            'data' => $StockView->toArray(),
        ])
        ->setStatusCode(200);
    }
    public function listGrades(Request $request){
        return response()->json([
            'message' => "successful",
            'data' => ProcessResultsType::all(['id', 'prt_name'])->toArray(),
        ])
        ->setStatusCode(200);
    }
    public function resultslist($st_id){
        if ($st_id !== NULL) {

            $stockresults = DB::table('process_results_prts as prts')
            ->leftJoin('processing_results_type_prt as prt', 'prt.id', '=', 'prts.prt_id')
            ->leftJoin('stock_mill_st as st', 'prts.st_mill_id', '=', 'st.id')
            ->where('prts.st_mill_id', '=', $st_id)
            ->groupBy('prts.prt_id')
            ->get();


        }
        return response()->json([
            'message' => "successful",
            'data' => $stockresults,
        ])
        ->setStatusCode(200);
    }
    public function saveResults(Request $request)
    {
        $user = auth('api')->user();
        $username = $user->usr_name;
        $userid = $user->id;
        
        $this->validate($request, [
            'prts_bags' => 'required',
            'prts_pockets' => 'required',
            'st_mill_id' => 'required',
            'prt_id' => 'required',
        ]);
        try{
        DB::beginTransaction();
        $results_details = ProcessResults::where('st_mill_id', '=', $request->st_mill_id)->where('prt_id', '=', $request->prt_id)->first();
        if($results_details!=null){
            
            $results = ProcessResults::where('id', '=', $results_details->id)
            ->update($request->all());
        }else{
            $results = ProcessResults::create($request->all());
            $results = $results->toArray();
        }
        DB::commit();
        //$resultstring = $request->all()->toJson();
        $resultsstring = json_encode($request->all());
        Activity::user($user)
        ->withProperties($request->all())
        ->log('Added Process Results '. $resultsstring. ' user ' .$username);
        return response()->json([
            'message' => "successful",
            'data' => $results,
        ])
        ->setStatusCode(201);
        }catch (\Exception $e) {
                
            DB::rollback();
            $errormessages[] = $e->getMessage();
            return response()->json([
                'message' => $errormessages
            ])
            ->setStatusCode(500); 
        }
    }
  
   
}
