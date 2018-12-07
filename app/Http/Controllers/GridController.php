<?php namespace Ngea\Http\Controllers;

use Illuminate\Html\HtmlFacade AS HTML;
use Input;
use confirm;
use DB;
use ask;
use Illuminate\Http\Request;
use Ngea\Http\Controllers\Controller;
use Ngea\Parchment;
use Ngea\ParchmentType;
use Ngea\Growers;




use Ngea\growerdetails;
use Ngea\buyerdetails;

use Ngea\parchmentdetails;
use Ngea\parchmentqualitydetails;
use Ngea\cleancoffeedetails;
use Ngea\saledetails;
use Ngea\millerreturns;
use Ngea\parchment_unmilled;
use Ngea\parchment_milled;
use Ngea\tel_extensions;


use Ngea\activities;

use Ngea\bookingdetails;

use Ngea\CropType;
use Ngea\MillingStatus;
use Ngea\outturn_with_names;
use Ngea\Season;
use Ngea\User;
use Ngea\CoffeeClass;
use Ngea\OutturnQuality;
use Ngea\QualityAnalysis;
use Nayjest\Grids\Grids;
use View;
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



class GridController extends Controller {


    public function telExtensionsGrid (Request $request){

        $grid = new Grid(
            (new GridConfig)
                ->setDataProvider(
                    new EloquentDataProvider(tel_extensions::query())
                )
                ->setName('TelephoneExtensions ' . date('d-m-Y'))
                ->setPageSize(50)
                ->setColumns([
/*                    (new FieldConfig)
                        ->setName('id')
                        ->setLabel('ID')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('id')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                        
                        ->setSortable(true)
                        ->setSorting(Grid::SORT_ASC)
                    ,*/
                    (new FieldConfig)
                        ->setName('id')
                        ->setLabel('ID')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('id')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                        
                        ->setSortable(true)
                        ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('dprt_name')
                        ->setLabel('Department')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('dprt_name')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                        
                        ->setSortable(true)
                        ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('per_fname')
                        ->setLabel('First Name')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('per_fname')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                        
                        ->setSortable(true)
                        ->setSorting(Grid::SORT_ASC)
                    ,                    
                    (new FieldConfig)
                        ->setName('per_sname')
                        ->setLabel('Second Name')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('per_sname')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                        
                        ->setSortable(true)
                        ->setSorting(Grid::SORT_ASC)
                    ,

                    (new FieldConfig)
                        ->setName('per_extension')
                        ->setLabel('Extension')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('per_extension')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                        
                        ->setSortable(true)
                        ->setSorting(Grid::SORT_ASC)
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
                                    (new CsvExport)
                                        ->setFileName('TelephoneExtensions_' . date('d-m-Y'))
                                    ,
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

        return view('telextensions', compact('grid', 'text'));
    }







    public function growerGrid (Request $request){

        $grid = new Grid(
            (new GridConfig)
                ->setDataProvider(
                    new EloquentDataProvider(growerdetails::query())
                )
                ->setName('Growers_' . date('d-m-Y'))
                ->setPageSize(50)
                ->setColumns([
/*                    (new FieldConfig)
                        ->setName('id')
                        ->setLabel('ID')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('id')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                        
                        ->setSortable(true)
                        ->setSorting(Grid::SORT_ASC)
                    ,*/
                    (new FieldConfig)
                        ->setName('Name')
                        ->setLabel('Name')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('Name')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                        
                        ->setSortable(true)
                        ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('Code')
                        ->setLabel('Code')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('Code')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                        
                        ->setSortable(true)
                        ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('Mark')
                        ->setLabel('Mark')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('Mark')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                        
                        ->setSortable(true)
                        ->setSorting(Grid::SORT_ASC)
                    ,                    
                    (new FieldConfig)
                        ->setName('Type')
                        ->setLabel('Type')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('Type')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                        
                        ->setSortable(true)
                        ->setSorting(Grid::SORT_ASC)
                    ,


                    (new FieldConfig)
                        ->setName('Booked')
                        ->setLabel('Booked Bags')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('Booked')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                        
                        ->setSortable(true)
                        ->setSorting(Grid::SORT_ASC)
                    ,

                    (new FieldConfig)
                        ->setName('Bags')
                        ->setLabel('Brought Bags')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('Bags')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                        
                        ->setSortable(true)
                        ->setSorting(Grid::SORT_ASC)
                    ,


                    (new FieldConfig)
                        ->setName('Total_Weight')
                        ->setLabel('Total Weight Brought')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('Total_Weight')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                        
                        ->setSortable(true)
                        ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('Date Added')
                        ->setLabel('Date Added')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('Date Added')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                        
                        ->setSortable(true)
                        ->setSorting(Grid::SORT_ASC)
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
                                    (new CsvExport)
                                        ->setFileName('Growers_' . date('d-m-Y'))
                                    ,
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

        return view('growerdetails', compact('grid', 'text'));
    }

// protected $fillable = ['id', 'Name', 'Code', 'No. of Purchases' , 'Date Added'];
    public function buyerGrid (Request $request){

        $grid = new Grid(
            (new GridConfig)
                ->setDataProvider(
                    new EloquentDataProvider(buyerdetails::query())
                )
                ->setName('Buyers_' . date('d-m-Y'))
                ->setPageSize(50)
                ->setColumns([
/*                    (new FieldConfig)
                        ->setName('id')
                        ->setLabel('ID')
                        ->setSortable(true)
                        ->setSorting(Grid::SORT_ASC)
                    ,*/
                    (new FieldConfig)
                        ->setName('Name')
                        ->setLabel('Name')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('Name')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                           
                        ->setSortable(true)
                        ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('Code')
                        ->setLabel('Code')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('Code')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                           
                        ->setSortable(true)
                        ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('Purchases')
                        ->setLabel('No. of Purchases')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('Purchases')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                           
                        ->setSortable(true)
                        ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('Date Added')
                        ->setLabel('Date Added')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('Date Added')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                           
                        ->setSortable(true)
                        ->setSorting(Grid::SORT_ASC)
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
                                    (new CsvExport)
                                        ->setFileName('Buyers_' . date('d-m-Y'))
                                    ,
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

        return view('growerdetails', compact('grid', 'text'));
    }

    public function parchmentUnmilledGrid (Request $request){

        $grid = new Grid(
            (new GridConfig)
                ->setDataProvider(
                    new EloquentDataProvider(parchment_unmilled::query())
                )
                ->setName('UnmilledParchment_' . date('d-m-Y'))
                ->setPageSize(50)
                ->setColumns([
                    (new FieldConfig)
                        ->setName('cgr_mark')
                        ->setLabel('Grower Mark')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('cgr_mark')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                           
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('outt_number')
                        ->setLabel('Outturn')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('outt_number')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                           
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('grn_number')
                        ->setLabel('GRN Number')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('grn_number')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                           
                        ->setSortable(true)
                        ->setSorting(Grid::SORT_DESC)
                    ,
                    (new FieldConfig)
                        ->setName('PType')
                        ->setLabel('Parchment Type')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('PType')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                           
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('Season')
                        ->setLabel('Season')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('Season')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                           
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('gross_weight')
                        ->setLabel('Gross Weight')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('gross_weight')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                           
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('outt_bags')
                        ->setLabel('Bags')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('outt_bags')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                           
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('outt_delivery_date')
                        ->setLabel('Delivery Date')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('outt_delivery_date')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                           
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_DESC)
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
                                    (new CsvExport)
                                        ->setFileName('UnmilledParchment_' . date('d-m-Y'))
                                    ,
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

        return view('parchmentreportunmilled', compact('grid', 'text'));
    }

    public function parchmentMilledGrid (Request $request){

        $grid = new Grid(
            (new GridConfig)
                ->setDataProvider(
                    new EloquentDataProvider(parchment_milled::query())
                )
                ->setName('MilledParchment_' . date('d-m-Y'))
                ->setPageSize(50)
                ->setColumns([
                    (new FieldConfig)
                        ->setName('cgr_mark')
                        ->setLabel('Grower Mark')
                        # That's all what you need for filtering. 
                        # It will create controls, process input 
                        # and filter results (in case of EloquentDataProvider -- modify SQL query)
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('cgr_mark')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )
                        # sorting buttons will be added to header, DB query will be modified
                        #->setSortable(true)
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('outt_number')
                        ->setLabel('Outturn')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('outt_number')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )

                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('grn_number')
                        ->setLabel('GRN Number')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('grn_number')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                        
                        ->setSortable(true)
                        ->setSorting(Grid::SORT_DESC)
                    ,
                    (new FieldConfig)
                        ->setName('PType')
                        ->setLabel('Parchment Type')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('PType')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                        
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('Season')
                        ->setLabel('Season')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('Season')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                        
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('gross_weight')
                        ->setLabel('Gross Weight')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('gross_weight')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                        
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('outt_bags')
                        ->setLabel('Bags')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('outt_bags')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                           
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('outt_date_milled')
                        ->setLabel('Milling Date')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('outt_date_milled')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                        
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
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
                                    (new CsvExport)
                                        ->setFileName('MilledParchment_' . date('d-m-Y'))
                                    ,
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

        return view('parchmentreportmilled', compact('grid', 'text'));
    }

   


    public function parchmentQualityGrid (Request $request){
        $result = parchmentqualitydetails::first();
        
       // dump($result->Sc18p); exit;
        $grid = new Grid(
            (new GridConfig)
                ->setDataProvider(
                    new EloquentDataProvider(parchmentqualitydetails::query())
                )
                ->setName('ParchmentQuality_' . date('d-m-Y'))
                ->setPageSize(50)
                ->setColumns([
                    (new FieldConfig)
                        ->setName('cgr_mark')
                        ->setLabel('Grower Mark')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('cgr_mark')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                           
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('Season')
                        ->setLabel('Season')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('Season')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                           
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_DESC)
                    ,
                    (new FieldConfig)
                        ->setName('outt_number')
                        ->setLabel('Outturn')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('outt_number')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                           
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_DESC)
                    ,
                    (new FieldConfig)
                        ->setName('PType')
                        ->setLabel('Parchment Type')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('PType')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                           
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    
                    ,
                    (new FieldConfig)
                        ->setName('gross_weight')
                        ->setLabel('Gross Weight')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('gross_weight')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                           
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('AQRSerial')
                        ->setLabel('AQR Serial')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('AQRSerial')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                           
                        ->setSortable(true)
                       // ->setSorting(Grid::SORT_DESC)
                    ,
                    (new FieldConfig)
                        ->setName('cropType')
                        ->setLabel('Crop Type')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('cropType')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                           
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('Class')
                        ->setLabel('Class')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('Class')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                           
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('Moisture')
                        ->setLabel('MC(%)')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('Moisture')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                           
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('millingLoss')
                        ->setLabel('Milling Loss(%)')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('millingLoss')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                           
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    
                   (new FieldConfig)
                        ->setName('sc18p')
                        ->setLabel('sc18(%)')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('sc18p')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                           
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                   ,
                   (new FieldConfig)
                        ->setName('sc16p')
                        ->setLabel('sc16(%)')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('sc16p')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        ) 
                        
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                   ,
                   (new FieldConfig)
                        ->setName('sc14p')
                        ->setLabel('sc14(%)')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('sc14p')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                           
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                   ,
                   (new FieldConfig)
                        ->setName('THESBp')
                        ->setLabel('THESB(%)')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('THESBp')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                           
                        ->setSortable(true)

                        // ->setComponents(
                        //     (new HtmlTag)
                        //         ->setAttributes('pull-right')
                        //         ->addComponent(new ShowingRecords)
                            
                        // ->setSorting(Grid::SORT_ASC)
                   ,
                  
                   (new FieldConfig)
                        ->setName('oqlty_remarks')
                        ->setLabel('Remarks')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('oqlty_remarks')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                           
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
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
                                    (new CsvExport)
                                        ->setFileName('ParchmentQuality_' . date('d-m-Y'))
                                    ,
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

        return view('parchmentreportquality', compact('grid', 'text'));
    }







    public function cleanReportAvailableGrid (Request $request){
        $query = cleancoffeedetails::where('Sale_Status','=','Available');
        $grid = new Grid(
            (new GridConfig)
                ->setDataProvider(
                    new EloquentDataProvider($query)
                )
                ->setName('CleanAvailable_' . date('d-m-Y'))
                ->setPageSize(50)
                ->setColumns([
                    (new FieldConfig)
                        ->setName('outt_delivery_date')
                        ->setLabel('Delivery_Date')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('outt_delivery_date')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                          
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('Mark')
                        ->setLabel('Grower Mark')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('Mark')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                          
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('StraightOT')
                        ->setLabel('StraightOT')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('StraightOT')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                          
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('PBulkOT')
                        ->setLabel('PBulkOT')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('PBulkOT')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                          
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('CBulkOT')
                        ->setLabel('CBulkOT')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('CBulkOT')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                            
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('Season')
                        ->setLabel('Season')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('Season')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                          
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('PType')
                        ->setLabel('Parchment Type')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('PType')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                          
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('Grade')
                        ->setLabel('Grade')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('Grade')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                          
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('Weight')
                        ->setLabel('Weight')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('Weight')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                          
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('Sale_Status')
                        ->setLabel('Sale Status')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('Sale_Status')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                          
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    // (new FieldConfig)
                    //     ->setName('Seleable_Status')
                    //     ->setLabel('Seleable Status')
                    //     ->addFilter(
                    //         (new FilterConfig)
                    //             ->setName('Seleable_Status')
                    //             ->setOperator(FilterConfig::OPERATOR_LIKE)
                    //     )                          
                    //     ->setSortable(true)
                    //     // ->setSorting(Grid::SORT_ASC)
                    // ,
                    (new FieldConfig)
                        ->setName('wr_initials')
                        ->setLabel('Warehouse')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('wr_initials')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                          
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
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
                                    (new CsvExport)
                                        ->setFileName('CleanAvailable_' . date('d-m-Y'))
                                    ,
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

        return view('cleanreportavailable', compact('grid', 'text'));
    }


    public function cleanReportSoldGrid (Request $request){
        $query = cleancoffeedetails::where('Sale_Status','!=','Available');
        $grid = new Grid(
            (new GridConfig)
                ->setDataProvider(
                    new EloquentDataProvider($query)
                )
                ->setName('CleanSold_' . date('d-m-Y'))
                ->setPageSize(50)
                ->setColumns([
                    (new FieldConfig)
                        ->setName('Sale_Date')
                        ->setLabel('Sale_Date')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('Sale_Date')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                          
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('Mark')
                        ->setLabel('Grower Mark')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('Mark')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                          
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('StraightOT')
                        ->setLabel('StraightOT')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('StraightOT')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                          
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('PBulkOT')
                        ->setLabel('PBulkOT')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('PBulkOT')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                          
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('CBulkOT')
                        ->setLabel('CBulkOT')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('CBulkOT')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                          
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('Season')
                        ->setLabel('Season')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('Season')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                          
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('PType')
                        ->setLabel('Parchment Type')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('PType')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                          
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('Grade')
                        ->setLabel('Grade')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('Grade')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                          
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('Weight')
                        ->setLabel('Weight')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('Weight')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                          
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('Sale_Status')
                        ->setLabel('Sale Status')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('Sale_Status')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                          
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
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
                                    (new CsvExport)
                                        ->setFileName('CleanSold_' . date('d-m-Y'))
                                    ,
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

        return view('cleanreportsold', compact('grid', 'text'));
    }

    public function cleanReportSaleGrid (Request $request){
      
        $grid = new Grid(
            (new GridConfig)
                ->setDataProvider(
                    new EloquentDataProvider(saledetails::query())
                )
                ->setName('CleanSales_' . date('d-m-Y'))
                ->setPageSize(50)
                ->setColumns([
                    (new FieldConfig)
                        ->setName('Sale_Date')
                        ->setLabel('Sale Date')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('Sale_Date')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                        
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('Mark')
                        ->setLabel('Grower Mark')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('Mark')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                        
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('StraightOT')
                        ->setLabel('StraightOT')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('StraightOT')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                        
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('PBulkOT')
                        ->setLabel('PBulkOT')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('PBulkOT')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                        
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('CBulkOT')
                        ->setLabel('CBulkOT')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('CBulkOT')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                        
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('Season')
                        ->setLabel('Season')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('Season')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                        
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('Grade')
                        ->setLabel('Grade')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('Grade')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                        
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('Weight')
                        ->setLabel('Weight')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('Weight')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                        
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('Buyer')
                        ->setLabel('Buyer')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('Buyer')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                        
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('Sale_Season')
                        ->setLabel('Sale Season')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('Sale_Season')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                        
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('Sale_No')
                        ->setLabel('Sale No.')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('Sale_No')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                        
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('Lot_No')
                        ->setLabel('Lot No.')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('Lot_No')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                        
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('Rate')
                        ->setLabel('Rate')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('Rate')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                        
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('Sale_Value')
                        ->setLabel('Sale Value')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('Sale_Value')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                        
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
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
                                    (new CsvExport)
                                        ->setFileName('CleanSales_' . date('d-m-Y'))
                                    ,
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

        return view('cleanreportsaleinfo', compact('grid', 'text'));
    }

    public function millerReturnsGrid (Request $request){
 
        $grid = new Grid(
            (new GridConfig)
                ->setDataProvider(
                    new EloquentDataProvider(millerreturns::query())
                )
                ->setName('MillerReturns_' . date('d-m-Y'))
                ->setPageSize(50)
                ->setColumns([
                    (new FieldConfig)
                        ->setName('outt_date_milled')
                        ->setLabel('Date_Milled')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('outt_date_milled')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                           
                        ->setSortable(true)
                        ->setSorting(Grid::SORT_DESC)
                    ,
                    (new FieldConfig)
                        ->setName('cgr_grower')
                        ->setLabel('Grower')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('cgr_grower')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('cgr_code')
                        ->setLabel('Code')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('cgr_code')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('outt_number')
                        ->setLabel('Outturn')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('outt_number')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('Season')
                        ->setLabel('Season')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('Season')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('P1')
                        ->setLabel('P1')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('P1')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('P2')
                        ->setLabel('P2')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('P2')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,                    
                    (new FieldConfig)
                        ->setName('P3')
                        ->setLabel('P3')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('P3')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('PL')
                        ->setLabel('PL')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('PL')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('E')
                        ->setLabel('E')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('E')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    , 
                    (new FieldConfig)
                        ->setName('AA')
                        ->setLabel('AA')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('AA')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('AB')
                        ->setLabel('AB')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('AB')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('PB')
                        ->setLabel('PB')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('PB')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('C')
                        ->setLabel('C')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('C')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('TT')
                        ->setLabel('TT')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('TT')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('T')
                        ->setLabel('T')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('T')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('HE')
                        ->setLabel('HE')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('HE')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('SB')
                        ->setLabel('SB')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('SB')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('UG')
                        ->setLabel('UG')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('UG')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('UG1')
                        ->setLabel('UG1')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('UG1')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('UG2')
                        ->setLabel('UG2')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('UG2')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('UG3')
                        ->setLabel('UG3')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('UG3')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('CLEANTOTAL')
                        ->setLabel('CLEANTOTAL')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('CLEANTOTAL')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('MillingLoss')
                        ->setLabel('MillingLoss')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('MillingLoss')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('MBUNI')
                        ->setLabel('MBUNI')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('MBUNI')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('MH')
                        ->setLabel('MH')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('MH')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('ML')
                        ->setLabel('ML')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('ML')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('TOTALCLEANMBUNI')
                        ->setLabel('TOTALCLEANMBUNI')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('TOTALCLEANMBUNI')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
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
                                    (new CsvExport)
                                        ->setFileName('MillerReturns_' . date('d-m-Y'))
                                    ,
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

        return view('millerreturns', compact('grid', 'text'));
    }


    public function activitiesGrid (Request $request){
 
        $grid = new Grid(
            (new GridConfig)
                ->setDataProvider(
                    new EloquentDataProvider(activities::query())
                )
                ->setName('ActivityLogs_' . date('d-m-Y'))
                ->setPageSize(50)
                ->setColumns([
                    (new FieldConfig)
                        ->setName('usr_name')
                        ->setLabel('User Name')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('usr_name')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                           
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('operation')
                        ->setLabel('Operation')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('operation')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,

                    (new FieldConfig)
                        ->setName('changes')
                        ->setLabel('Changes Applied')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('changes')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('ip_address')
                        ->setLabel('Address')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('ip_address')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('created_at')
                        ->setLabel('Date')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('created_at')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                        // ->setSorting(Grid::SORT_ASC)
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
                                    (new CsvExport)
                                        ->setFileName('ActivityLogs_' . date('d-m-Y'))
                                    ,
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

        return view('activities', compact('grid', 'text'));
    }




    public function bookingGrid (Request $request){
 
        $grid = new Grid(
            (new GridConfig)
                ->setDataProvider(
                    new EloquentDataProvider(bookingdetails::query())
                )
                ->setName('Booking_' . date('d-m-Y'))
                ->setPageSize(50)
                ->setColumns([
                    (new FieldConfig)
                        ->setName('ref_no')
                        ->setLabel('Ref')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('ref_no')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                           
                        ->setSortable(true)
                        ->setSorting(Grid::SORT_DESC)
                    ,
                    (new FieldConfig)
                        ->setName('cgr_grower')
                        ->setLabel('Grower')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('cgr_grower')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                        ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('cgr_code')
                        ->setLabel('Code')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('cgr_code')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                        ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('cgr_mark')
                        ->setLabel('Mark')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('cgr_mark')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                        ->setSorting(Grid::SORT_ASC)
                    ,

                    (new FieldConfig)
                        ->setName('agt_name')
                        ->setLabel('Agent')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('agt_name')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                        ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('delivery_date')
                        ->setLabel('Delivery Date')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('delivery_date')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                        ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('P1')
                        ->setLabel('P1')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('P1')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                        ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('P2')
                        ->setLabel('P2')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('P2')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                        ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('P3')
                        ->setLabel('P3')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('P3')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                        ->setSorting(Grid::SORT_ASC)
                    ,

                    (new FieldConfig)
                        ->setName('PL')
                        ->setLabel('PL')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('PL')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                        ->setSorting(Grid::SORT_ASC)
                    ,

                    (new FieldConfig)
                        ->setName('MBUNI')
                        ->setLabel('MBUNI')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('MBUNI')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                        ->setSorting(Grid::SORT_ASC)
                    ,



                    (new FieldConfig)
                        ->setName('ESTATE_CURED')
                        ->setLabel('ESTATE_CURED')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('ESTATE_CURED')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                        ->setSorting(Grid::SORT_ASC)
                    ,



                    (new FieldConfig)
                        ->setName('Total')
                        ->setLabel('Total')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('Total')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                        ->setSorting(Grid::SORT_ASC)
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
                                    (new CsvExport)
                                        ->setFileName('Booking_' . date('d-m-Y'))
                                    ,
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

        return view('bookingdetails', compact('grid', 'text'));
    }

}

