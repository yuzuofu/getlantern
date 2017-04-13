<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;

class CustomerController extends PublicController
{
    public function index()
    {
        $orderTable = M("Order");
        $openid = session("customer_openid");
        $uid = M("Customer")->where(['openid' => $openid])->getField("id");
        $uid = $uid ? $uid : 1;
        $my_orders = $orderTable
            ->where(["uid" => $uid])
            ->join("desk on desk.id = order.dkid", "LEFT")
            ->field(array('order.id', "order.create_time", "desk.name" => "dkname"))
            ->select();
//        echo $orderTable->getLastSql();exit();
        $this->assign("my_orders", $my_orders);
        $this->display();
    }

    public function coupon()
    {
        $UserCouponTable = M("user_coupon");
        $openid = session("customer_openid");
        $uid = M("Customer")->where(['openid' => $openid])->getField("id");
        $uid = $uid ? $uid : 1;
        $coupon_list = $UserCouponTable
            ->where(["uid" => $uid])
            ->join("coupon_ticket on coupon_ticket.id = user_coupon.cpid", 'RIGHT')
            ->field(['coupon_ticket.number'])
            ->select();
        $this->assign("coupon_list", $coupon_list);
        $this->display();
    }

    public function locationSearch()
    {
        $this->display("location-search");
    }
}