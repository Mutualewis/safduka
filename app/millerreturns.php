<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class millerreturns extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'miller_returns';
	public $timestamps = false;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */ 
	// Code  Mark  Type Total_Weight cgr_date_added		
	
	protected $fillable = ['outt_date_milled', 'id', 'cgr_grower', 'cgr_code', 'outt_number', 'Season', 'P1', 'P2', 'P3', 'PL', 'E', 'AA', 'AB', 'PB', 'C', 'TT', 'T', 'HE', 'SB', 'UG', 'UG1', 'UG2', 'UG3', 'CLEANTOTAL', 'MillingLoss', 'MBUNI', 'MH', 'ML', 'TOTALCLEANMBUNI'];
           
}