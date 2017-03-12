<?php
namespace Admin\Model;

use Think\Model;

class DeskModel extends Model
{
    protected $_map = array(
        'desk_name' => 'name',
        'desk_size' => 'capacity',
        'desk_intro' => 'intro',
    );

    protected $_auto = array(
        array('lock', 1, self::MODEL_INSERT),
        array('create_time', 'time', self::MODEL_INSERT, 'function'),
        array('update_time', 'time', self::MODEL_BOTH, 'function'),
    );

    protected $_validate = array(
        array('name', 'require', '餐桌名不能为空'),
        array('name', '', '餐桌名不能重复', self::MUST_VALIDATE, 'unique'),
        array('capacity', array(2, 10), '餐桌人数在2~10人之间', self::MUST_VALIDATE, 'between')
    );
}