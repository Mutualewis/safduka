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


class SystemSettingsController extends Controller {
    //seasons
    public function systemSettingsForm (Request $request){
        $id = null;
        $systems= DB::table('system_settings_sys AS sys')
            ->select('*')
            ->orderBy('sys.created_at', 'desc')
            ->get();
        return View::make('systemsettings', compact('id','systems'));
    }

    public function systemSettingsSeason (Request $request){
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


    public function settingsystem_delete($id)
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

    }