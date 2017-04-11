<?php
namespace Admin\Model;

use Think\Model;

class MenuModel extends Model
{
    protected $_map = array(
        'menu_name' => 'name',
        'menu_price' => 'price',
        'menu_img' => 'pic',
        'menu_remark' => 'remark',
    );

    protected $_auto = array(
        array('create_time', 'time', self::MODEL_INSERT, 'function'),
        array('update_time', 'time', self::MODEL_BOTH, 'function')
    );

    protected $_validate = array(
        array('name', 'require', '菜品名不能为空'),
        array('name', '', '菜品名不能重复', self::MUST_VALIDATE, 'unique'),
        array('price', 'currency', '请输入正确的价格'),
        array('pic', 'require', '菜品图片还未上传')
    );
}