@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">

                <div class="widget-box">
                    <div class="widget-title"><span class="icon"> <i class="icon-search"></i> </span>
                        <h5>筛选查询</h5>
                    </div>
                    <div class="widget-content">
                        <form  class="form-search">
                            <div class="control-group">
                                <div class="inline-block w10">
                                    <input class="w3 margintop" type="text" name="id" id="id" value="{{Request::input('id')}}" placeholder="请输入设备码/IMEI/IMSI">
                                    <input type="button" class="btn btn-success margintop search" value="查询">

                                </div>

                            </div>

                        </form>
                    </div>
                </div>

                <div class="widget-box">
                    <div class="widget-title"><span class="icon"> <i class="icon-briefcase"></i> </span>
                        <h5>{{\App\Logics\AuthLogic::getPermisName() }}</h5>
                    </div>
                    <div class="widget-content">
                            <div class="span6">
                                <h5>DeviceRecordCgf</h5>
                                <table class="">
                                    <tbody id="recordBody">

                                    <script id="template" type="x-tmpl-mustache">
                                        <%#recordConfig%>
                                        <tr>
                                            <td><strong><%id%>：<%value%></strong></td>
                                        </tr>
                                        <%/recordConfig%>
                                    </script>

                                    </tbody>
                                </table>
                            </div>
                            <div class="span6">
                                <h5>DeviceSendCgf</h5>
                                <table class="">
                                    <tbody id="sendBody">


                                        <script id="template2" type="x-tmpl-mustache">
                                            <%#sendConfig%>
                                            <tr>
                                                <td><strong>{{$id}}：{{$value}}</strong></td>
                                            </tr>
                                            <%/sendConfig%>
                                        </script>

                                    </tbody>
                                </table>
                            </div>
                        <div class="row-fluid">
                            <div class="span12">
                                <div class="widget-box">
                                    <div class="widget-content mytable">
                                        {{--<div class="mydiv">35755249243223</div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row-fluid">

        </div>
    </div>

    <script>
        $(function () {
            var template = $('#template').html();
            Mustache.parse(template);   // optional, speeds up future uses

            var template2 = $('#template2').html();
            Mustache.parse(template2);   // optional, speeds up future uses

            function search(){
                var id = $("#id").val();
                if(id){
                    $.ajax({
                        url:'{{URL::action('Admin\ToolController@configShow')}}',
                        data:{id:id},
                        success:function (data) {
                            console.log(data);
                            var target = $("#recordBody");
                            var rendered = Mustache.render(template, data);
                            target.html(rendered);

                            var target2 = $("#sendBody");
                            var rendered2 = Mustache.render(template2, data);
                            target2.html(rendered2);
                        }
                    })
                }
            }

            search();

            $(".search").click(function () {
                search();
            })

        })
    </script>

@endsection

