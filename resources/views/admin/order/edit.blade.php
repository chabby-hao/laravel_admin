@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span6">
                <div class="widget-box">
                    <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>{{\App\Logics\AuthLogic::getPermisName() }}</h5>
                    </div>
                    <div class="widget-content">
                        <form id="myform" method="post" class="form-horizontal">
                            <input type="hidden" name="id" value="{{$data->id}}">
                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>渠道名称:</label>
                                <div class="controls">
                                    <select disabled name="channel_id" class="span11">
                                        <option value="">请选择渠道</option>
                                        @foreach(\App\Models\BiChannel::getChannelMap() as $channelId=> $channelName)
                                            <option @if($channelId == $data->channel_id) selected @endif value="{{$channelId}}">{{$channelName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>订单数量:</label>
                                <div class="controls">
                                    <input disabled name="order_quantity" value="{{$data->order_quantity}}" type="number" class="span11"/>
                                    <span class="help-block">例：100</span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>设备型号:</label>
                                <div class="controls">
                                    <select disabled name="device_type" class="span11">
                                        <option value="">请选择设备型号</option>
                                        @foreach(\App\Models\BiDeviceType::getNameMap() as $id=> $name)
                                            <option @if($id==$data->device_type) selected @endif value="{{$id}}">{{$name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>期望交货:</label>
                                <div class="controls">
                                    <input id="expect_delivery" name="expect_delivery" value="{{$data->expect_delivery}}" type="text" class="span11"/>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>售后订单:</label>
                                <div class="controls">

                                    @foreach(\App\Models\BiOrder::getAfterSaleTypeName() as $id=>$name)
                                        <label>
                                            <input disabled @if($id==$data->after_sale) checked @endif name="after_sale" type="radio" value="{{$id}}"  />
                                            {{$name}}</label>
                                        @endforeach

                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">备注:</label>
                                <div class="controls">
                                    <textarea name="remark" type="text" class="span11">{{$data->remark}}</textarea>
                                </div>
                            </div>


                            <div class="form-actions">
                                <button type="button" id="mysubmit" class="btn btn-success">提交</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

        $('#expect_delivery').datepicker({
            format: "yyyy-mm-dd",
            language: "zh-CN",
            startDate: '+0d',
            startView: 1,
            todayHighlight: true,
        });

    </script>

@include('admin.common_submitjs')
@endsection

