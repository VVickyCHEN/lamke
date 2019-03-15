<?php
namespace app\admin\common;
use think\Controller;
use think\Session;
class Base extends Controller
{
    protected function _initialize()
    {
        parent::_initialize();
        //在公共控制器的初始化方法中，创建一个常量来判断用户是否已经登录
        define('USER_ID',Session::get('user_id'));
    }
    protected function isLogin()
    {
        //如果登录常量为NULL，表示没有登录
        if (is_null(USER_ID)) {
            $this->error('未登录，无权访问', 'login/index');
        }
    }
        //如果用户已经登录，将不允许再次登录
     protected function alreadyLogin()
    {
        //如果登录常量为null，表示没有登录
        if(!is_null(USER_ID)){
            $this->error('请不要重复登录','index/index');
        }
    }
}

?>