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



class PurchaseGridController extends Controller {


  public function purchaseForAllocationGrid (Request $request){
        $id = NULL;
        $Season = Season::all(['id', 'csn_season']);
        $country = country::all(['id', 'ctr_name', 'ctr_initial']);
        $CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
        $Certification = Certification::all(['id', 'crt_name']);
        $Warehouse = NULL;
        $Mill = NULL;

        // $query = sale_lots::where('Sale_Status','=','Available');

        $query = Sale::leftJoin('country_ctr AS ctr', 'ctr.id', '=' ,'sale_sl.ctr_id')

                 // ->leftJoin('country_ctr ctr' , 'ctr.id', '=' ,'sl.ctr_id')

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
                    ,'grn.qp_parameter AS green','cfd.cfd_dnt AS dnt','cfd.cfd_dnt AS touch','prcss.prcss_initial AS prcss_name','qltyd.qltyd_prcss_value AS qltyd_prcss_value','scr.scr_name AS scr_name','qltyd.qltyd_scr_value AS qltyd_scr_value','qltyd.qltyd_acidity AS acidity','qltyd.qltyd_body AS body','qltyd.qltyd_flavour AS flavour','cp.cp_quality AS cp_quality','cp.cp_score AS cp_score','rw.rw_score AS rw_score','rw.rw_quality AS rw_quality','qltyd.qltyd_comments AS final_comments','cb.id AS cbid','cb.cb_name AS buyer','prc.id AS prcid','prc.prc_price AS auc_price','prc.prc_confirmed_price AS price','inv.inv_no AS invoice','prc.inv_weight AS inv_weight','inv.inv_date AS invoice_date','inv_usr.usr_name AS invoice_confirmedby','py.py_no AS py_no','py.py_amount AS payment','py.py_date AS payment_date','py_usr.usr_name AS payment_confirmedby','br.br_no AS bric','br.br_date AS br_date','br_usr.usr_name AS br_confirmedby','bs.id AS bsid','bs.bs_code AS code','bs.bs_quality AS quality','war.war_no AS warrant_no','war.war_weight AS warrant_weight','war.war_date AS warrant_date','war.war_comments AS war_comments','sst.sst_name AS status','rl.rl_no AS rl_no','rl.rl_date AS rl_date','rl.rl_confirmedby AS rl_confirmedby','trp.trp_name AS trp_name', DB::Raw('TRUNCATE((prc.prc_confirmed_price/1.1023 - sale_sl.sl_hedge), 2) As differential') )
                ->where('cb.bt_id', '1')
                ->groupBy('sale_sl.sl_no', 'cfd.cfd_lot_no', 'cfd.cfd_outturn', 'bs.bs_code');

                // ->orderBy('sale_sl.sl_no')
                // ->orderBy('cfd.cfd_lot_no')
                // ->orderBy('bs.bs_code');

            // ->leftJoin('posts', 'users.id', '=', 'posts.user_id')


        $grid = new Grid(
            (new GridConfig)
                ->setDataProvider(
                    new EloquentDataProvider($query)
                )
                ->setName('Allocation_' . date('d-m-Y'))
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

                    // (new FieldConfig)
                    //     ->setName('date')
                    //     ->setLabel('Date')
                    //     ->addFilter(
                    //         (new FilterConfig)
                    //             ->setName('sale_sl.sl_date')
                    //             ->setOperator(FilterConfig::OPERATOR_LIKE)
                    //     )                         
                    //     ->setSortable(true)
                    // ,
                    (new FieldConfig)
                        ->setName('csn_season')
                        ->setLabel('Crop')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('csn.csn_season')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,                    
                    (new FieldConfig)
                        ->setName('sale')
                        ->setLabel('Sale')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('sale_sl.sl_no')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('seller')
                        ->setLabel('MKT Agent')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('slr.slr_initials')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,                    
                    (new FieldConfig)
                        ->setName('lot')
                        ->setLabel('Lot')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('cfd.cfd_lot_no')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,                    
                    (new FieldConfig)
                        ->setName('outturn')
                        ->setLabel('Outturn')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName(DB::Raw('ifnull(prc.inv_outturn,cfd.cfd_outturn)'))
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,  
      
                    (new FieldConfig)
                        ->setName('mark')
                        ->setLabel('Mark')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName(DB::Raw('ifnull(prc.inv_mark,cfd.cfd_grower_mark)'))
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
                    // (new FieldConfig)
                    //     ->setName('warehouse')
                    //     ->setLabel('Warehouse')
                    //     ->addFilter(
                    //         (new FilterConfig)
                    //             ->setName('warehouse')
                    //             ->setOperator(FilterConfig::OPERATOR_LIKE)
                    //     )                         
                    //     ->setSortable(true)
                    // ,
                   (new FieldConfig)
                        ->setName('grade')
                        ->setLabel('Grade')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('cgrad.cgrad_name')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('bags')
                        ->setLabel('Bags')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName(DB::Raw('ifnull(floor((ifnull(war.war_weight,ifnull(prc.inv_weight,cfd.cfd_weight)) / 60)),cfd.cfd_bags)'))
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    
                    (new FieldConfig)
                        ->setName('pockets')
                        ->setLabel('Pockets')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName(DB::Raw('ifnull(floor((ifnull(war.war_weight,ifnull(prc.inv_weight,cfd.cfd_weight)) % 60)),cfd.cfd_pockets)'))
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    
                    ,

                    (new FieldConfig)
                        ->setName('weight')
                        ->setLabel('Weight')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName(DB::Raw('ifnull(war.war_weight, ifnull(prc.inv_weight, cfd.cfd_weight))'))
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,

                    (new FieldConfig)
                        ->setName('cert')
                        ->setLabel('Cert')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('crt.crt_name')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    
                    ,

                    (new FieldConfig)
                        ->setName('green')
                        ->setLabel('Green')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('grn.qp_parameter')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    , 

                    (new FieldConfig)
                        ->setName('qltyd_prcss_value')
                        ->setLabel('Process')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('qltyd.qltyd_prcss_value')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    // (new FieldConfig)
                    //     ->setName('qltyd_prcss_value')
                    //     ->setLabel('%')
                    //     ->addFilter(
                    //         (new FilterConfig)
                    //             ->setName('qltyd_prcss_value')
                    //             ->setOperator(FilterConfig::OPERATOR_LIKE)
                    //     )                         
                    //     ->setSortable(true)
                    // ,
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
                                ->setName('qltyd.qltyd_scr_value')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,

                    // (new FieldConfig)
                    //     ->setName('acidity')
                    //     ->setLabel('A')
                    //     ->addFilter(
                    //         (new FilterConfig)
                    //             ->setName('acidity')
                    //             ->setOperator(FilterConfig::OPERATOR_LIKE)
                    //     )                         
                    //     ->setSortable(true)
                    // ,

                    // (new FieldConfig)
                    //     ->setName('body')
                    //     ->setLabel('B')
                    //     ->addFilter(
                    //         (new FilterConfig)
                    //             ->setName('body')
                    //             ->setOperator(FilterConfig::OPERATOR_LIKE)
                    //     )                         
                    //     ->setSortable(true)
                    // ,

                    // (new FieldConfig)
                    //     ->setName('flavour')
                    //     ->setLabel('F')
                    //     ->addFilter(
                    //         (new FilterConfig)
                    //             ->setName('flavour')
                    //             ->setOperator(FilterConfig::OPERATOR_LIKE)
                    //     )                         
                    //     ->setSortable(true)
                    // ,


                    (new FieldConfig)
                        ->setName('final_comments')
                        ->setLabel('Comments')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('qltyd.qltyd_comments')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    // (new FieldConfig)
                    //     ->setName('rw_score')
                    //     ->setLabel('Raw Score')
                    //     ->addFilter(
                    //         (new FilterConfig)
                    //             ->setName('rw_score')
                    //             ->setOperator(FilterConfig::OPERATOR_LIKE)
                    //     )                         
                    //     ->setSortable(true)
                    // ,
                    (new FieldConfig)
                        ->setName('cp_score')
                        ->setLabel('Cup Score')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('cp.cp_score')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,

                    (new FieldConfig)
                        ->setName('quality')
                        ->setLabel('Quality')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('bs.bs_quality')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('code')
                        ->setLabel('Code')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('bs.bs_code')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,   
                    (new FieldConfig)
                        ->setName('price')
                        ->setLabel('Price')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('prc.prc_confirmed_price')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,


                    // (new FieldConfig)
                    //     ->setName('buyer')
                    //     ->setLabel('Buyer')
                    //     ->addFilter(
                    //         (new FilterConfig)
                    //             ->setName('cb.cb_name')
                    //             ->setOperator(FilterConfig::OPERATOR_LIKE)
                    //     )                         
                    //     ->setSortable(true)
                    // ,

                    (new FieldConfig)
                        ->setName('hedge')
                        ->setLabel('Hedge')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('sale_sl.sl_hedge')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,



                    (new FieldConfig)
                        ->setName('differential')
                        ->setLabel('Diff')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName(DB::Raw('prc.prc_confirmed_price/1.1023 * sale_sl.sl_hedge As differential'))
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('month')
                        ->setLabel('Month')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('sale_sl.sl_month')
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

        return View::make('purchaseforallocation', compact('id','grid', 'text', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification'));

    }

  public function purchaseAveragePriceGrid (Request $request){
        $id = NULL;
        $Season = Season::all(['id', 'csn_season']);
        $country = country::all(['id', 'ctr_name', 'ctr_initial']);
        $CoffeeGrade = CoffeeGrade::all(['id','cgrad_name']);
        $Certification = Certification::all(['id', 'crt_name']);
        $Warehouse = NULL;
        $Mill = NULL;
        $query = sale_lots::leftJoin('coffee_buyers_cb AS cb', 'cb.cb_name', '=', 'buyer')
            ->select('*',DB::Raw('ceil(sum(weight)/60) AS total_bags'), DB::Raw('round(sum(weight*price)/sum(weight),2) AS average_price'),DB::Raw('round(sum(weight * (price/1.1023 - hedge))/sum(weight), 2) AS diff'),DB::Raw('round(sum((weight)/50 * price), 2) AS value'))
            ->where('cb.bt_id', '1')
            ->groupBy('sale', 'code');
        // where('cb.bt_id','=','Available');

        $grid = new Grid(
            (new GridConfig)
                ->setDataProvider(
                    new EloquentDataProvider($query)
                )
                ->setName('Purchase_Summary_' . date('d-m-Y'))
                ->setPageSize(50)
                ->setColumns([
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
                        ->setName('quality')
                        ->setLabel('Quality')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('quality')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('code')
                        ->setLabel('Code')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('code')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,   

                    (new FieldConfig)
                        ->setName('diff')
                        ->setLabel('Ex-Auc Diff')
                    ,

                    (new FieldConfig)
                        ->setName('average_price')
                        ->setLabel('Average Price Per 50 KG')
                    ,              

                    (new FieldConfig)
                        ->setName('total_bags')
                        ->setLabel('Total No of Bags')
                    ,

                    (new FieldConfig)
                        ->setName('value')
                        ->setLabel('Value')
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


                    (new FieldConfig)
                        ->setName('bric')
                        ->setLabel('Bric')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName(DB::Raw('bric'))
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

        return View::make('purchaseaverageprice', compact('id','grid', 'text', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification'));

    }
}

