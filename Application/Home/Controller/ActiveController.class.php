<?php
namespace Home\Controller;
use Think\Controller;
class ActiveController extends CommonController {
    public function index(){
        $cate = D('cate');
        $cateid = 2;
        $cateids = $cate->find($cateid);
        $this->assign('cateids' , $cateids);

        //分页
        $active = D('active');
        $count = $active->count();// 查询满足要求的总记录数
        $Page = new\Think\Page($count, 2);// 实例化分页类 传入总记录数和每页显示的记录数(2)
        $show = $Page->show();// 分页显示输出
        $list = $active->limit($Page->firstRow. ',' .$Page->listRows)->select();// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $this->assign('lists', $list);// 赋值数据集
        $this->assign('page', $show);// 赋值分页输出

        $this->display();
    }

    public function article()
    {
        //保持选择框常亮
        $cate = D('cate');
        $cateid = 2;
        $cateids = $cate->find($cateid);
        $this->assign('cateids', $cateids);

        $active = D('active');
        $activeid = I('id');
        $actives = $active->find($activeid);
        $this->assign('actives', $actives);

        $this->display();
    }
}