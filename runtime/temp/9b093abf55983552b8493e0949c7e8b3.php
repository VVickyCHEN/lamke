<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:80:"D:\phpStudy\WWW\lamke\public/../application/admin\view\product\product_edit.html";i:1526897672;s:71:"D:\phpStudy\WWW\lamke\public/../application/admin\view\public\meta.html";i:1526891573;s:73:"D:\phpStudy\WWW\lamke\public/../application/admin\view\public\footer.html";i:1521095340;}*/ ?>
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
<link href="__STATIC__/lib/webuploader/0.1.5/webuploader.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="page-container">
	<form action="<?php echo url('update'); ?>" enctype="multipart/form-data" method="post" class="form form-horizontal" >
		<input type="hidden" name="id" value="<?php echo $pro['id']; ?>">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>产品名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?php echo $pro['name_cn']; ?>" placeholder="" id="" name="name_cn">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>产品英文名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?php echo $pro['name_en']; ?>" placeholder="" id="" name="name_en">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">编号：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?php echo $pro['goods_num']; ?>" placeholder=""name="goods_num">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">现价：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?php echo $pro['price']; ?>" placeholder="" id="" name="price">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">原价：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?php echo $pro['oldprice']; ?>" placeholder="" id="" name="oldprice">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">推荐：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<select name="recommend">
					<option value="<?php echo $pro['recommend']; ?>"><?php if($pro['recommend']==0): ?>否<?php else: ?>是<?php endif; ?></option>
					<option value="0">否</option>
					<option value="1">是</option>
				</select>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>所属分类：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
				<select name="cate_id" class="select">
					<option value="<?php echo $pro['cate_id']; ?>"><?php echo $cate_name; ?></option>
				<?php if(is_array($cate) || $cate instanceof \think\Collection || $cate instanceof \think\Paginator): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<option value="<?php echo $vo['id']; ?>"><?php echo $vo['cate_name_cn']; ?></option>
				<?php endforeach; endif; else: echo "" ;endif; ?>

				</select>
				</span> </div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">描述：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea  type="text/plain" name="desc_cn" style="width:100%;height:100px;"><?php echo $pro['desc_cn']; ?></textarea>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">英文描述：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea  type="text/plain" name="desc_en" style="width:100%;height:100px;"><?php echo $pro['desc_en']; ?></textarea>
			</div>
		</div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">当前封面图：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <img src="__ROOT__/uploads/<?php echo $pro['simg']; ?>"  width="150">
                </div>
                </div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">封面图(上传将覆盖当前图片)：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="file" name="simg">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">当前轮播图：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<?php if(is_array($image) || $image instanceof \think\Collection || $image instanceof \think\Paginator): $i = 0; $__LIST__ = $image;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$image): $mod = ($i % 2 );++$i;?>
				<img src="__ROOT__/uploads/<?php echo $image; ?>"  width="150">
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">修改轮播图：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<a href="<?php echo url('demo',['id'=>$pro['id'],'flag'=>1]); ?>">点击修改轮播图</a>
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">详细内容：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea id="editor" name="details_cn" type="text/plain" style="width:100%;height:400px;"><?php echo $pro['details_cn']; ?></textarea>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">英文详细内容：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea id="editor2" name="details_en" type="text/plain" style="width:100%;height:400px;"><?php echo $pro['details_en']; ?></textarea>
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
<script type="text/javascript" src="__STATIC__/lib/webuploader/0.1.5/webuploader.min.js"></script>
<script type="text/javascript" src="__STATIC__/lib/ueditor/1.4.3/ueditor.config.js"></script>
<script type="text/javascript" src="__STATIC__/lib/ueditor/1.4.3/ueditor.all.min.js"> </script>
<script type="text/javascript" src="__STATIC__/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>

<style type="text/css">
	.shade {
		position: absolute;
		display: none;
		width: 100%;
		height: 100%;
		top: 0;
		left: 0;
		background: rgba(0, 0, 0, 0.55);
	}

	.shade div {
		width: 300px;
		height: 200px;
		line-height: 200px;
		position: absolute;
		top: 50%;
		left: 50%;
		margin-top: -100px;
		margin-left: -150px;
		background: white;
		border-radius: 5px;
		text-align: center;
	}

	.a-upload {
		padding: 4px 10px;
		height: 20px;
		line-height: 20px;
		position: relative;
		cursor: pointer;
		color: #888;
		background: #fafafa;
		border: 1px solid #ddd;
		border-radius: 4px;
		overflow: hidden;
		display: inline-block;
		*display: inline;
		*zoom: 1
	}

	.a-upload input {
		position: absolute;
		font-size: 100px;
		right: 0;
		top: 0;
		opacity: 0;
		filter: alpha(opacity=0);
		cursor: pointer
	}

	.a-upload:hover {
		color: #444;
		background: #eee;
		border-color: #ccc;
		text-decoration: none
	}
	.img_div{min-height: 100px; min-width: 100px;}
	.isImg{width: 120px; height: 120px; position: relative; float: left; margin-left: 10px;}
	.removeBtn{position: absolute; top: 0; right: 0; z-index: 11; border: 0px; border-radius: 50px; background: red; width: 22px; height: 22px; color: white;}
	.shadeImg{position: absolute;
		display: none;
		width: 100%;
		height: 100%;
		top: 0;
		left: 0;
		z-index: 15;
		text-align: center;
		background: rgba(0, 0, 0, 0.55);}
	.showImg{width: 400px; height: 500px; margin-top: 140px;}

</style>
<script type="text/javascript">
    $(function() {
        var objUrl;
        var img_html;
        $("#myFile").change(function() {
            var img_div = $(".img_div");
            var filepath = $("input[id='myFile']").val();
            for(var i = 0; i < this.files.length; i++) {
                objUrl = getObjectURL(this.files[i]);
                var extStart = filepath.lastIndexOf(".");
                var ext = filepath.substring(extStart, filepath.length).toUpperCase();
                /*
                 作者：z@qq.com
                时间：2016-12-10
                描述：鉴定每个图片上传尾椎限制
                * */
                if(ext != ".BMP" && ext != ".PNG" && ext != ".GIF" && ext != ".JPG" && ext != ".JPEG") {
                    $(".shade").fadeIn(500);
                    $(".text_span").text("图片限于bmp,png,gif,jpeg,jpg格式");
                    this.value = "";
                    $(".img_div").html("");
                    return false;
                } else {
                    /*
                     若规则全部通过则在此提交url到后台数据库
                     * */
                    img_html = "<div class='isImg'><img src='" + objUrl + "' onclick='javascript:lookBigImg(this)' style='height: 100%; width: 100%;' /><button class='removeBtn' onclick='javascript:removeImg(this)'>x</button></div>";
                    img_div.append(img_html);
                }
            }
            /*
             作者：z@qq.com
            时间：2016-12-10
            描述：鉴定每个图片大小总和
            * */
            var file_size = 0;
            var all_size = 0;
            for(j = 0; j < this.files.length; j++) {
                file_size = this.files[j].size;
                all_size = all_size + this.files[j].size;
                var size = all_size / 1024;
                if(size > 500) {
                    $(".shade").fadeIn(500);
                    $(".text_span").text("上传的图片大小不能超过100k！");
                    this.value = "";
                    $(".img_div").html("");
                    return false;
                }
            }
            /*
             作者：z@qq.com
            时间：2016-12-10
            描述：鉴定每个图片宽高 以后会做优化 多个图片的宽高 暂时隐藏掉 想看效果可以取消注释就行
            * */
            //					var img = new Image();
            //					img.src = objUrl;
            //					img.onload = function() {
            //						if (img.width > 100 && img.height > 100) {
            //							alert("图片宽高不能大于一百");
            //							$("#myFile").val("");
            //							$(".img_div").html("");
            //							return false;
            //						}
            //					}
            return true;
        });
        /*
         作者：z@qq.com
        时间：2016-12-10
        描述：鉴定每个浏览器上传图片url 目前没有合并到Ie
         * */
        function getObjectURL(file) {
            var url = null;
            if(window.createObjectURL != undefined) { // basic
                url = window.createObjectURL(file);
            } else if(window.URL != undefined) { // mozilla(firefox)
                url = window.URL.createObjectURL(file);
            } else if(window.webkitURL != undefined) { // webkit or chrome
                url = window.webkitURL.createObjectURL(file);
            }
            //console.log(url);
            return url;
        }
    });
    /*
     作者：z@qq.com
     时间：2016-12-10
      描述：上传图片附带删除 再次地方可以加上一个ajax进行提交到后台进行删除
     * */
    function removeImg(r){
        $(r).parent().remove();
    }
    /*
     作者：z@qq.com
     时间：2016-12-10
      描述：上传图片附带放大查看处理
     * */
    function lookBigImg(b){
        $(".shadeImg").fadeIn(500);
        $(".showImg").attr("src",$(b).attr("src"))
    }
    /*
     作者：z@qq.com
     时间：2016-12-10
      描述：关闭弹出层
     * */
    function closeShade(){
        $(".shade").fadeOut(500);
    }
    /*
     作者：z@qq.com
     时间：2016-12-10
      描述：关闭弹出层
     * */
    function closeShadeImg(){
        $(".shadeImg").fadeOut(500);
    }
</script>
<script type="text/javascript">
	var ue = UE.getEditor('editor');
	var ue2 = UE.getEditor('editor2');
</script>
</body>
</html>