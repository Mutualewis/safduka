<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class outturn_with_names extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'outturn_with_names';
	public $timestamps = false;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['outt_number', 'outt_grn_number', 'outt_dmp_number', 'pty_name', 'cgr_grower', 'boutt_id', 'outt_bulk_percent', 'csn_season' , 'mst_name', 'outt_net_weight', 'outt_net_weight', 'outt_gross_weight', 'outt_bags', 'outt_delivery_date', 'outt_date_milled'];
           
}