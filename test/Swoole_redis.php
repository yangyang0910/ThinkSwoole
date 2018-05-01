<?php

class SwooleRedis
{
    public $redis;

    public function __construct()
    {
        try{
            $this -> redis = new swoole_redis([
                "timeout" => 0.5
            ]);
            $this -> connect("127.0.0.1", 6379);
        }catch (Exception $exception)
        {
            die("connect fail:" . $exception -> getMessage());
        }
    }

    public function connect($host, $port){
        $this -> redis -> connect($host, $port, function (swoole_redis $redis, $result){
            if ($result === false)
            {
                die("connect fail");
            }
        });
    }

    /**
     * @param $key
     * @param $value
     * @return \Swoole\Redis
     */
    public function set($key, $value){
        $this -> redis -> set($key, $value, function (swoole_redis $redis, $result){
            var_dump($result);
        });
        return $this -> redis;
    }

    /**
     * @param $key
     * @return bool
     */
    public function _get($key){
        return $this -> redis -> get($key, function (){});
    }

    public function close(){
        $this -> redis -> close();
    }


}

$obj = new SwooleRedis();
$obj -> set("Hello", "world")  -> get("Hello");