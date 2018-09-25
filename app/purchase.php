<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class purchase extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'purchases_prc';

	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	public function coffee_details()
	{
	    return $this->hasOne('Ngea\coffee_details');
	}	

	protected $fillable = ['id', 'cfd_id', 'cb_id', 'prc_price', 'bs_id', 'prc_fob_id', 'sst_id','inv_weight', 'prc_warrant_no', 'prc_warrant_weight', 'prc_invoice_no', 'created_at', 'updated_at'];
           
}
