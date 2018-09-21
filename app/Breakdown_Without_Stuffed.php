<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class Breakdown_Without_Stuffed extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'breakdown_without_stuffed';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id', 'bric_id', 'br_no', 'bs_code', 'bs_quality', 'st_outturn', 'csn_season', 'cgrad_name', 'cg_name', 'cb_name', 'current_weight', 'allocated_weight', 'ratios', 'weight', 'prt_name', 'sct_number', 'sales_weight', 'status'];

}