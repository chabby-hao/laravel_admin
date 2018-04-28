@extends('admin.layout')
@section('content')

    <div class="container-fluid">
        <hr>
        {{--设备状态tab--}}

        <div class="row-fluid">
            <div>
                @foreach($deviceCycleMap as $key => $row)
                    <a href="{{URL::action('Admin\DeviceController@list', ['status'=>$key])}}" data-key="{{$key}}" class="btn marginright margintop @if(  Request::input('status') == $key && ( is_numeric(Request::input('status')) || !Request::has('status') )) btn-success @endif">{{$row}}</a>
                @endforeach
            </div>
            <div>
                @foreach($deviceStatusMap as $key => $row)
                    <a href="{{URL::action('Admin\DeviceController@list', ['status'=>$key])}}" data-key="{{$key}}" class="btn marginright margintop @if(Request::input('status') === $key) btn-success @endif">{{$row}}</a>
                @endforeach
            </div>
        </div>


        <div class="row-fluid">
            <div class="span12">

                <div class="widget-box">
                    <div class="widget-title"><span class="icon"> <i class="icon-search"></i> </span>
                        <h5>筛选查询</h5>
                        @if(Auth::user()->can('device/importCity'))
                            <form id="myform" method="post" enctype="multipart/form-data" action="{{URL::action('Admin\DeviceController@importCity')}}" class="form-search">
                                <span class="pull-right"><input type="file" name="myfile"/></span>
                                <span class="pull-right"><a class="btn btn-info" href="{{asset('demo/importcity.xlsx')}}">导入示例</a></span>
                            </form>
                        @endif
                    </div>
                    <div class="widget-content">
                        <form action="{{URL::action('Admin\DeviceController@list')}}" method="get" class="form-search">
                            @if(Request::input('status'))
                                <input type="hidden" name="status" value="{{Request::input('status')}}">
                            @endif
                            <div class="control-group">
                                <div class="inline-block w10">
                                    <input class="w15 margintop" type="text" id="id" name="id" value="{{Request::input('id')}}" placeholder="设备号/IMEI/IMSI">
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
                                    @endif

                                    @if(Auth::user()->can('device/importCity'))
                                        <select name="province" class="w1 margintop">
                                            <option value="">请选择省份</option>
                                            @foreach($provinceList as $province)
                                                <option @if(Request::input('province') == $province) selected @endif value="{{$province}}">{{$province}}</option>
                                            @endforeach
                                        </select>

                                        <select name="city" class="w1 margintop">
                                            <option value="">请选择城市</option>
                                        </select>
                                    @endif


                                    <input type="submit" class="btn btn-success margintop search" value="查询">
                                    <input type="button" class="btn btn-info margintop export" value="导出">
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
                            <?php $t = 0; ?>
                            @foreach($datas as $data)
                                <tr class="gradeX">
                                    <td>{{++$t}}</td>
                                    <td>{{$data->udid}}</td>
                                    <td>{{$data->deviceTypeName}}</td>
                                    <td>{{$data->channelName}}</td>
                                    <td>{{$data->brandName}}</td>
                                    <td>{{$data->ebikeTypeName}}</td>
                                    <td>{{$data->activeAt}}</td>
                                    <td>{{$data->deviceCycleTrans}}</td>
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

    <script>
        $(":file").filestyle({input: false, classButton: "btn btn-success", buttonText: "导入"});

        $(function () {
            var myform = $("#myform");
            $(":file").on("change", function () {
                myform.submit();
                $(this).val('');//操作结束清空input中的内容
            });

            //导出excel
            $(".export").click(function () {
                var form = $(this).parents("form");
                var sendData = form.serialize();
                $.ajax({
                    url:'{{URL::action('Admin\DeviceController@exportList')}}',
                    data:sendData,
                    success:function (res) {
                        if(ajax_check_res(res)){

                        }
                    }
                })
                //form.attr('action', '{{URL::action('Admin\DeviceController@exportList')}}');
                //form.ajaxf();
                return;
                form.submit();
            });

            if ($("select[name='province']").val()) {
                getCity();
            }

            function getCity() {
                var province = $("select[name='province']").val();
                var select = $("select[name='city']");
                select.html("<option value=''>请选择城市</option>");
                if (province) {
                    $.ajax({
                        url: '{{URL::action('Admin\DeviceController@searchCity')}}',
                        data: {province: province},
                        beforeSend: function () {

                        },
                        success: function (data) {
                            if (ajax_check_res(data)) {
                                if (data.list) {
                                    for (var i = 0; i < data.list.length; i++) {
                                        var row = data['list'][i];
                                        var option = $("<option value='" + row + "'>" + row + "</option>")
                                        if (row === '{{Request::input('city')}}') {
                                            option.attr({
                                                selected: true
                                            })
                                        }
                                        option.appendTo(select);
                                    }
                                }
                            }
                        }
                    })
                } else {
                    select.val('');
                }
            }

            //省市筛选
            $("select[name='province']").on('change', function () {
                getCity();
            });


        })

    </script>

    @include('admin.common_submitjs')

@endsection