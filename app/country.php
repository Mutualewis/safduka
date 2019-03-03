<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class country extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'country_ctr';

	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	public function weightScales()
	{
	    return $this->hasMany('Ngea\WeightScales', 'wr_id');
	}

	public function region()
	{
		return $this->hasMany('Ngea\Region');
	}	

	public function warehouse()
	{
	    return $this->hasManyThrough('Ngea\Warehouse', 'Ngea\Region', 'ctr_id', 'rgn_id', 'rgn_id', 'warehouse');
	}	

	protected $fillable = ['id', 'ctr_name', 'ctr_initial', 'created_at', 'updated_at'];
           
}
