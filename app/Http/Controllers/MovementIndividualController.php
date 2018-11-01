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

class MovementIndividualController extends Controller {

    public function movementIndividualForm (Request $request){

    	$id = NULL;

    	$Season = Season::all(['id', 'csn_season']);

    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);

    	$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);

    	$Certification = Certification::all(['id', 'crt_name']);

    	$buyer = buyer::all(['id', 'cb_name']);   	

		$rates = processrates::all(['id', 'service']);

        $teams = teams::all(['id', 'tms_grpname']);

        $warehouse = Warehouse::where('wrt_id', 1)->get();

    	$Mill = NULL;
    	
    	$cid = NULL;

    	$csn_season = NULL;

    	$sale_cb_id = NULL;

    	$trp = NULL;

    	$release_no = NULL;

    	$date = NULL;

    	$ref_no = $this->generateRef();

    	$timeout = $this->dialog_timeout;

		return View::make('movementindividual', compact('id', 
				'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'warehouse', 'saleid', 'rates', 'teams', 'ref_no', 'wrhse', 'location', 'timeout'));	

    }

    public function movementIndividual (Request $request){

    	$id = NULL;

    	$Season = Season::all(['id', 'csn_season']);

    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);

    	$CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);

    	$Certification = Certification::all(['id', 'crt_name']);

		$rates = processrates::all(['id', 'service']);

        $teams = teams::all(['id', 'tms_grpname']);

        $warehouse = Warehouse::where('wrt_id', 1)->get();

    	$Mill = NULL;
    	
    	$cid = NULL;

    	$csn_season = NULL;

    	$sale_cb_id = NULL;

    	$trp = NULL;

    	$release_no = NULL;

    	$date = NULL;

    	
    	
    	$wrhse = Input::get('warehouse'); 

    	$cid = Input::get('country'); 

    	$movementInstructionType = MovementInstructionType::all(['id', 'mit_name']);

    	$timeout = $this->dialog_timeout;

		if ($wrhse !== NULL) {

			$location = Location::where('agt_id', $wrhse)->get();	

		}

    	$ref_no = Input::get('ref_no'); 

    	if ($ref_no == null) {

    		$ref_no = $this->generateRef();

    	}

		

		$rates    = processrates::all(['id', 'service']);

		$teams   = teams::all(['id', 'tms_grpname']);   	

		$selectedMovementType = Input::get('MovementType');

		$sif_lot = Input::get('sif_lot');

		$outt_number = Input::get('outt_number');

		$btdetails = NULL;

		$season_name = NULL;

    	$country = country::all(['id', 'ctr_name', 'ctr_initial']);

        $user_data = Auth::user();

        $user = $user_data ->id;



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

    
			$stlocdetails = NULL;
			$stlocdetails = NULL;
    		$rw = Input::get('row');
    		$clm = Input::get('column');

	    	if (NULL != Input::get('warehouse')) {
	    		$wrname = Warehouse::where('id', Input::get('warehouse'))->first();
	    		$wrname = $wrname->wr_name;

	    		$stlocdetails = StockLocationView::where('insloc_ref', $ref_no)->get();
	    	}

	    	$instructedRefDetails = InstructedLocationRef::where('ilf_number', $ref_no)->first();

			return View::make('movementindividual', compact('id', 
				'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'Packaging', 'wrhse', 'location', 'rw', 'clm', 'grn_number', 'weighbridge_ticket', 'wbtk', 'rlno', 'ot_season', 'cdetails', 'grndetails', 'stdetails', 'grnsview', 'batchview', 'stlocdetails', 'new_wrhse', 'NewWarehouse', 'new_location', 'ref_no', 'movementInstructionType', 'instructedRefDetails', 'rates', 'teams', 'timeout'));	
	    	
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

	    		$stlocdetails = StockLocationView::where('insloc_ref', $ref_no)->get();
	    	}

	    	$instructedRefDetails = InstructedLocationRef::where('ilf_number', $ref_no)->first();
		    
			return View::make('movementindividual', compact('id', 
				'Season', 'country', 'cid', 'csn_season', 'sale','CoffeeGrade', 'warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'Packaging', 'wrhse', 'location', 'rw', 'clm', 'grn_number', 'weighbridge_ticket', 'wbtk', 'rlno', 'ot_season', 'cdetails', 'grndetails', 'stdetails', 'grnsview', 'batchview', 'stlocdetails', 'new_wrhse', 'NewWarehouse', 'new_location', 'ref_no', 'movementInstructionType', 'instructedRefDetails', 'rates', 'teams', 'timeout'));		    	

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
	    		$stlocdetails = StockLocationView::where('insloc_ref', $ref_no)->get();
	    	}

	    	$instructedRefDetails = InstructedLocationRef::where('ilf_number', $ref_no)->first();
	
 	   	}

		return View::make('movementindividual', compact('id', 
				'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'warehouse', 'saleid', 'rates', 'teams', 'ref_no', 'wrhse', 'location', 'movementInstructionType', 'timeout', 'stlocdetails', 'timeout', 'instructedRefDetails'));	

 	}

    public function getLots($countryID, $warehouse, $new_row, $new_column, $ref_no)
    {	

		if (NULL != $warehouse) {

			$stlocdetails = StockLocationView::where('wrid', $warehouse)->where('loc_rowid', $new_row)->where('loc_columnid', $new_column)->where('insloc_ref', $ref_no)->orWhereNull('insloc_ref')->where('wrid', $warehouse)->where('loc_rowid', $new_row)->where('loc_columnid', $new_column)->orderBY('btc_zone',' desc')->orderBY('grade',' desc')->get();
		}


		return json_encode($stlocdetails);

    }


    public function addLots($movement, $ref_no, $movementType, $reasonForMovement)
    {	

        try{

	    	$movement = json_decode($movement);

			$instructedRefDetails = InstructedLocationRef::where('ilf_number', $ref_no)->first();

			$instructionRefId = null;

	        $user_data = Auth::user();

	        $user = $user_data ->id;				

            if ($instructedRefDetails != null) {

                $instructionRefId = $instructedRefDetails->id;

                InstructedLocationRef::where('id', '=', $instructionRefId)
                    ->update(['ilf_number' => $ref_no, 'ilf_reason' => $reasonForMovement,  'mit_id' => $movementType]);

                Activity::log('Updated InstructedLocationRef information with ref_no '.$ref_no. ' reasonForMovement '. NULL. ' selectedMovementType '. $movementType);

            } else {

				$instructionRefId = InstructedLocationRef::insertGetId (
				['ilf_number' => $ref_no, 'ilf_reason' => $reasonForMovement,  'mit_id' => $movementType]);

				Activity::log('Inserted InstructedLocationRef information with ref_no '.$ref_no. ' reasonForMovement '. NULL . ' selectedMovementType '. $movementType);
            }

            if ($movement != null) {

				foreach ($movement as $key => $value) {


					$id = substr( $value, 0, strrpos( $value, '-' ) );

					$weight = substr($value, strpos($value, "-") + 1);   

					$batchview_cf = BatchView::where('id', $id)->get();			      

			        foreach ($batchview_cf as $keybt => $valuebt) {

						$btid = $valuebt->id;
						
						$instructed_weight = $weight;

						Batch::where('id', '=', $btid)
							->update(['btc_instructed_by' => $user]);	

						$stlocid = InstructedStockLocation::insertGetId (
						['bt_id' => $btid, 'ilf_id' => $instructionRefId, 'loc_row_id' => NULL, 'loc_column_id' => NULL, 'btc_zone' => NULL, 'insloc_reason' => $reasonForMovement, 'insloc_ref' => $ref_no, 'insloc_weight' => $instructed_weight,  'mit_id' => $movementType]);
			        }				
				}
			}

            return response()->json([
                'exists' => false,
                'inserted' => true,
                'error' => 'null'
            ]);


        } catch (\PDOException $e) {
            return response()->json([
                'exists' => false,
                'inserted' => false,
                'error' => $e->getMessage()
            ]);
        }


    }

}