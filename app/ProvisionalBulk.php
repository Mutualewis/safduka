<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class ProvisionalBulk extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'provisional_bulk_pbk';

	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */ 
	// Code  Mark  Type Total_Weight cgr_date_added		
	
	protected $fillable = ['id', 'ctr_id', 'csn_id', 'sct_id', 'prcss_id', 'pbk_instruction_number', 'pbk_reference_name', 'pbk_weight_in', 'pbk_other_instructions', 'pbk_weight_processed', 'pbk_confirmed_by', 'cgrad_id', 'bs_id', 'pbk_date', 'created_at', 'updated_at'];
           
}