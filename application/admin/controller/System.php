<?php

namespace app\admin\controller;

use think\Db;
use app\admin\common\Base;
use app\admin\model\System as SystemModel;
use think\Request;

class System extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
        $this->assign('system', SystemModel::get(1));
        return $this->fetch('system_base');
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request $request
     * @return \think\Response
     */
    public function update(Request $request)
    {
        //
        $this->isLogin();
        if ($request->param()) {
            //获取提交数据吗，true包含上传文件
            $data = $this->request->param(true);
            $id = $data['id'];
            //获取上传的文件对象
            $file = $this->request->file('logo_cn');
            $file1 = $this->request->file('logo_en');
            //判断是否获取到文件
            //logo_cn 当没有传来数据时获取数据库数据，
            if (empty($file)) {
                $data['logo_cn'] = SystemModel::where('id', $id)->value('logo_cn');
            } else {

                //限定格式
                $map = [
                    'ext' => 'jpg,png',
                    'size' => 3000000,
                ];
                //校验并上传文件
                $info = $file->validate($map)->move(ROOT_PATH . 'public/uploads');
                //如果上传失败，错误提示
                if (is_null($info)) {
                    $this->error($file->getError());
                }
                //获取保存文件名，存在image中
                $data['logo_cn'] = $info->getSaveName();
            }
            //logo_en
            if (empty($file1)) {
                $data['logo_en'] = SystemModel::where('id', $id)->value('logo_en');
            } else {
                //限定格式
                $map = [
                    'ext' => 'jpg,png',
                    'size' => 3000000,
                ];
                //校验并上传文件
                $info = $file1->validate($map)->move(ROOT_PATH . 'public/uploads');
                //如果上传失败，错误提示
                if (is_null($info)) {
                    $this->error($file1->getError());
                }
                //获取保存文件名，存在image中
                $data['logo_en'] = $info->getSaveName();
            }
            //修改表中数据
            $res = SystemModel::update([
                'title_cn' => $data['title_cn'],
                'keyword' => $data['keyword'],
                'description' => $data['description'],
                'logo_cn' => $data['logo_cn'],
                'logo_en' => $data['logo_en'],
                'copyright' => $data['copyright'],
                'icp' => $data['icp'],
                'title_en' => $data['title_en'],
                'baidu_count' => $data['baidu_count'],
                'address_cn' => $data['address_cn'],
                'address_en' => $data['address_en'],
                'phone_number' => $data['phone_number'],
                'fax_number' => $data['fax_number'],
            ], ['id' => $id]);
            //提交事务
            //判断是否新增成功
            if (is_null($res)) {
                $this->error('修改失败');
            } else {
                $this->success('修改成功');
            }

        } else {
            $this->error('请求类型错误');
        }
    }
    /**
     * 显示网站简介、联系方式编辑资源
     *
     */
    public function profile(){
        $sys=SystemModel::where(array('id'=>1))->field('profile_cn,profile_en,contact_cn,contact_en')->find();
        $this->assign('system',$sys);
        return $this->fetch('system_profile');
    }
    /**
     * 保存更新网站简介、联系方式资源
     *
     * @param  \think\Request $request
     * @return \think\Response
     */
    public function proUpdate(Request $request){
        $data=$request->param();
        $res=SystemModel::update([
            'profile_cn'=>$data['profile_cn'],
            'profile_en'=>$data['profile_en'],
            'contact_cn'=>$data['contact_cn'],
            'contact_en'=>$data['contact_en'],
        ],['id'=>1]);
        if (is_null($res)) {
            $this->error('修改失败');
        } else {
            $this->success('修改成功');
        }
    }

}
