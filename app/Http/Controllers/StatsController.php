<?php namespace Ngea\Http\Controllers;

use Input;
use confirm;
use DB;
use ask;
use Illuminate\Http\Request;
use Ngea\Http\Controllers\Controller;
use Ngea\milling_stats_monthly;
use Ngea\sales_stats_monthly;
use View;

class StatsController extends Controller {

	public function createMillingGraph (Request $request){
		$Month = milling_stats_monthly::select(['Month'])->get()->toArray();
		$Month = array_column($Month, 'Month');

		$Unmilled = milling_stats_monthly::select(['Total_Unmilled'])->get()->toArray();
		$Unmilled = array_column($Unmilled, 'Total_Unmilled');


		
		//
		$Total_Unmilled = array();

		$runningSum = 0;

		foreach ($Unmilled as $number) {
		    $runningSum += $number;
		    $Total_Unmilled[] = $runningSum;
		}

		$Milled = milling_stats_monthly::select(['Total_Milled'])->get()->toArray();
		//print_r($Total_Milled);

		$Milled = array_column($Milled, 'Total_Milled');



		$Total_Milled = array();

		$runningSum = 0;

		foreach ($Milled as $number) {
		    $runningSum += $number;
		    $Total_Milled[] = $runningSum;
		}



		//total intaked
		$intake = array_map(function () {
		    return array_sum(func_get_args());
		}, $Unmilled , $Milled);


		$Total_Intake = array();

		$runningSum = 0;

		foreach ($intake as $number) {
		    $runningSum += $number;
		    $Total_Intake[] = $runningSum;
		}

		return View('statsmilling')
			->with('Month',json_encode($Month,JSON_NUMERIC_CHECK))
			->with('Total_Unmilled',json_encode($Total_Unmilled,JSON_NUMERIC_CHECK))
			->with('Unmilled',json_encode($Unmilled,JSON_NUMERIC_CHECK))			
            ->with('Total_Milled',json_encode($Total_Milled,JSON_NUMERIC_CHECK))
            ->with('Milled',json_encode($Milled,JSON_NUMERIC_CHECK))
            ->with('intake',json_encode($intake,JSON_NUMERIC_CHECK))
            ->with('Total_Intake',json_encode($Total_Intake,JSON_NUMERIC_CHECK));

		//('statsmilling', compact('data'));
	}

	public function createSalesGraph (Request $request){
		$Month = sales_stats_monthly::select(['Month'])->get()->toArray();
		$Month = array_column($Month, 'Month');

		$Sales = sales_stats_monthly::select(['Total_Sales'])->get()->toArray();
		$Sales = array_column($Sales, 'Total_Sales');


		
		//
		$Total_Sales = array();

		$runningSum = 0;

		foreach ($Sales as $number) {
		    $runningSum += $number;
		    $Total_Sales[] = $runningSum;
		}

		$Milled = sales_stats_monthly::select(['Total_Milled'])->get()->toArray();
		//print_r($Total_Milled);

		$Milled = array_column($Milled, 'Total_Milled');



		$Total_Milled = array();

		$runningSum = 0;

		foreach ($Milled as $number) {
		    $runningSum += $number;
		    $Total_Milled[] = $runningSum;
		}



		//total intaked
		$intake = array_map(function () {
		    return array_sum(func_get_args());
		}, $Sales , $Milled);

		$intake = array_diff($Milled, $Sales);

		$Total_Intake = array();

		$runningSum = 0;

		foreach ($intake as $number) {
		    $runningSum += $number;
		    $Total_Intake[] = $runningSum;
		}

		return View('statssales')
			->with('Month',json_encode($Month,JSON_NUMERIC_CHECK))
			->with('Total_Sales',json_encode($Total_Sales,JSON_NUMERIC_CHECK))
			->with('Sales',json_encode($Sales,JSON_NUMERIC_CHECK))			
            ->with('Total_Milled',json_encode($Total_Milled,JSON_NUMERIC_CHECK))
            ->with('Milled',json_encode($Milled,JSON_NUMERIC_CHECK))
            ->with('intake',json_encode($intake,JSON_NUMERIC_CHECK))
            ->with('Total_Intake',json_encode($Total_Intake,JSON_NUMERIC_CHECK));

		//('statsmilling', compact('data'));
	}


}