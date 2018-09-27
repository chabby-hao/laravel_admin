@extends('admin.layout')
@section('content')

    <div class="container-fluid">
        <hr>

        <div class="row-fluid margintop">
            <form class="form-search">
                <input type="hidden" name="imei" value="{{Request::input('imei')}}">
                <div class="control-group">
                    <div class="inline-block w300">
                        <label for="">时间范围</label>
                        <div>
                            <input name="daterange" value="" class="w10 date" type="text">
                        </div>
                    </div>

                    <div class="inline-block">
                        <div><input class="btn btn-info" type="submit" value="查询"></div>
                    </div>
                </div>
            </form>
        </div>

        <div class="row-fluid">
            <div class="span12">

                <div class="widget-box">
                    <div class="widget-title"><span class="icon"><i class="icon-time"></i></span>
                        <h5>{{$udid}}的状态</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>设备号</th>
                                <th>上报时间</th>
                                <th>电池包固件版本号</th>
                                <th>电池包硬件版本号</th>
                                {{--<th>电池ID</th>--}}
                                {{--<th>电池电量(单位:%)</th>--}}
                                {{--<th>电池电压(单位:mV)</th>--}}
                                {{--<th>电芯温度(单位:0.001℃)</th>--}}
                                {{--<th>充放电循环次数</th>--}}
                                {{--<th>充放电电流</th>--}}
                                {{--<th>PCB温度(单位:0.001℃)</th>--}}
                                {{--<th>电池健康状态</th>--}}
                                {{--<th>充电器</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($datas as $data)
                                <tr class="gradeX">
                                    <td>{{$data->udid}}</td>
                                    <td>{{$data->create_time}}</td>
                                    <td>{{$data->batt_rom_ver_485}}</td>
                                    <td>{{$data->batt_hd_ver_485}}</td>
                                    {{--<td>{{$data->battery_id}}</td>--}}
                                    {{--<td>{{$data->battery_level}}</td>--}}
                                    {{--<td>{{$data->battery_voltage}}</td>--}}
                                    {{--<td>{{$data->core_temperature}}</td>--}}
                                    {{--<td>{{$data->battery_cycle_times}}</td>--}}
                                    {{--<td>{{$data->battery_io_current}}</td>--}}
                                    {{--<td>{{$data->pcb_temperature}}</td>--}}
                                    {{--<td>{{$data->battery_health_state}}</td>--}}
                                    {{--<td>{{$data->abk_battery_lock_status}}</td>--}}
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

    {{--    @include('admin.common_submitjs')--}}

@endsection