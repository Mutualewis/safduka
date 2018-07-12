<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class StockAndPurchased extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'stocks_and_purchased';

	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	
	protected $fillable = ['id', 'stock_id', 'slid', 'sale', 'date', 'slctrid', 'slr_name', 'prompt_date', 'csn_season', 'csn_id', 'lot', 'outturn', 'mark', 'grade', 'weight', 'bags', 'pockets', 'hedge', 'month', 'cbid', 'buyer', 'prcid', 'auc_price', 'price', 'bric', 'br_date', 'bsid', 'code', 'quality', 'rl_no', 'rl_date', 'value', 'differential', 'st_moisture', 'pkg_id', 'st_dispatch_net', 'st_gross', 'loc_row_id', 'loc_column_id', 'btc_zone', 'gr_number', 'btc_packages', 'slrid', 'cert', 'ended', 'location'];
           
}
