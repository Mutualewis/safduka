<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class StockLocationView extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'stock_locations';

	public $timestamps = false;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	
	protected $fillable = ['id', 'slocid', 'btc_number', 'stid', 'prc_id', 'gr_id', 'st_dispatch_net', 'st_gross', 'st_tare', 'st_moisture', 'pkg_name', 'btc_weight', 'btc_bags', 'btc_pockets', 'loc_row', 'loc_column', 'btc_zone', 'wr_name'];
           
}
