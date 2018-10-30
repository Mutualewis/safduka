<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class WeighbridgeInfo extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'weighbridge_info_wbi';

	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	
	protected $fillable = ['id', 'ctr_id', 'csn_id', 'cb_id', 'slr_id', 'wbi_ticket', 'wbi_delivery_number', 'wbi_vehicle_plate', 'wbi_weight_in', 'wbi_weight_out', 'wbi_confirmedby', 'wbi_time_in', 'wbi_time_out', 'wbi_movement_permit', 'wbi_driver_name', 'wbi_driver_id', 'wbi_dispatch_date', 'created_at', 'updated_at'];
           
}
