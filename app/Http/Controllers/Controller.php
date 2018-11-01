<?php

namespace Ngea\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

use Mail;
use Ngea\Thresholds;
use Ngea\InstructedLocationRef;
use Ngea\Season;
use Ngea\OutturnNumberSettings;
use Ngea\agent;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    protected $dialog_timeout;
    protected $active_season;

 	public function __construct() 
    {
        $this->dialog_timeout = 1000;
        $this->active_season = 0;
    }

    public function setActiveSeason(){
        $season = Season::whereNotNull('csn_active')->first();
        if ($season != null) {
            $this->active_season = $season->id;
        }
    }

    public function getActiveSeason(){
        $this->setActiveSeason();
        return $this->active_season;
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

	        $data = array('name'=>"Admin Department", "discrepancy"=>$discepancy, "identifier"=>$identifier, "first_weight"=>$first_weight, "second_weight"=>$second_weight);    

	        Mail::send(['text'=>'maildiscrepancy'], $data, function($message) {

	            $message->to('caroline.njambi@nkg.coffee', 'Discrepancy-TZ')->subject('Discrepancy');

                $message->cc('lewis.mutua@nkg.coffee');

	            $message->from('lewis.mutua@nkg.coffee','Ibero Database');

	        });

    	}

    }

    public function generateRef () {

        $ref_no = null;

        $ref_no = InstructedLocationRef::whereNotNull('ilf_number')->orderBy('ilf_number', 'asc')->pluck('ilf_number');     

        if ($ref_no->first() == null) {

            $ref_no = null;

        } else {

            foreach ($ref_no as $ref) {

                $ref_no = $ref;

                preg_match_all('!\d+!', $ref, $ref_no);

                $ref_no = implode(' ', $ref_no[0]);

            }

            $ref_no = sprintf("%04d", ($ref_no + 1));
        }

        return $ref_no;
    }

    public function getOutturn ($item_id, $agent_id) {

        try{
            $agt_code = null;
            $prefix = null;
            $padding_character = null;
            $previous_week = null;
            $previous_number = null;
            $delivery_number = null;
            $length = null;
            $outturn = null;

            $week_of_year = $this->returnWeekOfYear();
            $agent = agent::where('id', $agent_id)->first();
            if ($agent != null) {
                $agt_code = $agent->agt_code;
            }


            $outturnNumberSettings = OutturnNumberSettings::where('it_id', $item_id)->first();
            if ($outturnNumberSettings != null) {
                $prefix = $outturnNumberSettings->ons_prefix;
                $padding_character = $outturnNumberSettings->ons_padding_character;
                $previous_week = $outturnNumberSettings->ons_previous_week;
                $previous_number = $outturnNumberSettings->ons_previous_number;
                $length = $outturnNumberSettings->ons_length;
            }

            if ($previous_week == $week_of_year) {
                $delivery_number = sprintf("%0".$length."d", ($previous_number + 1));
            } else {
                $delivery_number = sprintf("%0".$length."d", (001));
            }

            if ($week_of_year != null && $agt_code != null && $prefix != null && $delivery_number != null) {
                $outturn = $week_of_year . $agt_code . $prefix . $delivery_number;
            } 
            
          
            return json_encode($outturn);                    
        
        }catch (\PDOException $e) {
            return response()->json([
                'exists' => false,
                'inserted' => false,
                'error' => $e->getMessage()
            ]);
        }
    }

    public function returnWeekOfYear () {

        $month = date('m');
        $year = 0;
        if ($month >= 01 && $month < 10)
        {
            $year = date('Y') - 1;

        }
        else
        {
            $year = date('Y');
        }
        $day1 = $year.'/9/30';
        $day1 = date_create($day1);
        $current_date = date_create(date("Y-m-d"));
        $date_difference = date_diff($day1, $current_date);
        $date_difference = $date_difference->format("%R%a");
        $coffeeweekNumber = ceil(str_replace('+', '', $date_difference) / 7);
        $coffeeweekNumber = sprintf("%02d", ($coffeeweekNumber));
        return $coffeeweekNumber;      
    }    
}
