<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class WeightScales extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'weight_scales_ws';

	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	public function warehouse()
	{
	    return $this->belongsTo('Ngea\Warehouse', 'wr_id');
	}
	
	protected $fillable = ['id', 'wr_id', 'ws_station', 'ws_equipment_number', 'ws_baud_rate', 'ws_parity', 'ws_stop_bits', 'ws_data_bits', 'ws_port_name', 'created_at', 'updated_at'];
           
}
