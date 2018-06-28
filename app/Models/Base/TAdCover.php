<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:23 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TAdCover
 *
 * @property int $sid
 * @property string $link
 * @property int $duration
 * @property int $show
 * @property int $status
 * @property \Carbon\Carbon $update_tm
 * @property string $image_s
 * @property string $image_m
 * @property string $image_l
 * @property string $image_t
 * @property int $type
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TAdCover whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TAdCover whereImageL($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TAdCover whereImageM($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TAdCover whereImageS($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TAdCover whereImageT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TAdCover whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TAdCover whereShow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TAdCover whereSid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TAdCover whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TAdCover whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TAdCover whereUpdateTm($value)
 * @mixin \Eloquent
 */
class TAdCover extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_ad_cover';
	protected $primaryKey = 'sid';
	public $timestamps = false;

	protected $casts = [
		'duration' => 'int',
		'show' => 'int',
		'status' => 'int',
		'type' => 'int'
	];

	protected $dates = [
		'update_tm'
	];
}
