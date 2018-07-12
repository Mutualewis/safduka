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
use Ngea\StockMovement;

use Ngea\coffeewarrant;
use Ngea\buyer;
use Ngea\saleinfo;
use Ngea\SaleType;
use Ngea\Sale;

use  Ngea\Warehouse;
use  Ngea\Region;
use  Ngea\BoughtNoRelease;


use PDF;
use Activity;
use Excel;

use Nayjest\Grids\Grid;
use Nayjest\Grids\Components\Base\RenderableRegistry;
use Nayjest\Grids\Components\ColumnHeadersRow;
use Nayjest\Grids\Components\ColumnsHider;
use Nayjest\Grids\Components\CsvExport;
use Nayjest\Grids\Components\PdfExport;

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
use Ngea\StockView;
use Ngea\StockViewAllLocations;
use Ngea\ExpectedArrival;
use Ngea\sale_lots;
use Ngea\StockAndPurchased;

use delete;



class StocksGridController extends Controller {

  public function stockAllGrid (Request $request){
        $query = StockView::query();
        $grid = new Grid(
            (new GridConfig)
                ->setDataProvider(
                    new EloquentDataProvider($query)
                )
                ->setName('Stocks_All_' . date('d-m-Y'))
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
                        ->setName('gr_number')
                        ->setLabel('GRN')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('gr_number')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('sale')
                        ->setLabel('Sale')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('sale')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('lot')
                        ->setLabel('Lot')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('lot')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    
                    (new FieldConfig)
                        ->setName('outturn')
                        ->setLabel('Outturn')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('outturn')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,

                    (new FieldConfig)
                        ->setName('mark')
                        ->setLabel('Mark')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('mark')
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
                        ->setName('grade')
                        ->setLabel('Grade')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('grade')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
  
                    (new FieldConfig)
                        ->setName('quality')
                        ->setLabel('Quality')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('quality')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,

                    (new FieldConfig)
                        ->setName('code')
                        ->setLabel('Code')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('code')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,

                    (new FieldConfig)
                        ->setName('cert')
                        ->setLabel('Cert')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('cert')
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
                        ->setName('bags')
                        ->setLabel('Bags')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('bags')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,

                    (new FieldConfig)
                        ->setName('pockets')
                        ->setLabel('Pockets')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('pockets')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,

                    (new FieldConfig)
                        ->setName('price')
                        ->setLabel('price')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName(DB::Raw('price'))
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    , 


                    (new FieldConfig)
                        ->setName('differential')
                        ->setLabel('Diff')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName(DB::Raw('differential'))
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    , 


                    (new FieldConfig)
                        ->setName('br_no')
                        ->setLabel('Bric')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName(DB::Raw('br_no'))
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    , 

                    (new FieldConfig)
                        ->setName('location')
                        ->setLabel('Location')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('location')
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

        return View::make('stockall', compact('id','grid'));

    }

  public function stockAllAndPurchasedGrid (Request $request){
        $query = StockAndPurchased::query();
        $grid = new Grid(
            (new GridConfig)
                ->setDataProvider(
                    new EloquentDataProvider($query)
                )
                ->setName('Stocks_All_' . date('d-m-Y'))
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
                        ->setName('gr_number')
                        ->setLabel('GRN')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('gr_number')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('sale')
                        ->setLabel('Sale')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('sale')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('lot')
                        ->setLabel('Lot')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('lot')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    
                    (new FieldConfig)
                        ->setName('outturn')
                        ->setLabel('Outturn')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('outturn')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,

                    (new FieldConfig)
                        ->setName('mark')
                        ->setLabel('Mark')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('mark')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,

                    (new FieldConfig)
                        ->setName('grade')
                        ->setLabel('Grade')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('grade')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,

                    (new FieldConfig)
                        ->setName('prt_name')
                        ->setLabel('Results_Type')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('prt_name')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
  
                    (new FieldConfig)
                        ->setName('quality')
                        ->setLabel('Quality')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('quality')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,

                    (new FieldConfig)
                        ->setName('code')
                        ->setLabel('Code')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('code')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,

                    (new FieldConfig)
                        ->setName('cert')
                        ->setLabel('Cert')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('cert')
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
                        ->setName('bags')
                        ->setLabel('Bags')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('bags')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,

                    (new FieldConfig)
                        ->setName('pockets')
                        ->setLabel('Pockets')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('pockets')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,

                    (new FieldConfig)
                        ->setName('price')
                        ->setLabel('Price')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName(DB::Raw('price'))
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    , 


                    (new FieldConfig)
                        ->setName('bric')
                        ->setLabel('Bric')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName(DB::Raw('bric'))
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    , 

                    (new FieldConfig)
                        ->setName('status')
                        ->setLabel('Status')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName(DB::Raw('status'))
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    , 

                    (new FieldConfig)
                        ->setName('wr_name')
                        ->setLabel('Warehouse')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName(DB::Raw('wr_name'))
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    , 

                    (new FieldConfig)
                        ->setName('location')
                        ->setLabel('Location')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('location')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    
                    (new FieldConfig)
                        ->setName('prp_name')
                        ->setLabel('Prov Purpose')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName(DB::Raw('prp_name'))
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    , 

                    
                    (new FieldConfig)
                        ->setName('sct_start_date')
                        ->setLabel('Ship Date')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName(DB::Raw('sct_start_date'))
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

        return View::make('stockallandpurchased', compact('id','grid'));

    }










  public function StockExpectedGrid (Request $request){
        $query = ExpectedArrival::query();

        $grid = new Grid(
            (new GridConfig)
                ->setDataProvider(
                    new EloquentDataProvider($query)
                )
                ->setName('Stocks_Expected_' . date('d-m-Y'))
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
                        ->setName('sale')
                        ->setLabel('Sale')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('sale')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('slr_name')
                        ->setLabel('Seller')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('slr_name')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    , 
                    (new FieldConfig)
                        ->setName('rl_date')
                        ->setLabel('Instruction_Date')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('rl_date')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('prompt_date')
                        ->setLabel('Propmpt')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('prompt_date')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
  
                    (new FieldConfig)
                        ->setName('lot')
                        ->setLabel('Lot')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('lot')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,

                    (new FieldConfig)
                        ->setName('outturn')
                        ->setLabel('Outturn')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('outturn')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,

                    (new FieldConfig)
                        ->setName('mark')
                        ->setLabel('Mark')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('mark')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('grade')
                        ->setLabel('Grade')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('grade')
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
                        ->setName('bags')
                        ->setLabel('Bags')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('bags')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,

                    (new FieldConfig)
                        ->setName('pockets')
                        ->setLabel('Pockets')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('pockets')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('hedge')
                        ->setLabel('Hedge')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName(DB::Raw('hedge'))
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    , 
                    (new FieldConfig)
                        ->setName('month')
                        ->setLabel('Month')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName(DB::Raw('month'))
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    , 
                    (new FieldConfig)
                        ->setName('price')
                        ->setLabel('price')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName(DB::Raw('price'))
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    , 


                    (new FieldConfig)
                        ->setName('value')
                        ->setLabel('Value')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName(DB::Raw('value'))
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    , 

                    (new FieldConfig)
                        ->setName('differential')
                        ->setLabel('Diff')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('differential')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    
                    (new FieldConfig)
                        ->setName('bric')
                        ->setLabel('Bric')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('bric')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,


                    (new FieldConfig)
                        ->setName('code')
                        ->setLabel('Code')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('code')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('wr_name')
                        ->setLabel('Warehouse')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName(DB::Raw('wr_name'))
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    , 


                    (new FieldConfig)
                        ->setName('rl_no')
                        ->setLabel('Release')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('rl_no')
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

        return View::make('stockexpected', compact('id','grid'));

    }



 public function StockBoughtGrid (Request $request){
        $query = BoughtNoRelease::query();

        $grid = new Grid(
            (new GridConfig)
                ->setDataProvider(
                    new EloquentDataProvider($query)
                )
                ->setName('Bought_No_Release' . date('d-m-Y'))
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
                        ->setName('sale')
                        ->setLabel('Sale')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('sale')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('slr_name')
                        ->setLabel('Seller')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('slr_name')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    , 
                    (new FieldConfig)
                        ->setName('date')
                        ->setLabel('Date')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('date')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('prompt_date')
                        ->setLabel('Propmpt')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('prompt_date')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
  
                    (new FieldConfig)
                        ->setName('lot')
                        ->setLabel('Lot')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('lot')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,

                    (new FieldConfig)
                        ->setName('outturn')
                        ->setLabel('Outturn')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('outturn')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,

                    (new FieldConfig)
                        ->setName('mark')
                        ->setLabel('Mark')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('mark')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('grade')
                        ->setLabel('Grade')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('grade')
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
                        ->setName('bags')
                        ->setLabel('Bags')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('bags')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,

                    (new FieldConfig)
                        ->setName('pockets')
                        ->setLabel('Pockets')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('pockets')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('hedge')
                        ->setLabel('Hedge')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName(DB::Raw('hedge'))
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    , 
                    (new FieldConfig)
                        ->setName('month')
                        ->setLabel('Month')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName(DB::Raw('month'))
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    , 
                    (new FieldConfig)
                        ->setName('price')
                        ->setLabel('price')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName(DB::Raw('price'))
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    , 


                    (new FieldConfig)
                        ->setName('value')
                        ->setLabel('Value')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName(DB::Raw('value'))
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    , 

                    (new FieldConfig)
                        ->setName('differential')
                        ->setLabel('Diff')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('differential')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,

                    (new FieldConfig)
                        ->setName('bric')
                        ->setLabel('Bric')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('bric')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,

                    (new FieldConfig)
                        ->setName('code')
                        ->setLabel('Code')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('code')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,

                    (new FieldConfig)
                        ->setName('war_no')
                        ->setLabel('Warrant')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('war_no')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    
                    (new FieldConfig)
                        ->setName('wr_name')
                        ->setLabel('Warehouse')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName(DB::Raw('wr_name'))
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

        return View::make('boughtnorelease', compact('id','grid'));

    }



  public function stockMovementGrid (Request $request){
        $query = StockMovement::query();
        $grid = new Grid(
            (new GridConfig)
                ->setDataProvider(
                    new EloquentDataProvider($query)
                )
                ->setName('Stocks_Movement_' . date('d-m-Y'))
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
                        ->setName('sale')
                        ->setLabel('Sale')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('sale')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('lot')
                        ->setLabel('Lot')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('lot')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    
                    (new FieldConfig)
                        ->setName('outturn')
                        ->setLabel('Outturn')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('outturn')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,



                    (new FieldConfig)
                        ->setName('grade')
                        ->setLabel('Grade')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('grade')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
  
                    (new FieldConfig)
                        ->setName('quality')
                        ->setLabel('Quality')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('quality')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,

                    (new FieldConfig)
                        ->setName('code')
                        ->setLabel('Code')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('code')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,

                    (new FieldConfig)
                        ->setName('cert')
                        ->setLabel('Cert')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('cert')
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
                        ->setName('bags')
                        ->setLabel('Bags')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('bags')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,

                    (new FieldConfig)
                        ->setName('pockets')
                        ->setLabel('Pockets')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('pockets')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,

                    (new FieldConfig)
                        ->setName('price')
                        ->setLabel('price')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName(DB::Raw('price'))
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    , 

                    (new FieldConfig)
                        ->setName('location')
                        ->setLabel('Location')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('location')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,

                    (new FieldConfig)
                        ->setName('reason')
                        ->setLabel('Reason')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('reason')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,

                    (new FieldConfig)
                        ->setName('insloc_ref')
                        ->setLabel('Mvt Ref')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('insloc_ref')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,

                    (new FieldConfig)
                        ->setName('mit_name')
                        ->setLabel('Mvt Type')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('mit_name')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,

                    (new FieldConfig)
                        ->setName('created_at')
                        ->setLabel('Mvt Date')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('created_at')
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

        return View::make('stockmovement', compact('id','grid'));

    }
}