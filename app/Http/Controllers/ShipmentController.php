<?php namespace Ngea\Http\Controllers;

use Input;
use confirm;
use DB;
use ask;
use Illuminate\Http\Request;
use Ngea\Http\Controllers\Controller;
use View;

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

use Ngea\SaleStatus;
use Ngea\CoffeeGrade;
use Ngea\SaleableStatus;
use Ngea\cleancoffee;

use Ngea\coffeewarrant;
use Ngea\buyer;
use Ngea\saleinfo;
use Ngea\SaleType;
use Ngea\Sale;

use  Ngea\Warehouse;
use  Ngea\Region;

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

use PDF;
use Activity;
use Excel;

use Ngea\country;


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

use Ngea\greencomments;
use Ngea\direct_sale;
use Ngea\sale_status;
use Ngea\basket;
use Ngea\purchase;
use Ngea\Process;

use Ngea\VesselDetails;

use Ngea\Client;
use Ngea\SalesContract;
use Ngea\StockView;

use delete;


class ShipmentController extends Controller {

    public function salesShipmentDetailsForm (Request $request){
    	$id = null;
    	$Season = Season::all(['id', 'csn_season']);
    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
        $client = Client::all(['id', 'cl_name']);

        $shipmentmonth = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    	return View::make('salesshipmentdetails', compact('id', 'Season', 'country', 'shipmentmonth','client'));

    }


    public function salesShipmentDetails (Request $request){

        $contract = Input::get('contract');

        $vessel = Input::get('vessel');

        $mark = Input::get('mark');        

        $shipment_date = Input::get('date');

        $shipment_date=date_create($shipment_date);

        $shipment_date = date_format($shipment_date,"Y-m-d"); 

        $sales_contract = SalesContract::where('sct_number',  $contract)->first();

        $sct_id = null;

        if ($sales_contract != null) {

            $sct_id = $sales_contract->id;
            
            $vessel_details = VesselDetails::where('sct_id', $sct_id)->first();

        }

        if (NULL !== Input::get('submitshipmentdetails')){

            if ($vessel_details !== NULL){
                
                VesselDetails::where('sct_id', '=', $sct_id)
                            ->update(['vd_name' => $vessel, 'vd_mark' => $mark, 'vd_ship_date' => $shipment_date]);

                $request->session()->flash('alert-success', 'Sales Contract Information Updated!!');

                Activity::log('Updated salesshipmentdetails sct_id '. $sct_id. ' vessel '. $vessel. ' mark '. $mark. ' shipment_date '. $shipment_date);


            } else {

                VesselDetails::insert(
                    ['sct_id' => $sct_id, 'vd_name' => $vessel, 'vd_mark' => $mark, 'vd_ship_date' => $shipment_date]);

                $request->session()->flash('alert-success', 'Sales Contract Information Added!!');

                Activity::log('Added salesshipmentdetails sct_id '. $sct_id. ' vessel '. $vessel. ' mark '. $mark. ' shipment_date '. $shipment_date);

            }

            $sales_contract = SalesContract::where('sct_number',  $contract)->first();

            $vessel_details = VesselDetails::where('sct_id', $sct_id)->first();

            return View::make('salesshipmentdetails', compact('id', 'sales_contract', 'contract', 'vessel_details'));

        } else if(NULL !== Input::get('searchButtonContract')){

            $request->session()->flash('alert-success', 'Sales Contract Information Found!!');

            return View::make('salesshipmentdetails', compact('id', 'sales_contract', 'contract','vessel_details'));


        } else {

            return View::make('salesshipmentdetails', compact('id', 'sales_contract', 'contract','vessel_details'));

        }


	}


   
}

