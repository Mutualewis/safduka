<?php namespace Ngea\Http\Controllers;

use Input;
use confirm;
use DB;
use ask;
use Illuminate\Http\Request;
use Ngea\Http\Controllers\Controller;
use Ngea\Growers;
use Ngea\Buyer;
use Ngea\Role;
use Ngea\RoleUser;
use Ngea\User;
use View;
use Hash;
use Ngea\country;
use Ngea\Department;



class UserController extends Controller {

    public function createUserForm (Request $request){
		$roles = Role::all(['id', 'name', 'display_name', 'description']);
        $country = country::all(['id', 'ctr_name', 'ctr_initial']);
        
		return View::make('registeruser', compact('id', 'roles', 'country'));

    }

    public function registeruser (Request $request){
        $first_name = Input::get('first_name');
        $second_name = Input::get('second_name');
        $country = Input::get('country');
        $role = Input::get('role');
        $email = Input::get('email');
        $extension = Input::get('extension');
        $user_name = Input::get('user_name');

        $department_name = Input::get('department_name');

        $password = Input::get('password');
        $cnpassword = Input::get('cnpassword');
        $role = Input::get('role');


        $roles = Role::all(['id', 'name', 'display_name', 'description']);
        $country = country::all(['id', 'ctr_name', 'ctr_initial']);

        $sel_country = Input::get('country');
        $cid = $sel_country;
        if($sel_country != NULL){
            $Department = Department::where('ctr_id', $sel_country)->get();
        }
        

     	if($password != $cnpassword){
			return redirect('registeruser')
                        ->withErrors("Passwords Do Not Match!!")
                        ->withInput();	
    	}

    	$password = Hash::make(Input::get('password'));

		if (User::where('usr_name', '=', $user_name)->exists()) {
			return redirect('registeruser')
                        ->withErrors("User Already Exists!!")
                        ->withInput();		 
		} else if($user_name != NULL && $first_name != NULL && $second_name != NULL && $country != NULL && $role != NULL && $email != NULL && $extension != NULL && $user_name != NULL) {

            $perID = DB::table('person_per')->insertGetId(
                ['dprt_id' => $department_name, 'per_fname' => $first_name, 'per_sname' => $second_name, 'per_email' => $email, 'per_extension' => $extension]
            );

			$userID = DB::table('users_usr')->insertGetId(
			    ['per_id' => $perID, 'usr_name' => $user_name, 'usr_active' => '1', 'usr_email' => $user_name, 'password' => $password ]
			);			

			DB::table('role_user')->insert(
			    ['user_id' => $userID, 'role_id' => $role]
			);

			$request->session()->flash('alert-success', 'User was successful added!');            
			return redirect('registeruser');			
		} else {
            return View::make('registeruser', compact('id', 'roles', 'country', 'Department', 'cid'));
        }

        
    }

    public function resetPassword (Request $request){
    	
        $this->validate($request, [
            'user_name' => 'required', 'password' => 'required', 'cnpassword' => 'required', 
        ]);


        $user_name = Input::get('user_name');
    	$password = Input::get('password');
    	$cnpassword = Input::get('cnpassword');


    	if($password != $cnpassword){
			return redirect('reset')
                        ->withErrors("Passwords Do Not Match!!")
                        ->withInput();	
    	}
        $password = Hash::make(Input::get('password'));
		User::where('usr_name', '=', $user_name)
					->update(['password' => $password]);



		$request->session()->flash('alert-success', 'Password was successful changed!');
		return redirect('reset');			
	}
 

}

