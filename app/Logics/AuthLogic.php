<?php

namespace App\Logics;


use App\Models\BiUser;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Phalcon\Http\Request;

class AuthLogic extends BaseLogic
{

    /**
     * 获取当前登录用户正在使用的权限动作名称
     * @return string
     */
    public static function getPermisName()
    {
        $uri = Route::getCurrentRoute()->uri();
        $permisName = trim(substr($uri, 5), '/');
        /** @var Permission $permis */
        $permis = Permission::whereName($permisName)->first();
        return $permis ? $permis->display_name : '';
    }


    public function createUser(array $data)
    {
        try {
            $user = new BiUser();
            $user->username = $data['username'];
            $user->password = bcrypt($data['password']);
            $user->user_type = $data['user_type'];
            $user->email = $data['email'];
            $user->type_id = $data['type_id'];
            $r = $user->save();
            if($r){
                $user->attachRole($data['role_id']);
                return true;
            }
            return false;
        }catch (\Exception $e){
            Log::error('create user db error' . $e->getMessage());
        }
    }

    public function editUser($id, array $data)
    {
        try {
            $user = BiUser::find($id);
            $user->username = $data['username'];
            //$user->password = bcrypt($data['password']);
            $user->user_type = $data['user_type'];
            $user->email = $data['email'];
            $user->type_id = $data['type_id'];
            $r = $user->save();
            if($r){
                $user->roles()->sync([$data['role_id']]);
                return true;
            }
            return false;
        }catch (\Exception $e){
            Log::error('edit user db error' . $e->getMessage());
        }
    }

    /**
     * @param $name
     * @param $pwd
     * @return bool
     */
    public function login($name, $pwd, $ip)
    {

        if(Auth::attempt(['username'=>$name,'password'=>$pwd])){
            /** @var BiUser $user */
            $user = Auth::user();
            $user->last_ip = $ip;
            $user->login_at = date('Y-m-d H:i:s');
            $user->save();
            return true;
        }else{
            session()->put('aabb',333);
            session()->save();
            return false;
        }
    }

    public function createRole(array $data)
    {
        try{
            $role = new Role();
            $role->name = $data['name'];
            $role->display_name = $data['display_name'];
            $role->description = $data['description'];
            return $role->save();
        }catch (\Exception $e){
            Log::error('create role db error:' . $e->getMessage());
            return false;
        }
    }

    public function editRole($id, array $data)
    {
        try{
            $role = Role::find($id);
            $role->name = $data['name'];
            $role->display_name = $data['display_name'];
            $role->description = $data['description'];
            return $role->save();
        }catch (\Exception $e){
            Log::error('edit role db error:' . $e->getMessage());
            return false;
        }
    }

    public function createPermis($data)
    {
        try {
            $permis = new Permission();
            $permis->name = $data['name'];
            $permis->display_name = $data['display_name'];
            $permis->description = $data['description'];
            return $permis->save();
        } catch (\Exception $e) {
            Log::error('create permis db error:' . $e->getMessage());
            return false;
        }
    }

    public function editPermis($id, $data)
    {
        try {
            $permis = Permission::find($id);
            $permis->name = $data['name'];
            $permis->display_name = $data['display_name'];
            $permis->description = $data['description'];
            return $permis->save();
        } catch (\Exception $e) {
            Log::error('edit permis db error:' . $e->getMessage());
            return false;
        }
    }

}