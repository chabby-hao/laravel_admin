<?php

namespace App\Logics;


use App\Models\TEvMileageGp;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

class DewinLogic extends BaseLogic
{

    const SECRET = 'xMJxrmwhdUT3zD5f1JpTxjHE';

    public static function getUdidByDewinId($dewinId)
    {

        $url = 'http://weixin.e-dewin.com:81/api/getUdid';
        $data = ['bianhao' => $dewinId];

        $body = self::sendPost($url, $data);

        if ($body['code'] == '200') {
            $udid = $body['data']['udid'];
            return $udid;
        }

        return false;
    }

    public static function sendPost($url, $data)
    {
        $time = time();
        $params = array(
            'sign' => md5($time . self::SECRET),
            'timestamp' => $time,
        );
        $data = array_merge($data, $params);
        $client = new Client();
        $r = $client->post($url, [
            'json' => $data,
        ]);
        $body = json_decode($r->getBody(), true);
        return $body;
    }

}