<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"D:\phpStudy\WWW\lamke\public/../application/admin\view\message\read.html";i:1526978692;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<table>
    <tr>
        <td>联系人：</td>
        <td><?php echo $row['name']; ?></td>
    </tr>
    <tr>
        <td>联系电话：</td>
        <td><?php echo $row['tel']; ?></td>
    </tr>
    <tr>
        <td>产品名称：</td>
        <td><?php echo $row['product']; ?></td>
    </tr>
    <tr>
        <td>订购数量：</td>
        <td><?php echo $row['num']; ?></td>
    </tr>
    <tr>
        <td>公司名称：</td>
        <td><?php echo $row['company']; ?></td>
    </tr>
    <tr>
        <td>联系地址：</td>
        <td><?php echo $row['address']; ?></td>
    </tr>
    <tr>
        <td>传真：</td>
        <td><?php echo $row['fax']; ?></td>
    </tr>
    <tr>
        <td>邮箱：</td>
        <td><?php echo $row['email']; ?></td>
    </tr>
    <tr>
        <td>详情：</td>
        <td><?php echo $row['contents']; ?></td>
    </tr>
    <tr>
        <td>提交时间：</td>
        <td><?php echo date("Y-m-d H:i:s",$row['time']); ?></td>
    </tr>
</table>
</body>
</html>