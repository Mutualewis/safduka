<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class Weighbridge extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'weighbridge_wb';

	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	
	protected $fillable = ['id', 'cb_id', 'ctr_id','slr_id', 'wb_ticket', 'wb_vehicle_plate', 'wb_weight_in', 'wb_weight_out', 'wb_date', 'created_at', 'updated_at'];
           
}
