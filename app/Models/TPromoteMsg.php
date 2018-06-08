<?php

namespace App\Models;

/**
 * App\Models\TPromoteMsg
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $desc
 * @property string|null $link
 * @property int $time
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TPromoteMsg whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TPromoteMsg whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TPromoteMsg whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TPromoteMsg whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TPromoteMsg whereTitle($value)
 * @mixin \Eloquent
 */
class TPromoteMsg extends \App\Models\Base\TPromoteMsg
{
	protected $fillable = [
		'title',
		'desc',
		'link',
		'time'
	];
}
