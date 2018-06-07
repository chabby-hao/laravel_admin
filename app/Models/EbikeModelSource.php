<?php

namespace App\Models;

/**
 * App\Models\EbikeModelSource
 *
 * @property int $model_tag
 * @property string|null $img2x_main
 * @property string|null $img2x_inspect
 * @property string|null $img3x_main
 * @property string|null $img3x_inspect
 * @property string|null $img2x_lock
 * @property string|null $img3x_lock
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EbikeModelSource whereImg2xInspect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EbikeModelSource whereImg2xLock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EbikeModelSource whereImg2xMain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EbikeModelSource whereImg3xInspect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EbikeModelSource whereImg3xLock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EbikeModelSource whereImg3xMain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EbikeModelSource whereModelTag($value)
 * @mixin \Eloquent
 */
class EbikeModelSource extends \App\Models\Base\EbikeModelSource
{
	protected $fillable = [
		'img2x_main',
		'img2x_inspect',
		'img3x_main',
		'img3x_inspect',
		'img2x_lock',
		'img3x_lock'
	];
}
