<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class Parchment extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'outturn_outt';

	public $timestamps = false;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id', 'outt_number', 'outt_grn_number', 'pty_id', 'outt_dmp_number', 'boutt_id', 'outt_bulk_percent', 'cgr_id', 'csn_id' , 'mst_id', 'outt_net_weight', 'outt_gross_weight', 'outt_bags', 'outt_delivery_date', 'outt_date_milled'];
           
}
