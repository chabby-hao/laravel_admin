@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span6">
                <div class="widget-box">
                    <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5></h5>
                    </div>
                    <div class="widget-content">
                        <form id="myform" action="" method="post" class="form-horizontal">

                            <?php /** @var \App\Models\BiUser $user */ ?>
                            <input type="hidden" name="id" class="role_id" value="{{$user->id}}"/>

                            <div class="control-group">
                                <label class="control-label"><span class="text-error"></span>角色 :</label>
                                <div class="controls">
                                    <?php /** @var \App\Models\Role $role */ ?>
                                    @foreach($roles as $role)
                                        <label>
                                            <input @if($user->hasRole($role->name)) checked @endif name="role_id" value="{{$role->id}}" type="radio"/>
                                            <span>{{$role->display_name}}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="button" id="mysubmit" class="btn btn-success">添加</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

        $(function () {

            $("#user_type").change(function () {
                var user_type = $(this).val();
                if (user_type === '{{ \App\Models\BiUser::USER_TYPE_ALL }}') {
                    $("#channel").hide();
                    $("#brand").hide();
                } else if (user_type === '{{\App\Models\BiUser::USER_TYPE_CHANNEL}}') {
                    $("#brand").hide();
                    $("#channel").show();
                } else if (user_type === '{{\App\Models\BiUser::USER_TYPE_BRAND}}') {
                    $("#brand").show();
                    $("#channel").hide();
                }
            });

            var myform = $("#myform");

            $("#mysubmit").click(function () {
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
@endsection

