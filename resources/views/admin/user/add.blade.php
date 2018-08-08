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
                        <form id="myform" action="" method="post" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>账号 :</label>
                                <div class="controls">
                                    <input name="username" value="" type="text" class="span11"/>
                                    <span class="help-block">例：ximen</span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">昵称 :</label>
                                <div class="controls">
                                    <input name="nickname" value="" type="text" class="span11"/>
                                    <span class="help-block">例：王小二（注：如果此账号为工厂角色，可以填写工厂名称）</span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>密码 :</label>
                                <div class="controls">
                                    <input name="password" type="password" class="span11"/>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>确认密码 :</label>
                                <div class="controls">
                                    <input name="password_confirm" type="password" class="span11"/>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>账号类型 :</label>
                                <div class="controls">
                                    <select id="user_type" name="user_type" type="text" class="span11">
                                        <?php foreach (\App\Models\BiUser::getUserTypeMap() as $key => $val){ ?>
                                        <option value="<?php echo $key ?>"><?php echo $val ?></option>
                                        <?php }?>
                                    </select>
                                    <span class="help-block">如何选择全部，则可以看到全部数据；如果选择渠道商则可以看到该渠道下的所有数据；如果选择品牌商，则可以看品牌下的所有数据。</span>
                                </div>
                            </div>

                            <div id="channel" class="control-group hide">
                                <label class="control-label"><span class="text-error">*</span>渠道类型 :</label>
                                <div class="controls">
                                    <select name="channel_id" type="text" class="span11">
                                        <option value="">请选择</option>
                                        <?php foreach (\App\Models\BiChannel::getChannelMap() as $key => $val){ ?>
                                        <option value="<?php echo $key; ?>"><?php echo $val; ?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>

                            <div id="customer" class="control-group hide">
                                <label class="control-label"><span class="text-error">*</span>客户 :</label>
                                <div class="controls">
                                    <select name="customer_id" type="text" class="span11">
                                        <option value="">请选择</option>
                                    </select>
                                </div>
                            </div>

                            {{--<div id="brand" class="control-group hide">
                                <label class="control-label"><span class="text-error">*</span>品牌 :</label>
                                <div class="controls">
                                    <select name="brand_id" type="text" class="span11">
                                        <option value="">请选择</option>
                                        <?php foreach (\App\Models\BiBrand::getBrandMap() as $key => $val){ ?>
                                        <option value="<?php echo $key; ?>"><?php echo $val; ?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>--}}

                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>角色 :</label>
                                <div class="controls">
                                    <select name="role_id" type="text" class="span11">
                                        <option value="">请选择</option>
                                        <?php foreach (\App\Models\Role::getRoleNameMap() as $key => $val){ ?>
                                            <option value="<?php echo $key; ?>"><?php echo $val; ?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">邮箱地址 :</label>
                                <div class="controls">
                                    <input name="email" type="email" class="span11"/>
                                    <span class="help-block">例：可用于接受重要通知(选填)</span>
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

    @include('admin.user.commonjs')
    @include('admin.common_channel_customer_scenejs')
    @include('admin.common_submitjs')

@endsection

