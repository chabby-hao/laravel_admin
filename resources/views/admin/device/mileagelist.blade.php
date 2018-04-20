@extends('admin.layout')
@section('content')

    <div class="container-fluid">
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
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

                <div class="widget-box">
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
            </div>
        </div>
    </div>

    <script>
        window.gDatepicker.datetimeRangePicker($(".date"),'{{$start}}','{{$end}}');
    </script>

    {{--        @include('admin.common_submitjs')--}}

@endsection