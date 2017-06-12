<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends CommonController
{
    public function index()
    {
        //保持选择框常亮
        $cate = D('cate');
        $cateid = 1;
        $cateids = $cate->find($cateid);
        $this->assign('cateids', $cateids);

//        $msg = D('msg');
//        $msgs = $msg->select();
//        $this->assign('msgs' , $msgs);

        //分页
        $msg = D('msg');
        $count = $msg->count();// 查询满足要求的总记录数
        $Page = new\Think\Page($count, 2);// 实例化分页类 传入总记录数和每页显示的记录数(2)
        $show = $Page->show();// 分页显示输出
        $list = $msg->limit($Page->firstRow. ',' .$Page->listRows)->select();// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $this->assign('lists', $list);// 赋值数据集
        $this->assign('page', $show);// 赋值分页输出
//        dump($list);
//        dump($show);
//        die();
        $this->display();
    }

    public function article()
    {
        //保持选择框常亮
        $cate = D('cate');
        $cateid = 1;
        $cateids = $cate->find($cateid);
        $this->assign('cateids', $cateids);

        $msg = D('msg');
        $msgid = I('id');
        $msgs = $msg->find($msgid);
        $this->assign('msgs', $msgs);
        $this->display();
    }
}