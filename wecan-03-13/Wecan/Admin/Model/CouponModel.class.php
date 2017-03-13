<?php
namespace Admin\Model;

use Think\Model;

class CouponModel extends Model
{
    protected $_map = array(
        'coupon_prefix' => 'prefix',
        'coupon_amount' => 'amount',
        'coupon_start' => 'start_time',
        'coupon_end' => 'end_time',
        'coupon_acount' => 'acount',
    );

    protected $_auto = array(
        array('create_time', 'time', self::MODEL_INSERT, 'function'),
        array('update_time', 'time', self::MODEL_BOTH, 'function'),
        array('start_time', 'parseStartTimeToInt', self::MODEL_BOTH, 'callback'),
        array('end_time', 'parseEndTimeToInt', self::MODEL_BOTH, 'callback')
    );

    protected $_validate = array(
        array('prefix', '/^[a-zA-Z]{2}$/', '前缀必须为两个字母组成', self::MUST_VALIDATE, 'regex'),
        array('prefix', '', '前缀不能重复', self::MUST_VALIDATE, 'unique'),
        array('amount', 'currency', '请输入正确的优惠价格'),
        array('amount', array(0,9), '优惠金额应在0~9之间', self::MUST_VALIDATE, 'between'),
    );

    public function parseStartTimeToInt($strtime)
    {
        return strtotime($strtime);
    }

    public function parseEndTimeToInt($strtime)
    {
        return strtotime($strtime) + 86399;
    }
}