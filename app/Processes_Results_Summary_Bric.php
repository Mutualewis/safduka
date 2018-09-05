<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class Processes_Results_Summary_Bric extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'process_results_summary_per_bric';

	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */


	protected $fillable = ['outturn', 'date', 'buyer', 'quality', 'total_allocated', 'total_results', 'allocated_weight', 'total_diffrence', 'weight'];


           
}
