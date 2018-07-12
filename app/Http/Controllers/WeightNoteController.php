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

use Ngea\Client;
use Ngea\SalesContract;
use Ngea\StockView;

use delete;


class WeightNoteController extends Controller {

    public function salesWeightNoteForm (Request $request){
    	$id = null;
    	$Season = Season::all(['id', 'csn_season']);
    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
        $client = Client::all(['id', 'cl_name']);

        $shipmentmonth = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    	return View::make('salesweightnote', compact('id', 'Season', 'country', 'shipmentmonth','client'));

    }


    public function salesWeightNote (Request $request){
        $id = null;
        $Season = Season::all(['id', 'csn_season']);
        $country = country::all(['id', 'ctr_name', 'ctr_initial']);
        $client = Client::all(['id', 'cl_name']);


        $cid = Input::get('country');
        $contract = Input::get('contract');

        $description = Input::get('description');
        $packages = Input::get('packages');
        $clid = Input::get('client');
        $spid = Input::get('shipmonth');

        $disposaldate = Input::get('date');
        $disposaldate=date_create($disposaldate);
        $disposaldate = date_format($disposaldate,"Y-m-d"); 

        $shipmentmonth = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');

        if (NULL !== Input::get('createsalescontract')){

            $SalesContract = SalesContract::where('ctr_id', '=', $cid)->where('sct_number',  $contract)->first();
            if ($SalesContract !== NULL){
                if ($clid == NULL) {
                    $clid = $SalesContract->cl_id;
                }
                
                SalesContract::where('id', '=', $SalesContract->id)
                            ->update(['ctr_id' => $cid, 'cl_id' => $clid, 'sct_number' => $contract, 'sct_description' => $description, 'sct_packages' => $packages, 'sct_month' => $spid, 'sct_disposal_date' => $disposaldate ]);
                $request->session()->flash('alert-success', 'Sales Contract Information Updated!!');
                Activity::log('Updated salesweightnote ctr_id '. $cid. ' cl_id '. $clid. ' sct_number '. $contract. ' sct_description '. $description.' sct_packages '.$packages.' sct_month '.$spid.' sct_disposal_date '.$disposaldate );

            } else {
                SalesContract::insert(
                    ['ctr_id' => $cid, 'cl_id' => $clid, 'sct_number' => $contract, 'sct_description' => $description, 'sct_packages' => $packages, 'sct_month' => $spid, 'sct_disposal_date' => $disposaldate ]);
                $request->session()->flash('alert-success', 'Sales Contract Information Added!!');
                Activity::log('Added salesweightnote ctr_id '. $cid. ' cl_id '. $clid. ' sct_number '. $contract. ' sct_description '. $description.' sct_packages '.$packages.' sct_month '.$spid.' sct_disposal_date '.$disposaldate );
            }
            $disposaldate = Input::get('disposaldate');

            return View::make('salesweightnote', compact('id', 'Season', 'country', 'cid', 'contract', 'shipmentmonth','client', 'clid', 'spid', 'disposaldate', 'description', 'packages'));
        } else if(NULL !== Input::get('searchButtonContract')){
            $SalesContract = SalesContract::where('ctr_id', '=', $cid)->where('sct_number',  $contract)->first();
            if ($SalesContract !== NULL){
                if ($clid == NULL) {
                    $clid = $SalesContract->cl_id;
                }
            }
            $request->session()->flash('alert-success', 'Sales Contract Information Found!!');
            return View::make('salesweightnote', compact('id', 'Season', 'country', 'cid', 'contract', 'shipmentmonth','client', 'clid', 'spid', 'date', 'disposaldate', 'description', 'packages', 'SalesContract'));

        } else {
            return View::make('salesweightnote', compact('id', 'Season', 'country', 'shipmentmonth','client'));
        }


	}


   
}

