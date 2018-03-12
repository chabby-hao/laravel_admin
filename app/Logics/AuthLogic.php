<?php

namespace App\Logics;


use App\Models\BiUser;
use App\Permission;
use App\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Mockery\Exception;

class AuthLogic extends BaseLogic
{

    /**
     * 获取当前登录用户正在使用的权限动作名称
     * @return string
     */
    public static function getPermisName()
    {
        //route name 当成是权限 name
        return 'hello';
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
            Log::error('createUser db error' . $e->getMessage());
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

    public function createRole($data)
    {
        try{
            $role = new Role();
            $role->name = $data['name'];
            $role->display_name = $data['display_name'];
            $role->description = $data['description'];
            return $role->save();
        }catch (\Exception $e){
            Log::error('createRole db error:' . $e->getMessage());
            return false;
        }
    }

    public function createPermis($data)
    {
        try {
            $role = new Permission();
            $role->name = $data['name'];
            $role->display_name = $data['display_name'];
            $role->description = $data['description'];
            return $role->save();
        } catch (\Exception $e) {
            Log::error('createPermis db error:' . $e->getMessage());
            return false;
        }
    }

}
