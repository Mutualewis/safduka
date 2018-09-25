<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class processcharges extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'process_charges_prcgs';
    //public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	
	protected $fillable = ['id', 'prcgs_instruction_no', 'prcgs_rate_id', 'prcgs_service', 'prcgs_rate', 'prcgs_total', 'prcgs_team_id' ,'created_at', 'updated_at'];

}