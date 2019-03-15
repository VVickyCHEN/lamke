<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:71:"D:\phpStudy\WWW\lamke\public/../application/index\view\index\index.html";i:1527142190;s:73:"D:\phpStudy\WWW\lamke\public/../application/index\view\public\header.html";i:1552642761;s:73:"D:\phpStudy\WWW\lamke\public/../application/index\view\public\footer.html";i:1526029863;}*/ ?>
﻿<!DOCTYPE html>
<html>
<head>
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

                        <span class="input-group-btn">
                            <span id="submit_search" onclick="searchform.submit();" title="产品搜索" class="glyphicon glyphicon-search btn-lg" aria-hidden="true">
                                
                            </span>
                        </span>

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
  <!-- bxslider -->
  <div class="flash">
   <ul class="bxslider">
    <?php if(is_array($ban) || $ban instanceof \think\Collection || $ban instanceof \think\Paginator): $i = 0; $__LIST__ = $ban;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <li><a href="<?php echo $vo['link']; ?>"><img src="__ROOT__/uploads/<?php echo $vo['img']; ?>" alt="<?php echo $vo['name']; ?>" /></a></li>
    <?php endforeach; endif; else: echo "" ;endif; ?>
   </ul>
  </div>
  <script type="text/javascript"> 
     $('.bxslider').bxSlider({
      adaptiveHeight: true,
      infiniteLoop: true,
      hideControlOnEnd: true,
      auto:true
    });
</script>
<!--产品-->
<?php if($product): ?>
  <div class="container">
   <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
     <div class="product_index">
      <div class="product_head" data-move-y="-40px">
       <h2><?php echo \think\Lang::get('nav_pro'); ?></h2>
       <p>PRODUCT DISPLAY</p>
      </div>
      <div class="product_list">
       <?php if(is_array($product) || $product instanceof \think\Collection || $product instanceof \think\Paginator): $i = 0; $__LIST__ = $product;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
       <div class="col-sm-4 col-md-3 col-mm-6 product_img" data-move-y="200px">
        <a href=" <?php echo url('product/read',['id'=>$vo['id']]); ?>"><img src="__ROOT__/uploads/<?php echo $vo['simg']; ?>" class="img-thumbnail" alt="" /></a>
        <p class="product_title"><a href="<?php echo url('product/read',['id'=>$vo['id']]); ?>" title="<?php echo $vo['name']; ?>"><?php echo $vo['name']; ?> </a></p>
       </div>
       <?php endforeach; endif; else: echo "" ;endif; ?>
      </div>
     </div>
    </div>
   </div>
  </div>
<?php endif; ?>
  <div class="advantage" style="background-image: url(__STATIC__/Images/57344e66ec33d.jpg);">
   <div class="advantage_head" data-move-y="-50px">
    <p><?php echo \think\Lang::get('advantage'); ?></p>
    <!--<h2>我们的优势</h2>-->
   </div>
   <div class="container advantage_list">
    <div class="row">
     <div class="col-sm-6 col-md-6 advantage_col" data-move-y="200px">
      <div class="col-sm-3 col-md-3">
       <a href="http://v2.lankecms.comproduct.html" target="_blank"><img src="__STATIC__/Picture/58dccd9f04f1a.png" alt="10年生产设计经验" /></a>
      </div>
      <div class="col-sm-9 col-md-9">
       <h4><a href="http://v2.lankecms.comproduct.html" target="_blank">10年生产设计经验</a></h4>
       <span>深圳市科技有限公司位于美丽富饶的中国广东省深圳市松岗溪头 工业区，深圳市科技有限公司</span>
      </div>
     </div>
     <div class="col-sm-6 col-md-6 advantage_col" data-move-y="200px">
      <div class="col-sm-3 col-md-3">
       <a href="http://v2.lankecms.comAbout-us.html" target="_blank"><img src="__STATIC__/Picture/58dcce28f17d5.png" alt="专业的开发设计团队" /></a>
      </div>
      <div class="col-sm-9 col-md-9">
       <h4><a href="http://v2.lankecms.comAbout-us.html" target="_blank">专业的开发设计团队</a></h4>
       <span>深圳市科技有限公司位于美丽富饶的中国广东省深圳市松岗溪头 工业区，深圳市科技有限公司</span>
      </div>
     </div>
     <div class="col-sm-6 col-md-6 advantage_col" data-move-y="200px">
      <div class="col-sm-3 col-md-3">
       <a href="http://v2.lankecms.comContact-us.html" target="_blank"><img src="__STATIC__/Picture/58dcce4f97f0f.png" alt="强大的产品销售团队​" /></a>
      </div>
      <div class="col-sm-9 col-md-9">
       <h4><a href="http://v2.lankecms.comContact-us.html" target="_blank">强大的产品销售团队​</a></h4>
       <span>深圳市科技有限公司位于美丽富饶的中国广东省深圳市松岗溪头 工业区，深圳市科技有限公司</span>
      </div>
     </div>
     <div class="col-sm-6 col-md-6 advantage_col" data-move-y="200px">
      <div class="col-sm-3 col-md-3">
       <a href="http://v2.lankecms.comContact-us.html" target="_blank"><img src="__STATIC__/Picture/58dcce794024d.png" alt="贴心的售后服务​" /></a>
      </div>
      <div class="col-sm-9 col-md-9">
       <h4><a href="http://v2.lankecms.comContact-us.html" target="_blank">贴心的售后服务​</a></h4>
       <span>深圳市科技有限公司位于美丽富饶的中国广东省深圳市松岗溪头 工业区，深圳市科技有限公司</span>
      </div>
     </div>
    </div>
   </div>
  </div>
  <div id="about_us" class="container about_index">
   <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
     <div class="about_head" data-move-y="50px">
      <h2>ABOUT US</h2>
      <span><?php echo \think\Lang::get('nav_brief'); ?></span>
     </div>
     <div class="about_content" data-move-y="-80px">
      <p><img align="left" src="__STATIC__/Picture/about.png" alt="公司简介" /></p>
      <p class="about_contents"><?php echo $system['profile']; ?>...</p>
      <p></p>
      <a href="<?php echo url('index/system',['nav'=>'about']); ?>" class="btn btn-info" role="button"><?php echo \think\Lang::get('details'); ?></a>
     </div>
    </div>
   </div>
  </div>
  <!--<div class="case_box">-->
   <!--<div class="container">-->
    <!--<div class="row">-->
     <!--<div class="col-xs-12 col-sm-12 col-md-12">-->
      <!--<div class="case_head" data-move-y="-50px">-->
       <!--<h2><?php echo \think\Lang::get('success_case'); ?></h2>-->
       <!--&lt;!&ndash;<p>SUCCESSFUL CASE</p>&ndash;&gt;-->
      <!--</div>-->
      <!--<div class="case_list">-->
       <!--<div class="col-sm-4 col-md-3 col-mm-6 product_img" data-move-y="200px">-->
        <!--<a href="photo/photo-1-90.html"><img src="__STATIC__/Picture/53086b2ce02c5.jpg" class="img-thumbnail" alt="员工员工01" /></a>-->
        <!--<p class="product_title"><a href="photo/photo-1-90.html" title="员工员工01">员工员工01</a></p>-->
       <!--</div>-->
       <!--<div class="col-sm-4 col-md-3 col-mm-6 product_img" data-move-y="200px">-->
        <!--<a href="photo/phototest6.html"><img src="__STATIC__/Picture/53086b2ce02c5.jpg" class="img-thumbnail" alt="员工员工02" /></a>-->
        <!--<p class="product_title"><a href="photo/phototest6.html" title="员工员工02">员工员工02</a></p>-->
       <!--</div>-->
       <!--<div class="col-sm-4 col-md-3 col-mm-6 product_img" data-move-y="200px">-->
        <!--<a href="photo/phototest7.html"><img src="__STATIC__/Picture/53086b2ce02c5.jpg" class="img-thumbnail" alt="测试测试测试相册" /></a>-->
        <!--<p class="product_title"><a href="photo/phototest7.html" title="测试测试测试相册">测试测试测试相册</a></p>-->
       <!--</div>-->
      <!--</div>-->
     <!--</div>-->
    <!--</div>-->
   <!--</div>-->
  <!--</div>-->
  <div class="container">
   <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
     <div class="news_head" data-move-y="-50px">
      <h2><?php echo \think\Lang::get('nav_news'); ?></h2>
      <!--<p>NEWS CENTER</p>-->
     </div>
     <ul class="news_index" data-move-y="200px">
      <?php if(is_array($news) || $news instanceof \think\Collection || $news instanceof \think\Paginator): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
      <li><span><strong><?php echo date("d",$vo['time']); ?></strong><i><?php echo date("Y-m",$vo['time']); ?></i></span><a href="<?php echo url('news/read',['id'=>$vo['id']]); ?>" title="<?php echo $vo['title']; ?>"><?php echo $vo['title']; ?></a><br /><em><?php echo $vo['abstract']; ?></em></li>
     <?php endforeach; endif; else: echo "" ;endif; ?>
     </ul>
    </div>
   </div>
  </div>
<?php if($link): ?>
  <div class="link_box">
   <div class="container">
    <span class="link_title"><?php echo \think\Lang::get('link'); ?></span>
    <button id="link_btn" class="glyphicon glyphicon-plus" aria-hidden="true"></button>
    <span class="link_list">
     <?php if(is_array($link) || $link instanceof \think\Collection || $link instanceof \think\Paginator): $i = 0; $__LIST__ = $link;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
     <a target="_blank" href="<?php echo $vo['link']; ?>"><?php echo $vo['link_name']; ?></a>
     <?php endforeach; endif; else: echo "" ;endif; ?>
    </span>
   </div>
  </div>
<?php endif; ?>
  <script src="__STATIC__/Scripts/jquery.smoove.min.js"></script>
  <script>
  $('.product_head,.product_img,.advantage_head,.advantage_col,.about_head,.about_content,.case_head,.news_head,.news_index').smoove({offset:'10%'});
  </script>
<footer>
    <div class="copyright">
        <p>CopyRight <?php echo $system['copyright']; ?> <?php echo \think\Lang::get('title'); ?>&nbsp;ICP:<?php echo $system['icp']; ?>
            <!--<a href="/T09/c_sitemap.html" target="_blank">网站地图</a>-->
        </p>
        <p class="copyright_p"><?php echo \think\Lang::get('address'); ?>：<?php echo $system['address']; ?> &nbsp;<?php echo \think\Lang::get('Telephone'); ?>：<?php echo $system['phone_number']; ?> &nbsp;<?php echo \think\Lang::get('fax'); ?>：<?php echo $system['fax_number']; ?>&nbsp;</p>
    </div>
</footer>
  <!--客服面板-->

  <script type="text/javascript" src="__STATIC__/Scripts/online.js"></script>
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