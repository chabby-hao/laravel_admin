<?php

namespace App\Logics;

class RomLogic extends BaseLogic
{

    public static function getUpdateTypeMap()
    {
        $map = [
            CommandLogic::CMD_VOICE_UPDATE_LOCK => '锁车声音文件更新',
            CommandLogic::CMD_VOICE_UPDATE_UNLOCK => '解锁声音文件更新',
            CommandLogic::CMD_VOICE_UPDATE_WARNING => '告警声音文件更新',
        ];
        return $map;
    }


}