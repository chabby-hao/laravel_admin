<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 03 May 2018 15:35:38 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TVersionUpdateInfo
 *
 * @property int $id
 * @property string $model
 * @property string $big_version
 * @property string $svn_version
 * @property \Carbon\Carbon $last_modify_date
 * @property string $file_name
 * @property string $release_note
 * @property int $is_open_update
 * @property bool $hardware_type
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TVersionUpdateInfo whereBigVersion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TVersionUpdateInfo whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TVersionUpdateInfo whereHardwareType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TVersionUpdateInfo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TVersionUpdateInfo whereIsOpenUpdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TVersionUpdateInfo whereLastModifyDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TVersionUpdateInfo whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TVersionUpdateInfo whereReleaseNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base\TVersionUpdateInfo whereSvnVersion($value)
 * @mixin \Eloquent
 */
class TVersionUpdateInfo extends Eloquent
{
	protected $connection = 'care_operate';
	protected $table = 't_version_update_info';
	public $timestamps = false;

	protected $casts = [
		'is_open_update' => 'int',
		'hardware_type' => 'bool'
	];

	protected $dates = [
		'last_modify_date'
	];
}
