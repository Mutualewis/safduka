<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class ExpectedArrival extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'expected_arrival';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id', 'slid', 'sale', 'date', 'slctrid', 'prompt_date', 'csn_season', 'lot', 'outturn', 'mark', 'grade', 'weight', 'bags', 'pockets', 'hedge', 'month', 'cbid', 'buyer', 'prcid', 'auc_price', 'price', 'bric', 'br_date', 'bsid', 'code', 'quality', 'rl_no', 'rl_date', 'differential', 'st_moisture', 'pkg_id', 'st_dispatch_net', 'st_gross', 'loc_row_id', 'loc_column_id', 'btc_zone', 'gr_number', 'btc_packages'];

}