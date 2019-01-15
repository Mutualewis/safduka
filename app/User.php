<?php

namespace Ngea;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

use Ngea\Role;
use Ngea\Permission;
// use Zizaco\Entrust\Traits\HasRole;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    use EntrustUserTrait;
     
    protected $table = 'users_usr';
   
    // use HasRole;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['usr_name', 'usr_email', 'password', 'usr_edit_privilage', 'usr_active'];

    
    // public function roles(){
    //     return $this->belongsToMany('Ngea\Role'); //,'assigned_roles'
    // }
    // public function hasRole($name){
    //     // $user = Auth::user();
    //     // $role = Role::where('name', '=', $name)->first();


        
    //     return true; //,'assigned_roles'
    // }
    // public function can($permission){
    //     return $this->belongsToMany('Ngea\Role'); //,'assigned_roles'
    // }


    // roles(), hasRole($name), can($permission)

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function generateToken()
    {
        $this->api_token = str_random(60);
        $this->save();

        return $this->api_token;
    }
}
