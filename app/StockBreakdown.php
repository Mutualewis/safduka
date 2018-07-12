<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class StockBreakdown extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'stock_breakdown_stb';

	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	
	protected $fillable = ['id', 'st_id', 'br_id', 'stb_weight', 'stb_value', 'bs_id', 'ibs_id', 'stb_bulk_ratio', 'stb_purchase_contract_ratio', 'cb_id', 'cgr_id', 'prc_id', 'created_at', 'updated_at'];
           
}
