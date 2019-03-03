<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class PurchaseSummary extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'purchases_summary_prsm';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['prsm_csn_season', 'prsm_seller', 'prsm_buyer', 'prsm_wr_name', 'prsm_weight', 'prsm_month'];

}