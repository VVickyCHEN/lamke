<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:70:"D:\phpStudy\WWW\lamke\public/../application/admin\view\link\index.html";i:1527141964;s:71:"D:\phpStudy\WWW\lamke\public/../application/admin\view\public\meta.html";i:1526891573;s:73:"D:\phpStudy\WWW\lamke\public/../application/admin\view\public\footer.html";i:1521095340;}*/ ?>
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
<title>产品分类</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 产品管理 <span class="c-gray en">&gt;</span> 产品分类 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<!--<div>-->
	<!--<input type="button" class="btn btn-success" onclick="cn()" value="中文" >-->
	<!--<input type="button" class="btn btn-success" onclick="en()" value="英文" >-->
<!--</div>-->
<div class="table_cn">
	<table class="table">
		<tr>
			<td class="va-t">
				<!--添加-->
				<div class="page-container">
					<form action="<?php echo url('save'); ?>" method="post" class="form form-horizontal" id="form-user-add">
						<div class="row cl">
							<label class="form-label col-xs-4 col-sm-2">
								<span class="c-red">*</span>
								链接名称：</label>
							<div class="formControls col-xs-6 col-sm-6">
								<input type="text" class="input-text" value="" placeholder="" id="link_name_cn" name="link_name_cn">
							</div>
						</div>
						<div class="row cl">
							<label class="form-label col-xs-4 col-sm-2">
								<span class="c-red">*</span>
								链接英文名称：</label>
							<div class="formControls col-xs-6 col-sm-6">
								<input type="text" class="input-text" value="" placeholder="" id="link_name_en" name="link_name_en">
							</div>
						</div>
						<div class="row cl">
							<label class="form-label col-xs-4 col-sm-2">
								<span class="c-red">*</span>
								链接地址：</label>
							<div class="formControls col-xs-6 col-sm-6">
								<input type="text" class="input-text" value="" placeholder="http://www.baidu.com" id="link" name="link">
							</div>
						</div>

						<div class="row cl">
							<div class="col-9 col-offset-2">
								<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
							</div>
						</div>
					</form>
				</div>

				<div class="cl pd-5 bg-1 bk-gray mt-20">
			<span class="l">
					<!--<button type="submit" class="btn btn-danger radius" onclick="delall()"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</button>-->
				</span>
					<span class="r">共有数据：<strong><?php echo $count; ?></strong> 条</span> </div>
				<table class="table table-border table-bordered table-bg table-hover table-sort">
					<thead>
					<tr class="text-c">
						<th width="40"><input name="ids" type="checkbox" value=""></th>
						<th width="40">序号</th>
						<th width="100">链接名称</th>

						<th width="100">链接地址</th>

						<th width="100">操作</th>
					</tr>
					</thead>
					<tbody>
					<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
					<tr class="text-c va-m">
						<td><input name="ids[]" type="checkbox" value="<?php echo $vo['id']; ?>"></td>
						<td><?php echo $k; ?></td>
						<td class="text-l"><?php echo $vo['link_name_cn']; ?>---<?php echo $vo['link_name_en']; ?></td>
						<td><?php echo $vo['link']; ?></td>
						<td class="td-manage">
							<a style="text-decoration:none" class="ml-5"  href="<?php echo url('edit',['id' => $vo['id']]); ?>" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>
							<a style="text-decoration:none" class="ml-5" onClick="product_del(this,'<?php echo $vo['id']; ?>')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a>
						</td>
					</tr>
					<?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
				</table>
			</td>
		</tr>
	</table>

	<div style="text-align: center"><?php echo $list->render(); ?></div>
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
<script type="text/javascript">

</script>
<script>



/*产品-删除*/
function product_del(obj,id){
	layer.confirm('确认删除吗？',function(index){
        $.post("<?php echo url('delete'); ?>",{id:id},function (res) {
			if (res==1) {
                layer.msg('已删除!', {icon: 1, time: 1000}, function () {
                    location.href = "<?php echo url('index'); ?>"
                });

            }else{
                layer.msg('删除失败!',{icon:2,time:1000},function () {
                    location.href="<?php echo url('showType'); ?>"
                });

			}
//			alert(res);
        });

	});
}
//批量删除
function delall() {
    var url="<?php echo url('cate_delAll'); ?>";
    var check_id=[];
    $("input[name='ids[]']:checked").each(function(){
        check_id.push($(this).val());
    });
    if(check_id.length==0){
    	layer.alert("请选择");
    }else{
        layer.confirm("确认删除后将删除分类下所有数据，删除的数据将无法恢复，请谨慎操作，确认删除吗？",function () {
			$.post(url,{check_id:check_id},function (data){
				layer.alert(data,function () {
					location.href="<?php echo url('showType'); ?>"
                });
            })
        })
    }



}
</script>
</body>
</html>