<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class VesselDetails extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'vessel_details_vd';

	// public $timestamps = false;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */



	protected $fillable = ['id', 'sct_id', 'vd_name', 'vd_mark', 'created_at', 'updated_at'];
           
}
