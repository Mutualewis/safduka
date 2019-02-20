<?php

namespace Ngea\Http\Controllers\Api\V1;

use Activity;
use Auth;
use DB;
use delete;
use Illuminate\Http\Request;
use Input;
use Ngea\basket;
use Ngea\InternalBaskets;
use Ngea\buyer;
use Ngea\Certification;
use Ngea\CoffeeGrade;
use Ngea\coffee_certification;
use Ngea\country;
use Ngea\OutturnTotalBatch;
use Ngea\cupscore;
use Ngea\Batch;
use Ngea\StockBreakdown;
use Ngea\purchase;

use Ngea\Http\Controllers\Controller;

use Ngea\Location;
use Ngea\mills_region;
use Ngea\Process;
use Ngea\Processes;
use Ngea\processing;
use Ngea\processing_instruction;
use Ngea\ProcessInstructions;
use Ngea\ProcessResults;
use Ngea\ProcessResultsType;
use Ngea\quality_parameters;
use Ngea\rawscore;
use Ngea\Region;
use Ngea\release;
use Ngea\release_instructions;
use Ngea\Sale;
use Ngea\sale_lots;
use Ngea\sale_status;
use Ngea\screens;
use Ngea\Season;
use Ngea\seller;
use Ngea\StockLocation;
use Ngea\Stock;
use Ngea\StockStatus;
use Ngea\StockView;
use Ngea\StockViewALL;
use Ngea\SalesContract;
use Ngea\transporters;
use Ngea\User;
use Ngea\Person;
use Ngea\StockQuality;
use Ngea\quality_details;
use Ngea\coffee_details;

use Ngea\Sum_Process_Allocation;

use Ngea\warehouses_region;
use Yajra\Datatables\Datatables;

use Ngea\StockProcessedView;
use Ngea\StockMill;
use Ngea\StockViewALLOutt;
use Ngea\Outturns;

use Ngea\ProcessAllocation;
use Ngea\StockBreakdownOutturns;

use Ngea\QualityType;
use Ngea\OutturnQuality;
use Ngea\QualityAnalysis;

use niklasravnsborg\LaravelPdf\Facades\Pdf as PDF;
use View;
use Mail;

use Ngea\Material;
use Ngea\ProcessResults as ResultResource;

class ProcessResultsController extends Controller
{
    public function listMillingInstructions(Request $request){
        return response()->json([
            'message' => "successful",
            'data' => Process::all()->toArray(),
        ])
        ->setStatusCode(200);
    }

    public function listMillingInstructionOutturns(){
       
        // $prc = $id;
            // if ($prc != null) {
                // $refno       = Process::where('id', $prc)->first();
                
                // $rfid = $refno->id;
                // $resultsType = ProcessResultsType::where('prcss_id', $rfid)->get();
                // if ($rfid != null) {
                $StockView  = StockViewALLOutt::whereNull('milling_confirmed_by')->get();
                //     $ProcessResults = Processes::where('id', $rfid)->where('ctrid', 1)->whereNotNull('result_type')->get();
                // }
            // }
           
           
        
        return response()->json([
            'message' => "successful",
            'data' => $StockView->toArray(),
        ])
        ->setStatusCode(200);
    }
    public function listGrades(Request $request){
        return response()->json([
            'message' => "successful",
            'data' => ProcessResultsType::all(['id', 'prt_name'])->toArray(),
        ])
        ->setStatusCode(200);
    }
    public function resultslist($st_id){
        if ($st_id !== NULL) {

            $stockresults = DB::table('process_results_prts as prts')
            ->leftJoin('processing_results_type_prt as prt', 'prt.id', '=', 'prts.prt_id')
            ->leftJoin('outturns_outt as st', 'prts.outt_id', '=', 'st.id')
            ->where('prts.outt_id', '=', $st_id)
            ->groupBy('prts.prt_id')
            ->get();


        }
        return response()->json([
            'message' => "successful",
            'data' => $stockresults,
        ])
        ->setStatusCode(200);
    }
    public function saveResults(Request $request)
    {
        $user = auth('api')->user();
        $username = $user->usr_name;
        $userid = $user->id;
        
        $this->validate($request, [
            'prts_bags' => 'required',
            'prts_pockets' => 'required',
            'outt_id' => 'required',
            'prt_id' => 'required',
        ]);
        try{
        DB::beginTransaction();
        $results_details = ProcessResults::where('outt_id', '=', $request->outt_id)->where('prt_id', '=', $request->prt_id)->first();

        if($results_details!=null){
            
            $results = ProcessResults::where('id', '=', $results_details->id)
            ->update($request->all());
            // return response()->json([
            //     'message' => "exists",
            //     'data' => '',
            // ])
            // ->setStatusCode(200);
        }else{
            $results = ProcessResults::create($request->all());
            $results = $results->toArray();
        }
        DB::commit();
        //$resultstring = $request->all()->toJson();
        $resultsstring = json_encode($request->all());
        if($results ==1){
            Activity::log('Updated Process Results '. $resultsstring. ' user ' .$username);
        }else{
            Activity::log('Added Process Results '. $resultsstring. ' user ' .$username);
        }
        
        return response()->json([
            'message' => "successful",
            'data' => $results,
        ])
        ->setStatusCode(201);
        }catch (\Exception $e) {
                
            DB::rollback();
            $errormessages[] = $e->getMessage();
            return response()->json([
                'message' => $errormessages
            ])
            ->setStatusCode(500); 
        }
    }
    public function confirmResults(Request $request)
    {
        $user = auth('api')->user();
        $username = $user->usr_name;
        $userid = $user->id;
        
        $this->validate($request, [
            'st_mill_id' => 'required',
            'empty_bag_weight' => 'required',
        ]);
        try{
        DB::beginTransaction();
        $outturn_details = Outturns::where('id', '=', $request->st_mill_id)->first();

        $mlvariance = $this->getMlVariance($request->st_mill_id, $request->empty_bag_weight);
        $mlvariance = abs($mlvariance);
        if($mlvariance == null){
            return response()->json([
                'message' => "validate",
                'errors' => ["Unable to get variance, Confirmation failed"]
            ])
            ->setStatusCode(200);
        }
        if($mlvariance == NULL || $mlvariance > 2){

            $data = array('name'=>"Admin Department", "threshold_name"=>"Milling Loss ", "identifier"=>"DMP-Milling Loss".$outturn_details->st_outturn, "difference"=>$mlvariance);    

            Mail::send(['text'=>'maildiscrepancydmp'], $data, function($message) {

                $message->to('jane.nyambura@nkg.coffee', 'Discrepancy : MILLING LOSS DMP')->subject('Discrepancy');

                $message->cc('lewis.mutua@nkg.coffee');
                $message->cc('john.gachunga@nkg.coffee');

                $message->from('lewis.mutua@nkg.coffee','Ibero Database');

            });
        }
        $this->getSCRVariance($request->st_mill_id, $request->empty_bag_weight);

        $stock_details = Outturns::where('id', '=', $request->st_mill_id)->update(['milling_confirmed_by'=> $userid, 'empty_bag_weight'=> $request->empty_bag_weight ]);
    
        DB::commit();
        //$resultstring = $request->all()->toJson();
        $resultsstring = json_encode($request->all());
       
        
        Activity::log('Updated Stock outturn '.$outturn_details->st_outturn.' confirmed by'. $resultsstring. ' user ' .$username);
        
        
        return response()->json([
            'message' => "successful",
            'data' => '',
        ])
        ->setStatusCode(201);
        }catch (\Exception $e) {
                
            DB::rollback();
            $errormessages[] = $e->getMessage();
            return response()->json([
                'message' => $errormessages
            ])
            ->setStatusCode(500); 
        }
    }

    public function getMlVariance($outt_id, $empty_bag_weight){
        $ml = null;
        $scr18 = null;
        $scr16 = null;
        $scr14 = null;
        $others = null;
        $qid = null;
        $outturnresultssum = null;

        $qdetails = quality_details::where('outt_id', $outt_id)->first();
        
        if($qdetails !=null){
            $mc = $qdetails->mc;
            $ml = $qdetails->ml;
            $qid = $qdetails->id;
            
            //milling loss variance
            $output_weight = DB::table('process_results_prts')
                ->where('outt_id', $outt_id)
                ->sum(DB::Raw('prts_bags*60+prts_pockets'));
            if($output_weight != null){
                $outturn_details = Outturns::where('id', '=', $outt_id)->first();
                if($outturn_details != null){
                $net_input_weight = $outturn_details->st_net_weight-$empty_bag_weight;
                $mloutput = abs(($net_input_weight - $output_weight)/$net_input_weight);
                $mlvariance = $mloutput*100 - $ml;
                return $mlvariance;
                }else{
                    return null;
                }
            }else{
                return null;
            }
        }else{
            //get quality for related outturns
            //get quality using stock mill
            $outt_mill_details = StockMill::where('outt_id', $outt_id)->get();

				$sum_net_kilos = 0;
				$st_ids = [];
				foreach($outt_mill_details as $key => $valuestmill){
					$sum_net_kilos += $valuestmill->st_net_weight;
					$st_ids[] = $valuestmill->id;
                }
                $sumkilos = 0;
				$sumweightedml = 0;
                foreach($st_ids as $key => $value){
                    $stock_mill_details = StockMill::where('id',$value)->first();
                    $st_net_weight = $stock_mill_details->st_net_weight;
                    $sumkilos += $st_net_weight;
                    $quality_ml_details = quality_details::where('st_mill_id', $value)->first();
                    if($quality_ml_details != null)
                    $mc = $quality_ml_details->ml;{
                    $weighted_ml = $mc*$st_net_weight;
                    }
                    $sumweightedml += $weighted_ml;
                }
                $outt_ml = $sumweightedml/$sumkilos;
                
            //milling loss variance
            $output_weight = DB::table('process_results_prts')
                ->where('outt_id', $outt_id)
                ->sum(DB::Raw('prts_bags*60+prts_pockets'));
            if($output_weight != null){
                $outturn_details = Outturns::where('id', '=', $outt_id)->first();
                if($outturn_details != null){
                $net_input_weight = $outturn_details->st_net_weight-$empty_bag_weight;
                $mloutput = abs(($net_input_weight - $output_weight)/$net_input_weight);
                $mlvariance = $mloutput*100 - $outt_ml;
                return $mlvariance;
                }else{
                    return null;
                }
            }else{
                return null;
            }
        }
    }
    public function getSCRVariance($outt_id, $empty_bag_weight){
        $ml = null;
        $scr18 = null;
        $scr16 = null;
        $scr14 = null;
        $others = null;
        $qid = null;
        $outturnresultssum = null;
        
        $qdetails = quality_details::where('outt_id', $outt_id)->first();
        
        if($qdetails !=null){
            $mc = $qdetails->mc;
            $ml = $qdetails->ml;
            $qid = $qdetails->id;
            
            $qadetails = QualityAnalysis::where('qltyd_id', $qid)->get();
            $outturn_details = Outturns::where('id', '=', $outt_id)->first();

            $scr18 = QualityAnalysis::select('qanl_value')->where('acat_id', 1)->where('qltyd_id', $qid)->first();;
            $scr18 =  isset($scr18->qanl_value) ? $scr18->qanl_value :null;
            $scr16 = QualityAnalysis::select('qanl_value')->where('acat_id', 2)->where('qltyd_id', $qid)->first();;
            $scr16 =  isset($scr16->qanl_value) ? $scr16->qanl_value :null;
            $scr14 = QualityAnalysis::select('qanl_value')->where('acat_id', 3)->where('qltyd_id', $qid)->first();
            $scr14 =  isset($scr14->qanl_value) ? $scr14->qanl_value :null;
            
            //milling loss variance
            $output_weight = DB::table('process_results_prts')
                ->where('outt_id', $outt_id)
                ->sum(DB::Raw('prts_bags*60+prts_pockets'));
            $scr18output_weight = DB::table('process_results_prts')
                ->where('outt_id', $outt_id)->whereIn('prt_id', [9,23])
                ->sum(DB::Raw('prts_bags*60+prts_pockets'));
            $scr16output_weight = DB::table('process_results_prts')
                ->where('outt_id', $outt_id)->whereIn('prt_id', [10, 13, 11])
                ->sum(DB::Raw('prts_bags*60+prts_pockets'));
            $scr14output_weight = DB::table('process_results_prts')
                ->where('outt_id', $outt_id)->whereIn('prt_id', [12, 14, 15])
                ->sum(DB::Raw('prts_bags*60+prts_pockets'));
            if($output_weight != null){
                $scr18variance = abs(($scr18output_weight/ $output_weight*100)-$scr18);
                $scr16variance = abs(($scr16output_weight/ $output_weight*100)-$scr16);
                $scr14variance = abs(($scr14output_weight/ $output_weight*100)-$scr14);

                if($scr18variance>2){
                    $data = array('name'=>"Admin Department", "threshold_name"=>"Milling Loss", "identifier"=>"SCR18-".$outturn_details->st_outturn, "difference"=>$scr18variance);    

                    Mail::send(['text'=>'maildiscrepancydmp'], $data, function($message) {
        
                        $message->to('jane.nyambura@nkg.coffee', 'Discrepancy')->subject('Discrepancy');
        
                        $message->cc('lewis.mutua@nkg.coffee');
                        $message->cc('john.gachunga@nkg.coffee');
        
                        $message->from('lewis.mutua@nkg.coffee','Ibero Database');
        
                    });

            
                }
                if($scr16variance>2){
                    $data = array('name'=>"Admin Department", "threshold_name"=>"Milling Loss", "identifier"=>"SCR16-".$outturn_details->st_outturn, "difference"=>$scr16variance);    

                    Mail::send(['text'=>'maildiscrepancydmp'], $data, function($message) {
        
                        $message->to('jane.nyambura@nkg.coffee', 'Discrepancy')->subject('Discrepancy');
        
                        $message->cc('lewis.mutua@nkg.coffee');
                        $message->cc('john.gachunga@nkg.coffee');
        
                        $message->from('lewis.mutua@nkg.coffee','Ibero Database');
        
                    });

            
                }
                if($scr14variance>2){
                    $data = array('name'=>"Admin Department", "threshold_name"=>"Milling Loss", "identifier"=>"SCR14-".$outturn_details->st_outturn, "difference"=>$scr14variance);    

                    Mail::send(['text'=>'maildiscrepancydmp'], $data, function($message) {
        
                        $message->to('jane.nyambura@nkg.coffee', 'Discrepancy')->subject('Discrepancy');
        
                        $message->cc('lewis.mutua@nkg.coffee');
                        $message->cc('john.gachunga@nkg.coffee');
        
                        $message->from('lewis.mutua@nkg.coffee','Ibero Database');
        
                    });

            
                }
                }else{
                    return null;
                }
            
        }else{
            $outt_mill_details = StockMill::where('outt_id', $outt_id)->get();

				$sum_net_kilos = 0;
				$st_ids = [];
				foreach($outt_mill_details as $key => $valuestmill){
					$sum_net_kilos += $valuestmill->st_net_weight;
					$st_ids[] = $valuestmill->id;
                }
                $sumkilos = 0;
                $sumweightedml = 0;
                $screendetails = [1, 2,3, 4];
                foreach ($screendetails as $key => $value) {
                    $acatid = $value;
                    $sumkilos = 0;
                    $sumweightedscrval =0;
                    $outtscr = null;
                    $count =0;
                foreach($st_ids as $key => $value2){
                    $weighted_scr= 0;
                    $scr_value = 0;
                    $stock_mill_details = StockMill::where('id',$value2)->first();
                    $st_net_weight = $stock_mill_details->st_net_weight;
                    $sumkilos += $st_net_weight;
                    $quality_details = quality_details::where('st_mill_id', $value2)->first();
                    if($quality_details != null)
                    {
                    $qanlid = $quality_details->id;
                    
                    $analysis_details = QualityAnalysis::where('qltyd_id', '=', $qanlid)->where('acat_id', $acatid)->first();
                    
                    if($analysis_details != null){
                        $scr_value = $analysis_details->qanl_value;
                        
                        $weighted_scr = (float)$scr_value * (float)$st_net_weight;
                    }
                    }
                    $sumweightedscrval += $weighted_scr;
                    $count++;
                }
                $outtscr = $sumweightedscrval/$sumkilos;
                if($value == 1){
                    $scr18 = $outtscr;
                }
                if($value == 2){
                    $scr16 = $outtscr;
                }
                if($value == 3){
                    $scr14 = $outtscr;
                }
                
            }
            $outturn_details = Outturns::where('id', '=', $outt_id)->first();
            //milling loss variance
            $output_weight = DB::table('process_results_prts')
                ->where('outt_id', $outt_id)
                ->sum(DB::Raw('prts_bags*60+prts_pockets'));
            $scr18output_weight = DB::table('process_results_prts')
                ->where('outt_id', $outt_id)->whereIn('prt_id', [9,23])
                ->sum(DB::Raw('prts_bags*60+prts_pockets'));
            $scr16output_weight = DB::table('process_results_prts')
                ->where('outt_id', $outt_id)->whereIn('prt_id', [10, 13, 11])
                ->sum(DB::Raw('prts_bags*60+prts_pockets'));
            $scr14output_weight = DB::table('process_results_prts')
                ->where('outt_id', $outt_id)->whereIn('prt_id', [12, 14, 15])
                ->sum(DB::Raw('prts_bags*60+prts_pockets'));
            if($output_weight != null){
                $scr18variance = abs(($scr18output_weight/ $output_weight*100)-$scr18);
                $scr16variance = abs(($scr16output_weight/ $output_weight*100)-$scr16);
                $scr14variance = abs(($scr14output_weight/ $output_weight*100)-$scr14);

                if($scr18variance>2){
                    $data = array('name'=>"Admin Department", "threshold_name"=>"Milling Loss", "identifier"=>"SCR18-".$outturn_details->st_outturn, "difference"=>$scr18variance);    

                    Mail::send(['text'=>'maildiscrepancydmp'], $data, function($message) {
        
                        $message->to('jane.nyambura@nkg.coffee', 'Discrepancy')->subject('Discrepancy');
        
                        $message->cc('lewis.mutua@nkg.coffee');
                        $message->cc('john.gachunga@nkg.coffee');
        
                        $message->from('lewis.mutua@nkg.coffee','Ibero Database');
        
                    });

            
                }
                if($scr16variance>2){
                    $data = array('name'=>"Admin Department", "threshold_name"=>"Milling Loss", "identifier"=>"SCR16-".$outturn_details->st_outturn, "difference"=>$scr16variance);    

                    Mail::send(['text'=>'maildiscrepancydmp'], $data, function($message) {
        
                        $message->to('jane.nyambura@nkg.coffee', 'Discrepancy')->subject('Discrepancy');
        
                        $message->cc('lewis.mutua@nkg.coffee');
                        $message->cc('john.gachunga@nkg.coffee');
        
                        $message->from('lewis.mutua@nkg.coffee','Ibero Database');
        
                    });

            
                }
                if($scr14variance>2){
                    $data = array('name'=>"Admin Department", "threshold_name"=>"Milling Loss", "identifier"=>"SCR14-".$outturn_details->st_outturn, "difference"=>$scr14variance);    

                    Mail::send(['text'=>'maildiscrepancydmp'], $data, function($message) {
        
                        $message->to('jane.nyambura@nkg.coffee', 'Discrepancy')->subject('Discrepancy');
        
                        $message->cc('lewis.mutua@nkg.coffee');
                        $message->cc('john.gachunga@nkg.coffee');
        
                        $message->from('lewis.mutua@nkg.coffee','Ibero Database');
        
                    });

            
                }
                }else{
                    return null;
                }
            return null;
        }
    }
  
   
}
