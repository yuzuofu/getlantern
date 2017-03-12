<?php
namespace Admin\Controller;

use Think\Controller;

class PublicController extends Controller
{
    public function _initialize()
    {
        $username = session('username');

        if (!$username) {
            redirect(U('Common/login'));
        }
    }
}