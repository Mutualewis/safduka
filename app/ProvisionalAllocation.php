<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class ProvisionalAllocation extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'provisional_allocation_prall';

	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */ 
	// Code  Mark  Type Total_Weight cgr_date_added		
	
	protected $fillable = ['id', 'pbk_id', 'st_id', 'prall_allocated_weight', 'prall_packages', 'prall_processed_weight', 'prall_ratios', 'prall_extra_processing', 'created_at', 'updated_at'];
           
}