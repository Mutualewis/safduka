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
use Ngea\quality_parameters;
use Ngea\processing;
use Ngea\screens;
use Ngea\cupscore;
use Ngea\rawscore;
use Ngea\quality_details;

use Ngea\greencomments;
use Ngea\direct_sale;
use Ngea\sale_status;
use Ngea\basket;
use Ngea\purchase;

use delete;


class BasketController extends Controller {

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

	    				// $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
	    				$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
						// $request->session()->flash('alert-success', 'Sale found!!');
						$cid = Input::get('country');
						$csn_season = Input::get('sale_season');
						return View::make('catalogueupload', compact('id', 'Season', 'country', 'sale', 'cid', 'csn_season'));	
		    	} else {
    				// $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
    				$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
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


    public function addBasketForm (Request $request){
    	$id = NULL;
    	$Season = Season::all(['id', 'csn_season']);
    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
    	$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
    	$Certification = Certification::all(['id', 'crt_name']);
    	$buyer = buyer::all(['id', 'cb_name']);   	


    	$sale_status = sale_status::all(['id', 'sst_name']);
    	$Warehouse = NULL;
    	$Mill = NULL;

    	return View::make('addbasket', compact('id', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'largest', 'greensize', 'greencolor', 'greendefects', 'processing', 'cupscore', 'rawscore', 'screens', 'buyer', 'sale_status'));

    }


    public function addBasket (Request $request){
    	$id = NULL;

    	$Warehouse = NULL;
    	$Mill = NULL;


    	$greensize = quality_parameters::where('qg_id', '1')->get();
    	$greencolor = quality_parameters::where('qg_id', '2')->get();
    	$greendefects = quality_parameters::where('qg_id', '3')->get();
    	$processing = processing::all(['id', 'prcss_name']);
    	$buyer = buyer::all(['id', 'cb_name']);

    	$sale_status = sale_status::all(['id', 'sst_name']);

    	$screens = screens::all(['id', 'scr_name']);

    	$cupscore = cupscore::all(['id', 'cp_score', 'cp_quality']);
    	$rawscore = rawscore::all(['id', 'rw_score', 'rw_quality']);



    	$Certification = Certification::all(['id', 'crt_name']);


		$basket = basket::where('ctr_id', Input::get('country'))->get();
		// $data['dnt'] = (\Input::has('dnt')) ? 1 : 0;
		// $data['dnt'] = $request->input('dnt', 1);
		// $form->save($data);
		//$request->save($data);
		// print_r(Input::get('dnt')." search". Input::get('searchButton'));


		if (NULL !== Input::get('submitlot')){
	     	 $this->validate($request, [
		            'country' => 'required',  'sale_season' => 'required', 'sale' => 'required', 'sif_lot' => 'required', 'outt_number' => 'required', 'coffee_grower' => 'required',
		        ]);
     
	     	 $country = Input::get('country');
	     	 $season = Input::get('sale_season');
	     	 $sale = Input::get('sale');
	     	 $lot = Input::get('sif_lot');
	     	 $outturn = Input::get('outt_number');
	     	 $mark = Input::get('coffee_grower');

	     	 $coffee_buyer = Input::get('coffee_buyer');
	     	 $price = Input::get('price');
	     	 $basket = Input::get('basket');
	     	 $sale_status = Input::get('sale_status');

	     	 $warrant_no = Input::get('warrant_no');
	     	 $warrant_weight = Input::get('warrant_weight');
	     	 $date = Input::get('date');
	     	 $cdetails = coffee_details::where('cfd_outturn', $outturn)->where('sl_id', $sale)->where('csn_id', $season)->where('cfd_lot_no', $lot)->first();
	     	 $coffeeid = $cdetails->id;

			 $pdetails = purchase::where('cfd_id', $coffeeid)->first();

			 // print_r($pdetails);
	         // $coffeeid = $cdetails->id;

			 if($pdetails != NULL){
			 	$pid = $pdetails->id;
				purchase::where('id', '=', $pid)
					->update(['cb_id' => $coffee_buyer,  'prc_price' =>  $price, 'sst_id'=> $sale_status, 'bs_id'=> $basket, 'prc_warrant_no'=> $warrant_no, 'prc_warrant_weight'=> $warrant_weight]);
				$request->session()->flash('alert-success', 'Purchase Information Updated!!');

				// 'id', 'cfd_id', 'cb_id', 'prc_price', 'bs_id', 'sst_id', 'prc_warrant_no', 'prc_warrant_weight', 'prc_invoice_no', 'created_at', 'updated_at'
				Activity::log('Updated purchase information for '.$lot. ' coffee_buyer id '.$coffee_buyer.' with price '. $price.' sale_status id ' .$sale_status.' warrant_no ' . $warrant_no.' warrant_weight '.$warrant_weight . 'basket ID '.$basket);

			 } else {
					purchase::insert(
					    ['cfd_id' => $coffeeid,'cb_id' => $coffee_buyer,  'prc_price' =>  $price, 'sst_id'=> $sale_status, 'bs_id'=> $basket, 'prc_warrant_no'=> $warrant_no, 'prc_warrant_weight'=> $warrant_weight]
					);
					$request->session()->flash('alert-success', 'Purchase Information Added!!');
					Activity::log('Added purchase information for '.$lot. ' coffee_buyer id '.$coffee_buyer.' with price '. $price.' sale_status id ' .$sale_status.' warrant_no ' . $warrant_no.' warrant_weight '.$warrant_weight. 'basket ID '.$basket);

			 }

	    	$Season = Season::all(['id', 'csn_season']);
	    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
	    	$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
	    	$region = Region::where('ctr_id', Input::get('country'))->get();

	    	$pdetails = purchase::where('cfd_id', $coffeeid)->first();

	    	if(Input::get('country') != NULL){
		       	$Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
		    	$Mill = mills_region::where('ctr_id', Input::get('country'))->get(); 		
		    	$seller = seller::where('ctr_id', Input::get('country'))->get(); 		
	    	}
	    	// $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
	    	$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
	    	$cid = Input::get('country');
			$csn_season = Input::get('sale_season');
			$saleid = Input::get('sale');
			$sale_lots = sale_lots::where('slid', $saleid)->get(); 	

			// $request->session()->flash('alert-success', 'Purchase Information Added!!');

    		$sale_status = sale_status::all(['id', 'sst_name']);
    		$basket = basket::where('ctr_id', Input::get('country'))->get();

			return View::make('addbasket', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'sale_lots',  'saleid', 'cdetails','buyer', 'sale_status','basket', 'pdetails'));	     	 
			#,'CoffeeGrade', 'sale_lots', 'saleid', 'cdetails','buyer', 'sale_status', 'basket'


    	} else if(NULL !== Input::get('searchButton')){
			$country = Input::get('country');
			$season = Input::get('sale_season');
			$sale = Input::get('sale');
			$lot = Input::get('sif_lot');    				

			$cdetails = coffee_details::where('sl_id', $sale)->where('csn_id', $season)->where('cfd_lot_no', $lot)->first();
			$coffeeid = $cdetails->id;
			$greencomments = greencomments::where('cfd_id', $coffeeid)->get();

	    	$Season = Season::all(['id', 'csn_season']);
	    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
	    	$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
	    	$region = Region::where('ctr_id', Input::get('country'))->get();

	    	if(Input::get('country') != NULL){
		       	$Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
		    	$Mill = mills_region::where('ctr_id', Input::get('country'))->get(); 		
		    	$seller = seller::where('ctr_id', Input::get('country'))->get(); 		
	    	}
	    	// $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
	    	$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
	    	$cid = Input::get('country');
			$csn_season = Input::get('sale_season');
			$saleid = Input::get('sale');
			$sale_lots = sale_lots::where('slid', $saleid)->get(); 
			$qdetails = quality_details::where('cfd_id', $coffeeid)->first();

			$pdetails = purchase::where('cfd_id', $coffeeid)->first();

			if ($cdetails !== NULL) {
				$request->session()->flash('alert-success', 'Sale Lot Found!!');

				return View::make('addbasket', compact('id', 
					'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'cdetails', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'buyer', 'sale_status', 'basket', 'pdetails'));	


						
			} else {
				$request->session()->flash('alert-warning', 'Lot not found!');


				return View::make('addbasket', compact('id', 
					'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'buyer', 'sale_status', 'basket', 'pdetails'));	


			}

    	} else if(NULL !== Input::get('nextButton')){
			$country = Input::get('country');
			$season = Input::get('sale_season');
			$sale = Input::get('sale');
			$lot = Input::get('sif_lot');    				

			$cdetails = coffee_details::where('sl_id', $sale)->where('csn_id', $season)->where('cfd_lot_no','>', $lot)->min('id');

			$cdetails = coffee_details::where('id', $cdetails)->first();
			$coffeeid = $cdetails->id;
			$greencomments = greencomments::where('cfd_id', $coffeeid)->get();
			// print_r($cdetails);

			$qdetails = quality_details::where('cfd_id', $coffeeid)->first();

	    	$Season = Season::all(['id', 'csn_season']);
	    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
	    	$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
	    	$region = Region::where('ctr_id', Input::get('country'))->get();

	    	if(Input::get('country') != NULL){
		       	$Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
		    	$Mill = mills_region::where('ctr_id', Input::get('country'))->get(); 		
		    	$seller = seller::where('ctr_id', Input::get('country'))->get(); 		
	    	}
	    	// $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
	    	$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
	    	$cid = Input::get('country');
			$csn_season = Input::get('sale_season');
			$saleid = Input::get('sale');
			$sale_lots = sale_lots::where('slid', $saleid)->get(); 
			$pdetails = purchase::where('cfd_id', $coffeeid)->first();	

			if ($cdetails !== NULL) {
				$request->session()->flash('alert-success', 'Sale Lot Found!!');

				return View::make('addbasket', compact('id', 
					'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'cdetails', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'buyer', 'sale_status', 'basket', 'pdetails'));	


						
			} else {
				$request->session()->flash('alert-warning', 'Lot not found!');


				return View::make('addbasket', compact('id', 
					'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'buyer', 'sale_status', 'basket', 'pdetails'));	


			}

    	} else if(NULL !== Input::get('previousButton')){
			$country = Input::get('country');
			$season = Input::get('sale_season');
			$sale = Input::get('sale');
			$lot = Input::get('sif_lot');    				

			$cdetails = coffee_details::where('sl_id', $sale)->where('csn_id', $season)->where('cfd_lot_no','<', $lot)->max('id');
			$cdetails = coffee_details::where('id', $cdetails)->first();
			$coffeeid = $cdetails->id;
			$qdetails = quality_details::where('cfd_id', $coffeeid)->first();

			$greencomments = greencomments::where('cfd_id', $coffeeid)->get();

	    	$Season = Season::all(['id', 'csn_season']);
	    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
	    	$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
	    	$region = Region::where('ctr_id', Input::get('country'))->get();
	    	$pdetails = purchase::where('cfd_id', $coffeeid)->first();

	    	if(Input::get('country') != NULL){
		       	$Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
		    	$Mill = mills_region::where('ctr_id', Input::get('country'))->get(); 		
		    	$seller = seller::where('ctr_id', Input::get('country'))->get(); 		
	    	}
	    	// $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
	    	$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
	    	$cid = Input::get('country');
			$csn_season = Input::get('sale_season');
			$saleid = Input::get('sale');
			$sale_lots = sale_lots::where('slid', $saleid)->get(); 	

			if ($cdetails !== NULL) {
				$request->session()->flash('alert-success', 'Sale Lot Found!!');

				return View::make('addbasket', compact('id', 
					'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'cdetails', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'buyer', 'sale_status', 'basket', 'pdetails'));	


						
			} else {
				$request->session()->flash('alert-warning', 'Lot not found!');


				return View::make('addbasket', compact('id', 
					'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'buyer', 'sale_status', 'basket', 'pdetails'));	


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
		    				// $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
		    				$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
							$request->session()->flash('alert-success', 'Sale found!!');
							$cid = Input::get('country');
							$csn_season = Input::get('sale_season');
							$saleid = Input::get('sale');
							$sale_lots = sale_lots::where('slid', $saleid)->get(); 


							return View::make('addbasket', compact('id', 
								'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket'));	
	    				} else {
		    				// $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
		    				$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
							$request->session()->flash('alert-success', 'Sale found!!');
							$cid = Input::get('country');
							$csn_season = Input::get('sale_season');
							return View::make('addbasket', compact('id', 
								'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket'));					
	    				}

	    			


	    		} else {
	    				// $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
	    				$sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
						// $request->session()->flash('alert-success', 'Sale found!!');
						$cid = Input::get('country');
						$csn_season = Input::get('sale_season');
						return View::make('addbasket', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket'));	
				}
	    	} else {

				return redirect('addbasket')
	                        ->withErrors("Please select a valid Country!!")->withInput();
			}

	    	return View::make('addbasket', compact('id', 'Season', 'country', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket'));		
    	}
    


    



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

}

