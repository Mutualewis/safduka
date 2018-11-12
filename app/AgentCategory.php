<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class AgentCategory extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'agent_category_agtc';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['agtc_name'];

}