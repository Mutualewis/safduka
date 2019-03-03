<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class saledetails extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'saledetails';
	public $timestamps = false;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */ 
	// Code  Mark  Type Total_Weight cgr_date_added		
	protected $fillable = ['Date', 'Mark', 'StraightOT' ,'PBulkOT' ,'CBulkOT', 'Season', 'PType', 'Grade', 'Weight', 'Sale_Status', 'Seleable_Status', 'Buyer', 'Sale_Season', 'Sale_No', 'Lot_No', 'Rate', 'Sale_Value', 'Sale_Date'];
           
}