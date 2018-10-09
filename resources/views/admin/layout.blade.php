<!DOCTYPE html>
<html lang="zh-en">
<head>
    <title>新运营后台</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="format-detection" content="telephone=no" />

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/bootstrap-responsive.min.css') }}"/>
<!--<link rel="stylesheet" href="{{ asset('css/fullcalendar.css') }}"/>-->
    <link rel="stylesheet" href="{{ asset('css/matrix-style.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/matrix-media.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/legendCloudEye.css') }}"/>
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet"/>
    <link href="{{asset('vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet"/>
<!--<link rel="stylesheet" href="{{ asset('css/jquery.gritter.css') }}"/>-->
    <!--<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>-->

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery-helper/jquery-helper.js') }}"></script>
    <script src="{{ asset('js/jquery.ui.custom.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-datepicker/locales/bootstrap-datepicker.zh-CN.min.js') }}"></script>
    <script src="{{ asset('js/mustache/mustache.min.js')}}"></script>

    <link rel="stylesheet"
          href="<?php echo asset('js/bootstrap-daterangepicker/daterangepicker.css') ?>">

    <script src="<?php echo asset('js/date/date.js') ?>"></script>
    <script src="<?php echo asset('js/bootstrap-daterangepicker/moment.min.js') ?>"></script>
    <script src="<?php echo asset('js/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>
    <script src="<?php echo asset('js/common/g-datepicker.js') ?>"></script>


    <script type="text/javascript" src="{{ asset('js/bootstrap-filestyle.min.js')}}"></script>
</head>
<body>

<!--Header-part-->
<div id="header">
    <h1><a href="#">超级后台</a></h1>
</div>
<!--close-Header-part-->


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
        <li class="dropdown" id="profile-messages">
            <a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i
                        class="icon icon-user"></i>
                <span class="text">Welcome {{\Illuminate\Support\Facades\Auth::user()->username}}</span><b class="caret"></b></a>
            <ul class="dropdown-menu">
                {{--<li><a href="#"><i class="icon-user"></i> My Profile</a></li>--}}
                {{--<li class="divider"></li>--}}
                {{--<li><a href="#"><i class="icon-check"></i> My Tasks</a></li>--}}
                {{--<li class="divider"></li>--}}
                <li>
                    <a href="{{ URL::action('Admin\UserController@resetPassword')  }}">
                        <i class="icon-key"></i>Change Password</a>
                </li>
                <li>
                <a href="{{ \Illuminate\Support\Facades\URL::route('admin-logout')  }}">
                        <i class="icon-signout"></i>Log Out</a>
                </li>

            </ul>
        </li>
    </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->
<!--
<div id="search">
    <input type="text" placeholder="Search here..."/>
    <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
-->
<!--close-top-serch-->
<!--sidebar-menu-->
<div id="sidebar">
    <ul>

        @if(Auth::user()->can('index/welcome'))
            <li class=""><a href="{{URL::route('admin-home')}}"><i class="icon icon-home"></i>
                    <span>首页</span></a></li>
        @endif


        <li class="submenu"><a href="#"><i class="icon icon-th-list"></i> <span>安骑物联</span>
            </a>
            <ul>
                @if(Auth::user()->can('device/stat'))
                    <li><a href="{{URL::action('Admin\DeviceController@stat')}}">车辆</a></li>
                @endif
                @if(Auth::user()->can('battery/stat'))
                    <li><a href="{{URL::action('Admin\BatteryController@stat')}}">电池</a></li>
                @endif
            </ul>
        </li>

        <li class="submenu"><a href="#"><i class="icon icon-th-list"></i> <span>设备管理</span>
            </a>
            <ul>
                @if(Auth::user()->can('device/list'))
                    <li><a href="{{URL::action('Admin\DeviceController@list')}}">设备列表</a></li>
                @endif
                @if(Auth::user()->can('device/detail'))
                    <li><a href="{{URL::action('Admin\DeviceController@detail')}}">设备详情</a></li>
                @endif
                @if(Auth::user()->can('device/mileageList'))
                    <li><a href="{{URL::action('Admin\DeviceController@mileageList')}}">历史行程</a></li>
                @endif
                @if(Auth::user()->can('device/cardList'))
                    <li><a href="{{URL::action('Admin\DeviceController@cardList')}}">流量列表</a></li>
                @endif
            </ul>
        </li>

        <li class="submenu"><a href="#"><i class="icon icon-th-list"></i> <span>统计报表</span>
            </a>
            <ul>
                @if(Auth::user()->can('device/romStatList'))
                    <li><a href="{{URL::action('Admin\DeviceController@romStatList')}}">固件数量报表</a></li>
                @endif
            </ul>
        </li>

        {{--订单--}}
        <li class="submenu"><a href="#"><i class="icon icon-th-list"></i> <span>客户订单</span>
            </a>
            <ul>
                @if(Auth::user()->can('order/list'))
                    <li><a href="{{URL::action('Admin\OrderController@list')}}">订单列表</a></li>
                @endif
            </ul>
        </li>

        {{--出货--}}
        <li class="submenu"><a href="#"><i class="icon icon-th-list"></i> <span>设备出货</span>
            </a>
            <ul>
                @if(Auth::user()->can('delivery/list'))
                    <li><a href="{{URL::action('Admin\DeliveryController@list')}}">出货单列表</a></li>
                @endif
                @if(Auth::user()->can('delivery/factoryPanel'))
                    <li><a href="{{URL::action('Admin\DeliveryController@factoryPanel')}}">工厂面板</a></li>
                @endif
            </ul>
        </li>

        {{--地图--}}
        {{--@if(Auth::user()->can('map/show'))
            <li class="">
                <a target="_blank" href="/map/index.html"><i class="icon icon-th-list"></i>
                    <span>地图管理</span>
                </a>
            </li>
        @endif--}}

        <li class="submenu"><a href="#"><i class="icon icon-th-list"></i> <span>权限管理</span>
            </a>
            <ul>
                @if(Auth::user()->can('user/list'))
                    <li><a href="{{\Illuminate\Support\Facades\URL::action('Admin\UserController@list')}}">账号管理</a></li>
                @endif
                @if(Auth::user()->can('role/list'))
                    <li><a href="{{\Illuminate\Support\Facades\URL::action('Admin\RoleController@list')}}">角色管理</a></li>
                @endif
                @if(Auth::user()->can('permis/list'))
                    <li><a href="{{\Illuminate\Support\Facades\URL::action('Admin\PermisController@list')}}">权限管理</a>
                    </li>
                @endif
            </ul>
        </li>

        {{--违章管理--}}
        @if(Auth::user()->can('breakRule/list'))
            <li class=""><a href="{{URL::action('Admin\BreakRuleController@list')}}"><i class="icon icon-home"></i>
                    <span>违章管理</span></a></li>
        @endif


        {{--工具管理--}}
        <li class="submenu"><a href="#"><i class="icon icon-th-list"></i> <span>运营工具</span>
            </a>
            <ul>
                @if(Auth::user()->can('tool/file'))
                    <li><a href="{{\Illuminate\Support\Facades\URL::action('Admin\ToolController@file')}}">文件</a></li>
                @endif
                @if(Auth::user()->can('tool/romUpdate'))
                    <li><a href="{{\Illuminate\Support\Facades\URL::action('Admin\ToolController@romUpdate')}}">升级</a></li>
                @endif
                @if(Auth::user()->can('tool/exportByImsi'))
                    <li><a href="{{\Illuminate\Support\Facades\URL::action('Admin\ToolController@exportByImsi')}}">Imsi导出详情</a></li>
                @endif
                @if(Auth::user()->can('tool/imsiRepeat'))
                    <li><a href="{{\Illuminate\Support\Facades\URL::action('Admin\ToolController@imsiRepeat')}}">Imsi重号查询</a></li>
                @endif
                @if(Auth::user()->can('tool/deviceToChannel'))
                    <li><a href="{{\Illuminate\Support\Facades\URL::action('Admin\ToolController@deviceToChannel')}}">编辑设备属性</a></li>
                @endif
                @if(Auth::user()->can('tool/cmdSend'))
                    <li><a href="{{\Illuminate\Support\Facades\URL::action('Admin\ToolController@cmdSend')}}">命令调试</a></li>
                @endif
                @if(Auth::user()->can('tool/userDeviceDel'))
                    <li><a href="{{\Illuminate\Support\Facades\URL::action('Admin\ToolController@userDeviceDel')}}">设备清空用户</a></li>
                @endif
                @if(Auth::user()->can('tool/userDeviceAdd'))
                    <li><a href="{{\Illuminate\Support\Facades\URL::action('Admin\ToolController@userDeviceAdd')}}">设备添加用户</a></li>
                @endif
                @if(Auth::user()->can('tool/deviceExpireModify'))
                    <li><a href="{{\Illuminate\Support\Facades\URL::action('Admin\ToolController@deviceExpireModify')}}">设备有效期修改</a></li>
                @endif
                @if(Auth::user()->can('tool/lock'))
                    <li><a href="{{\Illuminate\Support\Facades\URL::action('Admin\ToolController@lock')}}">远程锁车</a></li>
                @endif
            </ul>
        </li>

        {{--工具管理--}}
        <li class="submenu"><a href="#"><i class="icon icon-th-list"></i> <span>Api管理</span>
            </a>
            <ul>
                @if(Auth::user()->can('api/channelKeyList'))
                    <li><a href="{{\Illuminate\Support\Facades\URL::action('Admin\ApiController@channelKeyList')}}">渠道秘钥列表</a></li>
                @endif
            </ul>
        </li>

        {{--检测--}}
        <li class="submenu"><a href="#"><i class="icon icon-th-list"></i> <span>检测管理</span>
            </a>
            <ul>
                @if(Auth::user()->can('detect/factoryTestList'))
                    <li><a href="{{\Illuminate\Support\Facades\URL::action('Admin\DetectController@factoryTestList')}}">工装检测日志</a></li>
                @endif
            </ul>
        </li>

        {{--检测--}}
        <li class="submenu"><a href="#"><i class="icon icon-th-list"></i> <span>渠道管理</span>
            </a>
            <ul>
                @if(Auth::user()->can('channel/list'))
                    <li><a href="{{\Illuminate\Support\Facades\URL::action('Admin\ChannelController@list')}}">渠道列表</a></li>
                    <li><a href="{{\Illuminate\Support\Facades\URL::action('Admin\BrandController@list')}}">品牌列表</a></li>
                    <li><a href="{{\Illuminate\Support\Facades\URL::action('Admin\DeviceController@types')}}">型号列表</a></li>
                @endif
            </ul>
        </li>


    </ul>
</div>
<!--sidebar-menu-->

<div id="content">
    <div id="content-header">
        <div id="breadcrumb">
            <a href="{{URL::route('admin-home')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
            <a href="#" class="current"><?php echo \App\Logics\AuthLogic::getPermisName(); ?></a>
        </div>
        @if($msg = Session::get('msg'))
            <div class="alert alert-success mymsg">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>{{$msg}}</strong>
            </div>
            <script>
                setTimeout(function () {
                    $(".mymsg").fadeOut();
                }, 10000)
            </script>
        @endif
    </div>
    @section('content')
        <hr>
        <h1>正在拼命开发中...</h1>
    @show
</div>

<!--Footer-part-->

<div class="row-fluid">
    <!--<div id="footer" class="span12"> 2013 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in/">Themedesigner.in</a> </div>-->
</div>

<!--end-Footer-part-->

<script>

    $(".submenu").each(function () {
        var li = $(this);
        if (li.find('li').length == 0) {
            li.remove();
        }
    });

    $(function () {
        var url = window.location.href;
        $('.submenu li').each(function () {
            var _this = $(this);
            var _href = _this.find("a").attr("href");
            if (url.indexOf(_href) !== -1) {
                _this.addClass("active");
            }
        });
        $("#sidebar li").each(function () {
            var _this = $(this);
            var _href = _this.find("a").attr("href");
            if (url.indexOf(_href) !== -1) {
                _this.addClass("active").parents(".submenu").addClass("open");
            }
        })
    });
</script>

<script type="text/javascript">
    // This function is called from the pop-up menus to transfer to
    // a different page. Ignore if the value returned is a null string:
    function goPage(newURL) {

        // if url is empty, skip the menu dividers and reset the menu selection to default
        if (newURL != "") {

            // if url is "-", it is this page -- reset the menu:
            if (newURL == "-") {
                resetMenu();
            }
            // else, send page to designated URL
            else {
                document.location.href = newURL;
            }
        }
    }


    // resets the menu selection upon entry to this page:
    function resetMenu() {
        document.gomenu.selector.selectedIndex = 2;
    }
</script>
</body>
</html>
<script src="{{ asset('js/matrix.js') }}"></script>
<script src="{{ asset('js/jquery-form/jquery.form.js') }}"></script>
<script>
    $(":file").filestyle({classButton: "btn btn-info"});

    //和blade模板分隔符冲突，特此修改
    var customTags = ['<%', '%>'];
    Mustache.tags = customTags;
</script>
{{--<!--<script src="{{ asset('js/matrix.dashboard.js') }}"></script>-->--}}