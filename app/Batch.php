<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;
use Activity;
use Auth;
use Spatie\Activitylog\LogsActivityInterface;
use Spatie\Activitylog\LogsActivity;

class Batch extends Model implements LogsActivityInterface{
	use LogsActivity;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'batch_btc';

	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected static $logAttributes = '*';

	protected $fillable = ['id', 'st_id', 'btc_number', 'btc_weight', 'btc_bags', 'btc_pockets', 'created_at', 'updated_at'];
	
	public function getActivityDescriptionForEvent($eventName)
	{
		$user_data = Auth::user();
		$user      = $user_data->id;
		$username      = $user_data->usr_name;
		$changeset = json_encode($this->getDirty());
		if ($eventName == 'created')
		{
			return 'batch warehouse item "' . $this->id . '" was created by '. $username ;
		}

		if ($eventName == 'updated')
		{
			return 'batch warehouse item "' . $this->id . '" was updated by '. $username .' with '.$changeset;
		}

		if ($eventName == 'deleted')
		{
			return 'batch warehouse item "' . $this->id . '" was deleted';
		}

		return '';
	}

}
