<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class Dispatch extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'dispatch_dp';

	// public $timestamps = false;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */



	protected $fillable = ['id', 'ctr_id', 'wb_id', 'dp_number', 'created_at', 'updated_at'];
           
}
