<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class warehouses_region extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'warehouses_region';
	public $timestamps = false;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */ 
	// Code  Mark  Type Total_Weight cgr_date_added		
	
	protected $fillable = ['wrid', 'rgnid', 'ctr_id', 'rgn_name', 'rgn_description', 'wr_name', 'wr_initials', 'wr_description'];
           
}