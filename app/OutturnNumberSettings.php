<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class OutturnNumberSettings extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'outturn_number_settings_ons';

	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	
	protected $fillable = ['id', 'it_id', 'ons_transactin_type', 'ons_item_phase', 'ons_prefix', 'ons_padding_character', 'ons_length', 'ons_previous_week', 'ons_previous_number', 'created_at', 'updated_at'];
           
}
