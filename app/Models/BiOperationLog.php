<?php

namespace App\Models;
use Illuminate\Support\Facades\Auth;

/**
 * App\Models\BiOperationLog
 *
 * @property int $id
 * @property int $type 操作类型
 * @property int $description 描述
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiOperationLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiOperationLog whereType($value)
 * @mixin \Eloquent
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiOperationLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiOperationLog whereUpdatedAt($value)
 * @property int $user_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiOperationLog whereUserId($value)
 */
class BiOperationLog extends \App\Models\Base\BiOperationLog
{

    const TYPE_TOOL_USER_DEVICE_DEL = 1000;//设备清空用户
    const TYPE_TOOL_USER_DEVICE_ADD = 1001;//设备添加用户
    const TYPE_TOOL_DEVICE_EXPIRE_MODIFY = 1002;//设备有效期修改
    const TYPE_TOOL_DEVICE_CMD_SEND = 1003;//命令调试

	protected $fillable = [
		'type',
		'description'
	];

	public static function addLog($type, $desc)
    {
        /** @var BiUser $user */
        $user = Auth::user();
        $model = new self();
        $model->user_id = $user->id;
        $model->username = $user->username;
        $model->type = $type;
        $model->description = $desc;
        return $model->save();
    }
}
