@extends('admin.layout')
@section('content')

    <div class="container-fluid">
        <hr>

        <div class="row-fluid">
            <div class="span12">

                <div class="widget-box">
                    <div class="widget-title"><span class="icon"> <i class="icon-search"></i> </span>
                        <h5>筛选查询</h5>
                    </div>
                    <div class="widget-content">
                        <form action="{{URL::action('Admin\BreakRuleController@list')}}" method="get" class="form-search">
                            <div class="control-group">
                                <div class="inline-block w10">
                                    <div class="inline-block">
                                        <label>车辆牌照:</label>
                                        <input class="w6" type="text" id="lpn" name="lpn" value="{{Request::input('lpn')}}" >
                                    </div>
                                    <div class="inline-block">
                                        <label>车主姓名:</label>
                                        <input class="w6" type="text" id="car_username" name="car_username" value="{{Request::input('car_username')}}" >
                                    </div>
                                    <div class="inline-block">
                                        <label>车主手机号:</label>
                                        <input class="w6" type="text" id="car_phone" name="car_phone" value="{{Request::input('car_phone')}}" >
                                    </div>
                                    <div class="inline-block">
                                        <label>违章类型</label>
                                        <select class="w35" name="violation_type">
                                            <option value="">全部</option>
                                            @foreach(\App\Models\BiBreakRule::getViolationTypeMap() as $k => $v)
                                                <option @if(Request::input('violation_type') == $k) selected @endif value="{{$k}}">{{$v}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="inline-block w5">
                                        <label>选择时间段</label>
                                        <input class="w7 date" type="text" id="daterange" name="daterange" value="{{Request::input('daterange')}}" >
                                    </div>


                                    <input type="submit" class="btn btn-success search" value="查询">

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
                                <th>车辆牌照</th>
                                <th>车主姓名</th>
                                <th>车主手机号</th>
                                <th>车辆厂家</th>
                                <th>违章类型</th>
                                <th>违章时间</th>
                                <th>违章位置</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php /**@var \App\Models\BiBreakRule $data*/ ?>
                                @foreach($datas as $data)
                                    <tr class="gradeX">
                                        <td>{{$data->lpn}}</td>
                                        <td>{{$data->car_username}}</td>
                                        <td>{{$data->car_phone}}</td>
                                        <td>{{$data->car_factory}}</td>
                                        <td>{{\App\Models\BiBreakRule::getViolationTypeMap($data->violation_type)}}</td>
                                        <td>{{$data->violation_time}}</td>
                                        <td>{{$data->violation_location}}</td>
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
        var daterange = $(".date");
        window.gDatepicker.datetimeRangePicker(daterange,'{{$start}}','{{$end}}');
        @if(!Request::input('daterange'))
            daterange.val('');
        @endif
    </script>

    @include('admin.common_submitjs')

@endsection