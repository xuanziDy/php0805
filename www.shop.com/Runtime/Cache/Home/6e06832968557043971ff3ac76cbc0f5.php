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
		<form action="<?php echo U('Index/lst',array('category_id'=>$category_id));?>" name="serarch" method="post" class="fl">
			<input type="text" class="txt" name="keyword" value="请输入商品关键字"/><input type="submit" class="btn" value="搜索"/>
		</form>
		<div class="form_right fl"></div>
	</div>
	<div style="clear:both;"></div>

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

		<!-- 列表内容 start -->
		<div class="list_bd fl ml10 mt10">
			<div style="clear:both;"></div>

			<!-- 商品筛选 start -->
			<!--<div class="filter mt10">-->
				<!--<h2><a href="">重置筛选条件</a> <strong>商品筛选</strong></h2>-->
				<!--<div class="filter_wrap">-->
					<!--&lt;!&ndash;<dl>&ndash;&gt;-->
						<!--&lt;!&ndash;<dt>品牌：</dt>&ndash;&gt;-->
						<!--&lt;!&ndash;<dd class="cur"><a href="">不限</a></dd>&ndash;&gt;-->
						<!--&lt;!&ndash;<dd><a href="">联想（ThinkPad）</a></dd>&ndash;&gt;-->
					<!--&lt;!&ndash;</dl>&ndash;&gt;-->
					<!--<dl>-->
						<!--<dt>功效：</dt>-->
						<!--<dd class="cur"><a href="">不限</a></dd>-->
						<!--<dd><a href="">保湿</a></dd>-->
						<!--<dd><a href="">补水</a></dd>-->
						<!--<dd><a href="">美白</a></dd>-->
						<!--<dd><a href="">紧致</a></dd>-->
						<!--<dd><a href="">抗老</a></dd>-->
						<!--<dd><a href="">清爽</a></dd>-->
						<!--<dd><a href="">滋润</a></dd>-->
					<!--</dl>-->

					<!--<dl>-->
						<!--<dt>产地：</dt>-->
						<!--<dd class="cur"><a href="">不限</a></dd>-->
						<!--<dd><a href="">韩国</a></dd>-->
						<!--<dd><a href="">中国</a></dd>-->
					<!--</dl>-->

					<!--<dl>-->
						<!--<dt>适合肤质：</dt>-->
						<!--<dd class="cur"><a href="">不限</a></dd>-->
						<!--<dd><a href="">正常肤质</a></dd>-->
						<!--<dd><a href="">敏感肤质</a></dd>-->
						<!--<dd><a href="">干性肤质</a></dd>-->
						<!--<dd><a href="">油性肤质</a></dd>-->
					<!--</dl>-->
					<!--<dl>-->
						<!--<dt>保质期：</dt>-->
						<!--<dd class="cur"><a href="">不限</a></dd>-->
						<!--<dd><a href="">半年</a></dd>-->
						<!--<dd><a href="">1年</a></dd>-->
						<!--<dd><a href="">2年</a></dd>-->
						<!--<dd><a href="">3年</a></dd>-->
					<!--</dl>-->
					<!--<dl class="last">-->
						<!--<dt>生产日期：</dt>-->
						<!--<dd class="cur"><a href="">不限</a></dd>-->
						<!--<dd><a href="">2014</a></dd>-->
						<!--<dd><a href="">2015</a></dd>-->
						<!--<dd><a href="">2016</a></dd>-->
					<!--</dl>-->
				<!--</div>-->
			<!--</div>-->
			<!-- 商品筛选 end -->

			<div style="clear:both;"></div>

			<!-- 排序 start -->
			<!--<div class="sort mt10">-->
				<!--&lt;!&ndash;<dl>&ndash;&gt;-->
					<!--&lt;!&ndash;<dt>排序：</dt>&ndash;&gt;-->
					<!--&lt;!&ndash;<dd class="cur"><a href="">销量</a></dd>&ndash;&gt;-->
					<!--&lt;!&ndash;<dd><a href="">价格</a></dd>&ndash;&gt;-->
					<!--&lt;!&ndash;<dd><a href="">评论数</a></dd>&ndash;&gt;-->
					<!--&lt;!&ndash;<dd><a href="">上架时间</a></dd>&ndash;&gt;-->
				<!--&lt;!&ndash;</dl>&ndash;&gt;-->
			<!--</div>-->
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
				<!--<a href="">首页</a>-->
				<!--<a href="">上一页</a>-->
				<!--<a href="">1</a>-->
				<!--<a href="">2</a>-->
				<!--<a href="" class="cur">3</a>-->
				<!--<a href="">4</a>-->
				<!--<a href="">5</a>-->
				<!--<a href="">下一页</a>-->
				<!--<a href="">尾页</a>&nbsp;&nbsp;-->
				<!--<span>-->
					<!--<em>共8页&nbsp;&nbsp;到第 <input type="text" class="page_num" value="3"/> 页</em>-->
					<!--<a href="" class="skipsearch" href="javascript:;">确定</a>-->
				<!--</span>-->
				<?php echo ($pageHtml); ?>
			</div>
			<!-- 分页信息 end -->

		</div>
		<!-- 列表内容 end -->
	</div>
	<!-- 列表主体 end-->


<!--<div style="clear:both;"></div>-->

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

	<script type="text/javascript" src="http://www.shop.com/Public/Home/js/list.js"></script>

</body>
</html>