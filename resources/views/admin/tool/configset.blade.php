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
            <div class="span6">
                <div class="widget-box">
                    <div class="widget-content">
                        <form id="myform" method="post" class="form-horizontal">

                            <div class="control-group single">
                                <label class="control-label"><span class="text-error">*</span>设备码 :</label>
                                <div class="controls">
                                    <input name="id" value="" type="text" class="span11"/>
                                    <span class="help-block">可输入：设备码/IMEI/IMSI/张飞ID/得威Id</span>
                                </div>
                            </div>

                            <div class="control-group single">
                                <label class="control-label"><span class="text-error">*</span>命令编号 :</label>
                                <div class="controls">
                                    <input name="cmd" value="" type="text" class="span11"/>
                                    <span class="help-block">例如：24003</span>
                                </div>
                            </div>


                            <div class="form-actions">
                                <button type="button" id="mysubmit" class="btn btn-success">提交</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="span6">
                <div class="widget-box">
                    <div class="widget-content">
                        <form id="myform" method="post" class="form-horizontal">

                            <div class="control-group single">
                                <label class="control-label"><span class="text-error">*</span>设备码 :</label>
                                <div class="controls">
                                    <input name="id" value="" type="text" class="span11"/>
                                    <span class="help-block">可输入：设备码/IMEI/IMSI/张飞ID/得威Id</span>
                                </div>
                            </div>

                            <div class="control-group single">
                                <label class="control-label"><span class="text-error">*</span>命令编号 :</label>
                                <div class="controls">
                                    <input name="cmd" value="" type="text" class="span11"/>
                                    <span class="help-block">例如：24003</span>
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
        <div class="row-fluid">

        </div>
    </div>


    @include('admin.common_submitjs')
@endsection

