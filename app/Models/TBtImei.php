<?php

namespace App\Models;

/**
 * App\Models\TBtImei
 *
 * @property string|null $bt_mac
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TBtImei whereBtMac($value)
 * @mixin \Eloquent
 */
class TBtImei extends \App\Models\Base\TBtImei
{
	protected $fillable = [
		'bt_mac'
	];
}
