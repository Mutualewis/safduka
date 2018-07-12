<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class Credit_Note extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'credit_note_cn';

	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	
	protected $fillable = ['id', 'cn_number', 'cn_buyer', 'cn_seller', 'cn_goods', 'cn_country', 'cn_date', 'cn_weight', 'cn_bags', 'cn_value', 'created_at', 'updated_at'];
           
}
