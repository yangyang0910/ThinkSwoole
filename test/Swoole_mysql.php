<?php

$DB = new swoole_mysql;
$server = array(
    'host' => '127.0.0.1',
    'port' => 3306,
    'user' => 'root',
    'password' => '7dff1b33a7f8c4e3',
    'database' => '	thinkphp51_cyqi',
    'charset' => 'utf8', //指定字符集
    'timeout' => 2,  // 可选：连接超时时间（非查询超时时间），默认为SW_MYSQL_CONNECT_TIMEOUT（1.0）
);
$DB -> connect($server, function ($db, $r){
    if ($r === false)
    {
        var_dump($db->connect_errno, $db->connect_error);
        die("Connect error");
    }
});

$sql = "show databases";

$DB -> query($sql, function ($db, $r){
    if ($r === false)
    {
        die("error:". $db -> error);
    }elseif ($r === true)
    {
        var_dump($db -> affected_rows, $db ->insert_id);
    }
    var_dump($r);
    $db -> close();
});
