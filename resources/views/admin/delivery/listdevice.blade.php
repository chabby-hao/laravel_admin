@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <hr>

        <div class="row-fluid">
            <span class="pull-right"><a href="<?php echo \Illuminate\Support\Facades\URL::action('Admin\DeliveryController@add'); ?>" class="btn btn-success">新增出货单</a></span>
        </div>

        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
                        <h5>列表</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>出货单</th>
                                <th>交货日期</th>
                                <th>设备号</th>
                                <th>IMEI</th>
                                <th>IMSI</th>
                                <th>型号</th>
                                <th>渠道</th>
                                <th>品牌</th>
                                <th>车型</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php /** @var \App\Models\BiDeliveryOrder $data */ ?>
                            @foreach($datas as $data)
                                <tr class="gradeX">
                                    <td>{{$data->ship_no}}</td>
                                    <td>{{$data->actuall_date}}</td>
                                    <td>{{$data->udid}}</td>
                                    <td>{{$data->imei}}</td>
                                    <td>{{$data->imsi}}</td>
                                    <td>{{$data->device_type_name}}</td>
                                    <td>{{$data->channel_name}}</td>
                                    <td>{{$data->brand_name}}</td>
                                    <td>{{$data->ebike_type_name}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="pager">
                        <?php echo $page_nav; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(".del").click(function () {
            var btn = $(this);
            var id = btn.attr('data-id');
            if (confirm('确认作废吗？')) {
                $.ajax({
                    url: '{{URL::action('Admin\DeliveryController@delete')}}',
                    method: 'post',
                    data: {id: id},
                    success: function (data) {
                        if (ajax_check_res(data)) {
                            location.reload();
                        }
                    }
                })
            }
        });
    </script>

    {{--@include('admin.common_deletejs',['url'=>URL::action('Admin\OrderController@delete')])--}}
@endsection