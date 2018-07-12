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


//use PDF;
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
// use Anouar\Fpdf\Fpdf as Fpdf;

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

use delete;


class CatalogueGridController extends Controller {


    public function catalogueGrid (Request $request){
    	$id = NULL;
    	$Season = Season::all(['id', 'csn_season']);
    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
    	$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
    	$Certification = Certification::all(['id', 'crt_name']);
    	$Warehouse = NULL;
    	$Mill = NULL;

        $grid = new Grid(
            (new GridConfig)
                ->setDataProvider(
                    new EloquentDataProvider(sale_lots::query())
                )
                ->setName('Sale_Lots_' . date('d-m-Y'))
                ->setPageSize(50)
                ->setColumns([
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
                        ->setName('ctrname')
                        ->setLabel('Country')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('ctrname')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    
                    (new FieldConfig)
                        ->setName('seller')
                        ->setLabel('Seller')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('seller')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('ml_name')
                        ->setLabel('Mill')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('ml_name')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,

                    (new FieldConfig)
                        ->setName('region')
                        ->setLabel('Region')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('region')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                        ->setSorting(Grid::SORT_ASC)
                    ,
                    (new FieldConfig)
                        ->setName('warehouse')
                        ->setLabel('Warehouse')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('warehouse')
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
                                ->setName('Outturn')
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
                        ->setName('hedge')
                        ->setLabel('Hedge')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('hedge')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    

                    ,
                    (new FieldConfig)
                        ->setName('month')
                        ->setLabel('Month')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('month')
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

        // return view('bookingdetails', compact('grid', 'text'));

    	return View::make('ctreport', compact('id','grid', 'text', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification'));

    }

    public function selectCatalogue (Request $request){

    	$Certification = Certification::all(['id', 'crt_name']);

    	$Season = Season::all(['id', 'csn_season']);
    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
    	$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
    	$region = Region::where('ctr_id', Input::get('country'))->get();

    	if(Input::get('country') != NULL){
	       	$Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
	    	$Mill = mills_region::where('ctr_id', Input::get('country'))->get(); 		
	    	$seller = seller::where('ctr_id', Input::get('country'))->get(); 		
    	}


    	if($request->has('country')){
    		if($request->has('sale_season') & Input::get('sale_season') !== "Sale Season" ){

    				if($request->has('sale')){
	    				$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
						$request->session()->flash('alert-success', 'Sale found!!');
						$cid = Input::get('country');
						$csn_season = Input::get('sale_season');
						$saleid = Input::get('sale');
						$sale_lots = sale_lots::where('slid', $saleid)->get(); 

						$query = sale_lots::where('slid','=',$saleid);

				        $grid = new Grid(
				            (new GridConfig)
				                ->setDataProvider(
				                    new EloquentDataProvider($query)
				                )
				                ->setName('Sale_Lots_' . date('d-m-Y'))
				                ->setPageSize(50)
				                ->setColumns([
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
				                        ->setName('ml_name')
				                        ->setLabel('Mill')
				                        ->addFilter(
				                            (new FilterConfig)
				                                ->setName('ml_name')
				                                ->setOperator(FilterConfig::OPERATOR_LIKE)
				                        )                         
				                        ->setSortable(true)
				                    ,

				                    (new FieldConfig)
				                        ->setName('region')
				                        ->setLabel('Region')
				                        ->addFilter(
				                            (new FilterConfig)
				                                ->setName('region')
				                                ->setOperator(FilterConfig::OPERATOR_LIKE)
				                        )                         
				                        ->setSortable(true)
				                        ->setSorting(Grid::SORT_ASC)
				                    ,
				                    (new FieldConfig)
				                        ->setName('warehouse')
				                        ->setLabel('Warehouse')
				                        ->addFilter(
				                            (new FilterConfig)
				                                ->setName('warehouse')
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
				                                ->setName('Outturn')
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
				                        ->setName('hedge')
				                        ->setLabel('Hedge')
				                        ->addFilter(
				                            (new FilterConfig)
				                                ->setName('hedge')
				                                ->setOperator(FilterConfig::OPERATOR_LIKE)
				                        )                         
				                        ->setSortable(true)
				                    

				                    ,
				                    (new FieldConfig)
				                        ->setName('month')
				                        ->setLabel('Month')
				                        ->addFilter(
				                            (new FilterConfig)
				                                ->setName('month')
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


						return View::make('ctreport', compact('id', 'grid', 'text',
							'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid'));	
    				} else {
	    				$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
						$request->session()->flash('alert-success', 'Sale found!!');
						$cid = Input::get('country');
						$csn_season = Input::get('sale_season');
						return View::make('ctreport', compact('id', 
							'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid'));					
    				}

    			


    		} else {
    				$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
					// $request->session()->flash('alert-success', 'Sale found!!');
					$cid = Input::get('country');
					$csn_season = Input::get('sale_season');
					return View::make('ctreport', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller'));	
			}
    	} else {

			return redirect('ctreport')
                        ->withErrors("Please select a valid Country!!")->withInput();
		}

    	return View::make('ctreport', compact('id', 'Season', 'country', 'Warehouse', 'Mill', 'Certification', 'seller'));		
	}




    public function catalogueQualityGrid (Request $request){
        $id = NULL;
        $Season = Season::all(['id', 'csn_season']);
        $country = country::all(['id', 'ctr_name', 'ctr_initial']);
        $CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
        $Certification = Certification::all(['id', 'crt_name']);
        $Warehouse = NULL;
        $Mill = NULL;

        $grid = new Grid(
            (new GridConfig)
                ->setDataProvider(
                    new EloquentDataProvider(sale_lots::query())
                )
                ->setName('Sale_Lots_Quality_' . date('d-m-Y'))
                ->setPageSize(50)
                ->setColumns([
                    // (new FieldConfig)
                    //     ->setName('ctrname')
                    //     ->setLabel('Country')
                    //     ->addFilter(
                    //         (new FilterConfig)
                    //             ->setName('ctrname')
                    //             ->setOperator(FilterConfig::OPERATOR_LIKE)
                    //     )                         
                    //     ->setSortable(true)
                    // ,  

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
                        ->setName('csn_season')
                        ->setLabel('Crop')
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
                        ->setName('seller')
                        ->setLabel('MKT Agent')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('seller')
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
                    // (new FieldConfig)
                    //     ->setName('ml_name')
                    //     ->setLabel('Mill')
                    //     ->addFilter(
                    //         (new FilterConfig)
                    //             ->setName('ml_name')
                    //             ->setOperator(FilterConfig::OPERATOR_LIKE)
                    //     )                         
                    //     ->setSortable(true)
                    // ,

                    // (new FieldConfig)
                    //     ->setName('region')
                    //     ->setLabel('Region')
                    //     ->addFilter(
                    //         (new FilterConfig)
                    //             ->setName('region')
                    //             ->setOperator(FilterConfig::OPERATOR_LIKE)
                    //     )                         
                    //     ->setSortable(true)
                    //     // ->setSorting(Grid::SORT_ASC)
                    // ,
                    (new FieldConfig)
                        ->setName('warehouse')
                        ->setLabel('Warehouse')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('warehouse')
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
                        ->setName('green')
                        ->setLabel('Green')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('green')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    , 

                    (new FieldConfig)
                        ->setName('prcss_name')
                        ->setLabel('Processing')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('prcss_name')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('qltyd_prcss_value')
                        ->setLabel('%')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('qltyd_prcss_value')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    // (new FieldConfig)
                    //     ->setName('scr_name')
                    //     ->setLabel('Screen')
                    //     ->addFilter(
                    //         (new FilterConfig)
                    //             ->setName('scr_name')
                    //             ->setOperator(FilterConfig::OPERATOR_LIKE)
                    //     )                         
                    //     ->setSortable(true)
                    // ,
                    (new FieldConfig)
                        ->setName('qltyd_scr_value')
                        ->setLabel('Screen %')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('qltyd_scr_value')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,

                    (new FieldConfig)
                        ->setName('acidity')
                        ->setLabel('A')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('acidity')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,

                    (new FieldConfig)
                        ->setName('body')
                        ->setLabel('B')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('body')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,

                    (new FieldConfig)
                        ->setName('flavour')
                        ->setLabel('F')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('flavour')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,


                    (new FieldConfig)
                        ->setName('final_comments')
                        ->setLabel('Comments')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('final_comments')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('rw_score')
                        ->setLabel('Raw Score')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('rw_score')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('cp_score')
                        ->setLabel('Cup Score')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('cp_score')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,

                    (new FieldConfig)
                        ->setName('touch')
                        ->setLabel('Avoid')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('touch')
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

        // return view('bookingdetails', compact('grid', 'text'));

        return View::make('ctquality', compact('id','grid', 'text', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification'));

    }


    public function selectCatalogueQuality (Request $request){

        $Certification = Certification::all(['id', 'crt_name']);

        $Season = Season::all(['id', 'csn_season']);
        $country = country::all(['id', 'ctr_name', 'ctr_initial']);
        $CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
        $region = Region::where('ctr_id', Input::get('country'))->get();

        if(Input::get('country') != NULL){
            $Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
            $Mill = mills_region::where('ctr_id', Input::get('country'))->get();        
            $seller = seller::where('ctr_id', Input::get('country'))->get();        
        } 


        if($request->has('country')){
            if($request->has('sale_season') & Input::get('sale_season') !== "Sale Season" ){
                $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
            } else {
                $sale = Sale::where('ctr_id', '=', Input::get('country'))->get();
            }
        } else {
            if($request->has('sale_season') & Input::get('sale_season') !== "Sale Season" ){
                $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
            } else {
                $sale = Sale::where('ctr_id', '!=', NULL)->get();
            }
        }
        if($request->has('sale')){
            $saleid = Input::get('sale');
            $query = sale_lots::where('slid','=',$saleid);
        } else {
            $query = sale_lots::where('slid','!=',NULL);
        }
            // if($request->has('sale_season') & Input::get('sale_season') !== "Sale Season" ){
                    // if($request->has('sale')){
                        
                        $request->session()->flash('alert-success', 'Sale found!!');
                        $cid = Input::get('country');
                        $csn_season = Input::get('sale_season');
                        $saleid = Input::get('sale');
                        $sale_lots = sale_lots::where('slid', $saleid)->get(); 

                        $query = sale_lots::where('slid','=',$saleid);

                        $grid = new Grid(
                            (new GridConfig)
                                ->setDataProvider(
                                    new EloquentDataProvider($query)
                                )
                                ->setName('Sale_Lots_Quality_' . date('d-m-Y'))
                                ->setPageSize(50)
                                ->setColumns([
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
                                        ->setName('ml_name')
                                        ->setLabel('Mill')
                                        ->addFilter(
                                            (new FilterConfig)
                                                ->setName('ml_name')
                                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                                        )                         
                                        ->setSortable(true)
                                    ,

                                    (new FieldConfig)
                                        ->setName('region')
                                        ->setLabel('Region')
                                        ->addFilter(
                                            (new FilterConfig)
                                                ->setName('region')
                                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                                        )                         
                                        ->setSortable(true)
                                        ->setSorting(Grid::SORT_ASC)
                                    ,
                                    (new FieldConfig)
                                        ->setName('warehouse')
                                        ->setLabel('Warehouse')
                                        ->addFilter(
                                            (new FilterConfig)
                                                ->setName('warehouse')
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
                                        ->setName('green')
                                        ->setLabel('Green')
                                        ->addFilter(
                                            (new FilterConfig)
                                                ->setName('green')
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
                                        ->setName('touch')
                                        ->setLabel('Touch')
                                        ->addFilter(
                                            (new FilterConfig)
                                                ->setName('touch')
                                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                                        )                         
                                        ->setSortable(true)
                                    ,

                                    (new FieldConfig)
                                        ->setName('prcss_name')
                                        ->setLabel('Process')
                                        ->addFilter(
                                            (new FilterConfig)
                                                ->setName('prcss_name')
                                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                                        )                         
                                        ->setSortable(true)
                                    ,
                                    (new FieldConfig)
                                        ->setName('qltyd_prcss_value')
                                        ->setLabel('Process_Value')
                                        ->addFilter(
                                            (new FilterConfig)
                                                ->setName('qltyd_prcss_value')
                                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                                        )                         
                                        ->setSortable(true)
                                    ,
                                    (new FieldConfig)
                                        ->setName('scr_name')
                                        ->setLabel('Screen')
                                        ->addFilter(
                                            (new FilterConfig)
                                                ->setName('scr_name')
                                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                                        )                         
                                        ->setSortable(true)
                                    ,
                                    (new FieldConfig)
                                        ->setName('qltyd_scr_value')
                                        ->setLabel('Screen_Value')
                                        ->addFilter(
                                            (new FilterConfig)
                                                ->setName('qltyd_scr_value')
                                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                                        )                         
                                        ->setSortable(true)
                                    ,
                                    (new FieldConfig)
                                        ->setName('cp_quality')
                                        ->setLabel('Cup')
                                        ->addFilter(
                                            (new FilterConfig)
                                                ->setName('cp_quality')
                                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                                        )                         
                                        ->setSortable(true)
                                    ,
                                    (new FieldConfig)
                                        ->setName('rw_quality')
                                        ->setLabel('Raw')
                                        ->addFilter(
                                            (new FilterConfig)
                                                ->setName('rw_quality')
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



                        return View::make('ctquality', compact('id', 'grid', 'text',
                            'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid'));    
                    // } else {
                    //     $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
                    //     $request->session()->flash('alert-success', 'Sale found!!');
                    //     $cid = Input::get('country');
                    //     $csn_season = Input::get('sale_season');
                    //     return View::make('ctreport', compact('id', 
                    //         'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid'));                    
                    // }

                


            // } else {
            //         $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
            //         // $request->session()->flash('alert-success', 'Sale found!!');
            //         $cid = Input::get('country');
            //         $csn_season = Input::get('sale_season');
            //         return View::make('ctquality', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller'));   
            // }


        // return View::make('ctquality', compact('id', 'Season', 'country', 'Warehouse', 'Mill', 'Certification', 'seller'));      
    }
}

