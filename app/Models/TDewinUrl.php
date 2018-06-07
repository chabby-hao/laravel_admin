<?php

namespace App\Models;

/**
 * App\Models\TDewinUrl
 *
 * @property int $id
 * @property string $udid
 * @property string $url
 * @property int $addtime 添加或者更新时间
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDewinUrl whereAddtime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDewinUrl whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDewinUrl whereUdid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TDewinUrl whereUrl($value)
 * @mixin \Eloquent
 */
class TDewinUrl extends \App\Models\Base\TDewinUrl
{
	protected $fillable = [
		'udid',
		'url',
		'addtime'
	];
}
