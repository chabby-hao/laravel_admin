<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:24 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TOauthToken
 *
 * @property int $platform
 * @property string $token
 * @property int $expire
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TOauthToken whereExpire($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TOauthToken wherePlatform($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TOauthToken whereToken($value)
 * @mixin \Eloquent
 */
class TOauthToken extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_oauth_token';
	protected $primaryKey = 'platform';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'platform' => 'int',
		'expire' => 'int'
	];
}
