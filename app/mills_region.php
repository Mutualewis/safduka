<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class mills_region extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'mills_region';
	public $timestamps = false;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */ 
	// Code  Mark  Type Total_Weight cgr_date_added		
	
	protected $fillable = ['id', 'rgn_id', 'ml_name', 'ml_initials', 'ml_description', 'created_at', 'updated_at'];
           
}