<?php

namespace App\Models;

/**
 * App\Models\BiCardLiangxun
 *
 * @property int $id
 * @property string|null $msisdn
 * @property string|null $iccid
 * @property string|null $imsi
 * @property string|null $carrier 运营商
 * @property \Carbon\Carbon|null $expiry_date 计费结束日期
 * @property float $data_plan 套餐大小
 * @property float $data_usage 当月流量
 * @property float $current_date_usage 当日流量
 * @property string|null $account_status 卡状态： 00 - 正使用, 10 - 测试期, 02 - 停机 03 - 预销号, 04 - 销号, 11 - 沉默期 12 - 停机保号, 99 - 未知
 * @property int $active 激活/未激活,1=激活，0=未激活
 * @property \Carbon\Carbon|null $test_valid_date 测试期起始日期
 * @property \Carbon\Carbon|null $silent_valid_date 沉默期起始日期
 * @property float $test_used_data_usage 测试期已用流量
 * @property \Carbon\Carbon|null $active_date 激活日期
 * @property float $data_balance 剩余流量
 * @property \Carbon\Carbon|null $outbound_date 出库日期
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiCardLiangxun whereAccountStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiCardLiangxun whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiCardLiangxun whereActiveDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiCardLiangxun whereCarrier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiCardLiangxun whereCurrentDateUsage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiCardLiangxun whereDataBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiCardLiangxun whereDataPlan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiCardLiangxun whereDataUsage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiCardLiangxun whereExpiryDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiCardLiangxun whereIccid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiCardLiangxun whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiCardLiangxun whereImsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiCardLiangxun whereMsisdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiCardLiangxun whereOutboundDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiCardLiangxun whereSilentValidDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiCardLiangxun whereTestUsedDataUsage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiCardLiangxun whereTestValidDate($value)
 * @mixin \Eloquent
 */
class BiCardLiangxun extends \App\Models\Base\BiCardLiangxun
{

    //00 - 正使用, 10 - 测试期, 02 - 停机 03 - 预销号, 04 - 销号, 11 - 沉默期 12 - 停机保号, 99 - 未知
    public static function getAccountStatusMap($type = null)
    {
        $map = [
            '00' => '正使用',
            '10' => '测试期',
            '02' => '停机',
            '03' => '预销号',
            '04' => '销号',
            '11' => '沉默期',
            '12' => '停机保号',
            '99' => '未知',
        ];
        return $type === null ? $map : $map[$type];
    }

	protected $fillable = [
		'msisdn',
		'iccid',
		'imsi',
		'carrier',
		'expiry_date',
		'data_plan',
		'data_usage',
		'current_date_usage',
		'account_status',
		'active',
		'test_valid_date',
		'silent_valid_date',
		'test_used_data_usage',
		'active_date',
		'data_balance',
		'outbound_date'
	];
}
