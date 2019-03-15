<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:80:"D:\phpStudy\WWW\lamke\public/../application/admin\view\product\product_list.html";i:1527061422;s:71:"D:\phpStudy\WWW\lamke\public/../application/admin\view\public\meta.html";i:1526891573;s:73:"D:\phpStudy\WWW\lamke\public/../application/admin\view\public\footer.html";i:1521095340;}*/ ?>
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
<title>产品列表</title>
<link rel="stylesheet" href="__STATIC__/lib/zTree/v3/css/zTreeStyle/zTreeStyle.css" type="text/css">
</head>
<body class="pos-r">
<div >
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 产品管理 <span class="c-gray en">&gt;</span> 产品列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="page-container">
		<div class="text-c">
			<form action="<?php echo url('index'); ?>" method="post">
			<span class="select-box inline">
			<select name="cate_id" class="select">
				<option value="">全部分类</option>
				<?php if(is_array($cate) || $cate instanceof \think\Collection || $cate instanceof \think\Paginator): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				<option value="<?php echo $vo['id']; ?>"><?php echo $vo['cate_name_cn']; ?></option>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</select>
			</span>
				日期范围：
				<input  type="text" onClick="WdatePicker()" id="logMin" class="input-text Wdate" style="width:120px;" name="logMin"/>
				-
				<input  type="text" onClick="WdatePicker()" id="logMax" class="input-text Wdate" style="width:120px;" name="logMax"/>

				<input type="text" name="info" id="" placeholder=" 产品名" style="width:250px" class="input-text">
				<button class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜资讯</button>
			</form>
		</div>

		<form	action="<?php echo url('delAll'); ?>" method="post">
			<div class="cl pd-5 bg-1 bk-gray mt-20">
				<span class="l">
					<button type="submit" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</button>
					<a class="btn btn-primary radius" onclick="product_add('添加产品','<?php echo url("create"); ?>')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加产品</a>
				</span>
				<span class="r">共有数据：<strong><?php echo $count; ?></strong> 条</span>
			</div>
		<div class="mt-20">
			<table class="table table-border table-bordered table-bg table-hover table-sort">
				<thead>
					<tr class="text-c">
						<th width="40"><input name="ids" type="checkbox" value=""></th>
						<th width="40">ID</th>
						<th width="60">缩略图</th>
						<th width="100">产品名称</th>
						<th width="100">产品编号</th>
						<th width="100">上级分类</th>
						<th width="60">价格</th>
						<th width="60">是否推荐</th>
						<th width="60">创建时间</th>
						<th width="100">操作</th>
					</tr>
				</thead>
				<tbody>
				<?php if(is_array($product) || $product instanceof \think\Collection || $product instanceof \think\Paginator): $k = 0; $__LIST__ = $product;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
					<tr class="text-c va-m">
						<td><input name="ids[]" type="checkbox" value="<?php echo $vo['id']; ?>"></td>
						<td><?php echo $k; ?></td>
						<td><?php if($vo['simg']!=""): ?><img width="60" class="product-thumb" src="__ROOT__/uploads/<?php echo $vo['simg']; ?>"><?php endif; ?></td>
						<td class="text-l"><?php echo $vo['name']; ?></td>
						<td class="text-l"><?php echo $vo['goods_num']; ?></td>
						<td><?php echo $vo['p_name']; ?></td>
						<td class="text-l"> ￥<span class="price"></span><?php echo $vo['price']; ?></td>
						<td class="text-l"><?php if($vo['recommend']==0): ?>否<?php else: ?>是<?php endif; ?></td>
						<td style="width: 150px;"><?php echo date("Y-m-d H:i:s",$vo['time']); ?></td>
						<td class="td-manage">
							<?php if($vo['status']==1): ?>
							<a style="text-decoration:none" onClick="article_stop(this,'<?php echo $vo['id']; ?>')" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>
							<?php else: ?>
							<a style="text-decoration:none" onClick="article_start(this,'<?php echo $vo['id']; ?>')" href="javascript:;" title="发布"><i class="Hui-iconfont">&#xe603;</i></a>
							<?php endif; ?>
							<a style="text-decoration:none" class="ml-5" href="<?php echo url('edit',['id' => $vo['id']]); ?>"  title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>
							<a style="text-decoration:none" class="ml-5" onClick="product_del(this,'<?php echo $vo['id']; ?>')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
					</tr>
				<?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
			</table>
		</div>
		</form>
	</div>
</div>
<?php if($status==0): ?>
<div style="text-align: center"><?php echo $product->render(); ?><div>
	<?php endif; ?>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="__STATIC__/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="__STATIC__/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="__STATIC__/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="__STATIC__/static/h-ui.admin/js/H-ui.admin.js"></script>
<link href="__STATIC__/bootstrap/bootstrap.min.css" rel="stylesheet">
<script src="__STATIC__/bootstrap/bootstrap.min.js"></script>
<!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="__STATIC__/lib/zTree/v3/js/jquery.ztree.all-3.5.min.js"></script>
<script type="text/javascript" src="__STATIC__/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="__STATIC__/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">

/*产品-添加*/
function product_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}

/*资讯-下架*/
function article_stop(obj,id){
    layer.confirm('确认要下架吗？',function(index){
        $.get("<?php echo url('shield'); ?>",{id:id});
        $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="article_start(this,id)" href="javascript:;" title="发布"><i class="Hui-iconfont">&#xe603;</i></a>');

        $(obj).remove();
        layer.msg('已下架!',{icon: 5,time:1000});
    });
}

/*资讯-发布*/
function article_start(obj,id){
    layer.confirm('确认要发布吗？',function(index){
        $.get("<?php echo url('start'); ?>",{id:id});
        $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="article_stop(this,id)" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>');

        $(obj).remove();
        layer.msg('已发布!',{icon: 6,time:1000});
    });
}



/*产品-编辑*/
function product_edit(title,url,id){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}

/*产品-删除*/
function product_del(obj,id){
    layer.confirm('确认要删除吗？',function(index){
        $.get("<?php echo url('delete'); ?>",{id:id});
        $(obj).parents("tr").remove();
        layer.msg('已删除!',{icon:1,time:1000});
    });
}
</script>
</body>
</html>