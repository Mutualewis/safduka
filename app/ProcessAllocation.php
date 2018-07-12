<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class ProcessAllocation extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'process_allocations_pall';

	public $timestamps = false;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	
	protected $fillable = ['id', 'pr_id', 'st_id', 'pall_allocated_weight', 'pall_packages', 'pall_processed_weight', 'pall_ratios', 'pall_extra_processing', 'created_at', 'updated_at'];
           
}
