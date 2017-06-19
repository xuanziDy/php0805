<?php
return array(
    'DB_TYPE'                => 'mysql', // 数据库类型
    'DB_HOST'                => '127.0.0.1', // 服务器地址
    'DB_NAME'                => 'shop', // 数据库名
    'DB_USER'                => 'root', // 用户名
    'DB_PWD'                 => '', // 密码
    'DB_PORT'                => '3306', // 端口

    'SHOW_PAGE_TRACE'=>true, //开启trace调试

//    //>>使用redis作为缓存的软件
//    'DATA_CACHE_TYPE'  =>'redis',
//    'REDIS_HOST'=>'127.0.0.1',
//    'REDIS_PORT'=>6379,
//    'DATA_CACHE_PREFIX'=>'shop_',  //缓存前缀为shop_



    //缓存保存在redis中的配置
    'SESSION_AUTO_START'    =>  true,    // 是否自动开启Session
//    'SESSION_TYPE'            =>  'Redis',    //session类型
    'SESSION_TYPE'            =>  '',    //session类型
    'SESSION_PERSISTENT'    =>  1,        //是否长连接(对于php来说0和1都一样)
    'SESSION_CACHE_TIME'    =>  1,        //连接超时时间(秒)
    'SESSION_EXPIRE'        =>  0,        //session有效期(单位:秒) 0表示永久缓存
    'SESSION_PREFIX'        =>  'sess_',        //session前缀
//    'SESSION_REDIS_HOST'    =>  '127.0.0.1', //分布式Redis,默认第一个为主服务器
//    'SESSION_REDIS_PORT'    =>  '6379',           //端口,如果相同只填一个,用英文逗号分隔


    //发送邮件验证的设置。
    'MAIL_CONFIG'           =>array(
        'Host' => 'smtp.163.com',                    // 设置邮件的服务器
        'Username' => 'xuanzidy@163.com',              // 登陆用户的用户名
        'Password' => 'Dy114420',   //登录密码
    ),


    //支付宝支付的配置
    'ALIPAY_CONFIG'         =>array(
        'partner' => '2088802175815304',        //合作身份者id，以2088开头的16位纯数字
        'seller_email' => '517421372@qq.com',   //收款支付宝账号，一般情况下收款账号就是签约账号
        'key' => '35uusk2ffqh69jsa8uqgfvdk5mod9afb',//安全检验码，以数字和字母组成的32位字符
        'sign_type'=>strtoupper('MD5'),       //签名方式 不需修改
        'input_charset'=>strtolower('utf-8'),  //字符编码格式 目前支持 gbk 或 utf-8
        'cacert'=>getcwd().'\\cacert.pem',    //请保证cacert.pem文件在当前文件夹目录中
        'transport'=>'http'                     //访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
    ),


    /*------------------------开启thinkphp的静态缓存配置-------------------------------*/
    'HTML_CACHE_ON'     =>    false, // 开启静态缓存
    'HTML_CACHE_TIME'   =>    60,   // 全局静态缓存有效期（秒）
    'HTML_FILE_SUFFIX'  =>    '.shtml', // 设置静态缓存文件后缀
    'HTML_CACHE_RULES'  =>     array(  // 定义静态缓存规则
        // 定义格式1 数组方式/字符串方式
            //>>缓存首页
        'Index:index'    =>     array('index', 86400), //控制器名：方法名=>array('静态文件的名字',缓存时间)
            //>>缓存商品页.
        'Index:show'     => array('Goods/{id}',86400),  //放在goods目录下，以id为名字
    )
);