<?php
//后台模块的配置文件
//配置文件
return [

'view_replace_str'       => [

'__STATIC__' =>  '/static/index',
	
],
//自定义分页配置
    'paginate'               => [
        'type'      => 'page\page',//分页类
        'var_page'  => 'page',
        'list_rows' => 15,
    ],
];