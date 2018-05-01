<?php

$ser = new swoole_http_server("0.0.0.0", 8880);

$ser -> on("request", function ($request, $response){

    $server = new Swoole\Coroutine\Redis();

    $server -> connect("127.0.0.1",6379);

    $server -> set("a", $request -> get["a"]);

    $response->header("Content-Type", "text/plain");

    $response -> write("<h1>{$server -> get("a")}</h1>");

});

$ser -> start();













