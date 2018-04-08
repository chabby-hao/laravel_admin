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
                                <th>设备ID</th>
                                <th>设备型号</th>
                                <th>渠道</th>
                                <th>车辆品牌</th>
                                <th>车辆型号</th>
                                <th>激活时间</th>
                                <th>设备周期</th>
                                <th>设备状态</th>
                                <th>状态上报时间</th>
                                <th>设备位置</th>
                                <th>位置上报时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php /* @var \App\Objects\DeviceObject $data  */ ?>
                            @foreach($datas as $data)
                                <tr class="gradeX">
                                    <td>{{$data->udid}}</td>
                                    <td>{{$data->deviceTypeName}}</td>
                                    <td>{{$data->channelName}}</td>
                                    <td>{{$data->brandName}}</td>
                                    <td>{{$data->ebikeTypeName}}</td>
                                    <td>{{$data->activeAt}}</td>
                                    <td></td>
                                    <td>{{$data->isOnline ? $data->turnonTrans : $data->isOnlineTrans}}</td>
                                    <td>{{$data->lastContact}}</td>
                                    <td>{{$data->address}}</td>
                                    <td>{{$data->lastGps}}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{URL::action('Admin\DeviceController@detail')}}">详情</a>
                                    </td>
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
@endsection