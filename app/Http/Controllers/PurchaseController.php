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

class PurchaseController extends Controller
{

    public function catalogueUploadForm(Request $request)
    {
        
        $id      = null;
        
        $Season  = Season::all(['id', 'csn_season']);
        
        $country = country::all(['id', 'ctr_name', 'ctr_initial']);
        
        return View::make('catalogueupload', compact('id', 'Season', 'country'));


    }

    public function downloadExcelCatalogue($type)
    {
        
        return Excel::load('template_catalogue.xlsx', function ($reader) {
        })->download();

    }

    public function uploadCatalogue(Request $request)
    {
        $Season  = Season::all(['id', 'csn_season']);
        $country = country::all(['id', 'ctr_name', 'ctr_initial']);

        if (null !== Input::get('submitcatalogue')) {
            $path = Input::file('import_file')->getRealPath();

            if ($path != null) {

                if ($request->has('sale') && Input::get('sale') != "No Sale Found") {

                    $data = Excel::load($path, function ($reader) {
                    })->get();

                    if (!empty($data) && $data->count()) {

                        $data = $data->first();
                        foreach ($data as $key => $value) {

                            $sale      = Input::get('sale');
                            $lot       = trim($value->lot);
                            $season    = Input::get('sale_season');
                            $outturn   = trim($value->outturn);
                            $outturn   = preg_replace('/\s+/', '', $outturn);
                            $seller    = trim($value->seller);
                            $mark      = trim($value->mark);
                            $mill      = trim($value->mill);
                            $region    = trim($value->region);
                            $warehouse = trim($value->warehouse);
                            $grade     = trim($value->grade);
                            $kilos     = trim($value->kg);
                            $bags      = trim(trim($value->bags));
                            $pkts      = trim($value->pkt);
                            $cert      = trim($value->cert);

                            if ($lot != null) {
                                $SellerDB = seller::where('slr_name', $seller)->first();
                                if (empty($SellerDB)) {
                                    $SellerDB = seller::where('slr_initials', $seller)->first();

                                    if (empty($SellerDB) && $seller != null) {

                                        return redirect('catalogueupload')
                                            ->withErrors("Seller " . $seller . " was not found in the database and cannot be empty!! ")
                                            ->withInput();
                                    }

                                }
                                $sellerID = $SellerDB->id;

                                $RegionDB = region::where('rgn_name', $region)->first();
                                if (empty($RegionDB)) {
                                    $RegionDB = region::where('rgn_description', $region)->first();
                                    return redirect('catalogueupload')
                                        ->withErrors("Region " . $region . " was not found in the database and cannot be empty!! ")
                                        ->withInput();
                                }
                                $regionID = $RegionDB->id;

                                $MillDB = mill::where('ml_name', $mill)->first();
                                if (empty($MillDB)) {
                                    $MillDB = mill::where('ml_initials', $mill)->first();
                                    if (empty($MillDB)) {
                                        $MillDB = mill::where('ml_description', $mill)->first();

                                        if (empty($MillDB)) {
                                            return redirect('catalogueupload')
                                                ->withErrors("Mill " . $mill . " was not found in the database and cannot be empty!! ")
                                                ->withInput();

                                        }

                                    }

                                }
                                $millID = $MillDB->id;

                                $WarehouseDB = Warehouse::where('wr_name', $warehouse)->where('rgn_id', $regionID)->first();
                                if (empty($WarehouseDB)) {
                                    $WarehouseDB = Warehouse::where('wr_initials', $warehouse)->where('rgn_id', $regionID)->first();
                                    if (empty($WarehouseDB)) {
                                        $WarehouseDB = Warehouse::where('wr_description', $warehouse)->where('rgn_id', $regionID)->first();

                                        if (empty($WarehouseDB)) {
                                            return redirect('catalogueupload')
                                                ->withErrors("Warehouse " . $warehouse . " for region " . $region . " was not found in the database and cannot be empty!! ")
                                                ->withInput();

                                        }

                                    }

                                }
                                $warehouseID = $WarehouseDB->id;

                                $CoffeeGrade = CoffeeGrade::where('cgrad_name', $grade)->first();
                                if ($CoffeeGrade->cgrad_name != $grade) {
                                    return redirect('catalogueupload')
                                        ->withErrors("Grade " . $grade . " was not found in the database!! ")
                                        ->withInput();
                                }
                                $gradeid = $CoffeeGrade->id;

                                $CertDB = explode(',', $cert);
                                foreach ($CertDB as $key => $value) {
                                    $CertDB = certification::where('crt_name', $value)->first();
                                    if (empty($CertDB) && $value != null) {
                                        $CertDB = certification::where('crt_description', $value)->first();
                                        if (empty($CertDB)) {
                                            return redirect('catalogueupload')
                                                ->withErrors("Certification " . $value . " was not found in the database and cannot be empty!! ")
                                                ->withInput();
                                        }
                                    }
                                    $certID  = $CertDB->id;
                                    $certs[] = ['sale' => $sale, 'lot' => $lot, 'outturn' => $outturn, 'season' => $season, 'certID' => $certID];
                                }
                                $cdetails = coffee_details::where('sl_id', $sale)->where('csn_id', $season)->where('cfd_lot_no', $lot)->first();

                                if (!empty($cdetails)) {
                                    return redirect('catalogueupload')
                                        ->withErrors("Lot number " . $lot . " already exists for a similiar sale and season!! ")
                                        ->withInput();
                                }
                                $cdetails = coffee_details::where('cfd_outturn', $outturn)->where('sl_id', $sale)->where('csn_id', $season)->where('cfd_lot_no', $lot)->first();

                                if (empty($cdetails)) {
                                    $insert[] = ['csn_id' => $season, 'sl_id' => $sale, 'cfd_lot_no' => $lot, 'cfd_outturn' => $outturn, 'wr_id' => $warehouseID, 'cfd_grower_mark' => $mark, 'cgrad_id' => $gradeid, 'cfd_weight' => $kilos, 'cfd_bags' => $bags, 'cfd_pockets' => $pkts, 'slr_id' => $sellerID, 'ml_id' => $millID];
                                } else {
                                    return redirect('catalogueupload')
                                        ->withErrors("Lot number " . $lot . ", outturn " . $outturn . " already exists for a similiar sale and season!! ")
                                        ->withInput();
                                }

                            }
                        }

                        if (!empty($insert)) {
                            coffee_details::insert($insert);
                        }
                        foreach ($certs as $key => $value) {
                            $cdetails = coffee_details::where('cfd_outturn', $value["outturn"])->where('sl_id', $value["sale"])->where('csn_id', $value["season"])->where('cfd_lot_no', $value["lot"])->first();

                            coffee_certification::insert(
                                ['cfd_id' => $cdetails->id, 'crt_id' => $value["certID"]]
                            );
                        }

                        $cid        = Input::get('country');
                        $csn_season = Input::get('sale_season');
                        $sale       = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->first();
                        Activity::log('Uploaded catalogue for sale ' . $sale->sl_no . ' Season ' . $csn_season . ' country ' . $cid);
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

        } else if ($request->has('country')) {

            if ($request->has('sale_season') & Input::get('sale_season') !== "Sale Season") {

                // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
                $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sltyp_id', '1')->orderBy('sl_no')->get();
                // $request->session()->flash('alert-success', 'Sale found!!');
                $cid        = Input::get('country');
                $csn_season = Input::get('sale_season');
                return View::make('catalogueupload', compact('id', 'Season', 'country', 'sale', 'cid', 'csn_season'));
            } else {
                // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
                $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sltyp_id', '1')->orderBy('sl_no')->get();
                // $request->session()->flash('alert-success', 'Sale found!!');
                $cid        = Input::get('country');
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
    }

    public function stockIntakeForm(Request $request)
    {
        $id            = null;
        $Season        = Season::all(['id', 'csn_season']);
        $country       = country::all(['id', 'ctr_name', 'ctr_initial']);
        $CoffeeGrade   = CoffeeGrade::all(['id', 'cgrad_name']);
        $Certification = Certification::all(['id', 'crt_name']);
        $buyer         = buyer::all(['id', 'cb_name']);

        $sale_status = sale_status::all(['id', 'sst_name']);
        $Warehouse   = null;
        $Mill        = null;

        return View::make('stockindividual', compact('id', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'largest', 'greensize', 'greencolor', 'greendefects', 'processing', 'cupscore', 'rawscore', 'screens', 'buyer', 'sale_status'));

    }

    public function stockIntake(Request $request)
    {
        $id = null;

        $Warehouse = null;
        $Mill      = null;

        $greensize    = quality_parameters::where('qg_id', '1')->get();
        $greencolor   = quality_parameters::where('qg_id', '2')->get();
        $greendefects = quality_parameters::where('qg_id', '3')->get();
        $processing   = processing::all(['id', 'prcss_name']);
        $buyer        = buyer::all(['id', 'cb_name']);
        $sale_status  = sale_status::all(['id', 'sst_name']);
        $basket       = basket::where('ctr_id', Input::get('country'))->get();

        $screens = screens::all(['id', 'scr_name']);

        $cupscore = cupscore::all(['id', 'cp_score', 'cp_quality']);
        $rawscore = rawscore::all(['id', 'rw_score', 'rw_quality']);

        $Certification = Certification::all(['id', 'crt_name']);

        $slr = Input::get('seller');
        // $data['dnt'] = (\Input::has('dnt')) ? 1 : 0;
        // $data['dnt'] = $request->input('dnt', 1);
        // $form->save($data);
        //$request->save($data);
        // print_r(Input::get('dnt')." search". Input::get('searchButton'));

        if (null !== Input::get('submitlot')) {
            $this->validate($request, [
                'country' => 'required', 'sale_season' => 'required', 'sale' => 'required', 'sif_lot' => 'required', 'outt_number' => 'required', 'coffee_grower' => 'required',
            ]);

            $country = Input::get('country');
            $season  = Input::get('sale_season');
            $sale    = Input::get('sale');
            $lot     = Input::get('sif_lot');
            $outturn = Input::get('outt_number');
            $mark    = Input::get('coffee_grower');

            $coffee_buyer = Input::get('coffee_buyer');
            $price        = Input::get('price');
            $basket       = Input::get('basket');
            $sale_status  = Input::get('sale_status');

            $warrant_no     = Input::get('warrant_no');
            $warrant_weight = Input::get('warrant_weight');
            $date           = Input::get('date');
            $saleid         = Input::get('sale');

            $basketInternal = null;

            $basketInternal = basket::where('id', $basket )->first();

            if (!is_null($basketInternal)) {

                $basketInternal = InternalBaskets::where('ibs_code', $basketInternal->bs_code )->first();

            }

            if (!is_null($basketInternal)) {

                $basketInternal = $basketInternal->id;

            }

            // $cdetails = coffee_details::where('cfd_outturn', $outturn)->where('sl_id', $sale)->where('csn_id', $season)->where('cfd_lot_no', $lot)->first();
            if ($request->has('seller') && Input::get('seller') != null) {

                $sale_lots = sale_lots::where('slid', $saleid)->where('slrid', Input::get('seller'))->get();

                $cdetails  = coffee_details::where('sl_id', $saleid)->where('cfd_lot_no', $lot)->where('slr_id', Input::get('seller'))->first();

            } else {
                $sale_lots = sale_lots::where('slid', $saleid)->get();
                $cdetails  = coffee_details::where('sl_id', $saleid)->where('cfd_lot_no', $lot)->first();

            }

            $coffeeid = $cdetails->id;

            $pdetails = purchase::where('cfd_id', $coffeeid)->first();

            // print_r($pdetails);
            // $coffeeid = $cdetails->id;

            if ($pdetails != null) {
                $pid = $pdetails->id;
                purchase::where('id', '=', $pid)
                    ->update(['cfd_id' => $coffeeid, 'cb_id' => $coffee_buyer, 'prc_price' => $price, 'sst_id' => $sale_status, 'bs_id' => $basket, 'ibs_id' => $basketInternal]);

                // purchase::where('id', '=', $pid)
                //     ->update(['cb_id' => $coffee_buyer,  'prc_price' =>  $price, 'prc_confirmed_price' =>  $price, 'sst_id'=> $sale_status, 'bs_id'=> $basket, 'prc_warrant_no'=> $warrant_no, 'prc_warrant_weight'=> $warrant_weight]);
                $request->session()->flash('alert-success', 'Purchase Information Updated!!');

                // 'id', 'cfd_id', 'cb_id', 'prc_price', 'bs_id', 'sst_id', 'prc_warrant_no', 'prc_warrant_weight', 'prc_invoice_no', 'created_at', 'updated_at'
                Activity::log('Updated purchase information for ' . $lot . ' coffee_buyer id ' . $coffee_buyer . ' with price ' . $price . ' sale_status id ' . $sale_status . ' warrant_no ' . $warrant_no . ' warrant_weight ' . $warrant_weight . 'basket ID ' . $basket);

            } else {
                purchase::insert(
                    ['cfd_id' => $coffeeid, 'cb_id' => $coffee_buyer, 'prc_price' => $price, 'sst_id' => $sale_status, 'bs_id' => $basket, 'ibs_id' => $basketInternal]);

                // purchase::insert(
                //     ['cfd_id' => $coffeeid,'cb_id' => $coffee_buyer,  'prc_price' =>  $price, 'prc_confirmed_price' =>  $price, 'sst_id'=> $sale_status, 'bs_id'=> $basket, 'prc_warrant_no'=> $warrant_no, 'prc_warrant_weight'=> $warrant_weight]
                // );
                $request->session()->flash('alert-success', 'Purchase Information Added!!');
                Activity::log('Added purchase information for ' . $lot . ' coffee_buyer id ' . $coffee_buyer . ' with price ' . $price . ' sale_status id ' . $sale_status . ' warrant_no ' . $warrant_no . ' warrant_weight ' . $warrant_weight . 'basket ID ' . $basket);

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
            // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
            // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
            $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sltyp_id', '1')->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', null)->orderBy('sl_no')->get();

            $cid        = Input::get('country');
            $csn_season = Input::get('sale_season');
            $saleid     = Input::get('sale');
            // $sale_lots = sale_lots::where('slid', $saleid)->get();
            if ($request->has('seller') && Input::get('seller') != null) {
                $sale_lots = sale_lots::where('slid', $saleid)->where('slrid', Input::get('seller'))->get();
                $cdetails  = coffee_details::where('sl_id', $saleid)->where('cfd_lot_no', $lot)->where('slr_id', Input::get('seller'))->first();

            } else {
                $sale_lots = sale_lots::where('slid', $saleid)->get();
                $cdetails  = coffee_details::where('sl_id', $saleid)->where('cfd_lot_no', $lot)->first();

            }

            // $request->session()->flash('alert-success', 'Purchase Information Added!!');

            $sale_status = sale_status::all(['id', 'sst_name']);
            $basket      = basket::where('ctr_id', Input::get('country'))->get();

            return View::make('stockindividual', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'sale_lots', 'saleid', 'cdetails', 'buyer', 'sale_status', 'basket', 'pdetails', 'slr', 'seller'));
            #,'CoffeeGrade', 'sale_lots', 'saleid', 'cdetails','buyer', 'sale_status', 'basket'

        } else if (null !== Input::get('searchButton')) {
            $country = Input::get('country');
            $season  = Input::get('sale_season');
            $sale    = Input::get('sale');
            $lot     = Input::get('sif_lot');
            $saleid  = Input::get('sale');

            if ($request->has('seller') && Input::get('seller') != null) {
                $sale_lots = sale_lots::where('slid', $saleid)->where('slrid', Input::get('seller'))->get();
                $cdetails  = coffee_details::where('sl_id', $saleid)->where('cfd_lot_no', $lot)->where('slr_id', Input::get('seller'))->first();

            } else {
                $sale_lots = sale_lots::where('slid', $saleid)->get();
                $cdetails  = coffee_details::where('sl_id', $saleid)->where('cfd_lot_no', $lot)->first();

            }

            // $cdetails = coffee_details::where('sl_id', $sale)->where('csn_id', $season)->where('cfd_lot_no', $lot)->first();
            $coffeeid      = $cdetails->id;
            $greencomments = greencomments::where('cfd_id', $coffeeid)->get();

            $Season      = Season::all(['id', 'csn_season']);
            $country     = country::all(['id', 'ctr_name', 'ctr_initial']);
            $CoffeeGrade = CoffeeGrade::all(['id', 'cgrad_name']);
            $region      = Region::where('ctr_id', Input::get('country'))->get();

            if (Input::get('country') != null) {
                $Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
                $Mill      = mills_region::where('ctr_id', Input::get('country'))->get();
                $seller    = seller::where('ctr_id', Input::get('country'))->get();
            }
            // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
            // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
            $sale       = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sltyp_id', '1')->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', null)->orderBy('sl_no')->get();
            $cid        = Input::get('country');
            $csn_season = Input::get('sale_season');
            $saleid     = Input::get('sale');

            // $sale_lots = sale_lots::where('slid', $saleid)->get();
            $qdetails = quality_details::where('cfd_id', $coffeeid)->first();

            $pdetails = purchase::where('cfd_id', $coffeeid)->first();

            if ($cdetails !== null) {
                $request->session()->flash('alert-success', 'Sale Lot Found!!');

                return View::make('stockindividual', compact('id',
                    'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'cdetails', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'buyer', 'sale_status', 'basket', 'pdetails', 'slr'));

            } else {
                $request->session()->flash('alert-warning', 'Lot not found!');

                return View::make('stockindividual', compact('id',
                    'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'buyer', 'sale_status', 'basket', 'pdetails', 'slr'));

            }

        } else if (null !== Input::get('nextButton')) {
            $country = Input::get('country');
            $season  = Input::get('sale_season');
            $sale    = Input::get('sale');
            $lot     = Input::get('sif_lot');

            $cdetails = coffee_details::where('sl_id', $sale)->where('cfd_lot_no', '>', $lot)->min('id');

            if ($request->has('seller') && Input::get('seller') != null) {
                $sale_lots = sale_lots::where('slid', Input::get('sale'))->where('slrid', Input::get('seller'))->get();
                $cdetails  = coffee_details::where('id', $cdetails)->where('slr_id', Input::get('seller'))->first();

            } else {
                $sale_lots = sale_lots::where('slid', Input::get('sale'))->get();
                $cdetails  = coffee_details::where('id', $cdetails)->first();
            }

            // $cdetails = coffee_details::where('id', $cdetails)->first();
            $coffeeid      = $cdetails->id;
            $greencomments = greencomments::where('cfd_id', $coffeeid)->get();
            // print_r($cdetails);

            $qdetails = quality_details::where('cfd_id', $coffeeid)->first();

            $Season      = Season::all(['id', 'csn_season']);
            $country     = country::all(['id', 'ctr_name', 'ctr_initial']);
            $CoffeeGrade = CoffeeGrade::all(['id', 'cgrad_name']);
            $region      = Region::where('ctr_id', Input::get('country'))->get();

            if (Input::get('country') != null) {
                $Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
                $Mill      = mills_region::where('ctr_id', Input::get('country'))->get();
                $seller    = seller::where('ctr_id', Input::get('country'))->get();
            }
            // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
            // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
            $sale       = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sltyp_id', '1')->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', null)->orderBy('sl_no')->get();
            $cid        = Input::get('country');
            $csn_season = Input::get('sale_season');
            $saleid     = Input::get('sale');
            // $sale_lots = sale_lots::where('slid', $saleid)->get();
            $pdetails = purchase::where('cfd_id', $coffeeid)->first();

            if ($cdetails !== null) {
                $request->session()->flash('alert-success', 'Sale Lot Found!!');

                return View::make('stockindividual', compact('id',
                    'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'cdetails', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'buyer', 'sale_status', 'basket', 'pdetails', 'slr'));

            } else {
                $request->session()->flash('alert-warning', 'Lot not found!');

                return View::make('stockindividual', compact('id',
                    'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'buyer', 'sale_status', 'basket', 'pdetails', 'slr'));

            }

        } else if (null !== Input::get('previousButton')) {
            $country = Input::get('country');
            $season  = Input::get('sale_season');
            $sale    = Input::get('sale');
            $lot     = Input::get('sif_lot');

            $cdetails = coffee_details::where('sl_id', $sale)->where('cfd_lot_no', '<', $lot)->max('id');
            // $cdetails = coffee_details::where('id', $cdetails)->first();

            if ($request->has('seller') && Input::get('seller') != null) {
                $sale_lots = sale_lots::where('slid', Input::get('sale'))->where('slrid', Input::get('seller'))->get();
                $cdetails  = coffee_details::where('id', $cdetails)->where('slr_id', Input::get('seller'))->first();

            } else {
                $sale_lots = sale_lots::where('slid', Input::get('sale'))->get();
                $cdetails  = coffee_details::where('id', $cdetails)->first();
            }

            $coffeeid = $cdetails->id;
            $qdetails = quality_details::where('cfd_id', $coffeeid)->first();

            $greencomments = greencomments::where('cfd_id', $coffeeid)->get();

            $Season      = Season::all(['id', 'csn_season']);
            $country     = country::all(['id', 'ctr_name', 'ctr_initial']);
            $CoffeeGrade = CoffeeGrade::all(['id', 'cgrad_name']);
            $region      = Region::where('ctr_id', Input::get('country'))->get();
            $pdetails    = purchase::where('cfd_id', $coffeeid)->first();

            if (Input::get('country') != null) {
                $Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
                $Mill      = mills_region::where('ctr_id', Input::get('country'))->get();
                $seller    = seller::where('ctr_id', Input::get('country'))->get();
            }
            // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
            // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();

            $sale       = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sltyp_id', '1')->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', null)->orderBy('sl_no')->get();
            $cid        = Input::get('country');
            $csn_season = Input::get('sale_season');
            $saleid     = Input::get('sale');
            // $sale_lots = sale_lots::where('slid', $saleid)->get();

            if ($cdetails !== null) {
                $request->session()->flash('alert-success', 'Sale Lot Found!!');

                return View::make('stockindividual', compact('id',
                    'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'cdetails', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'buyer', 'sale_status', 'basket', 'pdetails', 'slr'));

            } else {
                $request->session()->flash('alert-warning', 'Lot not found!');

                return View::make('stockindividual', compact('id',
                    'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'buyer', 'sale_status', 'basket', 'pdetails', 'slr'));

            }

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
                        $sale = Sale::where('id', '=', Input::get('sale'))->where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sltyp_id', '1')->orderBy('sl_no')->first();
                        if ($sale->sl_quality_confirmedby == null) {
                            $request->session()->flash('alert-warning', 'Catalogue quality details for sale ' . $sale->sl_no . ' have not yet been confirmed. Please confirm to continue.');
                            // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
                            $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sltyp_id', '1')->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', null)->orderBy('sl_no')->get();
                            $request->session()->flash('alert-success', 'Sale found!!');
                            $cid        = Input::get('country');
                            $csn_season = Input::get('sale_season');
                            // $saleid = Input::get('sale');
                            // $sale_lots = sale_lots::where('slid', $saleid)->get();

                            return View::make('stockindividual', compact('id',
                                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr'));
                        } else {
                            // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
                            // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
                            $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sltyp_id', '1')->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', null)->orderBy('sl_no')->get();
                            // $request->session()->flash('alert-success', 'Sale found!!');
                            $cid        = Input::get('country');
                            $csn_season = Input::get('sale_season');
                            $saleid     = Input::get('sale');
                            // $sale_lots = sale_lots::where('slid', $saleid)->get();

                            if ($request->has('seller') && Input::get('seller') != null) {
                                $sale_lots = sale_lots::where('slid', $saleid)->where('slrid', Input::get('seller'))->get();
                            } else {
                                $sale_lots = sale_lots::where('slid', $saleid)->get();
                            }
                            return View::make('stockindividual', compact('id',
                                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr'));
                        }

                    } else {
                        // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
                        // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
                        // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '==', null)->get();
                        $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sltyp_id', '1')->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', null)->orderBy('sl_no')->get();

                        $saleid = Input::get('sale');
                        if ($request->has('seller') && Input::get('seller') != null) {
                            $sale_lots = sale_lots::where('slid', $saleid)->where('slrid', Input::get('seller'))->get();
                        } else {
                            $sale_lots = sale_lots::where('slid', $saleid)->get();
                        }

                        // $request->session()->flash('alert-success', 'Sale found!!');
                        $cid        = Input::get('country');
                        $csn_season = Input::get('sale_season');
                        return View::make('stockindividual', compact('id',
                            'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr'));
                    }

                } else {
                    // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
                    // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
                    $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sltyp_id', '1')->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', null)->orderBy('sl_no')->get();
                    // $request->session()->flash('alert-success', 'Sale found!!');
                    $cid        = Input::get('country');
                    $csn_season = Input::get('sale_season');
                    return View::make('stockindividual', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr'));
                }
            } else {

                return redirect('stockindividual')
                    ->withErrors("Please select a valid Country!!")->withInput();
            }

            return View::make('stockindividual', compact('id', 'Season', 'country', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr'));
        }

    }

    public function stockUploadForm(Request $request)
    {
        $id      = null;
        $Season  = Season::all(['id', 'csn_season']);
        $country = country::all(['id', 'ctr_name', 'ctr_initial']);
        return View::make('stockupload', compact('id', 'Season', 'country'));

    }

    public function downloadExcelAuction($type)
    {
        return Excel::load('template_auction.xlsx', function ($reader) {
        })->download();
    }

    public function uploadStockList(Request $request)
    {
        $Season  = Season::all(['id', 'csn_season']);
        $country = country::all(['id', 'ctr_name', 'ctr_initial']);

        if (null !== Input::get('submitcatalogue')) {
            $path = Input::file('import_file')->getRealPath();

            if ($path != null) {

                if ($request->has('sale') && Input::get('sale') != "No Sale Found") {

                    $data = Excel::load($path, function ($reader) {
                    })->get();

                    if (!empty($data) && $data->count()) {

                        $data = $data->first();
                        foreach ($data as $key => $value) {

                            $sale             = Input::get('sale');
                            $lot              = trim($value->lot);
                            $season           = Input::get('sale_season');
                            $selected_country = Input::get('country');

                            $outturn = trim($value->outturn);
                            $outturn = preg_replace('/\s+/', '', $outturn);
                            $buyer   = trim($value->buyer);
                            $price   = trim($value->price);
                            $status  = trim($value->status);
                            $basket  = trim($value->basket);

                            if ($lot != null) {

                                $BuyerDB = buyer::where('cb_name', $buyer)->first();
                                if (empty($BuyerDB)) {
                                    $BuyerDB = buyer::where('cb_code', $buyer)->first();

                                    if (empty($BuyerDB) && $buyer != null) {

                                        return redirect('stockupload')
                                            ->withErrors("Buyer " . $buyer . " was not found in the database and cannot be empty!! ")
                                            ->withInput();
                                    }

                                }
                                $buyerID = $BuyerDB->id;

                                $StatusDB = sale_status::where('sst_name', $status)->first();
                                if (empty($StatusDB)) {
                                    $StatusDB = sale_status::where('sst_description', $status)->first();
                                    if (empty($StatusDB) && $status != null) {

                                        return redirect('stockupload')
                                            ->withErrors("Status " . $status . " was not found in the database and cannot be empty!! ")
                                            ->withInput();
                                    }
                                }
                                $statusID = $StatusDB->id;

                                $BasketDB = basket::where('bs_code', $basket)->where('ctr_id', $selected_country)->first();
                                if (empty($BasketDB)) {
                                    $BasketDB = basket::where('bs_quality', $basket)->where('ctr_id', $selected_country)->first();
                                    if (empty($BasketDB)) {
                                        $BasketDB = basket::where('bs_description', $basket)->where('ctr_id', $selected_country)->first();

                                        if (empty($BasketDB)) {
                                            return redirect('stockupload')
                                                ->withErrors("Basket " . $basket . " was not found in the database and cannot be empty!! ")
                                                ->withInput();

                                        }

                                    }

                                }

                                $basketID = $BasketDB->id;

                                $BasketInternalDB = InternalBaskets::where('ibs_code', $basket)->where('ctr_id', $selected_country)->first();
                                if (empty($BasketInternalDB)) {
                                    $BasketInternalDB = basket::where('ibs_quality', $basket)->where('ctr_id', $selected_country)->first();
                                    if (empty($BasketInternalDB)) {
                                        $BasketInternalDB = basket::where('ibs_description', $basket)->where('ctr_id', $selected_country)->first();

                                        if (empty($BasketInternalDB)) {
                                            return redirect('stockupload')
                                                ->withErrors("Internal Basket " . $BasketInternalDB . " was not found in the database and cannot be empty!! ")
                                                ->withInput();

                                        }

                                    }

                                }

                                $basketInternalID = $BasketInternalDB->id;


                                if ($price == null) {
                                    return redirect('stockupload')
                                        ->withErrors("Price for lot " . $lot . " cannot be empty!! ")
                                        ->withInput();

                                }

                                

                                $cdetails = coffee_details::where('cfd_outturn', $outturn)->where('sl_id', $sale)->where('csn_id', $season)->where('cfd_lot_no', $lot)->first();

                                $saleDB = Sale::where('id', $sale)->first();

                                $hedge = $saleDB->sl_hedge;

                                $value = $cdetails->cfd_weight/50 * $price;

                                if (!empty($cdetails)) {
                                    $insert[] = ['cfd_id' => $cdetails->id, 'cb_id' => $buyerID, 'prc_price' => $price, 'prc_confirmed_price' => $price, 'bs_id' => $basketID, 'sst_id' => $statusID, 'prc_value' => $value, 'prc_hedge' => $hedge, 'ibs_id' => $basketInternalID];
                                } else {
                                    return redirect('stockupload')
                                        ->withErrors("Lot number " . $lot . ", outturn " . $outturn . " does not exist in that sale!! ")
                                        ->withInput();
                                }
                                $purchase = purchase::where('cfd_id', $cdetails->id)->first();

                                if ($purchase) {
                                    $purchase->delete();
                                }

                            }

                        }
                    }

                    if (!empty($insert)) {
                        purchase::insert($insert);
                    }

                    $cid        = Input::get('country');
                    $csn_season = Input::get('sale_season');
                    $sale       = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->first();
                    Activity::log('Uploaded auction details for sale ' . $sale->sl_no . ' Season ' . $csn_season . ' country ' . $cid);
                    $request->session()->flash('alert-success', 'Auction details uploaded successfully!!');

                    $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sltyp_id', '1')->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', null)->orderBy('sl_no')->get();

                    return View::make('stockupload', compact('id', 'Season', 'country', 'sale', 'cid', 'csn_season'));

                    // } else {
                    //     return redirect('stockupload')
                    //                       ->withErrors("Lot Number Cannot be Empty!!")->withInput();
                    // }

                } else {
                    return redirect('stockupload')
                        ->withErrors("Please select a valid Sale Number!!")->withInput();
                }
            }

        } else if ($request->has('country')) {

            if ($request->has('sale_season') & Input::get('sale_season') !== "Sale Season") {

                // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
                $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sltyp_id', '1')->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', null)->orderBy('sl_no')->get();
                // $request->session()->flash('alert-success', 'Sale found!!');
                $cid        = Input::get('country');
                $csn_season = Input::get('sale_season');
                return View::make('stockupload', compact('id', 'Season', 'country', 'sale', 'cid', 'csn_season'));
            } else {
                // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
                $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sltyp_id', '1')->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', null)->orderBy('sl_no')->get();
                // $request->session()->flash('alert-success', 'Sale found!!');
                $cid        = Input::get('country');
                $csn_season = Input::get('sale_season');
                return View::make('stockupload', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale'));

            }
        }

    }

    public function confirmPurchasesForm(Request $request)
    {
        $id            = null;
        $Season        = Season::all(['id', 'csn_season']);
        $country       = country::all(['id', 'ctr_name', 'ctr_initial']);
        $CoffeeGrade   = CoffeeGrade::all(['id', 'cgrad_name']);
        $Certification = Certification::all(['id', 'crt_name']);
        $buyer         = buyer::all(['id', 'cb_name']);

        $sale_status = sale_status::all(['id', 'sst_name']);
        $Warehouse   = null;
        $Mill        = null;

        return View::make('confirmpurchases', compact('id', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'largest', 'greensize', 'greencolor', 'greendefects', 'processing', 'cupscore', 'rawscore', 'screens', 'buyer', 'sale_status'));

    }

    public function confirmPurchases(Request $request)
    {
        $id = null;

        $Warehouse = null;
        $Mill      = null;

        $greensize    = quality_parameters::where('qg_id', '1')->get();
        $greencolor   = quality_parameters::where('qg_id', '2')->get();
        $greendefects = quality_parameters::where('qg_id', '3')->get();
        $processing   = processing::all(['id', 'prcss_name']);
        $buyer        = buyer::all(['id', 'cb_name']);
        $sale_status  = sale_status::all(['id', 'sst_name']);
        $basket       = basket::where('ctr_id', Input::get('country'))->get();
        $lot          = Input::get('sif_lot');

        $screens = screens::all(['id', 'scr_name']);

        $cupscore = cupscore::all(['id', 'cp_score', 'cp_quality']);
        $rawscore = rawscore::all(['id', 'rw_score', 'rw_quality']);

        $Certification = Certification::all(['id', 'crt_name']);

        $slr        = Input::get('seller');
        $sale_cb_id = Input::get('coffee_buyer');

        if (null !== Input::get('submitlot')) {
            $this->validate($request, [
                'country' => 'required', 'sale_season' => 'required', 'sale' => 'required', 'sif_lot' => 'required', 'outt_number' => 'required', 'coffee_grower' => 'required',
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

            if ($request->has('seller') && Input::get('seller') != null) {

                $sale_lots   = sale_lots::where('slid', $saleid)->where('slrid', Input::get('seller'))->where('cbid', Input::get('coffee_buyer'))->get();

                $lot_in_sale = sale_lots::where('slid', $saleid)->where('slrid', Input::get('seller'))->where('cbid', Input::get('coffee_buyer'))->where('lot', $lot)->first();

                $cdetails    = coffee_details::where('id', $lot_in_sale->id)->first();

            } else {

                $sale_lots   = sale_lots::where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->get();

                $lot_in_sale = sale_lots::where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('lot', $lot)->first();
                
                $cdetails    = coffee_details::where('id', $lot_in_sale->id)->first();

            }

            // $cdetails = coffee_details::where('cfd_outturn', $outturn)->where('sl_id', $sale)->where('csn_id', $season)->where('cfd_lot_no', $lot)->first();
            $coffeeid = $cdetails->id;

            $pdetails = purchase::where('cfd_id', $coffeeid)->first();

            $saleid   = Input::get('sale');
            // print_r($pdetails);
            // $coffeeid = $cdetails->id;

            $basketInternal = null;

            $basketInternal = basket::where('id', $basket )->first();

            if (!is_null($basketInternal)) {

                $basketInternal = InternalBaskets::where('ibs_code', $basketInternal->bs_code )->first();

            }

            if (!is_null($basketInternal)) {

                $basketInternal = $basketInternal->id;

            }

            if ($pdetails != null) {
                $pid = $pdetails->id;
                purchase::where('id', '=', $pid)
                    ->update(['cb_id' => $coffee_buyer, 'prc_price' => $price, 'prc_confirmed_price' => $confirmed_price, 'sst_id' => $sale_status, 'bs_id' => $basket,  'ibs_id' => $basketInternal, 'prc_warrant_no' => $warrant_no, 'prc_warrant_weight' => $warrant_weight, 'prc_purchase_comments' => $comments]);
                $request->session()->flash('alert-success', 'Purchase Information Updated!!');

                // 'id', 'cfd_id', 'cb_id', 'prc_price', 'bs_id', 'sst_id', 'prc_warrant_no', 'prc_warrant_weight', 'prc_invoice_no', 'created_at', 'updated_at'
                Activity::log('Updated purchase information for ' . $lot . ' coffee_buyer id ' . $coffee_buyer . ' with price ' . $price . ' confirmed_price ' . $confirmed_price . ' sale_status id ' . $sale_status . ' warrant_no ' . $warrant_no . ' warrant_weight ' . $warrant_weight . 'basket ID ' . $basket);

            } else {
                purchase::insert(
                    ['cfd_id' => $coffeeid, 'cb_id' => $coffee_buyer, 'prc_price' => $price, 'prc_confirmed_price' => $confirmed_price, 'sst_id' => $sale_status, 'bs_id' => $basket, 'ibs_id' => $basketInternal,'prc_warrant_no' => $warrant_no, 'prc_warrant_weight' => $warrant_weight, 'prc_purchase_comments' => $comments]
                );
                $request->session()->flash('alert-success', 'Purchase Information Added!!');
                Activity::log('Added purchase information for ' . $lot . ' coffee_buyer id ' . $coffee_buyer . ' with price ' . $price . ' confirmed_price ' . $confirmed_price . ' sale_status id ' . $sale_status . ' warrant_no ' . $warrant_no . ' warrant_weight ' . $warrant_weight . 'basket ID ' . $basket);

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
            // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
            // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
            $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sltyp_id', '1')->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->orderBy('sl_no')->get();

            $cid        = Input::get('country');
            $csn_season = Input::get('sale_season');
            $saleid     = Input::get('sale');
            // $sale_lots = sale_lots::where('slid', $saleid)->get();
            if ($request->has('seller') && Input::get('seller') != null) {
                $sale_lots   = sale_lots::where('slid', $saleid)->where('slrid', Input::get('seller'))->where('cbid', Input::get('coffee_buyer'))->get();
                $lot_in_sale = sale_lots::where('slid', $saleid)->where('slrid', Input::get('seller'))->where('cbid', Input::get('coffee_buyer'))->where('lot', $lot)->first();
                $cdetails    = coffee_details::where('id', $lot_in_sale->id)->first();

            } else {
                $sale_lots   = sale_lots::where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->get();
                $lot_in_sale = sale_lots::where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('lot', $lot)->first();
                $cdetails    = coffee_details::where('id', $lot_in_sale->id)->first();

            }
            // $request->session()->flash('alert-success', 'Purchase Information Added!!');

            $sale_status = sale_status::all(['id', 'sst_name']);
            $basket      = basket::where('ctr_id', Input::get('country'))->get();

            return View::make('confirmpurchases', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'sale_lots', 'seller', 'saleid', 'cdetails', 'buyer', 'sale_status', 'basket', 'pdetails', 'slr', 'sale_cb_id'));

        } else if (null !== Input::get('searchButton')) {
            $country = Input::get('country');
            $season  = Input::get('sale_season');
            $sale    = Input::get('sale');
            $lot     = Input::get('sif_lot');
            $saleid  = Input::get('sale');

            // print_r(Input::get('coffee_buyer')."-".Input::get('seller')."-".$lot);

            // $cdetails = coffee_details::where('sl_id', $sale)->where('csn_id', $season)->where('cfd_lot_no', $lot)->first();
            if ($request->has('seller') && Input::get('seller') != null) {
                $sale_lots   = sale_lots::where('slid', $saleid)->where('slrid', Input::get('seller'))->where('cbid', Input::get('coffee_buyer'))->get();
                $lot_in_sale = sale_lots::where('slid', $saleid)->where('slrid', Input::get('seller'))->where('cbid', Input::get('coffee_buyer'))->where('lot', $lot)->first();
                $cdetails    = coffee_details::where('id', $lot_in_sale->id)->first();

            } else {
                $sale_lots   = sale_lots::where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->get();
                $lot_in_sale = sale_lots::where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('lot', $lot)->first();
                // print_r(Input::get('coffee_buyer'));
                if ($lot_in_sale != null) {
                    $cdetails = coffee_details::where('id', $lot_in_sale->id)->first();
                }

            }
            $coffeeid      = $cdetails->id;
            $greencomments = greencomments::where('cfd_id', $coffeeid)->get();

            $Season      = Season::all(['id', 'csn_season']);
            $country     = country::all(['id', 'ctr_name', 'ctr_initial']);
            $CoffeeGrade = CoffeeGrade::all(['id', 'cgrad_name']);
            $region      = Region::where('ctr_id', Input::get('country'))->get();

            if (Input::get('country') != null) {
                $Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
                $Mill      = mills_region::where('ctr_id', Input::get('country'))->get();
                $seller    = seller::where('ctr_id', Input::get('country'))->get();
            }
            // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
            // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
            $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sltyp_id', '1')->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->orderBy('sl_no')->get();

            $cid        = Input::get('country');
            $csn_season = Input::get('sale_season');
            // $sale_lots = sale_lots::where('slid', $saleid)->get();
            $qdetails = quality_details::where('cfd_id', $coffeeid)->first();

            $pdetails = purchase::where('cfd_id', $coffeeid)->first();

            if ($cdetails !== null) {
                $request->session()->flash('alert-success', 'Sale Lot Found!!');

                return View::make('confirmpurchases', compact('id',
                    'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'cdetails', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'buyer', 'sale_status', 'basket', 'pdetails', 'slr', 'sale_cb_id'));

            } else {
                $request->session()->flash('alert-warning', 'Lot not found!');

                return View::make('confirmpurchases', compact('id',
                    'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'buyer', 'sale_status', 'basket', 'pdetails', 'slr', 'sale_cb_id'));

            }

        } else if (null !== Input::get('searchButtonOutturn')) {
            $country = Input::get('country');
            $season  = Input::get('sale_season');
            $sale    = Input::get('sale');
            $lot     = Input::get('sif_lot');
            $outturn = Input::get('outt_number');
            $saleid  = Input::get('sale');

            // print_r(Input::get('coffee_buyer')."-".Input::get('seller')."-".$lot);

            // $cdetails = coffee_details::where('sl_id', $sale)->where('csn_id', $season)->where('cfd_lot_no', $lot)->first();
            if ($request->has('seller') && Input::get('seller') != null) {
                $sale_lots   = sale_lots::where('slid', $saleid)->where('slrid', Input::get('seller'))->where('cbid', Input::get('coffee_buyer'))->get();
                $lot_in_sale = sale_lots::where('slid', $saleid)->where('slrid', Input::get('seller'))->where('cbid', Input::get('coffee_buyer'))->where('outturn', $outturn)->first();
                $cdetails    = coffee_details::where('id', $lot_in_sale->id)->first();

            } else {
                $sale_lots   = sale_lots::where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->get();
                $lot_in_sale = sale_lots::where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('outturn', $outturn)->first();
                $cdetails    = coffee_details::where('id', $lot_in_sale->id)->first();

            }
            $coffeeid      = $cdetails->id;
            $greencomments = greencomments::where('cfd_id', $coffeeid)->get();

            $Season      = Season::all(['id', 'csn_season']);
            $country     = country::all(['id', 'ctr_name', 'ctr_initial']);
            $CoffeeGrade = CoffeeGrade::all(['id', 'cgrad_name']);
            $region      = Region::where('ctr_id', Input::get('country'))->get();

            if (Input::get('country') != null) {
                $Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
                $Mill      = mills_region::where('ctr_id', Input::get('country'))->get();
                $seller    = seller::where('ctr_id', Input::get('country'))->get();
            }
            // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
            // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
            $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sltyp_id', '1')->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->orderBy('sl_no')->get();

            $cid        = Input::get('country');
            $csn_season = Input::get('sale_season');
            // $sale_lots = sale_lots::where('slid', $saleid)->get();
            $qdetails = quality_details::where('cfd_id', $coffeeid)->first();

            $pdetails = purchase::where('cfd_id', $coffeeid)->first();

            if ($cdetails !== null) {
                $request->session()->flash('alert-success', 'Sale Lot Found!!');

                return View::make('confirmpurchases', compact('id',
                    'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'cdetails', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'buyer', 'sale_status', 'basket', 'pdetails', 'slr', 'sale_cb_id'));

            } else {
                $request->session()->flash('alert-warning', 'Outturn not found!');

                return View::make('confirmpurchases', compact('id',
                    'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'buyer', 'sale_status', 'basket', 'pdetails', 'slr', 'sale_cb_id'));

            }

        } else if (null !== Input::get('nextButton')) {
            $country = Input::get('country');
            $season  = Input::get('sale_season');
            $sale    = Input::get('sale');
            $lot     = Input::get('sif_lot');
            $saleid  = Input::get('sale');

            // $cdetails = coffee_details::where('sl_id', $sale)->where('cfd_lot_no','>', $lot)->min('id');

            // $cdetails = coffee_details::where('id', $cdetails)->first();
            if ($request->has('seller') && Input::get('seller') != null) {
                $sale_lots = sale_lots::where('slid', $saleid)->where('slrid', Input::get('seller'))->where('cbid', Input::get('coffee_buyer'))->where('lot', '>', $lot)->min('id');

            } else {
                $sale_lots = sale_lots::where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('lot', '>', $lot)->min('id');
            }

            $cdetails = coffee_details::where('id', $sale_lots)->first();

            $coffeeid      = $cdetails->id;
            $greencomments = greencomments::where('cfd_id', $coffeeid)->get();
            // print_r($cdetails);

            $qdetails = quality_details::where('cfd_id', $coffeeid)->first();

            $Season      = Season::all(['id', 'csn_season']);
            $country     = country::all(['id', 'ctr_name', 'ctr_initial']);
            $CoffeeGrade = CoffeeGrade::all(['id', 'cgrad_name']);
            $region      = Region::where('ctr_id', Input::get('country'))->get();

            if (Input::get('country') != null) {
                $Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
                $Mill      = mills_region::where('ctr_id', Input::get('country'))->get();
                $seller    = seller::where('ctr_id', Input::get('country'))->get();
            }
            // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
            // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
            $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sltyp_id', '1')->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->orderBy('sl_no')->get();

            $cid        = Input::get('country');
            $csn_season = Input::get('sale_season');
            $saleid     = Input::get('sale');
            // $sale_lots = sale_lots::where('slid', $saleid)->get();
            if ($request->has('seller') && Input::get('seller') != null) {
                $sale_lots = sale_lots::where('slid', Input::get('sale'))->where('slrid', Input::get('seller'))->where('cbid', Input::get('coffee_buyer'))->get();

            } else {
                $sale_lots = sale_lots::where('slid', Input::get('sale'))->where('cbid', Input::get('coffee_buyer'))->get();
            }

            $pdetails = purchase::where('cfd_id', $coffeeid)->first();

            if ($cdetails !== null) {
                $request->session()->flash('alert-success', 'Sale Lot Found!!');

                return View::make('confirmpurchases', compact('id',
                    'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'cdetails', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'buyer', 'sale_status', 'basket', 'pdetails', 'slr', 'sale_cb_id'));

            } else {
                $request->session()->flash('alert-warning', 'Lot not found!');

                return View::make('confirmpurchases', compact('id',
                    'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'buyer', 'sale_status', 'basket', 'pdetails', 'slr', 'sale_cb_id'));

            }

        } else if (null !== Input::get('previousButton')) {
            $country = Input::get('country');
            $season  = Input::get('sale_season');
            $sale    = Input::get('sale');
            $lot     = Input::get('sif_lot');
            $saleid  = Input::get('sale');
            // $cdetails = coffee_details::where('sl_id', $sale)->where('csn_id', $season)->where('cfd_lot_no','<', $lot)->max('id');
            if ($request->has('seller') && Input::get('seller') != null) {
                $sale_lots = sale_lots::where('slid', $saleid)->where('slrid', Input::get('seller'))->where('cbid', Input::get('coffee_buyer'))->where('lot', '<', $lot)->max('id');

            } else {
                $sale_lots = sale_lots::where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('lot', '<', $lot)->max('id');
            }

            $cdetails = coffee_details::where('id', $sale_lots)->first();
            // if($request->has('seller') && Input::get('seller') != NULL){
            //     $sale_lots = sale_lots::where('slid', Input::get('sale'))->where('slrid',Input::get('seller'))->where('cbid',Input::get('coffee_buyer'))->get();
            //     $cdetails = coffee_details::where('id', $cdetails)->where('slr_id', Input::get('seller'))->where('cb_id',Input::get('coffee_buyer'))->first();

            // } else {
            //     $sale_lots = sale_lots::where('slid', Input::get('sale'))->where('cbid',Input::get('coffee_buyer'))->get();
            //     $cdetails = coffee_details::where('id', $cdetails)->where('cb_id',Input::get('coffee_buyer'))->first();
            // }

            $coffeeid = $cdetails->id;
            $qdetails = quality_details::where('cfd_id', $coffeeid)->first();

            $greencomments = greencomments::where('cfd_id', $coffeeid)->get();

            $Season      = Season::all(['id', 'csn_season']);
            $country     = country::all(['id', 'ctr_name', 'ctr_initial']);
            $CoffeeGrade = CoffeeGrade::all(['id', 'cgrad_name']);
            $region      = Region::where('ctr_id', Input::get('country'))->get();
            $pdetails    = purchase::where('cfd_id', $coffeeid)->first();

            if (Input::get('country') != null) {
                $Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
                $Mill      = mills_region::where('ctr_id', Input::get('country'))->get();
                $seller    = seller::where('ctr_id', Input::get('country'))->get();
            }
            // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
            // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
            $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sltyp_id', '1')->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->orderBy('sl_no')->get();

            $cid        = Input::get('country');
            $csn_season = Input::get('sale_season');
            $saleid     = Input::get('sale');
            // $sale_lots = sale_lots::where('slid', $saleid)->get();
            if ($request->has('seller') && Input::get('seller') != null) {
                $sale_lots = sale_lots::where('slid', Input::get('sale'))->where('slrid', Input::get('seller'))->where('cbid', Input::get('coffee_buyer'))->get();

            } else {
                $sale_lots = sale_lots::where('slid', Input::get('sale'))->where('cbid', Input::get('coffee_buyer'))->get();
            }

            if ($cdetails !== null) {
                $request->session()->flash('alert-success', 'Sale Lot Found!!');

                return View::make('confirmpurchases', compact('id',
                    'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'cdetails', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'buyer', 'sale_status', 'basket', 'pdetails', 'slr', 'sale_cb_id'));

            } else {
                $request->session()->flash('alert-warning', 'Lot not found!');

                return View::make('confirmpurchases', compact('id',
                    'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'buyer', 'sale_status', 'basket', 'pdetails', 'slr', 'sale_cb_id'));

            }

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
                        $sale = Sale::where('id', '=', Input::get('sale'))->where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->orderBy('sl_no')->first();
                        if ($sale->sl_quality_confirmedby == null) {
                            $request->session()->flash('alert-warning', 'Catalogue quality details for sale ' . $sale->sl_no . ' have not yet been confirmed. Please confirm to continue.');
                            $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->orderBy('sl_no')->get();
                            $request->session()->flash('alert-success', 'Sale found!!');
                            $cid        = Input::get('country');
                            $csn_season = Input::get('sale_season');
                            return View::make('confirmpurchases', compact('id',
                                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id'));
                        } else {
                            // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
                            // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
                            $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->orderBy('sl_no')->get();
                            // $request->session()->flash('alert-success', 'Sale found!!');
                            $cid        = Input::get('country');
                            $csn_season = Input::get('sale_season');
                            $saleid     = Input::get('sale');
                            if ($request->has('seller') && Input::get('seller') != null) {
                                $sale_lots = sale_lots::where('slid', $saleid)->where('slrid', Input::get('seller'))->where('cbid', Input::get('coffee_buyer'))->where('payment_confirmedby', null)->get();
                                // $lot_in_sale = sale_lots::where('slid', $saleid)->where('slrid',Input::get('seller'))->where('cbid',Input::get('coffee_buyer'))->where('lot', $lot)->first();
                                // $cdetails = coffee_details::where('id', $lot_in_sale->id)->first();

                            } else {
                                $sale_lots = sale_lots::where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('payment_confirmedby', null)->get();
                                // $lot_in_sale = sale_lots::where('slid', $saleid)->where('cbid',Input::get('coffee_buyer'))->where('lot', $lot)->first();
                                // print_r($lot);
                                // $cdetails = coffee_details::where('id', $lot_in_sale->id)->first();

                            }

                            // $sale_lots = sale_lots::where('slid', $saleid)->get();

                            return View::make('confirmpurchases', compact('id',
                                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id'));
                        }

                    } else {
                        // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
                        // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
                        $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->orderBy('sl_no')->get();
                        // $request->session()->flash('alert-success', 'Sale found!!');
                        $cid        = Input::get('country');
                        $csn_season = Input::get('sale_season');
                        return View::make('confirmpurchases', compact('id',
                            'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id'));
                    }

                } else {
                    // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
                    // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
                    $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->orderBy('sl_no')->get();
                    // $request->session()->flash('alert-success', 'Sale found!!');
                    $cid        = Input::get('country');
                    $csn_season = Input::get('sale_season');
                    return View::make('confirmpurchases', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id'));
                }
            } else {

                return redirect('confirmpurchases')
                    ->withErrors("Please select a valid Country!!")->withInput();
            }

            return View::make('confirmpurchases', compact('id', 'Season', 'country', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id'));
        }

    }

    public function confirmPurchasesListForm(Request $request)
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

        return View::make('confirmpurchaseslist', compact('id', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'largest', 'greensize', 'greencolor', 'greendefects', 'processing', 'cupscore', 'rawscore', 'screens', 'buyer', 'sale_status'));

    }

    public function confirmPurchasesList(Request $request)
    {
        $id = null;

        $Warehouse = null;
        $Mill      = null;

        $greensize    = quality_parameters::where('qg_id', '1')->get();
        $greencolor   = quality_parameters::where('qg_id', '2')->get();
        $greendefects = quality_parameters::where('qg_id', '3')->get();
        $processing   = processing::all(['id', 'prcss_name']);

        $buyer = buyer::where('bt_id', '1')->get();

        $sale_status = sale_status::all(['id', 'sst_name']);
        $basket      = basket::where('ctr_id', Input::get('country'))->get();

        $screens = screens::all(['id', 'scr_name']);

        $cupscore = cupscore::all(['id', 'cp_score', 'cp_quality']);
        $rawscore = rawscore::all(['id', 'rw_score', 'rw_quality']);

        $Certification = Certification::all(['id', 'crt_name']);

        $slr        = Input::get('seller');
        $lot        = Input::get('sale_lots');
        $sale_cb_id = Input::get('coffee_buyer');

        if (null !== Input::get('submitlot')) {
            $this->validate($request, [
                'country' => 'required', 'sale_season' => 'required', 'sale' => 'required', 'coffee_buyer' => 'required',
            ]);

            $country      = Input::get('country');
            $sale_season  = Input::get('sale_season');
            $saleid       = Input::get('sale');
            $coffee_buyer = Input::get('coffee_buyer');
            $seller       = Input::get('seller');
            $total_lots   = Input::get('total_lots');

            $lotid     = Input::get('lotid');
            $cprice    = Input::get('cprice');
            $confirmed = Input::get('confirmed');
            $withdrawn = Input::get('withdrawn');
            $coffeeid  = null;
            $weight = Input::get('weight');

            //update price
            for ($i = 0; $i < count($lotid); $i++) {
                $pdetails = purchase::where('cfd_id', $lotid[$i])->first();
                $pid      = $pdetails->id;
                purchase::where('id', '=', $pid)
                    ->update(['prc_confirmed_price' => $cprice[$i], 'sst_id' => null, 'prc_value' => ($weight[$i]/50 * $cprice[$i])]);
            }
            $selected_confirm = null;
            foreach ($confirmed as $key => $value) {
                // print_r($key);
                $pdetails = purchase::where('cfd_id', $key)->first();
                $pid      = $pdetails->id;
                foreach ($value as $key2 => $value2) {
                    if ($value2 == "1") {
                        //update confirmed

                        purchase::where('id', '=', $pid)
                            ->update(['sst_id' => '2']);
                    } else if ($value2 == "0") {
                        //update withdrawn
                        purchase::where('id', '=', $pid)
                            ->update(['sst_id' => '3']);

                    }

                }

            }

            if ($request->has('seller') && Input::get('seller') != null) {
                $sale_lots   = sale_lots::where('slid', $saleid)->where('slrid', Input::get('seller'))->where('cbid', Input::get('coffee_buyer'))->get();
                $lot_in_sale = sale_lots::where('slid', $saleid)->where('slrid', Input::get('seller'))->where('cbid', Input::get('coffee_buyer'))->first();
                $cdetails    = coffee_details::where('id', $lot_in_sale->id)->first();
            } else {
                $sale_lots   = sale_lots::where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->get();
                $lot_in_sale = sale_lots::where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->first();
                $cdetails    = coffee_details::where('id', $lot_in_sale->id)->first();
            }
            if ($cdetails !== null) {
                $coffeeid = $cdetails->id;
            }
            Activity::log('Updated purchase information for sale ' . $saleid . ' season ' . $sale_season);

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
            $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->where('sltyp_id', 1)->orderBy('sl_no')->get();

            $cid         = Input::get('country');
            $csn_season  = Input::get('sale_season');
            $saleid      = Input::get('sale');
            $sale_status = sale_status::all(['id', 'sst_name']);
            $basket      = basket::where('ctr_id', Input::get('country'))->get();

            return View::make('confirmpurchaseslist', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'sale_lots', 'seller', 'saleid', 'cdetails', 'buyer', 'sale_status', 'basket', 'pdetails', 'slr', 'sale_cb_id'));

        } else if (null !== Input::get('searchButton')) {
            $country = Input::get('country');
            $season  = Input::get('sale_season');
            $sale    = Input::get('sale');
            $lot     = Input::get('sif_lot');
            $saleid  = Input::get('sale');

            if ($request->has('seller') && Input::get('seller') != null) {
                $sale_lots   = sale_lots::where('slid', $saleid)->where('slrid', Input::get('seller'))->where('cbid', Input::get('coffee_buyer'))->get();
                $lot_in_sale = sale_lots::where('slid', $saleid)->where('slrid', Input::get('seller'))->where('cbid', Input::get('coffee_buyer'))->where('lot', $lot)->first();
                $cdetails    = coffee_details::where('id', $lot_in_sale->id)->first();

            } else {
                $sale_lots   = sale_lots::where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->get();
                $lot_in_sale = sale_lots::where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('lot', $lot)->first();
                $cdetails    = coffee_details::where('id', $lot_in_sale->id)->first();

            }
            $coffeeid      = $cdetails->id;
            $greencomments = greencomments::where('cfd_id', $coffeeid)->get();

            $Season      = Season::all(['id', 'csn_season']);
            $country     = country::all(['id', 'ctr_name', 'ctr_initial']);
            $CoffeeGrade = CoffeeGrade::all(['id', 'cgrad_name']);
            $region      = Region::where('ctr_id', Input::get('country'))->get();

            if (Input::get('country') != null) {
                $Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
                $Mill      = mills_region::where('ctr_id', Input::get('country'))->get();
                $seller    = seller::where('ctr_id', Input::get('country'))->get();
            }

            $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->where('sltyp_id', 1)->orderBy('sl_no')->get();

            $cid        = Input::get('country');
            $csn_season = Input::get('sale_season');

            $qdetails = quality_details::where('cfd_id', $coffeeid)->first();

            $pdetails = purchase::where('cfd_id', $coffeeid)->first();

            if ($cdetails !== null) {
                $request->session()->flash('alert-success', 'Sale Lot Found!!');

                return View::make('confirmpurchaseslist', compact('id',
                    'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'cdetails', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'buyer', 'sale_status', 'basket', 'pdetails', 'slr', 'sale_cb_id'));

            } else {
                $request->session()->flash('alert-warning', 'Lot not found!');

                return View::make('confirmpurchaseslist', compact('id',
                    'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'buyer', 'sale_status', 'basket', 'pdetails', 'slr', 'sale_cb_id'));

            }

        } else if (null !== Input::get('searchButtonOutturn')) {
            $country = Input::get('country');
            $season  = Input::get('sale_season');
            $sale    = Input::get('sale');
            $lot     = Input::get('sif_lot');
            $outturn = Input::get('outt_number');
            $saleid  = Input::get('sale');

            if ($request->has('seller') && Input::get('seller') != null) {
                $sale_lots   = sale_lots::where('slid', $saleid)->where('slrid', Input::get('seller'))->where('cbid', Input::get('coffee_buyer'))->get();
                $lot_in_sale = sale_lots::where('slid', $saleid)->where('slrid', Input::get('seller'))->where('cbid', Input::get('coffee_buyer'))->where('outturn', $outturn)->first();
                $cdetails    = coffee_details::where('id', $lot_in_sale->id)->first();

            } else {
                $sale_lots   = sale_lots::where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->get();
                $lot_in_sale = sale_lots::where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('outturn', $outturn)->first();
                $cdetails    = coffee_details::where('id', $lot_in_sale->id)->first();

            }
            $coffeeid      = $cdetails->id;
            $greencomments = greencomments::where('cfd_id', $coffeeid)->get();

            $Season      = Season::all(['id', 'csn_season']);
            $country     = country::all(['id', 'ctr_name', 'ctr_initial']);
            $CoffeeGrade = CoffeeGrade::all(['id', 'cgrad_name']);
            $region      = Region::where('ctr_id', Input::get('country'))->get();

            if (Input::get('country') != null) {
                $Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
                $Mill      = mills_region::where('ctr_id', Input::get('country'))->get();
                $seller    = seller::where('ctr_id', Input::get('country'))->get();
            }

            $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->where('sltyp_id', 1)->orderBy('sl_no')->get();

            $cid        = Input::get('country');
            $csn_season = Input::get('sale_season');

            $qdetails = quality_details::where('cfd_id', $coffeeid)->first();

            $pdetails = purchase::where('cfd_id', $coffeeid)->first();

            if ($cdetails !== null) {
                $request->session()->flash('alert-success', 'Sale Lot Found!!');

                return View::make('confirmpurchaseslist', compact('id',
                    'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'cdetails', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'buyer', 'sale_status', 'basket', 'pdetails', 'slr', 'sale_cb_id'));

            } else {
                $request->session()->flash('alert-warning', 'Outturn not found!');

                return View::make('confirmpurchaseslist', compact('id',
                    'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'buyer', 'sale_status', 'basket', 'pdetails', 'slr', 'sale_cb_id'));

            }

        } else if (null !== Input::get('nextButton')) {
            $country = Input::get('country');
            $season  = Input::get('sale_season');
            $sale    = Input::get('sale');
            $lot     = Input::get('sif_lot');
            $saleid  = Input::get('sale');

            if ($request->has('seller') && Input::get('seller') != null) {
                $sale_lots = sale_lots::where('slid', $saleid)->where('slrid', Input::get('seller'))->where('cbid', Input::get('coffee_buyer'))->where('lot', '>', $lot)->min('id');

            } else {
                $sale_lots = sale_lots::where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('lot', '>', $lot)->min('id');
            }

            $cdetails = coffee_details::where('id', $sale_lots)->first();

            $coffeeid      = $cdetails->id;
            $greencomments = greencomments::where('cfd_id', $coffeeid)->get();
            // print_r($cdetails);

            $qdetails = quality_details::where('cfd_id', $coffeeid)->first();

            $Season      = Season::all(['id', 'csn_season']);
            $country     = country::all(['id', 'ctr_name', 'ctr_initial']);
            $CoffeeGrade = CoffeeGrade::all(['id', 'cgrad_name']);
            $region      = Region::where('ctr_id', Input::get('country'))->get();

            if (Input::get('country') != null) {
                $Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
                $Mill      = mills_region::where('ctr_id', Input::get('country'))->get();
                $seller    = seller::where('ctr_id', Input::get('country'))->get();
            }

            $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->where('sltyp_id', 1)->orderBy('sl_no')->get();

            $cid        = Input::get('country');
            $csn_season = Input::get('sale_season');
            $saleid     = Input::get('sale');

            if ($request->has('seller') && Input::get('seller') != null) {
                $sale_lots = sale_lots::where('slid', Input::get('sale'))->where('slrid', Input::get('seller'))->where('cbid', Input::get('coffee_buyer'))->get();

            } else {
                $sale_lots = sale_lots::where('slid', Input::get('sale'))->where('cbid', Input::get('coffee_buyer'))->get();
            }

            $pdetails = purchase::where('cfd_id', $coffeeid)->first();

            if ($cdetails !== null) {
                $request->session()->flash('alert-success', 'Sale Lot Found!!');

                return View::make('confirmpurchaseslist', compact('id',
                    'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'cdetails', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'buyer', 'sale_status', 'basket', 'pdetails', 'slr', 'sale_cb_id'));

            } else {
                $request->session()->flash('alert-warning', 'Lot not found!');

                return View::make('confirmpurchaseslist', compact('id',
                    'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'buyer', 'sale_status', 'basket', 'pdetails', 'slr', 'sale_cb_id'));

            }

        } else if (null !== Input::get('previousButton')) {
            $country = Input::get('country');
            $season  = Input::get('sale_season');
            $sale    = Input::get('sale');
            $lot     = Input::get('sif_lot');
            $saleid  = Input::get('sale');

            if ($request->has('seller') && Input::get('seller') != null) {
                $sale_lots = sale_lots::where('slid', $saleid)->where('slrid', Input::get('seller'))->where('cbid', Input::get('coffee_buyer'))->where('lot', '<', $lot)->max('id');

            } else {
                $sale_lots = sale_lots::where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('lot', '<', $lot)->max('id');
            }

            $cdetails = coffee_details::where('id', $sale_lots)->first();

            $coffeeid = $cdetails->id;
            $qdetails = quality_details::where('cfd_id', $coffeeid)->first();

            $greencomments = greencomments::where('cfd_id', $coffeeid)->get();

            $Season      = Season::all(['id', 'csn_season']);
            $country     = country::all(['id', 'ctr_name', 'ctr_initial']);
            $CoffeeGrade = CoffeeGrade::all(['id', 'cgrad_name']);
            $region      = Region::where('ctr_id', Input::get('country'))->get();
            $pdetails    = purchase::where('cfd_id', $coffeeid)->first();

            if (Input::get('country') != null) {
                $Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
                $Mill      = mills_region::where('ctr_id', Input::get('country'))->get();
                $seller    = seller::where('ctr_id', Input::get('country'))->get();
            }

            $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->where('sltyp_id', 1)->orderBy('sl_no')->get();

            $cid        = Input::get('country');
            $csn_season = Input::get('sale_season');
            $saleid     = Input::get('sale');

            if ($request->has('seller') && Input::get('seller') != null) {
                $sale_lots = sale_lots::where('slid', Input::get('sale'))->where('slrid', Input::get('seller'))->where('cbid', Input::get('coffee_buyer'))->get();

            } else {
                $sale_lots = sale_lots::where('slid', Input::get('sale'))->where('cbid', Input::get('coffee_buyer'))->get();
            }

            if ($cdetails !== null) {
                $request->session()->flash('alert-success', 'Sale Lot Found!!');

                return View::make('confirmpurchaseslist', compact('id',
                    'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'cdetails', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'buyer', 'sale_status', 'basket', 'pdetails', 'slr', 'sale_cb_id'));

            } else {
                $request->session()->flash('alert-warning', 'Lot not found!');

                return View::make('confirmpurchaseslist', compact('id',
                    'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'greencomments', 'screens', 'cupscore', 'rawscore', 'qdetails', 'buyer', 'sale_status', 'basket', 'pdetails', 'slr', 'sale_cb_id'));

            }

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

                    if ($request->has('sale') && Input::get('sale') != 'Sale No.' && Input::get('sale') != 'No Sale Found') {
                        $sale = Sale::where('id', '=', Input::get('sale'))->where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sltyp_id', 1)->orderBy('sl_no')->first();
                        if (!isset($sale->sl_quality_confirmedby)) {
                            if ($sale != null) {
                                $request->session()->flash('alert-warning', 'Catalogue quality details for sale ' . $sale->sl_no . ' have not yet been confirmed. Please confirm to continue.');
                            }

                            $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->where('sltyp_id', 1)->orderBy('sl_no')->get();
                            $request->session()->flash('alert-success', 'Sale found!!');
                            $cid        = Input::get('country');
                            $csn_season = Input::get('sale_season');


                            return View::make('confirmpurchaseslist', compact('id',
                                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id'));
                        } else {

                            $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->where('sltyp_id', 1)->orderBy('sl_no')->get();

                            $cid        = Input::get('country');
                            $csn_season = Input::get('sale_season');
                            $saleid     = Input::get('sale');
                            if ($request->has('seller') && Input::get('seller') != null) {
                                $sale_lots = sale_lots::where('slid', $saleid)->where('slrid', Input::get('seller'))->where('cbid', Input::get('coffee_buyer'))->whereNull('bric')->whereNull('invoice')->get();

                            } else {
                                $sale_lots = sale_lots::where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->whereNull('bric')->whereNull('invoice')->get();


                            }


                            return View::make('confirmpurchaseslist', compact('id',
                                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id'));
                        }

                    } else {
                        $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->where('sltyp_id', 1)->orderBy('sl_no')->get();

                        $cid        = Input::get('country');
                        $csn_season = Input::get('sale_season');
                        return View::make('confirmpurchaseslist', compact('id',
                            'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id'));
                    }

                } else {

                    $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->where('sltyp_id', 1)->orderBy('sl_no')->get();

                    $cid        = Input::get('country');
                    $csn_season = Input::get('sale_season');
                    return View::make('confirmpurchaseslist', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id'));
                }
                
            } else {

                return redirect('confirmpurchaseslist')
                    ->withErrors("Please select a valid Country!!")->withInput();
            }

            return View::make('confirmpurchaseslist', compact('id', 'Season', 'country', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id'));
        }

    }

    public function confirmInvoicesForm(Request $request)
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

        return View::make('confirminvoices', compact('id', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'largest', 'greensize', 'greencolor', 'greendefects', 'processing', 'cupscore', 'rawscore', 'screens', 'buyer', 'sale_status'));

    }

    public function confirmInvoices(Request $request)
    {
        $id = null;

        $Warehouse = null;
        $Mill      = null;

        $greensize    = quality_parameters::where('qg_id', '1')->get();
        $greencolor   = quality_parameters::where('qg_id', '2')->get();
        $greendefects = quality_parameters::where('qg_id', '3')->get();
        $processing   = processing::all(['id', 'prcss_name']);
        $buyer        = buyer::where('bt_id', '1')->get();
        $sale_status  = sale_status::all(['id', 'sst_name']);
        $basket       = basket::where('ctr_id', Input::get('country'))->get();

        $screens = screens::all(['id', 'scr_name']);

        $cupscore = cupscore::all(['id', 'cp_score', 'cp_quality']);
        $rawscore = rawscore::all(['id', 'rw_score', 'rw_quality']);

        $Certification = Certification::all(['id', 'crt_name']);

        $slr        = Input::get('seller');
        $sale_cb_id = Input::get('coffee_buyer');

        if (null !== Input::get('confirminvoices')) {
            $this->validate($request, [
                'country' => 'required', 'sale_season' => 'required', 'sale' => 'required', 'coffee_buyer' => 'required', 'seller' => 'required', 'invoice' => 'required', 'date' => 'required',
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

            $warrant_no      = Input::get('warrant_no');
            $warrant_weight  = Input::get('warrant_weight');
            $date            = Input::get('date');
            $date            = date_create($date);
            $date            = date_format($date, "Y-m-d");
            $count_confirmed = Input::get('count_confirmed');

            $invoice   = Input::get('invoice');
            $user_data = Auth::user();
            $user      = $user_data->id;
            $coffeeid  = null;

            $sale_lots = sale_lots::where('slid', $saleid)->where('slrid', Input::get('seller'))->where('cbid', Input::get('coffee_buyer'))->where('status', 'Confirmed')->get();

            $invoicelot = Input::get('invoicelot');

            $invdetails = invoices::where('inv_no', $invoice)->first(); #
            $inv_id     = null;
            if ($invdetails != null) {
                $inv_id = $invdetails->id;
            }

            if ($invdetails != null) {
                invoices::where('id', '=', $inv_id)
                    ->update(['inv_no' => $invoice, 'inv_date' => $date, 'inv_confirmedby' => $user]);

                Activity::log('Updated invoice information with invoice no. ' . $invoice . ' date ' . $date . ' confirmed by ' . $user);
                $request->session()->flash('alert-success', 'Paymnet Information Updated!!');

            } else {
                $inv_id = invoices::insertGetId(
                    ['inv_no' => $invoice, 'inv_date' => $date, 'inv_confirmedby' => $user]);
                $request->session()->flash('alert-success', 'Paymnet Information Added!!');
                Activity::log('Inserted invoice information with invoice no. ' . $invoice . ' date ' . $date . ' confirmed by ' . $user);
            }

            for ($i = 0; $i < count($invoicelot); $i++) {
                $pdetails = purchase::where('cfd_id', $invoicelot[$i])->first();
                $pid      = $pdetails->id;
                $coffeeid = $sale_lots[$i]->id;

                $invWeight = Input::get('invWeight' . $invoicelot[$i]);
                $invOutturn = Input::get('invOutturn' . $invoicelot[$i]);
                $invMark = Input::get('invMark' . $invoicelot[$i]);

                purchase::where('id', '=', $pid)
                    ->update(['inv_id' => $inv_id, 'inv_weight' => $invWeight, 'inv_outturn' => $invOutturn, 'inv_mark' => $invMark]);

                $request->session()->flash('alert-success', 'Purchase Invoice Information Updated!!');
                Activity::log('Updated Invoice for coffeeid' . $invoicelot[$i] . ' with invoice id ' . $inv_id. ' inv_weight '. $invWeight. ' inv_outturn '. $invOutturn. ' inv_mark '. $invMark);
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
            $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->orderByRaw('LENGTH(`sl_no`) ASC')->orderBy('sl_no')->get();

            $cid        = Input::get('country');
            $csn_season = Input::get('sale_season');
            $saleid     = Input::get('sale');

            $sale_lots = sale_lots::where('slid', $saleid)->where('slrid', Input::get('seller'))->where('cbid', Input::get('coffee_buyer'))->where('status', 'Confirmed')->get();

            $sale_status = sale_status::all(['id', 'sst_name']);
            $basket      = basket::where('ctr_id', Input::get('country'))->get();

            return View::make('confirminvoices', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'sale_lots', 'seller', 'saleid', 'cdetails', 'buyer', 'sale_status', 'basket', 'pdetails', 'slr', 'sale_cb_id'));

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
                            $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->where('sltyp_id', 1)->orderByRaw('LENGTH(`sl_no`) ASC')->orderBy('sl_no', 'ASC')->get();
                            $request->session()->flash('alert-success', 'Sale found!!');
                            $cid        = Input::get('country');
                            $csn_season = Input::get('sale_season');

                            return View::make('confirminvoices', compact('id',
                                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id'));
                        } else {
                            $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->where('sltyp_id', 1)->orderByRaw('LENGTH(`sl_no`) ASC')->orderBy('sl_no', 'ASC')->get();
                            $cid        = Input::get('country');
                            $csn_season = Input::get('sale_season');
                            $saleid     = Input::get('sale');
                            $sale_lots  = sale_lots::where('slid', $saleid)->where('slrid', Input::get('seller'))->where('cbid', Input::get('coffee_buyer'))->where('status', 'Confirmed')->get();

                            return View::make('confirminvoices', compact('id',
                                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id'));
                        }

                    } else {
                        $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->where('sltyp_id', 1)->orderByRaw('LENGTH(`sl_no`) ASC')->orderBy('sl_no', 'ASC')->get();
                        $cid        = Input::get('country');
                        $csn_season = Input::get('sale_season');
                        return View::make('confirminvoices', compact('id',
                            'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id'));
                    }

                } else {
                    $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->where('sltyp_id', 1)->orderByRaw('LENGTH(`sl_no`) ASC')->orderBy('sl_no', 'ASC')->get();
                    $cid        = Input::get('country');
                    $csn_season = Input::get('sale_season');
                    return View::make('confirminvoices', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id'));
                }
            } else {

                return redirect('confirminvoices')
                    ->withErrors("Please select a valid Country!!")->withInput();
            }

            return View::make('confirminvoices', compact('id', 'Season', 'country', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id'));
        }

    }

    public function confirmPaymnetForm(Request $request)
    {
        $id            = null;
        $Season        = Season::all(['id', 'csn_season']);
        $country       = country::all(['id', 'ctr_name', 'ctr_initial']);
        $CoffeeGrade   = CoffeeGrade::all(['id', 'cgrad_name']);
        $Certification = Certification::all(['id', 'crt_name']);
        // $buyer = buyer::all(['id', 'cb_name']);
        $buyer = buyer::where('bt_id', '1')->get();

        $sale_status = sale_status::all(['id', 'sst_name']);
        $Warehouse   = null;
        $Mill        = null;

        return View::make('confirmpayment', compact('id', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'largest', 'greensize', 'greencolor', 'greendefects', 'processing', 'cupscore', 'rawscore', 'screens', 'buyer', 'sale_status'));

    }

    public function confirmPaymnet(Request $request)
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
        $basket      = basket::where('ctr_id', Input::get('country'))->get();

        $screens = screens::all(['id', 'scr_name']);

        $cupscore = cupscore::all(['id', 'cp_score', 'cp_quality']);
        $rawscore = rawscore::all(['id', 'rw_score', 'rw_quality']);

        $Certification = Certification::all(['id', 'crt_name']);

        $slr        = Input::get('seller');
        $sale_cb_id = Input::get('coffee_buyer');

        if (null !== Input::get('confirmpayment')) {
            $this->validate($request, [
                'country' => 'required', 'coffee_buyer' => 'required', 'seller' => 'required', 'invoiced' => 'required', 'date' => 'required', 'ref' => 'required', 'paymentamount' => 'required',
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

            $warrant_no      = Input::get('warrant_no');
            $warrant_weight  = Input::get('warrant_weight');
            $date            = Input::get('date');
            $date            = date_create($date);
            $date            = date_format($date, "Y-m-d");
            $count_confirmed = Input::get('count_confirmed');

            $invoice = Input::get('invoice');

            $invoiced = Input::get('invoiced');
            $ref      = Input::get('ref');
            $payment  = Input::get('paymentamount');
            // print_r($invoice);

            $user_data = Auth::user();
            $user      = $user_data->id;

            // $sale_lots = sale_lots::where('slid', $saleid)->where('slrid',Input::get('seller'))->where('cbid',Input::get('coffee_buyer'))->where('invoice',Input::get('invoiced'))->whereNotNull('invoice')->get();

            $pydetails = payment::where('py_no', $ref)->first();
            $sale_lots = sale_lots::where('invoice', Input::get('invoiced'))->whereNotNull('invoice')->whereNull('py_no')->get();
            // print_r($pydetails);

            if ($pydetails != null) {
                $py_id = $pydetails->id;
                payment::where('id', '=', $py_id)
                    ->update(['py_no' => $ref, 'py_amount' => $payment, 'py_date' => $date, 'py_confirmedby' => $user]);

                Activity::log('Updated paymnet information with paymnet no. ' . $ref . ' date ' . $date . ' confirmed by ' . $user);
                $request->session()->flash('alert-success', 'Paymnet Information Updated!!');

            } else {
                $py_id = payment::insertGetId(
                    ['py_no' => $ref, 'py_amount' => $payment, 'py_date' => $date, 'py_confirmedby' => $user]);
                $request->session()->flash('alert-success', 'Paymnet Information Added!!');
                Activity::log('Inserted paymnet information with paymnet no. ' . $ref . ' date ' . $date . ' confirmed by ' . $user);
            }
            $coffeeid = null;

            for ($i = 0; $i < count($sale_lots); $i++) {
                $pdetails = purchase::where('cfd_id', $sale_lots[$i]->id)->first();
                $pid      = $pdetails->id;
                $coffeeid = $sale_lots[$i]->id;

                purchase::where('id', '=', $pid)
                    ->update(['py_id' => $py_id]);

                $request->session()->flash('alert-success', 'Purchase Payment Information Updated!!');
                Activity::log('Updated payment for coffeeid' . $sale_lots[$i]->id . ' with paymnet number ' . $ref . ' paymnet amount ' . Input::get('paymentamount'));
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
            $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->orderBy('sl_no')->get();

            $cid        = Input::get('country');
            $csn_season = Input::get('sale_season');
            $saleid     = Input::get('sale');
           
            $sale_status = sale_status::all(['id', 'sst_name']);
            $basket      = basket::where('ctr_id', Input::get('country'))->get();
            $inv         = Input::get('invoiced');

            $invoiced  = sale_lots::where('slctrid', Input::get('country'))->where('slrid', Input::get('seller'))->whereNotNull('invoice')->whereNull('py_no')->where('sltyp_id', 1)->groupBy('invoice')->get();
            $sale_lots = sale_lots::where('invoice', Input::get('invoiced'))->whereNotNull('invoice')->whereNull('py_no')->get();

            return View::make('confirmpayment', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'sale_lots', 'seller', 'saleid', 'cdetails', 'buyer', 'sale_status', 'basket', 'pdetails', 'slr', 'sale_cb_id', 'invoiced', 'inv'));

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
                $invoiced = sale_lots::where('slctrid', Input::get('country'))->where('slrid', Input::get('seller'))->groupBy('invoice')->get();

                if ($request->has('invoiced')) {

                    $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->orderBy('sl_no')->get();
                    $cid        = Input::get('country');
                    $csn_season = Input::get('sale_season');
                    $saleid     = Input::get('sale');
                    $inv        = Input::get('invoiced');
                    $invoiced   = sale_lots::where('slctrid', Input::get('country'))->where('slrid', Input::get('seller'))->whereNotNull('invoice')->whereNull('py_no')->where('sltyp_id', 1)->groupBy('invoice')->get();
                    $sale_lots = sale_lots::where('invoice', Input::get('invoiced'))->whereNotNull('invoice')->whereNull('py_no')->whereNotNull('bric')->get();

                    return View::make('confirmpayment', compact('id',
                        'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'invoiced', 'inv'));
                } else {
                    $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->orderBy('sl_no')->get();

                    $cid        = Input::get('country');
                    $csn_season = Input::get('sale_season');
                    $saleid     = Input::get('sale');
                    $invoiced   = sale_lots::where('slctrid', Input::get('country'))->where('slrid', Input::get('seller'))->whereNotNull('invoice')->whereNull('py_no')->where('sltyp_id', 1)->groupBy('invoice')->get();

                    $sale_lots = sale_lots::where('invoice', Input::get('invoiced'))->whereNotNull('invoice')->whereNull('py_no')->whereNotNull('bric')->get();

                    return View::make('confirmpayment', compact('id',
                        'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'invoiced'));
                }

                if ($request->has('sale_season') & Input::get('sale_season') !== "Sale Season") {
                    $invoiced = sale_lots::where('slctrid', Input::get('country'))->where('slrid', Input::get('seller'))->groupBy('invoice')->get();

                    if ($request->has('sale') && Input::get('sale') != 'Sale No.') {
                        $sale = Sale::where('id', '=', Input::get('sale'))->where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->orderBy('sl_no')->first();
                        if ($sale->sl_quality_confirmedby == null) {
                            $request->session()->flash('alert-warning', 'Catalogue quality details for sale ' . $sale->sl_no . ' have not yet been confirmed. Please confirm to continue.');
                            $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->orderBy('sl_no')->get();
                            $request->session()->flash('alert-success', 'Sale found!!');
                            $cid        = Input::get('country');
                            $csn_season = Input::get('sale_season');

                            return View::make('confirmpayment', compact('id',
                                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'invoiced'));
                        } else {
                            if ($request->has('invoiced')) {
                               
                                $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->orderBy('sl_no')->get();
                                $cid        = Input::get('country');
                                $csn_season = Input::get('sale_season');
                                $saleid     = Input::get('sale');
                                $inv        = Input::get('invoiced');
                                $invoiced   = sale_lots::where('slctrid', Input::get('country'))->where('slrid', Input::get('seller'))->whereNotNull('invoice')->whereNull('py_no')->where('sltyp_id', 1)->groupBy('invoice')->get();
                                $sale_lots = sale_lots::where('slid', $saleid)->where('slrid', Input::get('seller'))->where('cbid', Input::get('coffee_buyer'))->where('invoice', Input::get('invoiced'))->whereNotNull('invoice')->whereNotNull('bric')->get();
                               
                                return View::make('confirmpayment', compact('id',
                                    'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'invoiced', 'inv'));
                            } else {
                                $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->orderBy('sl_no')->get();
                                $cid        = Input::get('country');
                                $csn_season = Input::get('sale_season');
                                $saleid     = Input::get('sale');
                                $invoiced   = sale_lots::where('slid', $saleid)->where('slrid', Input::get('seller'))->where('cbid', Input::get('coffee_buyer'))->whereNotNull('invoice')->whereNull('py_no')->where('sltyp_id', 1)->groupBy('invoice')->get();

                                return View::make('confirmpayment', compact('id',
                                    'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'invoiced'));
                            }

                        }

                    } else {
                        $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->orderBy('sl_no')->get();
                        $cid        = Input::get('country');
                        $csn_season = Input::get('sale_season');
                        return View::make('confirmpayment', compact('id',
                            'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'invoiced'));
                    }

                } else {
                    $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->orderBy('sl_no')->get();
                    $cid        = Input::get('country');
                    $csn_season = Input::get('sale_season');
                    return View::make('confirmpayment', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'invoiced'));
                }
            } else {

                return redirect('confirmpayment')
                    ->withErrors("Please select a valid Country!!")->withInput();
            }

            return View::make('confirmpayment', compact('id', 'Season', 'country', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id'));
        }

    }

    public function basketForm(Request $request)
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

        return View::make('basket', compact('id', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'largest', 'greensize', 'greencolor', 'greendefects', 'processing', 'cupscore', 'rawscore', 'screens', 'buyer', 'sale_status'));

    }

    public function basket(Request $request)
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
        $basket      = basket::where('ctr_id', Input::get('country'))->orderBy('bs_code')->get();
        
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
            $sale_lots_unassigned = sale_lots::where('bsid', Input::get('basket'))->where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('status', 'Confirmed')->orWhere('bsid', null)->where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('status', 'Confirmed')->get();

            for ($i = 0; $i < count($sale_lots_unassigned); $i++) {
                $pdetails = purchase::where('cfd_id', $sale_lots_unassigned[$i]->id)->first();
                $pid      = $pdetails->id;
                purchase::where('id', '=', $pid)
                    ->update(['bs_id' => null]);
            }

            //update basket
            for ($i = 0; $i < count($basketlot); $i++) {
                $pdetails = purchase::where('cfd_id', $basketlot[$i])->first();
                $pid      = $pdetails->id;
                purchase::where('id', '=', $pid)
                    ->update(['bs_id' => $basket]);
                Activity::log('Updated basket for coffeeid' . $basketlot[$i] . ' with basket id ' . $basket);
            }

            $Season  = Season::all(['id', 'csn_season']);
            $country = country::all(['id', 'ctr_name', 'ctr_initial']);
            $sale    = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->get();

            $cid        = Input::get('country');
            $csn_season = Input::get('sale_season');
            $saleid     = Input::get('sale');
            $basket     = basket::where('ctr_id', Input::get('country'))->get();

            // $sale_lots_unassigned = sale_lots::where('bsid', Input::get('basket'))->where('slid', $saleid)->where('cbid',Input::get('coffee_buyer'))->where('status', 'Confirmed')->orWhere('bsid', NULL)->where('slid', $saleid)->where('cbid',Input::get('coffee_buyer'))->where('status', 'Confirmed')->get();
            $sale_lots_unassigned = sale_lots::select('*');
            $sale_lots_unassigned = $sale_lots_unassigned->where('bsid', Input::get('basket'))->where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('status', 'Confirmed')->orWhere('bsid', null)->where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('status', 'Confirmed');
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

            $sale_lots = sale_lots::where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('bsid', Input::get('basket'))->where('status', 'Confirmed')->get();

            return View::make('basket', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'sale_lots', 'seller', 'saleid', 'cdetails', 'buyer', 'sale_status', 'basket', 'pdetails', 'slr', 'sale_cb_id', 'bskt', 'sale_lots_unassigned', 'cupscore', 'grade', 'cupid', 'crt'));

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

                            return View::make('basket', compact('id',
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

                            $sale_lots = sale_lots::where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('bsid', Input::get('basket'))->where('status', 'Confirmed')->get();

                            $sale_lots_unassigned = sale_lots::select('*');
                            $sale_lots_unassigned = $sale_lots_unassigned->where('bsid', Input::get('basket'))->where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('status', 'Confirmed')->orWhere('bsid', null)->where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('status', 'Confirmed');
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

                            return View::make('basket', compact('id',
                                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'bskt', 'sale_lots_unassigned', 'cupscore', 'grade', 'cupid', 'crt'));
                        }

                    } else {
                        // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
                        // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
                        $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->orderBy('sl_no')->get();
                        // $request->session()->flash('alert-success', 'Sale found!!');
                        $cid        = Input::get('country');
                        $csn_season = Input::get('sale_season');
                        return View::make('basket', compact('id',
                            'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'bskt', 'cupscore', 'grade', 'cupid', 'crt'));
                    }

                } else {
                    // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
                    // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
                    $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->orderBy('sl_no')->get();
                    // $request->session()->flash('alert-success', 'Sale found!!');
                    $cid        = Input::get('country');
                    $csn_season = Input::get('sale_season');
                    return View::make('basket', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'bskt', 'cupscore', 'grade', 'cupid', 'crt'));
                }
            } else {

                return redirect('basket')
                    ->withErrors("Please select a valid Country!!")->withInput();
            }

            return View::make('basket', compact('id', 'Season', 'country', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'bskt', 'cupscore', 'grade', 'cupid', 'crt'));
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
            $sale_lots_unassigned = $sale_lots_unassigned->where('bsid', Input::get('basket'))->where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('status', 'Confirmed')->orWhere('bsid', null)->where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('status', 'Confirmed');
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
                    ->update(['bs_id' => $basket]);
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
            $basket     = basket::where('ctr_id', Input::get('country'))->get();

            // $sale_lots_unassigned = sale_lots::where('bsid', Input::get('basket'))->where('slid', $saleid)->where('cbid',Input::get('coffee_buyer'))->where('status', 'Confirmed')->orWhere('bsid', NULL)->where('slid', $saleid)->where('cbid',Input::get('coffee_buyer'))->where('status', 'Confirmed')->get();
            $sale_lots_unassigned = sale_lots::select('*');
            $sale_lots_unassigned = $sale_lots_unassigned->where('bsid', Input::get('basket'))->where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('status', 'Confirmed')->orWhere('bsid', null)->where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('status', 'Confirmed');
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

            $sale_lots = sale_lots::where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('bsid', Input::get('basket'))->where('status', 'Confirmed')->get();

            return View::make('basket', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'sale_lots', 'seller', 'saleid', 'cdetails', 'buyer', 'sale_status', 'basket', 'pdetails', 'slr', 'sale_cb_id', 'bskt', 'sale_lots_unassigned', 'cupscore', 'grade', 'cupid', 'crt'));
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
            $sale_lots_unassigned = $sale_lots_unassigned->where('bsid', Input::get('basket'))->where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('status', 'Confirmed')->orWhere('bsid', null)->where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('status', 'Confirmed');
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
                    ->update(['bs_id' => null]);
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
            $basket     = basket::where('ctr_id', Input::get('country'))->get();

            // $sale_lots_unassigned = sale_lots::where('bsid', Input::get('basket'))->where('slid', $saleid)->where('cbid',Input::get('coffee_buyer'))->where('status', 'Confirmed')->orWhere('bsid', NULL)->where('slid', $saleid)->where('cbid',Input::get('coffee_buyer'))->where('status', 'Confirmed')->get();
            $sale_lots_unassigned = sale_lots::select('*');
            $sale_lots_unassigned = $sale_lots_unassigned->where('bsid', Input::get('basket'))->where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('status', 'Confirmed')->orWhere('bsid', null)->where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('status', 'Confirmed');
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

            $sale_lots = sale_lots::where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('bsid', Input::get('basket'))->where('status', 'Confirmed')->get();

            return View::make('basket', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'sale_lots', 'seller', 'saleid', 'cdetails', 'buyer', 'sale_status', 'basket', 'pdetails', 'slr', 'sale_cb_id', 'bskt', 'sale_lots_unassigned', 'cupscore', 'grade', 'cupid', 'crt'));
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

                            return View::make('basket', compact('id',
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

                            $sale_lots = sale_lots::where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('bsid', Input::get('basket'))->where('status', 'Confirmed')->get();

                            $sale_lots_unassigned = sale_lots::where('bsid', Input::get('basket'))->where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('status', 'Confirmed')->orWhere('bsid', null)->where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('status', 'Confirmed')->get();

                            // $sale_lots = sale_lots::where('slid', $saleid)->get();

                            return View::make('basket', compact('id',
                                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'bskt', 'sale_lots_unassigned', 'cupscore', 'grade', 'cupid', 'crt'));
                        }

                    } else {
                        // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
                        // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
                        $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->orderBy('sl_no')->get();
                        // $request->session()->flash('alert-success', 'Sale found!!');
                        $cid        = Input::get('country');
                        $csn_season = Input::get('sale_season');
                        return View::make('basket', compact('id',
                            'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'bskt', 'cupscore', 'grade', 'cupid', 'crt'));
                    }

                } else {
                    // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
                    // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
                    $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->orderBy('sl_no')->get();
                    // $request->session()->flash('alert-success', 'Sale found!!');
                    $cid        = Input::get('country');
                    $csn_season = Input::get('sale_season');
                    return View::make('basket', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'bskt', 'cupscore', 'grade', 'cupid', 'crt'));
                }
            } else {

                return redirect('basket')
                    ->withErrors("Please select a valid Country!!")->withInput();
            }

            return View::make('basket', compact('id', 'Season', 'country', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'bskt', 'cupscore', 'grade', 'cupid', 'crt'));
        }

    }

    public function bricContractsForm(Request $request)
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

        return View::make('briccontracts', compact('id', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'largest', 'greensize', 'greencolor', 'greendefects', 'processing', 'cupscore', 'rawscore', 'screens', 'buyer', 'sale_status'));

    }

    public function bricContracts(Request $request)
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

        $cupscore = cupscore::all(['id', 'cp_score', 'cp_quality']);
        $rawscore = rawscore::all(['id', 'rw_score', 'rw_quality']);

        $Certification = Certification::all(['id', 'crt_name']);

        $slr  = Input::get('seller');
        $bskt = Input::get('basket');

        $sale_cb_id = Input::get('coffee_buyer');



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

            $sale_lots = sale_lots::where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('bsid', Input::get('basket'))->where('status', 'Confirmed')->get();
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
                    ['br_no' => $bric,'bs_id' => $basket, 'br_date' => $date, 'br_confirmedby' => $user, 'br_purchased_weight' => $sum_bric_weight, 'br_price_per_fifty' => $purchase_contract_price, 'br_price_pounds' => $purchase_contract_price_pounds, 'br_diffrential' => $purchase_contract_differential, 'br_value' => $purchase_contract_value, 'cb_id' => $cbid, 'cg_id' => $cgid]);
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

                $pid      = $pdetails->id;

                $bric_ratio = $value->weight/$sum_bric_weight;

                $cost_value = ($value->weight/50) * $value->price;

                $bric_value = ( $value->weight/50 ) * $purchase_contract_price;

                // $value->price + $value->sl_margin;

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
            $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->orderByRaw('LENGTH(`sl_no`) ASC')->orderBy('sl_no')->get();

            $cid        = Input::get('country');
            $csn_season = Input::get('sale_season');
            $saleid     = Input::get('sale');

            $sale_status = sale_status::all(['id', 'sst_name']);
            $basket      = basket::where('ctr_id', Input::get('country'))->orderBy('bs_code')->get();

            $sale_lots   = sale_lots::where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('bsid', Input::get('basket'))->where('status', 'Confirmed')->get();

            return View::make('briccontracts', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'sale_lots', 'seller', 'saleid', 'cdetails', 'buyer', 'sale_status', 'basket', 'pdetails', 'slr', 'sale_cb_id', 'bskt'));

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
                            $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->orderByRaw('LENGTH(`sl_no`) ASC')->orderBy('sl_no')->get();

                            $request->session()->flash('alert-success', 'Sale found!!');
                            $cid        = Input::get('country');
                            $csn_season = Input::get('sale_season');

                            return View::make('briccontracts', compact('id',
                                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'bskt'));
                        } else {
                            $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->orderByRaw('LENGTH(`sl_no`) ASC')->orderBy('sl_no')->get();
                            $cid        = Input::get('country');
                            $csn_season = Input::get('sale_season');
                            $saleid     = Input::get('sale');

                            $sale_type = Sale::where('id', $saleid)->first();


                            if ($sale_type->sltyp_id == 2) {
                                $sale_lots_sale_type = sale_lots::where('slid', $saleid)->first();
                                $bskt = null;
                                if ($sale_lots_sale_type != null) {
                                    $bskt = $sale_lots_sale_type->bsid; 
                                    $sale_cb_id = $sale_lots_sale_type->cbid; 
                                    $sale_lots = sale_lots::where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('bsid', $bskt)->where('status', 'Confirmed')->whereNotNull('invoice')->get();      

                                }
                            }

                            if ($sale_cb_id == null) {
                                $sale_cb_id = Input::get('coffee_buyer');
                            }
                            if ($bskt == null) {
                                $bskt = Input::get('basket');
                            }

                            $sale_lots = sale_lots::where('slid', $saleid)->where('cbid', $sale_cb_id)->where('bsid', $bskt)->where('status', 'Confirmed')->whereNotNull('invoice')->get();

                            return View::make('briccontracts', compact('id',
                                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'bskt'));
                        }

                    } else {
                        $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->orderByRaw('LENGTH(`sl_no`) ASC')->orderBy('sl_no')->get();
                        $cid        = Input::get('country');
                        $csn_season = Input::get('sale_season');
                        return View::make('briccontracts', compact('id',
                            'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'bskt'));
                    }

                } else {
                    $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->orderByRaw('LENGTH(`sl_no`) ASC')->orderBy('sl_no')->get();
                    $cid        = Input::get('country');
                    $csn_season = Input::get('sale_season');
                    return View::make('briccontracts', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'bskt'));
                }
            } else {

                return redirect('briccontracts')
                    ->withErrors("Please select a valid Country!!")->withInput();
            }

            return View::make('briccontracts', compact('id', 'Season', 'country', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'bskt'));
        }

    }

    public function warrantsForm(Request $request)
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
        
        return View::make('warrants', compact('id', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'largest', 'greensize', 'greencolor', 'greendefects', 'processing', 'cupscore', 'rawscore', 'screens', 'buyer', 'sale_status'));

    }

    public function warrants(Request $request)
    {
        $id = null;

        $Warehouse = null;
        $Mill      = null;

        $greensize    = quality_parameters::where('qg_id', '1')->get();
        $greencolor   = quality_parameters::where('qg_id', '2')->get();
        $greendefects = quality_parameters::where('qg_id', '3')->get();
        $processing   = processing::all(['id', 'prcss_name']);
        $buyer        = buyer::where('bt_id', '1')->get();
        $sale_status  = sale_status::all(['id', 'sst_name']);
        $basket       = basket::where('ctr_id', Input::get('country'))->get();

        $screens = screens::all(['id', 'scr_name']);

        $cupscore = cupscore::all(['id', 'cp_score', 'cp_quality']);
        $rawscore = rawscore::all(['id', 'rw_score', 'rw_quality']);
        $lot      = Input::get('sif_lot');

        $Certification = Certification::all(['id', 'crt_name']);

        $slr        = Input::get('seller');
        $sale_cb_id = Input::get('coffee_buyer');

        $user_data = Auth::user();
        $user      = $user_data->id;

        $saleid = Input::get('sale');

        if (null !== Input::get('submitlot')) {

            $this->validate($request, [
                'country' => 'required', 'sale_season' => 'required', 'sale' => 'required',
            ]);
            // print_r(Input::get('date10'));
            $lots = Input::get('lots');
            foreach ($lots as $value) {
                $wrdate    = null;
                $warehouse = null;
                $serial    = null;
                $warWeight = null;
                $comments  = null;
                $war_id    = null;
                if (Input::get('date' . $value) != null) {
                    $wrdate = Input::get('date' . $value);
                    $wrdate = date_create($wrdate);
                    $wrdate = date_format($wrdate, "Y-m-d");
                }
                $warehouse = Input::get('warehouse' . $value);

                $serial    = Input::get('serial' . $value);
                $warWeight = Input::get('warWeight' . $value);
                $comments  = Input::get('comments' . $value);

                $wardetails = warrants::where('war_no', $serial)->first();
                $pdetails   = purchase::where('cfd_id', $value)->first();

                if ($pdetails  != null) {

                    $invoiced_weight = $pdetails->inv_weight;

                }
                
                $threshold_name = "Warrants";

                $identifier = $threshold_name. " ". $serial;

                $this->checkThreshold($threshold_name, $invoiced_weight, $warWeight, $identifier);

                if ($wardetails != null) {
                    $war_id = $wardetails->id;
                    warrants::where('id', '=', $war_id)
                        ->update(['war_no' => $serial, 'war_date' => $wrdate, 'war_weight' => $warWeight, 'war_confirmedby' => $user, 'war_comments' => $comments]);

                    Activity::log('Updated warant information with warant no. ' . $serial . ' date ' . $wrdate . ' confirmed by ' . $user);
                    $request->session()->flash('alert-success', 'Warrant Information Updated!!');

                }
                if ($wardetails == null && $serial != null) {
                    $war_id = warrants::insertGetId(
                        ['war_no' => $serial, 'war_date' => $wrdate, 'war_weight' => $warWeight, 'war_confirmedby' => $user, 'war_comments' => $comments]);
                    $request->session()->flash('alert-success', 'Warrant Information Added!!');
                    Activity::log('Inserted warant information with warant no. ' . $serial . ' warrant weight ' . $warWeight . ' date ' . $wrdate . ' confirmed by ' . $user);
                }

                if ($pdetails != null && $war_id != null) {
                    $pid = $pdetails->id;
                    purchase::where('id', '=', $pid)
                        ->update(['war_id' => $war_id]);

                    $request->session()->flash('alert-success', 'Warrant Information Updated!!');

                    Activity::log('Updated warrant information with warant no. ' . $serial . ' warrant weight ' . $warWeight . ' date ' . $wrdate . ' confirmed by ' . $user);

                }
                if ($value != null && $warehouse != null) {
                    coffee_details::where('id', '=', $value)
                        ->update(['wr_id' => $warehouse]);
                    Activity::log('Updated warehouse for coffeeid ' . $value . ' to ' . $warehouse);
                }
            }

            $Season      = Season::all(['id', 'csn_season']);
            $country     = country::all(['id', 'ctr_name', 'ctr_initial']);
            $CoffeeGrade = CoffeeGrade::all(['id', 'cgrad_name']);
            $region      = Region::where('ctr_id', Input::get('country'))->get();

            if (Input::get('country') != null) {
                $Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
                $Mill      = mills_region::where('ctr_id', Input::get('country'))->get();
                $seller    = seller::where('ctr_id', Input::get('country'))->get();
            }
            $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->where('sltyp_id', 1)->orderByRaw('LENGTH(`sl_no`) ASC')->orderBy('sl_no')->get();

            $cid        = Input::get('country');
            $csn_season = Input::get('sale_season');
            $saleid     = Input::get('sale');
            // $sale_lots = sale_lots::where('slid', $saleid)->get();
            if ($request->has('seller') && Input::get('seller') != null) {
                $sale_lots = sale_lots::where('slid', $saleid)->where('slrid', Input::get('seller'))->where('cbid', Input::get('coffee_buyer'))->whereNotNull('payment')->orderBy('lot')->get();

            } else {
                $sale_lots = sale_lots::where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->whereNotNull('payment')->orderBy('lot')->get();

            }
            // $request->session()->flash('alert-success', 'Purchase Information Added!!');

            $sale_status = sale_status::all(['id', 'sst_name']);
            $basket      = basket::where('ctr_id', Input::get('country'))->get();

            return View::make('warrants', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'sale_lots', 'seller', 'saleid', 'cdetails', 'buyer', 'sale_status', 'basket', 'pdetails', 'slr', 'sale_cb_id', 'lot_info', 'Warehouse'));

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
                            // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
                            $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->where('sltyp_id', 1)->orderByRaw('LENGTH(`sl_no`) ASC')->orderBy('sl_no')->get();
                            $request->session()->flash('alert-success', 'Sale found!!');
                            $cid        = Input::get('country');
                            $csn_season = Input::get('sale_season');
                            // $saleid = Input::get('sale');

                            // $sale_lots = sale_lots::where('slid', $saleid)->get();

                            return View::make('warrants', compact('id',
                                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id'));
                        } else {
                            // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
                            // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
                            $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->where('sltyp_id', 1)->orderByRaw('LENGTH(`sl_no`) ASC')->orderBy('sl_no')->get();
                            // $request->session()->flash('alert-success', 'Sale found!!');
                            $cid        = Input::get('country');
                            $csn_season = Input::get('sale_season');
                            $saleid     = Input::get('sale');

                            if ($request->has('seller') && Input::get('seller') != null) {
                                $sale_lots = sale_lots::where('slid', $saleid)->where('slrid', Input::get('seller'))->where('cbid', Input::get('coffee_buyer'))->whereNotNull('payment')->orderBy('lot')->get();
                                // $lot_in_sale = sale_lots::where('slid', $saleid)->where('slrid',Input::get('seller'))->where('cbid',Input::get('coffee_buyer'))->where('lot', $lot)->first();
                                // $cdetails = coffee_details::where('id', $lot_in_sale->id)->first();

                            } else {
                                $sale_lots = sale_lots::where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->whereNotNull('payment')->orderBy('lot')->get();
                                // $lot_in_sale = sale_lots::where('slid', $saleid)->where('cbid',Input::get('coffee_buyer'))->where('lot', $lot)->first();
                                // $cdetails = coffee_details::where('id', $lot_in_sale->id)->first();

                            }

                            // $sale_lots = sale_lots::where('slid', $saleid)->get();

                            return View::make('warrants', compact('id',
                                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id'));
                        }

                    } else {
                        // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
                        // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
                        $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->where('sltyp_id', 1)->orderByRaw('LENGTH(`sl_no`) ASC')->orderBy('sl_no')->get();
                        // $request->session()->flash('alert-success', 'Sale found!!');
                        $cid        = Input::get('country');
                        $csn_season = Input::get('sale_season');
                        return View::make('warrants', compact('id',
                            'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id'));
                    }

                } else {
                    // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
                    // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
                    $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->where('sltyp_id', 1)->orderByRaw('LENGTH(`sl_no`) ASC')->orderBy('sl_no')->get();
                    // $request->session()->flash('alert-success', 'Sale found!!');
                    $cid        = Input::get('country');
                    $csn_season = Input::get('sale_season');
                    return View::make('warrants', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id'));
                }
            } else {

                return redirect('warrants')
                    ->withErrors("Please select a valid Country!!")->withInput();
            }

            return View::make('warrants', compact('id', 'Season', 'country', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id'));
        }

    }

 public function releaseInstructionsForm(Request $request)
    {
        $id            = null;
        $Season        = Season::all(['id', 'csn_season']);
        $country       = country::all(['id', 'ctr_name', 'ctr_initial']);
        $CoffeeGrade   = CoffeeGrade::all(['id', 'cgrad_name']);
        $Certification = Certification::all(['id', 'crt_name']);
        $buyer         = buyer::where('bt_id', '1')->get();
        $basket        = basket::where('ctr_id', Input::get('country'))->get();

        $sale_status = sale_status::all(['id', 'sst_name']);
        $Warehouse   = null;
        $Mill        = null;

        $cid        = null;
        $csn_season = null;
        $sale_cb_id = null;
        $release_no = null;
        $date       = null;
        $release_no = null;

        $ref_no = release::orderBy('previous_no', 'asc')->pluck('previous_no');
        foreach ($ref_no as $ref) {
            $ref_no = $ref;
        }

        if ($ref_no != null && is_numeric($ref_no)) {
            $ref_no = sprintf("%07d", ($ref_no + 0000001));
        } else {
            $ref_no = sprintf("%07d", 0000001);
        }

        return View::make('releaseinstructions', compact('id',
            'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'ref_no'));

    }

    public function releaseInstructions(Request $request)
    {
        $id = null;

        $Warehouse = null;
        $Mill      = null;

        $greensize    = quality_parameters::where('qg_id', '1')->get();
        $greencolor   = quality_parameters::where('qg_id', '2')->get();
        $greendefects = quality_parameters::where('qg_id', '3')->get();
        $processing   = processing::all(['id', 'prcss_name']);
        $buyer        = buyer::where('bt_id', '1')->get();
        $sale_status  = sale_status::all(['id', 'sst_name']);
        $basket       = basket::where('ctr_id', Input::get('country'))->get();

        $screens = screens::all(['id', 'scr_name']);

        $cupscore = cupscore::all(['id', 'cp_score', 'cp_quality']);
        $rawscore = rawscore::all(['id', 'rw_score', 'rw_quality']);

        $Certification = Certification::all(['id', 'crt_name']);

        $slr = Input::get('seller');

        $saleid = Input::get('sale');

        if ($saleid == null) {
            $saleid = array("null");
        }
        
        $wrhse  = Input::get('warehouse');

        $release_no = null;

        $sale_cb_ids = Input::get('coffee_buyer');

        $coffee_buyers = Input::get('coffee_buyer');

        //added input for basket
        $coffee_basket = Input::get('coffee_basket');
        $coffee_baskets= $coffee_basket;
        if ($request->has('country')) {
            $transporters = transporters::where('ctr_id', '=', Input::get('country'))->get();
            $trp          = Input::get('trp');
        }
        if ('search' == Input::get('searchButton')) {
            $ref_no     = Input::get('ref_no');
        }else{
            $ref_no = release::orderBy('previous_no', 'asc')->pluck('previous_no');
        foreach ($ref_no as $ref) {
            $ref_no = $ref;
        }
        

        if ($ref_no != null && is_numeric($ref_no)) {
            $ref_no = sprintf("%07d", ($ref_no + 0000001));
        } else {
            $ref_no = sprintf("%07d", 0000001);
        }
        }
        //dd($ref_no);
        if (Input::get('country') != null) {
            $Warehouse = warehouses_region::where('ctr_id', Input::get('country'))->get();
            $Mill      = mills_region::where('ctr_id', Input::get('country'))->get();
            $seller    = seller::where('ctr_id', Input::get('country'))->get();
            $basket    = basket::where('ctr_id', Input::get('country'))->get()->sortBy('bs_code');
        }
        if (null !== Input::get('submitlot')) {
            $this->validate($request, [
                'country' => 'required', 'sale_season' => 'required', 'sale'=>'required', 'seller' => 'required', 'coffee_buyer' => 'required', 'trp' => 'required', 'release_no' => 'required', 'date' => 'required',
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

            $release_no = Input::get('release_no');
            $ref_no     = Input::get('ref_no');
            $trp        = Input::get('trp');

            $rl_date = Input::get('date');
            $date    = Input::get('date');
            $date    = date_create($date);
            $date    = date_format($date, "Y-m-d");

            $user_data = Auth::user();
            $user      = $user_data->id;

            if ($wrhse != null) {
                $sale_lots  = sale_lots::whereIn('slid', $saleid)->whereIn('slrid', Input::get('seller'))->whereIn('cbid', Input::get('coffee_buyer'))->whereNotNull('warrant_no')->where('wrid', $wrhse)->orderBy('sale')->orderBy('lot')->get();
            }

            $sale_lots = null;
            
            if ($wrhse != null) {
                //dd(Input::get('sale'));
                $sale_lots  = sale_lots::whereIn('slid', $saleid)->whereIn('slrid', Input::get('seller'))->whereIn('cbid', Input::get('coffee_buyer'))->whereNotNull('warrant_no')->where('wrid', $wrhse)->orderBy('sale')->orderBy('lot')->get();
            }
            //dd($sale_lots);
            if ($sale_lots == null || $sale_lots->isEmpty()) {
                $sale_lots  = sale_lots::whereIn('slid', $saleid)->whereIn('slrid', Input::get('seller'))->whereIn('cbid', Input::get('coffee_buyer'))->whereNotNull('warrant_no')->where('wrid', $wrhse)->orderBy('sale')->orderBy('lot')->get();
                $sale_lots  = sale_lots::whereIn('slid', $saleid)->whereIn('slrid', Input::get('seller'))->whereIn('cbid', Input::get('coffee_buyer'))->whereNotNull('warrant_no')->orderBy('sale')->orderBy('lot')->get();
            }
            
            $tobereleased = Input::get('tobereleased');
            
            $release_instructions = release_instructions::where('rl_no', $release_no)->first();

            if ($release_instructions != null) {
                $rl_id = $release_instructions->id;
                release_instructions::where('id', '=', $rl_id)
                    ->update(['trp_id' => $trp, 'rl_no' => $release_no, 'rl_ref_no' => $ref_no, 'rl_date' => $date, 'rl_confirmedby' => $user]);

                Activity::log('Updated release information with release no. ' . $release_no . ' date ' . $date . ' confirmed by ' . $user);
                $request->session()->flash('alert-success', 'Release Information Updated!!');

            } else {
                $rl_id = release_instructions::insertGetId(
                    ['trp_id' => $trp, 'rl_no' => $release_no, 'rl_ref_no' => $ref_no, 'rl_date' => $date, 'rl_confirmedby' => $user]);
                $request->session()->flash('alert-success', 'Release Information Added!!');
                Activity::log('Inserted release information with release no. ' . $release_no . ' date ' . $date . ' confirmed by ' . $user);
            }
            //refresh
            // for ($i = 0; $i < count($sale_lots); $i++) {
            //     $pdetails = purchase::where('cfd_id', $sale_lots[$i]->id)->first();
            //     $pid = $pdetails->id;

            //     purchase::where('id', '=', $pid)
            //         ->update(['rl_id' => null]);

            // }
            
            for ($i = 0; $i < count($tobereleased); $i++) {
                $pdetails = purchase::where('cfd_id', $tobereleased[$i])->first();
                $pid      = $pdetails->id;

                purchase::where('id', '=', $pid)
                    ->update(['rl_id' => $rl_id]);

                $request->session()->flash('alert-success', 'Purchase Release Information Updated!!');
                Activity::log('Updated Release for coffeeid' . $tobereleased[$i] . ' with release id ' . $rl_id);
            }

            $Season  = Season::all(['id', 'csn_season']);
            $country = country::all(['id', 'ctr_name', 'ctr_initial']);

            $countbuyers=count(Input::get('coffee_buyer'));
            $coffee_buyers=Input::get('coffee_buyer');
            if($countbuyers==1){
                if ((int)$coffee_buyers[0] == 1) {
                    $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->where('sltyp_id', 1)->orderByRaw('LENGTH(`sl_no`) ASC')->orderBy('sl_no')->get();

                } else {

                    $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->where('sltyp_id', 2)->orderByRaw('LENGTH(`sl_no`) ASC')->orderBy('sl_no')->get();

                }
            }else if($countbuyers==2){
                //more than one buyer selected, do not select sale type
                $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->orderByRaw('LENGTH(`sl_no`) ASC')->orderBy('sl_no')->get();
            }
            
            $cid                = Input::get('country');
            $csn_season         = Input::get('sale_season');
            $saleid             = Input::get('sale');
            $date               = Input::get('date');
            $slr                = Input::get('seller');

            $sale_lots = null;
            $sale_lots_released = null;
            $release_no  = release_instructions::where('rl_no', $release_no)->first();
            $release_no  = $release_no->rl_no;

            //if basket has been selected
            if(!empty($coffee_basket)){
                $coffee_basket=(int)$coffee_basket;
                if ($wrhse != null) {
                    $sale_lots  = sale_lots::whereIn('slrid', Input::get('seller'))->whereIn('cbid', Input::get('coffee_buyer'))->whereNotNull('warrant_no')->where('wrid', $wrhse)->where('bsid', $coffee_basket)->orderBy('sale')->whereNull('rl_no')->orderBy('lot')->get();
                    $sale_lots_released = sale_lots::whereIn('slrid', Input::get('seller'))->whereIn('cbid', Input::get('coffee_buyer'))->whereNotNull('warrant_no')->whereNotNull('rl_no')->where('wrid', $wrhse)->where('rl_no', $release_no)->orderBy('sale')->orderBy('lot')->get();
                }
                if ($sale_lots == null || $sale_lots->isEmpty()) {
                    $sale_lots  = sale_lots::whereIn('slrid', Input::get('seller'))->whereIn('cbid', Input::get('coffee_buyer'))->where('bsid', $coffee_basket)->whereNotNull('warrant_no')->whereNull('rl_no')->orderBy('sale')->orderBy('lot')->get();
                }
            }else{
                if ($wrhse != null) {
                    $sale_lots  = sale_lots::whereIn('slrid', Input::get('seller'))->whereIn('cbid', Input::get('coffee_buyer'))->whereNotNull('warrant_no')->where('wrid', $wrhse)->orderBy('sale')->whereNull('rl_no')->orderBy('lot')->get();
                    $sale_lots_released = sale_lots::whereIn('slrid', Input::get('seller'))->whereIn('cbid', Input::get('coffee_buyer'))->whereNotNull('warrant_no')->whereNotNull('rl_no')->where('wrid', $wrhse)->where('rl_no', $release_no)->orderBy('sale')->orderBy('lot')->get();
                }
                if ($sale_lots == null || $sale_lots->isEmpty()) {
                    $sale_lots  = sale_lots::whereIn('slrid', Input::get('seller'))->whereIn('cbid', Input::get('coffee_buyer'))->whereNotNull('warrant_no')->whereNull('rl_no')->orderBy('sale')->orderBy('lot')->get();
                }
            }



            // if ($wrhse != null) {
            //     $sale_lots  = sale_lots::where('slid', $saleid)->where('slrid', Input::get('seller'))->where('cbid', Input::get('coffee_buyer'))->whereNotNull('warrant_no')->where('wrid', $wrhse)->whereNull('rl_no')->get();
            //     $sale_lots_released = sale_lots::where('slid', $saleid)->where('slrid', Input::get('seller'))->where('cbid', Input::get('coffee_buyer'))->whereNotNull('warrant_no')->whereNotNull('rl_no')->where('wrid', $wrhse)->where('rl_no', $release_no)->get();
            // }
            // if ($sale_lots == null || $sale_lots->isEmpty()) {
            //      $sale_lots  = sale_lots::where('slid', $saleid)->where('slrid', Input::get('seller'))->where('cbid', Input::get('coffee_buyer'))->whereNotNull('warrant_no')->whereNull('rl_no')->get();
            // }

            // if ($sale_lots_released == null || $sale_lots_released->isEmpty()) {
            //     $sale_lots_released = sale_lots::where('slid', $saleid)->where('slrid', Input::get('seller'))->where('cbid', Input::get('coffee_buyer'))->whereNotNull('warrant_no')->whereNotNull('rl_no')->where('rl_no', $release_no)->get();
            // }


            $sale_lots  = sale_lots::whereIn('slid', $saleid)->whereIn('slrid', Input::get('seller'))->whereIn('cbid', Input::get('coffee_buyer'))->whereNotNull('warrant_no')->where('wrid', $wrhse)->orderBy('sale')->orderBy('lot')->get();
            $saleno     = Sale::whereIn('id', Input::get('sale'))->first();
            $sellerinit = seller::whereIn('id', Input::get('seller'))->first();
            // if ($request->has('sale') && Input::get('sale') != null) {
            //     $release_no = $saleno->sl_no . $sellerinit->slr_initials;
            // } else {
            // }
            

            return View::make('releaseinstructions', compact('id',
                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_ids','coffee_baskets', 'transporters', 'trp', 'release_no', 'date', 'sale_lots_released', 'ref_no', 'rl_date', 'wrhse'));

        } else if (null !== Input::get('printreleaseinstructions')) {
            $this->validate($request, ['country' => 'required', 'sale_season' => 'required', 'sale' => 'required', 'seller' => 'required', 'coffee_buyer' => 'required', 'trp' => 'required', 'release_no' => 'required', 'date' => 'required',
            ]);

            $saleid = Input::get('sale');

            $release_no = Input::get('release_no');

            $date = Input::get('date');
            $date = date_create($date);
            $date = date_format($date, "Y-m-d");

            $user_data = Auth::user();
            $user      = $user_data->id;

            $sale_lots = null;
            $sale_lots_released = null;
            //dd($sale_lots_released);
    
            if ($request->has('sale') && Input::get('sale') != null) {
                if ($wrhse != null) {
                    $sale_lots  = sale_lots::whereIn('slid', $saleid)->whereIn('slrid', Input::get('seller'))->whereIn('cbid', Input::get('coffee_buyer'))->whereNotNull('warrant_no')->where('wrid', $wrhse)->orderBy('lot')->get();
                    $sale_lots_released = sale_lots::whereIn('slid', $saleid)->whereIn('slrid', Input::get('seller'))->whereIn('cbid', Input::get('coffee_buyer'))->whereNotNull('warrant_no')->whereNotNull('rl_no')->where('wrid', $wrhse)->where('rl_no', $release_no)->orderBy('sale')->orderBy('lot')->get();
                }
                if ($sale_lots == null || $sale_lots->isEmpty()) {
                     $sale_lots  = sale_lots::whereIn('slid', $saleid)->whereIn('slrid', Input::get('seller'))->whereIn('cbid', Input::get('coffee_buyer'))->whereNotNull('warrant_no')->orderBy('sale')->orderBy('lot')->get();
                }

                if ($sale_lots_released == null || $sale_lots_released->isEmpty()) {
                    $sale_lots_released = sale_lots::whereIn('slid', $saleid)->whereIn('slrid', Input::get('seller'))->whereIn('cbid', Input::get('coffee_buyer'))->whereNotNull('warrant_no')->whereNotNull('rl_no')->where('rl_no', $release_no)->orderBy('sale')->orderBy('lot')->get();
                }               
            } else {
                if ($wrhse != null) {
                    $sale_lots  = sale_lots::whereIn('slrid', Input::get('seller'))->where('cbid', Input::get('coffee_buyer'))->whereNotNull('warrant_no')->where('wrid', $wrhse)->orderBy('sale')->orderBy('lot')->get();
                    $sale_lots_released = sale_lots::whereIn('slrid', Input::get('seller'))->where('cbid', Input::get('coffee_buyer'))->whereNotNull('warrant_no')->whereNotNull('rl_no')->where('wrid', $wrhse)->where('rl_no', $release_no)->orderBy('sale')->orderBy('lot')->get();
                }
                if ($sale_lots == null || $sale_lots->isEmpty()) {
                     $sale_lots  = sale_lots::whereIn('slrid', Input::get('seller'))->whereIn('cbid', Input::get('coffee_buyer'))->whereNotNull('warrant_no')->orderBy('sale')->orderBy('lot')->get();
                }

                if ($sale_lots_released == null || $sale_lots_released->isEmpty()) {
                    $sale_lots_released = sale_lots::whereIn('slrid', Input::get('seller'))->whereIn('cbid', Input::get('coffee_buyer'))->whereNotNull('warrant_no')->whereNotNull('rl_no')->where('rl_no', $release_no)->orderBy('sale')->orderBy('lot')->get();
                }
            }

            
            $toatt = seller::whereIn('id', Input::get('seller'))->first();

            $toatt_wr = Warehouse::where('id', $wrhse)->first();

            //dd($toatt);

            $to    = null;
            $att   = null;

            if ($toatt !== null) {
                $to  = $toatt->slr_name;
            }
            if ($toatt_wr !== null) {
                $att = $toatt_wr->wr_att;
            }
            $cc = transporters::where('id', '=', Input::get('trp'))->first();
            if ($cc != null) {
                $cc = $cc->trp_name;
            }

            $date = release_instructions::where('rl_no', $release_no)->first();
            if ($date != null) {
                $date = $date->rl_date;
                $date = date("d/m/Y", strtotime($date));
            }


            $buyer = buyer::whereIn('id', Input::get('coffee_buyer'))->first();
            $buyer_email = $buyer->cb_email;
            $buyer = $buyer->cb_name;
            


            $sale_lots = $sale_lots_released ;

            $person_id      = $user_data->per_id;
            $personDetails = Person::where('id', $person_id)->first();

            $person_fname      = $personDetails->per_fname;
            $person_sname      = $personDetails->per_sname;

            $pdf = PDF::loadView('pdf.release_instructions', compact('to', 'att', 'cc', 'date', 'release_no', 'buyer', 'sale_lots', 'person_fname', 'person_sname', 'buyer_email'));
            if (Input::get('coffee_buyer') == 1) {

                $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->where('sltyp_id', 1)->orderByRaw('LENGTH(`sl_no`) ASC')->orderBy('sl_no')->get();

            } else {

                $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->where('sltyp_id', 2)->orderByRaw('LENGTH(`sl_no`) ASC')->orderBy('sl_no')->get();

            }
            return $pdf->stream($release_no . ' release_instructions.pdf');

        } else {
            $Season      = Season::all(['id', 'csn_season']);
            $country     = country::all(['id', 'ctr_name', 'ctr_initial']);
            $CoffeeGrade = CoffeeGrade::all(['id', 'cgrad_name']);
            $region      = Region::where('ctr_id', Input::get('country'))->get();
            $release_no = Input::get('release_no');

            if ($request->has('country')) {
                if ($request->has('sale_season') && Input::get('sale_season') !== "Sale Season" && $request->has('seller')) {
                    if ($request->has('sale') && Input::get('sale') != null) {
                        $sales = Sale::whereIn('id', Input::get('sale'))->where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->get();
                       // dd($sales->all());
                       foreach($sales->all() as $sale){
                        if ($sale->sl_quality_confirmedby == null) {
                            $request->session()->flash('alert-warning', 'Catalogue quality details for sale ' . $sale->sl_no . ' have not yet been confirmed. Please confirm to continue.');
                        $errors[]='Not confirmed';
                        }
                        }
                         if(!empty($errors)){
                        $countbuyers=count(Input::get('coffee_buyer'));
                        $coffee_buyers=Input::get('coffee_buyer');
                        if($countbuyers==1){
                        if ((int)$coffee_buyers[0] == 1) {
                            $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->where('sltyp_id', 1)->orderByRaw('LENGTH(`sl_no`) ASC')->orderBy('sl_no')->get();

                        } else {
                            
                            $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_qualit0000121y_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->where('sltyp_id', 2)->orderByRaw('LENGTH(`sl_no`) ASC')->orderBy('sl_no')->get();

                        }
                    }else if($countbuyers==2){
                        //more than one buyer selected, do not select sale type
                        $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->orderByRaw('LENGTH(`sl_no`) ASC')->orderBy('sl_no')->get();
                    }
                            $request->session()->flash('alert-success', 'Sale found!!');
                            $cid        = Input::get('country');
                            $csn_season = Input::get('sale_season');

                            return View::make('releaseinstructions', compact('id',
                                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'transporters', 'trp', 'ref_no', 'rl_date', 'wrhse', 'date'));
                         }else {
                            $cid        = Input::get('country');
                            $csn_season = Input::get('sale_season');
                            $saleid     = Input::get('sale');
                            $sale_lots = null;
                            $sale_lots_released = null;

                            // print_r($release_no);

                            // if ($wrhse != null) {
                            //     $sale_lots  = sale_lots::where('slid', $saleid)->where('slrid', Input::get('seller'))->where('cbid', Input::get('coffee_buyer'))->whereNotNull('warrant_no')->where('wherewrid', $wrhse)->whereNull('rl_no')->get();
                            //     $sale_lots_released = sale_lots::where('slid', $saleid)->where('slrid', Input::get('seller'))->where('cbid', Input::get('coffee_buyer'))->whereNotNull('warrant_no')->whereNotNull('rl_no')->where('rl_no', $release_no)->where('wrid', $wrhse)->get();
                            // }
                            // if ($sale_lots == null || $sale_lots->isEmpty()) {
                            //      $sale_lots  = sale_lots::where('slid', $saleid)->where('slrid', Input::get('seller'))->where('cbid', Input::get('coffee_buyer'))->whereNotNull('warrant_no')->whereNull('rl_no')->get();
                            // }

                            // if ($sale_lots_released == null || $sale_lots_released->isEmpty()) {
                            //     $swhereale_lots_released = sale_lots::where('slid', $saleid)->where('slrid', Input::get('seller'))->where('cbid', Input::get('coffee_buyer'))->whereNotNull('warrant_no')->where('rl_no', $release_no)->whereNotNull('rl_no')->get();
                            // }


                        $countbuyers=count(Input::get('coffee_buyer'));
                        $coffee_buyers=Input::get('coffee_buyer');
                        if($countbuyers==1){
                        if ((int)$coffee_buyers[0] == 1) {
                            $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->where('sltyp_id', 1)->orderByRaw('LENGTH(`sl_no`) ASC')->orderBy('sl_no')->get();

                        } else {
                            
                            $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->where('sltyp_id', 2)->orderByRaw('LENGTH(`sl_no`) ASC')->orderBy('sl_no')->get();

                        }
                    }else if($countbuyers==2){
                        //more than one buyer selected, do not select sale type
                        $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->orderByRaw('LENGTH(`sl_no`) ASC')->orderBy('sl_no')->get();
                    }
                      
                        $cid        = Input::get('country');
                        $csn_season = Input::get('sale_season');


                        $sale_lots = null;
                        $sale_lots_released = null;

                        //if basket has been selected
                        if(!empty($coffee_basket)){
                            $coffee_basket=(int)$coffee_basket;
                            if ($wrhse != null) {
                                $sale_lots  = sale_lots::whereIn('slid', $saleid)->whereIn('slrid', Input::get('seller'))->whereIn('cbid', Input::get('coffee_buyer'))->whereNotNull('warrant_no')->where('wrid', $wrhse)->where('bsid', $coffee_basket)->orderBy('sale')->whereNull('rl_no')->orderBy('lot')->get();

                                $sale_lots_released = sale_lots::where('slid', $saleid)->whereIn('slrid', Input::get('seller'))->whereIn('cbid', Input::get('coffee_buyer'))->whereNotNull('warrant_no')->whereNotNull('rl_no')->where('wrid', $wrhse)->where('rl_no', $release_no)->orderBy('sale')->orderBy('lot')->get();
                            } else {
                                 $sale_lots  = sale_lots::whereIn('slid', $saleid)->whereIn('slrid', Input::get('seller'))->whereIn('cbid', Input::get('coffee_buyer'))->where('bsid', $coffee_basket)->whereNotNull('warrant_no')->whereNull('rl_no')->orderBy('sale')->orderBy('lot')->get();
                                $sale_lots_released = sale_lots::whereIn('slid', $saleid)->whereIn('slrid', Input::get('seller'))->whereIn('cbid', Input::get('coffee_buyer'))->whereNotNull('warrant_no')->where('rl_no', $release_no)->orderBy('sale')->orderBy('lot')->get();
                            }
                        }else{
                            if ($wrhse != null) {
                                $sale_lots  = sale_lots::whereIn('slid', $saleid)->whereIn('slrid', Input::get('seller'))->whereIn('cbid', Input::get('coffee_buyer'))->whereNotNull('warrant_no')->where('wrid', $wrhse)->orderBy('sale')->whereNull('rl_no')->orderBy('lot')->get();
                                $sale_lots_released = sale_lots::whereIn('slid', $saleid)->whereIn('slrid', Input::get('seller'))->whereIn('cbid', Input::get('coffee_buyer'))->whereNotNull('warrant_no')->whereNotNull('rl_no')->where('wrid', $wrhse)->where('rl_no', $release_no)->orderBy('sale')->orderBy('lot')->get();
                                
                            } else {

                                if(Input::get('coffee_buyer')!==null){
                                    
                                    $sale_lots  = sale_lots::whereIn('slid', $saleid)->whereIn('slrid', Input::get('seller'))->whereIn('cbid', Input::get('coffee_buyer'))->whereNotNull('warrant_no')->whereNull('rl_no')->orderBy('sale')->orderBy('lot')->get();

                                    $sale_lots_released = sale_lots::whereIn('slid', $saleid)->whereIn('slrid', Input::get('seller'))->whereIn('cbid', Input::get('coffee_buyer'))->whereNotNull('warrant_no')->whereNotNull('rl_no')->where('rl_no', $release_no)->orderBy('sale')->orderBy('lot')->get();
                                

                                } else {

                                    $sale_lots  = sale_lots::whereIn('slid', $saleid)->whereIn('slrid', Input::get('seller'))->whereNotNull('warrant_no')->whereNull('rl_no')->orderBy('sale')->orderBy('lot')->get();

                                    $sale_lots_released = sale_lots::whereIn('slid', $saleid)->whereIn('slrid', Input::get('seller'))->whereIn('cbid', Input::get('coffee_buyer'))->whereNotNull('warrant_no')->whereNotNull('rl_no')->where('rl_no', $release_no)->orderBy('sale')->orderBy('lot')->get();
                                
                                }
                            }
                        }

                        $season_name = Season::where('id', $csn_season)->first();

                        $season_name = $season_name->csn_season;

                        $saleno     = Sale::whereIn('id', Input::get('sale'))->first();
                        //$sellerinit = seller::whereIn('id', Input::get('seller'))->first();
                        //$release_no = $saleno->sl_no . $sellerinit->slr_initials;
                        $ref_no_db       = release_instructions::where('rl_ref_no', Input::get('ref_no'))->first();
                        $release_no = $season_name."-". $ref_no;
                        //dd($release_no);
                        $date       = release_instructions::where('rl_no', $release_no)->first();
                        if ($date != null) {
                            $trp    = $date->trp_id;
                            $ref_no = $date->rl_ref_no;
                            $date   = $date->rl_date;
                            $date = date("m/d/Y", strtotime($date));
                        }

                        return View::make('releaseinstructions', compact('id',
                            'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_ids','coffee_baskets', 'transporters', 'trp', 'release_no', 'sale_lots_released', 'date', 'ref_no', 'rl_date', 'wrhse'));
                    }

                    } else {
                        $countbuyers=count(Input::get('coffee_buyer'));
                        $coffee_buyers=Input::get('coffee_buyer');
                        if($countbuyers==1){
                        if ((int)$coffee_buyers[0] == 1) {
                            $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->where('sltyp_id', 1)->orderByRaw('LENGTH(`sl_no`) ASC')->orderBy('sl_no')->get();

                        } else {

                            $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->where('sltyp_id', 2)->orderByRaw('LENGTH(`sl_no`) ASC')->orderBy('sl_no')->get();

                        }
                    }else if($countbuyers==2){
                        //more than one buyer selected, do not select sale type
                        $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->orderByRaw('LENGTH(`sl_no`) ASC')->orderBy('sl_no')->get();
                    }
                      
                        $cid        = Input::get('country');
                        $csn_season = Input::get('sale_season');                      



                        $sale_lots = null;
                        $sale_lots_released = null;
                        //if basket has been selected
                        if(!empty($coffee_basket)){
                            $coffee_basket=(int)$coffee_basket;
                            if ($wrhse != null) {
                                $sale_lots  = sale_lots::whereIn('slrid', Input::get('seller'))->whereIn('cbid', Input::get('coffee_buyer'))->whereNotNull('warrant_no')->where('wrid', $wrhse)->where('bsid', $coffee_basket)->orderBy('sale')->whereNull('rl_no')->orderBy('lot')->get();

                                $sale_lots_released = sale_lots::whereIn('slrid', Input::get('seller'))->whereIn('cbid', Input::get('coffee_buyer'))->whereNotNull('warrant_no')->whereNotNull('rl_no')->where('wrid', $wrhse)->where('rl_no', $release_no)->orderBy('sale')->orderBy('lot')->get();
                            } else {
                                 $sale_lots  = sale_lots::whereIn('slrid', Input::get('seller'))->whereIn('cbid', Input::get('coffee_buyer'))->where('bsid', $coffee_basket)->whereNotNull('warrant_no')->whereNull('rl_no')->orderBy('sale')->orderBy('lot')->get();

                                $sale_lots_released = sale_lots::whereIn('slid', $saleid)->whereIn('slrid', Input::get('seller'))->whereIn('cbid', Input::get('coffee_buyer'))->whereNotNull('warrant_no')->where('rl_no', $release_no)->orderBy('sale')->orderBy('lot')->get();
                            }
                        }else{
                            if ($wrhse != null) {
                                $sale_lots  = sale_lots::whereIn('slid', $saleid)->whereIn('slrid', Input::get('seller'))->whereIn('cbid', Input::get('coffee_buyer'))->whereNotNull('warrant_no')->where('wrid', $wrhse)->orderBy('sale')->whereNull('rl_no')->orderBy('lot')->get();

                                $sale_lots_released = sale_lots::whereIn('slid', $saleid)->whereIn('slrid', Input::get('seller'))->whereIn('cbid', Input::get('coffee_buyer'))->whereNotNull('warrant_no')->whereNotNull('rl_no')->where('wrid', $wrhse)->where('rl_no', $release_no)->orderBy('sale')->orderBy('lot')->get();
                            } else {

                                if(Input::get('coffee_buyer')!=null){

                                    $sale_lots  = sale_lots::whereIn('slid', $saleid)->whereIn('slrid', Input::get('seller'))->whereIn('cbid', Input::get('coffee_buyer'))->whereNotNull('warrant_no')->whereNull('rl_no')->orderBy('sale')->orderBy('lot')->get();

                                    $sale_lots_released = sale_lots::whereIn('slid', $saleid)->whereIn('slrid', Input::get('seller'))->whereIn('cbid', Input::get('coffee_buyer'))->whereNotNull('warrant_no')->where('rl_no', $release_no)->orderBy('sale')->orderBy('lot')->get();

                                }else{

                                    $sale_lots  = sale_lots::whereIn('slid', $saleid)->whereIn('slrid', Input::get('seller'))->whereNotNull('warrant_no')->whereNull('rl_no')->orderBy('sale')->orderBy('lot')->get();


                                    $sale_lots_released = sale_lots::whereIn('slid', $saleid)->whereIn('slrid', Input::get('seller'))->whereIn('cbid', Input::get('coffee_buyer'))->whereNotNull('warrant_no')->where('rl_no', $release_no)->orderBy('sale')->orderBy('lot')->get();
                                }
                            }
                        }
                        $season_name = Season::where('id', $csn_season)->first();

                        $season_name = $season_name->csn_season;

                        
                        $saleno     = Sale::whereIn('id', Input::get('sale'))->first();
                        //$sellerinit = seller::where('id', '=', Input::get('seller'))->first();
                        // $release_no = 'DS'.$sellerinit->slr_initials;
                        // $ref_no_db       = release_instructions::where('rl_ref_no', Input::get('ref_no'))->first();
                        // if ($ref_no_db != null) {
                        //     $release_no = $ref_no_db->rl_no;
                        // } else {
                        //     $release_no = 'BricKE'. $ref_no;
                        // }
                        $release_no = $season_name."-". $ref_no;
                        //dd($release_no);
                        // $release_no = DB::table('release_instructions_rl')->orderBy('rl_ref_no', 'desc')->first();
                        if ($sale_lots_released == null || $sale_lots_released->isEmpty()) {
                            if(Input::get('coffee_buyer')!=null){
                                $sale_lots_released = sale_lots::whereIn('slrid', Input::get('seller'))->whereIn('cbid', Input::get('coffee_buyer'))->whereNotNull('warrant_no')->whereNotNull('rl_no')->where('rl_no', $release_no)->orderBy('sale')->orderBy('lot')->get();
                               }else{
                                $sale_lots_released = sale_lots::whereIn('slrid', Input::get('seller'))->whereNotNull('warrant_no')->whereNotNull('rl_no')->where('rl_no', $release_no)->orderBy('sale')->orderBy('lot')->get();
                               }
                        }



                        $date = release_instructions::where('rl_no', $release_no)->first();

                        if ($date != null) {
                            $trp    = $date->trp_id;
                            $ref_no = $date->rl_ref_no;
                            $date   = $date->rl_date;
                            $date = date("m/d/Y", strtotime($date));
                        }


                        return View::make('releaseinstructions', compact('id',
                            'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_ids','coffee_baskets', 'sale_lots', 'transporters', 'trp', 'release_no', 'ref_no', 'rl_date', 'wrhse','sale_lots_released', 'date'));
                    }

                } else {

                    if (Input::get('coffee_buyer') == 1) {

                        $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->where('sltyp_id', 1)->orderByRaw('LENGTH(`sl_no`) ASC')->orderBy('sl_no')->get();

                    } else {

                        $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->where('sltyp_id', 2)->orderByRaw('LENGTH(`sl_no`) ASC')->orderBy('sl_no')->get();

                    }

                    $cid        = Input::get('country');

                    $csn_season = Input::get('sale_season');
                    
                    return View::make('releaseinstructions', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_ids','coffee_baskets', 'ref_no', 'rl_date', 'wrhse'));

                }

            } else {

                return redirect('releaseinstructions')
                    ->withErrors("Please select a valid Country!!")->withInput();
            }

            return View::make('releaseinstructions', compact('id', 'Season', 'country', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_ids','coffee_baskets', 'ref_no', 'rl_date', 'wrhse'));
        }

    }
    public function createSaleForm(Request $request)
    {
        $id            = null;
        $Season        = Season::all(['id', 'csn_season']);
        $country       = country::all(['id', 'ctr_name', 'ctr_initial']);
        $buyer         = buyer::all(['id', 'cb_name']);
        $SaleType      = SaleType::all(['id', 'sltyp_name']);
        $tradingMonths = trading_months::all(['id', 'trm_code']);

        $years = array('16', '17', '18', '19', '20');

        return View::make('createsale', compact('id', 'Season', 'country', 'buyer', 'SaleType', 'tradingMonths', 'years'));

    }

    public function createSale(Request $request)
    {

        $id       = null;
        $Season   = Season::all(['id', 'csn_season']);
        $country  = country::all(['id', 'ctr_name', 'ctr_initial']);
        $buyer    = buyer::all(['id', 'cb_name']);
        $SaleType = SaleType::all(['id', 'sltyp_name']);

        $tradingMonths = trading_months::all(['id', 'trm_code']);

        $years = array('16', '17', '18', '19', '20');

        if (null !== Input::get('searchButton')) {
            if ($request->has('sl_no')) {
                if ($request->has('sale_season') & Input::get('sale_season') !== "Sale Season") {

                    $sale = Sale::where('sl_no', '=', Input::get('sl_no'))->where('csn_id', Input::get('sale_season'))->first();

                    if ($sale !== null) {

                        $request->session()->flash('alert-success', 'Sale found!!');
                        return View::make('createsale', compact('id', 'Season', 'country', 'buyer', 'SaleType', 'sale', 'tradingMonths', 'years'));

                    } else {

                        return redirect('createsale')
                            ->withErrors("Please enter a valid Sale Number and Sale Season Combination or Create a new Sale!!")->withInput();
                    }
                } else {
                    return redirect('createsale')
                        ->withErrors("The Sale Season cannot be empty!!")->withInput();
                }

            } else {
                if ($request->has('season')) {
                    return redirect('createsale')
                        ->withErrors("The Sale Number cannot be empty!!")->withInput();
                } else {
                    return redirect('createsale')
                        ->withErrors("The Sale Number and Season cannot be empty!!")->withInput();
                }

            }
        } else {

            $this->validate($request, [
                'sale_season' => 'required', 'sl_no' => 'required', 'sale_type' => 'required', 'date' => 'required', 'hedge' => 'required', 'country' => 'required',
            ]);

            $sl_no       = Input::get('sl_no');
            $sale_season = Input::get('sale_season');
            $sale_type   = Input::get('sale_type');
            $date        = Input::get('date');
            $hedge       = Input::get('hedge');
            $nyc         = Input::get('nyc');

            $country = Input::get('country');
            $cbuyer  = Input::get('coffee_buyer');

            $date = date_create($date);
            $date = date_format($date, "Y-m-d");

            $sale = Sale::where('sl_no', '=', Input::get('sl_no'))->where('csn_id', Input::get('sale_season'))->first();

            $sseason = Season::where('id', Input::get('sale_season'))->first();
            $sbuyer  = buyer::where('id', Input::get('coffee_buyer'))->first();

            $tradingmonth = Input::get('tradingmonth');
            $tradingyear  = Input::get('tradingyear');

            $trm = $tradingmonth . $tradingyear;

            if ($sale !== null) {
                Sale::where('sl_no', '=', $sl_no)->where('csn_id', '=', $sale_season)
                    ->update(['sl_date' => $date, 'ctr_id' => $country, 'cb_id' => $cbuyer, 'sltyp_id' => $sale_type, 'sl_date' => $date, 'sl_hedge' => $hedge, 'sl_month' => $trm]);

                Activity::log('Updated Sale ' . $sl_no . ' For Season ' . $sseason->csn_season . ' Buyer ' . $sbuyer->cb_name . ' sale_type ' . $sale_type . ' date ' . $date . ' hedge ' . $hedge . ' sl_month ' . $trm . ' country ' . $country);

            } else {
                Sale::insert(
                    ['sl_no' => $sl_no, 'csn_id' => $sale_season, 'sl_date' => $date, 'ctr_id' => $country, 'cb_id' => $cbuyer, 'sltyp_id' => $sale_type, 'sl_no' => $sl_no, 'sl_date' => $date, 'sl_hedge' => $hedge, 'sl_month' => $trm]);
                Activity::log('Added Sale ' . $sl_no . ' For Season ' . $sseason->csn_season . ' Buyer ' . $sbuyer->cb_name . ' sale_type ' . $sale_type . ' date ' . $date . ' hedge ' . $hedge . ' sl_month ' . $trm . ' country ' . $country);
            }

            $request->session()->flash('alert-success', 'Sale was updated successfully!!');
            return redirect('createsale');

            // return View::make('createsale', compact('id', 'Season', 'country', 'buyer', 'SaleType', 'sale'));

        }
    }

    public function stockListForm(Request $request)
    {
        $id            = null;
        $Season        = Season::all(['id', 'csn_season']);
        $country       = country::all(['id', 'ctr_name', 'ctr_initial']);
        $CoffeeGrade   = CoffeeGrade::all(['id', 'cgrad_name']);
        $Certification = Certification::all(['id', 'crt_name']);
        $buyer         = buyer::all(['id', 'cb_name']);

        $sale_status = sale_status::all(['id', 'sst_name']);
        $Warehouse   = null;
        $Mill        = null;

        return View::make('stocklist', compact('id', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'largest', 'greensize', 'greencolor', 'greendefects', 'processing', 'cupscore', 'rawscore', 'screens', 'buyer', 'sale_status'));

    }

    public function stockList(Request $request)
    {
        $id = null;

        $Warehouse = null;
        $Mill      = null;

        $greensize    = quality_parameters::where('qg_id', '1')->get();
        $greencolor   = quality_parameters::where('qg_id', '2')->get();
        $greendefects = quality_parameters::where('qg_id', '3')->get();
        $processing   = processing::all(['id', 'prcss_name']);
        $buyer        = buyer::all(['id', 'cb_name']);
        $sale_status  = sale_status::all(['id', 'sst_name']);
        $basket       = basket::where('ctr_id', Input::get('country'))->get();

        $screens = screens::all(['id', 'scr_name']);

        $cupscore = cupscore::all(['id', 'cp_score', 'cp_quality']);
        $rawscore = rawscore::all(['id', 'rw_score', 'rw_quality']);

        $Certification = Certification::all(['id', 'crt_name']);

        $slr        = Input::get('seller');
        $lot        = Input::get('sale_lots');
        $sale_cb_id = Input::get('coffee_buyer');

        if (null !== Input::get('coffee_buyer')) {
            $auc_buyer = Input::get('coffee_buyer');
            foreach ($auc_buyer as $key => $value) {
                purchase::where('cfd_id', '=', $key)
                    ->update(['cb_id' => null]);
                if ($value != null) {
                    purchase::where('cfd_id', '=', $key)
                        ->update(['cb_id' => $value]);
                }

            }

        }

        if (null !== Input::get('submitlotprices')) {

            
            $country      = Input::get('country');
            $sale_season  = Input::get('sale_season');
            $saleid       = Input::get('sale');
            $coffee_buyer = Input::get('coffee_buyer');
            $seller       = Input::get('seller');
            $total_lots   = Input::get('total_lots');

            $lotid     = Input::get('lotid');
            $hedgeArray = Input::get('hedge');
            $weight = Input::get('weight');
            $cprice    = Input::get('cprice');
            $confirmed = Input::get('confirmed');
            $withdrawn = Input::get('withdrawn');
            $coffeeid  = null;
            

            //update price
            for ($i = 0; $i < count($lotid); $i++) {
                $pdetails = purchase::where('cfd_id', $lotid[$i])->first();
                if ($pdetails != null) {
                    $pid = $pdetails->id;
                    purchase::where('id', '=', $pid)
                        ->update(['prc_confirmed_price' => $cprice[$i], 'sst_id' => 1, 'prc_value' => ($weight[$i]/50 * $cprice[$i]), 'prc_hedge' => $hedgeArray[$i]]);
                } else {
                    purchase::insert(['cfd_id' => $lotid[$i], 'prc_confirmed_price' => $cprice[$i], 'sst_id' => 1, 'prc_value' => ($weight[$i]/50 * $cprice[$i]), 'prc_hedge' => $hedgeArray[$i]]);
                }

            }
            $auc_buyer = Input::get('coffee_buyer');
            foreach ($auc_buyer as $key => $value) {
                purchase::where('cfd_id', '=', $key)
                    ->update(['cb_id' => null]);
                if ($value != null) {
                    purchase::where('cfd_id', '=', $key)
                        ->update(['cb_id' => $value]);
                }

            }


            if ($request->has('seller') && Input::get('seller') != null) {
                $sale_lots   = sale_lots::where('slid', $saleid)->where('slrid', Input::get('seller'))->get();
                $lot_in_sale = sale_lots::where('slid', $saleid)->where('slrid', Input::get('seller'))->first();
                $cdetails    = coffee_details::where('id', $lot_in_sale->id)->first();
            } else {
                $sale_lots   = sale_lots::where('slid', $saleid)->get();
                $lot_in_sale = sale_lots::where('slid', $saleid)->first();
                $cdetails    = coffee_details::where('id', $lot_in_sale->id)->first();
            }
            // $request->session()->flash('alert-success', 'Purchase Information Updated!!');
            if ($cdetails !== null) {
                $coffeeid = $cdetails->id;
            }
            Activity::log('Updated purchase information for sale ' . $saleid . ' season ' . $sale_season);

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
            $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sltyp_id', '1')->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', null)->orderBy('sl_no')->get();

            $cid         = Input::get('country');
            $csn_season  = Input::get('sale_season');
            $saleid      = Input::get('sale');
            $sale_status = sale_status::all(['id', 'sst_name']);
            $basket      = basket::where('ctr_id', Input::get('country'))->get();

            return View::make('stocklist', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'sale_lots', 'seller', 'saleid', 'cdetails', 'buyer', 'sale_status', 'basket', 'pdetails', 'slr', 'sale_cb_id'));

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

                    if ($request->has('sale') && Input::get('sale') != 'Sale No.' && Input::get('sale') != 'No Sale Found') {
                        $sale = Sale::where('id', '=', Input::get('sale'))->where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sltyp_id', '1')->first();
                        if (!isset($sale->sl_quality_confirmedby)) {
                            $request->session()->flash('alert-warning', 'Catalogue quality details for sale ' . $sale->sl_no . ' have not yet been confirmed. Please confirm to continue.');
                            // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
                            $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sltyp_id', '1')->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', null)->orderBy('sl_no')->get();
                            $request->session()->flash('alert-success', 'Sale found!!');
                            $cid        = Input::get('country');
                            $csn_season = Input::get('sale_season');
                            // $saleid = Input::get('sale');

                            // $sale_lots = sale_lots::where('slid', $saleid)->get();

                            return View::make('stocklist', compact('id',
                                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id'));
                        } else {
                            // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
                            // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
                            $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sltyp_id', '1')->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', null)->orderBy('sl_no')->get();
                            // $request->session()->flash('alert-success', 'Sale found!!');
                            $cid        = Input::get('country');
                            $csn_season = Input::get('sale_season');
                            $saleid     = Input::get('sale');
                            if ($request->has('seller') && Input::get('seller') != null) {
                                $sale_lots = sale_lots::where('slid', $saleid)->where('slrid', Input::get('seller'))->get();
                                // $lot_in_sale = sale_lots::where('slid', $saleid)->where('slrid',Input::get('seller'))->where('cbid',Input::get('coffee_buyer'))->where('lot', $lot)->first();
                                // $cdetails = coffee_details::where('id', $lot_in_sale->id)->first();

                            } else {
                                $sale_lots = sale_lots::where('slid', $saleid)->get();
                                // $lot_in_sale = sale_lots::where('slid', $saleid)->where('cbid',Input::get('coffee_buyer'))->where('lot', $lot)->first();
                                // $cdetails = coffee_details::where('id', $lot_in_sale->id)->first();

                            }

                            // $sale_lots = sale_lots::where('slid', $saleid)->get();

                            return View::make('stocklist', compact('id',
                                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id'));
                        }

                    } else {
                        // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
                        // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
                        $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sltyp_id', '1')->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', null)->orderBy('sl_no')->get();
                        // $request->session()->flash('alert-success', 'Sale found!!');
                        $cid        = Input::get('country');
                        $csn_season = Input::get('sale_season');
                        return View::make('stocklist', compact('id',
                            'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id'));
                    }

                } else {
                    // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
                    // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
                    $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sltyp_id', '1')->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', null)->orderBy('sl_no')->get();
                    // $request->session()->flash('alert-success', 'Sale found!!');
                    $cid        = Input::get('country');
                    $csn_season = Input::get('sale_season');
                    return View::make('stocklist', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id'));
                }
            } else {

                return redirect('stocklist')
                    ->withErrors("Please select a valid Country!!")->withInput();
            }

            return View::make('stocklist', compact('id', 'Season', 'country', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id'));
        }

    }

}