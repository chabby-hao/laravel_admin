<!DOCTYPE html>
<html lang="en">
<head>
    <title>新运营后台</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/css/bootstrap-responsive.min.css"/>
    <!--<link rel="stylesheet" href="/css/fullcalendar.css"/>-->
    <link rel="stylesheet" href="/css/matrix-style.css"/>
    <link rel="stylesheet" href="/css/matrix-media.css"/>
    <link href="/font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <!--<link rel="stylesheet" href="/css/jquery.gritter.css"/>-->
    <!--<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>-->

    <script src="/js/jquery.min.js"></script>
    <script src="/js/jquery.ui.custom.js"></script>
    <script src="/js/bootstrap.min.js"></script>
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
                <span class="text">Welcome <?php echo session('username') ?></span><b class="caret"></b></a>
            <ul class="dropdown-menu">
                {{--<li><a href="#"><i class="icon-user"></i> My Profile</a></li>--}}
                {{--<li class="divider"></li>--}}
                {{--<li><a href="#"><i class="icon-check"></i> My Tasks</a></li>--}}
                {{--<li class="divider"></li>--}}
                <li>
                    <a href=""><i class="icon-key"></i>
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
-->
</div>
<!--close-top-serch-->
<!--sidebar-menu-->
<div id="sidebar">
    <ul>
        <!--<li class="active"><a href=""><i class="icon icon-home"></i>
                <span>Dashboard</span></a></li>-->
        <!--        用户参数配置，用于集成api-->
        <li class="submenu"><a href="#"><i class="icon icon-th-list"></i> <span>权限管理</span>
            </a>
            <ul>
                <li><a href="<?php echo \Illuminate\Support\Facades\URL::action('') ?>">角色配置</a></li>
                <li><a href="">添加管理员</a></li>
            </ul>

        </li>
        <!--        设备配置-->
        <li class="submenu"><a href="#"><i class="icon icon-th-list"></i> <span>设备管理</span>
            </a>
            <ul>
                <li><a href="">设备列表</a></li>
                <li><a href="">添加设备</a></li>
                <li><a href="">远程升级</a></li>
                <li><a href="">升级文件管理</a></li>
                <li><a href="">设备远程隧道配置</a></li>
            </ul>

        </li>




        {{--地图--}}
        <li class="active"><a target="_blank" href="http://anxinchong.vipcare.com/map.html"><i class="icon icon-th-list"></i> <span>地图</span>
            </a>
        </li>


    </ul>
</div>
<!--sidebar-menu-->