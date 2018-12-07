<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class parchmentqualitydetails extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'parchment_quality';
	public $timestamps = false;

	public function getSc18pAttribute()
	{
		$screens = str_replace("'",'"',$this->qualityParameterSCRID);
		$item = null;	
	if ($this->is_JSON($screens)) {
		$screens = \json_decode($screens); 
		
		foreach($screens as $scr) {
			$scr = get_object_vars($scr);
			if(isset($scr[1])){
				$item =  $scr[1];
				break;
			}
			
		}
	} 
		return $item;
	}
	public function getSc16pAttribute()
	{
		$screens = str_replace("'",'"',$this->qualityParameterSCRID);
		$item = null;	
	if ($this->is_JSON($screens)) {
		$screens = \json_decode($screens); 
		
		foreach($screens as $scr) {
			$scr = get_object_vars($scr);
			if(isset($scr[2])){
				$item =  $scr[2];
				break;
			}
			
		}
	} 
		return $item;
	}
	public function getSc14pAttribute()
	{
		$screens = str_replace("'",'"',$this->qualityParameterSCRID);
		$item = null;	
	if ($this->is_JSON($screens)) {
		$screens = \json_decode($screens); 
		
		foreach($screens as $scr) {
			$scr = get_object_vars($scr);
			if(isset($scr[3])){
				$item =  $scr[3];
				break;
			}
			
		}
	} 
		return $item;
	}
	public function getTHESBpAttribute()
	{
		$screens = str_replace("'",'"',$this->qualityParameterSCRID);
		$item = null;	
	if ($this->is_JSON($screens)) {
		$screens = \json_decode($screens); 
		
		foreach($screens as $scr) {
			$scr = get_object_vars($scr);
			if(isset($scr[4])){
				$item =  $scr[4];
				break;
			}
			
		}
	} 
		return $item;
	}
	public function getMbunipAttribute()
	{
		$screens = str_replace("'",'"',$this->qualityParameterSCRID);
		$item = null;	
	if ($this->is_JSON($screens)) {
		$screens = \json_decode($screens); 
		
		foreach($screens as $scr) {
			$scr = get_object_vars($scr);
			if(isset($scr[5])){
				$item =  $scr[5];
				break;
			}
			
		}
	} 
		return $item;
	}
	public function getsc18cAttribute()
	{
		$screens = str_replace("'",'"',$this->qualityParameterSCRID);
		$item = null;	
	if ($this->is_JSON($screens)) {
		$screens = \json_decode($screens); 
		
		foreach($screens as $scr) {
			$scr = get_object_vars($scr);
			if(isset($scr[6])){
				$item =  $scr[6];
				break;
			}
			
		}
	} 
		return $item;
	}
	public function getsc16cAttribute()
	{
		$screens = str_replace("'",'"',$this->qualityParameterSCRID);
		$item = null;	
	if ($this->is_JSON($screens)) {
		$screens = \json_decode($screens); 
		
		foreach($screens as $scr) {
			$scr = get_object_vars($scr);
			if(isset($scr[7])){
				$item =  $scr[7];
				break;
			}
			
		}
	} 
		return $item;
	}
	public function getsc14cAttribute()
	{
		$screens = str_replace("'",'"',$this->qualityParameterSCRID);
		$item = null;	
	if ($this->is_JSON($screens)) {
		$screens = \json_decode($screens); 
		
		foreach($screens as $scr) {
			$scr = get_object_vars($scr);
			if(isset($scr[8])){
				$item =  $scr[8];
				break;
			}
			
		}
	} 
		return $item;
	}
	public function getTHESBcAttribute()
	{
		$screens = str_replace("'",'"',$this->qualityParameterSCRID);
		$item = null;	
	if ($this->is_JSON($screens)) {
		$screens = \json_decode($screens); 
		
		foreach($screens as $scr) {
			$scr = get_object_vars($scr);
			if(isset($scr[9])){
				$item =  $scr[9];
				break;
			}
			
		}
	} 
		return $item;
	}
	public function getMbunicAttribute()
	{
		$screens = str_replace("'",'"',$this->qualityParameterSCRID);
		$item = null;	
	if ($this->is_JSON($screens)) {
		$screens = \json_decode($screens); 
		
		foreach($screens as $scr) {
			$scr = get_object_vars($scr);
			if(isset($scr[10])){
				$item =  $scr[10];
				break;
			}
			
		}
	} 
		return $item;
	}
	public function is_JSON() {
		call_user_func_array('json_decode',func_get_args());
		return (json_last_error()===JSON_ERROR_NONE);
	}
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */ 
	// Code  Mark  Type Total_Weight cgr_date_added	
	
	protected $fillable = ['cgr_mark', 'outt_number', 'PType', 'Season', 'gross_weight', 'AQRSerial', 'cropType', 'Class', 'Moisture', 'millingLoss', 'sc18p', 'sc16p', 'sc14p', 'THESBp', 'Mbunip', 'sc18c', 'sc16c', 'sc14c', 'THESBc', 'Mbunic', 'oqlty_remarks'];
	

}
