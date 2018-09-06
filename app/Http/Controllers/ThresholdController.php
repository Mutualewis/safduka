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
use PDF;
use Activity;
use Excel;
use Auth;
// use Anouar\Fpdf\Fpdf as Fpdf;

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
use Ngea\Thresholds;

use delete;


class ThresholdController extends Controller {


    public function settingsThresholdsForm (Request $request){

        $id = null;

        $country = country::all(['id', 'ctr_name', 'ctr_initial', 'ctr_is_active']);

        $thresholds = DB::table('thresholds_th AS th') 
        	->select('*', 'th.id as thid')       
            ->leftJoin('country_ctr AS ctr', 'th.ctr_id', '=', 'ctr.id')
            ->orderBy('th.th_name', 'desc')
            ->get();

        return View::make('settingsthresholds', compact('id','thresholds', 'country'));
    }	


    public function settingsThresholds (Request $request){

        $this->validate($request, [
            'country' => 'required', 'threshold' => 'required', 'percentage' => 'required'
        ]);

        $id = null;

        $ctr_id = Input::get('country');

        $threshold= Input::get('threshold');

        $percentage= Input::get('percentage');

        $user_data = Auth::user();

        $user = $user_data->id;



        if (null !== Input::get('submit')) {

            $threshold_details = Thresholds::where('th_name', $threshold)->first();

            if ($threshold_details != null) {

                Thresholds::where('id', '=',  $threshold_details->id)
                    ->update(['ctr_id'=>$ctr_id, 'th_percentage'=>$percentage]);

                Activity::log('Updated threshold information for threshold ' . $threshold . ' country ' . $ctr_id. ' user ' .$user. ' percentage '. $percentage);

            } else {

                Thresholds::insert(['th_name'=>$threshold,'ctr_id' => $ctr_id, 'th_percentage'=>$percentage]);

                Activity::log('Updated threshold information for threshold ' . $threshold . ' country ' . $ctr_id. ' user ' .$user. ' percentage '. $percentage);

            }

        }

        return redirect()->action(
            'ThresholdController@settingsThresholdsForm'
        );
    }


    public function threshold_delete($id)
    {
        $user_data = Auth::user();
        $user = $user_data->id;
        try{
            $threshold_details =Thresholds::findOrFail($id);
            if ($threshold_details) {
                $threshold=$threshold_details->threshold;
                $threshold_details->delete();
                Activity::log('Deleted threshold information for threshold ' . $threshold. ' User '. $user);
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

}
