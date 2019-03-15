<?php

namespace app\admin\controller;

use app\admin\common\Base;
use think\Request;
use app\admin\model\Admin;
use \think\Session;
class Login extends Base
{

    public function index()
    {
        $this->alreadyLogin();
        //渲染登录界面
        return $this -> fetch ('login');

    }

    public function check(Request $request)
    {
        //验证用户身份


        //获取一下表单提交的数据，并保存在变量中
        $data=$this->request->param();
        $userName=$data['username'];
        $password=md5($data['password']);



        //在admin 表中进行查询；以用户为条件
        $map=['username'=>$userName];
        $admin=Admin::get($map);

        //将用户名与密码分开验证
        if(is_null($admin)){
            //设置返回信息
            $this->error('用户名不正确');

        }elseif($admin->password != $password){
            $this->error('密码不正确');

        }else{
            //如果用户和密码通过了验证，即为合法用户
            //修改一下返回信息
//            echo "验证通过";

            //跟新表中登录的次数及时间
            $admin->setInc('login_count');//setInc自增1
            $admin->save(['login_time'=>time()]);

            //将用户登录信息保存在session中，供其他控制器进行登录判断
            Session::set('username',$userName);
            Session::set('user_id',$admin['id']);
            Session::set('name',$admin['name']);
            Session::set('user_info',$data);

            $this->redirect('admin/index/index');
        }

    }

    public function checkout(Request $request)
    {
        //退出登录
        session::clear();
        $this->success('退出成功','index');
    }


}
