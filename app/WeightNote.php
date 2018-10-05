<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class WeightNote extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'weight_note_wn';

	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	
	protected $fillable = ['id', 'st_id', 'pr_id', 'pkg_id', 'wn_packages', 'wb_id', 'ws_id', 'wn_purpose', 'created_at', 'updated_at'];
           
}
