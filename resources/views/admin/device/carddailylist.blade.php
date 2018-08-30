@extends('admin.layout')
@section('content')

    <div class="container-fluid">
        <hr>

        <div class="row-fluid margintop">
            <form class="form-search">
                <input type="hidden" name="imei" value="{{Request::input('msisdn')}}">
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
                        <h5>{{$msisdn}}的明细，设备码:{{$udid}}</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>日期</th>
                                <th>日流量</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php /* @var \App\Models\BiCardDatum $data */ ?>
                            @foreach($datas as $data)
                                <tr class="gradeX">
                                    <td>{{$data->date}}</td>
                                    <td>{{$data->data_usage}}</td>
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