<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class process_charges_teams extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */ 
	protected $table = 'process_charges_teams_pctms';
    //public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	
	protected $fillable = ['id', 'prcgs_id', 'prcgs_team_id', 'bags', 'prcgs_rate', 'descr','created_at', 'updated_at'];

}