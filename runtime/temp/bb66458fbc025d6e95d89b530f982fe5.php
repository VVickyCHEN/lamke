<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"D:\phpStudy\WWW\lamke\public/../application/admin\view\product\demo.html";i:1526955816;}*/ ?>
<!DOCTYPE html>
<!-- release v4.1.8, copyright 2014 - 2015 Kartik Visweswaran -->
<html lang="cn">
<head>
    <meta charset="UTF-8"/>
    <title>Krajee JQuery Plugins - &copy; Kartik</title>
    <link href="__STATIC__/fileinput/css/bootstrap.min.css" rel="stylesheet">
    <link href="__STATIC__/fileinput/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
    <script src="__STATIC__/fileinput/js/jquery-2.0.3.min.js"></script>
    <script src="__STATIC__/fileinput/js/fileinput.js" type="text/javascript"></script>
    <script src="__STATIC__/fileinput/js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body>
<div class="container kv-main">

    <br>
    <form enctype="multipart/form-data" >

        <div class="form-group">
            <input id="file-1" type="file" multiple class="file" data-overwrite-initial="false" data-min-file-count="2">
        </div>

    </form>
    <button class="btn btn-primary radius" type="submit" onclick="save2()"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
</div>
</body>
<script>

    $("#file-1").fileinput({
        uploadUrl: '<?php echo url("upload"); ?>', // you must set a valid URL here else you will get an error
        allowedFileExtensions : ['jpg', 'png','gif'],
        overwriteInitial: false,
        maxFileSize: 1000,
        maxFilesNum: 2,
        //allowedFileTypes: ['image', 'video', 'flash'],
        slugCallback: function(filename) {
            return filename.replace('(', '_').replace(']', '_');
        }
    });
    var path_str = '';
    $('#file-1').on("fileuploaded", function(event, data) {
        var result = data.response; //后台返回的json
        path_str = path_str+data.response+',';
        console.log(path_str);

    });
function save2() {
    var flag="<?php echo $flag; ?>";
    $.post("<?php echo url('savePath'); ?>",{image:path_str,id:"<?php echo $id; ?>",flag:flag},function (res) {
        if(res==1){
            alert("保存成功");
            location.href="<?php echo url('index'); ?>";
        }else {
            alert("保存失败");
        }
    })
}

</script>
</html>