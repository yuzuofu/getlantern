<?php
namespace Admin\Controller;

use Think\Controller;

class CommonController extends Controller
{

    public function index()
    {
        echo 123;
    }

    public function login()
    {
        if (IS_POST) {
            $username = I("post.username");
            $password = I("post.password");

            $adminTable = M("admin");

            $password_halt = $adminTable
                            ->where(array('username' => $username))
                            ->getField('password');
            $check_result = password_verify($password, $password_halt);

            if ($check_result) {
                session('username', $username);
                $this->redirect('Index/index');
            } else {
                $this->redirect('Common/login', [], 3, '用户名或密码错误');
            }
        } else {
//            var_dump(password_hash('admin', PASSWORD_BCRYPT));
            $this->display('login');
        }
    }
}