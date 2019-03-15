<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:79:"D:\phpStudy\WWW\lamke\public/../application/admin\view\product\product_add.html";i:1527576792;s:71:"D:\phpStudy\WWW\lamke\public/../application/admin\view\public\meta.html";i:1526891573;s:73:"D:\phpStudy\WWW\lamke\public/../application/admin\view\public\footer.html";i:1521095340;}*/ ?>
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
<!--<link href="__STATIC__/lib/webuploader/0.1.5/webuploader.css" rel="stylesheet" type="text/css" />-->

</head>
<body>
<div class="page-container">
	<form action="<?php echo url('save'); ?>" enctype="multipart/form-data" method="post" class="form form-horizontal" >
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>产品名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" name="name_cn" id="name_cn">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>产品英文名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" name="name_en" id="name_en">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">编号：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder=""name="goods_num">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">现价：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" name="price">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">原价：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder=""name="oldprice">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">推荐：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<select name="recommend">
					<option value="0">否</option>
					<option value="1">是</option>
				</select>
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
			<label class="form-label col-xs-4 col-sm-2">描述：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea  type="text/plain" name="desc_cn" style="width:100%;height:100px;"></textarea>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">英文描述：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea  type="text/plain" name="desc_en" style="width:100%;height:100px;"></textarea>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">封面图：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="file" name="simg">
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">详细内容：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea id="editor" name="details_cn" type="text/plain" style="width:100%;height:400px;"></textarea>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">英文详细内容：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea id="editor2" name="details_en" type="text/plain" style="width:100%;height:400px;"></textarea>
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<button class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 下一步</button>
				<button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
			</div>
		</div>
	</form>
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

<script type="text/javascript" src="__STATIC__/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="__STATIC__/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="__STATIC__/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<!--<script type="text/javascript" src="__STATIC__/lib/webuploader/0.1.5/webuploader.min.js"></script> -->
<script type="text/javascript" src="__STATIC__/lib/ueditor/1.4.3/ueditor.config.js"></script>
<script type="text/javascript" src="__STATIC__/lib/ueditor/1.4.3/ueditor.all.min.js"> </script>
<!--<script type="text/javascript" src="__STATIC__/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>-->
<!--<script src="__STATIC__/js/jquery-2.1.4.min.js" type="text/javascript" charset="utf-8"></script>-->

<script type="text/javascript">
//	$(function () {
//		if ($("#name_cn").val()==""){
//		    layer.alert("标题不能为空")
//		}
//		if ($("#name_en").val()==""){
//            layer.alert("标题不能为空")
//		}
//    })
	var ue = UE.getEditor('editor');
	var ue2 = UE.getEditor('editor2');
</script>
</body>
</html>