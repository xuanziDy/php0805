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
					<li>您好，欢迎来到京西！[<a href="<?php echo U('Login/checkLogin');?>">登录</a>] [<a href="<?php echo U('Member/regist');?>">免费注册</a>] </li>
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

	<!-- 页面头部 start -->
	<div class="header w990 bc mt15">
		<div class="logo w990">
			<h2 class="fl"><a href="index.html"><img src="http://www.shop.com/Public/Home/images/logo.png" alt="京西商城"></a></h2>
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
				<form action="<?php echo U('regist');?>" method="post" id="registForm">
					<ul>
						<li>
							<label for="">用户名：</label>
							<input type="text" class="txt" name="username" />
							<p>3-20位字符，可由中文、字母、数字和下划线组成</p>
						</li>
						<li>
							<label for="">邮箱：</label>
							<input type="text" class="txt" name="email" />
							<p>必须符合邮箱格式</p>
						</li>
						<li>
							<label for="">密码：</label>
							<input type="password" class="txt" name="password" id="password"/>
							<p>6-20位字符，可使用字母、数字和符号的组合，不建议使用纯数字、纯字母、纯符号</p>
						</li>
						<li>
							<label for="">确认密码：</label>
							<input type="password" class="txt" name="repassword" />
							<p>请再次输入密码</p>
						</li>
						<li>
							<label for="">手机号码：</label>
							<input type="text" class="txt tel" name="tel" value="18380448380"/>
							<input type="button" value="获取验证码" id="sendMS"/>
							<p>请输入手机号码</p>
						</li>
						<li class="checkcode">
							<label for="">短信验证码：</label>
							<input type="text"  name="checkcode" />
						</li>
						<li>
							<label for="">&nbsp;</label>
							<input type="checkbox" class="chb" checked="checked" /> 我已阅读并同意《用户注册协议》
						</li>
						<li>
							<label for="">&nbsp;</label>
							<input type="submit" value="" class="login_btn" />
						</li>
					</ul>
				</form>

				
			</div>
			
			<div class="mobile fl">
				<h3>手机快速注册</h3>			
				<p>中国大陆手机用户，编辑短信 “<strong>XX</strong>”发送到：</p>
				<p><strong>1069099988</strong></p>
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
			<a href="">京西论坛</a>
		</p>
		<p class="copyright">
			 © 2005-2013 京东网上商城 版权所有，并保留所有权利。  ICP备案证书号:京ICP证070359号 
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
	<script type="text/javascript" src="http://www.shop.com/Public/Home/js/jquery.validate.js"></script>
	<script type="text/javascript">
		$(function(){
			$('#registForm').validate({
				//>>验证规则
				rules:{
					username: {
						required: true,  //不为空
						rangelength:[3,20],
						remote:"<?php echo U('checkRepeat');?>",  //要求返回布尔值
					},
					email: {
						required: true,
						email: true,
						remote:"<?php echo U('checkRepeat');?>",  //要求返回布尔值
					},
					password: {
						required: true,
						rangelength:[6,20],
					},
					repassword: {
						required: true,       //不为空
						rangelength:[6,20],  //长度在6-20个字符
						equalTo: "#password",  //值与id=password的表单值一致
					},
					tel:{
						required: true,
					}
				},
				//>>验证错误时，提示的错误信息
				messages:{
					username: {
						required: "用户名不能为空",
						rangelength: "3-20位字符，可由中文、字母、数字和下划线组成",
						remote:"用户名已存在",
					},
					password: {
						required: "密码不能为空",
						rangelength: "6-20位字符，可使用字母、数字和符号的组合，不建议使用纯数字、纯字母、纯符号",
					},
					repassword:{
						required: "请输入确认密码",
						rangelength: "6-20位字符，可使用字母、数字和符号的组合，不建议使用纯数字、纯字母、纯符号",
						equalTo: "两次输入密码不一致"
					},
					email: {
						required: "请输入Email地址",
						email: "请输入正确的email地址",
						remote:"该邮箱已存在",
					},
					tel:{
						required: "请输入11位的手机号码",
					},
				},
				//>>验证失败时，错误信息的处理方式
				errorPlacement:function(error,element){
//					console.debug(error.text());
					element.addClass('error');  //给当前验证的输入框添加上error类，改变框的颜色。
					element.nextAll('p').text(error.text()).addClass('textError'); //把更换p标签中的错误信息，并把颜色变成共色。
				},
				//>>验证成功时后，信息的处理方式
				success:function(error,element){
					element.nextAll('p').removeClass('textError');
				},

			});
			//////////////////////////手机短信验证//////////////////////////

			//>>1.给按钮绑定事件，发送短信到手机。
			$('#sendMS').click(function(){
				//>>1.得到手机号码
				var tel=$('.tel').val();
				//>>2.发送ajax请求到服务器
				$.post("<?php echo U('sendSMS');?>",{'tel':tel},function(data){
					//发送成功后，不能让用户再次点击按钮发送。
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