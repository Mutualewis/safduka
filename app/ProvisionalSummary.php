<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class ProvisionalSummary extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'provisional_summary';

	public $timestamps = false;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	
	protected $fillable = ['id', 'ctrid', 'season', 'process', 'process_initial', 'process_number', 'pr_weight_in', 'process_description', 'process_instructions', 'process_other_instructions', 'contract_number', 'contract_description', 'contract_month', 'contract_bulk_date', 'contract_disposal', 'contract_shipment', 'suprvisor', 'process_date', 'process_confirmed_by'];
           
}
