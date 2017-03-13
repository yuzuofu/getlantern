<?php
namespace Admin\Controller;

use Think\Controller;

class CouponController extends PublicController
{
    public function index()
    {
        $couponTable = D('Coupon');

        $coupon_list = $couponTable->select();
        $this->assign('coupon_list', $coupon_list);
        $this->display('index');
    }

    public function add()
    {
        if (IS_POST) {
            $data = I('post.');
            $couponTable = D('Coupon');
            $data['coupon_prefix'] =strtoupper($data['coupon_prefix']);

            if ($couponTable->create($data)) {
                $insertID = $couponTable->add();

                if ($insertID) {
                    $count = $data['coupon_acount'];
                    $couponTicketTable = M('CouponTicket');
                    $p = 1;
                    $prefix = $data['coupon_prefix'];
                    $numbers = [];

                    while ($p <= $count) {
                        $number = $prefix . mt_rand(100000, 999999);
                        if (!in_array($number, $numbers)) {
                            $numbers[] = $number;
                            $p++;
                        } else {
                            continue;
                        }
                    }

                    for ($i = 0; $i < $count; $i++) {
                        $ticket = array(
                            'number' => $numbers[$i],
                            'create_time' => time(),
                            'update_time' => time(),
                            'enable' => 0,
                            'cid' => $insertID
                        );

                        $couponTicketTable->add($ticket);
                    }

                    $this->success('生成成功', U('Coupon/index'));
                } else {
                    $this->error($couponTable->getDbError(), U('Coupon/index'));
                }
            } else {
                $this->error($couponTable->getError(), U('Coupon/index'));
            }
        } elseif (IS_GET) {
            $this->display('add-coupon');
        }
    }

    public function tickets()
    {
        $cid = I('get.cid/d');
        $couponTicketTable = D('CouponTicket');

        if ($cid) {
            $tickets = $couponTicketTable->where(array('cid' => $cid))->select();
            $this->assign('tickets', $tickets);
            $this->display('coupon-list');
        } else {
            $this->recirect('index');
        }

    }
}