<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}

    <title>安骑产品全国分布图</title>
    <!-- 引入 echarts.js -->
    <!--引入百度地图的jssdk，这里需要使用你在百度地图开发者平台申请的 ak-->
    <script src="https://api.map.baidu.com/api?v=4.0&ak=QhhNgV6Mb4rVFtGQKhiPoETzf1VpK1vM"></script>
    <!-- 引入 ECharts -->
    <script src="{{asset('map/echarts.min.js')}}"></script>
    <!-- 引入百度地图扩展 -->
    <script src="{{asset('map/bmap.min.js')}}"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>

    <script src="{{asset('js/jquery-form/jquery.form.js')}}"></script>

    <script src="{{asset('js/jquery-helper/jquery-helper.js')}}"></script>

    <script src="https://cdn.bootcss.com/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>


    <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{asset('vendor/bootstrap-select/bootstrap-select.min.css')}}">

    <!-- Latest compiled and minified JavaScript -->
    <script src="{{asset('vendor/bootstrap-select/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap-select/i18n/defaults-zh_CN.js')}}"></script>
    <style>

        * {
            -webkit-border-radius: 0 !important;
            -moz-border-radius: 0 !important;
            border-radius: 0 !important;
        }

        html, body {
            width: 100%;
            height: 100%;
            margin: 0;
        }

        ul li {
            /*list-style: none;*/
        }

        #main {
            width: 100%;
            height: 100%;
        }

        #bottom {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            margin: 0 auto;
            /*background: rgba(70, 70, 70, 0.4);*/
            width: 90%;
            height: 85px;
            /*border-top-left-radius: 5px;*/
            /*border-top-right-radius: 5px;*/
        }

        .choose-ul {
            padding: 0;
            text-align: center;
            width: 96%;
            position: absolute;
            bottom: 5px;
            left: 0;
            right: 0;
            margin: 0 auto;
        }

        .choose-li {
            background-size: 100% 100%;
            background-repeat: no-repeat;
            cursor: pointer;
            text-align: left;
            vertical-align: bottom;
            display: inline-block;
            list-style: none;
            @if($isCustomer)
 width: 8%;
            @else
 width: 10%;
        @endif
 /*width: 7%;*/
            height: 7.5rem;
            background-color: white;
            /*border-radius: 10px;*/
            margin-right: 2px;
        }

        .active {
            background-size: 100% 100%;
            background-repeat: no-repeat;
            @if($isCustomer)
 width: 11%;
            @else
 width: 11%;
        @endif
 /*width: 14%;*/
            height: 8.5rem;
            /*background-color: rgb(46, 224, 224);*/
        }

        .intro {
            position: relative;
            padding-left: 10px;
            height: 34%;
            font-size: 14px;
            display: block;
            text-align: left;
            padding-top: 7%;
            color: #333333;
        }

        .line1 {
            position: relative;
            width: 100%;
            height: 2%;
            background-color: #e9efff;
        }

        .line2 {
            position: relative;
            width: 100%;
            height: 6%;
            background-color: #7fa0ff;
        }

        .quantity {
            position: relative;
            font-size: 25px;
            height: 58%;
            text-align: center;
            line-height: 210%;
            vertical-align: middle;
            display: block;
            font-weight: bold;
        }

        .active .quantity {
            color: #7fa0ff;
        }

        #right {
            border-radius: 10px;
            width: 86px;
            height: 250px;
            position: absolute;
            right: 10px;
            top: 10px;
            z-index: 9999999999;
        }

        .right-ul {
            background-color: rgb(232, 241, 245);
            border-radius: 10px;
            cursor: pointer;
            list-style: none;
            height: 100%;
            text-align: center;
            padding: 0;
            margin: 0;
        }

        .right-ul li {
            height: 33.33%;
            position: relative;
        }

        .item {
            position: absolute;
            height: 50%;
            margin: auto;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            color: #3a3a3a;
        }

        .right-text {
            display: block;
            font-size: 10px;

        }

        .cheliang {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .wangdian {
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .current {
            background-color: rgb(70, 79, 83);
        }

        .current .right-text {
            color: #ffffff;
        }

        #che-img {
            position: absolute;
            top: 28px;
            left: 28px;
        }

        .lastli {
            height: 7.5rem;
            display: inline-block;
            vertical-align: bottom;
        }

        .choose-div {
            cursor: pointer;
            position: relative;
            text-align: left;
            height: 33.4%;
            width: auto;
            vertical-align: middle;
        }

        .choose-img {
            height: 100%;
        }

        .number {
            z-index: 9999999;
            position: absolute;
            left: 0;
            top: 0;
            display: inline-block;
            width: 88%;
            height: 100%;
            line-height: 210%;
            text-align: right;
        }

        .bottom-text{
            z-index: 9999999;
            position: absolute;
            left: 42px;
            top: 0;
            display: inline-block;
            width: 88%;
            height: 100%;
            line-height: 210%;
            text-align: left;
        }

        .choose-active{
            color:#fff;
        }

        #search {
            z-index: 9999999;
            position: absolute;
            top: 20px;
            right: 40px;
        }

        .mybtn {
            color: #fff !important;
            background-color: #7fa0ff !important;
            border-color: #7fa0ff !important;
        }

        .myoption {
            color: #fff !important;
            background-color: #7fa0ff !important;
            border-color: #7fa0ff !important;
            text-align: center !important;
            width: 140px !important;
        }

        .open .dropdown-toggle {
            background-color: #7fa0ff !important;
            border-color: #7fa0ff !important;
            color: #fff !important;
        }

        .dropdown-menu.open {
            border: none !important;
            padding: 0 !important;
            margin: 0 !important;
        }

        .input-group-btn {
            width: auto;
        }

    </style>
</head>
<body>
<!-- 为ECharts准备一个具备大小（宽高）的Dom -->
<div id="main"></div>
<div id="search">
    <div class="row">
        <div class="pull-right">
            <form id="myform" method="get">
                <div class="input-group">
                <input name="id" type="text" style="width: 180px" class="form-control" placeholder="设备号">
                <select name="device_type" class="selectpicker"  data-width="100px" data-size="10">
                    <option value="" class="myoption">选择型号</option>
                    @foreach(\App\Models\BiDeviceType::getNameMap() as $id=>$name)
                        <option value="{{$id}}" class="myoption">{{$name}}</option>
                    @endforeach
                </select>
                <select name="channel_id" class="selectpicker" data-width="100px" data-size="10">
                    <<option value="" class="myoption">选择渠道</option>
                    @foreach(\App\Models\BiChannel::getChannelMap() as $id=>$name)
                        <option value="{{$id}}" class="myoption">{{$name}}</option>
                    @endforeach
                </select>
                <select name="brand_id" class="selectpicker" data-width="100px" data-size="10">
                    <option value="" class="myoption">选择品牌</option>
                    @foreach(\App\Models\BiBrand::getBrandMap() as $id=>$name)
                        <option value="{{$id}}" class="myoption">{{$name}}</option>
                    @endforeach
                </select>
                <span class="input-group-btn">
                    <img id="mysubmit" class="search" style="cursor:pointer;" src="{{asset('map/search.png')}}" height="34px" alt="search">
                </span>
            </div>
            </form>
        </div>
    </div>
</div>
<div id="right" class="hide">
    <ul class="right-ul">
        <li class="cheliang current">
            <div class="item">
                <img src="{{asset('map/cheliang@2x.png')}}" alt="">
                <span class="right-text">车辆</span>
                <span class="right-text total"></span>
            </div>
        </li>
        <li class="chongdianpeng">
            <div class="item">
                <img src="{{asset('map/chongdianpeng@2x.png')}}" alt="">
                <span class="right-text">充电棚</span>
                <span class="right-text total_chongdianpeng">3</span>
            </div>
        </li>
        <li class="wangdian">
            <div class="item">
                <img src="{{asset('map/wangdian@2x.png')}}" alt="">
                <span class="right-text">服务网点</span>
            </div>
        </li>
    </ul>
</div>
<div id="bottom">
    <ul class="choose-ul">

        @foreach($keyMap as $k => $v){{--
            --}}
        <li class="choose-li" name="{{$k}}">
            <div class="intro">{{$v}}</div>
            <div class="line1"></div>
            <div class="quantity">0</div>
            <div class="line2"></div>
        </li>{{--
         --}}@endforeach{{--

         --}}
        <li class="lastli">
            <div class="choose-div choose-cheliang choose-active">
                <img class="choose-img" src="{{asset('map/cheliang-choose.png')}}" alt="">
                <div class="bottom-text">车辆</div>
                <div class="number total"></div>
            </div>
            <div class="choose-div choose-chongdianpeng">
                <img class="choose-img" src="{{asset('map/chongdian-unchoose.png')}}" alt="">
                <div class="bottom-text">充电棚</div>
                <div class="number total_chongdianpeng"></div>
            </div>
            <div class="choose-div">
                <img class="choose-img" src="{{asset('map/wangdian-unchoose.png')}}" alt="">
                <div class="bottom-text">服务网点</div>
                <div class="number">0</div>
            </div>
        </li>

    </ul>
</div>


<script>

    var chooseDivs = $(".choose-div");
    //车辆/充电棚/服务网点 切换
    chooseDivs.click(function () {

        $(".choose-active").find(".choose-img").each(function(){
            var img = $(this);
            var src = img.attr("src");
            var newsrc = src.replace(/-\w+(\.\w+)/,"-unchoose$1");
            img.attr("src",newsrc);
        });

        chooseDivs.removeClass('choose-active');
        $(this).addClass('choose-active');

        var img = $(this).find(".choose-img");
        var src = img.attr("src");
        var newsrc = src.replace(/-\w+(\.\w+)/,"-choose$1");
        console.log(src)
        console.log(newsrc);

        img.attr("src",newsrc);
    });


    //筛选下拉
    $(".selectpicker").on('changed.bs.select	', function (e,index) {
        // do something...
        if(index === 0){
            $(this).selectpicker('setStyle','mybtn','remove');
        }else{
            $(this).selectpicker('setStyle','mybtn','add');
        }
    });
</script>

<script type="text/javascript">
    var convertData = [];
    var title = {
        //text: '电动车分布',
        //subtext: 'data from 安骑科技',
        //sublink: 'http://www.pm25.in',
        left: 'center'
    };
    var option = {
        title: title,
        tooltip: {//弹框
            show: true,
            position: 'top',
            textStyle: {},
            padding: [
                5,  // 上
                15, // 右
                5,  // 下
                15, // 左
            ],
            formatter: function (params, ticket, callback) {
                //console.log(params);
                return '<img src="{{asset("map/cheliang2@2x.png")}}"/>&nbsp;&nbsp;&nbsp;&nbsp;最近一次定位' + '<br>· ' + params.data.name + '<br>· ' + params.data.time + '<br>· ' + params.data.address;
            },
//                    backgroundColor:'rgb(46,224,224)',
        },
        bmap: {
            center: [106.282019, 34.587249],
            zoom: 5,
            roam: true,
            mapStyle: {
                styleJson: [{
                    'featureType': 'water',
                    'elementType': 'all',
                    'stylers': {
                        'color': '#d1d1d1'
                    }
                }, {
                    'featureType': 'land',
                    'elementType': 'all',
                    'stylers': {
                        'color': '#f3f3f3'
                    }
                }, {
                    'featureType': 'railway',
                    'elementType': 'all',
                    'stylers': {
                        'visibility': 'off'
                    }
                }, {
                    'featureType': 'highway',
                    'elementType': 'all',
                    'stylers': {
                        'color': '#000'
                    }
                }, {
                    'featureType': 'highway',
                    'elementType': 'labels',
                    'stylers': {
                        'visibility': 'on'
                    }
                }, {
                    'featureType': 'arterial',
                    'elementType': 'geometry',
                    'stylers': {
                        'color': '#fefefe'
                    }
                }, {
                    'featureType': 'arterial',
                    'elementType': 'geometry.fill',
                    'stylers': {
                        'color': '#fefefe'
                    }
                }, {
                    'featureType': 'poi',
                    'elementType': 'all',
                    'stylers': {
                        'visibility': 'off'
                    }
                }, {
                    'featureType': 'green',
                    'elementType': 'all',
                    'stylers': {
                        'visibility': 'off'
                    }
                }, {
                    'featureType': 'subway',
                    'elementType': 'all',
                    'stylers': {
                        'visibility': 'off'
                    }
                }, {
                    'featureType': 'manmade',
                    'elementType': 'all',
                    'stylers': {
                        'color': '#d1d1d1'
                    }
                }, {
                    'featureType': 'local',
                    'elementType': 'all',
                    'stylers': {
                        'color': '#000'
                    }
                }, {
                    'featureType': 'arterial',
                    'elementType': 'labels',
                    'stylers': {
                        'visibility': 'on'
                    }
                }, {
                    'featureType': 'boundary',
                    'elementType': 'all',
                    'stylers': {
                        'color': '#000'
                    }
                }, {
                    'featureType': 'building',
                    'elementType': 'all',
                    'stylers': {
                        'color': '#d1d1d1'
                    }
                }, {
                    'featureType': 'label',
                    'elementType': 'labels.text.fill',
                    'stylers': {
                        'color': '#fff'
                    }
                }]
            }
        },
        series: [
            {
                name: 'udid',
                type: 'scatter',
                /*large: true,
                 largeThreshold:30000,*/
                coordinateSystem: 'bmap',
                data: convertData,
                symbol: 'circle',//image://./cheliang2@2x.png  pin
                symbolSize: function (val) {
                    return 9;
                },
                hoverAnimation: true,
                tooltip: {},
                label: {
                    normal: {
                        formatter: '{b}',
                        position: 'top',
                        show: false
                    },
                    emphasis: {
                        show: false
                    },
                },
                itemStyle: {
                    normal: {
                        color: 'rgb(46,224,224)'
                    }
                }
            },
        ]
    };

    var option2 = {
        title: title,
        tooltip: {//弹框
            show: true,
            position: 'top',
            textStyle: {},
            padding: [
                5,  // 上
                15, // 右
                5,  // 下
                15, // 左
            ],
            formatter: function (params, ticket, callback) {
                //console.log(params);
                return '&nbsp;' + params.data.address + '<br>·' + ' 设备号： ' + params.data.device_no + '<br>· 充电口： ' + params.data.port_nums + '<br>· 充电中： ' + params.data.charging_nums;
            },
//                    backgroundColor:'rgb(46,224,224)',
        },
        bmap: {
            center: [106.282019, 34.587249],
            zoom: 5,
            roam: true,
            mapStyle: {
                styleJson: [{
                    'featureType': 'water',
                    'elementType': 'all',
                    'stylers': {
                        'color': '#d1d1d1'
                    }
                }, {
                    'featureType': 'land',
                    'elementType': 'all',
                    'stylers': {
                        'color': '#f3f3f3'
                    }
                }, {
                    'featureType': 'railway',
                    'elementType': 'all',
                    'stylers': {
                        'visibility': 'off'
                    }
                }, {
                    'featureType': 'highway',
                    'elementType': 'all',
                    'stylers': {
                        'color': '#000'
                    }
                }, {
                    'featureType': 'highway',
                    'elementType': 'labels',
                    'stylers': {
                        'visibility': 'on'
                    }
                }, {
                    'featureType': 'arterial',
                    'elementType': 'geometry',
                    'stylers': {
                        'color': '#fefefe'
                    }
                }, {
                    'featureType': 'arterial',
                    'elementType': 'geometry.fill',
                    'stylers': {
                        'color': '#fefefe'
                    }
                }, {
                    'featureType': 'poi',
                    'elementType': 'all',
                    'stylers': {
                        'visibility': 'off'
                    }
                }, {
                    'featureType': 'green',
                    'elementType': 'all',
                    'stylers': {
                        'visibility': 'off'
                    }
                }, {
                    'featureType': 'subway',
                    'elementType': 'all',
                    'stylers': {
                        'visibility': 'off'
                    }
                }, {
                    'featureType': 'manmade',
                    'elementType': 'all',
                    'stylers': {
                        'color': '#d1d1d1'
                    }
                }, {
                    'featureType': 'local',
                    'elementType': 'all',
                    'stylers': {
                        'color': '#000'
                    }
                }, {
                    'featureType': 'arterial',
                    'elementType': 'labels',
                    'stylers': {
                        'visibility': 'on'
                    }
                }, {
                    'featureType': 'boundary',
                    'elementType': 'all',
                    'stylers': {
                        'color': '#000'
                    }
                }, {
                    'featureType': 'building',
                    'elementType': 'all',
                    'stylers': {
                        'color': '#d1d1d1'
                    }
                }, {
                    'featureType': 'label',
                    'elementType': 'labels.text.fill',
                    'stylers': {
                        'color': '#fff'
                    }
                }]
            }
        },
        series: [
            {
                name: 'udid',
                type: 'scatter',
                /*large: true,
                 largeThreshold:30000,*/
                coordinateSystem: 'bmap',
                data: convertData,
                symbol: 'circle',//image://./cheliang2@2x.png  pin
                symbolSize: function (val) {
                    return 9;
                },
                hoverAnimation: true,
                tooltip: {},
                label: {
                    normal: {
                        formatter: '{b}',
                        position: 'top',
                        show: false
                    },
                    emphasis: {
                        show: false
                    },
                },
                itemStyle: {
                    normal: {
                        color: 'rgb(46,224,224)'
                    }
                }
            },
        ]
    };

    var chooseLis = $(".choose-li");
    var rightLis = $(".right-ul li");
    var cheliang = $(".cheliang img");
    var chongdianpeng = $(".chongdianpeng img");
    var wangdian = $(".wangdian img");

    rightLis.click(function () {
        rightLis.removeClass('current');
        $(this).addClass('current');
        cheliang.attr({src: '{{asset("map/cheliang_black@2x.png")}}'});
        chongdianpeng.attr({src: '{{asset("map/chongdianpeng@2x.png")}}'});
        wangdian.attr({src: '{{asset("map/wangdian@2x.png")}}'});
    });

    rightLis.each(function (index) {
        if (index === 0) {
            $(this).click(function () {
                $(this).find('img').attr({
                    src: '{{asset("map/cheliang@2x.png")}}',
                })
            });
        } else if (index === 1) {
            $(this).click(function () {
                $(this).find('img').attr({
                    src: '{{asset("map/chongdianpeng_White@2x.png")}}',
                })
            });
        } else if (index === 2) {
            $(this).click(function () {
                $(this).find('img').attr({
                    src: '{{asset("map/wangdian_White@2x.png")}}',
                })
            });
        }
    })

    // 基于准备好的dom，初始化echarts实例
    var myChart = echarts.init(document.getElementById('main'));
    myChart.setOption(option);


    //var url = 'http://api.vipcare.com/map/getEbikeData';
    //var url2 = 'http://api.vipcare.com/map/getEbikeCount';
    var url = '{{URL::action('Admin\MapController@show')}}';

    //var bottoms = $("#bottom");
    var bottoms = $('.choose-li');

    var chooseName = {};

    function reloadMap(res){
        var newoption = $.extend({}, option);
        if(res.single){
            if(res.gps.length > 0){
                newoption.bmap.zoom = 13;
                newoption.bmap.center = res.gps[0].value;
                newoption.series[0].data = res.gps;
            }

        }
        console.log(newoption);

        newoption.series[0].data = res.gps;
        //console.log(option);
        //使用刚指定的配置项和数据显示图表。
        myChart.setOption(newoption);
        myChart.hideLoading();
    }

    chooseLis.click(function () {
        bottoms.show();
        myChart.showLoading();
        chooseLis.removeClass('active');
        var that = $(this);
        that.addClass('active');
        var name = that.attr('name');

        //var formdata = $("#myform").serialize();
        //console.log(formdata);

        chooseName = {name:name};

        $.ajax({
            type: "get",
            //dataType: 'jsonp',
            dataType: 'json',
            //async:false,
            url: url,//数据类型为jsonp
            //data: formdata + '&name='+name,
            data:chooseName,
            //jsonp: "jsonpCallback",//服务端用于接收callback调用的function名的参数
            success: function (res) {
                reloadMap(res);
            }
        })
    });

    function triggerQixing() {
        $("li[name='{{\App\Objects\DeviceObject::CACHE_LIST_RIDING}}']").trigger('click');
    }

    triggerQixing();


    $.ajax({
        type: "get",
        dataType: 'json',
        //async:false,
        url: url,//数据类型为jsonp
        data: {count: 1},
        //jsonp: "jsonpCallback",//服务端用于接收callback调用的function名的参数
        success: function (res) {
            console.log(res);
            $(".choose-li").each(function () {
                var name = $(this).attr('name')
                $(this).find('.quantity').html(res[name]);
            });
            $(".total").text(res['total']);
        }
    })

    $(".cheliang,.choose-cheliang").click(function () {
        bottoms.show();
        triggerQixing();
    })

    $(".chongdianpeng,.choose-chongdianpeng").click(function () {
        myChart.showLoading();
        $.ajax({
            type: "get",
            dataType: 'json',
            //async:false,
            url: 'http://anxinchong.vipcare.com/api/map/deviceData',//数据类型为jsonp
            jsonp: "jsonpCallback",//服务端用于接收callback调用的function名的参数
            success: function (res) {
                console.log(res);
                //console.log(res);
                //that.find('.quantity').html(res.gps.length);

                option2.series[0].data = res;
                //console.log(option);
                //使用刚指定的配置项和数据显示图表。
                myChart.setOption(option2);
                //bottoms.hide();
                myChart.hideLoading();
            }
        })
    });

    $.ajax({
        type: "get",
        dataType: 'json',
        //async:false,
        url: 'http://anxinchong.vipcare.com/api/map/deviceData',//数据类型为jsonp
        jsonp: "jsonpCallback",//服务端用于接收callback调用的function名的参数
        success: function (res) {
            $(".total_chongdianpeng").text(res.length);
        }
    })

</script>

<script>

    $(function () {
        var myform = $("#myform");

        $("#mysubmit").click(function () {
            myChart.showLoading();
            myform.ajaxSubmit({
                dataType: 'json',
                data:chooseName,
                //beforeSubmit : test,//ajax动画加载
                success: function (res) {
                    reloadMap(res);
                }
            });
        });


    });

</script>
</body>
</html>