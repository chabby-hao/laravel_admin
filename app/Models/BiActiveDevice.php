<?php

namespace App\Models;

/**
 * App\Models\BiActiveDevice
 *
 * @property int $id
 * @property string|null $date
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiActiveDevice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiActiveDevice whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiActiveDevice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiActiveDevice whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $total
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiActiveDevice whereTotal($value)
 */
class BiActiveDevice extends \App\Models\Base\BiActiveDevice
{
	protected $fillable = [
		'date',
		'udid',
        'total',
	];
}
