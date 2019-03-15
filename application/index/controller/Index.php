<?php

namespace app\index\controller;

use app\admin\model\Banner;
use app\admin\model\Product;
use app\admin\model\Message;
use app\admin\model\System;
use app\admin\model\Link;
use app\index\common\Base;
use think\Request;

class Index extends base
{
    public function index()
    {
        //获取当前语言标记
        $lang = $this->getLang();
        var_dump($lang);
        $map = array('lang' => $lang);
        //轮播图
        $ban = Banner::where($map)->select();
        //产品中心
        $product = Product::where('recommend=1')->order('time desc')->field("id,name_" . $lang . ",simg")->limit(8)->select();
        foreach ($product as $key => $value) {
            $product[$key]['name'] = $value['name_' . $lang];
        }
        //新闻中心
        $news = $this->getNewsList(1,'');
        //获取基本信息
        $system = $this->getBase();
        //获取产品分类
        $category = $this->getNavCate($cate = 'Category');
        //获取新闻分类
        $newsCate = $this->getNavCate($cate = 'News_cate');
        //友情链接
        $link=Link::all();
        foreach ($link as $key =>$value){
            $link[$key]['link_name']=$value['link_name_'.$lang];
        }
        $this->assign('link',$link);
        $this->assign('ban', $ban);
        $this->assign('system', $system);
        $this->assign('product', $product);
        $this->assign('category', $category);
        $this->assign('news', $news);
        $this->assign('newsCate', $newsCate);
        return $this->fetch();
    }

    //关于我们、联系方式、在线留言
    public function system()
    {
        //nav=about||contact
        $nav = $this->request->param('nav');
        //获取基本信息
        $lang = $this->getLang();
        //网站信息、公司简介
        $system = System::where('id=1')->field("profile_" . $lang . ",logo_" . $lang . ",title_" . $lang . ",address_" . $lang . ",contact_" . $lang . ",keyword,description,copyright,baidu_count,icp,phone_number,fax_number")->find();
        $system['profile'] = $system['profile_' . $lang];
        $system['logo'] = $system['logo_' . $lang];
        $system['title'] = $system['title_' . $lang];
        $system['address'] = $system['address_' . $lang];
        $system['contact'] = $system['contact_' . $lang];
        if ($nav=="about"){
            $content=$system['profile'];
        }else if ($nav=="contact"){
            $content=$system['contact'];
        }
//        $system=$this->getBase();
        //获取产品分类
        $category = $this->getNavCate($cate = 'Category');
        //获取新闻分类
        $newsCate = $this->getNavCate($cate = 'News_cate');
        //新闻列表
        $news = $this->getNewsList(1,'');
        $this->assign('system', $system);
        $this->assign('category', $category);
        $this->assign('newsCate', $newsCate);
        $this->assign('news', $news);
        $this->assign('nav',$nav);

        if ($nav!="feedback"){
            $this->assign('content',$content);
            return $this->fetch();
        }else{
            return $this->fetch('Feedback');
        }

    }
    public function save_mes(Request $request){
        $data=$request->param();
        $res=Message::create($data);
        $res->save(['time'=>time()]);
        if ($res){
            $this->success("提交成功",url('index/index'));
        }else{
            $this->error('提交失败');
        }
    }

}
