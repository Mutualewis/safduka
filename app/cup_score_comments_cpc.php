<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class cupscorecomments extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'cup_score_comments_cpc';

	public $timestamps = false;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	
	protected $fillable = ['id', 'ctr_id', 'cp_score', 'cp_quality', 'cp_qualification', 'cp_description', 'created_at', 'updated_at'];
           
}
