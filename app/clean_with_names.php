<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class clean_with_names extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'clean_with_names';

	public $timestamps = false;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	
	protected $fillable = ['outtgr_id', 'outt_id' , 'boutt_id' , 'clean_outt_id' , 'outtgr_bulk_percentage', 'outt_number', 'boutt_outturn_number', 'outtgr_net_weight', 'cgrad_name', 'cgr_grower', 'season'];
           
}
