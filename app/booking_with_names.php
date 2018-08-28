<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class booking_with_names extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'booking';

	public $timestamps = false;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	
	protected $fillable = ['id', 'ref_no', 'previous_no', 'cgr_grower', 'cgr_code', 'cgr_mark', 'delivery_date', 'agtid', 'agt_name'];
           
}
