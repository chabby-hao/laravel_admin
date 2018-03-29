@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span6">
                <div class="widget-box">
                    <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>编辑</h5>
                    </div>
                    <div class="widget-content">
                        <form id="myform" method="post" class="form-horizontal">
                            <input type="hidden" name="id" value="{{$data->id}}">

                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>出货时间:</label>
                                <div class="controls">
                                    <input required id="delivery_date" name="delivery_date" value="{{$data->delivery_date}}" type="text" class="span11"/>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>出货数量:</label>
                                <div class="controls">
                                    <input required name="delivery_quantity" value="{{$data->delivery_quantity}}" type="number" class="span11"/>
                                    <span class="help-block">大于0小于等于该订单未出货的数量</span>
                                </div>
                            </div>

                            {{--<div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>售后订单:</label>
                                <div class="controls">

                                    @foreach(\App\Models\BiOrder::getAfterSaleTypeName() as $id=>$name)
                                        <label>
                                            <input @if($id==$data->after_sale) checked @endif name="after_sale" type="radio" value="{{$id}}"  />
                                            {{$name}}</label>
                                        @endforeach

                                </div>
                            </div>--}}


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
            startDate: '+1d',
            startView: 1,
            todayHighlight: true,
        });

    </script>

@include('admin.common_submitjs')
@endsection

