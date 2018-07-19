<?php namespace Ngea\Http\Controllers;

use Input;
use confirm;
use DB;
use ask;
use Illuminate\Http\Request;
use Ngea\Http\Controllers\Controller;
use View;
use Auth;
use Mail;

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
use Yajra\Datatables\Datatables;

use Ngea\SaleStatus;
use Ngea\Stock;
use Ngea\CoffeeGrade;
use Ngea\SaleableStatus;
use Ngea\cleancoffee;
use Ngea\BagSizes;
use Ngea\PriceUnits;
use Ngea\PriceType;
use Ngea\CallFrom;
use Ngea\ContractUpdates;
use Ngea\User;


use Ngea\coffeewarrant;
use Ngea\buyer;
use Ngea\saleinfo;
use Ngea\SaleType;
use Ngea\Sale;
use Ngea\Packaging;

use Ngea\Stuffing;
use Ngea\StuffingView;
use Ngea\StockBreakdown;


use  Ngea\Warehouse;
use  Ngea\Weighbridge;

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

use niklasravnsborg\LaravelPdf\Facades\Pdf as PDF;
use Activity;
use Excel;

use Ngea\country;
use Ngea\Months;
use Ngea\Years;


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
use Ngea\StockStatus;
use Ngea\Breakdown_Without_Stuffed;
use Ngea\Breakdown_Full;
use Ngea\StockViewALL;
use Ngea\StockViewStuffed;



use Ngea\greencomments;
use Ngea\direct_sale;
use Ngea\sale_status;
use Ngea\basket;
use Ngea\purchase;
use Ngea\Process;
use Ngea\ProcessAllocation;

use Ngea\Client;
use Ngea\Batch;
use Ngea\StockLocation;
use Ngea\SalesContract;
use Ngea\StockView;
use Ngea\Processes;
use Ngea\Person;
use Ngea\ProcessResults;
use Ngea\bric;


use Ngea\Sales_Contract_Summary;

use PdfReport;

use ExcelReport;

use delete;

ini_set('max_execution_time', 0);

class BreakDownController extends Controller {

    public function updateBreakDownForm (Request $request){

        $grid = $this->getBreakdownGrid();

        return View::make('updatebreakdown', compact('id','grid', 'text', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification'));

    }

    public function updateBreakDown (Request $request) {

        $this->updateBreakDownRatios($request);

        $this->updateStocks(); 

        // $this->updatePurchases(); 

        $grid = $this->getBreakdownGrid();

        return View::make('updatebreakdown', compact('id','grid', 'text', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification'));

    }



    public function updateStocks () {

        // $stock_items = Stock::select('*')->get();
        // $stock_items = Stock::where('id', '7098')->orWhere('id', '7099')->orWhere('id', '7100')->orWhere('id', '6870')->orWhere('id', '6873')->orWhere('id', '6875')->orWhere('id', '6871')->orWhere('id', '6874')->orWhere('id', '6872')->orWhere('id', '7069')->orWhere('id', '7101')->orWhere('id', '7102')->orWhere('id', '6839')->get();

        $stock_items = Stock::where('id', '5762')->orWhere('id', '7354')->orWhere('id', '7188')->orWhere('id', '6867')->orWhere('id', '7002')->orWhere('id', '7095')->orWhere('id', '7096')->orWhere('id', '7194')->orWhere('id', '7195')->orWhere('id', '6625')->orWhere('id', '6870')->get();



        foreach ($stock_items as $key_si => $value_si) {

            $st_id = $value_si->id;

            $st_net_weight = $value_si->st_net_weight;

            $st_bric_value = null;

            $st_br_id = $value_si->br_id;

            $breakdown_details = StockBreakdown::where('st_id', $st_id)->get();

            if (!$breakdown_details->isEmpty()) {

                $value_stb = null;

                foreach ($breakdown_details as $key_stb => $value_stb) {

                    $value_stb = $value_stb;

                    $bric_price = null;

                    $stb_value = null;

                    $stb_value_ratio = null;

                    $br_id = $value_stb->br_id;

                    $stb_weight = $value_stb->stb_bulk_ratio * $st_net_weight;

                    $bric_details = bric::where('id', $br_id)->first();

                    // print_r($br_id."<br>");

                    if ($bric_details != null) {

                        $bric_price = $bric_details->br_price_per_fifty;

                        $stb_value = ($stb_weight/50) * $bric_price;

                        $st_bric_value += $stb_value;

                    }                 
                    

                    StockBreakdown::where('st_id', $st_id)->where('br_id', $br_id)
                            ->update(['stb_value' => $stb_value, 'stb_weight' => $stb_weight]);

                }                          

                $stb_value_ratio = $this->updateValueRatios($breakdown_details, $st_bric_value);                

                Stock::where('id', $st_id)
                            ->update(['st_bric_value' => $st_bric_value]);


            } else if ($st_br_id != null) {

                $bric_details = bric::where('id', $st_br_id)->first();

                if ($bric_details != null) {

                    $bric_price = $bric_details->br_price_per_fifty;

                    $st_bric_value = ($st_net_weight/50) * $bric_price;

                    Stock::where('id', $st_id)
                        ->update(['st_bric_value' => $st_bric_value]);


                }                    

            }


        }

    }

    public function updateValueRatios ($breakdown_details, $st_bric_value){

        foreach ($breakdown_details as $key_stb => $value_stb) {

            $stb_value = $value_stb->stb_value;

            $stb_value_ratio = 0;

            if ($stb_value != 0 && $st_bric_value != 0) {

                $stb_value_ratio = ($stb_value/$st_bric_value);

            }            

            StockBreakdown::where('id', $value_stb->id)
                    ->update(['stb_value_ratio' => $stb_value_ratio]);            

        }

    }

    public function updatePurchases (){

        $purchase_items = purchase::select('*')->get();

        foreach ($purchase_items as $key_pr => $value_pr) {

            $pr_id = $value_pr->id;

            $pr_net_weight = $value_pr->inv_weight;

            $pr_bric_value = null;

            $pr_br_id = $value_pr->br_id;

            $bric_details = bric::where('id', $pr_br_id)->first();

            if ($bric_details != null) {

                $bric_price = $bric_details->br_price_per_fifty;

                $prc_bric_value = ($pr_net_weight/50) * $bric_price;

                purchase::where('id', $pr_id)
                    ->update(['prc_bric_value' => $prc_bric_value]);


            }   

        }

    }


    public function updateBreakDownRatios (Request $request){

        $compute = false;

        if (NULL !== Input::get('updatecontract')) {  

            // $stock_items = Stock::whereNotNull('st_bric_value')->where('id', '5254')->get();

            $stock_items = Stock::where('id', '5762')->orWhere('id', '7354')->orWhere('id', '7188')->orWhere('id', '6867')->orWhere('id', '7002')->orWhere('id', '7095')->orWhere('id', '7096')->orWhere('id', '7194')->orWhere('id', '7195')->orWhere('id', '6625')->orWhere('id', '6870')->get();



            // $stock_items = Stock::whereNotNull('st_bric_value')->get();

            foreach ($stock_items as $key_si => $value_si) {

                $this->standardize($value_si); 

            }

            // $stock_items = Stock::whereNotNull('st_bric_value')->get();

            foreach ($stock_items as $key_si => $value_si) {

                // $compute = $this->checkRatio($value_si); 

                // if ($compute == true) {

                    // print_r($value_si->st_outturn."<br>");

                    $this->determineRatio($value_si);

                // } else {

                    // $this->resetValues($value_si);

                // }             

            }


            foreach ($stock_items as $key_si => $value_si) {

                // $compute = $this->checkRatio($value_si); 

                // if ($compute == true) {

                    // print_r($value_si->st_outturn."<br>");

                    // $this->determineRatio($value_si);

                // } else {

                    // $this->resetValues($value_si);

                // }             

            }

        }

        $grid = $this->getBreakdownGrid();

        return View::make('updatebreakdown', compact('id','grid', 'text', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification'));

    }

    public function resetValues ($value_si) {

        $total_value = 0;

        $total_weight = 0;

        $stock_details = Stock::where('id', $value_si->id)->first();

        $total_value = $value_si->st_bric_value;

        $total_weight = $value_si->st_net_weight;

        $stock_items_breakdown = StockBreakdown::where('st_id', $value_si->id)->get();

        if (!$stock_items_breakdown->isEmpty()) {

            $item_value = 0;

            $item_weight = 0;

            foreach ($stock_items_breakdown as $key_sib => $value_sib) {

                $item_value = $value_sib->stb_value_ratio * $total_value;

                $item_weight = $value_sib->stb_bulk_ratio * $total_weight;

                StockBreakdown::where('st_id', $value_si->id)->where('br_id', $value_sib->br_id)
                            ->update(['stb_value' => $item_value, 'stb_weight' => $item_weight]);

            }

        }                  

    } 

    public function standardize ($value_si) {

        $total_value_ratio = 0;

        $stock_items_breakdown = StockBreakdown::where('st_id', $value_si->id)->get();

        if (!$stock_items_breakdown->isEmpty()) {

            $stock_items_breakdown = StockBreakdown::selectRaw('br_id, st_id, sum(stb_weight) sum_weight, sum(stb_value) sum_value, sum(stb_bulk_ratio) sum_bulk_ratio, sum(stb_value_ratio) sum_value_ratio, cn_id')->where('st_id', $value_si->id)->groupBy('br_id')->get();

            StockBreakdown::where('st_id', $value_si->id)->delete();

            foreach ($stock_items_breakdown as $key_sib => $value_sib) {

                 StockBreakdown::insert(
                             ['br_id' => $value_sib->br_id, 'st_id' => $value_sib->st_id, 'stb_weight' => $value_sib->sum_weight, 'stb_value' => $value_sib->sum_value, 'stb_bulk_ratio' => $value_sib->sum_bulk_ratio, 'stb_value_ratio' => $value_sib->sum_value_ratio, 'cn_id' => $value_sib->cn_id]);

            }



        }                  

    } 


    public function checkRatio ($process_result_stock) {

        $compute = false;

        $total_value_ratio = 0;

        $stock_items_breakdown = StockBreakdown::where('st_id', $process_result_stock->id)->get();

        if (!$stock_items_breakdown->isEmpty()) {

            $total_value_ratio += $this->getTotalRatio($stock_items_breakdown);

            if (number_format($total_value_ratio, 2, '.', '') != '1.00') {

                $compute = true;

            }


        }        

        return  $compute;           

    } 

    public function getTotalRatio ($stock_items_breakdown) {

        $total_value_ratio = 0;

        foreach ($stock_items_breakdown as $key_breakdown => $value_breakdown) {

            $total_value_ratio += $value_breakdown->stb_value_ratio;

        }    

        return  $total_value_ratio;           

    }

    public function updateBalances ($stk_id) {

        $process_results = ProcessResults::where('st_id', $stk_id)->first(); 

        if ($process_results != null) {

            $pr_id = $process_results->pr_id;

            $process_details = Process::where('id', $pr_id)->first();

            $process_number = $process_details->pr_instruction_number;

            $stock_items_similar = Stock::where('st_outturn', $process_number)->get();

            foreach ($stock_items_similar as $key_sis => $value_sis) {   

                $this->standardize($value_sis); 

                $breakdown_details = StockBreakdown::where('st_id', $value_sis->id)->get();
                
                $st_total_value = $value_sis->st_bric_value;

                foreach ($breakdown_details as $key_bd => $value_bd) {

                    $breakdown_details = StockBreakdown::where('st_id', $stk_id)->where('br_id', $value_bd->br_id)->first();

                    if ($breakdown_details != null) {

                        StockBreakdown::where('st_id', $value_bd->st_id)->where('br_id', $value_bd->br_id)->where('stb_bulk_ratio', $value_bd->stb_bulk_ratio)
                                    ->update(['stb_value' => ($breakdown_details->stb_value_ratio * $st_total_value), 'stb_value_ratio' => $breakdown_details->stb_value_ratio]);

                    }

                }
                
            }

        }        

    }

    public function determineRatio ($value_si) {

        $count = 0;

        $pr_id = null;

        $total_value_st = 0;

        $total_value_stb = 0;

        $total_value_st = round($value_si->st_bric_value); 

        $stk_id = $value_si->id;   

        $stock_items_breakdown = StockBreakdown::where('st_id', $stk_id)->get();

        foreach ($stock_items_breakdown as $key_sib => $value_sib) {
                
            $count += 1;

            $total_value_stb += $value_sib->stb_value;

        }

        $total_value_stb = round($total_value_stb);         

        if ($count == 1) {

            StockBreakdown::where('st_id', '=', $stk_id)
                            ->update(['stb_value_ratio' => 1]);  

            if ($total_value_st != 0 && $total_value_st != null) {

                $this->updateBalances($stk_id);

            } 


        } else {

            if ($total_value_st == $total_value_stb && $total_value_stb != 0) {

                foreach ($stock_items_breakdown as $key_sib => $value_sib) {

                    $item_value = $value_sib->stb_value;

                    $item_value_ratio = $item_value/$total_value_stb;

                    StockBreakdown::where('id', '=', $value_sib->id)
                            ->update(['stb_value_ratio' => $item_value_ratio]);  

                }

                if ($total_value_st != 0 && $total_value_st != null) {

                    $this->updateBalances($stk_id);

                } 

            } else {                

                $process_results = ProcessResults::where('st_id', $stk_id)->first(); 

                if ($process_results != null) {

                    $pr_id = $process_results->pr_id;

                    if ($process_results != null) {
                
                        $items_processed = Stock::where('pr_id', $pr_id)->get();  

                        $total_value_stb_old = $this->getTotalValue($pr_id);

                        // $total_value_stb_old = round($total_value_stb_old);   

                        $total_value_stb_old = ($total_value_stb_old);   

                        if ($total_value_stb_old != null) {

                            $GLOBALS = array(null); 

                            StockBreakdown::where('st_id', $stk_id)
                                    ->update(['stb_value' => 0, 'stb_value_ratio' => 0]);

                            foreach ($items_processed as $key_ip => $value_ip) {

                                $stock_items_breakdown = StockBreakdown::where('st_id', $value_ip->id)->get();

                               $stk_id_old = $value_ip->id;  

                               $total_values = $this->computeRatio($stock_items_breakdown, $total_value_stb_old, $stk_id, $pr_id, $stk_id_old, $GLOBALS);                                                           
                               if (isset($total_values) && is_array($total_values)) {

                                   array_push($GLOBALS, $total_values);

                               }


                            }                           

                        }

                    }                    

                }

                if ($total_value_st != 0 && $total_value_st != null) {

                    $this->updateBalances($stk_id);

                }                 

            }

        }
       

    } 

    public function getTotalValue ($pr_id) {

        $total_value = 0;    

        $stock_details = Stock::where('pr_id', $pr_id)->get();

        foreach ($stock_details as $key => $value) {

            $weight_portion = 1;

            $allocation_details = ProcessAllocation::where('pr_id', $pr_id)->where('st_id', $value->id)->first();

            if ($allocation_details != null) {

                $weight_portion = ($allocation_details->pall_allocated_weight/$value->st_net_weight);

            } 

            if ($weight_portion == null) {

                $weight_portion = 1;

            }
            
            $total_value += $value->st_bric_value * $weight_portion; 

        }

        return $total_value;

    } 

    public function computeRatio ($stock_items_breakdown, $total_value, $stk_id, $pr_id, $stk_id_old, $total_values_all) {

        $stb_id = null;

        $st_id = null;

        $st_id_br = null;

        $br_id = null;

        $total_ratio = 0;

        $count = 0;  

        $total_values = array(null); 
            

        if (!$stock_items_breakdown->isEmpty()) {

            foreach ($stock_items_breakdown as $key_breakdown => $value_breakdown) {     

                $bric_value = array();          

                $item_ratio = 0;

                $item_value = 0;  

                $weight_portion = 0;  

                $updated_value = 0;    

                $item_value = $value_breakdown->stb_value;

                $item_ratio = $value_breakdown->stb_value_ratio;

                $st_id_br = $value_breakdown->br_id;

                $count +=1; 


                if ($item_value == "0.0000000000") {

                    // StockBreakdown::where('st_id', $stk_id)->where('br_id', $st_id_br)->where('stb_value', '=', '0.0000000000')
                    //                 ->update(['stb_value' => 0, 'stb_value_ratio' => 0]);

                    // $item_value = StockBreakdown::where('st_id', $stk_id)->where('br_id', $st_id_br)->where('stb_value', '!=', '0.0000000000')->first();

                    // if ($item_value != null) {

                    //     $item_value = $item_value->stb_value;

                    // }   

                    // if ($item_ratio != null) {

                    //     $item_value = ($item_ratio * $total_value);

                    // }    

                         

                }        
// delete();
// Stuffing::insert(
                    // ['sct_id' => $sctID, 'stff_weight_note' => $weight_note_no, 'wb_id' => $wbtk, 'shpr_id' => $shipper, 'stff_weight' => $weight_staffed, 'stff_date' => $date, 'stff_container' => $container_number]);

                $stock_selected = Stock::where('id', $stk_id_old)->first();
                
                if ($item_value == null || $item_value == "0.0000000000") {   

                    $breakdown_details = StockBreakdown::where('st_id', $stk_id_old)->where('br_id', $st_id_br)->first();                 

                    $item_value = ($stock_selected->st_bric_value * $breakdown_details->stb_value_ratio);

                }

                $allocation_details = ProcessAllocation::where('pr_id', $pr_id)->where('st_id', $value_breakdown->st_id)->first();

                $weight_portion = 1;

                if ($allocation_details != null) {

                    $weight_portion = ($allocation_details->pall_allocated_weight/$stock_selected->st_net_weight);

                }

                if ($weight_portion == null) {

                    $weight_portion = 1;

                }

                $item_value = $item_value * $weight_portion;
                
                foreach ($total_values_all as $key_bv => $value_bv) {

                    if ($value_bv != null) {

                        foreach ($value_bv as $key_vb => $value_vb) {

                            if ($value_vb != null) {
                                
                                foreach ($value_vb as $key_vvb => $value_vvb) {

                                    if ($value_vvb != null) {

                                        foreach ($value_vvb as $key_vvvb => $value_vvvb) {

                                            if ($key_vvvb == $st_id_br) {

                                                $item_value = $item_value + $value_vvvb;

                                                $updated_value = $item_value;
                                                // print_r($value_vvvb.'-'.$st_id_br.'-'.$item_value.'/'.$total_value."<br>");

                                            }

                                        }

                                    }     


                                }

                            }
                            
                        }

                    }
                    

                }

                // print_r($stk_id_old.'-'.$st_id_br.'-'.$item_value.'/'.$total_value."<br>");
                
                if ($updated_value != 0) {

                    array_walk_recursive($GLOBALS, function (&$v, $k ) use ($updated_value, $st_id_br) { 

                        if($k == $st_id_br){ 

                            $v = $updated_value; 

                        } 

                    });

                } else {

                    $bric_value[] = array($st_id_br => $item_value); 

                    array_push($total_values, $bric_value);

                }
                if ($item_value <= $total_value && $total_value != 0 ) {                    

                    $item_ratio = $item_value/$total_value;

                    $total_ratio += $item_ratio;                      

                    StockBreakdown::where('st_id', $stk_id)->where('br_id', $st_id_br)
                                    ->update(['stb_value' => $item_value, 'stb_value_ratio' => $item_ratio]);

                }                  

                

            }   

            $process_details = Process::where('id', $pr_id)->first();

            $process_number = $process_details->pr_instruction_number;

            $stock_items_similar = Stock::where('st_outturn', $process_number)->where('id', '!=', $stk_id)->get();

            foreach ($stock_items_similar as $key_sis => $value_sis) {   

                $breakdown_details = StockBreakdown::where('st_id', $value_sis->id)->get();

                foreach ($breakdown_details as $key_bd => $value_bd) {

                    $breakdown_details = StockBreakdown::where('st_id', $stk_id)->where('br_id', $value_bd->br_id)->where('stb_bulk_ratio', $value_bd->stb_bulk_ratio)->first();

                    if ($breakdown_details != null) {

                        StockBreakdown::where('st_id', $value_bd->st_id)->where('br_id', $value_bd->br_id)->where('stb_bulk_ratio', $value_bd->stb_bulk_ratio)
                                    ->update(['stb_value' => 0, 'stb_value_ratio' => $breakdown_details->stb_value_ratio]);

                    }

                    

                }
                

            }


        } else {

            $allocation_details = ProcessAllocation::where('pr_id', $pr_id)->where('st_id', $stk_id_old)->first();

            $stock_selected = Stock::where('id', $stk_id_old)->first();

            $item_value = $stock_selected->st_bric_value;

            $updated_value = 0;

            $weight_portion = 1;

            if ($allocation_details != null) {

                $weight_portion = ($allocation_details->pall_allocated_weight/$stock_selected->st_net_weight);

            }

            if ($weight_portion == null) {

                $weight_portion = 1;

            }
            
            $item_value = $item_value * $weight_portion;

            $st_id_br = $stock_selected->br_id;

            foreach ($total_values_all as $key_bv => $value_bv) {

                if ($value_bv != null) {

                    foreach ($value_bv as $key_vb => $value_vb) {

                        if ($value_vb != null) {
                            
                            foreach ($value_vb as $key_vvb => $value_vvb) {

                                if ($value_vvb != null) {

                                    foreach ($value_vvb as $key_vvvb => $value_vvvb) {

                                        if ($key_vvvb == $st_id_br) {

                                            $item_value = $item_value + $value_vvvb;

                                            $updated_value = $item_value;

                                        }

                                    }

                                }     


                            }

                        }
                        

                    }
                }
                

            }    

            // print_r($total_values_all);

            // print_r($st_id_br.'-'.$item_value.'/'.$total_value."<br>");

            if ($item_value <= $total_value && $total_value != 0 ) {                    

                $item_ratio = $item_value/$total_value;

                $total_ratio += $item_ratio; 

                if ($updated_value != 0) {

                    array_walk_recursive($GLOBALS, function (&$v, $k ) use ($updated_value, $st_id_br) { 

                        if($k == $st_id_br){ 

                            $v = $updated_value; 

                        } 

                    });
                    
                } else {

                    $bric_value[] = array($st_id_br => $item_value); 

                    array_push($total_values, $bric_value);

                }

                

                StockBreakdown::where('st_id', $stk_id)->where('br_id', $st_id_br)
                                ->update(['stb_value' => $item_value, 'stb_value_ratio' => $item_ratio]);


            }
            
            

            // print_r($stk_id_old.'-'.$allocation_details->pall_allocated_weight.'-'.$pr_id.'-'.$item_value.'<br>');  

        }

      return $total_values;

    }

    public function getBreakdownGrid (){
        
       $grid = new Grid(
            (new GridConfig)
                ->setDataProvider(
                    new EloquentDataProvider(Breakdown_Without_Stuffed::query())
                )
                ->setName('BreakDownWithoutStuffed_' . date('d-m-Y'))
                ->setPageSize(50)
                ->setColumns([
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
                        ->setName('br_no')
                        ->setLabel('Bric')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('br_no')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('bs_code')
                        ->setLabel('Code')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('bs_code')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('bs_quality')
                        ->setLabel('Quality')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('bs_quality')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('ibs_code')
                        ->setLabel('Internal Code')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('ibs_code')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('ibs_quality')
                        ->setLabel('Internal Quality')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('ibs_quality')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('st_outturn')
                        ->setLabel('Outturn')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('st_outturn')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('cgrad_name')
                        ->setLabel('Grade')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('cgrad_name')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('cg_name')
                        ->setLabel('Buyer')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('cg_name')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('cb_name')
                        ->setLabel('Grower')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('cb_name')
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
                        ->setName('price')
                        ->setLabel('Price')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('price')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('value')
                        ->setLabel('Value')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('value')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('br_diffrential')
                        ->setLabel('Diff')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('br_diffrential')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('sl_hedge')
                        ->setLabel('Hedge')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('sl_hedge')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('status')
                        ->setLabel('Status')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('status')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('stuffed_weight')
                        ->setLabel('Stuffed_Weight')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('stuffed_weight')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('stuffing_date')
                        ->setLabel('Stuffing_Date')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('stuffing_date')
                                ->setOperator(FilterConfig::OPERATOR_LIKE)
                        )                         
                        ->setSortable(true)
                    ,
                    (new FieldConfig)
                        ->setName('wr_name')
                        ->setLabel('Warehouse')
                        ->addFilter(
                            (new FilterConfig)
                                ->setName('wr_name')
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
                                    new CsvExport(),
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

        return $grid;

    }


}
