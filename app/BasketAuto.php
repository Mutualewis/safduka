<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class BasketAuto extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'basket_auto_ba';

	// public $timestamps = false;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */



	protected $fillable = ['id', 'cp_id', 'cgrad_id', 'bs_id', 'created_at', 'updated_at'];
           
}
