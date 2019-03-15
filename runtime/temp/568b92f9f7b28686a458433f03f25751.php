<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:78:"D:\phpStudy\WWW\lamke\public/../application/admin\view\system\system_base.html";i:1525416354;s:71:"D:\phpStudy\WWW\lamke\public/../application/admin\view\public\meta.html";i:1526891573;s:73:"D:\phpStudy\WWW\lamke\public/../application/admin\view\public\footer.html";i:1521095340;}*/ ?>
﻿<!DOCTYPE HTML>
<html lang="cn">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/favicon.ico" >
<link rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="__STATIC__/lib/html5shiv.js"></script>
<script type="text/javascript" src="__STATIC__/lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="__STATIC__/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="__STATIC__/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="__STATIC__/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="__STATIC__/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="__STATIC__/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="__STATIC__/lib/DD_belatedPNG_0.0.8a-min.js" ></script>

<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>基本设置</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
	<span class="c-gray en">&gt;</span>
	系统管理
	<span class="c-gray en">&gt;</span>
	基本设置
	<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<div class="page-container">
	<div class="form form-horizontal" id="form-article-add">
		<form action="<?php echo url('update?id=1'); ?>" method="post" enctype="multipart/form-data">
		<div id="tab-system" class="HuiTab">
			<div class="tabBar cl">
				<span>网站信息</span>
				<span>底部联系信息</span>
			</div>

			<!--基本设置-->
			<div class="tabCon">

				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2 ">
						<span class="c-red">*</span>
						网站名称：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" id="website-title-cn" placeholder="控制在25个字、50个字节以内" value="<?php echo $system['title_cn']; ?>" class="input-text" name="title_cn">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2" style="color: red">
						<span class="c-red">*</span>
						网站名称（英文）：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" id="website-title-en" placeholder="控制在25个字、50个字节以内" value="<?php echo $system['title_en']; ?>" class="input-text" name="title_en">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						关键词(中文)：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" id="website-Keywords" placeholder="5个左右,8汉字以内,用英文,隔开" value="<?php echo $system['keyword']; ?>" class="input-text" name="keyword">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						描述：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" id="website-description" placeholder="空制在80个汉字，160个字符以内" value="<?php echo $system['description']; ?>" class="input-text" name="description">
					</div>
				</div>
				<?php if($system['logo_cn'] != null): ?>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						当前logo</label>
					<div class="formControls col-xs-8 col-sm-9">
						<img src="__ROOT__/uploads/<?php echo $system['logo_cn']; ?>">
					</div>
				</div>
				<?php endif; ?>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						标志logo</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="file" name="logo_cn">
					</div>
				</div>
				<?php if($system['logo_en'] != null): ?>e
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						当前logo(英文)</label>
					<div class="formControls col-xs-8 col-sm-9">
						<img src="__ROOT__/uploads/<?php echo $system['logo_en']; ?>">
					</div>
				</div>
				<?php endif; ?>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2" style="color: red">
						<span class="c-red">*</span>
						标志logo(英文)</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="file" name="logo_en">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">
						<span class="c-red">*</span>
						底部版权信息：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" id="website-copyright" placeholder="&copy; 2016 H-ui.net" value="<?php echo $system['copyright']; ?>" name="copyright" class="input-text">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">备案号：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" id="website-icp" placeholder="京ICP备00000000号" value="<?php echo $system['icp']; ?>" name="icp" class="input-text">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">统计代码：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<textarea class="textarea" name="baidu_count"><?php echo $system['baidu_count']; ?></textarea>
					</div>
				</div>


			</div>



			<div class="tabCon">
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">联系地址：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input class="input-text" name="address_cn" id="address_cn" value="<?php echo $system['address_cn']; ?>">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2" style="color: red">联系地址(英文)：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input class="input-text" name="address_en" id="address_en" value="<?php echo $system['address_en']; ?>">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">联系电话：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" class="input-text" value="<?php echo $system['phone_number']; ?>" id="phone_number" name="phone_number" >
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">传真：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" class="input-text" value="<?php echo $system['fax_number']; ?>" id="fax_number" name="fax_number" >
					</div>
				</div>

			</div>
		</div>
			<div class="row cl">
				<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
					<button class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
					<button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
				</div>
			</div>
		</form>
	</div>
</div>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="__STATIC__/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="__STATIC__/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="__STATIC__/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="__STATIC__/static/h-ui.admin/js/H-ui.admin.js"></script>
<link href="__STATIC__/bootstrap/bootstrap.min.css" rel="stylesheet">
<script src="__STATIC__/bootstrap/bootstrap.min.js"></script>
<!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="__STATIC__/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="__STATIC__/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="__STATIC__/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="__STATIC__/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	$("#tab-system").Huitab({
		index:0
	});
});
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>
