<?php
$num = 10;
swoole_timer_tick(1000, function () use ($num){
    echo $num;
});