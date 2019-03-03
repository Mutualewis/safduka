<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class buyerdetails extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'buyer_details';
	public $timestamps = false;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */ 
	// Code  Mark  Type Total_Weight cgr_date_added
	protected $fillable = ['id', 'Name', 'Code', 'Purchases' , 'Date Added'];
           
}