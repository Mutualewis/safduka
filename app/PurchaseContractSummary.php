<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class PurchaseContractSummary extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'purchase_contract_summary';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	
	protected $fillable = ['sl_id', 'sale', 'csn_id', 'bric', 'quality', 'code', 'kilos', 'br_bags', 'costs', 'value', 'hedge', 'diff', 'price_per_fifty', 'br_diffrential', 'br_value'];
           


}
