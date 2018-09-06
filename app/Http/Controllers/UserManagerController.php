<?php namespace Ngea\Http\Controllers;

use Activity;
use Auth;
use delete;
use Illuminate\Http\Request;
use Input;
use DB;

use Ngea\Http\Controllers\Controller;

use Ngea\User;
use Ngea\Role;
use Ngea\RoleUser;
use Ngea\Permission;
use Ngea\Person;
use Yajra\Datatables\Datatables;



use PDF;
use View;

class UserManagerController extends Controller
{
     //roles
     public function rolesForm (Request $request){
        $id = null;
        $roles= DB::table('roles AS rl')
            ->select('*')
            ->orderBy('rl.created_at', 'desc')
            ->get();

        return View::make('role', compact('id', 'roles'));
    }

    public function roles (Request $request){
        $this->validate($request, [
            'name' => 'required'
        ]);
        $id = null;

        $name = Input::get('name');
        $display_name = Input::get('display_name');
        $description = Input::get('description');

        $user_data = Auth::user();

        $user = $user_data->id;



        if (null !== Input::get('submit')) {
            $role = Role::where('name', $name)->first();
        
            if ($role != null) {
                $role->name=$name;
                $role->display_name=$display_name;
                $role->description=$description;
                $role->save();

                Activity::log('Updated role information for role ' . $name . ' display name ' . $display_name . ' description ' . $description . ' User '. $user);

            } else {
                $role = new Role();
                $role->name         = $name;
                $role->display_name = $display_name; // optional
                $role->description  = $description; // optional
                $role->save();

                Activity::log('Inserted role information for role ' . $name . ' display name ' . $display_name . ' description ' . $description . ' User '. $user);

            }

        }

        return redirect()->action(
            'UserManagerController@rolesForm'
        );
    }


    public function role_delete($id)
    {
        $user_data = Auth::user();

        $user = $user_data->id;
        try{
            $role_details = Role::findOrFail($id);
            if ($role_details) {
                $role=$role_details->name;
                $role_details->delete();
                Activity::log('Deleted role information for role ' . $role. ' User '. $user);
                return response()->json([
                    'deletable' => true,
                    'error' => null
                ]);

            }else{
                return response()->json([
                    'deletable' => false,
                    'error' => '404'
                ]);
            }
        }catch (\PDOException $e) {
            return response()->json([
                'deletable' => false,
                'error' => $e->getMessage()
            ]);
        }
    }
    //permissions
    public function permissionsForm (Request $request){
        $id = null;
        $permissions = DB::table('permissions AS pm')
            ->select('*')
            ->orderBy('pm.created_at', 'desc')
            ->get();

        return View::make('permissions', compact('id', 'permissions'));
    }

    public function permissions (Request $request){
        $this->validate($request, [
            'name' => 'required'
        ]);
        $id = null;

        $name = Input::get('name');
        $display_name = Input::get('display_name');
        $description = Input::get('description');

        $user_data = Auth::user();

        $user = $user_data->id;



        if (null !== Input::get('submit')) {
            $permission = Permission::where('name', $name)->first();
        
            if ($permission != null) {
                $permission->name=$name;
                $permission->display_name=$display_name;
                $permission->description=$description;
                $permission->save();

                Activity::log('Updated permission information for permission ' . $name . ' display name ' . $display_name . ' description ' . $description . ' User '. $user);

            } else {
                $Permission = new Permission();
                $permission->name=$name;
                $permission->display_name=$display_name;
                $permission->description=$description;
                $permission->save();

                Activity::log('Inserted permission information for permission ' . $name . ' display name ' . $display_name . ' description ' . $description . ' User '. $user);

            }

        }

        return redirect()->action(
            'UserManagerController@permissionsForm'
        );
    }


    public function permission_delete($id)
    {
        $user_data = Auth::user();

        $user = $user_data->id;
        try{
            $permission_details = Permission::findOrFail($id);
            if ($permission) {
                $permission=$permission_details->name;
                $permission_details->delete();
                Activity::log('Deleted permission information for permission ' . $role. ' User '. $user);
                return response()->json([
                    'deletable' => true,
                    'error' => null
                ]);

            }else{
                return response()->json([
                    'deletable' => false,
                    'error' => '404'
                ]);
            }
        }catch (\PDOException $e) {
            return response()->json([
                'deletable' => false,
                'error' => $e->getMessage()
            ]);
        }
    }
    //render role form
     public function rolesUserForm (Request $request){
        $id = null;
        $roleusers= DB::table('role_user AS ru')
            ->select('ru.id as id','usr.usr_name','rl.name', 'usr.id as usr_id')
            ->leftJoin('users_usr AS usr', 'ru.user_id', '=', 'usr.id')
            ->leftJoin('roles AS rl', 'rl.id', '=', 'ru.role_id')
            ->orderBy('ru.id', 'DESC')
            ->get();
        return View::make('roleuser', compact('id','roleusers'));
    }

    public function getDepartmentMenus($departmentID)
    {
        if ($departmentID != null) {

            $query= DB::table('groupmenu_gpm AS gpm')
                ->select('mn.mn_name','dprt.dprt_name','mn.mn_url')
                ->leftJoin('department_dprt AS dprt', 'gpm.dprt_id', '=', 'dprt.id')
                ->leftJoin('menu_mn AS mn', 'gpm.mn_id', '=', 'mn.id')
                ->where('dprt_id', $departmentID)
                ->orderBy('mn.mn_order', 'asc');

        } else {
            $menus = null;
        }

        return Datatables::of($query)->make(true);
    }
    public function getRolesList()
    {
        $roles = Role::select('*');


        return Datatables::of($roles)
            ->make(true);
    }
    public function assignRole($ID, $roleID)
    {
        $user_data = Auth::user();
        $user = $user_data->id;
        try{
            $role_details = Role::where('id', (int)$roleID)->count();
            if ($role_details>0) {
            $role_details = Role::where('id', (int)$roleID)->first();
            $user = User::where('id', '=', (int)$ID)->first();
            $detach=$user->detachRoles($user->roles);
            $user->attachRole($roleID);
            
                return response()->json([
                    'exists' => true,
                    'updated' => true,
                    'error' => null
                ]);

            }else{
                return response()->json([
                    'exists' => false,
                    'updated' => false,
                    'error' => 'user not found'
                ]);
            }
        }catch (\PDOException $e) {
            return response()->json([
                'exists' => false,
                'updated' => false,
                'error' => $e->getMessage()
            ]);
        }
    }
    public function revokeMenu($departmentID, $menuID)
    {
        $user_data = Auth::user();
        $user = $user_data->id;
        try {
            $groupmenu_details = DB::table('groupmenu_gpm')
                ->where('mn_id', $menuID)
                ->where('dprt_id', $departmentID)
                ->first();
            if ($groupmenu_details) {
                $grpmenuid=$groupmenu_details->id;
                $menu = $groupmenu_details->mn_id;
                $department = $groupmenu_details->dprt_id;

                $grpmenu_details =group_menu::findOrFail($grpmenuid);
                if ($grpmenu_details) {
                    $grpmenu_details->delete();
                    Activity::log('Deleted group menu information for menu ' . $menu. ' Department ' . $department. ' User '. $user);
                    return response()->json([
                        'deleted' => true,
                        'error' => null
                    ]);

                }

            } else {
                return response()->json([
                    'deleted' => false,
                    'error' => 404
                ]);
            }
        } catch (\PDOException $e) {
            return response()->json([
                'deleted' => false,
                'error' => $e->getMessage()
            ]);
        }
    }
     //roles 
     public function rolesPermissionForm (Request $request){
         
        $id = null;
        $roles= DB::table('roles AS rl')
            ->select('*')
            ->orderBy('rl.created_at', 'desc')
            ->get();

        return View::make('rolepermission', compact('id', 'roles'));
    }
    public function getPermissionsList()
    {
        $perms = Permission::select('*');


        return Datatables::of($perms)
            ->make(true);
    }
    public function assignPermission($ID, $permID)
    {
        $user_data = Auth::user();
        $user = $user_data->id;
        try{
            $perm_details = Permission::where('id', (int)$permID)->count();
            if ($perm_details>0) {
            $perm_details = Permission::where('id', (int)$permID)->first();
            $role = Role::where('id', '=', (int)$ID)->first();
            //$detach=$user->detachRoles($user->roles);
            $role->attachPermission($permID);
            
                return response()->json([
                    'exists' => true,
                    'updated' => true,
                    'error' => null
                ]);

            }else{
                return response()->json([
                    'exists' => false,
                    'updated' => false,
                    'error' => 'user not found'
                ]);
            }
        }catch (\PDOException $e) {
            return response()->json([
                'exists' => true,
                'updated' => false,
                'error' => $e->getMessage()
            ]);
        }
    }
    public function revokePermission($ID, $permID)
    {
        $user_data = Auth::user();
        $user = $user_data->id;
        try {
            $role = Role::where('id', '=', (int)$ID)->first();
            $perm_details = Permission::where('id', (int)$permID)->first();
            $permname= $perm_details->name;
            if($role->hasPermission($permname)){
            $role->detachPermission($permID);
                    
         Activity::log('Detached permission information for permission '.$permID.' from role ' . $role. ' User '. $user);
                    return response()->json([
                        'deleted' => true,
                        'error' => null
                    ]);

                

            } else {
                return response()->json([
                    'deleted' => false,
                    'error' => 404
                ]);
            }
        } catch (\PDOException $e) {
            return response()->json([
                'deleted' => false,
                'error' => $e->getMessage()
            ]);
        }
    }
}