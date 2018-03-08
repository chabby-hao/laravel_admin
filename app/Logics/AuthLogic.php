<?php

namespace App\Logics;


use App\Models\BiUser;

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


    /**
     * @param $name
     * @param $pwd
     * @return bool
     */
    public function login($name, $pwd)
    {
        $user = BiUser::whereUsername($name)->first();
        if($user){
            $pwd2= $user->password;
            $pwd1 = $this->encrypt($pwd);
            if($pwd1 === $pwd2){
                session()->put('is_login', 1);
                session()->put($user->toArray());
                session()->put('user_id', $user->id);
                session()->save();
                return true;
            }
        }
        return false;

    }

    /**
     * @param $pwd
     * @return string
     */
    public function encrypt($pwd)
    {
        return md5($pwd);
    }

}
