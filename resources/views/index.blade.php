<!doctype html>
<html lang="zh">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/index.css">

    <title>BI</title>
</head>
<body>
<div class="bi-header">
    <video class="bi-video" src="/video/dabj.mp4" poster="/image/dabj_poster.png" muted autoplay loop></video>
    <div class="bi-top">
        <div class="bi-nav">
            <span class="bi-logo"><img class="logo" src="/image/logo@2x.png" alt=""></span>
            <div style="display: none" class="bi-nav-a">
                <a href="javascript:;">关于我们</a>
                <a href="javascript:;">技术支持</a>
                <a href="javascript:;">成为伙伴</a>
            </div>
        </div>
        <div class="bi-login">
            <a id="login" href="javascript:;">登录</a>
        </div>
        <div class="bi-top-icon"><img src="/image/biaoqian1@2x.png" alt=""></div>
    </div>

    <div class="bi-point">
        <span class="point-1">驾驶舱</span>
        <span class="point-2">车辆统计</span>
        <span class="point-3">用户画像</span>
        <span class="point-4">品质分析</span>
        <span class="point-5">营销服务</span>
    </div>

    <div class="bi-history">
        <div class="bi-number">
            <ul id="total_count">
                {{--<li><span>1</span></li>--}}
                {{--<li><span>2</span></li>--}}
                {{--<li><span>3</span></li>--}}
                {{--<li class="delimiter"><span>′</span></li>--}}
                {{--<li><span>5</span></li>--}}
                {{--<li><span>6</span></li>--}}
                {{--<li><span>1</span></li>--}}
                {{--<li><span>7</span></li>--}}
                {{--<li><span>8</span></li>--}}
                {{--<li class="delimiter"><span>′</span></li>--}}
                {{--<li><span>3</span></li>--}}
                {{--<li><span>4</span></li>--}}
                {{--<li><span>7</span></li>--}}
                {{--<li><span>1</span></li>--}}
            </ul>
        </div>
        <label class="bi-history-text">设备请求总量</label>
    </div>

    <form id="loginform" class="form-vertical" action="{{URL::action('Admin\AuthController@login')}}" method="post">
        <div class="bi-login-model">
            <div class="bi-login-logo">
                <img src="/image/logo@2x.png" alt="">
            </div>
            <div class="bi-login-group">
                <div class="bi-close"><img src="/image/guanbi@2x.png" alt=""></div>
                <div class="bi-login-box">
                    <span class="bi-login-icon"><img src="/image/zhanghao@2x.png" alt=""></span>
                    <input type="text" name="name" placeholder="账户名称"/>
                </div>
                <div class="bi-login-box">
                    <span class="bi-login-icon"><img src="/image/mima@2x.png" alt=""></span>
                    <input type="password" name="pwd" placeholder="用户密码"/>
                </div>
                <div class="bi-login-box">
                    <span class="bi-login-error"></span>
                </div>

                <div class="bi-login-go">
                    <button class="btn">登录</button>
                </div>

                <div class="bi-login-bottom" style="display: none;">
                    <div class="forget"><a href="javascript:;">忘记密码</a></div>
                    <div class="register-now"><a href="javascript:;">立即注册 ></a></div>
                </div>

            </div>
        </div>
    </form>

    <div class="login-shade">
    </div>

    <div class="bi-header-icon2">
        <img src="/image/biaoqian2@2x.png" alt="">
        <span>Copyright © 2016-2018 VIPCARE. All Rights Reserved.</span>
    </div>
</div>
<div class="bi-content">

    <div class="bi-content-top">
        <span class="bi-content-partner">合作伙伴</span>
        <span class="bi-zixun">合作咨询：bd@vipcare.com 021-6403 0850</span>
        <div class="bi-icon"><img src="/image/biaoqian3@2x.png" alt=""></div>
    </div>

    <div class="bi-partner">
        <img class="bi-hezuo" src="/image/hezuo@2x.png" alt="">
    </div>
</div>
<div class="bi-footer">
    <div class="bi-qrcode">
        <img class="bi-wechat-qr" src="/image/qr.png" alt="">
        <span class="bi-wechat-text">超牛管家官方公众号</span>
    </div>

    <div class="bi-footer-content">
        <div class="bi-footer-item">
            <a href="javascript:;">产品</a>
            <a href="javascript:;">超牛管家</a>
            <a href="https://anxinchong.vipcare.com/admin">安心充</a>
            <a href="http://admin.vipcare.com">运营系统</a>
        </div>
        <div class="bi-footer-item">
            <a href="javascript:;">工具</a>
            <a href="javascript:;">API文档</a>
            <a href="javascript:;">智慧芯测试</a>
            <a href="javascript:;">操作手册</a>
        </div>
        <div class="bi-footer-item">
            <a href="javascript:;">品牌</a>
            <a href="javascript:;">公众号</a>
            <a href="javascript:;">小程序</a>
        </div>
        <div class="bi-footer-item">
            <a href="javascript:;">关于我们</a>
            <a href="javascript:;">联系我们</a>
            <a href="javascript:;">加入我们</a>
        </div>
    </div>

    <div class="bi-contanct">
        <div class="bi-logo-box">
            <div class="bi-anqi"><img class="bi-anqi-logo" src="/image/anqi_logo@2x.png" alt=""></div>
            <img class="bi-wechat" src="/image/weixin@2x.png" alt="">
            <img class="bi-qq" src="/image/qq@2x.png" alt="">
        </div>
    </div>

    <div class="bi-copy">
        沪ICP备15011485号-2   	Copyright © 2016-2018 VIPCARE. All Rights Reserved.
    </div>
</div>

</body>
</html>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="/jquery3/jquery.slim.min.js"></script>
<script src="/popper/umd/popper.min.js"></script>
<script src="/bootstrap4/js/bootstrap.min.js"></script>
<script src="/js/jquery.min.js"></script>
<script src="/js/jquery-form/jquery.form.js"></script>
<script>

    $(function () {

        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

        var myform = $("#loginform");
        myform.ajaxForm({
            dataType: 'json',
            success: function (res) {
                if (res.code=== 200) {
                    location.href=res.redirect;
                }else{
                    $(".bi-login-error").text(res.msg);
                }
            }
        })

        setInterval(function(){
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
        }, 1000);



    })

</script>

<script>
    $("#login").click(function () {
        $(".bi-login-model,.login-shade").show();
        $(".bi-point,.bi-history").hide();
    })

    $(".bi-close").click(function () {
        $(".bi-login-model,.login-shade").hide();
        $(".bi-point,.bi-history").show();
    })
</script>