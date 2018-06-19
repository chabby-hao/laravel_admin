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
                                    <input class="btn btn-success btn_map" type="button" value="地图">
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

                <div id="mytable" class="hide widget-box">
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

                <div style="width: 100%;height: 570px;float:left">
                    <div id="mymap" style="width:100%; height: 570px"></div>
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
                zoom: 5
            },
            visualMap: {
                type: "piecewise",
                left: 'right',
                min: 0,
                max: 15,
                splitNumber: 5,
                maxOpen: true,
                color: ['red', 'yellow', 'green']
            },
            tooltip: {
                formatter: function(params, ticket, callback) {

                    return "aaa:";
                },
                trigger: 'item'
            },
            series: [{
                type: 'lines',
                coordinateSystem: 'bmap',
                polyline: true,
                lineStyle: {
                    normal: {
                        opacity: 1,
                        width: 4
                    },
                    emphasis: {
                        width: 6
                    }
                },
                effect: {
                    show: true,
                    symbolSize: 2,
                    color: "white"
                }
            }]
        };

        var data = [
            {value:23,'coords':[[120.77242, 30.77701],[120.77237, 30.77694],[120.77232, 34.7769]]},
            {value:3,'coords':[[124.74735, 36.74056],[120.7473, 30.7406],[120.74599, 30.74134]]},
        ]
        console.log(data);
        //option.series[0].data = data;
        //console.log(option.series[0].data);
        //myChart.setOption(option);

        $(".btn_map").click(function(){
            var id = $("#id").val();
            var daterange = $("input[name='daterange']").val();
            if(id && daterange){
                //myChart.showLoading();
                var str = $("#myform").serialize();
                $.ajax({
                    url:'{{URL::action('Admin\DeviceController@tripTrails')}}',
                    data:str,
                    success:function(res){
                        var data = [{value: 23, coords:res.trip[0].locs}];
                        option.series[0].data = data;
                        myChart.setOption(option);
                        //myChart.hideLoading();
                    }
                })
            }
        });


    </script>


@endsection