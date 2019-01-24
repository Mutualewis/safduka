<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;
use Activity;
// use Illuminate\Auth\Reminders\RemindableInterface;

class Grn extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'grn_gr';

	protected static $logAttributes = '*';

	protected static $logOnlyDirty = true;

	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */



	protected $fillable = ['id', 'ctr_id', 'cgr_id', 'gr_confirmed_by', 'wb_id', 'gr_number', 'created_at', 'updated_at'];

	
	
}
