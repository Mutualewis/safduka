<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class cleancoffee extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'outturn_grades_outtgr';

	public $timestamps = false;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	
	protected $fillable = ['id', 'outtgr_id', 'outtgr_sample_weight', 'outtgr_net_weight', 'outtgr_bags', 'outtgr_pkts', 'outtgr_remarks','cgrad_id', 'boutt_id',  'outt_id', 'cc_id', 'selst_id', 'sst_id', 'outtgr_date_added', 'clean_outt_id' , 'outtgr_bulk_percentage'];
           
}
