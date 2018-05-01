<?php
namespace app\index\controller;

use think\Controller;

class Index extends Controller
{
    public function index()
    {
        print_r($_GET);
    }


    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }
    public function paths($name = 'ThinkPHP5')
    {

    }
}
