<?php

namespace App\Logics;


use App\Models\BiUser;
use App\Models\Permission;
use App\Models\Role;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Phalcon\Http\Request;

class LockLogic extends BaseLogic
{

    public static function lock($udid, $lock, $username = null)
    {
        $time = time();
        $key = 'bi0921777';

        $sign = md5($lock . $time . $udid . $key);

        $url = 'http://api.vipcare.com/helper/lock';
        $client = new Client();
        $r = $client->post($url, [
            'form_params'=>[
                'sign'=>$sign,
                'udid'=>$udid,
                'name'=>$username,
                'timestamp'=>$time,
                'lock'=>$lock,
            ]
        ]);
        $body = $r->getBody()->getContents();
        if($res = json_decode($body, true)){
            if($res['code'] === 200){
                return true;
            }
        }
        Log::error('lock error ' . $body);
        return false;

    }

}