<?php

namespace App\Console\Commands;

use App\Models\ChargeTasks;
use App\Services\ChargeService;
use function foo\func;
use GuzzleHttp\Handler\CurlMultiHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\Foreach_;

use GuzzleHttp\Client;
use GuzzleHttp\Pool;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\ClientException;

class Test extends Command
{
    private $totalPageCount;
    private $counter = 1;
    private $concurrency = 7;  // 同时并发抓取

    private $users = ['CycloneAxe', 'appleboy', 'Aufree', 'lifesign',
        'overtrue', 'zhengjinghua', 'NauxLiu'];

    protected $signature = 'test';
    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $client = new Client();
        $requests = function ($total) {
            $uri = 'http://www.baidu.com';
            for ($i = 0; $i < $total; $i++) {
                yield new Request('GET', $uri);
            }
        };

        $pool = new Pool($client, $requests(100), [
            'concurrency' => 2,
            'fulfilled' => function ($response, $index) {
                echo $index . "\n";
                // this is delivered each successful response
            },
            'rejected' => function ($reason, $index) {
                echo $index . '\n...'. "\n";
                // this is delivered each failed request
            },
        ]);

// Initiate the transfers and create a promise
        $promise = $pool->promise();

// Force the pool of requests to complete.
        $promise->wait();


    }
}