@extends('admin.layout')
@section('content')

    <!-- 引入 echarts.js -->
    <!--引入百度地图的jssdk，这里需要使用你在百度地图开发者平台申请的 ak-->
    <script src="https://api.map.baidu.com/api?v=4.0&ak=QhhNgV6Mb4rVFtGQKhiPoETzf1VpK1vM"></script>
    <!-- 引入 ECharts -->
    <script src="{{asset('map/echarts.min.js')}}"></script>
    <!-- 引入百度地图扩展 -->
    <script src="{{asset('map/bmap.min.js')}}"></script>

    <div class="container-fluid" style="min-height: 800px">
        <hr>
        {{--设备状态tab--}}

        <div class="btn-group">
            <div>
                @foreach(\App\Logics\MileageLogic::getMileMap() as $key => $row)
                    <a href="{{URL::action('Admin\DeviceController@mileageList', ['type'=>$key])}}" data-key="{{$key}}" class="btn marginright @if(Request::input('type') == $key) btn-success @endif">{{$row}}</a>
                @endforeach
            </div>
        </div>


        <div class="row-fluid">
            <div class="span12">

                <div class="widget-box">
                    <div class="widget-title"><span class="icon"> <i class="icon-search"></i> </span>
                        <h5>筛选查询</h5>
                    </div>
                    <div class="widget-content">
                        <form id="myform" method="get" class="form-search">
                            @if(Request::input('type'))
                                <input type="hidden" name="status" value="{{Request::input('type')}}">
                            @endif
                            <div class="control-group">
                                <div class="inline-block">
                                    <label>输入搜索：</label>
                                </div>
                                <div class="inline-block w8">
                                    <input class="w2" type="text" id="id" name="id" value="{{Request::input('id')}}" placeholder="设备号/IMEI/IMSI">
                                    <input name="daterange" value="" class="w6 date" type="text">
                                    <input class="btn btn-info" type="submit" value="查询">
                                    @if(Auth::user()->can('device/tripTrails'))
                                        <input class="btn btn-success btn_map hide" type="button" value="地图">
                                    @endif
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

                <div id="mytable" class="widget-box">
                    <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
                        <h5>列表</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>设备号</th>
                                <th>骑行时间</th>
                                <th>行驶里程</th>
                                <th>骑行时长</th>
                                <th>平均速度</th>
                                <th>使用电量</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($datas as $data)
                                <tr class="gradeX">
                                    <td>{{$data['udid']}}</td>
                                    <td>{{$data['dateTime']}}</td>
                                    <td>{{$data['mile']}}公里</td>
                                    <td>{{$data['duration']}}分钟</td>
                                    <td>{{$data['speed']}}km/h</td>
                                    <td>{{$data['energy']}}kw/h</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="pager">
                        <?php echo $page_nav ?>
                    </div>
                </div>

                <div id="map" class="hide" style="width: 100%;height: 570px;float:left">
                    <div id="mymap" style="width:100%; height: 570px"></div>
                    <style>
                        .left,.center,.right{
                            text-align:center;
                        }
                        .left,.right{
                            font-size: 48px;
                            cursor: pointer;
                            font-weight:100;
                            vertical-align: top;
                            color:#fff;
                            background-color: #7fa0ff;
                        }

                        .left span,.right span{
                            display: inline-block;
                            height: 100%;
                            line-height: 220%;
                        }

                        .center{
                            padding:1%;
                            padding-top:17px;
                            position: relative;
                            background-color: #ffffff;
                        }
                        .line-css{
                            height:1px;
                            width:100%;
                            background-color: #7fa0ff;
                            margin:0 auto;
                            opacity: 0.5;
                        }
                        .time{
                            font-size:24px;
                            color: #7fa0ff;
                            margin-bottom: 5px;
                            display: inline-block;
                        }
                        .address{
                            margin-top:10px;
                            display: inline-block;
                            width:100%;
                            text-align: left;
                        }
                        .address_begin,.address_end{
                            display: inline-block;
                            width:46%;
                            vertical-align: top;
                        }

                        .detail{
                            display: inline-block;
                            width: 100%;
                            margin-top: 10px;
                        }

                        .detail span{
                            width:23%;
                            display: inline-block;
                            text-align: center;
                        }

                        .nomore{
                            background-color: #bbbbbb;
                        }


                    </style>
                    <div class="mybottom" style="position: absolute;width: 600px;height:120px;background-color:#ffffff;margin: 0 auto;bottom: 30px;left:0;right:0">
                        <div class="left" style="display:inline-block;width: 10%;height: 100%">
                            <span><</span>
                        </div>{{--
                        --}}<div class="center" style="display:inline-block;width: 78%;">
                            <span class="mydate" style="position: absolute;top:5px;left:5px">0000-00-00</span>
                            <span class="time">00:00-00:00</span>
                            <div class="line-css"></div>
                            <span class="address">
                                <span class="address_begin">
                                    <img src="{{asset('image/start.png')}}" alt="">
                                    <span class="text_begin"></span>
                                </span>
                                <span class="address_end">
                                    <img src="{{asset('image/end.png')}}" alt="">
                                    <span class="text_end"></span>
                                </span>
                            </span>
                            <span class="detail">
                                <span class="use_time">00:00:00</span>
                                <span class="mile">0.0km</span>
                                <span class="speed">0.0km/h</span>
                                <span class="energy">0.0kw.h</span>
                            </span>
                        </div>{{--
                        --}}<div class="right nomore" style="display:inline-block;width:10%;height: 100%">
                            <span>></span>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <script>
        window.gDatepicker.datetimeRangePicker($(".date"),'{{$start}}','{{$end}}');
    </script>

    {{--        @include('admin.common_submitjs')--}}

    <script>

        var myChart = echarts.init(document.getElementById('mymap'));

        var option = {
            bmap: {
                center: [116.282019, 38.587249],
                roam: true,
                zoom: 16
            },
//            visualMap: {
//                type: "piecewise",
//                left: 'right',
//                min: 0,
//                max: 15,
//                splitNumber: 5,
//                maxOpen: true,
//                color: ['red', 'yellow', 'green']
//            },
            tooltip: {
                formatter: function(params, ticket, callback) {
                    return "行程时间由: " + params.data.begin + ' 至 ' + params.data.end;
                },
                trigger: 'item'
            },
            series: [{
                type: 'lines',
                coordinateSystem: 'bmap',
                polyline: true,
                data:[],
                lineStyle: {
                    normal: {
                        color: '#44BB8C',
                        opacity: 1,
                        width: 4
                    },
                    emphasis: {
                        width: 6
                    }
                },
                effect: {
                    show: true,
                    period: 10,
                    trailLength: 0,
                    symbol: 'arrow',
                    symbolSize: [15,10],
                    color: '#cc0066'
                },
            }]
        };

        var all = null;
        var index = 0;
        var len = 0;
        var mydate = $(".mydate");
        var time = $(".time");
        var text_begin = $(".text_begin");
        var text_end = $(".text_end");
        var use_time = $(".use_time");
        var mile = $(".mile");
        var speed = $(".speed");
        var energy = $(".energy");

        var btn_map = $(".btn_map");
        btn_map.click(function(){
            var id = $("#id").val();
            var daterange = $("input[name='daterange']").val();
            if(id && daterange){
                $('#map').show();
                $("#mytable").hide();
                //myChart.showLoading();
                var str = $("#myform").serialize();
                $.ajax({
                    url:'{{URL::action('Admin\DeviceController@tripTrails')}}',
                    data:str,
                    success:function(res){
                        if(res.trip && res.trip.length > 0){
                            all = res.trip;
                            len = all.length;
                            if(len === 1){
                                $(".left").addClass('nomore');
                            }
                            setTrip(all[index]);
                        }else{
                            myalert('未查询到行程记录');
                        }

                        //myChart.hideLoading();
                    }
                })
            }
        });

        function setTrip(trip)
        {
            var data = [{begin: trip.begin,end:trip.end, coords:trip.locs}];
            option.series[0].data = data;
            option.bmap.center = data[0].coords[0];
            myChart.setOption(option);
            mydate.html(trip.date);
            time.html(trip.time);
            text_begin.text(trip.addressBegin);
            text_end.text(trip.addressEnd);
            use_time.html(trip.use_time);
            mile.html(trip.mile + 'km');
            speed.html(trip.speed + 'km/h');
            energy.html(trip.energy + 'kw.h');
            myChart.hideLoading();
        }

        $(".left").click(function(){

            if(index+1 === len){
                return;
            }else if(index+2 === len){
                $(this).addClass('nomore');
            }
            myChart.showLoading();
            index++;
            setTrip(all[index]);
            $(".right").removeClass('nomore');
        });

        $(".right").click(function(){
            if(index === 0){
                return;
            }else if(index === 1){
                $(this).addClass('nomore');
            }
            myChart.showLoading();
            index--;
            setTrip(all[index]);
            $(".left").removeClass('nomore');
        });

        $("#id").on('blur keyup',function(){
            if($(this).val()){
                btn_map.show();
            }else{
                btn_map.hide();
            }
        });



    </script>


@endsection