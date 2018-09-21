<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class saleinfo extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'sales_info_sif';

	public $timestamps = false;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */



	protected $fillable = ['outtgr_id',  'cb_id', 'sl_id', 'sif_lot', 'sif_rate', 'sif_value', 'csn_id', 'sif_weight_sold'];
           
}
