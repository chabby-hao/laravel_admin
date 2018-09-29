@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span6">
                <div class="widget-box">
                    <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>{{\App\Logics\AuthLogic::getPermisName() }}</h5>
                    </div>
                    <div class="widget-content">
                        <form id="myform" method="post" class="form-horizontal">

                            <div class="control-group single">
                                <label class="control-label"><span class="text-error">*</span>设备码 :</label>
                                <div class="controls">
                                    <input name="id" value="" type="text" class="span11"/>
                                    <span class="help-block">可输入：设备码/IMEI/IMSI/张飞ID/得威Id</span>
                                </div>
                            </div>


                            <input type="hidden" name="lock" id="lock">

                            <div class="form-actions">
                                <button type="button" lock="0"  class="btn btn-success mysubmit">解锁</button>
                                <button type="button" lock="1"  class="btn btn-danger mysubmit">锁车</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        $(function () {


            var myform = $("#myform");

            $('.mysubmit').click(function () {

                $("#lock").val($(this).attr('lock'));
                myform.submit();
            });

            myform.ajaxForm({
                dataType: 'json',
                //beforeSubmit : test,//ajax动画加载
                success: function (data) {
                    if (ajax_check_res(data)) {
                        //myalert('保存成功');
                    }
                }
            });
        });

    </script>

    {{--@include('admin.common_submitjs')--}}
@endsection

