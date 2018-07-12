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
use PdfReport;
use ExcelReport;

use delete;



class PurchaseAllocationReportController extends Controller {

    public function purchaseForAllocationReportForm (Request $request){
        $id = null;
        $Season = Season::all(['id', 'csn_season']);
        $country = country::all(['id', 'ctr_name', 'ctr_initial']);
        $sale = null;

        return View::make('purchaseforallocationreport', compact('id', 'Season', 'country', 'sale'));

    }

    public function purchaseForAllocationReport (Request $request){
        $id = null;
        $Season = Season::all(['id', 'csn_season']);
        $country = country::all(['id', 'ctr_name', 'ctr_initial']);
        $sale = Sale::all(['id', 'sl_no']);
        $cid = Input::get('country');
        $csn_season = Input::get('sale_season');
        $saleid = Input::get('sale');

        if (null !== Input::get('viewpdf')) {
           return $this->displayPDFReport($request);
        } elseif (null !== Input::get('viewexcel')) {
           return $this->displayExcelReport($request);
        } else if($request->has('country') && $request->has('sale_season') && Input::get('sale_season') !== "Sale Season" ){
            $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sltyp_id', 1)->orderByRaw('LENGTH(`sl_no`) ASC')->orderBy('sl_no')->get();
            return View::make('purchaseforallocationreport', compact('id', 'Season', 'country', 'sale', 'cid', 'csn_season', 'saleid'));  
        }

        return View::make('purchaseforallocationreport', compact('id', 'Season', 'country', 'sale', 'cid', 'csn_season', 'saleid'));

    }


    public function displayPDFReport ($request){
        // Retrieve any filters        
        $cid = Input::get('country');
        $csn_season = Input::get('sale_season');
        $saleid = Input::get('sale');

        $selectedCountry = Country::where('id', $cid)->first();
        $selectedCountry = $selectedCountry->ctr_initial;

        $selectedSeason = Season::where('id', $csn_season)->first();
        $selectedSeason = $selectedSeason->csn_season;

        $selectedSale = Sale::where('id', $saleid)->first();
        $selectedSale = $selectedSale->sl_no;

        // Report title
        $title = 'Purchase For Allocation';

        // For displaying filters description on header
        $meta = [
            'Season' => $selectedSeason,
            'Sale' => $selectedSale 
        ];

        $query = Sale::leftJoin('country_ctr AS ctr', 'ctr.id', '=' ,'sale_sl.ctr_id')

                 ->leftJoin('coffee_details_cfd AS cfd' , 'sale_sl.id', '=' ,'cfd.sl_id') 

                 ->leftJoin('coffee_seasons_csn AS csn' , 'csn.id', '=' ,'cfd.csn_id')

                 ->leftJoin('warehouses_region AS wrgn' , 'wrgn.wrid', '=' ,'cfd.wr_id')

                 ->leftJoin('coffee_grade_cgrad AS cgrad' , 'cgrad.id', '=' ,'cfd.cgrad_id') 

                 ->leftJoin('mill_ml AS ml' , 'ml.id', '=' ,'cfd.ml_id') 

                 ->join('certifications AS crt' , 'crt.cfdid', '=' ,'cfd.id') 

                 ->leftJoin('seller_slr AS slr' , 'slr.id', '=' ,'cfd.slr_id') 

                 ->leftJoin('green_comments_grcm AS grcm' , 'grcm.cfd_id', '=' ,'cfd.id') 

                 ->leftJoin('qualty_details_qltyd AS qltyd' , 'qltyd.cfd_id', '=' ,'cfd.id') 

                 ->leftJoin('processing_prcss AS prcss' , 'prcss.id', '=' ,'qltyd.prcss_id') 

                 ->leftJoin('screens_scr AS scr' , 'scr.id', '=' ,'qltyd.scr_id') 

                 ->leftJoin('cup_score_cp AS cp' , 'cp.id', '=' ,'qltyd.cp_id') 

                 ->leftJoin('raw_score_rw AS rw' , 'rw.id', '=' ,'qltyd.rw_id') 

                 ->leftJoin('green AS grn' , 'grn.cfdid', '=' ,'cfd.id') 

                 ->leftJoin('purchases_prc AS prc' , 'prc.cfd_id', '=' ,'cfd.id') 

                 ->leftJoin('coffee_buyers_cb AS cb' , 'cb.id', '=' ,'prc.cb_id') 

                 ->leftJoin('basket_bs AS bs' , 'bs.id', '=' ,'prc.bs_id') 

                 ->leftJoin('sale_status_sst AS sst' , 'sst.id', '=' ,'prc.sst_id') 

                 ->leftJoin('invoices_inv AS inv' , 'inv.id', '=' ,'prc.inv_id') 

                 ->leftJoin('users_usr AS inv_usr' , 'inv_usr.id', '=' ,'inv.inv_confirmedby') 

                 ->leftJoin('payments_py AS py' , 'py.id', '=' ,'prc.py_id') 

                 ->leftJoin('users_usr AS py_usr' , 'py_usr.id', '=' ,'py.py_confirmedby') 

                 ->leftJoin('bric_br AS br' , 'br.id', '=' ,'prc.br_id') 

                 ->leftJoin('users_usr AS br_usr' , 'br_usr.id', '=' ,'br.br_confirmedby') 

                 ->leftJoin('warrants_war AS war' , 'war.id', '=' ,'prc.war_id') 

                 ->leftJoin('release_instructions_rl AS rl' , 'rl.id', '=' ,'prc.rl_id') 

                 ->leftJoin('transporters_trp AS trp' , 'trp.id', '=' ,'rl.trp_id') 

                ->select('cfd.id AS id','cfd.sl_id AS slid','sale_sl.sl_no AS sale','sale_sl.sl_date AS date','sale_sl.ctr_id AS slctrid','ctr.ctr_name AS ctrname','sale_sl.sl_date + interval 7 day AS prompt_date','csn.csn_season AS csn_season','ml.ml_name AS ml_name','wrgn.rgn_name AS region','wrgn.wrid AS wrid','wrgn.wr_name AS warehouse','cfd.cfd_lot_no AS lot',DB::Raw('ifnull(prc.inv_outturn,cfd.cfd_outturn) AS outturn'),'slr.id AS slrid','slr.slr_initials AS seller',DB::Raw('ifnull(prc.inv_mark,cfd.cfd_grower_mark) AS mark'),'cgrad.cgrad_name AS grade'
                    ,DB::Raw('ifnull(war.war_weight, ifnull(prc.inv_weight, cfd.cfd_weight)) AS weight'),DB::Raw('ifnull(floor((ifnull(war.war_weight,ifnull(prc.inv_weight,cfd.cfd_weight)) / 60)),cfd.cfd_bags) AS bags'),DB::Raw('ifnull(floor((ifnull(war.war_weight,ifnull(prc.inv_weight,cfd.cfd_weight)) % 60)),cfd.cfd_pockets) AS pockets'),'crt.crt_name AS cert','sale_sl.sl_hedge AS hedge','sale_sl.sl_month AS month', 'grcm.id is AS greencomments'
                    ,'grn.qp_parameter AS green','cfd.cfd_dnt AS dnt','cfd.cfd_dnt AS touch','prcss.prcss_initial AS prcss_name','qltyd.qltyd_prcss_value AS qltyd_prcss_value','scr.scr_name AS scr_name','qltyd.qltyd_scr_value AS qltyd_scr_value','qltyd.qltyd_acidity AS acidity','qltyd.qltyd_body AS body','qltyd.qltyd_flavour AS flavour','cp.cp_quality AS cp_quality','cp.cp_score AS cp_score','rw.rw_score AS rw_score','rw.rw_quality AS rw_quality','qltyd.qltyd_comments AS final_comments','cb.id AS cbid','cb.cb_name AS buyer','prc.id AS prcid','prc.prc_price AS auc_price','prc.prc_confirmed_price AS price','inv.inv_no AS invoice','prc.inv_weight AS inv_weight','inv.inv_date AS invoice_date','inv_usr.usr_name AS invoice_confirmedby','py.py_no AS py_no','py.py_amount AS payment','py.py_date AS payment_date','py_usr.usr_name AS payment_confirmedby','br.br_no AS bric','br.br_date AS br_date','br_usr.usr_name AS br_confirmedby','bs.id AS bsid','bs.bs_code AS code','bs.bs_quality AS quality','war.war_no AS warrant_no','war.war_weight AS warrant_weight','war.war_date AS warrant_date','war.war_comments AS war_comments','sst.sst_name AS status','rl.rl_no AS rl_no','rl.rl_date AS rl_date','rl.rl_confirmedby AS rl_confirmedby','trp.trp_name AS trp_name', DB::Raw('TRUNCATE((prc.prc_confirmed_price/1.1023 - sale_sl.sl_hedge), 2) As differential'), 'br_price_per_fifty', 'br_price_pounds', 'br_diffrential', 'br_value' )
                ->where('cb.bt_id', '1')
                ->where('sale_sl.ctr_id', $cid)
                ->where('csn.csn_season', $selectedSeason)
                ->where('sale_sl.id', $saleid)
                ->where('prc.sst_id', '2')
                ->groupBy('sale_sl.sl_no', 'cfd.cfd_lot_no', 'cfd.cfd_outturn', 'bs.bs_code')
                ->orderBy('bs.bs_code')
                ->orderBy('cfd.cfd_lot_no');

        // Do some querying..
        $queryBuilder = $query;

        // Set Column to be displayed
        $columns = [
            'QualityCode' => function($result) {
                return $result->code.'('.$result->quality.')';
            },

            'Lot' => function($result) {
                return $result->lot;
            },
            'Outturn' => function($result) {
                return $result->outturn;
            },
            'Mark' => function($result) {
                return $result->mark;
            },
            'Quality grp' => function($result) {
                return $result->cp_quality.' '.$result->cert;
            },
            'Grade' => function($result) {
                return $result->grade;
            },
            'Kilos' => function($result) {
                return $result->weight;
            },
            'Bags' => function($result) {
                return $result->bags;
            },
            'Pkts' => function($result) {
                return $result->pockets;
            },
            'Costs' => function($result) {
                return $result->price;
            },
            'Value' => function($result) {
                $value_price = $result->weight/50 * $result->price;
                return $value_price;
            },


            'Hedge' => function($result) {
                return $result->hedge;
            },
            'Diff' => function($result) {
                return $result->differential;
            },
            'BRIC_Ctr' => function($result) {
                return $result->bric;
            },


            'Price/Fifty' => function($result) {
                return round($result->br_price_per_fifty);
            },
            'Price Pounds' => function($result) {
                return round($result->br_price_pounds);
            },
            'Differential' => function($result) {
                return round($result->br_diffrential);
            },



            'total_cost' => function($result) {
                $value_price = $result->weight * $result->price;
                return $value_price;
            },
            'total_col' => function($result) {
                $total_col = 1;
                return $total_col;
            },
            'total_diff' => function($result) {
                $total_diff = $result->weight * $result->differential;
                return $total_diff;
            }

        ];
        /*
            Generate Report with flexibility to manipulate column class even manipulate column value (using Carbon, etc).

            - of()         : Init the title, meta (filters description to show), query, column (to be shown)
            - editColumn() : To Change column class or manipulate its data for displaying to report
            - editColumns(): Mass edit column
            - showTotal()  : Used to sum all value on specified column on the last table (except using groupBy method). 'point' is a type for displaying total with a thousand separator
            - groupBy()    : Show total of value on specific group. Used with showTotal() enabled.
            - limit()      : Limit record to be showed
            - make()       : Will producing DomPDF / SnappyPdf instance so you could do any other DomPDF / snappyPdf method such as stream() or download()
        */
        return PdfReport::of($title, $meta, $queryBuilder, $columns)
                        // ->showTotalColumns('Costs', [
                        //     'displayAs' => function($result) {
                        //         return $result->rl_date;
                        //     }
                        // ])
                        // ->editColumn('Outturn', [
                        //     'displayAs' => function($result) {
                        //         return $result->balance;
                        //     }
                        // ])
                        ->editColumns(['total_cost','total_col', 'total_diff'], [
                            'class' => 'hidden'
                        ])
                        ->setCss([
                            '.hidden' => 'display: none;'
                        ])


                        

                        ->editColumns(['Kilos', 'Bags', 'Pkts', 'Costs', 'Value', 'Hedge', 'Diff', 'Bric Ctr'], [
                            'class' => 'right'
                        ])
                        ->showTotal([
                            'Kilos' => 'point',
                            'Bags' => 'point',
                            // 'Bags' => 'bags',
                            'Pkts' => 'point',
                            'Costs' => 'costs',                            
                            'Value' => 'value',
                            'Hedge' => 'hedge',
                            'Diff' => 'diff',
                            'br_price_per_fifty' => 'per_fifty',
                            'br_price_pounds' => '',
                            'br_diffrential' => '',
                            'br_value' => '',

                            'total_cost' => '',
                            'total_col' => '',
                            'total_diff' => ''
                        ])
                        // ->showTotalColumns([
                        //     'Costs' => 1
                        //     ])
                        // ->limit(20)
                        ->groupBy('QualityCode')
                        ->stream(); // or download('filename here..') to download pdf
                        // ->download('purchaseforallocationreport_Season_'.$selectedSeason.'_Sale_'.$selectedSale);


    }

    public function displayExcelReport ($request){
        // Retrieve any filters        
        $cid = Input::get('country');
        $csn_season = Input::get('sale_season');
        $saleid = Input::get('sale');

        $selectedCountry = Country::where('id', $cid)->first();
        $selectedCountry = $selectedCountry->ctr_initial;

        $selectedSeason = Season::where('id', $csn_season)->first();
        $selectedSeason = $selectedSeason->csn_season;

        $selectedSale = Sale::where('id', $saleid)->first();
        $selectedSale = $selectedSale->sl_no;

        // Report title
        $title = 'Purchase For Allocation';

        // For displaying filters description on header
        $meta = [
            'Season' => $selectedSeason,
            'Sale' => $selectedSale 
        ];

        $query = Sale::leftJoin('country_ctr AS ctr', 'ctr.id', '=' ,'sale_sl.ctr_id')

                 ->leftJoin('coffee_details_cfd AS cfd' , 'sale_sl.id', '=' ,'cfd.sl_id') 

                 ->leftJoin('coffee_seasons_csn AS csn' , 'csn.id', '=' ,'cfd.csn_id')

                 ->leftJoin('warehouses_region AS wrgn' , 'wrgn.wrid', '=' ,'cfd.wr_id')

                 ->leftJoin('coffee_grade_cgrad AS cgrad' , 'cgrad.id', '=' ,'cfd.cgrad_id') 

                 ->leftJoin('mill_ml AS ml' , 'ml.id', '=' ,'cfd.ml_id') 

                 ->join('certifications AS crt' , 'crt.cfdid', '=' ,'cfd.id') 

                 ->leftJoin('seller_slr AS slr' , 'slr.id', '=' ,'cfd.slr_id') 

                 ->leftJoin('green_comments_grcm AS grcm' , 'grcm.cfd_id', '=' ,'cfd.id') 

                 ->leftJoin('qualty_details_qltyd AS qltyd' , 'qltyd.cfd_id', '=' ,'cfd.id') 

                 ->leftJoin('processing_prcss AS prcss' , 'prcss.id', '=' ,'qltyd.prcss_id') 

                 ->leftJoin('screens_scr AS scr' , 'scr.id', '=' ,'qltyd.scr_id') 

                 ->leftJoin('cup_score_cp AS cp' , 'cp.id', '=' ,'qltyd.cp_id') 

                 ->leftJoin('raw_score_rw AS rw' , 'rw.id', '=' ,'qltyd.rw_id') 

                 ->leftJoin('green AS grn' , 'grn.cfdid', '=' ,'cfd.id') 

                 ->leftJoin('purchases_prc AS prc' , 'prc.cfd_id', '=' ,'cfd.id') 

                 ->leftJoin('coffee_buyers_cb AS cb' , 'cb.id', '=' ,'prc.cb_id') 

                 ->leftJoin('basket_bs AS bs' , 'bs.id', '=' ,'prc.bs_id') 

                 ->leftJoin('sale_status_sst AS sst' , 'sst.id', '=' ,'prc.sst_id') 

                 ->leftJoin('invoices_inv AS inv' , 'inv.id', '=' ,'prc.inv_id') 

                 ->leftJoin('users_usr AS inv_usr' , 'inv_usr.id', '=' ,'inv.inv_confirmedby') 

                 ->leftJoin('payments_py AS py' , 'py.id', '=' ,'prc.py_id') 

                 ->leftJoin('users_usr AS py_usr' , 'py_usr.id', '=' ,'py.py_confirmedby') 

                 ->leftJoin('bric_br AS br' , 'br.id', '=' ,'prc.br_id') 

                 ->leftJoin('users_usr AS br_usr' , 'br_usr.id', '=' ,'br.br_confirmedby') 

                 ->leftJoin('warrants_war AS war' , 'war.id', '=' ,'prc.war_id') 

                 ->leftJoin('release_instructions_rl AS rl' , 'rl.id', '=' ,'prc.rl_id') 

                 ->leftJoin('transporters_trp AS trp' , 'trp.id', '=' ,'rl.trp_id') 

                ->select('cfd.id AS id','cfd.sl_id AS slid','sale_sl.sl_no AS sale','sale_sl.sl_date AS date','sale_sl.ctr_id AS slctrid','ctr.ctr_name AS ctrname','sale_sl.sl_date + interval 7 day AS prompt_date','csn.csn_season AS csn_season','ml.ml_name AS ml_name','wrgn.rgn_name AS region','wrgn.wrid AS wrid','wrgn.wr_name AS warehouse','cfd.cfd_lot_no AS lot',DB::Raw('ifnull(prc.inv_outturn,cfd.cfd_outturn) AS outturn'),'slr.id AS slrid','slr.slr_initials AS seller',DB::Raw('ifnull(prc.inv_mark,cfd.cfd_grower_mark) AS mark'),'cgrad.cgrad_name AS grade'
                    ,DB::Raw('ifnull(war.war_weight, ifnull(prc.inv_weight, cfd.cfd_weight)) AS weight'),DB::Raw('ifnull(floor((ifnull(war.war_weight,ifnull(prc.inv_weight,cfd.cfd_weight)) / 60)),cfd.cfd_bags) AS bags'),DB::Raw('ifnull(floor((ifnull(war.war_weight,ifnull(prc.inv_weight,cfd.cfd_weight)) % 60)),cfd.cfd_pockets) AS pockets'),'crt.crt_name AS cert','sale_sl.sl_hedge AS hedge','sale_sl.sl_month AS month', 'grcm.id is AS greencomments'
                    ,'grn.qp_parameter AS green','cfd.cfd_dnt AS dnt','cfd.cfd_dnt AS touch','prcss.prcss_initial AS prcss_name','qltyd.qltyd_prcss_value AS qltyd_prcss_value','scr.scr_name AS scr_name','qltyd.qltyd_scr_value AS qltyd_scr_value','qltyd.qltyd_acidity AS acidity','qltyd.qltyd_body AS body','qltyd.qltyd_flavour AS flavour','cp.cp_quality AS cp_quality','cp.cp_score AS cp_score','rw.rw_score AS rw_score','rw.rw_quality AS rw_quality','qltyd.qltyd_comments AS final_comments','cb.id AS cbid','cb.cb_name AS buyer','prc.id AS prcid','prc.prc_price AS auc_price','prc.prc_confirmed_price AS price','inv.inv_no AS invoice','prc.inv_weight AS inv_weight','inv.inv_date AS invoice_date','inv_usr.usr_name AS invoice_confirmedby','py.py_no AS py_no','py.py_amount AS payment','py.py_date AS payment_date','py_usr.usr_name AS payment_confirmedby','br.br_no AS bric','br.br_date AS br_date','br_usr.usr_name AS br_confirmedby','bs.id AS bsid','bs.bs_code AS code','bs.bs_quality AS quality','war.war_no AS warrant_no','war.war_weight AS warrant_weight','war.war_date AS warrant_date','war.war_comments AS war_comments','sst.sst_name AS status','rl.rl_no AS rl_no','rl.rl_date AS rl_date','rl.rl_confirmedby AS rl_confirmedby','trp.trp_name AS trp_name', DB::Raw('TRUNCATE((prc.prc_confirmed_price/1.1023 - sale_sl.sl_hedge), 2) As differential'), 'br_price_per_fifty', 'br_price_pounds', 'br_diffrential', 'br_value'  )
                ->where('cb.bt_id', '1')
                ->where('sale_sl.ctr_id', $cid)
                ->where('csn.csn_season', $selectedSeason)
                ->where('sale_sl.id', $saleid)
                ->where('prc.sst_id', '2')
                ->groupBy('sale_sl.sl_no', 'cfd.cfd_lot_no', 'cfd.cfd_outturn', 'bs.bs_code')
                ->orderBy('bs.bs_code')
                ->orderBy('cfd.cfd_lot_no');



         // $purchase_contract_price = $total_cost + $sl_margin;
         // $purchase_contract_price_pounds = $purchase_contract_price/1.0231;
         // $purchase_contract_differential = $purchase_contract_price_pounds - $hedge;
         // $purchase_contract_value = ($total_kilos/50) * $purchase_contract_price;
        // Do some querying..
        $queryBuilder = $query;


        // Set Column to be displayed
        $columns = [
            'QualityCode' => function($result) {
                return $result->code.'('.$result->quality.')';
            },

            'Lot' => function($result) {
                return $result->lot;
            },
            'Outturn' => function($result) {
                return $result->outturn;
            },
            'Mark' => function($result) {
                return $result->mark;
            },
            'Quality grp' => function($result) {
                return $result->cp_quality.' '.$result->cert;
            },
            'Grade' => function($result) {
                return $result->grade;
            },
            'Kilos' => function($result) {
                return $result->weight;
            },
            'Bags' => function($result) {
                return $result->bags;
            },
            'Pkts' => function($result) {
                return $result->pockets;
            },
            'Costs' => function($result) {
                return $result->price;
            },
            'Value' => function($result) {
                $value_price = $result->weight/50 * $result->price;
                return $value_price;
            },

            'Hedge' => function($result) {
                return $result->hedge;
            },
            'Diff' => function($result) {
                return $result->differential;
            },
            'BRIC_Ctr' => function($result) {
                return $result->bric;
            },
            'Price/Fifty' => function($result) {
                return $result->br_price_per_fifty;
            },
            'Price Pounds' => function($result) {
                return $result->br_price_pounds;
            },
            'Differential' => function($result) {
                return $result->br_diffrential;
            },
            'br_value' => function($result) {
                return $result->br_value;
            },
            'total_cost' => function($result) {
                $value_price = $result->weight * $result->price;
                return $value_price;
            },
            'total_col' => function($result) {
                $total_col = 1;
                return $total_col;
            },
            'total_diff' => function($result) {
                $total_diff = $result->weight * $result->differential;
                return $total_diff;
            }

        ];
        /*
            Generate Report with flexibility to manipulate column class even manipulate column value (using Carbon, etc).

            - of()         : Init the title, meta (filters description to show), query, column (to be shown)
            - editColumn() : To Change column class or manipulate its data for displaying to report
            - editColumns(): Mass edit column
            - showTotal()  : Used to sum all value on specified column on the last table (except using groupBy method). 'point' is a type for displaying total with a thousand separator
            - groupBy()    : Show total of value on specific group. Used with showTotal() enabled.
            - limit()      : Limit record to be showed
            - make()       : Will producing DomPDF / SnappyPdf instance so you could do any other DomPDF / snappyPdf method such as stream() or download()
        */
        return ExcelReport::of($title, $meta, $queryBuilder, $columns)
                        ->editColumns(['br_price_per_fifty', 'br_price_pounds', 'br_diffrential', 'br_value', 'total_cost','total_col', 'total_diff'], [
                            'class' => 'hidden', 'id' => 'hide'
                        ])
                        ->setCss([
                            '.hidden' => 'display: none;'
                        ])
                        ->editColumns(['Kilos', 'Bags', 'Pkts', 'Costs', 'Value', 'Hedge', 'Diff', 'Bric Ctr'], [
                            'class' => 'right'
                        ])
                        ->showTotal([
                            'Kilos' => 'point',
                            'Bags' => 'point',
                            // 'Bags' => 'bags',
                            'Pkts' => 'point',
                            'Costs' => 'costs',                            
                            'Value' => 'value',
                            'Hedge' => 'hedge',
                            'Diff' => 'diff',
                            'br_price_per_fifty' => 'per_fifty',
                            'br_price_pounds' => '',
                            'br_diffrential' => '',
                            'br_value' => '',
                            'total_cost' => '',
                            'total_col' => '',
                            'total_diff' => ''
                        ])
                        // ->showTotalColumns([
                        //     'Costs' => 1
                        //     ])
                        // ->limit(20)
                        ->groupBy('QualityCode')
                        // ->stream(); // or download('filename here..') to download pdf
                        ->download('purchaseforallocationreport_Season_'.$selectedSeason.'_Sale_'.$selectedSale);


    }


}

