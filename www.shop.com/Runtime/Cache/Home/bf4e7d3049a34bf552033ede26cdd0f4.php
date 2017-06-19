<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>用户注册</title>
	<link rel="stylesheet" href="http://www.shop.com/Public/Home/css/base.css" type="text/css">
	<link rel="stylesheet" href="http://www.shop.com/Public/Home/css/global.css" type="text/css">
	<link rel="stylesheet" href="http://www.shop.com/Public/Home/css/header.css" type="text/css">
	<link rel="stylesheet" href="http://www.shop.com/Public/Home/css/login.css" type="text/css">
	<link rel="stylesheet" href="http://www.shop.com/Public/Home/css/footer.css" type="text/css">
	<style type="text/css">
		.error{
			border:1px dotted red!important;
		}
		.textError{
			color:red!important;
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
					<li>您好，欢迎来到韩国馆！[<a href="<?php echo U('Member/checkLogin');?>">登录</a>] [<a href="<?php echo U('Member/regist');?>">免费注册</a>] </li>
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
		</div>
	</div>
	<!-- 页面头部 end -->
	
	<!-- 登录主体部分start -->
	<div class="login w990 bc mt10 regist">
		<div class="login_hd">
			<h2>用户注册</h2>
			<b></b>
		</div>
		<div class="login_bd">
			<div class="login_form fl">
				<form action="" method="post" id="registForm">
					<ul>
						<li>
							<label for="">用户名：</label>
							<input type="text" class="txt"  id="username" name="username" />
							<p class="username_error">3-20位字符，可由中文、字母、数字和下划线组成</p>
						</li>
						<li>
							<label for="">密码：</label>
							<input type="password" class="txt" name="password" id="password"/>
							<p class="password_error">6-20位字符，可使用字母、数字和符号的组合，不建议使用纯数字、纯字母、纯符号</p>
						</li>
						<li>
							<label for="">确认密码：</label>
							<input type="password" class="txt" name="repassword" id="repassword" />
							<p class="repassword_error">请再次输入密码</p>
						</li>
						<li>
							<label for="">手机号码：</label>
							<input type="text" class="txt tel" name="tel" id="tel" value="18380448380"/>
							<input type="button" value="获取验证码"  class="button" id="sendMS"/>
							<p class="tel_error">请输入手机号码</p>
						</li>
						<li class="checkcode">
							<label for="">短信验证码：</label>
							<input type="text"  name="checkcode"  id="checkcode"/>
							<p class="checkcode_error">请输入验证码</p>
						</li>
						<li>
							<label for="">&nbsp;</label>
							<input type="checkbox" class="chb" checked="checked" /> 我已阅读并同意《用户注册协议》
						</li>
						<li>
							<label for="">&nbsp;</label>
							<input type="button" value="" class="login_btn" />
						</li>
					</ul>
				</form>
			</div>
		</div>
	</div>
	<!-- 登录主体部分end -->

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
			 © 2005-2016 韩国馆网上商城 版权所有，并保留所有权利。  ICP备案证书号:京ICP证070359号
		</p>
		<p class="auth">
			<a href=""><img src="http://www.shop.com/Public/Home/images/xin.png" alt="" /></a>
			<a href=""><img src="http://www.shop.com/Public/Home/images/kexin.jpg" alt="" /></a>
			<a href=""><img src="http://www.shop.com/Public/Home/images/police.jpg" alt="" /></a>
			<a href=""><img src="http://www.shop.com/Public/Home/images/beian.gif" alt="" /></a>
		</p>
	</div>
	<!-- 底部版权 end -->
	<!--引入验证插件-->
	<script type="text/javascript" src="http://www.shop.com/Public/Home/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="http://www.shop.com/Public/Home/layer/layer.js"></script>

	<script type="text/javascript">
		$(function(){
			/*---------------------------------参数验证------------------*/
			$('.login_btn').click(function(){
				//用户名
				var flag=true;
				var username=$('#username').val();
				if(username == null || username=='' ||  username.length<3){
					$('.username_error').html('<font color="red">3-20位字符，可由中文、字母、数字和下划线组成</font>');
					flag=false;
				}else{
					$('.username_error').html('');
				}
				//密码
				var password=$('#password').val();
//				console.debug(password.length);
				if(password == null || password=='' || password.length<6 || password.length>20){
					$('.password_error').html('<font color="red">6-20位字符，可使用字母、数字和符号的组合，不建议使用纯数字、纯字母、纯符号</font>');
					flag=false;
				}else{
					$('.password_error').html('');
				}

				//再次输入密码
				var repassword=$('#repassword').val();
				if(repassword == null || repassword=='' || repassword.length<6 || repassword.length>20){
					$('.repassword_error').html('<font color="red">6-20位字符，可使用字母、数字和符号的组合，不建议使用纯数字、纯字母、纯符号</font>');
					flag=false;
				}else{
					$('.repassword_error').html('');
					if(password !== repassword){
						$('.repassword_error').html('<font color="red">两次密码应该一致</font>');
						flag=false;
					}
				}
				//手机
				var tel=$('#tel').val();
				var reg=/^1[358][0-9]{9}$/;
				if(!reg.test(tel)){
					$('.tel_error').html('<font color="red">请输入正确的11位手机号</font>');
					flag=false;
				}else{
					$('.tel_error').html('');
				}

				var checkcode=$('#checkcode').val();
				if(checkcode == null || checkcode=='' || checkcode.length!=6){
					$('.checkcode_error').html('<font color="red">请输入正确长度的验证码</font>');
					flag=false;
				}else{
					$('.checkcode_error').html('');
				}

				if(flag){
					$.post("<?php echo U('Member/regist');?>",$('#registForm').serialize(),function(data){
//						console.debug(data);
						layer.msg(data.info, {
							icon: data.status ? 1 : 2,  //1是√，2是×
							time: 1000 //1秒关闭（如果不配置，默认是3秒）
						}, function () {
							location.href = data.url; //提示框隐藏之后就刷新页面。
						});
					});
				}
			});

			//////////////////////////手机短信验证//////////////////////////

			//>>1.给按钮绑定事件，发送短信到手机。
			$('#sendMS').click(function(){
				//>>1.得到手机号码
				var tel=$('.tel').val();
				//>>2.发送ajax请求到服务器
				$.post("<?php echo U('sendSMS');?>",{'tel':tel},function(data){
					//发送成功后，不能让用户再次点击按钮发送。
//					console.debug(data);
					if(data){
						//>>2.1找到按钮，禁用
						$('#sendMS').prop("disabled",true);  //因为是改变按钮的状态，所以不用attr()
						//>>2.2 文字变成倒计时
						var times=60;  //60秒
						var timer=window.setInterval(function(){
							$('#sendMS').val(times+"秒后重新获取");
							--times;
							if(times==0){
								//>>2.2.1不禁用按钮,文字恢复
								window.clearInterval(timer);
								$('#sendMS').prop('disabled',false).val('获取验证码');
							}
						},1000);
					}
				});

			});
		});



	</script>
</body>
</html>