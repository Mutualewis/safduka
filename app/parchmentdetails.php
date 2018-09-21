<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class parchmentdetails extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'parchmentdetails';
	public $timestamps = false;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */ 
	// Code  Mark  Type Total_Weight cgr_date_added	
	protected $fillable = ['id', 'cgr_mark', 'outt_number', 'grn_number', 'PType', 'Season', 'gross_weight', 'outt_bags', 'mst_name', 'outt_delivery_date'];
           
}