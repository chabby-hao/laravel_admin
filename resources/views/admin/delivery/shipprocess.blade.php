@extends('admin.layout')
@section('content')
    <style>
        .mytable {
            font-size: 12px;
            line-height: 12px;
            vertical-align: middle;
            /*padding: 20px 0;*/
        }

        .mydiv {
            padding: 10px;
            margin: 3px;
            border: 1px solid;
            border-radius: 3px;
            border-color: rgba(0, 0, 0, 0.2);
            display: inline-block;
        }
    </style>

    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"><span class="icon"> <i class="icon-briefcase"></i> </span>
                        <h5>{{\App\Logics\AuthLogic::getPermisName() }}</h5>
                    </div>
                    <div class="widget-content">
                        <div class="row-fluid">
                            <div class="span6">
                                <table class="">
                                    <tbody>
                                    <tr>
                                        <td><strong>料号：{{$data->part_number}}</strong></td>
                                    </tr>
                                    <tr>
                                        <td><strong>出货单号：{{$data->ship_no}}</strong></td>
                                    </tr>
                                    <tr>
                                        <td><strong>设备型号：{{$data->device_type_name}}</strong></td>
                                    </tr>
                                    <tr>
                                        <td><strong>要求出货时间：{{$data->delivery_date}}</strong></td>
                                    </tr>
                                    <tr>
                                        <td><strong>出货数量：{{$data->delivery_quantity}}</strong></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="span6">
                                <form class="form-search" id="myform" method="post" enctype="multipart/form-data">
                                    <div class="control-group">
                                        <div class="controls controls-row">

                                            <div class="inline-block">
                                                <label>上传附件</label>
                                                <input class="file-uploading" name="myfile" type="file"/>
                                                {{--<span class="help-block">点击下载模板示例: <a href="">示例文件</a></span>--}}
                                            </div>

                                            <div class="inline-block">
                                                <span class="help-block">点击下载附件示例: <a href="{{asset('demo/factdemo.xlsx')}}">示例文件</a></span>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span12">
                                <div class="widget-box">
                                    <div class="widget-content mytable">
                                        {{--<div class="mydiv">35755249243223</div>--}}
                                    </div>
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-primary btn-large pull-right" id="mysubmit" href="javascript:">提交</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script id="template" type="x-tmpl-mustache">
    <%#data%>
        <div class="mydiv <%.%>" ><% . %></div>
    <%/data%>
    </script>

    <script>

        $(function(){

            var myform = $("#myform");

            var mytable = $(".mytable");

            var mydata = [];

            myform.ajaxForm({
                dataType: 'json',
                //beforeSubmit : test,//ajax动画加载
                success: function (data) {
                    if (ajax_check_res(data)) {

                        mydata = data.data;

                        var template = $('#template').html();
                        Mustache.parse(template);   // optional, speeds up future uses
                        var rendered = Mustache.render(template, data);
                        mytable.html(rendered);
                    }
                }
            });
            $(".file-uploading").on("change", function () {
                mydata = [];
                mytable.html('');
                myform.submit();
                $(this).val('');//操作结束清空input中的内容
            })

            $("#mysubmit").click(function(){
                if(mydata.length > 0){

                    $.ajax({
                        data:{data:mydata},
                        success:function(data){
                            if(ajax_check_res(data)){

                            }else if(data.data){
                                var errors = data.data;
                                for (var i =0;i<errors.length;i++){
                                    $("." + errors[i]).addClass('text-error');
                                }
                            }
                        }
                    })

                }else{
                    myalert('先上传附件!');
                }
            })



        })



    </script>
@endsection

