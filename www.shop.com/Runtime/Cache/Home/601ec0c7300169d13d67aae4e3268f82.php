<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title><?php echo ($meta_title); ?></title>
    <link rel="stylesheet" href="http://www.shop.com/Public/Home/css/base.css" type="text/css">
    <link rel="stylesheet" href="http://www.shop.com/Public/Home/css/global.css" type="text/css">
    <link rel="stylesheet" href="http://www.shop.com/Public/Home/css/header.css" type="text/css">
    
	<link rel="stylesheet" href="http://www.shop.com/Public/Home/css/list.css" type="text/css">
	<link rel="stylesheet" href="http://www.shop.com/Public/Home/css/common.css" type="text/css">

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
                <li><a href="">电脑频道</a></li>
                <li><a href="">家用电器</a></li>
                <li><a href="">品牌大全</a></li>
                <li><a href="">团购</a></li>
                <li><a href="">积分商城</a></li>
                <li><a href="">夺宝奇兵</a></li>
            </ul>
            <div class="right_corner fl"></div>
        </div>
    </div>
    <!-- 导航条部分 end -->
</div>
<!-- 头部 end-->

<div style="clear:both;"></div>


	<!-- 列表主体 start -->
	<div class="list w1210 bc mt10">
		<!-- 面包屑导航 start -->
		<div class="breadcrumb">
			<h2>当前位置：
				<a href="http://www.shop.com">首页</a>&nbsp;>&nbsp;
				<?php if(is_array($mbx_goodsCategorys)): $i = 0; $__LIST__ = $mbx_goodsCategorys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$mbx_goodsCategory): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Index/lst',array('category_id'=>$mbx_goodsCategory['id']));?>"><?php echo ($mbx_goodsCategory["name"]); ?></a>&nbsp;>&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
			</h2>
		</div>
		<!-- 面包屑导航 end -->

		<!-- 左侧内容 start -->
		<!--<div class="list_left fl mt10">-->
			<!--&lt;!&ndash; 分类列表 start &ndash;&gt;-->
			<!--<div class="catlist">-->
				<!--<h2>电脑、办公</h2>-->
				<!--<div class="catlist_wrap">-->
					<!--<div class="child">-->
						<!--<h3 class="on"><b></b>电脑整机</h3>-->
						<!--<ul>-->
							<!--<li><a href="">笔记本</a></li>-->
							<!--<li><a href="">超极本</a></li>-->
							<!--<li><a href="">平板电脑</a></li>-->
						<!--</ul>-->
					<!--</div>-->

					<!--<div class="child">-->
						<!--<h3><b></b>电脑配件</h3>-->
						<!--<ul class="none">-->
							<!--<li><a href="">CPU</a></li>-->
							<!--<li><a href="">主板</a></li>-->
							<!--<li><a href="">显卡</a></li>-->
						<!--</ul>-->
					<!--</div>-->

					<!--<div class="child">-->
						<!--<h3><b></b>办公打印</h3>-->
						<!--<ul class="none">-->
							<!--<li><a href="">打印机</a></li>-->
							<!--<li><a href="">一体机</a></li>-->
							<!--<li><a href="">投影机</a></li>-->
							<!--</li>-->
						<!--</ul>-->
					<!--</div>-->

					<!--<div class="child">-->
						<!--<h3><b></b>网络产品</h3>-->
						<!--<ul class="none">-->
							<!--<li><a href="">路由器</a></li>-->
							<!--<li><a href="">网卡</a></li>-->
							<!--<li><a href="">交换机</a></li>-->
							<!--</li>-->
						<!--</ul>-->
					<!--</div>-->

					<!--<div class="child">-->
						<!--<h3><b></b>外设产品</h3>-->
						<!--<ul class="none">-->
							<!--<li><a href="">鼠标</a></li>-->
							<!--<li><a href="">键盘</a></li>-->
							<!--<li><a href="">U盘</a></li>-->
						<!--</ul>-->
					<!--</div>-->
				<!--</div>-->

				<!--<div style="clear:both; height:1px;"></div>-->
			<!--</div>-->
			<!--&lt;!&ndash; 分类列表 end &ndash;&gt;-->

			<!--<div style="clear:both;"></div>-->

			<!--&lt;!&ndash; 新品推荐 start &ndash;&gt;-->
			<!--<div class="newgoods leftbar mt10">-->
				<!--<h2><strong>新品推荐</strong></h2>-->
				<!--<div class="leftbar_wrap">-->
					<!--<ul>-->
						<!--<li>-->
							<!--<dl>-->
								<!--<dt><a href=""><img src="http://www.shop.com/Public/Home/images/list_hot1.jpg" alt="" /></a></dt>-->
								<!--<dd><a href="">美即流金丝语悦白美颜新年装4送3</a></dd>-->
								<!--<dd><strong>￥777.50</strong></dd>-->
							<!--</dl>-->
						<!--</li>-->

						<!--<li>-->
							<!--<dl>-->
								<!--<dt><a href=""><img src="http://www.shop.com/Public/Home/images/list_hot2.jpg" alt="" /></a></dt>-->
								<!--<dd><a href="">领券满399减50 金斯利安多维片</a></dd>-->
								<!--<dd><strong>￥239.00</strong></dd>-->
							<!--</dl>-->
						<!--</li>-->

						<!--<li class="last">-->
							<!--<dl>-->
								<!--<dt><a href=""><img src="http://www.shop.com/Public/Home/images/list_hot3.jpg" alt="" /></a></dt>-->
								<!--<dd><a href="">皮尔卡丹pierrecardin 男士长...</a></dd>-->
								<!--<dd><strong>￥1240.50</strong></dd>-->
							<!--</dl>-->
						<!--</li>-->
					<!--</ul>-->
				<!--</div>-->
			<!--</div>-->
			<!--&lt;!&ndash; 新品推荐 end &ndash;&gt;-->

			<!--&lt;!&ndash;热销排行 start &ndash;&gt;-->
			<!--<div class="hotgoods leftbar mt10">-->
				<!--<h2><strong>热销排行榜</strong></h2>-->
				<!--<div class="leftbar_wrap">-->
					<!--<ul>-->
						<!--<li></li>-->
					<!--</ul>-->
				<!--</div>-->
			<!--</div>-->
			<!--&lt;!&ndash;热销排行 end &ndash;&gt;-->

			<!--&lt;!&ndash; 最近浏览 start &ndash;&gt;-->
			<!--<div class="viewd leftbar mt10">-->
				<!--<h2><a href="">清空</a><strong>最近浏览过的商品</strong></h2>-->
				<!--<div class="leftbar_wrap">-->
					<!--<dl>-->
						<!--<dt><a href=""><img src="http://www.shop.com/Public/Home/images/hpG4.jpg" alt="" /></a></dt>-->
						<!--<dd><a href="">惠普G4-1332TX 14英寸笔记...</a></dd>-->
					<!--</dl>-->

					<!--<dl class="last">-->
						<!--<dt><a href=""><img src="http://www.shop.com/Public/Home/images/crazy4.jpg" alt="" /></a></dt>-->
						<!--<dd><a href="">直降200元！TCL正1.5匹空调</a></dd>-->
					<!--</dl>-->
				<!--</div>-->
			<!--</div>-->
			<!--&lt;!&ndash; 最近浏览 end &ndash;&gt;-->
		<!--</div>-->
		<!-- 左侧内容 end -->

		<!-- 列表内容 start -->
		<div class="list_bd fl ml10 mt10">
			<div style="clear:both;"></div>

			<!-- 商品筛选 start -->
			<div class="filter mt10">
				<h2><a href="">重置筛选条件</a> <strong>商品筛选</strong></h2>
				<div class="filter_wrap">
					<dl>
						<dt>品牌：</dt>
						<dd class="cur"><a href="">不限</a></dd>
						<dd><a href="">联想（ThinkPad）</a></dd>
						<dd><a href="">联想（Lenovo）</a></dd>
						<dd><a href="">宏碁（acer）</a></dd>
						<dd><a href="">华硕（ASUS）</a></dd>
						<dd><a href="">戴尔（DELL）</a></dd>
						<dd><a href="">索尼（SONY）</a></dd>
						<dd><a href="">惠普（HP）</a></dd>
						<dd><a href="">三星（SAMSUNG）</a></dd>
						<dd><a href="">优派（ViewSonic）</a></dd>
						<dd><a href="">苹果（Apple）</a></dd>
						<dd><a href="">富士通（Fujitsu）</a></dd>
					</dl>

					<dl>
						<dt>价格：</dt>
						<dd class="cur"><a href="">不限</a></dd>
						<dd><a href="">1000-1999</a></dd>
						<dd><a href="">2000-2999</a></dd>
						<dd><a href="">3000-3499</a></dd>
						<dd><a href="">3500-3999</a></dd>
						<dd><a href="">4000-4499</a></dd>
						<dd><a href="">4500-4999</a></dd>
						<dd><a href="">5000-5999</a></dd>
						<dd><a href="">6000-6999</a></dd>
						<dd><a href="">7000-7999</a></dd>
					</dl>

					<dl>
						<dt>尺寸：</dt>
						<dd class="cur"><a href="">不限</a></dd>
						<dd><a href="">10.1英寸及以下</a></dd>
						<dd><a href="">11英寸</a></dd>
						<dd><a href="">12英寸</a></dd>
						<dd><a href="">13英寸</a></dd>
						<dd><a href="">14英寸</a></dd>
						<dd><a href="">15英寸</a></dd>
					</dl>

					<dl class="last">
						<dt>处理器：</dt>
						<dd class="cur"><a href="">不限</a></dd>
						<dd><a href="">intel i3</a></dd>
						<dd><a href="">intel i5</a></dd>
						<dd><a href="">intel i7</a></dd>
						<dd><a href="">AMD A6</a></dd>
						<dd><a href="">AMD A8</a></dd>
						<dd><a href="">AMD A10</a></dd>
						<dd><a href="">其它intel平台</a></dd>
					</dl>
				</div>
			</div>
			<!-- 商品筛选 end -->

			<div style="clear:both;"></div>

			<!-- 排序 start -->
			<div class="sort mt10">
				<dl>
					<dt>排序：</dt>
					<dd class="cur"><a href="">销量</a></dd>
					<dd><a href="">价格</a></dd>
					<dd><a href="">评论数</a></dd>
					<dd><a href="">上架时间</a></dd>
				</dl>
			</div>
			<!-- 排序 end -->

			<div style="clear:both;"></div>

			<!-- 商品列表 start-->
			<div class="goodslist mt10">
				<ul>
					<?php if(is_array($lst_goods)): $i = 0; $__LIST__ = $lst_goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$lst_good): $mod = ($i % 2 );++$i;?><li>
							<dl>
								<dt><a href="<?php echo U('show',array('id'=>$lst_good['id']));?>"><img src="http://admin.shop.com/Uploads/<?php echo ($lst_good["logo"]); ?>" alt="logo" /></a></dt>
								<dd><a href="<?php echo U('show',array('id'=>$lst_good['id']));?>"><?php echo ($lst_good["name"]); ?></a></dt>
								<dd><strong>￥<?php echo ($lst_good["shop_price"]); ?></strong></dt>
								<dd><a href=""><em>已有xx人评价</em></a></dt>

							</dl>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
			<!-- 商品列表 end-->

			<!-- 分页信息 start -->
			<div class="page mt20">
				<a href="">首页</a>
				<a href="">上一页</a>
				<a href="">1</a>
				<a href="">2</a>
				<a href="" class="cur">3</a>
				<a href="">4</a>
				<a href="">5</a>
				<a href="">下一页</a>
				<a href="">尾页</a>&nbsp;&nbsp;
				<span>
					<em>共8页&nbsp;&nbsp;到第 <input type="text" class="page_num" value="3"/> 页</em>
					<a href="" class="skipsearch" href="javascript:;">确定</a>
				</span>
			</div>
			<!-- 分页信息 end -->

		</div>
		<!-- 列表内容 end -->
	</div>
	<!-- 列表主体 end-->


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

	<script type="text/javascript" src="http://www.shop.com/Public/Home/js/list.js"></script>

</body>
</html>