<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class coffeegrower extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'coffee_growers_cgr';
	public $timestamps = false;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	// Code  Mark  Type Total_Weight cgr_date_added
	protected $fillable = ['gt_id', 'cgr_name', 'cgr_organisation', 'cgr_code', 'cgr_mark', 'cg_email' , 'cg_mobile', 'cg_postal_address', 'cg_land_line', 'cg_vat_number', 'cg_physical_address', 'cg_date_registered', 'cg_sub_county', 'cg_is_active', 'cg_app_transaction', 'cg_postal_town', 'cnt_id', 'rgn_id', 'ctr_id', 'cg_post_code', 'cg_factory_id', 'cg_cert'];
           
}