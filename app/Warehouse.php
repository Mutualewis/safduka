<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class Warehouse extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'warehouse_wr';

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
	    return $this->belongsTo('Ngea\Region', 'rgn_id');
	}

	public function country()
	{
	    return $this->hasManyThrough('Ngea\country', 'Ngea\Region', 'id', 'id');
	}	

	protected $fillable = ['id', 'rgn_id', 'wr_name', 'wr_initials', 'wr_description', 'created_at', 'updated_at'];

}