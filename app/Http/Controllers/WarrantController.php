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

class WarrantController extends Controller
{

    public function warrantForm(Request $request)
    {
    	$stocks_details = StocksWarehouse::get();
    	$agent = Agent::where('agtc_id',2)->orwhere('agtc_id',3)->get();
        return View::make('warrant', compact('stocks_details', 'agent'));
    }

    public function warrant(Request $request)
    {

    	$agent = Agent::where('agtc_id',2)->orwhere('agtc_id',3)->get();
        $user_data = Auth::user();
        $user = $user_data->id;

    	if (null !== Input::get('submit_ownership')) {

    		$stock_items = Input::get('stock_items');
    		$stock_items = explode(',', $stock_items);

    		foreach ($stock_items as $stock_item) {
    			$stock_id = null;
    			$agt_id = null;
    			$stock_item = explode('-', $stock_item);
    			$stock_id = $stock_item[0];
    			$agt_id = $stock_item[1];

				StockWarehouse::where('id', '=', $stock_id)
                    ->update(['st_owner_id' => $agt_id]);  

                Activity::log('Inserted Stock information with stock_id '.$stock_id. ' with  agt_id'. $agt_id. ' user '. $user);
    		}
    		
    	}
    	$stocks_details = StocksWarehouse::get();
        return View::make('warrant', compact('stocks_details', 'agent'));
    }
}