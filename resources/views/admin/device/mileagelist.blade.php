@extends('admin.layout')
@section('content')

    <div class="container-fluid">
        <hr>
        {{--设备状态tab--}}

        <div class="btn-group">
            <div>
                @foreach(\App\Logics\MileageLogic::getMileMap() as $key => $row)
                    <a href="{{URL::action('Admin\DeviceController@mileageList', ['type'=>$key])}}" data-key="{{$key}}" class="btn marginright @if(Request::input('type') == $key) btn-success @endif">{{$row}}</a>
                @endforeach
            </div>
        </div>


        <div class="row-fluid">
            <div class="span12">

                <div class="widget-box">
                    <div class="widget-title"><span class="icon"> <i class="icon-search"></i> </span>
                        <h5>筛选查询</h5>
                    </div>
                    <div class="widget-content">
                        <form id="myform" method="get" class="form-search">
                            @if(Request::input('type'))
                                <input type="hidden" name="status" value="{{Request::input('type')}}">
                            @endif
                            <div class="control-group">
                                <div class="inline-block">
                                    <label>输入搜索：</label>
                                </div>
                                <div class="inline-block w8">
                                    <input class="w2" type="text" id="id" name="id" value="{{Request::input('id')}}" placeholder="设备号/IMEI/IMSI">
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

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
                            <?php /* @var \App\Objects\DeviceObject $data */ ?>
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
                                        <a class="btn btn-info" href="{{URL::action('Admin\DeviceController@detail',['id'=>$data->udid])}}">详情</a>
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

        @include('admin.common_submitjs')

@endsection