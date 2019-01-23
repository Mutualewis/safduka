<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class BatchMill extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'batch_mill_btc';

	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	
	protected $fillable = ['id', 'st_id', 'btc_number', 'btc_weight', 'btc_bags', 'btc_pockets', 'created_at', 'updated_at'];

	public function stock()
    {
        return $this->belongsTo('Ngea\StockMill', 'st_id');
	}
	public function grn()
    {
        return $this->belongsTo('Ngea\StockMill', 'st_id');
	}
	public function partchmenttype()
    {
        return $this->belongsTo('Ngea\StockMill', 'st_id');
	}
           
}
