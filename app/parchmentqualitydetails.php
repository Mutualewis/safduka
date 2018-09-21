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
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */ 
	// Code  Mark  Type Total_Weight cgr_date_added	
	
	protected $fillable = ['cgr_mark', 'outt_number', 'PType', 'Season', 'gross_weight', 'AQRSerial', 'cropType', 'Class', 'Moisture', 'millingLoss', 'sc18p', 'sc16p', 'sc14p', 'THESBp', 'Mbunip', 'sc18c', 'sc16c', 'sc14c', 'THESBc', 'Mbunic', 'oqlty_remarks'];
           
}