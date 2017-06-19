<?php
define('SRC_URL','http://www.shop.com');
define('GOODS_URL','http://admin.shop.com/Uploads/');
return array(
    'TMPL_PARSE_STRING' =>array(
        '__CSS__' =>SRC_URL . '/Public/Home/css',
        '__JS__' =>SRC_URL .'/Public/Home/js',
        '__IMG__' =>SRC_URL .'/Public/Home/images',
        '__LAYER__'=>SRC_URL .'/Public/Home/layer/layer.js', //提示框插件
        '__BRAND__'=>'http://itsource-brand.b0.upaiyun.com', //brand又拍云空间域名
        '__GOODS__'=>'http://itsource-goods.b0.upaiyun.com', //goods又拍云空间域名
        '__UEDITOR__'=>SRC_URL .'/Public/Home/ueditor', //百度编辑器
        '__GOODSURL__'=>'http://admin.shop.com/Uploads/'
    ),
    'URL_MODEL'              => 2, //url的rewrite模式
    'PAGE_SIZE'=>10, //每页的条数
    'COOKIE_DOMAIN'=>'.shop.com',


);