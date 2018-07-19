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

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
use Ngea\Processing_Results;
use Ngea\Processes_Results_Summary;
use Ngea\Sales_Contract_Summary;

use Ngea\Sum_Bric_Summary;
use Ngea\Sum_Stock_Code;
use Ngea\Sum_of_Sales_Contract;
use Ngea\Long_Short;
use Excel;



use Ngea\Activities;

use Ngea\CropType;
use Ngea\MillingStatus;
use Ngea\outturn_with_names;
use Ngea\Season;
use Ngea\User;
use Ngea\Long_Short_Complete;
use Ngea\Stock_Reconciliation;


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
use Nayjest\Grids\CollectionDataProvider;
use Nayjest\Grids\EloquentDataProvider;
use ViewComponents\ViewComponents\Data\ArrayDataProvider;
use Nayjest\Grids\FieldConfig;
use Nayjest\Grids\FilterConfig;
use Nayjest\Grids\GridConfig;

use PdfReport;
use ExcelReport;


class StocksPerGridController extends Controller {


     public function stocksPerBric (Request $request){
        $grid = new Grid(
            (new GridConfig)
                ->setDataProvider(
                    new EloquentDataProvider(Sum_Bric_Summary::query())
                )
                ->setName('Sum_Bric_Summary_' . date('d-m-Y'))
                ->setPageSize(50)
                ->setColumns([
                    (new FieldConfig)
                        ->setName('br_no')
                        ->setLabel('Bric Number')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('br_no')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('bs_code')
                        ->setLabel('Quality Code')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('bs_code')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('bs_quality')
                        ->setLabel('Quality Basket')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('bs_quality')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('rounded_weight')
                        ->setLabel('Weight')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('rounded_weight')
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

        return View::make('stocksperbric', compact('id','grid', 'text', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification'));
    }



     public function stocksPerBasket (Request $request){
        $grid = new Grid(
            (new GridConfig)
                ->setDataProvider(
                    new EloquentDataProvider(Sum_Stock_Code::query())
                )
                ->setName('Sum_Code_Summary_' . date('d-m-Y'))
                ->setPageSize(50)
                ->setColumns([
                   
                    (new FieldConfig)
                        ->setName('code')
                        ->setLabel('Quality Code')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('code')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('bs_quality')
                        ->setLabel('Quality Basket')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('bs_quality')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('rounded_weight')
                        ->setLabel('Weight')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('rounded_weight')
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

        return View::make('stocksperbasket', compact('id','grid', 'text', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification'));
    }



     public function stocksPerPurchase (Request $request){
        $grid = new Grid(
            (new GridConfig)
                ->setDataProvider(
                    new EloquentDataProvider(Sum_of_Sales_Contract::query())
                )
                ->setName('Sum_Contract_Summary_' . date('d-m-Y'))
                ->setPageSize(50)
                ->setColumns([
                   
                    (new FieldConfig)
                        ->setName('sct_number')
                        ->setLabel('Contract Number')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('sct_number')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('br_no')
                        ->setLabel('Bric Number')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('br_no')
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
                        ->setName('total_allocated')
                        ->setLabel('Weight')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('total_allocated')
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

        return View::make('stocksperpurchase', compact('id','grid', 'text', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification'));
    }



     public function stocksLongShort (Request $request){
        $long_short = DB::select("CALL long_short_unallocated_months_procedure()");
        $long_short = json_decode(json_encode($long_short, true), true);
        // print_r($long_short);
        // print_r("<br>");
        $query = DB::table('long_short')->get();
        $query = json_decode(json_encode($query, true), true);
        
        $months_value = array();
        $months_title = array();


        $final_array =  $this->left_join_array($long_short, $query, 'code');

        foreach ($final_array as $keyfa => $valuefa) {
            foreach ($valuefa as $keyfav => $valuefav) {
                $new_value = substr($keyfav, 0, strpos($keyfav, '_', strpos($keyfav, '_')+1));
                if ($new_value == null) {
                    $new_value = $keyfav;
                }

                if(!array_key_exists($new_value, $months_title))
                {
                    $months_title[$new_value] = 0;
                }

            }
            
        }

        $new_months_title = $months_title;
        foreach ($final_array as $keyfa => $valuefa) {
            foreach ($valuefa as $keyfav => $valuefav) {
                $new_value = substr($keyfav, 0, strpos($keyfav, '_', strpos($keyfav, '_')+1));
                if ($new_value == null) {
                    $new_value = $keyfav;
                }

                if(array_key_exists($new_value, $new_months_title))
                {
                    if ($valuefav != null) {
                       $new_months_title [$new_value] = $valuefav;
                    } 

                }

            }

                array_push($months_value, $new_months_title);
                $new_months_title = $months_title; 
        }


        $months = array(null);

        foreach ($long_short as $key => $value) {
            foreach ($value as $keyk => $valuev) {
                if ($keyk != 'stock_bags' && $keyk != 'code' && $keyk != 'long_code' && $keyk != 'bs_quality' && $keyk != 'allocated_bags' && $keyk != 'value' && $keyk != 'bric_diff' && $keyk != 'stock_diff') {
                    
                    $new_value = substr($keyk, 0, strpos($keyk, '_', strpos($keyk, '_')+1));
                    if (!in_array($new_value, $months)) {

                        array_push($months, $new_value); 

                    }
                                       
                }
            }
            
        }
        

        $this->drop();

        $this->create($months);



        $final_array = $months_value;

        // print_r($final_array);
        DB::table('long_short_lsht')->truncate();
        
        DB::table('long_short_lsht')->insert(
            $final_array
        );



        $final_array = Long_Short_Complete::select('*');



        $cfg = [
            'src' => 'Ngea\Long_Short_Complete',
            'columns' => [
                'long_code' ,
                'bs_quality',
                'stock_bags',
                'allocated_bags',
                'value',
                'bric_diff',
                'stock_diff',

            ]
        ];
        

        foreach ($months as $key => $value) {
                if ($value != null) {
                    $cfg['columns'][] = strtolower(trim($value));
                }
        }

        $cfg['columns'][] = 'net_position';

        $grid = Grids::make($cfg);

        return View::make('stockslongshort', compact('id','grid', 'text', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification'));

    }


    public function downloadLongShort (Request $request){

        $long_short=null;

        $timestamp=date('m d Y H i s');

        $filename= 'Long_Short_ '.$timestamp;        

        $long_short = Long_Short_Complete::get();

        $count=count($long_short);

        $info=Excel::create($filename, function($excel) use($long_short) {        

               $excel->sheet('sheet 1', function($sheet) use($long_short){

                $sheet->fromArray($long_short);
                
               });

        })->export('xlsx');



        // print_r($long_short);



//         $meta = [
//             'Contract' => 'lewis'
//         ];


//         $query = Long_Short_Complete::select('*');

//         $title = 'Long Short';

//         // Do some querying..
//         $queryBuilder = $query;

//         $long_short = DB::select("CALL long_short_unallocated_months_procedure()");

//         $long_short = json_decode(json_encode($long_short, true), true);

//         $months = array(null);

//         foreach ($long_short as $key => $value) {
//             foreach ($value as $keyk => $valuev) {
//                 if ($keyk != 'stock_bags' && $keyk != 'code' && $keyk != 'long_code' && $keyk != 'bs_quality' && $keyk != 'allocated_bags' && $keyk != 'value' && $keyk != 'diff') {
                    
//                     $new_value = substr($keyk, 0, strpos($keyk, '_', strpos($keyk, '_')+1));
//                     if (!in_array($new_value, $months)) {

//                         array_push($months, $new_value); 

//                     }
                                       
//                 }
//             }
            
//         }

//         // Set Column to be displayed
//         $columns = [
//             'Basket' => function($result) {
//                 return $result->long_code;
//             },

//             'Quality' => function($result) {
//                 return $result->bs_quality;
//             },
//             'Stock' => function($result) {
//                 return $result->stock_bags;
//             },
//             'Allocated' => function($result) {
//                 return $result->allocated_bags;
//             },
//             'Value' => function($result) {
//                 return $result->value;
//             },
//             'Diff' => function($result) {
//                 return $result->diff;
//             }

//         ];

//         // foreach ($months as $key => $value) {
//         //         if ($value != null) {
//         //             $columns[][] = strtolower(trim($value));
//         //         }
//         // }

//         // $columns[][] = 'net_position';

// print_r($columns);
//         return ExcelReport::of($title, $meta, $queryBuilder, $columns)
//             // ->editColumns(['total_cost','total_col', 'total_diff'], [
//             //     'class' => 'hidden'
//             // ])
//             // ->setCss([
//             //     '.hidden' => 'display: none;'
//             // ])

//             // ->editColumns(['Contract', 'Code', 'Invoice Number', 'Weight'], [
//             //     'class' => 'right'
//             // ])
//             // ->showTotal([
//             //     'Weight' => 'point','Value' => 'point'
//             // ])
//             // ->groupBy('Seller')
//             // ->stream(); // or download('filename here..') to download pdf
//             ->download('long_short_'.date("d-m-Y"));





    }


    public function left_join_array($left, $right, $left_join_on, $right_join_on = NULL){
        $final= array();
        $stock_weight = null;
        $sum_unallocated = null;
        if(empty($right_join_on))
            $right_join_on = $left_join_on;

        foreach($left AS $k => $v){
            $final[$k] = $v;
            foreach($v AS $k1 => $v1){
                if ($k1 != 'stock_bags' && $k1 != 'code' && $k1 != 'long_code' && $k1 != 'bs_quality' && $k1 != 'allocated_bags' && $k1 != 'value' && $k1 != 'bric_diff' && $k1 != 'stock_diff') {
                    $sum_unallocated += $v1;
                }

            }
            foreach($right AS $kk => $vv){

                if($v[$left_join_on] == $vv[$right_join_on]){
                    foreach($vv AS $key => $val){
                        $final[$k][$key] = $val; 
                        if ($key == 'stock_bags') {
                            $stock_weight = $val;
                        } 

                    }
                    break;

                } else {
                    foreach($vv AS $key => $val){
                        $final[$k][$key] = 0;            
                    }
                }

            }
            $net_position = ($stock_weight+$sum_unallocated);

            if ($net_position < 0) {
                $net_position = '('.abs($net_position).')';
            }
            $final[$k]['net_position'] = $net_position;
            $stock_weight = 0;
            $sum_unallocated = 0;
            $net_position = 0;
        }

       return $final;
    }

    public function create($months)
    {
        $months = $months;

        Schema::create('long_short_lsht', function (Blueprint $table) use ($months) {
            $table->increments('id');
            $table->string('code');
            $table->string('long_code');
            $table->string('bs_quality');
            $table->string('stock_bags');
            $table->string('allocated_bags');
            $table->string('value');
            $table->string('bric_diff');
            $table->string('stock_diff');

            foreach ($months as $key => $value) {
                if ($value != null) {
                    $table->string(strtolower(trim($value)));
                }
                
            }

            $table->string('net_position');
            $date = date("Y-m-d H:i:s"); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function drop()
    {
         Schema::dropIfExists('long_short_lsht');
    }



     public function stocksReconciliation (Request $request){
        $grid = new Grid(
            (new GridConfig)
                ->setDataProvider(
                    new EloquentDataProvider(Stock_Reconciliation::query())
                )
                ->setName('Sum_Reconciliation_' . date('d-m-Y'))
                ->setPageSize(50)
                ->setColumns([
                   
                    (new FieldConfig)
                        ->setName('code')
                        ->setLabel('Quality Code')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('code')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('bs_quality')
                        ->setLabel('Quality Basket')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('bs_quality')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('purchased')
                        ->setLabel('Purchased')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('purchased')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,                   

                    (new FieldConfig)
                        ->setName('arrival_loss_gain')
                        ->setLabel('Arrival Loss/Gain')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('arrival_loss_gain')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,                   

                    (new FieldConfig)
                        ->setName('process_loss_gain')
                        ->setLabel('Process Loss/Gain')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('process_loss_gain')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,                    

                    (new FieldConfig)
                        ->setName('shipped')
                        ->setLabel('Shipped')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('shipped')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,                     

                    (new FieldConfig)
                        ->setName('actual')
                        ->setLabel('Actual')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('actual')
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

        return View::make('stocksreconciliation', compact('id','grid', 'text', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification'));
    }

}
