<?php

$server = new swoole_websocket_server("0.0.0.0", 9005);

$server -> on("open", function (swoole_websocket_server $server, $request){
    echo "server：{$request -> fd}" . PHP_EOL;
});

$server -> on("message", function (swoole_websocket_server $server, swoole_websocket_frame $frame){
    echo "{$frame -> fd} ---- {$frame -> data} ---- {$frame -> opcode} ---- {$frame -> finish}" . PHP_EOL;
    if ($server -> exist($frame -> fd))
    {
        $server -> push($frame->fd, "this is server" . rand(1000,9999));
    }
});

$server -> on("close", function (swoole_websocket_server $server, $fd){
    echo "Client {$fd} close" . PHP_EOL;
});

$server -> start();