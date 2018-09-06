<?php namespace Ngea;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{

	protected $table = 'permissions';
	public $timestamps = false;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	
	protected $fillable = ['id', 'name', 'display_name', 'description' ];
}