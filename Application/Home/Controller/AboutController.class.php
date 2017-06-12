<?php
namespace Home\Controller;
use Think\Controller;
class AboutController extends CommonController {
    public function index(){
        $cate = D('cate');
        $cateid = 3;
        $cateids = $cate->find($cateid);
        $this->assign('cateids' , $cateids);
        $this->display();
    }
}