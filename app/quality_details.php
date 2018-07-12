<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class quality_details extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'qualty_details_qltyd';

	public $timestamps = false;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	
	protected $fillable = ['id', 'cfd_id', 'prcss_id', 'qltyd_prcss_value', 'scr_id', 'qltyd_scr_value', 'cp_id', 'rw_id', 'qltyd_comments', 'created_at', 'updated_at'];
           
}
