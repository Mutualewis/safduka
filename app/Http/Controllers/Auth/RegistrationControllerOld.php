<?php namespace Ngea\Http\Controllers;

use Input;
use confirm;
use DB;
use ask;
use Illuminate\Http\Request;
use Ngea\Http\Controllers\Controller;
use Ngea\Growers;
use Ngea\Buyer;


class RegistrationController extends Controller {


    public function registerGrower (Request $request){
    	
        $this->validate($request, [
            'grower_name' => 'required', 'grower_type' => 'required', 'grower_mark' => 'required', 'grower_code' => 'required',
        ]);
        $grower_name = Input::get('grower_name');
    	$grower_type = Input::get('grower_type');
    	$grower_code = Input::get('grower_code');
		$grower_mark = Input::get('grower_mark');

		if($grower_type == "Factory"){
			$grower_type = 1;	

		} else if ($grower_type == "Grower") {
			$grower_type = 2;	
		}

		if (Growers::where('cgr_code', '=', $grower_code)->exists()) {
			// grower code exists
			return redirect('registergrower')
                        ->withErrors("Grower Code Already Exists!!")
                        ->withInput();		 
		}	else {
			DB::table('coffee_growers_cgr')->insert(
			    ['cgr_grower' => $grower_name, 'cgr_code' => $grower_code, 'cgr_mark' => $grower_mark, 'gty_id' => $grower_type]
			);
			$request->session()->flash('alert-success', 'Grower was successful added!');
			return redirect('registergrower');			
		}


    }

    public function registerBuyer (Request $request){
    	
        $this->validate($request, [
            'buyer_name' => 'required', 'buyer_code' => 'required',
        ]);
        $buyer_name = Input::get('buyer_name');
    	$buyer_code = Input::get('buyer_code');


		if (Buyer::where('cb_code', '=', $buyer_code)->exists()) {
			// grower code exists
			return redirect('registerbuyer')
                        ->withErrors("Buyer Code Already Exists!!")
                        ->withInput();		 
		}	else {
			DB::table('coffee_buyers_cb')->insert(
			    ['cb_name' => $buyer_name, 'cb_code' => $buyer_code]
			);
			$request->session()->flash('alert-success', 'Buyer was successful added!');
			return redirect('registerbuyer');			
		}


    }



}

