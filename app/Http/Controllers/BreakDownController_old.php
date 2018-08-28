<?php namespace Ngea\Http\Controllers;

use Input;
use confirm;
use DB;
use ask;
use Illuminate\Http\Request;
use Ngea\Http\Controllers\Controller;
use View;
use Auth;
use Mail;

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
use Yajra\Datatables\Datatables;

use Ngea\SaleStatus;
use Ngea\Stock;
use Ngea\CoffeeGrade;
use Ngea\SaleableStatus;
use Ngea\cleancoffee;
use Ngea\BagSizes;
use Ngea\PriceUnits;
use Ngea\PriceType;
use Ngea\CallFrom;
use Ngea\ContractUpdates;
use Ngea\User;


use Ngea\coffeewarrant;
use Ngea\buyer;
use Ngea\saleinfo;
use Ngea\SaleType;
use Ngea\Sale;
use Ngea\Packaging;

use Ngea\Stuffing;
use Ngea\StuffingView;
use Ngea\StockBreakdown;


use  Ngea\Warehouse;
use  Ngea\Weighbridge;

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

use niklasravnsborg\LaravelPdf\Facades\Pdf as PDF;
use Activity;
use Excel;

use Ngea\country;
use Ngea\Months;
use Ngea\Years;


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
use Ngea\Breakdown_Without_Stuffed;
use Ngea\Breakdown_Full;
use Ngea\StockViewALL;
use Ngea\StockViewStuffed;



use Ngea\greencomments;
use Ngea\direct_sale;
use Ngea\sale_status;
use Ngea\basket;
use Ngea\purchase;
use Ngea\Process;
use Ngea\ProcessAllocation;

use Ngea\Client;
use Ngea\Batch;
use Ngea\StockLocation;
use Ngea\SalesContract;
use Ngea\StockView;
use Ngea\Processes;
use Ngea\Person;
use Ngea\ProcessResults;

use Ngea\Sales_Contract_Summary;

use PdfReport;

use ExcelReport;

use delete;


class BreakDownController extends Controller {

    public function updateBreakDownForm (Request $request){

        $grid = $this->getBreakdownGrid();

        return View::make('updatebreakdown', compact('id','grid', 'text', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification'));

    }


    public function updateBreakDown (Request $request){

        if (NULL !== Input::get('updatecontract')) {  

            $pr_id = null;

            $updateRequest = Input::get('updatecontract');

            $this->updateBreakDownAll($updateRequest, $pr_id);

        }

        // $grid = $this->getBreakdownGrid();

        // return View::make('updatebreakdown', compact('id','grid', 'text', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification'));

    }


    public function updateBreakDownAll ($updateRequest, $pr_id){

        if (NULL !== $updateRequest) {        

            if ($pr_id != null) {

                $processes_summary = Process::select('id', 'pr_instruction_number')->where('id',$pr_id)->orderBy('id')->get();

            } else {

                $processes_summary = Process::select('id', 'pr_instruction_number')->orderBy('id')->get();
                
            }

            $compute = false;            

            $st_id = null;

            foreach ($processes_summary as $key => $value) {       

                $pr_id = $value->id;       

                $stock_value = null;

                $process_results = ProcessResults::where('pr_id', $pr_id)->get();

                foreach ($process_results as $key_pr => $value_pr) {

                    $process_result_stock = Stock::where('id', $value_pr->st_id)->whereNotNull('st_bric_value')->first();                    

                    if ($process_result_stock != null) {

                        $stock_value = $process_result_stock->st_bric_value;

                        $compute = $this->checkRatio($process_result_stock); 

                        if ($compute == true) {

                            print_r($value->pr_instruction_number."<br>");

                            $this->determineRatio($process_result_stock, $pr_id, $stock_value);

                            if ($process_result_stock->pr_id != null) {

                                $this->updateBreakDownAll($updateRequest, $process_result_stock->pr_id);

                            }

                        } 

                    }

                }

            }    

        }
    }


    public function checkRatio ($process_result_stock) {

        $compute = false;

        $total_ratio = 0;

        $stock_items_breakdown = StockBreakdown::where('st_id', $process_result_stock->id)->get();

        $total_ratio += $this->getTotalRatio($stock_items_breakdown);

        if (number_format($total_ratio, 2, '.', '') != '1.00') {

            $compute = true;

        }

        return  $compute;           

    } 

    public function getTotalRatio ($stock_items_breakdown) {

        $total_ratio = 0;

        foreach ($stock_items_breakdown as $key_breakdown => $value_breakdown) {

            $total_ratio += $value_breakdown->stb_value_ratio;

        }    

        return  $total_ratio;           

    }


    public function determineRatio ($process_result_stock, $pr_id, $stock_value) {

        $total_value = 0;

        $stk_id = null;

        $stock_items_breakdown = null;     

        $items_processed = Stock::where('pr_id', $pr_id)->get();    

        $stk_id = $process_result_stock->id;   

        $total_value = $this->getTotalValue($pr_id);

        if ($total_value == 0 ) {

            $total_value = Stock::where('id', $stk_id)->first();

            $total_value = $total_value->st_bric_value;

        }

        foreach ($items_processed as $key_ip => $value_ip) {

            $stock_items_breakdown = StockBreakdown::where('st_id', $value_ip->id)->get();

            $this->computeRatio($stock_items_breakdown, $total_value, $stk_id);

        }

    } 

    public function getTotalValue ($pr_id) {

        $total_value = 0;    

        $stock_details = Stock::where('pr_id', $pr_id)->get();

        foreach ($stock_details as $key => $value) {

            $total_value += $value->st_bric_value;  

        }

        return $total_value;

    } 

    public function computeRatio ($stock_items_breakdown, $total_value, $stk_id) {

        $item_ratio = 0;

        $item_value = 0;

        $stb_id = null;

        $st_id = null;

        $st_id_br = null;

        $br_id = null;

        $total_ratio = 0;

        $count = 0;

        if (!$stock_items_breakdown->isEmpty()) {

            foreach ($stock_items_breakdown as $key_breakdown => $value_breakdown) {            

                $item_value = $value_breakdown->stb_value;

                $st_id_br = $value_breakdown->br_id;

                // print_r($value_breakdown->id.'-'.$item_value."<br>");

                $count +=1;                  

                if ($item_value == "0.0000000000") {

                    StockBreakdown::where('st_id', $stk_id)->where('br_id', $st_id_br)->where('stb_value', '=', '0.0000000000')
                                    ->update(['stb_value' => 0, 'stb_value_ratio' => 0]);

                    $item_value = StockBreakdown::where('st_id', $stk_id)->where('br_id', $st_id_br)->where('stb_value', '!=', '0.0000000000')->first();

                    if ($item_value != null) {

                        $item_value = $item_value->stb_value;

                    }                

                }


                // StockBreakdown::where('st_id', $stk_id)->where('br_id', $st_id_br)->where('stb_value', $item_value)
                //                 ->update(['stb_value' => 0, 'stb_value_ratio' => 0]);

                if ($item_value <= $total_value && $total_value != 0 ) {

                    $item_ratio = $item_value/$total_value;

                    $total_ratio += $item_ratio;   

                    StockBreakdown::where('st_id', $stk_id)->where('br_id', $st_id_br)->where('stb_value', '!=', '0.0000000000')
                                    ->update(['stb_value' => $item_value, 'stb_value_ratio' => $item_ratio]);

                }

            }                      

        } else {

            $stock_items_breakdown = StockBreakdown::where('st_id', $stk_id)->get();

            foreach ($stock_items_breakdown as $key_breakdown => $value_breakdown) {     
                
                $st_id_br = $value_breakdown->br_id;

                $item_value = $value_breakdown->stb_value;

                if ($item_value == "0.0000000000") {

                    StockBreakdown::where('st_id', $stk_id)->where('br_id', $st_id_br)->where('stb_value', '=', '0.0000000000')
                                    ->update(['stb_value' => 0, 'stb_value_ratio' => 0]);

                } else if ($item_value <= $total_value && $total_value != 0 ) {

                    $item_ratio = $item_value/$total_value;

                    $total_ratio += $item_ratio;   

                    StockBreakdown::where('st_id', $stk_id)->where('br_id', $st_id_br)->where('stb_value', '!=', '0.0000000000')
                                    ->update(['stb_value' => $item_value, 'stb_value_ratio' => $item_ratio]);


                }

                // print_r($total_value."<br>");



            }

        }


       // print_r($st_id_br."<br>");
      

    }

    public function getBreakdownGrid (){
        
       $grid = new Grid(
            (new GridConfig)
                ->setDataProvider(
                    new EloquentDataProvider(Breakdown_Without_Stuffed::query())
                )
                ->setName('BreakDownWithoutStuffed_' . date('d-m-Y'))
                ->setPageSize(50)
                ->setColumns([
                    (new FieldConfig)
                        ->setName('csn_season')
                        ->setLabel('Season')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('csn_season')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('br_no')
                        ->setLabel('Bric')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('br_no')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('bs_code')
                        ->setLabel('Code')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('bs_code')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('bs_quality')
                        ->setLabel('Quality')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('bs_quality')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('ibs_code')
                        ->setLabel('Internal Code')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('ibs_code')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('ibs_quality')
                        ->setLabel('Internal Quality')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('ibs_quality')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('st_outturn')
                        ->setLabel('Outturn')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('st_outturn')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('cgrad_name')
                        ->setLabel('Grade')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('cgrad_name')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('cg_name')
                        ->setLabel('Buyer')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('cg_name')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('cb_name')
                        ->setLabel('Grower')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('cb_name')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('weight')
                        ->setLabel('Weight')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('weight')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('price')
                        ->setLabel('Price')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('price')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('value')
                        ->setLabel('Value')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('value')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('br_diffrential')
                        ->setLabel('Diff')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('br_diffrential')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('sl_hedge')
                        ->setLabel('Hedge')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('sl_hedge')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('status')
                        ->setLabel('Status')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('status')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('stuffed_weight')
                        ->setLabel('Stuffed_Weight')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('stuffed_weight')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('stuffing_date')
                        ->setLabel('Stuffing_Date')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('stuffing_date')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('wr_name')
                        ->setLabel('Warehouse')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('wr_name')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    

                   
                ])
                ->setComponents([
                    (new THead)
                        ->setComponents([
                            (new ColumnHeadersRow),
                            (new FiltersRow)
                                ->addComponents([
                                    (new RenderFunc(function () {
                                        return HTML::style('js/daterangepicker/daterangepicker-bs3.css')
                                        . HTML::script('js/moment/moment-with-locales.js')
                                        . HTML::script('js/daterangepicker/daterangepicker.js')
                                        . "<style>
                                                .daterangepicker td.available.active,
                                                .daterangepicker li.active,
                                                .daterangepicker li:hover {
                                                    color:black !important;
                                                    font-weight: bold;
                                                }
                                           </style>";
                                    }))
                                      
                                ])
                            ,
                            (new OneCellRow)
                                ->setRenderSection(RenderableRegistry::SECTION_END)
                                ->setComponents([
                                    new RecordsPerPage,
                                    new ColumnsHider,
                                    new ExcelExport(),
                                    new CsvExport(),
                                    (new HtmlTag)
                                        ->setContent('<span class="glyphicon glyphicon-refresh"></span> Filter')
                                        ->setTagName('button')
                                        ->setRenderSection(RenderableRegistry::SECTION_END)
                                        ->setAttributes([
                                            'class' => 'btn btn-success btn-sm'
                                        ])
                                ])
                        ])
                    ,
                    (new TFoot)
                        ->setComponents([
                            (new TotalsRow(['posts_count', 'comments_count'])),
                            (new TotalsRow(['posts_count', 'comments_count']))
                                ->setFieldOperations([
                                    'posts_count' => TotalsRow::OPERATION_AVG,
                                    'comments_count' => TotalsRow::OPERATION_AVG,
                                ])
                            ,
                            (new OneCellRow)
                                ->setComponents([
                                    new Pager,
                                    (new HtmlTag)
                                        ->setAttributes(['class' => 'pull-right'])
                                        ->addComponent(new ShowingRecords)
                                    ,
                                ])
                        ])
                    ,
                ])
        );
        $grid = $grid->render();

        return $grid;

    }


}
