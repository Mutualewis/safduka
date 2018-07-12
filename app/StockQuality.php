<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class StockQuality extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'stock_qualty_details_sqltyd';

	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	
	protected $fillable = ['id', 'st_id', 'cp_id', 'sqltyd_acidity', 'sqltyd_body', 'sqltyd_flavour', 'sqltyd_description', 'created_at', 'updated_at'];
           
}
