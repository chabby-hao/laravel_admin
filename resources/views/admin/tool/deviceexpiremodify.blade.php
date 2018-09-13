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
                        <form id="myform" method="post" class="form-horizontal">

                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>设备码 :</label>
                                <div class="controls">
                                    <input name="id" value="" type="text" class="span11"/>
                                    <span class="help-block">可输入：设备码/IMEI/IMSI/张飞ID/得威Id</span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>日期 :</label>
                                <div class="controls">
                                    <input id="date" name="date" value="" type="text" class="span11"/>
                                    <span class="help-block">YYYY-MM-DD</span>
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

    <script>
        $('#date').datepicker({
            format: "yyyy-mm-dd",
            language: "zh-CN",
            // startDate: '+0d',
            startView: 1,
            // todayHighlight: true,
        });
    </script>
@endsection

