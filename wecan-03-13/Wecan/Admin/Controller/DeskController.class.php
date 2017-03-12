<?php
namespace Admin\Controller;

use Think\Controller;

class DeskController extends PublicController
{
    public function index()
    {
        $deskTable = D('Desk');
        $desk_list = $deskTable->select();
        $this->assign('desk_list', $desk_list);
        $this->display('index');
    }

    public function add()
    {
        if (IS_POST) {
            $data = I('post.');
            $deskTable = D('Desk');

            if ($deskTable->create($data)) {
                $insertID = $deskTable->add();

                if ($insertID) {
                    $this->success('新增餐桌成功', U('Desk/index'));
                } else {
                    $this->error($deskTable->getDbError(), U('Desk/index'));
                }
            } else {
                $this->error($deskTable->getError(), U('Desk/index'));
            }
        } else {
            $this->display('add-desk');
        }

    }

    public function edit()
    {
        if (IS_GET) {
            $id = I('get.id/d');
            $deskTable = D('Desk');
            $desk = $deskTable->find($id);

            if ($desk) {
                $this->assign('desk', $desk);
                $this->display('add-desk');
            } else {
                $this->error($deskTable->getError(), U('index'));
            }
        } elseif (IS_POST) {
            $data = I('post.');
            $deskTable = D('Desk');

            if ($deskTable->create($data)) {
                $res = $deskTable->save();

                if ($res) {
                    $this->success('修改成功', U('Desk/index'));
                } else {
                    $this->error($deskTable->getDbError(), U('Desk/index'));
                }
            } else {
                $this->error($deskTable->getError(), U('Desk/index'));
            }
        } else {
            $this->redirect('index');
        }
    }

    public function delete()
    {
        if (IS_GET) {
            $id = I('get.id/d');
            if ($id) {
                $name = M('Desk')->where(array('id' => $id))->getField('name');
                $this->assign('name', $name);
                $this->assign('id', $id);
                $this->display();
            }
        } elseif (IS_POST) {
            $id = I('post.id/d');

            if ($id) {
                $deskTable = D('Desk');
                $res = $deskTable->delete($id);

                if ($res) {
                    $this->success('删除成功', U('Desk/index'));
                } else {
                    $this->delete('删除过程出错', U('Desk/index'));
                }
            }
        }
    }
}