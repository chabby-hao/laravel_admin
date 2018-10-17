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
                        <form method="get" class="form-search">
                            <div class="control-group">
                                <div class="inline-block w10">
                                    <input class="w1 margintop" type="text" name="MstSn" value="{{Request::input('MstSn')}}" placeholder="MstSn">
                                    <input class="w1 margintop" type="text" name="CiNum" value="{{Request::input('CiNum')}}" placeholder="CiNum">
                                    <input class="w1 margintop" type="text" name="CPAct" value="{{Request::input('CPAct')}}" placeholder="CPAct">
                                    <input type="submit" class="btn btn-success margintop search" value="查询">

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
                                    <tbody>

                                    <script id="template" type="x-tmpl-mustache">
                                        <%#recordConfig%>
                                        <tr>
                                            <td><strong>{{$id}}：{{$value}}</strong></td>
                                        </tr>
                                        <%/recordConfig%>
                                    </script>

                                    </tbody>
                                </table>
                            </div>
                            <div class="span6">
                                <h5>DeviceSendCgf</h5>
                                <table class="">
                                    <tbody>

                                        @foreach($devSendCfg as $k=>$v)
                                            <tr>
                                                <td><strong>{{$k}}：{{$v}}</strong></td>
                                            </tr>
                                        @endforeach

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
                                <div class="pull-right">
                                    <a class="btn btn-primary btn-large pull-right" id="mysubmit" href="javascript:">提交</a>
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


            window.render = function (data) {
                console.log(data);
                var target = $("#box");
                var rendered = Mustache.render(template, data);
                target.html(rendered);
            }
        })
    </script>

@endsection

