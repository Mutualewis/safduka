<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class StockLocationBatch extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'stock_location_batch_sloc';

	public $timestamps = false;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	
	protected $fillable = ['id', 'st_id', 'loc_id', 'btc_zone', 'created_at', 'updated_at'];
           
}
