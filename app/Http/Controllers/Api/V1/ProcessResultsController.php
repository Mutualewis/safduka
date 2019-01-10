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

class ProcessResultsController extends Controller
{
    public function listMillingInstructions(Request $request){
        return response()->json([
            'message' => "successful",
            'data' => Process::all()->toArray(),
        ])
        ->setStatusCode(200);
    }

    public function listMillingInstructionOutturns(Request $request){
        return response()->json([
            'message' => "successful",
            'data' => Process::all()->toArray(),
        ])
        ->setStatusCode(200);
    }
   
}
