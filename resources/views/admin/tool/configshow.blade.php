@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"><span class="icon"> <i class="icon-briefcase"></i> </span>
                        <h5>{{\App\Logics\AuthLogic::getPermisName() }}</h5>
                    </div>
                    <div class="widget-content">
                            <div class="span6">
                                <h5>DeviceRecordCgf</h5>
                                <table class="">
                                    <tbody>

                                        @foreach($devRecordCfg as $k=>$v)
                                            <tr>
                                                <td><strong>{{$k}}：{{$v}}</strong></td>
                                            </tr>
                                        @endforeach

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


    @include('admin.common_submitjs')
@endsection

