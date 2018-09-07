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
                                <th>核心板</th>
                                <th>核心板版本</th>
                                <th>imei</th>
                                <th>底板通信</th>
                                <th>加速度传感器</th>
                                <th>蓝牙MAC</th>
                                <th>蓝牙key</th>
                                <th>GPS定位</th>
                                <th>GPRS连接</th>
                                <th>底板</th>
                                <th>底板版本</th>
                                <th>蓝牙状态</th>
                                <th>I2C状态</th>
                                <th>一线通输入</th>
                                <th>一线通输出</th>
                                <th>锁车信号</th>
                                <th>电压</th>
                                <th>在位状态</th>
                                <th>里程</th>
                                <th>速度</th>
                                <th>GPS卫星</th>
                                <th>GSM基站</th>
                                <th>Imsi</th>
                                <th>电门状态</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $t = 0; ?>
                            @foreach($datas as $row)
                                <tr class="gradeX">
                                    <td>{{$row['Ctype']}};         </td>
                                    <td>{{$row['Cver']}};          </td>
                                    <td>{{$row['IMEI']}};          </td>
                                    <td>{{$row['BBCon']}};         </td>
                                    <td>{{$row['Gsen']}};          </td>
                                    <td>{{$row['BTMac']}};         </td>
                                    <td>{{$row['BTkey']}};         </td>
                                    <td>{{$row['GPSSt']}};         </td>
                                    <td>{{$row['GPRSSt']}};        </td>
                                    <td>{{$row['Btype']}};         </td>
                                    <td>{{$row['Bver']}};          </td>
                                    <td>{{$row['BTStat']}};        </td>
                                    <td>{{$row['I2C']}};           </td>
                                    <td>{{$row['OWCin']}};         </td>
                                    <td>{{$row['OWCout']}};        </td>
                                    <td>{{$row['Lock']}};          </td>
                                    <td>{{$row['Volt']/10}}v; </td>
                                    <td>{{$row['Online']}};        </td>
                                    <td>{{$row['Odomte']}};        </td>
                                    <td>{{$row['SPEED']}};         </td>
                                    <td>{{$row['DGPS']}};          </td>
                                    <td>{{$row['DGSM']}};          </td>
                                    <td>{{$row['imsi']}};          </td>
                                    <td>{{$row['PowGate']}};</td>
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