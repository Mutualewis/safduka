<?php namespace Ngea;

use Zizaco\Entrust\EntrustRole;

class RoleUser extends EntrustRole
{
	protected $table = 'role_user';
	public $timestamps = false;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	
	protected $fillable = ['user_id', 'role_id'];
}