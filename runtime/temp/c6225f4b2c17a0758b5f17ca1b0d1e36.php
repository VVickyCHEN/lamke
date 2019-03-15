<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:76:"D:\phpStudy\WWW\lamke\public/../application/admin\view\index\admin_list.html";i:1523340625;s:71:"D:\phpStudy\WWW\lamke\public/../application/admin\view\public\meta.html";i:1526891573;s:73:"D:\phpStudy\WWW\lamke\public/../application/admin\view\public\footer.html";i:1521095340;}*/ ?>
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
<title>用户管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 用户中心 <span class="c-gray en">&gt;</span> 用户管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="pd-20">
  <div class="cl pd-5 bg-1 bk-gray mt-20">
    <?php if(\think\Session::get('user_id') == 1): ?><a href="<?php echo url('admin_add'); ?>" class="btn btn-primary radius"><i class="icon-plus"></i> 添加用户</a><?php endif; ?>
  </div>
  <table class="table table-border table-bordered table-hover table-bg table-sort">
    <thead>
      <tr class="text-c">
        <th width="80">ID</th>
        <th width="100">账号</th>
        <th width="100">登录次数</th>
        <th width="100">上次登录时间</th>
        <th width="100">登录名</th>
        <th width="100">操作</th>
      </tr>
    </thead>
    <tbody>
    <?php if(is_array($admin) || $admin instanceof \think\Collection || $admin instanceof \think\Paginator): $k = 0; $__LIST__ = $admin;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
    <tr class="text-c">
        <td><?php echo $k; ?></td>
        <td><?php echo $vo['username']; ?></td>
        <td><?php echo $vo['login_count']; ?>次</td>
        <td><?php echo date("Y-m-d H:i:s",$vo['login_time']); ?></td>
        <td><?php echo $vo['name']; ?></td>
        <td class="">
            <!--只能改当前登录的人的信息，admin可更改任何人的信息-->
          <?php if((\think\Session::get('user_id') == $vo['id'])or(\think\Session::get('user_id') == 1)): ?><a style="text-decoration:none" class="ml-5" href="<?php echo url('index/admin_password',['id'=>$vo['id']]); ?>" title="修改密码"><i class="icon-key">修改密码</i></a><?php endif; if((\think\Session::get('user_id') == $vo['id'])or(\think\Session::get('user_id') == 1)): ?><a style="text-decoration:none" class="ml-5" href="<?php echo url('index/admin_edit',['id'=>$vo['id']]); ?>" title="修改信息"><i class="icon-key">修改信息</i></a><?php endif; ?>
          <!--任何人都不能删除信息，除admin外，不可删除admin-->
            <?php if((\think\Session::get('user_id') == 1)and(\think\Session::get('user_id') != $vo['id'])): ?><a title="删除" href="javascript:;" onclick="user_del(this,'<?php echo $vo['id']; ?>')" class="ml-5" style="text-decoration:none"><i class="icon-trash">删除</i></a><?php endif; ?>

        </td>
      </tr>
    <?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>
  </table>
  <div id="pageNav" class="pageNav"></div>
</div>
<!--_footer 作为公共模版分离出去-->
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
<script type="text/javascript" src="__STATIC__/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="__STATIC__/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
function user_del(obj,id){
    layer.confirm('确认要删除吗？',function(index){
        $.get("<?php echo url('admin_delete'); ?>",{id:id});
        $(obj).parents("tr").remove();
        layer.msg('已删除!',{icon:1,time:1000});
    });
}

</script>
</body>
</html>
