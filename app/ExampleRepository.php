<?php namespace Ngea;
use Illuminate\Database\Eloquent\Model;
use Mgallegos\LaravelJqgrid\Repositories\EloquentRepositoryAbstract;
 
class ExampleRepository extends EloquentRepositoryAbstract {
 
 	// protected $fillable = ['cgr_grower', 'cgr_code', 'cgr_mark', 'gty_id'];


    public function __construct(Model $Model)
    {
        $this->Database = new $Model;
 
        $this->visibleColumns = array('id', 'cgr_grower', 'cgr_code', 'cgr_mark', 'gty_id');
 
        $this->orderBy = array(array('id', 'asc'), array('cgr_grower','desc'));
    }
 
        // $this->orderBy = array(array('table_1.id', 'asc'), array('table_1.name', 'desc'));
    
}
