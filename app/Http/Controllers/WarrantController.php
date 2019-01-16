<?php namespace Ngea\Http\Controllers;
use Activity;
use Auth;
use delete;
use Excel;
use DB;
use Illuminate\Http\Request;
use Input;
use Ngea\Http\Controllers\Controller;
use niklasravnsborg\LaravelPdf\Facades\Pdf as PDF;
use View;
use Ngea\StocksWarehouse;
use Ngea\Agent;
use Ngea\StockWarehouse;
use Ngea\User;
use Ngea\WarrantableCoffee;
use Ngea\Warrants;

class WarrantController extends Controller
{

    public function warrantForm(Request $request)
    {
    	$stocks_details = WarrantableCoffee::get();
    	$agent = Agent::where('agtc_id',2)->orwhere('agtc_id',3)->get();
        $ref_no = Warrants::whereNotNull('war_no')->orderBy('war_no', 'asc')->pluck('war_no');   
        if ($ref_no->first() == null) {
            $ref_no = "000001";
        } else {
            foreach ($ref_no as $ref) {
                $ref_no = $ref;
                preg_match_all('!\d+!', $ref, $ref_no);
                $ref_no = implode(' ', $ref_no[0]);
            }
            $ref_no = sprintf("%06d", ($ref_no + 1));
        }

        return View::make('warrant', compact('stocks_details', 'agent', 'ref_no'));
    }

    public function warrant(Request $request)
    {
    	$agent = Agent::where('agtc_id',2)->orwhere('agtc_id',3)->get();
        $user_data = Auth::user();
        $user = $user_data->id;
        $stock_array = 
        $stock_items = Input::get('stock_items');
        $stock_items = explode(',', $stock_items);
    	if (null !== Input::get('submit_warrant')) {

    		foreach ($stock_items as $stock_item) {
    			$stock_id = null;
    			$agt_id = null;
    			$stock_item = explode('-', $stock_item);
    			$stock_id = $stock_item[0];
                $weight = $stock_item[1];
    			$serial_no = $stock_item[2];
                $serial_no = sprintf("%06d", ($serial_no));
                $warrant_details = Warrants::where('war_no',$serial_no)->first();
                if ($warrant_details == null) {
                    $stid = Warrants::insertGetId (
                    ['st_id' => $stock_id, 'war_no' => $serial_no, 'war_date' => date("Y-m-d"), 'war_confirmedby' => $user, 'war_weight' => $weight]);
                    Activity::log('Inserted Warrant information with stock_id '.$stock_id. ' with  war_no'. $serial_no. ' war_weight '. $weight. ' user '. $user);
                }
    		}
    		
    	} else if (null !== Input::get('print_warrant')) {
            $stocks_details_to_print = WarrantableCoffee::whereNotNull('war_no')->get();
            // foreach ($stocks_details_to_print as $value) {
            //     Warrants::where('war_no', '=', $value->war_no)
            //         ->update(['wr_printed' => 1]);  
            // }
            $pdf = PDF::loadView('pdf.print_warrant', compact('stocks_details_to_print'));
            return $pdf->stream('print_warrant.pdf');
        }


    	$stocks_details = WarrantableCoffee::get();
        $ref_no = Warrants::whereNotNull('war_no')->orderBy('war_no', 'asc')->pluck('war_no');   
        if ($ref_no->first() == null) {
            $ref_no = "000001";
        } else {
            foreach ($ref_no as $ref) {
                $ref_no = $ref;
                preg_match_all('!\d+!', $ref, $ref_no);
                $ref_no = implode(' ', $ref_no[0]);
            }
            $ref_no = sprintf("%06d", ($ref_no + 1));
        }        

        return View::make('warrant', compact('stocks_details', 'agent', 'ref_no'));
    }
}