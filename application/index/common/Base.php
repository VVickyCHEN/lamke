<?php
namespace app\index\common;
use think\Controller;
use think\db;
use think\Request;

class Base extends Controller
{
    /**
     *标记当前选择的语言
     */
    public function lang(){
        switch ($_GET['lang']){
            case 'en':
                cookie('think_var','en-us');
                break;
            case 'cn':
                cookie('think_var','zh-cn');
                break;
        }
    }
    /**
     *获取当前语言方法
     */
    protected function getLang(){
        if (cookie('think_var') == "en-us") {
            $lang="en";
        } else {
            $lang="cn";
        }
        return $lang;
    }
    /**
     *获取网站基本信息
     */
	protected function getBase(){
        $lang=$this->getLang();
        if ($lang=="cn") {
            $length="1000";
        } else {
            $length="600";
        }
        //网站信息、公司简介
        $system = Db::table('System')->where('id=1')->field("profile_".$lang.",logo_".$lang.",title_".$lang.",address_".$lang. ",keyword,description,copyright,baidu_count,icp,phone_number,fax_number")->find();
        $system['profile'] = mb_substr($system['profile_'.$lang], 0, $length, 'utf-8');
        $system['logo'] = $system['logo_'.$lang];
        $system['title'] = $system['title_'.$lang];
        $system['address'] = $system['address_'.$lang];
        return $system;
    }
    /**
     *获取导航栏分类信息
     * 当前分类表  $cate
     */
    protected function getNavCate($cate){
	    $lang=$this->getLang();
        $category=Db::table($cate)->where('pid=0')->select();
        foreach ($category as $key=>$value){
            $category[$key]['cate_name']=$value['cate_name_'.$lang];
            $category[$key]['child']=array();
            $child_cate=Db::table($cate)->where('pid',$value['id'])->select();
            foreach ($child_cate as $k => $v){
                $child_cate[$k]['cate_name']=$v['cate_name_'.$lang];
            }
            if ($child_cate){
                $category[$key]['child']=$child_cate;
            }

        }
        return $category;
    }
    protected function getNewsList($recommend,$op)
    {
        $lang=$this->getLang();
        if ($recommend==1){
            $map['recommend']=1;
            $row=5;
        }else{
            if ($op!='all'){
                $map['cate_id']=$op;
            }else{
                $map="";
            }
            $row="";
        }
        $news = Db::table('News')->where($map)->order('time desc')->limit($row)->field("id,title_" . $lang . ",time,abstract_" . $lang)->select();
        foreach ($news as $key => $value) {
            $news[$key]['title'] = $value['title_' . $lang];
            $news[$key]['abstract'] = $value['abstract_' . $lang];
        }
        return $news;
    }
}
?>