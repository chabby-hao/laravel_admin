@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span8">
                <div class="widget-box">
                    <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>客户修改</h5>
                    </div>
                    <div class="widget-content">
                        <form id="myform" method="post" class="form-horizontal">

                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>客户名称 :</label>
                                <div class="controls">
                                    <input name="customer_name" value="{{$customer[0]->customer_name}}" type="text" class="span11"/>
                                </div>
                            </div>



                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>备注 :</label>
                                <div class="controls">
                                    <input name="customer_remark" value="{{$customer[0]->customer_remark}}" type="text" class="span11"/>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>所属渠道 :</label>
                                <div class="controls">

                                    <select name="channel_id">
                                        <option value="{{$customer[0]->channel_id}}">{{$customer[0]->channel_name}}</option>

                                        @foreach($channel as $key => $value)
                                        <option value="{{$value->id}}">{{$value->channel_name}}</option>
                                        @endforeach

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


    @include('admin.common_submitjs')
@endsection

