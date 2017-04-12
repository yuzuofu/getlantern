<?php
namespace Home\Model;
use Think\Model;

class CustomerModel extends Model
{
    protected $_map = [
        'id' => 'openid',
    ];

    protected $_auto = [
        ['create_time', 'time', self::MODEL_INSERT, 'function'],
        ['update_time', 'time', self::MODEL_BOTH, 'function'],
    ];
}