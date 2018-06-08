<?php

namespace App\Models;

/**
 * App\Models\TVersion
 *
 * @property int $ver
 * @property \Carbon\Carbon|null $update_tm
 * @property string|null $url
 * @property int $code
 * @property string|null $name
 * @property string|null $content
 * @property int $sys
 * @property int $force
 * @property int $channel
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TVersion whereChannel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TVersion whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TVersion whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TVersion whereForce($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TVersion whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TVersion whereSys($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TVersion whereUpdateTm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TVersion whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TVersion whereVer($value)
 * @mixin \Eloquent
 */
class TVersion extends \App\Models\Base\TVersion
{
	protected $fillable = [
		'update_tm',
		'url',
		'code',
		'name',
		'content',
		'sys',
		'force'
	];
}
