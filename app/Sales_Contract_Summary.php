<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class Sales_Contract_Summary extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'sales_contract_summary_view';

	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable = ['sct_number', 'sct_description', 'sct_packages', 'contract_weight', 'sct_month', 'sct_disposal_date', 'pr_instruction_number', 'total_allocated', 'status'];
           



}
