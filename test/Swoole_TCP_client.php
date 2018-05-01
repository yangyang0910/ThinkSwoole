<?php

$client = new swoole_client(SWOOLE_SOCK_TCP);

if (!$client -> connect("127.0.0.1", 9000))
{
    exit("connect fail");
}

$client -> send("Hello World!");


echo $client -> recv(1024);

$client -> close();



