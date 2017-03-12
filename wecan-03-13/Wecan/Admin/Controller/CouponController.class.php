<?php
namespace Admin\Controller;

use Think\Controller;

class CouponController extends PublicController
{
    public function index()
    {
        $this->display('index');
    }

    public function add()
    {
        if (IS_POST) {
            $data = I('post.');
            $couponTable = D('Coupon');

            if ($couponTable->create($data)) {
                $insertID = $couponTable->add();

                if ($insertID) {
                    $count = $data['coupon_acount'];
                    $couponTicketTable = M('CouponTicket');
                    $perfix = strtoupper($perfix);
                    $p = 1;
                    $numbers = [];

                    while ($p <= $count) {
                        $number = $perfix . mt_rand(100000, 999999);
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
        }
        $this->display('add-coupon');
    }
}