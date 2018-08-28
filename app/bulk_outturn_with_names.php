<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class bulk_outturn_with_names extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'bulk_outturn_with_names';
	public $timestamps = false;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['boutt_outturn_number', 'btyp_name', 'boutt_clean_id', 'boutt_clean_gross_weight', 'boutt_clean_bulk_percent', 'boutt_dmp_number', 'cgr_grower', 'csn_season'];
           
}