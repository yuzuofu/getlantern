<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

class OrderController extends PublicController
{
    public function index()
    {
        $orderTable = M("Order");
        $order_list = $orderTable
                    ->join("`customer` on `customer`.id = `order`.uid", 'LEFT')
                    ->join("`desk` on `desk`.id = `order`.dkid", "LEFT")
                    ->field(["`order`.*", '`desk`.name' => 'dkname', '`customer`.nickname' => 'username'])
                    ->select();
        $this->assign("order_list", $order_list);
        $this->display();
    }

    public function edit()
    {
        //  TODO:test
        if (IS_POST) {
            $id = I('post.id/d');
            $coupon_num = I('post.coupon_num');
            //  判断优惠券是否是该预约的用户所有
            $coupon_num = strtoupper($coupon_num);

            if (!preg_match("/^[A-Z]{2}[0-9]{6}$/", $coupon_num)) {
                $this->error("验证码不正确");
            } else {
                $coupon_ticketTable = M("coupon_ticket");
                $coupon_ticket = $coupon_ticketTable
                                ->join("`coupon` on `coupon`.id = `coupon_ticket`.cid")
                                ->join("`user_coupon` on `user_coupon`.cpid = `coupon_ticket`.id")
                                ->join("`order` on `order`.uid = `user_coupon`.uid")
                                ->field(['`coupon`.start_time',
                                         '`coupon`.end_time',
                                         '`coupon`.amount',
                                         '`coupon_ticket`.enable',
                                         '`order`.final_price',
                                         '`coupon_ticket`.id'])
                                ->where(['`order`.id' => $id])
                                ->find();
                $today = time();

                if (!$coupon_ticket) {//  优惠券不存在
                    $this->error('该优惠券不存在');
                } elseif(intval($coupon_ticket['enable']) === 1) {  // 优惠券已经使用了
                    $this->error("该优惠券已使用");
                } elseif ($coupon_ticket['start_time'] > $today || $coupon_ticket['end_time'] < $today) {
                    //  不在优惠券的使用时间范围之内
                    $this->error("优惠券不在使用时间范围");
                } else {
                    //  根据优惠券的优惠额度减免总价
                    $amount = $coupon_ticket['amount'];
                    $couponTable = M('Coupon');
                    $orderTable =M('Order');
                    $final_price = $coupon_ticket['final_price'];
                    $cpid =  $coupon_ticket['id'];
                    try {
                        $orderTable->startTrans();
                        $orderTable->where(['id' => $id])->setField("final_price", $final_price - $amount);
                        $couponTable->where(['id' => $cpid])->setField('enable', 1);
                        $orderTable->commit();
                        $this->success('操作成功');
                    } catch (Exception $e) {
                        $orderTable->rollback();
                        $this->error($e->getMessage());
                    }
                }
            }
        } else {
            $id = I('get.id/d');
            $orderTable = M('Order');
            $order = $orderTable
                    ->join("`customer` on `customer`.id = `order`.uid", "LEFT")
                    ->join("`desk` on `desk`.id = `order`.dkid", "LEFT")
                    ->field(["`order`.*", "`desk`.name" => "dkname", "`customer`.nickname" => "username"])
                    ->find();
            if ($order) {
                $this->assign("order", $order);
                $this->display();
            } else {
                $this->error("该预约不存在");
            }
        }
    }

    public function menuList()
    {
        //  TODO:test
        $id = I('get.id/d');
        $orderTable = M('Order');
        $menus = $orderTable->where(['id' => $id])->getField('muid');
        $menus = json_decode($menus, true);
        $menuids = array_keys($menus);
        array_walk($menuids, 'intval');

        if ($menuids) {
            $menuids = implode(',', $menuids);
            $menuTable = M('Menu');
            $menu_list = $menuTable->where(['id' => ['IN', $menuids]])->select();
            $this->assign('menu_list', $menu_list);
            $this->assign('is_order_menu', true);
            $this->display("Menu/index");
        } else {
            $this->error("用户还未选择点餐");
        }
    }

    public function delete()
    {
        //  TODO:test
        if (IS_POST) {
            $id = I("post.oid/d");
            $orderTable = M("Order");
            $deskid = $orderTable->where(['id' => $id])->getField('dkid');

            if ($deskid) {//  存在该预约，将餐桌锁定状态解除,删除预约记录
                M('Desk')->where(['id' => $deskid])->setField('lock', 0);
                M('Order')->delete($id);
                $this->success('删除成功');
            } else {
                $this->error('该预约不存在');
            }
        } else {
            $orderid = I("get.id/d");
            $this->assign('orderid', $orderid);
            $this->display("cancel-order");
        }
    }
}