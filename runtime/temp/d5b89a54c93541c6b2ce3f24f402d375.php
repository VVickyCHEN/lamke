<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:76:"D:\phpStudy\WWW\lamke\public/../application/admin\view\news\article_add.html";i:1526023488;s:71:"D:\phpStudy\WWW\lamke\public/../application/admin\view\public\meta.html";i:1526891573;s:73:"D:\phpStudy\WWW\lamke\public/../application/admin\view\public\footer.html";i:1521095340;}*/ ?>
<!DOCTYPE HTML>
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

<title>新增文章 - 资讯管理 - H-ui.admin v3.1</title>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<article class="page-container">
	<form class="form form-horizontal" id="form-article-add" method="post" enctype="multipart/form-data" action="<?php echo url('save'); ?>">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>文章标题：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="articletitle" name="title_cn">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>文章英文标题：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="title_en" name="title_en">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>所属分类：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
				<select name="cate_id" class="select">
				<?php if(is_array($cate) || $cate instanceof \think\Collection || $cate instanceof \think\Paginator): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<option value="<?php echo $vo['id']; ?>"><?php echo $vo['cate_name_cn']; ?></option>
				<?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
				</span> </div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">是否推荐：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<select name="recommend">
					<option value="1">是</option>
					<option value="0">否</option>
				</select>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">文章摘要：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea name="abstract_cn" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！" onKeyUp="$.Huitextarealength(this,50)"></textarea>
				<p class="textarea-numberbar"><em class="textarea-length">0</em>/50</p>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">文章英文摘要：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea name="abstract_en" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！" onKeyUp="$.Huitextarealength(this,50)"></textarea>
				<p class="textarea-numberbar"><em class="textarea-length">0</em>/50</p>
			</div>
		</div>


		<!--<div class="row cl">-->
			<!--<label class="form-label col-xs-4 col-sm-2">封面图片：</label>-->
			<!--<div class="formControls col-xs-8 col-sm-9">-->
				<!--<input type="file" name="img" >-->
			<!--</div>-->
		<!--</div>-->

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">文章内容：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea id="editor" name="content_cn" type="text/plain" style="width:100%;height:400px;"></textarea>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">文章英文内容：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea id="editor2" name="content_en" type="text/plain" style="width:100%;height:400px;"></textarea>
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<button  class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
				<button onClick="removeIframe();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
			</div>
		</div>
	</form>
</article>

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
				<script type="text/javascript" src="__STATIC__/lib/webuploader/0.1.5/webuploader.min.js"></script>
				<script type="text/javascript" src="__STATIC__/lib/ueditor/1.4.3/ueditor.config.js"></script>
				<script type="text/javascript" src="__STATIC__/lib/ueditor/1.4.3/ueditor.all.min.js"> </script>
				<script type="text/javascript" src="__STATIC__/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>
				<script type="text/javascript">


                    var ue = UE.getEditor('editor');
                    var ue = UE.getEditor('editor2');
				</script>
				<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>