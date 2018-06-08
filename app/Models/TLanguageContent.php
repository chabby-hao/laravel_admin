<?php

namespace App\Models;

/**
 * App\Models\TLanguageContent
 *
 * @property string $lang_tag
 * @property string $content_key
 * @property string $content
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TLanguageContent whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TLanguageContent whereContentKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TLanguageContent whereLangTag($value)
 * @mixin \Eloquent
 */
class TLanguageContent extends \App\Models\Base\TLanguageContent
{
	protected $fillable = [
		'content'
	];
}
