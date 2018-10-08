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
                                <th>电池序列号</th>
                                <th>剩余容量百分比</th>
                                <th>电池电压</th>
                                <th>电池包温度1</th>
                                <th>电池包温度2</th>
                                <th>电池包电流</th>
                                <th>电池包后备时间</th>
                                <th>循环次数</th>
                                <th>SOH</th>
                                <th>充电状态</th>
                                <th>电池状态</th>
                                <th>故障状态</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($datas as $data)
                                <tr class="gradeX">
                                    <td>{{$data->udid}}</td>
                                    <td>{{$data->datetime}}</td>
                                    <td>{{$data->batt_rom_ver_485}}</td>
                                    <td>{{$data->batt_hd_ver_485}}</td>
                                    <td>{{$data->batt_id_485}}</td>
                                    <td>{{$data->batt_dump_energy_per_485}}</td>
                                    <td>{{$data->batt_voltage_485}}</td>
                                    <td>{{$data->batt_temprature1_485}}</td>
                                    <td>{{$data->batt_temprature2_485}}</td>
                                    <td>{{$data->batt_cur_485}}</td>
                                    <td>{{$data->batt_save_time_485}}</td>
                                    <td>{{$data->batt_cycle_times_485}}</td>
                                    <td>{{$data->batt_soh_485}}</td>
                                    <td>{{$data->batt_charge_status_485_trans}}</td>
                                    <td>{{$data->batt_batt_status_485_trans}}</td>
                                    <td>{{$data->batt_ioput_status_485_trans}}</td>
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