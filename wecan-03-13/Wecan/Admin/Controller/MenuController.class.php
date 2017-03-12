<?php
namespace Admin\Controller;

use Think\Controller;

class MenuController extends PublicController
{
    public function index()
    {
        $menuTable = D('Menu');
        $menu_list = $menuTable->select();
        $this->assign('menu_list', $menu_list);
        $this->display('index');
    }

    public function add()
    {
        if (IS_POST) {
            $data = I('post.');

            //  菜品图片上传路径保存
            $upload = new \Think\Upload();
            $upload->maxSize = 3145728;
            $upload->exts = array('jpg', 'jpeg', 'gif', 'png');
            $upload->rootPath = '/var/wecan/uploads/';
            $upload->savePath = '';
            $info = $upload->upload();

            if (!$info) {//  上传出错
                $menu_pic = "";
            } else {//  上传成功
                foreach ($info as $file) {
                    $menu_pic = $file['savepath'] . $file['savename'];
                }
            }

            $data['menu_img'] = $menu_pic;
            $menuTable = D('Menu');

            if ($menuTable->create($data)) {
                $insertID = $menuTable->add();

                if ($insertID) {
                    $this->success('添加菜品成功', U('Menu/index'));
                } else {
                    $this->error($menuTable->getDbError(), U('Menu/index'));
                }
            } else {
                $this->error($menuTable->getError(), U('Menu/index'));
            }
        } else {
            $this->display('add-menu');
        }
    }

    public function edit()
    {
        if (IS_GET) {
            $id = I('get.id/d');

            if ($id) {
                $menuTable = D('Menu');
                $menu = $menuTable->find($id);

                if ($menu) {
                    $this->assign('menu', $menu);
                    $this->display('add-menu');
                } else {
                    $this->error('查找不到该菜品', U('Menu/index'));
                }
            } else {
                $this->error('请查找正确的菜品', U('Menu/index'));
            }
        } elseif (IS_POST) {
            $menuTable = D('Menu');

            if ($_FILES['menu_img']['error'] == UPLOAD_ERR_NO_FILE) {//  没有上传文件
                $data = I('post.');
            } else {
                $data = I('post.');
                $upload = new \Think\Upload();
                $upload->maxSize = 3145728;
                $upload->exts = array('jpg', 'jpeg', 'gif', 'png');
                $upload->rootPath = '/var/wecan/uploads/';
                $upload->savePath = '';
                $info = $upload->upload();

                if (!$info) {
                    $this->error($upload->getError(), U('Menu/index'));
                } else {
                    foreach ($info as $file) {
                        $menu_pic = $file['savepath'] . $file['savename'];
                    }
                }

                $data['menu_img'] = $menu_pic;
                $old_menu_pic = $menuTable->where(array('id' => $data['id']))->getField('pic');
                @unlink('/var/wecan/uploads/' . $old_menu_pic);
            }

            if ($menuTable->create($data)) {
                $res = $menuTable->save();

                if ($res) {
                    $this->success('修改成功', U('Menu/index'));
                } else {
                    $this->error($menuTable->getDbError(), U('Menu/index'));
                }
            } else {
                $this->error($menuTable->getError(), U('Menu/index'));
            }
        } else {
            $this->redirect('index');
        }
    }

    public function delete()
    {
        if (IS_GET) {
            $id = I('get.id/d');
            $menuTable = D('Menu');
            $menu = $menuTable->find($id);
            $this->assign('menu', $menu);
            $this->display('delete');
        } elseif (IS_POST) {
            $id = I('post.id/d');

            if ($id) {
                $menuTable = D('Menu');
                $menu = $menuTable->find($id);
                $delete_pic = $menu['pic'];
                $res = $menuTable->delete($id);

                if ($res) {
                    @unlink('/var/wecan/uploads/' . $delete_pic);
                    $this->success('删除成功', U('Menu/index'));
                } else {
                    $this->error($menuTable->getDbError(), U('Menu/index'));
                }
            } else {
                $this->redirect('index');
            }
        }
    }
}