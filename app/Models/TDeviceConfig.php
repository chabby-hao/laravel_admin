<?php

namespace App\Models;

/**
 * App\Models\TDeviceConfig
 *
 * @property int $type_id
 * @property string|null $name
 * @property string|null $imgX2
 * @property string|null $imgX3
 * @property string|null $imgX2_list
 * @property string|null $imgX3_list
 * @property string|null $imgX2_bind
 * @property string|null $imgX3_bind
 * @property string|null $imgX2_bindlogo1
 * @property string|null $imgX3_bindlogo1
 * @property string|null $imgX2_bindlogo2
 * @property string|null $imgX3_bindlogo2
 * @property string|null $models_ignored
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceConfig whereImgX2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceConfig whereImgX2Bind($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceConfig whereImgX2Bindlogo1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceConfig whereImgX2Bindlogo2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceConfig whereImgX2List($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceConfig whereImgX3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceConfig whereImgX3Bind($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceConfig whereImgX3Bindlogo1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceConfig whereImgX3Bindlogo2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceConfig whereImgX3List($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceConfig whereModelsIgnored($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceConfig whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDeviceConfig whereTypeId($value)
 * @mixin \Eloquent
 */
class TDeviceConfig extends \App\Models\Base\TDeviceConfig
{
	protected $fillable = [
		'name',
		'imgX2',
		'imgX3',
		'imgX2_list',
		'imgX3_list',
		'imgX2_bind',
		'imgX3_bind',
		'imgX2_bindlogo1',
		'imgX3_bindlogo1',
		'imgX2_bindlogo2',
		'imgX3_bindlogo2',
		'models_ignored'
	];
}
