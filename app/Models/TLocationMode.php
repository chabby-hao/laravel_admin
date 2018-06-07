<?php

namespace App\Models;

/**
 * App\Models\TLocationMode
 *
 * @property int $id
 * @property int $interval
 * @property string|null $title
 * @property string|null $state
 * @property string|null $tip
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TLocationMode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TLocationMode whereInterval($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TLocationMode whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TLocationMode whereTip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TLocationMode whereTitle($value)
 * @mixin \Eloquent
 */
class TLocationMode extends \App\Models\Base\TLocationMode
{
	protected $fillable = [
		'interval',
		'title',
		'state',
		'tip'
	];
}
