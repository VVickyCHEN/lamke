<?php

namespace app\admin\controller;
use think\Db;
use app\admin\common\Base;
use app\admin\model\Banner as BannerModel;
use think\Request;

class Banner extends base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
        //base 中的方法，判断是否有登录
        $this->isLogin();
        $picture=BannerModel::order('id')->select();
        foreach ($picture as $key =>$value){
            $picture[$key]['lang']=$picture[$key]['lang']=="cn"?"中文":"English";
        }
        $count=BannerModel::count();
        $this->assign('banner',$picture);
        $this->assign('count',$count);
        return $this->fetch('picture_list');
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
        //base 中的方法，判断是否有登录
        $this->isLogin();
        return $this->fetch('picture_add');
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
        //base 中的方法，判断是否有登录
        $this->isLogin();
        if($this->request->isPost()){
            //获取提交数据吗，true包含上传文件
            $data=$this->request->param(true);

            //获取上传的文件对象
            $file=$this->request->file('img');
            //判断是否获取到文件
            if(empty($file)){
                $this->error('请上传图片');
            }
            //限定格式
            $map=[
                'ext'=>'jpg,png',
                'size'=>3000000,
            ];
            //校验并上传文件
            $info=$file->validate($map)->move(ROOT_PATH.'public/uploads');
            //如果上传失败，错误提示
            if(is_null($info)){
                $this->error($file->getError());
            }
            //获取保存文件名，存在image中
            $data['img']=$info->getSaveName();
            //向表中新增数据
            $res=BannerModel::create($data);
            //判断是否新增成功
            if(is_null($res)){
                $this->error('添加失败');
            }else{
                $this->success('添加成功','index');
            }

        }else{
            $this->error('请求类型错误');
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
        //base 中的方法，判断是否有登录
        $this->isLogin();
        $picture=BannerModel::get($id);
        //模板赋值
        $this->assign('banner',$picture);
        return $this->fetch('picture_edit');
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
        //base 中的方法，判断是否有登录
        $this->isLogin();
        if($this->request->isPost()){
            //获取提交数据吗，true包含上传文件
            $data=$this->request->param(true);
            $id=$data['id'];
            //获取上传的文件对象
            $file=$this->request->file('img');
            //判断是否获取到文件
            if(empty($file)){
                $data['img']=BannerModel::where('id',$id)->value('img');
            }else{
                //限定格式
                $map=[
                    'ext'=>'jpg,png',
                    'size'=>3000000,
                ];
                //校验并上传文件
                $info=$file->validate($map)->move(ROOT_PATH.'public/uploads');
                //如果上传失败，错误提示
                if(is_null($info)){
                    $this->error($file->getError());
                }
                //获取保存文件名，存在image中
                $data['img']=$info->getSaveName();
            }
            try {
                $res=BannerModel::get($id);
                if ($res){
                    @unlink(ROOT_PATH . 'public/uploads/' . $res['img']);
                }
                //修改表中数据
                $res=BannerModel::update([
                    'img'=>$data['img'],
                    'name'=>$data['name'],
                    'link'=>$data['link'],
                    'lang'=>$data['lang']
                ],['id'=>$id]);
                //提交事务
                Db::commit();
//            $state = 1;//标记事务成功；拒绝成功
            } catch (\Exception $e) {
                // 回滚事务
                Db::rollback();
            }
            //判断是否新增成功
            if(is_null($res)){
                $this->error('修改失败');
            }else{
                $this->success('修改成功','index');
            }

        }else{
            $this->error('请求类型错误');
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
        //base 中的方法，判断是否有登录
        $this->isLogin();
        Db::startTrans();
        try {
            $res=BannerModel::get($id);
            if ($res){
                @unlink(ROOT_PATH . 'public/uploads/' . $res['img']);
            }
            BannerModel::destroy($id);
            //提交事务
            Db::commit();
//            $state = 1;//标记事务成功；拒绝成功
        } catch (\Exception $e) {
            // 回滚事务
            Db::rollback();
        }

    }
}
