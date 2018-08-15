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
                                <th>订单号</th>
                                <th>数量</th>
                                <th>型号</th>
                                <th>出货日期</th>
                                <th>渠道</th>
                                <th>客户</th>
                                <th>场景</th>
                                <th>品牌</th>
                                <th>车型</th>
                                <th>账号</th>
                                <th>状态</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php /** @var \App\Models\BiDeliveryOrder $data */ ?>
                            @foreach($datas as $data)
                                <tr class="gradeX">
                                    <td>{{$data->ship_no}}</td>
                                    <td>{{$data->order_no}}</td>
                                    <td>{{$data->delivery_quantity}}</td>
                                    <td>{{$data->device_type_name}}</td>
                                    <td>{{$data->delivery_date}}</td>
                                    <td>{{$data->channel_name}}</td>
                                    <td>{{$data->customer_name}}</td>
                                    <td>{{$data->scene_name}}</td>
                                    <td>{{$data->brand_name}}</td>
                                    <td>{{$data->ebike_type_name}}</td>
                                    <td>{{$data->username}}</td>
                                    <td>{{\App\Models\BiDeliveryOrder::getStateTypeName($data->state)}}</td>
                                    <td>
                                        @if($data->state == \App\Models\BiDeliveryOrder::DELIVERY_ORDER_STATE_INIT)
                                            <a class="btn btn-danger del" data-id="{{$data->id}}">作废</a>
                                            <a class="btn btn-warning" href="{{\Illuminate\Support\Facades\URL::action('Admin\DeliveryController@edit', ['id'=>$data->id])}}">修改</a>
                                        @elseif($data->state == \App\Models\BiDeliveryOrder::DELIVERY_ORDER_STATE_FINISH)
                                            <a class="btn btn-primary" href="{{\Illuminate\Support\Facades\URL::action('Admin\DeliveryController@listDevice', ['delivery_order_id'=>$data->id])}}">设备详情</a>
                                        @endif
                                    </td>
                                    <!--                                        <td>-->
                                    <!--                                            <a href="" class="btn btn-info">设置</a>-->
                                    <!--<!--                                            <a href="javascript:;" class="btn btn-danger del">删除</a>-->
                                    <!--                                        </td>-->
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