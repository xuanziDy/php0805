<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title><?php echo ($meta_title); ?></title>
    <link rel="stylesheet" href="http://www.shop.com/Public/Home/css/base.css" type="text/css">
    <link rel="stylesheet" href="http://www.shop.com/Public/Home/css/global.css" type="text/css">
    <link rel="stylesheet" href="http://www.shop.com/Public/Home/css/header.css" type="text/css">
    
    <style type="text/css">
        .comment{
            width:610px;
            overflow: auto;
        }
        .comment tr{
            width:610px;
            text-align: center;;
        }
        .comment .tr1{

            height:50px;
            line-height: 50px;;
        }
        .comment .tr3{

            height:50px;
            line-height: 50px;;
        }
    </style>

    <link rel="stylesheet" href="http://www.shop.com/Public/Home/css/bottomnav.css" type="text/css">
    <link rel="stylesheet" href="http://www.shop.com/Public/Home/css/footer.css" type="text/css">

</head>
<body>
<!-- 顶部导航 start -->
<div class="topnav">
    <div class="topnav_bd w1210 bc">
        <div class="topnav_left">

        </div>
        <div class="topnav_right fr">
            <ul>
                <?php $var = $_SESSION['sess_']['USERINFO']; ?>
                <li id="userinfo">您好,欢迎来到 韩国馆 ！[<a href="<?php echo U('Member/checkLogin');?>">登录</a>] [<a href="<?php echo U('Member/regist');?>">免费注册</a></li>
                <li class="line">|</li>
                <li><a href="<?php echo U('OrderInfo/getOrderInfoList');?>">我的订单</a></li>
                <li class="line">|</li>
                <li><a href="<?php echo U('ShoppingCar/index');?>">购物车</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- 顶部导航 end -->

<div style="clear:both;"></div>

<!-- 头部 start -->
<div class="header w1210 bc mt15">
    <!-- 头部上半部分 start 包括 logo、搜索、用户中心和购物车结算 -->
    <div class="logo w1210">
        <h1 class="fl"><a href="<?php echo U('Index/index');?>"><img src="http://www.shop.com/Public/Home/images/logo.jpg" alt="韩国馆" width="160px" height="50px"></a>韩国馆</h1>
        <!-- 头部搜索 start -->
        <div class="search fl">
            <div class="search_form">
                <div class="form_left fl"></div>
                <form action="" name="serarch" method="get" class="fl">
                    <input type="text" class="txt" value="请输入商品关键字"/><input type="submit" class="btn" value="搜索"/>
                </form>
                <div class="form_right fl"></div>
            </div>

            <div style="clear:both;"></div>

            <div class="hot_search">
                <strong>热门搜索:</strong>
                <a href="">D-Link无线路由</a>
            </div>
        </div>
        <!-- 头部搜索 end -->

        <!-- 用户中心 start-->
        <div class="user fl">
            <dl>
                <dt>
                    <em></em>
                    <a href="">用户中心</a>
                    <b></b>
                </dt>
                <dd>
                    <div class="uclist mt10">
                        <ul class="list1">
                            <li><a href="<?php echo U('OrderInfo/getOrderInfoList');?>">我的订单></a></li>
                            <li><a href="<?php echo U('Address/index');?>">收货地址></a></li>
                        </ul>
                    </div>
                </dd>
            </dl>
        </div>
        <!-- 用户中心 end-->

        <!-- 购物车 start -->
        <div class="cart fl">
            <dl>
                <dt>
                    <a href="<?php echo U('ShoppingCar/index');?>">去购物车结算</a>
                    <b></b>
                </dt>
            </dl>
        </div>
        <!-- 购物车 end -->
    </div>
    <!-- 头部上半部分 end -->

    <div style="clear:both;"></div>

    <!-- 导航条部分 start -->
    <div class="nav w1210 bc mt10">
        <!--  商品分类部分 start-->
        <div class="category fl <?php echo ($isHidden?cat1:''); ?>"> <!-- 非首页，需要添加cat1类 -->
            <div class="cat_hd <?php echo ($isHidden?none:''); ?>">
                <!-- 注意，首页在此div上只需要添加cat_hd类，非首页，默认收缩分类时添加上off类，鼠标滑过时展开菜单则将off类换成on类 -->
                <h2>全部商品分类</h2>
                <em></em>
            </div>
            

        </div>
        <!--  商品分类部分 end-->
        <div class="navitems fl">
            <ul class="fl">
                <li class="col0 current"><a href="<?php echo U('Index/index');?>">首页</a></li>
                <li class="col1"><a href="<?php echo U('Index/lst',array('category_id'=>51));?>">爽肤水</a></li>
                <li class="col2"><a href="<?php echo U('Index/lst',array('category_id'=>44));?>">乳液</a></li>
                <li class="col3"><a href="<?php echo U('Index/lst',array('category_id'=>47));?>">面霜</a></li>
                <li class="col4"><a href="<?php echo U('Index/lst',array('category_id'=>46));?>">精华</a></li>
                <li class="col5"><a href="<?php echo U('Index/lst',array('category_id'=>45));?>">眼霜</a></li>
                <li class="col6"><a href="<?php echo U('Index/lst',array('category_id'=>49));?>">彩妆</a></li>
                <li class="col7"><a href="<?php echo U('Index/lst',array('category_id'=>50));?>">洗护用品</a></li>
            </ul>
            <div class="right_corner fl"></div>
        </div>
    </div>
    <!-- 导航条部分 end -->
</div>
<!-- 头部 end-->
<!-- 头部 end-->

<div style="clear:both;"></div>


    <?php if(is_array($goods)): $i = 0; $__LIST__ = $goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$good): $mod = ($i % 2 );++$i;?><div style="margin-left:149px; width:1200px; border: 1px dashed #aaaaaa;height:430px;">
            <div style="float:left;width:610px;">
                <form action="" method="post" class="form-data">
                    <table class="comment">
                        <tr class="tr1">
                            <td>
                                星级：
                                <input type="radio" name="start" class="start" value="1" /> 好评
                                <input type="radio" name="start" class="start" value="2" /> 中评
                                <input type="radio" name="start" class="start" value="3" /> 差评
                                <p class="start_error" style="color: red;margin-top:2px;line-height:40px;"></p>
                            </td>
                        </tr>
                        <tr class="tr2">
                            <td>
                                <textarea name="content" class="content" id="content" cols="80" rows="20"></textarea>
                                <p class="content_error" style="color: red;margin-top:2px;line-height:40px;"></p>
                            </td>
                        </tr>
                        <tr class="tr3">

                            <td style="position:relative;">
                                <!--<input type="submit" value="提交评论"/>-->
                                <a href="javascript:;" class="add_comment" style="color:#ffffff;background-color:#D90505; width:100px;display:block;line-height:36px;position:absolute;left:226px;top:12px;">提交评论</a>
                                <input type="hidden" name="order_sn" id="order_sn" value="<?php echo ($order_sn); ?>">
                                <input type="hidden" name="goods_id" id="goods_id" value="<?php echo ($good["goods_id"]); ?>">
                            </td>

                        </tr>
                    </table>
                </form>
            </div>
            <div style="float:left;width:590px;position:relative;">
                <img src="http://admin.shop.com/Uploads/<?php echo ($good["logo"]); ?>" style="width:40%;position:absolute;top:85px;left:100px;"/>
            </div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>



<div style="clear:both;"></div>

<!-- 底部导航 start -->

<!-- 底部导航 end -->

<div style="clear:both;"></div>
<!-- 底部版权 start -->
<div class="footer w1210 bc mt10">
    <p class="links">
        <a href="">关于我们</a> |
        <a href="">联系我们</a> |
        <a href="">人才招聘</a> |
        <a href="">商家入驻</a> |
        <a href="">千寻网</a> |
        <a href="">奢侈品网</a> |
        <a href="">广告服务</a> |
        <a href="">移动终端</a> |
        <a href="">友情链接</a> |
        <a href="">销售联盟</a> |
        <a href="">韩国馆论坛</a>
    </p>

    <!--<p class="copyright">-->
        <!--© 2005-2013 京东网上商城 版权所有，并保留所有权利。 ICP备案证书号:京ICP证070359号-->
    <!--</p>-->

    <p class="auth">
        <a href=""><img src="http://www.shop.com/Public/Home/images/xin.png" alt=""/></a>
        <a href=""><img src="http://www.shop.com/Public/Home/images/kexin.jpg" alt=""/></a>
        <a href=""><img src="http://www.shop.com/Public/Home/images/police.jpg" alt=""/></a>
        <a href=""><img src="http://www.shop.com/Public/Home/images/beian.gif" alt=""/></a>
    </p>
</div>
<!-- 底部版权 end -->

<script type="text/javascript" src="http://www.shop.com/Public/Home/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="http://www.shop.com/Public/Home/js/header.js"></script>
<script type="text/javascript">
    $(function(){
        //>>1.页面加载完毕之后，发送ajax请求去得到当前登录的用户，用js区修改静态页面的效果。
        $.getJSON('<?php echo U("Member/getUserInfo");?>',function(username){
            //用户登录了
            if(username){
                $('#userinfo').html("您好，欢迎 "+username+" 来到 韩国馆！[<a href='<?php echo U("Member/logout");?>'>注销</a>]");
            }

        });

        //>>2.当前导航凹陷特效

        //得到地址栏上面的参数
        var url=window.location.href;
        //找到category_id的位置
          url=url.split('category_id')[1];
          if(url != undefined){
            var data=url.split('.')[0];
            data= data.substring(1,data.length);
            //截取字符串
            switch(data){
                case '51':
                    $('.current').removeClass('current');
                    $('.col1').addClass('current');
                    break;
                case '44':
                     $('.current').removeClass('current');
                    $('.col2').addClass('current');
                    break;
                case '47':
                    $('.current').removeClass('current');
                    $('.col3').addClass('current');
                    break;
                case '46':
                    $('.current').removeClass('current');
                    $('.col4').addClass('current');
                    break;
                case '45':
                    $('.current').removeClass('current');
                    $('.col5').addClass('current');
                    break;
                case '49':
                    $('.current').removeClass('current');
                    $('.col6').addClass('current');
                    break;
                case '50':
                    $('.current').removeClass('current');
                    $('.col7').addClass('current');
                    break;
            }
        }
    });
</script>

    <script type="text/javascript" src="http://www.shop.com/Public/Home/layer/layer.js"></script>
    <!--<script type="text/javascript" charset="utf-8" src="http://www.shop.com/Public/Home/ueditor/ueditor.config.js"></script>-->
    <!--<script type="text/javascript" charset="utf-8" src="http://www.shop.com/Public/Home/ueditor/ueditor.all.min.js"></script>-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文&ndash;&gt;-->
    <!--<script type="text/javascript" charset="utf-8" src="http://www.shop.com/Public/Home/ueditor/lang/zh-cn/zh-cn.js"></script>-->
    <script type="text/javascript">
        $(function(){
            /*---------------------------加载百度编辑器----开始-----------*/
//            UE.getEditor('content');
            /*---------------------------加载百度编辑器----结束-----------*/

            /*----------------------------保存评论---------开始-------------*/
            $('.add_comment').click(function(){

                //找到当前表单里面的值，并提交
                var form=$(this).closest('form');
//                alert(form.html());

//                var start= $('input[name="start"]:checked').val();
//                var content= UE.getEditor('content').getContent();

                var start =form.find('input[name="start"]:checked').val();
                var content=form.find('#content').val();
                var order_sn=form.find('#order_sn').val();
                var goods_id=form.find('#goods_id').val();
                console.debug(content);
                console.debug(start);
                console.debug(order_sn);
                console.debug(goods_id);
                if(start==undefined){
                    form.find('.start_error').html('请选择等级');
                }else{
                    form.find('.start_error').html('');
                }
                if(content==null || content==''){
                    form.find('.content_error').html('请填写内容');
                }else{
                    form.find('.content_error').html('');
                }
//                var form_data=form.find('.form-data').serialize();
//                console.debug(form_data);
//                return;
                if(start && content){
                    $.post("<?php echo U('Comment/add');?>",{'order_sn':order_sn,'goods_id':goods_id,'content':content,'start':start},function(data){
                        if(data.status){
                            layer.msg(data.info, {
                                icon: data.status ? 1 : 2,  //1是√，2是×
                                time: 1000 //1秒关闭（如果不配置，默认是3秒）
                            }, function () {
                                location.href = data.url; //提示框隐藏之后就刷新页面。
                            });
                        }
                    });
                }
            });

            /*----------------------------保存评论---------结束-------------*/
        });
    </script>

</body>
</html>