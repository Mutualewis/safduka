<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class Process extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'process_pr';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	
	protected $fillable = ['id', 'prcss_id', 'pr_instruction_number', 'pr_weight_in', 'pr_weight_out', 'pr_rejects', 'pr_other_instructions', 'pr_confirmed_by', 'ctr_id'];

}