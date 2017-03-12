<?php
namespace Admin\Model;

use Think\Model;

class CouponModel extends Model
{
    protected $_map = array(
        'coupon_perfix' => 'perfix',
        'coupon_amount' => 'amount',
        'coupon_start' => 'start_time',
        'coupon_end' => 'end_time',
        'coupon_acount' => 'acount',
    );

    protected $_auto = array(
        array('create_time', 'time', self::MODEL_INSERT, 'function'),
        array('update_time', 'time', self::MODEL_BOTH, 'function'),
    );

    protected $_validate = array(
        array('perfix', '/^[a-zA-Z]{2}$/', self::MUST_VALIDATE, 'regex'),
        array('amount', 'currency', '请输入正确的优惠价格'),
    );
}