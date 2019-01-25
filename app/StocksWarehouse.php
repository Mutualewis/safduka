<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class StocksWarehouse extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'stocks_warehouse';

	public $timestamps = false;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	
	protected $fillable = ['id', 'slocid','st_owner_id', 'btc_number', 'stid', 'prc_id', 'gr_id', 'st_dispatch_net', 'st_gross', 'st_tare', 'st_moisture', 'pkg_name', 'btc_weight', 'btc_bags', 'btc_bags', 'btc_pockets', 'loc_row', 'loc_column', 'btc_zone', 'wr_name'];
	
	
}
