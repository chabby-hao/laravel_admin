<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:24 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TLanguageContent
 * 
 * @property string $lang_tag
 * @property string $content_key
 * @property string $content
 *
 * @package App\Models\Base
 */
class TLanguageContent extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_language_content';
	public $incrementing = false;
	public $timestamps = false;
}
