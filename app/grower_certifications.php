<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class grower_certifications extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'grower_certifications';
	public $timestamps = false;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	// Code  Mark  Type Total_Weight cgr_date_added
	protected $fillable = ['cgr_id', 'crt_id'];
           
}