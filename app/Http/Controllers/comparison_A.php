 <?php 
    public function basketForm(Request $request)
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

        return View::make('basket', compact('id', 'Season', 'country', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'largest', 'greensize', 'greencolor', 'greendefects', 'processing', 'cupscore', 'rawscore', 'screens', 'buyer', 'sale_status'));

    }

    public function basket(Request $request)
    {
        $id = null;

        $Warehouse = null;
        $Mill      = null;

        $greensize    = quality_parameters::where('qg_id', '1')->get();
        $greencolor   = quality_parameters::where('qg_id', '2')->get();
        $greendefects = quality_parameters::where('qg_id', '3')->get();
        $processing   = processing::all(['id', 'prcss_name']);
        // $buyer = buyer::all(['id', 'cb_name']);
        $buyer       = buyer::where('bt_id', '1')->get();
        $sale_status = sale_status::all(['id', 'sst_name']);
        $basket      = basket::where('ctr_id', Input::get('country'))->get();

        $screens = screens::all(['id', 'scr_name']);

        $cupscore = cupscore::all(['id', 'cp_score', 'cp_quality']);
        $rawscore = rawscore::all(['id', 'rw_score', 'rw_quality']);

        $Certification = Certification::all(['id', 'crt_name']);

        $slr  = Input::get('seller');
        $bskt = Input::get('basket');

        $sale_cb_id = Input::get('coffee_buyer');

        // $data['dnt'] = (\Input::has('dnt')) ? 1 : 0;
        // $data['dnt'] = $request->input('dnt', 1);
        // $form->save($data);
        //$request->save($data);
        // print_r(Input::get('dnt')." search". Input::get('searchButton'));

        if (null !== Input::get('updatebasket')) {
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
            $sale_lots_unassigned = sale_lots::where('bsid', Input::get('basket'))->where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('status', 'Confirmed')->orWhere('bsid', null)->where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('status', 'Confirmed')->get();
            //set all to null
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
            $sale    = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sltyp_id', '1')->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->get();

            $cid        = Input::get('country');
            $csn_season = Input::get('sale_season');
            $saleid     = Input::get('sale');
            $basket     = basket::where('ctr_id', Input::get('country'))->get();

            $sale_lots_unassigned = sale_lots::where('bsid', Input::get('basket'))->where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('status', 'Confirmed')->orWhere('bsid', null)->where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('status', 'Confirmed')->get();

            $sale_lots = sale_lots::where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('bsid', Input::get('basket'))->where('status', 'Confirmed')->get();

            return View::make('basket', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'sale_lots', 'seller', 'saleid', 'cdetails', 'buyer', 'sale_status', 'basket', 'pdetails', 'slr', 'sale_cb_id', 'bskt', 'sale_lots_unassigned'));

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
                        $sale = Sale::where('id', '=', Input::get('sale'))->where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sltyp_id', '1')->first();
                        if ($sale->sl_quality_confirmedby == null) {
                            $request->session()->flash('alert-warning', 'Catalogue quality details for sale ' . $sale->sl_no . ' have not yet been confirmed. Please confirm to continue.');
                            // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
                            $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sltyp_id', '1')->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->get();
                            $request->session()->flash('alert-success', 'Sale found!!');
                            $cid        = Input::get('country');
                            $csn_season = Input::get('sale_season');
                            // $saleid = Input::get('sale');

                            // $sale_lots = sale_lots::where('slid', $saleid)->get();

                            return View::make('basket', compact('id',
                                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'bskt'));
                        } else {
                            // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
                            // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
                            $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sltyp_id', '1')->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->get();
                            // $request->session()->flash('alert-success', 'Sale found!!');
                            $cid        = Input::get('country');
                            $csn_season = Input::get('sale_season');
                            $saleid     = Input::get('sale');

                            $basketIds = array(Input::get('basket'), null);

                            $sale_lots = sale_lots::where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('bsid', Input::get('basket'))->where('status', 'Confirmed')->get();

                            $sale_lots_unassigned = sale_lots::where('bsid', Input::get('basket'))->where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('status', 'Confirmed')->orWhere('bsid', null)->where('slid', $saleid)->where('cbid', Input::get('coffee_buyer'))->where('status', 'Confirmed')->get();

                            // $sale_lots = sale_lots::where('slid', $saleid)->get();

                            return View::make('basket', compact('id',
                                'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'bskt', 'sale_lots_unassigned'));
                        }

                    } else {
                        // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
                        // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
                        $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sltyp_id', '1')->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->get();
                        // $request->session()->flash('alert-success', 'Sale found!!');
                        $cid        = Input::get('country');
                        $csn_season = Input::get('sale_season');
                        return View::make('basket', compact('id',
                            'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'sale_lots', 'saleid', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'bskt'));
                    }

                } else {
                    // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->get();
                    // $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id',  Input::get('sale_season'))->where('sltyp_id',  '1')->get();
                    $sale = Sale::where('ctr_id', '=', Input::get('country'))->where('csn_id', Input::get('sale_season'))->where('sltyp_id', '1')->where('sl_catalogue_confirmedby', '!=', null)->where('sl_quality_confirmedby', '!=', null)->where('sl_auction_confirmedby', '!=', null)->get();
                    // $request->session()->flash('alert-success', 'Sale found!!');
                    $cid        = Input::get('country');
                    $csn_season = Input::get('sale_season');
                    return View::make('basket', compact('id', 'Season', 'country', 'cid', 'csn_season', 'sale', 'CoffeeGrade', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'bskt'));
                }
            } else {

                return redirect('basket')
                    ->withErrors("Please select a valid Country!!")->withInput();
            }

            return View::make('basket', compact('id', 'Season', 'country', 'Warehouse', 'Mill', 'Certification', 'seller', 'greensize', 'greencolor', 'greendefects', 'processing', 'screens', 'cupscore', 'rawscore', 'buyer', 'sale_status', 'basket', 'slr', 'sale_cb_id', 'bskt'));
        }

    }