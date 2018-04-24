<?php

namespace App\Models;

/**
 * App\Models\TVersionUpdateInfo
 *
 * @property int $id
 * @property string $model 型号
 * @property string $big_version 大版本号
 * @property string $svn_version snv版本号
 * @property \Carbon\Carbon|null $last_modify_date 最后修改日期
 * @property string $file_name 版本对应的文件名
 * @property string|null $release_note 版本说明
 * @property int $is_open_update 是否开放用户升级 1开放 0不开放
 * @property bool $hardware_type 硬件类型 1固件rom 2单片机cum
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TVersionUpdateInfo whereBigVersion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TVersionUpdateInfo whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TVersionUpdateInfo whereHardwareType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TVersionUpdateInfo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TVersionUpdateInfo whereIsOpenUpdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TVersionUpdateInfo whereLastModifyDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TVersionUpdateInfo whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TVersionUpdateInfo whereReleaseNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TVersionUpdateInfo whereSvnVersion($value)
 * @mixin \Eloquent
 */
class TVersionUpdateInfo extends \App\Models\Base\TVersionUpdateInfo
{
	protected $fillable = [
		'model',
		'big_version',
		'svn_version',
		'last_modify_date',
		'file_name',
		'release_note',
		'is_open_update',
		'hardware_type'
	];
}
