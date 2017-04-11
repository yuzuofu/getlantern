<?php
namespace Admin\Controller;

use Think\Controller;

class CommonController extends Controller
{

    public function index()
    {
        echo 123;
    }

    public function intro()
    {
        if (IS_POST) {
            $new_intro = I('post.intro');
            $filename = APP_PATH . 'Common/Conf/config.php';
            $config = include $filename;

            $config['_INTRO_'] = $new_intro;
            $filecontent = "<?php\r\nreturn " . var_export($config, true) . ";";
            if (file_exists($filename)) {
                file_put_contents($filename, $filecontent);
            }
            redirect(U('Common/intro'));
        } else {
            $config = include APP_PATH . 'Common/Conf/config.php';
            $intro = $config['_INTRO_'];
            $this->assign('intro', $intro);
            $this->display('intro');
        }
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

    public function logout()
    {
        session('username',null);
        $this->redirect('login');
    }
}