<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class Processes_Results_Summary extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'process_results_summary';

	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */


	protected $fillable = ['instruction_number', 'instruction_date', 'reference_name', 'other_instructions', 'supervisor', 'tags', 'allocated_weight', 'results', 'balance'];
           
}
