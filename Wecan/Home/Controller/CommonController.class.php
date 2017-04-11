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
}