<?php
namespace Admin\Controller;

use Think\Controller;

class LoginController extends Controller
{

    public function login()
    {
        if (isset($_SESSION['username'])) {
            //已登陆
            $this->redirect('Index/index');
        } else {
            //未登录
            if (IS_POST) {
                //提交登陆数据
                $data['username'] = I('post.username');
                $data['password'] = I('post.password');

                // $verify = I('param.verify','');  
                // if(!check_verify($verify)){  
                //     $this->error("亲，验证码输错了哦！",$this->site_url,4);  
                // }  

                $code = I('code');                //这是提取页面上打字输入的code即验证码
                if (check_verify($code) == false) {       //给function.php中定义的函数check_code，然后它返回真假
                    $this->error('验证码错误');
                } else {
                    $user = M('user')->where($data)->find();
                    if ($user == null) {
                        //用户不存在或密码错误
                        $this->error('用户不存在或密码错误');
                    } else {
                        $_SESSION = $user;
                        $this->redirect('Index/index');
                    }
                }
            } else {
                //普通访问
                $this->display();
            }
        }
    }

    public function edit()
    {
        $user = D('user');

        if (IS_POST) {
            $data['id'] = I('id');
            $data['username'] = I('username');
            $data['oldpassword'] = I('oldpassword');
            $data['password'] = I('password');
            $data['cnewpassword'] = I('cnewpassword');
            // dump($data);die();


            //c=查找数据库中用户
            $where['username'] = I('username');
            $userdata = M('user')->where($where)->find();
            // dump($userdata);
            // echo "22";
            // dump($data);
            // die();

            //开始验证密码

            //原密码等于数据库中密码
            if ($data['oldpassword'] == $userdata['password']) {
                //新密码=确认新密码
                if ($data['user_password'] == $data['cnewpassword']) {
                    //修改数据库中密码
                    if ($user->create($data)) {
                        if ($user->save()) {
                            $this->success('修改密码成功', U('Index/index'));
                        } else {
                            $this->error('修改密码失败');
                        }
                    } else {
                        $this->error($user->getError());
                    }
                } else {
                    $this->error('新密码不相同，请重新输入!');
                }
                // echo "密码匹配正确";
            } else {
                $this->error('原密码不正确，请重新输入原密码!');
            }
            return;
        }

        $userid = I('id');
        $users = $user->find($userid);

        // dump($users);die;
        $this->assign('users', $users);
        $this->display();
    }

    //验证码
    public function verify()
    {
        $Verify = new \Think\Verify();
        $Verify->length = 4;
        $Verify->entry();
    }


    //退出
    public function logout()
    {
        session_destroy();
        $this->success('注销成功，并跳转至前台', U('Home/Index/index'));

    }

}//尾巴