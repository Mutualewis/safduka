<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class ProvisionalResults extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'provisional_bulk_results_pbrts';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id', 'pr_id', 'prt_id', 'st_wr_id', 'prts_weight', 'prts_packages', 'prts_bags', 'prts_pockets', 'created_at', 'updated_at'];

}