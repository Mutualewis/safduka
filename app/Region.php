<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class Region extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'region_rgn';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	// return $this->hasManyThrough('App\Post', 'App\User');

	public function country()
	{
	    return $this->belongsTo('Ngea\country', 'ctr_id');
	}

	protected $fillable = ['id', 'ctr_id', 'rgn_name', 'rgn_description', 'created_at', 'updated_at'];

}