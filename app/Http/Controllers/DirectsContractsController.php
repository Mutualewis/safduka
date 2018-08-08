<?php namespace Ngea\Http\Controllers;

use Activity;
use Auth;
use delete;
use Excel;
use DB;
use Illuminate\Http\Request;
use Input;
use Ngea\InternalBaskets;
use Ngea\basket;
use Ngea\bric;
use Ngea\buyer;
use Ngea\Certification;
use Ngea\CoffeeGrade;
use Ngea\coffee_certification;
use Ngea\coffee_details;
use Ngea\country;
use Ngea\cupscore;
use Ngea\greencomments;
use Ngea\Growers;
use Ngea\Http\Controllers\Controller;
use Ngea\invoices;
// use Anouar\Fpdf\Fpdf as Fpdf;

use Ngea\Mill;
use Ngea\mills_region;
use Ngea\payment;
use Ngea\processing;
use Ngea\purchase;
use Ngea\Person;
use Ngea\quality_details;
use Ngea\quality_parameters;
use Ngea\rawscore;
use Ngea\Region;
use Ngea\release;
use Ngea\release_instructions;
use Ngea\Sale;
use Ngea\SaleType;
use Ngea\sale_lots;
use Ngea\sale_status;
use Ngea\screens;
use Ngea\Season;
use Ngea\seller;
use Ngea\trading_months;
use Ngea\transporters;
use Ngea\User;
use Ngea\Warehouse;
use Ngea\warehouses_region;
use Ngea\warrants;
use niklasravnsborg\LaravelPdf\Facades\Pdf as PDF;
use View;

class DirectsContractsController extends Controller
{

    public function bricContractsDirectForm(Request $request)
    {
        $id            = null;
        $Season        = Season::all(['id', 'csn_season']);
        $country       = country::all(['id', 'ctr_name', 'ctr_initial']);
        $CoffeeGrade   = CoffeeGrade::all(['id', 'cgrad_name']);
        $Certification = Certification::all(['id', 'crt_name']);
        $buyer = buyer::where('bt_id', '1')->get();

        $sale_status = sale_status::all(['id', 'sst_name']);
        $Warehouse   = null;
        $Mill        = null;

        return View::make('briccontractsdirect', compact('id', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'largest', 'greensize', 'greencolor', 'greendefects', 'processing', 'cupscore', 'rawscore', 'screens', 'buyer', 'sale_status'));

    }

    public function bricContractsDirect(Request $request)
    {
        $id = null;

        $Warehouse = null;
        $Mill      = null;

        $greensize    = quality_parameters::where('qg_id', '1')->get();
        $greencolor   = quality_parameters::where('qg_id', '2')->get();
        $greendefects = quality_parameters::where('qg_id', '3')->get();
        $processing   = processing::all(['id', 'prcss_name']);
        $buyer       = buyer::where('bt_id', '1')->get();
        $sale_status = sale_status::all(['id', 'sst_name']);
        $basket      = basket::where('ctr_id', Input::get('country'))->orderBy('bs_code')->get();
        $screens = screens::all(['id', 'scr_name']);

        $Growers = Growers::where('ctr_id', Input::get('country'))->orderBy('cg_name')->get();

        $cupscore = cupscore::all(['id', 'cp_score', 'cp_quality']);
        $rawscore = rawscore::all(['id', 'rw_score', 'rw_quality']);

        $Certification = Certification::all(['id', 'crt_name']);

        $slr  = Input::get('seller');
        $bskt = Input::get('basket');

        $sale_cb_id = Input::get('coffee_buyer');

        $cgrw = Input::get('coffee_grower');



        if (null !== Input::get('submitbric')) {
            $this->validate($request, [
                'country' => 'required', 'sale_season' => 'required', 'sale' => 'required', 'coffee_buyer' => 'required', 'basket' => 'required', 'bric' => 'required', 'date' => 'required',
            ]);

            $country = Input::get('country');
            $season  = Input::get('sale_season');
            $sale    = Input::get('sale');
            $lot     = Input::get('sif_lot');
            $outturn = Input::get('outt_number');
            $mark    = Input::get('coffee_grower');

            $coffee_buyer    = Input::get('coffee_buyer');
            $price           = Input::get('price');
            $confirmed_price = Input::get('cprice');
            $basket          = Input::get('basket');
            $sale_status     = Input::get('sale_status');
            $saleid          = Input::get('sale');
            $comments        = Input::get('comments');



            $warrant_no     = Input::get('warrant_no');
            $warrant_weight = Input::get('warrant_weight');
            $date           = Input::get('date');
            $date           = date_create($date);
            $date           = date_format($date, "Y-m-d");

            $bric            = Input::get('bric');
            $count_confirmed = Input::get('count_confirmed');

            $sale_lots = sale_lots::where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('bsid', Input::get('basket'))->where('status', 'Confirmed')->where('cgid', $cgrw)->get();

            $user_data = Auth::user();
            $user      = $user_data->id;
            $brcdetails = bric::where('br_no', $bric)->first();
            $sum_bric_weight = NULL;

            foreach ($sale_lots->all() as $value) {
                $sum_bric_weight += $value->weight;
            }

            $total_cost = Input::get('total_cost');
            $total_kilos = Input::get('total_kilos');

            $sale_details = Sale::where('id', $sale)->first();

            $sl_margin = $sale_details->sl_margin;
            $hedge = $sale_details->sl_hedge;
            $sale_lots_sale_type = sale_lots::where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('bsid', Input::get('basket'))->where('status', 'Confirmed')->first();

            if ($sale_lots_sale_type != null) {
                $fob = $sale_lots_sale_type->fobprice;
                $cbid = Input::get('coffee_buyer');
                $cgid = $sale_lots_sale_type->cgid;
            }
            
            $purchase_contract_price = $total_cost + $sl_margin;
            $purchase_contract_price_pounds = $purchase_contract_price/1.10231;
            $purchase_contract_differential = $purchase_contract_price_pounds - $hedge;
            $purchase_contract_value = ($total_kilos/50) * $purchase_contract_price;

            if ($fob != null) {
                $purchase_contract_value = $purchase_contract_value + ($total_kilos/50) *$fob;
            }
            
            if ($brcdetails != null) {
                $br_id = $brcdetails->id;

                bric::where('id', '=', $br_id)
                    ->update(['br_no' => $bric, 'bs_id' => $basket, 'br_date' => $date, 'br_hedge' => $hedge, 'br_confirmedby' => $user, 'br_purchased_weight' => $sum_bric_weight, 'br_price_per_fifty' => $purchase_contract_price, 'br_price_pounds' => $purchase_contract_price_pounds, 'br_diffrential' => $purchase_contract_differential, 'br_value' => $purchase_contract_value, 'cb_id' => $cbid, 'cg_id' => $cgid]);

                Activity::log('Updated bric information with bric no. ' . $bric . ' date ' . $date . ' confirmed by ' . $user. ' sum_bric_weight ' . $sum_bric_weight. ' purchase_contract_price ' . $purchase_contract_price. ' purchase_contract_price_pounds ' . $purchase_contract_price_pounds. ' purchase_contract_differential ' . $purchase_contract_differential. ' purchase_contract_value ' . $purchase_contract_value);

                $request->session()->flash('alert-success', 'Bric Information Updated!!');

            } else {
                $br_id = bric::insertGetId(
                    ['br_no' => $bric,'bs_id' => $basket, 'br_date' => $date, 'br_hedge' => $hedge,'br_confirmedby' => $user, 'br_purchased_weight' => $sum_bric_weight, 'br_price_per_fifty' => $purchase_contract_price, 'br_price_pounds' => $purchase_contract_price_pounds, 'br_diffrential' => $purchase_contract_differential, 'br_value' => $purchase_contract_value, 'cb_id' => $cbid, 'cg_id' => $cgid]);
                $request->session()->flash('alert-success', 'Bric Information Added!!');
                Activity::log('Inserted bric information with bric no. ' . $bric . ' date ' . $date . ' confirmed by ' . $user. ' sum_bric_weight ' . $sum_bric_weight. ' purchase_contract_price ' . $purchase_contract_price. ' purchase_contract_price_pounds ' . $purchase_contract_price_pounds. ' purchase_contract_differential ' . $purchase_contract_differential. ' purchase_contract_value ' . $purchase_contract_value);
            }
            $coffeeid = null;

            $purchase_contract_price = $total_cost + $sl_margin;
            $purchase_contract_price_pounds = $purchase_contract_price/1.10231;
            $purchase_contract_differential = $purchase_contract_price_pounds - $hedge;
            $purchase_contract_value = ($total_kilos/50) * $purchase_contract_price;

            if ($fob != null) {

                $purchase_contract_value = $purchase_contract_value + ($total_kilos/50) *$fob;

                $purchase_contract_price = $purchase_contract_price + $fob;
                
            }


            //update purchases
            foreach ($sale_lots->all() as $value) {

                $coffeeid = $value->id;

                $pdetails = purchase::where('cfd_id', $value->id)->first();

                $pid = $pdetails->id;

                $bric_ratio = $value->weight/$sum_bric_weight;

                $cost_value = ($value->weight/50) * $value->price;

                $bric_value = ($value->weight/50) * $purchase_contract_price;

                // $bric_price = $value->price + $value->sl_margin;

                // $bric_value = ($value->weight/50) * $bric_price;

                // if ( $value->fobprice != null ) {

                //     $bric_value = $bric_value + ( $value->weight/50 ) * $value->fobprice ;

                // }

                purchase::where('id', '=', $pid)
                    ->update(['br_id' => $br_id, 'prc_purchase_contract_ratio' => $bric_ratio, 'prc_hedge' => $hedge, 'prc_value' => $cost_value, 'prc_bric_value' => $bric_value]);
                Activity::log('Updated purchase information with bric no. ' . $bric . ' date ' . $date . ' confirmed by ' . $user);

            }

            $Season      = Season::all(['id', 'csn_season']);
            $country     = country::all(['id', 'ctr_name', 'ctr_initial']);
            $CoffeeGrade = CoffeeGrade::all(['id', 'cgrad_name']);
            $region      = Region::where('ctr_id', Input::get('country'))->get();

            $pdetails = purchase::where('cfd_id', $coffeeid)->first();

            if (Input::get('country') != null) {
                $Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
                $Mill      = mills_region::where('ctr_id', Input::get('country'))->get();
                $seller    = seller::where('ctr_id', Input::get('country'))->get();
            }
            $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sltyp_id', '2')->orderByRaw('LENGTH(`sl_no`) ASC')->orderBy('sl_no')->get();

            $cid        = Input::get('country');
            $csn_season = Input::get('sale_season');
            $saleid     = Input::get('sale');

            $sale_status = sale_status::all(['id', 'sst_name']);
            $basket      = basket::where('ctr_id', Input::get('country'))->orderBy('bs_code')->get();

            $sale_lots   = sale_lots::where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('bsid', Input::get('basket'))->where('status', 'Confirmed')->where('cgid', $cgrw)->get();

            

            return View::make('briccontractsdirect', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'sale_lots', 'seller', 'saleid', 'cdetails', 'buyer', 'sale_status', 'basket', 'pdetails', 'slr', 'sale_cb_id', 'bskt', 'Growers', 'cgrw'));

        } else {

            $Season      = Season::all(['id', 'csn_season']);
            $country     = country::all(['id', 'ctr_name', 'ctr_initial']);
            $CoffeeGrade = CoffeeGrade::all(['id', 'cgrad_name']);
            $region      = Region::where('ctr_id', Input::get('country'))->get();

            if (Input::get('country') != null) {
                $Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
                $Mill      = mills_region::where('ctr_id', Input::get('country'))->get();
                $seller    = seller::where('ctr_id', Input::get('country'))->get();
            }

            if ($request->has('country')) {
                if ($request->has('sale_season') & Input::get('sale_season') !== "Sale Season") {

                    if ($request->has('sale') && Input::get('sale') != 'Sale No.') {
                        $sale = Sale::where('id', '=', Input::get('sale'))->where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->first();
                        if ($sale->sl_quality_confirmedby == null) {
                            $request->session()->flash('alert-warning', 'Catalogue quality details for sale ' . $sale->sl_no . ' have not yet been confirmed. Please confirm to continue.');
                            $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sltyp_id', '2')->orderByRaw('LENGTH(`sl_no`) ASC')->orderBy('sl_no')->get();

                            $request->session()->flash('alert-success', 'Sale found!!');
                            $cid        = Input::get('country');
                            $csn_season = Input::get('sale_season');

                            return View::make('briccontractsdirect', compact('id',
                                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'bskt', 'Growers', 'cgrw'));
                        } else if ($cgrw != null ) {
                            $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sltyp_id', '2')->orderByRaw('LENGTH(`sl_no`) ASC')->orderBy('sl_no')->get();
                            $cid        = Input::get('country');
                            $csn_season = Input::get('sale_season');
                            $saleid     = Input::get('sale');

                            $sale_type = Sale::where('id', $saleid)->first();


                            // $sale_lots_sale_type = sale_lots::where('slid', $saleid)->first();
                            $sale_lots_sale_type = null;
                            $bskt = null;
                            if ($sale_lots_sale_type != null) {
                                $bskt = $sale_lots_sale_type->bsid; 
                                $sale_cb_id = $sale_lots_sale_type->cbid;     

                            }


                            if ($sale_cb_id == null) {
                                $sale_cb_id = Input::get('coffee_buyer');
                            }
                            if ($bskt == null) {
                                $bskt = Input::get('basket');
                            }

                            $sale_lots = sale_lots::where('slid', $saleid)->where('cbid', $sale_cb_id)->where('bsid', $bskt)->where('status', 'Confirmed')->where('cgid', $cgrw)->get();

                            return View::make('briccontractsdirect', compact('id',
                                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'bskt', 'Growers', 'cgrw'));
                        } else {
                            $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sltyp_id', '2')->orderByRaw('LENGTH(`sl_no`) ASC')->orderBy('sl_no')->get();
                            $cid        = Input::get('country');
                            $csn_season = Input::get('sale_season');
                            $saleid     = Input::get('sale');
                            return View::make('briccontractsdirect', compact('id',
                                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'bskt', 'Growers', 'cgrw'));
                        }

                    } else {
                        $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sltyp_id', '2')->orderByRaw('LENGTH(`sl_no`) ASC')->orderBy('sl_no')->get();
                        $cid        = Input::get('country');
                        $csn_season = Input::get('sale_season');
                        return View::make('briccontractsdirect', compact('id',
                            'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'bskt', 'Growers', 'cgrw'));
                    }

                } else {
                    $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sltyp_id', '2')->orderByRaw('LENGTH(`sl_no`) ASC')->orderBy('sl_no')->get();
                    $cid        = Input::get('country');
                    $csn_season = Input::get('sale_season');
                    return View::make('briccontractsdirect', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'bskt', 'Growers', 'cgrw'));
                }
            } else {

                return redirect('briccontractsdirect')
                    ->withErrors("Please select a valid Country!!")->withInput();
            }

            return View::make('briccontractsdirect', compact('id', 'Season', 'country', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'bskt', 'Growers', 'cgrw'));
        }

    }


}
