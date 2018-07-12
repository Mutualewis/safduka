<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class GRNSSummary extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'grns_summary_gsm';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id', 'gsm_season', 'gsm_warehouse_from', 'gsm_month', 'gsm_weight', 'gsm_expected_weight', 'gsm_weight_difference', 'gsm_percentage_weight_difference', 'created_at', 'updated_at'];

}