<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class GrnsView extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'grns_view';

	public $timestamps = false;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	
	protected $fillable = ['id', 'gr_number', 'wb_ticket', 'wb_delivery_number', 'wb_vehicle_plate', 'wb_weight_in', 'wb_weight_out', 'wb_time_in', 'wb_time_out', 'wb_movement_permit', 'wb_driver_name', 'wb_driver_id', 'wb_dispatch_date', 'st_dispatch_net', 'st_gross', 'st_tare', 'st_moisture', 'pkg_name', 'prc_confirmed_price', 'sale', 'csn_season', 'ctrname', 'lot', 'outturn', 'seller', 'grade', 'ott_weight', 'ott_bags', 'ott_pockets', 'mark', 'cert', 'price', 'code', 'quality', 'warrant_no'];
           
}
