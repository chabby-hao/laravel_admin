<?php

namespace App\Models;

/**
 * App\Models\TAdCover
 *
 * @property int $sid
 * @property string|null $link
 * @property int $duration
 * @property int $show
 * @property int $status
 * @property \Carbon\Carbon|null $update_tm
 * @property string $image_s
 * @property string|null $image_m
 * @property string|null $image_l
 * @property string|null $image_t
 * @property int $type
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TAdCover whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TAdCover whereImageL($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TAdCover whereImageM($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TAdCover whereImageS($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TAdCover whereImageT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TAdCover whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TAdCover whereShow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TAdCover whereSid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TAdCover whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TAdCover whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TAdCover whereUpdateTm($value)
 * @mixin \Eloquent
 */
class TAdCover extends \App\Models\Base\TAdCover
{
	protected $fillable = [
		'link',
		'duration',
		'show',
		'status',
		'update_tm',
		'image_s',
		'image_m',
		'image_l',
		'image_t',
		'type'
	];
}
