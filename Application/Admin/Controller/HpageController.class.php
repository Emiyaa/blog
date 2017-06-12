<?php
namespace Admin\Controller;

use Think\Controller;

class HpageController extends BaseController
{
    public function lists()
    {
//        $msg = D('msg');
//        $msgs = $msg->select();
//        $this->assign('msgs', $msgs);
        //分页
        $msg = D('msg');
        $count = $msg->count();// 查询满足要求的总记录数
        $Page = new\Think\Page($count, 4);// 实例化分页类 传入总记录数和每页显示的记录数(2)
        $show = $Page->show();// 分页显示输出
        $list = $msg->limit($Page->firstRow . ',' . $Page->listRows)->select();// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $this->assign('lists', $list);// 赋值数据集
        $this->assign('page', $show);// 赋值分页输出
        $this->display();
    }

    public function insert()
    {
        $msg = D('msg');//实例化数据库

        if (IS_POST) {
            $data['bk_title'] = I('bk_title');
            $data['bk_author'] = I('bk_author');
            $data['bk_pic'] = I('bk_pic');
            $data['bk_content'] = I('bk_content');
            $data['time'] = date("Y-m-d h:i:s");
//            dump($data);
//            die();

            if ($_FILES['bk_pic']['tmp_name'] != '') {
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize = 3145728;// 设置附件上传大小
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型

                $upload->savePath = './Uploads/'; // 设置附件上传（子）目录
                $upload->rootPath = './'; // 设置附件上传根目录

                $info = $upload->uploadOne($_FILES['bk_pic']);
                if (!$info) {// 上传错误提示错误信息
                    $this->error($upload->getError());
                } else {// 上传成功
                    $data['bk_pic'] = $info['savepath'] . $info['savename'];//article_pic 为数据库字段
                }
            }

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
        $id = $_GET['id'];  //判断id是数组还是一个数值
        if (is_array($id)) {
            $where = 'id in(' . implode(',', $id) . ')';
        } else {
            $where = 'id=' . $id;
        }
//        dump($where);
//        die();
        $list = $msg->where($where)->delete();
        if ($list !== false) {
            $this->success("成功删除{$list}条！", U("lists"));
        } else {
            $this->error('删除失败！');
        }
//        if ($msg->delete(I('id'))) {
//            $this->success("删除博文成功", U(lists));
//        } else {
//            $this->error("删除博文失败");
//        }
        return;
        $this->display();
    }

    public function edit()
    {
        $msg = D('msg');//实例化数据库

        if (IS_POST) {
            $data['id'] = I('id');
            $data['bk_title'] = I('bk_title');
            $data['bk_author'] = I('bk_author');
            if (I('bk_pic') != null) {
                $data['bk_pic'] = I('bk_pic');
            }
            $data['bk_content'] = I('bk_content');
            $data['time'] = date("Y-m-d h:i:s");

            if ($_FILES['bk_pic']['tmp_name'] != '') {
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize = 3145728;// 设置附件上传大小
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型

                $upload->savePath = './Uploads/'; // 设置附件上传（子）目录
                $upload->rootPath = './'; // 设置附件上传根目录

                $info = $upload->uploadOne($_FILES['bk_pic']);
                if (!$info) {// 上传错误提示错误信息
                    $this->error($upload->getError());
                } else {// 上传成功
                    $data['bk_pic'] = $info['savepath'] . $info['savename'];//article_pic 为数据库字段
                }
            }
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
        $this->assign('m', $m);

        $this->display();
    }
}