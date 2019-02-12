<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;
use Activity;
use Auth;
use Spatie\Activitylog\LogsActivityInterface;
use Spatie\Activitylog\LogsActivity;

// use Illuminate\Auth\Reminders\RemindableInterface;

class Outturns extends Model implements LogsActivityInterface{

	use LogsActivity;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'outturns_outt';
	protected static $logAttributes = '*';
	
	public $timestamps = false;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	
	protected $fillable = ['id', 'prc_id', 'gr_id', 'st_dispatch_net', 'st_gross', 'st_tare', 'st_moisture', 'pkg_id', 'usr_id', 'created_at', 'updated_at'];

}
