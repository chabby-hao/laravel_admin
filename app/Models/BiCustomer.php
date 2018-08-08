<?php

namespace App\Models;
use App\Libs\Helper;

/**
 * App\Models\BiCustomer
 *
 * @property int $id 兼容原dic_new 下面的type
 * @property int $channel_id
 * @property string|null $customer_name 品牌名
 * @property string|null $customer_remark
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiCustomer whereChannelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiCustomer whereCustomerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiCustomer whereCustomerRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiCustomer whereId($value)
 * @mixin \Eloquent
 */
class BiCustomer extends \App\Models\Base\BiCustomer
{
	protected $fillable = [
        'id',
		'channel_id',
		'customer_name',
		'customer_remark'
	];

	public static function getCustomerMap()
    {
        $rs = self::all()->toArray();
        $map = Helper::transToKeyValueArray($rs, 'id', 'customer_name');
        return $map;
    }

    public static function getAllIds()
    {
        $rs = self::get()->toArray();
        return Helper::transToOneDimensionalArray($rs, 'id');
    }
}
