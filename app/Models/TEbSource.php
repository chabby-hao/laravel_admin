<?php

namespace App\Models;

/**
 * App\Models\TEbSource
 *
 * @property int $model_tag
 * @property string|null $img2x_main
 * @property string|null $img3x_main
 * @property string|null $img2x_logo
 * @property string|null $img3x_logo
 * @property string|null $new_main
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEbSource whereImg2xLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEbSource whereImg2xMain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEbSource whereImg3xLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEbSource whereImg3xMain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEbSource whereModelTag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TEbSource whereNewMain($value)
 * @mixin \Eloquent
 */
class TEbSource extends \App\Models\Base\TEbSource
{
	protected $fillable = [
		'img2x_main',
		'img3x_main',
		'img2x_logo',
		'img3x_logo',
		'new_main'
	];
}
