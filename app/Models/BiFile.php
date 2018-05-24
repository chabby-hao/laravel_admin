<?php

namespace App\Models;
use App\Logics\CommandLogic;

/**
 * App\Models\BiFile
 *
 * @property int $id
 * @property string $filename
 * @property string $fileurl
 * @property int $filetype 0=普通文件,1=固件声音更新文件
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiFile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiFile whereFilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiFile whereFiletype($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiFile whereFileurl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiFile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiFile whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BiFile extends \App\Models\Base\BiFile
{

    const FILE_TYPE_NORMAL = 0;//普通文件
    const FILE_TYPE_ROM_VOICE = 1;//固件声音文件

	protected $fillable = [
		'filename',
		'fileurl',
		'filetype'
	];

	protected $guarded = [];

	public static function getFileTypeMap($type = null)
    {
        $map = [
            self::FILE_TYPE_NORMAL => '普通文件',
            self::FILE_TYPE_ROM_VOICE => '声音升级文件',
        ];
        return $type === null ? $map : $map[$type];
    }

    public static function cmdToFileType($cmd)
    {
        $map = [
            CommandLogic::CMD_VOICE_UPDATE_LOCK => self::FILE_TYPE_ROM_VOICE,
            CommandLogic::CMD_VOICE_UPDATE_UNLOCK => self::FILE_TYPE_ROM_VOICE,
            CommandLogic::CMD_VOICE_UPDATE_WARNING => self::FILE_TYPE_ROM_VOICE,
        ];
        return $map[$cmd];
    }

}
