<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class Being_processed extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'being_processed';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	
	protected $fillable = ['id', 'sts_id', 'prcid', 'prcssid', 'weight', 'bags', 'pockets', 'sale', 'csn_season', 'lot', 'name', 'outturn', 'seller', 'mark', 'grade', 'ott_weight', 'ott_bags', 'ott_pockets', 'price', 'code', 'quality', 'warrant_no', 'cert', 'ended', 'location'];
           
}
