<?php

namespace App\Models;

/**
 * App\Models\MysqlTest
 *
 * @property int $id
 * @property string|null $udid
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MysqlTest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MysqlTest whereUdid($value)
 * @mixin \Eloquent
 */
class MysqlTest extends \App\Models\Base\MysqlTest
{
	protected $fillable = [
		'udid'
	];
}
