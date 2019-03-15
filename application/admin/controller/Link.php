<?php

namespace app\admin\controller;

use app\admin\common\Base;
use app\admin\model\Link as LinkModel;
use think\Request;

class Link extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
        $this->isLogin();
        $list=LinkModel::order('id desc')->paginate(10);
        $count=LinkModel::count();
        $this->assign('count',$count);
        $this->assign('list',$list);
        return $this->fetch();
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
        $data=$request->param();
        $res=LinkModel::create($data);
        if ($res){
            $this->success('保存成功','index');
        }else{
            $this->error('保存失败');
        }
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
        $row=LinkModel::get($id);
        $this->assign('row',$row);
        return $this->fetch();
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data=$request->param();
        $res=LinkModel::update($data);
        if ($res){
            $this->success('保存成功','index');
        }else{
            $this->error('保存失败');
        }
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
        $res=LinkModel::destroy($id);
        if ($res){
           return 1;
        }
    }
}
