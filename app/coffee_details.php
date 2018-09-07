<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class coffee_details extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'coffee_details_cfd';

	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	public function purchase()
	{
	    return $this->belongsTo('Ngea\purchase', 'cfd_id');
	}	
	
	protected $fillable = ['id', 'csn_id', 'ctyp_id', 'sl_id', 'slr_id', 'cfd_lot_no', 'cfd_outturn', 'wr_id', 'cfd_grower_mark', 'ml_id', 'cgrad_id', 'cfd_weight', 'cfd_bags', 'cfd_pockets', 'cfd_dnt', 'created_at', 'updated_at'];
           
}
