<?php

namespace Ngea\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

use Mail;

use Ngea\Thresholds;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    protected $dialog_timeout;

 	public function __construct() 
    {
        $this->dialog_timeout = 1000;

    }

    public function checkThreshold($threshold_name, $first_weight, $second_weight, $identifier){

    	if ($first_weight == 0) {

    		$first_weight = 1;

    	}
    	if ($second_weight == 0) {

    		$second_weight = 1;

    	}
    	$threshold_details = Thresholds::where('th_name', $threshold_name)->first();

    	$percentage = $threshold_details->th_percentage;

    	$discepancy = (($first_weight-$second_weight)/$first_weight)*100;

    	if ($discepancy > $percentage) {

	        $data = array('name'=>"Admin Department", "discepancy"=>$discepancy, "identifier"=>$identifier, "first_weight"=>$first_weight, "second_weight"=>$second_weight);    

	        Mail::send(['text'=>'maildiscrepancy'], $data, function($message) {

	            $message->to('lewis.mutua@nkg.coffee', 'Discrepancy-')->subject('Discrepancy');

	            $message->from('lewis.mutua@nkg.coffee','Ibero Database');

	        });

    	}





    }


    
}
