<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class HoopersCapacity extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'hoopers_capacity_hp';

	// public $timestamps = false;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */



	protected $fillable = ['id', 'hp_capacity', 'hp_description', 'created_at', 'updated_at'];
           
}
