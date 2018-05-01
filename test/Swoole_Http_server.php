<?php

$http = new swoole_http_server("0.0.0.0", 9004);

$http -> set([
    "enable_static_handler" => true,
    "document_root" => "/www/wwwroot/swoole.cyqit.com/test/static"
]);

/**
 * HTTP 相应
 */
$http -> on("request", function ($request, $response){
    $response -> cookie("asd", "123456789", time()+3600);
    $response -> end("<h1>Hello World</h1>");
});

$http -> start();
