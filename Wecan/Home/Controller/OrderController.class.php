<?php
namespace Home\Controller;
use Think\Controller;

class OrderController extends PublicController
{
    public function orderDesk()
    {
        if (IS_POST) {
            $order = [];
            $deskid = I("post.deskid/d");
            if (!$deskid) {
                $this->error("请选择餐桌", U("Order/orderDesk"));
            } else {
                $order['deskid'] = $deskid;
                $openid = session("customer_openid");
                session("order-" . $openid, $order);
                $this->redirect("orderMenu");
            }
        }
        $deskTable = M("Desk");
        $desk_list = $deskTable->where(['lock' => 0])->select();
        $this->assign("desk_list", $desk_list);
        $this->display("order-desk");
    }

    public function orderMenu()
    {
        if (IS_POST) {
            $menu = I("post.menu");
            array_walk($menu, 'intval');
//            $menu_str = implode(',', $menu);
            $menu_str = json_encode($menu);
            $openid = session("customer_openid");
            $order = session("order-" . $openid);
            $order['menu_ids'] = $menu_str;
            session("order-" . $openid, $order);
            $this->redirect("orderInfo");
        }
        $menuTable = M('Menu');
        $menu_list = $menuTable->select();
        $this->assign('menu_list', $menu_list);
        $this->display("order-menu");
    }

    public function orderInfo()
    {
        if (IS_POST) {
            $openid = session("customer_openid");
            $order = session("order-" . $openid);
            $order['uid'] = 1;
            $order['total_price'] = $this->_calculatePrice($order['menu_ids']);
            $post = I("post.");
            $order = array_merge($order, $post);
            $orderTable = D("Order");

            if ($orderTable->create($order)) {
                $res = $orderTable->add();

                if ($res) {
                    //  预约添加成功，锁定餐桌
                    M("Desk")->where(['id' => $order['deskid']])->setField('lock', 1);
                    $this->success("添加成功", U("Customer/index"));
                } else {
                    $this->error($orderTable->getDbError(), U("Index/index"));
                }
            } else {
                $this->error($orderTable->getError(), U("Index/index"));
            }
        } else {
            $this->display("order-info");
        }

    }

    public function menuDetail()
    {
        $menu_id = I('get.mid/d');
        $this->assign('menu_id', $menu_id);
        $this->display("menu-detail");
    }

    public function cancelOrder()
    {
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

    private function _calculatePrice($muid)
    {
        $menu_ids = json_decode($muid, true);
        array_walk($menu_ids, 'intval');
        $sum = 0;
        $menuTable = M('Menu');

        foreach ($menu_ids as $mid => $num) {
            $menu_price = $menuTable->where(array('id' => $mid))->getField("price");
            $total = $menu_price * $num;
            $sum += $total;
        }

        return $sum;
    }
}