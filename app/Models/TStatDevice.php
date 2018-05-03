<?php

namespace App\Models;

/**
 * App\Models\TStatDevice
 *
 * @property int $date 统计日期
 * @property int $products 产品类型(电动车/童鞋/手杖等)
 * @property string|null $model 产品型号
 * @property int $channel 渠道
 * @property int $type 与品牌对应的分类
 * @property int $brand 产品品牌
 * @property int $level 筛选层级
 * @property bool $is_day_stat_complete 当天是否统计结束
 * @property int $total_production_device 截止到当日总的生产数量
 * @property int $total_delivered_device 截止到当日的总的出货数量
 * @property int $total_actived_device 截止到当日的激活设备
 * @property int $production_device_today 今天生产的设备
 * @property int $delivered_device_today 今天出货的设备
 * @property int $actived_device_today 今天激活的设备
 * @property int $activing_device 今天活跃的激活设备
 * @property int $user_login_today_have_mile 当日活跃有行程的设备
 * @property int $activing_noactived_device 今天活跃的未激活设备
 * @property int $activing_device_7days 7日活跃的设备
 * @property int $activing_device_3days 3日活跃的设备
 * @property int $duration_online_today 今日在线时长
 * @property int $request_count_today 今天请求次数
 * @property int $online_count_today 今日的在线设备数
 * @property int $online_today_all 今日在线所有设备数
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TStatDevice whereActivedDeviceToday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TStatDevice whereActivingDevice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TStatDevice whereActivingDevice3days($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TStatDevice whereActivingDevice7days($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TStatDevice whereActivingNoactivedDevice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TStatDevice whereBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TStatDevice whereChannel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TStatDevice whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TStatDevice whereDeliveredDeviceToday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TStatDevice whereDurationOnlineToday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TStatDevice whereIsDayStatComplete($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TStatDevice whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TStatDevice whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TStatDevice whereOnlineCountToday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TStatDevice whereOnlineTodayAll($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TStatDevice whereProductionDeviceToday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TStatDevice whereProducts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TStatDevice whereRequestCountToday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TStatDevice whereTotalActivedDevice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TStatDevice whereTotalDeliveredDevice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TStatDevice whereTotalProductionDevice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TStatDevice whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TStatDevice whereUserLoginTodayHaveMile($value)
 * @mixin \Eloquent
 */
class TStatDevice extends \App\Models\Base\TStatDevice
{
	protected $fillable = [
		'is_day_stat_complete',
		'total_production_device',
		'total_delivered_device',
		'total_actived_device',
		'production_device_today',
		'delivered_device_today',
		'actived_device_today',
		'activing_device',
		'user_login_today_have_mile',
		'activing_noactived_device',
		'activing_device_7days',
		'activing_device_3days',
		'duration_online_today',
		'request_count_today',
		'online_count_today',
		'online_today_all'
	];
}
