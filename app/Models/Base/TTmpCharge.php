<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Jun 2018 17:54:24 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TTmpCharge
 *
 * @property int $id
 * @property string $BMSID
 * @property string $IMEID
 * @property string $IMSID
 * @property string $total
 * @property string $type
 * @property string $longitude
 * @property string $latitude
 * @property string $start_rank
 * @property string $end_rank
 * @property string $start_time
 * @property string $time_segment
 * @property string $code
 * @property string $volume
 * @property string $direct
 * @property string $sign
 * @property string $method
 * @property \Carbon\Carbon $add_time
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TTmpCharge whereAddTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TTmpCharge whereBMSID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TTmpCharge whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TTmpCharge whereDirect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TTmpCharge whereEndRank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TTmpCharge whereIMEID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TTmpCharge whereIMSID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TTmpCharge whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TTmpCharge whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TTmpCharge whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TTmpCharge whereMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TTmpCharge whereSign($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TTmpCharge whereStartRank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TTmpCharge whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TTmpCharge whereTimeSegment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TTmpCharge whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TTmpCharge whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TTmpCharge whereVolume($value)
 * @mixin \Eloquent
 */
class TTmpCharge extends Eloquent
{
	protected $connection = 'care';
	protected $table = 't_tmp_charge';
	public $timestamps = false;

	protected $dates = [
		'add_time'
	];
}
