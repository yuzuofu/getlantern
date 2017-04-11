<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends PublicController
{
    public function index()
    {
        $menuTable = M('Menu');
        $menu_list = $menuTable->select();
        $this->assign('menu_list', $menu_list);
        $this->display();
    }

    public function intro()
    {
        $intro = C("_INTRO_");
        $this->assign('intro', $intro);
        $this->display();
    }
}