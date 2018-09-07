<?php namespace Ngea\Http\Controllers;

use Activity;
use Auth;
use delete;
use Excel;
use DB;
use Illuminate\Http\Request;
use Input;
use Ngea\InternalBaskets;
use Ngea\bric;
use Ngea\buyer;
use Ngea\Certification;
use Ngea\CoffeeGrade;
use Ngea\coffee_certification;
use Ngea\coffee_details;
use Ngea\country;
use Ngea\cupscore;
use Ngea\greencomments;

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

class InternalBasketController extends Controller
{


    public function basketInternalForm(Request $request)
    {
        $id            = null;
        $Season        = Season::all(['id', 'csn_season']);
        $country       = country::all(['id', 'ctr_name', 'ctr_initial']);
        $CoffeeGrade   = CoffeeGrade::all(['id', 'cgrad_name']);
        $Certification = Certification::all(['id', 'crt_name']);
        $buyer         = buyer::where('bt_id', '1')->get();

        $sale_status = sale_status::all(['id', 'sst_name']);
        $Warehouse   = null;
        $Mill        = null;

        return View::make('basketinternal', compact('id', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'largest', 'greensize', 'greencolor', 'greendefects', 'processing', 'cupscore', 'rawscore', 'screens', 'buyer', 'sale_status'));

    }

    public function basketInternal(Request $request)
    {
        $id = null;

        $Warehouse = null;
        $Mill      = null;
        if (Input::get('country')) {
            $CoffeeGrade = CoffeeGrade::where('ctr_id', Input::get('country'))->get();
            $cupscore    = cupscore::where('ctr_id', Input::get('country'))->get();
        }

        $greensize    = quality_parameters::where('qg_id', '1')->get();
        $greencolor   = quality_parameters::where('qg_id', '2')->get();
        $greendefects = quality_parameters::where('qg_id', '3')->get();
        $processing   = processing::all(['id', 'prcss_name']);
        $buyer        = buyer::where('bt_id', '1')->get();
        $sale_status  = sale_status::all(['id', 'sst_name']);
        // $basket       = basket::where('ctr_id', Input::get('country'))->get();
        $basket      = InternalBaskets::where('ctr_id', Input::get('country'))->orderBy('ibs_code')->get();
        
        $screens = screens::all(['id', 'scr_name']);

        $cupscore = cupscore::all(['id', 'cp_score', 'cp_quality']);
        $rawscore = rawscore::all(['id', 'rw_score', 'rw_quality']);

        $Certification = Certification::all(['id', 'crt_name']);

        $slr  = Input::get('seller');
        $bskt = Input::get('basket');

        $sale_cb_id = Input::get('coffee_buyer');

        $grade = Input::get('coffee_grade');
        $cupid = Input::get('cup');
        $crt   = Input::get('certified');

        if (null !== Input::get('updatebasket')) {
            $this->validate($request, [
                'country' => 'required', 'sale_season' => 'required', 'sale' => 'required', 'coffee_buyer' => 'required', 'basket' => 'required',
            ]);

            $country = Input::get('country');
            $season  = Input::get('sale_season');
            $sale    = Input::get('sale');

            $coffee_buyer = Input::get('coffee_buyer');
            $basket = Input::get('basket');

            $basketlot = Input::get('basketlot');
            $saleid    = Input::get('sale');

            $basketIds            = array(Input::get('basket'), 'NULL');
            $sale_lots_unassigned = sale_lots::where('ibsid', Input::get('basket'))->where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('status', 'Confirmed')->orWhere('ibsid', null)->where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('status', 'Confirmed')->get();

            for ($i = 0; $i < count($sale_lots_unassigned); $i++) {
                $pdetails = purchase::where('cfd_id', $sale_lots_unassigned[$i]->id)->first();
                $pid      = $pdetails->id;
                purchase::where('id', '=', $pid)
                    ->update(['ibs_id' => null]);
            }

            //update basket
            for ($i = 0; $i < count($basketlot); $i++) {
                $pdetails = purchase::where('cfd_id', $basketlot[$i])->first();
                $pid      = $pdetails->id;
                purchase::where('id', '=', $pid)
                    ->update(['ibs_id' => $basket]);
                Activity::log('Updated basket for coffeeid' . $basketlot[$i] . ' with internal basket id ' . $basket);
            }

            $Season  = Season::all(['id', 'csn_season']);
            $country = country::all(['id', 'ctr_name', 'ctr_initial']);
            $sale    = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->get();

            $cid        = Input::get('country');
            $csn_season = Input::get('sale_season');
            $saleid     = Input::get('sale');
            $basket     = InternalBaskets::where('ctr_id', Input::get('country'))->get();

            // $sale_lots_unassigned = sale_lots::where('bsid', Input::get('basket'))->where('slid', $saleid)->where('cbid',Input::get('coffee_buyer'))->where('status', 'Confirmed')->orWhere('bsid', NULL)->where('slid', $saleid)->where('cbid',Input::get('coffee_buyer'))->where('status', 'Confirmed')->get();
            $sale_lots_unassigned = sale_lots::select('*');
            $sale_lots_unassigned = $sale_lots_unassigned->where('ibsid', Input::get('basket'))->where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('status', 'Confirmed')->orWhere('ibsid', null)->where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('status', 'Confirmed');
            if ($grade != null) {
                $sale_lots_unassigned = $sale_lots_unassigned->where('grade', $grade);
            }
            if ($cupid != null && $cupid != 'NA') {
                $sale_lots_unassigned = $sale_lots_unassigned->where('cp_quality', $cupid);
            }
            if ($crt != null) {
                $sale_lots_unassigned = $sale_lots_unassigned->whereNotNull('cert');
            }
            $sale_lots_unassigned = $sale_lots_unassigned->get();

            $sale_lots = sale_lots::where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('ibsid', Input::get('basket'))->where('status', 'Confirmed')->get();

            return View::make('basketinternal', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'sale_lots', 'seller', 'saleid', 'cdetails', 'buyer', 'sale_status', 'basket', 'pdetails', 'slr', 'sale_cb_id', 'bskt', 'sale_lots_unassigned', 'cupscore', 'grade', 'cupid', 'crt'));

        } else if (null !== Input::get('filter')) {
            $Season  = Season::all(['id', 'csn_season']);
            $country = country::all(['id', 'ctr_name', 'ctr_initial']);
            $region  = Region::where('ctr_id', Input::get('country'))->get();

            if (Input::get('country') != null) {
                $Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
                $Mill      = mills_region::where('ctr_id', Input::get('country'))->get();
                $seller    = seller::where('ctr_id', Input::get('country'))->get();
            }

            if ($request->has('country')) {
                if ($request->has('sale_season') & Input::get('sale_season') !== "Sale Season") {

                    if ($request->has('sale') && Input::get('sale') != 'Sale No.') {
                        $sale = Sale::where('id', '=', Input::get('sale'))->where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->orderBy('sl_no')->first();
                        if ($sale->sl_quality_confirmedby == null) {
                            $request->session()->flash('alert-warning', 'Catalogue quality details for sale ' . $sale->sl_no . ' have not yet been confirmed. Please confirm to continue.');
                            // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
                            $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->orderBy('sl_no')->get();
                            $request->session()->flash('alert-success', 'Sale found!!');
                            $cid        = Input::get('country');
                            $csn_season = Input::get('sale_season');
                            // $saleid = Input::get('sale');

                            // $sale_lots = sale_lots::where('slid', $saleid)->get();

                            return View::make('basketinternal', compact('id',
                                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'bskt', 'cupscore', 'grade', 'cupid', 'crt'));
                        } else {
                            // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
                            // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
                            $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->orderBy('sl_no')->get();
                            // $request->session()->flash('alert-success', 'Sale found!!');
                            $cid        = Input::get('country');
                            $csn_season = Input::get('sale_season');
                            $saleid     = Input::get('sale');

                            $basketIds = array(Input::get('basket'), null);

                            $sale_lots = sale_lots::where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('ibsid', Input::get('basket'))->where('status', 'Confirmed')->get();

                            $sale_lots_unassigned = sale_lots::select('*');
                            $sale_lots_unassigned = $sale_lots_unassigned->where('ibsid', Input::get('basket'))->where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('status', 'Confirmed')->orWhere('ibsid', null)->where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('status', 'Confirmed');
                            if ($grade != null) {
                                $sale_lots_unassigned = $sale_lots_unassigned->where('grade', $grade);
                            }
                            if ($cupid != null && $cupid != 'NA') {
                                $sale_lots_unassigned = $sale_lots_unassigned->where('cp_quality', $cupid);
                            }
                            if ($crt != null) {
                                $sale_lots_unassigned = $sale_lots_unassigned->whereNotNull('cert');
                            }
                            $sale_lots_unassigned = $sale_lots_unassigned->get();

                            // $sale_lots = sale_lots::where('slid', $saleid)->get();

                            return View::make('basketinternal', compact('id',
                                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'bskt', 'sale_lots_unassigned', 'cupscore', 'grade', 'cupid', 'crt'));
                        }

                    } else {
                        // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
                        // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
                        $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->orderBy('sl_no')->get();
                        // $request->session()->flash('alert-success', 'Sale found!!');
                        $cid        = Input::get('country');
                        $csn_season = Input::get('sale_season');
                        return View::make('basketinternal', compact('id',
                            'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'bskt', 'cupscore', 'grade', 'cupid', 'crt'));
                    }

                } else {
                    // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
                    // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
                    $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->orderBy('sl_no')->get();
                    // $request->session()->flash('alert-success', 'Sale found!!');
                    $cid        = Input::get('country');
                    $csn_season = Input::get('sale_season');
                    return View::make('basketinternal', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'bskt', 'cupscore', 'grade', 'cupid', 'crt'));
                }
            } else {

                return redirect('basketinternal')
                    ->withErrors("Please select a valid Country!!")->withInput();
            }

            return View::make('basketinternal', compact('id', 'Season', 'country', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'bskt', 'cupscore', 'grade', 'cupid', 'crt'));
        } else if (null !== Input::get('selectall')) {
            $this->validate($request, [
                'country' => 'required', 'sale_season' => 'required', 'sale' => 'required', 'coffee_buyer' => 'required', 'basket' => 'required',
            ]);

            $country = Input::get('country');
            $season  = Input::get('sale_season');
            $sale    = Input::get('sale');

            $coffee_buyer = Input::get('coffee_buyer');
            //        $price = Input::get('price');
            //        $confirmed_price = Input::get('cprice');
            $basket = Input::get('basket');

            $basketlot = Input::get('basketlot');
            $saleid    = Input::get('sale');

            $basketIds            = array(Input::get('basket'), 'NULL');
            $sale_lots_unassigned = sale_lots::select('*');
            $sale_lots_unassigned = $sale_lots_unassigned->where('ibsid', Input::get('basket'))->where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('status', 'Confirmed')->orWhere('ibsid', null)->where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('status', 'Confirmed');
            if ($grade != null) {
                $sale_lots_unassigned = $sale_lots_unassigned->where('grade', $grade);
            }
            if ($cupid != null && $cupid != 'NA') {
                $sale_lots_unassigned = $sale_lots_unassigned->where('cp_quality', $cupid);
            }
            if ($crt != null) {
                $sale_lots_unassigned = $sale_lots_unassigned->whereNotNull('cert');
            }
            $sale_lots_unassigned = $sale_lots_unassigned->get();

            // $sale_lots_unassigned = sale_lots::where('bsid', Input::get('basket'))->where('slid', $saleid)->where('cbid',Input::get('coffee_buyer'))->where('status', 'Confirmed')->orWhere('bsid', NULL)->where('slid', $saleid)->where('cbid',Input::get('coffee_buyer'))->where('status', 'Confirmed')->get();
            //set all to null
            for ($i = 0; $i < count($sale_lots_unassigned); $i++) {
                $pdetails = purchase::where('cfd_id', $sale_lots_unassigned[$i]->id)->first();
                $pid      = $pdetails->id;
                purchase::where('id', '=', $pid)
                    ->update(['ibs_id' => $basket]);
            }

            //update basket
            // for ($i = 0; $i < count($basketlot); $i++) {
            //     $pdetails = purchase::where('cfd_id', $basketlot[$i])->first();
            //     $pid = $pdetails->id;
            //     purchase::where('id', '=', $pid)
            //         ->update(['bs_id' =>  $basket]);
            //     Activity::log('Updated basket for coffeeid'.$basketlot[$i]. ' with basket id '. $basket);
            // }

            $Season  = Season::all(['id', 'csn_season']);
            $country = country::all(['id', 'ctr_name', 'ctr_initial']);
            $sale    = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->get();

            $cid        = Input::get('country');
            $csn_season = Input::get('sale_season');
            $saleid     = Input::get('sale');
            $basket     = InternalBaskets::where('ctr_id', Input::get('country'))->get();

            // $sale_lots_unassigned = sale_lots::where('bsid', Input::get('basket'))->where('slid', $saleid)->where('cbid',Input::get('coffee_buyer'))->where('status', 'Confirmed')->orWhere('bsid', NULL)->where('slid', $saleid)->where('cbid',Input::get('coffee_buyer'))->where('status', 'Confirmed')->get();
            $sale_lots_unassigned = sale_lots::select('*');
            $sale_lots_unassigned = $sale_lots_unassigned->where('ibsid', Input::get('basket'))->where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('status', 'Confirmed')->orWhere('ibsid', null)->where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('status', 'Confirmed');
            if ($grade != null) {
                $sale_lots_unassigned = $sale_lots_unassigned->where('grade', $grade);
            }
            if ($cupid != null && $cupid != 'NA') {
                $sale_lots_unassigned = $sale_lots_unassigned->where('cp_quality', $cupid);
            }
            if ($crt != null) {
                $sale_lots_unassigned = $sale_lots_unassigned->whereNotNull('cert');
            }
            $sale_lots_unassigned = $sale_lots_unassigned->get();

            $sale_lots = sale_lots::where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('ibsid', Input::get('basket'))->where('status', 'Confirmed')->get();

            return View::make('basketinternal', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'sale_lots', 'seller', 'saleid', 'cdetails', 'buyer', 'sale_status', 'basket', 'pdetails', 'slr', 'sale_cb_id', 'bskt', 'sale_lots_unassigned', 'cupscore', 'grade', 'cupid', 'crt'));
        } else if (null !== Input::get('unselectall')) {
            $this->validate($request, [
                'country' => 'required', 'sale_season' => 'required', 'sale' => 'required', 'coffee_buyer' => 'required', 'basket' => 'required',
            ]);

            $country = Input::get('country');
            $season  = Input::get('sale_season');
            $sale    = Input::get('sale');

            $coffee_buyer = Input::get('coffee_buyer');
            //        $price = Input::get('price');
            //        $confirmed_price = Input::get('cprice');
            $basket = Input::get('basket');

            $basketlot = Input::get('basketlot');
            $saleid    = Input::get('sale');

            $basketIds            = array(Input::get('basket'), 'NULL');
            $sale_lots_unassigned = sale_lots::select('*');
            $sale_lots_unassigned = $sale_lots_unassigned->where('ibsid', Input::get('basket'))->where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('status', 'Confirmed')->orWhere('ibsid', null)->where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('status', 'Confirmed');
            if ($grade != null) {
                $sale_lots_unassigned = $sale_lots_unassigned->where('grade', $grade);
            }
            if ($cupid != null && $cupid != 'NA') {
                $sale_lots_unassigned = $sale_lots_unassigned->where('cp_quality', $cupid);
            }
            if ($crt != null) {
                $sale_lots_unassigned = $sale_lots_unassigned->whereNotNull('cert');
            }
            $sale_lots_unassigned = $sale_lots_unassigned->get();

            // $sale_lots_unassigned = sale_lots::where('bsid', Input::get('basket'))->where('slid', $saleid)->where('cbid',Input::get('coffee_buyer'))->where('status', 'Confirmed')->orWhere('bsid', NULL)->where('slid', $saleid)->where('cbid',Input::get('coffee_buyer'))->where('status', 'Confirmed')->get();
            //set all to null
            for ($i = 0; $i < count($sale_lots_unassigned); $i++) {
                $pdetails = purchase::where('cfd_id', $sale_lots_unassigned[$i]->id)->first();
                $pid      = $pdetails->id;
                purchase::where('id', '=', $pid)
                    ->update(['ibs_id' => null]);
            }

            //update basket
            // for ($i = 0; $i < count($basketlot); $i++) {
            //     $pdetails = purchase::where('cfd_id', $basketlot[$i])->first();
            //     $pid = $pdetails->id;
            //     purchase::where('id', '=', $pid)
            //         ->update(['bs_id' =>  $basket]);
            //     Activity::log('Updated basket for coffeeid'.$basketlot[$i]. ' with basket id '. $basket);
            // }

            $Season  = Season::all(['id', 'csn_season']);
            $country = country::all(['id', 'ctr_name', 'ctr_initial']);
            $sale    = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->get();

            $cid        = Input::get('country');
            $csn_season = Input::get('sale_season');
            $saleid     = Input::get('sale');
            $basket     = InternalBaskets::where('ctr_id', Input::get('country'))->get();

            // $sale_lots_unassigned = sale_lots::where('bsid', Input::get('basket'))->where('slid', $saleid)->where('cbid',Input::get('coffee_buyer'))->where('status', 'Confirmed')->orWhere('bsid', NULL)->where('slid', $saleid)->where('cbid',Input::get('coffee_buyer'))->where('status', 'Confirmed')->get();
            $sale_lots_unassigned = sale_lots::select('*');
            $sale_lots_unassigned = $sale_lots_unassigned->where('ibsid', Input::get('basket'))->where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('status', 'Confirmed')->orWhere('ibsid', null)->where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('status', 'Confirmed');
            if ($grade != null) {
                $sale_lots_unassigned = $sale_lots_unassigned->where('grade', $grade);
            }
            if ($cupid != null && $cupid != 'NA') {
                $sale_lots_unassigned = $sale_lots_unassigned->where('cp_quality', $cupid);
            }
            if ($crt != null) {
                $sale_lots_unassigned = $sale_lots_unassigned->whereNotNull('cert');
            }
            $sale_lots_unassigned = $sale_lots_unassigned->get();

            $sale_lots = sale_lots::where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('ibsid', Input::get('basket'))->where('status', 'Confirmed')->get();

            return View::make('basketinternal', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'sale_lots', 'seller', 'saleid', 'cdetails', 'buyer', 'sale_status', 'basket', 'pdetails', 'slr', 'sale_cb_id', 'bskt', 'sale_lots_unassigned', 'cupscore', 'grade', 'cupid', 'crt'));
        } else {
            $Season  = Season::all(['id', 'csn_season']);
            $country = country::all(['id', 'ctr_name', 'ctr_initial']);
            $region  = Region::where('ctr_id', Input::get('country'))->get();

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
                            // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
                            $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->orderBy('sl_no')->get();
                            $request->session()->flash('alert-success', 'Sale found!!');
                            $cid        = Input::get('country');
                            $csn_season = Input::get('sale_season');
                            // $saleid = Input::get('sale');

                            // $sale_lots = sale_lots::where('slid', $saleid)->get();

                            return View::make('basketinternal', compact('id',
                                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'bskt', 'cupscore', 'grade', 'cupid', 'crt'));
                        } else {
                            // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
                            // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
                            $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->orderBy('sl_no')->get();
                            // $request->session()->flash('alert-success', 'Sale found!!');
                            $cid        = Input::get('country');
                            $csn_season = Input::get('sale_season');
                            $saleid     = Input::get('sale');

                            $basketIds = array(Input::get('basket'), null);

                            $sale_lots = sale_lots::where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('ibsid', Input::get('basket'))->where('status', 'Confirmed')->get();

                            $sale_lots_unassigned = sale_lots::where('ibsid', Input::get('basket'))->where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('status', 'Confirmed')->orWhere('ibsid', null)->where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('status', 'Confirmed')->get();

                            // $sale_lots = sale_lots::where('slid', $saleid)->get();

                            return View::make('basketinternal', compact('id',
                                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'bskt', 'sale_lots_unassigned', 'cupscore', 'grade', 'cupid', 'crt'));
                        }

                    } else {
                        // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
                        // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
                        $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->orderBy('sl_no')->get();
                        // $request->session()->flash('alert-success', 'Sale found!!');
                        $cid        = Input::get('country');
                        $csn_season = Input::get('sale_season');
                        return View::make('basketinternal', compact('id',
                            'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'bskt', 'cupscore', 'grade', 'cupid', 'crt'));
                    }

                } else {
                    // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
                    // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
                    $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->orderBy('sl_no')->get();
                    // $request->session()->flash('alert-success', 'Sale found!!');
                    $cid        = Input::get('country');
                    $csn_season = Input::get('sale_season');
                    return View::make('basketinternal', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'bskt', 'cupscore', 'grade', 'cupid', 'crt'));
                }
            } else {

                return redirect('basketinternal')
                    ->withErrors("Please select a valid Country!!")->withInput();
            }

            return View::make('basketinternal', compact('id', 'Season', 'country', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'bskt', 'cupscore', 'grade', 'cupid', 'crt'));
        }

    }


}