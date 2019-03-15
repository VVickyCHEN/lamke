<?php
namespace app\admin\controller;
use app\admin\common\Base;
use app\admin\model\Admin;
use think\Request;
use \think\Session;

class Index extends Base
{
    public function index()
    {
        if (! Session::get('user_id')){
            $this->redirect("login/index");
        }
        //base 中的方法，判断是否有登录
        $this->isLogin();
        $admin_id=Session::get('user_id');

        //1.读取admin管理员的信息
        $admin=Admin::get($admin_id);
        //时间戳转换
        $last_time=$admin['login_time'];
        $admin['login_time']=date('Y/m/d H:i:s',$last_time);
        //2.将当前管理员的信息赋值给模板
        $this->view->assign('admin',$admin);

        return $this ->  fetch ('index');
    }
    public function welcome()
    {
        $admin_id=Session::get('user_id');

        //1.读取admin管理员的信息
        $admin=Admin::get($admin_id);
        //时间戳转换
        $admin['login_time']=date('Y/m/d H:i:s',$admin['login_time']);
        //2.将当前管理员的信息赋值给模板
        $this->view->assign('admin',$admin);
        return $this -> fetch ('welcome');
    }
    //管理员
    public function adminlist(){
        //是否是超级管理员,超级管理员可查看所有管理员信息
        if (Session::get('user_id')==1){
            $res=Admin::all();
        }else{
            $map['id']=array('neq',1);
            $res=Admin::where($map)->select();
        }
        $this->assign('admin',$res);
        return $this->fetch('admin_list');
    }
    public function admin_add(){
        return $this->fetch('admin_add');
    }
    public function admin_save(Request $request){
        $data=$request->param();
        $data['password']=md5($data['password']);
        $res=Admin::create($data);
        if ($res){
            $this->success('添加成功');
        }else{
            $this->error('添加失败');
        }
    }
    public function admin_edit($id){
        $res=Admin::get($id);
        $this->assign('admin',$res);
        return $this->fetch('admin_edit');
    }
    public function admin_password($id){
        $res=Admin::get($id);
        $this->assign('admin',$res);
        return $this->fetch('admin_password');
    }
    public function admin_update(Request $request){
        $data=$request->param();
        $res=Admin::update([
            'username'=>$data['username'],
            'name'=>$data['name']
        ],['id'=>$data['id']]);
        if ($res){
            echo 1;
        }else{
            echo 2;
        }
    }
    public function admin_update_password(Request $request){
        $data=$request->param();
        $data['password']=md5($data['password']);
        $res=Admin::update([
            'password'=>$data['password'],
        ],['id'=>$data['id']]);
        if ($res){
            echo 1;
        }else{
            echo 2;
        }
    }
    public function admin_delete($id){
        Admin::destroy($id);
    }
}
