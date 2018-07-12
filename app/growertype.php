<?php 
namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class growertype extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'grower_type_gt';
	public $timestamps = false;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	// Code  Mark  Type Total_Weight cgr_date_added
	protected $fillable = ['id', 'gt_name', 'gt_description'];
           
}