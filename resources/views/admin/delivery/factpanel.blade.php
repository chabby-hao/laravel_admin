@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <hr>

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
                                <th>出货单号</th>
                                <th>数量</th>
                                <th>型号</th>
                                <th>料号</th>
                                <th>要求出货日期</th>
                                <th>实际出货日期</th>
                                <th>状态</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php /** @var \App\Models\BiDeliveryOrder $data */ ?>
                            @foreach($datas as $data)
                                <tr class="gradeX">
                                    <td>{{$data->ship_no}}</td>
                                    <td>{{$data->delivery_quantity}}</td>
                                    <td>{{$data->device_type_name}}</td>
                                    <td>{{$data->part_number}}</td>
                                    <td>{{$data->delivery_date}}</td>
                                    <td>{{$data->actuall_date}}</td>
                                    <td>{{\App\Models\BiDeliveryOrder::getStateTypeName($data->state)}}</td>
                                    <td>
                                        @if($data->state == \App\Models\BiDeliveryOrder::DELIVERY_ORDER_STATE_INIT)
                                            <a class="btn btn-warning" href="{{\Illuminate\Support\Facades\URL::action('Admin\DeliveryController@shipmentProcess', ['id'=>$data->id])}}">开始处理</a>
                                        @endif
                                    </td>
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
    </script>
@endsection