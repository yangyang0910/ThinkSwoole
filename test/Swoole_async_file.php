<?php

swoole_async_readfile(__DIR__ . "/1.txt", function ($filename, $fileconnect){
    echo $fileconnect . "\n";
    echo $filename;
});