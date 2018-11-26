<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class partchment_comments extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'partchment_comments';

	public $timestamps = false;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	
	protected $fillable = ['id', 'st_mill_id', 'st_wr_id', 'qp_id', 'created_at', 'updated_at'];
           
}
