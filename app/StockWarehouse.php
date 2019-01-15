<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;
use Activity;
// use Illuminate\Auth\Reminders\RemindableInterface;

class StockWarehouse extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'stock_warehouse_st';
	protected static $logAttributes = '*';
	
	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	
	protected $fillable = ['id', 'prc_id', 'gr_id', 'st_dispatch_net','st_net_weight', 'st_gross', 'st_tare', 'st_moisture', 'pkg_id', 'usr_id', 'created_at', 'updated_at'];
           
}
