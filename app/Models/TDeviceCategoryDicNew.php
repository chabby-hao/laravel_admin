<?php

namespace App\Models;

/**
 * App\Models\TDeviceCategoryDicNew
 *
 * @property int $record_id
 * @property int $products
 * @property string $model 产品型号
 * @property int $channel
 * @property int $type 跟品牌一样，为了兼容老的数据才需要这个。这个字段比较恶心，但老数据都用了这个字段。
 * @property int $brand
 * @property int $ev_model
 * @property int $level
 * @property string $name
 * @property string $remark
 * @property int $rank
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCategoryDicNew whereBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCategoryDicNew whereChannel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCategoryDicNew whereEvModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCategoryDicNew whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCategoryDicNew whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCategoryDicNew whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCategoryDicNew whereProducts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCategoryDicNew whereRank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCategoryDicNew whereRecordId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCategoryDicNew whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceCategoryDicNew whereType($value)
 * @mixin \Eloquent
 */
class TDeviceCategoryDicNew extends \App\Models\Base\TDeviceCategoryDicNew
{
	protected $fillable = [
		'products',
		'model',
		'channel',
		'type',
		'brand',
		'ev_model',
		'level',
		'name',
		'remark',
		'rank'
	];

	public function updatess($Channelname,$channel_names,$channel_remark){
        $Chann=$this->where('name',$Channelname)->where('level',3)->first();
        //dd($Chann);
        $Chann->name=$channel_names;
        $Chann->remark=$channel_remark;
        return $Chann->save();
    }
}
