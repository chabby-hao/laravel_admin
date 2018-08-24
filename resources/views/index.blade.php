<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8" />
	<!--<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" >
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<title>BI</title>
	<link rel="stylesheet" type="text/css" href="/css/bootstrapV4.min.css"/>
	<link rel="stylesheet" type="text/css" href="/css/indexNew.css"/>
</head>
<body>
	<div class="container-fluid part1_box">		
		<canvas id="canv" width="" height=""></canvas>
		<nav class="navbar  justify-content-between myNav">
			<a class="navbar-brand" href="#">
				<img src="/images/home/bi_logo.png"/>
			</a>		  
		    <div class="form-inline">
		      	<a id="login" href="javascript:;" class="login">登录</a>
		      	<span class="trapezoid"></span>
		    </div>
		</nav>
		<!--历史访问-->	
		<div class="history_visit">
			<div class="ranglu">
				<div class="hv_box">
					 <ul id="total_count">
						
					</ul>
				</div>
				<p class="history_title">历史访问请求量</p>
				
				<!--图片模式-->
				<div class="brokenBox"></div>
			</div>
			<div class="part1_footer">
				<span class="trapezoid_footer"></span>
				<span class="part1_footer_title">Copyright © 2016-2018 VIPCARE. All Rights Reserved.</span>
			</div>		
		</div>
	</div>
	<div class="container-fluid part2_box">
		<div class="part2_top clearfix">
			<p class="fl">合作伙伴</p>
			<span class="trapezoid fr"></span>
			<p class="fr">合作咨询：bd@vipcare.com 021-6403 0850</p>			
		</div>
		<div class="panter_box">
			<div class="row">
			  <div class=""><img src="/images/home/parter_img1.png"/></div>
			  <div class=""><img src="/images/home/parter_img2.png"/></div>
			  <div class=""><img src="/images/home/parter_img3.png"/></div>
			  <div class=""><img src="/images/home/parter_img4.png"/></div>
			  <div class=""><img src="/images/home/parter_img5.png"/></div>
			  <div class=""><img src="/images/home/parter_img6.png"/></div>
			  <div class=""><img src="/images/home/parter_img7.png"/></div>
			  <div class=""><img src="/images/home/parter_img8.png"/></div>
			  <div class=""><img src="/images/home/parter_img9.png"/></div>
			  <div class=""><img src="/images/home/parter_img10.png"/></div>
			  <div class=""><img src="/images/home/parter_img11.png"/></div>
			  <div class=""><img src="/images/home/parter_img12.png"/></div>
			  <div class=""><img src="/images/home/parter_img13.png"/></div>
			  <div class=""><img src="/images/home/parter_img14.png"/></div>
			  <div class=""><img src="/images/home/parter_img15.png"/></div>
			  <div class=""><img src="/images/home/parter_img16.png"/></div>
			  <div class=""><img src="/images/home/parter_img17.png"/></div>
			  <div class=""><img src="/images/home/parter_img18.png"/></div>
			  <div class=""><img src="/images/home/parter_img19.png"/></div>
			  <div class=""><img src="/images/home/parter_img20.png"/></div>
			</div>
		</div>
	</div>
	<!--footer-->
	<div class="container-fluid footer">
		<div class="row">
		    <div class="col footer_qrcode">		   
		    		<img src="/images/home/qrcode.png"/>
		      	<p>超牛管家官方公众号</p> 
		    </div>
		    <div class="col-6 footer_mid">
		      <ul class="fl">
		      	<li><a href="javascript:;">产品</a></li>
		      	<li><a href="javascript:;">超牛管家</a></li>
		      	<li><a href="https://anxinchong.vipcare.com/admin">安心充</a></li>
		      	<li><a href="http://admin.vipcare.com">运营系统</a></li>
		      </ul>
		      <ul class="fl">
		      	<li><a href="javascript:;">工具</a></li>
		      	<li><a href="javascript:;">API文档</a></li>
		      	<li><a href="javascript:;">智慧芯测试</a></li>
		      	<li><a href="javascript:;">操作手册</a></li>
		      </ul>
		      <ul class="fl">
		      	<li><a href="javascript:;">品牌</a></li>
		      	<li><a href="javascript:;">公众号</a></li>
		      	<li><a href="javascript:;">小程序</a></li>
		      </ul>
		      <ul class="fl">
		      	<li><a href="javascript:;">关于我们</a></li>
		      	<li><a href="javascript:;">联系我们</a></li>
		      	<li><a href="javascript:;">加入我们</a></li>
		      </ul>
		    </div>
		    <div class="col footer_ri">
		      <img class="foo_anqi_logo" src="/images/home/anqi_logo.png"/>
		      <div class="wei_box clearfix">
		      	<a href="javascript:;"><img src="/images/home/wechat_icon.png"/></a>
		      	<a href="javascript:;"><img src="/images/home/qq_icon.png"/></a>
		      </div>
		    </div>
		</div>
		<p class="footer_bott">沪ICP备15011485号-2 Copyright © 2016-2018 VIPCARE. All Rights Reserved.</p>
	</div>
	
	<!--登录-->
	<div class="login_big_bg">
		<div class="login_inner_box">
			<img class="login_logo" src="/images/home/login_logo.png"/>
			<span class="login_cha"><img src="/images/home/input_icon3.png"/></span>
			<form id="loginform" class="form-vertical" action="{{URL::action('Admin\AuthController@login')}}" method="post">
				<div class="input-group mb-3">					
					<span class="input_icon"><img src="/images/home/input_icon1.png"/></span>					
					<input type="text" name="name" class="" placeholder="账户名称">
				</div>
				<div class="input-group">					
					<span class="input_icon"><img src="/images/home/input_icon2.png"/></span>					
					<input type="password" name="pwd" class="" placeholder="用户密码">
				</div>
				<p class="login_tip"></p>
				<button type="submit" class="login_btn">登录</button>
			</form>
		</div>
	</div>

	
	
</body>
<script src="/js/jquery-3.3.1.min.js" type="text/javascript" charset="utf-8"></script>
<script src="/js/special.js" type="text/javascript" charset="utf-8"></script>
<script src="/js/bootstrapV4.min.js" type="text/javascript" charset="utf-8"></script>
<script src="/js/jquery-form/jquery.form.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
	$(function(){
		var h = window.innerHeight;
		$('.part1_box').css({'height':h});
		$('.login').click(function(){
			$('.ranglu').css({'opacity':'0'});
			$('.login_big_bg').css({'height':h});
			$('.login_big_bg').css({'display':'block'});
			$('body').css('overflow','hidden');		
		});
		$('.login_big_bg').on('touchmove', function(event) {
		    event.preventDefault();
		});
		$('.login_cha').click(function(){
			$('.ranglu').css({'opacity':'1'});
			$('.login_big_bg').css({'display':'none'});
			$('body').css('overflow','auto');
		});
		
		$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
	    var myform = $("#loginform");
	    myform.ajaxForm({
	        dataType: 'json',
	        success: function (res) {
	            if (res.code=== 200) {
	                location.href=res.redirect;
	            }else{
	                $(".login_tip").html(res.msg);
	            }
	        }
	    });
	
	    var refreshTotal = function(){
	        $.ajax({
	            url:'{{URL::action('Bi\StatController@requestCount')}}',
	            success:function(res){
	                if(res.code === 200){
	                    var sum = res.data.sum;
	                    var ul = $("#total_count");
	                    //<li><span>2</span></li>
	                    var str = '';
	                    for(var x in sum){
	                        if(!isNaN(sum[x])){
	                            var li = "<li><span>" + sum[x] + "</span></li>";
	                        }else{
	                            var li = '<li class="delimiter"><span>′</span></li>';
	                        }
	                        str += li;
	                    }
	                    ul.html(str);
	                }
	            }
	        })
	    };
	    refreshTotal();
	    setInterval(refreshTotal, 1000);
		
		
		
		
	})
	

	
	
</script>
</html>
