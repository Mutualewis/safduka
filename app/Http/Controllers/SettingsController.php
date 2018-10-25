<?php namespace Ngea\Http\Controllers;

use Input;
use confirm;
use DB;
use ask;
use Illuminate\Http\Request;
use Ngea\Client;
use Ngea\FOB;
use Ngea\group_menu;
use Ngea\Http\Controllers\Controller;
use Ngea\MovementInstructionType;
use Ngea\Packaging;
use Ngea\Process;
use Ngea\transporters;
use View;

use Ngea\Parchment;
use Ngea\ParchmentType;
use Ngea\Growers;
use Ngea\coffeegrower;
use Ngea\growertype;
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
use Ngea\coffee_details;
use Ngea\SaleableStatus;
use Ngea\cleancoffee;
use Ngea\grower_certifications;

use Ngea\coffeewarrant;
use Ngea\buyer;
use Ngea\buyertype;
use Ngea\saleinfo;
use Ngea\SaleType;
use Ngea\Sale;
use Ngea\Role;

use  Ngea\Warehouse;
use  Ngea\Region;
use Yajra\Datatables\Datatables;

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
use Auth;
// use Anouar\Fpdf\Fpdf as Fpdf;

use Ngea\country;
use Ngea\county;


use Ngea\booking;
use Ngea\booking_with_names;
use Ngea\booking_items;
use Ngea\booking_items_with_names;
use Ngea\trading_months;
use Ngea\Mill;
use Ngea\mills_region;
use Ngea\warehouses_region;
use Ngea\Certification;
use Ngea\department;
use Ngea\coffee_certification;
use Ngea\seller;
use Ngea\sale_lots;
use Ngea\quality_groups;
use Ngea\quality_parameters;
use Ngea\processing;
use Ngea\processing_instruction_pri;
use Ngea\processing_groups;
use Ngea\processingresulttype;
use Ngea\Provisonal_Purpose;
use Ngea\screens;
use Ngea\Years;
use Ngea\cupscore;
use Ngea\rawscore;
use Ngea\quality_details;

use Ngea\greencomments;
use Ngea\direct_sale;
use Ngea\sale_status;
use Ngea\basket;
use Ngea\InternalBaskets;
use Ngea\purchase;
use Ngea\Menu;

use delete;

use Ngea\BagSizes;
use Ngea\PriceUnits;
use Ngea\PriceType;
use Ngea\CallFrom;
use Ngea\ContractUpdates;

class SettingsController extends Controller {

    public function settingsCountryForm (Request $request){
    	$id = null;
    	
    	$country = country::all(['id', 'ctr_name', 'ctr_initial', 'ctr_is_active']);

    	return View::make('settingscountry', compact('id', 'country'));
    }

    public function settingsCountry (Request $request){
    	$id = null;

    	$country_selected = Input::get('country');

    	$initials = Input::get('initials');

    	$isActive = Input::get('isActive');

        $user_data = Auth::user();
      
        $user = $user_data->id;

    	if ($isActive != null) {
			country::whereNotNull('ctr_is_active')
                    ->update(['ctr_is_active' => null]);   
    	}


    	if (null !== Input::get('submit')) {
    		$country_details = country::where('ctr_name', $country_selected)->first();  

    		if ($country_details != null) {
    			country::where('id', '=', $country_details->id)
                    ->update(['ctr_initial' => $initials, 'ctr_is_active' => $isActive]);   

                Activity::log('Updated country information for country ' . $country_selected . ' initials ' . $initials . ' isActive ' . $isActive . ' User '. $user);

    		} else {
				country::insert(['ctr_name' => $country_selected, 'ctr_initial' => $initials, 'ctr_is_active' => $isActive]);

				Activity::log('Inserted country information for country ' . $country_selected . ' initials ' . $initials . ' isActive ' . $isActive . ' User '. $user);

    		}

    	}



    	$country = country::all(['id', 'ctr_name', 'ctr_initial', 'ctr_is_active']);

    	return View::make('settingscountry', compact('id', 'country'));
    }


	public function country_delete($id)
	{
	    $user_data = Auth::user();

        $user = $user_data->id;
        try{
		$country_details = country::findOrFail($id);  
		if ($country_details) {
		    $country=$country_details->ctr_name;
	    	$country_details->delete();
            Activity::log('Deleted country information for country ' . $country. ' User '. $user);
            return response()->json([
                'deletable' => true,
                'error' => null
            ]);

		}else{
            return response()->json([
                'deletable' => false,
                'error' => '404'
            ]);
        }
        }catch (\PDOException $e) {
            return response()->json([
                'deletable' => false,
                'error' => $e->getMessage()
            ]);
        }
    }
    
    public function country_edit($id)
	{
	    $user_data = Auth::user();

        $user = $user_data->id;
        try{
		$country_details = country::findOrFail($id);  
		if ($country_details) {
		    $country=$country_details->ctr_name;
            Activity::log('Requested country information for country ' . $country. ' User '. $user);
            return response()->json([
                'data' => $country_details->toJson(),
                'found' => true,
                'error' => null
            ]);

		}else{
            return response()->json([
                'found' => false,
                'error' => '404'
            ]);
        }
        }catch (\PDOException $e) {
            return response()->json([
                'found' => false,
                'error' => $e->getMessage()
            ]);
        }
	}

	//region
    public function settingsRegionForm (Request $request){
        $id = null;

        $country = country::all(['id', 'ctr_name', 'ctr_initial', 'ctr_is_active']);
        $region= DB::table('region_rgn')
            ->select('region_rgn.id as id','rgn_name', 'rgn_description', 'ctr_name', 'ctr_initial')
            ->leftJoin('country_ctr', 'country_ctr.id', '=', 'region_rgn.ctr_id')
            ->orderBy('region_rgn.created_at', 'desc')
            ->get();

        return View::make('settingsregion', compact('id', 'country','region'));
    }

    public function settingsRegion (Request $request){
        $this->validate($request, [
            'country' => 'required',  'region' => 'required',
        ]);
        $id = null;

        $country_selected = Input::get('country');

        $rgn_name = Input::get('region');

        $rgn_description = Input::get('description');

        $user_data = Auth::user();

        $user = $user_data->id;



        if (null !== Input::get('submit')) {
            $region_details = Region::where('rgn_name', $rgn_name)->first();

            if ($region_details != null) {
                Region::where('id', '=',  $region_details->id)
                    ->update(['rgn_description' => $rgn_description, 'ctr_id' => $country_selected]);

                Activity::log('Updated region information for region ' . $rgn_name . ' rgn_description ' . $rgn_description . ' country ' . $country_selected . ' User '. $user);

            } else {
                Region::insert(['rgn_name' => $rgn_name, 'rgn_description' => $rgn_description, 'ctr_id' => $country_selected]);

                Activity::log('Inserted region information for region ' . $rgn_name . ' rgn_description ' . $rgn_description . ' ctr_id ' . $country_selected . ' User '. $user);

            }

        }



        $id = null;

        $country = country::all(['id', 'ctr_name', 'ctr_initial', 'ctr_is_active']);
        $region= DB::table('region_rgn')
            ->select('region_rgn.id as id','rgn_name', 'rgn_description', 'ctr_name', 'ctr_initial')
            ->leftJoin('country_ctr', 'country_ctr.id', '=', 'region_rgn.ctr_id')
            ->orderBy('region_rgn.created_at', 'desc')
            ->get();

        return View::make('settingsregion', compact('id', 'country','region'));
    }


    public function region_delete($id)
    {

        $region_details = Region::findOrFail($id);
        if ($region_details) {
            $warehouses = Warehouse::select('*')->where('rgn_id', $id);
            $warehouses->delete();
            $rgn_name=$region_details->rgn_name;
            $region_details->delete();
            Activity::log('Deleted region information for region ' . $rgn_name. ' User '. $user);
        }

        $region= DB::table('region_rgn')
            ->select('region_rgn.id as id','rgn_name', 'rgn_description', 'ctr_name', 'ctr_initial')
            ->leftJoin('country_ctr', 'country_ctr.id', '=', 'region_rgn.ctr_id')
            ->orderBy('region_rgn.created_at', 'desc')
            ->get();

        //return View::make('settingsregion', compact('id', 'country','region'));
        return View::make('settingsregion', compact('id', 'country','region'));
    }
    public function region_edit($id)
	{
	    $user_data = Auth::user();

        $user = $user_data->id;
        try{
		$region_details = Region::findOrFail($id);  
		if ($region_details) {
		    $rgn_name=$region_details->rgn_name;
            Activity::log('Requested region information for region ' . $rgn_name. ' User '. $user);
            return response()->json([
                'data' => $region_details->toJson(),
                'found' => true,
                'error' => null
            ]);

		}else{
            return response()->json([
                'found' => false,
                'error' => '404'
            ]);
        }
        }catch (\PDOException $e) {
            return response()->json([
                'found' => false,
                'error' => $e->getMessage()
            ]);
        }
	}

    public function getWarehouses($regionID)
    {
        if ($regionID != null) {

            $warehouses = Warehouse::select('*')->where('rgn_id', $regionID);
        } else {
            $warehouses = null;
        }


        return Datatables::of($warehouses)
            ->make(true);
    }

    //warehouse
    public function settingsWarehouseForm (Request $request){
        $id = null;

        $country = country::all(['id', 'ctr_name', 'ctr_initial', 'ctr_is_active']);
        $region = Region::all(['id', 'rgn_name', 'rgn_description']);
        $warehousetypes= DB::table('warehoue_type_wrt AS wrt')
            ->select('wrt.id as id','wrt_name')
            ->orderBy('wrt.created_at', 'desc')
            ->get();
        $warehouse= DB::table('warehouse_wr AS wr')
            ->select('wr.id as id','wr_name', 'wr_initials', 'wr_description', 'rgn_name')
            ->leftJoin('region_rgn AS rgn', 'rgn.id', '=', 'wr.rgn_id')
            ->orderBy('wr.created_at', 'desc')
            ->get();

        return View::make('settingswarehouse', compact('id', 'country','region', 'warehouse', 'warehousetypes'));
    }

    public function settingsWarehouse (Request $request){
        $this->validate($request, [
            'warehousetype' => 'required',  'region' => 'required',  'warehouse' => 'required',
        ]);
        $id = null;

        $region = Input::get('region');

        $wr_name = Input::get('warehouse');

        $warehousetype = Input::get('warehousetype');

        $wr_description = Input::get('description');

        $wr_initials = Input::get('initials');

        $user_data = Auth::user();

        $user = $user_data->id;



        if (null !== Input::get('submit')) {
            $warehouse_details = Warehouse::where('wr_name', $wr_name)->first();

            if ($warehouse_details != null) {
                Warehouse::where('id', '=',  $warehouse_details->id)
                    ->update(['wr_description' => $wr_description, 'rgn_id' => $region, 'wr_initials' => $wr_initials, 'wrt_id' => $warehousetype]);

                Activity::log('Updated warehouse information for warehouse ' . $wr_name . ' wr_description ' . $wr_description . ' region ' . $region . ' User '. $user);

            } else {
                Warehouse::insert(['wr_name' => $wr_name, 'wr_description' => $wr_description, 'rgn_id' => $region, 'wr_initials' => $wr_initials, 'wrt_id' => $warehousetype]);

                Activity::log('Inserted warehouse information for warehouse ' . $wr_name . ' wr_description ' . $wr_description . ' region ' . $region . ' User '. $user);

            }

        }

        return redirect()->action(
            'SettingsController@settingsWarehouseForm'
        );
    }


    public function warehouse_delete($id)
    {
        $user_data = Auth::user();

        $user = $user_data->id;
        try{
            $warehouse_details = Warehouse::findOrFail($id);
            if ($warehouse_details) {
                $warehouse=$warehouse_details->wr_name;
                $warehouse_details->delete();
                Activity::log('Deleted warehouse information for warehouse ' . $warehouse. ' User '. $user);
                return response()->json([
                    'deletable' => true,
                    'error' => null
                ]);

            }else{
                return response()->json([
                    'deletable' => false,
                    'error' => '404'
                ]);
            }
        }catch (\PDOException $e) {
            return response()->json([
                'deletable' => false,
                'error' => $e->getMessage()
            ]);
        }
    }
    public function warehouse_edit($id)
	{
	    $user_data = Auth::user();

        $user = $user_data->id;
        try{
            $warehouse_details = Warehouse::findOrFail($id);
            if ($warehouse_details) {
                $warehouse=$warehouse_details->wr_name;
            return response()->json([
                'data' => $warehouse_details->toJson(),
                'found' => true,
                'error' => null
            ]);

		}else{
            return response()->json([
                'found' => false,
                'error' => '404'
            ]);
        }
        }catch (\PDOException $e) {
            return response()->json([
                'found' => false,
                'error' => $e->getMessage()
            ]);
        }
	}
    public function settingsGradeForm (Request $request){
        $id = null;

        $country = country::all(['id', 'ctr_name', 'ctr_initial', 'ctr_is_active']);
        $grades= DB::table('coffee_grade_cgrad AS cgrad')
            ->select('cgrad.id as id','cgrad_name', 'ctr_name', 'ctr_initial')
            ->leftJoin('country_ctr', 'country_ctr.id', '=', 'cgrad.ctr_id')
            ->orderBy('cgrad.cgrad_date_added', 'desc')
            ->get();

        return View::make('settingsgrade', compact('id', 'country','grades'));
    }

    public function settingsGrade (Request $request){
        $this->validate($request, [
            'country' => 'required',  'grade' => 'required',
        ]);
        $id = null;

        $country_selected = Input::get('country');

        $cgrade_name = Input::get('grade');

        $user_data = Auth::user();

        $user = $user_data->id;



        if (null !== Input::get('submit')) {
            $grade_details = CoffeeGrade::where('cgrad_name', $cgrade_name)->first();

            if ($grade_details != null) {
                CoffeeGrade::where('id', '=',  $grade_details->id)
                    ->update(['ctr_id' => $country_selected]);

                Activity::log('Updated grade information for grade ' . $cgrade_name . ' country ' . $country_selected . ' User '. $user);

            } else {
                $cg_id=CoffeeGrade ::orderBy('id', 'desc')->first();
                $cg_id=$cg_id->id;
                $cg_id=$cg_id+1;
                CoffeeGrade::insert(['id'=>$cg_id,'cgrad_name' => $cgrade_name, 'ctr_id' => $country_selected]);

                Activity::log('Inserted grade information for grade ' . $cgrade_name . ' ctr_id ' . $country_selected . ' User '. $user);

            }

        }


        return redirect()->action(
            'SettingsController@settingsGradeForm'
        );
    }


    public function grade_delete($id)
    { 
	    $user_data = Auth::user();

        $user = $user_data->id;
        $grade_details = CoffeeGrade::findOrFail($id);
        if ($grade_details) {
            $cgrade_name=$grade_details->cgrad_name;
            $grade_details->delete();
            Activity::log('Deleted grade information for grade, User '. $user);
        }

        $id = null;

        return redirect()->action(
            'SettingsController@settingsGradeForm'
        );
    }

    public function grade_edit($id)
	{
	    $user_data = Auth::user();

        $user = $user_data->id;
        try{
           
        $grade_details = CoffeeGrade::findOrFail($id);
        if ($grade_details) {
            return response()->json([
                'data' => $grade_details->toJson(),
                'found' => true,
                'error' => null
            ]);

		}else{
            return response()->json([
                'found' => false,
                'error' => '404'
            ]);
        }
        }catch (\PDOException $e) {
            return response()->json([
                'found' => false,
                'error' => $e->getMessage()
            ]);
        }
	}
    public function getCoffeeGradeDetails($gradeID)
    {
        if ($gradeID != null) {

            $count = coffee_details::select('*')->where('cgrad_id', $gradeID)->count();
            if ($count==0){
                return response()->json([
                    'deletable' => true,
                ]);
            }else{
                return response()->json([
                    'deletable' => false,
                ]);
            }
            }

        return response()->json([
            'error' => 'Grade is required',
        ]);
    }

    //quality
    public function settingsQualityForm (Request $request){
        $id = null;

        $qualitygroups = quality_groups::all(['id', 'qg_name', 'qg_remarks']);
        $qualityparameters= DB::table('quality_parameters_qp AS qp')
            ->select('qp.id as id','qg.qg_name AS qg_name', 'qp.qp_parameter', 'qp.qp_description')
            ->leftJoin('quality_groups_qg AS qg', 'qp.qg_id', '=', 'qg.id')
            ->orderBy('qp.created_at', 'desc')
            ->get();

        return View::make('settingsquality', compact('id', 'qualitygroups','qualityparameters'));
    }

    public function settingsQuality (Request $request){
        $this->validate($request, [
            'qualitygroup' => 'required',  'qualityparameter' => 'required'
        ]);
        $id = null;

        $qualitygroup = Input::get('qualitygroup');

        $qualityparameter = Input::get('qualityparameter');

        $qp_description = Input::get('description');


        $user_data = Auth::user();

        $user = $user_data->id;



        if (null !== Input::get('submit')) {
            $parameter_details = quality_parameters::where('qp_parameter', $qualityparameter)->first();

            if ($parameter_details != null) {
                quality_parameters::where('id', '=',  $parameter_details->id)
                    ->update(['qp_description' => $qp_description, 'qg_id' => $qualitygroup]);

                Activity::log('Updated quality parameters information for parameter ' . $qualityparameter . ' parameter_description ' . $qp_description . ' qualitygroup ' . $qualitygroup . ' User '. $user);

            } else {
                quality_parameters::insert(['qp_parameter'=>$qualityparameter,'qp_description' => $qp_description, 'qg_id' => $qualitygroup]);;

                Activity::log('Inserted quality parameters information for parameter ' . $qualityparameter . ' parameter_description ' . $qp_description . ' qualitygroup ' . $qualitygroup . ' User '. $user);

            }

        }

        $id = null;

        $qualitygroups = quality_groups::all(['id', 'qg_name', 'qg_remarks']);
        $qualityparameters= DB::table('quality_parameters_qp AS qp')
            ->select('qp.id as id','qg.qg_name AS qg_name', 'qp.qp_parameter', 'qp.qp_description')
            ->leftJoin('quality_groups_qg AS qg', 'qp.qg_id', '=', 'qg.id')
            ->orderBy('qp.created_at', 'desc')
            ->get();

        return View::make('settingsquality', compact('id', 'qualitygroups','qualityparameters'));
    }


    public function quality_delete($id)
    {
        $user_data = Auth::user();

        $user = $user_data->id;
        try{
            $parameter_details = quality_parameters::findOrFail($id);
            if ($parameter_details) {
                $parameter=$parameter_details->qp_parameter;
                $parameter_details->delete();
                Activity::log('Deleted quality paramater information for parameter ' . $parameter. ' User '. $user);
                return response()->json([
                    'deletable' => true,
                    'error' => null
                ]);

            }else{
                return response()->json([
                    'deletable' => false,
                    'error' => '404'
                ]);
            }
        }catch (\PDOException $e) {
            return response()->json([
                'deletable' => false,
                'error' => $e->getMessage()
            ]);
        }
    }
    public function quality_edit($id)
	{
	    $user_data = Auth::user();

        $user = $user_data->id;
        try{
           
            $parameter_details = quality_parameters::findOrFail($id);
            if ($parameter_details) {
            return response()->json([
                'data' => $parameter_details->toJson(),
                'found' => true,
                'error' => null
            ]);

		}else{
            return response()->json([
                'found' => false,
                'error' => '404'
            ]);
        }
        }catch (\PDOException $e) {
            return response()->json([
                'found' => false,
                'error' => $e->getMessage()
            ]);
        }
	}
    //cup
    public function settingsCupForm (Request $request){
        $id = null;
        $country = country::all(['id', 'ctr_name', 'ctr_initial', 'ctr_is_active']);
        $cupscore= DB::table('cup_score_cp AS cp')
            ->select('cp.id as id','cp.cp_score', 'cp.cp_qualification', 'cp.cp_description', 'ctr.ctr_name')
            ->leftJoin('country_ctr AS ctr', 'ctr.id', '=', 'cp.ctr_id')
            ->orderBy('cp.created_at', 'desc')
            ->get();

        return View::make('settingscup', compact('id', 'country','cupscore'));
    }

    public function settingsCup (Request $request){
        $this->validate($request, [
            'country' => 'required',  'cupscore' => 'required',  'qualification' => 'required',  'description' => 'required'
        ]);
        $id = null;

        $country = Input::get('country');
        $cupscore = Input::get('cupscore');
        $qualification = Input::get('qualification');
        $description = Input::get('description');

        $user_data = Auth::user();

        $user = $user_data->id;



        if (null !== Input::get('submit')) {
            $cupscore_details = cupscore::where('cp_score', $cupscore)->first();

            if ($cupscore_details != null) {
                cupscore::where('id', '=',  $cupscore_details->id)
                    ->update(['cp_description' => $description, 'cp_qualification' => $qualification, 'ctr_id' => $country]);

                Activity::log('Updated cup score information for cupscore ' . $cupscore . ' cup description ' . $description . ' cup qualification ' . $qualification . ' User '. $user);

            } else {
                cupscore::insert(['cp_description' => $description, 'cp_qualification' => $qualification, 'ctr_id' => $country, 'cp_score'=> $cupscore]);

                Activity::log('Inserted cup score information for cupscore ' . $cupscore . ' cup description ' . $description . ' cup qualification ' . $qualification . ' User '. $user);

            }

        }

        return redirect()->action(
            'SettingsController@settingsCupForm'
        );
    }


    public function cup_delete($id)
    {
        $user_data = Auth::user();

        $user = $user_data->id;
        try{
            $cupscore_details = cupscore::findOrFail($id);
            if ($cupscore_details) {
                $cup=$cupscore_details->cp_score;
                $cupscore_details->delete();
                Activity::log('Deleted cup score information for cup score ' . $cup. ' User '. $user);
                return response()->json([
                    'deletable' => true,
                    'error' => null
                ]);

            }else{
                return response()->json([
                    'deletable' => false,
                    'error' => '404'
                ]);
            }
        }catch (\PDOException $e) {
            return response()->json([
                'deletable' => false,
                'error' => $e->getMessage()
            ]);
        }
    }
    public function cup_edit($id)
	{
	    $user_data = Auth::user();

        $user = $user_data->id;
        try{
           
            $cupscore_details = cupscore::findOrFail($id);
            if ($cupscore_details) {
            return response()->json([
                'data' => $cupscore_details->toJson(),
                'found' => true,
                'error' => null
            ]);

		}else{
            return response()->json([
                'found' => false,
                'error' => '404'
            ]);
        }
        }catch (\PDOException $e) {
            return response()->json([
                'found' => false,
                'error' => $e->getMessage()
            ]);
        }
	}
    //raw
    public function settingsRawForm (Request $request){
        $id = null;
        $country = country::all(['id', 'ctr_name', 'ctr_initial', 'ctr_is_active']);
        $rawscore= DB::table('raw_score_rw AS rw')
            ->select('rw.id as id','rw.rw_score','rw.rw_quality', 'rw.rw_qualification', 'rw.rw_description', 'ctr.ctr_name')
            ->leftJoin('country_ctr AS ctr', 'ctr.id', '=', 'rw.ctr_id')
            ->orderBy('rw.created_at', 'desc')
            ->get();

        return View::make('settingsraw', compact('id', 'country','rawscore'));
    }

    public function settingsRaw (Request $request){
        $this->validate($request, [
            'country' => 'required',  'rawscore' => 'required',  'qualification' => 'required',  'description' => 'required'
        ]);
        $id = null;

        $country = Input::get('country');
        $rawscore = Input::get('rawscore');
        $quality = Input::get('quality');
        $qualification = Input::get('qualification');
        $description = Input::get('description');

        $user_data = Auth::user();

        $user = $user_data->id;



        if (null !== Input::get('submit')) {
            $rawscore_details = rawscore::where('rw_score', $rawscore)->first();

            if ($rawscore_details != null) {
                rawscore::where('id', '=',  $rawscore_details->id)
                    ->update(['rw_quality' => $quality, 'rw_description' => $description, 'rw_qualification' => $qualification, 'ctr_id' => $country]);

                Activity::log('Updated raw score information for rawscore ' . $rawscore . ' cup description ' . $description . ' raw qualification ' . $qualification . ' User '. $user);

            } else {
                rawscore::insert(['rw_quality' => $quality, 'rw_description' => $description, 'rw_qualification' => $qualification, 'ctr_id' => $country, 'rw_score'=> $rawscore]);

                Activity::log('Inserted raw score information for rawscore ' . $rawscore . ' cup description ' . $description . ' raw qualification ' . $qualification . ' User '. $user);

            }

        }

        return redirect()->action(
            'SettingsController@settingsRawForm'
        );
    }


    public function raw_delete($id)
    {
        $user_data = Auth::user();

        $user = $user_data->id;
        try{
            $rawscore_details = rawscore::findOrFail($id);
            if ($rawscore_details) {
                $raw=$rawscore_details->cp_score;
                $rawscore_details->delete();
                Activity::log('Deleted raw score information for raw score ' . $raw. ' User '. $user);
                return response()->json([
                    'deletable' => true,
                    'error' => null
                ]);

            }else{
                return response()->json([
                    'deletable' => false,
                    'error' => '404'
                ]);
            }
        }catch (\PDOException $e) {
            return response()->json([
                'deletable' => false,
                'error' => $e->getMessage()
            ]);
        }
    }
    public function raw_edit($id)
	{
	    $user_data = Auth::user();

        $user = $user_data->id;
        try{
            $rawscore_details = rawscore::findOrFail($id);
            if ($rawscore_details) {
            return response()->json([
                'data' => $rawscore_details->toJson(),
                'found' => true,
                'error' => null
            ]);

		}else{
            return response()->json([
                'found' => false,
                'error' => '404'
            ]);
        }
        }catch (\PDOException $e) {
            return response()->json([
                'found' => false,
                'error' => $e->getMessage()
            ]);
        }
	}
    //screens
    public function settingsScreenForm (Request $request){
        $id = null;
        $screens = screens::all(['id', 'scr_name', 'scr_description'])->sortByDesc('id');
        return View::make('settingsscreens', compact('id','screens'));
    }

    public function settingsScreen (Request $request){
        $this->validate($request, [
            'screen' => 'required', 'description' => 'required'
        ]);
        $id = null;

        $screen = Input::get('screen');
        $description = Input::get('description');

        $user_data = Auth::user();

        $user = $user_data->id;


        if (null !== Input::get('submit')) {
            $screen_details = screens::where('scr_name', $screen)->first();

            if ($screen_details != null) {
                screens::where('id', '=', $screen_details->id)
                    ->update(['scr_description' => $description]);
            }else{
                screens::insert(['scr_name' => $screen, 'scr_description' => $description]);

                Activity::log('Inserted screen information for screen ' . $screen . ' screen description ' . $description . ' user ' .$user);

            }

        }

        return redirect()->action(
            'SettingsController@settingsScreenForm'
        );
    }


    public function screen_delete($id)
    {
        $user_data = Auth::user();

        $user = $user_data->id;
        try{
            $screen_details = screens::findOrFail($id);
            if ($screen_details) {
                $screen=$screen_details->scr_name;
                $screen_details->delete();
                Activity::log('Deleted screen information for screen ' . $screen. ' User '. $user);
                return response()->json([
                    'deletable' => true,
                    'error' => null
                ]);

            }else{
                return response()->json([
                    'deletable' => false,
                    'error' => '404'
                ]);
            }
        }catch (\PDOException $e) {
            return response()->json([
                'deletable' => false,
                'error' => $e->getMessage()
            ]);
        }
    }
    public function screen_edit($id)
	{
	    $user_data = Auth::user();

        $user = $user_data->id;
        try{
            $screen_details = screens::findOrFail($id);
            if ($screen_details) {
            return response()->json([
                'data' => $screen_details->toJson(),
                'found' => true,
                'error' => null
            ]);

		}else{
            return response()->json([
                'found' => false,
                'error' => '404'
            ]);
        }
        }catch (\PDOException $e) {
            return response()->json([
                'found' => false,
                'error' => $e->getMessage()
            ]);
        }
	}
    //basket
    public function settingsBasketForm (Request $request){
        $id = null;
        $baskets = basket::all(['id', 'bs_code', 'bs_quality'])->sortByDesc('id');
        return View::make('settingsbasket', compact('id','baskets'));
    }

    public function settingsBasket (Request $request){
        $this->validate($request, [
            'bscode' => 'required', 'quality' => 'required'
        ]);
        $id = null;

        $bscode = Input::get('bscode');
        $quality = Input::get('quality');
        $description = Input::get('description');

        $user_data = Auth::user();

        $user = $user_data->id;



        if (null !== Input::get('submit')) {
            $basket_details = basket::where('bs_code', $bscode)->first();

            if ($basket_details != null) {
                basket::where('id', '=',  $basket_details->id)
                    ->update(['bs_description' => $description,'bs_quality' => $quality]);

                Activity::log('Updated quality information for basket ' . $bscode . ' screen description ' . $description. ' user ' .$user);

            } else {
                basket::insert(['bs_code' => $bscode, 'bs_quality' => $quality, 'bs_description' => $description]);

                Activity::log('Inserted basket information for basket ' . $bscode . ' basket description ' . $description . ' user ' .$user);

            }

        }

        return redirect()->action(
            'SettingsController@settingsBasketForm'
        );
    }


    public function basket_delete($id)
    {
        $user_data = Auth::user();

        $user = $user_data->id;
        try{
            $basket_details = basket::findOrFail($id);
            if ($basket_details) {
                $basket=$basket_details->bs_code;
                $basket_details->delete();
                Activity::log('Deleted basket information for basket ' . $basket. ' User '. $user);
                return response()->json([
                    'deletable' => true,
                    'error' => null
                ]);

            }else{
                return response()->json([
                    'deletable' => false,
                    'error' => '404'
                ]);
            }
        }catch (\PDOException $e) {
            return response()->json([
                'deletable' => false,
                'error' => $e->getMessage()
            ]);
        }
    }
    public function basket_edit($id)
	{
	    $user_data = Auth::user();

        $user = $user_data->id;
        try{
            $basket_details = basket::findOrFail($id);
            if ($basket_details) {
            return response()->json([
                'data' => $basket_details->toJson(),
                'found' => true,
                'error' => null
            ]);

		}else{
            return response()->json([
                'found' => false,
                'error' => '404'
            ]);
        }
        }catch (\PDOException $e) {
            return response()->json([
                'found' => false,
                'error' => $e->getMessage()
            ]);
        }
	}
    //certification
    public function settingsCertificationForm (Request $request){
        $id = null;
        $certifications = Certification::all(['id', 'crt_name', 'crt_description'])->sortByDesc('id');
        return View::make('settingscertifications', compact('id','certifications'));
    }

    public function settingsCertification (Request $request){
        $this->validate($request, [
            'crt_name' => 'required', 'description' => 'required'
        ]);
        $id = null;

        $crt_name = Input::get('crt_name');
        $description = Input::get('description');

        $user_data = Auth::user();

        $user = $user_data->id;



        if (null !== Input::get('submit')) {
            $certification_details = Certification::where('crt_name', $crt_name)->first();

            if ($certification_details != null) {
                Certification::where('id', '=',  $certification_details->id)
                    ->update(['crt_description' => $description]);

                Activity::log('Updated certification information for certification ' . $crt_name . ' certification description ' . $description. ' user ' .$user);

            } else {
                Certification::insert(['crt_name' => $crt_name, 'crt_description' => $description]);

                Activity::log('Inserted certification information for certification ' . $crt_name . ' certification description ' . $description . ' user ' .$user);

            }

        }

        return redirect()->action(
            'SettingsController@settingsCertificationForm'
        );
    }


    public function certification_delete($id)
    {
        $user_data = Auth::user();

        $user = $user_data->id;
        try{
            $certification_details =Certification::findOrFail($id);
            if ($certification_details) {
                $certification=$certification_details->crt_name;
                $certification_details->delete();
                Activity::log('Deleted certification information for certification ' . $certification. ' User '. $user);
                return response()->json([
                    'deletable' => true,
                    'error' => null
                ]);

            }else{
                return response()->json([
                    'deletable' => false,
                    'error' => '404'
                ]);
            }
        }catch (\PDOException $e) {
            return response()->json([
                'deletable' => false,
                'error' => $e->getMessage()
            ]);
        }
    }
    public function certification_edit($id)
	{
	    $user_data = Auth::user();

        $user = $user_data->id;
        try{
            $certification_details =Certification::findOrFail($id);
            if ($certification_details) {
            return response()->json([
                'data' => $certification_details->toJson(),
                'found' => true,
                'error' => null
            ]);

		}else{
            return response()->json([
                'found' => false,
                'error' => '404'
            ]);
        }
        }catch (\PDOException $e) {
            return response()->json([
                'found' => false,
                'error' => $e->getMessage()
            ]);
        }
	}
    //client
    public function settingsClientForm (Request $request){
        $id = null;
        $clients = Client::all(['id', 'cl_name', 'cl_address', 'cl_courier', 'cl_telephone', 'cl_email'])->sortByDesc('id');
        return View::make('settingsclient', compact('id','clients'));
    }

    public function settingsClient (Request $request){
        $this->validate($request, [
            'cl_name' => 'required', 'address' => 'required', 'courier' => 'required', 'phone' => 'required'
        ]);
        $id = null;

        $cl_name = Input::get('cl_name');
        $address = Input::get('address');
        $courier = Input::get('courier');
        $phone = Input::get('phone');
        $email = Input::get('email');

        $user_data = Auth::user();

        $user = $user_data->id;



        if (null !== Input::get('submit')) {
            $client_details = Client::where('cl_name', $cl_name)->first();

            if ($client_details != null) {
                Client::where('id', '=',  $client_details->id)
                    ->update(['cl_address' => $address, 'cl_courier' => $courier, 'cl_telephone' => $phone, 'cl_email' => $email]);

                Activity::log('Updated client information for client ' . $cl_name . ' address ' . $address. ' email ' . $email. ' telephone ' . $phone. ' user ' .$user);

            } else {
                Client::insert(['cl_name'=>$cl_name,'cl_address' => $address, 'cl_courier' => $courier, 'cl_telephone' => $phone, 'cl_email' => $email]);

                Activity::log('Inserted client information for client ' . $cl_name . ' address ' . $address. ' email ' . $email. ' telephone ' . $phone. ' user ' .$user);

            }

        }

        return redirect()->action(
            'SettingsController@settingsClientForm'
        );
    }


    public function client_delete($id)
    {
        $user_data = Auth::user();
        $user = $user_data->id;
        try{
            $client_details =Client::findOrFail($id);
            if ($client_details) {
                $client=$client_details->cl_name;
                $client_details->delete();
                Activity::log('Deleted client information for client ' . $client. ' User '. $user);
                return response()->json([
                    'deletable' => true,
                    'error' => null
                ]);

            }else{
                return response()->json([
                    'deletable' => false,
                    'error' => '404'
                ]);
            }
            }catch (\PDOException $e) {
            return response()->json([
                'deletable' => false,
                'error' => $e->getMessage()
            ]);
        }
    }
    public function client_edit($id)
	{
	    $user_data = Auth::user();

        $user = $user_data->id;
        try{
            $client_details =Client::findOrFail($id);
            if ($client_details) {
            return response()->json([
                'data' => $client_details->toJson(),
                'found' => true,
                'error' => null
            ]);

		}else{
            return response()->json([
                'found' => false,
                'error' => '404'
            ]);
        }
        }catch (\PDOException $e) {
            return response()->json([
                'found' => false,
                'error' => $e->getMessage()
            ]);
        }
    }
    
    //buyer
    public function settingsBuyerForm (Request $request){
        $id = null;
        $buyertypes = buyertype::all(['id', 'bt_name', 'bt_description'])->sortByDesc('id');
        $buyers= DB::table('coffee_buyers_cb AS cb')
            ->select('cb.id as id','cb.cb_name','cb.cb_code', 'cb.cb_email', 'bt.bt_name')
            ->leftJoin('buyer_type_bt AS bt', 'bt.id', '=', 'cb.bt_id')
            ->orderBy('cb.cb_date_added', 'desc')
            ->get();
        return View::make('settingsbuyers', compact('id','buyers', 'buyertypes'));
    }

    public function settingsBuyer (Request $request){
        $this->validate($request, [
            'cb_name' => 'required', 'buyertype' => 'required', 'cb_code' => 'required'
        ]);
        $id = null;

        $cb_name = Input::get('cb_name');
        $bt_id= Input::get('buyertype');
        $cb_code = Input::get('cb_code');
        $email = Input::get('email');

        $user_data = Auth::user();

        $user = $user_data->id;



        if (null !== Input::get('submit')) {
            $buyer_details = buyer::where('cb_name', $cb_name)->first();

            if ($buyer_details != null) {
                buyer::where('id', '=',  $buyer_details->id)
                       ->update(['cb_name'=>$cb_name,'bt_id' => $bt_id, 'cb_code' => $cb_code, 'cb_email' => $email]);

                Activity::log('Updated buyer information for buyer ' . $cb_name . ' code ' . $cb_code. ' email ' . $email. ' user ' .$user);

            } else {
                buyer::insert(['cb_name'=>$cb_name,'bt_id' => $bt_id, 'cb_code' => $cb_code, 'cb_email' => $email]);

                Activity::log('Inserted buyer information for buyer ' . $cb_name . ' code ' . $cb_code. ' email ' . $email. ' user ' .$user);

            }

        }

        return redirect()->action(
            'SettingsController@settingsBuyerForm'
        );
    }


    public function buyer_delete($id)
    {
        $user_data = Auth::user();
        $user = $user_data->id;
        try{
            $buyer_details =buyer::findOrFail($id);
            if ($buyer_details) {
                $buyer=$buyer_details->cb_name;
                $buyer_details->delete();
                Activity::log('Deleted buyer information for buyer ' . $buyer. ' User '. $user);
                return response()->json([
                    'deletable' => true,
                    'error' => null
                ]);

            }else{
                return response()->json([
                    'deletable' => false,
                    'error' => '404'
                ]);
            }
        }catch (\PDOException $e) {
            return response()->json([
                'deletable' => false,
                'error' => $e->getMessage()
            ]);
        }
    }
    public function buyer_edit($id)
	{
	    $user_data = Auth::user();

        $user = $user_data->id;
        try{
            $buyer_details =buyer::findOrFail($id);
            if ($buyer_details) {
            return response()->json([
                'data' => $buyer_details->toJson(),
                'found' => true,
                'error' => null
            ]);

		}else{
            return response()->json([
                'found' => false,
                'error' => '404'
            ]);
        }
        }catch (\PDOException $e) {
            return response()->json([
                'found' => false,
                'error' => $e->getMessage()
            ]);
        }
    }
    //department
    public function settingsDepartmentForm (Request $request){
        $id = null;
        $country = country::all(['id', 'ctr_name', 'ctr_initial', 'ctr_is_active']);
        $roles = Role::all(['id', 'name', 'display_name', 'description']);
        $departments= DB::table('department_dprt AS dprt')
            ->select('dprt.id as id','dprt.dprt_name','ctr.ctr_name')
            ->leftJoin('country_ctr AS ctr', 'dprt.ctr_id', '=', 'ctr.id')
            ->orderBy('dprt.created_at', 'desc')
            ->get();
        $roles=$roles->toJson();
        return View::make('settingsdepartment', compact('id','departments', 'country','roles'));
    }

    public function settingsDepartment (Request $request){
        $this->validate($request, [
            'country' => 'required', 'department' => 'required'
        ]);
        $id = null;

        $ctr_id = Input::get('country');
        $department= Input::get('department');

        $user_data = Auth::user();

        $user = $user_data->id;



        if (null !== Input::get('submit')) {
            $department_details = department::where('dprt_name', $department)->first();

            if ($department_details != null) {
                department::where('id', '=',  $department_details->id)
                    ->update(['ctr_id'=>$ctr_id]);

                Activity::log('Updated department information for department ' . $department . ' country ' . $ctr_id. ' user ' .$user);

            } else {
                department::insert(['dprt_name'=>$department,'ctr_id' => $ctr_id]);

                Activity::log('Inserted department information for department ' . $department . ' country ' . $ctr_id. ' user ' .$user);

            }

        }

        return redirect()->action(
            'SettingsController@settingsDepartmentForm'
        );
    }


    public function department_delete($id)
    {
        $user_data = Auth::user();
        $user = $user_data->id;
        try{
            $department_details =department::findOrFail($id);
            if ($department_details) {
                $department=$department_details->dprt_name;
                $department_details->delete();
                Activity::log('Deleted department information for department ' . $department. ' User '. $user);
                return response()->json([
                    'deletable' => true,
                    'error' => null
                ]);

            }else{
                return response()->json([
                    'deletable' => false,
                    'error' => '404'
                ]);
            }
        }catch (\PDOException $e) {
            return response()->json([
                'deletable' => false,
                'error' => $e->getMessage()
            ]);
        }
    }
    public function department_edit($id)
	{
	    $user_data = Auth::user();

        $user = $user_data->id;
        try{
            $department_details =department::findOrFail($id);
            if ($department_details) {
            return response()->json([
                'data' => $department_details->toJson(),
                'found' => true,
                'error' => null
            ]);

		}else{
            return response()->json([
                'found' => false,
                'error' => '404'
            ]);
        }
        }catch (\PDOException $e) {
            return response()->json([
                'found' => false,
                'error' => $e->getMessage()
            ]);
        }
    }
    //grower
    public function settingsGrowerForm (Request $request){
        $id = null;
        $countrys = country::all(['id', 'ctr_name', 'ctr_initial', 'ctr_is_active']);
        $regions = Region::all(['id', 'rgn_name', 'rgn_description']);
        $countys = county::all(['id', 'cnt_name']);
        $growerTypes = growertype::all(['id', 'gt_name']);
        $query= DB::table('coffee_growers_cgr AS cgr')
            ->select('*')
            ->LeftJoin('country_ctr AS ctr', 'cgr.ctr_id', '=', 'ctr.id')
            ->LeftJoin('region_rgn AS rgn', 'cgr.rgn_id', '=', 'rgn.id')
            ->LeftJoin('county_cnt AS cnt', 'cgr.cnt_id', '=', 'cnt.id')
            ->groupBy('cgr.id')
            ->orderBy('cgr.created_at', 'desc');

        $growers=$query->addSelect('cgr.id AS id')->get();
        return View::make('settingsgrowers', compact('id','growers', 'countrys', 'regions', 'countys', 'growerTypes'));
    }

    public function settingsGrower (Request $request){
        $this->validate($request, [
            'country' => 'required', 'region' => 'required', 'name' => 'required', 'organization' => 'required', 'code' => 'required', 'mark' => 'required','growertype'=> 'required'
        ]);
        $id = null;

        $ctr_id = Input::get('country');
        $region= Input::get('region');
        $growertype= Input::get('growertype');
        $county= Input::get('county');
        $name= Input::get('name');
        $organization= Input::get('organization');
        $code= Input::get('code');
        $mark= Input::get('mark');
        $email= Input::get('email');
        $mobile= Input::get('mobile');
        $postal_address= Input::get('postal_address');
        $physical_address= Input::get('physical_address');

        $user_data = Auth::user();

        $user = $user_data->id;



        if (null !== Input::get('submit')) {
            $grower_details = coffeegrower::where('cg_name', $name)->first();

            if ($grower_details != null) {
                coffeegrower::where('id', '=',  $grower_details->id)
                    ->update(['ctr_id'=>$ctr_id, 'rgn_id'=> $region, 'gt_id'=> $growertype, 'cnt_id'=> $county, 'cg_organisation'=> $organization, 'cg_code'=> $code, 'cg_mark'=> $mark, 'cg_email'=> $email, 'cg_mobile'=> $mobile, 'cg_postal_address'=> $postal_address, 'cg_physical_address'=>$physical_address]);

                Activity::log('Updated grower information for grower ' .$name. 'region'.$region. ' growertype '.$growertype.' county '.$county.' organization '.$organization. ' code '.$code. ' mark '.$mark. ' email '.$email.' mobile '.$mobile.' postal_address '.$postal_address.' physical_address '.$physical_address.' user '.$user);

            } else {
                coffeegrower::insert(['cg_name'=>$name,'ctr_id'=>$ctr_id, 'rgn_id'=> $region, 'gt_id'=> $growertype, 'cnt_id'=> $county, 'cg_organisation'=> $organization, 'cg_code'=> $code, 'cg_mark'=> $mark, 'cg_email'=> $email, 'cg_mobile'=> $mobile, 'cg_postal_address'=> $postal_address, 'cg_physical_address'=>$physical_address]);

                Activity::log('Inserted grower information for grower ' .$name. 'region'.$region. ' growertype '.$growertype.' county '.$county.' organization '.$organization. ' code '.$code. ' mark '.$mark. ' email '.$email.' mobile '.$mobile.' postal_address '.$postal_address.' physical_address '.$physical_address.' user '.$user);

            }

        }

        return redirect()->action(
            'SettingsController@settingsGrowerForm'
        );
    }


    public function grower_delete($id)
    {

        $user_data = Auth::user();
        $user = $user_data->id;
        try{
            $grower_details=coffeegrower::findOrFail($id);
            if ($grower_details) {
                $grower=$grower_details->cg_name;
                $grower_details->delete();
                Activity::log('Deleted grower information for grower ' . $grower. ' User '. $user);
                return response()->json([
                    'deletable' => true,
                    'error' => null
                ]);

            }else{
                return response()->json([
                    'deletable' => false,
                    'error' => '404'
                ]);
            }
        }catch (\PDOException $e) {
            return response()->json([
                'deletable' => false,
                'error' => $e->getMessage()
            ]);
        }
    }
    public function grower_edit($id)
	{
	    $user_data = Auth::user();

        $user = $user_data->id;
        try{
            $grower_details=coffeegrower::findOrFail($id);
            if ($grower_details) {
            return response()->json([
                'data' => $grower_details->toJson(),
                'found' => true,
                'error' => null
            ]);

		}else{
            return response()->json([
                'found' => false,
                'error' => '404'
            ]);
        }
        }catch (\PDOException $e) {
            return response()->json([
                'found' => false,
                'error' => $e->getMessage()
            ]);
        }
    }

    
	public function downloadExcelGrower($type)
	{
		return Excel::load('template_grower.xlsx', function($reader) {
		})->download();
	}
    public function uploadGrowers (Request $request){

    		if (NULL !== Input::get('submitgrower')){
    			$path = Input::file('import_file')->getRealPath();

				if($path != NULL){

						$data = Excel::load($path, function($reader) {
						})->get();

                        $user_data = Auth::user();

                        $user = $user_data->id;


						if(!empty($data) && $data->count()){

							$data = $data->first();
                            $errors=[];
                            $gcerts=[];
							//dump($data->count());exit;
							foreach ($data as $key => $value) {
                               
								$growerid = trim($value->growerid);
                                $growername = trim($value->growername);
                                $organisationname = trim($value->organisationname); 
								$growermark =  trim($value->growermark);
								$growerpin = trim($value->growerpin);
								$groweremail = trim($value->groweremail);
								$growermobile = trim($value->growermobile);
								$growerpostaladress = trim($value->growerpostaladress);		
						     	$growerlandline = trim($value->growerlandline);
                                 $growervatnumber = trim($value->growervatnumber);
                                 $growerphysicaladress = trim($value->growerphysicaladress);
                                 $dateregistered = trim($value->dateregistered);
                                 $subcountyid = trim($value->subcountyid);
                                 $isactive = trim($value->isactive);
                                 $growertypeid = trim($value->growertypeid);
                                 $apptransactionid = trim($value->apptransactionid);
                                 $growerpostaltown = trim($value->growerpostaltown);
                                 $countyid = trim($value->countyid);
                                 $regionid = trim($value->regionid);
                                 $countryid = trim($value->countryid);
                                 $factoryid = trim($value->factoryid);
                                 $bulkmycoffee = trim($value->bulkmycoffee);
                                 $growerpostcode = trim($value->growerpostcode);
                                 $createdon = trim($value->createdon);
                                 $mgtcommision = trim($value->mgtcommision);
                                 $mgtcommision = trim($value->mgtcommision);
                                 $certs = trim($value->cert);

								
								if($growerid != NULL){

										
										
										$gdetails = coffeegrower::where('id', $growerid)->orWhere('cgr_grower', $growername)->first();;
                                        //dump(empty($gdetails)); exit;
										if (!empty($gdetails)) {
											$errors[] = "Grower id ".$growerid." Name ".$growername." already exists in the database!! ";
												
										}
										
										

										if (empty($gdetails)&&empty($errors)) {
											$insert[] = [
                                                'id' => $growerid,
                                                'cgr_grower' =>  $growername,
                                                'cgr_organization' => $organisationname, 
                                                'cgr_mark' => $growermark,
                                                'cgr_pin' => $growerpin,
                                                'cg_email' => $groweremail, 
                                                'cg_mobile' => $growermobile, 
                                                'cg_postal_address' => $growerpostaladress, 
                                                'cg_land_line' => $growerlandline, 
                                                'cg_vat_number' => $growervatnumber,
                                                'cg_physical_address' => $growerphysicaladress,
                                                'cg_date_registered' => $dateregistered,
                                                'cg_sub_county' => $subcountyid,
                                                'cg_is_active' => $isactive,
                                                'gt_id' => $growertypeid,
                                                'cg_app_transaction' => $apptransactionid,
                                                'cg_postal_town' => $growerpostaltown,
                                                'cnt_id' => $countyid,
                                                'rgn_id' => $regionid,
                                                'ctr_id' => $countryid,
                                                'cg_post_code' => $growerpostcode,
                                                'cg_factory_id' => $factoryid,
                                                'cg_post_code' => $growerpostcode,
                                                'cg_cert' => $certs,
                                            ];
										}
										if(!empty($gdetails)){
                                            
											$errors[] = "Grower id ".$gdetails->id." already exists in the database!! ";
										}
                                        if($certs!= 'NULL' && $certs!= NULL){
                                            $certs = explode(",",$certs);
                                            $gcerts[]=  [
                                                'growerid' => $growerid,
                                                'certs' =>  $certs 
                                            ];
                                        }

                                    }
                                    
							}

							if(!empty($errors)){
								return redirect('settingsgrowers')
											   ->withErrors($errors)
											   ->withInput();
							}
							
							if(!empty($insert)){
								coffeegrower::insert($insert);
                            }
                          
							foreach ($gcerts as $key => $value) {
                                
                                $growerid=$value['growerid'];
                                $certs = $value['certs'];
                                
                                $gdetails = coffeegrower::where('id', $growerid)->first();
      
                                foreach ($certs as $key2 => $value2) {
                                    $value2  = str_replace("'", '', $value2);
                                    $certdetails = Certification::where('crt_name', $value2)->orWhere('crt_description', $value2)->first();
                                    if(!empty($certdetails)){
                                    grower_certifications::insert(
                                        ['cgr_id' => $growerid, 'crt_id' => $certdetails->id]
                                    );
                                    Activity::log('Inserted grower certification details for grower id'.$growerid.' cert id '.$certdetails->id);
                                    }else{
                                    $errors[] = "Cert ".$value2." not found exists in the database!! ";
                                }
                                }
							}
                        
                       
                            
						Activity::log('Uploaded grower details user'. $user);
						$request->session()->flash('alert-success', 'Growers uploaded successfully!!');
						
						return View::make('settingsgrowers', compact('id', 'Season', 'country', 'sale', 'cid', 'csn_season'))->withErrors($errors);	

						} else {
							return redirect('settingsgrowers')
				                        ->withErrors("Grower id Cannot be Empty!!")->withInput();
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

    //seasons
    public function settingsSeasonForm (Request $request){
        $id = null;
        $seasons= DB::table('coffee_seasons_csn AS csn')
            ->select('*')
            ->orderBy('csn.csn_date_added', 'desc')
            ->get();
        return View::make('settingsseason', compact('id','seasons'));
    }

    public function settingsSeason (Request $request){
        $this->validate($request, [
            'season' => 'required'
        ]);
        $id = null;

        $season = Input::get('season');

        $user_data = Auth::user();

        $user = $user_data->id;



        if (null !== Input::get('submit')) {
            $season_details = Season::where('csn_season', $season)->first();

            if ($season_details != null) {
                $request->session()->flash('alert-danger', 'Season already exists!!');

            } else {
                Season::insert(['csn_season' => $season]);

                Activity::log('Inserted season information for season ' . $season . ' user ' .$user);

            }

        }

        return redirect()->action(
            'SettingsController@settingsSeasonForm'
        );
    }


    public function season_delete($id)
    {
        $user_data = Auth::user();
        $user = $user_data->id;
        try{
            $season_details =Season::findOrFail($id);
            if ($season_details) {
                $season=$season_details->csn_season;
                $season_details->delete();
                Activity::log('Deleted season information for season ' . $season. ' User '. $user);
                return response()->json([
                    'deletable' => true,
                    'error' => null
                ]);

            }else{
                return response()->json([
                    'deletable' => false,
                    'error' => '404'
                ]);
            }
        }catch (\PDOException $e) {
            return response()->json([
                'deletable' => false,
                'error' => $e->getMessage()
            ]);
        }
    }
    //seasons
    public function settingsPriceunitsForm (Request $request){
        $id = null;
        $price_units= DB::table('price_units_pu AS pu')
            ->select('*')
            ->orderBy('pu.created_at', 'desc')
            ->get();
        return View::make('settingspriceunits', compact('id','price_units'));
    }

    public function settingsPriceunits (Request $request){
        $this->validate($request, [
            'price_unit' => 'required'
        ]);
        $id = null;

        $punit = Input::get('price_unit');

        $user_data = Auth::user();

        $user = $user_data->id;



        if (null !== Input::get('submit')) {
            $price_unit_details = PriceUnits::where('pu_units', $punit)->first();

            if ($price_unit_details != null) {
                $request->session()->flash('alert-danger', 'Price Unit already exists!!');

            } else {
                PriceUnits::insert(['pu_units' => $punit]);

                Activity::log('Inserted price unit information for unit ' . $punit . ' user ' .$user);

            }

        }

        return redirect()->action(
            'SettingsController@settingsPriceunitsForm'
        );
    }


    public function priceunit_delete($id)
    {
        $user_data = Auth::user();
        $user = $user_data->id;
        try{
            $price_unit_details =PriceUnits::findOrFail($id);
            if ($price_unit_details) {
                $punit=$price_unit_details->price_unit;
                $price_unit_details->delete();
                Activity::log('Deleted price unit information for season ' . $punit. ' User '. $user);
                return response()->json([
                    'deletable' => true,
                    'error' => null
                ]);

            }else{
                return response()->json([
                    'deletable' => false,
                    'error' => '404'
                ]);
            }
        }catch (\PDOException $e) {
            return response()->json([
                'deletable' => false,
                'error' => $e->getMessage()
            ]);
        }
    }
    //counties
    public function settingsCountyForm (Request $request){
        $id = null;
        $countries = country::all(['id', 'ctr_name', 'ctr_initial', 'ctr_is_active']);
        $regions = Region::all(['id', 'rgn_name', 'rgn_description']);
        $query= DB::table('county_cnt AS cnt')
            ->select('*')
            ->LeftJoin('country_ctr AS ctr', 'cnt.ctr_id', '=', 'ctr.id')
            ->LeftJoin('region_rgn AS rgn', 'cnt.rgn_id', '=', 'rgn.id')
            ->orderBy('cnt.created_at', 'desc');

        $counties=$query->addSelect('cnt.id AS id')->get();
        return View::make('settingscounty', compact('id','counties', 'countries', 'regions'));
    }

    public function settingsCounty (Request $request){
        $this->validate($request, [
            'county' => 'required', 'country' => 'required', 'region' => 'required'
        ]);
        $id = null;

        $county = Input::get('county');
        $country = Input::get('country');
        $region = Input::get('region');

        $user_data = Auth::user();

        $user = $user_data->id;


        if (null !== Input::get('submit')) {
            $county_details = county::where('cnt_name', $county)->first();

            if ($county_details != null) {
                county::where('id', '=',  $county_details->id)
                    ->update(['ctr_id' => $country, 'rgn_id' => $region]);

                Activity::log('Updated county information for county ' . $county . ' county ' . $country. ' region ' .$region. ' user ' .$user);

            } else {
                county::insert(['cnt_name'=>$county,'ctr_id' => $country, 'rgn_id' => $region]);

                Activity::log('Inserted county information for county ' . $county . ' county ' . $country. ' region ' .$region. ' user ' .$user);

            }

        }

        return redirect()->action(
            'SettingsController@settingsCountyForm'
        );
    }


    public function county_delete($id)
    {
        $user_data = Auth::user();
        $user = $user_data->id;
        try{
            $county_details =county::findOrFail($id);
            if ($county_details) {
                $county=$county_details->csn_season;
                $county_details->delete();
                Activity::log('Deleted county information for county ' . $county. ' User '. $user);
                return response()->json([
                    'deletable' => true,
                    'error' => null
                ]);

            }else{
                return response()->json([
                    'deletable' => false,
                    'error' => '404'
                ]);
            }
        }catch (\PDOException $e) {
            return response()->json([
                'deletable' => false,
                'error' => $e->getMessage()
            ]);
        }
    }
    //freights
    public function settingsFreightForm (Request $request){
        $id = null;
        $freights= DB::table('freight_on_board_fob AS fob')
            ->select('*')
            ->orderBy('fob.created_at', 'desc')
            ->get();
        return View::make('settingsfreight', compact('id','freights'));
    }

    public function settingsFreight (Request $request){
        $this->validate($request, [
            'freight' => 'required'
        ]);
        $id = null;

        $freight = Input::get('freight');

        $user_data = Auth::user();

        $user = $user_data->id;



        if (null !== Input::get('submit')) {
            $freight_details = FOB::where('fob_price', $freight)->first();

            if ($freight_details != null) {
                $request->session()->flash('alert-danger', 'Freight already exists!!');

            } else {
                FOB::insert(['fob_price' => $freight]);

                Activity::log('Inserted freight information for freight ' . $freight . ' user ' .$user);

            }

        }

        return redirect()->action(
            'SettingsController@settingsFreightForm'
        );
    }


    public function freight_delete($id)
    {
        $user_data = Auth::user();
        $user = $user_data->id;
        try{
            $freight_details =FOB::findOrFail($id);
            if ($freight_details) {
                $freight=$freight_details->csn_season;
                $freight_details->delete();
                Activity::log('Deleted freight information for freight ' . $freight. ' User '. $user);
                return response()->json([
                    'deletable' => true,
                    'error' => null
                ]);

            }else{
                return response()->json([
                    'deletable' => false,
                    'error' => '404'
                ]);
            }
        }catch (\PDOException $e) {
            return response()->json([
                'deletable' => false,
                'error' => $e->getMessage()
            ]);
        }
    }
    //grower types
public function settingsGrowertypeForm (Request $request){
        $id = null;
        $growertypes= DB::table('grower_type_gt AS gt')
            ->select('*')
            ->orderBy('gt.created_at', 'desc')
            ->get();
        return View::make('settingsgrowertype', compact('id','growertypes'));
    }

    public function settingsGrowertype (Request $request){
        $this->validate($request, [
            'type' => 'required', 'description' => 'required'
        ]);
        $id = null;

        $type = Input::get('type');
        $description= Input::get('description');

        $user_data = Auth::user();

        $user = $user_data->id;



        if (null !== Input::get('submit')) {
            $growertype_details = growertype::where('gt_name', $type)->first();

            if ($growertype_details != null) {
                growertype::where('id', '=',  $growertype_details->id)
                    ->update(['gt_description'=>$description]);

                Activity::log('Updated grower type information for grower type ' . $type . ' description ' . $description. ' user ' .$user);

            } else {
                growertype::insert(['gt_name'=>$type,'gt_description' => $description]);

                Activity::log('Inserted grower type information for grower type ' . $type . ' description ' . $description. ' user ' .$user);

            }

        }

        return redirect()->action(
            'SettingsController@settingsGrowertypeForm'
        );
    }


    public function growertype_delete($id)
    {
        $user_data = Auth::user();
        $user = $user_data->id;
        try{
            $growertype_details =growertype::findOrFail($id);
            if ($growertype_details) {
                $grower=$growertype_details->csn_season;
                $growertype_details->delete();
                Activity::log('Deleted grower type information for grower type ' . $grower. ' User '. $user);
                return response()->json([
                    'deletable' => true,
                    'error' => null
                ]);

            }else{
                return response()->json([
                    'deletable' => false,
                    'error' => '404'
                ]);
            }
        }catch (\PDOException $e) {
            return response()->json([
                'deletable' => false,
                'error' => $e->getMessage()
            ]);
        }
    }
    //internal baskets
    public function settingsInternalbasketForm (Request $request){
        $id = null;
        $countries = country::all(['id', 'ctr_name', 'ctr_initial', 'ctr_is_active']);
        $query= DB::table('internal_basket_ibs AS ibs')
            ->select('*')
            ->leftJoin('country_ctr AS ctr', 'ibs.ctr_id', '=', 'ctr.id')
            ->orderBy('ibs.created_at', 'desc');
        $internalbaskets=$query->addSelect('ibs.id AS id')->get();
        return View::make('settingsinternalbaskets', compact('id','internalbaskets', 'countries'));
    }

    public function settingsInternalbasket (Request $request){
        $this->validate($request, [
            'country' => 'required', 'code' => 'required', 'quality' => 'required'
        ]);
        $id = null;

        $country = Input::get('country');
        $code= Input::get('code');
        $quality = Input::get('quality');
        $description = Input::get('description');

        $user_data = Auth::user();

        $user = $user_data->id;



        if (null !== Input::get('submit')) {
            $ibs_details = InternalBaskets::where('ibs_code', $code)->first();

            if ($ibs_details != null) {
                buyer::where('id', '=',  $ibs_details->id)
                    ->update(['ctr_id'=>$country, 'ibs_quality' => $quality, 'ibs_description' => $description]);
                Activity::log('Updated internal basket information for basket ' . $code . ' quality ' . $quality. ' description ' . $description. ' user ' .$user);

            } else {
                InternalBaskets::insert(['ctr_id'=>$country, 'ibs_code' => $code, 'ibs_quality' => $quality, 'ibs_description' => $description]);

                Activity::log('Inserted internal basket information for basket ' . $code . ' quality ' . $quality. ' description ' . $description. ' user ' .$user);

            }

        }

        return redirect()->action(
            'SettingsController@settingsInternalbasketForm'
        );
    }


    public function internalbasket_delete($id)
    {
        $user_data = Auth::user();
        $user = $user_data->id;
        try{
                $ibs_details =InternalBaskets::findOrFail($id);
                if ($ibs_details) {
                $ibs=$ibs_details->ibs_code;
                $ibs_details->delete();
                Activity::log('Deleted internal basket information for basket ' . $ibs. ' User '. $user);
                return response()->json([
                    'deletable' => true,
                    'error' => null
                ]);

            }else{
                return response()->json([
                    'deletable' => false,
                    'error' => '404'
                ]);
            }
        }catch (\PDOException $e) {
            return response()->json([
                'deletable' => false,
                'error' => $e->getMessage()
            ]);
        }
    }
    //mills
    public function settingsMillForm (Request $request){
        $id = null;
        $regions = Region::all(['id', 'rgn_name', 'rgn_description']);
        $query= DB::table('mill_ml AS ml')
            ->select('*')
            ->leftJoin('region_rgn AS rgn', 'ml.rgn_id', '=', 'rgn.id')
            ->orderBy('ml.created_at', 'desc');
        $mills=$query->addSelect('ml.id AS id')->get();
        return View::make('settingsmill', compact('id','mills', 'regions'));
    }

    public function settingsMill (Request $request){
        $this->validate($request, [
            'region' => 'required', 'ml_name' => 'required', 'ml_initials' => 'required'
        ]);
        $id = null;

        $region = Input::get('region');
        $ml_name= Input::get('ml_name');
        $ml_initials = Input::get('ml_initials');
        $ml_description = Input::get('ml_description');

        $user_data = Auth::user();

        $user = $user_data->id;



        if (null !== Input::get('submit')) {
            $mill_details = Mill::where('ml_name', $ml_name)->first();

            if ($mill_details != null) {
                Mill::where('id', '=',  $mill_details->id)
                    ->update(['rgn_id'=>$region, 'ml_initials' => $ml_initials, 'ml_description' => $ml_description]);
                Activity::log('Update mill information for mill ' . $ml_name . ' region ' . $region. ' description ' . $ml_description.' ml_initials ' . $ml_initials. ' user ' .$user);

            } else {
                Mill::insert(['ml_name'=>$ml_name,'rgn_id'=>$region, 'ml_initials' => $ml_initials, 'ml_description' => $ml_description]);

                Activity::log('Inserted mill information for mill ' . $ml_name . ' region ' . $region. ' description ' . $ml_description.' ml_initials ' . $ml_initials. ' user ' .$user);

            }

        }

        return redirect()->action(
            'SettingsController@settingsMillForm'
        );
    }


    public function mill_delete($id)
    {
        $user_data = Auth::user();
        $user = $user_data->id;
        try{
            $mill_details =Mill::findOrFail($id);
            if ($mill_details) {
                $mill=$mill_details->ibs_code;
                $mill_details->delete();
                Activity::log('Deleted mill information for mill ' . $mill. ' User '. $user);
                return response()->json([
                    'deletable' => true,
                    'error' => null
                ]);

            }else{
                return response()->json([
                    'deletable' => false,
                    'error' => '404'
                ]);
            }
        }catch (\PDOException $e) {
            return response()->json([
                'deletable' => false,
                'error' => $e->getMessage()
            ]);
        }
    }
    //instruction type
    public function settingsMovementInstructionTypeForm (Request $request){
        $id = null;
        $mits= DB::table('movement_instruction_type_mit AS mit')
            ->select('*')
            ->orderBy('mit.created_at', 'desc')
            ->get();
        return View::make('settingsmovementinstructiontype', compact('id','mits'));
    }

    public function settingsMovementInstructionType (Request $request){
        $this->validate($request, [
            'name' => 'required', 'description' => 'required'
        ]);
        $id = null;

        $mit_name= Input::get('name');
        $mit_description = Input::get('description');

        $user_data = Auth::user();

        $user = $user_data->id;



        if (null !== Input::get('submit')) {
            $mit_details = MovementInstructionType::where('mit_name', $mit_name)->first();

            if ($mit_details != null) {
                MovementInstructionType::where('id', '=',  $mit_details->id)
                    ->update(['mit_description' => $mit_description]);
                Activity::log('Updated movement instruction type information for mill ' . $mit_name . ' description ' . $mit_description. ' user ' .$user);

            } else {
                MovementInstructionType::insert(['mit_name'=>$mit_name,'mit_description' => $mit_description]);

                Activity::log('Inserted movement instruction type information for mill ' . $mit_name . ' description ' . $mit_description. ' user ' .$user);

            }

        }

        return redirect()->action(
            'SettingsController@settingsMovementInstructionTypeForm'
        );
    }


    public function mit_delete($id)
    {
        $user_data = Auth::user();
        $user = $user_data->id;
        try{
            $mit_details =MovementInstructionType::findOrFail($id);
            if ($mit_details) {
                $mit=$mit_details->ibs_code;
                $mit_details->delete();
                Activity::log('Deleted movement instruction type information for mit ' . $mit. ' User '. $user);
                return response()->json([
                    'deletable' => true,
                    'error' => null
                ]);

            }else{
                return response()->json([
                    'deletable' => false,
                    'error' => '404'
                ]);
            }
        }catch (\PDOException $e) {
            return response()->json([
                'deletable' => false,
                'error' => $e->getMessage()
            ]);
        }
    }
    //instruction type
    public function settingsPackagingForm (Request $request){
        $id = null;
        $packaging= DB::table('packaging_pkg AS pkg')
            ->select('*')
            ->orderBy('pkg.created_at', 'desc')
            ->get();
        return View::make('settingspackaging', compact('id','packaging'));
    }

    public function settingsPackaging (Request $request){
        $this->validate($request, [
            'name' => 'required', 'description' => 'required', 'weight'
        ]);
        $id = null;

        $pkg_name= Input::get('name');
        $pkg_description = Input::get('description');
        $pkg_weight = Input::get('weight');

        $user_data = Auth::user();

        $user = $user_data->id;



        if (null !== Input::get('submit')) {
            $package_details = Packaging::where('pkg_name', $pkg_name)->first();

            if ($package_details != null) {
                Packaging::where('id', '=',  $package_details->id)
                    ->update(['pkg_description' => $pkg_description, 'pkg_weight'=>$pkg_weight]);
                Activity::log('Updated packaging information for package ' . $pkg_name . ' description ' . $pkg_description. ' user ' .$user);

            } else {
                Packaging::insert(['pkg_name'=>$pkg_name,'pkg_description' => $pkg_description, 'pkg_weight'=>$pkg_weight]);

                Activity::log('Inserted packaging information for package ' . $pkg_name . ' description ' . $pkg_description. ' user ' .$user);

            }

        }

        return redirect()->action(
            'SettingsController@settingsPackagingForm'
        );
    }


    public function package_delete($id)
    {
        $user_data = Auth::user();
        $user = $user_data->id;
        try{
            $package_details =Packaging::findOrFail($id);
            if ($package_details) {
                $package=$package_details->ibs_code;
                $package_details->delete();
                Activity::log('Deleted package information for package ' . $package. ' User '. $user);
                return response()->json([
                    'deletable' => true,
                    'error' => null
                ]);
            }else{
                return response()->json([
                    'deletable' => false,
                    'error' => '404'
                ]);
            }
        }catch (\PDOException $e) {
            return response()->json([
                'deletable' => false,
                'error' => $e->getMessage()
            ]);
        }
    }
    //processing instructions
    public function settingsProcessingInstructionForm (Request $request){
        $id = null;
        $processinggroups = processing_groups::all(['id', 'prcss_id', 'prg_input_type','prg_instruction']);
       $query= DB::table('processing_instruction_pri AS pri')
            ->select('*')
            ->leftJoin('processing_group_prg AS prg', 'pri.prg_id', '=', 'prg.id')
            ->orderBy('pri.created_at', 'desc');
        $processinginstructions=$query->addSelect('pri.id AS id')->get();
        return View::make('settingsprocessinginstruction', compact('id','processinginstructions', 'processinggroups'));
    }

    public function settingsrocessingInstruction (Request $request){
        $this->validate($request, [
            'group' => 'required', 'name' => 'required'
        ]);
        $id = null;

        $pri_name = Input::get('name');
        $prg_id = Input::get('group');

        $user_data = Auth::user();

        $user = $user_data->id;



        if (null !== Input::get('submit')) {
            $pri_details = processing_instruction_pri::where('pri_name', $pri_name)->first();

            if ($pri_details != null) {
                processing_instruction_pri::where('id', '=',  $pri_details->id)
                    ->update(['prg_id' => $prg_id]);

                Activity::log('Updated processing instruction information for instruction ' . $pri_name . ' group ' . $prg_id. ' user ' .$user);

            } else {
                processing_instruction_pri::insert(['prg_id' => $prg_id, 'pri_name' => $pri_name]);

                 Activity::log('Inserted processing instruction information for instruction ' . $pri_name . ' group ' . $prg_id. ' user ' .$user);

            }

        }

        return redirect()->action(
            'SettingsController@settingsProcessingInstructionForm'
        );
    }


    public function processinginstruction_delete($id)
    {
        $user_data = Auth::user();
        $user = $user_data->id;
        try{
            $instruction_details =processing_instruction_pri::findOrFail($id);
            if ($instruction_details) {
                $pri=$instruction_details->ibs_code;
                $instruction_details->delete();
                Activity::log('Deleted processing instruction information for instruction ' . $pri. ' User '. $user);
                return response()->json([
                    'deletable' => true,
                    'error' => null
                ]);
            }else{
                return response()->json([
                    'deletable' => false,
                    'error' => '404'
                ]);
            }
        }catch (\PDOException $e) {
            return response()->json([
                'deletable' => false,
                'error' => $e->getMessage()
            ]);
        }
    }
    //process
    public function settingsProcessForm (Request $request){
        $id = null;
        $processing= DB::table('processing_prcss AS prcss')
            ->select('*')
            ->orderBy('prcss.created_at', 'desc')
            ->get();
        return View::make('settingsprocess', compact('id','processing'));
    }

    public function settingsProcess (Request $request){
        $this->validate($request, [
            'name' => 'required', 'initial' => 'required', 'description' => 'required'
        ]);
        $id = null;

        $prcss_name = Input::get('name');
        $prcss_initial = Input::get('initial');
        $prcss_description = Input::get('description');
        $prcss_auction = Input::get('auction');

        $user_data = Auth::user();

        $user = $user_data->id;



        if (null !== Input::get('submit')) {
            $processing_details = processing::where('prcss_name', $prcss_name)->first();

            if ($processing_details != null) {
                processing::where('id', '=',  $processing_details->id)
                    ->update(['prcss_initial' => $prcss_initial, 'prcss_description'=>$prcss_description, 'prcss_auction'=>$prcss_auction]);

                Activity::log('Updated process information for process ' . $prcss_name . ' process initial ' . $prcss_initial. ' process description ' . $prcss_description. ' process auction ' . $prcss_auction. ' user ' .$user);

            } else {
                processing::insert(['prcss_name'=>$prcss_name,'prcss_initial' => $prcss_initial, 'prcss_description'=>$prcss_description, 'prcss_auction'=>$prcss_auction]);

                Activity::log('Inserted process information for process ' . $prcss_name . ' process initial ' . $prcss_initial. ' process description ' . $prcss_description. ' process auction ' . $prcss_auction. ' user ' .$user);

            }

        }

        return redirect()->action(
            'SettingsController@settingsProcessForm'
        );
    }


    public function process_delete($id)
    {

        $user_data = Auth::user();
        $user = $user_data->id;
        try{
            $process_details =processing::findOrFail($id);
            if ($process_details) {
                $process=$process_details->ibs_code;
                $process_details->delete();
                Activity::log('Deleted process information for porcess ' . $process. ' User '. $user);
                return response()->json([
                    'deletable' => true,
                    'error' => null
                ]);
            }else{
                return response()->json([
                    'deletable' => false,
                    'error' => '404'
                ]);
            }
        }catch (\PDOException $e) {
            return response()->json([
                'deletable' => false,
                'error' => $e->getMessage()
            ]);
        }
    }
    //procesing result type
    public function settingsProcessingResultTypeForm (Request $request){
        $id = null;
        $processes = processing::all(['id', 'prcss_name', 'prcss_initial', 'prcss_description'])->sortByDesc('id');
        $query= DB::table('processing_results_type_prt AS prt')
            ->select('*')
            ->leftJoin('processing_prcss AS prcss', 'prcss.id', '=', 'prt.prcss_id')
            ->orderBy('prt.created_at', 'desc');
        $resulttypes=$query->addSelect('prt.id AS id')->get();
        return View::make('settingsprocessingresultstype', compact('id','resulttypes', 'processes'));
    }

    public function settingsProcessingResultType (Request $request){
        $this->validate($request, [
            'name' => 'required', 'process' => 'required'
        ]);
        $id = null;

        $prcss_id = Input::get('process');
        $prt_name = Input::get('name');
        $prt_initial = Input::get('initial');
        $prt_description = Input::get('description');

        $user_data = Auth::user();

        $user = $user_data->id;



        if (null !== Input::get('submit')) {
            $prt_details = processingresulttype::where('prt_name', $prt_name)->first();

            if ($prt_details != null) {
                processingresulttype::where('id', '=',  $prt_details->id)
                    ->update(['prcss_id' => $prcss_id, 'prt_initials' => $prt_initial, 'prt_description' => $prt_description]);

                Activity::log('Updated processing result type information for result type ' . $prt_name . ' initials ' . $prt_initial. ' description ' . $prt_description. ' user ' .$user);

            } else {
                processingresulttype::insert(['prt_name'=>$prt_name,'prcss_id' => $prcss_id, 'prt_initials' => $prt_initial, 'prt_description' => $prt_description]);

                Activity::log('Inserted processing result type information for result type ' . $prt_name . ' initials ' . $prt_initial. ' description ' . $prt_description. ' user ' .$user);

            }

        }

        return redirect()->action(
            'SettingsController@settingsProcessingResultTypeForm'
        );
    }


    public function prt_delete($id)
    {
        $user_data = Auth::user();
        $user = $user_data->id;
        try{
            $prt_details =processingresulttype::findOrFail($id);
            if ($prt_details) {
                $prt=$prt_details->prt_name;
                $prt_details->delete();
                Activity::log('Deleted process information for porcess ' . $prt. ' User '. $user);
                return response()->json([
                    'deletable' => true,
                    'error' => null
                ]);
            }else{
                return response()->json([
                    'deletable' => false,
                    'error' => '404'
                ]);
            }
        }catch (\PDOException $e) {
            return response()->json([
                'deletable' => false,
                'error' => $e->getMessage()
            ]);
        }
    }
    //provisional purpose settings
    public function settingsProvisionalPurposeForm (Request $request){
        $id = null;
        $purposes= DB::table('provisonal_purpose_prp AS prp')
            ->select('*')
            ->orderBy('prp.created_at', 'desc')
            ->get();
        return View::make('settingsprovisionalpurpose', compact('id','purposes'));
    }

    public function settingsProvisionalPurpose (Request $request){
        $this->validate($request, [
            'purpose' => 'required'
        ]);
        $id = null;

        $purpose = Input::get('purpose');

        $user_data = Auth::user();

        $user = $user_data->id;



        if (null !== Input::get('submit')) {
            $purpose_details = Provisonal_Purpose::where('prp_name', $purpose)->first();

            if ($purpose_details != null) {
                $request->session()->flash('alert-danger', 'Purpose already exists!!');

            } else {
                Provisonal_Purpose::insert(['prp_name' => $purpose]);

                Activity::log('Inserted purpose information for purpose ' . $purpose . ' user ' .$user);

            }

        }

        return redirect()->action(
            'SettingsController@settingsProvisionalPurposeForm'
        );
    }


    public function provisional_purpose_delete($id)
    {
        $user_data = Auth::user();
        $user = $user_data->id;
        try{
            $purpose_details =Provisonal_Purpose::findOrFail($id);
            if ($purpose_details) {
                $purpose=$purpose_details->prp_name;
                $purpose_details->delete();
                Activity::log('Deleted provisional purpose information for purpose ' . $purpose. ' User '. $user);
                return response()->json([
                    'deletable' => true,
                    'error' => null
                ]);
            }else{
                return response()->json([
                    'deletable' => false,
                    'error' => '404'
                ]);
            }
        }catch (\PDOException $e) {
            return response()->json([
                'deletable' => false,
                'error' => $e->getMessage()
            ]);
        }
    }
    //sale statuses
    public function settingsSaleStatusForm (Request $request){
        $id = null;
        $status= DB::table('sale_status_sst AS sst')
            ->select('*')
            ->orderBy('sst.created_at', 'desc')
            ->get();
        return View::make('settingssalestatus', compact('id','status'));
    }

    public function settingsSaleStatus (Request $request){
        $this->validate($request, [
            'status' => 'required', 'description' => 'required'
        ]);
        $id = null;

        $status = Input::get('status');
        $description= Input::get('description');

        $user_data = Auth::user();

        $user = $user_data->id;



        if (null !== Input::get('submit')) {
            $status_details = sale_status::where('sst_name', $status)->first();

            if ($status_details != null) {
                sale_status::where('id', '=',  $status_details->id)
                    ->update(['sst_description'=>$description]);

                Activity::log('Updated sale status information for status ' . $status . ' description ' . $description. ' user ' .$user);

            } else {
                sale_status::insert(['sst_name'=>$status,'sst_description' => $description]);

                Activity::log('Inserted sale status information for status ' . $status . ' description ' . $description. ' user ' .$user);

            }

        }

        return redirect()->action(
            'SettingsController@settingsSaleStatusForm'
        );
    }


    public function sale_status_delete($id)
    {
        $user_data = Auth::user();
        $user = $user_data->id;
        try{
            $status_details =sale_status::findOrFail($id);
            if ($status_details) {
                $status=$status_details->sst_name;
                $status_details->delete();
                Activity::log('Deleted sale status information for status ' . $status. ' User '. $user);
                return response()->json([
                    'deletable' => true,
                    'error' => null
                ]);
            }else{
                return response()->json([
                    'deletable' => false,
                    'error' => '404'
                ]);
            }
        }catch (\PDOException $e) {
            return response()->json([
                'deletable' => false,
                'error' => $e->getMessage()
            ]);
        }
    }
    //Trading Month
    public function settingsTradingMonthForm (Request $request){
        $id = null;
        $months= DB::table('trading_months_trm AS trm')
            ->select('*')
            ->orderBy('trm.created_at', 'desc')
            ->get();
        return View::make('settingstradingmonths', compact('id','months'));
    }

    public function settingsTradingMonth (Request $request){
        $this->validate($request, [
            'month' => 'required', 'code' => 'required'
        ]);
        $id = null;

        $month = Input::get('month');
        $code= Input::get('code');

        $user_data = Auth::user();

        $user = $user_data->id;



        if (null !== Input::get('submit')) {
            $month_details = trading_months::where('trm_month', $month)->first();

            if ($month_details != null) {
                trading_months::where('id', '=',  $month_details->id)
                    ->update(['trm_code'=>$code]);

                Activity::log('Updated trading month information for trading month ' . $month . ' code ' . $code. ' user ' .$user);

            } else {
                trading_months::insert(['trm_month'=>$month,'trm_code' => $code]);

                Activity::log('Inserted trading month information for trading month ' . $month . ' code ' . $code. ' user ' .$user);

            }

        }

        return redirect()->action(
            'SettingsController@settingsTradingMonthForm'
        );
    }


    public function trading_month_delete($id)
    {
        $user_data = Auth::user();
        $user = $user_data->id;
        try{
            $month_details =trading_months::findOrFail($id);
            if ($month_details) {
                $month=$month_details->trm_month;
                $month_details->delete();
                Activity::log('Deleted trading month information for month ' . $month. ' User '. $user);
                return response()->json([
                    'deletable' => true,
                    'error' => null
                ]);
            }else{
                return response()->json([
                    'deletable' => false,
                    'error' => '404'
                ]);
            }
        }catch (\PDOException $e) {
            return response()->json([
                'deletable' => false,
                'error' => $e->getMessage()
            ]);
        }
    }
    //transporters
    public function settingsTransportersForm (Request $request){
        $id = null;
        $countries = country::all(['id', 'ctr_name', 'ctr_initial', 'ctr_is_active']);
        $query= DB::table('transporters_trp AS trp')
            ->select('*')
            ->leftJoin('country_ctr AS ctr', 'trp.ctr_id', '=', 'ctr.id')
            ->orderBy('trp.created_at', 'desc');
        $transporters=$query->addSelect('trp.id AS id')->get();
        return View::make('settingstransporters', compact('id','transporters', 'countries'));
    }

    public function settingsTransporters (Request $request){
        $this->validate($request, [
            'country' => 'required', 'name' => 'required'
        ]);
        $id = null;

        $country = Input::get('country');
        $trp_name= Input::get('name');
        $trp_initials = Input::get('initials');
        $trp_description = Input::get('description');

        $user_data = Auth::user();

        $user = $user_data->id;



        if (null !== Input::get('submit')) {
            $transporter_details = transporters::where('trp_name', $trp_name)->first();

            if ($transporter_details != null) {
                transporters::where('id', '=',  $transporter_details->id)
                    ->update(['ctr_id'=>$country, 'trp_name' => $trp_name, 'trp_initials' => $trp_initials, 'trp_description' => $trp_description]);
                Activity::log('Updated transporter information for transporter ' . $trp_name. ' initials ' . $trp_initials. ' description ' . $trp_description. ' user ' .$user);

            } else {
                transporters::insert(['ctr_id'=>$country, 'trp_name' => $trp_name, 'trp_initials' => $trp_initials, 'trp_description' => $trp_description]);

                Activity::log('Inserted transporter information for transporter ' . $trp_name. ' initials ' . $trp_initials. ' description ' . $trp_description. ' user ' .$user);

            }

        }

        return redirect()->action(
            'SettingsController@settingsTransportersForm'
        );
    }


    public function transporter_delete($id)
    {
        $user_data = Auth::user();
        $user = $user_data->id;
        try{
            $transporter_details =transporters::findOrFail($id);
            if ($transporter_details) {
                $transporter_details->delete();
                $transporter=$transporter_details->trp_name;
                $transporter_details->delete();
                Activity::log('Deleted transporter information for transporter ' . $transporter. ' User '. $user);
                return response()->json([
                    'deletable' => true,
                    'error' => null
                ]);
            }else{
                return response()->json([
                    'deletable' => false,
                    'error' => '404'
                ]);
            }
        }catch (\PDOException $e) {
            return response()->json([
                'deletable' => false,
                'error' => $e->getMessage()
            ]);
        }
    }
    //screens
    public function settingsYearForm (Request $request){
        $id = null;
        $years = Years::all(['id', 'yr_name', 'yr_number'])->sortByDesc('id');
        return View::make('settingsyear', compact('id','years'));
    }

    public function settingsYear (Request $request){
        $this->validate($request, [
            'year' => 'required'
        ]);
        $id = null;

        $year = Input::get('year');
        $number = Input::get('number');

        $user_data = Auth::user();

        $user = $user_data->id;


        if (null !== Input::get('submit')) {
            $year_details = Years::where('yr_name', $year)->first();

            if ($year_details != null) {
                Years::where('id', '=', $year_details->id)
                    ->update(['yr_number' => $number]);
                Activity::log('Updated year information for year ' . $year . ' number ' . $number . ' user ' .$user);
            }else{
                Years::insert(['yr_name' => $year, 'yr_number' => $number]);

                Activity::log('Inserted year information for year ' . $year . ' number ' . $number . ' user ' .$user);

            }

        }

        return redirect()->action(
            'SettingsController@settingsYearForm'
        );
    }


    public function year_delete($id)
    {
        $user_data = Auth::user();
        $user = $user_data->id;
        try{
            $year_details = Years::findOrFail($id);
            if ($year_details) {
                $year_details->delete();
                $year=$year_details->trp_name;
                $year_details->delete();
                Activity::log('Deleted year information for year ' . $year. ' User '. $user);
                return response()->json([
                    'deletable' => true,
                    'error' => null
                ]);
            }else{
                return response()->json([
                    'deletable' => false,
                    'error' => '404'
                ]);
            }
        }catch (\PDOException $e) {
            return response()->json([
                'deletable' => false,
                'error' => $e->getMessage()
            ]);
        }
    }
    //menu
    public function settingsMenuForm (Request $request){
        $id = null;
        //$buyertypes = buyertype::all(['id', 'bt_name', 'bt_description'])->sortByDesc('id');
        $menu = Menu::all(['id', 'mn_name', 'mn_url', 'mn_level', 'mn_icon', 'mn_parent', 'mn_order']);
        return View::make('settingsmenu', compact('id','menu'));
    }

    public function settingsMenu (Request $request){
        $this->validate($request, [
            'name' => 'required', 'url' => 'required', 'level' => 'required' ,'order' => 'required'
        ]);
        $id = null;

        $mn_name = Input::get('name');
        $mn_url= Input::get('url');
        $mn_level = Input::get('level');
        $mn_parent = Input::get('parent');
        $icon = Input::get('icon');
        $order = Input::get('order');

        $user_data = Auth::user();

        $user = $user_data->id;

        //check if menu order is in use for the level
        if($mn_level==1){
            $menu_order_exists = Menu::where('mn_order', $order)->where('mn_level', $mn_level)->count();
        }else{
            $menu_order_exists = Menu::where('mn_order', $order)->where('mn_level', $mn_level)->where('mn_parent', $mn_parent)->count(); 
        }
        
        if ($menu_order_exists>0){
            $request->session()->flash('alert-danger', 'Menu order already in use for level '.$mn_level         .'');
        }else{

        if (null !== Input::get('submit')) {
            $menu_details = Menu::where('mn_name', $mn_name)->first();

            if ($menu_details != null) {
                Menu::where('id', '=',  $menu_details->id)
                    ->update(['mn_url' => $mn_url, 'mn_level' => $mn_level, 'mn_parent' => $mn_parent, 'mn_icon' => $icon, 'mn_order' => $order]);

                Activity::log('Updated menu information for menu ' . $mn_name . ' url ' . $mn_url. ' level ' . $mn_level. ' user ' .$user);

            } else {
                Menu::insert(['mn_name'=>$mn_name,'mn_url' => $mn_url, 'mn_level' => $mn_level, 'mn_parent' => $mn_parent, 'mn_icon' => $icon, 'mn_order' => $order]);

                Activity::log('Inserted menu information for menu ' . $mn_name . ' url ' . $mn_url. ' level ' . $mn_level. ' user ' .$user);

            }

        }
        }

        return redirect()->action(
            'SettingsController@settingsMenuForm'
        );
    }


    public function menu_delete($id)
    {
        $user_data = Auth::user();
        $user = $user_data->id;
        try{
            $menu_details =Menu::findOrFail($id);
            if ($menu_details) {
                $menu=$menu_details->mn_name;
                $menu_details->delete();
                Activity::log('Deleted menu information for menu ' . $menu. ' User '. $user);
                return response()->json([
                    'deletable' => true,
                    'error' => null
                ]);

            }else{
                return response()->json([
                    'deletable' => false,
                    'error' => '404'
                ]);
            }
        }catch (\PDOException $e) {
            return response()->json([
                'deletable' => false,
                'error' => $e->getMessage()
            ]);
        }
    }
    public function getDepartmentMenus($departmentID)
    {
        if ($departmentID != null) {

            $query= DB::table('groupmenu_gpm AS gpm')
                ->select('mn.mn_name','dprt.dprt_name','mn.mn_url')
                ->leftJoin('department_dprt AS dprt', 'gpm.dprt_id', '=', 'dprt.id')
                ->leftJoin('menu_mn AS mn', 'gpm.mn_id', '=', 'mn.id')
                ->where('dprt_id', $departmentID)
                ->orderBy('mn.mn_order', 'asc');

        } else {
            $menus = null;
        }

        return Datatables::of($query)->make(true);
    }
    public function getMenuList($departmentID)
    {
        $menus = Menu::select('*');


        return Datatables::of($menus)
            ->make(true);
    }
    public function assignMenu($departmentID, $menuID, $roles)
    {
        $user_data = Auth::user();
        $user = $user_data->id;
        try{
            $groupmenu_details = group_menu::all()->where('dprt_id', $departmentID)->where('mn_id', $menuID)->count();
            if ($groupmenu_details>0) {
                $menudet = group_menu::where('dprt_id','=', $departmentID)->where('mn_id','=', $menuID)->update(['rl_ids' => $roles]);
                return response()->json([
                    'exists' => true,
                    'inserted' => false,
                    'error' => null,
                    'updated' => true
                ]);

            }else{
                    group_menu::insert(['mn_id'=>$menuID,'dprt_id' => $departmentID, 'rl_ids'=>$roles]);

                    Activity::log('Inserted group menu information for menu ' . $menuID . ' department ' . $departmentID. ' roles ' . $roles. ' user ' .$user);
                return response()->json([
                    'exists' => false,
                    'inserted' => true,
                    'error' => 'null'
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
    public function revokeMenu($departmentID, $menuID)
    {
        $user_data = Auth::user();
        $user = $user_data->id;
        try {
            $groupmenu_details = DB::table('groupmenu_gpm')
                ->where('mn_id', $menuID)
                ->where('dprt_id', $departmentID)
                ->first();
            if ($groupmenu_details) {
                $grpmenuid=$groupmenu_details->id;
                $menu = $groupmenu_details->mn_id;
                $department = $groupmenu_details->dprt_id;

                $grpmenu_details =group_menu::findOrFail($grpmenuid);
                if ($grpmenu_details) {
                    $grpmenu_details->delete();
                    Activity::log('Deleted group menu information for menu ' . $menu. ' Department ' . $department. ' User '. $user);
                    return response()->json([
                        'deleted' => true,
                        'error' => null
                    ]);

                }

            } else {
                return response()->json([
                    'deleted' => false,
                    'error' => 404
                ]);
            }
        } catch (\PDOException $e) {
            return response()->json([
                'deleted' => false,
                'error' => $e->getMessage()
            ]);
        }
    }
}

