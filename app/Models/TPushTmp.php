<?php

namespace App\Models;

/**
 * App\Models\TPushTmp
 *
 * @property int $uid
 * @property string|null $name
 * @property string $push_id
 * @property int $rom
 * @property string|null $phone
 * @property int $status
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TPushTmp whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TPushTmp wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TPushTmp wherePushId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TPushTmp whereRom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TPushTmp whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TPushTmp whereUid($value)
 * @mixin \Eloquent
 */
class TPushTmp extends \App\Models\Base\TPushTmp
{
	protected $fillable = [
		'name',
		'rom',
		'phone',
		'status'
	];
}
