@extends('admin.layout')
@section('content')

    <div class="container-fluid">
        <hr>

        <div class="row-fluid">
            <div class="span12">

                {{--<div class="widget-box">
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
                                        <select class="w1 margintop" name="customer_id">
                                            <option value="">
                                                请选择客户
                                            </option>
                                        </select>
                                        <select class="w1 margintop" name="scene_id">
                                            <option value="">
                                                请选择场景
                                            </option>
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
                                                <option @if(is_numeric(Request::input('attach')) && Request::input('attach') == $k) selected @endif value="{{$k}}">{{$v}}</option>
                                            @endforeach
                                        </select>
                                        <select class="w1 margintop" name="active">
                                            <option value="">请选择是否激活</option>
                                            @foreach(\App\Objects\DeviceObject::getActiveTypeMap() as $k => $v)
                                                <option @if(is_numeric(Request::input('active')) && Request::input('active') == $k) selected @endif value="{{$k}}">{{$v}}</option>
                                            @endforeach
                                        </select>
                                    @endif

                                    <input type="submit" class="btn btn-success margintop search" value="查询">

                                </div>

                            </div>

                        </form>
                    </div>
                </div>--}}

                <div class="widget-box">
                    <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
                        <h5>列表</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                myhtml(item.find(".Ctype"),'核心板:' + row['Ctype']);
                                myhtml(item.find(".Cver"),'核心板版本:' + row['Cver']);
                                myhtml(item.find(".IMEI"),'imei:' + row['IMEI']);
                                myhtml(item.find(".BBCon"),'底板通信:' + row['BBCon']);
                                myhtml(item.find(".Gsen"),'加速度传感器:' + row['Gsen']);
                                myhtml(item.find(".BTMac"),'蓝牙MAC:' + row['BTMac']);
                                myhtml(item.find(".BTkey"),'蓝牙key:' + row['BTkey']);
                                myhtml(item.find(".GPSSt"),'GPS定位:' + row['GPSSt']);
                                myhtml(item.find(".GPRSSt"),'GPRS连接:' + row['GPRSSt']);
                                myhtml(item.find(".Btype"),'底板:' + row['Btype']);
                                myhtml(item.find(".Bver"),'底板版本:' + row['Bver']);
                                myhtml(item.find(".BTStat"),'蓝牙状态:' + row['BTStat']);
                                myhtml(item.find(".I2C"),'I2C状态:' + row['I2C']);
                                myhtml(item.find(".OWCin"), '一线通输入:' + row['OWCin']);
                                myhtml(item.find(".OWCout"),'一线通输出:' + row['OWCout']);
                                myhtml(item.find(".Lock"),'锁车信号:' + row['Lock']);
                                myhtml(item.find(".Volt"),'电压:' + row['Volt']/10 + 'v');
                                myhtml(item.find(".Online"),'在位状态:' + row['Online']);
                                myhtml(item.find(".Odomte"),'里程:' + row['Odomte']);
                                myhtml(item.find(".SPEED"),'速度:' + row['SPEED']);
                                myhtml(item.find(".DGPS"),'GPS卫星:' + row['DGPS']);
                                myhtml(item.find(".DGSM"),'GSM基站:' + row['DGSM']);
                                myhtml(item.find(".Imsi"),'Imsi:' + row['imsi']);
                                myhtml(item.find(".PowGate"),'电门状态:' + row['PowGate']);
                            </tr>
                            </thead>
                            <tbody>
                            <?php /* @var \App\Models\TDeviceCode $data */ ?>
                            <?php $t = 0; ?>
                            @foreach($datas as $data)
                                <tr class="gradeX">
                                    <td>{{++$t}}</td>
                                    <td>{{$data->rom}}</td>
                                    <td>{{$data->mcu}}</td>
                                    <td><a href="{{URL::action('Admin\DeviceController@list',['rom'=>$data->rom,'mcu'=>$data->mcu])}}">{{$data->total}}</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @include('admin.common_channel_customer_scenejs')
    @include('admin.common_brand_ebikejs')

    <script>

    </script>

@endsection