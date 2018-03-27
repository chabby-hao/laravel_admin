<!DOCTYPE html>
<html lang="en">
<head>
    <title>新运营后台</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/bootstrap-responsive.min.css') }}"/>
<!--<link rel="stylesheet" href="{{ asset('css/fullcalendar.css') }}"/>-->
    <link rel="stylesheet" href="{{ asset('css/matrix-style.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/matrix-media.css') }}"/>
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet"/>
<!--<link rel="stylesheet" href="{{ asset('css/jquery.gritter.css') }}"/>-->
    <!--<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>-->

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.ui.custom.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
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
                    <a href="{{ \Illuminate\Support\Facades\URL::route('admin-logout')  }}"><i class="icon-key"></i>
                        Log Out</a></li>
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

        <li class=""><a href="{{URL::route('admin-home')}}"><i class="icon icon-home"></i>
                <span>首页</span></a></li>

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

        <li class="submenu"><a href="#"><i class="icon icon-th-list"></i> <span>设备管理</span>
            </a>
            <ul>
                <li><a href="{{URL::action('Admin\DeviceController@list')}}">设备列表</a></li>
            </ul>
        </li>

        {{--订单--}}
        <li class="submenu"><a href="#"><i class="icon icon-th-list"></i> <span></span>
            </a>
            <ul>
                <li><a href="">订单列表</a></li>
                <li><a href="">新增订单</a></li>
            </ul>
        </li>

        {{--地图--}}
        <li class="">
            <a target="_blank" href="http://anxinchong.vipcare.com/map.html"><i class="icon icon-th-list"></i>
                <span>地图管理</span>
            </a>
        </li>

    </ul>
</div>
<!--sidebar-menu-->

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"><a href="{{URL::route('admin-home')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
            <a href="#" class="current"><?php echo \App\Logics\AuthLogic::getPermisName(); ?></a></div>
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
    $(function () {
        var url = window.location.href;
        $('.submenu li').each(function () {
            var _this = $(this);
            var _href = _this.find("a").attr("href");
            if (url.indexOf(_href) !== -1) {
                _this.addClass("active");
            }
        });
        $("#sidebar li").each(function(){
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
<script src="{{ asset('js/jquery-helper/jquery-helper.js') }}"></script>
<script src="{{ asset('js/jquery-form/jquery.form.js') }}"></script>
<!--<script src="{{ asset('js/matrix.dashboard.js') }}"></script>-->