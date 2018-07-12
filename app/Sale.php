<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class Sale extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'sale_sl';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id', 'ctr_id', 'csn_id', 'cb_id', 'sltyp_id', 'sl_no', 'sl_date', 'sl_hedge', 'sl_month', 'created_at', 'updated_at', 'sl_catalogue_confirmedby'];

}