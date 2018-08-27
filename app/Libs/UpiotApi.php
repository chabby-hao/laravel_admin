<?php

namespace App\Libs;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\RequestOptions;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Psr\Http\Message\ResponseInterface;

class UpiotApi
{

    public static $promises = [];

    private $username = 'vipcare';
    private $password = '123123';

    private function getToken()
    {

        $key = 'upiot:token';
        if ($token = Cache::store('redis')->get($key)) {
            return $token;
        }
        $uri = '/api/access_token/';
        $client = $this->getClient(false);
        $r = $client->post($uri, [
            RequestOptions::FORM_PARAMS => [
                'username' => $this->username,
                'password' => $this->password,
            ]
        ]);
        //{"token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VybmFtZSI6InZpcGNhcmUiLCJleHAiOjE1MzUwMjUzOTF9.-iR0xWiaDNfCTXLcrGvlBlfv5J2UdI_WumC-VDo1J2c", "code": 200}
        $body = $r->getBody()->getContents();
        $arr = json_decode($body, true);
        if ($arr && $arr['code'] === 200) {
            //success
            $token = $arr['token'];
            Cache::store('redis')->put($key, $token, 100);
            return $token;
        } else {
            Log::error('upiot get token error ' . $body);
            return false;
        }
    }

    public function getCardListAsync(callable $func)
    {
        $uri = "/api/card/$imsi/";
        $client = $this->getClient();
        $promise = $client->getAsync($uri);
        $promise->then(
            function (ResponseInterface $res) use ($func, $uri) {
                $arr = json_decode($res->getBody()->getContents(), true);
                if ($arr && $arr['code'] === 200) {
                    $func($arr);
                } else {
                    Log::error("upiot get cardInfo error $uri " . $res->getBody());
                }
            },
            function(RequestException $e){
                echo $e->getMessage() . "\n";
                echo $e->getRequest()->getMethod() . "\n";
            }
        );

        self::$promises[] = $promise;
        $promise->wait();
        return $promise;
    }

    /**
     * @param $imsi 4开头 4600xxxxxxx0515
     * {
     * "code": 200,
     * "msisdn": "10648xxxx1234",
     * "iccid": "8986xxxx1234",
     * "imsi": "4600xxxxxxx0515",
     * "carrier": 运营商,
     * "sp_code": 短信端口号,
     * "expiry_date": 计费结束日期,
     * "data_plan": 套餐大小,
     * "data_usage": 当月流量,
     * "account_status": 卡状态,
     * "active": 激活/未激活,
     * "test_valid_date":  测试期起始日期,
     * "silent_valid_date": 沉默期起始日期,
     * "test_used_data_usage": 测试期已用流量,
     * "active_date": 激活日期,
     * "data_balance": 剩余流量,
     * "outbound_date": 出库日期,
     * "support_sms": 是否支持短信
     * }
     * @return bool|mixed
     */
    public function getCardInfoAsync($imsi, callable $func)
    {
        $uri = "/api/card/$imsi/";
        $client = $this->getClient();
        $promise = $client->getAsync($uri);
        $promise->then(
            function (ResponseInterface $res) use ($func, $uri) {
                $body = $res->getBody()->getContents()
                $arr = json_decode($body, true);
                if ($arr && $arr['code'] === 200) {
                    $func($arr);
                } else {
                    echo
                    Log::error("upiot get cardInfo error $uri " . $res->getBody());
                }
            },
            function(RequestException $e){
                echo $e->getMessage() . "\n";
                echo $e->getRequest()->getMethod() . "\n";
            }
        );

        self::$promises[] = $promise;

        $promise->wait();
        sleep(5);
        exit;
        return $promise;
    }


    /**
     * @param $msisdns 卡号 【'10648xxxxxxxx','10648xxxxxxxx']
     * @param $date
     * {
     * "code": 状态码,
     * "data":
     * [{
     * "msisdn": "卡号1",
     * "data_usage": 查询日期用量(M)
     * }, {
     * "msisdn": "卡号2",
     * "data_usage": 查询日期用量(M)
     * }],
     * "query_date": "2017****",
     * "failed": ["失败卡号1", "失败卡号2", ...]
     * }
     *
     * @return bool|mixed
     */
    public function getDataUsageAsync($msisdns, $date, callable $func)
    {
        $uri = "/api/card/usagelog/";
        $client = $this->getClient();
        $promise = $client->postAsync($uri, [
            RequestOptions::JSON => [
                'msisdns' => $msisdns,
                'query_date' => $date,
            ]
        ]);

        $promise->then(
            function (ResponseInterface $res) use ($func) {
                $arr = json_decode($res->getBody()->getContents(), true);
                if ($arr && $arr['code'] === 200) {
                    $func($arr);
                } else {
                    Log::error('upiot get cardInfo error ' . $res->getBody());
                }
            }
        );

        self::$promises[] = $promise;
        $promise->wait();

        return $promise;
    }

    private function getClient($withToken = true)
    {
        $options = [
            'base_uri' => 'http://ec.upiot.net',
            RequestOptions::TIMEOUT => 10,
        ];
        if ($withToken) {
            $options[RequestOptions::HEADERS] = ['Authorization' => "JWT {$this->getToken()}"];
        }
        $client = new Client($options);
        return $client;
    }

}