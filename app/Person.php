<?php namespace Ngea;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Reminders\RemindableInterface;

class Person extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'person_per';

    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = ['id', 'dprt_id', 'rgn_id', 'per_fname', 'per_sname', 'per_email', 'per_extension', 'created_at', 'updated_at'];
           
}
