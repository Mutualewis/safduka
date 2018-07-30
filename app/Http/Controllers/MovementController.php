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
// use PDF;
use Activity;
use Excel;
use niklasravnsborg\LaravelPdf\Facades\Pdf as PDF;

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

use Ngea\invoices;
use Ngea\bric;
use Ngea\payment;
use Ngea\warrants;
use Ngea\transporters;
use Ngea\release_instructions;
use Ngea\Packaging;
use Ngea\Location;
use Ngea\StockLocation;
use Ngea\StockLocationView;

use Ngea\Weighbridge;
use Ngea\Grn;

use Ngea\Stock;
use Ngea\Batch;
use Ngea\GrnsView;
use Ngea\BatchView;
use Ngea\InstructedStockLocation;


use Ngea\User;
use Ngea\Person;
use Helper;
use Ngea\OutturnTotalBatch;
use Ngea\MovementInstructionType;
use Ngea\InstructedLocationRef;

use Auth;

use delete;

use Ngea\processrates;
use Ngea\processcharges;
use Ngea\teams;

class MovementController extends Controller {



    public function movementSpecialForm (Request $request) {

    	$id = NULL;
    	$Season = Season::all(['id', 'csn_season']);
    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
    	$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
    	$Certification = Certification::all(['id', 'crt_name']);
    	$buyer = buyer::all(['id', 'cb_name']);   	

		$rates    = processrates::all(['id', 'service']);
        $teams   = teams::all(['id', 'tms_grpname']);

    	$Warehouse = NULL;
    	$Mill = NULL;    	
    	$cid = NULL;
    	$csn_season = NULL;
    	$sale_cb_id = NULL;
    	$trp = NULL;
    	$release_no = NULL;
    	$date = NULL;
    	$release_no = NULL;

		return View::make('movementspecial', compact('id', 
				'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'rates', 'teams'));	

    }


    public function movementSpecial (Request $request){
		$rates    = processrates::all(['id', 'service']);
		$teams   = teams::all(['id', 'tms_grpname']);
		
    	$ref_no = null;
    	$ref_no = InstructedLocationRef::whereNotNull('ilf_number')->orderBy('ilf_number', 'asc')->pluck('ilf_number');    	

	    if ($ref_no->first() == null) {
	        $ref_no = null;
	    } else {
	        foreach ($ref_no as $ref) {
	            $ref_no = $ref;
	            preg_match_all('!\d+!', $ref, $ref_no);
	            $ref_no = implode(' ', $ref_no[0]);

	        }
	        $ref_no = sprintf("%04d", ($ref_no + 1));
	    }

    	$Warehouse = NULL;
    	$sale_status = sale_status::all(['id', 'sst_name']);

    	$movementInstructionType = MovementInstructionType::all(['id', 'mit_name']);
    	
    	$basket = basket::where('ctr_id', Input::get('country'))->get();

		$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
		$wrhse = Input::get('warehouse'); 
		$new_wrhse = Input::get('new_warehouse'); 

		if ($wrhse !== NULL) {
			$location = Location::where('wr_id', $wrhse)->get();			
		}

		if ($new_wrhse !== NULL) {
			$new_location = Location::where('wr_id', $new_wrhse)->get();			
		}


		$outt_season = Input::get('outt_season');
		$ot_season = Input::get('outt_season');

		$selectedMovementType = Input::get('MovementType');


		$sif_lot = Input::get('sif_lot');
		$outt_number = Input::get('outt_number');
		$btdetails = NULL;
		$season_name = NULL;
		if ($outt_season != NULL) {
			$season_name = Season::where('id', $outt_season)->first();
			$season_name = $season_name->csn_season;
		}

		if ($sif_lot != NULL) {
			$btdetails = sale_lots::where('lot', $sif_lot)->where('csn_season',$season_name)->where('slid', $saleid)->first(); 
		} else if ($outt_number != NULL) {
			$btdetails = sale_lots::where('outturn', $outt_number)->where('csn_season',$season_name)->where('slid', $saleid)->first(); 
			
		}
		$batchview = NULL;
		if ($btdetails != NULL) {
			$batchview = BatchView::where('prc_id', $btdetails->prcid)->get();
		}
		if(Input::get('country') != NULL){
		   	$Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->where('wrt_id', '1')->get();
		   	$NewWarehouse = warehouses_region::where('ctr_id', Input::get('country'))->where('wrt_id', '1')->get();
			$Mill = mills_region::where('ctr_id', Input::get('country'))->get(); 		
			$seller = seller::where('ctr_id', Input::get('country'))->get(); 		
			$weighbridge_ticket = Weighbridge::where('ctr_id', Input::get('country'))->get(); 		
		}
    	$Season = Season::all(['id', 'csn_season']);
    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
    	$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);

		$cid = Input::get('country');

        $user_data = Auth::user();
        $user = $user_data ->id;
        $rw = Input::get('row');
		$row = Input::get('row');
		$column = Input::get('column');
		$zone = Input::get('zone');

		$new_wrhse = Input::get('new_warehouse'); 
        $new_rw = Input::get('new_row');
		$new_column = Input::get('new_column');
		$new_zone = Input::get('zone');



	if (NULL !== Input::get('instructmovement')){

	     	$this->validate($request, [
		            'country' => 'required', 'reasonForMovement' => 'required', 'MovementType' => 'required', 'ref_no' => 'required',
		        ]);

			$ref_selected = Input::get('ref_no');
			if ($ref_selected != null) {
				$ref_no = $ref_selected;
			}
			$batchview_cf = NULL;

			$batchlocation = Input::get('batchlocation');

			$reasonForMovement = Input::get('reasonForMovement');


			$tobewithdrawn = Input::get('tobewithdrawn');
            if ($tobewithdrawn != null) {
                foreach ($tobewithdrawn as $key => $value) {
					Batch::where('id', '=', $value)
						->update(['btc_instructed_by' => null]);	
					$InstructedStockLocation = InstructedStockLocation::where('bt_id', $value)->delete();

					Activity::log('Deleted InstructedLocation information with bt_id '.$value. ' by user '. $user);
                }
            } 
            if ($tobewithdrawn == null && $batchlocation == NULL) {
				$stlocdetails = NULL;
	    		$rw = Input::get('row');
	    		$clm = Input::get('column');

	    		$request->session()->flash('alert-warning', 'Please Select At List One Object!');

		    	if (NULL != Input::get('warehouse') && NULL != Input::get('row') && NULL != Input::get('column') ) {
		    		$wrname = Warehouse::where('id', Input::get('warehouse'))->first();
		    		$wrname = $wrname->wr_name;

		    		$stlocdetails = StockLocationView::where('wr_name', $wrname)->where('loc_row', $rw)->where('loc_column', $clm)->leftJoin('sale_lots', 'sale_lots.prcid', '=', 'stock_locations.prc_id')->get();
		    	}

				return View::make('movementspecial', compact('id', 
					'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'Packaging', 'wrhse', 'location', 'rw', 'clm', 'grn_number', 'weighbridge_ticket', 'wbtk', 'rlno', 'ot_season', 'cdetails', 'grndetails', 'stdetails', 'grnsview', 'batchview', 'stlocdetails', 'rw', 'clm', 'new_wrhse', 'NewWarehouse', 'new_location', 'ref_no', 'movementInstructionType', 'instructedRefDetails', 'rates', 'teams'));		
			}

			$instructedRefDetails = InstructedLocationRef::where('ilf_number', $ref_no)->first();
			$instructionRefId = null;

            if ($instructedRefDetails != null) {
                $instructionRefId = $instructedRefDetails->id;

                InstructedLocationRef::where('id', '=', $instructionRefId)
                    ->update(['ilf_number' => $ref_no, 'ilf_reason' => $reasonForMovement,  'mit_id' => $selectedMovementType]);
                $request->session()->flash('alert-success', 'Stock Information Updated!!');

                Activity::log('Updated InstructedLocationRef information with ref_no '.$ref_no. ' reasonForMovement '. $reasonForMovement. ' selectedMovementType '. $selectedMovementType);
            } else {
				$instructionRefId = InstructedLocationRef::insertGetId (
				['ilf_number' => $ref_no, 'ilf_reason' => $reasonForMovement,  'mit_id' => $selectedMovementType]);

				Activity::log('Inserted InstructedLocationRef information with ref_no '.$ref_no. ' reasonForMovement '. $reasonForMovement. ' selectedMovementType '. $selectedMovementType);
            }

            if ($batchlocation != null) {
				foreach ($batchlocation as $key => $value) {

					$new_zone = Input::get('newzone'.$value);
					$batchview_cf = BatchView::where('id', $value)->get();
			        $locrowdetails = Location::where('wr_id', $new_wrhse)->where('loc_row', $new_rw)->first(); 
			        $loccoldetails = Location::where('wr_id', $new_wrhse)->where('loc_column', $new_column)->first(); 

			        $locrowid = null;
			        $loccolid = null;

			        if (isset($locrowdetails->id)) {
			        	$locrowid = $locrowdetails->id;
			        }
			        if (isset($loccoldetails->id)) {
			     	   $loccolid = $loccoldetails->id;
			        }

			        foreach ($batchview_cf as $keybt => $valuebt) {
						$btid = $valuebt->id;
						$instructed_weight = Input::get('cweight'.$valuebt->id);

						Batch::where('id', '=', $btid)
							->update(['btc_instructed_by' => $user]);	

						$stlocid = InstructedStockLocation::insertGetId (
						['bt_id' => $btid, 'ilf_id' => $instructionRefId, 'loc_row_id' => $locrowid, 'loc_column_id' => $loccolid, 'btc_zone' => $new_zone, 'insloc_reason' => $reasonForMovement, 'insloc_ref' => $ref_no, 'insloc_weight' => $instructed_weight,  'mit_id' => $selectedMovementType]);
						Activity::log('Inserted InstructedStockLocation information with bt_id '.$btid. ' locrowid '. $locrowid. ' loccolid '. $loccolid. ' zone '. $new_zone);
			        }				
				}
			}




			$stlocdetails = NULL;
			$stlocdetails = NULL;
    		$rw = Input::get('row');
    		$clm = Input::get('column');

	    	if (NULL != Input::get('warehouse')) {
	    		$wrname = Warehouse::where('id', Input::get('warehouse'))->first();
	    		$wrname = $wrname->wr_name;

	    		$stlocdetails = StockLocationView::where('wr_name', $wrname)->get();
	    	}
	    	$instructedRefDetails = InstructedLocationRef::where('ilf_number', $ref_no)->first();
			return View::make('movementspecial', compact('id', 
				'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'Packaging', 'wrhse', 'location', 'rw', 'clm', 'grn_number', 'weighbridge_ticket', 'wbtk', 'rlno', 'ot_season', 'cdetails', 'grndetails', 'stdetails', 'grnsview', 'batchview', 'stlocdetails', 'new_wrhse', 'NewWarehouse', 'new_location', 'ref_no', 'movementInstructionType', 'instructedRefDetails', 'rates', 'teams'));	
    	
		} else if(null !== Input::get('confirminstruction')){
	     	 $this->validate($request, [
		            'country' => 'required', 'reasonForMovement' => 'required', 'MovementType' => 'required', 'ref_no' => 'required',
		        ]);

	     	$instructedRefDetails = InstructedLocationRef::where('ilf_number', $ref_no)->first();

            if ($instructedRefDetails != null) {
                $instructionRefId = $instructedRefDetails->id;

                InstructedLocationRef::where('id', '=', $instructionRefId)
                    ->update(['confirmed_by' => $user]); 
                $request->session()->flash('alert-success', 'Stock Information Updated!!');

                Activity::log('Updated InstructedLocationRef information with confirmed_by '.$user);
            }

	    	$ref_no = InstructedLocationRef::whereNotNull('ilf_number')->orderBy('ilf_number', 'asc')->pluck('ilf_number');    	

		    if ($ref_no->first() == null) {
		        $ref_no = null;
		    } else {
		        foreach ($ref_no as $ref) {
		            $ref_no = $ref;
		            preg_match_all('!\d+!', $ref, $ref_no);
		            $ref_no = implode(' ', $ref_no[0]);

		        }
		        $ref_no = sprintf("%04d", ($ref_no + 1));
		    }		

			$stlocdetails = NULL;
			$stlocdetails = NULL;
    		$rw = Input::get('row');
    		$clm = Input::get('column');

	    	if (NULL != Input::get('warehouse')) {
	    		$wrname = Warehouse::where('id', Input::get('warehouse'))->first();
	    		$wrname = $wrname->wr_name;

	    		$stlocdetails = StockLocationView::where('wr_name', $wrname)->get();
	    	}
	    	$instructedRefDetails = InstructedLocationRef::where('ilf_number', $ref_no)->first();
		    
			return View::make('movementspecial', compact('id', 
				'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'Packaging', 'wrhse', 'location', 'rw', 'clm', 'grn_number', 'weighbridge_ticket', 'wbtk', 'rlno', 'ot_season', 'cdetails', 'grndetails', 'stdetails', 'grnsview', 'batchview', 'stlocdetails', 'new_wrhse', 'NewWarehouse', 'new_location', 'ref_no', 'movementInstructionType', 'instructedRefDetails', 'rates', 'teams'));		    	

		} else if (null !== Input::get('printMovementInstruction')) {
            $this->validate($request, ['country' => 'required',
            ]);

            $ref_no    = Input::get('ref_no');

            $wrnameFrom = Warehouse::where('id', Input::get('warehouse'))->first();
    		$wrnameFrom = $wrnameFrom->wr_name;

            $wrnameTo = Warehouse::where('id', Input::get('new_warehouse'))->first();
            if ($wrnameTo != null) {
            	$wrnameTo = $wrnameTo->wr_name;
            }
    		

            $TO = $wrnameFrom. " - Warehouse Department";
            $ATTENTION = "CYKA";
            $FROM = "Lyn - " . $wrnameTo;
           
            $user_data = Auth::user();
            $user      = $user_data->id;

            $person_id      = $user_data->per_id;
            $personDetails = Person::where('id', $person_id)->first();

            $person_fname      = $personDetails->per_fname;
            $person_sname      = $personDetails->per_sname;

            $date = date("d/m/y h:i:sa");      


			$StockView = StockLocationView::where('wr_name', $wrnameFrom)->whereNotNull('btc_instructed_by')->where('insloc_ref',$ref_no)->get();
            
            $pdf = PDF::loadView('pdf.movement_instructions', compact('TO',  'ATTENTION', 'FROM', 'reference', 'ref_no', 'contractNumber', 'user',  'date', 'StockView', 'seasonName', 'person_fname', 'person_sname'));
            return $pdf->stream($ref_no . ' movement_instructions.pdf');

        }  else {
        	$ref_selected = Input::get('ref_no');
			if ($ref_selected != null) {
				$ref_no = $ref_selected;
			}
			$stlocdetails = NULL;
			$stlocdetails = NULL;
    		$rw = Input::get('row');
    		$clm = Input::get('column');

	    	if (NULL != Input::get('warehouse')) {
	    		$wrname = Warehouse::where('id', Input::get('warehouse'))->first();
	    		$wrname = $wrname->wr_name;
	    		$stlocdetails = StockLocationView::where('wr_name', $wrname)->get();
	    	}

	    	$instructedRefDetails = InstructedLocationRef::where('ilf_number', $ref_no)->first();

			return View::make('movementspecial', compact('id', 
				'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'Packaging', 'wrhse', 'location', 'rw', 'clm', 'grn_number', 'weighbridge_ticket', 'wbtk', 'rlno', 'ot_season', 'cdetails', 'grndetails', 'stdetails', 'grnsview', 'batchview', 'stlocdetails', 'rw', 'clm', 'new_wrhse', 'NewWarehouse', 'new_location', 'ref_no', 'movementInstructionType', 'instructedRefDetails', 'rates', 'teams'));		
 	   }
    
 	}





    public function movementConfirmationForm (Request $request){
    	$id = NULL;
    	$Season = Season::all(['id', 'csn_season']);
    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
    	$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
    	$Certification = Certification::all(['id', 'crt_name']);
    	$buyer = buyer::all(['id', 'cb_name']);   
    	$Warehouse = NULL;
    	$Mill = NULL;    	
    	$cid = NULL;
    	$csn_season = NULL;
    	$sale_cb_id = NULL;
    	$trp = NULL;
    	$release_no = NULL;
    	$date = NULL;
    	$release_no = NULL;

		return View::make('movementconfirmation', compact('id', 
				'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released'));	

    }


    public function movementConfirmation (Request $request){
    	$Warehouse = NULL;
    	$sale_status = sale_status::all(['id', 'sst_name']);
    	$basket = basket::where('ctr_id', Input::get('country'))->get();

		$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
		$wrhse = Input::get('warehouse'); 
		$new_wrhse = Input::get('new_warehouse'); 

		if ($wrhse !== NULL) {
			$location = Location::where('wr_id', $wrhse)->get();			
		}

		if ($new_wrhse !== NULL) {
			$new_location = Location::where('wr_id', $new_wrhse)->get();			
		}


		$outt_season = Input::get('outt_season');
		$ot_season = Input::get('outt_season');
		$sif_lot = Input::get('sif_lot');
		$outt_number = Input::get('outt_number');
		$btdetails = NULL;
		$season_name = NULL;
		if ($outt_season != NULL) {
			$season_name = Season::where('id', $outt_season)->first();
			$season_name = $season_name->csn_season;
		}

		if ($sif_lot != NULL) {
			$btdetails = sale_lots::where('lot', $sif_lot)->where('csn_season',$season_name)->where('slid', $saleid)->first(); 
		} else if ($outt_number != NULL) {
			$btdetails = sale_lots::where('outturn', $outt_number)->where('csn_season',$season_name)->where('slid', $saleid)->first(); 
			
		}
		$batchview = NULL;
		if ($btdetails != NULL) {
			$batchview = BatchView::where('prc_id', $btdetails->prcid)->get();
		}
		if(Input::get('country') != NULL){
		   	$Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->where('wrt_id', '1')->get();
		   	$NewWarehouse = warehouses_region::where('ctr_id', Input::get('country'))->where('wrt_id', '1')->get();
			$Mill = mills_region::where('ctr_id', Input::get('country'))->get(); 		
			$seller = seller::where('ctr_id', Input::get('country'))->get(); 		
			$weighbridge_ticket = Weighbridge::where('ctr_id', Input::get('country'))->get(); 		
		}
    	$Season = Season::all(['id', 'csn_season']);
    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);
    	$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);

		$cid = Input::get('country');

        $user_data = Auth::user();
        $user = $user_data ->id;
        $rw = Input::get('row');
		$row = Input::get('row');
		$column = Input::get('column');
		$zone = Input::get('zone');


		$new_wrhse = Input::get('new_warehouse'); 
        $new_rw = Input::get('new_row');
		$new_column = Input::get('new_column');
		$new_zone = Input::get('zone');

	if (NULL !== Input::get('confirmmovement')){
	     	 $this->validate($request, [
		            'country' => 'required', 
		        ]);

			$batchview_cf = NULL;

			$batchlocation = Input::get('batchlocation');
			$batch_kilograms = Input::get('batch_kilograms');

			$diff_weight = NULL;
			$diff_bags = NULL;
			$diff_pkts = NULL;
			$batchview_cf = NULL;
			$previd = NULL;
			$old_weight = NULL;
			$old_bags = NULL;
			$old_pkts = NULL;
			$new_wr_row = NULL;
			$new_wr_col = NULL;			
			$old_wr_row = NULL;
			$old_wr_col = NULL;

			if ($batchlocation == NULL) {
				$stlocdetails = NULL;
				$stlocdetails = NULL;
	    		$rw = Input::get('row');
	    		$clm = Input::get('column');

	    		$request->session()->flash('alert-warning', 'Please Select At List One Object!');

		    	if (NULL != Input::get('warehouse') && NULL != Input::get('row') && NULL != Input::get('column') ) {
		    		$wrname = Warehouse::where('id', Input::get('warehouse'))->first();
		    		$wrname = $wrname->wr_name;

		    		$stlocdetails = StockLocationView::where('wr_name', $wrname)->where('loc_row', $rw)->where('loc_column', $clm)->leftJoin('sale_lots', 'sale_lots.prcid', '=', 'stock_locations.prc_id')->get();
		    	}

				return View::make('movementconfirmation', compact('id', 
					'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'Packaging', 'wrhse', 'location', 'rw', 'clm', 'grn_number', 'weighbridge_ticket', 'wbtk', 'rlno', 'ot_season', 'cdetails', 'grndetails', 'stdetails', 'grnsview', 'batchview', 'stlocdetails', 'rw', 'clm', 'new_wrhse', 'NewWarehouse', 'new_location'));		
			}


			foreach ($batchlocation as $key => $value) {
	     	 	if ($batchlocation != NULL) {
		     	 	$batchview_cf = BatchView::where('id', $value)->get();
					if ($batchview_cf != NULL) {

			     	 	foreach ($batchview_cf as $keybt => $valuebt) {
							//compute weights and add batches
							$old_id = $valuebt->id;
							$old_weight = $valuebt->btc_weight;
							$old_bags = $valuebt->btc_bags;
							$old_pkts = $valuebt->btc_pockets;
							$old_pkgs = $valuebt->btc_packages;
							$old_tare = $valuebt->btc_tare;
							$old_net_weight = $valuebt->btc_net_weight;


							$stid = $valuebt->stid;
							$previd = $valuebt->id;
							if ($valuebt != NULL) {
								
								$new_wr_id = Warehouse::where('wr_name', $valuebt->wr_name)->first();	

								if ($new_wr_id != NULL) {
									$new_wr_id = $new_wr_id->id;
								}

								$new_wr_row = $valuebt->new_loc_row;
								$new_wr_col = $valuebt->new_loc_column;

								$old_wr_row = $valuebt->loc_row;
								$old_wr_col = $valuebt->loc_column;

								$locrowdetails = Location::where('wr_id', $new_wr_id)->where('loc_row', $new_wr_row)->first(); 
		       					$loccoldetails = Location::where('wr_id', $new_wr_id)->where('loc_column', $new_wr_col)->first(); 

		       					$locrowid = $locrowdetails->id;
						        $loccolid = $loccoldetails->id;

								$zone = $valuebt->new_zone;

								$diff_bags = ROUND($old_weight/60);
								$diff_pkts = ROUND($old_weight%60);

								$bt_no = NULL;
								
								Batch::where('id', '=', $valuebt->id)
									->update(['btc_ended_by' => $user]);
								

								$btid = Batch::insertGetId (
										['btc_number' => $bt_no, 'st_id' => $stid, 'btc_weight' => $old_weight,'btc_packages' => $old_pkgs,  'btc_tare' => $old_tare , 'btc_net_weight' => $old_net_weight,  'btc_bags' => $diff_bags, 'btc_pockets' => $diff_pkts, 'btc_prev_id' => $previd]);
										Activity::log('Inserted Batch information with btid '.$btid. ' diff_weight '. $diff_weight. ' bags '. $diff_bags. ' pockets '. $diff_pkts. ' stid '. $stid);
						        


								$stlocid = StockLocation::insertGetId (
								['bt_id' => $btid, 'loc_row_id' => $locrowid, 'loc_column_id' => $loccolid, 'btc_zone' => $zone]);
								Activity::log('Inserted StockLocation information with bt_id '.$btid. ' locrowid '. $locrowid. ' loccolid '. $loccolid. ' zone '. $zone);


							}

			     	 	}

		     	 	}
	     	 	}


			}

			// $diff_weight = $old_weight-$batch_kilograms;

			// $otbid = NULL;	 

			// if ($diff_weight < 0) {
			// 	$request->session()->flash('alert-warning', 'Verify your weights, bags and pockets!');
			// 	return View::make('movementconfirmation', compact('id', 
			// 		'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'Packaging', 'wrhse', 'location', 'rw', 'clm', 'grn_number', 'weighbridge_ticket', 'wbtk', 'rlno', 'ot_season', 'cdetails', 'grndetails', 'stdetails', 'grnsview', 'batchview'));				
			// } else {
			// 	$otbid = OutturnTotalBatch::insertGetId (
			// 	['otb_weight' => $batch_kilograms,'otb_confirmed_by' => $user]);
			// 	Activity::log('Inserted OutturnTotal information with batch_kilograms '.$batch_kilograms. ' user '. $user);	

			// }

			// if ($diff_weight > 0 ) {

			// 	$bt_no = Batch::orderBy('btc_number', 'desc')->pluck('btc_number');
			// 	foreach ($bt_no as $bt) {
			// 	    $bt_no = $bt;
			// 	}	
			// 	if ($bt_no != NULL && is_numeric($bt_no)) {					
			// 		$bt_no = $bt_no;
			// 	} else {
			// 		$bt_no = 1;
			// 	}

				// $diff_bags = ROUND($diff_weight/60);
				// $diff_pkts = ROUND($diff_weight%60);


				// $btid = Batch::insertGetId (
				// ['btc_number' => $bt_no, 'st_id' => $stid, 'btc_weight' => $diff_weight, 'btc_bags' => $diff_bags, 'btc_pockets' => $diff_pkts, 'otb_id' => $otbid, 'btc_prev_id' => $previd]);
				// Activity::log('Inserted Batch information with btid '.$btid. ' diff_weight '. $diff_weight. ' bags '. $diff_bags. ' pockets '. $diff_pkts. ' stid '. $stid);





		  //       $locrowdetails = Location::where('wr_id', $new_wr_id)->where('loc_row', $old_wr_row)->first(); 
		  //       $loccoldetails = Location::where('wr_id', $new_wr_id)->where('loc_column', $old_wr_col)->first(); 

		  //       // print_r($new_wr_id);

		  //       $locrowid = $locrowdetails->id;
		  //       $loccolid = $loccoldetails->id;


				// $stlocid = StockLocation::insertGetId (
				// ['bt_id' => $btid, 'loc_row_id' => $locrowid, 'loc_column_id' => $loccolid, 'btc_zone' => $zone]);
				// Activity::log('Inserted StockLocation information with bt_id '.$btid. ' locrowid '. $locrowid. ' loccolid '. $loccolid. ' zone '. $zone);

			// } 

			// $bt_no = Batch::orderBy('btc_number', 'desc')->pluck('btc_number');
			// foreach ($bt_no as $bt) {
			//     $bt_no = $bt;
			// }	
			// if ($bt_no != NULL && is_numeric($bt_no)) {					
			// 	$bt_no = $bt_no;
			// } else {
			// 	$bt_no = 1;
			// }

			// $batch_kilograms = Input::get('batch_kilograms');
			// $bags = ROUND($batch_kilograms/60);
			// $pockets = ROUND($batch_kilograms%60);

			// $btid = Batch::insertGetId (
			// ['btc_number' => $bt_no, 'st_id' => $stid, 'btc_weight' => $batch_kilograms, 'btc_bags' => $bags, 'btc_pockets' => $pockets, 'otb_id' => $otbid, 'btc_prev_id' => $previd]);
			// Activity::log('Inserted Batch information with btid '.$btid. ' diff_weight '. $batch_kilograms. ' bags '. $bags. ' pockets '. $pockets. ' stid '. $stid);	


			// // $new_wr_id = Warehouse::where('wr_name', $batchview_cf->new_wr_name)->first();	
			// // $new_wr_id = $new_wr_id->id;


	  //       $locrowdetails = Location::where('wr_id', $new_wr_id)->where('loc_row', $new_wr_row)->first(); 
	  //       $loccoldetails = Location::where('wr_id', $new_wr_id)->where('loc_column', $new_wr_col)->first(); 

	  //       $locrowid = $locrowdetails->id;
	  //       $loccolid = $loccoldetails->id;

			// $stlocid = StockLocation::insertGetId (
			// ['bt_id' => $btid, 'loc_row_id' => $locrowid, 'loc_column_id' => $loccolid, 'btc_zone' => $new_zone]);
			// Activity::log('Inserted StockLocation information with bt_id '.$btid. ' locrowid '. $locrowid. ' loccolid '. $loccolid. ' zone '. $new_zone);
		



 	 	
	  //    	 foreach ($batchlocation as $key => $value) {
	  //    	 	// $batchview_cf = BatchView::where('stid', $value)->get();
			// 	if ($batchview_cf != NULL) {

		 //     	 	foreach ($batchview_cf as $keybt => $valuebt) {
		 //     	 		// print_r($user."<br>");
		 //     	 		Batch::where('id', '=', $valuebt->id)
			// 				->update(['btc_ended_by' => $user]);
			// 		}

			// 	}
	 
	  //    	 }	    

			// $grnsview = GrnsView::where('stid', $stid)->first();
			// $grnsview = GrnsView::where('stid', $stid)->get();
			// $stlocdetails = NULL;
			// $stlocdetails = NULL;
   //  		$rw = Input::get('row');
   //  		$clm = Input::get('column');

	  //   	if (NULL != Input::get('warehouse') && NULL != Input::get('row') && NULL != Input::get('column') ) {
	  //   		$wrname = Warehouse::where('id', Input::get('warehouse'))->first();
	  //   		$wrname = $wrname->wr_name;

	  //   		$stlocdetails = StockLocationView::where('wr_name', $wrname)->where('loc_row', $rw)->where('loc_column', $clm)->whereNotNull('btc_instructed_by')->get();
	  //   	}
	    							
			return View::make('movementconfirmation', compact('id', 
				'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'Packaging', 'wrhse', 'location', 'rw', 'clm', 'grn_number', 'weighbridge_ticket', 'wbtk', 'rlno', 'ot_season', 'cdetails', 'grndetails', 'stdetails', 'grnsview', 'batchview', 'stlocdetails', 'new_wrhse', 'NewWarehouse', 'new_location'));	
    	
		}  else {
			$stlocdetails = NULL;
			$stlocdetails = NULL;

    		$rw = Input::get('row');
    		$clm = Input::get('column');

	    	if (NULL != Input::get('warehouse') && NULL != Input::get('row') && NULL != Input::get('column') ) {

	    		$wrname = Warehouse::where('id', Input::get('warehouse'))->first();
	    		$wrname = $wrname->wr_name;

	    		$stlocdetails = StockLocationView::where('wr_name', $wrname)->where('loc_row', $rw)->where('loc_column', $clm)->whereNotNull('btc_instructed_by')->get();
	    	}

			return View::make('movementconfirmation', compact('id', 
				'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'Packaging', 'wrhse', 'location', 'rw', 'clm', 'grn_number', 'weighbridge_ticket', 'wbtk', 'rlno', 'ot_season', 'cdetails', 'grndetails', 'stdetails', 'grnsview', 'batchview', 'stlocdetails', 'rw', 'clm', 'new_wrhse', 'NewWarehouse', 'new_location'));		
 	   }
    
 	}
	 public function confirmMovementWithRate($ref_no, $wrnameFrom, $service, $team){
		try{
			$user_data = Auth::user();
			$user      = $user_data->id;
		
				
		$weight_in=0;
		$StockView = StockLocationView::where('wrid', $wrnameFrom)->whereNotNull('btc_instructed_by')->where('insloc_ref',$ref_no)->get();
	
		$StockView=$StockView->toArray();
	
		foreach($StockView as $value){
			$cweight       = $value['btc_net_weight'];
			if ($cweight != null) {
				$weight_in += $cweight;
			}
			}
			
			$rate_details = processrates::where('id', '=', $service)->first();
			$rate=$rate_details->rate;
			$rateid=$rate_details->id;
			$servicename=$rate_details->service;
			$bagstopay  = ceil($weight_in / 60);
			$charge = $rate*$bagstopay;
			if($bagstopay!=0){
					
			//confirm instruction
			$instructedRefDetails = InstructedLocationRef::where('ilf_number', $ref_no)->first();
	
			if ($instructedRefDetails != null) {
				$instructionRefId = $instructedRefDetails->id;

				InstructedLocationRef::where('id', '=', $instructionRefId)
					->update(['confirmed_by' => $user]); 
				// $request->session()->flash('alert-success', 'Stock Information Updated!!');

				Activity::log('Updated InstructedLocationRef information with confirmed_by '.$user);
			}
			//get rate charges and insert team
			
			$processing_rate_details = processcharges::where('prcgs_instruction_no', $ref_no)->where('prcgs_rate_id', $service)->first();
	
			if ($processing_rate_details != null) {
				processcharges::where('prcgs_instruction_no', '=',  $ref_no)->where('prcgs_rate_id', $service)->update(['prcgs_rate_id' => $rateid, 'prcgs_service'=>$servicename, 'prcgs_rate'=>$rate, 'prcgs_total'=>$charge, 'prcgs_team_id'=>$team, 'bags'=>$bagstopay]);
	
				Activity::log('Updated process rate information for instruction ' . $ref_no . ' service ' . $servicename. ' team ' . $team. ' process charge ' . $charge. ' with rate ' . $rate. ' bags ' . $bagstopay. ' user ' .$user);
				
				return response()->json([
					'bagstopay' => $bagstopay,
					'rate' => $rate,
					'service' => $servicename,
					'charge' => $charge,
					'success' => true,
					'inserted' => false,
					'error' => null,
					'updated' => true
				]);
	
			} else {
				processcharges::insert(['prcgs_instruction_no'=>$ref_no,'prcgs_rate_id' => $rateid, 'prcgs_service'=>$servicename, 'prcgs_rate'=>$rate, 'prcgs_total'=>$charge, 'prcgs_team_id'=>$team, 'bags'=>$bagstopay]);
	
				Activity::log('Inserted process rate information for instruction ' . $ref_no . ' service ' . $servicename. ' team ' . $team. ' process charge ' . $charge. ' with rate ' . $rate. ' bags ' . $bagstopay. ' user ' .$user);
				
				return response()->json([
					'bagstopay' => $bagstopay,
					'rate' => $rate,
					'service' => $servicename,
					'charge' => $charge,
					'success' => true,
					'inserted' => true,
					'error' => null,
					'updated' => false
				]);
	
			}
			}else{
				return response()->json([
					'bagstopay' => $bagstopay,
					'rate' => $rate,
					'service' => $servicename,
					'charge' => $charge,
					'success' => true,
					'inserted' => true,
					'error' => null,
					'updated' => false
				]);
			}
		
		}catch (\PDOException $e) {
			return response()->json([
				'exists' => false,
				'inserted' => false,
				'error' => $e->getMessage()
			]);
		}
	}
	
	public function printMovementWithRate($ref_no, $wrnameFrom, $service, $team){
		
		$processing_rate_details = processcharges::where('prcgs_instruction_no', $ref_no)->where('prcgs_rate_id', $service)->first();
		$rate=$processing_rate_details->prcgs_rate;
		$servicename=$processing_rate_details->prcgs_service;
		$total=$processing_rate_details->prcgs_total;
		$ref_no=$processing_rate_details->prcgs_instruction_no;
		$team=$processing_rate_details->prcgs_team_id;
		$bagstopay=$processing_rate_details->bags;
		$date=$processing_rate_details->created_at;
	
		$team_details = teams::where('id', '=', $team)->first();
		$teamserviceprovider=$team_details->tms_serviceprovider;
		$teamgroup=$team_details->tms_grpname;
	
		
	
		$pdf = PDF::loadView('pdf.movementrate', compact('ref_no','servicename', 'bagstopay','total', 'rate', 'teamserviceprovider', 'teamgroup', 'date'));
				return $pdf->stream($ref_no .' '.$servicename. ' movementrate.pdf');
	}

}