<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;
 
use Mgallegos\LaravelJqgrid\Repositories\EloquentRepositoryAbstract;
// use Illuminate\Auth\Reminders\RemindableInterface;

class OutturnRepository extends EloquentRepositoryAbstract {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'outturn_with_names';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['outt_number', 'outt_grn_number', 'pty_name', 'cgr_grower', 'csn_season' , 'mst_name', 'outt_net_weight', 'outt_net_weight', 'outt_gross_weight', 'outt_bags', 'outt_delivery_date', 'outt_date_milled'];
	

	public function __construct(Model $Model)
	{
		$this->Database = 'outturn_with_names';

		$this->visibleColumns = array('outt_number', 'outt_grn_number', 'pty_name', 'cgr_grower', 'csn_season' , 'mst_name', 'outt_net_weight', 'outt_net_weight', 'outt_gross_weight', 'outt_bags', 'outt_delivery_date', 'outt_date_milled');

		$this->orderBy = array(array('id', 'asc'));
	}


}