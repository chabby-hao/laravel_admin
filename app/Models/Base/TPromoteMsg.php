<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:24 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TPromoteMsg
 *
 * @property int $id
 * @property string $title
 * @property string $desc
 * @property string $link
 * @property int $time
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TPromoteMsg whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TPromoteMsg whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TPromoteMsg whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TPromoteMsg whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TPromoteMsg whereTitle($value)
 * @mixin \Eloquent
 */
class TPromoteMsg extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_promote_msg';
	public $timestamps = false;

	protected $casts = [
		'time' => 'int'
	];
}
