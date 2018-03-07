<?php

namespace App\Logics;


use App\Models\BiUser;

class AuthLogic extends BaseLogic
{

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
