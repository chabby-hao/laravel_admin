<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 24 Apr 2018 11:17:39 +0800.
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
 *
 * @package App\Models\Base
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
