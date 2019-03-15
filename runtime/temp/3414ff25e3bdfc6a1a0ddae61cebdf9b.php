<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:69:"D:\phpStudy\WWW\lamke\public/../application/index\view\news\read.html";i:1526285862;s:73:"D:\phpStudy\WWW\lamke\public/../application/index\view\public\header.html";i:1552639297;s:75:"D:\phpStudy\WWW\lamke\public/../application/index\view\public\nav_cate.html";i:1526971428;s:71:"D:\phpStudy\WWW\lamke\public/../application/index\view\public\left.html";i:1526284889;s:73:"D:\phpStudy\WWW\lamke\public/../application/index\view\public\footer.html";i:1526029863;}*/ ?>
﻿<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?php echo $system['title']; ?></title>
    <meta name="keywords" content="<?php echo $system['keyword']; ?>" />
    <meta name="description" content="<?php echo $system['description']; ?>" />
    <meta name="applicable-device" content="pc,mobile" />
    <link href="__STATIC__/Css/bootstrap.css" rel="stylesheet" />
    <link href="__STATIC__/Css/bxslider.css" rel="stylesheet" />
    <link href="__STATIC__/Css/style.css" rel="stylesheet" />
    <script src="__STATIC__/Scripts/jquery.min.js"></script>
    <script src="__STATIC__/Scripts/bxslider.min.js"></script>
    <script src="__STATIC__/Scripts/common.js"></script>
    <script src="__STATIC__/Scripts/bootstrap.js"></script>
    <!--[if lt IE 9]>
    <script src="__STATIC__/Scripts/html5shiv.min.js"></script>
    <script src="__STATIC__/Scripts/respond.min.js"></script>
    <!--[endif]-->
    <link href="__STATIC__/Css/lightbox.css" rel="stylesheet" />
    <script src="__STATIC__/Scripts/lightbox.js"></script>
    <script type="text/javascript">        $(document).ready(function(){
        $('.showpic_flash').bxSlider({
            pagerCustom: '#pic-page',
            adaptiveHeight: true,
        });

    });
    </script>
</head>
<body>
<header>
    <div class="top_menu">
        <div class="container">
            <span class="top_name"><?php echo \think\Lang::get('top_name'); ?></span>
            <div class="top_lang">
                <?php echo \think\Lang::get('top_lang'); ?>：
                <a title="中文版" lang="cn" class="lang_switch"><img src="__STATIC__/Picture/chinese.gif" alt="中文版" /></a> ∷&nbsp;
                <a title="English" lang="en" class="lang_switch"><img src="__STATIC__/Picture/english.gif" alt="英文版" /></a>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        //语言选择
        $(".lang_switch").click(function () {
            var data={'lang':$(this).attr('lang')};//该变量为对象Object {lang: "en"}

            $.get("<?php echo url('index/lang'); ?>",data,function () {
                location.reload();
            })
        })
    </script>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-8">
                <a href="http://localhost:8080"><img src="__STATIC__/Picture/53007d5b00000.png" class="logo" alt="蓝科企业网站管理系统PHP版V2.0" /></a>
            </div>
            <div id="topsearch" class="col-xs-12 col-sm-4 col-md-4">
                <form id="searchform" method="get" action="<?php echo url('product/index'); ?>">
                    <div class="input-group search_group">
                        <input type="text" name="info" class="form-control input-sm" placeholder="<?php echo \think\Lang::get('search'); ?>" />
                        <span class="input-group-btn"><span id="submit_search" onclick="searchform.submit();" title="产品搜索" class="glyphicon glyphicon-search btn-lg" aria-hidden="true"></span></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Fixed navbar -->
    <nav id="top_nav" class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                <span id="small_search" class="glyphicon glyphicon-search" aria-hidden="true"></span>
                <a class="navbar-brand" href="#"><?php echo \think\Lang::get('nav'); ?></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <!--首页-->
                    <li><a href="<?php echo url('index/index'); ?>"><?php echo \think\Lang::get('nav_home'); ?></a></li>
                    <!--简介-->
                    <li><a href="<?php echo url('index/system',['nav'=>'about']); ?>"><?php echo \think\Lang::get('nav_brief'); ?></a></li>
                    <!--产品-->
                    <li class="dropdown"><a href="<?php echo url('product/index'); ?>"><?php echo \think\Lang::get('nav_pro'); ?></a><a href="product.html" id="app_menudown" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-menu-down btn-xs"></span></a>
                        <ul class="dropdown-menu nav_small" role="menu">
                            <?php if(is_array($category) || $category instanceof \think\Collection || $category instanceof \think\Paginator): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <li><a href="<?php echo url('product/index',['cate_id'=>$vo['id']]); ?>"><?php echo $vo['cate_name']; ?></a></li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </li>
                    <!--新闻-->
                    <li class="dropdown"><a href="<?php echo url('news/index'); ?>"><?php echo \think\Lang::get('nav_news'); ?></a><a href="new.html" id="app_menudown" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-menu-down btn-xs"></span></a>
                        <ul class="dropdown-menu nav_small" role="menu">
                            <?php if(is_array($newsCate) || $newsCate instanceof \think\Collection || $newsCate instanceof \think\Paginator): $i = 0; $__LIST__ = $newsCate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <li><a href="<?php echo url('news/index',['cate_id'=>$vo['id']]); ?>"><?php echo $vo['cate_name']; ?></a></li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </li>
                    <!--&lt;!&ndash;相册&ndash;&gt;-->
                    <!--<li class="dropdown"><a href="photo.html"><?php echo \think\Lang::get('nav_album'); ?></a><a href="photo.html" id="app_menudown" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-menu-down btn-xs"></span></a>-->
                        <!--<ul class="dropdown-menu nav_small" role="menu">-->
                            <!--<li><a href="Staff-photo-album.html"><?php echo \think\Lang::get('nav_staff_album'); ?></a></li>-->
                            <!--<li><a href="Customer-Case.html"><?php echo \think\Lang::get('nav_case_album'); ?></a></li>-->
                        <!--</ul>-->
                    <!--</li>-->
                    <!--回馈-->
                    <li><a href="<?php echo url('index/system',['nav'=>'feedback']); ?>"><?php echo \think\Lang::get('feedback'); ?></a></li>
                    <!--联系我们-->
                    <li><a href="<?php echo url('index/system',['nav'=>'contact']); ?>"><?php echo \think\Lang::get('contact_us'); ?></a></li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>
</header>
  <div class="page_bg" style="background: url(__STATIC__/Images/57356d18dfece.jpg) center top no-repeat;"></div>
  <div class="container">
   <div class="row">
    <!-- right -->
    <div class="col-xs-12 col-sm-8 col-md-9" style="float:right">
     <div class="list_box">
      <div style="text-align: center"><h2 class="left_h"><?php echo $newsContent['title']; ?></h2></div>
      <div class="contents">
       <?php echo $newsContent['content']; ?>
      </div>
     </div>
    </div>
    <!-- left -->
    <div class="col-xs-12 col-sm-4 col-md-3">
        <div class="left_nav" id="categories">
    <h2 class="left_h"><?php echo \think\Lang::get('navigation'); ?></h2>
    <ul class="left_nav_ul" id="firstpane">
        <?php if(is_array($nav_cate) || $nav_cate instanceof \think\Collection || $nav_cate instanceof \think\Paginator): $i = 0; $__LIST__ = $nav_cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <li><a class="biglink" href="<?php echo url('index',['cate_id'=>$vo['id']]); ?>"><?php echo $vo['cate_name']; ?></a><span class="menu_head">+</span>
            <ul class="left_snav_ul menu_body">
                <?php if(is_array($vo['child']) || $vo['child'] instanceof \think\Collection || $vo['child'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$child): $mod = ($i % 2 );++$i;?>
                <li>
                    <a href="<?php echo url('index',['cate_id'=>$child['id']]); ?>"><?php echo $child['cate_name']; ?></a>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
</div>
        <!-- left -->

<div class="left_news">
    <h2 class="left_h"><?php echo \think\Lang::get('nav_news'); ?></h2>
    <ul class="left_news">
        <?php if(is_array($news) || $news instanceof \think\Collection || $news instanceof \think\Paginator): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <li><a href="<?php echo url('news/read',['id'=>$vo['id']]); ?>" title="<?php echo $vo['title']; ?>"><?php echo $vo['title']; ?></a></li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
</div>
<div class="index_contact">
    <h2 class="left_h"><?php echo \think\Lang::get('contact_us'); ?></h2>
    <?php echo $system['contact']; ?>
</div>
    </div>
   </div>
  </div>
<footer>
    <div class="copyright">
        <p>CopyRight <?php echo $system['copyright']; ?> <?php echo \think\Lang::get('title'); ?>&nbsp;ICP:<?php echo $system['icp']; ?>
            <!--<a href="/T09/c_sitemap.html" target="_blank">网站地图</a>-->
        </p>
        <p class="copyright_p"><?php echo \think\Lang::get('address'); ?>：<?php echo $system['address']; ?> &nbsp;<?php echo \think\Lang::get('Telephone'); ?>：<?php echo $system['phone_number']; ?> &nbsp;<?php echo \think\Lang::get('fax'); ?>：<?php echo $system['fax_number']; ?>&nbsp;</p>
    </div>
</footer>

  <script type="text/javascript">
// var winHeight=200;
// var timer=null;
// function show(){
//     document.getElementById("popWin").style.display="block"; 
//     timer=setInterval("lift(5)",2);
// } 
// function hid(){
//         timer=setInterval("lift(-5)",2);
// } 
// function lift(n) { 
//     var w=document.getElementById("popWin"); 
//     var h=parseInt(w.style.height||w.currentStyle.height);
//     if (h<winHeight && n>0 || h>1 && n<0){
//         w.style.height=(h+n).toString()+"px"; 
//     } 
//     else
//         {
//         w.style.display=(n>0?"block":"none");
//                 clearInterval(timer);
//     } 
// } 
// window.onload=function(){ 
//         setTimeout("show()",1000);
// } 
</script> 

 </body>
</html>