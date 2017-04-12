<?php
namespace Home\Controller;
use Think\Controller;
use EasyWeChat\Foundation\Application;

class PublicController extends Controller
{
    public function _initialize()
    {
        $config = [
            'debug' => true,
            'app_id' => 'wx52ecb561d8160e1e',
            'secret' => 'c031dbb61d244867ab4b998e8da188d3',
            'token' => 'wecan',
            'oauth' => [
                'scopes' => ['snsapi_userinfo'],
                'callback' => U('oauthWechat'),
            ],
            'log' => [
                'level' => 'debug',
                'file'  => '/tmp/easywechat.log'
            ]
        ];
        $app = new Application($config);
        $oauth = $app->oauth;

        if (empty(session("customer_openid"))) {
            $oauth->redirect()->send();
        }

        $openid = session("customer_openid");
        if (!$openid) {
            echo "<h1 style='color: red;'>请从相关的微信公众平台进入</h1>";exit();
        }
    }

    public function oauthWechat()
    {
        $config = [];
        $app = new Application($config);
        $oauth = $app->oauth;
        $user = $oauth->user()->toArray();
        //  TODO:将用户信息存储进数据库
        //  TODO:给用户发送优惠券
        session('customer_openid', $user->id);
        $this->redirect(U('Index/index'));
    }
}