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


use Ngea\Activities;

use Ngea\CropType;
use Ngea\MillingStatus;
use Ngea\outturn_with_names;
use Ngea\Season;
use Ngea\User;
use Ngea\sale_lots;
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
                ->setName('TelephoneExtensions_' . date('d-m-Y'))
                ->setPageSize(50)
                ->setColumns([
                    (new FieldConfig)
                        ->setName('per_fname')
                        ->setLabel('First Name')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('per_fname')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
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

        return View::make('telextensions', compact('id','grid', 'text', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification'));
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


}

