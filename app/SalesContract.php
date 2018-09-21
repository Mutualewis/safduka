<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class SalesContract extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'sales_contract_sct';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id', 'ctr_id', 'cl_id', 'sct_number', 'sct_description', 'sct_packages', 'sct_month', 'sct_bulk_date', 'sct_disposal_date', 'sct_shipped', 'created_at', 'updated_at'];

}