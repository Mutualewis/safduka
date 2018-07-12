<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class QualityAnalysis extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'quality_analysis_qanl';
	public $timestamps = false;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	//qtyp_id  oqlty_outturn_id  cc_id ct_id  oqlty_moisture  oqlty_milling_loss  oqlty_remarks  oqlty_aqr_serial oqlty_date_added
	//'qtyp_id'  'oqlty_outturn_id'  'cc_id ct_id'  'oqlty_moisture'  'oqlty_milling_loss'  'oqlty_remarks'  'oqlty_aqr_serial'
	//'qtyp_id',  'oqlty_outturn_id',  'cc_id ct_id',  'oqlty_moisture',  'oqlty_milling_loss',  'oqlty_remarks',  'oqlty_aqr_serial'


	protected $fillable = ['acat_id',  'oqlty_id',  'qanl_value'];
           
}