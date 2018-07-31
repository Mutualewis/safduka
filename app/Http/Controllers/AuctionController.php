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

//use PDF;
use PDF;
use Activity;
use Excel;
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


class AuctionController extends Controller {


    public function addToCatalogueForm (Request $request){
    	$id = NULL;
    	$Season = Season::all(['id', 'csn_season']);
    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
    	$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
    	$Certification = Certification::all(['id', 'crt_name']);
    	$Warehouse = NULL;
    	$Mill = NULL;


    	return View::make('catalogueindividual', compact('id', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification'));

    }

    public function addToCatalogue (Request $request){
    	$id = NULL;

    	$Warehouse = NULL;
    	$Mill = NULL;

    	$Certification = Certification::all(['id', 'crt_name']);

    	if (NULL !== Input::get('submitlot')){
	     	 $this->validate($request, [
		            'country' => 'required',  'sale_season' => 'required', 'sale' => 'required', 'sif_lot' => 'required', 'outt_number' => 'required', 'coffee_grower' => 'required', 'coffee_grade' => 'required', 'grade_kilograms' => 'required', 
		        ]);

	     	 $country = Input::get('country');
	     	 $season = Input::get('sale_season');
	     	 $outt_season = Input::get('outt_season');

	     	 $sale = Input::get('sale');
	     	 $lot = Input::get('sif_lot');
	     	 $outturn = Input::get('outt_number');
	     	 $mark = Input::get('coffee_grower');
	     	 $grade = Input::get('coffee_grade');
	     	 $gradekgs = Input::get('grade_kilograms');
	     	 $bags = floor($gradekgs / 60);
	     	 $pkts = floor($gradekgs % 60);
	     	 $warehouse = Input::get('Warehouse');
	     	 $mill = Input::get('mill');
	     	 $Cert = Input::get('Certification');
	     	 $seller = Input::get('seller');
	     	 $coffeeid = NULL;

	     	 $cdetails = coffee_details::where('cfd_outturn', $outturn)->where('sl_id', $sale)->where('cfd_lot_no', $lot)->first();
	     	 if ($cdetails != NULL) {
	     	 	$coffeeid = $cdetails->id;
	     	 }
	     	 

	     	 if($mill == NULL){
	     	 	$mill = 1;
	     	 }

	     	 if ($warehouse == NULL) {
	     	 	$warehouse = NULL;
	     	 }

	     	 if ($cdetails != NULL) {
					coffee_details::where('id', '=', $coffeeid)
						->update(['csn_id' => $outt_season,  'sl_id' =>  $sale, 'cfd_lot_no'=> $lot, 'cfd_outturn'=> $outturn, 'wr_id'=> $warehouse, 'cfd_grower_mark'=> $mark, 'cgrad_id'=> $grade, 'cfd_weight'=> $gradekgs, 'cfd_bags'=> $bags, 'cfd_pockets'=> $pkts, 'slr_id'=> $seller, 'ml_id'=> $mill]);

	     	 		$certs = coffee_certification::where('cfd_id', $coffeeid)->get();
	     	 		if($certs != NULL){
				     	foreach ($certs as $key => $value) {
				     		$certsdel = coffee_certification::find($value->id);	
				     		$certsdel->delete(); 

				     	}

	     	 		}
					Activity::log('Updated lot '.$lot. ' outturn '.$outturn.' warehouse '. $warehouse.' mark '.$mark.' grade ' .$grade.' weight ' . $gradekgs.' bags '.$bags.' pkts '.$pkts. ' seller '.$seller. ' mill '.$mill);

	     	 } else {
					$coffeeid = coffee_details::insertGetId(['csn_id' => $outt_season,  'sl_id' =>  $sale, 'cfd_lot_no'=> $lot, 'cfd_outturn'=> $outturn, 'wr_id'=> $warehouse, 'cfd_grower_mark'=> $mark, 'cgrad_id'=> $grade, 'cfd_weight'=> $gradekgs, 'cfd_bags'=> $bags, 'cfd_pockets'=> $pkts, 'slr_id'=> $seller, 'ml_id'=> $mill]);
					Activity::log('Added lot '.$lot. ' outturn '.$outturn.' warehouse '. $warehouse.' mark '.$mark.' grade ' .$grade.' weight ' . $gradekgs.' bags '.$bags.' pkts '.$pkts. ' seller '.$seller. ' mill '.$mill);
	     	 }


	     	 if ($Cert != NULL){
		     	 foreach ($Cert as $key => $value) {
					coffee_certification::insert(
					    ['cfd_id' => $coffeeid, 'crt_id' => $value]
					);

		     	 }	     	 	
	     	 }
	    	$Season = Season::all(['id', 'csn_season']);
	    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
	    	// $CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
	    	$CoffeeGrade = CoffeeGrade::where('ctr_id', Input::get('country'))->get();
	    	$region = Region::where('ctr_id', Input::get('country'))->get();
	     	// $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
	     	$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
	     	$saleid = Input::get('sale');
			$cid = Input::get('country');
			$csn_season = Input::get('sale_season');
			$ot_season = Input::get('outt_season');
	    	if(Input::get('country') != NULL){
		       	$Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
		    	$Mill = mills_region::where('ctr_id', Input::get('country'))->get(); 		
		    	$seller = seller::where('ctr_id', Input::get('country'))->get(); 		
	    	}

			// $cdetails = coffee_details::where('sl_id', $sale)->where('csn_id', $season)->where('cfd_lot_no', $lot)->first();
			// $coffeeid = $cdetails->id;
	     	 $cdetails = coffee_details::where('cfd_outturn', $outturn)->where('sl_id', Input::get('sale'))->where('csn_id', $outt_season)->where('cfd_lot_no', $lot)->first();
	     	 $coffeeid = $cdetails->id;
	    	// $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
	    	$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby', null)->where('sl_quality_confirmedby', null)->where('sl_auction_confirmedby', null)->get();
	    	$cid = Input::get('country');
			$csn_season = Input::get('sale_season');
			$ot_season = Input::get('outt_season');

			$saleid = Input::get('sale');
			$sale_lots = sale_lots::where('slid', $saleid)->get(); 	


			$certs = coffee_certification::where('cfd_id', $coffeeid)->get();
			$request->session()->flash('alert-success', 'Lot Added/Updated!!');

			// return View::make('catalogueindividual', compact('id', 
			// 	'Season', 'country', 'cid', 'csn_season', 'ot_season','sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'cdetails', 'certs'));
				return View::make('catalogueindividual', compact('id', 
					'Season', 'country', 'cid', 'csn_season', 'ot_season','sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'cdetails', 'certs'));	

	   	} else if (NULL !== Input::get('submitcatlogue')){
	    	$Season = Season::all(['id', 'csn_season']);
	    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);

			// $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
			$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();

			$request->session()->flash('alert-success', 'Sale found!!');
			$cid = Input::get('country');
			$csn_season = Input::get('sale_season');
			$ot_season = Input::get('outt_season');

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


			return View::make('ctreport', compact('id', 'grid', 'text',
				'Season', 'country', 'cid', 'csn_season', 'ot_season','sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid'));	

	   	} else if(NULL !== Input::get('searchButton')){
			$country = Input::get('country');
			$season = Input::get('sale_season');
			$outt_season = Input::get('outt_season');
			$sale = Input::get('sale');
			$lot = Input::get('sif_lot');    				
			$coffeeid = NULL;  

			// if ($outt_season != NULL && $outt_season != "Outturn Season"){
				// $cdetails = coffee_details::where('sl_id', $sale)->where('csn_id', $outt_season)->where('cfd_lot_no', $lot)->first();
			// } else {
				$cdetails = coffee_details::where('sl_id', $sale)->where('cfd_lot_no', $lot)->first();
			// }
			
			if ($cdetails !== NULL) {
				$coffeeid = $cdetails->id;
			}
			// $greencomments = greencomments::where('cfd_id', $coffeeid)->get();

	    	$Season = Season::all(['id', 'csn_season']);
	    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
	    	// $CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
	    	$CoffeeGrade = CoffeeGrade::where('ctr_id', Input::get('country'))->get();
	    	$region = Region::where('ctr_id', Input::get('country'))->get();

	    	if(Input::get('country') != NULL){
		       	$Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
		    	$Mill = mills_region::where('ctr_id', Input::get('country'))->get(); 		
		    	$seller = seller::where('ctr_id', Input::get('country'))->get(); 		
	    	}
	    	// $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
	    	// $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
	    	$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby', null)->where('sl_quality_confirmedby', null)->where('sl_auction_confirmedby', null)->get();
	    	$cid = Input::get('country');
			$csn_season = Input::get('sale_season');
			$ot_season = Input::get('outt_season');

			$saleid = Input::get('sale');
			$sale_lots = sale_lots::where('slid', $saleid)->get(); 	


			$certs = coffee_certification::where('cfd_id', $coffeeid)->get();

			if ($cdetails !== NULL) {
				$request->session()->flash('alert-success', 'Sale Lot Found!!');

				return View::make('catalogueindividual', compact('id', 
					'Season', 'country', 'cid', 'csn_season', 'ot_season','sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'cdetails', 'certs'));	


						
			} else {
				$request->session()->flash('alert-warning', 'Lot not found!');


				return View::make('catalogueindividual', compact('id', 
					'Season', 'country', 'cid', 'csn_season', 'ot_season','sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'certs'));	


			}
    	}else {
	    	$Season = Season::all(['id', 'csn_season']);
	    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
	    	// $CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
	    	$CoffeeGrade = CoffeeGrade::where('ctr_id', Input::get('country'))->get();
	    	$region = Region::where('ctr_id', Input::get('country'))->get();

	    	if(Input::get('country') != NULL){
		       	$Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
		    	$Mill = mills_region::where('ctr_id', Input::get('country'))->get(); 		
		    	$seller = seller::where('ctr_id', Input::get('country'))->get(); 		
	    	}


	    	if($request->has('country')){
	    		if($request->has('sale_season') & Input::get('sale_season') !== "Sale Season" ){

	    				if($request->has('sale')){
		    				//$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
		    				// $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
		    				$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby', null)->where('sl_quality_confirmedby', null)->where('sl_auction_confirmedby', null)->get();
							$request->session()->flash('alert-success', 'Sale found!!');
							$cid = Input::get('country');
							$csn_season = Input::get('sale_season');
							$ot_season = Input::get('outt_season');

							$saleid = Input::get('sale');
							$sale_lots = sale_lots::where('slid', $saleid)->get(); 


							return View::make('catalogueindividual', compact('id', 
								'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid'));	
	    				} else {
		    				// $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();

							$request->session()->flash('alert-success', 'Sale found!!');
							$cid = Input::get('country');
							$csn_season = Input::get('sale_season');
							$ot_season = Input::get('outt_season');

							return View::make('catalogueindividual', compact('id', 
								'Season', 'country', 'cid', 'csn_season','ot_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid'));					
	    				}

	    			


	    		} else {
	    				// $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
	    				$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->where('sl_catalogue_confirmedby', null)->where('sl_quality_confirmedby', null)->where('sl_auction_confirmedby', null)->get();
						// $request->session()->flash('alert-success', 'Sale found!!');
						$cid = Input::get('country');
						$csn_season = Input::get('sale_season');
						$ot_season = Input::get('outt_season');

						return View::make('catalogueindividual', compact('id', 'Season', 'country', 'cid', 'csn_season','ot_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller'));	
				}
	    	} else {

				return redirect('catalogueindividual')
	                        ->withErrors("Please select a valid Country!!")->withInput();
			}

	    	return View::make('catalogueindividual', compact('id', 'Season', 'country', 'Warehouse', 'Mill', 'Certification', 'seller'));		
    	}
    



    }



    public function catalogueUploadForm (Request $request){
    	$id = null;
    	$Season = Season::all(['id', 'csn_season']);
    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
    	return View::make('catalogueupload', compact('id', 'Season', 'country'));

    }

	public function downloadExcelCatalogue($type)
	{
		return Excel::load('template_catalogue.xlsx', function($reader) {
		})->download();
	}

    public function uploadCatalogue (Request $request){
    	$Season = Season::all(['id', 'csn_season']);
    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);

    		if (NULL !== Input::get('submitcatalogue')){
    			$path = Input::file('import_file')->getRealPath();

				if($path != NULL){

	     			if($request->has('sale') && Input::get('sale') != "No Sale Found" ){

						$data = Excel::load($path, function($reader) {
						})->get();
						

						if(!empty($data) && $data->count()){

							$data = $data->first();
							$certs = null;

							foreach ($data as $key => $value) {

								$sale = Input::get('sale');								
								$lot = trim($value->lot);
								$season = Input::get('sale_season');
								$outturn = trim($value->outturn);
								$outturn = preg_replace('/\s+/', '', $outturn);
								$seller = trim($value->seller);
								$mark = trim($value->mark);
								$mill = trim($value->mill);
								$region = trim($value->region);
								$warehouse = trim($value->warehouse);
								$grade = trim(trim($value->grade));
								$kilos = trim($value->kg);								
						     	$bags = trim(trim($value->bags));
						     	$pkts = trim($value->pkt);						     	
								$cert = trim($value->cert);

								if($lot != NULL){
										$SellerDB = seller::where('slr_name', $seller)->first();
										if(empty($SellerDB)){
											$SellerDB = seller::where('slr_initials', $seller)->first();

											if(empty($SellerDB)) {
												$SellerDB = seller::where('slr_att', $seller)->first();
												if(empty($SellerDB)) {
													$SellerDB = seller::where('slr_description', $seller)->first();
													if(empty($SellerDB)) {
														return redirect('catalogueupload')
										                       		->withErrors("Seller ".$seller." ".$lot." was not found in the database and cannot be empty!! ")
										                       		->withInput();		
										            }	
									            }							
											}

										}
										$sellerID = $SellerDB->id;


										$RegionDB = region::where('rgn_name', $region)->first();
										if(empty($RegionDB)){
											$RegionDB = region::where('rgn_description', $region)->first();										
												return redirect('catalogueupload')
								                       		->withErrors("Region ".$region." was not found in the database and cannot be empty!! ")
								                       		->withInput();		
										} 
										$regionID = $RegionDB->id;


										$MillDB = mill::where('ml_name', $mill)->first();
										if(empty($MillDB)){
											$MillDB = mill::where('ml_initials', $mill)->first();
											if(empty($MillDB)){
												$MillDB = mill::where('ml_description', $mill)->first();
												
												if(empty($MillDB)){
													$millID = NULL;
														
												} else {
													$millID = $MillDB->id;
												}

											} else {
												$millID = $MillDB->id;
											} 		

										} else {
											$millID = $MillDB->id;
										}  
									


										$WarehouseDB = Warehouse::where('wr_name', $warehouse)->first();
										if(empty($WarehouseDB)){
											$WarehouseDB = Warehouse::where('wr_initials', $warehouse)->first();
											if(empty($WarehouseDB)){
												$WarehouseDB = Warehouse::where('wr_description', $warehouse)->first();
												
												if(empty($WarehouseDB)){
													$warehouseID = NULL;
													return redirect('catalogueupload')
									                       		->withErrors("Warehouse ".$warehouse." was not found in the database and cannot be empty!! ")
									                       		->withInput();	
														
												} else {
													$warehouseID = $WarehouseDB->id;
												}  	

											} else {
												$warehouseID = $WarehouseDB->id;
											}  		

										} else {
											$warehouseID = $WarehouseDB->id;
										}  
										

										// $CoffeeGrade = CoffeeGrade::where('ctr_id', Input::get('country'))->get();
										$CoffeeGrade = CoffeeGrade::where('cgrad_name', $grade)->where('ctr_id', Input::get('country'))->first();		
										if(empty($CoffeeGrade)){
											return redirect('catalogueupload')
							                        		->withErrors("Grade ".$grade." ".$lot." was not found in the database!! ")
							                        		->withInput();											
										} else if ($CoffeeGrade->cgrad_name != $grade) {
											return redirect('catalogueupload')
							                        		->withErrors("Grade ".$grade." ".$lot." was not found in the database!! ")
							                        		->withInput();
										}
										$gradeid = $CoffeeGrade->id;

										$CertDB = explode(',', $cert);
										foreach ($CertDB as $key => $value) {
											if (substr(trim($value), 0, 3) === "CAF") {
												$value = "CAFE";
											}											
											$CertDB = certification::where('crt_name', trim($value))->first();
											if ($value != NULL) {
												if(empty($CertDB) && $value != NULL){
													$CertDB = certification::where('crt_description', trim($value))->first();	
													if(empty($CertDB)){	
														$CertDB = certification::where('crt_description', trim($value))->first();	
														if(empty($CertDB)){	
																return redirect('catalogueupload')
											                    	->withErrors("Certification ".$value." ".$lot." was not found in the database and cannot be empty!! ")
											                    	->withInput();	
														}							

										            } else {
										            	$certID = $CertDB->id;	
										            }
												} else if(!empty($CertDB)){
													$certID = $CertDB->id;	
												}
												
												$certs[] = ['sale' => $sale, 'lot' => $lot, 'outturn' => $outturn, 'season' => $season, 'certID' => $certID];
											}
										
										}	
										$cdetails = coffee_details::where('sl_id', $sale)->where('csn_id', $season)->where('cfd_lot_no', $lot)->first();

										if (!empty($cdetails)) {
											$insert = null;
										} 
										$cdetails = coffee_details::where('cfd_outturn', $outturn)->where('sl_id', $sale)->where('csn_id', $season)->where('cfd_lot_no', $lot)->first();


										if (empty($cdetails)) {
											$insert[] = ['csn_id' => $season,  'sl_id' =>  $sale, 'cfd_lot_no' => $lot, 'cfd_outturn' => $outturn, 'wr_id' => $warehouseID, 'cfd_grower_mark' => $mark, 'cgrad_id' => $gradeid, 'cfd_weight' => $kilos, 'cfd_bags' => $bags, 'cfd_pockets' => $pkts, 'slr_id' => $sellerID, 'ml_id'=> $millID];
										} else {
											$insert = null;
										}


									}
							}

							if(!empty($insert)){
								coffee_details::insert($insert);
							}
							
							if ($certs != null) {
								foreach ($certs as $key => $value) {
									$cdetails = coffee_details::where('cfd_outturn', $value["outturn"])->where('sl_id', $value["sale"])->where('csn_id', $value["season"])->where('cfd_lot_no', $value["lot"])->first();

									coffee_certification::insert(
									    ['cfd_id' => $cdetails->id, 'crt_id' => $value["certID"]]
									);
								}
							}


						$cid = Input::get('country');
						$csn_season = Input::get('sale_season');
						$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->first();
						Activity::log('Uploaded catalogue for sale '.$sale->sl_no. ' Season '.$csn_season.' country '. $cid);
						$request->session()->flash('alert-success', 'Catalogue uploaded successfully!!');
						$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->where('sl_quality_confirmedby', null)->where('sl_auction_confirmedby', null)->get();
						return View::make('catalogueupload', compact('id', 'Season', 'country', 'sale', 'cid', 'csn_season'));	

						} else {
							return redirect('catalogueupload')
				                        ->withErrors("Lot Number Cannot be Empty!!")->withInput();
						}   

	    			} else {
						return redirect('catalogueupload')
			                        ->withErrors("Please select a valid Sale Number!!")->withInput();
					}   
				} 


    			
    		} else if($request->has('country')){

	    		if($request->has('sale_season') & Input::get('sale_season') !== "Sale Season" ){

	    				// $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
	    				//$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
	    				$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->where('sl_quality_confirmedby', null)->where('sl_auction_confirmedby', null)->get();
						// $request->session()->flash('alert-success', 'Sale found!!');
						$cid = Input::get('country');
						$csn_season = Input::get('sale_season');
						return View::make('catalogueupload', compact('id', 'Season', 'country', 'sale', 'cid', 'csn_season'));	
		    	} else {
    				// $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
    				// $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
    				$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->where('sl_quality_confirmedby', null)->where('sl_auction_confirmedby', null)->get();
					// $request->session()->flash('alert-success', 'Sale found!!');
					$cid = Input::get('country');
					$csn_season = Input::get('sale_season');
					return View::make('catalogueupload', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale'));

				}
		}

	}


	public function lot_delete($id)
	{   

		$coffee_details = coffee_details::findOrFail($id);  
		if ($coffee_details) {
	    	$coffee_details->delete();
		}


		return redirect('catalogueindividual');
		

		//return View::make('booking', compact('outturn', 'MillingStatus', 'Season', 'growers', 'SaleStatus', 'CoffeeGrade', 'SaleableStatus', 'CoffeeClass', 'ParchmentType', 'cbulkoutturn', 'cleancoffee', '	coffeewarrant', 'booking', 'ref_no', 'buyer', 'agent', 'bookingitem'));	
		
	}


    public function stockIntakeForm (Request $request){
    	$id = NULL;
    	$Season = Season::all(['id', 'csn_season']);
    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
    	$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
    	$Certification = Certification::all(['id', 'crt_name']);
    	$Warehouse = NULL;
    	$Mill = NULL;

    	return View::make('stockindividual', compact('id', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'largest', 'greensize', 'greencolor', 'greendefects', 'processing', 'cupscore', 'rawscore', 'screens'));

    }


    public function stockUploadForm (Request $request){
    	$id = null;
    	$Season = Season::all(['id', 'csn_season']);
    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
    	return View::make('stockupload', compact('id', 'Season', 'country'));

    }



    

    public function uploadStockList (Request $request){
    	$Season = Season::all(['id', 'csn_season']);
    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
    	global $error;
    	$error = array();

    	if($request->has('country')){
    		if($request->has('sale_season') & Input::get('sale_season') !== "Sale Season" ){
    			if(Input::hasFile('import_file')){
	     			if($request->has('sale') && Input::get('sale') != "No Sale Found" ){

						$path = Input::file('import_file')->getRealPath();
						$data = Excel::load($path, function($reader) {
						})->get();
						

						if(!empty($data) && $data->count()){

							$data = $data->first();
							foreach ($data as $key => $value) {
								$grade = $value->grade;
								$region = $value->region;
								$warehouse = $value->warehouse;
								$lot = $value->lot;
								$outturn = $value->outturn;
								$outturn = preg_replace('/\s+/', '', $outturn);
								$kilos = $value->kilos;
								$cost = $value->cost;

								$warehouse = $value->warehouse;
								$sale = Input::get('sale');
								$contract = $value->contract;
								$remarks = $value->remarks;
								$cert = $value->cert;
								$green_comments = $value->green_comments;
								$processing = $value->processing;
								$cup_coments = $value->cup_coments;
								$basket = $value->basket;
								$allocation = $value->allocation;
								$quality_code = $value->quality_code;

								$acidity = $value->acidity;
								$body = $value->body;
								$flavour = $value->flavour;
								$screen = $value->screen;



								$CoffeeGrade = CoffeeGrade::where('cgrad_name', $grade)->first();
								$gradeid = $CoffeeGrade->id;
								if ($CoffeeGrade->cgrad_name != $grade) {
									return redirect('stockupload')
					                        		->withErrors("Grade ".$grade." was not found in the database!! ")
					                        		->withInput();
								}


								$insert[] = ['grade' => $grade, 'description' => $value->lot];
							}
							if(!empty($insert)){
								//DB::table('items')->insert($insert);
								//dd('Insert Record successfully.');
							}
						}

	    			} else {
						return redirect('stockupload')
			                        ->withErrors("Please select a valid Sale Number!!")->withInput();
					}   			
    			} else {
    				$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
					$request->session()->flash('alert-success', 'Sale found!!');
					$cid = Input::get('country');
					$csn_season = Input::get('sale_season');

					// print_r($csn_season);
					return View::make('stockupload', compact('id', 'Season', 'country', 'sale', 'cid', 'csn_season'));	

    			}



    		} else {

				return redirect('stockupload')
	                        ->withErrors("Please select a valid Sale Number and Sale Season Combination or Create a new Sale!!")->withInput();
			}
    	} else {

			return redirect('stockupload')
                        ->withErrors("Please select a valid Country!!")->withInput();
		}

    }

	public function downloadExcel($type)
	{
		return Excel::load('template.xlsx', function($reader) {
		})->download();
	}



}

