<?php

// 创建swoole server
$server = new swoole_server("127.0.0.1", 9000);

/// 设置参数
$server -> set([
    "worker_num" => 8,
    "max_request" => 10000
]);

// 设置客户端连接时间
$server -> on("connect", function ($server, $fd, $reactor_id){
    echo "Client：{$reactor_id}-{$fd}-connect\n";
});

// 设置数据接受事件
$server -> on("receive", function ($server, $fd, $reeactor_id, $data){
    $server -> send($fd, "Server：{$reeactor_id} - {$fd}：\n" . $data);
});

// 监听连接关闭事件
$server -> on("close", function ($server, $fd){
    echo "Client：{$fd} close";
});

$server -> start();