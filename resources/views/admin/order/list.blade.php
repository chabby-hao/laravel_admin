@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <hr>

        <div class="row-fluid">
            <span class="pull-right"><a href="<?php echo \Illuminate\Support\Facades\URL::action('Admin\OrderController@add'); ?>" class="btn btn-success">新增订单</a></span>
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
                                <th>订单号</th>
                                <th>订单数量</th>
                                <th>期望交货</th>
                                <th>出货数量</th>
                                <th>型号</th>
                                <th>渠道</th>
                                <th>账号</th>
                                <th>售后订单</th>
                                <th>状态</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php /** @var \App\Models\BiOrder $data */ ?>
                            @foreach($datas as $data)
                                <tr class="gradeX">
                                    <td>{{$data->order_no}}</td>
                                    <td>{{$data->order_quantity}}</td>
                                    <td>{{$data->expect_delivery}}</td>
                                    <td>{{$data->actuall_quantity}}</td>
                                    <td>{{$data->name}}</td>
                                    <td>{{\App\Models\BiChannel::getChannelMap()[$data->channel_id]}}</td>
                                    <td>{{$data->username}}</td>
                                    <td>{{\App\Models\BiOrder::getAfterSaleTypeName($data->after_sale)}}</td>
                                    <td>{{\App\Models\BiOrder::getStateTypeName($data->state)}}</td>
                                    <td>
                                        @if($data->state == \App\Models\BiOrder::ORDER_STATE_INIT)
                                            @if($data->ship_quantity == 0)
                                                <a class="btn btn-danger del" data-id="{{$data->id}}">作废</a>
                                            @else
                                                <a class="btn btn-primary" href="{{\Illuminate\Support\Facades\URL::action('Admin\DeliveryController@list', ['order_id'=>$data->id])}}">出货详情</a>
                                            @endif
                                            <a class="btn btn-warning" href="{{\Illuminate\Support\Facades\URL::action('Admin\OrderController@edit', ['id'=>$data->id])}}">修改</a>
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
        $(".del").click(function(){
            var btn = $(this);
            var id = btn.attr('data-id');
            if(confirm('确认作废吗？')){
                $.ajax({
                    url:'{{URL::action('Admin\OrderController@delete')}}',
                    method:'post',
                    data:{id:id},
                    success:function(data){
                        if(ajax_check_res(data)){
                            location.reload();
                        }
                    }
                })
            }
        });
    </script>

    {{--@include('admin.common_deletejs',['url'=>URL::action('Admin\OrderController@delete')])--}}
@endsection