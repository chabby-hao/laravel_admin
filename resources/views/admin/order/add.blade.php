@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span6">
                <div class="widget-box">
                    <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>添加</h5>
                    </div>
                    <div class="widget-content">
                        <form id="myform" method="post" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>渠道名称:</label>
                                <div class="controls">
                                    <select name="channel_id" class="span11">
                                        <option value="">请选择渠道</option>
                                        @foreach(\App\Models\BiChannel::getChannelMap() as $channelId=> $channelName)
                                            <option value="{{$channelId}}">{{$channelName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>订单数量:</label>
                                <div class="controls">
                                    <input name="order_quantity" value="" type="text" class="span11"/>
                                    <span class="help-block">例：100</span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>设备型号:</label>
                                <div class="controls">
                                    <select name="product_type" class="span11">
                                        <option value="">请选择设备型号</option>
                                        @foreach(\App\Models\BiProductType::() as $channelId=> $channelName)
                                            <option value="{{$channelId}}">{{$channelName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>期望交货:</label>
                                <div class="controls">
                                    <input name="order_quantity" name="expect_delivery" value="" type="text" class="span11"/>
                                    <span class="help-block">例：100</span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>售后订单:</label>
                                <div class="controls">
                                    <input name="order_quantity" name="after_sale" value="" type="text" class="span11"/>
                                    <span class="help-block">例：100</span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">备注:</label>
                                <div class="controls">
                                    <textarea name="remark" type="text" class="span11"></textarea>
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

        $(function () {

            var myform = $("#myform");

            $("#mysubmit").click(function () {
                myform.submit();
            });

            myform.ajaxForm({
                dataType: 'json',
                //beforeSubmit : test,//ajax动画加载
                success: function (data) {
                    if (ajax_check_res(data)) {
                        //myalert('保存成功');
                    }
                }
            });
        });

    </script>
@endsection

