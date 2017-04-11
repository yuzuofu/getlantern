<?php
namespace Home\Model;

use Think\Model;

class OrderModel extends Model
{
    protected $_map = array(
        'deskid' => 'dkid',
        'menu_ids' => 'muid',
        'num' => 'person',
    );

    protected $_auto = array(
        array('create_time', 'time', self::MODEL_INSERT, 'function'),
        array('update_time', 'time', self::MODEL_BOTH, 'function'),
        array('final_price', 'total_price', self::MODEL_INSERT, 'field'),
        array('use_time', 'parseUseTimeToInt', self::MODEL_BOTH, 'callback'),
    );

    protected $_validate = array(
        array('person', 'require', '用餐人数不能为空'),
        array('person', 'number', '请填写正确的用餐人数'),

    );

    public function parseUseTimeToInt($usetime)
    {
        return strtotime($usetime);
    }
}