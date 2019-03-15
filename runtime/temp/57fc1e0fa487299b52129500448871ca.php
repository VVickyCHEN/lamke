<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:73:"D:\phpStudy\WWW\lamke\public/../application/admin\view\message\index.html";i:1526982184;s:71:"D:\phpStudy\WWW\lamke\public/../application/admin\view\public\meta.html";i:1526891573;s:73:"D:\phpStudy\WWW\lamke\public/../application/admin\view\public\footer.html";i:1521095340;}*/ ?>
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
<title>订单列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 订单管理 <span class="c-gray en">&gt;</span> 订单列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c">
		<!--<form action="<?php echo url('news/search'); ?>" method="post">-->
			<!--<button onclick="removeIframe()" class="btn btn-primary radius">关闭选项卡</button>-->
			<!--<span class="select-box inline">-->
				<!--<select name="sFlag" class="select">-->
					<!--<option value="0">查询条件</option>-->
					<!--<option value="2">标题</option>-->
					<!--<option value="3">来源</option>-->
					<!--<option value="4">作者</option>-->
				<!--</select>-->
			<!--</span>-->
			<!--日期范围：-->
			<!--<input  type="text" onClick="WdatePicker()" id="logMin" class="input-text Wdate" style="width:120px;" name="logMin"/>-->
			<!-- - -->
			<!--<input  type="text" onClick="WdatePicker()" id="logMax" class="input-text Wdate" style="width:120px;" name="logMax"/>-->

			<!--<input type="text" name="info" id="" placeholder=" 查询信息" style="width:250px" class="input-text">-->
			<!--<button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜资讯</button>-->

		<!--</form>-->


	</div>
	<form	action="<?php echo url('delAll'); ?>" method="post">
	<div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
			<button type="submit" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</button>
			<!--<a class="btn btn-primary radius" onclick="article_add('添加资讯','<?php echo url("create"); ?>')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加资讯</a>-->
		</span>
		<span class="r">共有数据：<strong><?php echo $count; ?></strong> 条</span>
	</div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort table-responsive">
			<thead>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="ids" value=""></th>
				<th width="80">序号</th>
				<th>留言标题</th>
				<th>联系人</th>
				<th width="">联系电话</th>
				<th width="">邮箱</th>
				<th width="">联系地址</th>
				<th width="">内容</th>
				<th width="">提交时间</th>
				<th width="80">状态</th>
				<th width="120">操作</th>
			</tr>
			</thead>
			<tbody>
			<?php if(is_array($message) || $message instanceof \think\Collection || $message instanceof \think\Paginator): $k = 0; $__LIST__ = $message;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
			<tr class="text-c">
				<td><input type="checkbox" value="<?php echo $vo['id']; ?>" name="ids[]"></td>
				<td><?php echo $k; ?></td>
				<td class="text-l"><?php echo $vo['title']; ?></td>
				<td><?php echo $vo['name']; ?></td>
				<td><?php echo $vo['tel']; ?></td>
				<td><?php echo $vo['email']; ?></td>
				<td><?php echo $vo['address']; ?></td>
				<td><?php echo $vo['contents']; ?></td>
				<td><?php echo date("Y-m-d H:i:s",$vo['time']); ?></td>
				<?php if($vo['status']==0): ?>
				<td class="td-status"><span class="label label-defaunt radius">未处理</span></td>
				<?php else: ?><td class="td-status"><span class="label label-success radius">已处理</span></td><?php endif; ?>
				<td class="f-14 td-manage">
					<?php if($vo['status']==0): ?>
					<a style="text-decoration:none" onClick="member_start(this,'<?php echo $vo['id']; ?>')" href="javascript:;" title="处理"><i class="Hui-iconfont">&#xe631;</i></a>
						<?php else: ?>
					<a style="text-decoration:none"  href="javascript:;" title="已处理"><i class="Hui-iconfont">&#xe6e1;</i></a>
					<?php endif; ?>

					<!--<a style="text-decoration:none" class="ml-5" href="<?php echo url('edit',['id' => $vo['id']]); ?>" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>-->
					<!--<span><u style="cursor:pointer" class="text-primary" onclick="member_show('<?php echo $vo['name']; ?>','<?php echo url("read"); ?>','<?php echo $vo['id']; ?>')" >详情</u></span>-->
					<a style="text-decoration:none" class="ml-5" onClick="article_del(this,'<?php echo $vo['id']; ?>')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a>
				</td>
			</tr>
			<?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
		</table>
		<div style="text-align: center"><?php echo $message->render(); ?><div>
	</div>
</div>
	</form>
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
<!--<script type="text/javascript" src="__STATIC__/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>-->
<script type="text/javascript" src="__STATIC__/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
    /*用户-启用*/
    function member_start(obj, id) {
        layer.confirm('确认处理吗？', function (index) {
            $.post("<?php echo url('deal'); ?>", {status: 2, id: id}, function (data) {
				$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" href="javascript:;" title="已处理"><i class="Hui-iconfont">&#xe6e1;</i></a>');
				$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已处理</span>');
                layer.msg('处理成功!', {icon: 6, time: 1000});
            })
        });
    }
    /*查看详情*/
    function member_show(title, url, id,status) {
        layer.open({
            type: 2,
            title: title,
            content: url + '?id=' + id,
            area: ['800px', '500px']
        });
        // layer.full(index);
    }

    /*资讯-添加*/
    function article_add(title,url){
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index);
    }
    /*资讯-编辑*/
    function article_edit(title,url,id,w,h){
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index);
    }
    /*资讯-删除*/
    function article_del(obj,id){
        layer.confirm('确认要删除吗？',function(index){
            $.get("<?php echo url('delete'); ?>",{id:id});
            $(obj).parents("tr").remove();
            layer.msg('已删除!',{icon:1,time:1000});

        });
    }

    /*资讯-审核*/
    function article_shenhe(obj,id){
        layer.confirm('审核文章？', {
                btn: ['通过','不通过','取消'],
                shade: false,
                closeBtn: 0
            },
            function(){
                $(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="article_start(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
                $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
                $(obj).remove();
                layer.msg('已发布', {icon:6,time:1000});
            },
            function(){
                $(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="article_shenqing(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
                $(obj).parents("tr").find(".td-status").html('<span class="label label-danger radius">未通过</span>');
                $(obj).remove();
                layer.msg('未通过', {icon:5,time:1000});
            });
    }
    /*资讯-下架*/
    function article_stop(obj,id){
        layer.confirm('确认要下架吗？',function(index){
            $.get("<?php echo url('shield'); ?>",{id:id});
            $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="article_start(this,id)" href="javascript:;" title="发布"><i class="Hui-iconfont">&#xe603;</i></a>');
            $(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已下架</span>');
            $(obj).remove();
            layer.msg('已下架!',{icon: 5,time:1000});
        });
    }

    /*资讯-发布*/
    function article_start(obj,id){
        layer.confirm('确认要发布吗？',function(index){
            $.get("<?php echo url('start'); ?>",{id:id});
            $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="article_stop(this,id)" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>');
            $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
            $(obj).remove();
            layer.msg('已发布!',{icon: 6,time:1000});
        });
    }
    /*资讯-申请上线*/
    function article_shenqing(obj,id){
        $(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">待审核</span>');
        $(obj).parents("tr").find(".td-manage").html("");
        layer.msg('已提交申请，耐心等待审核!', {icon: 1,time:2000});
    }

</script>
</body>
</html>