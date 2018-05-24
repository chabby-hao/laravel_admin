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
                                <label class="control-label"><span class="text-error">*</span>升级类型 :</label>
                                <div class="controls">
                                    <select name="cmd" class="span11">
                                        <option value="">请选择</option>
                                        @foreach(\App\Logics\RomLogic::getUpdateTypeMap() as $type => $name)
                                            <option value="{{$type}}">{{$name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>选择文件 :</label>
                                <div class="controls">
                                    <select name="url" class="span8">
                                        <option value="">请选择</option>

                                    </select>
                                    <a href="{{URL::action('Admin\ToolController@fileAdd')}}" class="btn btn-info">添加文件</a>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>升级方式 :</label>
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

            $("select[name='cmd']").on("change", function(){
                fileChange();
            })

            function fileChange(){
                var cmd = $("select[name='cmd']").val();
                var select = $("select[name='url']");
                select.html("<option value=''>请选择</option>");
                if (cmd) {
                    $.ajax({
                        url: '{{URL::action('Admin\ToolController@getFileUrl')}}',
                        data: {cmd: cmd},
                        beforeSend: function () {

                        },
                        success: function (data) {
                            if (ajax_check_res(data)) {
                                if (data.list) {
                                    for (var i = 0; i < data.list.length; i++) {
                                        var row = data['list'][i];
                                        var option = $("<option value='" + row.fileurl + "'>" + row.filename + "</option>")
                                        option.appendTo(select);
                                    }
                                }
                            }
                        }
                    })
                } else {
                    $("select[name='ebike_type_id']").val('');
                }
            }


        })

    </script>
    @include('admin.common_submitjs')
@endsection

