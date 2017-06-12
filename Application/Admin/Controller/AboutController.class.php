<?php
namespace Admin\Controller;

use Think\Controller;

class AboutController extends BaseController
{
    public function index(){
        $this->display();
    }

    public function lists()
    {
        $msg = D('msg');
        $msgs = $msg->select();
        $this->assign('msgs', $msgs);
        $this->display();
    }

    public function insert()
    {
        $msg = D('msg');//实例化数据库

        if (IS_POST) {
            $data['bk_title'] = I('bk_title');
            $data['bk_author'] = I('bk_author');
//            $data['bk_pic']=I('bk_pic');
            $data['bk_content'] = I('bk_content');
            $data['time'] = date("Y-m-d h:i:s");
//            dump($data);
//            die();

            if ($msg->create($data)) {
                if ($msg->add()) {
                    $this->success('新增博文成功', U(lists));
                } else {
                    $this->error('新增博文失败');
                }
            } else {
                $this->error($msg->getError());
            }
            return;
        }

        $this->display();
    }

    public function del()
    {
        $msg = D('msg');
        if ($msg->delete(I('id'))) {
            $this->success("删除博文成功", U(lists));
        } else {
            $this->error("删除博文失败");
        }
        return;
        $this->display();
    }

    public function edit(){
        $msg = D('msg');//实例化数据库

        if (IS_POST) {
            $data['id'] = I('id');
            $data['bk_title'] = I('bk_title');
            $data['bk_author'] = I('bk_author');
//            $data['bk_pic']=I('bk_pic');
            $data['bk_content'] = I('bk_content');
            $data['time'] = date("Y-m-d h:i:s");
//            dump($data);
//            die();

            if ($msg->create($data)) {
                if ($msg->save()) {
                    $this->success('修改博文成功', U(lists));
                } else {
                    $this->error('修改博文失败');
                }
            } else {
                $this->error($msg->getError());
            }
            return;
        }
        $msgid = I('id');
        $m = $msg->find($msgid);
        $this->assign('m' , $m);

        $this->display();
    }
}