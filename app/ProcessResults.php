<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class ProcessResults extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'process_results_prts';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id', 'pr_id', 'prt_id', 'outt_id', 'prts_weight', 'prts_packages', 'prts_bags', 'prts_pockets', 'created_at', 'updated_at'];

}