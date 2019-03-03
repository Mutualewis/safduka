<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;
use Activity;
// use Illuminate\Auth\Reminders\RemindableInterface;
use Auth;
use Spatie\Activitylog\LogsActivityInterface;
use Spatie\Activitylog\LogsActivity;

class Grn extends Model implements LogsActivityInterface{
	use LogsActivity;
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

	public function getActivityDescriptionForEvent($eventName)
	{
		$user_data = Auth::user();
		$user      = $user_data->id;
		$username      = $user_data->usr_name;
		$changeset = json_encode($this->getDirty());
		if ($eventName == 'created')
		{
			return 'grn item "' . $this->gr_number . '" was created by '. $username ;
		}

		if ($eventName == 'updated')
		{
			return 'grn item "' . $this->gr_number . '" was updated by '. $username .' with '.$changeset;
		}

		if ($eventName == 'deleted')
		{
			return 'grn item "' . $this->gr_number . '" was deleted';
		}

		return '';
	}
	
	
}
