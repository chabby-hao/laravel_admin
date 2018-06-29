<?php

namespace App\Models;

/**
 * App\Models\BiBreakRule
 *
 * @property int $id
 * @property string|null $lpn 车辆牌照
 * @property string|null $car_username 车主姓名
 * @property string|null $car_phone 车主手机号
 * @property string|null $car_factory 车辆厂家
 * @property int $violation_type 违章类型
 * @property \Carbon\Carbon|null $violation_time 违章时间
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiBreakRule whereCarFactory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiBreakRule whereCarPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiBreakRule whereCarUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiBreakRule whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiBreakRule whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiBreakRule whereLpn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiBreakRule whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiBreakRule whereViolationTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiBreakRule whereViolationType($value)
 * @mixin \Eloquent
 * @property string|null $violation_location 违章位置
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiBreakRule whereViolationLocation($value)
 */
class BiBreakRule extends \App\Models\Base\BiBreakRule
{

    const VIOLATION_TYPE_OVERSPEED = 1;//超速
    const VIOLATION_TYPE_NIXING = 2;//逆行
    const VIOLATION_TYPE_JXQY = 3;//禁行区域

    public static function getViolationTypeMap($type = null)
    {
        $map = [
            self::VIOLATION_TYPE_OVERSPEED => '超速',
            self::VIOLATION_TYPE_NIXING => '逆行',
            self::VIOLATION_TYPE_JXQY => '禁行区域',
        ];
        return $type === null ? $map : $map[$type];
    }

	protected $fillable = [
		'lpn',
		'car_username',
		'car_phone',
		'car_factory',
		'violation_type',
		'violation_time'
	];
}
