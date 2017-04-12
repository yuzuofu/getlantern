<?php
namespace Home\Controller;
class IndexController extends PublicController
{
    public function index()
    {
        var_dump(session("customer_openid"));
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