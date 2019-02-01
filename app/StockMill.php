<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;
use Activity;
use Auth;
use Spatie\Activitylog\LogsActivityInterface;
use Spatie\Activitylog\LogsActivity;

// use Illuminate\Auth\Reminders\RemindableInterface;

class StockMill extends Model implements LogsActivityInterface{

	use LogsActivity;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'stock_mill_st';
	protected static $logAttributes = '*';
	
	public $timestamps = false;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	
	protected $fillable = ['id', 'prc_id', 'gr_id', 'st_dispatch_net', 'st_gross', 'st_tare', 'st_moisture', 'pkg_id', 'usr_id', 'created_at', 'updated_at'];
	
	public function grn()
    {
        return $this->belongsTo('Ngea\Grn', 'grn_id');
	}
	public function partchmenttype()
    {
        return $this->belongsTo('Ngea\ParchmentType', 'pty_id');
	}
	
	public function getActivityDescriptionForEvent($eventName)
	{
		$user_data = Auth::user();
		$user      = $user_data->id;
		$username      = $user_data->usr_name;
		$changeset = json_encode($this->getDirty());
		
		if ($eventName == 'created')
		{
			Activity::log('Added stock item '. $this->st_outturn . ' user ' .$username);
			return 'stock item "' . $this->st_outturn . '" was created by '. $username ;
		}

		if ($eventName == 'updated')
		{
			return 'stock item "' . $this->st_outturn . '" was updated by '. $username .' with '.$changeset;
		}

		if ($eventName == 'deleted')
		{
			return 'stock item "' . $this->st_outturn . '" was deleted';
		}

		return '';
	}
}
