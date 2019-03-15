<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:72:"D:\phpStudy\WWW\lamke\public/../application/index\view\product\book.html";i:1526975188;s:73:"D:\phpStudy\WWW\lamke\public/../application/index\view\public\header.html";i:1552639297;s:75:"D:\phpStudy\WWW\lamke\public/../application/index\view\public\nav_cate.html";i:1526971428;s:71:"D:\phpStudy\WWW\lamke\public/../application/index\view\public\left.html";i:1526284889;s:73:"D:\phpStudy\WWW\lamke\public/../application/index\view\public\footer.html";i:1526029863;}*/ ?>
﻿<!DOCTYPE html>
<html lang="zh-cn">
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
  <!-- main -->
  <div class="container">
   <div class="row">
    <!-- right -->
    <div class="col-xs-12 col-sm-8 col-md-9" style="float:right">
     <div class="list_box">
      <h2 class="left_h"><?php echo \think\Lang::get('order'); ?></h2>
      <div class="feedback">
       <form id="myform" name="myform" class="form-horizontal" method="post" action="<?php echo url('save_order'); ?>" onsubmit="return CheckJob()">
        <div class="form-group">
         <label for="products" class="col-sm-3 control-label"><?php echo \think\Lang::get('proName'); ?>：</label>
         <div class="col-sm-6">
          <input type="text" name="product" value="<?php echo $proName; ?>" class="form-control" id="products" placeholder="必填" />
         </div>
        </div>
        <div class="form-group">
         <label for="number" class="col-sm-3 control-label"><?php echo \think\Lang::get('bookNum'); ?>：</label>
         <div class="col-sm-6">
          <input type="number" name="num" class="form-control" id="number" />
         </div>
        </div>
        <div class="form-group">
         <label for="username" class="col-sm-3 control-label"><?php echo \think\Lang::get('contact'); ?>：</label>
         <div class="col-sm-6">
          <input type="text" name="name" class="form-control" id="username" placeholder="必填" />
         </div>
        </div>
        <div class="form-group">
         <label for="company" class="col-sm-3 control-label"><?php echo \think\Lang::get('companyName'); ?>：</label>
         <div class="col-sm-6">
          <input type="text" name="company" class="form-control" id="company" />
         </div>
        </div>
        <div class="form-group">
         <label for="add" class="col-sm-3 control-label"><?php echo \think\Lang::get('msg_address'); ?>：</label>
         <div class="col-sm-6">
          <input type="text" name="address" class="form-control" id="add" />
         </div>
        </div>
        <div class="form-group">
         <label for="tel" class="col-sm-3 control-label"><?php echo \think\Lang::get('msg_phone'); ?>：</label>
         <div class="col-sm-6">
          <input type="text" name="tel" class="form-control" id="tel" placeholder="必填" />
         </div>
        </div>
        <div class="form-group">
         <label for="fax" class="col-sm-3 control-label"><?php echo \think\Lang::get('fax'); ?>：</label>
         <div class="col-sm-6">
          <input type="text" name="fax" class="form-control" id="fax" />
         </div>
        </div>
        <div class="form-group">
         <label for="inputEmail" class="col-sm-3 control-label"><?php echo \think\Lang::get('msg_email'); ?>：</label>
         <div class="col-sm-6">
          <input type="email" name="email" class="form-control" id="inputEmail" />
         </div>
        </div>
        <div class="form-group">
         <label for="contents" class="col-sm-3 control-label"><?php echo \think\Lang::get('details'); ?>：</label>
         <div class="col-sm-6">
          <textarea name="contents" class="form-control" rows="3"></textarea>
         </div>
        </div>
        <!--<div class="form-group">-->
         <!--<label for="code" class="col-xs-12 col-sm-3 control-label"><?php echo \think\Lang::get('msg_verify'); ?>：</label>-->
         <!--<div class="col-xs-7 col-sm-2">-->
          <!--<input type="text" name="code" class="form-control" id="code" placeholder="验证码" />-->
         <!--</div>-->
         <!--<div class="col-xs-2 col-sm-1">-->
          <!--<img class="codeimg" src="Picture/verify.html" onclick="this.src=this.src+&quot;?&quot;+Math.random()" />-->
         <!--</div>-->
        <!--</div>-->
        <div class="form-group" style="margin-top:30px;">
         <div class="col-sm-offset-3 col-sm-10">
          <button type="submit"  class="btn btn-danger page-btn"><?php echo \think\Lang::get('msg_submit'); ?></button>&nbsp;
          <button type="reset"  class="btn btn-default grey-btn"><?php echo \think\Lang::get('msg_reset'); ?></button>
         </div>
        </div>
        <!--<input type="hidden" name="__hash__" value="eed24c25a6aa366e1e7bb9fbb9e57116_92d86a457b4abef7cedb145c3768d560" />-->
       </form>
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
  <nav class="navbar navbar-default navbar-fixed-bottom footer_nav">
   <div class="foot_nav btn-group dropup">
    <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><span class="glyphicon glyphicon-share btn-lg" aria-hidden="true"></span> 分享</a>
    <div class="dropdown-menu webshare">
     <!-- JiaThis Button BEGIN --> 
     <div class="jiathis_style_32x32"> 
      <a class="jiathis_button_qzone"></a> 
      <a class="jiathis_button_tsina"></a> 
      <a class="jiathis_button_tqq"></a> 
      <a class="jiathis_button_weixin"></a> 
      <a class="jiathis_button_renren"></a> 
      <a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a> 
     </div> 
     <script type="text/javascript" src="Scripts/jia.js" charset="utf-8"></script> 
     <!-- JiaThis Button END -->
    </div>
   </div>
   <div class="foot_nav">
    <a href="tel:13933336666"><span class="glyphicon glyphicon-phone btn-lg" aria-hidden="true"></span>手机</a>
   </div>
   <div class="foot_nav" aria-hidden="true" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
    <span class="glyphicon glyphicon-th-list btn-lg"></span>分类
   </div>
   <div class="foot_nav">
    <a id="gototop" href="#"><span class="glyphicon glyphicon-circle-arrow-up btn-lg" aria-hidden="true"></span>顶部</a>
   </div>
  </nav>
<footer>
    <div class="copyright">
        <p>CopyRight <?php echo $system['copyright']; ?> <?php echo \think\Lang::get('title'); ?>&nbsp;ICP:<?php echo $system['icp']; ?>
            <!--<a href="/T09/c_sitemap.html" target="_blank">网站地图</a>-->
        </p>
        <p class="copyright_p"><?php echo \think\Lang::get('address'); ?>：<?php echo $system['address']; ?> &nbsp;<?php echo \think\Lang::get('Telephone'); ?>：<?php echo $system['phone_number']; ?> &nbsp;<?php echo \think\Lang::get('fax'); ?>：<?php echo $system['fax_number']; ?>&nbsp;</p>
    </div>
</footer>
  <!--客服面板-->
  <link rel="stylesheet" type="text/css" href="Css/online.css" />
  <!--<div id="cmsFloatPanel">-->
   <!--<div class="ctrolPanel">-->
    <!--<a class="service" href="#"></a>-->
    <!--<a class="message" href="#"></a>-->
    <!--<a class="qrcode" href="#"></a>-->
    <!--<a class="arrow" title="返回顶部" href="#"></a>-->
   <!--</div>-->
   <!--<div class="servicePanel">-->
    <!--<div class="servicePanel-inner">-->
     <!--<div class="serviceMsgPanel">-->
      <!--<div class="serviceMsgPanel-hd">-->
       <!--<a href="#"><span>关闭</span></a>-->
      <!--</div>-->
      <!--<div class="serviceMsgPanel-bd">-->
       <!--&lt;!&ndash;在线QQ&ndash;&gt;-->
       <!--<div class="msggroup">-->
        <!--<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=593036114&amp;site=qq&amp;menu=yes"><img class="qqimg" src="Picture/984deabfb9724779a6efe336ac0cf42b.gif" alt="QQ在线客服" />技术支持</a>-->
       <!--</div>-->
       <!--&lt;!&ndash;在线MSN&ndash;&gt;-->
       <!--<div class="msggroup">-->
        <!--<a href="msnim:chat?contact=lankecms@hotmail.com" target="blank"><img class="qqimg" src="Picture/msn.jpg" alt="MSN在线客服" />Lankecms</a>-->
       <!--</div>-->
       <!--&lt;!&ndash;在线SKYPE&ndash;&gt;-->
       <!--<div class="msggroup">-->
        <!--<a href="skype:lankecms?chat"><img class="qqimg" src="Picture/skype.gif" alt="SKYPE在线客服" />lankecms</a>-->
       <!--</div>-->
       <!--&lt;!&ndash;淘宝旺旺&ndash;&gt;-->
       <!--<div class="msggroup">-->
        <!--<a target="blank" href="http://amos.im.alisoft.com/msg.aw?v=2&amp;uid=钟若天&amp;site=cntaobao&amp;s=1&amp;charset=utf-8"><img src="Picture/online.aw" alt="点击联系我" /></a>-->
       <!--</div>-->
       <!--&lt;!&ndash;旺旺国内版&ndash;&gt;-->
       <!--<div class="msggroup">-->
        <!--<a target="_blank" href="http://amos.alicdn.com/msg.aw?v=2&amp;uid=martin7752&amp;site=cnalichn&amp;s=10&amp;charset=UTF-8"><img src="Picture/online.aw" alt="点击联系我" /></a>-->
       <!--</div>-->
       <!--&lt;!&ndash;旺旺国际版&ndash;&gt;-->
       <!--<div class="msggroup">-->
        <!--<a class="alitalk-link" data-uid="alibabatest01" target="_blank" href="http://amos.alicdn.com/msg.aw?v=2&amp;uid=alibabatest01&amp;site=enaliint&amp;s=22&amp;charset=UTF-8"><img class="qqimg" src="Picture/online.aw" alt="点击联系我" />Lankecms</a>-->
       <!--</div>-->
      <!--</div>-->
      <!--<div class="serviceMsgPanel-ft"></div>-->
     <!--</div>-->
     <!--<div class="arrowPanel">-->
      <!--<div class="arrow02"></div>-->
     <!--</div>-->
    <!--</div>-->
   <!--</div>-->
   <!--<div class="messagePanel">-->
    <!--<div class="messagePanel-inner">-->
     <!--<div class="formPanel">-->
      <!--<div class="formPanel-bd">-->
       <!--&lt;!&ndash; JiaThis Button BEGIN &ndash;&gt; -->
       <!--<div class="jiathis_style_32x32"> -->
        <!--<a class="jiathis_button_qzone"></a> -->
        <!--<a class="jiathis_button_tsina"></a> -->
        <!--<a class="jiathis_button_tqq"></a> -->
        <!--<a class="jiathis_button_weixin"></a> -->
        <!--<a class="jiathis_button_renren"></a> -->
        <!--<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a> -->
       <!--</div> -->
       <!--<script type="text/javascript" src="Scripts/jia.js" charset="utf-8"></script> -->
       <!--&lt;!&ndash; JiaThis Button END &ndash;&gt;-->
       <!--<a type="button" class="btn btn-default btn-xs" href="#" style="margin: 6px 0px 0px 10px;">关闭</a>-->
      <!--</div>-->
     <!--</div>-->
     <!--<div class="arrowPanel">-->
      <!--<div class="arrow01"></div>-->
      <!--<div class="arrow02"></div>-->
     <!--</div>-->
    <!--</div>-->
   <!--</div>-->
   <!--<div class="qrcodePanel">-->
    <!--<div class="qrcodePanel-inner">-->
     <!--<div class="codePanel">-->
      <!--<div class="codePanel-hd">-->
       <!--<span style="float:left">用手机扫描二维码</span>-->
       <!--<a href="#"><span>关闭</span></a>-->
      <!--</div>-->
      <!--<div class="codePanel-bd">-->
       <!--<img src="Picture/529c3fcc09d41.jpg" alt="二维码" />-->
      <!--</div>-->
     <!--</div>-->
     <!--<div class="arrowPanel">-->
      <!--<div class="arrow01"></div>-->
      <!--<div class="arrow02"></div>-->
     <!--</div>-->
    <!--</div>-->
   <!--</div>-->
  <!--</div>-->
  <!--<script type="text/javascript" src="Scripts/online.js"></script>-->
  <!--<script type="text/javascript">-->
<!--var winHeight=200;-->
<!--var timer=null;-->
<!--function show(){-->
    <!--document.getElementById("popWin").style.display="block"; -->
    <!--timer=setInterval("lift(5)",2);-->
<!--} -->
<!--function hid(){-->
        <!--timer=setInterval("lift(-5)",2);-->
<!--} -->
<!--function lift(n) { -->
    <!--var w=document.getElementById("popWin"); -->
    <!--var h=parseInt(w.style.height||w.currentStyle.height);-->
    <!--if (h<winHeight && n>0 || h>1 && n<0){-->
        <!--w.style.height=(h+n).toString()+"px"; -->
    <!--} -->
    <!--else-->
        <!--{-->
        <!--w.style.display=(n>0?"block":"none");-->
                <!--clearInterval(timer);-->
    <!--} -->
<!--} -->
<!--window.onload=function(){ -->
        <!--setTimeout("show()",1000);-->
<!--} -->
<!--</script>-->
  <script language="javaScript">    function CheckJob()
  {
      if (document.myform.product.value.length==""){
          alert ("产品名称不能为空！");
          document.myform.product.focus();
          return false;
      }
      if (document.myform.name.value.length==""){
          alert ("联系人不能为空！");
          document.myform.name.focus();
          return false;
      }
      if (document.myform.tel.value.length==""){
          alert ("电话不能为空！");
          document.myform.tel.focus();
          return false;
      }
  }
  </script>
  <div class="hidden-xs" id="popWin" style="width:320px;height:0px;position:absolute;right:1px;bottom:1px;border:1px solid #0066FF;display:none;background:#FFFFFF;padding:1px;z-index:99999;"> 
   <div style="background-color:#0066FF;color:#FFFFFF;padding:5px"> 
    <b>官方公告</b> 
    <span style="color:#FFFFFF;cursor:hand;position:absolute;right:10px;" onclick="hid()">&times;关闭</span> 
   </div> 
   <div style="padding:5px;color:red;font-weight:bold;font-size:14px;line-height:24px;">
    近段时间发现淘宝上，很多不法份子盗版我们的网站系统，盗版网站存在严重漏洞，请客户们谨防上当受骗。现将这些盗版店铺的旺旺名称公布如下：[英杰16899168]、[珍非凡]、[yingchai168]、[咚咚网络]、[021maixiang]、[小铺子大梦想]、[开心小煜煜哦]
   </div> 
  </div>
 </body>
</html>