<?php namespace Ngea\Http\Controllers;

use Input;
use confirm;
use DB;
use ask;
use Illuminate\Http\Request;
use Ngea\Http\Controllers\Controller;
use View;
use Auth;

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
use Ngea\warrants;

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
use Ngea\direct_sale;
use Ngea\FOB;
use Ngea\purchase;
use Ngea\basket;
use Ngea\InternalBaskets;

use delete;


class DirectController extends Controller {

    public function addToCatalogueForm (Request $request){
    	$id = NULL;
    	$Season = Season::all(['id', 'csn_season']);
    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
    	$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
    	$Certification = Certification::all(['id', 'crt_name']);
    	$Growers = Growers::all(['id', 'cg_name']);
    	$Warehouse = NULL;
    	$Mill = NULL;
    	return View::make('directindividual', compact('id', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'Growers'));

    }

    public function addToCatalogue (Request $request){
    	$id = NULL;
    	$Warehouse = NULL;
    	$Mill = NULL;
    	$Certification = Certification::all(['id', 'crt_name']);

    	$Growers = Growers::where('ctr_id', Input::get('country'))->orderBy('cg_name')->get();    	

    	$coffee_grower = Input::get('coffee_grower');

		$country = Input::get('country');

		$season = Input::get('sale_season');

		$sale = Input::get('sale');

		$lot = Input::get('sif_lot');    				

		$cdetails = coffee_details::where('sl_id', $sale)->where('csn_id', $season)->where('cgrad_id', Input::get('coffee_grade'))->first();

 		$pr_id = null;

     	$warrant = Input::get('warrant');
     	
     	$warrant_date = Input::get('warrant_date'); 		

		if ($cdetails != null) {

			$coffeeid = $cdetails->id;

 	 		$pr_details = purchase::where('cfd_id', $coffeeid)->first();

 	 		if ($pr_details != null) {

 	 			$pr_id = $pr_details->id;

 	 			$war_id = $pr_details->war_id;

 	 			$war_details = warrants::where('id', '=', $war_id)->first();

 	 			if ($war_details != null) {

 	 				$warrant = $war_details->war_no;

 	 				$warrant_date = $war_details->war_date;
 	 			}

 	 		}

		}

		if ($warrant_date != null) {

			$warrant_date = date("m/d/Y", strtotime($warrant_date));  

		}
 	 	
		
    	if (NULL !== Input::get('submitlot')){
	     	 $this->validate($request, [
		            'country' => 'required',  'sale_season' => 'required', 'sale' => 'required', 'outt_number' => 'required', 'coffee_grower' => 'required', 'coffee_grade' => 'required', 'grade_kilograms' => 'required', 'Warehouse' => 'required', 'mill' => 'required',
		        ]);

	     	 $country = Input::get('country');
	     	 $season = Input::get('sale_season');
	     	 $sale = Input::get('sale');
	     	 $lot = Input::get('sif_lot');
	     	 $outturn = Input::get('outt_number');
	     	 $mark = Growers::where('id', $coffee_grower)->first();
	     	 $mark = $mark->cg_mark;


	     	 $grade = Input::get('coffee_grade');
	     	 $gradekgs = Input::get('grade_kilograms');
	     	 $bags = floor($gradekgs / 60);
	     	 $pkts =floor($gradekgs % 60);
	     	 $warehouse = Input::get('Warehouse');
	     	 $mill = Input::get('mill');
	     	 $Cert = Input::get('Certification');
	     	 $seller = Input::get('seller');

	     	$warrant = Input::get('warrant');
	     	
	     	$warrant_date = Input::get('warrant_date');

	     	$warrant_date = date_create($warrant_date);

	     	$warrant_date = date_format($warrant_date, "Y-m-d");

            $user_data = Auth::user();

            $user = $user_data->id;

	     	$cdetails = coffee_details::where('cfd_outturn', $outturn)->where('sl_id', $sale)->where('csn_id', $season)->where('cgrad_id', Input::get('coffee_grade'))->first();
	     	$coffeeid = NULL;


	     	 if ($cdetails != NULL) {

	     	 	$coffeeid = $cdetails->id;

				coffee_details::where('id', '=', $coffeeid)
					->update(['csn_id' => $season,  'sl_id' =>  $sale, 'cfd_outturn'=> $outturn, 'wr_id'=> $warehouse, 'cfd_grower_mark'=> $mark, 'cgrad_id'=> $grade, 'cfd_weight'=> $gradekgs, 'cfd_bags'=> $bags, 'cfd_pockets'=> $pkts, 'slr_id'=> $seller, 'ml_id'=> $mill, 'cg_id' => $coffee_grower]);

     	 		$certs = coffee_certification::where('cfd_id', $coffeeid)->get();

     	 		if($certs != NULL){
			     	foreach ($certs as $key => $value) {
			     		$certsdel = coffee_certification::find($value->id);	
			     		$certsdel->delete(); 

			     	}

     	 		}

     	 		if ($pr_id != null) {

     	 			warrants::where('id', '=', $pr_id)
						->update(['war_no' => $warrant, 'war_date' => $warrant_date, 'war_weight' => $gradekgs, 'war_confirmedby' => $user]);

     	 		}


				Activity::log('Updated lot '.$lot. ' outturn '.$outturn.' warehouse '. $warehouse.' mark '.$mark.' grade ' .$grade.' weight ' . $gradekgs.' bags '.$bags.' pkts '.$pkts. ' seller '.$seller. ' mill '.$mill);

	     	 } else {

				$coffeeid = coffee_details::insertGetId(['csn_id' => $season,  'sl_id' =>  $sale,  'cfd_outturn'=> $outturn, 'wr_id'=> $warehouse, 'cfd_grower_mark'=> $mark, 'cgrad_id'=> $grade, 'cfd_weight'=> $gradekgs, 'cfd_bags'=> $bags, 'cfd_pockets'=> $pkts, 'slr_id'=> $seller, 'ml_id'=> $mill, 'cg_id' => $coffee_grower]);

				Activity::log('Added lot '.$lot. ' outturn '.$outturn.' warehouse '. $warehouse.' mark '.$mark.' grade ' .$grade.' weight ' . $gradekgs.' bags '.$bags.' pkts '.$pkts. ' seller '.$seller. ' mill '.$mill);

				$warrantId = warrants::insertGetId(['war_no' => $warrant, 'war_date' => $warrant_date, 'war_weight' => $gradekgs, 'war_confirmedby' => $user]);

				purchase::insert(
				    ['cfd_id' => $coffeeid, 'cb_id' => '43', 'sst_id' => '1', 'war_id' => $warrantId]
				);


	     	 }


	     	 if ($Cert != NULL){
		     	 foreach ($Cert as $key => $value) {
					coffee_certification::insert(
					    ['cfd_id' => $coffeeid, 'crt_id' => $value]
					);

		     	 }	     	 	
	     	 }

			$cdetails = coffee_details::where('cfd_outturn', $outturn)->where('sl_id', $sale)->where('csn_id', $season)->where('cgrad_id', Input::get('coffee_grade'))->first();
			$certs = coffee_certification::where('cfd_id', $coffeeid)->get();

	    	$Season = Season::all(['id', 'csn_season']);
	    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
	    	$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
	    	$region = Region::where('ctr_id', Input::get('country'))->get();
	     	// $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
	     	$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '2')->whereNull('sl_quality_confirmedby')->get();
	     	$saleid = Input::get('sale');
			$cid = Input::get('country');
			$csn_season = Input::get('sale_season');
	    	if(Input::get('country') != NULL){
		       	$Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
		    	$Mill = mills_region::where('ctr_id', Input::get('country'))->get(); 		
		    	$seller = seller::where('ctr_id', Input::get('country'))->get(); 		
	    	}

	    	$warrant_date = date("m/d/Y", strtotime($warrant_date));  

	    	$sale_lots = direct_sale::where('slid', $saleid)->get(); 
			$request->session()->flash('alert-success', 'Lot Added/Updated!!');
				return View::make('directindividual', compact('id', 
					'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'cdetails', 'certs', 'Growers','warrant_date', 'warrant'));	


	   	} else if(NULL !== Input::get('searchButton')){
			$this->validate($request, [
			'country' => 'required',  'sale_season' => 'required', 'sale' => 'required', 'outt_number' => 'required', 'coffee_grade' => 'required',
			]);


	    	$Season = Season::all(['id', 'csn_season']);
	    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
	    	$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
	    	$region = Region::where('ctr_id', Input::get('country'))->get();

	    	if(Input::get('country') != NULL){
		       	$Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
		    	$Mill = mills_region::where('ctr_id', Input::get('country'))->get(); 		
		    	$seller = seller::where('ctr_id', Input::get('country'))->get(); 		
	    	}
	    	$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '2')->whereNull('sl_quality_confirmedby')->get();
	    	$cid = Input::get('country');
			$csn_season = Input::get('sale_season');
			$saleid = Input::get('sale');
			$sale_lots = direct_sale::where('slid', $saleid)->get(); 	


			$certs = coffee_certification::where('cfd_id', $coffeeid)->get();
			if(Input::get('coffee_grade') == NULL ||  Input::get('coffee_grade') == "Grade"){
				$request->session()->flash('alert-warning', 'Grade cannot be empty!!');

				return View::make('directindividual', compact('id', 
					'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'cdetails', 'certs', 'Growers','warrant_date', 'warrant'));					
			}
			if ($cdetails !== NULL) {
				$request->session()->flash('alert-success', 'Sale Outturn Found!!');

				return View::make('directindividual', compact('id', 
					'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'cdetails', 'certs', 'Growers','warrant_date', 'warrant'));	

			} else {
				$request->session()->flash('alert-warning', 'Outturn not found!');

				return View::make('directindividual', compact('id', 
					'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'certs', 'Growers','warrant_date', 'warrant'));	

			}


    	} else {
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
		    				$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '2')->whereNull('sl_quality_confirmedby')->get();
							$request->session()->flash('alert-success', 'Sale found!!');
							$cid = Input::get('country');
							$csn_season = Input::get('sale_season');
							$saleid = Input::get('sale');
							$sale_lots = direct_sale::where('slid', $saleid)->get(); 


							return View::make('directindividual', compact('id', 
								'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'Growers','warrant_date', 'warrant'));	
	    				} else {
		    				$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->whereNull('sl_quality_confirmedby')->get();
							$request->session()->flash('alert-success', 'Sale found!!');
							$cid = Input::get('country');
							$csn_season = Input::get('sale_season');
							return View::make('directindividual', compact('id', 
								'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'Growers','warrant_date', 'warrant'));					
	    				}

	    			


	    		} else {
	    				$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->whereNull('sl_quality_confirmedby')->get();
						// $request->session()->flash('alert-success', 'Sale found!!');
						$cid = Input::get('country');
						$csn_season = Input::get('sale_season');
						return View::make('directindividual', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'Growers','warrant_date', 'warrant'));	
				}
	    	} else {

				return redirect('directindividual')
	                        ->withErrors("Please select a valid Country!!")->withInput();
			}

	    	return View::make('directindividual', compact('id', 'Season', 'country', 'Warehouse', 'Mill', 'Certification', 'seller', 'Growers','warrant_date', 'warrant'));		
    	}
    
    }

    public function directUploadOutturnsForm (Request $request){
    	$id = null;
    	$Season = Season::all(['id', 'csn_season']);
    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
    	return View::make('directuploadoutturns', compact('id', 'Season', 'country'));

    }


    public function directuploadoutturns (Request $request){
    	$Season = Season::all(['id', 'csn_season']);
    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);

    		if (NULL !== Input::get('submitdirectoutturns')){
    			$path = Input::file('import_file')->getRealPath();
				if($path != NULL){


					$data = Excel::load($path, function($reader) {
					})->get();
					
					if(!empty($data) && $data->count()){
					

						$data = $data->first();

						foreach ($data as $key => $value) {


							$sale = trim($value->sale);	

							$sale_date = trim($value->sale_date_year_month_date);	
					        $sale_date    = date_create($sale_date);
					        $sale_date    = date_format($sale_date, "Y-m-d");
					        $season    = Input::get('sale_season');

							$hedge = trim($value->hedge);
							$grower = trim($value->grower);

							$coffee_type = trim($value->coffee_type);
							$trading_month = trim($value->trading_month);
							$trading_year = trim($value->trading_year);
							$margin = trim($value->margin);
							$season = Input::get('sale_season');
							$outturn = trim($value->outturn);
							$outturn = preg_replace('/\s+/', '', $outturn);
							$mark = trim($value->mark);
							$mill = trim($value->mill);
							$warehouse = trim($value->warehouse);
							$grade = trim(trim($value->grade));
					     	$bags = trim(trim($value->bags));
					     	$pkts = trim($value->pkt);						     	
							$kilos = trim($value->kg);								
							$cert = trim($value->cert);
							$seller = trim($value->seller);
							$region = trim($value->region);
							$price = trim($value->price_usd_50);
							$basket = trim($value->code);
							$fob = trim($value->fob);
							$warrant = trim($value->warrant);

							$lot = null;


				            $user_data = Auth::user();
				            $user = $user_data ->usr_name;
				            
							$saleDB = sale::where('sl_no', $sale)->where('csn_id', $season)->first();

							if($sale != NULL && $saleDB != NULL){


								$sale = $saleDB->id;

								$SellerDB = seller::where('slr_name', $seller)->first();

								if(empty($SellerDB)){
									$SellerDB = seller::where('slr_initials', $seller)->first();

									if(empty($SellerDB)) {
										$SellerDB = seller::where('slr_att', $seller)->first();
										if(empty($SellerDB)) {
											$SellerDB = seller::where('slr_description', $seller)->first();
											if(empty($SellerDB)) {
												return redirect('directuploadoutturns')
								                       		->withErrors("Seller ".$seller." ".$sale." was not found in the database and cannot be empty!! ")
								                       		->withInput();		
								            }	
							            }							
									}

								}

								$sellerID = $SellerDB->id;


								$RegionDB = region::where('rgn_name', $region)->first();
								if(empty($RegionDB)){
									$RegionDB = region::where('rgn_description', $region)->first();										
										return redirect('directuploadoutturns')
						                       		->withErrors("Region ".$region." was not found in the database and cannot be empty!! ")
						                       		->withInput();		
								} 
								$regionID = $RegionDB->id;


								$GrowerDB = Growers::where('cg_name', $grower)->first();
								if(empty($GrowerDB)){

									$GrowerDB = Growers::where('cg_mark', $mark)->first();	
									if(empty($GrowerDB)) {									
										return redirect('directuploadoutturns')
						                       		->withErrors("Grower ".$grower." was not found in the database and cannot be empty!! ")
						                       		->withInput();		
			                       	}

								} 
								$growerID = $GrowerDB->id;
								
								



								$BasketDB = basket::where('bs_code', $basket)->first();

								if(empty($BasketDB)){

									$basketID = null;

								} else {

									$basketID = $BasketDB->id;

								}


								$BasketInternalDB = InternalBaskets::where('ibs_code', $basket)->first();

								if(empty($BasketInternalDB)){

									$basketInternalID = null;

								} else {

									$basketInternalID = $BasketInternalDB->id;

								}								


								$FOBDB = FOB::where('fob_price', $fob)->first();
								
								if(empty($FOBDB)){
									return redirect('directuploadoutturns')
					                       		->withErrors("FOB price ".$fob." was not found in the database and cannot be empty!! ")
					                       		->withInput();		

								} 

								$fobID = $FOBDB->id;



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
											return redirect('directuploadoutturns')
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
									return redirect('directuploadoutturns')
					                        		->withErrors("Grade ".$grade." ".$lot." was not found in the database!! ")
					                        		->withInput();											
								} else if ($CoffeeGrade->cgrad_name != $grade) {
									return redirect('directuploadoutturns')
					                        		->withErrors("Grade ".$grade." ".$lot." was not found in the database!! ")
					                        		->withInput();
								}
								$gradeid = $CoffeeGrade->id;
								$certs = null;

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
														return redirect('directuploadoutturns')
									                    	->withErrors("Certification ".$value." ".$lot." was not found in the database and cannot be empty!! ")
									                    	->withInput();	
												}							

								            } else {
								            	$certID = $CertDB->id;	
								            }
										} else if(!empty($CertDB)){
											$certID = $CertDB->id;	
										}
										
										$certs[] = ['sale' => $sale, 'lot' => $lot, 'outturn' => $outturn, 'season' => $season, 'certID' => $certID, 'grade' => $gradeid,'cfd_weight' => $kilos];
									}
								
								}	
								
								$cdetails = coffee_details::where('cfd_outturn', $outturn)->where('sl_id', $sale)->where('csn_id', $season)->where('cfd_lot_no', $lot)->first();

								if (empty($cdetails)) {

									$insert[] = ['csn_id' => $season,  'sl_id' =>  $sale, 'cg_id' =>  $growerID,  'cfd_lot_no' => $lot, 'cfd_outturn' => $outturn, 'wr_id' => $warehouseID, 'cfd_grower_mark' => $mark, 'cgrad_id' => $gradeid, 'cfd_weight' => $kilos, 'cfd_bags' => $bags, 'cfd_pockets' => $pkts, 'slr_id' => $sellerID, 'ml_id'=> $millID];

								} else {

									return redirect('directuploadoutturns')
					                       		->withErrors("Outturn ". $outturn. " already exists for a similiar sale and season!! ")
					                       		->withInput();	

								}
								$prcHedge = $saleDB->sl_hedge;

								$prcValue = $kilos/50 * $price;

								$prcValue = $prcValue + $kilos/50 * $fob;

								$purchases[] = ['sale' => $sale, 'lot' => $lot, 'outturn' => $outturn, 'season' => $season, 'price' => $price, 'fobid' => $fobID, 'basketid' => $basketID, 'basketinternalid' => $basketInternalID, 'hedge' => $prcHedge, 'prcvalue' => $prcValue, 'grade' => $gradeid, 'cfd_weight' => $kilos, 'warrantNo' => $warrant, 'warDate' => $sale_date];



							} 
						}

						if(!empty($insert)){
							coffee_details::insert($insert);
							if ($certs != null) {
								foreach ($certs as $key => $value) {
									$cdetails = coffee_details::where('cfd_outturn', $value["outturn"])->where('sl_id', $value["sale"])->where('csn_id', $value["season"])->where('cfd_lot_no', $value["lot"])->where('cgrad_id', $value["grade"])->where('cfd_weight', $value["cfd_weight"])->first();

									coffee_certification::insert(
									    ['cfd_id' => $cdetails->id, 'crt_id' => $value["certID"]]
									);


								}
							}


						}


						if(!empty($insert)){

							foreach ($purchases as $key => $value) {
								$cdetails = coffee_details::where('cfd_outturn', $value["outturn"])->where('sl_id', $value["sale"])->where('csn_id', $value["season"])->where('cfd_lot_no', $value["lot"])->where('cgrad_id', $value["grade"])->where('cfd_weight', $value["cfd_weight"])->first();

								$warrantId = warrants::insertGetId(['war_no' => $value["warrantNo"], 'war_date' => $value["warDate"], 'war_weight' => $value["cfd_weight"], 'war_confirmedby' => $user]);

								purchase::insert(
								    ['cfd_id' => $cdetails->id, 'cb_id' => '43', 'sst_id' => '1', 'prc_confirmed_price' => $value["price"], 'prc_fob_id' => $value["fobid"], 'bs_id' => $value["basketid"],'ibs_id' => $value["basketinternalid"], 'prc_hedge' => $value["hedge"], 'prc_value' => $value["prcvalue"], 'war_id' => $warrantId]
								);


								Sale::where('id', '=', $value["sale"])
									->update(['sl_catalogue_confirmedby' => $user]);


							}

						}



					$cid = Input::get('country');
					$csn_season = Input::get('sale_season');
					$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->first();
					Activity::log('Uploaded catalogue for sale '.$sale->sl_no. ' Season '.$csn_season.' country '. $cid);
					$request->session()->flash('alert-success', 'Catalogue uploaded successfully!!');
					$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->where('sl_quality_confirmedby', null)->where('sl_auction_confirmedby', null)->get();
					return View::make('directuploadoutturns', compact('id', 'Season', 'country', 'sale', 'cid', 'csn_season'));	

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
						return View::make('directuploadoutturns', compact('id', 'Season', 'country', 'sale', 'cid', 'csn_season'));	
		    	} else {
    				// $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
    				// $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
    				$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->where('sl_quality_confirmedby', null)->where('sl_auction_confirmedby', null)->get();
					// $request->session()->flash('alert-success', 'Sale found!!');
					$cid = Input::get('country');
					$csn_season = Input::get('sale_season');
					return View::make('directuploadoutturns', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale'));

				}
		}

	}



	public function downloadExcelDirect($type)
	{
		return Excel::load('template_direct.xlsx', function($reader) {
		})->download();
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
								$grade = trim($value->grade);
								$kilos = trim($value->kg);								
						     	$bags = trim(trim($value->bags));
						     	$pkts = trim($value->pkt);						     	
								$cert = trim($value->cert);

								// $count +=1;
								// print_r($count." ".$seller.$lot."<br>");
								if($lot != NULL){
										$SellerDB = seller::where('slr_name', $seller)->first();
										if(empty($SellerDB)){
											$SellerDB = seller::where('slr_initials', $seller)->first();

											if(empty($SellerDB) && $seller != NULL) {

												return redirect('catalogueupload')
								                       		->withErrors("Seller ".$seller." was not found in the database and cannot be empty!! ")
								                       		->withInput();									
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
													return redirect('catalogueupload')
									                       		->withErrors("Mill ".$mill." was not found in the database and cannot be empty!! ")
									                       		->withInput();	
														
												} 	

											} 		

										} 
										$millID = $MillDB->id;


										$WarehouseDB = Warehouse::where('wr_name', $warehouse)->where('rgn_id', $regionID)->first();
										if(empty($WarehouseDB)){
											$WarehouseDB = Warehouse::where('wr_initials', $warehouse)->where('rgn_id', $regionID)->first();
											if(empty($WarehouseDB)){
												$WarehouseDB = Warehouse::where('wr_description', $warehouse)->where('rgn_id', $regionID)->first();
												
												if(empty($WarehouseDB)){
													return redirect('catalogueupload')
									                       		->withErrors("Warehouse ".$warehouse." for region ".$region." was not found in the database and cannot be empty!! ")
									                       		->withInput();	
														
												} 	

											} 		

										} 
										$warehouseID = $WarehouseDB->id;


										$CoffeeGrade = CoffeeGrade::where('cgrad_name', $grade)->first();										
										if ($CoffeeGrade->cgrad_name != $grade) {
											return redirect('catalogueupload')
							                        		->withErrors("Grade ".$grade." was not found in the database!! ")
							                        		->withInput();
										}
										$gradeid = $CoffeeGrade->id;


										$CertDB = explode(',', $cert);
										foreach ($CertDB as $key => $value) {
											$CertDB = certification::where('crt_name', $value)->first();
											if(empty($CertDB) && $value != NULL){
												$CertDB = certification::where('crt_description', $value)->first();	
												if(empty($CertDB)){									
													return redirect('catalogueupload')
									                       		->withErrors("Certification ".$value." was not found in the database and cannot be empty!! ")
									                       		->withInput();		
									            }
											} 
											$certID = $CertDB->id;	
											$certs[] = ['sale' => $sale, 'lot' => $lot, 'outturn' => $outturn, 'season' => $season, 'certID' => $certID];										
										}	
										$cdetails = coffee_details::where('sl_id', $sale)->where('csn_id', $season)->where('cfd_lot_no', $lot)->first();

										if (!empty($cdetails)) {
											return redirect('catalogueupload')
							                       		->withErrors("Lot number ".$lot." already exists for a similiar sale and season!! ")
							                       		->withInput();	
										} 
										$cdetails = coffee_details::where('cfd_outturn', $outturn)->where('sl_id', $sale)->where('csn_id', $season)->where('cfd_lot_no', $lot)->first();


										if (empty($cdetails)) {
											$insert[] = ['csn_id' => $season,  'sl_id' =>  $sale, 'cfd_lot_no' => $lot, 'cfd_outturn' => $outturn, 'wr_id' => $warehouseID, 'cfd_grower_mark' => $mark, 'cgrad_id' => $gradeid, 'cfd_weight' => $kilos, 'cfd_bags' => $bags, 'cfd_pockets' => $pkts, 'slr_id' => $sellerID, 'ml_id'=> $millID];
										} else {
											return redirect('catalogueupload')
							                       		->withErrors("Lot number ".$lot.", outturn ".$outturn." already exists for a similiar sale and season!! ")
							                       		->withInput();	
										}


									}
							}

							if(!empty($insert)){
								coffee_details::insert($insert);
							}
							foreach ($certs as $key => $value) {
								$cdetails = coffee_details::where('cfd_outturn', $value["outturn"])->where('sl_id', $value["sale"])->where('csn_id', $value["season"])->where('cfd_lot_no', $value["lot"])->first();

								coffee_certification::insert(
								    ['cfd_id' => $cdetails->id, 'crt_id' => $value["certID"]]
								);
							}

						$cid = Input::get('country');
						$csn_season = Input::get('sale_season');
						$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->first();
						Activity::log('Uploaded catalogue for sale '.$sale->sl_no. ' Season '.$csn_season.' country '. $cid);
						$request->session()->flash('alert-success', 'Catalogue uploaded successfully!!');
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

	    				$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
						// $request->session()->flash('alert-success', 'Sale found!!');
						$cid = Input::get('country');
						$csn_season = Input::get('sale_season');
						return View::make('catalogueupload', compact('id', 'Season', 'country', 'sale', 'cid', 'csn_season'));	
		    	} else {
    				$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
					// $request->session()->flash('alert-success', 'Sale found!!');
					$cid = Input::get('country');
					$csn_season = Input::get('sale_season');
					return View::make('catalogueupload', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale'));

				}
		}

	}


	public function outturn_delete($id)
	{   

		$coffee_details = coffee_details::findOrFail($id);  
		if ($coffee_details) {
	    	$coffee_details->delete();
		}


		return redirect('directindividual');
		

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

    	// $greensize = quality_parameters::where('qg_id', '1')->get();
    	// $greencolor = quality_parameters::where('qg_id', '2')->get();
    	// $greendefects = quality_parameters::where('qg_id', '3')->get();

    	// $processing = processing::all(['id', 'prcss_name']);
    	// $screens = screens::all(['id', 'scr_name']);

    	// $cupscore = cupscore::all(['id', 'cp_score', 'cp_quality']);
    	// $rawscore = rawscore::all(['id', 'rw_score', 'rw_quality']);

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


	//return back();	

    }

	public function downloadExcel($type)
	{
		return Excel::load('template.xlsx', function($reader) {
		})->download();
	}




    public function createSaleForm (Request $request){
    	$id = null;
    	$Season = Season::all(['id', 'csn_season']);
    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
    	$buyer = buyer::all(['id', 'cb_name']);
    	$SaleType = SaleType::all(['id','sltyp_name']);
    	$tradingMonths = trading_months::all(['id','trm_code']);

    	$years = array('16', '17', '18', '19', '20');

		return View::make('createsale', compact('id', 'Season', 'country', 'buyer', 'SaleType', 'tradingMonths', 'years'));

    }

     public function createSale (Request $request){




    	$id = null;
    	$Season = Season::all(['id', 'csn_season']);
    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
    	$buyer = buyer::all(['id', 'cb_name']);
    	$SaleType = SaleType::all(['id','sltyp_name']);

    	$tradingMonths = trading_months::all(['id','trm_code']);

    	$years = array('16', '17', '18', '19', '20');



		if (NULL !== Input::get('searchButton')){
			if ($request->has('sl_no')) {
				if ($request->has('sale_season') & Input::get('sale_season') !== "Sale Season" ) {
					
							$sale = Sale::where('sl_no', '=', Input::get('sl_no'))->where('csn_id',  Input::get('sale_season'))->first();

							if ($sale !== NULL) {

								$request->session()->flash('alert-success', 'Sale found!!');
								return View::make('createsale', compact('id', 'Season', 'country', 'buyer', 'SaleType', 'sale', 'tradingMonths', 'years'));		
					 
						} else {

							return redirect('createsale')
				                        ->withErrors("Please enter a valid Sale Number and Sale Season Combination or Create a new Sale!!")->withInput();
						}				
				} else {
					return  redirect('createsale')
		                        ->withErrors("The Sale Season cannot be empty!!")->withInput();						
				}



			} else {
				if ($request->has('season')) {
					return  redirect('createsale')
		                        ->withErrors("The Sale Number cannot be empty!!")->withInput();	
				} else {
					return  redirect('createsale')
		                        ->withErrors("The Sale Number and Season cannot be empty!!")->withInput();						
				}
			
			}
		} else {


     	 $this->validate($request, [
	            'sale_season' => 'required',  'sl_no' => 'required', 'sale_type' => 'required', 'date' => 'required', 'hedge' => 'required', 'country' => 'required', 
	        ]);
			

			$sl_no = Input::get('sl_no');
			$sale_season = Input::get('sale_season');
			$sale_type = Input::get('sale_type');
			$date = Input::get('date');
			$hedge = Input::get('hedge');
			$nyc = Input::get('nyc');

			$country = Input::get('country');
			$cbuyer = Input::get('coffee_buyer');


			$date=date_create($date);
			$date = date_format($date,"Y-m-d");	


			$sale = Sale::where('sl_no', '=', Input::get('sl_no'))->where('csn_id',  Input::get('sale_season'))->first();

			$sseason = Season::where('id',  Input::get('sale_season'))->first();
			$sbuyer = buyer::where('id',  Input::get('coffee_buyer'))->first();



	    	$tradingmonth = Input::get('tradingmonth');
	    	$tradingyear = Input::get('tradingyear');

	    	$trm = $tradingmonth.$tradingyear;

			if ($sale !== NULL){
				Sale::where('sl_no', '=', $sl_no)->where('csn_id', '=', $sale_season)
							->update(['sl_date' => $date, 'ctr_id' => $country, 'cb_id' => $cbuyer, 'sltyp_id' => $sale_type, 'sl_date' => $date, 'sl_hedge' => $hedge, 'sl_month' => $trm ]);

				Activity::log('Updated Sale '.$sl_no. ' For Season '.$sseason->csn_season.' Buyer '. $sbuyer->cb_name.' sale_type '.$sale_type.' date ' .$date.' hedge ' . $hedge.' sl_month '.$trm.' country '.$country);

			} else {
				Sale::insert(
					['sl_no' => $sl_no, 'csn_id' =>  $sale_season, 'sl_date' => $date, 'ctr_id' => $country, 'cb_id' => $cbuyer, 'sltyp_id' => $sale_type, 'sl_no' => $sl_no, 'sl_date' => $date, 'sl_hedge' => $hedge, 'sl_month' => $trm]);
				Activity::log('Added Sale '.$sl_no. ' For Season '.$sseason->csn_season.' Buyer '. $sbuyer->cb_name.' sale_type '.$sale_type.' date ' .$date.' hedge ' . $hedge.' sl_month '.$trm.' country '.$country);
			}


		$request->session()->flash('alert-success', 'Sale was updated successfully!!');
		return redirect('createsale');	
    	
    


		// return View::make('createsale', compact('id', 'Season', 'country', 'buyer', 'SaleType', 'sale'));

    }
	}










    public function directCodeUploadForm(Request $request)
    {
        $id      = null;
        $Season  = Season::all(['id', 'csn_season']);
        $country = country::all(['id', 'ctr_name', 'ctr_initial']);
        return View::make('directcodeupload', compact('id', 'Season', 'country'));

    }

    public function downloadExcelCode($type)
    {
        return Excel::load('template_direct_codes.xlsx', function ($reader) {
        })->download();
    }

    public function directCodeUpload(Request $request)
    {
        $Season  = Season::all(['id', 'csn_season']);
        $country = country::all(['id', 'ctr_name', 'ctr_initial']);

        if (null !== Input::get('submitcatalogue')) {
            $path = Input::file('import_file')->getRealPath();

            if ($path != null) {

                $data = Excel::load($path, function ($reader) {
                })->get();

                if (!empty($data) && $data->count()) {



                    $data = $data->first();
                    	
                    foreach ($data as $key => $value) {
                        $sale             = trim($value->sale);
                        $season           = Input::get('sale_season');
                        $selected_country = Input::get('country');

						// $lot = trim($value->lot);
                        $outturn = trim($value->outturn);
                        $outturn = preg_replace('/\s+/', '', $outturn);                            
                        $price   = trim($value->price);
                        $warrant  = trim($value->warrant);
                        $basket  = trim($value->basket);
                        $grade  = trim($value->grade);

                        $warrantID = null;

						$CoffeeGrade = CoffeeGrade::where('cgrad_name', $grade)->where('ctr_id', Input::get('country'))->first();		
						if(empty($CoffeeGrade)){
							return redirect('directcodeupload')
			                        		->withErrors("Grade ".$grade." ".$outturn." was not found in the database!! ")
			                        		->withInput();											
						} else if ($CoffeeGrade->cgrad_name != $grade) {
							return redirect('directcodeupload')
			                        		->withErrors("Grade ".$grade." ".$outturn." was not found in the database!! ")
			                        		->withInput();
						}
						$gradeID = $CoffeeGrade->id;              


                        $SaleDB = sale::where('sl_no', $sale)->first();

                        if (empty($SaleDB)) {

                            return redirect('directcodeupload')
                                ->withErrors("Sale " . $sale . " was not found in the database and cannot be empty!! ")
                                ->withInput();

                        }

                        $saleID = $SaleDB->id;

                        // $WarrantDB = warrants::where('war_no', $warrant)->first();

                        // if (empty($WarrantDB)) {

                        //     return redirect('directcodeupload')
                        //         ->withErrors("Warrant " . $WarrantDB . " was not found in the database and cannot be empty!! ")
                        //         ->withInput();

                        // }

                        // $warrantID = $WarrantDB->id;

                        $BasketDB = basket::where('bs_code', $basket)->where('ctr_id', $selected_country)->first();
                        
                        if (empty($BasketDB)) {

                            $BasketDB = basket::where('bs_quality', $basket)->where('ctr_id', $selected_country)->first();

                            if (empty($BasketDB)) {

                                $BasketDB = basket::where('bs_description', $basket)->where('ctr_id', $selected_country)->first();

                                if (empty($BasketDB)) {
                                    return redirect('directcodeupload')
                                        ->withErrors("Basket " . $basket . " was not found in the database and cannot be empty!! ")
                                        ->withInput();

                                }

                            }

                        }

                        $basketID = $BasketDB->id;

                        $BasketInternalDB = InternalBaskets::where('ibs_code', $basket)->where('ctr_id', $selected_country)->first();
                        if (empty($BasketInternalDB)) {
                            $BasketInternalDB = basket::where('ibs_quality', $basket)->where('ctr_id', $selected_country)->first();
                            if (empty($BasketInternalDB)) {
                                $BasketInternalDB = basket::where('ibs_description', $basket)->where('ctr_id', $selected_country)->first();

                                if (empty($BasketInternalDB)) {
                                    return redirect('directcodeupload')
                                        ->withErrors("Internal Basket " . $BasketInternalDB . " was not found in the database and cannot be empty!! ")
                                        ->withInput();

                                }

                            }

                        }

                        $basketInternalID = $BasketInternalDB->id;


                        if ($price == null) {
                            return redirect('directcodeupload')
                                ->withErrors("Price for outturn " . $outturn . " cannot be empty!! ")
                                ->withInput();

                        }

                        $purchases[] = ['sale' => $saleID, 'outturn' => $outturn, 'grade' => $gradeID, 'season' => $season, 'price' => $price, 'basketid' => $basketID, 'basketinternalid' => $basketInternalID, 'warrantNo' => $warrantID];

                    }
                }


				if(!empty($purchases)){
					
					foreach ($purchases as $key => $value) {


						$pdetails = coffee_details::where('cfd_outturn', $value["outturn"])->where('sl_id', $value["sale"])->where('csn_id', $value["season"])->where('cgrad_id', $value["grade"])->first();

						

						// $pdetails = purchase::where('war_id', $value["warrantNo"])->first();
						if ($pdetails != null) {
							$pdetails = purchase::where('cfd_id', $pdetails->id)->first();
							$pid = $pdetails->id;

							purchase::where('id', '=', $pid)
								->update(['bs_id' => $value["basketid"], 'ibs_id' => $value["basketinternalid"], 'prc_confirmed_price' => $value["price"], 'prc_price' => $value["price"]]);								

						}

					}

				}

                $cid        = Input::get('country');
                $csn_season = Input::get('sale_season');
                $sale       = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->first();
                Activity::log('Uploaded auction details for sale ' . $sale->sl_no . ' Season ' . $csn_season . ' country ' . $cid);
                $request->session()->flash('alert-success', 'Direct sale details uploaded successfully!!');

                $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sltyp_id', '1')->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', null)->orderBy('sl_no')->get();

                return View::make('directcodeupload', compact('id', 'Season', 'country', 'sale', 'cid', 'csn_season'));

                // } else {
                //     return redirect('stockupload')
                //                       ->withErrors("Lot Number Cannot be Empty!!")->withInput();
                // }
            }

        } else if ($request->has('country')) {

            if ($request->has('sale_season') & Input::get('sale_season') !== "Sale Season") {

                // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
                $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sltyp_id', '1')->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', null)->orderBy('sl_no')->get();
                // $request->session()->flash('alert-success', 'Sale found!!');
                $cid        = Input::get('country');
                $csn_season = Input::get('sale_season');
                return View::make('directcodeupload', compact('id', 'Season', 'country', 'sale', 'cid', 'csn_season'));
            } else {
                // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
                $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sltyp_id', '1')->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', null)->orderBy('sl_no')->get();
                // $request->session()->flash('alert-success', 'Sale found!!');
                $cid        = Input::get('country');
                $csn_season = Input::get('sale_season');
                return View::make('directcodeupload', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale'));

            }
        }

    }


}

