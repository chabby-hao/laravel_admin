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
                        <form action="" method="get" class="form-search search_form">
                            <div class="control-group">
                                <div class="inline-block w10">
                                    <input class="w15 margintop" type="text" id="id" name="id" value="{{Request::input('id')}}" placeholder="设备号/IMEI/IMSI/手机号/卡号">
                                    <input class="w1 margintop" type="text" name="rom" value="{{Request::input('rom')}}" placeholder="MTK版本号(rom版本号)">
                                    <input class="w1 margintop" type="text" name="mcu" value="{{Request::input('mcu')}}" placeholder="MCU版本号">
                                    {{--<select class="w1 margintop" name="attach">--}}
                                        {{--<option value="">请选择在线状态</option>--}}
                                        {{--@foreach(\App\Objects\DeviceObject::getOnlineOfflineTypeMap() as $k => $v)--}}
                                            {{--<option @if(is_numeric(Request::input('attach')) && Request::input('attach') == $k) selected @endif value="{{$k}}">{{$v}}</option>--}}
                                        {{--@endforeach--}}
                                    {{--</select>--}}
                                    {{--<select class="w1 margintop" name="active">--}}
                                        {{--<option value="">请选择是否激活</option>--}}
                                        {{--@foreach(\App\Objects\DeviceObject::getActiveTypeMap() as $k => $v)--}}
                                            {{--<option @if(is_numeric(Request::input('active')) && Request::input('active') == $k) selected @endif value="{{$k}}">{{$v}}</option>--}}
                                        {{--@endforeach--}}
                                    {{--</select>--}}
                                    {{--<br/>--}}
                                    {{--<select class="w1 margintop" name="device_type">--}}
                                        {{--<option value="">请选择型号</option>--}}
                                        {{--@foreach(\App\Models\BiDeviceType::getNameMap() as $k => $v)--}}
                                            {{--<option @if(Request::input('device_type') == $k) selected @endif value="{{$k}}">{{$v}}</option>--}}
                                        {{--@endforeach--}}
                                    {{--</select>--}}
                                    @if(Auth::user()->user_type == \App\Models\BiUser::USER_TYPE_ALL)
                                        <select class="w1 margintop" name="channel_id">
                                            <option value="">请选择渠道</option>
                                            @foreach(\App\Models\BiChannel::getChannelMap() as $k => $v)
                                                <option @if(Request::input('channel_id') == $k) selected @endif value="{{$k}}">{{$v}}</option>
                                            @endforeach
                                        </select>
                                        {{--<select class="w1 margintop" name="customer_id">--}}
                                            {{--<option value="">--}}
                                                {{--请选择客户--}}
                                            {{--</option>--}}
                                        {{--</select>--}}
                                        {{--<select class="w1 margintop" name="scene_id">--}}
                                            {{--<option value="">--}}
                                                {{--请选择场景--}}
                                            {{--</option>--}}
                                        {{--</select>--}}
                                        {{--<br/>--}}
                                        {{--<select class="w1 margintop" name="brand_id">--}}
                                            {{--<option value="">请选择品牌</option>--}}
                                            {{--@foreach(\App\Models\BiBrand::getBrandMap() as $k => $v)--}}
                                                {{--<option @if(Request::input('brand_id') == $k) selected @endif value="{{$k}}">{{$v}}</option>--}}
                                            {{--@endforeach--}}
                                        {{--</select>--}}
                                        {{--<select class="w1 margintop" name="ebike_type_id">--}}
                                            {{--<option value="">--}}
                                                {{--请选择车型--}}
                                            {{--</option>--}}
                                        {{--</select>--}}
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
                        <span class="top-pager">{!! $page_nav !!}</span>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>序号</th>
                                <th>卡来源</th>
                                <th>物联卡号</th>
                                <th>卡状态</th>
                                <th>运营商</th>
                                <th>套餐</th>
                                <th>当日流量MB</th>
                                <th>当月流量MB</th>
                                <th>超出流量MB</th>
                                <th>激活日期</th>
                                <th>计费结束日期</th>
                                <th>测试期起始日期</th>
                                <th>沉默期起始日期</th>
                                <th>出库日期</th>
                                <th>测试期流量</th>
                                <th>设备号</th>
                                <th>IMSI</th>
                                <th>平台状态</th>
                                <th>平台出货日期</th>
                                <th>平台激活日期</th>
                                <th>平台计费日期</th>
                                <th>上次在线时间</th>
                                <th>渠道</th>
                                <th>固件版本</th>
                                <th>MCU版本</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php /* @var \App\Models\BiCardLiangxun $data */ ?>
                            <?php $t = 0; ?>
                            @foreach($datas as $data)
                                <tr class="gradeX">
                                    <td>{{++$t}}</td>
                                    <td>量讯</td>
                                    <td>{{$data->msisdn}}</td>
                                    <td>{{\App\Models\BiCardLiangxun::getAccountStatusMap($data->account_status)}}</td>
                                    <td>{{$data->carrier}}</td>
                                    <td>{{$data->data_plan}}</td>
                                    <td>{{$data->current_date_usage}}</td>
                                    <td>{{$data->data_usage}}</td>
                                    <td>{{$data->data_usage-$data->data_plan > 0 ?: 0}}</td>
                                    <td>{{$data->active_date}}</td>
                                    <td>{{$data->expiry_date}}</td>
                                    <td>{{$data->test_valid_date}}</td>
                                    <td>{{$data->silent_valid_date}}</td>
                                    <td>{{$data->outbound_date}}</td>
                                    <td>{{$data->test_used_data_usage}}</td>
                                    <td>{{$data->udid}}</td>
                                    <td>{{$data->imsi}}</td>
                                    <?php $paymentInfo = \App\Logics\DeviceLogic::getPaymentInfoByUdid($data->udid); ?>
                                    <td>{{$paymentInfo['service_status']}}</td>
                                    <td>{{\App\Logics\DeviceLogic::getDeliverdAtByUdid($data->udid)}}</td>
                                    <td>{{\App\Logics\DeviceLogic::getActiveAtByUdid($data->udid)}}</td>
                                    <td>{{$paymentInfo['daterange']}}</td>
                                    <td>{{\App\Logics\DeviceLogic::getLastContact($data->imei)}}</td>
                                    <td>{{\App\Logics\DeviceLogic::getChannelNameByUdid($data->udid)}}</td>
                                    <td>{{$data->rom}}</td>
                                    <td>{{$data->mcu}}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{URL::action('Admin\DeviceController@detail',['id'=>$data->udid])}}">明细</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="pager">
                        {!! $page_nav !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.common_channel_customer_scenejs')
    @include('admin.common_brand_ebikejs');

    <script>

        $(function () {


        })

    </script>

    @include('admin.common_submitjs')

@endsection