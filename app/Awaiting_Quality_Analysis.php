<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class Awaiting_Quality_Analysis extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'awaiting_quality_analysis';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id', 'slid', 'sale', 'date', 'csn_season', 'ml_name', 'region', 'warehouse', 'lot', 'outturn', 'mark', 'grade', 'weight', 'bags', 'pockets', 'cert', 'hedge', 'month', 'greencomments', 'green', 'dnt', 'touch', 'prcss_name', 'qltyd_prcss_value', 'scr_name', 'qltyd_scr_value', 'cp_quality', 'rw_quality', 'invoice', 'wrid'];
 

}