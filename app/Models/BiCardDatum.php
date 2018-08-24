<?php

namespace App\Models;

/**
 * App\Models\BiCardDatum
 *
 * @property int $id
 * @property string|null $msisdn
 * @property string|null $imsi
 * @property \Carbon\Carbon|null $date
 * @property float $data_usage
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiCardDatum whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiCardDatum whereDataUsage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiCardDatum whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiCardDatum whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiCardDatum whereImsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiCardDatum whereMsisdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiCardDatum whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BiCardDatum extends \App\Models\Base\BiCardDatum
{
	protected $fillable = [
		'msisdn',
		'imsi',
		'date',
		'data_usage'
	];
}
