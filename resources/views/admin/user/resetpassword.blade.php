<?php /** @var \App\Models\BiUser $user */ ?>
@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span6">
                <div class="widget-box">
                    <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>修改密码</h5>
                    </div>
                    <div class="widget-content">
                        <form id="myform" action="" method="post" class="form-horizontal">


                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>旧密码 :</label>
                                <div class="controls">
                                    <input name="password_old" type="password" class="span11"/>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>新密码 :</label>
                                <div class="controls">
                                    <input name="password" type="password" class="span11"/>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>确认新密码 :</label>
                                <div class="controls">
                                    <input name="password_confirm" type="password" class="span11"/>
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

@endsection

