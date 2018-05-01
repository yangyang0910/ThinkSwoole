<?php

$http = new swoole_http_server("0.0.0.0", 9005);

$http -> set([
    "enable_static_handler" => true,
    "document_root" => "/www/wwwroot/swoole.cyqit.com/public/static/"
]);

/**
 * HTTP 相应
 */

$http -> on("WorkerStart", function (swoole_server $server, $work_id){
    try{
        // 加载基础文件
        require_once __DIR__ . '/../thinkphp/base.php';
    }catch (Exception $exception)
    {
        echo $exception -> getMessage();
    }
});

$http -> on("request", function ($request, $response) use ($http){
    $_POST = [];
    $_GET = [];
    if(isset($request -> server))
    {
        foreach ($request -> server as $k => $v)
        {
            $_SERVER[strtoupper($k)] = $v;
        }
    }

    if(isset($request -> post))
    {
        foreach ($request -> post as $k => $v)
        {
            $_POST[$k] = $v;
        }
    }
    if(isset($request -> get))
    {
        foreach ($request -> get as $k => $v)
        {
            $_GET[$k] = $v;
        }
    }

    if(isset($request -> header))
    {
        foreach ($request -> header as $k => $v)
        {
            $_SERVER[strtoupper($k)] = $v;
        }
    }
    ob_start();
    try {
        // 执行应用并响应
        \think\Container::get('app')->run()->send();
    }catch (\Exception $exception)
    {
        echo $exception -> getMessage();
    }
    $res = ob_get_contents();
    ob_end_clean();

    $response -> cookie("asd", "123456789", time()+3600);
    $response -> end($res);
});

$http -> start();
