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
//            $msg_type = $message->MsgType;
//            $event_type = $message->Event;
//            if ($msg_type == 'event' && $event_type == 'location') {//  存储用户地理位置
//                $user_locationTable = M('user_location');
//                $user_location = $user_locationTable
//                                ->where(['openid' => $message->FromUserName])
//                                ->getField('id');
//
//                if (!$user_location) {
//                    $data = [
//                        'openid' => $message->FromUserName,
//                        'latitude' => $message->Location_X,
//                        'longitude' => $message->Location_Y,
//                        'create_time' => time(),
//                        'update_time' => time()
//                    ];
//                    $user_locationTable->add($data);
//                } else {
//                    $data = [
//                        'id' => $user_location,
//                        'latitude' => $message->Location_X,
//                        'longitude' => $message->Location_Y,
//                        'update_time' => time()
//                    ];
//                    $user_locationTable->save($data);
//                }
//                return "地理位置更新成功";
//            } else {
//                return "您好！欢迎关注我！";
//            }
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
        $oauth = $app->oauth->scopes(['snsapi_userinfo']);

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
        $user = $oauth->user();
        //  TODO:将用户信息存储进数据库
        $customerTable = D('Customer');
        $openid = $user->getId();
        $customerid = $customerTable->where(['openid' => $openid])->getField('id');
        if (!$customerid) {
            if ($customerTable->create($user->toArray())) {
                $customerTable->add();
                $customerid = $customerTable->getLastInsID();
            } else {
//                echo 123;exit();
//                $this->error("服务器出现错误");
            }
        }
//
       //  TODO:给用户发送优惠券
        $user_couponTable = M('user_coupon');
        $user_coupon = $user_couponTable->where(['uid' => $customerid])->find();
        if (!$user_coupon) {  //  用户没有优惠券
            $coupon_ticketTable = M('coupon_ticket');
            $enable_tickets = $coupon_ticketTable
                            ->where(['enable' => 0])
                            ->order("create_time DESC")
                            ->getField('id');
            if ($enable_tickets) {
                //  系统有可使用的优惠券剩余，则给该用户发放一张优惠券
                //  反之则不发放
                $cpid = $enable_tickets;
                $data = [
                    'uid' => $customerid,
                    'cpid' => $cpid,
                    'create_time' => time(),
                    'update_time' => time()
                ];
                $user_couponTable->add($data);
                $coupon_ticketTable->where(['id' => $cpid])->setField('enable', 2);
            }

        }

        session('customer_openid', $openid);
        header('location:' . "http://120.24.49.247/?s=/Home/Index/index");
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