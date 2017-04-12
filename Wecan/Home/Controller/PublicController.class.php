<?php
namespace Home\Controller;
use Think\Controller;

class PublicController extends Controller
{
    public function _initialize()
    {

        $openid = session("customer_openid");
        if (!$openid) {
            echo "<h1 style='color: red;'>请从相关的微信公众平台进入</h1>";exit();
        }
    }
}