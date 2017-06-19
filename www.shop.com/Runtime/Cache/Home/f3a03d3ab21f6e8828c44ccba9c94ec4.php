<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title><?php echo ($meta_title); ?></title>
    <link rel="stylesheet" href="http://www.shop.com/Public/Home/css/base.css" type="text/css">
    <link rel="stylesheet" href="http://www.shop.com/Public/Home/css/global.css" type="text/css">
    <link rel="stylesheet" href="http://www.shop.com/Public/Home/css/header.css" type="text/css">
    
    <link rel="stylesheet" href="http://www.shop.com/Public/Home/css/index.css" type="text/css">

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
                <li id="userinfo">您好,欢迎来到京西！[<a href="<?php echo U('Login/checkLogin');?>">登录</a>] [<a href="<?php echo U('Member/regist');?>">免费注册</a></li>
                <li class="line">|</li>
                <li>我的订单</li>
                <li class="line">|</li>
                <li>客户服务</li>

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
        <h1 class="fl"><a href="index.html"><img src="http://www.shop.com/Public/Home/images//logo.png" alt="京西商城"></a></h1>
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
                <a href="">休闲男鞋</a>
                <a href="">TCL空调</a>
                <a href="">耐克篮球鞋</a>
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
                    <div class="prompt">
                        您好，请<a href="">登录</a>
                    </div>
                    <div class="uclist mt10">
                        <ul class="list1 fl">
                            <li><a href="">用户信息></a></li>
                            <li><a href="">我的订单></a></li>
                            <li><a href="<?php echo U('Address/index');?>">收货地址></a></li>
                            <li><a href="">我的收藏></a></li>
                        </ul>

                        <ul class="fl">
                            <li><a href="">我的留言></a></li>
                            <li><a href="">我的红包></a></li>
                            <li><a href="">我的评论></a></li>
                            <li><a href="">资金管理></a></li>
                        </ul>

                    </div>
                    <div style="clear:both;"></div>
                    <div class="viewlist mt10">
                        <h3>最近浏览的商品：</h3>
                        <ul>
                            <li><a href=""><img src="http://www.shop.com/Public/Home/images/view_list1.jpg" alt=""/></a></li>
                            <li><a href=""><img src="http://www.shop.com/Public/Home/images/view_list2.jpg" alt=""/></a></li>
                            <li><a href=""><img src="http://www.shop.com/Public/Home/images/view_list3.jpg" alt=""/></a></li>
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
                <dd>
                    <div class="prompt">
                        购物车中还没有商品，赶紧选购吧！
                    </div>
                </dd>
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

            <div class="cat_bd <?php echo ($isHidden?off:''); ?>">
                <?php if(is_array($goodsCategorys)): $i = 0; $__LIST__ = $goodsCategorys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goodsCategory): $mod = ($i % 2 );++$i; if(($goodsCategory["level"]) == "1"): ?><div class="cat item1">
                            <h3><a href=""><?php echo ($goodsCategory["name"]); ?></a> <b></b></h3>

                            <div class="cat_detail">
                                <?php if(is_array($goodsCategorys)): $i = 0; $__LIST__ = $goodsCategorys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goodsCategory2): $mod = ($i % 2 );++$i; if(($goodsCategory2["parent_id"]) == $goodsCategory["id"]): ?><dl class="dl_1st">
                                            <dt><a href="<?php echo U('Index/lst',array('category_id'=>$goodsCategory2['id']));?>"><?php echo ($goodsCategory2["name"]); ?></a></dt>
                                            <dd>
                                                <?php if(is_array($goodsCategorys)): $i = 0; $__LIST__ = $goodsCategorys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goodsCategory3): $mod = ($i % 2 );++$i; if(($goodsCategory3["parent_id"]) == $goodsCategory2["id"]): ?><a href="<?php echo U('Index/lst',array('category_id'=>$goodsCategory3['id']));?>"><?php echo ($goodsCategory3["name"]); ?></a><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                            </dd>
                                        </dl><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            </div>
                        </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </div>

        </div>
        <!--  商品分类部分 end-->
        <div class="navitems fl">
            <ul class="fl">
                <li class="current"><a href="">首页</a></li>
                <li><a href="">爽肤水</a></li>
                <li><a href="">乳液</a></li>
                <li><a href="">面霜</a></li>
                <li><a href="">精华</a></li>
                <li><a href="">眼霜</a></li>
                <li><a href="">彩妆</a></li>
                <li><a href="">洗护用品</a></li>
                <li><a href="">网站快报</a></li>
                <li><a href="">联系我们</a></li>
            </ul>
            <div class="right_corner fl"></div>
        </div>
    </div>
    <!-- 导航条部分 end -->
</div>
<!-- 头部 end-->

<div style="clear:both;"></div>


    <!-- 综合区域 start 包括幻灯展示，商城快报 -->
    <div class="colligate w1210 bc mt10">
        <!-- 幻灯区域 start -->
        <div class="slide fl">
            <div class="area">
                <div class="slide_items">
                    <ul>
                        <li><a href=""><img src="http://www.shop.com/Public/Home/images/index_slide1.jpg" alt=""/></a></li>
                        <li><a href=""><img src="http://www.shop.com/Public/Home/images/index_slide2.jpg" alt=""/></a></li>
                        <li><a href=""><img src="http://www.shop.com/Public/Home/images/index_slide3.jpg" alt=""/></a></li>
                        <li><a href=""><img src="http://www.shop.com/Public/Home/images/index_slide4.jpg" alt=""/></a></li>
                        <li><a href=""><img src="http://www.shop.com/Public/Home/images/index_slide5.jpg" alt=""/></a></li>
                        <li><a href=""><img src="http://www.shop.com/Public/Home/images/index_slide6.jpg" alt=""/></a></li>
                    </ul>
                </div>
                <div class="slide_controls">
                    <ul>
                        <li class="on">1</li>
                        <li>2</li>
                        <li>3</li>
                        <li>4</li>
                        <li>5</li>
                        <li>6</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- 幻灯区域 end-->
    </div>
    <!-- -综合区域 end -->

    <div style="clear:both;"></div>

    <!-- 导购区域 start -->
    <div class="guide w1210 bc mt15">
        <!-- 导购左边区域 start -->
        <div class="guide_content fl">
            <h2>
                <span class="on">疯狂抢购</span>
                <span>热卖商品</span>
                <span>推荐商品</span>
                <span>新品上架</span>
                <span class="last">猜您喜欢</span>
            </h2>

            <div class="guide_wrap">
                <!-- 疯狂抢购 start-->
                <div class="crazy">
                    <ul>
                        <?php if(is_array($goods_1s)): $i = 0; $__LIST__ = $goods_1s;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goods_1): $mod = ($i % 2 );++$i;?><li>
                                <dl>
                                    <dt><a href="<?php echo U('show',array('id'=>$goods_1['id']));?>"><img src="http://admin.shop.com/Uploads/<?php echo ($goods_1["logo"]); ?>" alt="" /></a></dt>
                                    <dd><a href="<?php echo U('show',array('id'=>$goods_1['id']));?>"><?php echo ($goods_1["name"]); ?></a></dd>
                                    <dd><span>售价：</span><strong> ￥<?php echo ($goods_1["shop_price"]); ?></strong></dd>
                                </dl>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
                <!-- 疯狂抢购 end-->

                <!-- 热卖商品 start -->
                <div class="hot none">
                    <ul>
                        <?php if(is_array($goods_2s)): $i = 0; $__LIST__ = $goods_2s;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goods_2): $mod = ($i % 2 );++$i;?><li>
                                <dl>
                                    <dt><a href="<?php echo U('show',array('id'=>$goods_2['id']));?>"><img src="http://admin.shop.com/Uploads/<?php echo ($goods_2["logo"]); ?>" alt="" /></a></dt>
                                    <dd><a href="<?php echo U('show',array('id'=>$goods_2['id']));?>"><?php echo ($goods_2["name"]); ?></a></dd>
                                    <dd><span>售价：</span><strong> ￥<?php echo ($goods_2["shop_price"]); ?></strong></dd>
                                </dl>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
                <!-- 热卖商品 end -->

                <!-- 推荐商品 atart -->
                <div class="recommend none">
                    <ul>
                        <?php if(is_array($goods_4s)): $i = 0; $__LIST__ = $goods_4s;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goods_4): $mod = ($i % 2 );++$i;?><li>
                                <dl>
                                    <dt><a href="<?php echo U('show',array('id'=>$goods_4['id']));?>"><img src="http://admin.shop.com/Uploads/<?php echo ($goods_4["logo"]); ?>" alt="" /></a></dt>
                                    <dd><a href="<?php echo U('show',array('id'=>$goods_4['id']));?>"><?php echo ($goods_4["name"]); ?></a></dd>
                                    <dd><span>售价：</span><strong> ￥<?php echo ($goods_4["shop_price"]); ?></strong></dd>
                                    <!--<dd><?php echo U(print_r($goods_2['logo']));?></dd>-->
                                </dl>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
                <!-- 推荐商品 end -->

                <!-- 新品上架 start-->
                <div class="new none">
                    <ul>
                        <?php if(is_array($goods_8s)): $i = 0; $__LIST__ = $goods_8s;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goods_8): $mod = ($i % 2 );++$i;?><li>
                                <dl>
                                    <dt><a href="<?php echo U('show',array('id'=>$goods_8['id']));?>"><img src="http://admin.shop.com/Uploads/<?php echo ($goods_8["logo"]); ?>" alt="" /></a></dt>
                                    <dd><a href="<?php echo U('show',array('id'=>$goods_8['id']));?>"><?php echo ($goods_8["name"]); ?></a></dd>
                                    <dd><span>售价：</span><strong> ￥<?php echo ($goods_8["shop_price"]); ?></strong></dd>
                                </dl>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
                <!-- 新品上架 end-->

                <!-- 猜您喜欢 start -->
                <div class="guess none">
                    <ul>
                        <?php if(is_array($goods_16s)): $i = 0; $__LIST__ = $goods_16s;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goods_16): $mod = ($i % 2 );++$i;?><li>
                                <dl>
                                    <dt><a href="<?php echo U('show',array('id'=>$goods_16['id']));?>"><img src="http://admin.shop.com/Uploads/<?php echo ($goods_16["logo"]); ?>" alt="" /></a></dt>
                                    <dd><a href="<?php echo U('show',array('id'=>$goods_16['id']));?>"><?php echo ($goods_16["name"]); ?></a></dd>
                                    <dd><span>售价：</span><strong> ￥<?php echo ($goods_16["shop_price"]); ?></strong></dd>
                                </dl>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
                <!-- 猜您喜欢 end -->

            </div>

        </div>
        <!-- 导购左边区域 end -->
    </div>
    <!-- 导购区域 end -->

    <div style="clear:both;"></div>

    <!--1F 电脑办公 start -->
    <div class="floor1 floor w1210 bc mt10">
            <div class="news mt10">
                <h2><a href="">更多快报&nbsp;></a><strong>网站快报</strong></h2>
                <ul>
                    <?php if(is_array($news)): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?><li><a href=""><?php echo ($new["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
    </div>
    <!--1F 电脑办公 end -->


<div style="clear:both;"></div>

<!-- 底部导航 start -->
<div class="bottomnav w1210 bc mt10">
    <?php if(is_array($articleCategorys)): $k = 0; $__LIST__ = $articleCategorys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$articleCategory): $mod = ($k % 2 );++$k;?><div class="bnav<?php echo ($k); ?>">
            <h3><b></b> <em><?php echo ($articleCategory["name"]); ?></em></h3>
            <ul>
                <?php if(is_array($articles)): $i = 0; $__LIST__ = $articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article): $mod = ($i % 2 );++$i; if(($article["article_category_id"]) == $articleCategory["id"]): ?><li><a href=""><?php echo ($article["name"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
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
        <a href="">京西论坛</a>
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
                $('#userinfo').html("您好，欢迎"+username+"来到京西！[<a href='<?php echo U("Login/logout");?>'>注销</a>]");
            }
        });
    });
</script>

    <script type="text/javascript" src="http://www.shop.com/Public/Home/js/index.js"></script>

</body>
</html>