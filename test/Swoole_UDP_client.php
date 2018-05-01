<?php

$server = new swoole_client(SWOOLE_UDP);

if (!$server -> connect("127.0.0.1", 9001))
{
    exit("connect fail!");
}

$server -> send("My name is Alvin".PHP_EOL);

echo $server -> recv(1024) . PHP_EOL;

$server -> close();











