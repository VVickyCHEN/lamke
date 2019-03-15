<?php

namespace app\admin\controller;

use app\admin\common\Base;
use app\admin\model\Message as MessageModel;
use think\Request;

class Message extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
        $message=MessageModel::order('time desc')->paginate(10);
        $count=MessageModel::count();
        $this->assign('message',$message);
        $this->assign('count',$count);
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
        $row=MessageModel::get($id);
        $this->assign('row',$row);
        return $this->fetch();
    }

    public function deal($id)
    {
        //上架当前数据
        MessageModel::where('id', $id)
            ->update(['status' => '1']);
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
        MessageModel::destroy($id);
    }
    public function delAll(Request $request){
        $ids=$request->param();
        $map['id']=array('in',$ids['ids']);
        $res=MessageModel::where($map)->delete();
        if ($res){
            $this->success("删除成功",url('index'));
        }else{
            $this->error('删除失败');
        }
    }
}
