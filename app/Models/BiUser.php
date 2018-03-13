<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User;
use Zizaco\Entrust\Traits\EntrustUserTrait;

/**
 * App\Models\BiUser
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property int $type 0=内部，1=渠道，2=工厂
 * @property int $channel 渠道id
 * @property int $factory_id 工厂id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiUser whereChannel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiUser whereFactoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiUser wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiUser whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiUser whereUsername($value)
 * @mixin \Eloquent
 * @property int|null $last_ip
 * @property string|null $last_record
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Role[] $roles
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiUser whereLastIp($value)
 * @property int|null $type_id 渠道ID or 品牌id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiUser whereTypeId($value)
 * @property string|null $email
 * @property string|null $remember_token
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiUser whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiUser whereRememberToken($value)
 * @property bool $user_type 0=全部，1=渠道商，2=品牌商
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiUser whereUserType($value)
 * @property string|null $login_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiUser whereLoginAt($value)
 */
class BiUser extends User
{

    use EntrustUserTrait;

    //可查看数据类型
    const USER_TYPE_ALL = 0;//全部
    const USER_TYPE_CHANNEL = 1;//渠道商
    const USER_TYPE_BRAND = 2;//品牌商

    protected $guarded = [];

    public static function getUserTypeMap($userType = null)
    {
        $map = [
            self::USER_TYPE_ALL=>'全部',
            self::USER_TYPE_CHANNEL=>'渠道商',
            self::USER_TYPE_BRAND=>'品牌商',
        ];
        return $userType !==null ? $map[$userType] : $map;
    }

    public static function getUserWithRole($id)
    {
        return BiUser::join('role_user','id','=','user_id')->find($id);
    }

}
