@extends('admin.layout')
@section('content')

    <div class="container-fluid">
        <hr>

        <div class="row-fluid margintop">
            <form class="form-search">
                <input type="hidden" name="imei" value="{{Request::input('id')}}">
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
                        <h5>{{$msisdn}}的明细</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>上报时间</th>
                                <th>电门状态</th>
                                <th>锁车状态</th>
                                <th>电瓶电压</th>
                                <th>仪表电量</th>
                                <th>备用电池</th>
                                <th>电瓶是否在位</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($datas as $data)
                                <tr class="gradeX">
                                    <td>{{$data->datetime}}</td>
                                    <td>{{$data->ev_key_trans}}</td>
                                    <td>{{$data->ev_lock_trans}}</td>
                                    <td>{{$data->voltage}}</td>
                                    <td>{{$data->percent}}</td>
                                    <td>{{$data->battery}}</td>
                                    <td>{{$data->usb_trans}}</td>
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
        window.gDatepicker.dateRangePicker($(".date"),'{{$start}}','{{$end}}');
    </script>

    {{--    @include('admin.common_submitjs')--}}

@endsection