<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class Processes extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'processes';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id', 'ctrid', 'process', 'process_initial', 'process_description', 'process_number', 'process_instructions', 'process_other_instructions', 'result_type', 'results_initials', 'resulsts_description', 'weight_in', 'weight_out', 'packages_out', 'pr_confirmed_by'];

}