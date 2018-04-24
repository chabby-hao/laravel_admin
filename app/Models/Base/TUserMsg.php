<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Apr 2018 16:16:54 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TUserMsg
 *
 * @property int $id
 * @property string $source
 * @property int $reciever
 * @property int $type
 * @property string $desc
 * @property int $state
 * @property int $time
 * @property string $title
 * @property string $extra
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TUserMsg whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TUserMsg whereExtra($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TUserMsg whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TUserMsg whereReciever($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TUserMsg whereSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TUserMsg whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TUserMsg whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TUserMsg whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TUserMsg whereType($value)
 * @mixin \Eloquent
 */
class TUserMsg extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_user_msg';
	public $timestamps = false;

	protected $casts = [
		'reciever' => 'int',
		'type' => 'int',
		'state' => 'int',
		'time' => 'int'
	];
}
