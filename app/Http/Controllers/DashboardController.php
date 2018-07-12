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

use Ngea\ProcessAllocation;

use Ngea\Breakdown_Without_Stuffed;
// use PDF;
use niklasravnsborg\LaravelPdf\Facades\Pdf as PDF;
use View;
use Ngea\GRNSSummary;
use Ngea\StocksSummary;
use Ngea\PurchaseSummary;
use Ngea\ProcessingSummary;
use Ngea\StuffingSummaryST;
use PdfReport;
use ExcelReport;

class DashboardController extends Controller
{



    public function getstocksummary()
    {
        // $StocksSummary = DB::table('stocks_summary_ssm AS ssm1')
        //                     ->select('ssm1.*')
        //                     ->leftJoin('stocks_summary_ssm AS ssm2', function ($join) {
        //                         $join->on('ssm1.wr_name', '=', 'ssm2.wr_name')
        //                             ->on('ssm1.ssm_buyer', '=', 'ssm2.ssm_buyer')
        //                             ->on('ssm1.created_at', '<', 'ssm2.created_at');
                                    
        //                     })
        //                     ->whereNull('ssm2.wr_name')
        //                     ->groupBy('ssm1.wr_name', 'ssm1.ssm_buyer')
        //                     ->orderBy('ssm1.wr_name');
        $user_data = Auth::user();

        $user = $user_data->id;

        $dprt_id = Person::where('id', $user)->first();

        $dprt_id = $dprt_id->dprt_id;

        if ($dprt_id != 10) {            

            $StocksSummary = DB::table('stocks_summary_ssm AS ssm1')
                    ->select('ssm1.*',DB::raw('sum(ssm_weight) as weight, "Bric/Ibero" as buyer, round(sum(ssm_weight)/60) as bags,sum(ssm_value) as value'))
                    ->whereRaw('created_at > (now() - interval 30 minute)')
                    ->groupBy('wr_name')
                    ->orderBy('ssm1.wr_name');
        } else {

            $StocksSummary = DB::table('stocks_summary_ssm AS ssm1')
                    ->select('ssm1.*',DB::raw('(ssm_weight) as weight, ssm_buyer buyer, round((ssm_weight)/60) as bags,(ssm_value) as value'))
                    ->whereRaw('created_at > (now() - interval 30 minute)')
                    ->orderBy('ssm1.wr_name');

        }

        return Datatables::of($StocksSummary)
            ->make(true);
    }

    public function getstockreceivedsummary()
    {
        $user_data = Auth::user();

        $user = $user_data->id;

        $dprt_id = Person::where('id', $user)->first();

        $dprt_id = $dprt_id->dprt_id;

        if ($dprt_id != 10) { 

            $GRNSReceivedSummary = GRNSSummary::select('*',DB::raw('"Bric/Ibero" as buyer, round(sum(gsm_weight)/60) as bags,round(sum(gsm_weight_difference)/60) as bag_difference, round(sum(gsm_percentage_weight_difference)) as percentage_weight_difference'))
                                ->groupBy('gsm_warehouse_from')                       
                                ->groupBy('gsm_month')
                                ->orderBy(DB::raw('gsm_season desc, FIELD(gsm_month,"January","February","March","February", "March","June", "July", "August", "September", "October", "November","December")' , 'desc'))
                                ->whereRaw('Date(created_at) = CURDATE()');

        } else {

            $GRNSReceivedSummary = GRNSSummary::select('*',DB::raw('gsm_buyer as buyer, round((gsm_weight)/60) as bags, round((gsm_weight_difference)/60) as bag_difference, round((gsm_percentage_weight_difference)/) as percentage_weight_difference'))
                                ->whereRaw('Date(created_at) = CURDATE()');

        }

        return Datatables::of($GRNSReceivedSummary)
            ->make(true);
    }


    public function getpurchasedsummary()
    {
        $user_data = Auth::user();

        $user = $user_data->id;

        $dprt_id = Person::where('id', $user)->first();

        $dprt_id = $dprt_id->dprt_id;

        if ($dprt_id != 10) { 

            $PurchasesSummary = PurchaseSummary::select('*',DB::raw('"Bric/Ibero" as buyer, round(sum(prsm_weight)/60) as bags'))
                                ->groupBy('prsm_wr_name')                       
                                ->groupBy('prsm_month')
                                ->orderBy(DB::raw('prsm_csn_season desc, FIELD(prsm_month,"January","February","March","February", "March","June", "July", "August", "September", "October", "November","December")' , 'desc'))
                                ->whereRaw('Date(created_at) = CURDATE()');

        } else {
            
            $PurchasesSummary = PurchaseSummary::select('*',DB::raw('prsm_buyer as buyer, round((prsm_weight)/60) as bags'))
                                ->whereRaw('Date(created_at) = CURDATE()')->get();

        }


        return Datatables::of($PurchasesSummary)
            ->make(true);
    }


    public function getstuffingsummary()
    {
        $user_data = Auth::user();

        $user = $user_data->id;

        $dprt_id = Person::where('id', $user)->first();

        $dprt_id = $dprt_id->dprt_id;

        if ($dprt_id != 10) { 

            $StuffingSummary = StuffingSummaryST::select('*',DB::raw('"Bric/Ibero" as buyer, round(sum(stsm_weight)/60) as bags'))
                                ->groupBy('stsm_month')                       
                                ->groupBy('stsm_year')
                                ->orderBy(DB::raw('stsm_year desc, FIELD(stsm_month,"January","February","March","February", "March","June", "July", "August", "September", "October", "November","December")' , 'desc'))
                                ->whereRaw('Date(created_at) = CURDATE()');

        } else {
            
            $StuffingSummary = StuffingSummaryST::select('*',DB::raw('stsm_buyer as buyer, round((stsm_weight)/60) as bags'))
                                ->whereRaw('Date(created_at) = CURDATE()')->get();

        }

        return Datatables::of($StuffingSummary)
            ->make(true);
    }


    public function getprocessingsummary()
    {
        $user_data = Auth::user();

        $user = $user_data->id;

        $dprt_id = Person::where('id', $user)->first();

        $dprt_id = $dprt_id->dprt_id;

        if ($dprt_id != 10) { 

            $ProcessingMonthlySummary = ProcessingSummary::select('*',DB::raw('"Bric/Ibero" as buyer, round(sum(prssm_total_allocated)/60) as total_allocated, round(sum(prssm_results)/60) as results, round(sum(prssm_difference)/60) as difference'))
                                ->groupBy('prssm_buyer')                       
                                ->groupBy('prssm_year')
                                ->groupBy('prssm_month')
                                ->orderBy(DB::raw('prssm_year desc, FIELD(prssm_month,"January","February","March","February", "March","June", "July", "August", "September", "October", "November","December")' , 'desc'))
                                ->whereRaw('Date(created_at) = CURDATE()');

        } else {
            
            $ProcessingMonthlySummary = ProcessingSummary::select('*',DB::raw('prssm_buyer as buyer, round(sum(prssm_total_allocated)/60) as total_allocated, round(sum(prssm_results)/60) as results, round(sum(prssm_difference)/60) as difference'))
                                ->whereRaw('Date(created_at) = CURDATE()')->get();

        }


        return Datatables::of($ProcessingMonthlySummary)
            ->make(true);
    }

}
