<?php

namespace App\Logics;


//工厂逻辑

use App\Models\BiUser;

class FactoryLogic extends BaseLogic
{

    //工厂角色名称
    private static $roleName = 'factory';

    public static function getAccountList()
    {
        $users = BiUser::all();
        $data = [];
        foreach ($users as $user){
            if($user->hasRole(self::$roleName)){
                $data[$user->id] = $user->nickname ? : $user->username;
            }
        }
        return $data;
    }

}