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
use Ngea\WeightScales;
use Ngea\Location;
use Ngea\Material;
use Ngea\ItemsMaterial;
use Ngea\Grn;
use Ngea\StockWarehouse;

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

    public function generateGRN ($warehouse) {

        try{
            $cidmain = session('maincountry');
            if ($cidmain != null) {
                $grn_no = Grn::where('ctr_id', $cidmain)->where('agt_id', $warehouse)->orderBy('id', 'desc')->first();
                if ($grn_no != NULL) {
                    $grn_no = $grn_no->gr_number;            
                    if (is_numeric($grn_no)) {
                        $grn_number = sprintf("%07d", ($grn_no + 0000001));
                    }
                } else {
                    $grn_number = sprintf("%07d", (0000001));
                }
            }
            return json_encode($grn_number);                    
        
        }catch (\PDOException $e) {
            return response()->json([
                'exists' => false,
                'inserted' => false,
                'error' => $e->getMessage()
            ]);
        }
    
    }

    public function getMaterials ($item_id) {

        try{
            $materials = array();
            $item_details = ItemsMaterial::where('it_id', $item_id)->get();

            foreach($item_details as $items){

                $material_details = Material::where('id', $items->mt_id)->first();
                $materials[$material_details->id] = $material_details->mt_name;

            }
            return json_encode($materials);    
        }catch (\PDOException $e) {
            return response()->json([
                'exists' => false,
                'inserted' => false,
                'error' => $e->getMessage()
            ]);
        }
    
    }

    public function getMaterialsInOutturn ($item_id, $outt_number, $outt_season, $grn_number) {

        try{
            $grn_id = null;
            $materials = array();
            $cid = session('maincountry');

            $grn_details = Grn::where('gr_number', $grn_number)->where('ctr_id', $cid)->first(); 
            if ($grn_details != null) {
                $grn_id = $grn_details->id;
            } 


            $stock_details = StockWarehouse::where('csn_id', '=', $outt_season)->where('st_outturn', '=', $outt_number)->where('grn_id', '=', $grn_id)->get();

            foreach($stock_details as $items){

                $material_details = Material::where('id', $items->mt_id)->first();
                $materials[$material_details->id] = $material_details->mt_name;

            }
            return json_encode($materials);    
        }catch (\PDOException $e) {
            return response()->json([
                'exists' => false,
                'inserted' => false,
                'error' => $e->getMessage()
            ]);
        }
    
    }

    public function getOutturn ($item_id, $agent_id, $moisture) {

        try{
            $moisture_threshold = null;
            $outturn = null;

            $threshold_details = Thresholds::where('th_name', 'Moisture')->where('it_id', $item_id)->first();
            if ($threshold_details != null) {
                $moisture_threshold = $threshold_details->th_percentage;
            }
            if ($moisture > $moisture_threshold) {
                $outturn = 'REDRY';
            } else {
                $agt_code = null;
                $prefix = null;
                $padding_character = null;
                $previous_week = null;
                $previous_number = null;
                $delivery_number = null;
                $length = null;

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

    public function getScales ($warehouse) {

        try{
            $scales_details = WeightScales::where('agt_id', $warehouse)->get();

            return json_encode($scales_details);                    
        
        }catch (\PDOException $e) {
            return response()->json([
                'exists' => false,
                'inserted' => false,
                'error' => $e->getMessage()
            ]);
        }
    }

    public function getLocations ($warehouse) {

        try{
            $location_details = Location::where('agt_id', $warehouse)->get();

            return json_encode($location_details);                    
        
        }catch (\PDOException $e) {
            return response()->json([
                'exists' => false,
                'inserted' => false,
                'error' => $e->getMessage()
            ]);
        }
    }

    public function checkScaleSession ($weigh_scale_session) {

        try{
            if(session()->has($weigh_scale_session)) {
                return 1; 
            } else {
                return 0; 
            }                   
        
        }catch (\PDOException $e) {
            return response()->json([
                'exists' => false,
                'inserted' => false,
                'error' => $e->getMessage()
            ]);
        }
    }

    public function getWeight ($weighscale) {
        
        try {

            $weigh_scales_details = WeightScales::where('id', $weighscale)->first();

            if ($weigh_scales_details != null) {
                $strBaudRate = $weigh_scales_details->ws_baud_rate;
                $strParity = $weigh_scales_details->ws_parity;
                $strStopBits = $weigh_scales_details->ws_stop_bits;
                $strDataBits = $weigh_scales_details->ws_data_bits;
                $strPortName = $weigh_scales_details->ws_port_name;
            }

            $execute = shell_exec('C://GetIndicatorWeight.exe '.$strBaudRate.' '.$strParity.' '. $strStopBits.' '. $strDataBits.' '.$strPortName );
            $execute = preg_replace("/[^0-9\.]/", '', $execute);
            $weight = NULL;

            $execute = 100;

            if ($execute == NULL) {
                $weight = "Unstable wait...";
                return response()->json([
                    'exists' => false,
                    'found' => false
                ]);
            } else {
                $weight = $execute;
            }           

            $batch_kilograms = $weight;  
            $weigh_scale_session = "scale - ".$weighscale."";
            session()->put($weigh_scale_session, $batch_kilograms);

            return $batch_kilograms;                 
        
        }catch (\PDOException $e) {
            return response()->json([
                'exists' => false,
                'found' => false,
                'error' => $e->getMessage()
            ]);
        }

    }


    public function reSetWeight ($weigh_scales) {

        try{

            $weigh_scales_details = WeightScales::where('id', $weigh_scales)->first();
            if ($weigh_scales_details != null) {
                $strBaudRate = $weigh_scales_details->ws_baud_rate;
                $strParity = $weigh_scales_details->ws_parity;
                $strStopBits = $weigh_scales_details->ws_stop_bits;
                $strDataBits = $weigh_scales_details->ws_data_bits;
                $strPortName = $weigh_scales_details->ws_port_name;
            }

            $ch = curl_init();
            $ip_address = $this->get_client_ip();
            curl_setopt($ch, CURLOPT_URL,"http://".$ip_address."//weighscale/api.php");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS,
                        "strBaudRate=".$strBaudRate."&strParity=".$strParity."&strStopBits=".$strStopBits."&strDataBits=".$strDataBits."&strPortName=".$strPortName."");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $weight = curl_exec ($ch);
            curl_close ($ch);   
            $batch_kilograms = $weight;  
            $batch_kilograms = 0;  
            $weigh_scale_session = "scale - ".$weigh_scales."";

            if (session()->has($weigh_scale_session) && $batch_kilograms === 0 ){
                session()->pull($weigh_scale_session); 
            }     

            return json_encode($batch_kilograms); 
        
        }catch (\PDOException $e) {
            return response()->json([
                'exists' => false,
                'inserted' => false,
                'error' => $e->getMessage()
            ]);
        }
    }


    public function get_client_ip() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
           $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
}
