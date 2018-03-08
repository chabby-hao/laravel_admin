@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span6">
                <div class="widget-box">
                    <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>添加</h5>
                    </div>
                    <div class="widget-content">
                        <form id="myform" action="<?php ?>" method="post" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>账号 :</label>
                                <div class="controls">
                                    <input name="username" value="" type="text" class="span11"/>
                                    <span class="help-block">例：chabby</span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>密码 :</label>
                                <div class="controls">
                                    <input name="password" type="text" class="span11"/>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>确认密码 :</label>
                                <div class="controls">
                                    <input name="password_confirm" type="text" class="span11"/>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>账号类型 :</label>
                                <div class="controls">
                                    <select name="user_type" type="text" class="span11">
                                        <?php foreach (\App\Models\BiUser::getUserTypeMap() as $key => $val){ ?>
                                            <option value="<?php echo $key ?>"><?php echo $val ?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>账号类型 :</label>
                                <div class="controls">
                                    <select name="user_type" type="text" class="span11">
                                        <?php foreach (\App\Models\BiChannel::getChannelMap() as $key => $val){ ?>
                                            <option value="<?php echo $key; ?>"><?php echo $val; ?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>账号类型 :</label>
                                <div class="controls">
                                    <select name="user_type" type="text" class="span11">
                                        <?php /** @var \App\Models\BiChannel $val */
                                        foreach (\App\Models\BiBrand::getBrandMap() as $key => $val){ ?>
                                        <option value="<?php echo $key; ?>"><?php echo $val; ?></option>
                                        <?php }?>
                                    </select>
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

