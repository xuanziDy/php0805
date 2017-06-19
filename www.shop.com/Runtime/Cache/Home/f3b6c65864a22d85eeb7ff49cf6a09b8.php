<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>购物车页面</title>
	<link rel="stylesheet" href="http://www.shop.com/Public/Home/css/base.css" type="text/css">
	<link rel="stylesheet" href="http://www.shop.com/Public/Home/css/global.css" type="text/css">
	<link rel="stylesheet" href="http://www.shop.com/Public/Home/css/header.css" type="text/css">
	<link rel="stylesheet" href="http://www.shop.com/Public/Home/css/cart.css" type="text/css">
	<link rel="stylesheet" href="http://www.shop.com/Public/Home/css/footer.css" type="text/css">

	<script type="text/javascript" src="http://www.shop.com/Public/Home/js/jquery-1.8.3.min.js"></script>
	<!--<script type="text/javascript" src="http://www.shop.com/Public/Home/js/cart1.js"></script>-->
	<style type="text/css">
		.big{
			width:100px;height:30px;
		}
	</style>
</head>
<body>
	<!-- 顶部导航 start -->
	<div class="topnav">
		<div class="topnav_bd w990 bc">
			<div class="topnav_left">
				
			</div>
			<div class="topnav_right fr">
				<ul>
					<li id="userinfo">您好，欢迎来到韩国馆！[<a href="<?php echo U('Member/checkLogin');?>">登录</a>] [<a href="<?php echo U('Member/regist');?>">免费注册</a>] </li>
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
	
	<!-- 页面头部 start -->
	<div class="header w990 bc mt15">
		<div class="logo w990">
			<h2 class="fl"><a href="<?php echo U('Index/index');?>"><img src="http://www.shop.com/Public/Home/images/logo.jpg" alt="韩国馆" width="160px" height="50px"></a></h2>
			<div class="flow fr">
				<ul>
					<li class="cur">1.我的购物车</li>
					<li>2.填写核对订单信息</li>
					<li>3.成功提交订单</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- 页面头部 end -->
	
	<div style="clear:both;"></div>

	<!-- 主体部分 start -->
	<div class="mycart w990 mt10 bc" >
		<h2><span>我的购物车</span></h2>
		<table id="cars">
			<thead>
				<tr>
					<th class="col1" style="text-align: center">商品名称</th>
					<th class="col2"  style="text-align: center">商品属性</th>
					<th class="col3"  style="text-align: center">单价</th>
					<th class="col4"  style="text-align: center">数量</th>
					<th class="col5"  style="text-align: center">小计</th>
					<th class="col6"  style="text-align: center">操作</th>
				</tr>
			</thead>
			<tbody >
				<!---疑点2：（item,index）不能用-->
					<tr v-for="item in productList">
						<td class="col1"  style="text-align: center">
							<input type="checkbox" name="ids[]" value="{{ item.id }}" v-bind:class="{'big':item.checked}" @click="selectProduct(item)" v-bind:checked="item.checked"/>
							<a href=""><img  alt="图片"  v-bind:src="item.logo"/></a>  <strong><a href="">{{ item.name }}</a></strong>
						</td>
						<td class="col2"  style="text-align: center">
							<!--此处也可写成-->
							<!--<span v-for="attr in item.goods_attributes"  >{{ attr }}</span>-->
							<span v-for="attr in item.goods_attributes"  v-text="attr"></span>
						</td>
						<td class="col3"  style="text-align: center"><span>{{ item.shop_price | formatMoney }}</span></td>
						<td class="col4"  style="text-align: center">
							<a href="javascript:;" class="reduce_num" v-on:click="changeNum(item,-1)"></a>
							<input type="text" name="amount" value="{{ item.num }}" class="amount" disabled v-model="item.num"/>
							<a href="javascript:;" class="add_num" @click="changeNum(item,1)"></a>
						</td>
						<td class="col5"  style="text-align: center"><span>{{ item.num * item.shop_price | formatMoney}}</span></td>
						<td class="col6"  style="text-align: center"><a href="javascript:;" @click="delProduct(item)">删除</a></td>
					</tr>
			</tbody>
			<tfoot>
			<tr>
				<td colspan="6">
					<input type="checkbox" name="all_ids" :class="{'big':checkAllFlag}" @click="checkAll"/>全选
				</td>
			</tr>
				<tr>
					<td colspan="6">购物金额总计： <strong><span id="total">{{ total_money | formatMoney}}</span></strong></td>
				</tr>
			</tfoot>
		</table>
		<div class="cart_btn w990 bc mt10">
			<a href="<?php echo U('Index/index');?>" class="continue">继续购物</a>
			<a href="<?php echo U('OrderInfo/index');?>" class="checkout" >结 算</a>
		</div>
	</div>
	<!-- 主体部分 end -->

	<div style="clear:both;"></div>
	<!-- 底部版权 start -->
	<div class="footer w1210 bc mt15">
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
		<p class="copyright">
			 © 2005-2013 韩国馆网上商城 版权所有，并保留所有权利。  ICP备案证书号:京ICP证070359号
		</p>
		<p class="auth">
			<a href=""><img src="http://www.shop.com/Public/Home/images/xin.png" alt="" /></a>
			<a href=""><img src="http://www.shop.com/Public/Home/images/kexin.jpg" alt="" /></a>
			<a href=""><img src="http://www.shop.com/Public/Home/images/police.jpg" alt="" /></a>
			<a href=""><img src="http://www.shop.com/Public/Home/images/beian.gif" alt="" /></a>
		</p>
	</div>
	<!-- 底部版权 end -->
</body>
<script type="text/javascript">
	$(function(){
		//>>1.页面加载完毕之后，发送ajax请求去得到当前登录的用户，用js区修改静态页面的效果。
		$.getJSON('<?php echo U("Member/getUserInfo");?>',function(username){
			//用户登录了
			if(username){
				$('#userinfo').html("您好，欢迎 "+username+" 来到 韩国馆！[<a href='<?php echo U("Member/logout");?>'>注销</a>]");
			}
		});
	});
</script>



<!--<script type="text/javascript" src="http://www.shop.com/Public/Home/js/javascript.min.js"></script>-->
<script type="text/javascript" src="http://www.shop.com/Public/Home/js/vue.js"></script>
<script type="text/javascript" src="http://www.shop.com/Public/Home/js/myvue_car1.js"></script>


</html>