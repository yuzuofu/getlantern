<?php
namespace Home\Controller;
use Think\Controller;
use EasyWeChat\Foundation\Application;

class CommonController extends Controller
{
    public function wechat()
    {
        $options = [
            'debug' => true,
            'app_id' => 'wx52ecb561d8160e1e',
            'secret' => 'c031dbb61d244867ab4b998e8da188d3',
            'token' => 'wecan',

            'log' => [
                'level' => 'debug',
                'file' => '/tmp/easywechat.log'
            ]
        ];

        $app = new Application($options);
        $server = $app->server;
        $server->setMessageHandler(function ($message) {
            return "您好！欢迎关注我！";
        });
        $response = $server->serve();
        $response->send();
    }

    public function platformEnter()
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
    }

    public function oauthWechat()
    {
        $config = [
            'debug' => true,
            'app_id' => 'wx52ecb561d8160e1e',
            'secret' => 'c031dbb61d244867ab4b998e8da188d3',
            'token' => 'wecan',
            'log' => [
                'level' => 'debug',
                'file'  => '/tmp/easywechat.log'
            ]
        ];
        $app = new Application($config);
        $oauth = $app->oauth;
        $user = $oauth->user()->toArray();
        //  TODO:将用户信息存储进数据库
        //  TODO:给用户发送优惠券
        session('customer_openid', $user->id);
        $this->redirect(U('Index/index@http://120.24.49.247'));
    }

    public function createMenu()
    {
        $options = [
            'debug' => true,
            'app_id' => 'wx52ecb561d8160e1e',
            'secret' => 'c031dbb61d244867ab4b998e8da188d3',
            'token' => 'wecan',

            'log' => [
                'level' => 'debug',
                'file' => '/tmp/easywechat.log'
            ]
        ];
        $app = new Application($options);
        $menu = $app->menu;
        $menu->destroy();
        $buttons = [
            [
                'type' => 'view',
                'name' => '开始预约',
                'url' => 'http://120.24.49.247/?s=/Home/Common/platformEnter'
            ],
            [
                'type' => 'view',
                'name' => '获取优惠券',
                'url' => 'http://120.24.49.247?s=/Home/Common/getTicket'
            ]
        ];
        $menu->add($buttons);
    }
}