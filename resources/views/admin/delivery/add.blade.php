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
                                <label class="control-label"><span class="text-error">*</span>订单号:</label>
                                <div class="controls">
                                    <select required name="order_id" class="span11">
                                        <option value="">请选择</option>
                                        @foreach(\App\Models\BiOrder::getUnfinishedordersMap() as $orderId=> $orderNo)
                                            <option value="{{$orderId}}">{{$orderNo}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>渠道名称:</label>
                                <div class="controls">
                                    <input id="channel_name" readonly value="" type="text" class="span11"/>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>订单数量:</label>
                                <div class="controls">
                                    <input id="order_quantity" readonly value="" type="text" class="span11"/>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>设备型号:</label>
                                <div class="controls">
                                    <input id="device_type_name" readonly value="" type="text" class="span11"/>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>期望出货:</label>
                                <div class="controls">
                                    <input id="expect_delivery" readonly value="" type="text" class="span11"/>
                                </div>
                            </div>


                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>料号:</label>
                                <div class="controls">
                                    <input required name="part_number" value="" type="text" class="span11"/>
                                    <span class="help-block">支持数字和字母</span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>出货工厂:</label>
                                <div class="controls">
                                    <select required name="fact_id" class="span11">
                                        <option value="">请选择</option>
                                        @foreach(\App\Logics\FactoryLogic::getAccountList() as $id=> $name)
                                            <option value="{{$id}}">{{$name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>出货时间:</label>
                                <div class="controls">
                                    <input required id="delivery_date" name="delivery_date" value="" type="text" class="span11"/>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>出货数量:</label>
                                <div class="controls">
                                    <input required name="delivery_quantity" value="" type="number" class="span11"/>
                                    <span class="help-block">大于0小于等于该订单未出货的数量</span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">车辆品牌:</label>
                                <div class="controls">
                                    <select name="brand_id" class="span11">
                                        <option value="">请选择</option>
                                        @foreach(\App\Models\BiBrand::getBrandMap() as $id=> $name)
                                            <option value="{{$id}}">{{$name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">车辆型号:</label>
                                <div class="controls">
                                    <select name="ebike_type_id" class="span11">
                                        <option value="">请选择</option>
                                    </select>
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
        $('#delivery_date').datepicker({
            format: "yyyy-mm-dd",
            language: "zh-CN",
            startDate: '+0d',
            startView: 1,
            todayHighlight: true,
        });

        $("select[name='order_id']").on('change', function () {
            var orderId = $(this).val();
            if (orderId) {
                $.ajax({
                    url: '{{URL::action('Admin\OrderController@detail')}}',
                    data: {id: orderId},
                    success: function (data) {
                        if (ajax_check_res(data)) {
                            console.log(data);
                            $("#channel_name").val(data.channel_name);
                            $("#order_quantity").val(data.order_quantity);
                            $("#device_type_name").val(data.device_type_name);
                            $("#expect_delivery").val(data.expect_delivery);
                        }
                    },
                })
            }
        });

        $("select[name='brand_id']").on('change', function () {
            var brandId = $(this).val();
            var ebSelect = $("select[name='ebike_type_id']");
            ebSelect.html("<option value=''>请选择</option>");
            if (brandId) {
                $.ajax({
                    url: '{{URL::action('Admin\BrandController@detail')}}',
                    data: {id: brandId},
                    success: function (data) {
                        if (ajax_check_res(data)) {
                            if (data.ebType) {
                                for (var i=0;i<data.ebType.length;i++) {
                                    var eb = data['ebType'][i];
                                    var ebOption = $("<option value='" + eb.id + "'>" + eb.ebike_name + "</option>")
                                    ebOption.appendTo(ebSelect);
                                }
                            }
                        }
                    }
                })
            } else {
                $("select[name='ebike_type_id']").val('');
            }
        });

    </script>
    @include('admin.common_submitjs')
@endsection

