<?php
namespace Admin\Controller;

use Think\Controller;

class CateController extends BaseController
{
    public function lists()
    {
//        $cate = D('cate');
//        $cates = $cate->select();
//        $this->assign('cates', $cates);

        //分页
        $cate = D('cate');
        $count = $cate->count();// 查询满足要求的总记录数
        $Page = new\Think\Page($count, 4);// 实例化分页类 传入总记录数和每页显示的记录数(2)
        $show = $Page->show();// 分页显示输出
        $list = $cate->limit($Page->firstRow . ',' . $Page->listRows)->select();// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $this->assign('cates', $list);// 赋值数据集
        $this->assign('page', $show);// 赋值分页输出

        $this->display();
    }

    public function insert()
    {
        $cate = D('cate');//实例化数据库

        if (IS_POST) {
            $data['column'] = I('column');

            if ($cate->create($data)) {
                if ($cate->add()) {
                    $this->success('新增栏目成功', U(lists));
                } else {
                    $this->error('新增栏目失败');
                }
            } else {
                $this->error($cate->getError());
            }
            return;
        }

        $this->display();
    }

    public function del()
    {
        $cate = D('cate');
        $id = $_GET['id'];  //判断id是数组还是一个数值
        if (is_array($id)) {
            $where = 'id in(' . implode(',', $id) . ')';
        } else {
            $where = 'id=' . $id;
        }
//        dump($where);
//        die();
        $list = $cate->where($where)->delete();
        if ($list !== false) {
            $this->success("成功删除{$list}条！", U("lists"));
        } else {
            $this->error('删除失败！');
        }
//        if ($cate->delete(I('id'))) {
//            $this->success("删除栏目成功", U(lists));
//        } else {
//            $this->error("删除栏目失败");
//        }
        return;
        $this->display();
    }

    public function edit()
    {
        $cate = D('cate');//实例化数据库

        if (IS_POST) {
            $data['id'] = I('id');
            $data['column'] = I('column');

            if ($cate->create($data)) {
                if ($cate->save()) {
                    $this->success('修改栏目成功', U(lists));
                } else {
                    $this->error('修改栏目失败');
                }
            } else {
                $this->error($cate->getError());
            }
            return;
        }
        $cateid = I('id');
        $m = $cate->find($cateid);
        $this->assign('m', $m);

        $this->display();
    }
}