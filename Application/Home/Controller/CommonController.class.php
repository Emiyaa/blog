<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {
    public function __construct(){
        parent::__construct();
        $this->nav();
        $this->pop();
    }

    public function nav(){
        $cate = D('cate');
        $cates = $cate->select();
        $this->assign('cates', $cates);
//        $this->display();
    }

    public function pop(){
        $active = D('active');
        $where['recommend'] = 1;
        $recommend = $active->where($where)->limit(2)->select();
        $this->assign('recommend' , $recommend);
    }
}