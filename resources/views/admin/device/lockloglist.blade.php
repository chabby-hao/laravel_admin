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
                    <div class="widget-title"><span class="icon"><i class="icon-unlock"></i></span>
                        <h5>{{$udid}}的锁车记录</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>操作时间</th>
                                <th>操作类型</th>
                                <th>锁车类型</th>
                                <th>操作人</th>
                                <th>操作来源</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php /** @var \App\Models\TLockLog $data */ ?>
                            @foreach($datas as $data)
                                <tr class="gradeX">
                                    <td>{{$data->add_time}}</td>
                                    <td>{{$data->act_trans}}</td>
                                    <td>{{$data->lock_type_trans}}</td>
                                    <td>{{$data->user}}</td>
                                    <td>{{$data->from}}</td>
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