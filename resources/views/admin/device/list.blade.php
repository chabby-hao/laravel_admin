@extends('admin.layout')
@section('content')

    <div class="container-fluid">
        <hr>
        {{--设备状态tab--}}

        <div class="btn-group">
            <div>
                @foreach($deviceCycleMap as $key => $row)
                    <a href="{{URL::action('Admin\DeviceController@list', ['status'=>$key])}}" data-key="{{$key}}" class="btn marginright">{{$row}}</a>
                @endforeach
            </div>
            <div class="margintop">
                @foreach($deviceStatusMap as $key => $row)
                    <a href="{{URL::action('Admin\DeviceController@list', ['status'=>$key])}}" data-key="{{$key}}" class="btn marginright margintop">{{$row}}</a>
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
                        <form id="myform" action="{{URL::action('Admin\DeviceController@list')}}" method="get" class="form-search">
                            @if(Request::input('status'))
                                <input type="hidden" name="status" value="{{Request::input('status')}}">
                            @endif
                            <div class="control-group">
                                <div class="inline-block">
                                    <label>输入搜索：</label>
                                </div>
                                <div class="inline-block w8">
                                    <input class="w2" type="text" id="id" name="id" value="{{Request::input('id')}}" placeholder="设备号/IMEI/IMSI">
                                    <select class="w15" name="device_type">
                                        <option value="">请选择型号</option>
                                        @foreach(\App\Models\BiDeviceType::getNameMap() as $k => $v)
                                            <option @if(Request::input('device_type') == $k) selected @endif value="{{$k}}">{{$v}}</option>
                                        @endforeach
                                    </select>
                                    @if(Auth::user()->user_type == \App\Models\BiUser::USER_TYPE_ALL)
                                        <select class="w15" name="channel_id">
                                            <option value="">请选择渠道</option>
                                            @foreach(\App\Models\BiChannel::getChannelMap() as $k => $v)
                                                <option @if(Request::input('channel_id') == $k) selected @endif value="{{$k}}">{{$v}}</option>
                                            @endforeach
                                        </select>
                                        <select class="w15" name="brand_id">
                                            <option value="">请选择品牌</option>
                                            @foreach(\App\Models\BiBrand::getBrandMap() as $k => $v)
                                                <option @if(Request::input('brand_id') == $k) selected @endif value="{{$k}}">{{$v}}</option>
                                            @endforeach
                                        </select>
                                        <select class="w15" name="ebike_type_id">
                                            <option @if(Request::input('ebike_type_id') == $k) selected @endif value="">
                                                请选择车型
                                            </option>
                                        </select>
                                    @endif
                                    <input type="submit" id="mysubmit" class="btn btn-info" value="查询">
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
                                    <td>{{$data->ebikeStatus}}</td>
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

    @include('admin.common_brand_ebikejs');
    {{--    @include('admin.common_submitjs')--}}

@endsection