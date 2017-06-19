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


	<!-- 页面主体 start -->
	<div class="main w1210 bc mt10">
		<!-- 右侧内容区域 start -->
		<div class="content  ml10">
			<div class="address_hd">
				<h3>收货地址薄</h3>
				<?php if(is_array($addresses)): $i = 0; $__LIST__ = $addresses;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$address): $mod = ($i % 2 );++$i;?><dl>
						<dt><?php echo ($i); ?>.<?php echo ($address["receiver"]); ?> <?php echo ($address["province_name"]); ?> <?php echo ($address["city_name"]); ?> <?php echo ($address["area_name"]); ?> <?php echo ($address["detail_address"]); ?> <?php echo ($address["tel"]); ?> </dt>
						<dd>
							<!--<a  class="edit_address" href="<?php echo U('Address/edit',array('id'=>$address['id']));?>">修改</a>-->
							<a  class="ajax-get" href="<?php echo U('Address/remove',array('id'=>$address['id']));?>">删除</a>
							<?php if(($address["is_default"]) == "0"): ?><a class="ajax-get" href="<?php echo U('changeIsDefault',array('id'=>$address['id'],'is_default'=>1-$address['is_default']));?>">设为默认地址</a>
							<?php else: ?>
								默认地址<?php endif; ?>
						</dd>
					</dl><?php endforeach; endif; else: echo "" ;endif; ?>

			</div>

			<div class="address_bd mt10">
				<h4>新增/修改收货地址</h4>
				<form action="" name="address_form" class="address_form">
						<ul>
							<li>
								<label for=""><span>*</span>收 货 人：</label>
								<input type="text" name="receiver" id="receiver" class="txt" />
								<p class="receiver_error" style="color: red;margin-top:2px;line-height:40px;"></p>
							</li>
							<li>
								<label for=""><span>*</span>所在地区：</label>
								<select name="province_id" id="province_id">
									<option value="">请选择</option>
									<?php if(is_array($provinces)): $i = 0; $__LIST__ = $provinces;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$provice): $mod = ($i % 2 );++$i;?><option value="<?php echo ($provice["id"]); ?>"><?php echo ($provice["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
								</select>

								<select name="city_id" id="city_id">
									<option value="">请选择</option>
								</select>

								<select name="area_id" id="area_id">
									<option value="">请选择</option>
								</select>
								<p class="area_error" style="color: red;margin-top:2px;line-height:40px;"></p>
							</li>
							<li>
								<label for=""><span>*</span>详细地址：</label>
								<input type="text" name="detail_address" id="detail_address" class="txt address"  />
								<p class="detail_address_error" style="color: red;margin-top:2px;line-height:40px;"></p>
							</li>
							<li>
								<label for=""><span>*</span>手机号码：</label>
								<input type="text" name="tel" id="tel" class="txt" />
								<p class="tel_error" style="color: red;margin-top:2px;line-height:40px;"></p>
							</li>
							<li>
								<label for="">&nbsp;</label>
								<input type="checkbox" name="is_default" id="is_default" value="1" class="check" />设为默认地址
							</li>
							<li>
								<label for="">&nbsp;</label>
								<input type="hidden" name="id" id="id"/>
								<input type="button"  name="" class="btn submit_address_form" value="保存" />
							</li>
							<li></li>
						</ul>
					</form>
			</div>
		</div>
		<!-- 右侧内容区域 end -->
	</div>
	<!-- 页面主体 end-->


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

	<script type="text/javascript" src="http://www.shop.com/Public/Home/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="http://www.shop.com/Public/Home/js/header.js"></script>
	<script type="text/javascript" src="http://www.shop.com/Public/Home/js/home.js"></script>
	<script type="text/javascript" src="http://www.shop.com/Public/Home/layer/layer.js"></script>
	<script type="text/javascript">
		$(function(){
			//市级城市
			$('#province_id').change(function(){
				//>>清空原有的数据。
				$('#city_id').get(0).length=1;
				$('#area_id').get(0).length=1;
				//>>发送ajax请求去得到该省份下面的城市。
				var params=$(this).val();
				$.getJSON('<?php echo U("Region/getChildren");?>',{"parent_id":params},function(rows){
					$(rows).each(function(){
						$("<option value='"+this.id+"'>"+this.name+"</option>").appendTo('#city_id');
					});
				});
			});
			//>>县级城市
			$('#city_id').change(function(){
				//>>清空原有的数据。
				$('#area_id').get(0).length=1;
				//>>发送ajax请求去得到该省份下面的城市。
				var params=$(this).val();
				$.getJSON('<?php echo U("Region/getChildren");?>',{"parent_id":params},function(rows){
					$(rows).each(function(){
						$("<option value='"+this.id+"'>"+this.name+"</option>").appendTo('#area_id');
					});
				});
			});


			////////////////////////////////点击保存，使用ajax请求传递数据，刷新页面展示新数据/////////////////////////////////////////
			$('.submit_address_form').click(function(){
				//验证数据合法性
				var receiver=$('#receiver').val();
//				console.debug(receiver);
				var province_id=$('#province_id').val();
				var city_id=$('#city_id').val();
				var detail_address=$('#detail_address').val();
				var tel=$('#tel').val();

				if(receiver==null ||receiver==''){
//					console.debug(1);
					$('.receiver_error').html('收货人不能为空');
				}else{
//					console.debug(2);
					$('.receiver_error').html('');
				}

				if(!province_id || !city_id){
					$('.area_error').html('至少要选择省份和市区');
				}else{
					$('.area_error').html('');
				}

				if(!detail_address){
					$('.detail_address_error').html('请填写详细的地址');
				}else{
					$('.detail_address_error').html('');
				}

				var reg=/^1[358][0-9]{9}$/;
				var is_true=false;
				if(!reg.test(tel)){
					$('.tel_error').html('请填写正确的手机号码');
					is_true=false;
				}else{
					$('.tel_error').html('');
					is_true=true;
				}

				if(is_true && receiver && province_id && city_id　&& detail_address && tel){
					//>>.得到表单数据，
					var params=$('.address_form').serialize();
					$.post('<?php echo U("add");?>',params,function(data){
						if(data.status){
//							window.location.reload(true); //true表示强制刷新
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

			////////////////////////////用ajax请求去回显数据////////////////////////////
			$('.edit_address').click(function(){
				$.get($(this).attr('href'),function(data){
					//找到节点，回显。
					$('#receiver').val(data.receiver);
					$('#detail_address').val(data.detail_address);
					$('#tel').val(data.tel);
					$('#is_default').val([data.is_default]); //单选框，选中
					$('#province_id').val(data.province_id);  //选中省份
					$('#id').val(data.id);

					//获取到城市并且选中指定的城市
					$.getJSON('<?php echo U("Region/getChildren");?>',{parent_id:data.province_id},function(rows){
						$(rows).each(function(){
							$("<option value='"+this.id+"'>"+this.name+"</option>").appendTo("#city_id");
						});
						$('#city_id').val(data.city_id);

					});

					//获取到区县并且选中指定的区县
					$.getJSON('<?php echo U("Region/getChildren");?>',{parent_id:data.city_id},function(rows){
						$(rows).each(function(){
							$("<option value='"+this.id+"'>"+this.name+"</option>").appendTo("#area_id");
						});
						$('#area_id').val(data.area_id);
					});

				});
				return false;
			});


			//////////////////使用ajax进行删除/////////////////////////////
			$('.ajax-get').click(function(){
				$.get($(this).attr('href'),function(data){
					if(data.status){
						window.location.reload();
					}else{
						alert(data.info);
					}
				});
				return false;
			});

			////////////////////////登录名展示////////////////////////////////////

			//>>1.页面加载完毕之后，发送ajax请求去得到当前登录的用户，用js区修改静态页面的效果。
			$.getJSON('<?php echo U("Member/getUserInfo");?>',function(username){
				//用户登录了
				if(username){
					$('#userinfo').html("您好，欢迎 "+username+" 来到 韩国馆！[<a href='<?php echo U("Member/logout");?>'>注销</a>]");
				}
			});

			////////////////////////登录名展示////////////////////////////////////
		});
	</script>

</body>
</html>