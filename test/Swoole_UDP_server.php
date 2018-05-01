<?php

$server = new swoole_server("127.0.0.1", 9001, SWOOLE_PROCESS, SWOOLE_UDP);

$server -> set([
    "max_request" => 2000,
]);

/**
 * swoole_server $server | swoole 对象
 * $fd 指客户端标识
 * $rearch_id | 当前的进程ID
 */
$server -> on("connect", function (swoole_server $server, $fd, $rearch_id){
    echo "Cilent {$rearch_id} - {$fd} connecting ".PHP_EOL;
});

$server -> on("receive", function (swoole_server $server, $fd, $rearch_id, $data){
    echo "Cilent {$rearch_id} - {$fd} send：{$data}".PHP_EOL;

    $server -> send($fd,"Hi".PHP_EOL);
});

$server -> on("close", function (swoole_server $server, $fd){
    echo "Cilent {$fd} close".PHP_EOL;
});

$server -> start();









