@extends('admin.layout')
@section('content')

    <style>
        .controls label {
            display: inline-block;
        }

        .controls input {
            margin: 0;
        }
    </style>

    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span10">
                <div class="widget-box">
                    <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>分配权限</h5>
                    </div>
                    <div class="widget-content">
                        <form id="myform" action="" method="post" class="form-horizontal">
                            <?php /** @var \App\Models\Role $role */ ?>
                            <input type="hidden" name="id" class="role_id" value="{{$role->id}}"/>

                            @foreach($permisMap as $key => $permiss)
                                <div class="control-group">
                                    <label class="control-label"><span class="text-error"></span>{{$key}} :</label>
                                    <div class="controls">
                                        <?php /** @var \App\Models\Permission $permis */ ?>
                                        @foreach($permiss as $permis)
                                            <label>
                                                <input @if($role->hasPermission($permis->name)) checked @endif name="permis_id[]" value="{{$permis->id}}" type="checkbox"/>
                                                <span>{{$permis->display_name}}</span>
                                            </label>
                                        @endforeach

                                        {{--<span class="help-block">例：admin</span>--}}
                                    </div>
                                </div>
                            @endforeach

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

