<?php

namespace app\index\controller;

use app\admin\model\System;
use app\index\common\Base;
use app\admin\model\News_cate;
use app\admin\model\News as NewsModel;
use think\Request;

class News extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //op=all||cate_id
        $cate_id = $this->request->param('cate_id');
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
        //左边导航
        $nav_cate = $this->getNavCate($cate = 'News_cate');
        //新闻推荐列表
        $news = $this->getNewsList(1, "");
        //新闻列表
//        $newsList = $this->getNewsList(0, $op);
        $map['status']=1;
        if ($cate_id=="") {
            if ($lang == "cn") {
                $cate_title = "新闻中心";//标题
            } else {
                $cate_title = "News Center";
            }
        } else {
            $cate_title = News_cate::where(array('id' => $cate_id))->value('cate_name_' . $lang);
            $map['cate_id']=$cate_id;
        }
        //新闻列表
        $newsList=NewsModel::where($map)->paginate('10');
        foreach ($newsList as $key =>$value){
            $newsList[$key]['title']=$value['title_'.$lang];
        }
        $this->assign('system', $system);
        $this->assign('category', $category);
        $this->assign('newsCate', $newsCate);
        $this->assign('nav_cate', $nav_cate);
        $this->assign('news', $news);
        $this->assign('newsList', $newsList);
        $this->assign('cate_title', $cate_title);
        return $this->fetch();
    }
    /**
     * 显示指定的资源
     *
     * @param  int $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
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
        //左边导航
        $nav_cate = $this->getNavCate($cate = 'News_cate');
        //新闻推荐列表
        $news = $this->getNewsList(1, "");
//        新闻详情
        $newsContent = NewsModel::get($id);
        $newsContent['title'] = $newsContent['title_' . $lang];
        $newsContent['content'] = $newsContent['content_' . $lang];
        $this->assign('system', $system);
        $this->assign('category', $category);
        $this->assign('newsCate', $newsCate);
        $this->assign('nav_cate', $nav_cate);
        $this->assign('news', $news);
        $this->assign('newsContent', $newsContent);
        return $this->fetch();
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request $request
     * @param  int $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
