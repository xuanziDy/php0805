<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>填写核对订单信息</title>
	<link rel="stylesheet" href="http://www.shop.com/Public/Home/css/base.css" type="text/css">
	<link rel="stylesheet" href="http://www.shop.com/Public/Home/css/global.css" type="text/css">
	<link rel="stylesheet" href="http://www.shop.com/Public/Home/css/header.css" type="text/css">
	<link rel="stylesheet" href="http://www.shop.com/Public/Home/css/fillin.css" type="text/css">
	<link rel="stylesheet" href="http://www.shop.com/Public/Home/css/footer.css" type="text/css">



</head>
<body>
	<!-- 顶部导航 start -->
	<div class="topnav">
		<div class="topnav_bd w990 bc">
			<div class="topnav_left">
				
			</div>
			<div class="topnav_right fr">
				<ul>
					<?php $var = $_SESSION['sess_']['USERINFO']; ?>
					<!--<?php echo dump('$Think.session.USERINFO');?>-->
					<!--<li id="userinfo">您好<?php echo ($var["username"]); ?>，欢迎来到韩国馆！<?php if(empty($var)): ?>[<a href="<?php echo U('Member/checkLogin');?>">登录</a>] [<a href="<?php echo U('Member/regist');?>">免费注册</a>]<?php else: ?>[<a href="<?php echo U('Member/logout');?>">注销</a>]<?php endif; ?> </li>-->
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
			<h2 class="fl"><a href="index.html"><img src="http://www.shop.com/Public/Home/images/logo.jpg" alt="韩国馆" width="160px" height="50px"></a></h2>
			<div class="flow fr flow2">
				<ul>
					<li>1.我的购物车</li>
					<li class="cur">2.填写核对订单信息</li>
					<li>3.成功提交订单</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- 页面头部 end -->
	
	<div style="clear:both;"></div>

	<!-- 主体部分 start -->
	<form action="<?php echo U('add');?>" method="post">
	<div class="fillin w990 bc mt15">
		<div class="fillin_hd">
			<h2>填写并核对订单信息</h2>
		</div>

		<div class="fillin_bd">
			<!-- 收货人信息  start-->
			<div class="address">
				<h3>收货人信息</h3>
				<div class="address_select">
					<ul>
						<?php if(empty($addresses)): ?><a href="<?php echo U('Address/index');?>"><font color="red" >新增地址</font></a>
							<?php else: ?>
								<?php if(is_array($addresses)): $i = 0; $__LIST__ = $addresses;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$address): $mod = ($i % 2 );++$i;?><li <?php if(($address["is_default"]) == "1"): ?>class="cur"<?php endif; ?>   >
									<input type="radio" value="<?php echo ($address["id"]); ?>" name="address_id" <?php if(($address["is_default"]) == "1"): ?>checked="checked"<?php endif; ?> /><?php echo ($address["receiver"]); ?> <?php echo ($address["province_name"]); ?> <?php echo ($address["city_name"]); ?> <?php echo ($address["area_name"]); ?> <?php echo ($address["detail_address"]); ?> <?php echo ($address["tel"]); ?>
									</li><?php endforeach; endif; else: echo "" ;endif; endif; ?>

					</ul>
				</div>
			</div>
			<!-- 收货人信息  end-->

			<!-- 配送方式 start -->
			<div class="delivery">
				<h3>送货方式</h3>

				<div class="delivery_select">
					<table>
						<tbody>
							<?php if(is_array($deliverys)): $i = 0; $__LIST__ = $deliverys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$delivery): $mod = ($i % 2 );++$i;?><tr  <?php if(($delivery["is_default"]) == "1"): ?>class="cur"<?php endif; ?>    >
									<td><input type="radio" name="delivery_id" value="<?php echo ($delivery["id"]); ?>"  <?php if(($delivery["is_default"]) == "1"): ?>checked="checked"<?php endif; ?>/><?php echo ($delivery["name"]); ?></td>
								</tr><?php endforeach; endif; else: echo "" ;endif; ?>
						</tbody>
					</table>
				</div>
			</div> 
			<!-- 配送方式 end --> 

			<!-- 支付方式  start-->
			<div class="pay">
				<h3>支付方式</h3>

				<div class="pay_select">
					<table>
						<?php if(is_array($payTypes)): $i = 0; $__LIST__ = $payTypes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$payType): $mod = ($i % 2 );++$i;?><tr  <?php if(($payType["is_default"]) == "1"): ?>class="cur"<?php endif; ?> >
								<td class="col1"><input type="radio" name="pay_type_id" value="<?php echo ($payType["id"]); ?>"  <?php if(($payType["is_default"]) == "1"): ?>checked="checked"<?php endif; ?>  /><?php echo ($payType["name"]); ?></td>
								<td class="col2"><?php echo ($payType["intro"]); ?></td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</table>
				</div>
			</div>
			<!-- 支付方式  end-->

			<!-- 发票信息 start-->
			<!--<div class="receipt">-->
				<!--<h3>发票信息</h3>-->
				<!--<input type="radio" name="invoice" id="need" value="1"/>需要-->
				<!--<input type="radio" name="invoice" id="no_need" checked="checked" value="2"/>不需要-->
				<!--<br/><br/>-->
				<!--<div class="receipt_select" style="display:none">-->
						<!--<ul>-->
							<!--<li>-->
								<!--<label for="">发票抬头：</label>-->
								<!--<input type="radio" name="invoice_type" checked="checked" class="invoice_type" value="1"/>个人-->
								<!--<input type="radio" name="invoice_type" class="invoice_type" value="2"/>单位-->
								<!--<input type="text" name="invoice_input" class="txt company_content" disabled="disabled" />-->
							<!--</li>-->
							<!--<li>-->
								<!--<label for="">发票内容：</label>-->
								<!--<input type="radio" name="invoice_content" checked="checked" value="明细"/>明细-->
								<!--<input type="radio" name="invoice_content" value="办公用品"/>办公用品-->
								<!--<input type="radio" name="invoice_content" value="体育休闲"/>体育休闲-->
								<!--<input type="radio" name="invoice_content" value="耗材"/>耗材-->
							<!--</li>-->
						<!--</ul>						-->
				<!--</div>-->
			<!--</div>-->
			<!-- 发票信息 end-->

			<!-- 商品清单 start -->
			<div class="goods">
				<h3>商品清单</h3>
				<!--<table style="text-align: center;">-->
					<!--<thead>-->
						<!--<tr>-->
							<!--<th class="col1">商品</th>-->
							<!--<th class="col2">规格</th>-->
							<!--<th class="col3">价格</th>-->
							<!--<th class="col4">数量</th>-->
							<!--<th class="col5">小计</th>-->
						<!--</tr>-->
					<!--</thead>-->
					<!--<tbody>-->
						<!--<?php if(is_array($shoppingCars)): $i = 0; $__LIST__ = $shoppingCars;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>-->
							<!--<tr>-->
								<!--<td class="col1" style="text-align: center;width:20%;"><a href=""><img src="http://admin.shop.com/Uploads/<?php echo ($item["logo"]); ?>" alt="" /></a>  <strong><a href=""><?php echo ($item["name"]); ?></a></strong></td>-->
								<!--<td class="col2" style="text-align: center;width:20%"> <p>颜色：073深红</p> <p>尺码：170/92A/S</p> </td>-->
								<!--<td class="col3" style="text-align: center;width:20%">￥<?php echo ($item["shop_price"]); ?></td>-->
								<!--<td class="col4" style="text-align: center;width:20%"><?php echo ($item["num"]); ?></td>-->
								<!--<td class="col5" style="text-align: center;width:20%"><span id="totle_money">￥<?php echo ($item['shop_price']*$item['num']); ?></span></td>-->
							<!--</tr>-->
						<!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
					<!--</tbody>-->
					<!--<tfoot>-->
						<!--<tr>-->
							<!--<td colspan="5">-->
								<!--<ul>-->
									<!--<li>-->
										<!--<span id="total_num">商品数量：</span>-->
										<!--<em id="goods_total_money"></em>-->
									<!--</li>-->
									<!--<li>-->
										<!--<span>运费：</span>-->
										<!--<em id="yunfei">￥0.00</em>-->
									<!--</li>-->
									<!--<li>-->
										<!--<span>商品总额：</span>-->
										<!--<em>￥<?php echo ($total_money); ?></em>-->
									<!--</li>-->
								<!--</ul>-->
							<!--</td>-->
						<!--</tr>-->
					<!--</tfoot>-->
				<!--</table>-->
				<table>
					<thead>
					<tr>
						<th class="col1" style="text-align: center">商品图片</th>
						<th class="col2"  style="text-align: center">商品名称</th>
						<th class="col3"  style="text-align: center">规格</th>
						<th class="col4"  style="text-align: center">数量</th>
						<th class="col5"  style="text-align: center">小计</th>
					</tr>
					</thead>
					<tbody>
					<?php if(is_array($shoppingCars)): $i = 0; $__LIST__ = $shoppingCars;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><tr>
							<td class="col1" style="text-align: center;"><a href=""><img src="http://admin.shop.com/Uploads/<?php echo ($item["logo"]); ?>" alt="" /></a></td>
							<td class="col2" style="text-align: center;"> <a href=""><?php echo ($item["name"]); ?></a></td>
							<td class="col3" style="text-align: center;"><?php echo ($item["goods_attributes"]); ?></td>
							<td class="col4" style="text-align: center;"><?php echo ($item["num"]); ?></td>
							<td class="col5" style="text-align: center;"><span id="totle_money">￥<?php echo ($item['shop_price']*$item['num']); ?></span></td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
					<tfoot>
					<tr>
						<td colspan="6">购物金额总计： <strong>￥ <span id="total"><?php echo ($total_money); ?></span></strong></td>
					</tr>
					</tfoot>
				</table>
			</div>
			<!-- 商品清单 end -->
		
		</div>

		<div class="fillin_ft">
			<a href="javascript:$('form').submit()"><span>提交订单</span></a>
			<p>应付总额：<strong>￥<?php echo ($total_money); ?>元</strong></p>
			
		</div>
	</div>
	</form>
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
	<script type="text/javascript" src="http://www.shop.com/Public/Home/js/jquery-1.8.3.min.js"></script>
 	<script type="text/javascript">
		$(function(){
			////////////////统计商品总数量和总金额////////////////////////////
			var totalNum = 0;
			$('.col4').each(function(index){
				if(index){
					totalNum+=parseInt($(this).text());
				}
			});
			$('#total_num').html('商品数量：'+totalNum);

//			$('#totle_money').each(function(index){
//				if(index){
////					console.debug(index);\\
//
//
//					var money=$(this).text();
//					console.debug(money);
////					totalMoney+=parseInt($(this).text());
//				}
//			});
//			$('#goods_total_money').html('￥'+totalMoney);

			/////////////////发票特效----开始///////////////////////////
			$('.receipt_select').hide();

			$('#need').click(function(){
				$('.receipt_select').show();
			});

			$('#no_need').click(function(){
				$('.receipt_select').hide();
			});
			$('.invoice_type').click(function(){
				if($(this).val()==1){
					$('.company_content').prop('disabled',true);
				}else{
					$('.company_content').prop('disabled',false);
				}
			});
			/////////////////发票特效----结束///////////////////////////

		});
		////////////////////////登录名称  开始////////////////////////////

		//>>1.页面加载完毕之后，发送ajax请求去得到当前登录的用户，用js区修改静态页面的效果。
		$.getJSON('<?php echo U("Member/getUserInfo");?>',function(username){
			//用户登录了
			if(username){
				$('#userinfo').html("您好，欢迎 "+username+" 来到 韩国馆！[<a href='<?php echo U("Member/logout");?>'>注销</a>]");
			}
		});
		////////////////////////登录名称  结束////////////////////////////
	</script>
</body>
</html>