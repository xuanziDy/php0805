<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title><?php echo ($meta_title); ?></title>
    <link rel="stylesheet" href="http://www.shop.com/Public/Home/css/base.css" type="text/css">
    <link rel="stylesheet" href="http://www.shop.com/Public/Home/css/global.css" type="text/css">
    <link rel="stylesheet" href="http://www.shop.com/Public/Home/css/header.css" type="text/css">
    
    <link rel="stylesheet" href="http://www.shop.com/Public/Home/css/index.css" type="text/css">
    <link rel="stylesheet" href="http://www.shop.com/Public/Home/css/home.css" type="text/css">
    <link rel="stylesheet" href="http://www.shop.com/Public/Home/css/address.css" type="text/css">

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



    <?php if(is_array($infos)): $i = 0; $__LIST__ = $infos;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$order): $mod = ($i % 2 );++$i;?><dl style="width:1200px; line-height:30px; text-align:center; margin:0 auto; border:1px dotted #666;">
            <dt style="width:1200px;background-color: #aaaaaa;line-height:40px;">订单号：<?php echo ($order["sn"]); ?></dt>
            <dd style="width:1200px;">
                <table style="width:1200px; line-height:30px; text-align:center; margin:0 auto;  cellpadding:1px;">
                    <tr  >
                        <th width="15%" style="text-align:center;">商品快照</th>
                        <th width="25%" style="text-align:center;">商品名称</th>
                        <th width="10%" style="text-align:center;">商品数量</th>
                        <th width="10%" style="text-align:center;">商品总价</th>
                        <th width="20%" style="text-align:center;">支付状态</th>
                        <th width="20%" style="text-align:center;">操作</th>
                    </tr>
                    <?php if(is_array($order["list"])): $i = 0; $__LIST__ = $order["list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$info): $mod = ($i % 2 );++$i;?><tr>
                            <td><a href="<?php echo U('Index/show',array('id'=>$info['goods_id']));?>"><img src="<?php echo ($info["logo"]); ?>" style="width:40%;" alt="<?php echo ($info["name"]); ?>照片"/></a></td>
                            <td><a href="<?php echo U('Index/show',array('id'=>$info['goods_id']));?>"><?php echo ($info["name"]); ?></a></td>
                            <td><?php echo ($info["num"]); ?></td>
                            <td><?php echo ($info["price"]); ?></td>
                            <?php if(($i) == "1"): ?><td>
                                    <?php switch($info["pay_status"]): case "0": ?><font color="red">未支付</font><?php break;?>
                                        <?php case "1": ?><font color="green"> 已付款</font><?php break; endswitch;?> |
                                    <?php switch($info["shipping_status"]): case "0": ?><font color="red">未发货</font><?php break;?>
                                        <?php case "1": ?><font color="green"> 配货中</font><?php break;?>
                                        <?php case "2": ?><font color="green"> 已发货</font><?php break; endswitch;?> |
                                    <?php switch($info["order_status"]): case "0": ?><font color="red">未确认</font><?php break;?>
                                        <?php case "1": ?><font color="green"> 已确认</font><?php break;?>
                                        <?php case "2": ?><font color="red"> 退货中</font><?php break;?>
                                        <?php case "3": ?><font color="green"> 已退货</font><?php break; endswitch;?>
                                </td>
                                <td>
                                    <!--已发货-->
                                    <?php if(($info["shipping_status"]) == "2"): switch($info["order_status"]): case "0": ?><!--未收货-->
                                                <a href="javascript:;" onclick="affirm(1,<?php echo ($info["order_id"]); ?>)"><font color="green"> 确认收货</font></a> |
                                                <a href="javascript:;" onclick="affirm(2,<?php echo ($info["order_id"]); ?>)"><font color="green"> 去退货</font></a> |
                                                <?php switch($info["comment_status"]): case "0": ?><a href="<?php echo U('Comment/add',array('order_id'=>$info['order_id']));?>"><font color="green">去评价</font></a><?php break;?>
                                                    <?php case "1": ?>已评价<?php break; endswitch;?>
                                                <!---付款 {已收货|退货中|已退货}-->
                                                <?php if(($info["pay_status"] == 1) AND ($info["order_status"] != 0) AND ($info["order_status"] != -1)): ?>|  <a href="javascript:;" onclick="deleteOrder(<?php echo ($info["order_id"]); ?>)"><font color="green">删除</font></a><?php endif; break;?>
                                            <?php case "1": ?><!--已收货-->
                                                已收货 |  <a href="javascript:;" onclick="affirm(2,<?php echo ($info["order_id"]); ?>)"><font color="red">去退货</font></a> |
                                                <?php switch($info["comment_status"]): case "0": ?><a href="<?php echo U('Comment/add',array('order_id'=>$info['order_id']));?>"><font color="red">去评价</font></a><?php break;?>
                                                    <?php case "1": ?>已评价<?php break;?>
                                                    <?php default: ?><a href="<?php echo U('Comment/add',array('order_id'=>$info['order_id']));?>"><font color="red">去评价</font></a><?php endswitch;?>
                                                <?php if(($info["pay_status"] == 1) AND ($info["order_status"] != 0) AND ($info["order_status"] != -1)): ?>|  <a href="javascript:;" onclick="deleteOrder(<?php echo ($info["order_id"]); ?>)"><font color="green">删除</font></a><?php endif; break;?>
                                            <?php default: ?> -- | --<?php endswitch;?>
                                        <?php else: ?>
                                        -- | --<?php endif; ?>
                                </td><?php endif; ?>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </table>
            </dd>
        </dl>
        <input type="hidden" name="order_id" value="<?php echo ($info["order_id"]); ?>"/><?php endforeach; endif; else: echo "" ;endif; ?>


<!--<div style="clear:both;"></div>-->

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
    <!--<script type="text/javascript" src="http://www.shop.com/Public/Home/js/common.js"></script>-->
    <script type="text/javascript">
        //改变收货状态
        function affirm(order_status,order_id){
             $.post("<?php echo U('OrderInfo/affirm');?>",{order_status:order_status,order_id:order_id},function(data){
                     layer.msg(data.info, {
                         icon: data.status ? 1 : 2,  //1是√，2是×
                         time: 1000 //1秒关闭（如果不配置，默认是3秒）
                     }, function () {
                         location.href = data.url; //提示框隐藏之后就刷新页面。
                     });
             });
        }

        //删除订单
        function deleteOrder(order_id)
        {
            $.post("<?php echo U('OrderInfo/deleteOrder');?>",{order_id:order_id},function(data){
                layer.msg(data.info, {
                    icon: data.status ? 1 : 2,  //1是√，2是×
                    time: 1000 //1秒关闭（如果不配置，默认是3秒）
                }, function () {
                    location.href = data.url; //提示框隐藏之后就刷新页面。
                });
            });
        }
    </script>

</body>
</html>