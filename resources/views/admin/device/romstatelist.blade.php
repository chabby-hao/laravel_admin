@extends('admin.layout')
@section('content')

    <div class="container-fluid">
        <hr>

        <div class="row-fluid">
            <div class="span12">

                <div class="widget-box">
                    <div class="widget-title"><span class="icon"> <i class="icon-search"></i> </span>
                        <h5>筛选查询</h5>
                    </div>
                    <div class="widget-content">
                        <form method="get" class="form-search">
                            @if(Request::input('status'))
                                <input type="hidden" name="status" value="{{Request::input('status')}}">
                            @endif
                            <div class="control-group">
                                <div class="inline-block w10">
                                    <input class="w15 margintop" type="text" id="id" name="id" value="{{Request::input('id')}}" placeholder="设备号/IMEI/IMSI/手机号">
                                    <select class="w1 margintop" name="device_type">
                                        <option value="">请选择型号</option>
                                        @foreach(\App\Models\BiDeviceType::getNameMap() as $k => $v)
                                            <option @if(Request::input('device_type') == $k) selected @endif value="{{$k}}">{{$v}}</option>
                                        @endforeach
                                    </select>
                                    @if(Auth::user()->user_type == \App\Models\BiUser::USER_TYPE_ALL)
                                        <select class="w1 margintop" name="channel_id">
                                            <option value="">请选择渠道</option>
                                            @foreach(\App\Models\BiChannel::getChannelMap() as $k => $v)
                                                <option @if(Request::input('channel_id') == $k) selected @endif value="{{$k}}">{{$v}}</option>
                                            @endforeach
                                        </select>
                                        <select class="w1 margintop" name="brand_id">
                                            <option value="">请选择品牌</option>
                                            @foreach(\App\Models\BiBrand::getBrandMap() as $k => $v)
                                                <option @if(Request::input('brand_id') == $k) selected @endif value="{{$k}}">{{$v}}</option>
                                            @endforeach
                                        </select>
                                        <select class="w1 margintop" name="ebike_type_id">
                                            <option value="">
                                                请选择车型
                                            </option>
                                        </select>
                                        <select class="w1 margintop" name="attach">
                                            <option value="">请选择在线状态</option>
                                            @foreach(\App\Objects\DeviceObject::getOnlineOfflineTypeMap() as $k => $v)
                                                <option @if(Request::input('attach') == $k) selected @endif value="{{$k}}">{{$v}}</option>
                                            @endforeach
                                        </select>
                                    @endif

                                    <input type="submit" class="btn btn-success margintop search" value="查询">

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
                                <th>序号</th>
                                <th>rom</th>
                                <th>mcu</th>
                                <th>数量</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php /* @var \App\Models\TDeviceCode $data */ ?>
                            <?php $t = 0; ?>
                            @foreach($datas as $data)
                                <tr class="gradeX">
                                    <td>{{++$t}}</td>
                                    <td>{{$data->rom}}</td>
                                    <td>{{$data->ver}}</td>
                                    <td>{{$data->total}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @include('admin.common_brand_ebikejs');

    <script>

    </script>

    @include('admin.common_submitjs')

@endsection