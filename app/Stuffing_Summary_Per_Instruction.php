<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class Stuffing_Summary_Per_Instruction extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'stuffing_summary_per_instruction';

	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */


	protected $fillable = ['st_outturn', 'cb_name', 'weight', 'month', 'year', 'stuffing_date'];


           
}
