@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span8">
                <div class="widget-box">
                    <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>{{\App\Logics\AuthLogic::getPermisName() }}</h5>
                    </div>
                    <div class="widget-content">
                        <form id="myform" enctype="multipart/form-data" method="post" class="form-horizontal">

                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>拉渠道方式 :</label>
                                <div class="controls">
                                    <label>
                                        <input  type="radio" name="way" value="0" checked/>
                                        <span>拉渠道+清除数据</span>
                                    </label>
                                    <label>
                                        <input  type="radio" name="way" value="1"/>
                                        <span>只拉渠道</span>
                                    </label>

                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>渠道:</label>
                                <div class="controls">
                                    <select name="channel_id" class="span11">
                                        <option value="">请选择</option>
                                        @foreach(\App\Models\BiChannel::getChannelMap() as $id=> $name)
                                            <option value="{{$id}}">{{$name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>客户:</label>
                                <div class="controls">
                                    <select name="customer_id" class="span11">
                                        <option value="">请选择</option>
                                        @foreach(\App\Models\BiCustomer::getCustomerMap() as $id=> $name)
                                            <option value="{{$id}}">{{$name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">场景:</label>
                                <div class="controls">
                                    <select name="scene_id" class="span11">
                                        <option value="">请选择</option>
                                    </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>提交方式 :</label>
                                <div class="controls">
                                    <label>
                                        <input class="check" type="radio" name="mode" value="0" checked/>
                                        <span>单个</span>
                                    </label>
                                    <label>
                                        <input class="check" type="radio" name="mode" value="1"/>
                                        <span>批量</span>
                                    </label>

                                </div>
                            </div>

                            <div class="control-group single">
                                <label class="control-label"><span class="text-error">*</span>设备码 :</label>
                                <div class="controls">
                                    <input name="id" value="" type="text" class="span11"/>
                                    <span class="help-block">可输入：设备码/IMEI/IMSI</span>
                                </div>
                            </div>

                            <div class="control-group muti hide">
                                <label class="control-label"><span class="text-error">*</span>imei列表 :</label>
                                <div class="controls">
                                    <input type="file" name="myfile"/>
                                    <span class="help-block">excel文件示例：<a href="{{asset('demo/imeis.xlsx')}}">点我下载</a></span>
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

        $(":file").filestyle();

    </script>

    <script>

        $(function(){

            var single = $(".single");
            var muti = $(".muti");

            $(".check").on('change', function(){
                if($(this).val() == 0){
                    muti.hide();
                    single.show();
                }else{
                    single.hide();
                    muti.show();
                }
            })



        })

    </script>
    @include('admin.common_channel_customer_scenejs')
    @include('admin.common_submitjs')
@endsection

