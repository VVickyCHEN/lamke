<?php

namespace app\admin\controller;

use app\admin\common\Base;
use app\admin\model\Download as DownloadModel;
use think\Request;

class Download extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
        $Down=DownloadModel::order('sort','desc')->select();
        $count=DownloadModel::count();
        $this->assign('down',$Down);
        $this->assign('count',$count);
        return $this->fetch('download_list');
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
        return $this->fetch('download_add');

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
        $data=$this->request->param(true);
//        $file=$this->request->file('url');
//        // 移动到服务器的上传目录 并且使用原文件名
//        $info=$file->move(ROOT_PATH.'public/uploads');
//        $data['url']=$info->getSaveName();
        //向表中新增数据
        $res=DownloadModel::create($data);
        //判断是否新增成功
        if(is_null($res)){
            $this->error('添加失败');
        }else{
            $this->success('添加成功');
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
        $down=DownloadModel::get($id);
        //模板赋值
        $this->assign('down',$down);
        return $this->fetch('download_edit');
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
        $data=$this->request->param(true);
        $id=$data['id'];
//        //获取上传的文件对象
//        $file=$this->request->file('url');
//        //判断是否获取到文件
//        if(empty($file)){
//            $data['url']=DownloadModel::where('id',$id)->value('url');
//        }else{
//
//            //校验并上传文件
//            $info=$file->move(ROOT_PATH.'public/uploads');
//            //如果上传失败，错误提示
//            //获取保存文件名，存在image中
//            $data['url']=$info->getSaveName();
//        }

        //修改表中数据
        $res=DownloadModel::update([
            'url'=>$data['url'],
            'name'=>$data['name'],
            'sort'=>$data['sort']
        ],['id'=>$id]);
        //判断是否新增成功
        if(is_null($res)){
            $this->error('修改失败');
        }else{
            $this->success('修改成功');
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
        DownloadModel::destroy($id,true);
//        echo $id;
    }
}
