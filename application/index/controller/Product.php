<?php

namespace app\index\controller;

use app\admin\model\System;
use app\admin\model\Category;
use app\admin\model\Product as ProductModel;
use app\admin\model\Order;
use app\index\common\Base;
use think\Request;

class Product extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index(Request $request)
    {
        //搜索
        //根据前端的name的命名info的关键字
        $info=$request->param('info');
        if ($info){
            $map['name_cn|name_en']=array('like','%' . $info . '%');
        }

        $cate_id=$request->param('cate_id');

        //获取cookie保存的language
        $lang = $this->getLang();
        //网站信息、公司简介
        $system = System::where('id=1')->field("profile_" . $lang . ",logo_" . $lang . ",title_" . $lang . ",address_" . $lang . ",contact_" . $lang . ",keyword,description,copyright,baidu_count,icp,phone_number,fax_number")->find();
        $system['profile'] = $system['profile_' . $lang];
        $system['logo'] = $system['logo_' . $lang];
        $system['title'] = $system['title_' . $lang];
        $system['address'] = $system['address_' . $lang];
        $system['contact'] = $system['contact_' . $lang];
//        $system=$this->getBase();

        //获取产品分类
        $category = $this->getNavCate($cate = 'Category');
        //获取新闻分类
        $newsCate = $this->getNavCate($cate = 'News_cate');
        $nav_cate = $this->getNavCate($cate = 'Category');
        //新闻推荐列表
        $news = $this->getNewsList(1, "");
        //产品列表
        $map['status']=1;
        if ($cate_id=="") {
            if ($lang == "cn") {
                $cate_title = "产品中心";//标题
            } else {
                $cate_title = "Product Center";
            }
        } else {
            $cate_title = Category::where(array('id' => $cate_id))->value('cate_name_' . $lang);
            $map['cate_id']=$cate_id;
        }
        //新闻列表
        $proList=ProductModel::where($map)->paginate('8');
        foreach ($proList as $key=>$value){
            $proList[$key]['name']=$value['name_'.$lang];
            $proList[$key]['details']=$value['details_'.$lang];
            $proList[$key]['desc']=$value['desc_'.$lang];
        }
        $this->assign('system', $system);
        $this->assign('category', $category);
        $this->assign('newsCate', $newsCate);
        $this->assign('nav_cate', $nav_cate);
        $this->assign('cate_title',$cate_title);
        $this->assign('news', $news);
        $this->assign('list',$proList);
        return $this->fetch();
    }

    /**
     * 显示订购资源表单页.
     *
     * @return \think\Response
     */
    public function book()
    {
        //
        $lang=$this->getLang();
        //网站信息、公司简介
        $system = System::where('id=1')->field("profile_" . $lang . ",logo_" . $lang . ",title_" . $lang . ",address_" . $lang . ",contact_" . $lang . ",keyword,description,copyright,baidu_count,icp,phone_number,fax_number")->find();
        $system['profile'] = $system['profile_' . $lang];
        $system['logo'] = $system['logo_' . $lang];
        $system['title'] = $system['title_' . $lang];
        $system['address'] = $system['address_' . $lang];
        $system['contact'] = $system['contact_' . $lang];
//        $system=$this->getBase();
        //获取产品分类
        $category = $this->getNavCate($cate = 'Category');
        //获取新闻分类
        $newsCate = $this->getNavCate($cate = 'News_cate');
        $nav_cate = $this->getNavCate($cate = 'Category');
        //新闻推荐列表
        $news = $this->getNewsList(1, "");
        $id=$this->request->param('id');
        $proName=ProductModel::where('id',$id)->value('name_'.$lang);
        $this->assign('proName',$proName);
        $this->assign('system', $system);
        $this->assign('category', $category);
        $this->assign('newsCate', $newsCate);
        $this->assign('nav_cate', $nav_cate);
        $this->assign('news', $news);
        return $this->fetch();
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save_order(Request $request)
    {
        //
        $data=$request->param();
        $res=Order::create($data);
        $res->save(['time'=>time()]);
        if ($res){
            $this->success("提交成功",url('index/index'));
        }else{
            $this->error('提交失败');
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
        //获取基本信息
        $lang = $this->getLang();
        //网站信息、公司简介
        $system = System::where('id=1')->field("profile_" . $lang . ",logo_" . $lang . ",title_" . $lang . ",address_" . $lang . ",contact_" . $lang . ",keyword,description,copyright,baidu_count,icp,phone_number,fax_number")->find();
        $system['profile'] = $system['profile_' . $lang];
        $system['logo'] = $system['logo_' . $lang];
        $system['title'] = $system['title_' . $lang];
        $system['address'] = $system['address_' . $lang];
        $system['contact'] = $system['contact_' . $lang];
//        $system=$this->getBase();
        //获取产品分类
        $category = $this->getNavCate($cate = 'Category');
        //获取新闻分类
        $newsCate = $this->getNavCate($cate = 'News_cate');
//        左边导航
        $nav_cate = $this->getNavCate($cate = 'Category');
        //新闻推荐列表
        $news = $this->getNewsList(1, "");

//        产品详情
        $product=ProductModel::get($id);
        //        分类标题
        $cate_title=Category::where('id',$product['cate_id'])->value('cate_name_'.$lang);
//        产品轮播图
        $pic=substr($product['image'],0,-1);
        $product['image']=explode(',',$pic);
        //产品名称、详情、介绍、中英文设置
        $product['name']=$product['name_'.$lang];
        $product['details']=$product['details_'.$lang];
        $product['desc']=$product['desc_'.$lang];
        $this->assign('cate_title',$cate_title);
        $this->assign('pro',$product);
        $this->assign('system', $system);
        $this->assign('category', $category);
        $this->assign('newsCate', $newsCate);
        $this->assign('nav_cate', $nav_cate);
        $this->assign('news', $news);
        return $this->fetch('details');
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
    }
}
