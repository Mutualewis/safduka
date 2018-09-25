<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class bulkoutturn extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'bulk_outturn_boutt';
	public $timestamps = false;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	// 'outt_outtgr_id'  'boutt_outturn_number'  'boutt_type_id'  'boutt_percentage'
	// 'outt_outtgr_id',  'boutt_outturn_number' , 'boutt_type_id' , 'boutt_percentage'
	protected $fillable = ['id',  'boutt_outturn_number' , 'boutt_type_id' , 'boutt_dmp_number', 'csn_id', 'cgr_id', 'boutt_clean_id', 'boutt_clean_gross_weight', 'boutt_clean_bulk_percent'];
           
}