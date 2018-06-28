<?php

namespace App\Logics;


use App\Libs\Helper;
use App\Models\TEbUserOption;
use App\Models\TUser;
use App\Models\TUserDevice;

class UserLogic extends BaseLogic
{

    /**
     * 根据管理员手机号获取udid列表
     */
    public static function getUdidListByAdminPhone($phone)
    {
        $uid = UserLogic::getUidByPhone($phone);
        if(!$uid){
            return [];
        }

        $model = TUserDevice::whereUid($uid)->whereOwner(0)->get()->toArray();
        $udids = Helper::transToOneDimensionalArray($model, 'udid');
        return $udids;
    }

    public static function getUidByPhone($phone)
    {
        $model = TUser::wherePhone($phone)->first();
        return $model ? intval($model->uid) : false;
    }

    public static function getUserConfigByUid($uid)
    {
        $model = TEbUserOption::find($uid);
        if($model){
            $model->sexTrans = TEbUserOption::getSexNameMap($model->sex);
        }
        return $model ? : null;
    }

    public static function getUserConfigByPhone($phone)
    {
        $uid = self::getUidByPhone($phone);
        if(!$uid){
            return null;
        }
        return self::getUserConfigByUid($uid);
    }

}