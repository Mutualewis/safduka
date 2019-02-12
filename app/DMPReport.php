<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class DMPReport extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'daily_milling_parchment';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	
	protected $fillable = ['gr_number', 'grower_mark', 'st_outturn', 'parchment', 'grade', 'st_gross', 'st_tare', 'st_net_weight_received', 'st_packages_received', 'st_bags_received', 'st_pockets_received', 'dmp_bags', 'dmp_pockets', 'warehouse', 'loc_row', 'loc_column'];
           
}
